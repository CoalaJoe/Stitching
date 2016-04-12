<?php

namespace AppBundle\Command;


use AppBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CleanupCommand
 *
 * @package AppBundle\Command
 */
class CleanupCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('app:cleanup')->setDescription('Removes images older than 14 days from database and filesystem.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $io = new SymfonyStyle($input, $output);
        $io->title('Image cleanup');

        $latestDateTime = $datetime = new \DateTime(date('Y-m-d H:i:s', strtotime("-14 day")));
        $oldImages      = $em->createQueryBuilder()->select('i')->from('AppBundle:Image', 'i')->where('i.createdAt < :oldDate')->setParameter('oldDate', $latestDateTime)->getQuery(
        )->getResult();
        
        // TODO: create a cronjob

        $counter = 0;
        foreach ($oldImages as $image) {
            /** @var Image $image */
            $em->remove($image);
            if ($counter % 100 === 0) {
                $em->flush();
            }
        }
        $em->flush();
    }
}

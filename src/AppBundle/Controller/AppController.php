<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppController
 *
 * @package AppBundle\Controller
 */
class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {

        return $this->render('@App/app/index.html.twig');
    }

    /**
     * @Route("/archive/{site}", name="app_archive_route", requirements={"site": "\d+"}, defaults={"site": 1})
     */
    public function archiveAction(Request $request, $site)
    {
        $site   = ($site < 1) ? 1 : $site;
        $qb     = $this->get('doctrine.orm.entity_manager')->createQueryBuilder();
        $images = $qb->select('i')->from('AppBundle:Image', 'i')->setMaxResults(10)->setFirstResult($site * 10 - 10)->getQuery()->getResult();

        $amount = $qb->select('count(i.id)')->setMaxResults(null)->setFirstResult(0)->getQuery()->getSingleScalarResult() / 10;

        return $this->render('AppBundle:app:archive.html.twig', ['images' => $images, 'site' => $site, 'amount' => ceil($amount)]);
    }

    /**
     * @Route("/record", name="app_record_route")
     */
    public function recordAction()
    {
        $handler = $this->get('app.webcam.handler');
        $handler->moveHome();
        $handler->moveLeft();
        $handler->moveLeft();
        $image1 = $handler->takeImage();
        $handler->moveHome();
        $image2 = $handler->takeImage();
        $handler->moveRight();
        $handler->moveRight();
        $image3 = $handler->takeImage();

        $img = $this->get('app.stitcher')->stitch($image1, $image2, $image3);
        $em  = $this->get('doctrine.orm.entity_manager');

        $image = new Image($img);
        $em->persist($image);
        $em->flush();

        return $this->render('AppBundle:app:record.html.twig', array('img' => base64_encode($img)));
    }

    /**
     * @Route("/delete/{id}", name="app_delete_route", requirements={"id": "\d+"})
     * @param Request $request
     * @param         $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $image = $em->getRepository('AppBundle:Image')->find($id);
        $em->remove($image);
        $em->flush();

        return $this->render('AppBundle:app:delete.html.twig');
    }
}

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
        $handler = $this->get('app.webcam.handler');
        $handler->moveHome();
        $handler->moveLeft();
        sleep(1);
        $image1 = $handler->takeImage();
        $handler->moveHome();
        sleep(1);
        $image2 = $handler->takeImage();
        $handler->moveRight();
        sleep(1);
        $image3 = $handler->takeImage();

        $img = $this->get('app.stitcher')->stitch($image1, $image2, $image3);

        $image = new Image();

        return $this->render('@App/app/index.html.twig', array('img' => base64_encode($img)));
    }

    /**
     * @Route("/archive", name="app_archive_route")
     */
    public function archiveAction()
    {
        return $this->render('AppBundle:app:archive.html.twig');
    }

    /**
     * @Route("/record", name="app_record_route")
     */
    public function recordAction()
    {
        return $this->render('AppBundle:app:record.html.twig');
    }

    /**
     * @Route("/delete", name="app_delete_route")
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:app:delete.html.twig');
    }
}

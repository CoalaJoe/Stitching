<?php

namespace AppBundle\Controller;

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
        $webcam = $this->get('app.webcam.handler')->takeImage();
        
        return $this->render('AppBundle:app:index.html.twig');
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

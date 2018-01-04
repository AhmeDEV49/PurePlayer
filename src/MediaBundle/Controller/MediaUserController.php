<?php

namespace MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MediaUserController extends Controller
{
    /**
     * @Route("/media", name="media_list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $media = $em->getRepository('MediaBundle:Media')->findBy(array('createur' => $user ));


        return $this->render('MediaBundle:MediaUser:index.html.twig', array(
            'media_list' => $media));
    }

    /**
     * @Route("/media/new")
     */
    public function newAction()
    {
        return $this->render('MediaBundle:MediaUser:new.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/media/{id}")
     */
    public function showAction($id)
    {
        return $this->render('MediaBundle:MediaUser:show.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/media/{id}/edit")
     */
    public function editAction($id)
    {
        return $this->render('MediaBundle:MediaUser:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/media/{id}")
     */
    public function deleteAction($id)
    {
        return $this->render('MediaBundle:MediaUser:delete.html.twig', array(
            // ...
        ));
    }

}

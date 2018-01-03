<?php

namespace MediaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MediaBundle\Entity\TypeMedia;
use MediaBundle\Form\TypeMediaType;

/**
 * TypeMedia controller.
 *
 * @Route("/admin/typemedia")
 */
class TypeMediaController extends Controller
{
    /**
     * Lists all TypeMedia entities.
     *
     * @Route("/", name="typemedia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeMedia = $em->getRepository('MediaBundle:TypeMedia')->findAll();

        return $this->render('MediaBundle:admin:typemedia/index.html.twig', array(
            'typeMedia' => $typeMedia,
        ));
    }

    /**
     * Creates a new TypeMedia entity.
     *
     * @Route("/new", name="typemedia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeMedia = new TypeMedia();
        $form = $this->createForm('MediaBundle\Form\TypeMediaType', $typeMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeMedia);
            $em->flush();

            return $this->redirectToRoute('typemedia_show', array('id' => $typemedia->getId()));
        }

        return $this->render('MediaBundle:admin:typemedia/new.html.twig', array(
            'typeMedia' => $typeMedia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeMedia entity.
     *
     * @Route("/{id}", name="typemedia_show")
     * @Method("GET")
     */
    public function showAction(TypeMedia $typeMedia)
    {
        $deleteForm = $this->createDeleteForm($typeMedia);

        return $this->render('MediaBundle:admin:typemedia/show.html.twig', array(
            'typeMedia' => $typeMedia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeMedia entity.
     *
     * @Route("/{id}/edit", name="typemedia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeMedia $typeMedia)
    {
        $deleteForm = $this->createDeleteForm($typeMedia);
        $editForm = $this->createForm('MediaBundle\Form\TypeMediaType', $typeMedia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeMedia);
            $em->flush();

            return $this->redirectToRoute('typemedia_edit', array('id' => $typeMedia->getId()));
        }

        return $this->render('MediaBundle:admin:typemedia/edit.html.twig', array(
            'typeMedia' => $typeMedia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TypeMedia entity.
     *
     * @Route("/{id}", name="typemedia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeMedia $typeMedia)
    {
        $form = $this->createDeleteForm($typeMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeMedia);
            $em->flush();
        }

        return $this->redirectToRoute('typemedia_index');
    }

    /**
     * Creates a form to delete a TypeMedia entity.
     *
     * @param TypeMedia $typeMedia The TypeMedia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeMedia $typeMedia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typemedia_delete', array('id' => $typeMedia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
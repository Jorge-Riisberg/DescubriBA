<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Enlace;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Enlace controller.
 *
 */
class EnlaceController extends Controller
{
    /**
     * Lists all enlace entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $enlaces = $em->getRepository('MainBundle:Enlace')->findAll();

        return $this->render('enlace/index.html.twig', array(
            'enlaces' => $enlaces,
        ));
    }

    /**
     * Creates a new enlace entity.
     *
     */
    public function newAction(Request $request)
    {
        $enlace = new Enlace();
        $form = $this->createForm('MainBundle\Form\EnlaceType', $enlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enlace);
            $em->flush($enlace);

            return $this->redirectToRoute('enlace_show', array('id' => $enlace->getId()));
        }

        return $this->render('enlace/new.html.twig', array(
            'enlace' => $enlace,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a enlace entity.
     *
     */
    public function showAction(Enlace $enlace)
    {
        $deleteForm = $this->createDeleteForm($enlace);

        return $this->render('enlace/show.html.twig', array(
            'enlace' => $enlace,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing enlace entity.
     *
     */
    public function editAction(Request $request, Enlace $enlace)
    {
        $deleteForm = $this->createDeleteForm($enlace);
        $editForm = $this->createForm('MainBundle\Form\EnlaceType', $enlace);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enlace_edit', array('id' => $enlace->getId()));
        }

        return $this->render('enlace/edit.html.twig', array(
            'enlace' => $enlace,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a enlace entity.
     *
     */
    public function deleteAction(Request $request, Enlace $enlace)
    {
        $form = $this->createDeleteForm($enlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($enlace);
            $em->flush($enlace);
        }

        return $this->redirectToRoute('enlace_index');
    }

    /**
     * Creates a form to delete a enlace entity.
     *
     * @param Enlace $enlace The enlace entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Enlace $enlace)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('enlace_delete', array('id' => $enlace->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

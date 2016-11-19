<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Localidad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Localidad controller.
 *
 */
class LocalidadController extends Controller
{
    /**
     * Lists all localidad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localidads = $em->getRepository('MainBundle:Localidad')->findAll();

        return $this->render('localidad/index.html.twig', array(
            'localidads' => $localidads,
        ));
    }

    /**
     * Creates a new localidad entity.
     *
     */
    public function newAction(Request $request)
    {
        $localidad = new Localidad();
        $form = $this->createForm('MainBundle\Form\LocalidadType', $localidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localidad);
            $em->flush($localidad);

            return $this->redirectToRoute('localidad_show', array('id' => $localidad->getId()));
        }

        return $this->render('localidad/new.html.twig', array(
            'localidad' => $localidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a localidad entity.
     *
     */
    public function showAction(Localidad $localidad)
    {
        $deleteForm = $this->createDeleteForm($localidad);

        return $this->render('localidad/show.html.twig', array(
            'localidad' => $localidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localidad entity.
     *
     */
    public function editAction(Request $request, Localidad $localidad)
    {
        $deleteForm = $this->createDeleteForm($localidad);
        $editForm = $this->createForm('MainBundle\Form\LocalidadType', $localidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('localidad_edit', array('id' => $localidad->getId()));
        }

        return $this->render('localidad/edit.html.twig', array(
            'localidad' => $localidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a localidad entity.
     *
     */
    public function deleteAction(Request $request, Localidad $localidad)
    {
        $form = $this->createDeleteForm($localidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localidad);
            $em->flush($localidad);
        }

        return $this->redirectToRoute('localidad_index');
    }

    /**
     * Creates a form to delete a localidad entity.
     *
     * @param Localidad $localidad The localidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localidad $localidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('localidad_delete', array('id' => $localidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

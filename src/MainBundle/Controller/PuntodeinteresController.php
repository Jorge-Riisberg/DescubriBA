<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Puntodeinteres;
use MainBundle\Entity\Imagen;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Puntodeinteres controller.
 *
 */
class PuntodeinteresController extends Controller
{
    /**
     * Lists all puntodeinteres entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $puntodeinteres = $em->getRepository('MainBundle:Puntodeinteres')->findAll();

        return $this->render('puntodeinteres/index.html.twig', array(
            'puntodeinteres' => $puntodeinteres,
        ));
    }

    /**
     * Creates a new puntodeinteres entity.
     *
     */
    public function newAction(Request $request)
    {

        $puntodeinteres = new puntodeinteres();
        $form = $this->createForm('MainBundle\Form\PuntodeinteresType', $puntodeinteres);
        $form->handleRequest($request);
      

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($puntodeinteres);
            $em->flush($puntodeinteres);             

            return $this->redirectToRoute('puntodeinteres_show', array('id' => $puntodeinteres->getId()));
        }


        return $this->render('puntodeinteres/new.html.twig', array(
            'puntodeinteres' => $puntodeinteres,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a puntodeinteres entity.
     *
     */
    public function showAction(puntodeinteres $puntodeinteres)
    {
        $deleteForm = $this->createDeleteForm($puntodeinteres);

        //Creo repositorios
        $iRepository = $this->getDoctrine()->getRepository('MainBundle:Imagen');
        $vRepository = $this->getDoctrine()->getRepository('MainBundle:Video');
        $eRepository = $this->getDoctrine()->getRepository('MainBundle:Enlace');

        //Obtengo las imagenes, videos y enlaces del punto de interes
        $enlaces = $eRepository->findByPuntodeinteres($puntodeinteres->getId());
        $imagenes = $iRepository->findByPuntodeinteres($puntodeinteres->getId());
        $videos = $vRepository->findByPuntodeinteres($puntodeinteres->getId());

        //Cantidad de imagenes/videos del punto de interes
        $cant_imagenes_videos = count($imagenes) + count($videos);

        return $this->render('puntodeinteres/show.html.twig', array(
            'puntodeinteres' => $puntodeinteres,
            'enlaces' => $enlaces,
            'imagenes' => $imagenes,
            'videos' => $videos,
            'cant_imagenes_videos' => $cant_imagenes_videos,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing puntodeinteres entity.
     *
     */
    public function editAction(Request $request, puntodeinteres $puntodeinteres)
    {
        $deleteForm = $this->createDeleteForm($puntodeinteres);
        $editForm = $this->createForm('MainBundle\Form\PuntodeinteresType', $puntodeinteres);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('puntodeinteres_edit', array('id' => $puntodeinteres->getId()));
        }

        return $this->render('puntodeinteres/edit.html.twig', array(
            'puntodeinteres' => $puntodeinteres,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a puntodeinteres entity.
     *
     */
    public function deleteAction(Request $request, puntodeinteres $puntodeinteres)
    {
        $form = $this->createDeleteForm($puntodeinteres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($puntodeinteres);
            $em->flush($puntodeinteres);
        }

        return $this->redirectToRoute('puntodeinteres_index');
    }

    /**
     * Creates a form to delete a puntodeinteres entity.
     *
     * @param puntodeinteres $puntodeinteres The puntodeinteres entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(puntodeinteres $puntodeinteres)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('puntodeinteres_delete', array('id' => $puntodeinteres->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

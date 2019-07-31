<?php

namespace SPORT\SanteBundle\Controller;

use SPORT\SanteBundle\Entity\Creneau;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Creneau controller.
 *
 */
class CreneauadminController extends Controller
{
    /**
     * Lists all creneau entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $creneaus = $em->getRepository('SPORTSanteBundle:Creneau')->findAll();
        
        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $creneaus , /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 5/* limit per page */
        );

        return $this->render('SPORTSanteBundle:creneauadmin:index.html.twig', array(
            'creneaus' => $pagination,
        ));
    }

    /**
     * Creates a new creneau entity.
     *
     */
    public function newAction(Request $request)
    {
        $creneau = new Creneau();
        $form = $this->createForm('SPORT\SanteBundle\Form\CreneauType', $creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creneau);
            $em->flush();
             $session = $request->getSession();
      
            $session->getFlashBag()->add('notification', "le créneau  ".$creneau->getNomActiviteCreneau()." a été créé avec succès");


            return $this->redirectToRoute('admincreneau_show', array('id' => $creneau->getId()));
        }

        return $this->render('SPORTSanteBundle:creneauadmin:new.html.twig', array(
            'creneau' => $creneau,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a creneau entity.
     *
     */
    public function showAction(Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);

        return $this->render('SPORTSanteBundle:creneauadmin:show.html.twig', array(
            'creneau' => $creneau,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing creneau entity.
     *
     */
    public function editAction(Request $request, Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);
        $editForm = $this->createForm('SPORT\SanteBundle\Form\CreneauType', $creneau);
        $editForm->handleRequest($request);
        
                $session = $request->getSession();
      
            

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
                $session->getFlashBag()->add('notification', "le créneau  ".$creneau->getNomActiviteCreneau()." a été modifié avec succès");

            return $this->redirectToRoute('admincreneau_edit', array('id' => $creneau->getId()));
        }

        return $this->render('SPORTSanteBundle:creneauadmin:edit.html.twig', array(
            'creneau' => $creneau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a creneau entity.
     *
     */
    public function deleteAction(Request $request, Creneau $creneau)
    {
        $form = $this->createDeleteForm($creneau);
        $form->handleRequest($request);
         $session = $request->getSession();
      
            

        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creneau);
            $em->flush();
            $session->getFlashBag()->add('notification', "le créneau  ".$creneau->getNomActiviteCreneau()." a été supprimé avec succès");
        }

        return $this->redirectToRoute('admincreneau_index');
    }

    /**
     * Creates a form to delete a creneau entity.
     *
     * @param Creneau $creneau The creneau entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Creneau $creneau)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admincreneau_delete', array('id' => $creneau->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace SPORT\SanteBundle\Controller;

use SPORT\SanteBundle\Entity\Seance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Seance controller.
 *
 */
class SeanceadminController extends Controller {

    /**
     * Lists all seance entities.
     *
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $seances = $em->getRepository('SPORTSanteBundle:Seance')->findAll();
        
        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $seances , /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 5/* limit per page */
        );

        return $this->render('SPORTSanteBundle:Seanceadmin:index.html.twig', array(
                    'seances' => $pagination,
        ));
    }

    /**
     * Creates a new seance entity.
     *
     */
    public function newAction(Request $request) {
        $seance = new Seance();
        $form = $this->createForm('SPORT\SanteBundle\Form\SeanceType', $seance);
        $form->handleRequest($request);
        $session = $request->getSession();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seance);
            $em->flush();
             $date = $seance->getDateSeance()->format('d/m/Y');
         $session->getFlashBag()->add('notification', "La séance ".$seance->getJourSeance()." ".$date." a été créée avec succès");
    
            return $this->redirectToRoute('adminseance_show', array('id' => $seance->getId()));
        }

        return $this->render('SPORTSanteBundle:Seanceadmin:new.html.twig', array(
                    'seance' => $seance,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seance entity.
     *
     */
    public function showAction(Seance $seance) {
        $deleteForm = $this->createDeleteForm($seance);

        return $this->render('SPORTSanteBundle:Seanceadmin:show.html.twig', array(
                    'seance' => $seance,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seance entity.
     *
     */
    public function editAction(Request $request, Seance $seance) {
        $deleteForm = $this->createDeleteForm($seance);
        $editForm = $this->createForm('SPORT\SanteBundle\Form\SeanceType', $seance);
        $editForm->handleRequest($request);
        $session = $request->getSession();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            $date = $seance->getDateSeance()->format('d/m/Y');
         $session->getFlashBag()->add('notification', "La séance ".$seance->getJourSeance()." ".$date." a été modifiée avec succès");
    

            return $this->redirectToRoute('adminseance_edit', array('id' => $seance->getId()));
        }

        return $this->render('SPORTSanteBundle:Seanceadmin:edit.html.twig', array(
                    'seance' => $seance,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seance entity.
     *
     */
    public function deleteAction(Request $request, Seance $seance) {
        $form = $this->createDeleteForm($seance);
        $form->handleRequest($request);

        $session = $request->getSession();
        if (count($seance->getCreneaux()) > 0 ) {
            $session->getFlashBag()->add('notification', 'On ne peut supprimer une séance qui est déjà connectée à  des créneaux');

            return $this->redirect($this->generateUrl('adminseance_index'));
        }else{
            $date = $seance->getDateSeance()->format('d/m/Y');
         $session->getFlashBag()->add('notification', "La séance ".$seance->getJourSeance()." ".$date." a été supprimée avec succès");
    
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seance);
            $em->flush();
        }

        return $this->redirectToRoute('adminseance_index');
    }

    /**
     * Creates a form to delete a seance entity.
     *
     * @param Seance $seance The seance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Seance $seance) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('adminseance_delete', array('id' => $seance->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}

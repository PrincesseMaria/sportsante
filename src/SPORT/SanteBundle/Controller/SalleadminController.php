<?php

namespace SPORT\SanteBundle\Controller;

use SPORT\SanteBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Salle controller.
 *
 */
class SalleadminController extends Controller {

    /**
     * Lists all salle entities.
     *
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $salles = $em->getRepository('SPORTSanteBundle:Salle')->findAll();
        
        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $salles, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 5/* limit per page */
        );


        return $this->render('SPORTSanteBundle:Salleadmin:index.html.twig', array(
                    'salles' => $pagination,
        ));
    }

    /**
     * Creates a new salle entity.
     *
     */
    public function newAction(Request $request) {
        $salle = new Salle();
        $form = $this->createForm('SPORT\SanteBundle\Form\SalleType', $salle);
        $form->handleRequest($request);
               $session = $request->getSession();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();
            $session->getFlashBag()->add('notification', "La salle" . $salle->getNomSalle() . "a été créée avec succès");

            return $this->redirectToRoute('adminsalle_show', array('id' => $salle->getId()));
        }

        return $this->render('SPORTSanteBundle:Salleadmin:new.html.twig', array(
                    'salle' => $salle,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a salle entity.
     *
     */
    public function showAction(Salle $salle) {
        $deleteForm = $this->createDeleteForm($salle);

        return $this->render('SPORTSanteBundle:Salleadmin:show.html.twig', array(
                    'salle' => $salle,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salle entity.
     *
     */
    public function editAction(Request $request, Salle $salle) {
        $deleteForm = $this->createDeleteForm($salle);
        $editForm = $this->createForm('SPORT\SanteBundle\Form\SalleType', $salle);
        $editForm->handleRequest($request);
        $session = $request->getSession();
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $session->getFlashBag()->add('notification', "La salle " . $salle->getNomSalle() . " a été modifiée avec succès");

            return $this->redirectToRoute('adminsalle_edit', array('id' => $salle->getId()));
        }

        return $this->render('SPORTSanteBundle:Salleadmin:edit.html.twig', array(
                    'salle' => $salle,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a salle entity.
     *
     */
    public function deleteAction(Request $request, Salle $salle) {
        $form = $this->createDeleteForm($salle);
        $form->handleRequest($request);

      

        if ($form->isSubmitted() && $form->isValid()) {
           
              $session = $request->getSession();
        if (count($salle->getSeances()) > 0) {
            $session->getFlashBag()->add('notification', 'On ne peut pas supprimer une salle qui est déjà connectée à une séance');

            return $this->redirect($this->generateUrl('adminsalle_index'));
        } else {
            $session->getFlashBag()->add('notification', "La salle" . $salle->getNomSalle() . "  a été supprimée avec succès");
    
        }
        
         $em = $this->getDoctrine()->getManager();
            $em->remove($salle);
            $em->flush();
        }

        return $this->redirectToRoute('adminsalle_index');
    }

    /**
     * Creates a form to delete a salle entity.
     *
     * @param Salle $salle The salle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Salle $salle) {



        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('adminsalle_delete', array('id' => $salle->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}

<?php

namespace SPORT\LocationBundle\Controller;

use SPORT\LocationBundle\Entity\Materiel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Materiel controller.
 *
 */
class MaterieladminController extends Controller {

    /**
     * Lists all materiel entities.
     *
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $materiels1 = $em->getRepository('SPORTLocationBundle:Materiel')->findAll();
        
          $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $materiels1 , /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 6/* limit per page */
        );


        return $this->render('SPORTLocationBundle:materieladmin:index.html.twig', array(
                    'materiels' => $pagination,
        ));
    }

    /**
     * Creates a new materiel entity.
     *
     */
    public function newAction(Request $request) {
        $materiel = new Materiel();
        $form = $this->createForm('SPORT\LocationBundle\Form\MaterielType', $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();


            $em->persist($materiel);
            $em->flush();
            
             $session = $request->getSession();
      
            $session->getFlashBag()->add('notification', "le matériel  ".$materiel->getMaterielNom()." a été créée avec succès");


            return $this->redirectToRoute('materieladmin_show', array('id' => $materiel->getId()));
        }

        return $this->render('SPORTLocationBundle:materieladmin:new.html.twig', array(
                    'materiel' => $materiel,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a materiel entity.
     *
     */
    public function showAction(Materiel $materiel) {
        $deleteForm = $this->createDeleteForm($materiel);

        return $this->render('SPORTLocationBundle:materieladmin:show.html.twig', array(
                    'materiel' => $materiel,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing materiel entity.
     *
     */
    public function editAction(Request $request, Materiel $materiel) {
        $deleteForm = $this->createDeleteForm($materiel);
        $editForm = $this->createForm('SPORT\LocationBundle\Form\MaterielType', $materiel);
        $editForm->handleRequest($request);
        
           $session = $request->getSession();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
             $session->getFlashBag()->add('notification', "le matériel  ".$materiel->getMaterielNom()." a été modifié avec succès");


            return $this->redirectToRoute('materieladmin_edit', array('id' => $materiel->getId()));
        }

        return $this->render('SPORTLocationBundle:materieladmin:edit.html.twig', array(
                    'materiel' => $materiel,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a materiel entity.
     *
     */
    public function deleteAction(Request $request, Materiel $materiel) {
        $form = $this->createDeleteForm($materiel);
        $form->handleRequest($request);
        
        $session = $request->getSession();

        if ($form->isSubmitted() && $form->isValid()) {
            
                
           
            $session->getFlashBag()->add('notification',  "le matériel  ".$materiel->getMaterielNom()." a été supprimé avec succès");
      
        
            
            
            $em = $this->getDoctrine()->getManager();
            $em->remove($materiel);
            $em->flush();
        }

        return $this->redirectToRoute('materieladmin_index');
    }

    /**
     * Creates a form to delete a materiel entity.
     *
     * @param Materiel $materiel The materiel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Materiel $materiel) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('materieladmin_delete', array('id' => $materiel->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}

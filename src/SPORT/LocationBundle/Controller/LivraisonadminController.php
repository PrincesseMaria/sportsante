<?php

namespace SPORT\LocationBundle\Controller;

use SPORT\LocationBundle\Entity\Livraison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Livraison controller.
 *
 */
class LivraisonadminController extends Controller
{
    /**
     * Lists all livraison entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $livraisons = $em->getRepository('SPORTLocationBundle:Livraison')->findAll();
        
         $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $livraisons, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 8/* limit per page */
        );

        return $this->render('SPORTLocationBundle:Livraisonadmin:index.html.twig', array(
            'livraisons' => $pagination,
        ));
    }

    /**
     * Creates a new livraison entity.
     *
     */
    public function newAction(Request $request,$id)
    {
        $livraison = new Livraison();
        $form = $this->createForm('SPORT\LocationBundle\Form\LivraisonType', $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $commande = $em->getRepository('SPORTLocationBundle:Commande')->find($id);
            $livraison->setCommande($commande);
            $em->persist($livraison);
            $em->flush();
             $session = $request->getSession();
      
            $session->getFlashBag()->add('notification', "la livraison   a été créée avec succès");

            return $this->redirectToRoute('adminlivraison_show', array('id' => $livraison->getId()));
        }

        return $this->render('SPORTLocationBundle:Livraisonadmin:new.html.twig', array(
            'livraison' => $livraison,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a livraison entity.
     *
     */
    public function showAction(Livraison $livraison)
    {
        $deleteForm = $this->createDeleteForm($livraison);

        return $this->render('SPORTLocationBundle:Livraisonadmin:show.html.twig', array(
            'livraison' => $livraison,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing livraison entity.
     *
     */
    public function editAction(Request $request, Livraison $livraison)
    {
        $deleteForm = $this->createDeleteForm($livraison);
        $editForm = $this->createForm('SPORT\LocationBundle\Form\LivraisonType', $livraison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
             $session = $request->getSession();
      
            $session->getFlashBag()->add('notification', "la livraison   a été modifiée avec succès");
            return $this->redirectToRoute('adminlivraison_edit', array('id' => $livraison->getId()));
        }

        return $this->render('SPORTLocationBundle:Livraisonadmin:edit.html.twig', array(
            'livraison' => $livraison,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a livraison entity.
     *
     */
    public function deleteAction(Request $request, Livraison $livraison)
    {
        $form = $this->createDeleteForm($livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livraison);
            $em->flush();
            
             $session = $request->getSession();
      
            $session->getFlashBag()->add('notification', "la livraison   a été supprimée avec succès");
        }

        return $this->redirectToRoute('adminlivraison_index');
    }

    /**
     * Creates a form to delete a livraison entity.
     *
     * @param Livraison $livraison The livraison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livraison $livraison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminlivraison_delete', array('id' => $livraison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

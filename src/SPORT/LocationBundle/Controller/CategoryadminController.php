<?php

namespace SPORT\LocationBundle\Controller;

use SPORT\LocationBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Category controller.
 *
 */
class CategoryadminController extends Controller
{
    /**
     * Lists all category entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('SPORTLocationBundle:Category')->findAll();
        
           $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $categories , /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 3/* limit per page */
        );


        return $this->render('SPORTLocationBundle:Categoryadmin:index.html.twig', array(
            'categories' => $pagination,
        ));
    }

    /**
     * Creates a new category entity.
     *
     */
    public function newAction(Request $request)
    {
        $category = new Category();
        $form = $this->createForm('SPORT\LocationBundle\Form\CategoryType', $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            
            $session = $request->getSession();
      
            $session->getFlashBag()->add('notification', "la catégotie  ".$category->getCategoryNom()." a été créée avec succès");


            return $this->redirectToRoute('categoryadmin_show', array('id' => $category->getId()));
        }

        return $this->render('SPORTLocationBundle:Categoryadmin:new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a category entity.
     *
     */
    public function showAction(Category $category)
    {
        $deleteForm = $this->createDeleteForm($category);
        
        return $this->render('SPORTLocationBundle:Categoryadmin:show.html.twig', array(
            'category' => $category,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     */
    public function editAction(Request $request, Category $category)
    {
        $deleteForm = $this->createDeleteForm($category);
        $editForm = $this->createForm('SPORT\LocationBundle\Form\CategoryType', $category);
        $editForm->handleRequest($request);
        
              $session = $request->getSession();
              
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
             $session->getFlashBag()->add('notification', "la catégotie  ".$category->getCategoryNom()." a été modifié avec succès");

            return $this->redirectToRoute('categoryadmin_edit', array('id' => $category->getId()));
        }

        return $this->render('SPORTLocationBundle:Categoryadmin:edit.html.twig', array(
            'category' => $category,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a category entity.
     *
     */
    public function deleteAction(Request $request, Category $category)
    {
        $form = $this->createDeleteForm($category);
        $form->handleRequest($request);
          $session = $request->getSession();
        if ($form->isSubmitted() && $form->isValid()) {
          
            
            if (count($category->getMateriaux()) >=1) {
            $session->getFlashBag()->add('notification', 'On ne peut pas supprimer une catégotie qui est déjà connectée à des matériaux');

            return $this->redirect($this->generateUrl('categoryadmin_index'));
        } else {
            $session->getFlashBag()->add('notification', "la catégotie  ".$category->getCategoryNom()." a été supprimé avec succès");
      
        }
        
          $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
             }

        return $this->redirectToRoute('categoryadmin_index');
    }

    /**
     * Creates a form to delete a category entity.
     *
     * @param Category $category The category entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Category $category)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoryadmin_delete', array('id' => $category->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

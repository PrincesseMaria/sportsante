<?php

namespace SPORT\UserBundle\Controller;

use SPORT\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 */
class UserController extends Controller {

    /**
     * Lists all user entities.
     *
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('SPORTUserBundle:User')->findAll();

        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $users, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 5/* limit per page */
        );

        return $this->render('SPORTUserBundle:user:index.html.twig', array(
                    'users' => $pagination,
        ));
    }

    public function dashboardAction(Request $request) {


        return $this->render('SPORTUserBundle:user:dashboard.html.twig');
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction(Request $request) {
        $user = new User();
        $form = $this->createForm('SPORT\UserBundle\Form\UserType', $user);
        $form->handleRequest($request);
        $userManager = $this->get('fos_user.user_manager');
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();


            $em = $this->getDoctrine()->getManager();

            $userunique = $userManager->findUserByUsernameOrEmail($user->getEmail());
            $username = $userManager->findUserByUsername($user->getUsername());

            if ($userunique != null && $username != null) {

                $session = $request->getSession();

                $session->getFlashBag()->add('error', "Votre adresse email ou nom d'utilisateur est déjà utilisé");

                return $this->render('SPORTUserBundle:user:new.html.twig', array(
                            'user' => $user,
                            'form' => $form->createView(),
                ));
            }

            $userManager->updateUser($user);
            $session->getFlashBag()->add('notification', "L'utilisateur " . $user->getNom() . "a été créé");
            return $this->redirectToRoute('adminuser_show', array('id' => $user->getId()));
        }

        return $this->render('SPORTUserBundle:user:new.html.twig', array(
                    'user' => $user,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user) {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('SPORTUserBundle:user:show.html.twig', array(
                    'user' => $user,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction(Request $request, User $user) {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('SPORT\UserBundle\Form\UserType', $user);
        $editForm->handleRequest($request);
        $session = $request->getSession();
        if ($editForm->isSubmitted() && $editForm->isValid()) {



            $this->getDoctrine()->getManager()->flush();
            $session->getFlashBag()->add('notification', "L'utilisateur " . $user->getNom() . "a été modifié");


            return $this->redirectToRoute('adminuser_edit', array('id' => $user->getId()));
        }

        return $this->render('SPORTUserBundle:user:edit.html.twig', array(
                    'user' => $user,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(Request $request, User $user) {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('notification', "L'utilisateur " . $user->getNom() . "a été suprimé avec succès");
        }

        return $this->redirectToRoute('adminuser_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('adminuser_delete', array('id' => $user->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}

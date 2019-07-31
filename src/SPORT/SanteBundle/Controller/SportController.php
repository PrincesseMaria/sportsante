<?php

namespace SPORT\SanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SPORT\SanteBundle\Entity\Seance;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use SPORT\SanteBundle\Form\AbonnementType;

class SportController extends Controller {

    public function indexAction() {


        $content = $this->get('templating')->render('SPORTSanteBundle:Sport:index.html.twig');

        return new Response($content);
    }

    public function seanceAction(Request $request) {

        // Pour récupérer 
        $listSeances = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTSanteBundle:Seance')
                ->findSeanceAllBydate()
        ;
        
         $salle = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTSanteBundle:Salle')
                ->findAll()
        ;
        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $listSeances, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 6/* limit per page */
        );

        // parameters to template
        return $this->render('SPORTSanteBundle:Sport:seance.html.twig', array('pagination' => $pagination,'salle'=>$salle));
    }

    public function coursAction(Request $request) {

        $id = $request->get('id');
        // Pour récupérer 
        $seance = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTSanteBundle:Creneau')
                ->findByCoursByseance($id)
        ;
        
        $salle = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTSanteBundle:Salle')
                ->findAll()
        ;

        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $seance, $request->query->getInt('page', 1), 6
        );



        // parameters to template
        return $this->render('SPORTSanteBundle:Sport:cours.html.twig', array('cours' => $pagination,'salle'=>$salle));
    }

    public function reservationAction(Request $request, $id) {


        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $user = $this->getUser();
        if (!is_object($user)) {
            $session->getFlashBag()->add('notification', 'Vous devez vous identifier');

            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $user1 = $em->getRepository('SPORTUserBundle:User')->find($user->getId());
        if (count($user1->getAbonnements()) >= 1) {
            // $this->modifierAbonnement($user1->getId());

            $abonnement = $em->getRepository('SPORTSanteBundle:Abonnement')->findAbonnementByUser($user->getId());
            $date = new \DateTime();
            if (isset($abonnement)) {

                if ($abonnement->getDatefin() >= $date && $abonnement->getNombreseance() > 0)
                    $cre = $em->getRepository('SPORTSanteBundle:Creneau')->find($id);

                $userArray = $cre->getUsers();
                if (in_array($user1, $userArray->toArray())) {
                  
                        $session->getFlashBag()->add('notification', 'Vous avez déjà  réserver pour ' . $cre->getNomActiviteCreneau());
                        return $this->redirect($this->generateUrl('sport_sante_seancepage'));
                    
                }
                $cre->addUser($user1);
                $em->persist($cre);
                $em->flush();
                $session->getFlashBag()->add('notification', 'Votre réservation pour ' . $cre->getNomActiviteCreneau() . ' a été prise en compte');
                return $this->redirect($this->generateUrl('sport_sante_seancepage'));
            } else {
                $session->getFlashBag()->add('notification', 'Vous devez prendre un abonnement !!!');
                return $this->redirectToRoute('sport_sante_abonnement');
            }
        } else {
            $session->getFlashBag()->add('notification', 'Vous devez prendre un abonnement !!!');
            return $this->redirectToRoute('sport_sante_abonnement');
        }
    }

    public function abonnementAction(Request $request) {


        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();

        $user = $this->getUser();
        if (!is_object($user)) {
            $session->getFlashBag()->add('notification', 'Vous devez vous identifier');

            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }



        $abonnement = new \SPORT\SanteBundle\Entity\Abonnement();
        $form = $this->createForm('SPORT\SanteBundle\Form\AbonnementType', $abonnement);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $user1 = $em->getRepository('SPORTUserBundle:User')->find($user->getId());
            if (count($user1->getAbonnements()) >= 1) {
                // $this->modifierAbonnement($user1->getId());

                $abonnement = $em->getRepository('SPORTSanteBundle:Abonnement')->findAbonnementByUser($user->getId());
                $date = new \DateTime();
                if (isset($abonnement)) {

                    if ($abonnement->getDatefin() >= $date)
                        return $this->redirectToRoute('sport_sante_modification', array('id' => $abonnement->getId()));
                }
            }

            $abonnement->setUser($user1);
            $prix = $abonnement->getNombreseance() * 2.5;
            $abonnement->setPrixseance($prix);
            $em->persist($abonnement);
            $em->flush();
            $session = $request->getSession();

            $session->getFlashBag()->add('notification', "Votre abonnement a été pris en compte, valable jusqu'au " . $abonnement->getDatefin()->format('d-m-Y'));


            return $this->render('SPORTSanteBundle:Sport:confirmation.html.twig', array('abonnement' => $abonnement));
        }



        return $this->render('SPORTSanteBundle:Sport:abonnement.html.twig', array('form' => $form->createView()));
    }

    public function modificationAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $abonnement = $em->getRepository('SPORTSanteBundle:Abonnement')->find($id);

        $editForm = $this->createForm('SPORT\SanteBundle\Form\AbonnementType', $abonnement);
        $editForm->handleRequest($request);

        $session = $request->getSession();



        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $session->getFlashBag()->add('notification', "La modification de votre abonnement a été pris en compte, valable jusqu'au " . $abonnement->getDatefin()->format('d-m-Y'));
            return $this->render('SPORTSanteBundle:Sport:confirmation.html.twig', array('abonnement' => $abonnement));
        }

        return $this->render('SPORTSanteBundle:Sport:modification.html.twig', array(
                    'abonnement' => $abonnement,
                    'form' => $editForm->createView()
        ));
    }

}

?>
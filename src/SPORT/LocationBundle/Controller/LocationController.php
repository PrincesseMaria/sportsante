<?php

namespace SPORT\LocationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use SPORT\LocationBundle\Entity\AdresseUser;
use SPORT\LocationBundle\Entity\Commande;
use SPORT\LocationBundle\Entity\CommandeMateriel;
use SPORT\LocationBundle\Form\AdresseUserType;
use SPORT\UserBundle\Repository\UserRepository;

class LocationController extends Controller {

    public function locationAction(Request $request) {

        $session = $request->getSession();

        if (!$session->has("panier"))
            $session->set("panier", array());

        $panier = $session->get("panier");

        // Pour récupérer 
        $listCategory = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Category')
                ->findAll()
        ;

        // Pour récupérer 
        $listMateriel = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Materiel')
                ->findAll()
        ;


        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $listMateriel, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 6/* limit per page */
        );


        return $this->render('SPORTLocationBundle:Location:location.html.twig', array('category' => $listCategory, 'materiel' => $pagination, 'panier' => $panier));
    }

    /**
     * @Method({"GET"})
     */
    public function materielAction(Request $request, $id) {

        $session = $request->getSession();

        if (!$session->has("panier"))
            $session->set("panier", array());

        $panier = $session->get("panier");

        //$item = $request->get('id');
        // Pour récupérer 
        $listCategory = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Category')
                ->findAll()
        ;

        // Pour récupérer 
        $listMateriel = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Materiel')
                ->findMaterielById($id);
        ;


        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $listMateriel, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 6/* limit per page */
        );


        return $this->render('SPORTLocationBundle:Location:materiel.html.twig', array('category' => $listCategory, 'materiel' => $pagination, 'panier' => $panier));
    }

    function informationAction(Request $request, $id) {

        //$item = $request->get('id');
        // Pour récupérer 
        $listCategory = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Category')
                ->findAll()
        ;



        // Pour récupérer 
        $materiel = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Materiel')
                ->find($id)
        ;

        return $this->render('SPORTLocationBundle:Location:information.html.twig', array('category' => $listCategory, 'materiel' => $materiel));
    }

    function ajouterAction(Request $request, $id) {

        $session = $request->getSession();

        if (!$session->has("panier"))
            $session->set("panier", array());

        $panier = $session->get("panier");
        if (array_key_exists($id, $panier)) {
            if ($request->query->get('qte') != null)
                $panier[$id] = $request->query->get('qte');
        }else {
            if ($request->query->get('qte') != null)
                $panier[$id] = $request->query->get('qte');
            else
                $panier[$id] = 1;
        }

        $session->set("panier", $panier);

        return $this->redirect($this->generateUrl('sport_location_panier'));
    }

    function panierAction(Request $request) {

        $listCategory = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Category')
                ->findAll()
        ;

        $session = $request->getSession();

        if (!$session->has("panier"))
            $session->set("panier", array());

        $panier = $session->get("panier");

        $listmateriel = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Materiel')
                ->findArray(array_keys($panier))
        ;

        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $listmateriel, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 5/* limit per page */
        );



        return $this->render('SPORTLocationBundle:Location:panier.html.twig', array('category' => $listCategory, 'materiel' => $pagination, 'panier' => $panier));
    }

    function supprimerAction(Request $request, $id) {
        $session = $request->getSession();


        $panier = $session->get("panier");

        if (array_key_exists($id, $panier)) {
            unset($panier[$id]);
            $session->set("panier", $panier);
        }



        return $this->redirect($this->generateUrl('sport_location_panier'));
    }

    public function livraisonAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $userAdresse = new AdresseUser();
        $form = $this->createForm(AdresseUserType::class, $userAdresse);
        $user = $this->getUser();
        $user1 = $em->getRepository('SPORTUserBundle:User')->find($user->getId());


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userAdresse->setUtilisateur($user1);
            $em->persist($userAdresse);
            $em->flush();

            return $this->redirect($this->generateUrl('sport_location_livraison'));
        }


        return $this->render('SPORTLocationBundle:Location:livraison.html.twig', array('user' => $user1, 'form' => $form->createView(), 'user' => $user1));
    }

    function livraisonsupAction($id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SPORTLocationBundle:AdresseUser')->find($id);
        $user = $this->getUser();

        if ($user != $entity->getUtilisateur() || !$entity)
            return $this->redirect($this->generateUrl('sport_location_livraison'));

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('sport_location_livraison'));
    }

    public function setLivraisonOnSession(Request $request) {
        $session = $request->getSession();

        if (!$session->has('adresse'))
            $session->set('adresse', array());
        $adresse = $session->get('adresse');

        if ($request->get('livraison') != null && $request->get('facturation') != null) {
            $adresse['livraison'] = $request->get('livraison');
            $adresse['facturation'] = $request->get('facturation');
        } else {
            return $this->redirect($this->generateUrl('sport_location_validation'));
        }

        $session->set('adresse', $adresse);
        return $this->redirect($this->generateUrl('sport_location_validation'));
    }

    function validationAction(Request $request) {



        if ($request->isMethod('POST'))
            $this->setLivraisonOnSession($request);


        $session = $request->getSession();


        $panier = $session->get("panier");
        $adresse = $session->get("adresse");
        $fat = intval($adresse['facturation']);
        $liv = intval($adresse['livraison']);


        $listmateriel = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Materiel')
                ->findArray(array_keys($panier))
        ;

        $facturation = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:AdresseUser')
                ->find($fat)
        ;
        $livraison = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:AdresseUser')
                ->find($liv)
        ;

        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $listmateriel, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 10/* limit per page */
        );



        return $this->render('SPORTLocationBundle:Location:validation.html.twig', array('materiel' => $pagination, 'panier' => $panier, 'facturation' => $facturation, 'livraison' => $livraison));
    }

    function facturationAction(Request $request) {

        $session = $request->getSession();




        $panier = $session->get("panier");
        $adresse = $session->get("adresse");
        $fat = intval($adresse['facturation']);
        $liv = intval($adresse['livraison']);


        $listmateriel = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:Materiel')
                ->findArray(array_keys($panier))
        ;
        //var_dump($panier);

        $facturation = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:AdresseUser')
                ->find($fat)
        ;
        $livraison = $this->getDoctrine()
                ->getManager()
                ->getRepository('SPORTLocationBundle:AdresseUser')
                ->find($liv)
        ;

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $user1 = $em->getRepository('SPORTUserBundle:User')->find($user->getId());
        $commande = new Commande();
        $commande->setUser($user1);
        $commande->setCommandeIntitule(uniqid()."".$commande->getCommandeDate()->format('d-m-Y'));

        foreach ($listmateriel as $materiel) {
            $paniercommande = new CommandeMateriel();
            $paniercommande->setCommande($commande);
            $paniercommande->setMateriel($materiel);
            $paniercommande->setQuantiteCommande($panier[$materiel->getId()]);
            $em->persist($paniercommande);
        }
        $em->persist($commande);

        // On déclenche l'enregistrement
        $em->flush();
        $session->getFlashBag()->add('notification', 'Votre commande a été prise en compte');
        $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                $listmateriel, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 10/* limit per page */
        );



        return $this->render('SPORTLocationBundle:Location:facturation.html.twig', array('materiel' => $pagination, 'panier' => $panier, 'facturation' => $facturation, 'livraison' => $livraison));
    }

}

?>
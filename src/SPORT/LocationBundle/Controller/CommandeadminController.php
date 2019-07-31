<?php

namespace SPORT\LocationBundle\Controller;

use SPORT\LocationBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commande controller.
 *
 */
class CommandeadminController extends Controller
{
    /**
     * Lists all commande entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('SPORTLocationBundle:Commande')->findAll();
        
          $paginator = $this->get('knp_paginator');


        $pagination = $paginator->paginate(
                 $commandes  , /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 6/* limit per page */
        );

        return $this->render('SPORTLocationBundle:Commandeadmin:index.html.twig', array(
            'commandes' => $pagination,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     */
   

    /**
     * Finds and displays a commande entity.
     *
     */
    public function showAction(Request $request,Commande $commande)
    {
        $em = $this->getDoctrine()->getManager();

        $materiels = $em->getRepository('SPORTLocationBundle:CommandeMateriel')->findCommandeMaterielById($commande->getId());
        
          $paginator = $this->get('knp_paginator');
          

        $pagination = $paginator->paginate(
                 $materiels, /* query NOT result */ $request->query->getInt('page', 1)/* page number */, 6/* limit per page */
        );

        return $this->render('SPORTLocationBundle:Commandeadmin:show.html.twig', array(
            'materiels' =>  $pagination,
        ));
    }

    

}

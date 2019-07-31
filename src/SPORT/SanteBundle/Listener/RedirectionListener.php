<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SPORT\SanteBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener {

    public function __construct(ContainerInterface $container) {
       
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.token_storage');
        
        
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $route = $event->getRequest()->attributes->get('_route');
       
        if ($route == 'sport_sante_reservationpage') {
           

            if (!is_object($this->securityContext->getToken()->getUser())) {
                $this->session->getFlashBag()->add('notification', 'Vous devez vous identifier');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }

}
?>
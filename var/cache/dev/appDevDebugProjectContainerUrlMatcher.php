<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ($pathinfo === '/_profiler/open') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/sportsante')) {
            // sport_location_homepage
            if ($pathinfo === '/sportsante/location') {
                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::locationAction',  '_route' => 'sport_location_homepage',);
            }

            // sport_location_materielpage
            if (0 === strpos($pathinfo, '/sportsante/materiel') && preg_match('#^/sportsante/materiel/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_location_materielpage')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::materielAction',));
            }

            // sport_location_ajouterpage
            if (0 === strpos($pathinfo, '/sportsante/ajouter_materiel') && preg_match('#^/sportsante/ajouter_materiel/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_location_ajouterpage')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::ajouterAction',));
            }

            // sport_location_infopage
            if (0 === strpos($pathinfo, '/sportsante/info_materiel') && preg_match('#^/sportsante/info_materiel/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_location_infopage')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::informationAction',));
            }

            // sport_location_panier
            if ($pathinfo === '/sportsante/panier') {
                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::panierAction',  '_route' => 'sport_location_panier',);
            }

            // sport_location_supprimer
            if (0 === strpos($pathinfo, '/sportsante/supprimer') && preg_match('#^/sportsante/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_location_supprimer')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::supprimerAction',));
            }

            if (0 === strpos($pathinfo, '/sportsante/livraison')) {
                // sport_location_livraison
                if ($pathinfo === '/sportsante/livraison') {
                    return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::livraisonAction',  '_route' => 'sport_location_livraison',);
                }

                // sport_location_livraisonsupression
                if (preg_match('#^/sportsante/livraison/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_location_livraisonsupression')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::livraisonsupAction',));
                }

            }

            // sport_location_validation
            if ($pathinfo === '/sportsante/validation') {
                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::validationAction',  '_route' => 'sport_location_validation',);
            }

            // sport_location_facturation
            if ($pathinfo === '/sportsante/facture') {
                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LocationController::facturationAction',  '_route' => 'sport_location_facturation',);
            }

            // sport_sante_homepage
            if ($pathinfo === '/sportsante/homepage') {
                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::indexAction',  '_route' => 'sport_sante_homepage',);
            }

            // sport_sante_seancepage
            if ($pathinfo === '/sportsante/seance') {
                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::seanceAction',  '_route' => 'sport_sante_seancepage',);
            }

            // sport_sante_courspage
            if (0 === strpos($pathinfo, '/sportsante/cours') && preg_match('#^/sportsante/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_sante_courspage')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::coursAction',));
            }

            // sport_sante_reservationpage
            if (0 === strpos($pathinfo, '/sportsante/reservation') && preg_match('#^/sportsante/reservation/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_sante_reservationpage')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::reservationAction',));
            }

            // sport_sante_abonnement
            if ($pathinfo === '/sportsante/abonnement') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_sport_sante_abonnement;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::abonnementAction',  '_route' => 'sport_sante_abonnement',);
            }
            not_sport_sante_abonnement:

            // sport_sante_confirmation
            if ($pathinfo === '/sportsante/confirmation') {
                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::confirmationAction',  '_route' => 'sport_sante_confirmation',);
            }

            // sport_sante_modification
            if (0 === strpos($pathinfo, '/sportsante/modification') && preg_match('#^/sportsante/modification/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sport_sante_modification')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SportController::modificationAction',));
            }

            if (0 === strpos($pathinfo, '/sportsante/log')) {
                if (0 === strpos($pathinfo, '/sportsante/login')) {
                    // fos_user_security_login
                    if ($pathinfo === '/sportsante/login') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_security_login;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                    }
                    not_fos_user_security_login:

                    // fos_user_security_check
                    if ($pathinfo === '/sportsante/login_check') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_security_check;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                    }
                    not_fos_user_security_check:

                }

                // fos_user_security_logout
                if ($pathinfo === '/sportsante/logout') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_security_logout;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }
                not_fos_user_security_logout:

            }

            if (0 === strpos($pathinfo, '/sportsante/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/sportsante/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/sportsante/profile/edit') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_profile_edit;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }
                not_fos_user_profile_edit:

            }

            if (0 === strpos($pathinfo, '/sportsante/re')) {
                if (0 === strpos($pathinfo, '/sportsante/register')) {
                    // fos_user_registration_register
                    if (rtrim($pathinfo, '/') === '/sportsante/register') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_registration_register;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                    }
                    not_fos_user_registration_register:

                    if (0 === strpos($pathinfo, '/sportsante/register/c')) {
                        // fos_user_registration_check_email
                        if ($pathinfo === '/sportsante/register/check-email') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_check_email;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                        }
                        not_fos_user_registration_check_email:

                        if (0 === strpos($pathinfo, '/sportsante/register/confirm')) {
                            // fos_user_registration_confirm
                            if (preg_match('#^/sportsante/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirm;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                            }
                            not_fos_user_registration_confirm:

                            // fos_user_registration_confirmed
                            if ($pathinfo === '/sportsante/register/confirmed') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_fos_user_registration_confirmed;
                                }

                                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                            }
                            not_fos_user_registration_confirmed:

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/sportsante/resetting')) {
                    // fos_user_resetting_request
                    if ($pathinfo === '/sportsante/resetting/request') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_request;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                    }
                    not_fos_user_resetting_request:

                    // fos_user_resetting_send_email
                    if ($pathinfo === '/sportsante/resetting/send-email') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_resetting_send_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                    }
                    not_fos_user_resetting_send_email:

                    // fos_user_resetting_check_email
                    if ($pathinfo === '/sportsante/resetting/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_resetting_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                    }
                    not_fos_user_resetting_check_email:

                    // fos_user_resetting_reset
                    if (0 === strpos($pathinfo, '/sportsante/resetting/reset') && preg_match('#^/sportsante/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_resetting_reset;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                    }
                    not_fos_user_resetting_reset:

                }

            }

            // fos_user_change_password
            if ($pathinfo === '/sportsante/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // adminsalle_index
            if ($pathinfo === '/admin/salle') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminsalle_index;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SalleadminController::indexAction',  '_route' => 'adminsalle_index',);
            }
            not_adminsalle_index:

            // adminsalle_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/showsalle$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminsalle_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminsalle_show')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SalleadminController::showAction',));
            }
            not_adminsalle_show:

            // adminsalle_new
            if ($pathinfo === '/admin/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminsalle_new;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SalleadminController::newAction',  '_route' => 'adminsalle_new',);
            }
            not_adminsalle_new:

            // adminsalle_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/editsalle$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminsalle_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminsalle_edit')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SalleadminController::editAction',));
            }
            not_adminsalle_edit:

            // adminsalle_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/deletesalle$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_adminsalle_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminsalle_delete')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SalleadminController::deleteAction',));
            }
            not_adminsalle_delete:

            // adminseance_index
            if ($pathinfo === '/admin/seanceadmin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminseance_index;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SeanceadminController::indexAction',  '_route' => 'adminseance_index',);
            }
            not_adminseance_index:

            // adminseance_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/showseance$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminseance_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminseance_show')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SeanceadminController::showAction',));
            }
            not_adminseance_show:

            // adminseance_new
            if ($pathinfo === '/admin/newseance') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminseance_new;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SeanceadminController::newAction',  '_route' => 'adminseance_new',);
            }
            not_adminseance_new:

            // adminseance_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/editseance$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminseance_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminseance_edit')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SeanceadminController::editAction',));
            }
            not_adminseance_edit:

            // adminseance_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/deleteseance$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_adminseance_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminseance_delete')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\SeanceadminController::deleteAction',));
            }
            not_adminseance_delete:

            // admincreneau_index
            if ($pathinfo === '/admin/creneau') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admincreneau_index;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\CreneauadminController::indexAction',  '_route' => 'admincreneau_index',);
            }
            not_admincreneau_index:

            // admincreneau_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/showcreneau$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admincreneau_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admincreneau_show')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\CreneauadminController::showAction',));
            }
            not_admincreneau_show:

            // admincreneau_new
            if ($pathinfo === '/admin/newcreneau') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admincreneau_new;
                }

                return array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\CreneauadminController::newAction',  '_route' => 'admincreneau_new',);
            }
            not_admincreneau_new:

            // admincreneau_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/editcreneau$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_admincreneau_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admincreneau_edit')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\CreneauadminController::editAction',));
            }
            not_admincreneau_edit:

            // admincreneau_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/deletecreneau$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_admincreneau_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admincreneau_delete')), array (  '_controller' => 'SPORT\\SanteBundle\\Controller\\CreneauadminController::deleteAction',));
            }
            not_admincreneau_delete:

            // materieladmin_index
            if ($pathinfo === '/admin/adminmateriel') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_materieladmin_index;
                }

                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\MaterieladminController::indexAction',  '_route' => 'materieladmin_index',);
            }
            not_materieladmin_index:

            // materieladmin_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/showmateriel$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_materieladmin_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materieladmin_show')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\MaterieladminController::showAction',));
            }
            not_materieladmin_show:

            // materieladmin_new
            if ($pathinfo === '/admin/newmateriel') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_materieladmin_new;
                }

                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\MaterieladminController::newAction',  '_route' => 'materieladmin_new',);
            }
            not_materieladmin_new:

            // materieladmin_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/editmateriel$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_materieladmin_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materieladmin_edit')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\MaterieladminController::editAction',));
            }
            not_materieladmin_edit:

            // materieladmin_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/deletemateriel$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_materieladmin_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'materieladmin_delete')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\MaterieladminController::deleteAction',));
            }
            not_materieladmin_delete:

            // categoryadmin_index
            if ($pathinfo === '/admin/categoryadmin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_categoryadmin_index;
                }

                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CategoryadminController::indexAction',  '_route' => 'categoryadmin_index',);
            }
            not_categoryadmin_index:

            // categoryadmin_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/showcategory$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_categoryadmin_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoryadmin_show')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CategoryadminController::showAction',));
            }
            not_categoryadmin_show:

            // categoryadmin_new
            if ($pathinfo === '/admin/newcategory') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_categoryadmin_new;
                }

                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CategoryadminController::newAction',  '_route' => 'categoryadmin_new',);
            }
            not_categoryadmin_new:

            // categoryadmin_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/editcategory$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_categoryadmin_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoryadmin_edit')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CategoryadminController::editAction',));
            }
            not_categoryadmin_edit:

            // categoryadmin_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/deletecategory$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_categoryadmin_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoryadmin_delete')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CategoryadminController::deleteAction',));
            }
            not_categoryadmin_delete:

            // adminuser_index
            if ($pathinfo === '/admin/user/adminuser') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminuser_index;
                }

                return array (  '_controller' => 'SPORT\\UserBundle\\Controller\\UserController::indexAction',  '_route' => 'adminuser_index',);
            }
            not_adminuser_index:

            // adminuser_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/user/adminusershow$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminuser_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminuser_show')), array (  '_controller' => 'SPORT\\UserBundle\\Controller\\UserController::showAction',));
            }
            not_adminuser_show:

            // adminuser_new
            if ($pathinfo === '/admin/user/adminusernew') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminuser_new;
                }

                return array (  '_controller' => 'SPORT\\UserBundle\\Controller\\UserController::newAction',  '_route' => 'adminuser_new',);
            }
            not_adminuser_new:

            // adminuser_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/user/adminuseredit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminuser_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminuser_edit')), array (  '_controller' => 'SPORT\\UserBundle\\Controller\\UserController::editAction',));
            }
            not_adminuser_edit:

            // adminuser_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/user/adminuserdelete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_adminuser_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminuser_delete')), array (  '_controller' => 'SPORT\\UserBundle\\Controller\\UserController::deleteAction',));
            }
            not_adminuser_delete:

            // admin_dashboard
            if ($pathinfo === '/admin/admin') {
                return array (  '_controller' => 'SPORT\\UserBundle\\Controller\\UserController::dashboardAction',  '_route' => 'admin_dashboard',);
            }

            // admincommande_index
            if ($pathinfo === '/admin/commandeadmin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admincommande_index;
                }

                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CommandeadminController::indexAction',  '_route' => 'admincommande_index',);
            }
            not_admincommande_index:

            // admincommande_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/commandeshow$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_admincommande_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admincommande_show')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\CommandeadminController::showAction',));
            }
            not_admincommande_show:

            // adminlivraison_index
            if ($pathinfo === '/admin/livraisonadmin') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminlivraison_index;
                }

                return array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LivraisonadminController::indexAction',  '_route' => 'adminlivraison_index',);
            }
            not_adminlivraison_index:

            // adminlivraison_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/livraisonshow$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_adminlivraison_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlivraison_show')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LivraisonadminController::showAction',));
            }
            not_adminlivraison_show:

            // adminlivraison_new
            if (preg_match('#^/admin/(?P<id>[^/]++)/livraisonnew$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminlivraison_new;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlivraison_new')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LivraisonadminController::newAction',));
            }
            not_adminlivraison_new:

            // adminlivraison_edit
            if (preg_match('#^/admin/(?P<id>[^/]++)/livraisonedit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_adminlivraison_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlivraison_edit')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LivraisonadminController::editAction',));
            }
            not_adminlivraison_edit:

            // adminlivraison_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/livraisondelete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_adminlivraison_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'adminlivraison_delete')), array (  '_controller' => 'SPORT\\LocationBundle\\Controller\\LivraisonadminController::deleteAction',));
            }
            not_adminlivraison_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

<?php
/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Alexandre Prudent <alexandre.prudent@elogys.com>
 * @version    SVN: $Id$
 *
 * Based on sfGuardBasicSecurityFilter and sfBasicSecurityFilter classes
 */
class sfGuardExSecurityFilter extends sfBasicSecurityFilter {

        public function execute($filterChain) {

                // Code from sfGuardBasicSecurityFilter
                if($this->isFirstCall() and ! $this->getContext()->getUser()->isAuthenticated()) {
                        if($cookie = $this->getContext()->getRequest()->getCookie(sfConfig::get('app_sf_guard_plugin_remember_cookie_name', 'sfRemember'))) {
                                $c = new Criteria();
                                $c->add(sfGuardRememberKeyPeer::REMEMBER_KEY, $cookie);
                                $rk = sfGuardRememberKeyPeer::doSelectOne($c);
                                if($rk && $rk->getSfGuardUser()) {
                                        $this->getContext()->getUser()->signIn($rk->getSfGuardUser());
                                }
                        }
                }
                // Code from sfBasicSecurityFilter
                // get the cool stuff
                $context = $this->getContext();
                $controller = $context->getController();
                $user = $context->getUser();

                // get the current action instance
                $actionEntry = $controller->getActionStack()->getLastEntry();
                $actionInstance = $actionEntry->getActionInstance();

                // disable security on [sf_login_module] / [sf_login_action]
                if(
                        (sfConfig::get('sf_login_module') == $context->getModuleName()) && ( sfConfig::get('sf_login_action') == $context->getActionName())
                        ||
                        ( sfConfig::get('sf_secure_module') == $context->getModuleName()) && ( sfConfig::get('sf_secure_action') == $context->getActionName())
                ) {
                        $filterChain->execute();
                        return;
                }

                // for this filter, the credentials are a simple privilege array
                // where the first index is the privilege name and the second index
                // is the privilege namespace
                //
                // NOTE: the nice thing about the Action class is that getCredential()
                //       is vague enough to describe any level of security and can be
                //       used to retrieve such data and should never have to be altered
                if($user->isAuthenticated()) {
                        //IP restrictions
                        if(!$user->isIpAuthorized($_SERVER['REMOTE_ADDR'])) {
                                $controller->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
                                throw new sfStopException('Votre adresse ip n\'est pas autorisée.');
                        }

                        // the user is authenticated
                        $bAccessGranted = false;
                        if(method_exists($actionInstance, 'grantUser')) {
                                $bAccessGranted = $actionInstance->grantUser($user);
                        }
                        else {
                                $credential = $actionInstance->getCredential();
                                $bAccessGranted = (($credential === null) || $user->hasCredential($credential));
                        }

                        // if ($credential === null || $user->hasCredential($credential))
                        if($bAccessGranted) {
                                // the user has access, continue
                                $filterChain->execute();
                        }
                        else {
                                // the user doesn't have access, exit stage left
                                $controller->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));

                                throw new sfStopException();
                        }
                }
                else {
                        // the user is not authenticated
                        $controller->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));

                        throw new sfStopException();
                }
        }

}

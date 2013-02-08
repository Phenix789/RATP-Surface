<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardAuthActions.class.php 5003 2007-09-08 08:42:27Z fabien $
 */
class BasesfGuardAuthActions extends sfSurfaceActions {

	public function executeChangePassword() {
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$sf_guard_user = $this->getUser()->getGuardUser();
			$params = $this->getRequestParameter('change_password', array());
			if($sf_guard_user && $sf_guard_user->checkPassword(get('old', $params)) && get('new', $params) != null && get('new', $params) === get('confirm', $params)) {
				$sf_guard_user->setPassword(get('new', $params));
				$sf_guard_user->save();
				$this->setTemplate('passwordChanged');
			}
			else {
				$this->getRequest()->setError('error', 'Erreur de validation');
			}
		}
	}
	
        public function executeSignin() {     
                $default_app = sfConfig::get('app_surface_default_app', 'dashboard');   
                if($this->getRequest()->getMethod() != sfRequest::POST && SF_APP !== $default_app) {
                        //redirection sur l'application par default pour le signin
                        $this->redirectDefaultApp();
                        return sfView::SUCCESS;
                }
                if(sfConfig::get('app_analytic_active', false)) {
                        //analyse de connection
                        $analytic = new Analytic(true);
                }
                //Signin
                $user = $this->getUser();
                if($this->getRequest()->getMethod() == sfRequest::POST) {
                        $app = $this->getRequestParameter('sfc_application', null);                        
                        $referer = $this->getUrlForApp($app);
                        $signin_url = sfConfig::get('app_sf_guard_plugin_success_signin_url', $referer);
                        $this->redirect('' != $signin_url ? $signin_url : '@homepage');
                }
                elseif($user->isAuthenticated()) {
                        $this->redirect('@homepage');
                }
                else {
                        if(!$user->hasAttribute('referer')) {
                                $user->setAttribute('referer', $this->getRequest()->getReferer());
                        }
                        $module = sfConfig::get('sf_login_module');
                        if($this->getModuleName() != $module) {
                                $this->redirect($module . '/' . sfConfig::get('sf_login_action'));
                        }
                }
                $this->setLayout('login');
        }

        public function executeSignout() {
                $this->getUser()->signOut();
                $signout_url = sfConfig::get('app_sf_guard_plugin_success_signout_url', $this->getRequest()->getReferer());
                $this->redirect('' != $signout_url ? $signout_url : '@homepage');
        }

        public function executeSecure() {

        }

        public function executePassword() {
                throw new sfException('This method is not yet implemented.');
        }

        public function executeSudo() {
                if($this->getRequest()->getMethod() == sfRequest::POST) {
                        $admin = sfGuardUserPeer::getSudoAccount();
                        $password = $this->getRequestParameter('password');
                        $user = $this->getUser();
                        if($user->isSudoer() && $admin && $password && $admin->checkPassword($password) && $admin->getIsSuperAdmin()) {
                                $time = $user->getGuardUser()->getTimeSudoer();
                                $user->setAttribute('end_time', time() + $time * 60, 'sfc_sudo');
                                $this->setTemplate('notice');
                                $this->text = 'Vous êtes en droits étendus pour ' . $time . ' min';
                        }
                }
        }

        public function executeLostSudo() {
                $this->getUser()->setAttribute('end_time', 0, 'sfc_sudo');
                $this->setTemplate('notice');
                $this->text = 'Vous avez rétabli les droits restreints';
        }

        public function handleErrorSignin() {
                $user = $this->getUser();
                if(!$user->hasAttribute('referer')) {
                        $user->setAttribute('referer', $this->getRequest()->getReferer());
                }

                $module = sfConfig::get('sf_login_module');
                if($this->getModuleName() != $module) {
                        $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));
                }

                $this->setLayout('login');
                return sfView::SUCCESS;
        }
        
        protected function getUrlForApp($app = null) {
                $host = $this->getRequest()->getHost();
                $dev = SF_ENVIRONMENT == 'dev' ? '_dev' : '';
                $default_app = sfConfig::get('app_surface_default_app', 'dashboard');                        
                if (!isset($app)) $app = $default_app;
                
                /*if ($app == 'dashboard') {
                        return 'http://' . $host;
                }*/
                
                return 'http://' . $host . '/' . $app . $dev . '.php';
        }

        protected function redirectDefaultApp() {
                $app = sfConfig::get('app_surface_default_app', 'dashboard');                        
                $this->redirect = $this->getUrlForApp($app).'/login';
                $this->setTemplate('redirectDefaultApp');
        }

}

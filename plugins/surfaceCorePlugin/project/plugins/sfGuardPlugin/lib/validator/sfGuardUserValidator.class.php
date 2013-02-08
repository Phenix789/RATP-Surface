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
 * @version    SVN: $Id: sfGuardUserValidator.class.php 3109 2006-12-23 07:52:31Z fabien $
 */
class sfGuardUserValidator extends sfValidator {

        public function initialize($context, $parameters = null) {
                // initialize parent
                parent::initialize($context);

                // set defaults
                $this->getParameterHolder()->set('login_error', 'Username or password is not valid');
                $this->getParameterHolder()->set('password_error', 'Username or password is not valid');
                $this->getParameterHolder()->set('ip_error', 'User has restricted access');
                $this->getParameterHolder()->set('password_field', 'password');
                $this->getParameterHolder()->set('remember_field', 'remember');

                $this->getParameterHolder()->add($parameters);

                return true;
        }

        public function execute(&$value, &$error) {
                $connection = false;
                $password_field = $this->getParameterHolder()->get('password_field');
                $password = $this->getContext()->getRequest()->getParameter($password_field);

                $analytic = new Analytic();

                $remember = false;
                $remember_field = $this->getParameterHolder()->get('remember_field');
                $remember = $this->getContext()->getRequest()->getParameter($remember_field);

                $username = $value;
                $analytic->addValues(array('username' => $username));
                $user = sfGuardUserPeer::retrieveByUsername($username);
                // user exists?
                if($user) {
                        $analytic->addValues('user_id', $user->getId());
                        // password is ok?
                        if($user->checkPassword($password)) {
                                if($user->isIpAuthorized($_SERVER['REMOTE_ADDR'])) {
					$this->getContext()->getUser()->signIn($user, $remember);
                                        $analytic->addValues('code_connection', e_ANALYTIC_CONNECTION_ERROR::CONNECTION);
                                        $connection = true;
                                }
                                else {
                                        $analytic->addValues('code_connection', e_ANALYTIC_CONNECTION_ERROR::ERROR_IP);
                                        $error = $this->getParameterHolder()->get('ip_error');
                                }
                        }
                        else {
                                $analytic->addValues('code_connection', e_ANALYTIC_CONNECTION_ERROR::ERROR_PASSWORD);
                                $error = $this->getParameterHolder()->get('password_error');
                        }
                }
                else {
                        $analytic->addValues('code_connection', e_ANALYTIC_CONNECTION_ERROR::ERROR_LOGIN);
                        $error = $this->getParameterHolder()->get('login_error');
                }
                $analytic->process();
                return $connection;
        }

}

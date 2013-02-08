<?php
/**
 *
 * 
 */
class sfSurfaceTestBrowser extends sfTestBrowser {

        public function login($login, $password) {
                $this->get('/default/welcome')->isStatusCode(200)->responseContains('identifiant');
                $this->post('sfGuardAuth/signin', array('username' => $login, 'password' => $password))->isRedirected()->followRedirect()->responseContains('Bienvenue');
        }

        public function logout() {
                $this->get('/logout')->isRedirected()->followRedirect()->isStatusCode(200)->responseContains('identifiant');
        }

        public function checkMenu($menu_texts) {
                $selector = '#menu a';
                $texts = $this->getResponseDomCssSelector()->getTexts($selector);

                $this->test->isnt(count($texts), 0, sprintf('response selector "%s" exists', $selector));

                $this->test->is($texts, $menu_texts, "menu's items match");

                return $this;
        }

}


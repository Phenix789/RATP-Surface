<?php
/**
 *
 *
 *
 */
class baseDefaultActions extends sfSurfaceActions {

        public function executeIndex() {
                $this->default_index = sfConfig::get('app_surface_default_index');
        }

        public function executeError404() {

        }

        public function executeBlank() {
                
        }

        public function executeClearCache() {
                if($this->getUser() && $this->getUser()->isSuperAdmin()) {
                        shell_exec("cd ..; symfony cc;");
                        sfSurfaceHistory::clear('tg_center');
                        sfSurfaceHistory::clear('tg_east');
                }
                else {
                        $this->redirect404();
                }
                $this->forward('default', 'index');
        }

}

<?php
/**
 *
 * 
 */
class stringValidator extends sfStringValidator {

        public function execute(&$value, &$error) {
                parent::execute($value, $error);
                if(!isset($value)||trim($value)=='') {
                        $error = 'Merci d\'indiquer un message';
                        return false;
                }
                return true;
        }

}
?>
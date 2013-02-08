<?php
/**
 *
 *
 *
 */
class sfcPhoneValidator extends sfValidator {

	public function execute(&$phone, &$error) {
		if($phone) {
			if(!sfcPhone::check($phone)) {
				$error = 'Numero invalide';
				return false;
			}
		}
		return true;
	}

}
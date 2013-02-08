<?php
/**
 *
 *
 * 
 */
class sfcTimeValidator extends sfValidator {

	public function execute(&$time, &$error) {
		$value = explode(':', $time);
		if(	count($value) == 2 &&
			($value[0] == '0' || $value [0] == '00' || ($value[0] > 0 && $value[0] < 24)) &&
			($value[1] == '0' || $value [1] == '00' || ($value[1] > 0 && $value[1] < 60))) {
			return true;
		}
		$error = 'Horaire mal formaté : hh:mm';
		return false;
	}

}
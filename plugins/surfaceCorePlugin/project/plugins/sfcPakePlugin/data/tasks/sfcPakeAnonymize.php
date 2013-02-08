<?php

function pake_surface_anonymize_string($value, $search = null, $replace = null) {
	if(!$search) { $search =   array('u', 'a', 'e', 'i', 'o', 's', 'n', 't', 'r', 'l', 'U', 'A', 'E', 'I', 'O', 'S', 'N', 'T', 'R', 'L'); }
	if(!$replace) { $replace = array('y', 'u', 'a', 'e', 'i', 'd', 's', 'n', 't', 'r', 'Y', 'U', 'A', 'E', 'I', 'D', 'S', 'N', 'T', 'R'); }
	return str_replace($search, $replace, $value);
}

function pake_surface_anonymize_number($value, $coef_min = null, $coef_max = null) {
	if(!$coef_min) { $coef_min = 0.5; }
	if(!$coef_max) { $coef_max = 2; }
	$coef = rand($coef_min, $coef_max);
	if(is_int($value)) {
		return (int) $value * $coef;
	}
	else if(is_float($value)) {
		return (float) $value * $coef;
	}
	return $value * $coef;
}

function pake_surface_anonymize_boolean($value, $taux_true = null, $taux_false = null) {
	if(!$taux_true) { $taux_true = 50; }
	if(!$taux_false) { $taux_false = 50; }
	$taux = $taux_true + $taux_false;
	$bool = rand(0, $taux);
	return $bool < $taux_true;
}

function pake_surface_anonymize_code_zip() {
	return sprintf('%05d', rand(1000, 99999));
}

function pake_surface_anonymize_phone() {
	return sprintf('%02d %02d %02d %02d %02d', rand(1, 9), rand(0, 99), rand(0, 99), rand(0, 99), rand(0, 99));
}

function pake_surface_anonymize_clean() {
	return null;
}

function pake_surface_anonymize_object($object, $fields) {
	foreach($fields as $field => $type) {
		$arg1 = $arg2 = null;
		if(is_int($field)) {
			$field = $type;
			$type = 'string';
		}
		else if(is_array($type)) {
			list($type, $arg1, $arg2) = $type;
		}
		$callback = 'pake_surface_anonymize_' . $type;
		pake_surface_anonymize_field($object, $field, $callback, array($arg1, $arg2));
	}
}

function pake_surface_anonymize_field($object, $field, $callback, $args = array()) {
	$get = 'get' . sfInflector::camelize($field);
	$set = 'set' . sfInflector::camelize($field);
	return call_user_func(array($object, $set), call_user_func_array($callback, array_merge(array(call_user_func(array($object, $get))), (array) $args)));
}

function pake_surface_anonymize_dump($record, $new, $args) {
	if($args) {
		pake_surface_anonymize_object($new, $args);
	}
}
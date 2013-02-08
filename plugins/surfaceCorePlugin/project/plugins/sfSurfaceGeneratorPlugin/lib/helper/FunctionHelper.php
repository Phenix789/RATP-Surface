<?php
/**
 * @brief Helper
 * @package Surface
 * @subpackage Helper
 *
 * @author Claude <claude@elogys.fr>
 * @date 14 juin 2010
 * @version 1.0
 *
 */

/**
 * @brief Injecte la valeur dans le tableau a l'indexe donné.
 * @param array $array Le tableau
 * @param string $index L'indexe du tableau
 * @param mixed $value La valeur a injecter
 * @param string $separator Le separateur si la valeur est injecter
 * 
 */
function _inject(array &$array, $index, $value, $separator = '') {
	if(isset($array[$index])) {
		$value = $array[$index] . $separator . $value;
	}
	$array[$index] = $value;
}

/**
 * @brief Injecte a l'indexe 'class' du tableau la class donnée
 * @param array $array Tableau d'option
 * @param string $class Class CSS
 * @see _inject
 *
 */
function _inject_class(&$array, $class) {
	_inject($array, 'class', $class, ' ');
}

function surface_javascript_update_element_function($element, $options = array()) {
	return surface_javascript_if_exist($element, update_element_function($element, $options));
}

function surface_javascript_if_exist($element, $js) {
	return "if($('" . $element . "') != null) { " . $js . " }";
}

function _surface_callbacks_for_list_update($callbacks) {
	$return = "";
	foreach($callbacks as $callback) {
		if(is_array($callback)) {
			$helper = get('helper', $callback, null);
			$function = get('function', $callback, null);
			$params = get('params', $callback, array());
		}
		if(is_string($callback)) {
			$helper = null;
			$function = $callback;
			$params = array();
		}
		if($helper) {
			use_helper($helper);
		}
		if($function && is_callable($function)) {
			$return .= call_user_func_array($function, $params);
		}
	}
	return $return;
}
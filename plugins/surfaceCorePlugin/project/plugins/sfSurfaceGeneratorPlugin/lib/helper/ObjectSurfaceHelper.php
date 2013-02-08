<?php
use_helper('surface', 'ObjectAdmin');

function object_input_number_tag($object, $method, $options = array(), $default_value = null) {
	$options = _parse_attributes($options);
	return surface_input_number_tag(_convert_method_to_name($method, $options), _get_object_value($object, $method, $default_value), $options);
}

function object_input_minutes_tag($object, $method, $options = array(), $default_value = null) {
	$options = _parse_attributes($options);
	return surface_input_minutes_tag(_convert_method_to_name($method, $options), _get_object_value($object, $method, $default_value), $options);
}

function object_checkbox_with_label($object, $method, $options = array()) {
	$options = _parse_attributes($options);
	return surface_checkbox_with_label(_convert_method_to_name($method, $options), 1, _get_object_value($object, $method), _get_option($options, 'text'));
}

function object_select_from_peer($object, $method, $options = array()) {
	$options = _parse_attributes($options);
	return surface_select_tag(_convert_method_to_name($method, $options), options_for_select(call_user_func(array($object->getMetadata('peer', _get_option($options, 'peer_class', get_class($object) . 'Peer')), _get_option($options, 'method'))), _get_object_value($object, $method)));
}

function object_plain_number_tag($object, $method, $options = array(), $default_value = null) {
	$options = _parse_attributes($options);
	$value = _get_object_value($object, $method, $default_value);
	$suffix = get('unit', $options);
	return $value . ' ' .  $suffix;
}

function object_input_time_tag($object, $method, $options = array(), $default_value = null) {
	$options = _parse_attributes($options);

	$value = _get_object_value($object, $method, $default_value);

	return input_time_tag(_convert_method_to_name($method, $options), $value, $options);
}

function object_surface_double_list($object, $method, $options = array(), $callback = null) {
	// return content_tag("div", object_admin_double_list($object, $method, $options, $callback), array("class" => "surface_double_list"));
	if(!$callback) {
		$callback = '_get_propel_object_right_list';
	}

	return content_tag("div", object_admin_double_list($object, $method, $options, $callback), array("class" => "surface_double_list"));
}

function object_surface_autocomplete_peer($object, $method, $options = array(), $callback = null) {
	$options = _parse_attributes($options);

	$key = '';
	$text = '';

	$text_method = _get_option($options, 'text_method');
	$related_class = _get_option($options, 'related_class', getclass($object)) . 'Peer';
	$object_associated = call_user_func(array($related_class, 'retrieveByPKs'), $object->$method());
	if($object_associated && !empty($object_associated)) {

		$select_options = _get_options_from_objects($object_associated, $text_method);
		if(!empty($select_options)) {
			$text = reset($select_options);
			$key = key($select_options);
		}
	}

	// TableMap
	$completion_url = _get_option($options, 'completion_url', null);

	// remove non html option
	unset($options['completion_url']);

	// override field name
	/*
	 * nset($options['control_name']);
	 * name = strtolower(get_class($object)).'['. _convert_method_to_name($method, $options).']';
	 */
	if(isset($options['control_name'])) {
		$name = $options['control_name'];
		unset($options['control_name']);
	} else {
		$name = strtolower(get_class($object)) . '[' . _convert_method_to_name($method, $options) . ']';
	}

	$tagOptions = array();
	$tagOptions['size'] = _get_option($options, 'size');
	$tagOptions['style'] = _get_option($options, 'style');
	if(isset($options['popup_height'])) {
		$tagOptions['popup_height'] = $options['popup_height'];
	}
	if(isset($options['popup_width'])) {
		$tagOptions['popup_width'] = $options['popup_width'];
	}
	if(isset($options['popup_title'])) {
		$tagOptions['popup_title'] = $options['popup_title'];
	}

	$completionOptions = $options;

	return input_auto_complete_peer_tag($name, $key, $text, $completion_url, $tagOptions, $completionOptions);
}

function object_surface_autocomplete($object, $method, $options = array(), $callback = null) {
	$options = _parse_attributes($options);

	$value = _get_object_value($object, $method, null);

	$completion_url = _get_option($options, 'completion_url', null);

	if(isset($options['control_name'])) {
		$name = $options['control_name'];
		unset($options['control_name']);
	} else {
		$name = strtolower(get_class($object)) . '[' . _convert_method_to_name($method, $options) . ']';
	}
	
	$tagOptions = array();
	$tagOptions['size'] = _get_option($options, 'size');

	$completionOptions = $options;

	$html = surface_input_auto_complete_tag($name, $value, $completion_url, $tagOptions, $completionOptions);

	return $html;
}

function object_surface_autocomplete_list($object, $method, $options = array(), $callback = null) {
	$options = _parse_attributes($options);

	// get the lists of objects
	if(!$callback) {
		$callback = '_get_propel_associated_object_only_list';
	}

	$completion_url = _get_option($options, 'completion_url', null);

	list($all_objects, $objects_associated, $associated_ids) = _get_object_list($object, $method, $options, $callback);
	if(!empty($objects_associated))
		$objects_associated = array_combine($associated_ids, $objects_associated);

	// remove non html option
	unset($options['completion_url']);
	unset($options['through_class']);
	unset($options['values']);

	// override field name
	unset($options['control_name']);
	$name = _convert_method_to_name($method, $options);
	$name = 'associated_' . $name;

	$dispTemplate = null;
	$tagOptions = array();
	$tagOptions['size'] = _get_option($options, 'size');

	$completionOptions = $options;

	return input_autocomplete_list_tag($name, $objects_associated, $completion_url, $tagOptions, $completionOptions);
}

function object_surface_check_list($object, $method, $options = array(), $callback = null) {
	if(!$callback) {
		$callback = '_get_propel_associated_object_list';
	}

	return object_admin_check_list($object, $method, $options, $callback);
}

function object_surface_radio_list($object, $method, $options = array(), $default_value = null) {
	$options = _parse_attributes($options);

	$related_class = _get_option($options, 'related_class', false);
	if(false === $related_class && preg_match('/^get(.+?)Id$/', $method, $match)) {
		$related_class = $match[1];
	}

	$peer_method = _get_option($options, 'peer_method');

	$text_method = _get_option($options, 'text_method');

	$list_objects = sfContext::getInstance()->retrieveObjects($related_class, $peer_method);
	$select_options = _get_options_from_objects($list_objects, $text_method);

	$title_options = array();
	$title_method = _get_option($options, 'title_method', null);
	if($title_method) {
		$title_options = _get_options_from_objects($list_objects, $title_method);
	}

	if($value = _get_option($options, 'include_custom')) {
		$select_options = array('' => $value) + $select_options;
	}
	else if(_get_option($options, 'include_title')) {
		$select_options = array('' => '-- ' . _convert_method_to_name($method, $options) . ' --') + $select_options;
	}
	else if(_get_option($options, 'include_blank')) {
		$select_options = array('' => '') + $select_options;
	}

	if(is_object($object)) {
		$value = _get_object_value($object, $method, $default_value);
	}
	else {
		$value = $object;
	}

	// $option_tags = options_for_select($select_options, $value, $options);
	// return select_tag(_convert_method_to_name($method, $options), $option_tags, $options);
	$html = "<ul>";
	$name = _convert_method_to_name($method, $options);
	foreach($select_options as $key => $val) {
		$html .= "<li>" . surface_radiobutton_tag($name, $key, ($value == $key), array());
		$html .= surface_label_for($name . "[" . $key . "]", $val, array('title' => isset($title_options[$key]) ? $title_options[$key] : null)) . "</li>";
	}
	$html .= "</ul>";

	return $html;
}

function object_surface_autocomplete_peer_show($object, $method, $options = array(), $callback = null) {
	return object_surface_link_to_show($object, $method, $options);
}

function object_surface_link_to($object, $action = null, $options = array(), $html_options=array()) {
	if(!$object || !is_a($object, 'BaseObject')){
		return;
	}
	$link_to = $object->getLinkTo($action)->setOptions((array)$options)->setHTMLOptions((array)$html_options);
	$text_method = _get_option($options, 'text_method');
	if($text_method && method_exists($object, $text_method)){
		$link_to->setContent($object->$text_method());
	}
	return $link_to;
}

function object_surface_link_to_show($object, $method, $options = array(), $html_options=array()) {
	if(!$object){
		return;
	}
	$options = _parse_attributes($options);
	if($method != 'getId' && substr($method, -2) == 'Id') {
		$method = substr($method, 0, strlen($method) - 2);
	}
	return object_surface_link_to($object->$method(), null, $options, $html_options);
}

function object_surface_url_for($object, $action = 'show') {
	return $object->getMetadata('module').'/'.$object->getMetadata($action . '_action', $action).'?'.$object->getMetadata('primary_key', 'id').'='.$object->getPrimaryKey();
}

function object_surface_target_for($object, $action = 'show', $default_target = 'tg_east') {
	if(($app = $object->getMetadata('app')) != SF_APP) {
		return $app . '|' . $object->getMetadata(array('target', $action), $default_target);
	}
	return $object->getMetadata(array('target', $action), $default_target);
}

function object_surface_input_date_tag($object, $method, $options = array()) {
	$options = _parse_attributes($options);
	if(isset($options['control_name'])) {
		$name = $options['control_name'];
		unset($options['control_name']);
	}
	else
		$name = strtolower(get_class($object)) . '[' . _convert_method_to_name($method, $options) . ']';

	if(is_callable(array($object, $method)))
		$value = $object->$method();
	else
		$value=null;
	return surface_input_date_tag($name, $value, $options);
}

function __get_propel_associated_object_list($object, $method, $options, $hydrate_all) {
	// get the lists of objects
	$through_class = _get_option($options, 'through_class');
	$related_column = _get_option($options, 'related_column');
	$criteria_peer_class = _get_option($options, 'criteria_peer_class');
	$criteria_peer_method = _get_option($options, 'criteria_peer_method');

	$objects = null;

	if(isset($criteria_peer_class) && isset($criteria_peer_method)) {
		$objects = call_user_func(array($criteria_peer_class, $criteria_peer_method));
	}

	if(!isset($objects) && $hydrate_all) {
		$objects = sfPropelManyToMany::getAllObjects($object, $through_class);
	}
	if(isset($options['values'])) {
		$objects_associated = $options['values'];
		$ids = array_keys($objects_associated);

		unset($options['values']);
	}
	else {
		$objects_associated = sfPropelManyToMany::getRelatedObjects($object, $through_class, $related_column);
		$ids = array_map(create_function('$o', 'if (is_object($o)) return $o->getPrimaryKey();'), $objects_associated);
	}

	return array($objects, $objects_associated, $ids);
}

function _get_propel_associated_object_only_list($object, $method, $options) {
	return __get_propel_associated_object_list($object, $method, $options, false);
}

function _get_propel_associated_object_list($object, $method, $options) {
	return __get_propel_associated_object_list($object, $method, $options, true);
}

function _get_propel_object_right_list($object, $method, $options) {
	// get the lists of objects
	$through_class = _get_option($options, 'through_class');
	$related_column = _get_option($options, 'related_column', null);
	$criteria_peer_class = _get_option($options, 'criteria_peer_class');
	$criteria_peer_method = _get_option($options, 'criteria_peer_method');

	$objects = null;

	if(isset($criteria_peer_class) && isset($criteria_peer_method)) {
		$objects = call_user_func(array($criteria_peer_class, $criteria_peer_method));
	}

	if(!isset($objects)) {
		$objects = sfPropelManyToMany::getAllObjects($object, $through_class, $related_column);
	}

	//$objects = sfPropelManyToMany::getAllObjects($object, $through_class);
	$objects_associated = sfPropelManyToMany::getRelatedObjects($object, $through_class, $related_column);
	$ids = array_map(create_function('$o', 'return $o->getPrimaryKey();'), $objects_associated);

	return array($objects, $objects_associated, $ids);
}

function object_boolean_radiobutton_tag($object, $method, $options = array()) {
	$options = _parse_attributes($options);
	$value = _get_object_value($object, $method);
	if(isset($value)){
		$value = (string)(int)$value;
	}
	return surface_radiobutton_group_with_label_tag(_convert_method_to_name($method, $options), array(1=>__('yes'), 0=>__('no')), $value,  _get_option($options, 'text'));
}


function object_ckeditor_tag($object, $method, $options = array()) {
    $options = _parse_attributes($options);
    $value = _get_object_value($object, $method);    
    return ckeditor_tag($value, $options);
}



function object_surface_boolean_tag($object, $method, $options = array()) {
	$options = _parse_attributes($options);
	$value = _get_object_value($object, $method);
	if(isset($value)){
	    if (is_bool($value)) $value = (int) $value;
	}
	if (!isset($value) && isset($options['default'])) {
	    $value = $options['default'];
	}
	return surface_radiobutton_group_with_label_tag(_convert_method_to_name($method, $options), array(1=>__('yes'), 0=>__('no')), $value,  _get_option($options, 'text'));
}

function object_surface_radiobutton_group_with_label_tag($name, $objects, $checked = null, $id_method = 'getId', $string_method = '__toString', $options = array()){
	$values = array();
	foreach($objects as $object){
		$values[$object->$id_method()] = $object->$string_method();
	}
	if(is_object($checked)){
		$checked = $checked->$id_method();
	}
	return surface_radiobutton_group_with_label_tag($name, $values, $checked, $options);
}

function object_surface_radiobuttons_tag($object, $method, $options = array()){
	$options = _parse_attributes($options);
	$value = _get_object_value($object, $method);
	if (!isset($value) && isset($options['default'])) {
	    $value = $options['default'];
	}
	$radios = (array) get('options', $options);
	return surface_radiobutton_group_with_label_tag(_convert_method_to_name($method, $options), $radios, $value,  _get_option($options, 'text'));
}
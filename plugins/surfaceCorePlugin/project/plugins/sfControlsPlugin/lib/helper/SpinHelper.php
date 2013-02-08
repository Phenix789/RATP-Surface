<?php

use_helper('Javascript');
$response = sfContext::getInstance()->getResponse();
$response->addJavascript(sfConfig::get('sf_controls_plugin_web_dir').'/js/spin.js');
$response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/spin/style.css');

function _spin_field($field_id, $name, $value, $tag_options = array()){
	$javascript = "new SpinControl(";

	$javascript .= "'".get_id_from_name($field_id)."_spin', ";
	$javascript .= "'".$name."', ";
	$javascript .= $value.", ";

	$js_options = array();

	if(isset($tag_options['increment'])){
		$js_options['increment'] = $tag_options['increment'];
	}
	if(isset($tag_options['min'])){
		$js_options['min'] = "'".$tag_options['min']."'";
	}
	if(isset($tag_options['max'])){
		$js_options['max'] = "'".$tag_options['max']."'";
	}
	if(isset($tag_options['size'])){
		$js_options['size'] = "'".$tag_options['size']."'";
	}

	$javascript .= _options_for_javascript($js_options);
	$javascript .= ');';

	return javascript_tag($javascript);
}

function _time_spin_field($field_id, $name, $value, $tag_options = array()){
	$javascript = "new TimeSpinControl(";

	$javascript .= "'".get_id_from_name($field_id)."_spin', ";
	$javascript .= "'".$name."', ";
	$javascript .= ($value === null) ? 'null, ' : "'".$value."', ";

	$js_options = array();

	if(isset($tag_options['increment'])){
		$js_options['increment'] = $tag_options['increment'];
	}
	if(isset($tag_options['min'])){
		$js_options['min'] = "'".$tag_options['min']."'";
	}
	if(isset($tag_options['max'])){
		$js_options['max'] = "'".$tag_options['max']."'";
	}
	if(isset($tag_options['with_seconds'])){
		$js_options['withSecond'] = "'".$tag_options['with_seconds']."'";
	}
	if(isset($tag_options['size'])){
		$js_options['size'] = "'".$tag_options['size']."'";
	}
	if(isset($tag_options['id'])){
		$js_options['id'] = "'".$tag_options['id']."'";
	}
	if(isset($tag_options['no_input'])){
		$js_options['noInput'] = $tag_options['no_input'];
	}

	$javascript .= _options_for_javascript($js_options);
	$javascript .= ');';

	return javascript_tag($javascript);
}

/**
 */
function input_spin_tag($name, $value, $tag_options = array()){
	$tag_options = _convert_options($tag_options);
	$tag_options['id'] = get_id_from_name(isset($tag_options['id']) ? $tag_options['id'] : $name);

	$style = _get_option($tag_options, "style", null);

	$javascript = content_tag('div', '', array('id'=>$tag_options['id'].'_spin', 'style'=>$style));
	$javascript .= _spin_field($tag_options['id'], $name, $value, $tag_options);

	return $javascript;
}

function input_time_spin_tag($name, $value, $tag_options = array()){
	$tag_options = _convert_options($tag_options);
	$tag_options['id'] = get_id_from_name(isset($tag_options['id']) ? $tag_options['id'] : $name);

	$style = _get_option($tag_options, "style", null);

	$javascript = content_tag('div', '', array('id'=>$tag_options['id'].'_spin', 'style'=>$style));
	// $javascript = input_tag($name, $value);

	$javascript .= _time_spin_field($tag_options['id'], $name, $value, $tag_options);

	return $javascript;
}

function object_input_time_spin_tag($object, $method, $options = array(), $default_value = null){
	$options = _parse_attributes($options);
	$value = _get_object_value($object, $method, $default_value);

	return input_time_tag(_convert_method_to_name($method, $options), $value, $options);
}

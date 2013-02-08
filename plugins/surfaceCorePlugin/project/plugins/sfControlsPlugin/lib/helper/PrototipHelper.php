<?php
/**
 * @required
 */
use_helper('Javascript');

/**
 *
 *
 *
 */
function prototip_tag($id, $content, $options = array()) {
	return javascript_tag(prototip($id, $content, $options));
}

function prototip($id, $content, $options = array()) {
	return "new Tip('" . $id . "', '" . str_replace(array("\n", "\r"), array('<br/>', ''), addslashes($content)) . "', " . _options_for_javascript(prototip_merge_options($options)) . ");";
}

function prototip_merge_options($options = array()) {
	$default = array(
		'className' => "'silver'",
		/*'title' => "'Info'",*/
		'border' => 1,
		'effect' => "'appear'",
		'width' => "'150px'",
		"hook" => "{tip : 'bottomLeft'}",
		'delay' => '1',
	);

	return array_merge($default, (array) $options);
}

function prototip_use_theme() {
	use_javascript('/sfControlsPlugin/prototip/js/prototip.js');
	use_stylesheet('/sfControlsPlugin/prototip/css/prototip.css');
}
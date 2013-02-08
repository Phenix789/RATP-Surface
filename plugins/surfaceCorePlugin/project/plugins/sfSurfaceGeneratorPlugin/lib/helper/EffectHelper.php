<?php
/**
 * @brief
 *
 * @author Claude <claude@elogys.fr>
 * @date 29 juin 2010
 *
 */

use_helper('Function');

function effect_fade_tag($element, $options = array()) {
	$options = array_merge(array('duration' => 2.0, 'from' => 1, 'to' => 0), $options);
	return effect_tag('fade', $element, $options);
}

function effect_tag($effect, $element, $options = array()) {
	$js = "$('" . $element . "')." . $effect . "(" . _options_for_javascript($options) . ");";
	return surface_javascript_if_exist($element, $js);
}
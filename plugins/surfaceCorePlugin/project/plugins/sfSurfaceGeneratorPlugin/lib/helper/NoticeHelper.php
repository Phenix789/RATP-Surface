<?php
/**
 *
 *
 */

use_helper('Effect', 'Function');

/**
 * @brief Créer le code HTML d'une notice
 * @param string $text Texte de la notice
 * @param string $type Type de notice
 * @param array $options Options
 * @return string Code html
 *
 */
function notice_tag($text, $type, $element = null, $options = array()) {
	if($element == null) { $element = 'div_notice'; }
	$html = content_tag('span', null, array('class' => 'ico')) . content_tag('strong', $text);
	$html = content_tag('li', $html, array('class' => $type));
	$html = content_tag('ul', $html, array('class' => 'system_messages'));
	$html = content_tag('div', $html, array('id' => $element));
	if(get('with_effect', $options, true)) {
		$html .= javascript_tag(effect_fade_tag($element, $options));
	}
	return $html;
}

/**
 * @brief
 * @param string $text texte de la notice
 * @param string $type Type de notice
 * @param array $options Options
 * @return string Code html
 * 
 */
function notice_update_tag($text,$type, $element = NOTICE_TARGET, $options = array()) {
	$with_effect = get('with_effect', $options, true);
	$options['with_effect'] = false;
	$notice = notice_tag($text, $type, null, $options);
	unset($options['with_effect']);
	$html = javascript_tag(surface_javascript_update_element_function($element, array('content' => $notice)));
	if($with_effect) {
		$html .= javascript_tag(effect_fade_tag('div_notice', $options));
	}
	return $html;
}
<?php
/**
 * Helper pour la representation html des filtres
 *
 */


/* Helper *********************************************************************/

/**
 * Helper pour la reprensetation des filtres
 */
function control($filter, $label='', $options = array()) {
	if($filter != null) {
		$type = $filter->getType();
		$label = label_for('filters_filter_' . $filter->getId(), $label . ' :');
		$control = '';
		switch($type) {
			case e_TYPE::ID : $control = controlID($filter, $options);break;
			case e_TYPE::DATE : $control = controlDATE($filter, $options);break;
			case e_TYPE::NUMBER : $control = controlNUMBER($filter, $options);break;
			case e_TYPE::PERIOD : $control = controlPERIOD($filter, $options);break;
			case e_TYPE::TEXT : $control = controlTEXT($filter, $options);break;
			default : break;
		}
		return content_tag(	'div',
					$label . content_tag(	'div',
								content_tag('span', $control, array('class'=>'input_wrapper')),
								array('class'=>'inputs')),
								array('class'=>'row')
							);
	}
	return '';
}

/**
 *
 */
//function validate_and_export_button_tag($label_validate, $label_export, $value_hidden, $url, $options = array()) {
//	$hidden_name = 'stat_hidden_export';
//	$onclick_validate = "$('" . $hidden_name . "').value = 0;";
//	$onclick_export = "$('" . $hidden_name . "').value = 1;";
//	$html = "";
//	$hidden_tag = content_tag('li', input_hidden_tag($hidden, ''));
//	$validate_tag = surface_button_to($label_validate, '');
//	$export_tag = surface_button_to($name, $url, '', true, array(), array('onclick' => $onclick));
//}

/* Fonctions Specifiques ******************************************************/

/**
 * Code html d'un filtre de type ID
 */
function controlID($filter, $options) {
	$html = "";
	if($value = $filter->getOpt('autocomplete')) {
		$html = input_auto_complete_peer_tag('filters[filter_' . $filter->getId() . ']', '', '', $value);
	}
	else if($value = $filter->getOpt('session-object')) {
		use_helper('Cart');
		$html = cart_filter_tag(array(), $value, 'filter_' . $filter->getId());
	}
	else {
		$list = $filter->getControl();
		if($list) {
			if($filter->getOpt('multiple')) {
				$options['multiple'] = 'multiple';
				$options['size'] = $filter->getOpt('multiple-size');
			}
			$html = control_select_filter_tag($filter->getId(), $list, '-1', 'Pas de filtre', null, $options);
		}
	}
	return $html;
}

/**
 * Code html d'un filtre de type DATE
 */
function controlDATE($filter, $options) {
	$list = $filter->getControl();
	$default = null;
	$offset = $filter->getOpt('offset');
	if($offset > 0) {
		$i = 0;
		foreach($list as $index => $value) {
			if($i == $offset) { $default = $index; break; }
			$i++;
		}
	}
	$html = "";
	if($list) {
		$html .= control_select_filter_tag($filter->getId(), $list, null, null, $default, $options);
	}
	return $html;
}

/**
 * Code html d'un filtre de type NUMBER
 */
function controlNUMBER($filter, $options) {
	$operator = $filter->getComplementControl();
	$html = "";
	$html .= select_tag('filters[filter_' . $filter->getId() . '][mode]',	options_for_select($operator), $options);
	$html .= input_tag('filters[filter_' . $filter->getId() . '][value]', $options ? $options : null);
	return $html;
}

/**
 * Code html d'un filtre de type PERIOD
 */
function controlPERIOD($filter, $options) {
	$html = "";
	$begin = input_date_tag('filters[filter_' . $filter->getId() . '][begin]', null,
								array_merge(array (
								'rich' => true,
								'withtime' => false,
								'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png',
								'class' => 'input_date',
								),
								$options)
					);
	$end = input_date_tag('filters[filter_' . $filter->getId() . '][end]', null,
								array_merge(array (
								'rich' => true,
								'withtime' => false,
								'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png',
								'class' => 'input_date',
								),
								$options)
					);
	$html .= $begin;
	$html .= " &nbsp; ";
	$html .= $end;
	return $html;
}

/**
 * Code html d'un filtre de type TEXT
 */
function controlTEXT($filter, $options) {
	$html = "";
	$select = $filter->getComplementControl();
	$html .= input_tag('filters[filter_' . $filter->getId() .'][value]', null, $options);
	$html .= select_tag('filters[filter_' . $filter->getId() .'][mode]', options_for_select($select, 'LIKE'), $options);
	return $html;
}

/* Fonctions ******************************************************************/

function control_select_filter_tag($id, $options, $null_key = null, $null_value = null, $default_select = null, $html_options_select = array(), $html_options_options = array()) {
	$html = "";
	if($null_value) {
		$html .= '<option value="' . $null_key . '">' . $null_value . '</option>';
	}
	$html .= options_for_select($options, $default_select, $html_options_options);
	$html = select_tag('filters[filter_' . $id . ']', $html, $html_options_select);
	return $html;
}


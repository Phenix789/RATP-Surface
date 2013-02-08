<?php
/**
 * @brief helper
 * @package Plugin
 * @subpackage sfPropelOptionsBehaviorPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.0
 * @license LGPL
 *
 */

/**
 * @brief Helper Retourne une vue d'edition de la liste des options
 * @fn function list_option_tag($list, $class, $field)
 * @param array liste des options
 * @param string $class class de l'objet
 * @param string $field partie du nom des champs de saisie
 * @return string code html du composant
 *
 */
function list_option_tag($list, $class, $field) {
	$id = 0;
	$div_id = $class . '_' . $field;
	$img = '<img src="/sfSurfaceGeneratorPlugin/images/add.png" alt="+" />';
	$html = "";
	$html .= '<div id="' . $div_id . '">';
	foreach($list as $key => $value) {
		$html .= option_tag($key, $value, $class, $field, $id++);
	}
	$html .= '</div>';
	$html .= link_to_remote($img, array(	'update' => $div_id,
						'url' => 'options/addOption?class=' . $class . '&field=' . $field,
						'position' => 'bottom',
						'script' => true
					));
	return $html;
}

/**
 * @brief Helper Retourne une vue d'edition d'une option
 * @fn function option_tag($key, $value, $class, $field, $id)
 * @param string $key clef de l'option
 * @param string $value valeur de l'option
 * @param string $class class de l'objet auquel appartient l'option
 * @param string $field partie du nom des champs de saisie
 * @param int $id partie du nom des champs de saisie
 * @return string code html du composant
 *
 */
function option_tag($key, $value, $class, $field, $id) {
	$div_id = $class . '_' . $field . '_' . $id;
	$key_id = $class . '_' . $field . '_' . $id . '_key';
	$value_id = $class . '_' . $field . '_' . $id . '_value';
	$hidden_id = $class . '_' . $field . '_' . $id . '_hidden';
	$key_name = '';
	$value_name = '';
	$hidden_name = $class . '[' . $field . '][' . $id . ']';

	$change = "$('" . $hidden_id . "').value = $('" . $key_id . "').value + ':' + $('" . $value_id . "').value; ";
	$delete = "$('" . $key_id . "').value = null; $('" . $value_id . "').value = null; ";
	$delete .= "$('" . $hidden_id . "').value = null; $('" . $div_id . "').style.display = 'none'";
	
	$html = "";
	$html .= '<span id="' . $div_id . '">';
	$html .= '<input type="text" value="' . $key . '" id="' . $key_id . '" name="' . $key_name . '" size="6" onchange="' . $change . '" />';
	$html .= '<input type="text" value="' . $value . '" id="' . $value_id . '" name="' . $value_name . '" size="6" onchange="' . $change . '"/>';
	$html .= '<img src="/sfSurfaceGeneratorPlugin/images/delete.png" alt="suppr" onclick="' . $delete . '" />';
	$html .= '<input type="hidden" value="' . $key . ':' . $value . '" id="' . $hidden_id . '" name="' . $hidden_name . '"/>';
	$html .= '</span>';
	return $html;
}

/**
 * @brief Helper Retourne la vue d'edition pour une option
 * @fn function add_option_tag($class, $field)
 * @param string $class class de l'objet auquel appartient la futur option
 * @param string $field partie du nom des champs de saisie
 * @return string code html du composant
 *
 */
function add_option_tag($class, $field) {
	return option_tag('', '', $class, $field, rand(100, 1000));
}

/**
 * @brief Helper Retourne la vue de la liste des options
 * @fn function list_options_view_tag($list)
 * @param array $list liste des options
 * @return string code html du composant
 *
 */
function list_options_view_tag($list) {
	$html = "";
	$html .= '<ul id="options">';
	foreach($list as $key => $value) {
		$html .= '<li id="option"><b>' . $key . '</b> : ' . $value . '</li>';
	}
	$html .= '</ul>';
	return $html;
}

<?php
/**
 * @brief
 *
 * @author Claude <claude@elogys.fr>
 * @date 29 juin 2010
 *
 */

/**
 *
 * @param string $help
 * @return string
 * 
 */
function surface_help_tag($help) {
	return content_tag('a', null, array('title' => $help, 'class' => 'surface_help', 'href' => "#"));
}

/**
 *
 * @param string $module
 * @return string 
 *
 */
function surface_help_get_text_for_list($module) {
	$help = _surface_help_get_text($module);
	return get('list', $help);
}

/**
 *
 * @param string $module
 * @return string
 *
 */
function surface_help_get_text_for_create($module) {
	$help = _surface_help_get_text($module);
	return get('create', $help);
}

/**
 *
 * @param string $module
 * @return string
 * 
 */
function surface_help_get_text_for_show($module) {
	$help = _surface_help_get_text($module);
	return get('show', $help);
}

/**
 *
 * @param string $module
 * @return string
 *
 */
function surface_help_get_text_for_edit($module) {
	$help = _surface_help_get_text($module);
	return get('edit', $help);
}

/**
 *
 * @param string $module
 * @return string
 *
 */
function surface_help_get_text_for_delete($module) {
	$help = _surface_help_get_text($module);
	return get('delete', $help);
}

/**
 *
 * @param string $module
 * @return string
 * 
 */
function _surface_help_get_text($module) {
	$help = sfConfig::get('app_help_' . $module, array());
	$default = sfConfig::get('app_help_default', array());
	return array_merge($default, $help);
}
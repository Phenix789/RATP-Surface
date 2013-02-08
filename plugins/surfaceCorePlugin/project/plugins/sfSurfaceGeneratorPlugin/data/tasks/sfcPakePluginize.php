<?php
/**
 * @brief
 * @author Claude <claude@elogys.fr>
 *
 */

pake_desc('Pluginize a module');
pake_task('surface-pluginize');

function run_surface_pluginize($task, $args) {
	if(count($args) == 0) {
		surface_pluginize_help();
	}
	surface_pluginize_valid_argument($args);
	$app_name = $args['app'];
	$module_name = $args['module'];
	$plugin_name = $args['plugin'];
	$module_dir = _surface_pluginize_get_module_dir($app_name, $module_name);
	$plugin_module_name_dir = _surface_pluginize_get_plugin_module_name_dir($plugin_name);
	$finder = pakeFinder::type('any')->ignore_version_control()->name('*.php', '*.yml')->not_name('documents');
	_surface_pluginize_copy_structure_and_files($module_dir, $plugin_module_name_dir);
}

function surface_pluginize_help() {
	pake_echo_action("\tsymfony surface-pluginize", '');
	pake_echo_comment("PakeTask pluginize an existing module.");
	pake_echo_comment("Parameters accepted:");
	pake_echo_comment("\t<application_name> <module_name> [<plugin_name>]");
	pake_echo_comment("Default value of plugin_name is value of the constant SFC_COMMON_MODULE_DIR.");
	pake_echo_comment("If plugin already exists, it is overwritten.");
	exit();
}

function surface_pluginize_valid_argument(&$args) {
	if(count($args) < 2) {
		throw new Exception('Arguments missing');
	}
	$app_name = $args[0];
	$module_name = $args[1];
	$plugin_name = isset($args[2]) ? $args[2] : SFC_COMMON_MODULE_DIR;
	$module_dir = _surface_pluginize_get_module_dir($app_name, $module_name);
	$plugin_dir = _surface_pluginize_get_plugin_dir($plugin_name);
	$plugin_module_dir = _surface_pluginize_get_plugin_module_dir($plugin_name);
	if(!is_dir($module_dir)) {
		throw new Exception('The module ' . $module_name . ' doesn\'t exists in ' . $module_dir);
	}
	if(!is_dir($plugin_dir)) {
		pake_echo_action("create directory", $plugin_dir);
		mkdir($plugin_dir);
	}
	if(!is_dir($plugin_module_dir)) {
		pake_echo_action("create directory", $plugin_module_dir);
		mkdir($plugin_module_dir);
	}
	$args = array('app' => $app_name, 'module' => $module_name, 'plugin' => $plugin_name);
}

function _surface_pluginize_get_module_dir($app_name, $module_name) {
	$root_dir = sfConfig::get('sf_root_dir');
	$module_dir = $root_dir . DIRECTORY_SEPARATOR .
			'apps' . DIRECTORY_SEPARATOR .
			$app_name . DIRECTORY_SEPARATOR .
			'modules' . DIRECTORY_SEPARATOR .
			$module_name;
	return $module_dir;
}

function _surface_pluginize_get_plugin_dir($plugin_name) {
	return sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . $plugin_name;
}

function _surface_pluginize_get_plugin_module_dir($plugin_name) {
	return _surface_pluginize_get_plugin_dir($plugin_name) . DIRECTORY_SEPARATOR . 'modules';
}

function _surface_pluginize_get_plugin_module_name_dir($plugin_name, $module_name) {
	return _surface_pluginize_get_plugin_module_dir($plugin_name) . DIRECTORY_SEPARATOR . $module_name;
}
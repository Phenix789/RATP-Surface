<?php

use_helper('Scriptaculous');

function get_theme_color() {
	return sfConfig::get('app_surface_theme_color');
}

function get_theme_library() {
	return sfConfig::get('app_surface_theme_library', 'sfcThemePlugin');
}

function use_theme($theme = null) {
	if(!$theme) { $theme = get_theme_color(); }
	use_theme_stylesheet($theme);
	use_theme_javascript($theme);
}

function use_theme_stylesheet($theme) {
	_use_default_stylesheet();
	use_stylesheet('/'.get_theme_library().'/' . $theme . '/css/' . $theme . '_theme.css');
	use_stylesheet('custom.css');
}

function use_theme_javascript($theme) {
	_use_default_javascript();
}

function _use_default_theme() {
	_use_default_stylesheet();
	_use_default_javascript();
}

function _use_default_stylesheet() {
	use_stylesheet('/'.get_theme_library().'/common/css/surface.css');
	//use_stylesheet('/'.get_theme_library().'/common/css/print.css', null, array('media'=>'print'));
}

function _use_default_javascript() {
	use_scriptaculous();
}


/******************************************************************************/
		/*******/
		/*Login*/
		/*******/
/******************************************************************************/

function use_theme_login($theme = null) {
	if(!$theme) { $theme = get_theme_color(); }
	use_theme_stylesheet_login($theme);
	use_theme_javascript_login($theme);
}

function use_theme_stylesheet_login($theme) {
	_use_default_stylesheet_login();
	use_stylesheet('/'.get_theme_library().'/' . $theme . '/css/' . $theme . '_theme.css');
	use_stylesheet('custom.css');
}

function use_theme_javascript_login($theme) {
	_use_default_javascript_login();
}

function _use_default_theme_login() {
	_use_default_stylesheet_login();
	_use_default_javascript_login();
}

function _use_default_stylesheet_login() {
	use_stylesheet('/'.get_theme_library().'/common/css/login.css');
}

function _use_default_javascript_login() {

}

function use_error_theme() {
	use_stylesheet('/'.get_theme_library().'/common/css/error.css');
}
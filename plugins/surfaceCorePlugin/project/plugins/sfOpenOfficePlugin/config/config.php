<?php
$phpos = substr(strtolower(PHP_OS), 0, 3);

if($phpos == 'win') {
	$os = 'win';
	$ext = 'bat';
}
elseif($phpos == 'lin') {
	$os = 'unix';
	$ext = 'sh';
}
else {
	$ext = 'sh';
	$os = 'osx';
}

sfConfig::add(array(
		'sf_app_module_document_dir_name' => 'documents',
		'sf_os_family' => $sf_os_family = $os,
		'sf_os_script_extension' => $sf_os_script_extension = $ext,
		'sf_plugin_ooffice_name' => $sf_plugin_ooffice_name = 'sfOpenOfficePlugin',
		'sf_plugin_ooffice_dir' => $sf_plugin_ooffice_dir = sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . $sf_plugin_ooffice_name,
	));

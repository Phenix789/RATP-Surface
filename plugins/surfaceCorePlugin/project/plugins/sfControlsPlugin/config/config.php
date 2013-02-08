<?php

$sf_controls_plugin_name = 'sfControlsPlugin';
$sf_controls_plugin_dir  = sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . $sf_controls_plugin_name;

sfConfig::add(array(
  'sf_controls_plugin_dir'           => $sf_controls_plugin_dir,
//  'sf_controls_plugin_web_dir'       => $sf_controls_plugin_dir . DIRECTORY_SEPARATOR . 'web',
  'sf_controls_plugin_web_dir'       => DIRECTORY_SEPARATOR . $sf_controls_plugin_name,
));

?>
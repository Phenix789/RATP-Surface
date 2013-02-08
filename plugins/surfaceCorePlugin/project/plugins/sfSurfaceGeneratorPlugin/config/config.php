<?php
sfConfig::set('sf_surface_generator_plugin_dir',  '/sfSurfaceGeneratorPlugin/');
sfConfig::set('sf_surface_generator_css_dir',     '/sfSurfaceGeneratorPlugin/css/');
sfConfig::set('sf_surface_generator_images_dir',  '/sfSurfaceGeneratorPlugin/images/');

set_include_path(SF_ROOT_DIR.'/plugins/sfSurfaceGeneratorPlugin/data'.PATH_SEPARATOR.get_include_path());
require_once('creole/CreoleTypes.php');

Creole::registerDriver('pgsql', 'creole.drivers.pgisql.PgiSQLConnection');

include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'PHPAddOns.php');

define('NOTICE_TARGET', 'notices');
define('NOTICE_SUCCESS', 'green');
define('NOTICE_INFO', 'blue');
define('NOTICE_WARNING', 'yellow');
define('NOTICE_ERROR', 'red');
<?php

pake_desc('create classes for current model');
pake_task('surface-build-model', 'project_exists');

pake_desc('create sql for current model');
pake_task('surface-build-sql', 'project_exists');

pake_desc('insert sql for current model');
pake_task('surface-insert-sql', 'project_exists');

pake_desc('dump data to fixtures directory');
pake_task('surface-dump-data', 'project_exists');

pake_desc('load data from fixtures directory');
pake_task('surface-load-data', 'propel-load-data');

pake_desc('generate surface/propel model and sql and initialize database');
pake_task('surface-build-all', 'surface-build-model', 'surface-build-sql');

pake_desc('generate propel/propel model and sql and initialize database, and load data');
pake_task('surface-build-all-load', 'surface-build-all', 'surface-insert-sql', 'surface-load-data');

function run_surface_build_model($task, $args)
{
   // $args[] = propel.templatePath = ${propel.home}/templates;
    
  _propel_convert_yml_schema(false, 'generated-');
  _propel_copy_xml_schema_from_plugins('generated-');
  _call_surface_phing($task, 'om');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema.xml');
  pake_remove($finder, array('config', 'plugins'));
}

function run_surface_build_sql($task, $args)
{
  _propel_convert_yml_schema(false, 'generated-');
  _propel_copy_xml_schema_from_plugins('generated-');
  _call_surface_phing($task, 'sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema.xml');
  pake_remove($finder, 'config');
}

function run_surface_build_all($task, $args)
{
}

function run_surface_build_all_load($task, $args)
{
}

function run_surface_insert_sql($task, $args)
{
  _propel_convert_yml_schema(false, 'generated-');
  _propel_copy_xml_schema_from_plugins('generated-');
  _call_surface_phing($task, 'insert-sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema.xml');
  pake_remove($finder, 'config');
}

/**
 * Dumps yml database data to fixtures directory.
 *
 * @example symfony dump-data frontend data.yml
 * @example symfony dump-data frontend data.yml dev
 *
 * @param object $task
 * @param array $args
 */
function run_surface_dump_data($task, $args)
{
  if (!count($args))
  {
    throw new Exception('You must provide the app.');
  }

  $app = $args[0];

  if (!is_dir(sfConfig::get('sf_app_dir').DIRECTORY_SEPARATOR.$app))
  {
    throw new Exception('The app "'.$app.'" does not exist.');
  }

  if (!isset($args[1]))
  {
    throw new Exception('You must provide a filename.');
  }

  $filename = $args[1];

  $env = empty($args[2]) ? 'dev' : $args[2];

  // define constants
  define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
  define('SF_APP',         $app);
  define('SF_ENVIRONMENT', $env);
  define('SF_DEBUG',       true);

  // get configuration
  require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';

  $databaseManager = new sfDatabaseManager();
  $databaseManager->initialize();

  if (!sfToolkit::isPathAbsolute($filename))
  {
    $dir = sfConfig::get('sf_data_dir').DIRECTORY_SEPARATOR.'fixtures';
    pake_mkdirs($dir);
    $filename = $dir.DIRECTORY_SEPARATOR.$filename;
  }

  pake_echo_action('propel', sprintf('dumping data to "%s"', $filename));

  $data = new sfSurfacePropelData();
  $data->dumpData($filename);
}

function _call_surface_phing($task, $task_name, $check_schema = true)
{
  $schemas = pakeFinder::type('file')->ignore_version_control()->name('*schema.xml')->prune('doctrine')->relative()->follow_link()->in('config');
  if ($check_schema && !$schemas)
  {
    throw new Exception('You must create a schema.yml or schema.xml file.');
  }
  
  $sf_symfony_lib_dir = realpath(sfConfig::get('sf_symfony_lib_dir'));
  $sf_root_dir = realpath(sfConfig::get('sf_root_dir'));

  // call phing targets
  pake_import('Phing', false);
  if (false === strpos('propel-generator', get_include_path()))
  {
    set_include_path($sf_symfony_lib_dir.'/vendor/propel-generator/classes'.PATH_SEPARATOR.get_include_path());
  }
  set_include_path($sf_root_dir.PATH_SEPARATOR.get_include_path());

  // needed to include the right Propel builders
  set_include_path($sf_symfony_lib_dir.PATH_SEPARATOR.get_include_path());
  set_include_path($sf_root_dir.'/plugins/sfSurfaceGeneratorPlugin/data'.PATH_SEPARATOR.get_include_path());

   Creole::registerDriver('pgsql',   'creole.drivers.pgisql.PgiSQLConnection');
   Creole::registerDriver('pgisql',  'creole.drivers.pgisql.PgiSQLConnection');
  $options = array(
    'project.dir'                       => $sf_root_dir.'/config',
    // 'propel.home'                       => sfConfig::get('sf_root_dir').'/plugins/sfSurfaceGeneratorPlugin/data/propel',
    'build.properties'                  => 'propel.ini',
    'propel.output.dir'                 => $sf_root_dir,
    'propel.builder.peer.class'         => $sf_root_dir.'/plugins.sfSurfaceGeneratorPlugin.data.propel.builder.SfSurfacePeerBuilder',
    'propel.builder.object.class'       => $sf_root_dir.'/plugins.sfSurfaceGeneratorPlugin.data.propel.builder.SfSurfaceObjectBuilder',
    'propel.builder.mapbuilder.class'   => $sf_root_dir.'/plugins.sfSurfaceGeneratorPlugin.data.propel.builder.SfSurfaceMapBuilderBuilder',
    // 'propel.templatePath'               => $sf_root_dir.'/plugins/sfSurfaceGeneratorPlugin/data/propel/templates',
  );
   
  
  pakePhingTask::call_phing($task, array($task_name), $sf_symfony_lib_dir.'/vendor/propel-generator/build.xml', $options);

  chdir(sfConfig::get('sf_root_dir'));
}

function run_surface_load_data($task, $args) {
}

pake_desc('YOU SHOULD USE surface-build-model !');
pake_task('propel-build-model');

pake_desc('YOU SHOULD USE surface-build-sql !');
pake_task('propel-build-sql');

pake_desc('YOU SHOULD USE surface-insert-sql !');
pake_task('propel-insert-sql');

pake_desc('YOU SHOULD USE surface-dump-data !');
pake_task('propel-dump-data');

pake_desc('YOU SHOULD USE surface-load-data !');
pake_task('propel-load-data');

pake_desc('YOU SHOULD USE surface-build-all !');
pake_task('propel-build-all');

pake_desc('YOU SHOULD USE surface-build-all-load !');
pake_task('propel-build-all-load');

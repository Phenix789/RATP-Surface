<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

pake_desc('initialize a new surface admin module');
pake_task('surface-init-admin', 'app_exists');

pake_desc('initialize a new surface admin module');
pake_task('surface-init-module', 'surface-init-admin');

pake_desc('initialize a new surface application');
pake_task('surface-init-app', 'project_exists');


function run_surface_init_admin($task, $args, $options) {
        if(count($args) < 2) {
                throw new Exception('You must provide your module name.');
        }

        if(count($args) < 3) {
                throw new Exception('You must provide your model class name.');
        }

        $app = $args[0];
        $module = $args[1];
        $model_class = $args[2];
        
        $override = false;
        if (isset($options['force'])) {
            $override = true;
        }
        
        $theme = 'default';
        $html_class = sfInflector::underscore($model_class);

        try {
                $author_name = $task->get_property('author', 'symfony');
        }
        catch(pakeException $e) {
                $author_name = 'Your name here';
        }

        try {
                $html_class = sfInflector::underscore($model_class);
                $field_names = call_user_func(array($model_class . 'Peer', 'getFieldNames'), BasePeer::TYPE_FIELDNAME);

                // skip update informations fields
                $field_names = array_diff($field_names, array('id', 'created_at', 'created_by', 'updated_at', 'updated_by'));

                $generator_fields_params = array();
                $validator_fields_list = array();
                $show_fields_names = array();

                foreach($field_names as &$field_name) {
                        $field_name = sfInflector::tableize($field_name);
                        $generator_fields_params[] = sprintf("%-20s { name: %s }", $field_name . ':', sfInflector::humanize($field_name));
                        $validator_fields_list[] = sprintf('- "%s{%s}"', $html_class, $field_name);
                        $validator_fields_params[] = sprintf("%s{%s}:\n#    required:      No", $html_class, $field_name);
                        
                        $show_field_names[] = ($i = strpos($field_name, '_id' ))? substr($field_name, 0, $i): $field_name;
                }
                $generator_fields_list = implode(", ", $field_names);
                $generator_edit_fields_list = implode(", ", $field_names);
                $generator_show_fields_list = implode(", ", $show_field_names);
                
                $generator_fields_params = implode("\n      ", $generator_fields_params);
                $validator_fields_list = implode("\n#    ", $validator_fields_list);
                $validator_fields_params = implode("\n#  ", $validator_fields_params);
                $generator_field_sort = reset($field_names);
                $generator_field_title = "%%" . reset($show_field_names) . "%%";
        }
        catch(Exception $e) {
                $generator_fields_list = "";
                $generator_fields_params = "";
                $generator_field_sort = "";
                $validator_fields_list = "";
                $validator_fields_params = "";
        }


        $constants = array(
                'PROJECT_NAME' => $task->get_property('name', 'symfony'),
                'APP_NAME' => $app,
                'MODULE_NAME' => $module,
                'MODULE_TITLE' => sfInflector::humanize($module),
                'MODEL_CLASS' => $model_class,
                'GENERATOR_FIELDS_LIST' => $generator_fields_list,
                'GENERATOR_SHOW_FIELDS_LIST' => $generator_show_fields_list,
                'GENERATOR_EDIT_FIELDS_LIST' => $generator_edit_fields_list,
                'GENERATOR_FIELDS_PARAMS' => $generator_fields_params,
                'GENERATOR_FIELD_SORT' => $generator_field_sort,
                'GENERATOR_FIELD_TITLE' => $generator_field_title,
                'VALIDATOR_FIELDS_LIST' => $validator_fields_list,
                'VALIDATOR_FIELDS_PARAMS' => $validator_fields_params,
                'AUTHOR_NAME' => $author_name,
                'THEME' => $theme,
                'DATE' => date('j M Y'),
                'VERSION' => '1.0'
        );

        sfConfig::set('sf_surface_data_dir', '/plugins/sfSurfaceGeneratorPlugin/data');
        $sf_root_dir = sfConfig::get('sf_root_dir');
        
        $moduleDir = $sf_root_dir . '/' . sfConfig::get('sf_apps_dir_name') . '/' . $app . '/' . sfConfig::get('sf_app_module_dir_name') . '/' . $module;
        
        if (is_dir($moduleDir) && !$override) {
            throw new Exception(sprintf('The directory "%s" already exists. --force to overwrite.', $moduleDir));
        }

        // create module structure
        $template = 'standard';
        $finder = pakeFinder::type('any')->ignore_version_control()->discard('.sf');
        pake_mirror($finder, $sf_root_dir . '/' .sfConfig::get('sf_surface_data_dir').'/skeleton/module/'.$template, $moduleDir, array('override'=>$override));

        // customize php and yml files
        $finder = pakeFinder::type('file')->ignore_version_control()->name('*.php', '*.yml');
        pake_replace_tokens($finder, $moduleDir, '##', '##', $constants);
}

function run_surface_init_module($task, $args) {

}


function run_surface_init_app($task, $args) {
    if (!count($args)) {
        throw new Exception('You must provide your application name.');
    }
    $app = $args[0];
    
    if(count($args) < 2) {
            throw new Exception('You must provide your template name. (dashboard, administration, statistic, toolkit, standard)');
    }
    
    $template = $args[1];
    if(!in_array($template, array('dashboard', 'administration', 'statistic', 'toolkit', 'standard'))) {
            throw new Exception('You must provide another template name. (dashboard, administration, statistic, toolkit, standard)');
    }

    $sf_root_dir = sfConfig::get('sf_root_dir');
    $app_dir = $sf_root_dir.'/'.sfConfig::get('sf_apps_dir_name').'/'.$app;

    if (is_dir($app_dir)) {
        throw new Exception(sprintf('The directory "%s" already exists.', $app_dir));
    }

    sfConfig::set('sf_surface_data_dir', '/plugins/sfSurfaceGeneratorPlugin/data');
            
    // create basic application structure
    $finder = pakeFinder::type('any')->ignore_version_control()->discard('.sf');
    pake_mirror($finder, $sf_root_dir.sfConfig::get('sf_surface_data_dir').'/skeleton/app/'.$template, $app_dir);
    
    pake_copy($sf_root_dir.'/'.sfConfig::get('sf_surface_data_dir').'/skeleton/app/web/index.php', sfConfig::get('sf_web_dir').'/'.$app.'.php');
    pake_copy($sf_root_dir.'/'.sfConfig::get('sf_surface_data_dir').'/skeleton/app/web/index_dev.php', sfConfig::get('sf_web_dir').'/'.$app.'_dev.php');

    $finder = pakeFinder::type('file')->ignore_version_control()->name($app.'.php', $app.'_dev.php');
    pake_replace_tokens($finder, sfConfig::get('sf_web_dir'), '##', '##', array('APP_NAME' => $app));

    //run_fix_perms($task, $args);

}

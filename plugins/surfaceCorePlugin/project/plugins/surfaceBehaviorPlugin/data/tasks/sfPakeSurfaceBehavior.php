<?php
/**
 * @brief 
 * @package Plugin
 * @subpackage surfaceBehavior
 *
 * @author Claude <claude@elogys.fr>
 * @date 22 déc. 2009
 * @version 1.0
 * @license LGPL
 *
 */
pake_desc('Initialize a new behavior');
pake_task('surface-init-behavior', 'project_exists');

function run_surface_init_behavior($task, $args) {
	/*Recuperation du nom du behavior*/
	if(!isset($args[0]) || $args[0] == null) {
		throw new Exception('Vous devez spécifier un nom pour le behavior');
	}
	$params['NAME_BEHAVIOR'] = ucfirst($args[0]);
	/*Traitement preparatoire*/
	$dir_plugin = sfConfig::get('sf_plugins_dir') ;
	$dir_name = 'surface' . $params['NAME_BEHAVIOR'] . 'BehaviorPlugin';
	$dir_behavior = $dir_plugin . DIRECTORY_SEPARATOR . $dir_name;
	/*Création de la structure*/
	$finder = pakeFinder::type('any')->ignore_version_control()->discard('.sf');
	$dirs = sfLoader::getGeneratorSkeletonDirs('surfaceBehavior', 'default');
	foreach ($dirs as $dir) {
		if (is_dir($dir)) {
			pake_mirror($finder, $dir, $dir_behavior);
			break;
		}
	}
	/*Personnalisation du plugin*/
	$finder = pakeFinder::type('file')->ignore_version_control()->name('*.php', '*.yml');
	pake_replace_tokens($finder, $dir_behavior, '##', '##', $params);
	/*Renomage des fichiers*/
	$directories = array(	'config' => array('surfaceBehavior_schema.yml' => 'surface' . $params['NAME_BEHAVIOR'] . 'Behavior_schema.yml'),
			'lib' => array('class.php' => 'surface' . $params['NAME_BEHAVIOR'] . 'Behavior.class.php'));
	foreach($directories as $directory => $files) {
		foreach($files as $old_name => $new_name) {
			$dir_rename = $dir_behavior . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR;
			rename($dir_rename . $old_name, $dir_rename . $new_name);
		}
	}
}
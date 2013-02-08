<?php
/**
 * @brief PakeTask générant les fichiers sources pour un nouveau model de contact
 * @package Plugin
 * @subpackage SurfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 15 mars 2010
 * @version 1.0
 *
 */

pake_desc('Generating the sources files for a new contact model');
pake_task('surface-contact-create', 'project_exists');

/**
 * @brief PakeTask générant les fichiers sources pour un nouveau model de contact
 * @param pakeTask $task Tache
 * @param array $args Parametres
 *
 * Cette tache accepte trois parametres dont deux obligatoires.
 * 1. Le nom de la nouvelle class
 * 2. Le nom de la class model
 * 3. (optionnelle) Le chemin ou placer les fichiers. (Package)
 * 
 */
function run_surface_contact_create($task, $args) {
	/*Help*/
	if(count($args) == 0) {
		pake_echo_action("\tsymfony surface-contact-create", '');
		pake_echo_comment("PakeTask generating the source files for a new contact model.");
		pake_echo_comment("Parameters accepted:");
		pake_echo_comment("\t<contact> <model> [<package>]");
		pake_echo_comment("example: surface-contact-create NewContact PhysicalPerson1 [lib.model.contact]");
		exit();
	}

	/*Vérification des arguments*/
	$type = array(
		'PhysicalPerson1' => '1',
		'PhysicalPerson2' => '2',
		'PhysicalPerson3' => '3',
		'PhysicalPerson4' => '4',
		'PhysicalPerson5' => '5',
		'MoralPerson1' => '101',
		'MoralPerson2' => '102',
		'MoralPerson3' => '103',
		'MoralPerson4' => '104',
		'MoralPerson5' => '105'
		);
	if(count($args) < 2) {
		throw new Exception('Arguments missing');
	}
	if(!isset($type[$args[1]])) {
		throw new Exception('Model ' . $args[1] . ' doesn\'t exist!');
	}

	/*Récuperation des arguments*/
	$class = $args[0];
	$model = $args[1];

	$path = isset($args[2]) ? $args[2] : 'lib.model.contact';
	$path = str_replace('.', DIRECTORY_SEPARATOR, $path);
	$path = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . $path;

	pake_echo_comment("Class \t" . $class);
	pake_echo_comment("Model \t" . $model);
	pake_echo_comment("Path \t" . $path);

	/*Définition des parametres*/
	$params = array(
		'CLASS_NAME'	=> $class,
		'CLASS_MODEL'	=> $model,
		'PEER_NAME'	=> $class . 'Peer',
		'PEER_MODEL'	=> 'ContactPeer',
		'MAP_NAME'	=> $class . 'MapBuilder',
		'MAP_MODEL'	=> 'ContactMapBuilder',
		'TYPE_ID'	=> strtoupper($model),
		'DATE'		=> date('d M Y')
	);

	/*Création des fichiers*/
	pake_echo_action("\tCréation des fichiers ...", '');
	$finder = pakeFinder::type('file')->ignore_version_control()->discard('.sf');
	$dirs = sfLoader::getGeneratorSkeletonDirs('surfaceContact', 'default');
	foreach ($dirs as $dir) {
		if (is_dir($dir)) {
			pake_mirror($finder, $dir, $path);
			break;
		}
	}
	
	/*Personnalisation des fichiers*/
	pake_echo_action("\tPersonalisation des fichiers ...", '');
	$finder = pakeFinder::type('file')->ignore_version_control()->name('class.php', 'peer.php' , 'map.php');
	pake_replace_tokens($finder, $path, '##', '##', $params);

	/*Renomage des fichiers*/
	pake_echo_action("\tFinalisation ...", '');
	$directories = array(
		'class.php' => $class . '.php',
		'peer.php' => $class . 'Peer.php',
		'map.php' => $class . 'MapBuilder.php'
	);
	foreach($directories as $old_name => $new_name) {
		rename($path . DIRECTORY_SEPARATOR . $old_name, $path . DIRECTORY_SEPARATOR . $new_name);
	}

	/*Terminé*/
	pake_echo_action("\tTerminé.", '');

}
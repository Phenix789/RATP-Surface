<?php
/**
 *
 *
 * 
 */
pake_desc('Deploying the i18n folder in application');
pake_task('surface-i18n-deploy', 'project_exists');

function run_surface_i18n_deploy($task, $args) {
	$ds = DIRECTORY_SEPARATOR;
	$sf_root_dir = sfConfig::get('sf_root_dir');
	$sf_app_dir = sfConfig::get('sf_app_dir');
	$sf_i18n_dir = $sf_root_dir . $ds . 'i18n';
	
	if(in_array('-h', $args)) {
		_i18n_help_deploy();
		return false;
	}

	_i18n_initialize();
	$configs = _i18n_get_configs($args);
	foreach($configs as $arg => $config) {
		$finder = pakeFinder::type('directory')->ignore_version_control()->maxdepth(0);
		_i18n_add_exclude_apps($config, $finder);
		$apps = pakeApp::get_files_from_argument($finder, $sf_app_dir, true);

		if($config['force']) {
			_i18n_delete_files($apps, $config['deploy'], $sf_app_dir);
		}

		$default_i18n_file = $sf_i18n_dir . $ds . $config['output'];
		if(is_file($default_i18n_file)) {
			pake_echo_comment('Fichier de traduction trouvé :');
			pake_echo_action('Projet', $config['output']);
		}
		else {
			pake_echo_action('Erreur', 'Aucun fichier de traduction trouvé.');
			return false;
		}

		pake_echo_comment('Copie des fichiers de traductions ...');
		foreach($apps as $app) {
			pake_echo_comment('Application : ' . $app);
			$sf_app_i18n_dir = $sf_app_dir . $ds . $app . $ds . 'i18n';
			$local_i18n_file = $sf_app_i18n_dir . $ds . $config['input'];
			if(is_file($local_i18n_file)) {
				pake_echo_action('Local', 'Fichier de traduction local trouvé : ' . $config['input']);
				$file_compile = array();
				_i18n_compile_i18n_files(array($default_i18n_file, $local_i18n_file), $file_compile);
				_i18n_reconstruct_file($file_compile);
				pake_echo_action('Fichier', 'Ecriture dans le fichier ' . $config['deploy']);
				$file = fopen($sf_app_i18n_dir . $ds . $config['deploy'], 'w');
				fwrite($file, $file_compile);
				fclose($file);
			}
			else {
				copy($default_i18n_file, $sf_app_i18n_dir . $ds . $config['deploy']);
				pake_echo_action('Copie', $app . ":\t" . $config['deploy'] . ' copié.');
			}
		}
	}
}

/******************************************************************************/

pake_desc('Compile all i18n\'s files');
pake_task('surface-i18n-compile', 'project_exists');

function run_surface_i18n_compile($task, $args) {
	$ds = DIRECTORY_SEPARATOR;
	$sf_root_dir = sfConfig::get('sf_root_dir');
	$sf_plugins_dir = sfConfig::get('sf_plugins_dir');
	$sf_app_dir = sfConfig::get('sf_app_dir');
	$sfc_plugin_dir = $sf_plugins_dir . $ds . 'surfaceCorePlugin' . $ds . 'project' . $ds . 'plugins';

	if(in_array('-h', $args)) {
		_i18n_help_compile();
		return false;
	}

	_i18n_initialize();
	$configs = _i18n_get_configs($args);
	foreach($configs as $arg => $config) {
		pake_echo_comment('Compilation des fichiers de traduction i18n pour la config : ' . $arg);
		$finder = pakeFinder::type('file')->ignore_version_control();
		$finder->name($config['input']);
		$finder->maxdepth(2);

		$file_compile = array();

		$plugin_i18n_files = array_merge(
			pakeApp::get_files_from_argument($finder, $sf_plugins_dir, false),
			pakeApp::get_files_from_argument($finder, $sfc_plugin_dir, false)
		);
		_i18n_compile_i18n_files($plugin_i18n_files, $file_compile);

		$root_i18n_files = pakeApp::get_files_from_argument($finder, $sf_root_dir, false);
		_i18n_compile_i18n_files($root_i18n_files, $file_compile);

		_i18n_reconstruct_file($file_compile);

		_i18n_create_directory($sf_root_dir);

		pake_echo_action('Fichier', 'Ecriture dans le fichier ' . $config['output']);
		$file = fopen($sf_root_dir . $ds . 'i18n' . $ds . $config['output'], 'w');
		fwrite($file, $file_compile);
		fclose($file);
	}
}

/******************************************************************************/
		/******************/
		/* Configurations */
		/******************/
/******************************************************************************/

function _i18n_initialize() {
	$config_handler = new sfDefineEnvironmentConfigHandler();
	$config_handler->initialize(array ('prefix' => 'app_'));
	$finder = pakeFinder::type('file')->ignore_version_control();
	$finder->name('app.yml');
	$finder->maxdepth(2);
	$config_files = array_merge(
			pakeApp::get_files_from_argument($finder, sfConfig::get('sf_root_dir')),
			pakeApp::get_files_from_argument($finder, sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . 'sfci18nPlugin')
		);
	$config = $config_handler->execute($config_files);
	$config = substr($config, 5);
	eval($config);
}

function _i18n_get_configs($args) {
	if(count($args) == 0) {
		_i18n_help_compile();
	}
	$configs = array();
	foreach($args as $arg) {
		$config = array(
			'input' => $arg . '.xml',
			'output' => 'compile.' . $arg . '.xml',
			'deploy' => 'messages.' . $arg . '.xml',
			'force' => false,
			'exclude' => array()
		);
		$config = array_merge($config, sfConfig::get('app_i18n_' . $arg));
		if($config) {
			$configs[$arg] = $config;
		}
		else {
			pake_echo_action('Erreur', 'Aucune configuration trouvé pour : ' . $arg);
		}
	}
	return $configs;
}

/******************************************************************************/
		/***************/
		/* Preparation */
		/***************/
/******************************************************************************/

function _i18n_add_exclude_apps($config, $finder) {
	foreach($config['exclude'] as $exclude) {
		$finder->not_name($exclude);
	}
}

function _i18n_delete_files($apps, $file_name, $sf_app_dir) {
	$ds = DIRECTORY_SEPARATOR;
	pake_echo_comment('Suppression des fichiers de traductions ...');
	foreach($apps as $app) {
		$path_dir = $sf_app_dir . $ds . $app . $ds . 'i18n';
		$file = $path_dir . $ds . $file_name;
		if(is_dir($path_dir) && is_file($file)) {
			unlink($file);
			pake_echo_action('Supprime', $file_name . ' de l\'application : ' . $app);
		}
	}
}

/******************************************************************************/
		/***************/
		/* Compilation */
		/***************/
/******************************************************************************/

function _i18n_compile_i18n_files($files, &$file_compile) {
	foreach($files as $file) {
		pake_echo_action('Compile', $file);
		$xml = simplexml_load_file($file);
		$namespace = _i18n_get_file_namespace($file);
		foreach($xml->xpath('file/body/trans-unit') as $value) {
			$trans_unit = array();
			$trans_unit['namespace'] = _i18n_get_namespace($value, $namespace);
			$trans_unit['source'] = (string) $value->source;
			$trans_unit['target'] = (string) $value->target;
			_i18n_insert_in_file_compile($trans_unit, $file_compile);
		}
	}
}

function _i18n_insert_in_file_compile($trans_unit, &$file_compile, $index = null) {
	if(!$index) { $index = sfInflector::camelize($trans_unit['source']); }
	if(isset($file_compile[$index])) {
		if($trans_unit['source'] == $file_compile[$index]['source']) {
			$file_compile[$index] = $trans_unit;
		}
		else {
			_i18n_insert_in_file_compile($trans_unit, $file_compile, $index . '_');
		}
	}
	else {
		$file_compile[$index] = $trans_unit;
	}
}

function _i18n_get_file_namespace($file) {
	$file = explode(DIRECTORY_SEPARATOR, $file);
	$count = count($file);
	if($count - 3 >= 0) {
		return $file[$count-3];
	}
	return 'default';
}

function _i18n_get_namespace($value, $namespace) {
	$attributs = $value->attributes();
	if(isset($attributs['namespace'])) {
		return $attributs['namespace'];
	}
	return $namespace;
}

function _i18n_reconstruct_file(&$file) {
	$header =
'<?xml version="1.0" ?>
<xliff version="1.0">
<file orginal="global" source-language="en_US" datatype="plaintext">
	<body>';
	$footer =
	'
	</body>
</file>
</xliff>';
	$entries = array();
	foreach($file as $entry) {
		$entries[] = "\n\t\t<trans-unit namespace=\"" . $entry['namespace'] . "\"><source>" . $entry['source'] . "</source><target>" . $entry['target'] . "</target></trans-unit>";
	}
	$file = $header . implode('', $entries) . $footer;
}

/******************************************************************************/
		/***********************/
		/* Création du dossier */
		/***********************/
/******************************************************************************/

function _i18n_create_directory($dir) {
	$i18n_dir = $dir . DIRECTORY_SEPARATOR . 'i18n';
	if(!is_dir($i18n_dir)) {
		$mk = mkdir($i18n_dir);
		pake_echo_action('mkdir', 'Création du dossier i18n : ' . $dir . ' => ' . $mk ? 'OK' : 'Erreur');
	}
	return true;
}

/******************************************************************************/
		/********/
		/* Aide */
		/********/
/******************************************************************************/

function _i18n_help_deploy() {
	pake_echo_comment("Aide pour la tache surface-i18n-deploy");
	pake_echo_action('Aide', "Déploie les fichiers de traduction dans les applications");
	pake_echo_comment("Il est necessaire de spécifier les environnements a deployer.");
	_i18n_help();
}

function _i18n_help_compile() {
	pake_echo_comment("Aide pour la tache surface-i18n-compile");;
	pake_echo_action('Aide', "Compile les fichiers de traduction en un seul");
	pake_echo_comment("Il est necessaire de spécifier les environnements a compiler.");
	_i18n_help();
}

function _i18n_help() {
	pake_echo("Il est possible de personnalisé chaque environnement a l'aide du fichier de configuration app.yml.");
	pake_echo("Ces configurations sont a appliquer sous les directives:\nall:\n  i18n:\n    <environnement>:");
	pake_echo("5 options sont acceptées :");
	pake_echo_action("input", "Les fichiers d'entrés");
	pake_echo_action("output", "Le fichier de sortie");
	pake_echo_action("deploy", "Le nom du fichier une fois déployé");
	pake_echo_action("force", "Force la suppression des fichiers deja existant");
	pake_echo_action("exclude", "Les applications a exclure lors du deploiment");
}

/******************************************************************************/
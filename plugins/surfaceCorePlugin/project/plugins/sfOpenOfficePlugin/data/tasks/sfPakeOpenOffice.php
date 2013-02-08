<?php
pake_desc('create a new document template');
pake_task('ooffice-create-document', 'project_exists');

function run_ooffice_create_document($task, $args) {
	if(count($args) < 1) {
		throw new Exception('You must provide your app name.');
	}

	if(count($args) < 2) {
		throw new Exception('You must provide your module name.');
	}

	if(count($args) < 3) {
		throw new Exception('You must provide your template name.');
	}

	$app = $args[0];
	$module = $args[1];
	$document = $args[2];

	preg_match('/^(\w+)\.(\w+)$/', $document, $matches);

	if(!isset($matches[1]) or !isset($matches[2])) {
		throw new Exception('You must provide a valid filename (with an extension)');
	}

	// Assume the document is in an application
	$app_dir = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . sfConfig::get('sf_apps_dir_name') . DIRECTORY_SEPARATOR . $app;

	if(!is_dir($app_dir)) {
		// Maybe its in a plugin
		$app_dir = sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . $app;

		if(!is_dir($app_dir)) {
			// something failed
			throw new Exception("The application or plugin $app doesn't exists");
		}
	}

	$moduleDir = $app_dir . DIRECTORY_SEPARATOR . sfConfig::get('sf_app_module_dir_name') . DIRECTORY_SEPARATOR . $module;

	if(!is_dir($moduleDir)) {
		throw new Exception("The module $module doesn't exists");
	}

	// load plugin config (sfLoad::loadPluginConfig fails for some reason. maybe because there is no environment or application defined)
	include(sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . 'sfOpenOfficePlugin' . DIRECTORY_SEPARATOR . sfConfig::get('sf_config_dir_name') . DIRECTORY_SEPARATOR . 'config.php');

	$name = $matches[1];
	$extension = $matches[2];

	$modulePath = $moduleDir . DIRECTORY_SEPARATOR;
	$documentsPath = $modulePath . sfConfig::get('sf_app_module_document_dir_name') . DIRECTORY_SEPARATOR;
	$documentPath = $documentsPath . $matches[0];

	// TODO check for other documents with the same name

	//pake_echo_action('loading', $documentPath);

	$template = null;
	switch($extension) {
		case 'odt' :
		case 'ods' : $template = new sfOpenOfficeTemplateOdt(null, null, null);
			break;
		case 'php' :
		case 'html': $template = new sfOpenOfficeTemplateHtml(null, null, null);
			break;
	}

	if($template) {
		$template->createTemplate($app, $module, $name, $extension);
	}
}

pake_desc('add macro to openoffice installation (this task must be run as superuser)');
pake_task('ooffice-system-setup');

function run_ooffice_system_setup($task, $args) {
	pake_echo_action('Setting up xvfb service... ', '');
	if(!file_exists('/etc/init.d/xvfb')) {
		pake_copy(sfConfig::get('sf_plugins_dir') . '/sfOpenOfficePlugin/data/scripts/xvfb',
			'/etc/init.d/xvfb',
			array('override' => true));
		pake_chmod('xvfb', '/etc/init.d', 0755);
		pake_sh("update-rc.d xvfb defaults");
		pake_echo_action('xvfb+', 'Service added.');

		pake_sh("/etc/init.d/xvfb start");
		pake_echo_action('xvfb+', 'Service launched.');
	}
	else {
		pake_echo_action('xvfb', 'Service already setup... skipped !');
	}

	$macro_filename = 'Convert.xba';
	$plugin_macro_path = sfConfig::get('sf_plugins_dir') . DIRECTORY_SEPARATOR . 'sfOpenOfficePlugin' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'oo_macro' . DIRECTORY_SEPARATOR . $macro_filename;

	pake_echo_action('Locating OpenOffice directory... ', '');

	$paths_linux = glob('/usr/lib/openoffice/*/presets/basic/Standard', GLOB_ONLYDIR);
	$paths_linux[] = '/usr/lib/openoffice/presets/basic/Standard';
    $libreoffice_paths_linux = glob('/usr/lib/libreoffice/presets/basic/Standard', GLOB_ONLYDIR);
        
        $paths_linux = array_merge($paths_linux, $libreoffice_paths_linux);
        
	$paths_osx = glob('/Applications/OpenOffice.org.app/Contents/*/presets/basic/Standard', GLOB_ONLYDIR);
	$paths_osx[] = 'Applications/OpenOffice.org.app/Contents/presets/basic/Standard';

	$paths = array_merge($paths_linux, $paths_osx, $libreoffice_paths_linux);

	foreach($paths as $openoffice_path) {
		if(is_dir($openoffice_path) && file_exists($openoffice_path) && is_readable($openoffice_path)) {
			pake_echo_action('Updating OpenOffice', $openoffice_path);

			// Copy macro to OpenOffice directory
			pake_copy($plugin_macro_path, $openoffice_path . DIRECTORY_SEPARATOR . $macro_filename, array('override' => true));

			// Update OpenOffice list of macros
			$content = file_get_contents($openoffice_path . DIRECTORY_SEPARATOR . 'script.xlb');
			if($content !== FALSE) {
				if(strstr($content, "library:name=\"Convert\"") === FALSE) {
					// pake_echo($content);
					$content = str_replace("</library:library>",
							" <library:element library:name=\"Convert\"/>\r\n</library:library>",
							$content);
					file_put_contents($openoffice_path . DIRECTORY_SEPARATOR . 'script.xlb', $content);
					pake_echo_action('macro+ ', 'Macro declared in ' . $openoffice_path . DIRECTORY_SEPARATOR . 'script.xlb');
					// pake_echo($content);
				}
				else {
					pake_echo_action('macro ', 'Macro already declared in ' . $openoffice_path . DIRECTORY_SEPARATOR . 'script.xlb... skipped !');
				}
			}
		}
	}

	// Clean Apache2 openoffice configuration
	pake_echo_action("Cleaning www-data's OpenOffice setup directory... ", '');
	@pake_deltree('/var/www/openoffice');
	pake_mkdirs('/var/www/openoffice', 0775);
	pake_chmod('openoffice', '/var/www', 0775);
	pake_chown('openoffice', '/var/www', 'www-data', 'www-data');
}

function pake_chown($arg, $target_dir, $owner, $group = null) {
	$files = pakeApp::get_files_from_argument($arg, $target_dir, true);

	foreach($files as $file) {
		if($group) {
			pake_echo_action(sprintf('chown %s:%s', $owner, $group), $target_dir . DIRECTORY_SEPARATOR . $file);
			chgrp($target_dir . DIRECTORY_SEPARATOR . $file, $group);
		}
		else {
			pake_echo_action(sprintf('chown %s', $owner), $target_dir . DIRECTORY_SEPARATOR . $file);
		}
		chown($target_dir . DIRECTORY_SEPARATOR . $file, $owner);
	}
}

pake_desc('create all documents templates');
pake_task('ooffice-create-all', 'project_exists');

/**
 * @brief Tache générant tout les documents du projet (plugin exclue)
 * @param pakeTask $task Tache
 * @param array $args Argument passé, aucun n'est necessaire.
 * @author Claude <claude@elogys.fr>
 * @date 23 fév 2010
 * 
 */
function run_ooffice_create_all($task, $args) {
	if($args && $args[0] == 'view') {
		$view = true;
	}
	else {
		$view = false;
	}
	
	$apps = sfConfig::get('sf_root_dir') . '/apps/*/modules/*/documents';
	$plugin = sfConfig::get('sf_root_dir') . '/plugins/*/modules/*/documents';
	$files = pakeFinder::type('file')
		->name('*.odt', '*.ods')
		->in($apps, $plugin)
	;
	$regexp_apps = '#' . sfConfig::get('sf_root_dir') . '/apps/(.*)/modules/(.*)/documents/(.*)' . '#';
	$regexp_plugin = '#' . sfConfig::get('sf_root_dir') . '/plugins/(.*)/modules/(.*)/documents/(.*)' . '#';
	$i = 0;
	$text = 'TEMPLATE' . str_repeat(' ', 32) . 'APPS/PLUGIN' . str_repeat(' ', 14) . 'MODULE' . str_repeat(' ', 19);
	pake_echo_comment($text);
	foreach($files as $file) {
		if(preg_match($regexp_apps, $file, $matches)) {
			$app = $matches[1];
			$module = $matches[2];
			$template = $matches[3];
		}
		if(preg_match($regexp_plugin, $file, $matches)) {
			$app = $matches[1];
			$module = $matches[2];
			$template = $matches[3];
		}
		try {
			$text = "";
			$text .= $template;
			$text .= str_repeat(' ', max(40 - strlen($text), 0));
			$text .= $app;
			$text .= str_repeat(' ', max(65 - strlen($text), 0));
			$text .= $module;
			pake_echo_comment($text);
			if(!$view) {
				run_ooffice_create_document($task, array($app, $module, $template));
			}
			$i++;
		}
		catch(Exception $e) {
			pake_echo_comment($e);
		}
	}
	pake_echo_comment($i . '/' . count($files) . ' templates déployés.');
}
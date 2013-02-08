<?php

pake_desc('Surface project deploiement');
pake_task('surface-init', 'project_exists');

function run_surface_init($task, $args) {
	$bForceOverwrite = false;

	if (count($args) > 1) {
		throw new Exception('The only option is \'force\' to overwrite files and directories.');
	} else if (count($args) == 1) {
		if ($args[0] == 'force') {
			$bForceOverwrite = true;
		} else {
			throw new Exception('The only option is \'force\' to overwrite files and directories.');
		}
	}

	$root_dir = sfConfig::get('sf_root_dir');
	$plugins_dir = '.' . DIRECTORY_SEPARATOR . 'plugins'; //sfConfig::get('sf_plugins_dir');
	$surface_root_dir = $plugins_dir . DIRECTORY_SEPARATOR . 'surfaceCorePlugin' . DIRECTORY_SEPARATOR . 'project';

	// Plugins deploiement
	pake_echo_action('+ Surface deploying plugins... ', '');
	$surface_plugins_dir = $surface_root_dir . DIRECTORY_SEPARATOR . 'plugins';
	pake_safe_symlink_directories($surface_plugins_dir, $plugins_dir, $bForceOverwrite);

	// Files templates deploiement
	pake_echo_action('+ Surface deploying templates... ', '');
	pake_deploy_template($surface_root_dir . DIRECTORY_SEPARATOR . 'config/propel.ini.template', $root_dir . DIRECTORY_SEPARATOR . 'config/propel.ini');
	pake_deploy_template($surface_root_dir . DIRECTORY_SEPARATOR . 'config/databases.yml.template', $root_dir . DIRECTORY_SEPARATOR . 'config/databases.yml');
	pake_deploy_template($surface_root_dir . DIRECTORY_SEPARATOR . 'config/properties.ini.template', $root_dir . DIRECTORY_SEPARATOR . 'config/properties.ini');
}

pake_desc('Surface project deploiement and model builder');
pake_task('surface-init-all', 'project_exists');

function run_surface_init_all($task, $args) {
	if (in_array('-clean', $args)) {
		// Surface propel clean
		$subTask = pakeTask::get('surface-propel-clean');
		$subTask->execute(array('-all'), null);
	}

	// Symfony cc
	$subTask = pakeTask::get('clear-cache');
	$subTask->execute(array(), null);

	// Surface init
	$subTask = pakeTask::get('surface-init');
	$subTask->execute(array(), null);

	// Surface errors deploy
	$subTask = pakeTask::get('surface-errors-deploy');
	$subTask->execute(array(), null);
    
	// Surface sfassets deploy
	$subTask = pakeTask::get('surface-sfassets-deploy');
	$subTask->execute(array(), null);

	// Plugin web deploy
	$subTask = pakeTask::get('plugin-web-deploy');
	$subTask->execute(array(), null);

	// Build model
	$subTask = pakeTask::get('surface-build-model');
	$subTask->execute(array(), null);

	// Build sql
	$subTask = pakeTask::get('surface-build-sql');
	$subTask->execute(array(), null);

	// Create ooffice documents
	$subTask = pakeTask::get('ooffice-create-all');
	$subTask->execute(array(), null);
}

pake_desc('Surface errors templates deploy');
pake_task('surface-errors-deploy', 'project_exists');

function run_surface_errors_deploy($task, $args) {
	$origine = 'plugins/surfaceCorePlugin/templates/errors';
	$destination = sfConfig::get('sf_web_dir') . '/errors';

	if (file_exists($destination)) {
		pake_echo_action('Delete', 'Existing folder\'s errors.');
		unlink($destination);
	}
	if (file_exists($origine) && !file_exists($destination)) {
		pake_echo_action('Deploy', 'Template errors.');
		pake_symlink('../' . $origine, $destination);
	} else {
		pake_echo_action('Deploy', 'Symlink impossible!');
	}
}


pake_desc('Symfony sfassets deploy');
pake_task('surface-sfassets-deploy', 'project_exists');

function run_surface_sfassets_deploy($task, $args) {
	$origine = 'plugins/surfaceCorePlugin/symfony/data/web/sf';
	$destination = sfConfig::get('sf_web_dir') . '/sf';

	if (file_exists($destination)) {
		pake_echo_action('Delete', 'Existing folder\'s sf assets.');
		unlink($destination);
	}
	if (file_exists($origine) && !file_exists($destination)) {
		pake_echo_action('Deploy', 'Symfony assets.');
		pake_symlink('../' . $origine, $destination);
	} else {
		pake_echo_action('Deploy', 'Symlink impossible!');
	}
}

pake_desc('Clean propel generate files.');
pake_task('surface-propel-clean', 'project_exists');

function run_surface_propel_clean($task, $args) {
	$finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml', '*schema.sql')->in(getcwd() . '/data/propel', getcwd() . '/data/sql');
	pake_echo_action('Delete', 'Clean data/propel and data/sql directories ...');
	foreach ($finder as $file) {
		unlink($file);
	}
	pake_echo_comment('Done');
	if (in_array('-all', $args)) {
		pake_echo_action('Delete', 'Clean all propel om and map files generated ...');
		$finder = pakeFinder::type('any')->ignore_version_control()->name('om', 'map')->in(getcwd());
		$ignored = array('.', '..', '.svn');
		foreach ($finder as $directory) {
			foreach (scandir($directory) as $file) {
				if (!in_array($file, $ignored)) {
					unlink($directory . DIRECTORY_SEPARATOR . $file);
				}
			}
			rmdir($directory);
		}
		pake_echo_comment('Done');
	}
}

function pake_safe_symlink_directories($origin_dir, $dest_dir, $bForceOverwrite = false) {
	if (file_exists($origin_dir)) {
		$plugins = scandir($origin_dir);
		if ($plugins !== FALSE) {
			foreach ($plugins as $plugin) {
				if (($plugin != '..') && ( $plugin != '.') && ( $plugin != '.svn') && ( $plugin != 'surfaceCorePlugin')
						&& is_dir($origin_dir . DIRECTORY_SEPARATOR . $plugin)) {
					if (!file_exists($dest_dir . DIRECTORY_SEPARATOR . $plugin)
							|| is_link($dest_dir . DIRECTORY_SEPARATOR . $plugin)) {
						pake_symlink('..' . DIRECTORY_SEPARATOR . $origin_dir . DIRECTORY_SEPARATOR . $plugin, $dest_dir . DIRECTORY_SEPARATOR . $plugin, true);
					} else {
						// plugin already exist and is not a link
						if ($bForceOverwrite) {
							pake_deltree($dest_dir . DIRECTORY_SEPARATOR . $plugin);
							pake_symlink('..' . DIRECTORY_SEPARATOR . $origin_dir . DIRECTORY_SEPARATOR . $plugin, $dest_dir . DIRECTORY_SEPARATOR . $plugin, true);
						} else {
							// we don't override it
							pake_echo_action('skip', $dest_dir . DIRECTORY_SEPARATOR . $plugin);
							pake_echo_comment(sprintf('%s already exists as a directory, check for modification inside to see if it can be override !', $plugin));
						}
					}
				}
			}
		}
	}
}

function pake_deltree($path, $bFirst = true) {
	$files = scandir($path);
	if ($files !== FALSE) {
		foreach ($files as $sf) {
			if (($sf != '..') && ( $sf != '.')) {
				if (is_dir($path . DIRECTORY_SEPARATOR . $sf) && !is_link($path . DIRECTORY_SEPARATOR . $sf)) {
					pake_deltree($path . DIRECTORY_SEPARATOR . $sf, false);
					rmdir($path . DIRECTORY_SEPARATOR . $sf);
				} else {
					unlink($path . DIRECTORY_SEPARATOR . $sf);
				}
			}
		}
	}

	if ($bFirst)
		pake_remove($path, '');
}

function pake_deploy_template($template_filename, $output_filename) {

	if (!file_exists($output_filename) || ( file_get_contents($output_filename) == '')) {
		pake_echo_action('deploy+', $output_filename);
		$contents = file_get_contents($template_filename);

		$project_name = substr(strrchr(sfConfig::get('sf_root_dir'), DIRECTORY_SEPARATOR), 1);
		;
		$vars = array("<project_path>" => sfConfig::get('sf_root_dir'),
			"<project_name>" => $project_name,
			"<database_name>" => $project_name,
		);

		$contents = str_replace(array_keys($vars), array_values($vars), $contents);

		file_put_contents($output_filename, $contents);
	}
}

pake_desc('Clean all generator.yml files.');
pake_task('clean-yml', 'project_exists');

function run_clean_yml($task, $args) {
	$finder = pakeFinder::type('file')->ignore_version_control()->name('*.yml')->in('apps', 'config', 'plugins/commonModulesPlugin');
	pake_echo_action('Cleaning YML', 'in /apps, /config and /plugins/commonModulesPlugin');
	foreach ($finder as $file) {
		cleanup_yml_file($file);
	}
	pake_echo_action('Cleaning YML', 'Success !');
}

function cleanup_yml_file($filename) {
	$TABSIZE = 2;
	if (!isset($filename)) {
		pake_echo_action("Error", "You must set 'filename'");
		return false;
	}
	if (!file_exists($filename)) {
		pake_echo_action("Error", "Unable to find {$filename}");
		return false;
	}
	$lines = file($filename);
	$max_length = 40;
	$final_lines = array();
	foreach ($lines as $line) {
		$newline = array('key' => rtrim(preg_filter('/^(\s*[^:]*:).*$/', '$1', $line)), 'value' => trim(preg_filter('/^\s*[^:]*:?\s*(.*)$/', '$1', $line)));
		if (!$newline['key'] && !$newline['value']) {
			$newline['key'] = $line;
		}
		$newline['key'] = str_replace("\t", '  ', $newline['key']);
		if ($newline['value']) {
			$count = strlen($newline['key']);
			if ($count > 40) {
				$max_length = $count + $TABSIZE;
			}
		}
		$final_lines[] = $newline;
	}
	$lines = '';
	foreach ($final_lines as $line) {
		if ($line['value']) {
			$lines .= sprintf("% -{$max_length}s%s\n", $line['key'], $line['value']);
		} else {
			$lines .= rtrim($line['key']) . "\n";
		}
	}
	//echo $lines;exit;
	file_put_contents($filename, $lines);
	pake_echo_action("YML cleaned :", $filename);
	return true;
}

pake_desc('Migrate lib classes to Propel 1.6');
pake_task('migrate-propel-project', 'project_exists');

function run_migrate_propel_project($task, $args) {
	$finder = pakeFinder::type('file')->ignore_version_control()->name('*.php')->in('lib/model');
	pake_echo_action('Propel migration', 'in /lib');
	foreach ($finder as $file) {
		migrate_propel_file($file);
	}
	pake_echo_action('Propel migration', 'Success !');
}

pake_desc('Migrate plugins classes to Propel 1.6');
pake_task('migrate-propel-plugins', 'project_exists');

function run_migrate_propel_plugins($task, $args) {
	$finder = pakeFinder::type('file')->ignore_version_control()->name('*.php')->in('plugins/*/lib/model');
	pake_echo_action('Propel migration', 'in /plugins/*/lib');
	foreach ($finder as $file) {
		migrate_propel_file($file);
	}
	pake_echo_action('Propel migration', 'Success !');
}

function migrate_propel_file($filename) {
	if (!isset($filename)) {
		pake_echo_action("Error", "You must set 'filename'");
		return false;
	}
	if (!file_exists($filename)) {
		pake_echo_action("Error", "Unable to find {$filename}");
		return false;
	}
	$replacement = migrate_propel_replacements(array(
		'function reload($deep = false, PropelPDO $con = null)',
		'function delete(PropelPDO $con = null)',
		'function save(PropelPDO $con = null)',
		'function doSave(PropelPDO $con = null)',
		'static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)',
		'static function doSelectOne(Criteria $criteria, PropelPDO $con = null)',
		'static function doSelect(Criteria $criteria, PropelPDO $con = null)',
		'static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)',
		'static function doInsert($values, PropelPDO $con = null)',
		'static function doUpdate($values, PropelPDO $con = null)',
		'static function doDelete($values, PropelPDO $con = null)',
		'static function retrieveByPK($pk, PropelPDO $con = null)',
		'static function retrieveByPKs($pks, PropelPDO $con = null)',
			));
	$lines = file($filename);
	$total = 0;
	foreach ($lines as &$line) {
		$line = preg_replace(array_keys($replacement), array_values($replacement), $line, -1, $count);
		$total += $count;
	}
	if ($total) {
		file_put_contents($filename, implode('', $lines));
		pake_echo_action("Changed $total lines :", $filename);
	}
	return true;
}

function migrate_propel_replacements(array $options) {
	$final;
	foreach ($options as $option) {
		$final['/' . str_replace(array('$', '(', ')', 'PropelPDO', '  ', ' '), array('\$', ' \( ', ' \) ', '', ' ', '\s*'), $option) . '/'] = $option;
	}
	return $final;
}

pake_desc('Create fake action classes to help Netbeans autocompletion');
pake_task('create-fake-actions', 'project_exists');

function run_create_fake_actions($task, $args) {
	$finder = pakeFinder::type('file')->ignore_version_control()->name('actions.class.php')->in('apps');
	pake_echo_action('Creating fake actions', count($finder) . ' files found');
	foreach ($finder as $file) {
		$new_file = dirname($file) . '/autoactions.class.php';
		$module_name = basename(dirname(dirname($file)));
		if (file_exists($new_file)) {
			continue;
		}
		@file_put_contents($new_file, "<?php\n/**\n * Fake class to help Netbeans autocompletion of actions\n */\nclass auto{$module_name}Actions extends sfSurfaceActions{\n\n}\n");
		pake_echo_comment('Added : ' . $new_file);
	}
	pake_echo_action('Creating fake actions', 'Success !');
}

pake_desc('Check first lines of files to trim blank line before first php tag');
pake_task('check-blank-first-lines', 'project_exists');

function run_check_blank_first_lines($task, $args) {
	$finder = pakeFinder::type('file')->ignore_version_control()->name('*.php')->prune('template*')->in('.');
	pake_echo_action('Checking PHP files for blank line before first php tag', count($finder) . ' files found');
	foreach ($finder as $file) {
		$fh = fopen($file, 'r');
		if (!trim(fgets($fh))) {
			pake_echo_comment('Warning ! First line is blank in : ' . $file);
		}
	}
	pake_echo_action('Checking', 'Done');
}

pake_desc('link or copy plugins web data to web directory');
pake_task('plugin-web-deploy', 'project_exists');

function run_plugin_web_deploy($task, $args) {
	$bCopy = false;

	if (count($args) > 1) {
		throw new Exception('The only option is \'copy\' to copy instead of link directories.');
	} else if (count($args) == 1) {
		if ($args[0] == 'copy') {
			$bCopy = true;
		} else {
			throw new Exception('The only option is \'copy\' to copy instead of link directories.');
		}
	}

	$root_dir = sfConfig::get('sf_root_dir');
	$plugins_dir = '.' . DIRECTORY_SEPARATOR . 'plugins'; //sfConfig::get('sf_plugins_dir');
	$web_dir = sfConfig::get('sf_web_dir');

	$plugins = scandir($plugins_dir);
	if ($plugins !== FALSE) {
		foreach ($plugins as $plugin) {
			if (($plugin != '..') && ( $plugin != '.')
					&& is_dir($plugins_dir . DIRECTORY_SEPARATOR . $plugin . DIRECTORY_SEPARATOR . 'web')) {
				pake_echo_action('deploying', $plugin);
				if ($bCopy) {
					$finder = pakeFinder::type('any')->ignore_version_control();
					pake_mirror($finder, $plugins_dir . DIRECTORY_SEPARATOR . $plugin . DIRECTORY_SEPARATOR . 'web', $web_dir . DIRECTORY_SEPARATOR . $plugin);
				} else {
					pake_symlink('..' . DIRECTORY_SEPARATOR . $plugins_dir . DIRECTORY_SEPARATOR . $plugin . DIRECTORY_SEPARATOR . 'web', $web_dir . DIRECTORY_SEPARATOR . $plugin, true);
				}
			}
		}
	}
}

pake_desc('synchronize project on windows plateform (ie: rsync unavailable)');
pake_task('sync-windows', 'project_exists');

function run_sync_windows($task, $args) {
	$target = '';

	if (count($args) == 0) {
		throw new Exception('Usage sync-windows target-dir [go]');
	}
	if (count($args) >= 1) {
		$target = realpath($args[0]);
	}
	else
		throw new Exception("No target path specified !");

	$bSimulate = (isset($args[1]) && ( $args[1] == 'go')) ? false : true;

	if (is_dir($target)) {
		$root_dir = sfConfig::get('sf_root_dir');

		$finder = pakeFinder::type('any')->ignore_version_control();
		$exclude = sync_windows_parse_rsync_exclude();
		// $finder = $finder->not_name($exclude);
		// $finder = $finder->discard($exclude)->prune($exclude);
		// $finder = $finder->discard($exclude);
		// $finder = $finder->not_name('properties.ini');  => ok
		// $finder = $finder->discard('config')->prune('config');

		sync_windows_mirror($finder, $root_dir, $target, array('simulate' => $bSimulate,
			'exclude' => $exclude));
	} else {
		throw new Exception("Path \'$target\' doesn't exist...");
	}
}

function sync_windows_parse_rsync_exclude() {
	$filenames = array();

	$hFile = fopen(sfConfig::get('sf_config_dir') . DIRECTORY_SEPARATOR . 'rsync_exclude.txt', 'r');
	if ($hFile) {
		while (!feof($hFile)) {
			$name = fgets($hFile);
			$name = trim($name);
			$name = trim($name, "/");
			$name = trim($name, "\\*");
			$filenames[] = $name;
			// $filenames[] = pakeGlobToRegex::glob_to_regex($name);
		}

		fclose($hFile);
	}

	return $filenames;
}

function sync_windows_mkdirs($path, $mode = 0777, $options = array()) {
	if (is_dir($path)) {
		return true;
	}

	pake_echo_action('dir+', $path);

	if (!array_key_exists('simulate', $options) || ( $options['simulate'] != true)) {
		return @mkdir($path, $mode, true);
	} else {
		return true;
	}
}

function sync_windows_copy($origin_file, $target_file, $options = array()) {
	if (!array_key_exists('override', $options)) {
		$options['override'] = false;
	}

	// we create target_dir if needed
	if (!is_dir(dirname($target_file))) {
		sync_windows_mkdirs(dirname($target_file));
	}

	$most_recent = false;
	if (file_exists($target_file)) {
		$stat_target = stat($target_file);
		$stat_origin = stat($origin_file);
		$most_recent = ($stat_origin['mtime'] > $stat_target['mtime']) ? true : false;
	}

	if ($options['override'] || !file_exists($target_file) || $most_recent) {
		pake_echo_action('file+', $target_file);
		if (!array_key_exists('simulate', $options) || ( $options['simulate'] != true)) {
			copy($origin_file, $target_file);
		}
	}
}

function sync_windows_symlink($origin_dir, $target_dir, $copy_on_windows = true, $options = array()) {
	if (!function_exists('symlink') && $copy_on_windows) {
		$finder = pakeFinder::type('any')->ignore_version_control();
		sync_windows_mirror($finder, $origin_dir, $target_dir, $options);
		return;
	}

	$ok = false;
	if (is_link($target_dir)) {
		if (readlink($target_dir) != $origin_dir) {
			if (!array_key_exists('simulate', $options) || ( $options['simulate'] != true)) {
				unlink($target_dir);
			}
		} else {
			$ok = true;
		}
	}

	if (!$ok) {
		pake_echo_action('link+', $target_dir);
		if (!array_key_exists('simulate', $options) || ( $options['simulate'] != true)) {
			symlink($origin_dir, $target_dir);
		}
	}
}

function sync_windows_mirror($arg, $origin_dir, $target_dir, $options = array()) {
	$files = pakeApp::get_files_from_argument($arg, $origin_dir, true);

	foreach ($files as $file) {
		$bSkip = false;
		if (isset($options['exclude'])) {
			reset($options['exclude']);
			while ((list(, $excludeName) = each($options['exclude'])) && !$bSkip) {
				if (strncmp($file, $excludeName, strlen($excludeName)) == 0) {
					$bSkip = true;
				}
			}
		}

		if (!$bSkip) {
			if (is_dir($origin_dir . DIRECTORY_SEPARATOR . $file)) {
				sync_windows_mkdirs($target_dir . DIRECTORY_SEPARATOR . $file, 0777, $options);
			} else if (is_file($origin_dir . DIRECTORY_SEPARATOR . $file)) {
				sync_windows_copy($origin_dir . DIRECTORY_SEPARATOR . $file, $target_dir . DIRECTORY_SEPARATOR . $file, $options);
			} else if (is_link($origin_dir . DIRECTORY_SEPARATOR . $file)) {
				sync_windows_symlink($origin_dir . DIRECTORY_SEPARATOR . $file, $target_dir . DIRECTORY_SEPARATOR . $file, true, $options);
			} else {
				throw new pakeException(sprintf('Unable to determine "%s" type', $file));
			}
		}
	}
}
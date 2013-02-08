<?php

function pake_surface_initialize($app = null){
	if(!defined('PAKE_SURFACE_INITIALIZE')) {
		$app ? null : $app = 'dashboard';
		pake_echo_action('Initialize', 'Initialisation (application : ' . $app . ').');

		define('PAKE_SURFACE_INITIALIZE', true);
		define('SF_ROOT_DIR', sfConfig::get('sf_root_dir'));
		define('SF_APP', $app);
		define('SF_ENVIRONMENT', 'dev');
		define('SF_DEBUG', true);

		$config_file = SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
		if(file_exists($config_file)) {
			require_once($config_file);
		}
		else {
			throw new pakeException($app . ' doesn\'t exist');
		}

		$databaseManager = new sfDatabaseManager();
		$databaseManager->initialize();
	}
}

function pake_surface_save($object, &$exception = null, $con = null, $options = array()) {
	$method = get('string_method', $options, '__toString');
	$echo = get('echo', $options, true);
	$echo ? pake_echo_action('Saving ', get_class($object) . ' \'' . $object->$method() . '\'') : null;
	try {
		$object->save($con);
		$echo ? pake_echo_comment('Save success with PK : ' . $object->getPrimaryKey()) : null;
		return true;
	}
	catch(Exception $e) {
		$exception = $e;
		$echo ? pake_echo_comment('Error saving : ' . $e->getMesssage()) : null;
		return false;
	}
}

function pake_surface_open_file($filename, $directory = null, $mode = 'r') {
	if(is_null($directory)) {
		$directory = getcwd();
	}
	pake_echo_action('Search', 'File \'' . $filename . '\' in \'' . $directory . '\'');
	$finder = pakeFinder::type('file')->ignore_version_control()->name($filename)->in($directory);
	$count = count($finder);
	if($count == 0) {
		throw new pakeException($filename . ' not found.');
	}
	else if($count > 1) {
		throw new pakeException('Multiple files found. (count : ' . $count . ')');
	}
	else {
		pake_echo_comment('File found');
		return fopen(reset($finder), $mode);
	}
}

function pake_surface_get_argument($index, $args, $default = null, $throw = false, $error = '') {
	if(!isset($args[$index])) {
		if($throw) {
			throw new pakeException($error);
		}
		else {
			return $default;
		}
	}
	return $args[$index];
}

function pake_surface_write_in_file($filename, $content) {
	if($content) {
		if(strpos(DIRECTORY_SEPARATOR, $filename) === false) {
			$filename = getcwd() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'errors' . DIRECTORY_SEPARATOR . $filename;
		}
		pake_mkdirs(dirname($filename));
		$file = fopen($filename, 'w');
		fwrite($file, implode("\n", (array) $content));
		fclose($file);
		pake_echo_action('Rapport', sprintf('Fichier : "%s" in "%s"', basename($filename), dirname($filename)));
	}
}

function pake_surface_dump_from_to($objects, $from, $to = 'propel', $callback = null, $app = 'surface') {
	pake_surface_initialize($app);

	$from_con = Propel::getConnection($from);
	$to_con = Propel::getConnection($to);

	if(!is_null($callback) && !function_exists($callback)) {
		throw new Exception(sprintf('"%s" n\'est pas une fonction valide.', $callback));
	}

	$errors = array();
	foreach($objects as $object => $params) {
		if(is_int($object)) {
			$object = $params;
			$params = null;
		}
		pake_echo_action('Process', sprintf('Traitement de l\'object "%s"', $object));
		$peer = $object . 'Peer';
		$records = call_user_func_array(array($peer, 'doSelect'), array(new Criteria(), $from_con));
		pake_echo_comment(count($records) . ' elements found.');
		foreach($records as $record) {
			$new = new $object();
			$new->fromArray($record->toArray());
			if($callback) {
				$callback($record, $new, $params);
			}
			if(!pake_surface_save($new, $e, $to_con, array('echo' => false))) {
				$primary_key = pake_surface_to_string_primary_key($record);
				pake_echo_action('Error', sprintf('Erreur lors de l\'enregistrement de l\'object (%s : %s).', $object, $primary_key));
				pake_echo($e->getMessage());
				$errors[$object][] = $primary_key;
			}
		}
		unset($records);
	}

	return $errors;
}

function pake_surface_to_string_primary_key($object) {
	return implode('/', (array) $object->getPrimaryKey());
}

function pake_surface_retrieve_by_primary_key($key, $object, $con = null) {
	$peer = $object . 'Peer';
	if(is_string($key)) {
		$key = explode('/', $key);
	}
	return call_user_func_array(array($peer, 'retrieveByPk'), array_merge($key, array($con)));
}

function pake_surface_helper() {
	pake_echo_action('Helper', 'Initialize helper');
	sfLoader::loadHelpers(array('Helper', 'Tag', 'Date'));
	sfLoader::loadHelpers(sfConfig::get('sf_standard_helpers'));
	if($args = func_get_args()) {
		sfLoader::loadHelpers($args);
	}
}
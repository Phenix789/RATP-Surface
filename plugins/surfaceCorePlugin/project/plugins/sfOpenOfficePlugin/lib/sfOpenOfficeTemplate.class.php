<?php
/**
 * 
 * 
 * 
 */
class Mutex {

	protected $mutex_filename = "";
	protected $mutex_handle = FALSE;

	public function __construct($key) {
		$this->mutex_filename = "/tmp/" . $key . ".mutex";
	}

	public function __destruct() {
		$this->release();
	}

	// timeout en milli secondes
	public function acquire($timeout) {
		$bLocked = false;

		$this->mutex_handle = fopen($this->mutex_filename, "w+");
		if($this->mutex_handle !== FALSE) {

			$timeStart = microtime(true);
			do {
				//$wouldblock = false;
				if(flock($this->mutex_handle, LOCK_EX | LOCK_NB)) {
					$bLocked = true;
				}
				else
					usleep(500000);   // 500 ms

			}
			while(!$bLocked && (microtime(true) <= ($timeStart + ($timeout / 1000.00))));
		}

		return $bLocked;
	}

	public function release() {
		if($this->mutex_handle !== FALSE) {
			fclose($this->mutex_handle);
			$this->mutex_handle = FALSE;
		}
	}

}

function xmlspecialchars($value) {

	if(sfConfig::get('app_sfOpenOfficePlugin_xmlconvert_to_utf8') /* mb_internal_encoding() == 'ISO-8859-1' */) {
		$value = str_replace('&#039;', '&apos;', htmlspecialchars(utf8_encode($value), ENT_QUOTES, "UTF-8"));
		// $value = str_replace("\n", "</text:p><text:p>", $value);
		return $value;
	}
	else
		return str_replace('&#039;', '&apos;', htmlspecialchars($value, ENT_QUOTES, "UTF-8"));
}

abstract class sfOpenOfficeTemplate extends sfPHPView {

	public function __construct($context, $moduleName, $actionName) {
		if($context) {
			$this->initialize($context, $moduleName, $actionName, '');
		}
	}

	abstract public function generate($templateVars, $moduleName, $templateBasename, $templateExtension);

	abstract public function createTemplate($appName, $moduleName, $templateBasename, $templateExtension);

	public function cleanup($outputFilepath) {
		unlink($outputFilepath);
	}

	public function convertTo($inputDocumentPath, $newExtension) {
		$inputPathInfo = pathinfo($inputDocumentPath);

		$extension = $inputPathInfo['extension'];
		$outputDocumentPath = $inputPathInfo['dirname'] . DIRECTORY_SEPARATOR . $inputPathInfo['filename'] . '.' . $newExtension;

		// On récupère le filtre a utiliser pour la conversion
		$filters = sfConfig::get('app_sfOpenOfficePlugin_filters');
		$filter = $filters[$extension][$newExtension]['name'];
		$loadFilter = isset($filters[$extension][$newExtension]['loadFilter']) ? $filters[$extension][$newExtension]['loadFilter'] : "";

		return $this->convert($inputDocumentPath, $outputDocumentPath, $filter, $loadFilter);
	}

	protected function convert($inputDocumentPath, $outputDocumentPath, $filter, $loadFilter) {
		// Convert $inputDocumentPath to $outputDocumentPath using $filter convertion
		/*
		  $i = 0;
		  do {
		  $ret = sfConfig::get('sf_plugin_ooffice_script').' '.sfConfig::get('sf_plugin_ooffice_config_dir') . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"" .
		  ': ' . shell_exec(sfConfig::get('sf_plugin_ooffice_script')     . ' ' .
		  sfConfig::get('sf_plugin_ooffice_config_dir') . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"");

		  $i++;
		  sleep(1);
		  }
		  while (!file_exists($outputDocumentPath) && ($i <= 30));
		 */

		$ret = "Cannot acquire Mutex";
		$mutex = new Mutex('OPEN_OFFICE_CONV');
		if($mutex->acquire(30000)) {
			/*
			  $ret = sfConfig::get('sf_plugin_ooffice_script').' '.sfConfig::get('sf_plugin_ooffice_config_dir') . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"" .
			  ': ' . shell_exec(sfConfig::get('sf_plugin_ooffice_script')     . ' ' .
			  sfConfig::get('sf_plugin_ooffice_config_dir') . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"");
			 */
			$ret = sfOpenOffice::doFileConversion($inputDocumentPath, $outputDocumentPath, $filter, $loadFilter);

			$mutex->release();
		}

		if(!file_exists($outputDocumentPath)) {
			throw new Exception("There was an error generating $outputDocumentPath ($ret)");
		}
		else {
			unlink($inputDocumentPath);
		}

		return $outputDocumentPath;
	}

	protected function getTemplatePath($moduleName, $documentBasename, $appName = null) {
		$path = sfOpenOfficePartial::getDocumentDir($moduleName, $documentBasename, $appName);
		if($path) {
			$path .= DIRECTORY_SEPARATOR . $documentBasename;
		}

		return $path;
	}

}
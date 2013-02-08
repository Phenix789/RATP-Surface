<?php
/**
 *
 *
 * 
 */
class sfOpenOfficePartial extends sfPartialView {

	public function configure() {
		$this->setDecorator(false);

		$this->setTemplate($this->actionName . $this->getExtension());
		if('global' == $this->moduleName) {
			$this->setDirectory(sfConfig::get('sf_app_dir') . DIRECTORY_SEPARATOR . sfConfig::get('sf_app_module_document_dir_name'));
		}
		else {
			$this->setDirectory(self::getDocumentDir($this->moduleName, $this->getTemplate()));
		}
	}

	static public function getDocumentDir($moduleName, $templateFile, $appName = null) {
		$dirs = self::getDocumentDirs($moduleName, $appName);
		foreach($dirs as $dir) {
			if(is_readable($dir . '/' . $templateFile)) {
				return $dir;
			}
		}

		return null;
	}

	static public function getDocumentDirs($moduleName, $appName = null) {
		$suffix = $moduleName . '/' . sfConfig::get('sf_app_module_document_dir_name');

		$dirs = array();
		foreach(sfConfig::get('sf_module_dirs', array()) as $key => $value) {
			$dirs[] = $key . '/' . $suffix;
		}

		$dirs[] = str_replace('//', '/' . $appName . '/', sfConfig::get('sf_app_module_dir')) . '/' . $suffix;   // application

		if($pluginDirs = glob(sfConfig::get('sf_plugins_dir') . '/*/modules/' . $suffix)) {
			$dirs = array_merge($dirs, $pluginDirs);				       // plugins
		}

		// $dirs[] = sfConfig::get('sf_symfony_data_dir').'/modules/'.$suffix;           // core modules
		$dirs[] = sfConfig::get('sf_module_cache_dir') . '/auto' . ucfirst($suffix);	 // generated templates in cache

		if($appName) {
			$dirs[] = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . sfConfig::get('sf_apps_dir_name') . DIRECTORY_SEPARATOR . $appName . DIRECTORY_SEPARATOR . sfConfig::get('sf_app_module_dir_name') . DIRECTORY_SEPARATOR . $suffix;
		}

		return $dirs;
	}

}
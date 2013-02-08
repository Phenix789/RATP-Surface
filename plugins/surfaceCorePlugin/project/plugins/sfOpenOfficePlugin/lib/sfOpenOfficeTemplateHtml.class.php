<?php
/**
 * 
 * 
 * 
 */
class sfOpenOfficeTemplateHtml extends sfOpenOfficeTemplate {

	public function generate($templateVars, $moduleName, $templateBasename, $templateExtension) {
		// Getting information from app.yml
		$tempDir = sfConfig::get('app_sfOpenOfficePlugin_temp_dir', '/tmp');
		$locale = sfConfig::get('app_sfOpenOfficePlugin_locale');

		$templatePath = $this->getTemplatePath($moduleName, $templateBasename . '.' . $templateExtension);

		// On copie le fihier modèle vers le dossier de travail
		$tempFilename = $tempDir . DIRECTORY_SEPARATOR . $templateBasename . strtr(microtime(false), ' ', '_') . '.html';

		$this->attributeHolder->add($this->getGlobalVars());
		$this->attributeHolder->add($templateVars);

		// auto vars to be used in the templates
		// this helps to save dynamic resources in the right place
		// see sfOpenOfficeHelper
		$this->attributeHolder->add(array('sf_ooffice_out_dir' => $tempDir . DIRECTORY_SEPARATOR));

		$output = $this->renderFile($templatePath);
		@file_put_contents($tempFilename, $output);

		if(!file_exists($tempFilename)) {
			throw new Exception("Error creating $extension file");
		}

		return $tempFilename;
	}

	public function createTemplate($appName, $moduleName, $templateBasename, $templateExtension) {
		// nothing to do !
	}

}

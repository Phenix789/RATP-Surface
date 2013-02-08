<?php
/**
 *
 *
 * 
 */
class sfOpenOfficeDocument {

	public static function render(sfAction $action, $templateFilename, $outputExtension, $attachementName = 'document') {
		$actionName = $action->getModuleName();
		if($pos = strpos($templateFilename, '/')) {
			$actionName = substr($templateFilename, 0, $pos);
			$templateFilename = substr($templateFilename, $pos + 1);
		}
		$view = new sfOpenOfficeDocument();
		return $action->renderText($view->renderTemplate($action->getContext(),
				$actionName,
				$templateFilename,
				$outputExtension,
				$attachementName));
	}

	public static function renderToFile(sfAction $action, $ouputFilename, $templateFilename, $outputExtension, $attachementName = 'document') {
		$view = new sfOpenOfficeDocument();

		$view->renderTemplateToFile($action->getContext(),
			$action->getModuleName(),
			$ouputFilename,
			$templateFilename,
			$outputExtension);
		return true;
	}

	public static function renderCachedFile(sfAction $action, $cachedBasename, $templateFilename, $outputExtension, $attachementName = 'document', $force = false) {
		$view = new sfOpenOfficeDocument();

		$cache_path = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . sfConfig::get('sf_cache_dir_name') . DIRECTORY_SEPARATOR . 'documents';
		$ouputFilename = $cache_path . DIRECTORY_SEPARATOR . $cachedBasename . '.' . $outputExtension;
		if(!file_exists($ouputFilename) || $force) {

			if(!file_exists($cache_path)) {
				@mkdir($cache_path);
			}

			$view->renderTemplateToFile($action->getContext(),
				$action->getModuleName(),
				$ouputFilename,
				$templateFilename,
				$outputExtension);
		}
		else {
			@touch($ouputFilename);
		}

		if(file_exists($ouputFilename)) {
			$content = $view->renderFile($ouputFilename, $outputExtension, $attachementName);
			exit(0);
			return $action->renderText($content);
		}

		return $action->renderText('NO RENDER');
	}

	public static function isCachedFileExist($cachedBasename, $outputExtension) {
		$cache_path = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . sfConfig::get('sf_cache_dir_name') . DIRECTORY_SEPARATOR . 'documents';
		$ouputFilename = $cache_path . DIRECTORY_SEPARATOR . $cachedBasename . '.' . $outputExtension;

		return file_exists($ouputFilename);
	}

	public static function clearCachedFiles($cachedFileMask = "*") {
		$cache_path = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . sfConfig::get('sf_cache_dir_name') . DIRECTORY_SEPARATOR . 'documents';

		if($cachedFileMask != "*") {
			$documents = glob($cache_path . DIRECTORY_SEPARATOR . $cachedFileMask);

			foreach($documents as $document) {
				@unlink($document);
			}
		}
		else {
			$cmd = 'rm ' . $cache_path . DIRECTORY_SEPARATOR . '*';
			@shell_exec($cmd);
		}
	}

	protected function getTemplateInfo($templateFilename, & $baseFilename, & $extension) {
		$pathInfo = pathinfo($templateFilename);
		$baseFilename = $pathInfo['filename'];
		$extension = $pathInfo['extension'];
	}

	public static function renderFile($outputFile, $outputExtension, $attachementName) {
		// required for IE, otherwise Content-disposition is ignored
		if(ini_get('zlib.output_compression'))
			ini_set('zlib.output_compression', 'Off');

		$headers = sfConfig::get('app_sfOpenOfficePlugin_headers');
		if(isset($headers[$outputExtension]))
			$header = array_merge($headers['all'], $headers[$outputExtension]);
		else
			$header = $headers['all'];

		// $header['Content_Length'] = filesize($outputPath);
		$header['Content-disposition'] = 'attachment; filename="' . $attachementName . '.' . $outputExtension . '"';

		foreach($header as $name => $value) {
			header("$name: $value");
		}
		header("Cache-Control: private", false); // required for certain browsers

		readfile($outputFile);
	}

	protected function renderTemplate($context, $module, $templateFilename, $outputExtension, $attachementName) {
		$actionInstance = $context->getActionStack()->getLastEntry()->getActionInstance();
		$actionInstance->setLayout(false);

		// Grab template vars
		$templateVars = $actionInstance->getVarHolder()->getAll();

		$this->getTemplateInfo($templateFilename, $document, $extension);

		$template = null;
		$helpers = "";
		switch($extension) {
			case 'odt' :
			case 'ods' :
				$template = new sfOpenOfficeTemplateOdt($context, $module, $document);
				$helpers = "OpenDocTemplate";
				break;
			case 'php' :
			case 'html':
				$template = new sfOpenOfficeTemplateHtml($context, $module, $document);
				$helpers = "OpenOffice";
				break;
		}

		if($helpers) {
			sfLoader::loadHelpers($helpers, $context->getModuleName());
		}

		if($template) {

			$generatedPath = $template->generate($templateVars, $module, $document, $extension);

			// We have generated the document for openoffice, lets apply the macro for conversion
			if($outputExtension != $extension) {
				$outputPath = $template->convertTo($generatedPath, $outputExtension);
			}
			else {
				$outputPath = $generatedPath;
			}

			$this->renderFile($outputPath, $outputExtension, $attachementName);

			$template->cleanup($outputPath);

			// we are done! so byebye
			// TODO Change this. It should let symfony continue the filters chain
			exit(0);
		}
	}

	protected function renderTemplateToFile($context, $module, $ouputFilename, $templateFilename, $outputExtension) {
		$actionInstance = $context->getActionStack()->getLastEntry()->getActionInstance();
		$actionInstance->setLayout(false);

		// Grab template vars
		$templateVars = $actionInstance->getVarHolder()->getAll();

		$this->getTemplateInfo($templateFilename, $document, $extension);

		$template = null;
		$helpers = "";
		switch($extension) {
			case 'odt' :
			case 'ods' :
				$template = new sfOpenOfficeTemplateOdt($context, $module, $document);
				$helpers = "OpenDocTemplate";
				break;
			case 'php' :
			case 'html':
				$template = new sfOpenOfficeTemplateHtml($context, $module, $document);
				$helpers = "OpenOffice";
				break;
		}

		if($helpers) {
			sfLoader::loadHelpers($helpers, $context->getModuleName());
		}

		if($template) {

			$generatedPath = $template->generate($templateVars, $module, $document, $extension);

			// We have generated the document for openoffice, lets apply the macro for conversion
			if($outputExtension != $extension) {
				$outputPath = $template->convertTo($generatedPath, $outputExtension);
			}
			else {
				$outputPath = $generatedPath;
			}

			copy($outputPath, $ouputFilename);

			$template->cleanup($outputPath);
		}
	}

}

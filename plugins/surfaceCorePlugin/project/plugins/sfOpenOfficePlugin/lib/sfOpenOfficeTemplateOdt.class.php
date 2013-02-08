<?php
/**
 * 
 * 
 * 
 */
class sfOpenOfficeTemplateOdt extends sfOpenOfficeTemplate {

	public function generate($templateVars, $moduleName, $templateBasename, $templateExtension) {
		// Getting information from app.yml
		$tempDir = sfConfig::get('app_sfOpenOfficePlugin_temp_dir', '/tmp');
		$locale = sfConfig::get('app_sfOpenOfficePlugin_locale');

		$templatePath = $this->getTemplatePath($moduleName, $templateBasename);

		if(SF_ENVIRONMENT == 'dev') {
			// On génére le répertoire modèle du document si nécessaire
			// $this->createTemplate(null, $moduleName, $templateBasename, $templateExtension);
		}

		// On copie le répertoire modèle vers le dossier de travail
		$tempName = $templateBasename . strtr(microtime(false), ' ', '_');

		try {
			mkdir($tempDir . DIRECTORY_SEPARATOR . $tempName, 0700, true);
		}
		catch(Exception $e) {
			throw new Exception("Error creating $tempDir");
		}

		$this->attributeHolder->add($this->getGlobalVars());
		$this->attributeHolder->add($templateVars);

		// auto vars to be used in the templates
		// this helps to save dynamic resources in the right place
		// see sfOpenOfficeHelper
		$this->attributeHolder->add(array('sf_ooffice_out_dir' => $tempDir . DIRECTORY_SEPARATOR . $tempName . DIRECTORY_SEPARATOR));

		// For each skeleton file process it as if it has PHP code
		// save it in a tempDir
		if(is_dir($templatePath)) {

			foreach($this->scandir_recursive($templatePath) as $input_filepath) {
				$output_filepath = $tempDir . DIRECTORY_SEPARATOR . $tempName
					. DIRECTORY_SEPARATOR . substr($input_filepath, strlen($templatePath));

				if(is_file($input_filepath)) {
					if(substr($input_filepath, -3) == 'xml') {
						$output = $this->renderFile($input_filepath);
						@file_put_contents($output_filepath, $output);
					}
					else {
						// $this->getContext()->getLogger()->info("{sfOpenOfficeView} copying $input_filepath to $output_filepath");
						@copy($input_filepath, $output_filepath);
					}
				}
				else {
					// $this->getContext()->getLogger()->info("{sfOpenOfficeView} creating $output_filepath");
					@mkdir($output_filepath);
				}
			}
		}
		else {
			throw new Exception("You have to run 'symfony ooffice-create-document' task");
		}

		// Lets zip the document
		chdir($tempDir . DIRECTORY_SEPARATOR . $tempName);
		exec('zip -r ../' . "$tempName.$templateExtension" . ' * > /dev/null 2> /dev/null');
		chdir($tempDir);

		$generatedPath = $tempDir . DIRECTORY_SEPARATOR . $tempName . '.' . $templateExtension;

		if(!file_exists($generatedPath)) {
			throw new Exception("Error creating $templateExtension file");
		}
		else {
			// Delete the directory use to create the generated document
			$this->deltree($tempDir . DIRECTORY_SEPARATOR . $tempName);
			//rmdir($tempDir . DIRECTORY_SEPARATOR . $tempName);
		}

		return $generatedPath;
	}

	public function createTemplate($appName, $moduleName, $templateBasename, $templateExtension) {

		$templateRootDir = $this->getTemplatePath($moduleName, '', $appName);
		$templatePath = $templateRootDir . $templateBasename;

		if(file_exists($templatePath . '.' . $templateExtension)) {
			// lets clear things up like unupdated files
			$this->deltree($templatePath);

			// OpenOffice documents are zip files
			$unzip = sfConfig::get('app_sfOpenOfficePlugin_unzip_cmd', 'unzip -o -d');
			// pake_echo_action('extracting', $unzip . ' ' . $templateBasename . ' ' . $templateBasename. '.' . $templateExtension);
			chdir($templateRootDir);
			exec("$unzip $templateBasename $templateBasename.$templateExtension ", $output, $status);
			if(!$status) {

				// remove object replacements cause they are a kind of object cached (need testing)
				// as such if the replacement is removed then we are "forcing" a render of the object
				if(file_exists($templatePath . DIRECTORY_SEPARATOR . 'ObjectReplacements')) {
					// pake_echo('Removing Object Replacements');
					$this->deltree($templatePath . DIRECTORY_SEPARATOR . 'ObjectReplacements');
				}

				// This is to avoid anoying warnings of DomDocument::load
				set_error_handler("sfOpenOfficePluginHandleXmlError");

				// Load stylesheet that transforms styled elements as code to PHP code
				$xslt = new xsltProcessor;
				$transformation = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../data') . DIRECTORY_SEPARATOR . 'transformations'
					. DIRECTORY_SEPARATOR . "$templateExtension.xsl";
				$xslt->importStyleSheet(DomDocument::load($transformation));

				// Apply transformations
				foreach($this->scandir_recursive($templatePath, array('mimetype'), array('.ods', '.png')) as $file) {
					try {
						$filepath = $templatePath . DIRECTORY_SEPARATOR . $file;

						if(is_file($file)) {
							// pake_echo_action('loading', $file);
							$input = file_get_contents($file);
							if($input) {
								$output = '<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n" ?>' . "\n";
								$output .= $xslt->transformToXML(DomDocument::loadXML($input));

								$output = str_replace(array('&lt;?php', '?&gt;', '&lt;?=', ' ', '%3C%3F%3D%20%24', '%20%3F%3E', '%3C?=%20', '%20?%3E'), array('<?php', '?>', '<?=', ' ', '<?= $', ' ?>', '<?= ', ' ?>'), $output);
								$output = preg_replace('/(\$.*-)&gt;/', '$1>', $output);

								file_put_contents($file, $output);

								// pake_echo_action('transformed', $file);
							}
						}
					}
					catch(Exception $e) {
						// pake_echo_action('ignoring', $file . ' is not a valid XML');
					}
				}

				restore_error_handler();

				// pake_echo_action('chmod 0777', $templatePath);
				chmod($templatePath, 0777);
			}
			else {
				throw new Exception('Error unziping file. Check if you can run ' . $unzip);
			}
		}
		else {
			throw new Exception($templatePath . '.' . $templateExtension . ': file not found.');
		}
	}

	private function scandir_recursive($path, $file_ignore = array(), $ext_ignore = array()) {
		$list_ignore = array_merge(array('.', '..', '.svn', 'Thumbs.db', '.DS_STORE'), $file_ignore);
		// $ext_ignore  = array ('.ods', '.png');

		if(!is_dir($path))
			return 0;

		$list = array();
		$directory = @opendir("$path"); // @-no error display
		while($file = @readdir($directory)) {

			if(!in_array($file, $list_ignore)) {

				preg_match('/^(\w+)(\..*)?$/', $file, $matches);
				if(!isset($matches[2]) || !isset($ext_ignore) || !in_array($matches[2], $ext_ignore)) {

					$f = $path . "/" . $file;
					$f = preg_replace('/(\/){2,}/', '/', $f); //replace double slashes

					if(is_file($f)) {
						$list[] = $f;
					}
					else if(is_dir($f)) {
						$list[] = $f;
						$list = array_merge($list, $this->scandir_recursive($f));  //RECURSIVE CALL
					}
				}
			}
		}

		@closedir($directory);
		return $list;
	}

	private function deltree($f) {
		/*
		  if (is_dir($sf)) {
		  foreach (glob($f.'/*') as $sf){
		  if (is_dir($sf) && !is_link($sf) && ($sf != '.svn')){
		  $this->deltree($sf);
		  if (is_dir($sf)) {
		  rmdir($sf);
		  }
		  }
		  else {
		  unlink($sf);
		  }
		  }
		  } */
		@shell_exec("rm -rf " . $f);
	}

}

function sfOpenOfficePluginHandleXmlError($errno, $errstr, $errfile, $errline) {
	if($errno == E_WARNING && (substr_count($errstr, "DOMDocument::loadXML()") > 0)) {
		throw new DOMException($errstr);
	}
	else {
		return false;
	}
}

/*
  protected function constructTemplate($module, $document, $extension) {
  $templatePath = $this->getTemplatePath($module, $document);

  if ( filemtime($templatePath) < filemtime($templatePath . '.' . $extension) ) {
  try {
  $this->php_cli = @sfToolkit::getPhpCli();
  }
  catch (Exception $e) {
  throw new Exception("PHP is not in your basedir");
  }

  if ( is_dir(sfConfig::get('sf_app_module_dir') . DIRECTORY_SEPARATOR . $module) ) {
  $app = sfConfig::get('sf_app');
  }
  else {
  $pluginDirs = glob(sfConfig::get('sf_root_dir').'/plugins/* /modules/' . $module);

  if (preg_match('#plugins[/\\\\]([^/\\\\]+)[/\\\\]#', $pluginDirs[0], $match)) {
  $app = $match[1];
  }
  }

  $command = 'ooffice-create-document ' . $app . ' ' . $module . ' ' . $document . '.' . $extension;
  $command = sprintf('%s %s %s', $this->php_cli, SF_ROOT_DIR.'/symfony', $command);

  ob_start();
  passthru($command, $return);
  $content = ob_get_clean();
  }
  }
 */

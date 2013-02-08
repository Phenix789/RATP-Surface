<?php
/**
 *
 *
 * 
 */
class sfOpenOffice {

	public static function FileConvert($inputDocumentPath, $outputDocumentPath, $filter, $loadFilter = "") {

		$ret = self::doFileConversion($inputDocumentPath, $outputDocumentPath, $filter, $loadFilter);
		if(!file_exists($outputDocumentPath)) {
			return false;
		}

		return true;
	}

	public static function doFileConversion($inputDocumentPath, $outputDocumentPath, $filter, $loadFilter = "") {
		/* Old version
		  return sfConfig::get('sf_plugin_ooffice_script').' '.sfConfig::get('sf_plugin_ooffice_config_dir') . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"" .
		  ': ' . shell_exec(sfConfig::get('sf_plugin_ooffice_script')     . ' ' .
		  sfConfig::get('sf_plugin_ooffice_config_dir') . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"");

		 */

		/* New version
		  $script_path = sfConfig::get('sf_plugin_ooffice_dir').'/data/scripts';
		  $script = $script_path.'/ooffice-unix.sh';
		  return $script.' '. $script_path . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"" .
		  ': ' . shell_exec($script . ' ' .
		  $script_path . " release \"$inputDocumentPath\" \"$outputDocumentPath\" \"$filter\" \"$loadFilter\"");
		 */
                             
		switch(sfConfig::get('sf_os_family')) {
			case 'osx' :
				$def_openoffice_bin = "/Applications/OpenOffice.org.app/Contents/MacOS/soffice";
				// export PATH=$PATH:/usr/X11R6/bin
				// RUNTIME_DISPLAY=:5
				break;
			case 'unix' :
			default :
                            $def_openoffice_bin = "/usr/bin/openoffice.org";
                            //$def_openoffice_bin = "/usr/bin/ooffice"; // "/usr/lib/openoffice/program/soffice.bin";
		}

		$conv_opts = sfConfig::get('app_sfOpenOfficePlugin_convert', array());
                
                if (!isset($conv_opts['bin']))
                    $conv_opts['bin'] = $def_openoffice_bin;

		$command = sprintf('
export LANG=%s; export HOME=%s; export TEMP=%s; export LC_ALL=%s; export DISPLAY=%s;
%s%s "macro:///Standard.Convert.ConvertTo(\"%s\",\"%s\",\"%s\",\"%s\")" 2>&1',
				$conv_opts['lang'],
				$conv_opts['home'],
				$conv_opts['temp'],
				$conv_opts['locale'],
				$conv_opts['display'],
				$conv_opts['bin'],
				$conv_opts['bin_opt'],
				$inputDocumentPath,
				$outputDocumentPath,
				$filter,
				$loadFilter
		);

		$output = "";
		if(sfConfig::get('sf_debug')) {
			$output = $command . ' => ';
		}

		$output .= shell_exec($command);
		return $output;
	}

}

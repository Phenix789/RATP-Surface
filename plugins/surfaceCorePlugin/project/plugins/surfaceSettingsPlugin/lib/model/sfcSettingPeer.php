<?php

/**
* Code from BasecsSettings
*
* @package
* @version $id$
* @copyright 2006-2007 Brent Shaffer
* @author Brent Shaffer <bshaffer@centresource.com>
* @license See LICENSE that came packaged with this software
 * @package plugins.surfaceSettingsPlugin.lib.model
 */ 
class sfcSettingPeer extends BasesfcSettingPeer
{
	/**
	* get
	* Returns the string value of a particular setting.
	*
	* @param string $setting
	* @static
	* @access public
	* @return string
	*/
	public static function get($setting_key, $default = null)
	{
		$value = null;
	    $criteria = new Criteria();
	    $criteria->add(self::NAME, $setting_key);
		if ($setting = self::doSelectOne($criteria)) {
			$value = ($setting->getValue()) ? $setting->getValue() : $setting->getDefaultValue();
		}
		if (!$value) {
			$value = sfConfig::get('app_'.self::settingize($setting_key), $default);	
		}
		return $value;
	}

	public static function settingize($anystring)
	{
		return str_replace('-', '_', sfInflector::underscore(trim($anystring)));
	}

}

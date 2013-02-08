<?php
/**
 * @brief Enumeration utile au plugin
 * @package Plugin
 * @subpackage sfAnalyticPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 1 déc. 2009
 * @version 1.0
 * @license LGPL
 *
 */

/**
 * @brief Enumeration des navigateurs
 * @class e_BROSWER
 * 
 */
class e_BROSWER {

	const Other = 0;
	const MSIE = 1;
	const Firefox = 2;
	const Chrome = 3;
	const Safari = 4;
	const Opera = 5;

	public static function getList() {
		$list = array();
		$list[self::Other] =	array('short' => 'Autre',	'long' => 'Autre');
		$list[self::MSIE] =	array('short' => 'MSIE',	'long' => 'Microsoft Internet Explorer');
		$list[self::Firefox] =	array('short' => 'Firefox',	'long' => 'Mozilla Firefox');
		$list[self::Chrome] =	array('short' => 'Chrome',	'long' => 'Google Chrome');
		$list[self::Safari] =	array('short' => 'Safari',	'long' => 'Apple Safari');
		$list[self::Opera] =	array('short' => 'Opera',	'long' => 'Opera');
		return $list;
	}

	public static function getName($broswer_id, $name = 'short') {
		if($name != 'short' || $name != 'long') { $name = 'short'; }
		$list = self::getList();
		if(isset($list[$broswer_id])) {
			return $list[$broswer_id][$name];
		}
		return $list[self::Other][$name];
	}

	public static function getId($name) {
		if(is_string($name)) {
			$list = self::getList();
			foreach($list as $id => $broswer) {
				if($broswer['short'] == $name || $broswer['long'] == $name) {
					return $id;
				}
			}
		}
		return self::Other;
	}

}

/**
 * @brief Enumeration des OS
 * @class e_OS
 * 
 */
class e_OS {

	const Other = 0;
	const Windows = 1;
	const Linux = 2;
	const MacOS = 3;

	public static function getList() {
		$list = array();
		$list[self::Other] =		array('short' => 'Autre',	'long' => 'Autre');
		$list[self::Windows] =		array('short' => 'Windows',	'long' => 'Microsoft Windows');
		$list[self::Linux] =		array('short' => 'Linux',	'long' => 'Linux');
		$list[self::MacOS] =		array('short' => 'Mac OS',	'long' => 'Apple Mac OS');
		return $list;
	}

	public static function getName($os_id, $name = 'short') {
		if($name != 'short' || $name != 'long') { $name = 'short'; }
		$list = self::getList();
		if(isset($list[$os_id])) {
			return $list[$os_id][$name];
		}
		return $list[self::Other][$name];
	}

}

class e_ANALYTIC_CONNECTION_ERROR {

	const CONNECTION = 0;
	const ERROR_LOGIN = 1;
	const ERROR_PASSWORD = 2;
	const ERROR_IP = 3;
	const ERROR_PERIOD = 4;
	const OTHER = 10;

	public static function getList() {
		$list = array();
		$list[self::CONNECTION] = 'Connexion réussie';
		$list[self::ERROR_LOGIN] = 'Login inexistant';
		$list[self::ERROR_PASSWORD] = 'Mot de passe erroné';
		$list[self::ERROR_IP] = 'Ip non autorisée';
		$list[self::ERROR_PERIOD] = 'Période non autorisée';
		$list[self::OTHER] = 'Inconnue';
		return $list;
	}

	public static function getName($id) {
		$list = self::getList();
		if(isset($list[$id])) {
			return $list[$id];
		}
		return '';
	}

}
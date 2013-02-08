<?php
/**
 * @brief Analyse l'UserAgent afin d'extraire certaine information
 * @class Analytic
 * @package Plugins
 * @subpackage sfAnalyticPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 1 déc. 2009
 * @version 1.0
 * @license LGPL
 *
 */
class Analytic extends BaseAnalytic {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $params;
	protected $values;

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 * @brief Contructeur
	 * @fn public functon __construct()
	 * 
	 */
	public function __construct() {
		$this->values = array();
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 * @brief Execute les recuperations des informations de l'utilisateur
	 * @fn public function process()
	 *
	 */
	public function process() {
		$this->prepareProcess();
		$this->processValues();
		$this->processScreen();
		$this->processNavigator();
		$this->save();
	}

	/**
	 * @brief Preparation pour a recuperation des informations
	 * @fn protected function prepareProcess()
	 *
	 */
	protected function prepareProcess() {
		$this->params = sfContext::getInstance()->getRequest()->getParameter('analytic');
		$this->setUserAgent($_SERVER['HTTP_USER_AGENT']);
		$this->setIp($_SERVER['REMOTE_ADDR']);
	}

	/**
	 * @brief Recuperation des informations donnée
	 * @fn protected function processValues()
	 *
	 */
	protected function processValues() {
		$this->setUsername($this->get('username'));
		$this->setConnection($this->get('code_connection', e_ANALYTIC_CONNECTION_ERROR::OTHER));
		$this->setUserId($this->get('user_id'));
	}

	/**
	 * @brief Recuperation des informations sur l'ecran du client
	 * @fn protected function processScreen()
	 *
	 */
	protected function processScreen() {
		$this->setScreenHeight($this->get('screen_height', -1));
		$this->setScreenWidth($this->get('screen_width', -1));
		$this->setScreenInnerHeight($this->get('screen_inner_height', -1));
		$this->setScreenInnerWidth($this->get('screen_inner_width', -1));
	}

	/**
	 * @brief Recuperation des informations sur la configuration du navigateur client
	 * @fn protected function processNavigator()
	 *
	 */
	protected function processNavigator() {
		$this->setCookieEnabled($this->get('navigator_cookie_enabled'));
		$this->setLanguage($this->get('navigator_language'));
		$this->setPlatform($this->get('navigator_platform'));
		$this->setProduct($this->get('navigator_product'));
		$this->setProductSub($this->get('navigator_product_sub'));
		$this->setVendor($this->get('navigator_vendor'));
		$this->setVendorSub($this->get('navigator_vendor_sub'));
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 * @brief Retourne la valeur demandé si celle ci se trouve dans le tableau de parametre
	 * @fn protected function get($name, $default = null)
	 * @param string $name nom de la valeur demandé
	 * @param mixed $default valeur par defaut si celle demandé n'existe pas
	 * @return string la valeur demandé ou $default si elle n'existe pas
	 * 
	 */
	protected function get($name, $default = null) {
		if(isset($this->params[$name])) {
			return $this->params[$name];
		}
		if(isset($this->values[$name])) {
			return $this->values[$name];
		}
		return $default;
	}

	/**
	 *
	 */
	public function addValues($key, $value = null) {
		if(is_string($key)) {
			$key = array($key => $value);
		}
		if(is_array($key) && is_array($value)) {
			$key = array_combine($key, $value);
		}
		$this->values = array_merge($this->values, $key);
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 *
	 */
	public function getSurfaceGeneratorListClassForTd($fields) {
		if($fields == 'connection') {
			if($this->getConnection() == e_ANALYTIC_CONNECTION_ERROR::CONNECTION) {
				return 'green';
			}
			return 'red';
		}
	}

}

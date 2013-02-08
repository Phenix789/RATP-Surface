<?php
/**
 * @brief Class representant un menu de surface
 * @class sfcMenu
 * @package surface
 * @subpackage menu
 *
 * @author Claude <claude@elogys.fr>
 * @date 6 avr. 2010
 * @version 1.0
 *
 */
class sfcMenu extends sfcMenuItem {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	/**
	 * @var array Singletons des menus
	 */
	protected static $menus = array();
	protected static $update = array();
	protected static $name_to_target = array();

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	/**
	 * @brief Constructeur Construit un menu et l'enregistre comme simgleton avec ce nom.
	 * @param string $name Nom du menu
	 * 
	 */
	public function __construct($name) {
		parent::__construct($name);
		self::$menus[$name] = $this;
		$this->setClass('navigation');
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 * @brief Vérifie si le menu est a mettre a jour
	 * @return bool Vrai si le menu est a mettre a jour
	 *
	 */
	public function getToUpdate() {
		if(parent::getToUpdate()) {
			return true;
		}
		else {
			foreach($this->getItems() as $item) {
				if($this->isOrHasChildrenModified($item)) {
					return true;
				}
			}
		}
		return false;
	}

/******************************************************************************/
		/**************/
		/*Acces static*/
		/**************/
/******************************************************************************/

	/**
	 * @brief Retrouve le singleton du menu donnomé
	 * @param string $name Nom du menu
	 * @return sfcMenu Le menu dénomé
	 *
	 */
	public static function getInstance($name) {
		return isset(self::$menus[$name]) ? self::$menus[$name] : sfcMenuGenerator::getMenu($name);
	}

	/**
	 * @brief Retrouve le singleton du menu de la cible
	 * @param string $target Cible du menu
	 * @return sfcMenu le menu correspondant a la cible
	 *
	 */
	public static function getInstanceFromTarget($target) {
		$name = sfcMenu::getNameFromTarget($target);
		return sfcMenu::getInstance($name);
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	protected static function getNameFromTarget($target) {
		switch($target) {
			case 'tg_east' : return 'east_navigation';
			case 'tg_center' : return 'app_navigation';
			default : $menus = sfConfig::get('sfc_menu_generator_menus', array());
				foreach($menus as $name => $menu) {
					if(get('target', $menu) == $target) {
						return $name;
					}
				}
		}
		return $target;
	}

	public static function getUpdateTarget() {
		if(!self::$update) {
			self::$update = sfConfig::get('sfc_menu_generator_update', array());
		}
		return self::$update;
	}

	public static function isUpdateTarget($target) {
		return in_array($target, sfcMenu::getUpdateTarget());
	}

	public static function addUpdateTarget($target) {
		self::$update = array_merge(sfcMenu::getUpdateTarget(), array($target));
	}

	public static function removeUpdateTarget($target) {
		$update = sfcMenu::getUpdateTarget();
		foreach($update as $index => $update_target) {
			if($update_target == $target) {
				unset($update[$index]);
				self::$update = $update;
				return true;
			}
		}
		return false;
	}

}

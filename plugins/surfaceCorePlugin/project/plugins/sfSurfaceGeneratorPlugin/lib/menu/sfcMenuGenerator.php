<?php
/**
 * @brief Class générant les menus à partir des données des fichiers menu.yml
 * @class sfcMenuGenerator
 * @package surface
 * @subpackage menu
 *
 * @author Claude <claude@elogys.fr>
 * @date 6 avr. 2010
 * @version 1.0
 *
 */
class sfcMenuGenerator {

	/**
	 * @var array Singletons des menus généré
	 */
	protected static $menus = array();
	/**
	 * @var array Singletons des items de menu généré
	 */
	protected static $items = array();

	/**
	 * @brief Retourne le singleton du menu dénomé
	 * @param string $name Nom du menu
	 * @return sfcMenu Le menu dénomé
	 *
	 */
	public static function getMenu($name) {
		if(isset(self::$menus[$name])) {
			return self::$menus[$name];
		}
		return self::generateMenu($name);
	}

	/**
	 * @brief Vérifie si le menu dénomé existe
	 * @param string $name Mon du menu
	 * @return bool Vrai si le menu existe
	 *
	 */
	public static function hasMenu($name) {
		$config = sfConfig::get('sfc_menu_generator_menus');
		return isset(self::$menus[$name]) || isset($config[$name]);
	}

	/**
	 * @brief Genere le menu dénomé
	 * @param string $name Nom du menu
	 * @return sfcMenu Le menu généré
	 *
	 */
	protected static function generateMenu($name) {
		if(self::hasMenu($name)) {
			$config = sfConfig::get('sfc_menu_generator_menus');
			$config = $config[$name];
			$config = self::prepareConfigMenu($name, $config);
			$menu = new sfcMenu($name);
			$menu->setClass($config['class']);
			$menu->setTarget($config['target']);
			$menu->setAllow($config['allow']);
			if(isset($config['items'])) {
				foreach($config['items'] as $item_name) {
					if(self::hasItem($item_name)) {
						$menu->addItem(self::getItem($item_name));
					}
				}
			}
			self::$menus[$name] = $menu;
			return $menu;
		}
		else {
			return null;
		}
	}

	/**
	 * @brief Retourne les configurations de base et spécifique du menu
	 * @param string $name Nom du menu
	 * @param array $config Configuration spécifique
	 * @return array Les configurations mergés
	 *
	 */
	protected static function prepareConfigMenu($name, $config) {
		$default_config = array(
				'items'		=> array(),
				'class'		=> 'navigation',
				'target'	=> null,
				'allow'		=> array()
		);
		return array_merge($default_config, $config);
	}

	/**
	 * @brief Retourne le singleton de l'item dénomé
	 * @param string $name Nom de l'item
	 * @return sfcMenuItem L'item dénomé
	 *
	 */
	public static function getItem($name) {
		if(isset(self::$items[$name])) {
			return self::$items[$name];
		}
		return self::generateItem($name);
	}

	/**
	 * @brief Vérifie si l'item dénomé existe
	 * @param string $name Mon de l'item
	 * @return bool Vrai si le menu existe
	 *
	 */
	public static function hasItem($name) {
		$config = sfConfig::get('sfc_menu_generator_items');
		return isset(self::$items[$name]) || isset($config[$name]);
	}

	/**
	 * @brief Genere l'item dénomé
	 * @param string $name Nom de l'item
	 * @return sfcMenuItem L'item généré
	 *
	 */
	protected static function generateItem($name) {
		if(self::hasItem($name)) {
			$config = sfConfig::get('sfc_menu_generator_items');
			return self::generateItemFromConfig($name, $config[$name]);
		}
		return null;
	}

	public static function generateItemFromConfig($name, $config) {
		$config = self::prepareConfigItem($name, $config);
		$item = new sfcMenuItem($name);
		$item->setLabel($config['label']);
		$item->setIcon($config['icon']);
		$item->setLink($config['link']);
		$item->setTitle($config['title']);
		$item->setIsAjax($config['is_ajax']);
		$item->setTarget($config['target']);
		$item->setSkipNavigate($config['skip_navigate']);
		$item->setIsController($config['is_controller']);
		$item->setAllow($config['allow']);
		$item->setClass($config['class']);
		$item->setClassLink($config['class_link']);
		$item->setRender($config['render']);
		if($config['items']) {
			foreach($config['items'] as $sub_item) {
				if(self::hasItem($sub_item)) {
					$item->addItem(self::getItem($sub_item));
				}
			}
		}
		self::$items[$name] = $item;
		return $item;
	}

	/**
	 * @brief Retourne les configurations de base et spécifique de l'item
	 * @param string $name Nom de l'item
	 * @param array $config Configuration spécifique
	 * @return array Les configurations mergés
	 *
	 */
	protected static function prepareConfigItem($name, $config) {
		$default_config = array(
				'label'			=> sfInflector::humanize($name),
				'icon'			=> null,
				'link'			=> '#',
				'title'			=> null,
				'is_ajax'		=> true,
				'target'		=> 'tg_center',
				'skip_navigate'		=> false,
				'is_controller'		=> false,
				'items'			=> array(),
				'allow'			=> array(),
				'class'			=> '',
				'class_link'		=> '',
				'render'		=> null
			);
		return array_merge($default_config, $config);
	}

}

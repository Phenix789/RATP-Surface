<?php
/**
 * @brief
 * @class
 * @package
 * @subpackage
 *
 * @author Claude <claude@elogys.fr>
 * @date 16 avr. 2010
 *
 */

define('CART_MENU_TARGET', 'logNavigation');

class sfcCartMenu {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	/**
	 * @var sfcCartMenu Instance du menu du cart
	 */
	protected static $menu;

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 * @brief Getter Retourne le singleton
	 * @return sfcMenu Singleton de l'objet sfcCartMenu
	 *
	 */
	public static function getInstance() {
		if(!self::$menu) {
			self::generate();
		}
		return self::$menu;
	}

	/**
	 * @brief Reconstruit le singleton
	 * @return sfcMenu La nouvelle instance de l'objet sfcCartMenu
	 * 
	 */
	public static function reload() {
		self::$menu = null;
		return self::getInstance();
	}

	/**
	 * @brief Genere le menu du cart de l'utilisateur courant
	 *
	 */
	protected static function generate() {
		$cart = sfContext::getInstance()->getUser()->getCart();
		$config = self::getMenuGlobalConfig();
		
		$menu = sfcMenu::getInstance('cart_navigation');
		if(!$menu) { $menu = new sfcMenu('cart_navigation'); }
		$menu->setTarget(self::getMenuTarget());
		
		$item = new sfcMenuItem($cart->getName());
		$item->setLabel($cart->getName());
		$item->setIsAjax(true);
		$item->setTitle('Session active : cliquer pour modifier.');
		$item->setLink('cart/edit?id=' . $cart->getId());
		$item->setTarget('tg_east');
               	if(get('quick_select', $config, true)) {
			self::menuQuickSelect($cart, $item);
		}
		$menu->addItem($item);
		foreach($cart->getStatistic() as $cart_item_name => $cart_item_count) {
			$menu->addItem(self::menuItem($cart_item_name, $cart_item_count));
		}
		$finalize = get('finalize', $config, false);
		if($finalize) {
			self::finalizeGenerate($menu, $finalize);
		}
		self::$menu = $menu;
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	/**
	 * @brief Construit un menu d'entrée pour l'item donné
	 * @param string $name Nom du type d'item
	 * @param int $count Nombre d'items présents dans le cart
	 * @return sfcMenuItem L'entrée du menu
	 *
	 */
	protected static function menuItem($name, $count) {
		$config = self::getItemConfig($name);

		$label_singular = Cart::getItemName($name);
		$label_plural = Cart::getItemName($name, true);
		$module = get('module', $config, $name);
		$app = get('app', $config, SF_APP);
		$empty = get(array('menu', 'empty'), $config, true);
		$finalize = get(array('menu', 'finalize'), $config, false);

		$item = new sfcMenuItem($name);
		$item->setLabel($count . ' ' . ($count > 1 ? $label_plural : $label_singular));
		$item->setLink($module . '/list?filter=filter&filters[cartable]=1');
		$item->setTarget($app . '|tg_center');
		$item->setIsAjax(true);

		$sub_item = new sfcMenuItem($name . '_show');
		$sub_item->setLabel('Voir les ' . $label_plural);
		$sub_item->setLink($module . '/list?filter=filter&filters[cartable]=1');
		$sub_item->setIcon('/sfcThemePlugin/common/icons/list.png');
		$sub_item->setTarget($app . '|tg_center');
		$sub_item->setIsAjax(true);
		$item->addItem($sub_item);

		self::menuRender($item, $name);

		if($empty) {
			$item->addItem(self::menuEmpty($name));
		}
		if($finalize) {
			self::finalizeGenerate($item, $finalize);
		}
		return $item;
	}

	/**
	 * @brief Construit le quick select
	 * @param Cart $cart Cart courant
	 * @param sfcMenu $menu Menu en construction
	 *
	 */
	protected static function menuQuickSelect($cart, $menu) {
		$global = self::getMenuGlobalConfig();
		foreach(CartPeer::doSelectCartNotSelectedOfUser() as $other_cart) {
			$item = new sfcMenuItem($other_cart->getName());
			$item->setLabel($other_cart->getName());
			$item->setLink('cart/quickSelect?id=' . $other_cart->getId());
			$item->setIsAjax(true);
			$item->setTarget(get(array('notice', 'target'), $global, NOTICE_TARGET));
			$menu->addItem($item);
		}
		if(get('create', $global, true)) {
			$item = new sfcMenuItem('cart_create');
			$item->setLabel(content_tag('i', __('New session')));
			$item->setLink('cart/create');
			$item->setIsAjax(true);
			$item->setTarget('tg_lightbox');
			$menu->addItem($item);
		}
		if(get('list', $global, true)) {
			$item = new sfcMenuItem('cart_list');
			$item->setLabel(content_tag('i', __('Your sessions')));
			$item->setLink('cart/list?filter=filter');
			$item->setIsAjax(true);
			$item->setTarget('tg_center');
			$menu->addItem($item);
		}
		if(get('refresh', $global, false)) {
			$item = new sfcMenuItem('cart_refresh');
			$item->setLabel(content_tag('i', __('Update this session')));
			$item->setLink('cart/refreshMenuCart');
			$item->setIsAjax(true);
			$item->setTarget(self::getMenuTarget());
			$menu->addItem($item);
		}
	}

	/**
	 * @brief Appel la fonction de personalisation si celle ci a ete definit
	 * @param sfcMenu $menu Menu du cart
	 * @param string $finalize Nom de la fonction
	 *
	 */
	protected static function finalizeGenerate($menu, $finalize) {
	    $personal_functions = SF_ROOT_DIR.'/lib/helper/CartMenuHelper.php';
	    //var_dump($personal_functions); die();
	    if (file_exists($personal_functions)) {
		require_once $personal_functions;
	    }
		if(is_callable($finalize)) {
			call_user_func($finalize, $menu);
		}
	}

	/**
	 * @brief Ajoute le menu empty
	 * @param string $name Nom du type d'element a vider
	 * @return sfcMenuItem L'entré pour vider un type d'element
	 * 
	 */
	protected static function menuEmpty($name) {
		$cart = sfContext::getInstance()->getUser()->getCart();
		$item = new sfcMenuItem($name . '_delete');
		$item->setLabel('<i>Retirer de la session</i>');
		$item->setIcon('/surfaceCartPlugin/images/cross.png');
		$item->setLink('cart/emptyType?id=' . $cart->getId() . '&type=' . $name);
		$item->setIsAjax(true);
		$item->setTarget(self::getNoticeTarget());
		return $item;
	}

	/**
	 * @brief Spécifie le render du menu donné
	 * @param sfcMenuItem $menu
	 * @param string $name Type d'item
	 *
	 */
	protected static function menuRender($menu, $name) {
		$config = self::getItemConfig($name);
		$function = get(array('menu', 'render'), $config, false);
		$helper = get(array('menu', 'helper'), $config, null);
		if($function) {
			$render = array();
			$render['personal'] = $function;
			$render['helper'] = $helper;
			$menu->setRender($render);
		}
	}

/******************************************************************************/
		/***************/
		/*Configuration*/
		/***************/
/******************************************************************************/

	/**
	 * @brief Retourne la configuration global pour la generation du menu
	 * @return array Configuration du menu
	 *
	 */
	protected static function getMenuGlobalConfig() {
		$config = Cart::getGlobalConfig();
		return get('menu', $config, array());
	}

	/**
	 * @brief Retourne la configuration complete d'un type item
	 * @param string $type Type d'item
	 * @return array La configuration
	 *
	 */
	protected static function getItemConfig($type = null) {
		return Cart::getConfig($type);
	}

	/**
	 * @brief Retourne la configuration du menu d'un type item
	 * @param string $type Type d'item
	 * @return array La configuration
	 */
	protected static function getMenuItemConfig($type = null) {
		$config = self::getItemConfig($type);
		return get('menu', $config, array());
	}

	/**
	 * @brief Retourne le nom de la zone des notices
	 * @return string Nom de la zone pour affiché les notices
	 *
	 */
	public static function getNoticeTarget() {
		$config = Cart::getGlobalConfig();
		return get(array('notice', 'target'), $config, NOTICE_TARGET);
	}

	/**
	 * @brief Retourne la cible pour l'affichage du menu
	 * @return string Cible du menu
	 *
	 */
	protected static function getMenuTarget() {
		$config = sfcCartMenu::getMenuGlobalConfig();
		return get('target', $config, CART_MENU_TARGET);
	}

}
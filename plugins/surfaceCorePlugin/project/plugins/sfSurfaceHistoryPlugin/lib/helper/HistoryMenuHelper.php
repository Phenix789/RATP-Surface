<?php
/**
 * @brief Helper
 * @package
 * @subpackage
 *
 * @author Claude <claude@elogys.fr>
 * @date 19 avr. 2010
 * @version 1.0
 *
 */

/**
 * @brief Helper
 * @param
 * @return string Code html du composant
 *
 */
function history_menu_nav_tg_center_tag($menu) {
	return _history_menu_nav($menu);
}

function history_menu_nav_tg_east_tag($menu) {
	return _history_menu_nav($menu);
}

function _history_menu_nav($menu) {
	use_helper('Menu');
	$render = "";
	foreach($menu->getItems() as $item) {
		$render .= _menu_item_tag($item);
	}
	return $render;
}

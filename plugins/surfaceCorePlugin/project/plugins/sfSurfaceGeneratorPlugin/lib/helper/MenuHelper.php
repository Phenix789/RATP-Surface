<?php

/**
 * @brief Helper
 * @package
 * @subpackage
 *
 * @author Claude <claude@elogys.fr>
 * @date 7 avr. 2010
 * @version 1.0
 */

/**
 * @brief Helper Génére le code html du menu
 * @param sfcMenu $menu Menu a generer
 * @return string Code html du composant
 */
function menu_tag($menu) {
	if (is_string($menu)) {
		$menu = sfcMenu::getInstance($menu);
	}
	if ($menu instanceof sfcMenu && $menu->isAuthorizedUser()) {
		$html = "";
		foreach ($menu->getItems() as $item) {
			$html .= _menu_item_tag($item);
		}
		return content_tag('ul', $html, array('class' => $menu->getClass()));
	}
	return '';
}

/**
 * @brief Helper Génére le code html pour update le menu
 * @param sfcMenu $menu Menu a mettre a jour
 * @return string Code html
 */
function menu_update_tag($menu) {
	if (is_string($menu)) {
		$menu = sfcMenu::getInstance($menu);
	}
	return javascript_tag("surface.link_to('cart/updateMenu', '{$menu->getTarget()}');"); //Warning, specific to cart
}

/**
 * @brief Helper Update le menu du target si celui est déclaré a update
 * @param string $target
 * @return string Code html
 */
function menu_if_update_from_target($target) {
	if (sfcMenu::isUpdateTarget($target)) {
		return menu_update_tag(sfcMenu::getInstanceFromTarget($target));
	}
	return null;
}

function update_active_menu($module_name = null, $target = null) {
	$sf_context = sfContext::getInstance();
	if (!$module_name) {
		$module_name = $sf_context->getModuleName();
	}
	if (!$target) {
		$target = $sf_context->getRequest()->getParameter('target');
	}
	return javascript_tag('surface.updateActiveMenu("' . strtolower($module_name) . '","' . $target . '")');
}

/**
 * @brief Helper Genere le code html de l'item du menu
 * @param sfcMenuItem $item L'item a générer
 * @return string Code html de l'item
 */
function _menu_item_tag(sfcMenuItem $item) {
	if (!$item->isAuthorizedUser()) {
		return;
	}
	if ($item->getRender()) {
		$render = $item->getRender();
		$item->setRender(null);
		if (isset($render['helper'])) {
			use_helper($render['helper']);
		}
		return call_user_func($render['function'], $item);
	}
	$tmp = explode('/', $item->getLink());
	$menu_id = null;
	for ($i = 0; $i < 5; $i++) {
		if ($menu_id) {
			break;
		}
		$menu_id = array_shift($tmp);
	}
	if (!$menu_id) {
		$menu_id = 'unknown';
	}
	$menu_id = sfInflector::slugify($menu_id, '_');
	return content_tag('li', _menu_link_tag($item) . _menu_tag($item), array('class' => $item->getClass(), 'id' => 'menu_' . $item->getParent()->getName() . '_' . $menu_id));
}

/**
 * @brief Helper Génére le code html du sous menu de l'item
 * @param sfcMenuItem $item L'item avec son sous menu
 * @return string Code html de l'item
 */
function _menu_tag(sfcMenuItem $item) {
	$html = "";
	if ($item->hasItems()) {
		foreach ($item->getItems() as $sub_item) {
			$html .= _menu_item_tag($sub_item);
		}
		$html = content_tag('ul', $html);
	}
	return $html;
}

/**
 * @brief Helper Genere le lien de l'item
 * @param sfcMenuItem $item L'item source
 * @return string Code html du lien
 */
function _menu_link_tag(sfcMenuItem $item) {
	$class = $item->getClassLink();
	if ($item->hasItems()) {
		$class = $class . ' down';
	}
	$label = $item->getLabel();
	if ($item->getIcon()) {
		$image = image_tag($item->getIcon());
		$label = $image . $label;
	}
	if ($item->isAjax()) {
		return surface_link_to($label, $item->getLink(), $item->getTarget(), $item->getSkipNavigate(), array(), array('class' => $class, 'title' => $item->getTitle()));
	}
	if ($item->getIsController()) {
		return content_tag('a', $item->getLabel(), array('href' => _menu_link_to_controller_dev($item->getLink()), 'class' => $class . _menu_controller_selected($item), 'title' => $item->getTitle(), 'onclick' => "$('surface_loading').show()"));
	}
	if (strpos($item->getLink(), '#') === 0) {
		return content_tag('a', $label, array('class' => $class, 'title' => $item->getTitle(), 'href' => $item->getLink()));
	}
	$target = $item->getTarget();
	if (in_array($target, array('tg_east', 'tg_center'))) {
		$target = null;
	}
	if(substr($item->getLink(), 0, 1) == '/'){
		return SurfaceLinkTo::create($label, $item->getLink())->setHTMLOptions(array('class' => $class, 'title' => $item->getTitle()))->setPermalink(true);
	}
	return link_to($label, $item->getLink(), array('class' => $class, 'title' => $item->getTitle(), 'target' => $target));
}

/**
 * @brief Helper Génére le lien sur un controlleur. Si l'environement est en dev, celui ci est concervé.
 * @param string $link Nom du controlleur
 * @return string Nom du controlleur
 */
function _menu_link_to_controller_dev($link) {
	$regexp = '#^/(.+)\.php$#';
	$matches = array();
	if (SF_ENVIRONMENT == 'dev' && preg_match($regexp, $link, $matches)) {
		$link = '/' . $matches[1] . '_dev.php';
	}
	return $link;
}

/**
 * @brief Helper Vérifie si ce controlleur est selectionner
 * @param sfcMenuItem $item L'item qui pointe sur un controlleur
 * @return string Class CSS a apposser sur le lien
 */
function _menu_controller_selected($item) {
	$regexp = '#^/(.+)\.php$#';
	$matches = array();
	preg_match($regexp, $item->getLink(), $matches);
	if (isset($matches[1])) {
		$controller = $matches[1];
		if ($controller == SF_APP) {
			return ' selected';
		}
	}
	return null;
}
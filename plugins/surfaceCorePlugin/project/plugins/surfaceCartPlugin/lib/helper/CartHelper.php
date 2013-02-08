<?php
/**
 * @brief Helper Cart
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 fevrier 2010
 * @version 1.0
 *
 * @date 30 juin 2010
 * @version 1.1 Passage des notices vers l'objet Notice. Retrait des fonctions inutiles.
 *
 */

use_helper('Notice', 'Function');

/******************************************************************************/
		/********/
		/*Helper*/
		/********/
/******************************************************************************/

/**
 * @brief Helper Retourne une phrase qui precise le panier selectionné
 * @return string Code html
 * 
 */
function cart_selected_tag() {
	$cart = sfContext::getInstance()->getUser()->getCart(null, false);
	$html = __('session used: ');
	if($cart) {
		$html .= $cart->getName();
	}
	else {
		$html .= content_tag('i', __('none'));
	}
	return $html;
}

/**
 * @brief Helper Construit la notice: panier selectionné
 * @param Cart $cart Panier
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_select_cart_tag(Cart $cart) {
	$text = __('session selected: %name%', array('%name%' => $cart->getName()));
	$action_class = NOTICE_INFO;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: panier déselectionné
 * @param Cart $cart Panier
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_unselect_cart_tag(Cart $cart) {
	$text = __('session unselected: %name%', array('%name%' => $cart->getName()));
	$action_class = NOTICE_INFO;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: panier vidé
 * @param Cart $cart Panier
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_empty_cart_tag(Cart $cart) {
	$text = __('session %name% has been empty', array('%name%' => $cart->getName()));
	$action_class = NOTICE_WARNING;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: ajouté au panier
 * @param Cart $cart Panier
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_add_to_cart_tag(Cart $cart, BaseObject $object) {
	$text = __('%object_name% has been added to session %name%', array('%object_name%' => (string) $object, '%name%' => $cart->getName()));
	$action_class = NOTICE_SUCCESS;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: ajouté x element au panier
 * @param Cart $cart Panier
 * @param int $count nombre d'elements
 * @param string $type type d'elements
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 * 
 */
function cart_notice_add_multiple_to_cart_tag(Cart $cart, $count, $type = 'item') {
	if ($count > 1) {
		$text = __('%count% %type%s has been added to session %name%', array('%count%' => $count, '%type%' => $type, '%name%' => $cart->getName()));
	} else {
		$text = __('%count% %type% has been added to session %name%', array('%count%' => $count, '%type%' => $type, '%name%' => $cart->getName()));
	}
	$action_class = NOTICE_SUCCESS;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: retrait du panier
 * @param Cart $cart Panier
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_remove_from_cart_tag(Cart $cart, BaseObject $object) {
	$text = __('%object_name% has been removed to session %name%', array('%object_name%' => (string) $object, '%name%' => $cart->getName()));
	$action_class = NOTICE_INFO;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: retrait du panier de x elements
 * @param Cart $cart Panier
 * @param int $count nombre d'elements
 * @param string $type type d'elements
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_remove_multiple_from_cart_tag(Cart $cart, $count, $type = 'item') {
	if ($count > 1) {
		$text = __('%count% %type%s has been removed of session %name%', array('%count%' => $count, '%type%' => $type, '%name%' => $cart->getName()));
	} else {
		$text = __('%count% %type% has been removed of session %name%', array('%count%' => $count, '%type%' => $type, '%name%' => $cart->getName()));
	}
	$action_class = NOTICE_INFO;
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: Ajout des elements a votre session
 * @param Cart $cart Cart Contenant les items
 * @param Cart $from_cart Cart recevant les items
 * @param  $type string Nom du type d'item
 * @return Notice Objet notice
 * 
 */
function cart_notice_copy_to_cart_tag($cart, $from_cart, $type) {
	$action_class = NOTICE_SUCCESS;
	$text = __('%type% of %from_cart% has been added to your cart.', array('%type%' => cart_get_name($type), '%from_cart%' => $from_cart->getName()));
	return _cart_notice_tag($text, $action_class);
}

/**
 * @brief Helper Construit la notice: erreur
 * @param Cart $cart Panier
 * @return Notice Objet notice
 * @see _cart_notice_tag($text, $action_class)
 *
 */
function cart_notice_error_tag($message) {
	$action_class = NOTICE_ERROR;
	return _cart_notice_tag($message, $action_class);
}

/**
 * @brief Helper Construit l'icon cliquable d'ajout/retrait du panier
 * @param BaseObject $object Objet sur lequel portera l'action
 * @param array $options_add Option pour l'action d'ajout au panier
 * @param array $options_delete Option pour l'action de retrait du panier
 * @param bool $update Vrai si ce tag est appelé pour rafraichir ce meme tag
 * @param Cart $cart Session concerné, sinon celle selectionné
 * @return string Code html
 *
 * Construit le code html de l'icone cliquable pour l'ajout et le retrait
 * d'un item du panier en cours. Si l'item est deja dans le panier, l'action
 * sera le retrait de l'item du panier. Sinon ce sera l'action d'ajout dans
 * le panier.
 * Les tableaux $options_add et $options_delete permettent de personnalisé
 * ses actions. Tous deux aceptent les parametres action, icon et title. Ces
 * derniers permettent de spécifier l'action appelé, l'icone cliquable ainsi
 * que le titre de l'image.
 *
 */
function cart_object_action_tag($object, $options_add = array(), $options_delete = array(), $update = false, $cart = null) {
	if(!$cart) { $cart = sfContext::getInstance()->getUser()->getCart(null, false); }
	if($cart) {
		if(!$cart->hasItem($object)) {
			$options = _cart_get_options_for_add($object, $options_add);
		}
		else {
			$options = _cart_get_options_for_delete($object, $options_delete);
		}
		return _cart_object_action_tag($options, $update);
	}
	return '';
}

/**
 * @brief Helper Recharge l'icone cliquable
 * @param BaseObject $object Objet sur lequel portera l'action
 * @param string $refresh_id Identifiant de l'element a rafraichir
 * @return string Code html
 * 
 */
function cart_update_object_action_tag($object, $refresh_id) {
	$options = array(	'action'	=> 'update',
				'content'	=> cart_object_action_tag($object, array('id' => $refresh_id), array('id' => $refresh_id), true)
		);
	return javascript_tag(surface_javascript_update_element_function($refresh_id, $options));
}

/**
 * @brief Helper Construit le bouton d'ajout/retrait du panier dans l'action show
 * @param BaseObject $object Objet sur lequel portera l'action
 * @param array $options_add Option pour l'action d'ajout au panier
 * @param array $options_delete Option pour l'action de retrait du panier
 * @param bool $update Vrai si ce tag est appelé pour rafraichir ce meme tag
 * @param Cart $cart Session concerné, sinon celle selectionné
 * @return string Code html
 *
 */
function cart_show_object_action_tag($object, $options_add = array(), $options_delete = array(), $update = false, $cart = null) {
	if(!$cart) { $cart = sfContext::getInstance()->getUser()->getCart(null, false); }
	if($cart) {
		if(!$cart->hasItem($object)) {
			$options = _cart_get_options_for_add($object, $options_add);
		}
		else {
			$options = _cart_get_options_for_delete($object, $options_delete);
		}
		return _cart_show_object_action_tag($options, $update);
	}
	return '';
}

/**
 * @brief Helper Recharge l'icone cliquable
 * @param BaseObject $object Objet sur lequel portera l'action
 * @param bool $refresh_id Identifiant de l'element a rafraichir
 * @return string Code html
 * 
 */
function cart_update_show_object_action_tag($object, $refresh_id) {
	$options = array(	'action'	=> 'update',
				'content'	=> cart_show_object_action_tag($object, array('id' => $refresh_id), array('id' => $refresh_id), true)
		);
	$refresh_id .= '_show';
	return javascript_tag(surface_javascript_update_element_function($refresh_id, $options));
}

/**
 * @brief Construit la checkbox ainsi que sont label pour les filtres
 * @param array $filters Les filtres en cours
 * @param string $class_name Class a faire apparaitre dans le label
 * @param string $name Attribut name de la checkbox
 * @return string Code html du filtre
 * 
 */
function cart_filter_tag($filters, $class_name, $name = 'cartable') {
	$html_name = 'filters[' . $name . ']';
	$html = surface_checkbox_tag($html_name, 1, get($name, $filters));
	$html .= surface_label_for_checkbox_tag(get_id_from_name($html_name), __('filtering %%items%% of cart.', array('%%items%%' => strtolower(cart_get_name($class_name, true)))));
	return $html;
}

/**
 * @brief Helper Créer une image clicable pour selectionné une session
 * @param Cart $cart Session sur laquelle porte l'action
 * @param bool $update Vrai si update du tag
 * @return string Code html
 *
 */
function cart_action_select_cart_tag(Cart $cart, $update = false) {
	use_helper('BaseSurface');
	$id = 'div_cart_select_' . $cart->getId();
	$target = _cart_notice_target();
	if($cart->getSelected()) {
		$img_src = '/surfaceCartPlugin/images/cart_action_on.png';
		$html = image_tag($img_src);
		if(!$update) { $html = content_tag('div', $html, array('id' => $id)); }
	}
	else {
		$link = 'cart/selectCart?id=' . $cart->getId();
		$img_src = '/surfaceCartPlugin/images/cart_action_off.png';
		$html = image_surface_link_to_tag($img_src, $link, $target);
		if(!$update) { $html = content_tag('div', $html, array('id' => $id)); }
	}
	return $html;
}

/**
 * @brief Helper Genere le code javascript necessaire au rechargement du tag
 * @param Cart $cart Nouveau cart selectionné
 * @param Cart $old_cart Ancien cart selectionné
 * @return string Code html
 *
 */
function cart_update_action_select_cart_tag(Cart $cart, Cart $old_cart = null) {
	$update = "";
	$target = 'div_cart_select_' . $cart->getId();
	$update = surface_javascript_update_element_function($target, array('action' => 'update', 'content' => cart_action_select_cart_tag($cart, true)));
	if($old_cart) {
		$target = 'div_cart_select_' . $old_cart->getId();
		$update .= surface_javascript_update_element_function($target, array('action' => 'update', 'content' => cart_action_select_cart_tag($old_cart, true)));
	}
	return javascript_tag($update);
}

/**
 * @brief Helper Ajoute un partial personnalisé si celui ci est activé
 * @param Cart $cart Cart selectionné
 * @param BaseObject $object Objet qui a subit l'action
 * @return string Code html
 * 
 */
function cart_partial_success_tag(Cart $cart, BaseObject $object) {
	if(_cart_has_partial_success(getclass($object))) {
		$action = sfContext::getInstance()->getActionName();
		$partial = $action . '_' . getclass($object);
		return get_partial($partial, array('cart' => $cart, 'object' => $object));
	}
	return '';
}

/**
 * @brief Helper Construit le menu representant la session
 * @return string Code html du menu résumé de la session
 *
 */
function cart_menu_tag() {
	use_helper('Menu');
	return menu_tag(cart_get_menu());
}

/**
 * @brief Helper Met a jour le menu de la session
 * @return string Code html pour mettre a jour le menu de la session
 *
 */
function cart_update_menu_tag() {
	use_helper('Menu');
	return menu_update_tag(cart_get_menu());
}

/******************************************************************************/
		/*****************/
		/*Fonction public*/
		/*****************/
/******************************************************************************/

/**
 * @brief Helper Retourne le nom d'un type donné.
 * @param string $type Nom de la class de l'objet
 * @param bool $plural Indique si le nom doit etre au pluriel
 * @return string
 * 
 */
function cart_get_name($type, $plural = false) {
	return Cart::getItemName($type, $plural);
}

/**
 * @brief Helper Retourne l'objet menu de la session
 * @return sfcCartMenu Menu de la session
 *
 */
function cart_get_menu() {
	return sfcCartMenu::getInstance();
}

/******************************************************************************/
		/************/
		/*Tag privée*/
		/************/
/******************************************************************************/

/**
 * @brief Helper privée Construit la zone de notification
 * @param string $text Texte a afficher
 * @param string $type Type de notice
 * @return Notice Objet notice
 *
 */
function _cart_notice_tag($text, $type) {
	$notice = new Notice($text);
	$notice->setType($type);
	return $notice;
}

/**
 * @brief Helper privée Construit l'icon cliquable d'ajout/retrait du panier
 * @param array $options Option de l'action
 * @param bool $update Vrai si pour rafraichir ce meme tag
 * @return string Code html
 * 
 */
function _cart_object_action_tag($options, $update = false) {
	$html = image_tag($options['icon'], array('title' => __($options['title'])));
	$html = content_tag('span', content_tag('span', $html));
	$html = surface_link_to($html, $options['action'] . '?object_id=' . $options['object_id'] . '&object_name=' . $options['object_name'] . '&refresh_id=' . $options['id'], $options['target']);
	if(!$update) { $html = content_tag('div', $html, array('id' => $options['id'])); }
	return $html;
}

/**
 * @brief Helper privée Construit le bouton d'ajout/retrait du panier dans l'action show
 * @param array $options Option de l'action
 * @param bool $update Vrai si pour rafraichir ce meme tag
 * @return string Code html
 *
 */
function _cart_show_object_action_tag($options, $update) {
	$button = surface_button_to(	'',
					$options['action'] .
						'?object_id=' . $options['object_id'] .
						'&object_name=' . $options['object_name'] .
						'&refresh_id=' . $options['id'],
					$options['target'],
					true,
					array(),
					array('class' => $options['class'])
			);
	if(!$update) { $button = content_tag('div', $button, array('id' => $options['id'] . '_show')); }
	return $button;
}

/******************************************************************************/
		/*******************/
		/*Fonctions privées*/
		/*******************/
/******************************************************************************/

/**
 * @brief Fonction privé Retourne un criteria equivalent pour selectionner les items du panier du type donné
 * @param Cart $cart Panier a visionner
 * @param string $name Type d'item
 * @param string $peer Class peer a interoger
 * @return Criteria Criteria equivalent
 *
 */
function _cart_get_criteria_equivalent(Cart $cart, $name, $peer) {
	$criteria = new Criteria();
	$criteria->addJoin(CartItemPeer::OBJECT_ID, constant($peer . '::ID'));
	$criteria->add(CartItemPeer::CART_ID, $cart->getId());
	$criteria->add(CartItemPeer::OBJECT_NAME, $name);
	return $criteria;
}

/**
 * @brief Fonction privé Retourne les options complete pour l'action add
 * @param BaseObject $object Objet en cours
 * @param array $options Option personnalisé
 * @return array Option pour l'action add
 * 
 */
function _cart_get_options_for_add($object, $options) {
	$default_options = array(	'action'	=> 'cart/addToCart',
					'icon'		=> '/surfaceCartPlugin/images/cart_put.png',
					'title'		=> 'add to cart',
					'target'	=> _cart_notice_target(),
					'object_id'	=> $object->getId(),
					'object_name'	=> getclass($object),
					'id'		=> 'cart_action_' . getclass($object) . '_' . $object->getId(),
					'class'		=> 'cart_add_button');
	return array_merge($default_options, $options);
}

/**
 * @brief Fonction privé Retourne les options complete pour l'action delete
 * @param BaseObject $object Objet en cours
 * @param array $options Option personnalisé
 * @return array Option pour l'action delete
 *
 */
function _cart_get_options_for_delete($object, $options) {
	$default_options = array(	'action'	=> 'cart/removeFromCart',
					'icon'		=> '/surfaceCartPlugin/images/cart_remove.png',
					'title'		=> 'remove from cart',
					'target'	=> _cart_notice_target(),
					'object_id'	=> $object->getId(),
					'object_name'	=> getclass($object),
					'id'		=> 'cart_action_' . getclass($object) . '_' . $object->getId(),
					'class'		=> 'cart_remove_button');
	return array_merge($default_options, $options);
}

/**
 * @brief Fonction privé Vérifie si cette item possede un partial pour l'action
 * @param string $class Nom de la class de l'element
 * @return bool
 * 
 */
function _cart_has_partial_success($class) {
	$config = _cart_get_config($class);
	return get('action_partial', $config);
}

/**
 * @brief Helper Retourne le nom de la zone des notices
 * @return string Nom de la zone pour affiché les notices
 *
 */
function _cart_notice_target() {
	$config = Cart::getGlobalConfig();
	return get(array('notice', 'target'), $config, NOTICE_TARGET);
}

function _cart_get_config($class = null) {
	return Cart::getConfig($class);
}

function _cart_get_global_config() {
	return Cart::getGlobalConfig();
}

/******************************************************************************/
		/*****/
		/*CSS*/
		/*****/
/******************************************************************************/

function cart_use_theme() {
	cart_use_stylesheet();
}

function cart_use_stylesheet() {
	return use_stylesheet('/surfaceCartPlugin/css/cart.css');
}

/******************************************************************************/
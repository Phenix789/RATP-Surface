<?php
/**
 * @brief helper
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
 * @brief Helper Champs caché pour l'analytic
 * @fn function analytic_tag()
 * @return string code html du composant
 *
 */
function analytic_tag() {
	$html = "";
	$html .= analytic_screen_tag();
	$html .= analytic_navigator_tag();
	return $html;
}

/**
 * @brief Helper Champs caché pour l'analytic specifique a l'ecran client
 * @fn function anlytic_screen_tag()
 * @return string code html du composant
 * 
 */
function analytic_screen_tag() {
	$html = "";
	$html .= surface_input_hidden_tag('analytic[screen_width]');
	$html .= surface_input_hidden_tag('analytic[screen_height]');
	$html .= surface_input_hidden_tag('analytic[screen_inner_width]');
	$html .= surface_input_hidden_tag('analytic[screen_inner_height]');
	$html .= javascript_tag("$('analytic_screen_width').value = screen.width; $('analytic_screen_height').value = screen.height; $('analytic_screen_inner_width').value = window.innerWidth; $('analytic_screen_inner_height').value = window.innerHeight;");
	return $html;
}

/**
 * @brief Helper Champs caché pour l'analytic specifique au navigateur client
 * @brief function analytic_navigator_tag()
 * @return string code html du composant
 *
 */
function analytic_navigator_tag() {
	$html = "";
	$html .= surface_input_hidden_tag('analytic[navigator_cookie_enabled]');
	$html .= surface_input_hidden_tag('analytic[navigator_language]');
	$html .= surface_input_hidden_tag('analytic[navigator_platform]');
	$html .= surface_input_hidden_tag('analytic[navigator_product]');
	$html .= surface_input_hidden_tag('analytic[navigator_product_sub]');
	$html .= surface_input_hidden_tag('analytic[navigator_vendor]');
	$html .= surface_input_hidden_tag('analytic[navigator_vendor_sub]');
	$html .= javascript_tag("
			$('analytic_navigator_cookie_enabled').value = navigator.cookieEnabled;
			$('analytic_navigator_language').value = navigator.language;
			$('analytic_navigator_platform').value = navigator.platform;
			$('analytic_navigator_product').value = navigator.product;
			$('analytic_navigator_product_sub').value = navigator.productSub;
			$('analytic_navigator_vendor').value = navigator.vendor;
			$('analytic_navigator_vendor_sub').value = navigator.vendorSub;
			    ");
	return $html;
}

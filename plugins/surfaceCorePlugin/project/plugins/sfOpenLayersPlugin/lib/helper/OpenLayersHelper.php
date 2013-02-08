<?php
use_helper('OpenLayersMap', 'OpenLayersToolbar');

function openlayers_use_theme($theme = 'default') {
	openlayers_load($theme);
}

function openlayers_load($theme = 'default') {
	//JS
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/OpenLayers.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/proj4js-combined.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/defs/EPSG27572.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/OpenLayers/Lang/fr.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/OpenLayers/Control/ElogysExportImage.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/OpenLayers/Control/ElogysModifyFeature.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/OpenLayers/Control/ElogysRemoveFeature.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/OpenLayers/Control/ElogysGetPointInfo.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/OpenLayers/Control/ElogysFullScreen.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/OpenLayersHelper.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfOpenLayersPlugin/lib/SurfaceLayers/SurfaceLayers.js');
	
	//CSS
	sfContext::getInstance()->getResponse()->addStyleSheet('/sfOpenLayersPlugin/theme/' . $theme . '/style.css');
	sfContext::getInstance()->getResponse()->addStyleSheet('/sfOpenLayersPlugin/OpenLayers.css');
}

function openlayers_map_container($map, $html_options = array()) {
	$div_id = get_id_from_name($map);
	$html_options['id'] = $div_id;
	$html = content_tag("div", "", $html_options);

	$html .= javascript_tag("OpenLayers.Lang.setCode('fr');");

	return $html;
}
<?php

use_helper('Javascript');

define("OLJS_DRW_POINT", 1);
define("OLJS_DRW_PATH", 2);
define("OLJS_DRW_POLYGON", 3);

define("OLJS_MOD_RESHAPE", 1);
define("OLJS_MOD_RESIZE", 2);
define("OLJS_MOD_ROTATE", 4);
define("OLJS_MOD_DRAG", 8);

function _oljs_control_exportImage_create($options = array()) {
	if (isset($options['url'])) {
		$options['url'] = '"' . $options['url'] . '"';
	}
	if (isset($options['params'])) {
		$options['params'] = '"' . $options['params'] . '"';
	}

	return 'new OpenLayers.Control.ElogysExportImage(' . _options_for_javascript($options) . ')';
}

function _oljs_control_drawFeature_create($options = array()) {
	$layer = _get_option($options, 'layer', 'null');

	$szType = "Point";
	switch (_get_option($options, 'handler', OLJS_DRW_POINT)) {
		// case OLJS_DRW_POINT :     $szType = "Point";    break;
		case OLJS_DRW_PATH : $szType = "Path";
			break;
		case OLJS_DRW_POLYGON : $szType = "Polygon";
			break;
	}

	$handler = 'OpenLayers.Handler.' . $szType;

	if (!isset($options['displayClass'])) {
		$options['displayClass'] = '"olControlDrawFeature' . $szType . '"';
	}

	return 'new OpenLayers.Control.DrawFeature(' . $layer . ',' . $handler . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_modifyFeature_create($options = array()) {
	$layer = _get_option($options, 'layer', 'null');

	$js_mode = array();
	$mode = _get_option($options, 'mode', 0);
	if ($mode & OLJS_MOD_RESHAPE) {
		$js_mode[] = "OpenLayers.Control.ModifyFeature.RESHAPE";
	}
	if ($mode & OLJS_MOD_RESIZE) {
		$js_mode[] = "OpenLayers.Control.ModifyFeature.RESIZE";
	}
	if ($mode & OLJS_MOD_ROTATE) {
		$js_mode[] = "OpenLayers.Control.ModifyFeature.ROTATE";
	}
	if ($mode & OLJS_MOD_DRAG) {
		$js_mode[] = "OpenLayers.Control.ModifyFeature.DRAG";
	}
	if ($js_mode) {
		$options['mode'] = implode(" | ", $js_mode);
	}

	if (!isset($options['displayClass'])) {
		$options['displayClass'] = '"olControlModifyFeature' . (($mode & OLJS_MOD_ROTATE) ? "Rotate" : "Reshape") . '"';
	}

	return 'new OpenLayers.Control.ElogysModifyFeature(' . $layer . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_selectFeature_create($options = array()) {
	$layer = _get_option($options, 'layer', 'null');

	return 'new OpenLayers.Control.SelectFeature(' . $layer . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_removeFeature_create($options = array()) {
	$layer = _get_option($options, 'layer', 'null');

	return 'new OpenLayers.Control.ElogysRemoveFeature(' . $layer . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_pointInfo_create($options = array()) {
	$layer = _get_option($options, 'layer', 'null');
	$url = _get_option($options, 'url', null);
	if ($url) {
		$url = "'" . url_for($url, true) . "'";
	}
	$target = _get_option($options, 'target', null);
	if ($target) {
		$target = "'" . $target . "'";
	}

	return 'new OpenLayers.Control.ElogysGetPointInfo(' . $url . ',' . $target . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_fullScreen_create($options = array()) {
	return 'new OpenLayers.Control.ElogysFullScreen(' . _options_for_javascript($options) . ')';
}

function _oljs_control_measure_create($options = array()) {
	// $layer = _get_option($options, 'layer', 'null');
	$handler = 'OpenLayers.Handler.' . ucfirst(_get_option($options, 'handler', 'point'));

	return 'new OpenLayers.Control.Measure(' . $handler . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_selection_create($options = array()) {
	$layer = _get_option($options, 'layer', 'null');
	$handler = 'OpenLayers.Handler.RegularPolygon';
	$options['sides'] = '40';

	/*
	  polyOptions = {sides: 4};   // 3: triangle, 4: carré, 5: pentagone ... 40: cercle
	  polygonControl = new OpenLayers.Control.DrawFeature(polygonLayer,
	  OpenLayers.Handler.RegularPolygon,
	  {handlerOptions: polyOptions});
	 */
	return 'new OpenLayers.Control.DrawFeature(' . $layer . ',' . $handler . ',' . _options_for_javascript($options) . ')';
}

function _oljs_control_create($class, $options = array()) {
	if (isset($options['title'])) {
		$options['title'] = '"' . escape_javascript($options['title']) . '"';
	}
	if (isset($options['displayClass'])) {
		$options['displayClass'] = '"' . $options['displayClass'] . '"';
	}

	switch ($class) {
		case 'ExportImage':
			$js = _oljs_control_exportImage_create($options);
			break;
		case 'DrawFeature':
			$js = _oljs_control_drawFeature_create($options);
			break;
		case 'ModifyFeature':
			$js = _oljs_control_modifyFeature_create($options);
			break;
		case 'SelectFeature' :
			$js = _oljs_control_selectFeature_create($options);
			break;
		case 'RemoveFeature' :
			$js = _oljs_control_removeFeature_create($options);
			break;
		case 'Measure' :
			$js = _oljs_control_measure_create($options);
			break;
		case 'Selection' :
			$js = _oljs_control_selection_create($options);
			break;
		case 'PointInfo' :
			$js = _oljs_control_pointInfo_create($options);
			break;
		case 'FullScreen' :
			$js = _oljs_control_fullScreen_create($options);
			break;
		default :
			$js = 'new OpenLayers.Control.' . $class . '(' . _options_for_javascript($options) . ')';
	}

	return $js;
}

function oljs_toolbar_addControl($map, $toolbar_id, $control_class, $options = array()) {
	$js = 'if (' . $map . ') {';
	$js .= 'var ' . $toolbar_id . ' = ' . $map . '.getControl("' . $toolbar_id . '");';
	$js .= 'if (' . $toolbar_id . ') {';
	if (isset($options['layer'])) {
		$js .= 'var ' . $options['layer'] . ' = ' . $map . '.getLayer("' . $options['layer'] . '");';
	}
	$js .= $toolbar_id . '.addControls(' . _oljs_control_create($control_class, $options) . ');';
	$js .= '}';
	$js .= '}';

	return $js;
}

function oljs_toolbar_create($map, $toolbar_id, $options = array()) {
	$options = array_merge(array('displayClass' => '"olControlToolbar"'),
			$options);
	$options['id'] = '"' . $toolbar_id . '"';

	$js = 'var ' . $toolbar_id . ' = new OpenLayers.Control.Panel(' . _options_for_javascript($options) . ');';
	$js .= 'if (' . $map . ' && ' . $toolbar_id . ') {';
	$js .= $map . '.addControl(' . $toolbar_id . ');';
	$js .= '}';

	return $js;
}
<?php
use_helper('Javascript');

function _oljs_name_to_var($name) {
	return $name; // get_id_from_name($name);  .'_map';
}

function oljs_map_create($map, $options = array()) {
	$js = '
var %map% = new OpenLayers.Map(\'%div%\', %options%);
window.%map% = %map%;
SurfaceLayers.map = %map%;
';
	
	$div = get_id_from_name($map);
	if($value = _get_option($options, 'tile_size', '384x384')) {
		$value = str_replace('x', ', ', $value);
		$options['tileSize'] = 'new OpenLayers.Size(' . $value . ')';
	}
	if(_get_option($options, 'pan_zoom_bar', false)) {
		$options['controls'] = '[ new OpenLayers.Control.Navigation(), new OpenLayers.Control.PanZoomBar(), new OpenLayers.Control.ArgParser(), new OpenLayers.Control.Attribution() ]';
	}
	if($eventListeners = _get_option($options, 'event_listeners', array())) {
		$options['eventListeners'] = _options_for_javascript($eventListeners);
	}
	$options = _options_for_javascript($options);

	$js = str_replace(
		array('%map%', '%div%', '%options%'),
		array($map, $div, $options),
		$js
	);
	return $js;
}

function oljs_map_addLayerSwitcher($map, $options = array()) {
	$js = 'if (' . $map . ') {';
	$js .= 'var layer_switcher = new OpenLayers.Control.LayerSwitcher(' . _options_for_javascript($options) . ');';
	$js .= $map . '.addControl(layer_switcher);';
	// $js .= 'layer_switcher.maximizeControl()';
	$js .= '}';

	return $js;
}

function oljs_map_addScaleLine($map, $options = array()) {
	$js = 'if (' . $map . ') {';
	$js .= $map . '.addControl(new OpenLayers.Control.ScaleLine(' . _options_for_javascript($options) . '));';
	$js .= '}';

	return $js;
}

function oljs_map_addScaleInfo($map, $options = array()) {
	$js = 'if (' . $map . ') {';
	$js .= $map . '.addControl(new OpenLayers.Control.Scale("scale", ' . _options_for_javascript($options) . '));';
	$js .= '}';

	return $js;
}

function oljs_map_addToolbar($map, $toolbar) {
	$js = 'if (' . $map . ' && ' . $toolbar . ') {';
	$js .= $map . '.addControl(' . $toolbar . ');';
	$js .= '}';

	return $js;
}

function oljs_map_addLayerWMS($map, $layer, $url, $options = array()) {
	$js = '
var %layer% = new OpenLayers.Layer.WMS(\'%name%\', %url%, %param%, %options% );
%layer%.id = \'%layer%\';
%map%.addLayer(%layer%);
SurfaceLayers.layers.%layer% = %layer%;
';

	$url = '["' . implode('", "', (array) $url) . '"]';
	$name = addslashes(_get_option($options, 'name', $layer));

	$params = array();
	$params['layers'] = _array_or_string_for_javascript(_get_option($options, 'layers', "all"));
	if($value = _get_option($options, 'format')) { $params['format'] = '"' . $value . '"'; }
	if($value = _get_option($options, 'transparent', true)) { $params['TRANSPARENT'] = $value ? 'true' : 'false'; }
	if($value = _get_option($options, 'scale')) { $params['scale'] = $scale; }
	$params = _options_for_javascript($params);

	$options['isBaseLayer'] = _get_option($options, 'base_layer', true) ? 'true' : 'false';
	$options['visibility'] = _get_option($options, 'visible', true) ? 'true' : 'false';
	$options['layer_id'] = _array_or_string_for_javascript($layer);
	if($eventListeners = _get_option($options, 'event_listeners', array())) { $options['eventListeners'] = _options_for_javascript($eventListeners); }
	$options = _options_for_javascript($options);

	$js = str_replace(
			array('%map%', '%layer%', '%name%', '%url%', '%param%', '%options%'),
			array($map, $layer, $name, $url, $params, $options),
			$js);
	return $js;
}

function oljs_map_addLayerMarker($map, $layer, $options = array()) {
	$js = '
var %layer% = new OpenLayers.Layer.Markers(\'%name%\', %options%);
%layer%.id = \'%layer%\';
%map%.addLayer(%layer%);
SurfaceLayers.layers.%layer% = %layer%;
';
	
	$name = addslashes(_get_option($options, 'name', $layer));
	$options = _options_for_javascript($options);

	$js = str_replace(
			array('%map%', '%layer%', '%name%', '%options%'),
			array($map, $layer, $name, $options),
			$js
	);
	return $js;
}

function oljs_map_addLayerWFS($map, $layer, $url, $options = array()) {
	$js = '
var %layer% = new OpenLayers.Layer.WFS(\'%name%\', %url%, %params%, %options%);
%layer%.setOpacity(1);
%map%.addLayer(%layer%);
SurfaceLayers.layers.%layer% = %layer%;
';
	
	$url = '["' . implode('", "', (array) $url) . '"]';
	$name = addslashes(_get_option($options, 'name', $layer));

	$params = array();
	$params['typename'] = _array_or_string_for_javascript(_get_option($options, 'layers', "all"));
	if($value = _get_option($options, 'format')) { $params['format'] = '"' . $value . '"'; }
	$params = _options_for_javascript($params);

	$options['isBaseLayer'] = _get_option($options, 'base_layer', false) ? 'true' : 'false';
	$options['visibility'] = _get_option($options, 'visible', true) ? 'true' : 'false';
	$options['ratio'] = 1;
	$options['layer_id'] = _array_or_string_for_javascript($layer);
	if($eventListeners = _get_option($options, 'event_listeners', array())) { $options['eventListeners'] = _options_for_javascript($eventListeners); }
	$options = _options_for_javascript($options);

	$js = str_replace(
			array('%map%', '%layer%', '%name%', '%url%', '%params%', '%options%'),
			array($map, $layer, $name, $url, $params, $options),
			$js
	);
	return $js;
}

function oljs_map_addLayerVector($map, $layer, $options = array()) {
	$js = '
var %layer% = new OpenLayers.Layer.Vector(\'%name%\', %options%);
%layer%.id = \'%layer%\';
%map%.addLayer(%layer%);
SurfaceLayers.layers.%layer% = %layer%;
';

	$name = addslashes(_get_option($options, 'name', $layer));
	
	$options['isBaseLayer'] = _get_option($options, 'base_layer', false) ? 'true' : 'false';
	$options['visibility'] = _get_option($options, 'visible', true) ? 'true' : 'false';
	$options['layer_id'] = _array_or_string_for_javascript($layer);
	if($eventListeners = _get_option($options, 'event_listeners', array())) { $options['eventListeners'] = _options_for_javascript($eventListeners); }
	$options = _options_for_javascript($options);

	$js = str_replace(
			array('%map%', '%layer%', '%name%', '%options%'),
			array($map, $layer, $name, $options),
			$js
	);
	return $js;
}

function oljs_map_zoomToMaxExtent($map_name) {
	$map = _oljs_name_to_var($map_name);

	return sprintf('oljs_map_zoomToMaxExtent(%s);', $map);
}

function oljs_map_zoomToExtent($map_name, $extend) {
	$map = _oljs_name_to_var($map_name);
	return $map.'.zoomToExtent(new OpenLayers.Bounds('.$extend.'), true);';
}

function oljs_zoom_on_object($map_name, $geometry) {
	$map = _oljs_name_to_var($map_name);

	return sprintf('oljs_map_zoomToGeom(%s, %s);',
		$map,
		_array_or_string_for_javascript($geometry));
}

function oljs_zoom_on_layer_data($map_name, $layer_id) {
	$map = _oljs_name_to_var($map_name);

	return sprintf('oljs_map_zoomToLayerData(%s, "%s");',
		$map,
		$layer_id);
}

function _oljs_map_create_popup($map_name, $js_lonlat, $content, $options) {
	$map = _oljs_name_to_var($map_name);
	$options = _parse_attributes($options);

	$js_options = array();
	$js_options['closable'] = _get_option($options, "closable", true) ? 'true' : 'false';
	$js_options['bk_color'] = _array_or_string_for_javascript(_get_option($options, "bk_color", '#ffffcc'));
	$js_options['border'] = _array_or_string_for_javascript(_get_option($options, "border", 2) . 'px');
	$js_options['opacity'] = _get_option($options, "opacity", 0.9);
	$js_options['exlusif'] = _get_option($options, "exclusif", true) ? 'true' : 'false';
	$size = _get_option($options, "size", null);
	if($size && is_string($size)) {
		// $js_options['size'] = str_replace('x', ',', $size);
		if(sscanf($size, "%dx%d", $width, $height) == 2) {
			$js_options['size']['width'] = $width;
			$js_options['size']['height'] = $height;
		}
	}

	return sprintf('oljs_map_createPopup(%s, %s, "%s", %s);',
		$map,
		$js_lonlat,
		escape_javascript($content),
		_options_for_javascript($js_options));
}

function oljs_map_del_all_features($map, $layer_id, $options = array()) {
	$map = _oljs_name_to_var($map);

	return sprintf('oljs_layer_deleteAllFeatures(%s, "%s", %s);',
		$map,
		$layer_id,
		_options_for_javascript($options));
}

function oljs_map_add_object($map_name, $layer_id, $geometry, $options = array()) {
	$map = _oljs_name_to_var($map_name);

	$extends_geometry = _get_option($options, "extends_geometry", null);
	$zoom = _get_option($options, "zoom", true);
	$style = _get_option($options, "style", array());

	$js = sprintf('oljs_layer_addFeaturesFromGeom(%s, "%s", %s, %s, %s);',
			$map,
			$layer_id,
			_array_or_string_for_javascript($geometry),
			_options_for_javascript($options),
			_options_for_javascript($style));
	if($zoom) {
		if($extends_geometry) {
			$js .= oljs_zoom_on_object($map_name, $extends_geometry);
		}
		else {
			$js .= oljs_zoom_on_layer_data($map_name, $layer_id);
		}
	}

	return $js;
}

function oljs_map_add_marker($map_name, $layer_id, $geometry, $options = array()) {
	$map = _oljs_name_to_var($map_name);
	$options = _parse_attributes($options);

	$extends_geometry = _get_option($options, "extends_geometry", null);
	$zoom = _get_option($options, "zoom", true);
	$icon = _get_option($options, "icon", null);
	if(!$icon) {
		$icon = '/sfOpenLayersPlugin/theme/elogys/img/marker_aqua.png';
	}

	$events = array();

	$popup_content = _get_option($options, "popup_content", null);
	$popup_options = _get_option($options, "popup_options", array());
	if($popup_content) {
		$events['mouseover'] = "function(evt) { " . _oljs_map_create_popup($map_name,
				'evt.object.lonlat.clone()',
				$popup_content,
				$popup_options) . " OpenLayers.Event.stop(evt);}";
	}

	$js = sprintf('oljs_layer_addMakerFromGeom(%s, "%s", %s, "%s", %s);',
			$map,
			$layer_id,
			_array_or_string_for_javascript($geometry),
			$icon,
			_options_for_javascript($events)
	);
	if($zoom) {
		if($extends_geometry) {
			$js .= oljs_zoom_on_object($map_name, $extends_geometry);
		}
		else {
			$js .= oljs_zoom_on_layer_data($map_name, $layer_id);
		}
	}

	return $js;
}

function oljs_map_add_point($map_name, $layer_id, $latitude, $longitude, $options = array()) {
	$map = _oljs_name_to_var($map_name);

	$extends_geometry = _get_option($options, "extends_geometry", null);
	$zoom = _get_option($options, "zoom", true);

	$js = sprintf('oljs_layer_addPointFromLonLat(%s, "%s", %f, %f, "%s");',
			$map,
			$layer_id,
			$longitude,
			$latitude,
			"EPSG:4326"
	);
	if($zoom) {
		if($extends_geometry) {
			$js .= oljs_zoom_on_object($map_name, $extends_geometry);
		}
		else {
			$js .= oljs_zoom_on_layer_data($map_name, $layer_id);
		}
	}

	return $js;
}

function oljs_map_setBaseLayer($map, $layer_id) {
	$map = _oljs_name_to_var($map);

	return sprintf('oljs_map_setBaseLayer(%s, "%s");', $map, $layer_id);
}

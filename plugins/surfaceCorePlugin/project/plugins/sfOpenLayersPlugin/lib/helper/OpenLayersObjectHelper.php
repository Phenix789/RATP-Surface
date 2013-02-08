<?php

use_helper('OpenLayers');

function _object_oljs_create_map($map, $options = array(), $html_options = array()) {
	
	
	///////////////////////////////////////////////////////////////////////
	//die('OpenLayersObjectHelper -> _object_oljs_create_map : Deprecated ?');
	
	
	$options = _parse_attributes($options);

	$map_options = array();
	if (isset($options['extends']))
		$map_options['maxExtent'] = 'new OpenLayers.Bounds(' . $options['extends'] . ')';
	if (isset($options['max_resolution']))
		$map_options['maxResolution'] = $options['max_resolution'];
	if (isset($options['units']))
		$map_options['units'] = '"' . $options['units'] . '"';
	if (isset($options['projection']))
		$map_options['projection'] = '"' . $options['projection'] . '"';
	if (isset($options['tile_size']))
		$map_options['tile_size'] = _get_option($options, 'tile_size');
	if (isset($options['scales'])) {
		$scales = _get_option($options, 'scales');
		if (is_array($scales)) {
			$map_options['scales'] = '[' . implode(", ", $scales) . ']';
		}
		else {
			$map_options['scales'] = '[' . $scales . ']';
		}
	}
	if (isset($options['pan_zoom_bar']))
		$map_options['pan_zoom_bar'] = _get_option($options, 'pan_zoom_bar');

	$js = '
onLayerLoadStart = function () {
    SetCursorWait();
    $("surface_loading").show();
}
onLayerLoadEnd = function () {
    SetCursorNormal();
    $("surface_loading").hide();
}
';

	$js .= oljs_map_create($map,
			$map_options,
			$html_options
	);

	$bg_layers = array();
	if (isset($options['bg_layers'])) {
		$bg_layers = $options['bg_layers'];
		if (is_string($bg_layers)) {
			$bg_layers = sfYaml::load($bg_layers);
		}
	}

	foreach ($bg_layers as $layer_id => $layer_opt) {

		$layer_options = array();
		if (isset($layer_opt['name']))
			$layer_options['name'] = $layer_opt['name'];
		if (isset($layer_opt['layers']))
			$layer_options['layers'] = $layer_opt['layers'];
		if (isset($layer_opt['projection']))
			$layer_options['projection'] = '"' . $layer_opt['projection'] . '"';
		else if (isset($options['projection']))
			$layer_options['projection'] = '"' . $options['projection'] . '"';
		if (isset($layer_opt['format']))
			$layer_options['format'] = $layer_opt['format'];
		if (isset($layer_opt['base_layer']))
			$layer_options['base_layer'] = $layer_opt['base_layer'];
		if (isset($layer_opt['opacity']))
			$layer_options['opacity'] = $layer_opt['opacity'];
		if (isset($layer_opt['visible']))
			$layer_options['visible'] = $layer_opt['visible'];
		if (isset($layer_opt['transparent']))
			$layer_options['transparent'] = $layer_opt['transparent'];

		$layer_events = array();
		$layer_events['loadstart'] = _get_option($options, 'onLoadStart', 'onLayerLoadStart');
		$layer_events['loadend'] = _get_option($options, 'onLoadEnd', 'onLayerLoadEnd');
		$layer_events['loadcancel'] = _get_option($options, 'onLoadCancel', 'onLayerLoadEnd');
		$layer_options['event_listeners'] = $layer_events;



		$mapfile = sfConfig::get('app_cartographie_mapfile');
		$cadastre_year = sfConfig::get('app_cartographie_cadastre_year');
		$edigeo_year = sfConfig::get('app_cartographie_edigeo_year');
		$mapserv_url = array(
			'http://sig-1.elogys.fr:8080/mapserv?map=/home/elogys/sy_af25_intranet/data/carto/mapfile.map&cadastre_year=201105&edigeo_year=2011',
			'http://sig-2.elogys.fr:8080/mapserv?map=/home/elogys/sy_af25_intranet/data/carto/mapfile.map&cadastre_year=201105&edigeo_year=2011',
			'http://sig-3.elogys.fr:8080/mapserv?map=/home/elogys/sy_af25_intranet/data/carto/mapfile.map&cadastre_year=201105&edigeo_year=2011',
		);

		switch (get('type', $layer_opt)) {
			case 'vector' :
				$js .= oljs_map_addLayerVector($map, $layer_id, $layer_options);
				break;
			case 'wfs' :
				$js .= oljs_map_addLayerWFS($map, $layer_id, $mapserv_url, $layer_options);
				break;
			case 'wfs' :
			default:
				$js .= oljs_map_addLayerWMS($map, $layer_id, $mapserv_url, $layer_options);
				break;
		}
	}

	$scanline = array();
	if (isset($options['scaleline'])) {
		$scanline = $options['scaleline'];
		if (is_string($scanline)) {
			$scanline = sfYaml::load($scanline);
		}
	}
	$js .= _object_oljs_scaleline($map, $scanline);
	$js .= oljs_map_addScaleInfo($map);

	$layer_switcher = array();
	if (isset($options['layer_switcher'])) {
		$layer_switcher = $options['layer_switcher'];
		if (is_string($layer_switcher)) {
			$layer_switcher = sfYaml::load($layer_switcher);
		}
	}
	if ($layer_switcher) {
		$js .= _object_oljs_layerswitcher($map, $layer_switcher);
	}

	return $js;
}

function _object_oljs_scaleline($map, $options) {
	$options = array_merge(array('maxWidth' => 150,
			'topOutUnits' => "km",
			'topInUnits' => "m",
			'bottomOutUnits' => "",
			'bottomInUnits' => "",
			),
			$options);
	if (isset($options['topOutUnits']))
		$options['topOutUnits'] = '"' . $options['topOutUnits'] . '"';
	if (isset($options['topInUnits']))
		$options['topInUnits'] = '"' . $options['topInUnits'] . '"';
	if (isset($options['bottomOutUnits']))
		$options['bottomOutUnits'] = '"' . $options['bottomOutUnits'] . '"';
	if (isset($options['bottomInUnits']))
		$options['bottomInUnits'] = '"' . $options['bottomInUnits'] . '"';

	return oljs_map_addScaleLine($map, $options);
}

function _object_oljs_layerswitcher($map, $options) {
	/*
	  $options = array_merge(array(   'maxWidth'           => 150,
	  'topOutUnits'       => "km",
	  'topInUnits'        => "m",
	  'bottomOutUnits'    => "",
	  'bottomInUnits'     => "",
	  ),
	  $options);
	  if (isset($options['topOutUnits']))
	  $options['topOutUnits'] = '"'.$options['topOutUnits'].'"';
	  if (isset($options['topInUnits']))
	  $options['topInUnits'] = '"'.$options['topInUnits'].'"';
	  if (isset($options['bottomOutUnits']))
	  $options['bottomOutUnits'] = '"'.$options['bottomOutUnits'].'"';
	  if (isset($options['bottomInUnits']))
	  $options['bottomInUnits'] = '"'.$options['bottomInUnits'].'"';
	 */
	return oljs_map_addLayerSwitcher($map/* , $options */);
}

function _object_oljs_toolbar($map, $draw_layer, $bMultipleObject, $options, $object = null) {

	$content = "";
	if (!empty($options)) {
		$content .= oljs_toolbar_create($map, 'tb_edit');

		foreach ($options as $command => $params) {
			if (is_int($command) && is_string($params)) {
				$command = $params;
				$params = array();
			}
			else if ($params === null) {
				$params = array();
			}

			switch ($command) {
				case 'navigation' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'Navigation', array_merge(array('title' => "Naviguer"),
								$params));
					break;
				case 'add_point' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'DrawFeature', array_merge(array('title' => "Point",
								'layer' => $draw_layer,
								'handler' => OLJS_DRW_POINT,
								),
								$params));
					break;
				case 'add_path' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'DrawFeature', array_merge(array('title' => "Chemin",
								'layer' => $draw_layer,
								'handler' => OLJS_DRW_PATH,
								),
								$params));
					break;
				case 'add_polygon' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'DrawFeature', array_merge(array('title' => "Polygone",
								'layer' => $draw_layer,
								'handler' => OLJS_DRW_POLYGON,
								),
								$params));
					break;
				case 'edit' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'ModifyFeature', array_merge(array('title' => "Modifier",
								'layer' => $draw_layer,
								'mode' => OLJS_MOD_RESHAPE,
								),
								$params));
					break;
//            case 'rotate' :
//                $content .= oljs_toolbar_addControl($map, 'tb_edit', 'ModifyFeature', array_merge(array('title'        => "Homothétie",
//                                                                                                        'layer'        => $draw_layer,
//                                                                                                        'mode'         => OLJS_MOD_RESIZE | OLJS_MOD_ROTATE | OLJS_MOD_DRAG,
//                                                                                                    ),
//                                                                                                   $params));
//                break;
				case 'zoom_box' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'ZoomBox', array_merge(array('title' => "Zoom",
								),
								$params));
					break;
				case 'delete' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'RemoveFeature', array_merge(array('title' => "Supprimer",
								'layer' => $draw_layer,
								'multiple' => 'false',
								),
								$params)
					);
					break;
				case 'export' :
					if ($object) {
						$params['params'] = _get_object_pk_params($object);
					}
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'ExportImage', array_merge(array('title' => "Exporter",
								),
								$params)
					);
					break;
				case 'full_screen' :
					$content .= oljs_toolbar_addControl($map, 'tb_edit', 'FullScreen', array_merge(array('title' => "Plein écran",
								),
								$params)
					);
					break;
			}
		}
	}

	return $content;
}

function object_openlayers_show($object, $method, $options = array(), $callback = null) {
	$options = _parse_attributes($options);
	$default_options = sfConfig::get('app_sf_openlayers_map_show', array());
	$options = array_merge($default_options, $options);

	$show_map = _get_option($options, "always_show_map", false);
	$pk_value = $object->getPrimaryKey();

	$wkt = $object->$method();
	if ($wkt || $show_map) {

		$extends_geometry = _get_option($options, "extends_geometry", null);
		$bMultipleObject = _get_option($options, 'mutliple_object', false);

		$map = _convert_method_to_name($method, $options) . '_map_show';

		$content = openlayers_map_container($map, array("class" => "ol_map_show", "style" => "width:350px; height:400px;"));
		$js = _object_oljs_create_map($map, $options);

		$js .= oljs_map_addLayerVector($map, 'dessin', array('name' => 'Dessin',));
		$js .= _object_oljs_toolbar($map, 'dessin', $bMultipleObject, _get_option($options, 'toolbar', ""), $object);

		// $js .= "dessin.";

		if ($wkt) {
			$js .= oljs_map_add_object($map, 'dessin', $wkt, array('extends_geometry' => $extends_geometry));
		}
//        else if ($extends_geometry) {
//            $js .= oljs_zoom_on_object($map, $extends_geometry);
//        }
//        else {
//            $js .= oljs_map_zoomToMaxExtent($map);
//        }
		$js .= oljs_zoom_on_layer_data($map, 'dessin');
		$js .= "$('" . $map . "').setStyle({width: '100%', height: '400px'});";

		//Chargement de la map uniquement sur demande (link)
		$js = "try {\$('object_carto_show_" . $object->getId() . "').show();\$('object_carto_link_" . $object->getId() . "').hide();" . $js . "} catch(err) {}";
		$content = content_tag('div', $content, array('id' => 'object_carto_show_' . $object->getId(), 'style' => 'display: none;'));
		$link = content_tag('a', 'Afficher la mini-carte', array('href' => '#', 'onclick' => $js, 'id' => 'object_carto_link_' . $object->getId()));
		$content = $link . $content;
	}
	else {
		$content = surface_null_value("Aucunes données géographiques définies.");
	}

	return $content;
}

function object_openlayers_edit($object, $method, $options = array(), $callback = null) {
	$options = _parse_attributes($options);

	$wkt = _get_object_value($object, $method, null);

	$input_name = _convert_method_to_name($method, $options);
	return openlayers_input($input_name, $wkt, $options, null, $object);
}

function openlayers_input($name, $value, $options, $map_id = null, $object = null) {
	$options = _parse_attributes($options);
	$default_options = sfConfig::get('app_sf_openlayers_map_edit', array());
	$options = array_merge($default_options, $options);

	$input_id = get_id_from_name($name);
	$content = input_hidden_tag($name, $value);

	$bMultipleObject = _get_option($options, 'mutliple_object', false);
	$extends_geometry = _get_option($options, "extends_geometry", null);

	if ($map_id) {
		$map = get_id_from_name($map_id);
	}
	else {
		$map = get_id_from_name($name) . '_map_edit';
	}

	$js = '
	updateInput = function(feature)  {
	    if (' . $map . ') {
                var layer = ' . $map . '.getLayer("dessin");
                if (layer && layer.features && (layer.features.length > 0)) {
                    var feature = layer.features[0];
                    if (feature) {
                        var wkt_format = new OpenLayers.Format.WKT();
                        if (wkt_format) {
                            var geometry = wkt_format.write(feature);
                            $("' . $input_id . '").value = geometry;
                        }
                    }
                }
                else {
                    $("' . $input_id . '").value = "";
                }
            }
	}
	onVertexModified = function (event) {
	    updateInput(event.feature);
	}
        onFeatureModified = function (event) {
	    updateInput(event.feature);
        }
        ';

	if ($bMultipleObject) {
		$js .= '
            onPreFeatureAdded = function (event) {
		updateInput(event.feature);
                return true;
            }
            ';
	}
	else {
		$js .= '
            onPreFeatureAdded = function (event) {
		updateInput(event.feature);
                if (' . $map . ') {
                    var layer = ' . $map . '.getLayer("dessin");
                    if (layer) {
                        layer.destroyFeatures(null);
                    }
                }
                return true;
            }
            ';
	}

	$content .= openlayers_map_container($map, array("class" => "ol_map_input", "style" => "width:350px; height:400px;"));
	$js .= _object_oljs_create_map($map, $options);

	$js .= oljs_map_addLayerVector(	$map,
					'dessin',
					array('name' => 'Dessin',
						'event_listeners' => array('afterfeaturemodified' => "onFeatureModified",
									'featureremoved' => "onFeatureModified",
									'featureadded' => "onFeatureModified",
									'beforefeaturesadded' => "onPreFeatureAdded",
									'vertexmodified' => 'onVertexModified'
								)
					)
	);
	$js .= _object_oljs_toolbar($map, 'dessin', $bMultipleObject, _get_option($options, 'toolbar', ""), $object);

	if ($value) {
		$js .= oljs_map_add_object($map, 'dessin', $value, array('extends_geometry' => $extends_geometry));
	}
	else if ($extends_geometry) {
		$js .= oljs_zoom_on_object($map, $extends_geometry);
	}
	else {
		$js .= oljs_map_zoomToMaxExtent($map);
	}

	$js .= "$('" . $map . "').setStyle({width: '100%', height: '400px'});";
	$content .= javascript_tag("try {" . $js . "} catch(err) { " . (SF_ENVIRONMENT == 'dev' ? 'alert(err);' : '') . " }");

	return $content;
}

function _get_object_pk_params($object) {
	$pks = array();

	// find the related class
	$class = get_class($object);
	$tableMap = call_user_func(array($class . 'Peer', 'getTableMap'));
	$columnMaps = $tableMap->getColumns();
	foreach ($columnMaps as $columnMap) {
		if ($columnMap->isPrimaryKey()) {
			$value = call_user_func(array($object, 'get' . $columnMap->getPhpName()));
			$pks[] = strtolower($columnMap->getColumnName()) . "=" . $value;
		}
	}

	return implode("&", $pks);
}

function surface_layer_scale_select_tag($name = 'print_scale') {
	$scales = array('500000' => '500 000', '100000' => '100 000', '50000' => '50 000', '25000' => '25 000', '20000' => '20 000', '10000' => '10 000', '5000' => '5 000', '2500' => '2 500', '2000' => '2 000', '1500' => '1 500', '1250' => '1 250', '1000' => '1 000', '500' => '500', '200' => '200');
	$options = options_for_select($scales, null, array('include_custom' => 'Echelle actuelle'));
	return surface_select_tag($name, $options, array('style' => 'width: 140px; text-align: right;'));
}
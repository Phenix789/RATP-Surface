/*******************************************************************************
**
** Geometry operations 
*/

oljs_geomToFeatures = function(geometry, options, style) {
    var features = Array();
    var wkt_format = new OpenLayers.Format.WKT();
    
    if (Object.isArray(geometry)) {
        for (var index = 0; index < geometry.length; ++index) {
            feature = wkt_format.read(geometry[index]);
            if (feature) {
                if (options) {
                    feature.attributes = OpenLayers.Util.extend(feature.attributes, options);
                }
                if (style) {
                    var style_prop = {};
                    style_prop = OpenLayers.Util.extend(style_prop, OpenLayers.Feature.Vector.style["default"]);
                    style_prop = OpenLayers.Util.extend(style_prop, style);
                    feature.style = style_prop;
                }
                features.push(feature);
            }                    
        }
    }
    else {
        feature = wkt_format.read(geometry);
        if (feature) {
            if (options) {
                feature.attributes = OpenLayers.Util.extend(feature.attributes, options);
            }
            if (style) {
                var style_prop = {};
                style_prop = OpenLayers.Util.extend(style_prop, OpenLayers.Feature.Vector.style["default"]);
                style_prop = OpenLayers.Util.extend(style_prop, style);
                feature.style = style_prop;
            }
            features.push(feature);
        }
    }
    
    return features;
}

oljs_geomToBounds = function(geometry) {
    var ext_bounds = new OpenLayers.Bounds();
    
    var features = oljs_geomToFeatures(geometry, null, null);
    for (var index = 0; index < features.length; ++index) {
        if (features[index] && features[index].geometry) {
            bounds = features[index].geometry.getBounds();
            if (bounds) {
                ext_bounds.extend(bounds);
            }
        } 
    }
    
    return ext_bounds;
}

/*******************************************************************************
**
** Map operations
*/

oljs_map_setBaseLayer = function(map, layer_id) {
    if (map) {
        var layer = map.getLayer(layer_id);
        if (layer) {
            map.setBaseLayer(layer);
        }
    }
}

oljs_map_zoomToMaxExtent = function(map) {
    if (map) {
        map.zoomToMaxExtent();
    }
}

oljs_map_zoomToExtent = function(map, extent) {
    if (map && extent) {
        var bounds = new OpenLayers.Bounds(extent);
        if (bounds) {
           map.zoomToExtent(bounds, false);
        }
    }
}

oljs_map_zoomToLayerData = function(map, layer_id) {
    if (map) {
        var layer = map.getLayer(layer_id);
        if (layer) {
            var layer_extends = layer.getDataExtent();
            if (layer_extends) {
                map.zoomToExtent(layer_extends, true);
            }
        }
    }
}

oljs_map_zoomToGeom = function(map, geometry) {
    var feature;
    var bounds;
    
    if (map) {
        var wkt_format = new OpenLayers.Format.WKT();
        var ext_bounds = oljs_geomToBounds(geometry);
           
        map.zoomToExtent(ext_bounds, true);
    }
}

oljs_map_createPopup = function(map, lonlat, content, options) {
    options = options || {};
    
    var closable = ((options.closable != undefined)? options.closable : true);
    var exlusif  = ((options.exlusif  != undefined)? options.exlusif  : true);
    
    var popup = new OpenLayers.Popup(null, lonlat, null, null, closable);
    if (popup) {
        popup.setContentHTML(content);
        
        if (options) {
            if (options.size != undefined)
                popup.setSize(new OpenLayers.Size(options.size.width, options.size.height));  
            else 
                popup.updateSize();
                
            if (options.bk_color != undefined)    { popup.setBackgroundColor(options.bk_color);   }
            if (options.border != undefined)      { popup.setBorder(options.border);              }
            if (options.opacity != undefined)     { popup.setOpacity(options.opacity);            }
        }
        
        map.addPopup(popup, exlusif);
    }
}

/*******************************************************************************
**
** Layer's features operations
*/

oljs_layer_deleteAllFeatures = function(map, layer_id, options) {
    if (map) {
        var layer = map.getLayer(layer_id);
        if (layer) {
            layer.removeFeatures(layer.features, { silent: true });
        }
    }
}

oljs_layer_addFeaturesFromGeom = function(map, layer_id, geometry, options, style) {
    var feature;
    
    if (map) {
        var layer = map.getLayer(layer_id);
        if (layer) {
            var features = oljs_geomToFeatures(geometry, options, style);
            layer.addFeatures(features, { silent: true });
        }
    }
}

oljs_layer_addMakerFromGeom = function(map, layer_id, geometry, icon_path, events) {
    if (map) {
        var layer = map.getLayer(layer_id);
        if (layer) {
            var size = new OpenLayers.Size(10, 17);
            var offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
            var icon = new OpenLayers.Icon(icon_path, size, offset);
    
            var ext_bounds = oljs_geomToBounds(geometry);
            if (ext_bounds) {
                var marker = new OpenLayers.Marker(ext_bounds.getCenterLonLat(), icon);
                if (marker) {
                    layer.addMarker(marker);
                    
                    if (events) {
                        if (events.mouseover != undefined) {
                            marker.events.register("mouseover",
                                                   marker,
                                                   events.mouseover);
                        }
                    }
                }
            }
        }
    }
}

oljs_layer_addPointFromLonLat = function(map, layer_id, lon, lat, projection) {
    if (map) {
        var layer = map.getLayer(layer_id);
        if (layer) {
            var lonlat = new OpenLayers.LonLat(lon, lat);
            
            lonlat.transform(new OpenLayers.Projection(projection), map.getProjectionObject());
            
            var geometry = new OpenLayers.Geometry.Point(lonlat.lon, lonlat.lat);
            if (geometry) {
                var features = new OpenLayers.Feature.Vector(geometry);
                if (features) {
                    layer.addFeatures(features);
                }
            }
        }
    }
}

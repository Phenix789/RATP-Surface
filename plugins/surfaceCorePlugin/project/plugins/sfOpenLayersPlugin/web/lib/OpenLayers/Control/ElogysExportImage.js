
OpenLayers.Control.ElogysExportImage = OpenLayers.Class(OpenLayers.Control.Button, {
    
    url:        null,
    params:     null,
    send_wkt:   false,
    
    initialize: function (options) {
        OpenLayers.Control.Button.prototype.initialize.apply(this, [options]);
    },
    
    getLayerWmsParams : function (layer, index) {
        var paramsArray = [];

        if (layer) {
            var layer_params = OpenLayers.Util.getParameters(layer.getFullRequestString());

            paramsArray.push(escape("map_layers[" + index + "][map]") + "=" + encodeURIComponent(layer_params['map']));
            paramsArray.push(escape("map_layers[" + index + "][layers]") + "=" + encodeURIComponent(layer_params['LAYERS']));
        }
        return paramsArray.join("&");
    },
    
    getLayerVectorFeatures: function (layer, geoms) {
        if (layer) {
            var wkt_format = new OpenLayers.Format.WKT();
            if (wkt_format) {
                for (var j=0, len=layer.features.length; j<len; ++j) {
                    var geometry = wkt_format.write(layer.features[j]);
                    geoms.push(geometry);
                }
            }
        }       
    },

    trigger: function() {
	    //surface.open_east_short();
	    surface.link_to('cartographie/configMapExport?target=tg_east', 'tg_east', {});
    },

    trigger_back: function() {
        var i;
        var geoms = [];
                
        if (this.map && this.map.baseLayer) {
            var bounds = this.map.baseLayer.getExtent();

            // var layer_params = OpenLayers.Util.getParameters(this.map.baseLayer.getFullRequestString());
            var options = {
                BBOX:   bounds.toBBOX(),
                scale:  this.map.getScale()
            };
            var url = this.url + "?" + OpenLayers.Util.getParameterString(options);
            if (this.params) {
                url += "&" + this.params;
            }
            
            var visible_layers = this.map.getLayersBy("visibility", true);
            for (i = 0; i < visible_layers.length; i++) {
                if (visible_layers[i].CLASS_NAME == "OpenLayers.Layer.WMS")
                {
                    //if (!visible_layers[i].isBaseLayer) {
                        var layer_params = this.getLayerWmsParams(visible_layers[i], i);
                        if (layer_params) {
                           url += "&" + layer_params;
                        } 
                    //}
                }
                else if (visible_layers[i].CLASS_NAME == "OpenLayers.Layer.Vector") {
                    if (this.send_wkt) {
                        this.getLayerVectorFeatures(visible_layers[i], geoms);
                    }
                }
            }

            // window.open(url);
            // document.location.href = url;
            
            var form = document.createElement('form');
            document.body.appendChild(form);
            form.method = 'POST';
            form.action = url;
            
            var len = geoms.length;
            for (var j=0; j<len; ++j) {
                var input = document.createElement('input');
                input.type = "hidden";
                input.name = "features[]";
                input.value = geoms[j];
                form.appendChild(input);
            }

	    surface.form_to(form, url, 'tg_east', {});

            //form.submit();
            //form.remove();
        }
        return false;        
    },
    
    CLASS_NAME: "OpenLayers.Control.ExportImg"
});

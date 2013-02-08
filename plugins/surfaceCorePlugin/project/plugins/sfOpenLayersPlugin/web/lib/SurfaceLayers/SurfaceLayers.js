var SurfaceLayers = {
	map: null,
	layers: {},
	tab: null,
	
	CONST: {
		FEATURE_TYPE: {
			POLYGON: 'polygon',
			LINE: 'line',
			POINT: 'point'
		}
	},

	callback: {
		colorPicker: {
			strokeColor: function(color) {
				SurfaceLayers.callback.colorPicker.strokeColorCallback(color);
			},
			fillColor: function(color) {
				SurfaceLayers.callback.colorPicker.fillColorCallback(color);
			},
			strokeColorCallback: null,
			fillColorCallback: null
		}
	},

	action: {
		selectFeature: function(event) {
			SurfaceLayers.info.setInfo(event.feature);
			SurfaceLayers.style.setStyle(event.feature);
			SurfaceLayers.section.showSection(event.feature);
			SurfaceLayers.parcelles.setLinkIntersects(event.feature);
		},

		unselectFeature: function(event) {
			SurfaceLayers.section.hideSection(event.feature);
		},

		deleteFeature: function(event) {
			SurfaceLayers.section.hideSection(event.feature);
		},

		addFeature: function(event) {
			SurfaceLayers.info.setInfo(event.feature);
			SurfaceLayers.style.setStyle(event.feature);
			SurfaceLayers.section.showSection(event.feature);
			SurfaceLayers.control.selectFeatureInModifyControl(event.feature);
			SurfaceLayers.parcelles.setLinkIntersects(event.feature);
		},

		modifyFeature: function(event) {
			SurfaceLayers.info.setInfo(event.feature);
		},

		beforeModifyFeature: function(event) {

		},
		
		reloadLegend: function(event) {
			surface.link_to('cartographie/reloadLegend?scale=' + SurfaceLayers.map.getScale(), 'toolbox_layers');
		}
	},

	info: {
		getArea: function(feature) {
			return SurfaceLayers.util.formatNumber(feature.geometry.getArea().toFixed(0), 0, ' ', '') + ' m²';
		},

		getLength: function(feature) {
			return SurfaceLayers.util.formatNumber(feature.geometry.getLength().toFixed(0), 0, ' ', '') + ' m';
		},

		setInfo: function(feature) {
			var type = SurfaceLayers.util.getFeatureType(feature);
			switch(type) {
				case SurfaceLayers.CONST.FEATURE_TYPE.POLYGON :
					SurfaceLayers.info.setInfoPolygon(feature);
					break;
				case SurfaceLayers.CONST.FEATURE_TYPE.LINE :
					SurfaceLayers.info.setInfoLine(feature);
					break;
				case SurfaceLayers.CONST.FEATURE_TYPE.POINT :
					SurfaceLayers.info.setInfoPoint(feature);
					break;
			}
		},

		setInfoPolygon: function(feature) {
			var type = SurfaceLayers.CONST.FEATURE_TYPE.POLYGON;
			$(type + '_info_area').innerHTML = SurfaceLayers.info.getArea(feature);
			$(type + '_info_length').innerHTML = SurfaceLayers.info.getLength(feature);
		},

		setInfoLine: function(feature) {
			var type = SurfaceLayers.CONST.FEATURE_TYPE.LINE;
			$(type + '_info_length').innerHTML = SurfaceLayers.info.getLength(feature);
		},

		setInfoPoint: function(feature) {
			
		}
	},

	style: {
		getStyle: function(feature, name, map) {
			if(feature && feature.attributes && feature.attributes.style && feature.attributes.style[name]) {
				return feature.attributes.style[name];
			}
			return OpenLayers.Feature.Vector.style[map || 'default'][name];
		},

		setStyle: function(feature) {
			var type = SurfaceLayers.util.getFeatureType(feature);
			switch(type) {
				case SurfaceLayers.CONST.FEATURE_TYPE.POLYGON :
					SurfaceLayers.style.setStylePolygon(feature);
					break;
				case SurfaceLayers.CONST.FEATURE_TYPE.LINE :
					SurfaceLayers.style.setStyleLine(feature);
					break;
				case SurfaceLayers.CONST.FEATURE_TYPE.POINT :
					SurfaceLayers.style.setStylePoint(feature);
					break;
			}
		},

		setStylePolygon: function(feature) {
			var input, value, type = SurfaceLayers.CONST.FEATURE_TYPE.POLYGON;
			//Label
			input = $(type + '_label');
			value = SurfaceLayers.style.getStyle(feature, 'label') || '';
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'label', input);
			//Couleur de contour
			input = $(type + '_strokeColor');
			value = SurfaceLayers.style.getStyle(feature, 'strokeColor');
			input.value = value;
			SurfaceLayers.callback.colorPicker.strokeColorCallback = SurfaceLayers.style.getApplyStyleFunction(feature, 'strokeColor');
			input.nextSibling.setStyle({backgroundColor: value});
			//Couleur de fond
			input = $(type + '_fillColor');
			value = SurfaceLayers.style.getStyle(feature, 'fillColor');
			input.value = value;
			SurfaceLayers.callback.colorPicker.fillColorCallback = SurfaceLayers.style.getApplyStyleFunction(feature, 'fillColor');
			input.nextSibling.setStyle({backgroundColor: value})
			//Opacité du fond
			input = $(type + '_fillOpacity');
			value = SurfaceLayers.style.getStyle(feature, 'fillOpacity');
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'fillOpacity', input);
		},

		setStyleLine: function(feature) {
			var input, value, type = SurfaceLayers.CONST.FEATURE_TYPE.LINE;
			//Label
			input = $(type + '_label');
			value = SurfaceLayers.style.getStyle(feature, 'label') || '';
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'label', input);
			//Couleur du trait
			input = $(type + '_fillColor');
			value = SurfaceLayers.style.getStyle(feature, 'fillColor');
			input.value = value;
			SurfaceLayers.callback.colorPicker.fillColorCallback = function(color) {
				SurfaceLayers.style.getApplyStyleFunction(feature, 'fillColor')(color);
				SurfaceLayers.style.getApplyStyleFunction(feature, 'strokeColor')(color);
			}
			input.nextSibling.setStyle({backgroundColor: value});
			//Epaisseur du trait
			input = $(type + '_strokeWidth');
			value = SurfaceLayers.style.getStyle(feature, 'strokeWidth')
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'strokeWidth', input);
		},

		setStylePoint: function(feature) {
			var input, value, type = SurfaceLayers.CONST.FEATURE_TYPE.POINT;
			//Label
			input = $(type + '_label');
			value = SurfaceLayers.style.getStyle(feature, 'label') || '';
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'label', input);
			//Rayon du point
			input = $(type + '_pointRadius');
			value = SurfaceLayers.style.getStyle(feature, 'pointRadius');
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'pointRadius', input);
			//Couleur de contour
			input = $(type + '_strokeColor');
			value = SurfaceLayers.style.getStyle(feature, 'strokeColor');
			input.value = value;
			SurfaceLayers.callback.colorPicker.strokeColorCallback = SurfaceLayers.style.getApplyStyleFunction(feature, 'strokeColor');
			input.nextSibling.setStyle({backgroundColor: value});
			//Couleur de fond
			input = $(type + '_fillColor');
			value = SurfaceLayers.style.getStyle(feature, 'fillColor');
			input.value = value;
			SurfaceLayers.callback.colorPicker.fillColorCallback = SurfaceLayers.style.getApplyStyleFunction(feature, 'fillColor');
			input.nextSibling.setStyle({backgroundColor: value})
			//Opacité du fond
			input = $(type + '_fillOpacity');
			value = SurfaceLayers.style.getStyle(feature, 'fillOpacity');
			input.value = value;
			input.onchange = SurfaceLayers.style.getApplyStyleFunction(feature, 'fillOpacity', input);
		},

		getApplyStyleFunction: function(feature, propriety, input) {
			if(input) {
				return function() {
					SurfaceLayers.style.applyStyle(feature, input.value, propriety);
				}
			}
			else {
				return function(color) {
					SurfaceLayers.style.applyStyle(feature, color, propriety);
				}
			}
		},

		applyStyle: function(feature, value, propriety) {
			var style = SurfaceLayers.style.getFeatureStyle(feature);
			style[propriety] = value;
			SurfaceLayers.style.saveStyle(feature, style);
			style = SurfaceLayers.style.mergeStyle(style);
			feature.style = style;
			feature.layer.drawFeature(feature);
		},

		getFeatureStyle: function(feature) {
			if(!feature.attributes) {
				feature.attributes = {};
			}
			if(!feature.attributes.style) {
				feature.attributes.style = {};
			}
			return feature.attributes.style;
		},

		saveStyle: function(feature, style) {
			feature.attributes.style = style;
		},

		mergeStyle: function(style) {
			var merge = {};
			var property;
			var default_style = OpenLayers.Feature.Vector.style['default'];
			for(property in default_style) {
				merge[property] = default_style[property];
			}
			for(property in style) {
				merge[property] = style[property];
			}
			return merge;
		},

		getStyleForRequest: function(feature) {
			var style = SurfaceLayers.style.getFeatureStyle(feature);
			var request = [];
			var index = 0;
			for(var property in style) {
				request[index] = property + '=' + style[property];
				index++;
			}
			return request.join('|');
		}

	},

	parcelles: {
		setLinkIntersects: function(feature) {
			var type = SurfaceLayers.util.getFeatureType(feature);
			switch(type) {
				case SurfaceLayers.CONST.FEATURE_TYPE.POLYGON :
					SurfaceLayers.parcelles.setLinkPolygon(feature);
					break;
				case SurfaceLayers.CONST.FEATURE_TYPE.LINE :
					SurfaceLayers.parcelles.setLinkLine(feature);
					break;
				case SurfaceLayers.CONST.FEATURE_TYPE.POINT :
					SurfaceLayers.parcelles.setLinkPoint(feature);
					break;
			}
		},

		setLinkPolygon: function(feature) {
			var type = SurfaceLayers.CONST.FEATURE_TYPE.POLYGON;
			$(type + '_link_intersects').onclick = SurfaceLayers.parcelles.getLinkFunction(feature);
			$(type + '_link_contains').onclick = SurfaceLayers.parcelles.getLinkFunction(feature, 'contains');
		},

		setLinkLine: function(feature) {
			var type = SurfaceLayers.CONST.FEATURE_TYPE.LINE;
			$(type + '_link_intersects').onclick = SurfaceLayers.parcelles.getLinkFunction(feature);
		},

		setLinkPoint: function(feature) {
			var type = SurfaceLayers.CONST.FEATURE_TYPE.POINT;
			$(type + '_link_intersects').onclick = SurfaceLayers.parcelles.getLinkFunction(feature);
		},

		getLinkFunction: function(feature, mode) {
			if(mode == undefined) {
				mode = 'intersects';
			}
			return function() {
				var wkt = (new OpenLayers.Format.WKT()).write(feature);
				surface.link_to(
					'cartographie/selectParcelles?mode=' + mode + '&select_geom=' + wkt,
					'parcellesList'
				);
			}
		}
	},

	section: {
		showSection: function(feature) {
			surface.setActiveTab('toolbox_features');
			var type = SurfaceLayers.util.getFeatureType(feature);
			$('carto_feature_' + type).show();
		},

		hideSection: function(feature) {
			surface.setActiveTab('toolbox_layers');
			var type = SurfaceLayers.util.getFeatureType(feature);
			$('carto_feature_' + type).hide();
		}
	},

	control: {
		selectFeatureInModifyControl: function(feature) {
			var control = SurfaceLayers.map.getControlsByClass("OpenLayers.Control.DrawFeature");
			for(var i = 0; i < control.length; i++) {
				control[i].deactivate();
			}
			control = SurfaceLayers.map.getControlsBy("displayClass", "olControlModifyFeatureReshape")[0];
			control.activate();
			control.selectFeature(feature);
		}
	},

	print: {
		form: null,

		addCartoParams: function() {
			SurfaceLayers.print.deleteOldCartoParams();
			SurfaceLayers.print.addHiddenInput('center', SurfaceLayers.map.getExtent().getCenterLonLat().toShortString());
			SurfaceLayers.print.addHiddenInput('scale', SurfaceLayers.map.getScale());
			var layers = SurfaceLayers.map.getLayersBy('visibility', true);
			for(var i = 0; i < layers.length; i++) {
				if(layers[i].CLASS_NAME == 'OpenLayers.Layer.WMS') {
					SurfaceLayers.print.addLayersWmsParams(layers[i], i);
				}
				if(layers[i].CLASS_NAME == 'OpenLayers.Layer.Vector' && layers[i].id == 'dessin') {
					SurfaceLayers.print.addLayersVectorParams(layers[i]);
				}
			}
			
		},

		addLayersWmsParams: function(layer, index) {
			var params = OpenLayers.Util.getParameters(layer.getFullRequestString());
			SurfaceLayers.print.addHiddenInput('map_layers[' + index + '][layers]', encodeURIComponent(params['LAYERS']));
		},

		addLayersVectorParams: function(layer) {
			var wkt = new OpenLayers.Format.WKT();
			for(var i = 0; i < layer.features.length; i++) {
				SurfaceLayers.print.addHiddenInput('features[' + i + '][wkt]', wkt.write(layer.features[i]));
				SurfaceLayers.print.addHiddenInput('features[' + i + '][style]', SurfaceLayers.style.getStyleForRequest(layer.features[i]));
			}
		},

		deleteOldCartoParams: function() {
			var to_delete = $('.carto_hidden_to_delete') || [];
			for(var i = 0; i < to_delete.length; i++) {
				SurfaceLayers.print.form.removeChild(to_delete[i]);
			}
		},

		addHiddenInput: function(name, value) {
			if(SurfaceLayers.print.form) {
				var input = document.createElement('input');
				input.type = 'hidden';
				input.name = name;
				input.value = value;
				input.addClassName('carto_hidden_to_delete');
				SurfaceLayers.print.form.appendChild(input);
			}
			else {
				alert('Aucun formulaire n\'a été renseigné!');
			}
		},

		submit: function(type) {
			SurfaceLayers.print.addCartoParams();
			SurfaceLayers.print.addHiddenInput('type', type);
			SurfaceLayers.print.form.submit();
		},
		
		betterSubmit: function(type) {
			document.getElementById('carto_print_center').value = SurfaceLayers.map.getExtent().getCenterLonLat().toShortString();
			document.getElementById('carto_print_scale').value = SurfaceLayers.map.getScale();
			document.getElementById('carto_print_type').value = type;
			var features = [];
			var dessin = SurfaceLayers.map.getLayer('dessin');
			var wkt = new OpenLayers.Format.WKT();
			for(var j = 0; j < dessin.features.length; j++) {
				if(!dessin.features[j]._sketch){
					features[j] = {};
					features[j].name = dessin.features[j].id;
					features[j].wkt = wkt.write(dessin.features[j]);
					features[j].style = SurfaceLayers.style.getStyleForRequest(dessin.features[j]);
				}
			}
			document.getElementById('carto_print_features').value = JSON.stringify(features);
			SurfaceLayers.print.form.submit();
		}
	},

	layer: {
		setVisibility: function(id, visible) {
			var layer = SurfaceLayers.map.getLayer(id);
			if(layer) {
				layer.setVisibility(visible);
			}
		},

		setTypeParams: function(layer, visible) {
			onMapLayerChange({layer_id: layer, visibility: visible});
			var types = ['type_etat', 'type_region', 'type_departement', 'type_commune', 'type_hlm', /*'type_societe', 'type_copropriete', 'type_associe', 'type_public', */'type_epf'];
			var checkbox, params = [];
			for(var i = 0; i < types.length; i++) {
				checkbox = $(types[i]);
				if(checkbox && checkbox.checked) {
					params.push(checkbox.value);
				}
			}
			SurfaceLayers.layers.type.mergeNewParams({type_proprietaire: params.join(',')});
		},

		setBaseLayer: function(id) {
			var layer = SurfaceLayers.map.getLayer(id);
			if(layer) {
				SurfaceLayers.map.setBaseLayer(layer);
			}
		}
	},

	util: {
		getFeatureType: function(feature) {
			switch(feature.geometry.CLASS_NAME) {
				case 'OpenLayers.Geometry.Polygon' :
					return SurfaceLayers.CONST.FEATURE_TYPE.POLYGON;
					break;
				case 'OpenLayers.Geometry.LineString' :
					return SurfaceLayers.CONST.FEATURE_TYPE.LINE;
					break;
				case 'OpenLayers.Geometry.Point' :
					return SurfaceLayers.CONST.FEATURE_TYPE.POINT;
					break;
				default :
					return SurfaceLayers.CONST.FEATURE_TYPE.POLYGON;
					break;
			}
		},
		
		formatNumber: function(num, dec, thou, pnt) {
			var x = Math.round(num * Math.pow(10,dec));
			if (x >= 0) {
				n1=n2='';
			}
			var y = (''+Math.abs(x)).split('');
			var z = y.length - dec;
			if (z<0) {
				z--;
			}
			for(var i = z; i < 0; i++) {
				y.unshift('0');
			}
			if (z<0) {
				z = 1;
			}
			y.splice(z, 0, pnt);
			if(y[0] == pnt) {
				y.unshift('0');
			}
			while (z > 3) {
				z-=3;
				y.splice(z,0,thou);
			}
			var r = y.join('');
			return r;
		}
	},

	debug: {
		var_dump: function(obj) {
			var i, out = (typeof obj) + "\n";
			if(typeof obj === 'string') {
				out += obj;
			}
			else {
				for(obj in i) {
					out += i + ' : ' + obj[i] + "\n";
				}
			}
			alert(out);
		}
	}
}
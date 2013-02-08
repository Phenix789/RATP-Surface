
if ( !Array.prototype.forEach ) {
  Array.prototype.forEach = function(fn, scope) {
    for(var i = 0, len = this.length; i < len; ++i) {
      fn.call(scope, this[i], i, this);
    }
  }
}
if (!String.prototype.trim) {
	String.prototype.trim=function(){return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');};
}

surfaceController = Class.create();
surfaceController.prototype = {
	initialize: function() {
		this.json = "";
		this.east_cmp_name = "";
		this.east_cmp_size = "";
		this.windowManager = null;
		this.layout = null;
		this.comp_registred = new SurfaceCompRegisterStack();
		this.layout_top = 0;
		this.targets = {};
	},

	initLayout: function (options) {
		//this.layout = new SurfaceLayout(options);
	},
	
	getSfUrl: function(url, target_id) {
		sfUrl = '';

		if (url.substring(0, 4) != 'http') {
			if (url.substring(0, 1) != '/') {
				url = '/' + url;
			}

			i = url.indexOf('.php');
			if (i < 0) {
				if (this.sfController == 'index.php') {
					sfUrl = url;
				} else {
					sfUrl = this.sfController + url;
				}
			} else {
				sfUrl = url;
			}

			if (sfUrl.indexOf('/target/') < 0) {
				if (sfUrl.indexOf('target') < 0) {
					if (sfUrl.indexOf('?') > 0) {
						if (sfUrl.indexOf('=') > 0) {
							sfUrl = sfUrl + '&target=' + target_id;
						} else {
							sfUrl = sfUrl + 'target=' + target_id;
						}
					} else {
						sfUrl = sfUrl + '/target/' + target_id;
					}
				}
			}
		}
		else {
			sfUrl = url;
		}

		return sfUrl;
	},
	link_to: function(url, target_id, options, panels) {
		if (target_id == 'tg_east') {
			this.open_east();
		}

		url = this.getSfUrl(url, target_id);
		options = (options !== undefined) ? options : {};
		options.asynchronous = (options.asynchronous !== undefined) ? options.asynchronous : true;
		options.method = (options.method !== undefined) ? options.method : 'GET';
		options.evalScripts = (options.evalScripts !== undefined) ? options.evalScripts : true;
		options.parameters = (options.parameters !== undefined) ? options.parameters : '';

		if(!options.onLoading){
			options.onLoading = function(request, json){
				SetCursorWait();
				surface.addLoadingMask($(target_id));
				$('surface_loading').show();
			};
		}

		options.onComplete = (options.onComplete !== undefined) ? options.onComplete : function(request, json){
			SetCursorNormal();
			$('surface_loading').hide();
			surface.components_refresh(options.component_class_update);
			surface.executeLinkToCallBacks(url, target_id, options);
		};
		
		if(target_id == 'popup') {
			Windows.maxZIndex = 2000;
			var my_popup = new Window({
				className:'whale',
				height: (options.popup_height === undefined)? 350: options.popup_height,
				width: (options.popup_width === undefined)? 800: options.popup_width,
				title: (options.popup_title === undefined) ? '' : options.popup_title,
				minimizable : false,
				maximizable: false
			});

			my_popup.setDestroyOnClose();
			my_popup.setAjaxContent(url, options, true, false);
			my_popup.showCenter();
			this.setPopupTitle(my_popup.element.id);
			return ;
		} else if (target_id == 'dialog') {
			this.doDlgModal(url, options);
			return ;
		}

		if((options.confirm === undefined) || confirm(options.confirm)) {
			new Ajax.Updater(target_id, url, options);
		}
		if(!$(target_id)){
			console.log('Surface link_to ERROR : Undefined element : '+target_id);
			return;
		}
		if(!this.targets[target_id]){
			this.targets[target_id] = [];
		}
		this.targets[target_id].push(url);
		$(target_id).loaded_url = url;
	},
	
	setPopupTitle: function (popup_id) {
		$(popup_id +"_top").innerHTML = '';
		popup_content_elt = $(popup_id +"_table_content");
		content = popup_content_elt.innerHTML;
		if (content.indexOf('<h1') >= 0) {
			title = content.substr(content.indexOf('<h1'));
			title = title.substr(title.indexOf('>') + 1);
			title = title.substr(0, title.indexOf('<'));
			$(popup_id +"_top").innerHTML = title;
		}	else {
			if (content.indexOf('<h2') >= 0) {
				title = content.substr(content.indexOf('<h2'));
				title = title.substr(title.indexOf('>') + 1);
				title = title.substr(0, title.indexOf('<'));
				$(popup_id +"_top").innerHTML = title;
			}
		}
	},
	doDlgModal: function (url, options) {
		/* Windows.maxZIndex = 500; */
		Windows.maxZIndex = 2000;

		options = (options !== undefined) ? options : {};
		options.success = (options.success !== undefined)? options.success : null;
		var my_dlg = Dialog.info(	"loading...",
		{
			className:'whale',
			height: (options.popup_height === undefined) ? 400: options.popup_height,
			width: (options.popup_width === undefined) ? 800: options.popup_width,
			title: (options.popup_title === undefined) ? '' : options.popup_title,
			minimizable : false,
			maximizable: false,
			closable: true,
			effectOptions: {
				duration: 0
			},
			hideEffect: Element.hide,
			showEffect: Element.show,
			onOk: options.success
		});
		target_id = my_dlg.getContent().id;
		url = url + '&dialog=1&target=' + target_id;
		my_dlg.setAjaxContent(url, options, true, false);
	},
	link_to_html: function(text, url, target_id, options) {
		html = '<a onclick="surface.link_to(\'' + url + '\', \'' + target_id + '\', ' + options + '); return false;" href="#">' + text + '</a>';
		return html;

	},
	form_to: function(form, url, target_id, options) {
		url = this.getSfUrl(url, target_id);

		options = (options !== undefined) ? options : {};

		options.asynchronous = (options.asynchronous !== undefined)? options.asynchronous : true;
		options.evalScripts = (options.evalScripts !== undefined)? options.evalScripts : false;
		options.parameters = Form.serialize(form);

		options.onLoading = (options.onLoading !== undefined) ? options.onLoading : function(request, json){
			SetCursorWait();
			surface.addLoadingMask($(target_id));
			$('surface_loading').show();
		};

		options.onComplete = (options.onComplete !== undefined) ? options.onComplete : function(request, json){
			SetCursorNormal();
			$('surface_loading').hide();
			surface.components_refresh(options.component_class_update);
			surface.executeLinkToCallBacks(url, target_id, options);
		};

		new Ajax.Updater(
			target_id,
			url,
			options
		);
	},
	open_east: function(width) {
		$('east').style.display = '';
		if(width){
			$('east').style.width = width+'px';
		}
		this.resizeScreen();
	},
	toggle_east_width: function() {
		if(parseInt($('east').style.width) > 400){
			this.open_east_short();
		} else {
			this.open_east_wide();
		}
	},
	open_east_wide: function() {
		this.open_east(700);
	},
	open_east_short: function() {
		this.open_east(400);
	},
	close_east: function() {
		$('east').style.display = 'none';
		this.resizeScreen();
	},
	clear_east: function() {
		this.clear('tg_east');
	},
	clear: function(target_id) {
		$(target_id).innerHTML = '';
	},
	clear_close_east: function() {
		this.clear_east();
		this.close_east();
	},
	protectDiv: function(surface_mask, divToProtect) {
		var dim = divToProtect.getDimensions();
		//var pos = divToProtect.cumulativeOffset();
		var pos = divToProtect.positionedOffset();

		surface_mask.setStyle({
			width : dim.width + "px",
			height : dim.height+"px",
			top : pos.top + "px",
			left : pos.left + "px"
		});
		surface_mask.show();
	},
	hideProtectDiv: function(surface_mask){
		surface_mask.hide();
	},
	mark_current_row: function (row_id) {
		row = $(row_id);
		if (row) {
			row.addClassName('selected');
			tbody = row.parentNode;
			table = tbody.parentNode;
			var rows = table.rows;
			for (i=0;i<rows.length;i++) {
				rows[i].removeClassName('current');
			}
			row.addClassName('current');
		}
	},

	component_register: function(class_id, dom_id, url) {
		this.comp_registred.register(class_id, dom_id, url);
	},
	
	tg_center_refresh: function(row_id) {
		if($(row_id)){
			this.link_to('sfSurfaceHistoryNavigate/refresh','tg_center', {});
			return true;
		}
		return false;
	},

	components_refresh: function(class_id) {
		if (class_id != undefined) {
			if (Object.isArray(class_id)) {
				class_id.each(function(c) {
					this.components_refresh(c);
				});
			}
			else {
				var comps = this.comp_registred.get_class_components(class_id);
				comps.each(function(c) {
					if ($(c.dom_id)) {
						surface.link_to(c.url, c.dom_id);
					}
					else {
						surface.comp_registred.clear_component(c.class_id, c.dom_id);
					}
				});
			}
		}
	},

	submit_to: function(button, url, target_id, options) {
		var a = (Element.extend(button)).ancestors();
		for(var i in a) {
			if(a[i].tagName=='FORM') {
				var form = a[i];
				break;
			}
		}

		url = this.getSfUrl(url, target_id);
		options = (options !== undefined) ? options : {};
		options.asynchronous = (options.asynchronous !== undefined)? options.asynchronous : true;
		options.evalScripts = (options.evalScripts !== undefined)? options.evalScripts : true;
		options.parameters = Form.serialize(form);

		options.onLoading = (options.onLoading !== undefined) ? options.onLoading : function(request, json){
			SetCursorWait();
			surface.addLoadingMask($(target_id));
			$('surface_loading').show();
		};

		options.onComplete = (options.onComplete !== undefined) ? options.onComplete : function(request, json){
			SetCursorNormal();
			$('surface_loading').hide();
			surface.components_refresh(options.component_class_update);
			surface.executeLinkToCallBacks(url, target_id, options);
		};

		new Ajax.Updater(
			target_id,
			url,
			options
		);
	},


	/* VINCE'S ADDITIONS */
	updateActiveMenu: function(module_name, target){
		var active_class='active';
		if(target == 'tg_center'){
			$$('#appNavigation .'+active_class).each(function(e){e.removeClassName(active_class)});
			if($('menu_app_navigation_'+module_name)){
				$('menu_app_navigation_'+module_name).addClassName(active_class);
			}
		}
	},

	addInlineEditingRow: function(module_name, component_name, uid, params){
		var new_node = document.createElement('tr');
		new_node.id = uid+'_id_'+document.current_inline_editing_row_id[uid];
		$(uid+'_tbody').appendChild(new_node);
		var url = module_name+'/'+component_name+'InlineEditingRow?id='+document.current_inline_editing_row_id[uid]+'&skipNav=true';
		if(params){
			url += '&'+params;
		}
		this.link_to(url, new_node.id);
		document.current_inline_editing_row_id[uid]--;
	},

	archiveRow: function(el){
		var id = el.id.replace('_delete_action','');
		el.style.display='none';
		$(id+'_undelete_action').style.display='';
		$(id+'_todelete').value=1;//The actual thing
		var tds = $$('#'+id+' td');
		var stroke = document.createElement('div');
		stroke.addClassName('stroke');
		for(var i=0;i < tds.length; i++){
			if(tds[i].appendChild){
				tds[i].appendChild(stroke.cloneNode(false));
			}
		}
	},

	unarchiveRow: function(el){
		var id = el.id.replace('_undelete_action','');
		el.style.display='none';
		$(id+'_delete_action').style.display='';
		$(id+'_todelete').value=0;//The actual thing
		var strokes = $$('#'+id+' td > .stroke');
		for(var i=0;i < strokes.length; i++){
			strokes[i].parentNode.removeChild(strokes[i]);
		}
	},

	addLoadingMask: function(el){
		if(el.tagName=='TR' || el.tagName=='TBODY' || el.tagName=='TABLE' || el.hasClassName('no_loading_mask')){
			//TODO
		} else {
			var mask = document.createElement('DIV');
			if(el.style.position != 'absolute' && el.style.position != 'fixed'){
				el.style.position = 'relative';
			}
			mask.addClassName('loading_mask');
			el.appendChild(mask);
		}
	},

	link_to_callbacks: new Array(),

	registerLinkToCallBack: function(fn){
		this.link_to_callbacks.push(fn);
	},

	executeLinkToCallBacks: function(url, target, options){
		for(var c in this.link_to_callbacks){
			this.link_to_callbacks[c](url, target, options);
		}
	},

	submitNearestForm: function(el){
		var a=(Element.extend(el)).ancestors();
		for(var i in a){
			if(a[i].tagName=='FORM'){
				try{
					a[i].onsubmit();
				} catch(err){
					a[i].submit();
				}
				return;
			}
		}
		console.log('SfError: Couldn\'t find any form to submit :');
		console.log(el);
		console.log('List of ascendants :');
		console.log(a);
	},

	clearActiveClass: function(selector){
		var el;
		if(selector.childElements && selector.removeClassName){
			selector.removeClassName('active');
			el = selector.childElements();
		} else {
			el = $$(selector);
		}
		if(!el){
			console.log('Unknown element '+selector);
			return;
		}
		el.forEach(function(ch){
			ch.removeClassName('active');
			ch.childElements().forEach(function(fi){
				fi.removeClassName('active');
			});
		});
	},

	updateActiveClass: function(el){
		this.clearActiveClass(el.parentNode);
		el.addClassName('active');
	},

	updateParentNodeSelector: function(obj, singular_name, target, default_id){
		var url = 'node/parentSelector?node_type_id='+obj.value+'&singular_name='+singular_name;
		if($(singular_name+'_parent_node_id') && $(singular_name+'_parent_node_id').value){
			url += '&selected_parent_node_id='+$(singular_name+'_parent_node_id').value;
		} else if(default_id) {
			url += '&selected_parent_node_id='+default_id;
		}
		return surface.link_to(url, target);
	},

	setActiveTab: function(tab_id, default_id){
		tab_id = tab_id.split('#').last();
		try{
			var el;
			el = $(tab_id);
			if(!el){
				el = $(default_id);
				tab_id = el.id;
			}
			if(!el || !el.id){ // if(!el || !el.id || tab_id.substr(0, 4) != 'vtab'){
				console.log('Unknown element '+tab_id);
				return true;
			}
			this.updateActiveClass(el);
			el.siblings().forEach(function(ch){
				if(ch.href && ch.href.split('#').last() == tab_id){
					ch.addClassName('active');
				}
			});
			return false;
		}catch(e){
			window.location.hash = tab_id;
			return true;
		}
	},

	findPos: function(obj){
		var curleft = curtop = 0;
		if (obj.offsetParent) {
			do {
				curleft += obj.offsetLeft;
				curtop += obj.offsetTop;
			} while (obj = obj.offsetParent);
		}
		return [curleft,curtop];
	},

	resizeScreen: function(){
		$('tg_center').style.height = (document.body.clientHeight - 5 - surface.findPos($('tg_center'))[1])+'px';
		$('tg_east').style.height = (document.body.clientHeight - 5 - surface.findPos($('tg_east'))[1])+'px';
		if($('tg_east').style.display != 'none'){
			$('tg_center').style.maxWidth = (document.body.clientWidth - 5 - $('tg_east').clientWidth)+'px';
		}
	},

	getLastLightboxUrl: function(){
		return this.targets.tg_lightbox.last();
	},

	inlineFilter: function(value, list_id){
		el = $(list_id);
		if(!el){
			return;
		}
		var t = el.childElements();
		for(var i in t){
			ch = t[i];
			switch(ch.tagName){
				case 'LABEL':
				case 'A':
					if(ch.text.toUpperCase().search(value.toUpperCase()) == -1){
						ch.oldDisplay = ch.style.display;
						ch.style.display = 'none';
					} else {
						ch.style.display = 'block';
						if(ch.style.display == 'none' && ch.oldDisplay){
							ch.style.display = ch.oldDisplay;
						}
					}
					break;
				//TODO
			}
		}
	},

	initLightbox: function(){
		var lightbox = $('lightbox');
		lightbox.style.display='block';
		lightbox.style.height='100%';
		document.lightbox_container = $$('#lightbox > .container').first();
		cont = document.lightbox_container;
		var header = $$('#lightbox > .container > .header').first();;
		header.lightbox_container = cont;
		cont.style.top = cont.offsetTop+'px';
		cont.style.left = cont.offsetLeft+'px';
		cont.style.position = 'absolute';
		document.onmousemove = function(event){
			cont = document.lightbox_container;
			if(cont.moving){
				if (event.stopPropagation) {
					event.stopPropagation();
				}
				event.cancelBubble = true;
				lightbox.style.background = 'none';
				lightbox.style.height='100%';
				cont.style.left = (event.clientX + document.body.scrollLeft - cont.moving[0])+'px';
				cont.style.top = (event.clientY + document.body.scrollTop - cont.moving[1])+'px';
			}
		}
		header.onmousedown = function(event){
			if(event.offsetX){
				document.lightbox_container.moving = [event.offsetX, event.offsetY];
			} else {
				document.lightbox_container.moving = [event.layerX, event.layerY];
			}
		}
		header.onmouseup = function(event){
			document.lightbox_container.moving = false;
			lightbox.style.background = 'rgba(0, 0, 0, 0.5)';
			lightbox.style.height='0';
		}
		cont.onmouseup = header.onmouseup;
		var cancels = $$('#tg_lightbox .sf_admin_action_cancel');
		for(var i in cancels){
			cancels[i].onclick= function(){surface.link_to('default/blank', 'tg_lightbox');return false;};
		}
	}
}

surface = new surfaceController();

function SetCursorWait(){
	document.body.style.cursor = 'wait';
}

function SetCursorNormal(){
	document.body.style.cursor = 'default';
}

/**
 * Call back for lightbox
 */
surface.registerLinkToCallBack(function(url, target, options){
	var lightbox = $('lightbox');
	if(target == 'tg_lightbox'){
		if(url.search('default/blank') != -1 || url.search('/cancel') != -1){
			lightbox.style.display='none';
		} else {
			surface.initLightbox();
		}
	} else if(target == 'tg_center' || target == 'tg_east') {
		if(!lightbox.style.display == 'none'){
			return;
		}
	    lightbox.style.height = '0px';
	}
});


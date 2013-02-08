if (typeof Effect == 'undefined') 
	throw("surface.js requires including script.aculo.us' effects.js library!");

var SurfacePane = Class.create();
SurfacePane.prototype = {
	options: {
		title: 	 "pane",
		classname: 	 "",
		content:     null,
		size:        0
	},
  
	initialize: function(parentLayout, options) {
		this.setOptions(options);
    
		this.collapsed  = false;
		this.header = null;
		this.content = null;
		this.parentLayout = parentLayout;
    
		this.pane = new Element("div");
		this.pane.addClassName(this.options.classname);
		parentLayout.layout.insert(this.pane);
      
		if (this.options.content) {
			var content = $(this.options.content);
			if (Object.isElement(content)) {
				//gestion du menu de navigation
				//		this.header = new Element("div");
				//		this.header.addClassName("surface_pane_head");
				//		this.header.innerHTML = this.options.title;
				//		this.pane.insert(this.header);

				this.content = content;
				// this.content.style.overflow = "auto";
				this.content.addClassName("surface_pane_content");
				this.pane.insert(this.content);
			}
		}
	},
  
	setOptions: function(options) {
		this.options = Object.clone(this.options);
		this.options = Object.extend(this.options, options || {});
	},
  
	setPosition: function(left, top, width, height) {
		this.pane.style.left = left + 'px';
		//top a 0px
		//this.pane.style.top = top + 'px';
		this.pane.style.width = ((width > 0)? width - 1 : 0) + 'px';
	
		if (this.content) {
			if (this.header) {
				height -= this.header.getHeight();
			}
			this.content.style.height = ((height >= 0)? height : 0) + 'px';
			this.content.style.width = this.pane.style.width;
		}
	},
  
	getSize: function() {
		//Taille du pane collasped, taille du east ferme
		return (this.collapsed)? 6 : this.options.size;
	},
  
	setSize: function(size) {
		this.options.size = size;
	},
  
	setCollapsed: function(bCollapsed) {
		this.collapsed = bCollapsed;
		if (this.collapsed) {
			this.pane.addClassName("surface_pane_collapsed");
			this.pane.observe("click", this.onClick.bind(this));
			if (this.header)
				this.header.hide();
			if (this.content)
				this.content.hide();
			if($('eastNavigation'))
				$('eastNavigation').hide();
		}
		else {
			this.pane.removeClassName("surface_pane_collapsed");
			if (this.header)
				this.header.show();
			if (this.content)
				this.content.show();
			if($('eastNavigation'))
				$('eastNavigation').show();
		}
	
		this.parentLayout.updateLayoutSize();
	},
  
	isCollapsed: function() {
		return this.collapsed;
	},
  
	onClick: function(event) {
		if (this.collapsed) {
			this.setCollapsed(false);
		}
	}
};

var SurfaceLayout = Class.create();
SurfaceLayout.prototype = {
	options: {
		west: {
			title: 	 "west",
			classname: 'surface_layout_west',
			content:	 'tg_west'
		},
		east: {
			title: 	  "east",
			classname:  'surface_layout_east',
			content:    'tg_east'
		},
		center: {
			title: 	 "center",
			classname: 'surface_layout_center',
			content:   'tg_center'
		}
	},
  
	initialize: function(options) {
		this.layout = null;
		this.west = null;
		this.east = null;
		this.center = null;
    
		this.setOptions(options);
		this.createLayout();
	},
  
	setOptions: function(options) {
		this.options = Object.clone(this.options);
		this.options.west = Object.extend(this.options.west, options.west || {});
		this.options.east = Object.extend(this.options.east, options.east || {});
		this.options.center = Object.extend(this.options.center, options.center || {});
	},
    
	createLayout: function() {

		this.layout = new Element("div");
		this.layout.addClassName('surface_layout');
		this.layout.style.width = "100%";
    
		document.body.appendChild(this.layout);
		document.body.style.overflow = "hidden";
    
		this.west = new SurfacePane(this,   this.options.west);
		this.east = new SurfacePane(this,   this.options.east);
		this.center = new SurfacePane(this, this.options.center);
    
		this.updateLayoutSize();
    
		Event.observe(window, "resize", this.onWindowResize.bindAsEventListener(this));
	},
  
	updateLayoutSize: function() {

		var width = 0, height = 0;
		if (typeof(window.innerWidth) == 'number') {
			//Non-IE
			width = window.innerWidth;
			height = window.innerHeight;
		}
		else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
			//IE 6+ in 'standards compliant mode'
			width = document.documentElement.clientWidth;
			height = document.documentElement.clientHeight;
		}
		else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
			//IE 4 compatible
			width = document.body.clientWidth;
			height = document.body.clientHeight;
		}
    
		if (surface.layout_top) {
			height = height - surface.layout_top;
		}
        
		this.layout.style.width = width + 'px';
		this.layout.style.height = height + 'px';
    
		var westWidth = this.west.getSize();
		this.west.setPosition(0, 0, westWidth, height);
     
		var eastWidth = this.east.getSize();
		this.east.setPosition(width - eastWidth, 0, eastWidth, height);
    
		this.center.setPosition(westWidth, 0, width - westWidth - eastWidth, height);
	},
  
	onWindowResize: function(event) {
		this.updateLayoutSize();
	},
  
	collapsePanelEast: function() {
		this.east.setCollapsed(true);
	},
  
	expandPanelEast: function() {
		this.east.setCollapsed(false);
	},
	setPanelEastWidth: function(width, bCollapsed) {
		this.east.setSize(width);
		this.east.setCollapsed(bCollapsed);
	},
	togglePanelEastWidth: function(width1, width2) {
		if (!this.east.isCollapsed()) {
			if (this.east.getSize() == width1) {
				this.east.setSize(width2);
				//gestion du menu
				if($('eastNavigation')) $('eastNavigation').style.width = width2 + "px";
			}
			else {
				this.east.setSize(width1);
				//gestion du menu
				if($('eastNavigation')) $('eastNavigation').style.width = width1 + "px";
			}
			this.east.setCollapsed(false);
		}
	}
};

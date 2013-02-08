if (typeof Effect == 'undefined') 
	throw("accordion.js requires including script.aculo.us' effects.js library!");

var SurfaceCompRegister = Class.create();
SurfaceCompRegister.prototype = {
	class_id:   null,
	dom_id:     null,
	url:        null,
    
	initialize: function(class_id, dom_id, url) {
		this.class_id = class_id;
		this.dom_id = dom_id;
		this.url = url;
	}
};

var SurfaceCompRegisterStack = Class.create();
SurfaceCompRegisterStack.prototype = {
	comp_stack: null,

	initialize: function(options) {
		this.comp_stack = new Array();
	},
    
	get_component: function(pane_id, class_id, dom_id) {
		return this.comp_stack.find(function(c) {
			return ((c.class_id == class_id) && (c.dom_id == dom_id));
		});
	},
    
	get_class_components: function(class_id) {
		return this.comp_stack.findAll(function(c) {
			return (c.class_id == class_id);
		});
	},
    
	register: function(class_id, dom_id, url) {
		this.clear_component(class_id, dom_id);
        
		comp = new SurfaceCompRegister(class_id, dom_id, url);
		this.comp_stack.push(comp);
	},
	
	clear_component: function(class_id, dom_id) {
		this.comp_stack = this.comp_stack.reject(function(c) {
			return ((c.class_id == class_id) && (c.dom_id == dom_id));
		});
	},
     
	clear_class: function(class_id) {
		this.comp_stack = this.comp_stack.reject(function(c) {
			return (c.class_id == class_id);
		});
	}
}
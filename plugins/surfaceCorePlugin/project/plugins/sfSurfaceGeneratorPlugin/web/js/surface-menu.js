if (typeof Effect == 'undefined') 
	throw("accordion.js requires including script.aculo.us' effects.js library!");

var SurfaceMenu = Class.create();
SurfaceMenu.prototype = {

	initialize: function(container, options) {
		if (!$(container)) {
			throw(container+" doesn't exist!");
		}
    
		this.container = $(container);
      
		this.options = Object.extend({
			classNames : {
				toggle : 'accordion_toggle',
				toggleActive : 'accordion_toggle_active',
				content : 'accordion_content'
			},
			onEvent : 'click'
		}, options || {});
    
		var accordions = $$('#'+container+' .'+this.options.classNames.toggle);
		accordions.each(function(accordion) {
			Event.observe(accordion, this.options.onEvent, this.activate.bind(this, accordion), false);
		}.bind(this));
	},
  
	activate : function(accordion) {
		accordion = Element.extend(accordion);
		var sibblings = accordion.adjacent("." + this.options.classNames.content);
		sibblings.each(function(sibbling) {
			sibbling.hide();
		});
    
		var actives = this.container.select("." + this.options.classNames.toggleActive);
		actives.each(function(active) {
			active.removeClassName(this.options.classNames.toggleActive);
		}.bind(this));
    
		accordion.addClassName(this.options.classNames.toggleActive);
		var next = accordion.next(0);
		if (next && next.hasClassName(this.options.classNames.content)) {
			next.show();
		}
    
		return true;
	}
}
	
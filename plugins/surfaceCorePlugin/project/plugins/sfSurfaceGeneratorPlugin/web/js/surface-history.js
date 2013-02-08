if (typeof Effect == 'undefined') 
	throw("surface.js requires including script.aculo.us' effects.js library!");

var SurfaceHistory = Class.create();
SurfaceHistory.prototype = {
	options: {
		target: '',
		max_history: 10
	},
  
	initialize: function(options) {
		this.setOptions(options);
		this.history = new Array();
		this.current = -1;
	},
  
	setOptions: function(options) {
		this.options = Object.clone(this.options);
		this.options = Object.extend(this.options, options || {});
	},
  
	pushUrl: function(url) {
		if (this.current < (this.history.length - 1)) {
			this.history = this.history.slice(0, this.current + 1);
		}
    
		if ((this.current < 0) || (this.history[this.current]) != url) {
			this.history.push(url);
			this.current = this.history.length - 1;
        
			if (this.history.length > this.options.max_history) {
				this.history = this.history.slice(this.history.length - this.options.max_history, this.history.length);
			}
		}
	},
  
	hasPrevious: function() {
		return ((0 < this.current) && (this.current < this.history.length));
	},
	hasNext: function() {
		return ((0 <= this.current) && (this.current < (this.history.length - 1)));
	},
  
	getCurrentUrl: function() {
		return ((0 <= this.current) && (this.current < this.history.length))? this.history[this.current] : null;
	},
	getPreviousUrl: function() {
		return ((0 < this.current) && (this.current < this.history.length))? this.history[this.current - 1] : null;
	},
	getNextUrl: function() {
		return ((0 <= this.current) && (this.current < (this.history.length - 1)))? this.history[this.current + 1] : null;
	},
  
	goPrevious: function() {
		this.move_to(this.current - 1);
	},
	goNext: function() {
		this.move_to(this.current + 1);
	},
	refresh: function() {
		this.move_to(this.current);
	},
  
	move_to: function(new_index) {
		if ((0 <= new_index) && (new_index < this.history.length)) {
			this.go_to(this.target, this.history[new_index]);
			this.current = new_index;
		}
	},
  
	go_to: function(target, url) {
		options = {};
		options.asynchronous = true;
		options.method = 'GET';
		options.evalScripts = true;
		options.parameters = '';
      
		new Ajax.Updater(this.options.target, url, options);
	}
};
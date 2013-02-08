if(typeof Prototype == 'undefined' || !Prototype.Version.match("1.6"))
  throw("Prototype-UI library require Prototype library >= 1.6.0");

SpinControl = Class.create({
  options: {
    increment:  1,
    min:        "undefined",
    max:        "undefined",
    size:       10
  },
  
  initialize: function(container, field_name, value, options) {
    this.container = $(container);
    this.field_name = field_name;
    this.value = value;
    this.setOptions(options);
    // this.options = Object.extend(this.options, options || {});
    
    this.periodicUpdater = null;
    
    this.create();
  },
  
  destroy: function() {
    this.upButton.stopObserving();
    this.downButton.stopObserving();
    this.textBox.stopObserving();
  },
  
  setOptions: function(options) {
    this.options = Object.clone(this.options);
    this.options = Object.extend(this.options, options || {});
  },
  
  create: function() {
    this.container.addClassName('spinContainer');
  
    this.textBox = new Element("input");
    this.textBox.type = 'text';
    this.textBox.addClassName('spinInput');
    this.textBox.name = this.field_name;
    this.textBox.value = this.value;
    if (this.options.size)
      this.textBox.size = this.options.size;
    if (this.options.id)
      this.textBox.id = this.options.id;
    this.container.insert(this.textBox);
    this.textBox.observe('DOMMouseScroll',  this.onMouseWheel.bind(this));  
    this.textBox.observe('mousewheel',      this.onMouseWheel.bind(this));    // For ie compatibility

    var spiner = new Element("div");
    spiner.addClassName('spiner');
    this.container.insert(spiner);

    this.upButton = new Element("div");
    this.upButton.addClassName('spinUpBtn');
    spiner.insert(this.upButton);
    this.upButton.observe('mousedown',  this.onUpMouseDown.bind(this));
    this.upButton.observe('click',      this.onUpClick.bind(this));

    this.downButton = new Element("div");
    this.downButton.addClassName('spinDownBtn');
    spiner.insert(this.downButton);
    this.downButton.observe('mousedown',  this.onDownMouseDown.bind(this));
    this.downButton.observe('click',      this.onDownClick.bind(this));
  },
  
  onUpClick: function(event) {
    event.stop();
    this.spinUpdateStop();
    if (!this.spinning)
      this.updateCurrentValue(this.options.increment, false);
    this.spinning = false;
    this.textBox.focus();
  },
  onDownClick: function(event) {
    event.stop();
    this.spinUpdateStop();
    if (!this.spinning)
      this.updateCurrentValue(-1 * this.options.increment, false);
    this.spinning = false;
    this.textBox.focus();
  },
  
  onUpMouseDown: function(event) {
    event.stop();
    this.upButton.addClassName('spinUpBtnPress');

    this.spinUpdateStart(this.options.increment);
    this.textBox.focus();
  },
  onDownMouseDown: function(event) {
    event.stop();
    this.downButton.addClassName('spinDownBtnPress');
    this.spinUpdateStart(-1 * this.options.increment);
    this.textBox.focus();
  },
  onMouseUp: function(event) {
    event.stop();
    this.spinUpdateStop();
  },
   
  spinUpdateStart: function(delta) {
    this.spinning = false;
    if (this.periodicUpdater) {
      this.periodicUpdater.stop();
      this.periodicUpdater = null;
    }

    this.periodicUpdater = new PeriodicalExecuter(this.spinUpdateProc, 0.2);
    this.periodicUpdater.spinner = this;
    this.periodicUpdater.delta = delta;
  },
  
  spinUpdateStop: function() {
    if (this.periodicUpdater) {
      this.periodicUpdater.stop();
      this.periodicUpdater = null;
      
      this.upButton.removeClassName('spinUpBtnPress');
      this.downButton.removeClassName('spinDownBtnPress');
    }
  },
  
  spinUpdateProc: function(pe) {
    pe.spinner.updateCurrentValue(pe.delta, false);
    pe.spinner.spinning = true;
  },
  
  onMouseWheel: function(event) {
    event.stop();
        
    var movement;
    var bAlt;
    
    if (event.detail) {
      movement = (event.detail < 0)? 1 : -1;
      bAlt = Math.abs(event.detail) == 1;
    }
    else {
      movement = event.wheelDelta / 120;
      bAlt = event.ctrlKey;
    }
    
    this.updateCurrentValue(this.options.increment * movement, bAlt);
  },
  
  updateCurrentValue: function(delta, bAlt) {
    if (!isNaN(this.textBox.value)) {
      var value = parseFloat(this.textBox.value);
      value += delta;
      
      if (!isNaN(value)) {
        if (!isNaN(this.options.min))
          value = Math.max(value, this.options.min);
      
        if (!isNaN(this.options.max))
          value = Math.min(value, this.options.max);
    
        this.textBox.value = value;
        this.textBox.fire('value:change');
      }
    }
  }
});

function TimeSpinControl_timeParse(szTime, withSecond) {
  var iTime = 0;
  
  /*
  var iHourSep = szTime.indexOf(':');
  if (iHourSep > 0) {

    iTime += parseInt(szTime.substring(0, iHourSep), 10);
    iTime *= 60;
  }

  var iMinSep = szTime.indexOf(':', iHourSep + 1);
  if (iMinSep > 0) {
    iTime += parseInt(szTime.substring(iHourSep + 1, iMinSep), 10);
    
    if (withSecond)
       iTime *= 60;
  }
  else
    iMinSep = iHourSep;
  
  iTime += parseInt(szTime.substring(iMinSep + 1), 10);
  */
  var i;
  var iParse;
  var bPrevWasSep = false;
  var szHour = "0";
  var szMin = "0";
  var szSec = "0";
  
  iParse = 0;
  if (szTime) {
    for (i = 0; i < szTime.length; i++) {
      if (('0' <= szTime.charAt(i)) && (szTime.charAt(i) <= '9')) {
        switch (iParse) {
        case 0 :  szHour += szTime.charAt(i);   break;
        case 1 :  szMin += szTime.charAt(i);   break;
        case 2 :  szSec += szTime.charAt(i);   break;
        }
        bPrevWasSep = false;
      }
      else {
        // surrely a separator
        if (bPrevWasSep) {
          // the string surrely has a bad format
          return 0;
        }
        
        iParse += 1;
        bPrevWasSep = true;
      }
    }
    
    iTime = parseInt(szHour, 10) * 60;
    iTime += parseInt(szMin, 10);
    
    if (withSecond) {
      iTime *= 60;
      iTime += parseInt(szSec, 10);
    }
  }
  
  return parseInt(iTime);
};

function TimeSpinControl_timeFormat(iTime, withSecond) {
  var szTime = "";
  var bNeg = false;
  
  bNeg = (iTime < 0);
  iTime *= bNeg? -1 : 1;

  szTime += TimeSpinControl_format2digit(iTime / (60 * (withSecond? 60 : 1)));
  szTime += ':';
  szTime += TimeSpinControl_format2digit((iTime / (withSecond? 60 : 1)) % 60);
  
  if (withSecond) {
    szTime += ':';
    szTime += tTimeSpinControl_format2digit(iTime % 60);
  }
  
  if (bNeg)
    szTime = '-' + szTime;
  
  return szTime;
};

function TimeSpinControl_format2digit(number) {
  if (isNaN(number))
    number = '0';
  
  return (parseInt(number, 10) < 10)? "0" + parseInt(number, 10) : "" + parseInt(number, 10);
}

TimeSpinControl = Class.create(SpinControl, {
  options_ex: {
    withSecond:   false,
    noInput:      false
  },
  
  initialize: function($super, container, field_name, value, options) {
    $super(container, field_name, value, options);
    
    if (!this.options.withSecond) {
      if (value != null) {
        value = (TimeSpinControl_timeParse(value, true) / 60);
        this.textBox.value = TimeSpinControl_timeFormat(value, false);
      }
    }
    
    if (this.options.noInput) {
      this.textBox.readOnly = true;
    }
  },
  
  setOptions: function($super, options) {
    // this.options = Object.extend(this.options, this.options_ex);  
    // $super(options);
    this.options = Object.clone(this.options);
    this.options = Object.extend(this.options, this.options_ex || {});
    this.options = Object.extend(this.options, options || {});

    
    if (this.options.min != "undefined")
      this.options.min = TimeSpinControl_timeParse(this.options.min, this.options.withSecond);
      
    if (this.options.max != "undefined")
      this.options.max = TimeSpinControl_timeParse(this.options.max, this.options.withSecond);
  },
  
  updateCurrentValue: function($super, delta, bAlt) {
    var value = TimeSpinControl_timeParse(this.textBox.value, this.options.withSecond);
    
    if (bAlt)
      delta *= this.options.withSecond? 3600 : 60;
    value = ((value + delta + ((this.options.withSecond)? 86400 : 1440)) % ((this.options.withSecond)? 86400 : 1440));
    
    if (!isNaN(this.options.min))
      value = Math.max(value, this.options.min);
    
    if (!isNaN(this.options.max))
      value = Math.min(value, this.options.max);
    
    this.textBox.value = TimeSpinControl_timeFormat(value, this.options.withSecond);
    this.textBox.fire('value:change');
  }
  
});

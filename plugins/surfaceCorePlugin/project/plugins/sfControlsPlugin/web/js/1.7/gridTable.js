
JGCol = Class.create();
JGCol.prototype = {
/*var JGCol = Class.create({*/
  initialize: function() {
    this.json = "";
  },
  readJson: function(json) {
    this.initialize();
    this.json = json;
    this.id = json.id;
    this.numord = json.numord;
    this.title = json.title;
    //alert(this.title);
  }
};

JGRow = Class.create();
JGRow.prototype = {
/*var JGRow = Class.create({*/
  initialize: function() {
    this.json = "";
  },
  readJson: function(json) {
    this.initialize();
    this.json = json;
    this.id = json.id;
    this.numord = json.numord;
    this.title = json.title;
    //alert(this.title);
  }
};


JGCell = Class.create();
JGCell.prototype = {
/*var JGCell = Class.create({*/
  initialize: function() {
    this.json = "";
  },
  readJson: function(json) {
    this.initialize();
    this.json = json;
    this.col_id = json.col_id;
    this.row_id = json.row_id;
    this.indicator = json.indicator;
    this.indicator_id = json.indicator_id;
    //alert(this.title);
  },
  getContent: function(){
    html = "";
    html += "<div>";
    html += "<span class=\"indicator\">" + this.indicator_id + ":" + this.indicator + "</span>";
    html += "("+this.row_id+":"+this.col_id + ")";
    html += "</div>";
    return html;
  }
};

JGrid = Class.create();
JGrid.prototype = {
/*var JGrid = Class.create({*/
  initialize: function() {
    this.cols = [];
    this.rows = [];
    this.cells = [];
    this.json = "";
  },
  readJson: function(json) {
    this.initialize();
    this.json = json;
    this.title = json.title;
    //import cols
    for (i=0; i < json.cols.length; i++) {
	c = new JGCol();
        c.readJson(json.cols[i]);
	this.cols.push(c);
	
    }
    //import rows
    for (i=0; i < json.rows.length; i++) {
	r = new JGRow();
        r.readJson(json.rows[i]);
	this.rows.push(r);
    }

    //import cells
    for (i=0; i < json.cells.length; i++) {
	c = new JGCell();
        c.readJson(json.cells[i]);
	this.cells.push(c);
    }
  },
  moveRow: function (from, to) {	
    var sens = 1;
    // inverse éventuellement les from/to
    if (from > to) {
	sens = -1;
    }
    if ((from < 0) || (to < 0) || (from >= this.rows.length ) || (to >= this.rows.length )) {
      return;
    } else {
      r = this.rows[from];

      var arr = [];
      if (sens == 1) {
	      for (i = 0; i <= to; i++) {
		if (i != from) {
		  arr.push(this.rows[i]);
		}
	      }
	      arr.push(r);
	      for (i = to + 1; i < this.rows.length; i++) {
		  arr.push(this.rows[i]);
	      }
      } else {
	      for (i = this.rows.length - 1; i >= to; i--) {
		if (i != from) {
		  arr.push(this.rows[i]);
		}
	      }
	      arr.push(r);
	      for (i = to - 1; i >= 0; i--) {
		arr.push(this.rows[i]);
	      }
	      arr.reverse();
      }

      this.rows = arr;
    }
    this.print(this.tableId);
    
  },
  moveRowElement: function (e) {
    var element = window.event ? window.event.srcElement : e ? e.target : null;
    if ( !element ) return;
    // on verifie l'id de l'element pour etablir l'ordre de tri et on recup l'index correspondant
    if ( element.id.indexOf('upR') != -1 ) {
      cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
      if (cellIndex > 0) {
        this.moveRow(cellIndex, cellIndex - 1) 
      }
    } else {
      cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
      if (cellIndex < this.rows.length) {
        this.moveRow(cellIndex, cellIndex + 1) 
      }
    }
  },
  moveCol: function (from, to) {	
    var sens = 1;
    // inverse éventuellement les from/to
    if (from > to) {
	sens = -1;
    }

    if ((from < 0) || (to < 0) || (from >= this.cols.length ) || (to >= this.cols.length )) {
      return;
    } else {
      r = this.cols[from];

      var arr = [];
      if (sens == 1) {
	      for (i = 0; i <= to; i++) {
		if (i != from) {
		  arr.push(this.cols[i]);
		}
	      }
	      arr.push(r);
	      for (i = to + 1; i < this.cols.length; i++) {
		  arr.push(this.cols[i]);
	      }
      } else {
	      for (i = this.cols.length - 1; i >= to; i--) {
		if (i != from) {
		  arr.push(this.cols[i]);
		}
	      }
	      arr.push(r);
	      for (i = to - 1; i >= 0; i--) {
		arr.push(this.cols[i]);
	      }
	      arr.reverse();
      }

      this.cols = arr;
    }
    this.print(this.tableId);
    
  },
  moveColElement: function (e) {
    var element = window.event ? window.event.srcElement : e ? e.target : null;
    if ( !element ) return;
    // on verifie l'id de l'element pour etablir l'ordre de tri et on recup l'index correspondant
    if ( element.id.indexOf('upC') != -1 ) {
      cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
      if (cellIndex > 0) {
        this.moveCol(cellIndex, cellIndex - 1) 
      }
    } else {
      cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
      if (cellIndex < this.cols.length) {
        this.moveCol(cellIndex, cellIndex + 1) 
      }
    }
  },
  insertRow: function (index) {	
    if ((index < 0) || (index >= this.rows.length)) {
      return;
    } else {
      var arr = [];
      for (i = 0; i < this.rows.length; i++) {
	if (i == index) {
          r = new JGRow();
          r.title = prompt("Titre de la colonne?", "Titre par défaut");
	  arr.push(r);
	}
        arr.push(this.rows[i]);
      }
      this.rows = arr;
    }
    this.print(this.tableId);
    
  },
  insertRowElement: function (e) {
    var element = window.event ? window.event.srcElement : e ? e.target : null;
    if ( !element ) return;
    cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
    if (cellIndex < this.rows.length) {
      this.insertRow(cellIndex) 
    }
  },
  deleteRow: function (index) {	
    if ((index < 0) || (index >= this.rows.length)) {
      return;
    } else {
      var arr = [];
      for (i = 0; i < this.rows.length; i++) {
	if ((i == index) /*&& (confirm('Etes-vous sur?'))*/) {
	} else {
          arr.push(this.rows[i]);
        }
      }
      this.rows = arr;
    }
    this.print(this.tableId);
    
  },
  deleteRowElement: function (e) {
    var element = window.event ? window.event.srcElement : e ? e.target : null;
    if ( !element ) return;
    cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
    if (cellIndex < this.rows.length) {
      this.deleteRow(cellIndex) 
    }
  },
  insertCol: function (index) {	
    if ((index < 0) || (index >= this.cols.length)) {
      return;
    } else {
      var arr = [];
      for (i = 0; i < this.cols.length; i++) {
	if (i == index) {
          c = new JGCol();
          c.title = prompt("Titre de la colonne?", "Titre par défaut");
	  arr.push(c);
	}
        arr.push(this.cols[i]);
      }
      this.cols = arr;
    }
    this.print(this.tableId);
    
  },
  insertColElement: function (e) {
    var element = window.event ? window.event.srcElement : e ? e.target : null;
    if ( !element ) return;
    cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
    if (cellIndex < this.cols.length) {
      this.insertCol(cellIndex) 
    }
  },
  deleteCol: function (index) {	
    if ((index < 0) || (index >= this.cols.length)) {
      return;
    } else {
      var arr = [];
      for (i = 0; i < this.cols.length; i++) {
	if ((i == index) /*&& (confirm('Etes-vous sur?'))*/) {
	} else {
          arr.push(this.cols[i]);
        }
      }
      this.cols = arr;
    }
    this.print(this.tableId);
    
  },
  deleteColElement: function (e) {
    var element = window.event ? window.event.srcElement : e ? e.target : null;
    if ( !element ) return;
    cellIndex = parseInt( element.id.substr(this.tableId.length + 3) );
    if (cellIndex < this.cols.length) {
      this.deleteCol(cellIndex) 
    }
  },
  findCell: function(row_id, col_id) {
    for (k=0; k < this.cells.length ; k++) {
    	if ((this.cells[k].row_id == row_id) && (this.cells[k].col_id == col_id)) {
	  return k;
	}
    }
    return -1
  }, 
  print: function(tableId) {
    this.tableId = tableId;
    this.tableToPrint = $(tableId);
    if ( !this.tableToPrint ) {
      alert("Le tableau ayant pour ID " + tableId + " est introuvable.");
      return;
    }
    var html = "";
    html += "<TR>";
    for (j=-1; j < this.cols.length; j++) {
    	if (j < 0) {
    	  html += "<TH>";
    	  html += this.title;
    	  html += "</TH>";
        } else {
          html += "<TH>";
    	  html += this.cols[j].title;
    	  html += "</TH>";
        }
    }
    html += "</TR>";

    for (i=0; i < this.rows.length; i++) {
      html += "<TR>";
      for (j=-1; j < this.cols.length; j++) {
        if (j < 0) {
    	  html += "<TD>";
    	  html += this.rows[i].title;
    	  html += "</TD>";
        } else {
          var cell_num = this.findCell(this.rows[i].id, this.cols[j].id);
          if (cell_num < 0) {
	    	  html += "<TD>";
	    	  html += "?";
	    	  html += "</TD>";
	  } else {
	    	  html += "<TD>";
	    	  html += this.cells[cell_num].getContent();
	    	  html += "</TD>";
	  }
        }
      }
      html += "</TR>";
    }

    this.tableToPrint.innerHTML = html;

	// ajoute les 'images boutons' (img up et down) et y accroche des event onclick
	// on crée les objets images (up et down) et on les stocke dans un tableau pour pouvoir les cloner
	var imgUp = new Array();
	var imgDown = new Array();
	var imgIns = new Array();
	var imgDel = new Array();
	// creation img up
	imgUp[0] = document.createElement('img');
	imgUp[0].src = 'images/fleche_haut.png';/*this.options.pathToImgUp;*/
	imgUp[0].style.cursor = 'pointer';
	imgUp[0].style.marginLeft = '5px';
	imgUp[0].id = this.tableId + 'upR0';
	// creation img down
	imgDown[0] = document.createElement('img');
	imgDown[0].src = 'images/fleche_bas.png';/*this.options.pathToImgDown;*/
	imgDown[0].style.cursor = 'pointer';
	imgDown[0].id = this.tableId + 'dnR0';
	// creation img ins
	imgIns[0] = document.createElement('img');
	imgIns[0].src = 'images/insert.png';/*this.options.pathToImgDown;*/
	imgIns[0].style.cursor = 'pointer';
	imgIns[0].id = this.tableId + 'inR0';
	// creation img del
	imgDel[0] = document.createElement('img');
	imgDel[0].src = 'images/delete.png';/*this.options.pathToImgDown;*/
	imgDel[0].style.cursor = 'pointer';
	imgDel[0].id = this.tableId + 'deR0';
	// pour chaque cellule
	
	for ( var r = 0; r < this.tableToPrint.rows.length - 1; r++ ) {
	  // si les premieres images ont ete ajouter dans la page (DOM TREE), on clone pour l'ajout suivant (cellule suivante)
	  // on modifie l'id pour avoir un code HTML valide et pour recup l'index de la cellule qui lance l'event
	  if ( r > 0 ) {
	    imgUp[r] = imgUp[0].cloneNode(true);
	    imgUp[r].id = this.tableId + 'upR' + r;
	    imgDown[r] = imgDown[0].cloneNode(true);
	    imgDown[r].id = this.tableId + 'dnR' + r;
	    imgIns[r] = imgIns[0].cloneNode(true);
	    imgIns[r].id = this.tableId + 'inR' + r;
	    imgDel[r] = imgDel[0].cloneNode(true);
	    imgDel[r].id = this.tableId + 'deR' + r;
	  }
	  // on ajoute les images dans les cellules d'entete
	  this.tableToPrint.rows[r + 1].cells[0].appendChild(imgUp[r]);
	  this.tableToPrint.rows[r + 1].cells[0].appendChild(imgDown[r]);
	  this.tableToPrint.rows[r + 1].cells[0].appendChild(imgIns[r]);
	  this.tableToPrint.rows[r + 1].cells[0].appendChild(imgDel[r]);
	  // on recup les objets pour y ajouter les event
	  var elementUp = $(imgUp[r].id);
	  var elementDown = $(imgDown[r].id);
	  var elementIns = $(imgIns[r].id);
	  var elementDel = $(imgDel[r].id);
	  // ajout des event
	  Event.observe( elementUp, 'click', this.moveRowElement.bindAsEventListener(this), false );
	  Event.observe( elementDown, 'click', this.moveRowElement.bindAsEventListener(this), false );
	  Event.observe( elementIns, 'click', this.insertRowElement.bindAsEventListener(this), false );
	  Event.observe( elementDel, 'click', this.deleteRowElement.bindAsEventListener(this), false );
        }
	// ajoute les 'images boutons' (img up et down) et y accroche des event onclick
	// on crée les objets images (up et down) et on les stocke dans un tableau pour pouvoir les cloner


	// creation img up
	imgUp[0] = document.createElement('img');
	imgUp[0].src = 'images/fleche_haut.png';/*this.options.pathToImgUp;*/
	imgUp[0].style.cursor = 'pointer';
	imgUp[0].style.marginLeft = '5px';
	imgUp[0].id = this.tableId + 'upC0';
	// creation img down
	imgDown[0] = document.createElement('img');
	imgDown[0].src = 'images/fleche_bas.png';/*this.options.pathToImgDown;*/
	imgDown[0].style.cursor = 'pointer';
	imgDown[0].id = this.tableId + 'dnC0';
	// creation img ins
	imgIns[0] = document.createElement('img');
	imgIns[0].src = 'images/insert.png';/*this.options.pathToImgDown;*/
	imgIns[0].style.cursor = 'pointer';
	imgIns[0].id = this.tableId + 'inR0';
	// creation img ins
	imgDel[0] = document.createElement('img');
	imgDel[0].src = 'images/delete.png';/*this.options.pathToImgDown;*/
	imgDel[0].style.cursor = 'pointer';
	imgDel[0].id = this.tableId + 'deR0';
	// pour chaque cellule
	
	for ( var r = 0; r < this.tableToPrint.rows[0].cells.length - 1; r++ ) {
	  // si les premieres images ont ete ajouter dans la page (DOM TREE), on clone pour l'ajout suivant (cellule suivante)
	  // on modifie l'id pour avoir un code HTML valide et pour recup l'index de la cellule qui lance l'event
	  if ( r > 0 ) {
	    imgUp[r] = imgUp[0].cloneNode(true);
	    imgUp[r].id = this.tableId + 'upC' + r;
	    imgDown[r] = imgDown[0].cloneNode(true);
	    imgDown[r].id = this.tableId + 'dnC' + r;
	    imgIns[r] = imgIns[0].cloneNode(true);
	    imgIns[r].id = this.tableId + 'inC' + r;
	    imgDel[r] = imgDel[0].cloneNode(true);
	    imgDel[r].id = this.tableId + 'deC' + r;
	  }
	  // on ajoute les images dans les cellules d'entete
	  this.tableToPrint.rows[0].cells[r + 1].appendChild(imgUp[r]);
	  this.tableToPrint.rows[0].cells[r + 1].appendChild(imgDown[r]);
	  this.tableToPrint.rows[0].cells[r + 1].appendChild(imgIns[r]);
	  this.tableToPrint.rows[0].cells[r + 1].appendChild(imgDel[r]);
	  // on recup les objets pour y ajouter les event
	  var elementUp = $(imgUp[r].id);
	  var elementDown = $(imgDown[r].id);
	  var elementIns = $(imgIns[r].id);
	  var elementDel = $(imgDel[r].id);
	  // ajout des event
	  Event.observe( elementUp, 'click', this.moveColElement.bindAsEventListener(this), false );
	  Event.observe( elementDown, 'click', this.moveColElement.bindAsEventListener(this), false );
	  Event.observe( elementIns, 'click', this.insertColElement.bindAsEventListener(this), false );
	  Event.observe( elementDel, 'click', this.deleteColElement.bindAsEventListener(this), false );
        }
  }
};
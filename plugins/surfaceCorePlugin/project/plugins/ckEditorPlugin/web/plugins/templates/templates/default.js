
  function getTemplate() {
       returnedResponse = '';
	    var ajx = new Ajax.Request('/../../../commonModulesPlugin/js/CkEditorTemplate.php',
		  {
		    method:'post',
			asynchronous: false,
		    onSuccess : function(transport){
			returnedResponse =transport.responseText;
  
		    }
		    });
	    
	    return returnedResponse;
  }	
	var template = JSON.parse( getTemplate() );
	var options = new Array();
		
	for(i=0; i< template.length; i++){
	    value = {
			title: template[i].title,
			image: 'template1.gif',
			description: template[i].description,
			html: template[i].html 
		    }
	    options[i]= value;
	}
CKEDITOR.addTemplates('default',{imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath('templates')+'templates/images/'),templates:  options });
  //CKEDITOR.addTemplates('default',{imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates')+'templates/images/'),templates:[{title:'Image and Title',image:'template1.gif',description:'One main image with a title and text that surround the image.',html:'<h3><img style="margin-right: 10px" height="100" width="100" align="left"/>Type the title here</h3><p>Type the text here</p>'},{title:'Strange Template',image:'template2.gif',description:'A template that defines two colums, each one with a title, and some text.',html:'<table cellspacing="0" cellpadding="0" style="width:100%" border="0"><tr><td style="width:50%"><h3>Title 1</h3></td><td></td><td style="width:50%"><h3>Title 2</h3></td></tr><tr><td>Text 1</td><td></td><td>Text 2</td></tr></table><p>More text goes here.</p>'},{title:'Text and Table',image:'template3.gif',description:'A title with some text and a table.',html:'<div style="width: 80%"><h3>Title goes here</h3><table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1"><caption style="border:solid 1px black"><strong>Table title</strong></caption></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table><p>Type the text here</p></div>'}]});

// CKEDITOR.addTemplates('default',{ imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),
//		    
//					templates:  [{title:"ok",image:"template1.gif",description:"ok",html:"ok"},
//					    {title:"ok",image:"template1.gif",description:"ok",html:"ok"}] 
//				    });
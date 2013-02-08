addFileAssocStackNew = function (stack_id, stack_name, tempFilename, orgFilename)  {
 
	if ((stack_id != '') && (orgFilename != '') && (tempFilename != '')) {
		content  = '<li class="freshInStack">';
		content += '<input type="checkbox" checked name="' + stack_name + '[]" value="' + tempFilename + '" />';
		content += '<span>' + orgFilename + '</span>';
		content += '</li>';
		
		$(stack_id).innerHTML += content;
	}
}

addFileAssocStack = function (stack_id, stack_name, item_id, orgFilename, filename)  {
 
	if ((stack_id != '') && (orgFilename != '')) {
		content  = '<li>';
		content += '<input type="checkbox" checked name="' + stack_name + '[' + item_id + ']" value="' + filename + '" />';
		content += '<span>' + orgFilename + '</span>';
		content += '</li>';
		
		$(stack_id).innerHTML += content;
	}
}

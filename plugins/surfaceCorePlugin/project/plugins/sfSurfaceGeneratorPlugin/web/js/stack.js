function addLiToStack(li, stack_id) {
	$(stack_id).innerHTML += "<li><input type=\'checkbox\' id=\'"+li.id+"\' checked=\'checked\'/>"+li.childNodes[0].nodeValue+"</li>";
}

function _addStackItem(className, stack_id, name, itemId, itemValue, bChecked) {
	if ((itemId != '') && (itemValue != '')) {
		content  = '<li class="' + className + '">';
		content += '<input type="checkbox" ' + (bChecked? ' checked' : '') + ' name="' + name + '[]" value="' + itemId + '" />';
		content += '<span>' + itemValue + '</span>';
		content += '</li>';
		
		$(stack_id).innerHTML += content;
	}
}

function addStackItem(stack_id, name, itemId, itemValue, bChecked) {
	_addStackItem("", stack_id, name, itemId, itemValue, bChecked);
}

function addStackItemNew(stack_id, name, itemId, itemValue, bChecked) {
	_addStackItem("freshInStack", stack_id, name, itemId, itemValue, bChecked);
}
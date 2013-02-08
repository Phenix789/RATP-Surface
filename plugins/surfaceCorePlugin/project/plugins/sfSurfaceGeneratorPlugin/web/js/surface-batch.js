function surfaceBatchCheckAll(fields) {
	if (!Object.isElement(fields)) {
		for (var i = 0; i < fields.length; i++)
			fields[i].checked = true ;
	}
	else
		fields.checked = true ;
}

function surfaceBatchUncheckAll(fields) {
	if (!Object.isElement(fields)) {
		for (var i = 0; i < fields.length; i++)
			fields[i].checked = false ;
	}
	else
		fields.checked = false ;
}

function surfaceBatchCheckToggleAll(fields, checked) {
	fields = $$('input.' + fields+'[type="checkbox"]');
    
	if (!Object.isElement(fields)) {
		for (var i = 0; i < fields.length; i++) {
			fields[i].checked = checked;
		}
	}
	else
		fields.checked = checked;
}

function surfaceBatchGetParams(fields) {
	var params = '';
  
	fields = $$('input.' + fields+'[type="checkbox"]');
	for (var i = 0; i < fields.length; i++) {
		if (fields[i].checked) {
			params += '&' + fields[i].name + '=' + fields[i].value;
		}
	}
  
	return params;
}

function surfaceBatchConfirmAction(action_sel, action_confirm_msgs) {
	if (action_confirm_msgs[action_sel]) {
		return confirm(action_confirm_msgs[action_sel]);
	}
    
	return true;
}
<?php

use_helper('Form');

function surface_objects_collection_to_array($objects, $method_id = 'getId', $method_toString = '__toString'){
	$array = array();
	foreach((array)$objects as $object){
		$array[$object->$method_id()] = $object->$method_toString();
	}
	return $array;
}

function surface_select_year_tag($name, $begin = 2000, $selected = null, $options = array()){
	$dates = array();
	$begin = (intval($begin) > 0) ? intval($begin) : 2000;
	$year = intval(date('Y'));
	while($year >= $begin){
		$dates[$year.'-01-01'] = $year;
		$year--;
	}

	$selected = date('Y-m-d', strtotime($selected));

	return select_tag($name, options_for_select($dates, $selected), $options);
}

function surface_select_minutes_tag($name, $selected = null, $options = array()){
	$steps = array();

	$from_hour = get('from_hour', $options, 0, true);
	$from_minutes = get('from_minutes', $options, 0, true);
	$to_hour = get('to_hour', $options, $from_hour + 24, true);
	$to_minutes = get('to_minutes', $options, $from_minutes - 1, true);
	$step_minutes = get('step_minutes', $options, 60, true);

	$from = $from_hour * 60 + $from_minutes;
	$to = $to_hour * 60 + $to_minutes;

	$current = $from;

	while($current <= $to){
		$steps[$current] = sprintf('%02d:%02d', (floor($current / 60) % 24), $current % 60);
		$current += $step_minutes;
	}

	return select_tag($name, options_for_select($steps, $selected), $options);
}

function surface_select_tag($name, $option_tags = null, $options = array()){
	//_inject_classname($option_tags, 'type_select');
	return select_tag($name, $option_tags, $options);
}

function surface_select_country_tag($name, $selected = null, $options = array()){
	//_inject_classname($options, 'type_select');
	return select_tag($name, $selected, $options);
}

function surface_select_language_tag($name, $selected = null, $options = array()){
	//_inject_classname($options, 'type_select');
	return select_language_tag($name, $selected, $options);
}

function surface_input_tag($name, $value = null, $options = array()){
	_surface_inject_classname($options, 'input_text');
	return input_tag($name, $value, $options);
}

function surface_input_number_tag($name, $value, $options = array()){
	$value = SfcUtils::numberFormat($value);
	$options = _parse_attributes($options);
	_inject_class($options, 'input_number');
	return input_tag($name, $value, $options).' '.get('unit', $options, null, true);
}

function surface_input_minutes_tag($name, $value, $options = array()){
	$options = _parse_attributes($options);
	_inject_class($options, 'input_minutes');
	return surface_select_minutes_tag($name, $value, $options);
}

function surface_input_hidden_tag($name, $value = null, $options = array()){
	// _inject_classname($options, 'input_text');
	return input_hidden_tag($name, $value, $options);
}

function surface_input_file_tag($name, $options = array()){
	_surface_inject_classname($options, 'input_file');
	return input_file_tag($name, $options);
}

function surface_input_password_tag($name = 'password', $value = null, $options = array()){
	_surface_inject_classname($options, 'input_pwd');
	return input_password_tag($name, $value, $options);
}

function surface_textarea_tag($name, $content = null, $options = array()){
	return textarea_tag($name, $content, $options);
}

function surface_checkbox_tag($name, $value = '1', $checked = false, $options = array()){
	_surface_inject_classname($options, 'input_check');
	return checkbox_tag($name, $value, $checked, $options);
}

function surface_radiobutton_tag($name, $value, $checked = false, $options = array()){
	_surface_inject_classname($options, 'input_radio');
	return radiobutton_tag($name, $value, $checked, $options);
}

function surface_radiobutton_group_with_label_tag($name, $values, $checked = null, $options = array()){
	$html = '';
	foreach((array)$values as $value=>$label){
		$is_checked = false;
		if(isset($checked)){
			$is_checked = ($value === $checked);
		}
		$radio = surface_radiobutton_tag($name, (string)$value, $is_checked, $options);
		$radio .= surface_label_for(get_id_from_name($name.'_'.$value), $label);
		$html .= content_tag('li', $radio);
	}
	return content_tag('ul', $html);
}

function surface_input_date_range_tag($name, $value, $options = array()){
	$options = _parse_attributes($options);

	$before = _get_option($options, 'before', '');
	$middle = _get_option($options, 'middle', '');
	$after = _get_option($options, 'after', '');

	return content_tag('span', $before.
					surface_input_date_tag($name.'[from]', isset($value['from']) ? $value['from'] : null, $options).
					$middle.
					surface_input_date_tag($name.'[to]', isset($value['to']) ? $value['to'] : null, $options).
					$after, array('class'=>"date_range"));
}

function surface_input_date_tag($name, $value = null, $options = array()){
	$options = _parse_attributes($options);
	if(isset($options['withtime']) && $options['withtime'])
		_surface_inject_classname($options, 'input_datetime');
	else
		_surface_inject_classname($options, 'input_date');

	$options['rich'] = true;
	$options['calendar_button_img'] = '/sfSurfaceGeneratorPlugin/images/date.png';

	if(is_a($value, 'DateTime')){
		$value = $value->getTimestamp();
	} elseif(!is_int($value)){
		$value = strtotime($value);
	}
	if(!$value){
		return input_date_tag($name, null, $options);
	}

	return input_date_tag($name, $value, $options);
}

function surface_label_for($id, $label, $options = array()){
	return label_for($id, $label, $options);
}

function surface_submit_tag($value = 'Save changes', $options = array()){
	$options = _parse_attributes($options);

	$name = _get_option($options, 'name', $value);
	$classname = _get_option($options, 'button_class', "");
	$classname = (($classname) ? (' '.$classname) : $classname);
	$icon = ((_get_option($options, 'with_icon', false)) ? '<span class="button_ico">&nbsp;</span>' : '');

	// $html = tag('input', array('type' => 'hidden', 'name' => $name, 'value' => $name));
	$html = submit_tag(_get_option($options, 'submit_value', $name), array('type'=>'submit', 'class'=>'hidden', 'name'=>$name));

	$jsfunction = _get_option($options, 'pre_onclick', '')."surface.submitNearestForm(this);"._get_option($options, 'post_onclick', '');

	if(isset($options['no_label']) && $options['no_label']){
		$options['title'] = $name;
		$html .= "<span class='button".$classname."'>".$icon.link_to_function("&nbsp;", $jsfunction, $options)."</span>";
	}else{
		$html .= "<span class='button".$classname."'>".$icon.link_to_function($value, $jsfunction, $options)."</span>";
	}

	return $html;
}

function surface_button_tag($name, $internal_uri = '', $options = array()){
	if(isset($options['no_label']) && $options['no_label']){
		$options['title'] = $name;
		$html = "<span class='button'>".link_to("&nbsp;", $internal_uri, $options)."</span>";
	}else{
		$html = "<span class='button'>".link_to($name, $internal_uri, $options)."</span>";
	}

	return $html;
}

function input_autocomplete_list_tag($name, $values, $url, $tag_options = array(), $completion_options = array()){
	$html = "";

	$add_url = _get_option($completion_options, 'add_url', null);
	unset($completion_options['add_url']);

	$tag_options = _convert_options($tag_options);

	$completion_id = get_id_from_name($name).'_autocomplete';
	$completion_extra_text = true;

	$stack = get_id_from_name($name)."_stack";
	$addStackJs = isset($completion_options['addstack_pre']) ? $completion_options['addstack_pre'] : '';
	$addStackJs .= "addStackItemNew('".$stack."', '".$name."', selectedItem.id, (selectedItem.textContent || selectedItem.innerText), true);";
	$addStackJs .= isset($completion_options['addstack_post']) ? ' '.$completion_options['addstack_post'] : '';

	$completion_options = array_merge(array('after_update_element'=>"function (inputField, selectedItem) {".$addStackJs.";inputField.value = ''; }"), $completion_options
	);

	$html = _get_auto_complete_peer_tag($completion_id, '', '', $url, $tag_options, $completion_options, $completion_text, $completion_extra_text);

	$actions = "";
	if($add_url){
		$add_target = _get_option($completion_options, 'add_target', 'dialog');
		$addStackJs = isset($completion_options['addstack_pre']) ? $completion_options['addstack_pre'] : '';
		$addStackJs .= "addStackItemNew('".$stack."', '".$name."', json.key, json.__text, true);";
		$addStackJs .= isset($completion_options['addstack_post']) ? ' '.$completion_options['addstack_post'] : '';

		$actions .= javascript_tag("onSurfaceCompleteListAddNewSuccess = function(dlg, json) { if (json) { ".$addStackJs."; $('".$completion_text."').value = '';return true; } return false; }");

		$actions .= surface_link_to("<img alt='".__('create')."' title='".__('create')."' src='/sfSurfaceGeneratorPlugin/images/add.png'/>", $add_url, $add_target, true, array('script'=>true,
			'success'=>'onSurfaceCompleteListAddNewSuccess',
			'parameters'=>"{ text_fragment: $('{$completion_text}').value }"
				), array()
		);
	}

	$html .= tag("ul", array('id'=>$stack,
		'class'=>"autocompleteStack",
			));
	foreach((array)$values as $key=>$text){
		$html.= javascript_tag("addStackItem('".$stack."', '".$name."', '".escape_javascript($key)."', '".escape_javascript($text)."', true);");
	}

	return '<span class="autocomplete_peer_list">'.$html.$actions.'</span>';
}

function input_auto_complete_peer_tag($name, $defValueId, $defValueName, $url, $tag_options = array(), $completion_options = array()){
	$style = get('style', $tag_options, null, true);
	$add_url = _get_option($completion_options, 'add_url', null);
	
	$classname = "autocomplete_peer";
	$html = _get_auto_complete_peer_tag($name, $defValueId, $defValueName, $url, $tag_options, $completion_options, $autocomplete_text);

	$actions = link_to_function(image_tag(sfConfig::get('sf_surface_generator_images_dir')."/textfield.png", array('alt'=>'Effacer', 'title'=>'Effacer')),
			"$('".$autocomplete_text."').value =''; $('".get_id_from_name($name)."').value ='';".get('after_delete', $completion_options, '', true), array('class'=>'auto_complete_action'));
	$more_actions = '';
	
	if($add_url){
		$add_target = _get_option($completion_options, 'add_target', 'dialog');
		$actions .= javascript_tag("onSurfaceCompleteAddNewSuccess = function(dlg, json) { if (json) { $('".get_id_from_name($name)."').value = json.key; $('".$autocomplete_text."').value = json.__text; return true; } return false; }");
		
		$link_to_options = array('script'=>true,
			'success'=>'onSurfaceCompleteAddNewSuccess',
			'parameters'=>"{ text_fragment: $('".$autocomplete_text."').value }",
		);
		if(isset($tag_options['popup_height'])){
			$link_to_options['popup_height'] = $tag_options['popup_height'];
		}
		if(isset($tag_options['popup_width'])){
			$link_to_options['popup_width'] = $tag_options['popup_width'];
		}
		if(isset($tag_options['popup_title'])){
			$link_to_options['popup_title'] = $tag_options['popup_title'];
		}

		$more_actions .= surface_link_to("<img alt='".__('create')."' title='".__('create')."' src='/sfSurfaceGeneratorPlugin/images/add.png'/>", $add_url, $add_target, true, $link_to_options, array('class'=>'autocomplete_add_button'));
		$classname = "autocomplete_peer_add";
	}

	return '<span class="'.$classname.'" style="'.$style.'">'.$html.$actions.'</span>'.$more_actions;
}

function _get_auto_complete_peer_tag($name, $defValueId, $defValueName, $url, $tag_options, $completion_options, & $completion_text, & $extra_text_field = null){
	$completion_text_name = 'searchText['.get_id_from_name($name).']';
	$completion_text = get_id_from_name($completion_text_name);

	$html = input_hidden_tag($name, $defValueId);
	if($extra_text_field){
		$extra_text_field = get_id_from_name($name).'_extext';
		$html .= input_hidden_tag($extra_text_field, $defValueName);

		$extraJs = "$('".$extra_text_field."').value = (selectedItem.textContent || selectedItem.innerText);";
	}else{
		$extraJs = "";
	}

	$after_selection = _get_option($completion_options, 'after_selection', null);
	unset($completion_options['after_selection']);
	if($after_selection){
		$extraJs .= $after_selection;
	}

	$tag_options = array_merge(array('autocomplete'=>'off',
		'size'=>'60',
		'class'=>"auto_complete_input_field"
			), $tag_options);
	$completion_options = array_merge(array('use_style'=>'true',
		'frequency'=>'0.3',
		'after_update_element'=>"function (inputField, selectedItem) { $('".get_id_from_name($name)."').value = selectedItem.id;".$extraJs." }",
		//'callback'				=> 'bo_showSelects',
		'script'=>true,
			), $completion_options);

	$html .= input_auto_complete_tag($completion_text_name, $defValueName, $url, $tag_options, $completion_options);

	return $html;
}

function _surface_auto_complete_field($field_id, $url, $options = array()){
	$javascript = "new Ajax.Autocompleter(";

	$javascript .= "'".get_id_from_name($field_id)."', ";
	if(isset($options['update'])){
		$javascript .= "'".$options['update']."', ";
	}else{
		$javascript .= "'".get_id_from_name($field_id)."_auto_complete', ";
	}

	$javascript .= "'".url_for($url)."'";

	$js_options = array();
	if(isset($options['tokens'])){
		$js_options['tokens'] = _array_or_string_for_javascript($options['tokens']);
	}
	if(isset($options['with'])){
		$js_options['callback'] = "function(element, value) { return ".$options['with']."}";
	}else if(isset($options['callback'])){
		$js_options['callback'] = $options['callback'];
	}

	if(isset($options['indicator'])){
		$js_options['indicator'] = "'".$options['indicator']."'";
	}
	if(isset($options['on_show'])){
		$js_options['onShow'] = $options['on_show'];
	}
	if(isset($options['on_hide'])){
		$js_options['onHide'] = $options['on_hide'];
	}
	if(isset($options['min_chars'])){
		$js_options['minChars'] = $options['min_chars'];
	}
	if(isset($options['frequency'])){
		$js_options['frequency'] = $options['frequency'];
	}
	if(isset($options['update_element'])){
		$js_options['updateElement'] = $options['update_element'];
	}
	if(isset($options['after_update_element'])){
		$js_options['afterUpdateElement'] = $options['after_update_element'];
	}
	if(isset($options['param_name'])){
		$js_options['paramName'] = "'".$options['param_name']."'";
	}

	$javascript .= ', '._options_for_javascript($js_options).');';

	return javascript_tag($javascript);
}

function surface_input_auto_complete_tag($name, $value, $url, $tag_options = array(), $completion_options = array()){
	_surface_inject_classname($tag_options, 'input_text  auto_complete_input_field');

	$context = sfContext::getInstance();

	$tag_options = _convert_options($tag_options);

	$response = $context->getResponse();

	$comp_options = _convert_options($completion_options);

	$tag_options['id'] = get_id_from_name(isset($tag_options['id']) ? $tag_options['id'] : $name);

	$html = input_tag($name, $value, $tag_options);
	$html .= content_tag('div', '', array('id'=>$tag_options['id'].'_auto_complete', 'class'=>'auto_complete'));
	$html .= _surface_auto_complete_field($tag_options['id'], $url, $comp_options);

	return $html;
}

function surface_input_auto_complete_peer_tag($name, $value_id, $value_text, $url, $tag_options = array(), $completion_options = array()){
	$html = "";

	$html .= input_hidden_tag($name, $value_id);

	$text_name = _get_option($tag_options, "control_text_name", "autocomplete_".$name);

	$tag_options = array_merge(array('autocomplete'=>'off',
		'size'=>'60',
		'class'=>"auto_complete_input_field",
			), $tag_options);

	$callback = "function(element, entry) {";
	$callback .= "$('".get_id_from_name($name)."').value = ''; return entry;";
	$callback .= "}";

	$after_update_element = "function(element, selected_element) {";
	$after_update_element .= "$('".get_id_from_name($name)."').value = selected_element.id;";
	$on_item_change = _get_option($completion_options, "on_item_change", null);
	if($on_item_change){
		$after_update_element .= $on_item_change;
	}
	$after_update_element .= "}";

	$completion_options = array_merge(array('after_update_element'=>$after_update_element,
		'callback'=>$callback,
		'script'=>true,
		'param_name'=>"searchText"
			), $completion_options);

	$html .= surface_input_auto_complete_tag($text_name, $value_text, $url, $tag_options, $completion_options);

	return $html;
}

function _surface_inject_classname(&$options, $classname){
	if(isset($options['class']) && $options['class']){
		$options['class'] .= ' '.$classname;
	}else{
		$options['class'] = $classname;
	}
}

function surface_select_link_to($name, $option_tags = null, $options = array()){
	$html = "";

	$url = _get_option($options, 'url', null);
	$target = _get_option($options, 'target', null);
	$skipNavigate = _get_option($options, 'skip_navigation', false);
	$select_param_name = _get_option($options, 'param_name', get_id_from_name($name));

	if($url){
		if($skipNavigate){
			$url .= ( strrpos($url, "?") === false) ? '?skipNav=true' : '&skipNav=true';
		}
		$link_options = array('with'=>sprintf("'%s=' + $('%s').value", $select_param_name, get_id_from_name($name)),
		);
		$jsfunction = _surface_javascript_link_to($url, $target, $link_options);
		$options['onChange'] = $jsfunction;
	}

	$html .= surface_select_tag($name, $option_tags, $options);
	return $html;
}

function surface_tabbed_panes($tab_id, $panes, $options = array()){
	$content_tabs = "";
	$content_panes = "";

	$sf_user = sfContext::getInstance()->getUser();

	foreach($panes as $pane_id=>$pane){
		if(!isset($pane['credentials']) || ( $sf_user && $sf_user->hasCredential($pane['credentials']))){
			$pane_div_id = 'sf_gtabdiv_'.$tab_id.'_'.$pane_id;
			$label = _get_option($pane, 'label', "");

			$content_tabs .= content_tag('li', '<a href="#'.$pane_div_id.'">'.$label.'</a>');

			$pane_content = _get_option($pane, 'content', "");
			$pane_opt = array('id'=>$pane_div_id,
				'style'=>_get_option($pane, 'style', null));
			$content_panes .= content_tag('div', $pane_content, $pane_opt);
		}
	}

	$content_tabs = content_tag('ul', $content_tabs, array());

	$options['id'] = $tab_id;
	$options['class'] = "gtab";
	return content_tag('div', $content_tabs.$content_panes, $options).javascript_tag('gWidget_InitPane("'.$tab_id.'");', $options);
}

function surface_boolean_to_icon($bool){
	if($bool === true){
		return '<span class="sfc_bool_true">✔</span>';
	}
	if($bool === false){
		return '<span class="sfc_bool_false">✘</span>';
	}
	echo $bool;
}

function surface_boolean_to_text($bool){
	if($bool === true){
		return __('yes');
	}
	if($bool === false){
		return __('no');
	}
	echo $bool;
}

function ckeditor_tag($value, $options) {
    $options['id'] = get_id_from_name($options['control_name']);
    $options['class'] = "ckeditor";
    
    echo '<textarea id="'.$options['id'].'" name="'.$options['control_name'].'">'.$value.' </textarea>'.javascript_tag("
	if ( !window.".$options['id']." ) {
	 
	".$options['id']." = CKEDITOR.replace( '".$options['id']."',	
	{
		toolbar : [
		{ name: 'clipboard', items : [ 'Source', 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Preview', '-','Templates' ] },
		{ name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar' ] },
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','CreateDiv' ] },
		{ name: 'links', items : [ 'Link','Unlink' ] },
		{ name: 'tools', items : [ 'Maximize' ] }
		]
	});
		CKEDITOR.config.templates_files =
		[
		CKEDITOR.getUrl('/ckEditorPlugin/plugins/templates/templates/default.js' )
		//	CKEDITOR.getUrl('/commonModulesPlugin/js/CkEditorTemplate.php' )
		];
	
	}else{
	    CKEDITOR.remove(".$options['id'].");
	    ".$options['id']." = CKEDITOR.replace( '".$options['id']."',	
	    {
		    toolbar : [
		    { name: 'clipboard', items : [ 'Source', 'Cut','Copy','Paste','PasteText','PasteFromWord', 'Preview', '-','Templates' ] },
		    { name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar' ] },
		    { name: 'colors', items : [ 'TextColor','BGColor' ] },
		    { name: 'styles', items : [ 'Styles','Format' ] },
		    { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','CreateDiv' ] },
		    { name: 'links', items : [ 'Link','Unlink' ] },
		    { name: 'tools', items : [ 'Maximize' ] }
		    ]
	    });
	    
	CKEDITOR.config.templates_files =
		[
		CKEDITOR.getUrl('/ckEditorPlugin/plugins/templates/templates/default.js' )
		//	CKEDITOR.getUrl('/commonModulesPlugin/js/CkEditorTemplate.php' )
		];
	}
	
	    ", $options);
}

function surface_boolean_tag($name, $states = null, $default_value = null){
	if(!isset($states)){
		$states = array(1=>__('yes'), 0=>__('no'));
	}
	if ($default_value === true) $default_value = 1;
	if ($default_value === false) $default_value = 0;
	if ($default_value === '1') $default_value = 1;
	if ($default_value === '0') $default_value = 0;
	
	return surface_radiobutton_group_with_label_tag($name, $states, $default_value);
}
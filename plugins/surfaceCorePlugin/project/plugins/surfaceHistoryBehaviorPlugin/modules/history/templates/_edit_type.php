<?php
$config = _history_get_config($history->getObjectName());
$config_type = get('type', $config, array());
$active = get('active', $config_type, true);
if($active) {
	$list = get('list', $config_type, array());
	$add = get('add_list', $config_type, array());
	$types = array_merge($list, $add);
	$options = array();
	foreach($types as $type) {
		$options[$type] = __($type);
	}
	$options = options_for_select($options, $history->getType(), array('include_blank' => true));
	echo row_edit_tag('Type', 'history[type]', select_tag('history[type]', $options));
}

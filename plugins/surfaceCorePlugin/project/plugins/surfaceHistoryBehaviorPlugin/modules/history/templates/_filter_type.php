<?php

$config = sfConfig::get('app_history_default', array());
$config_type = get('type', $config, array());
$active = get('active', $config_type, true);
if ($active) {
	$list = get('list', $config_type, array());
	$add = get('add_list', $config_type, array());
	$types = array_merge($list, $add);
	$options = array();
	foreach ($types as $type) {
		$options[$type] = __($type);
	}
	$options = options_for_select($options, get('type', $filters), array('include_blank' => true));
	echo select_tag('filters[type]', $options);
}

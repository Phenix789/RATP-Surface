<?php use_helper('History') ?>
<?php
	$config = _history_get_config($history->getObjectName());
	$config_type = get('type', $config, array());
	$active = isset($config_type['active']) ? $config_type['active'] : true;
	if($active) {
		echo row_show_tag('Type', __($history->getType()));
	}
?>

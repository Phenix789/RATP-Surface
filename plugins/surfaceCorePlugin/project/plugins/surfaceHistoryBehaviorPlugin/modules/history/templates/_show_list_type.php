<?php use_helper('History') ?>
<?php
	$config = _history_get_config($history->getObjectName());
	$config_type = get('type', $config, array());
	$active = isset($config['active']) ? $config['active'] : true;
	if($active) {
		echo __($history->getType());
	}
	else {
		echo 'Type non activé';
	}
?>

<?php use_helper('History') ?>
<?php
	$config = _history_get_config($history->getObjectName());
	$contact_active = isset($config['contact']['active']) ? $config['contact']['active'] : true;
	$type_active = isset($config['type']['active']) ? $config['type']['active'] : true;
	$date_withtime = isset($config['date']['withtime']) ? $config['date']['withtime'] : false;
	$personal_action = isset($config['personal_action']) ? $config['personal_action'] : false;
	$format = $date_withtime ? 'g' : 'd';
	$personal_action_result = '';
	if($personal_action && is_callable('history_personal_action_tag')) {
		$personal_action_result = history_personal_action_tag($history);
	}
?>

<ul class="history_no_padding">
<li><?php echo format_date($history->getDateRef(null), $format) . ' ' . content_tag('div', $personal_action_result, array('class' => 'history_personal_action')) ?></li>
<?php if($type_active) : ?><li class="history_border"><?php echo __($history->getType(), array(), '../../../plugins/surfaceHistoryBehaviorPlugin/modules/history/i18n/messages') ?></li><?php endif ?>
<?php if($contact_active) : ?><li class="history_border"><?php echo history_list_contacts_tag($history) ?></li><?php endif ?>
</ul>

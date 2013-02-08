<?php use_helper('Comment') ?>
<?php
	$config = _sfc_comment_get_config($sfc_comment->getObjectName());
	$contact_active = isset($config['contact']['active']) ? $config['contact']['active'] : true;
	$type_active = isset($config['type']['active']) ? $config['type']['active'] : true;
	$date_withtime = isset($config['date']['withtime']) ? $config['date']['withtime'] : false;
	$personal_action = isset($config['personal_action']) ? $config['personal_action'] : false;
	$format = $date_withtime ? 'g' : 'd';
	$personal_action_result = '';
	if($personal_action && is_callable('sfc_comment_personal_action_tag')) {
		$personal_action_result = sfc_comment_personal_action_tag($sfc_comment);
	}
?>
<ul class="sfc_comment_no_padding">
<li><?php echo $sfc_comment->getDateRef() ?></li>
</ul>

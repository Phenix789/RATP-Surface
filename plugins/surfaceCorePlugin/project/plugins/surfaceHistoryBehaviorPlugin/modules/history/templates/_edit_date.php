<?php use_helper('History') ?>
<?php
	$config = _history_get_config($history->getObjectName());
	$date = get('date', $config, array());
	$modify = isset($date['modify']) ? $date['modify'] : true;
	$time = isset($date['withtime']) ? $date['withtime'] : true;
?>
<?php if($modify) : ?>
	<?php echo surface_input_date_tag('history[date_ref]', $history->getDateRef(null), array('rich' => true, 'withtime' => $time, 'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png')) ?>
<?php else : ?>
	<?php echo $history->getDateRef('d/m/Y h:i') ?>
<?php endif ?>

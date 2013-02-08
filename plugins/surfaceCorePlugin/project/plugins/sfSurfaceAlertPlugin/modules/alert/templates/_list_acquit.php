<?php use_helper('Alert'); ?>
<?php if($alert->getIsActive()):?>
<?php /* echo link_to_acquit_alert_from_list($alert); */ ?>
<?php echo link_to_acquit_alert($alert,'tg_center',0); ?>
<?php endif ?>
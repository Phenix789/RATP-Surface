<?php use_helper('surface') ?>
<div id="target_change_password">
<h2>Changer de mot de passe</h2>
<?php
	if($sf_request->hasErrors('error')) {
		$notice = new Notice($sf_request->getError('error'));
		$notice->setType(NOTICE_ERROR);
		echo $notice;
	}
?>
<?php echo surface_form_to('sfGuardAuth/changePassword', 'target_change_password') ?>
	<?php echo surface_label_for(get_id_from_name('change_password[old]'), 'Ancien mot de passe :') ?>
	<?php echo surface_input_password_tag('change_password[old]') ?>

	<?php echo surface_label_for(get_id_from_name('change_password[new]'), 'Nouveau mot de passe :') ?>
	<?php echo surface_input_password_tag('change_password[new]') ?>

	<?php echo surface_label_for(get_id_from_name('change_password[confirm]'), 'Confirmation :') ?>
	<?php echo surface_input_password_tag('change_password[confirm]') ?>

	<?php echo content_tag('div', surface_submit_tag('Changer', array('class' => 'sf_admin_action_save')), array('style' => 'float: right; padding-top: 10px; padding-right: 10px;')) ?>
</form>
</div>
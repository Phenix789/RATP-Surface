<?php use_helper('surface') ?>
<?php echo surface_form_to('sfGuardAuth/sudo', 'notices', array('script' => true)) ?>
	<?php echo surface_input_password_tag() ?>
	<?php echo surface_submit_tag('OK', array('button_class' => 'simple')) ?>
</form>
<?php
use_helper('Validation', 'Javascript', 'Form', 'FormSurface', 'I18N');

echo form_tag('@sf_guard_signin');

if (sfConfig::get('app_analytic_active')){
	use_helper('Analytic');
	echo analytic_tag();
}
?>
<fieldset>
		<?php 
			$recent_browser = true;
			if (strpos($_SERVER['HTTP_USER_AGENT'], 'msie') !== false){
				if (intval(substr($_SERVER['HTTP_USER_AGENT'], strpos($_SERVER['HTTP_USER_AGENT'], 'msie')+5)) < 8){
					$recent_browser = false;
				}
			} 
		?>
			
		<?php if($recent_browser): ?>
				<div class="row" id="sf_guard_auth_username">
					<?php echo form_error('username') ?>
					<?php echo label_for('username', __("username :")) ?>
					<span class="input_wrapper">
						<?php echo input_tag('username', $sf_data->get('sf_params')->get('username'), array('autofocus'=>'true')) ?>
					</span>
				</div>
				<div class="row" id="sf_guard_auth_password">
					<?php echo form_error('password') ?>
					<?php echo label_for('password', __("password :")) ?>
					<span class="input_wrapper">
						<?php echo input_password_tag('password') ?>
					</span>
				</div>
				<div class="row" id="sf_guard_auth_remember" style="padding-left:208px">
					<?php echo checkbox_tag('remember')?>
					<?php echo label_for('remember', 'rester connecté', array('style' => 'float:none; display:inline; font-weight:normal;')) ?>
				</div>
	
				<?php echo input_hidden_tag("sfc_application", sfConfig::get('app_surface_default_app', 'dashboard')); ?>
				<div class="row" id="sf_guard_auth_submit">
					<input type="submit" id="login_submit_btn" value="S'identifier" name="commit">
				</div>
	
		  <?php else: ?>
			Votre navigateur ne semble pas possèder les caractéristiques techniques minimales. <br />
			Veuillez mettre à jour votre navigateur vers une version plus récente.
		  <?php endif ?>
</fieldset>
</form>

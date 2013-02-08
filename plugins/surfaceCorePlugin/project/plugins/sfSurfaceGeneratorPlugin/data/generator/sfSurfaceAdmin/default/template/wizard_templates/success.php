[?php sfLoader::loadHelpers($use_helpers, $module_name);
$options = array('script' => true);
if(isset($form_opt)){
	$options = array_merge($options, $form_opt);
}
echo surface_form_to($wizard->getCurrentStep()->getUrl(), $wizard->getTarget(), $options, array('class' => "general_form wizard_form"));
	echo include_partial("{$module_name}/wizard_show_navigation", getCurrentViewParameters());
	surface_include_component($module_name, 'flash_messages', array('action_name' => $wizard_id));
	?]
	<fieldset>
		<?php echo isset($wiz_step['header']) ? $wiz_step['header'] : '' ?>
		<?php if(isset($wiz_step['fields'])): ?>
			<?php foreach($wiz_step['fields'] as $name): ?>
				<div class="row">
					<?php if($this->getParameterValue("fields.{$name}.label", 'on') == 'on'): ?>
						[?php echo surface_label_for('<?php echo $this->getParameterValue("fields.{$name}.label_for", $this->getSingularName() . "[{$name}]") ?>', __('<?php echo addslashes($this->getParameterValue("fields.{$name}.name", $name)) ?>:')) ?]
						<?php $extra_class = ""; ?>
					<?php else : ?>
						<?php $extra_class = " nolabel"; ?>
					<?php endif ?>
					<div class="input_wrapper <?php echo $extra_class ?>">
						[?php if ($sf_request->hasError($singular_name.'{<?php echo $name ?>}')) : ?]
							<span class="system negative">[?php echo form_error($singular_name.'{<?php echo $name ?>}', array('class' => "", 'prefix' => "", 'suffix' => "")) ?]</span>
						[?php endif ?]
						[?php $value = get_partial("{$module_name}/<?php echo $name ?>", getCurrentViewParameters()); echo $value ? $value : '&nbsp;' ?]
					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</fieldset>
	[?php echo include_partial($module_name.'/wizard_show_footer', getCurrentViewParameters()) ?]
</form>
<br class="clear"/>
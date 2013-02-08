[?php
$callbacks = <?php echo $this->getFormCallbacks('edit'); ?>;
if(isset($dialog) && $dialog){
	$callbacks = array_merge($callbacks, array('complete' => 'if(json){SetCursorNormal();$(\'surface_loading\').hide();Dialog.okCallback(json);}'));
}
echo surface_form_to($module_name.'/edit', $target, $callbacks, array('multipart' => true, 'class' => 'general_form edit_form', 'name' => 'sf_admin_edit_form', 'id' => 'sf_admin_edit_form'));
	<?php foreach($this->getPrimaryKey() as $pk) : ?>
		echo object_input_hidden_tag($object, 'get<?php echo $pk->getPhpName() ?>');
	<?php endforeach; ?>
	surface_include_component($module_name, 'edit_fields', getCurrentViewParameters());
	surface_include_component($module_name, 'show_update_info', getCurrentViewParameters());
	include_partial('edit_actions', getCurrentViewParameters());
	?]
</form>
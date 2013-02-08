[?php
$callbacks = <?php echo $this->getFormCallbacks('create'); ?>;
if(!isset($dialog)){
	$dialog = false;
} elseif($dialog){
	$callbacks = array_merge($callbacks, array('complete' => 'if (json){SetCursorNormal();$(\'surface_loading\').hide();Dialog.okCallback(json); }'));
}
echo surface_form_to($module_name.'/create'.($dialog ? '?dialog=1' : ''), $target, $callbacks, array('multipart' => true, 'class' => 'general_form create_form', 'name' => 'sf_admin_create_form', 'id' => 'sf_admin_create_form'));
	<?php foreach($this->getPrimaryKey() as $pk) : ?>
		echo object_input_hidden_tag($object, 'get<?php echo $pk->getPhpName() ?>');
	<?php endforeach; ?>
	surface_include_component($module_name, 'create_fields', getCurrentViewParameters());
	include_partial('create_actions', getCurrentViewParameters());
	?]
</form>
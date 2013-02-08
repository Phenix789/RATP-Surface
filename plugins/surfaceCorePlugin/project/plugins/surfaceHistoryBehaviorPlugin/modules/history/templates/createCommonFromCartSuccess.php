<?php sfLoader::loadHelpers($use_helpers, $module_name) ?>
<?php if (!$title_skip): ?>
	<div class="title_wrapper">
		<?php echo menu_tag($context_menu) ?>
		<h2><?php echo $action_title ?></h2>
		<div class="clear"></div>
	</div>
<?php endif ?>
<?php if($success): ?>
	<?php surface_include_component($module_name, 'flash_messages', getCurrentViewParameters()) ?>
	<div class="action_wrapper">
		<span class="button"><?php echo surface_link_to('Fermer', 'default/blank', $target, true, array(), array('class' => 'sf_admin_action_delete_confirm')) ?></span>
	</div>
<?php else: ?>
	<?php
	include_partial("{$module_name}/create_header", getCurrentViewParameters());
	surface_include_component($module_name, 'flash_messages', getCurrentViewParameters());
	$callbacks = array(
		'script' => true,
		'component_class_update' => 'history',
	);
	?>
	<?php echo surface_form_to($module_name . '/createCommonFromCart', $target, $callbacks, array('multipart' => true, 'class' => 'general_form create_form', 'name' => 'sf_admin_create_form', 'id' => 'sf_admin_create_form')) ?>
		<?php
		echo object_input_hidden_tag($object, 'getId');
		surface_include_component($module_name, 'create_fields', getCurrentViewParameters());
		include_partial('create_actions', getCurrentViewParameters());
		?>
	</form>
	<?php include_partial("{$module_name}/create_footer", getCurrentViewParameters()) ?>
<?php endif ?>
<?php echo update_active_menu() ?>
<div class="clear"></div>
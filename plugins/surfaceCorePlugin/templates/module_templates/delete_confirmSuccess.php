<?php sfLoader::loadHelpers($use_helpers, $module_name) ?>
<?php if(!$title_skip): ?>
	<div class="title_wrapper">
		<?php echo menu_tag($context_menu) ?>
		<h2><?php echo $action_title ?></h2>
		<div class="clear"></div>
	</div>
<?php endif ?>
<?php
include_partial("{$module_name}/{$action_name}_header", getCurrentViewParameters());
surface_include_component($module_name, 'flash_messages', getCurrentViewParameters());
include_partial("{$module_name}/{$action_name}", getCurrentViewParameters());
include_partial("{$module_name}/{$action_name}_footer", getCurrentViewParameters());
echo update_active_menu();
?>
<div class="clear"></div>
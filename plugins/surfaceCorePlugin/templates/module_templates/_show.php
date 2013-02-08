<div class="general_form">
	<?php surface_include_component($module_name, 'show_fields', getCurrentViewParameters()) ?>
	<?php surface_include_component($module_name, 'show_update_info', getCurrentViewParameters()) ?>
	<?php include_partial('show_exports', getCurrentViewParameters()) ?>
	<?php include_partial('show_actions', getCurrentViewParameters()) ?>
</div>

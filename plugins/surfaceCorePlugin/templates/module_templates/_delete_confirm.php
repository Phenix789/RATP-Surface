<div class="general_form">
	<?php
	surface_include_component($module_name, 'delete_confirm_fields', getCurrentViewParameters());
	surface_include_component($module_name, 'show_update_info', getCurrentViewParameters());
	include_partial('delete_confirm_actions', getCurrentViewParameters());
	?>
</div>
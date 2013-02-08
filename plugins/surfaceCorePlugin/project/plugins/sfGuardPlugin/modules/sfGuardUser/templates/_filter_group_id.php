<?php
	echo object_select_tag(   isset($filters['group_id']) ? $filters['group_id'] : null, null, array (
					'include_blank' => true,
					'related_class' => 'sfGuardGroup',
					'text_method' => '__toString',
					'control_name' => 'filters[group_id]'
	))
?>
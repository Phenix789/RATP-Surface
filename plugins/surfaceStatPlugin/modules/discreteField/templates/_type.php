<?php
	include_component('statUtility', 'listType',
				array(	'id' => 'discrete_field_type',
					'name' => 'discrete_field[type]',
					'js' => "surface.link_to('statUtility/listSubType?type=' + $('discrete_field_type').value, 'sub_type');",
					'default' => $discrete_field
				)
		)
?>
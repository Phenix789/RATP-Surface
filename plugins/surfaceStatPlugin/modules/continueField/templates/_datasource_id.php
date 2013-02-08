<?php
	include_component('statUtility', 'listDatasource',
				array(	'id' => 'continue_field_datasource_id',
					'name' => 'continue_field[datasource_id]',
					'js' => "surface.link_to('statUtility/listFields?table_name=' + $('continue_field_datasource_id').value + '&component=listFields', 'list_fields')",
					'default' => $continue_field
				)
		)
?>
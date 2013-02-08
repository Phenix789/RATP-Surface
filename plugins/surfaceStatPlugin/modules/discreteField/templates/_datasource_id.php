<?php
	include_component('statUtility', 'listDatasource',
				array(	'id' => 'discrete_field_datasource_id',
					'name' => 'discrete_field[datasource_id]',
					'js' => "surface.link_to('statUtility/listFields?table_name=' + $('discrete_field_datasource_id').value + '&component=listCodeFields', 'code_field');surface.link_to('statUtility/listFields?table_name=' + $('discrete_field_datasource_id').value + '&component=listLabelFields', 'label_field')",
					'default' => $discrete_field
				)
		)
?>


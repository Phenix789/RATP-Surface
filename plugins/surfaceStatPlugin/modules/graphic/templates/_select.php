<div id="choose_graphic" class="general_form">
	<?php echo label_for($id_select, 'Sélectionner :', array('style'=>'width: 150px; max-width: 200px; line-height: inherit;')) ?>
	<?php
		$html = "";
		$html .= '<select id="' . $id_select . '" name="' . $name_select . '" onChange="' . $js . '">';
		$html .= '<option value=""> </option>';
		foreach($list as $key => $item) {
			$html .= '<option value="' . $key .'"';
			if($default == $item) {
				$html .= ' selected="selected"';
			}
			$html .= '>' . $item . '</option>';
		}
		$html .= '</select>';
	
		echo $html;
	?>
	
	<a onclick="surface.link_to('view/show?id=' + $('<?php echo $id_select; ?>').value, 'tg_east')" href="#"'>
		<img src="/sfSurfaceGeneratorPlugin/images/filter.png" title="Voir" alt="Voir"/>
	</a>
	
	<a onclick="surface.link_to('graphic/viewGraphic?view=' + $('<?php echo $id_select; ?>').value, 'control_and_graphic')" href="#"'>
		<img src="/sfSurfaceGeneratorPlugin/images/reset.png" title="Remise à zero" alt="Remise à zero"/>
	</a>
</div>
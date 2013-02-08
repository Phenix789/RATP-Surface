<?php
	$options = array();
	foreach($list as $item) {
		$options[$item] = $item;
	}
	$js = sprintf("$('%s').value += ' ' + this.value + ' ';", $id_input);
	$options = options_for_select($options, $default, array('include_blank' => true));
	$html = surface_select_tag($name_select, $options, array('id' => $id_select, 'onChange' => $js));
	$html .= surface_input_tag($name_input, $default, array('id' => $id_input));
	echo $html;
?>
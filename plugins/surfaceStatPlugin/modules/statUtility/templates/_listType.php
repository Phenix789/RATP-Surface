<?php
	$html = '';
	$html .= '<select id="' . $id . '" name="' . $name . '" onchange="' . $js . '">';
	foreach($list as $key => $item) {
		$html .= '<option value="' . $key . '"';
		if($default == $key) {
			$html .= ' selected="selected"';
		}
		$html .= '>' . $item . '</option>';
	}
	$html .= '</select>';

	echo $html;
?>
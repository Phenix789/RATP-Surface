<?php

	$html = "";
	$html .= '<select id="' . $id .'" name="' . $name . '" onChange="' . $js .'">';
	$html .= '<option value=""> </option>';
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
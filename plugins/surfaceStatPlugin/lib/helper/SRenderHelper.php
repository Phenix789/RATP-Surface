<?php
/**
 *
 *
 */

/**
 *
 */
function table_line_render($line, $options = array()) {
	if(is_array($line) && count($line)){
		if (isset($line[0]) && !is_array($line[0])) {
			return '<tr>' . line_render($line, $options) . '</tr>';
		} else {
			$html = "";
			$first = true;
			$header = $line['header'];
			unset($line['header']);
			foreach($line as $subline) {
				$html .= '<tr>';
				if($first) { $html .= '<th rowspan="' . count($line) . '">' . $header . '</th>'; $first = false; }
				$html .= line_render($subline, $options);
				$html .= '</tr>';
			}
			return $html;
		}
	}
	return '';
}

/**
 *
 */
function line_render($line, $options) {
	$html = "";
	if(isset($line['header'])) {
		$html .= '<th>' . $line['header'] . '</th>';
		unset($line['header']);
	}
	foreach($line as $cel) {
		$html .= '<td style="background:' . cel_get_style_css($cel, $options) . ';">' . $cel . '</td>';
	}
	return $html;
}

/**
 *
 */
function cel_get_style_css($value, $options) {
	$i = 1;
	$class = "";
	while(isset($options['bring-out-marge-' . $i]) && (int)$value >= $options['bring-out-marge-' . $i]) {
		$class = $options['bring-out-class-' . $i];
		$i++;
	}
	return str_replace('0x', '#', $class);
}

/**
 *
 * 
 */
function stat_select_view_name_space(View $view, $name = 'view[name_space]') {
	$namespaces = sfConfig::get('app_surface_stat_view_namespaces', array());
	if($namespaces) {
		$trad = array();
		foreach($namespaces as $namespace) {
			$trad[] = __($namespace);
		}
		$options = array_combine($namespaces, $trad);
		$options = options_for_select($options, $view->getNameSpace(), array('include_custom' => __('all apps')));
		$html = surface_select_tag($name, $options);
		return $html;
	}
	return surface_null_value(__('none namespace'));
}
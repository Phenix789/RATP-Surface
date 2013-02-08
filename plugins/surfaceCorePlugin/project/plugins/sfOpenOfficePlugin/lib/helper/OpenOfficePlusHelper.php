<?php
/**
 *
 *
 */

/**
 *
 */
function insert_image($link, $options = array()) {
	$content = '';
	$content .=
		'<draw:frame draw:name="' .
		get_oo_options('name', $options, 'Image' . rand(0, 1000)) .
		'" text:anchor-type="' .
		get_oo_options('anchor', $options, 'as-char') .
		'" svg:width="' .
		get_oo_options('width', $options, 16.5) . 'cm"' .
		' svg:height="' .
		get_oo_options('height', $options, 11) .
		'cm" draw:z-index="0"' .
		'>' .
		'<draw:image xlink:href="Pictures/' .
		$link .
		'" xlink:type="simple" xlink:show="embed" xlink:actuate="onLoad"/></draw:frame>';
	return $content;
}

/**
 *
 */
function get_oo_options($name, $options, $default) {
	if(isset($options[$name])) {
		return $options[$name];
	}
	return $default;
}

/**
 *
 */
function insert_table($view) {
	$table = "";
	$table .= '</text:p><table:table table:name="' . 'Tableau' . $view->getId() . rand(0, 1000) . '">';
	$table .= str_repeat('<table:table-column />', $view->getNumberColumn());
	$params = array(	'cel' => 0,
				'max_cel' => $view->getNumberColumn()-1,
				'line' => 0,
				'max_line' => $view->getNumberLine()-1,
				'total_line' => $view->hasTotalLine(),
				'total_col' => $view->hasTotalColumn(),
				'header_2' => $view->hasSecondHeader()
				);
	while($line = $view->getNextLine()) {
		$table .= table_oo_line_render($line, $params);
		$params['line']++;
		$params['cel'] = 0;
	}
	$table .= '</table:table><text:p>';
	return $table;
}

function table_oo_line_render($line, $params) {
	if(is_array($line) && !is_array($line[0])) {
		return '<table:table-row>' . line_oo_render($line, $params) . '</table:table-row>';
	}
	if(is_array($line) && is_array($line[0])) {
		$table = "";
		$first = true;
		$header = $line['header'];
		unset($line['header']);
		foreach($line as $subline) {
			$params['cel'] = 0;
			$table .= '<table:table-row>';
			if($first) { $table .= '<table:table-cell table:number-rows-spanned="' . count($line) . '" table:style-name="' . determineStyle($params) . '"><text:p>' . xmlspecialchars($header) . '</text:p></table:table-cell>'; $first = false; }
			$params['cel']++;
			$table .= line_oo_render($subline, $params);
			$table .= '</table:table-row>';
		}
		return $table;
	}
	return '';
}

function line_oo_render($line, $params) {
	$table = "";
	$table .= '<table:table-cell table:style-name="' . determineStyle($params) . '"><text:p>' . xmlspecialchars($line['header']) . '</text:p></table:table-cell>';
	unset($line['header']);
	$params['cel']++;
	foreach($line as $cel) {
		$table .= '<table:table-cell table:style-name="' . determineStyle($params) . '"><text:p>' . xmlspecialchars($cel) . '</text:p></table:table-cell>';
		$params['cel']++;
	}
	return $table;
}

function determineStyle($params) {
	if($params['total_line']) {
		if($params['line'] == $params['max_line']) {
			if($params['cel'] == 0) { return 'TableModele.TOTAL_ROW_HEADER'; }
			if($params['cel'] == 1 && $params['header_2']) { return 'TableModele.TOTAL_ROW_HEADER_2'; }
			return 'TableModele.TOTAL_ROW';
		}
	}
	if($params['total_col']) {
		if($params['cel'] == $params['max_cel']) {
			if($params['line'] == 0) { return 'TableModele.TOTAL_COL_HEADER'; }
			return 'TableModele.TOTAL_COL';
		}
	}
	if($params['line'] == 0) { return 'TableModele.HEADER_COL'; }
	if($params['cel'] == 0) { return 'TableModele.HEADER_ROW'; }
	if($params['header_2'] && $params['cel'] == 1) { return 'TableModele.HEADER_ROW_2'; }
	return 'TableModele.DEFAULT_CELL';
}
<?php

function get_document_partial($templateName, $vars = array()) {
	$context = sfContext::getInstance();
	// partial is in another module?
	if(false !== $sep = strpos($templateName, '/')) {
		$moduleName = substr($templateName, 0, $sep);
		$templateName = substr($templateName, $sep + 1);
	}
	else {
		$moduleName = $context->getActionStack()->getLastEntry()->getModuleName();
	}
	$actionName = '_' . $templateName;
	$view = new sfOpenOfficePartial();
	$view->initialize($context, $moduleName, $actionName, '');
	$retval = $view->render($vars);
	return $retval;
}

function include_document_partial($templateName, $vars = array()) {
	echo get_document_partial($templateName, $vars);
}

/**
 * Constructs an html tag.
 *
 * Options are :
 *  - bold
 *  - font_face
 *  - font_size
 *
 * @param  $text    string  text content
 * @param  $options array   text options
 * @return html string
 */
function output_document_text($text, $options = array()) {
	$output = $text;

	if(isset($options['bold']) && $options['bold']) {
		$output = content_tag("strong", $output, array());
	}
	if(isset($options['italic']) && $options['italic']) {
		$output = content_tag("i", $output, array());
	}
	$fontOptions = array();
	if(isset($options['font_face'])) {
		$fontOptions['FACE'] = $options['font_face'];
	}
	if(isset($options['font_size'])) {
		$fontOptions['SIZE'] = $options['font_size'];
	}
	if(!empty($fontOptions)) {
		$output = content_tag("FONT", $output, $fontOptions);
	}
	return $output;
}
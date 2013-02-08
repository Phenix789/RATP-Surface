<?php

function fileassoc_use_theme($theme = null) {
	use_javascript('/sfPropelFileAssocPlugin/js/propel_fileassoc.js');
}

function object_assoc_files_show($object, $category, $options = array(), $callback = null) {
	$content = "";
	if(isset($options['values'])) {
		$files = $options['values'];
		unset($options['values']);
	}
	else {
		$files = $object->getAssociatedFiles($category);
	}
	if($files) {
		foreach($files as $file) {
			$url = 'sfPropelFileAssoc/download?file_id=' . $file->getId();
			if($file->isImage()) {
				$content .= content_tag('li', link_to(content_tag('img', '', array('src' => url_for($url), 'alt' => $file->getOriginalFilename(), 'width' => 30)), $url, array('target' => '_blank')) . link_to($file->getOriginalFilename(), $url, array('target' => '_blank')));
			}
			else {
				$content .= content_tag('li', link_to($file->getOriginalFilename(), $url, array('target' => 'blank')));
			}
		}
		$content = content_tag('ul', $content);
	}
	else {
		$content = surface_null_value('Aucun document associé.');
	}

	return content_tag('div', $content, $options);
}

function object_assoc_files($object, $category, $options = array(), $callback = null) {

	$options = _parse_attributes($options);

	if(isset($options['values'])) {
		$files_associated = $options['values'];
		unset($options['values']);
	}
	else {
		$files_associated = array();		
		$files = $object->getAssociatedFiles($category);
		foreach($files as $file) {
			$files_associated[$file->getId()] = $file->getFilename();
		}
	}

	$content = '';
	if(isset($options['name'])) {
		$name = $options['name'];
		unset($options['name']);
	}
	else {
		unset($options['control_name']);
		$name = 'associated_' . _convert_method_to_name($category, $options);
	}

	$stack = get_id_from_name($name) . "_stack";

	$content .= '<iframe id="test" src="' . url_for('/sfPropelFileAssoc/fileUploader?stack_items_name=' . $name) . '" width="100%" height="50px" scrolling="no" frameborder=0 >';
	$content .= '</iframe>';
	$content .= tag("ul", array('id' => $stack,
		'class' => "autocompleteStack",
		));
	foreach($files_associated as $key => $filename) {
		$orgFilename = FileAssociatedPeer::getOriginalFilename($filename);
		$content .= javascript_tag("addFileAssocStack('" . $stack . "', '" . escape_javascript($name) . "', " . $key . ", '" . escape_javascript($orgFilename) . "', '" . escape_javascript($filename) . "');");
		
	}

	return content_tag('div', $content, $options);
}
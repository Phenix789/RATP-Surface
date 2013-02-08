<?php


function sfc_comment_tag(BaseObject $object, $action = true){
	$html = "";
	$html .= content_tag('div', _sfc_comment_list_tag($object), array('class'=>'sfc_comment_list', 'id'=>'sfc_comment_list'.getclass($object).'_'.$object->getId()));
	
	return content_tag('div', $html, array('class'=>'sfc_comment_tab', 'id'=>'sfc_comment_tab'));
}


function _sfc_comment_list_tag(BaseObject $object){
	return surface_get_component('surfaceComment','listComment', array('object'=> $object, 'criteria'=>$object->getCriteriaFromSfcCommentBehavior()));
}


function _sfc_comment_get_config($class){
	return SfcComment::getConfig($class);
}



?>

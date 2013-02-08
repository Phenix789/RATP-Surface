<?php
if(!isset($node)){
	$node = getCurrentViewParameter('node', $object->getFirstNodeOrCreate());
}
if($node){
	$criteria = new Criteria();
	$criteria->add(NodePeer::PARENT_ID, $node->getId());
	surface_include_component('node', 'list_for_object', array('criteria' => $criteria));
}
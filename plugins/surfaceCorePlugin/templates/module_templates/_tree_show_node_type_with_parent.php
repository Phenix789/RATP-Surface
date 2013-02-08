<?php
$node_type = $object->getNodeType();
if($node_type){
	if($node_type->getParent()){
		echo surface_link_to($node_type->getParent(), 'node_type/show?id='.$node_type->getParentId(), 'tg_east').' > ';
	}
	echo surface_link_to($node_type, 'node_type/show?id='.$node_type->getId(), 'tg_east');
} else {
	echo surface_null_value('Type inconnu');
}

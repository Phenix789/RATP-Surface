<?php
$node_type = $object->getNodeType();
if($node_type){
	if($node_type->getParent()){
		echo $node_type->getParent().sfConfig::get('app_tree_node_type_separator');
	}
	echo $node_type;
} else {
	echo surface_null_value('Type inconnu');
}

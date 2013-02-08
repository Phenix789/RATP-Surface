<?php
$node_type = $object->getNodeType();
if($node_type){
	echo $node_type;
} else {
	echo surface_null_value('Type inconnu');
}

<?php
$node_type = $object->getNodeType();
if($node_type){
	echo surface_link_to($node_type, 'node_type/show?id='.$node_type->getId(), 'tg_east');
} else {
	echo surface_null_value('Type inconnu');
}

<?php 

if ($node = $object->getFirstNodeOrCreate()) {
	if($node->getParent()){
		echo $node->getParent()->getLinkTo();
	} else {
		echo surface_null_value('Pas d\'emplacement défini');
	}
}
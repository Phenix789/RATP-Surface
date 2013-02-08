<ul>
<?php 
	$criteria = new Criteria();
	$criteria->addAscendingOrderByColumn(TransportTypePeer::TYPE);
	$types = TransportTypePeer::doSelect($criteria);
	foreach ($types as $type) {
		echo content_tag("li", surface_checkbox_with_label("filters[type_transport][]", $type->getId(), isset($filters["type_transport"]) ? in_array($type->getId(), $filters["type_transport"]) : 0, $type->getType(), array("for" => "filters_type_transport_" . $type->getId())));
	}
?>
</ul>
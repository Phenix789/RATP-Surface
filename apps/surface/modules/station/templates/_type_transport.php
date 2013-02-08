<?php
	$types = array();
	foreach ($station->getStationTypesJoinTransportType() as $type) {
		$types[] = $type->getTransportType()->getType();
	}
	echo implode(", ", $types);
?>
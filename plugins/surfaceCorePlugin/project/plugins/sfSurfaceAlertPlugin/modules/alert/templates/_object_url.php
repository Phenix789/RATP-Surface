<?php
	if($alert_object = $alert->getTargetObject()) {
		echo surface_link_to($alert_object->getMetadata('name') . ' : ' . substr((string) $alert_object, 0, 30), sprintf('%s/%s?id=%s', $alert_object->getMetadata('module'), $alert_object->getMetadata('show_action', 'show'), $alert_object->getPrimaryKey()), $alert_object->getMetadata('app') . '|' . $alert_object->getMetadata(array('target', 'show')));
	}
?>
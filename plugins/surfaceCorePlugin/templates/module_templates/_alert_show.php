<?php
use_helper('Alert');
echo link_to_add_alert($object, $object->getCreatedAt('U'), "{$module_name}/show");
surface_include_component('alert', 'objectAlerts', array('alert_object' => $object));

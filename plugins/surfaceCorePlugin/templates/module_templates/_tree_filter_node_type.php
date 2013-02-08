<?php

echo surface_select_tag('filters[node_type_id]', options_for_node_type_select(NodeTypePeer::doSelect(NodeTypePeer::getCriteriaForObjectName($class_name)), get('node_type_id', $filters), array('include_blank' => true)));

<?php 
$listModelClass=AlertPeer::doSelectDistinctModelClass();
echo surface_select_tag('filters[model_class]', objects_for_select($listModelClass,'getModelClass','getModelClass', isset($filters['model_class']) ? $filters['model_class'] : null, array('include_custom'=>'Tous')));

?>


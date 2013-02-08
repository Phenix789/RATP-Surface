<?php 
$collaborators=AlertPeer::doSelectDistinctCollaboratorsToBeAlerted();
echo surface_select_tag('filters[collaborator_id]', objects_for_select($collaborators,'getCollaboratorId','getCollaborator', isset($filters['collaborator_id']) ? $filters['collaborator_id'] : null, array('include_custom'=>'Tous')));

?>
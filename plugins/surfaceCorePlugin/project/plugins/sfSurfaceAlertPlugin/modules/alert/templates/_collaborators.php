<?php echo use_helper('Object'); ?>

<?php
echo surface_select_tag('collaboratorId',
        objects_for_select($collaborators, 'getId', '__toString',
                isset($collaboratorId) ? $collaboratorId : $currentCollaboratorId, array('include_custom' => 'Tout le monde')));
?>
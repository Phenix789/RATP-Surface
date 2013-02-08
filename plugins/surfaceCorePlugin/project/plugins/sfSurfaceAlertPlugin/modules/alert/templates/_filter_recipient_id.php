<?php 
$recipients=AlertPeer::doSelectDistinctRecipientId();
echo surface_select_tag('filters[recipient_id]', objects_for_select($recipients,
                        'getRecipientId','getRecipient', isset($filters['recipient_id']) ? $filters['recipient_id'] : null, array('include_custom'=>'Tous')));

?>
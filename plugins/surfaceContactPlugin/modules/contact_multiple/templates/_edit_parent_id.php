<?php
	$contact = ContactPeer::retrieveByPK($contact_multiple->getParentId());
	$value_id = null;
	$value_text = null;
	if($contact) {
		$value_id = $contact->getId();
		$value_text = (string) $contact;
	}
	echo input_auto_complete_peer_tag('contact_multiple[parent_id]', $value_id, $value_text, 'structure_ex/autocomplete');
?>
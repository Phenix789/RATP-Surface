<?php
	$contact = ContactPeer::retrieveByPK($contact_multiple->getContactId());
	$value_id = null;
	$value_text = null;
	if($contact) {
		$value_id = $contact->getId();
		$value_text = (string) $contact;
	}
	echo input_auto_complete_peer_tag('contact_multiple[contact_id]', $value_id, $value_text, 'person_ex/autocomplete');
?>
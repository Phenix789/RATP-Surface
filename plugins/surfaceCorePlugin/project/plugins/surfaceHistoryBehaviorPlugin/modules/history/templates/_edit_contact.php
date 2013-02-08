<?php
$config = _history_get_config($history->getObjectName());
$config_contact = get('contact', $config, array());
$active = isset($config_contact['active']) ? $config_contact['active'] : true;
$url = isset($config_contact['autocomplete_url']) ? $config_contact['autocomplete_url'] : null;
$options = isset($config_contact['add_url']) ? array('add_url' => $config_contact['add_url']) : array();
if($active) {
	$selected = array();
	$contacts = $history->getContacts();
	foreach($contacts as $contact) {
		$selected[$contact->getId()] = (string) $contact;
	}
	echo row_edit_tag('Interlocuteur(s)', 'history[contacts]', input_autocomplete_list_tag('history[contacts]', $selected, $url, array(), $options));
}

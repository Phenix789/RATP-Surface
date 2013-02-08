<?php

$config = _history_get_config($history->getObjectName());
$config_contact = get('contact', $config, array());
$active = isset($config_contact['active']) ? $config_contact['active'] : true;
if ($active) {
	$contacts = $history->getContacts();
	if ($contacts) {
		$html = "";
		$html .= tag('ul');
		foreach ($contacts as $contact) {
			$html .= content_tag('li', (string)$contact);
		}
		$html .= tag('/ul');
	} else {
		$html = surface_null_value('Aucun interlocuteur');
	}
	echo $html;
} else {
	echo surface_null_value('Interlocuteur non activé');
}

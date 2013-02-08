<?php use_helper('History') ?>
<?php
	$config = _history_get_config($history->getObjectName());
	$config_contact = get('contact', $config, array());
	$active = isset($config_contact['active']) ? $config_contact['active'] : true;
	if($active) {
		$contacts = $history->getContacts();
		$html = "";
		$html .= tag('ul');
		if($contacts) {
			$config = _history_get_config($history->getObjectName());
			$module = get(array('contact', 'module'), $config, 'contact');
			foreach($contacts as $contact) {
				$link = surface_link_to($contact, $module . '/show?id=' . $contact->getId(), 'tg_east');
				$html .= content_tag('li', $link);
			}
		}
		else {
			$html = content_tag('i', 'Aucun interlocuteur');
		}
		$html .= tag('/ul');
		echo row_show_tag('Interlocuteur(s)', $html);
	}
?>
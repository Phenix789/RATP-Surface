<?php
	$criteria = new Criteria();
	$criteria->add(MaillingListContactPeer::MAILLING_LIST_ID, $mailling_list->getId());
	surface_include_component('mailling_list_contact', 'list_for_mailling_list', array('criteria' => $criteria));
?>
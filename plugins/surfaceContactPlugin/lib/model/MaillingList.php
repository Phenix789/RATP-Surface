<?php
/**
 * 
 * 
 * 
 */
class MaillingList extends BaseMaillingList {

	public function count() {
		return count($this->getMaillingListContacts());
	}

	public function getCount() {
		return $this->count();
	}

	public function getContactIds() {
		$ids = array();
		foreach($this->getMaillingListContacts() as $mailling_list_contact) {
			$ids[] = $mailling_list_contact->getContactId();
		}
		return $ids;
	}

	public function getContacts() {
		$mailling_list_contacts = $this->getMaillingListContactsJoinContact();
		$contacts = array();
		foreach($mailling_list_contacts as $mailling_list_contact) {
			$contacts[] = $mailling_list_contact->getContact();
		}
		return $contacts;
	}

	public function getClassCSSForTR() {
		if($this->getArchive()) {
			return 'archive';
		}
	}

}

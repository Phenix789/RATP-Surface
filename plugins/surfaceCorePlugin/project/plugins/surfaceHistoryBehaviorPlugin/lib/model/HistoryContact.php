<?php
/**
 *
 * 
 */
class HistoryContact extends BaseHistoryContact {

	protected $contact;

	public function getContact() {
		if(!$this->contact) {
			$this->contact = HistoryContactPeer::doSelectContact($this->getContactId(), $this->getContactName());
		}
		return $this->contact;
	}

}

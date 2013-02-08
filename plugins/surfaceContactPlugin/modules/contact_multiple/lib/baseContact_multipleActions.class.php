<?php
/**
 *
 *
 *
 */
class baseContact_multipleActions extends autoContact_multipleActions {

	public function executeCreate() {
		parent::executeCreate();
		$this->contact_multiple->setContactId($this->getRequestParameter('contact_id'));
		$this->contact_multiple->setParentId($this->getRequestParameter('parent_id'));
		$this->setTemplate('add');
	}

	public function executeUnlinkFromContact() {
		$contact_id = $this->getRequestParameter('contact_id');
		$parent_id = $this->getRequestParameter('parent_id');
		$contact_multiple = ContactMultiplePeer::retrieveByPK($contact_id, $parent_id);
		$contact_multiple->delete();
		$this->redirect('person_ex/show?id=' . $contact_id);
	}

	public function executeUnlinkParent() {
		$contact_id = $this->getRequestParameter('contact_id');
		$parent_id = $this->getRequestParameter('parent_id');
		$contact_multiple = ContactMultiplePeer::retrieveByPK($contact_id, $parent_id);
		$contact_multiple->delete();
		$this->redirect('structure_ex/show?id=' . $contact_id);
	}

	public function updateContactMultipleFromRequest() {
		parent::updateContactMultipleFromRequest();
		$params = $this->getRequestParameter('contact_multiple');
		if(isset($params['contact_id']) && $params['contact_id']) {
			$this->contact_multiple->setContactId($params['contact_id']);
		}
		if(isset($params['parent_id']) && $params['parent_id']) {
			$this->contact_multiple->setParentId($params['parent_id']);
		}
	}

	public function executeAutocompleteRole() {
		$search = $this->getRequestParameter('contact_multiple');
		$search = $search['role'];
		$search = $this->prepareSearch($search);
		$criteria = new Criteria();
		$criteria->add(ContactMultiplePeer::ROLE, $this->search($search, true, true), CRITERIA::LIKE);
		$criteria->addAscendingOrderByColumn(ContactMultiplePeer::ROLE);
		$this->roles = ContactMultiplePeer::doSelectRole($criteria);
	}

}
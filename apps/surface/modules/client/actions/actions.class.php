<?php

/**
 * 
 * 
 * 
 */
class clientActions extends autoClientActions {
	
	public function executeAutocomplete() {
		$search = $this->getSearch("travel[client_id]");
		$criteria = new Criteria();
		$criterion = $criteria->getNewCriterion(ClientPeer::LASTNAME, $this->search($search), CRITERIA::LIKE);
		$criterion->addOr($criteria->getNewCriterion(ClientPeer::FIRSTNAME, $this->search($search), CRITERIA::LIKE));
		$criteria->add($criterion);
		$criteria->addAscendingOrderByColumn(ClientPeer::LASTNAME);
		$criteria->setLimit(10);
		$this->values = ClientPeer::doSelect($criteria);
		$this->search = $search;
	}
	
}

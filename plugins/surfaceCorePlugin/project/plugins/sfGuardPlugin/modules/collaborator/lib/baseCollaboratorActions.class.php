<?php
/**
 *
 * 
 */
class baseCollaboratorActions extends autoCollaboratorActions {

	public function executeAutocomplete() {
		$search = $this->getSearch();
		$criteria = new Criteria();
		$criteria->setIgnoreCase(true);
		$criterion = $criteria->getNewCriterion(CollaboratorPeer::FIRST_NAME, $this->search($search), CRITERIA::LIKE);
		$criterion->addOr($criteria->getNewCriterion(CollaboratorPeer::LAST_NAME, $this->search($search), CRITERIA::LIKE));
		$criteria->add($criterion);
		$this->search = $search;
		$this->collaborators = CollaboratorPeer::doSelect($criteria);
	}

}

<?php
/**
 *
 *
 *
 */
class baseServiceAction extends autoServiceActions {

/******************************************************************************/
		/**************/
		/*Autocomplete*/
		/**************/
/******************************************************************************/

	/**
	 * @brief Fonction d'autocomplete
	 * @return array Tableau des objets correspondants au texte
	 *
	 * Cette fonction retourne la liste des elements correspondant au texte
	 * prérentré
	 *
	 */
	public function executeAutocomplete() {
		$search = $this->getRequestParameter('searchText');
		if(is_array($search)) { $search = reset($search); }
		$search = $this->prepareSearch($search);
		$criteria = new Criteria();
		$criterion = $criteria->getNewCriterion(ServicePeer::LONG_NAME, $this->search($search), CRITERIA::LIKE);
		$criterion->addOr($criteria->getNewCriterion(ServicePeer::SHORT_NAME, $this->search($search), CRITERIA::LIKE));
		$criteria->add($criterion);
		$criteria->setIgnoreCase(true);
		$criteria->addAscendingOrderByColumn(ServicePeer::LONG_NAME);
		$services = ServicePeer::doSelect($criteria);
	}

}
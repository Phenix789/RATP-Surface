<?php
/**
 *
 *
 *
 */
class baseGroupActions extends autoGroupActions {

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
		$criteria->add(GroupPeer::NAME, $this->search($search), CRITERIA::LIKE);
		$criteria->setIgnoreCase(true);
		$criteria->addAscendingOrderByColumn(GroupPeer::NAME);
		$this->groups = GroupPeer::doSelect($criteria);
	}

}
<?php

class ##MODULE_NAME##Actions extends auto##MODULE_NAME##Actions {

	/**
	 * @brief fonction d'autocomplete
	 * @return array tableau des objets correspondants au critere de recherche
	 */
	public function executeAutocomplete() {
		$search = $this->getRequestParameter('searchText');
		return null;
	}

	/**
	 * @brief ajoute les valeurs des filtres au criteria
	 * @param Criteria $criteria Criteria pour la requete
	 */
	protected function addFiltersCriteria($criteria) {
		parent::addFiltersCriteria($criteria);
//		if(isset($this->filters[''])) {
//			$criteria->add();
//		}
	}

	/**
	 * @brief met a jour l'objet suivant les parametres renvoyés
	 */
	protected function update##MODULE_NAME##FromRequest() {
		parent::update##MODULE_NAME##FromRequest();
//		if(isset($param[''])) {
//
//		}
	}

}
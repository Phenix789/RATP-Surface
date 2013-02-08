<?php
/**
 * @brief actions du module
 * @class civilityActions
 * @package Plugin
 * @subpackage surfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 18 mars 2010
 * @version 1.0
 *
 * Regroupe toutes les actions du module ainsi que d'autres fonctions neccessaire a
 * leurs executions
 *
 */
class civilityActions extends autoCivilityActions {

/******************************************************************************/
		/*********/
		/*Actions*/
		/*********/
/******************************************************************************/

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
		$criteria = new Criteria();
		$criterion = $criteria->getNewCriterion(CivilityPeer::LONG_NAME, $search);
		$criterion->addOr($criteria->getNewCriterion(CivilityPeer::SHORT_NAME, $search));
		$criteria->add($criterion);
		$criteria->setIgnoreCase(true);
		$criteria->addAscendingOrderByColumn(CivilityPeer::LONG_NAME);
		$this->civilities = CivilityPeer::doSelect($criteria);
	}

/******************************************************************************/
		/********************/
		/*AddFiltersCriteria*/
		/********************/
/******************************************************************************/

	/**
	 * @brief Ajoute les valeurs des filtres au criteria
	 * @param Criteria $c Criteria a compléter
	 *
	 * Cette fonction ajoute les valeurs des filtres au criteria afin de
	 * construire une liste d'element
	 *
	 */
	protected function addFiltersCriteria($c) {
		parent::addFiltersCriteria($c);
	}

/******************************************************************************/
		/*******************/
		/*UpdateFromRequest*/
		/*******************/
/******************************************************************************/

	/**
	 * @brief Met a jour l'objet suivant les parametres de la requête
	 *
	 * Cette fonction recupere les parametres de la requete et met a jour
	 * l'objet correspondant
	 *
	 */
	protected function updateCivilityFromRequest() {
		parent::updateCivilityFromRequest();
	}

}

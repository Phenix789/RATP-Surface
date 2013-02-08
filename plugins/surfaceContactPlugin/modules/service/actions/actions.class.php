<?php
/**
 * @brief actions du module
 * @class serviceActions
 * @package Plugin
 * @subpackage surfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 mars 2010
 * @version 1.0
 *
 * Regroupe toutes les actions du module ainsi que d'autres fonctions neccessaire a
 * leurs executions
 *
 */
class serviceActions extends autoServiceActions {

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
		$criterion = $criteria->getNewCriterion(ServicePeer::LONG_NAME, $search);
		$criterion->addOr($criteria->getNewCriterion(ServicePeer::SHORT_NAME, $search));
		$criteria->add($criterion);
		$criteria->setIgnoreCase(true);
		$criteria->addAscendingOrderByColumn(ServicePeer::LONG_NAME);
		$services = ServicePeer::doSelect($criteria);
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
	protected function updateServiceFromRequest() {
		parent::updateServiceFromRequest();
	}

}

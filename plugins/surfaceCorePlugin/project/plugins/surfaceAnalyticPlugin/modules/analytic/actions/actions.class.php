<?php
/**
 * @brief actions du module
 * @class 
 * @package Plugin
 * @subpackage surfaceAnalytic
 *
 * @author Claude <claude@elogys.fr>
 * @date 22 janv. 2010
 * @version 1.0
 * @license LGPL
 *
 * Regroupe toutes les actions du module ainsi que d'autres fonctions neccessaire a
 * leurs executions
 *
 */
class analyticActions extends autoAnalyticActions {

/******************************************************************************/
		/*********/
		/*Actions*/
		/*********/
/******************************************************************************/

	/**
	 * @brief
	 * @fn
	 * @return
	 *
	 */
	public function executeDelete() {
		//impossible de delete un enregistrement par une action
	}

/******************************************************************************/
		/**************/
		/*Autocomplete*/
		/**************/
/******************************************************************************/

	/**
	 * @brief fonction d'autocomplete
	 * @fn public function executeAutocomplete()
	 * @return <array> tableau des objets correspondants au texte
	 *
	 * Cette fonction retourne la liste des elements correspondant au texte
	 * prérentré
	 *
	 */
/*
	public function executeAutocomplete() {
		$search = $this->getRequestParameter('searchText');
		return null;
	}
*/

/******************************************************************************/
		/********************/
		/*AddFiltersCriteria*/
		/********************/
/******************************************************************************/

	/**
	 * @brief ajoute les valeurs des filtres au criteria
	 * @fn protected function addFiltersCriteria($c)
	 * @param Criteria $c
	 *
	 * Cette fonction ajoute les valeurs des filtres au criteria afin de
	 * construire une liste d'element
	 *
	 */
	protected function addFiltersCriteria($c) {
		parent::addFiltersCriteria($c);
		if(isset($this->filters['connection']) && $this->filters['connection']) {
			$c->add(AnalyticPeer::CONNECTION, $this->filters['connection'], CRITERIA::IN);
		}
	}

/******************************************************************************/
		/*******************/
		/*UpdateFromRequest*/
		/*******************/
/******************************************************************************/

	/**
	 * @brief met a jour l'objet suivant les parametres renvoyés
	 * @fn protected function update@FromRequest()
	 *
	 * Cette fonction recupere les parametres de la requete et met a jour
	 * l'objet correspondant
	 *
	 */
/*
	protected function update@FromRequest() {
		parent::update_FromRequest();
		$param = $this->getRequestParameter('@');
		switch($this->getActionName()) {
		case 'create' :
		case 'edit' :
			if(isset($param[''])) {

			}
		}
	}
*/

}

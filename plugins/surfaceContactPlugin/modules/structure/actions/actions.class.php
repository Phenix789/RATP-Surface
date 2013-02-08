<?php
/**
 * @brief actions du module
 * @class structureActions
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
class structureActions extends autoStructureActions {

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
		$search = $this->getSearch();
		$criteria = new Criteria();
		$criterion = $criteria->getNewCriterion(StructurePeer::NAME, '%' . $search . '%', CRITERIA::LIKE);
		$criterion->addOr($criteria->getNewCriterion(StructurePeer::SHORT_NAME, '%' . $search . '%', CRITERIA::LIKE));
		$criteria->add($criterion);
		$criteria->setIgnoreCase(true);
		$criteria->addAscendingOrderByColumn(StructurePeer::NAME);
		$criteria->setLimit(15);
		$this->structures = StructurePeer::doSelect($criteria);
		$this->search = $search;
	}

/******************************************************************************/
		/********************/
		/*AddFiltersCriteria*/
		/********************/
/******************************************************************************/

	/**
	 * @brief Ajoute les valeurs des filtres au criteria
	 * @param Criteria $criteria Criteria a compléter
	 *
	 * Cette fonction ajoute les valeurs des filtres au criteria afin de
	 * construire une liste d'element
	 *
	 */
	protected function addFiltersCriteria($criteria) {
		parent::addFiltersCriteria($criteria);
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
	protected function updateStructureFromRequest() {
		parent::updateStructureFromRequest();
		$params = $this->getRequestParameter('structure');
		if(isset($params['group'])) {
			$cgroups = $this->structure->getContactGroups();
			/*Multiple*/
			if(is_array($params['group'])) {
				for($i = 0; $i < count($cgroups); $i++) {
					if(in_array($cgroups[$i]->getGroupId(), $params['group'])) {
						for($j = 0; $j < count($params['group']); $j++) {
							if($cgroups[$i]->getGroupId() == $params['group'][$j]) {
								$params['group'][$j] = null;
							}
						}
					}
					else {
						$cgroups[$i]->delete();
					}
				}
				foreach($params['group'] as $group) {
					if($group != null) {
						$cgroup = new ContactGroup();
						$cgroup->setGroupId($group);
						$this->structure->addContactGroup($cgroup);
					}
				}
			}
			/*Single*/
			else {
				if($cgroups) {
					$cgroup = $cgroups[0];
					$cgroup->setGroupId($params['group']);
				}
				else {
					$cgroup = new ContactGroup();
					$cgroup->setGroupId($params['group']);
					$this->structure->addContactGroup($cgroup);
				}
			}
		}
	}

}

<?php
/**
 * @brief actions du module
 * @class personActions
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
class personActions extends autoPersonActions {

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
		$criterion = $criteria->getNewCriterion(PersonPeer::FIRST_NAME, '%' . $search . '%', CRITERIA::LIKE);
		$criterion->addOr($criteria->getNewCriterion(PersonPeer::LAST_NAME, '%' . $search . '%', CRITERIA::LIKE));
		$criteria->add($criterion);
		$criteria->add(PersonPeer::TYPE, PersonPeer::CLASSKEY_PHYSICALPERSON1);
		$criteria->setIgnoreCase(true);
		$criteria->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);
		$criteria->setLimit(15);
		$this->persons = PersonPeer::doSelect($criteria);
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
	/*protected function addFiltersCriteria($c) {
		parent::addFiltersCriteria($c);
		
	}*/

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
	protected function updatePersonFromRequest() {
		parent::updatePersonFromRequest();
		$params = $this->getRequestParameter('person');
		/*GROUPE SIMPLE ET MULTIPLE*/
		if(isset($params['group'])) {
			$cgroups = $this->person->getContactGroups();
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
						$this->person->addContactGroup($cgroup);
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
					$this->person->addContactGroup($cgroup);
				}
			}
		}
		else {
			$cgroups = $this->person->getContactGroups();
			foreach($cgroups as $cgroup) {
				$cgroup->delete();
			}
		}
		/*PARENT SIMPLE ET MULTIPLE*/
		if($value = get('parent_id', $params)) {
			$this->person->setParentId($value);
		}
		if(isset($params['parents'])) {
			$old_parents = $this->person->getContactMultiplesRelatedByContactId();
			$new_parents = $params['parents'];
			foreach($old_parents as $old_parent) {
				$old_parent->delete();
			}
			foreach($new_parents as $new_parent) {
				$parent = new ContactMultiple();
				$parent->setContactRelatedByContactId($this->person);
				$parent->setParentId($new_parent);
			}
		}
	}

}

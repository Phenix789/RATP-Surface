<?php

class ##MODULE_NAME##Components extends auto##MODULE_NAME##Components {

	/**
	 * @brief Complete le criteria utilisé pour la search bar
	 * @param Criteria $criteria le criteria utilisé
	 * @param string $search le parametre de recherche
	 */
	protected function addSearchBarCriteria(Criteria $criteria, $search) {
		parent::addSearchBarCriteria($criteria, $search);
	}

	/**
	 * @brief Personnalise le trie de la liste
	 * @param Criteria $criteria le criteria utilisé
	 * @param mixed $column_name
	 * @param boolean $bAsc Ascendant ou Descendant
	 */
	protected function addCustomSortCriteria($criteria, $column_name, $bAsc) {
		
	}

}
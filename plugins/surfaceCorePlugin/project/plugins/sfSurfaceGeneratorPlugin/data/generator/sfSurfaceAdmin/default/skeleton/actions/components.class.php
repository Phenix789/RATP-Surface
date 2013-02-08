<?php
/**
 * @brief composants du module ##MODULE_NAME##
 * @class ##MODULE_NAME##Components
 * @package Application
 * @subpackage ##MODULE_NAME##
 *
 * @author Elogys <contact@elogys.fr>
 * @date ##DATE##
 * @version ##VERSION##
 *
 * Regroupe touts les composants du module ##MODULE_NAME## ainsi que d'autres
 * fonctions neccessaire a leurs executions
 *
 */
class ##MODULE_NAME##Components extends sfComponents {

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
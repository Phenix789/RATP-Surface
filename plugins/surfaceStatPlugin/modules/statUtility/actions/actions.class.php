<?php
/**
 * @brief
 * @class statUtilityActions
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 * Regroupe toutes les actions du plugin surfaceStatPlugin ainsi que
 * d'autres fonctions necessaires a leurs executions
 *
 */
class statUtilityActions extends sfSurfaceActions {

	/**
	 * @brief Actions en callback qui genere un composant avec la liste des champs d'une table
	 * @fn public function executeListFields()
	 * @return string $this->table_name nom de la table a attaqué
	 * @return string $this->component composant a generer
	 *
	 */
	public function executeListFields() {
		$table_id = $this->getRequestParameter('table_name', null);
		$table_id = DataSourcePeer::retrieveByPK($table_id);
		$table_id ? $this->table_name = $table_id->getTableRef() : $this->table_name = '';
		$this->component = $this->getRequestParameter('component', null);
	}

	/**
	 * @brief Actions en callback qui genere un composant avec la liste des sous types
	 * @fn public function executeListSubType()
	 * @return string $this->type type de l'objet
	 *
	 */
	public function executeListSubType() {
		$this->type = $this->getRequestParameter('type', 0);
	}

}
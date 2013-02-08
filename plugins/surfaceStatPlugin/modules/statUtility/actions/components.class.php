<?php
/**
 * @brief
 * @class statUtilityComponents
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 * Regroupe tout les composants generiques du plugin surfaceStatPlugin ainsi que
 * d'autres fonctions necessaires a leurs executions
 *
 */
class statUtilityComponents extends sfComponents {

	/**
	 * @brief Composant renvoyant la liste des tables de la base de données
	 * @fn public function executeListTables($con = null)
	 * @param Connection la connection a la base de données a attaquée
	 * @param DataSource $this->default Datasource par defaut (pour l'affichage par defaut)
	 * @return array $this->list la liste des tables de la base
	 * @return string $this->default nom de la table selectionnée par defaut
	 *
	 */
	public function executeListTables($con = null) {
		$this->list = DataSource::getTablesAndViews();
		$this->default ? $this->default = $this->default->getTableRef() : $this->default = '';

	}

	/**
	 * @brief Composant renvoyant la liste des sources de données
	 * @fn public function executeListDatasource()
	 * @param DataSource $this->default source de donnée par defaut (pour l'affichage)
	 * @return array $this->list liste des sources de données
	 * @return string $this->default nom de la table selectionnée
	 *
	 */
	public function executeListDatasource() {
		$res = DataSourcePeer::doSelect(new Criteria());
		$this->list = array();
		foreach($res as $val) {
			$this->list[$val->getId()] = $val->getTableRef();
		}

		if(isset($this->default)){
			$this->default = $this->default->getDatasourceId();
		} else {
			$this->default = null;
		}
	}

	/**
	 * @brief Composant renvoyant la liste des champs d'une table (Valeur Continue)
	 * @fn public function executeListFields($con = null)
	 * @param Connection $this->con connection a la base de données a attaquée
	 * @param ContinueField $this->default valeur continue par defaut (pour l'affichage)
	 * @return string $this->id_select identifiant du selecteur
	 * @return string $this->id_input identifiant du champs de saisie
	 * @return string $this->name_select nom du selecteur
	 * @return string $this->name_input nom du champs de saisie
	 * @return string $this->default valeur par defaut du champs de saisie
	 *
	 */
	public function executeListFields() {
		$this->listFields();
		$this->id_select = 'continue_field_select_field';
		$this->id_input = 'continue_field_field';
		$this->name_select = 'continue_field_select_field';
		$this->name_input = 'continue_field[field]';
		$this->default ? $this->default = trim($this->default->getField()) : $this->default = '';
	}

	/**
	 * @brief Composant renvoyant la liste des champs d'une table (Code Valeur Discrete)
	 * @fn public function executeListCodeFields($con = null)
	 * @param Connection $this->con connection a la base de données a attaquée
	 * @param DiscreteField $this->default valeur discrete par defaut (pour l'affichage)
	 * @return string $this->id_select identifiant du selecteur
	 * @return string $this->id_input identifiant du champs de saisie
	 * @return string $this->name_select nom du selecteur
	 * @return string $this->name_input nom du champs de saisie
	 * @return string $this->default valeur par defaut du champs de saisie (Code)
	 *
	 */
	public function executeListCodeFields() {
		if(!isset($this->con)) { $this->con = null; }
		$this->listFields($this->con);
		$this->id_select = 'discrete_field_select_code_field';
		$this->id_input = 'discrete_field_code_field';
		$this->name_select = 'discrete_field_select_code_field';
		$this->name_input = 'discrete_field[code_field]';
		$this->default ? $this->default = trim($this->default->getCodeField()) : $this->default = '';
	}

	/**
	 * @brief Composant renvoyant la liste des champs d'une table (Label Valeur Discrete)
	 * @fn public function executeListLabelFields($con = null)
	 * @param Connection $this->con connection a la base de données a attaquée
	 * @param DiscreteField $this->default valeur discrete par defaut (pour l'affichage)
	 * @return string $this->id_select identifiant du selecteur
	 * @return string $this->id_input identifiant du champs de saisie
	 * @return string $this->name_select nom du selecteur
	 * @return string $this->name_input nom du champs de saisie
	 * @return string $this->default valeur par defaut du champs de saisie (Label)
	 *
	 */
	public function executeListLabelFields() {
		if(!isset($this->con)) { $this->con = null; }
		$this->listFields($this->con);
		$this->id_select = 'discrete_field_select_label_field';
		$this->id_input = 'discrete_field_label_field';
		$this->name_select = 'discrete_field_select_label_field';
		$this->name_input = 'discrete_field[label_field]';
		$this->default ? $this->default = trim($this->default->getLabelField()) : $this->default = '';
	}

	/**
	 * @brief Composant renvoyant la liste des types de données
	 * @fn public function executeListType()
	 * @param DiscreteField $this->default champs par defaut
	 * @return array $this->list liste des types de données
	 * @return string $this->default type selectionné
	 * 
	 */
	public function executeListType() {
		$this->list = e_TYPE::getList();
		$this->default ? $this->default = $this->default->getType() : $this->default = '';
	}

	/**
	 * @brief Composant renvoyant la liste des operateurs
	 * @fn public function executeListOperator()
	 * @param ContinueField champs par defaut
	 * @return array $this->list liste des operateurs
	 * @return string $this->default operateur selectionné
	 *
	 */
	public function executeListOperator() {
		$this->list = e_OPERATOR::getList();
		$this->default ? $this->default = $this->default->getOperator() : $this->default = '';
	}

	/**
	 * @brief Composant renvoyant la liste des filtres d'un worksheet
	 * @fn public function executeListFilters()
	 * @param Worksheet $this->worksheet worksheet selectioné
	 * @return array $this->list liste des filtres
	 */
	public function executeListFilters() {
		$filters = $this->worksheet->getFilters();
		$this->list = array();
		
		$item = array();
		foreach($filters as $filter) {
			$item['name'] = $filter->getName();
			$item['url'] = 'discreteField/show?id='.$filter->getId();
			$this->list[] = $item;
		}
	}

	/**
	 * @brief Composant renvoyant la liste des valeurs d'un worksheet
	 * @fn public function executeListValues()
	 * @param Worksheet $this->worksheet worksheet selectioné
	 * @return array $this->list liste des valeurs du worksheet
	 * 
	 */
	public function executeListValues() {
		$values = $this->worksheet->getValues();
		$this->list = array();
		
		$item = array();
		foreach($values as $value) {
			$item['name'] = $value->getName();
			$item['url'] = 'continueField/show?id='.$value->getId();
			$this->list[] = $item;
		}
	}

	/**
	 * @brief Composant renvoyant la liste des types de graphiques
	 * @fn public function executeListTypeGraphic()
	 * @param View $this->default vue selectionée
	 * @return array $this->list liste des types de graphiques
	 * @return string $this->default type de la vue selectionnée
	 * 
	 */
	public function executeListTypeGraphic() {
		$this->list = e_TYPE_GRAPHIC::getList();
		$this->default = $this->default->getType();
	}

	/**
	 * @brief Composant renvoyant la liste des champs d'une table
	 * @fn protected function listFields($con = null)
	 * @param Connection $con connection a la base de données a attaquée
	 * @param DataSource $this->default table a lister
	 * @return array $this->list liste des champs de la table
	 *
	 */
	protected function listFields() {
		$this->list = array();
		$datasource = null;
		if($this->default) {
			$this->table_name = $this->default->getDatasourceName();
			$datasource = $this->default->getDatasource();
		}
		if($this->table_name) {
			$datasource = DataSourcePeer::doSelectOneWithTableRef($this->table_name);
		}
		if($datasource) {
			$this->list = $datasource->getListFields();
		}
	}

}
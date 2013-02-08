<?php
/**
 * @brief Worksheet
 * @class Worksheet
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class Worksheet extends BaseWorksheet {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $options;
	protected $db_adapter;

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	public function __construct() {
		$this->defaultOptions();
		$this->db_adapter = Propel::getConnection()->getConfiguration()->getParameter('datasources.propel.adapter');
	}

/******************************************************************************/
		/**********************/
		/** Getter && Setter **/
		/*Fonctions Racourcies*/
		/**********************/
/******************************************************************************/

	/**
	 * Retourne la listes des sources de données
	 * @return array listes des sources de données
	 */
	public function getDataSources() {
		$list = array();
		$list[$this->getFirstParamObject()->getDatasourceName()] = $this->getFirstParamObject()->getDatasourceName();
		if($this->getSecondParam()) {
			$list[$this->getSecondParamObject()->getDatasourceName()] = $this->getSecondParamObject()->getDatasourceName();
		}
		foreach($this->getValues() as $value) {
			$list[$value->getDatasourceName()] = $value->getDatasourceName();
		}
		foreach($this->getFilters() as $filter) {
			$list[$filter->getDatasourceName()] = $filter->getDatasourceName();
		}
		return $list;
	}

	/**
	 * Retourne le nom du premier parametre
	 * @return string nom du premier parametre
	 */
	public function getFirstParamName() {
		return $this->getDiscreteFieldRelatedByFirstParam()->getName();
	}

	/**
	 * Retourne le nom du second parametre
	 * @return string nom du second parametre
	 */
	public function getSecondParamName() {
		return $this->getDiscreteFieldRelatedBySecondParam() ? $this->getDiscreteFieldRelatedBySecondParam()->getName() : '';
	}

	/**
	 * Retourne l'objet du premier parametre
	 * @return DiscreteField la valeur discrete du premier parametre
	 */
	public function getFirstParamObject() {
		return $this->getDiscreteFieldRelatedByFirstParam();
	}

	/**
	 * Retourne l'objet du second parametre
	 * @return DiscreteField la valeur discrete du second parametre
	 */
	public function getSecondParamObject() {
		return $this->getDiscreteFieldRelatedBySecondParam();
	}

	public function getModel() {
		return 'Worksheet';
	}

	/**
	 * Fonction toString
	 * @return string chaine de caractere representatif de l'objet
	 */
	public function __toString() {
		return $this->getName();
	}

/******************************************************************************/
		/*************************/
		/*Fonctions Plugin Gaphic*/
		/*************************/
/******************************************************************************/

/* ATTRIBUTS ******************************************************************/

	protected $query;
	protected $select;
	protected $from;
	protected $where;
	protected $groupby;

	protected $statement;
	protected $result;

/* PUBLIC *********************************************************************/

	/**
	 * Attributs les valeurs selectionner par l'utilisateur aux filtres
	 * @param array la liste des valeurs des filtres
	 */
	public function setFiltersValues($values) {
		if($values) {
			$filters = $this->getFilters();
			foreach($filters as $filter) {
				isset($values['filter_' . $filter->getId()]) ? $filter->setFilterValue($values['filter_' . $filter->getId()]) : null;
			}
			$this->associateParamAndFilter($values);
		}
	}

	/**
	 * execute l'espace de travail dans sa configuration actuelle
	 */
	public function execute() {
		$this->prepareAttributes();
		$this->constructQuery();
		$this->executeQuery();
		$this->exploitResultset();
	}

	/**
	 * retourne l'objet resultat de l'espace de travail
	 * @return ResultGraphic l'objet resultat de l'espace de travail
	 */
	public function getResult() {
		if(!$this->result) { $this->execute(); }
		return $this->result;
	}

/* PROTECTED ******************************************************************/

		/*Preparation des Attributs*/

	/**
	 * Prepare les attributs pour l'execution de l'espace de travail
	 */
	protected function prepareAttributes() {
		$this->result = new Bag();
	}

	/**
	 * Associe aux parametres les valeurs de leur filtre correspondant
	 * @param array liste des valeurs des filtres
	 */
	protected function associateParamAndFilter($values) {
		foreach($this->getFilters() as $filter) {
			if($filter->getId() == $this->getFirstParam() && isset($values['filter_' . $filter->getId()])) {
				$this->getFirstParamObject()->setFilterValue($values['filter_' . $filter->getId()]);
			}
		}
		if($this->getSecondParam()) {
			foreach($this->getFilters() as $filter) {
				if($filter->getId() == $this->getSecondParam() && isset($values['filter_' . $filter->getId()])) {
					$this->getSecondParamObject()->setFilterValue($values['filter_' . $filter->getId()]);
				}
			}
		}
	}
	
		/*Construction de la requête*/

	/**
	 * Construit la requête
	 */
	protected function constructQuery() {
		$this->constructSelectQuery();
		$this->constructFromQuery();
		$this->constructWhereQuery();
		$this->constructGroupbyQuery();
		$this->assembleQuery();
	}

	/**
	 * Construit la partie "SELECT" de la requête
	 */
	protected function constructSelectQuery() {
		$this->select = array();
		$this->select['code_1'] = $this->getFirstParamObject()->getCodeFieldSql();
		$this->select['label_1'] = $this->getFirstParamObject()->getLabelFieldSql();
		if($this->getSecondParam()) {
			$this->select['code_2'] = $this->getSecondParamObject()->getCodeFieldSql();
			$this->select['label_2'] = $this->getSecondParamObject()->getLabelFieldSql();
		}
		foreach($this->getValues() as $value) {
			$this->select['value_' . $value->getId()] = $value->getFieldSql();
		}
	}

	/**
	 * Construit la partie "FROM" de la requête
	 */
	protected function constructFromQuery() {
		$this->from = $this->getDataSources();
	}

	/**
	 * Construit la partie "WHERE" de la requête
	 */
	protected function constructWhereQuery() {
		$this->where = array();
		foreach($this->getFilters() as $filter) {
			$where = $filter->getWhereQuery();
			if($where) { $this->where['filter_' . $filter->getId()] = $where; }
		}
	}

	/**
	 * Construit la partie "GROUP BY" de la requête
	 */
	protected function constructGroupbyQuery() {
		$this->groupby = array();
		$this->groupby[] = $this->getFirstParamObject()->getCodeFieldSql();
		if($this->getSecondParam()) {
			$this->groupby[] = $this->getSecondParamObject()->getCodeFieldSql();
		}
	}

	/**
	 * Assemble toute les parties de la requête
	 */
	protected function assembleQuery() {
		$this->query = "";
		$this->query .= "SELECT ";
		$first = true;
		foreach($this->select as $alias => $select) {
			$first ? $first = false : $this->query .= ", ";
			$this->query .= $select . ' AS ' . $alias;
		}
		$this->query .= " FROM ";
		$first = true;
		foreach($this->from as $from) {
			$first ? $first = false : $this->query .= ", ";
			$this->query .= $from;
		}
		$this->where ? $this->query .= " WHERE " : null;
		$first = true;
		foreach($this->where as $where) {
			$first ? $first = false : $this->query .= " AND ";
			$this->query .= $where;
		}
		$this->query .= " GROUP BY ";
		$first = true;
		foreach($this->groupby as $groupby) {
			$first ? $first = false : $this->query .= ", ";
			$this->query .= $groupby;
		}
	}

		/*Execution de la requête*/

	/**
	 * Execute la requête
	 */
	protected function executeQuery() {
		$connection = Propel::getConnection();
		if($this->db_adapter == 'mssql') {
			$statement = $connection->prepare('SET DATEFORMAT DMY');
			$statement->execute();
		}
		$this->statement = $connection->prepare($this->query);
		$this->statement->execute();
	}

		/*Exploitation des resultats de la requête*/

	/**
	 * Exploite le resulset, resultat de la requête
	 */
	protected function exploitResultset() {
		$distinct_1 = array();
		$distinct_2 = array();
		while($row = $this->statement->fetch()) {
			$path_1 = get('code_1', $row);
			$distinct_1[(string)$path_1] = get('label_1', $row);
			if($this->getSecondParam()) {
				$path_2 = get('code_2', $row);
				$distinct_2[(string)$path_2] = get('label_2', $row);
			}
			foreach($this->getValues() as $value) {
				$path_3 = 'value_' . $value->getId();
				$res = get($path_3, $row);
				isset($path_2) ? $this->result->add(array((string)$path_1, (string)$path_2, (string)$path_3), $res) :
					$this->result->add(array((string)$path_1, (string)$path_3), $res);
			}
		}
		$this->getFirstParamObject()->setDistinctAndKeyIfDistinctRequest($distinct_1);
		$this->getSecondParam() ? $this->getSecondParamObject()->setDistinctAndKeyIfDistinctRequest($distinct_2) : null;
	}

	/**
	 *
	 */
	public function getWhere() {
		return $this->where;
	}

/******************************************************************************/
		/*********/
		/*Options*/
		/*********/
/******************************************************************************/

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array();
		}
		return $this->options;
	}

}

sfPropelBehavior::add('Worksheet', array('sfPropelOptionsBehavior' => array('class' => 'Worksheet')));

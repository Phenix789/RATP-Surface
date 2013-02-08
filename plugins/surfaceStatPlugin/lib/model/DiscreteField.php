<?php
/**
 * @brief Valeur discrete
 * @class DiscreteField
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DiscreteField extends BaseDiscreteField {

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

	public function getDatasourceName() {
		return $this->getDataSource() ? $this->getDataSource()->getTableRef() : "";
	}

	public function getTypeName() {
		return e_TYPE::getName($this->getType());
	}

	public function getLabelField() {
		return parent::getLabelField() ? parent::getLabelField() : $this->getCodeField();
	}

	public function getCodeFieldSql() {
		return $this->getCodeField();
	}

	public function getLabelFieldSql() {
		return 'max(' . $this->getLabelField() . ')';
	}

	public function getModel() {
		return 'DiscreteField';
	}

	public function __toString() {
		return $this->getName();
	}

/******************************************************************************/
		/*************************/
		/*Fonctions Plugin Gaphic*/
		/*************************/
/******************************************************************************/

/* ATTRIBUTS ******************************************************************/

	protected $filter_value;
	protected $distinct;
	protected $control;
	protected $key;

/* PUBLIC *********************************************************************/

	public function setFilterValue($value) {
		$this->filter_value = $value;
	}

	public function getDistinct() {
		$query = "";
		$query .= 'SELECT DISTINCT ';
		$query .= $this->getCodeField() . ' AS code, ';
		$query .= $this->getLabelField() . ' AS label';
		$query .= ' FROM ' . $this->getDatasourceName();
		$resultset = $this->execute($query);
		$this->exploitResultset($resultset);
		return $this->distinct;
	}

	public function getControl() {
		return $this->getDistinct();
	}

	public function getKey() {
		return  null;
	}

	public function getComplementControl() {
		return null;
	}

	public function getWhereQuery() {
		if($this->filter_value) {
			return $this->getCodeField() . ' = ' . $this->filter_value;
		}
		return null;
	}

	public function setDistinctAndKeyIfDistinctRequest($array) {
		return null;
	}

/* PROTECTED ******************************************************************/
	
	protected function execute($query) {
		$con = Propel::getConnection(DiscreteFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		$stmt = $con->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	protected function exploitResultset($resultset) {
		$this->distinct = array();
		while($resultset->fetch()) {
			$this->distinct[(string)$resultset->getString('code')] = $resultset->getString('label');
		}
	}

/******************************************************************************/
		/*********/
		/*Options*/
		/*********/
/******************************************************************************/

	public function getOpt($name) {
		isset($this->options[$name]) ? $option = $this->options[$name]['default'] : $option = null;
		$this->hasOption($name) ? $option = $this->getOption($name) : null;
		if(isset($this->options[$name])) {
			$param = $this->options[$name];
			switch($param['type']) {
				case 'int' : return (int) $option;
				case 'string' : return (string) $option;
				case 'bool' : return !in_array($option, array('false', false, ''));
				case '0x' : return intval($option, 16);
			}
		}
		return $option;
	}

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array();
		}
		return $this->options;
	}

}

sfPropelBehavior::add('DiscreteField', array('sfPropelOptionsBehavior' => array('class' => 'DiscreteField')));

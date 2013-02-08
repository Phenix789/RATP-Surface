<?php
/**
 * @brief Valeur discrete (ID)
 * @class DiscreteFieldID
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DiscreteFieldID extends DiscreteField {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/



/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->setType(DiscreteFieldPeer::CLASSKEY_1);
	}

/******************************************************************************/
		/************************/
		/*Surcharge de fonctions*/
		/************************/
/******************************************************************************/

	public function setFilterValue($value) {
		if(!is_array($value)) {
			$value = array(0 => $value);
		}
		$this->filter_value = $value;
	}

	public function getWhereQuery() {
		if($this->filter_value && $object = $this->getOpt('session-object')) {
			$this->filter_value = sfContext::getInstance()->getUser()->getCart()->getAllItemsId($object);
		}
		if(is_array($this->filter_value) && !in_array('-1', $this->filter_value)) {
			$query = array();
			foreach($this->filter_value as $value) {
				if($value) {
					$query[] = "'" .  addslashes($value) . "'";
				}
			}
			$query = implode(', ', $query);
			if($query) {
				return $this->getCodeField() . ' IN (' . $query . ')';
			}
		}
		return null;
	}

	/**
	 * ajout du where un peu foireux
	 */
	public function getDistinct() {
		if(is_null($this->distinct)) {
			$query = "";
			$query .= 'SELECT DISTINCT ';
			$query .= $this->getCodeField() . ' AS code, ';
			$query .= $this->getLabelField() . ' AS label';
			$query .= ' FROM ' . $this->getDatasourceName();
			$has_where = false;
			if(is_array($this->filter_value) && !in_array('-1', $this->filter_value)) {
				$select = "";
				$first = true;
				foreach($this->filter_value as $value) {
					$first ? $first = false : $select .= ",";
					$select .= "'" . $value . "'";
				}
				$query .= ' WHERE ' . $this->getCodeField() . ' IN (' . $select . ')';
				$has_where = true;
			}
			$query .= ' ORDER BY ' . $this->getLabelField();
			$this->exploitResultset($this->execute($query));
		}
		return $this->distinct;
	}

	public function getKey() {
		if(is_null($this->key)) {
			$this->getDistinct();
		}
		return $this->key;
	}

	protected function exploitResultset($stmt) {
		$this->distinct = array();
		$this->key = array();
		while($row = $stmt->fetch()) {
			get('label', $row) ? $this->distinct[] = get('label', $row) : $this->distinct[] = get('code', $row);
			$this->key[] = (string)get('code', $row);
		}
	}

	public function getControl() {
		if(!$this->control) {
			$key = $this->getKey();
			$distinct = $this->getDistinct();
			$control = array();
			foreach($key as $k => $v) {
				$control[(string)'' . $v . ''] = $distinct[$k];
			}
			$this->control = $control;
		}
		return $this->control;
	}

	public function setDistinctAndKeyIfDistinctRequest($array) {
		uksort($array, 'DiscreteFieldID::compare');
		if($this->getOpt('distinct-request')) {
			$this->key = array();
			$this->distinct = array();
			foreach($array as $key => $distinct) {
				$this->key[] = $key;
				$this->distinct[] = $distinct;
			}
		}
	}

	public static function compare($a, $b) {
		if($a == $b) { return 0; }
		return ($a > $b) ? 1 : -1;
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array_merge(parent::defaultOptions(), array(
			'multiple' => array(		'code' => 'multiple',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Selection multiple',
							'list' => array('0' => 'Non', '1' => 'Oui')),
			'multiple-size' => array(	'code' => 'multiple-size',
							'type' => 'int',
							'default' => '10',
							'name' => 'Taille de la selection',
							'list' => array()),
			'distinct-request' => array(	'code' => 'distinct-request',
							'type' => 'bool',
							'default' => false,
							'name' => 'Critere de selection',
							'list' => array('0' => 'Non', '1' => 'Oui'))
				));
		}
		return $this->options;
	}

}

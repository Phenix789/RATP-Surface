<?php
/**
 * @brief Valeur discrete (texte)
 * @class DiscreteFieldTEXT
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DiscreteFieldTEXT extends DiscreteField {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $second_filter_value;

/******************************************************************************/
		/***************/
		/*Fonction Init*/
		/***************/
/******************************************************************************/

	public function __construct() {
		$this->setType(DiscreteFieldPeer::CLASSKEY_4);
	}

/******************************************************************************/
		/************************/
		/*Surcharge de fonctions*/
		/************************/
/******************************************************************************/

	public function setFilterValue($value) {
		parent::setFilterValue($value['value']);
		$this->second_filter_value = $value['mode'];
	}

	public function getWhereQuery() {
		if($this->filter_value) {
			$query = "";
			$c = '';
			if($this->second_filter_value == 'CONTAINS') $c = '%';
			$query .= $this->getCodeField() . ' LIKE ';
			$query .= "'" . $c . $this->filter_value . $c . "'";
			return $query;
		}
		return null;
	}

/******************************************************************************/
		/*********************/
		/*Nouvelles fonctions*/
		/*********************/
/******************************************************************************/

	public function getComplementControl() {
		$array = array('LIKE' => 'Egale', 'CONTAINS' => 'Contient');
		return $array;
	}

}

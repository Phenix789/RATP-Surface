<?php
/**
 * @brief Valeur discrete (Nombre)
 * @class DiscreteFieldNUMBER
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DiscreteFieldNUMBER extends DiscreteField {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $second_filter_value;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->setType(DiscreteFieldPeer::CLASSKEY_5);
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
			return $this->getCodeField() . ' ' . e_MATH_OPERATOR::getSymbol($this->second_filter_value) . ' ' . $this->filter_value;
		}
		return null;
	}

/******************************************************************************/
		/*********************/
		/*Nouvelles fonctions*/
		/*********************/
/******************************************************************************/

	public function getComplementControl() {
		return e_MATH_OPERATOR::getList();
	}

}

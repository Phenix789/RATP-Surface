<?php
/**
 * @brief Valeur continue
 * @class ContinueField
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class ContinueField extends BaseContinueField {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $options;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {

	}

/******************************************************************************/
		/**********************/
		/** Getter && Setter **/
		/*Fonctions Racourcies*/
		/**********************/
/******************************************************************************/

	public function getDatasourceName() {
		return $this->getDataSource() ? $this->getDataSource()->getTableRef() : '';
	}

	public function getOperatorName() {
		return e_OPERATOR::getName($this->getOperator());
	}

	public function getOperatorSql() {
		switch($this->getOperator()) {
			case e_OPERATOR::NOTHING : return '';
			case e_OPERATOR::SUM : return 'SUM';
			case e_OPERATOR::AVERAGE : return 'AVG';
			case e_OPERATOR::COUNT : return 'COUNT';
		}
	}

	public function getFieldSql() {
		return $this->getOperatorSql() . "(" . $this->getField() . ")";
	}

	public function getModel() {
		return 'ContinueField';
	}

	public function __toString() {
		return $this->getName();
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

sfPropelBehavior::add('ContinueField', array('sfPropelOptionsBehavior'));

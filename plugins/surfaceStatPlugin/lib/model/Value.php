<?php
/**
 * @brief Valeur
 * @class Value
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class Value extends BaseValue {

/******************************************************************************/
		/**********************/
		/** Getter && Setter **/
		/*Fonctions Racourcies*/
		/**********************/
/******************************************************************************/

	public function getDatasourceName() {
		return $this->getContinueField()->getDatasourceName();
	}

	public function getId() {
		return $this->getContinueField()->getId();
	}

	public function getName() {
		return $this->getContinueField()->getName();
	}

	public function getField() {
		return $this->getContinueField()->getField();
	}

	public function getFieldSql() {
		return $this->getContinueField()->getFieldSql();
	}

	public function getOperator() {
		return $this->getContinueField()->getOperator();
	}

	public function getOperatorSql() {
		return $this->getContinueField()->getOperatorSql();
	}

	public function __toString() {
		return (string) $this->getContinueField();
	}

}

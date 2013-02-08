<?php
/**
 * @brief Filtre
 * @class Filter
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class Filter extends BaseFilter {

/******************************************************************************/
		/**********************/
		/** Getter && Setter **/
		/*Fonctions Racourcies*/
		/**********************/
/******************************************************************************/

	public function getType() {
		return $this->getDiscreteField()->getType();
	}

	public function getDatasourceName() {
		return $this->getDiscreteField()->getDatasourceName();
	}

	public function getCodeField() {
		return $this->getDiscreteField()->getCodeField();
	}

	public function getLabelField() {
		return $this->getDiscreteField()->getLabelField();
	}

	public function getCodeFieldSql() {
		return $this->getDiscreteField()->getCodeFieldSql();
	}

	public function getLabelFieldSql() {
		return $this->getDiscreteField()->getLabelFieldSql();
	}

	public function getId() {
		return $this->getDiscreteField()->getId();
	}

	public function getName() {
		return $this->getDiscreteField()->getName();
	}

	public function getDistinct() {
		return $this->getDiscreteField()->getDistinct();
	}

	public function getControl() {
		return $this->getDiscreteField()->getControl();
	}

	public function getWhereQuery() {
		return $this->getDiscreteField()->getWhereQuery();
	}

	public function setFilterValue($value) {
		$this->getDiscreteField()->setFilterValue($value);
	}

	public function getComplementControl() {
		return $this->getDiscreteField()->getComplementControl();
	}

	public function getOpt($name) {
		return $this->getDiscreteField()->getOpt($name);
	}

	public function __toString() {
		return (string) $this->getDiscreteField();
	}

	public function getDiscreteField(PropelPDO $con = null){
		$discrete_field = parent::getDiscreteField($con);
		if(!$discrete_field){
			return new DiscreteField();
		}
		return $discrete_field;
	}

}

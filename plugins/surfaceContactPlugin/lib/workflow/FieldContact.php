<?php
/**
 * 
 * 
 * 
 */
class FieldContact extends FieldBasic {

	const UNIQUE = 1;
	const MULTIPLE = 2;

	public function typeToArray() {
		return array(
			FieldContact::UNIQUE => 'Choix unique',
			FieldContact::MULTIPLE => 'Choix multiple'
		);
	}
	
	public function getTypeLabel() {
		$types = $this->typeToArray();
		return get($this->getType(), $types);
	}

/******************************************************************************/
		/******/
		/*Data*/
		/******/
/******************************************************************************/

	protected $data_object;

	public function loadData($data) {
		if($data) {
			$this->data = explode('|', $data);
		}
		else {
			$this->data = array();
		}
	}

	public function saveData() {
		if(is_array($this->data)) {
			return implode('|', $this->data);
		}
		else {
			return $this->data;
		}
	}

	public function getContacts() {
		if(!$this->data_object && $this->data) {
			$this->data_object = $this->getHandler()->getContacts($this->data);
		}
		return $this->data_object;
	}
	
	public function getType() {
		return $this->getParam('type', FieldContact::UNIQUE);
	}
	
	public function isUnique() {
		return $this->getType() == FieldContact::UNIQUE;
	}
	
	public function isMultiple() {
		return $this->getType() == FieldContact::MULTIPLE;
	}

}
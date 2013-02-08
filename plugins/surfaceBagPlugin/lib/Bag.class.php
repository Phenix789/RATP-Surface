<?php
/**
 *
 *
 */
class Bag {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $collection;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->init();
	}

	public function init() {
		$this->collection = array();
	}

/******************************************************************************/
		/****************/
		/*Gestion du Sac*/
		/****************/
/******************************************************************************/

	public function set(array $path, $value) {
		return $this->action($this->collection, 'setElement', $path, $value);
	}

	public function get(array $path, $default = null) {
		$value = $this->action($this->collection, 'getElement', $path);
		if($value) { $default = $value; }
		return $default;
	}

	public function isInto($path, $value = null) {
		$in = $this->get($path);
		if($in) {
			if($value) return $in == $value;
			return true;
		}
		return false;
	}

	public function add($path, $value) {
		return $this->action($this->collection, 'addElement', $path, $value);
	}

	public function remove($path) {
		if($path) { $this->set($path, null); }
		else { $this->collection = array(); }
		return true;
	}

/******************************************************************************/
		/******************/
		/*Fonctions privée*/
		/******************/
/******************************************************************************/

	protected function setElement(& $collection, $value) {
		$collection = $value;
		return true;
	}

	protected function getElement(& $collection, $value = null) {
		return $collection;
	}

	protected function addElement(& $collection, $value) {
		if(is_array($collection)) { $collection[] = $value; return true; }
		if($collection) { $collection = array($collection, $value); return true; }
		if(!$collection) { $collection = $value; return true; }
		return false;
	}

	protected function action(& $collection, $method, & $path, & $value = null) {
		$key = each($path);
		$key = $key[1];
		if($key) {
			if(!is_array($collection)) {
				$collection = array();
			}
			return $this->action($collection[$key], $method, $path, $value);
		}
		else {
			return $this->$method($collection, $value);
		}
	}
	
}

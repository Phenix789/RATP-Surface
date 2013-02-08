<?php

class Geometry implements ArrayAccess{

	protected $geometry;
	protected $srid = 27572;

	public function __construct($geometry){
		$this->geometry = $geometry;
	}

	public function offsetExists($offset){
		if($offset == 0 || $offset == 1){
			return true;
		}
		return false;
	}

	public function offsetGet($offset){
		if($offset == 0){
			return $this->geometry;
		}
		if($offset == 1){
			return $this->srid;
		}
	}

	public function offsetSet($offset, $value){
		if($offset == 0){
			$this->geometry = $value;
		}
		if($offset == 1){
			$this->srid = $value;
		}
	}

	public function offsetUnset($offset){
		if($offset == 0){
			$this->geometry = null;
		}
		if($offset == 1){
			$this->srid = null;
		}
	}

	public function __toString(){
		return (string)$this->geometry;
	}

}
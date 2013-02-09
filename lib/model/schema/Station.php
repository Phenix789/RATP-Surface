<?php

/**
 * Subclass for representing a row from the 'ratp_station' table.
 *
 * 
 *
 * @package lib.model.schema
 */
class Station extends BaseStation {
	
	public function __toString() {
		return "[" . $this->getCode() . "] " . $this->getName();
	}
	
}

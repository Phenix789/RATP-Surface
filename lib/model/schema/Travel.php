<?php

/**
 * Subclass for representing a row from the 'ratp_travel' table.
 *
 * 
 *
 * @package lib.model.schema
 */
class Travel extends BaseTravel {
	
	public function getStationIn(PropelPDO $con = null) {
		return $this->getStationRelatedByStationInId($con);
	}
	
	public function getStationOut(PropelPDO $con = null) {
		return $this->getStationRelatedByStationOutId($con);
	}
	
	public function getDuration() {
		return $this->getDateOut(null) - $this->getDateIn(null);
	}
	
}

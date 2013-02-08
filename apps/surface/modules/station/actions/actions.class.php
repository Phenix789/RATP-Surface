<?php
/**
 * 
 * 
 * 
 */
class stationActions extends autoStationActions {	
	
	protected function addFiltersCriteria($criteria) {
		parent::addFiltersCriteria($criteria);
		if (isset($this->filters["type_transport"])) {
			$criteria->addJoin(StationPeer::ID, StationTypePeer::STATION_ID);
			$criteria->add(StationTypePeer::TYPE_ID, $this->filters["type_transport"], CRITERIA::IN);
		}
	}
	
}

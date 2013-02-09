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
	
	public function executeAutocompleteIn() {
		$this->autocomplete($this->search("travel[station_in_id]"));
		$this->setTemplate("autocomplete");
	}
	
	public function executeAutocompleteOut() {
		$this->autocomplete($this->search("travel[station_out_id]"));
		$this->setTemplate("autocomplete");
	}
	
	protected function autocomplete($search) {
		$criteria = new Criteria();
		if (is_numeric($search)) {
			$criteria->add(StationPeer::CODE, $search);
		}
		else {
			$criteria->add(StationPeer::NAME, $this->search($search, true, true), CRITERIA::LIKE);
		}
		$criteria->setLimit(10);
		$this->values = StationPeer::doSelect($criteria);
		$this->search = $search;
	}

}

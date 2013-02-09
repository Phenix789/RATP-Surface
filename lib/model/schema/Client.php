<?php

/**
 * Subclass for representing a row from the 'ratp_client' table.
 *
 * 
 *
 * @package lib.model.schema
 */
class Client extends BaseClient {

	public function getCompleteName() {
		return $this->getLastname() . " " . $this->getFirstname();
	}
	
}

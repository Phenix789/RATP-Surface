<?php
/**
 * @brief
 * @class
 * @package Plugin
 * @subpackage SurfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 mars 2010
 * @version 1.0
 *
 */
abstract class PhysicalPerson extends Contact {

	/**
	 * Constructs a new PhysicalPerson class, setting the type column to ContactPeer::CLASSKEY_0.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_0);
	}
	
	public function __toString()
	{
	    return $this->getLastName().' '.$this->getFirstName();
	}
	
	public function isPhysicalPerson() {
		return true;
	}

	public function isMoralPerson() {
		return false;
	}

}

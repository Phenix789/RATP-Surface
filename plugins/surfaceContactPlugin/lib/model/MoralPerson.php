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
abstract class MoralPerson extends Contact {

	/**
	 * Constructs a new MoralPerson class, setting the type column to ContactPeer::CLASSKEY_100.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_100);
	}

	public function isPhysicalPerson() {
		return false;
	}

	public function isMoralPerson() {
		return true;
	}

	public function __toString() {
		return $this->getName();
	}

}

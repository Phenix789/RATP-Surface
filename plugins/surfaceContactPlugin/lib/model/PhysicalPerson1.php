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
abstract class PhysicalPerson1 extends PhysicalPerson {

	/**
	 * Constructs a new PhysicalPerson1 class, setting the type column to ContactPeer::CLASSKEY_1.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_1);
	}

	public function getBaseClass() {
		return 'PhysicalPerson1';
	}

}

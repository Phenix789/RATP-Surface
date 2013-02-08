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
abstract class PhysicalPerson4 extends PhysicalPerson {

	/**
	 * Constructs a new PhysicalPerson4 class, setting the type column to ContactPeer::CLASSKEY_4.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_4);
	}

	public function getBaseClass() {
		return 'PhysicalPerson4';
	}

}

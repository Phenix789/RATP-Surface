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
abstract class MoralPerson1 extends MoralPerson {

	/**
	 * Constructs a new MoralPerson1 class, setting the type column to ContactPeer::CLASSKEY_101.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_101);
	}

	public function getBaseClass() {
		return 'MoralPerson1';
	}

}

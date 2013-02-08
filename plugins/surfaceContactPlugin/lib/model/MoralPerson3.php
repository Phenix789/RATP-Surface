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
abstract class MoralPerson3 extends MoralPerson {

	/**
	 * Constructs a new MoralPerson3 class, setting the type column to ContactPeer::CLASSKEY_103.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_103);
	}

	public function getBaseClass() {
		return 'MoralPerson3';
	}

}

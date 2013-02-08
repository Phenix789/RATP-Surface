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
abstract class MoralPerson4 extends MoralPerson {

	/**
	 * Constructs a new MoralPerson4 class, setting the type column to ContactPeer::CLASSKEY_104.
	 */
	public function __construct() {
		parent::__construct();
		$this->setType(ContactPeer::CLASSKEY_104);
	}

	public function getBaseClass() {
		return 'MoralPerson4';
	}

}

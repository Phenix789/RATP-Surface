<?php
/**
 * @brief Peer de la class Person
 * @class PersonPeer
 * @package Plugin
 * @subpackage surfacePlugin
 *
 * @author Elogys <contact@elogys.fr>
 * @author 
 * @date 17 Mar 2010
 * @version 1.0
 *
 */
class PersonPeer extends ContactPeer {

	const STRUCTURE_ID = self::PARENT_ID;
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
		$criteria = clone $criteria;
		$criteria->add(ContactPeer::TYPE, PersonPeer::CLASSKEY_PHYSICALPERSON1);
		return parent::doSelect($criteria, $con);
	}

	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null) {
		$criteria = clone $criteria;
		$criteria->add(ContactPeer::TYPE, PersonPeer::CLASSKEY_PHYSICALPERSON1);
		return parent::doCount($criteria, $distinct, $con);
	}

}

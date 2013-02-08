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
class CivilityPeer extends BaseCivilityPeer {

	public static function doSelectTypeCivility(Criteria $criteria, $type, $con = null) {
		$namespaces = self::getNamespaceCivilityType($type);
		if($namespaces) {
			$criteria = clone $criteria;
			$criteria->add(CivilityPeer::NAME_SPACE, $namespaces, CRITERIA::IN);
			return self::doSelect($criteria, $con);
		}
		return array();
	}

	public static function doSelectMoralCivility(Criteria $criteria, PropelPDO $con = null) {
		return self::doSelectTypeCivility($criteria, 'moral', $con);
	}

	public static function doSelectPhysicalCivility(Criteria $criteria, PropelPDO $con = null) {
		return self::doSelectTypeCivility($criteria, 'physical', $con);
	}

	public static function getNamespaceCivilityType($type) {
		$config = sfConfig::get('app_contact_civility');
		return get(array('type', $type), $config);
	}

	public static function retrieveByLongName($longname, $con = null) {
		$criteria = new Criteria();
		$criteria->add(self::LONG_NAME, $longname);
		return self::doSelectOne($criteria, $con);
	}

}

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
class ServicePeer extends BaseServicePeer {

	public static function doSelectTypeService(Criteria $criteria, $type, $con = null) {
		$namespaces = self::getNamespaceServiceType($type);
		if($namespaces) {
			$criteria = clone $criteria;
			$criteria->add(ServicePeer::NAME_SPACE, $namespaces, CRITERIA::IN);
			return self::doSelect($criteria, $con);
		}
		return array();
	}

	public static function doSelectMoralService(Criteria $criteria, PropelPDO $con = null) {
		return self::doSelectTypeService($criteria, 'moral', $con);
	}

	public static function doSelectPhysicalService(Criteria $criteria, PropelPDO $con = null) {
		return self::doSelectTypeService($criteria, 'physical', $con);
	}

	public static function getNamespaceServiceType($type) {
		$config = sfConfig::get('app_contact_service');
		if(isset($config['type'][$type])) {
			return $config['type'][$type];
		}
		return null;
	}

}

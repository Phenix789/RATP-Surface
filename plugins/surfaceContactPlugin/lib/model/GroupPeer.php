<?php
/**
 * @brief
 * @class
 * @package Plugin
 * @subpackage SurfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 18 mars 2010
 * @version 1.0
 *
 */
class GroupPeer extends BaseGroupPeer {

	public static function retrieveByCode($code, $con = null) {
		$criteria = new Criteria();
		$criteria->add(GroupPeer::CODE_NAME, $code);
		return GroupPeer::doSelectOne($criteria);

	}

	public static function retrieveIdByCode($code, $con = null) {
		if($group = GroupPeer::retrieveByCode($code, $con)) {
			return $group->getId();
		}
		return null;
	}

	public static function doSelectTypeGroup(Criteria $criteria, $type, $con = null) {
		$namespaces = self::getNamespaceGroupType($type);
		if($namespaces) {
			$criteria = clone $criteria;
			$criteria->add(GroupPeer::NAME_SPACE, $namespaces, CRITERIA::IN);
			return self::doSelect($criteria, $con);
		}
		return array();
	}

	public static function doSelectMoralGroup(Criteria $criteria, PropelPDO $con = null) {
		return self::doSelectTypeGroup($criteria, 'moral', $con);
	}

	public static function doSelectPhysicalGroup(Criteria $criteria, PropelPDO $con = null) {
		return self::doSelectTypeGroup($criteria, 'physical', $con);
	}

	public static function getNamespaceGroupType($type) {
		$config = sfConfig::get('app_contact_group');
		return get(array('type', $type), $config);
	}

}

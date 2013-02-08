<?php
/**
 * @brief
 * @class
 * @package Plugin
 * @subpackage SurfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 27 jui. 2010
 * @version 1.0
 *
 */
class ContactMultiplePeer extends BaseContactMultiplePeer {

	public static function doSelectRole(Criteria $criteria) {
		$criteria->addSelectColumn(ContactMultiplePeer::ROLE);
		$stmt = ContactMultiplePeer::doSelectStmt($criteria);
		$roles = array();
		while($row = $stmt->fetch()) {
			$roles[] = get(1, $row); //Should be a alphanumeric key, not an int: TOFIX
		}
		return $roles;
	}

}

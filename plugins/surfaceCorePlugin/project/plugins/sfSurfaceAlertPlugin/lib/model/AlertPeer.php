<?php

/**
 * Subclass for performing query and update operations on the 'alert' table.
 *
 * 
 *
 * @package lib.model
 */
class AlertPeer extends BaseAlertPeer {

	public static function doSelectDistinctModelClass() {
		$c = new Criteria();
		$c->setDistinct(AlertPeer::MODEL_CLASS);
		return self::doSelect($c);
	}

	public static function doSelectDistinctRecipientId() {
		$c = new Criteria();
		//$c->addJoin(CollaboratorPeer::ID, AlertPeer::RECIPIENT_ID); // WHAT ?
		//$c->setDistinct(AlertPeer::RECIPIENT_ID);
		return self::doSelect($c);
	}

	public static function doSelectModelId(Criteria $criteria, PropelPDO $con = null) {
		$criteria = clone $criteria;
		$criteria->clearSelectColumns()->clearOrderByColumns();
		$criteria->addSelectColumn(AlertPeer::MODEL_ID);
		$stmt = AlertPeer::doSelectStmt($criteria, $con);
		$ids = array();
		while ($row = $stmt->fetch()) {
			$ids[get(1, $row)] = 1; //FIXME ?
		}
		return array_keys($ids);
	}

}

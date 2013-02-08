<?php

/**
 * 
 * 
 * 
 */
class DashboardMessagePeer extends BaseDashboardMessagePeer {

	public static function getLastMessage() {
		$criteria = new Criteria();
		$criteria->addDescendingOrderByColumn(DashboardMessagePeer::CREATED_AT);
		return DashboardMessagePeer::doSelectOne($criteria);
	}

}

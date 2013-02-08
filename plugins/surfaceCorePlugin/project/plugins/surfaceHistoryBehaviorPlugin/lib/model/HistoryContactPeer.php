<?php
/**
 *
 * 
 */
class HistoryContactPeer extends BaseHistoryContactPeer {

	/**
	 *
	 *
	 */
	public static function doSelectContact($contact_id, $contact_name) {
		$peer = $contact_name . 'Peer';
		$field = constant($peer . '::ID');
		if($field) {
			$criteria = new Criteria();
			$criteria->add($field, $contact_id);
			return call_user_func(array($peer, 'doSelectOne'), $criteria);
		}
		return null;
	}

}

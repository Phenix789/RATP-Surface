<?php
/**
 *
 *
 */
class sfGuardUserProfilePeer extends BasesfGuardUserProfilePeer {

	public static function getProfile(sfGuardUser $user) {
		$all_config = sfConfig::get('app_sf_guard_plugin_profile', array());
		foreach($all_config as $config) {
			$peer = get('peer', $config, 'CollaboratorPeer');
			$constant = get('constant', $config, 'ID');
			$criteria = new Criteria();
			$criteria->add(sfGuardUserProfilePeer::USER_ID, $user->getId());
			$criteria->addJoin(constant('sfGuardUserProfilePeer::' . $constant), constant($peer . '::ID'), CRITERIA::INNER_JOIN);
			$profile = call_user_func($peer . '::doSelectOne', $criteria);
			//PHP 5.3
			//return $peer::doSelectOne($criteria);
			if($profile) {
				return $profile;
			}
		}
	}

	public static function getUser($collaborator) {
		$config = sfConfig::get('app_sf_guard_plugin_profile', array());
		$config = array_merge(get('default', $config, array()), get(getclass($collaborator, $config, array())));
		$criteria = new Criteria();
		$criteria->add(constant('sfGuardUserProfilePeer::' . get('constant', $config)), $collaborator->getId());
		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID, CRITERIA::INNER_JOIN);
		return sfGuardUserPeer::doSelectOne($criteria);
	}
}

<?php
/**
 * 
 * 
 */
class CollaboratorPeer extends BaseCollaboratorPeer {

	public static function doSelectExpediteur(Criteria $criteria) {
		$criteria->add(CollaboratorPeer::EXPEDITEUR, true);
		return CollaboratorPeer::doSelectOrderByName($criteria);
	}
	
	public static function doSelectOrderByName(Criteria $criteria) {
		$criteria->addAscendingOrderByColumn(CollaboratorPeer::LAST_NAME);
		$criteria->addAscendingOrderByColumn(CollaboratorPeer::FIRST_NAME);
		return self::doSelect($criteria);
	}

	public static function doSelectHavingCredentials($credentials) {
		$users_id = array();
		if(is_array($credentials)) {
			$c = new Criteria();
			$all_users = sfGuardUserPeer::doSelect($c);

			foreach($credentials as $credential) {
				foreach($all_users as $user) {
					if($user->hasPermissionInAll($credential)) {
						$users_id[] = $user->getId();
					}
				}
			}
		}

		$c = new Criteria();
		$c->addJoin(CollaboratorPeer::ID, sfGuardUserProfilePeer::COLLABORATOR_ID);
		$c->add(CollaboratorPeer::IS_ACTIVE, true, Criteria::EQUAL);
		$c->add(sfGuardUserProfilePeer::USER_ID, $users_id, Criteria::IN);
		$c->addAscendingOrderByColumn(CollaboratorPeer::FIRST_NAME);
		$collaborators = self::doSelect($c);
		return $collaborators;
	}

	public static function doSelectWithEmail() {
		$criteria = new Criteria();
		$criteria->add(CollaboratorPeer::IS_ACTIVE, true);
		$criteria->add(CollaboratorPeer::EMAIL, null, CRITERIA::ISNOTNULL);
		$criteria->add(CollaboratorPeer::EMAIL, '', CRITERIA::NOT_EQUAL);
		$criteria->addAscendingOrderByColumn(CollaboratorPeer::FIRST_NAME);
		return CollaboratorPeer::doSelect($criteria);
	}
}

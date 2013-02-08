<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardUserActions.class.php 3384 2007-02-01 09:05:19Z fabien $
 */
class BasesfGuardUserActions extends autosfGuardUserActions {

	public function executeCreate() {
		parent::executeCreate();
		if($collaborator_id = $this->getRequestParameter('collaborator_id')) {
			$profile = new sfGuardUserProfile();
			$profile->setCollaboratorId($collaborator_id);
			$this->sf_guard_user->addsfGuardUserProfile($profile);
		}
	}

	public function validateCreate() {
		if($this->getRequest()->getMethod() == sfRequest::POST && !$this->getRequestParameter('id')) {
			if($this->getRequestParameter('sf_guard_user[password]') == '') {
				$this->getRequest()->setError('sf_guard_user{password}', 'Password is mandatory');

				return false;
			}
		}
		return true;
	}

	public function validateEdit() {
		if($this->getRequest()->getMethod() == sfRequest::POST && !$this->getRequestParameter('id')) {
			if($this->getRequestParameter('sf_guard_user[password]') == '') {
				$this->getRequest()->setError('sf_guard_user{password}', 'Password is mandatory');

				return false;
			}
		}
		return true;
	}

	protected function updatesfGuardUserFromRequest() {
		parent::updatesfGuardUserFromRequest();
		$params = $this->getRequestParameter('sf_guard_user');

		//Profile
		$user_profile = $this->sf_guard_user->getUserProfile();
		if(isset($params['collaborator_id']) && $params['collaborator_id']) {
			if(!$user_profile) { $user_profile = new sfGuardUserProfile(); }
			$user_profile->setCollaboratorId($params['collaborator_id']);
			$this->sf_guard_user->addsfGuardUserProfile($user_profile);
		}
		else {
			if($user_profile) { $user_profile->delete(); }
		}

		//IP
		$this->sf_guard_user->deleteAllIps();
		$this->sf_guard_user->addAllIps(get('associated_ip', $params, array()));
	}

	protected function savesfGuardUser($sf_guard_user) {
		parent::savesfGuardUser($sf_guard_user);

		$profile = $sf_guard_user->getProfile();
		if($profile) {
			$profile->save();
		}

		switch($this->getActionName()) {
			case 'create':
			case 'edit' :
				// Update many-to-many for "associated_entity_permissions"
				$c = new Criteria();
				$c->add(sfGuardUserPermissionPeer::USER_ID, $sf_guard_user->getPrimaryKey());
				sfGuardUserPermissionPeer::doDelete($c);

				$ids = $this->getRequestParameter('associated_permissions');
				if(is_array($ids)) {
					$ids = array_unique($ids);
					foreach($ids as $id) {

						if(preg_match('/(?<entity_id>\d*)\\' . sfGuardEntity::ENTITY_SEPARATOR . '(?<permission_id>\d+)/', $id, $matches)) {
							$SfGuardUserPermission = new sfGuardUserPermission();
							$SfGuardUserPermission->setUserId($sf_guard_user->getPrimaryKey());
							$SfGuardUserPermission->setEntityId($matches['entity_id']);
							$SfGuardUserPermission->setPermissionId($matches['permission_id']);
							$SfGuardUserPermission->save();
						}
					}
				}

				break;
		}
	}

	protected function addFiltersCriteria($criteria) {

		parent::addFiltersCriteria($criteria);

		if(isset($this->filters['group_id']) && $this->filters['group_id']) {
			$group_id = $this->filters['group_id'];

			//cherche les ids des users concernés par le groupe
			$c = new Criteria;
			$c->add(sfGuardUserGroupPeer::GROUP_ID, $group_id);
			$user_ids = sfGuardUserGroupPeer::doSelectFieldValues(sfGuardUserGroupPeer::USER_ID, $c);

			$criteria->add(sfGuardUserPeer::ID, $user_ids, Criteria::IN);
		}
	}

}

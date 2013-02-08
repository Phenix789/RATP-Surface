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
 * @version    SVN: $Id: sfGuardUser.php 5760 2007-10-30 07:51:16Z francois $
 */
class sfGuardUser extends PluginsfGuardUser {

	protected $sf_guard_filtering_ip;

	public function getGroupsOrderedByName() {

		$ugroups = sfGuardUserGroupQuery::create()
					->filterByUserId($this->getId())
					->find();

		$group_ids = array();
		foreach($ugroups as $ugroup) {
			$group_ids[] = $ugroup->getGroupId();
		}

		$groups = sfGuardGroupQuery::create()
					->filterById($group_ids)
					->orderByName()
					->find();
		return $groups;
	}

	public function getProfile() {
		if(is_null($this->profile)) {
			$this->profile = sfGuardUserProfilePeer::getProfile($this);
			//hack - quand le collaborator a ete ajouté sans save
			if(!$this->profile && $this->getsfGuardUserProfiles()) {
				foreach($this->getsfGuardUserProfiles() as $first_profile) {
					return $first_profile->getCollaborator();
				}
			}
			//hack
		}
		return $this->profile;
	}

	public function getProfileId() {
		if($this->getProfile()) {
			return $this->getProfile()->getId();
		}
		return null;
	}

	public function hasProfile() {
		return $this->getProfile() ? true : false;
	}

	public function getUserProfile() {
		$user_profiles = $this->getsfGuardUserProfiles();
		return get(0, $user_profiles);
	}

        public function getProfileName() {
		return (string) ($this->hasProfile() ? $this->getProfile() : $this->getUsername());
        }

	
        public function isSudoer() {
                return $this->getIsSudoer();
        }

	public function ipIsActived() {
		return sfConfig::get('app_sf_guard_plugin_filtering_ip', false);
	}

	public function ipIsEdit() {
		return sfConfig::get('app_sf_guard_plugin_edit_ip', true);
	}
	
    public function getIpsWithGroups($unique = false) {
            $groups = $this->getGroups();
            $ips = $this->getAllIpsAuthorized();
            foreach($groups as $group) {
                    $ips = array_merge($group->getAllIpsAuthorized(), $ips);
            }
            if($unique) {
                    $ips = array_unique($array);
            }
            return $ips;
    }

    public function isIpAuthorized($ip) {
           $ips = $this->getIpsWithGroups();
           
           if (count($ips)) {
                return in_array($ip, $ips);
           } else {
               return true;
           }
    }

}

sfPropelBehavior::add('sfGuardUser', array('sfGuardIpBehavior'));
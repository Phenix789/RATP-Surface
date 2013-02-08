<?php
/**
 * 
 * 
 */
class Collaborator extends BaseCollaborator {

	public function __toString() {
		return $this->getFullName();
	}

	public function getFullName() {
		return $this->getFirstName() . ' ' . $this->getLastName();
	}

	public function getFriendlyName() {
		return $this->getFirstName() . ' ' . $this->getLastName();
	}

	public function getUsers() {
		$users = array();
		foreach($this->getsfGuardUserProfilesJoinsfGuardUser() as $profile) {
			if ($profile->getsfGuardUser()) {
				$users[] = $profile->getsfGuardUser();
			} else {
				//echo "no user in profile";
			}
		}
		return $users;
	}

	public function getAvatar() {
		if ($photo = $this->getAssociatedFile('getAvatar')) {
			return  url_for('sfPropelFileAssoc/download?file_id=' . $photo->getId());
		}
		
		return '/surfaceSocialPlugin/images/avatar.png';
	}

}

sfPropelBehavior::add('Collaborator', array('sfPropelFileAssocBehavior'));

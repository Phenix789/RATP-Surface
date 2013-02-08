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
class Group extends BaseGroup {

	protected $contacts = array();

	public function getConfig() {
		return sfConfig::get('app_contact_group', array());
	}

	public function __toString() {
		return $this->getName();
	}

	public function getContacts($type = 'all') {
		if(!isset($this->contacts[$type])) {
			$criteria = new Criteria();
			if('all' !== $type) {
				$criteria->add(ContactPeer::TYPE, $type);
			}
			$criteria->addJoin(ContactGroupPeer::CONTACT_ID, ContactPeer::ID, CRITERIA::LEFT_JOIN);
			$criteria->add(ContactGroupPeer::GROUP_ID, $this->getId());
			$this->contacts[$type] = ContactPeer::doSelect($criteria);
		}
		return $this->contacts[$type];
	}

}

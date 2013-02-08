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
class ContactMultiple extends BaseContactMultiple {

	public function getContact(PropelPDO $con = null) {
		return $this->getContactRelatedByContactId($con);
	}

	public function getParent(PropelPDO $con = null) {
		return $this->getContactRelatedByParentId($con);
	}

	public function fieldsetWithoutContact() {
		return $this->getContactId();
	}

	public function fieldsetWithoutParent() {
		return $this->getParentId();
	}

	public function fieldsetWithAll() {
		return !$this->getContactId() && !$this->getParentId();
	}

}

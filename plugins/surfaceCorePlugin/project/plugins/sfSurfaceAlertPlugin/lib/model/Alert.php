<?php
/**
 * Subclass for representing a row from the 'alert' table.
 *
 * 
 *
 * @package lib.model
 */
class Alert extends BaseAlert {

        private $tmpId;
	protected $object;

        public function __construct() {
                $this->tmpId = uniqid();
        }

        public function getTmpId() {
                return $this->tmpId;
        }

        public function getRecipient() {
		return $this->getCollaboratorRelatedByRecipientId();
        }

        public function isExpired() {
                return strtotime($this->getTriggerAt('Y-m-d')) <= strtotime(Date('Y-m-d'));
        }

        public function getTargetObject() {
		if(!$this->object && $this->getModelId()) {
			$peer = $this->getModelClass() . 'Peer::retrieveByPk';
			$this->object = call_user_func($peer, $this->getModelId());
		}
		return $this->object;
        }

        public function getUpdater() {
                if($user  = $this->getsfGuardUserRelatedByUpdatedBy()) {
                        return $user->getProfile();
                }
                return null;
        }

        public function getIsActive() {
                return $this->getAcquittedAt()==null;
        }

        public function getAcquitter() {
		return $this->getCollaboratorRelatedByAcquittedBy();
        }

        public function __toString() {
                return $this->getMessage();
        }

	public function getModelClassName() {
		if($object = $this->getTargetObject()) {
			return $object->getMetadata('name');
		}
		return $this->getModelClass();
	}

	public function save(PropelPDO $con = null) {
		if(($modified = $this->getModifiedColumns()) && !(count($modified) == 1 && in_array(AlertPeer::SENT, $modified))) {
			$this->setSent(false);
		}
		parent::save();
	}
	
	public function setSent($bool) {
		if ($bool) {
				parent::setSent(time());				
		} else {
				parent::setSent(null);
		}
	}
	public function isSent() {
		return parent::getSent() ? true : false;
	}
	
}

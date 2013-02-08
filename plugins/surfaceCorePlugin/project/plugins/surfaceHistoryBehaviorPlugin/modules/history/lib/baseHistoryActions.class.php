<?php

class baseHistoryActions extends autoHistoryActions {

	public function executeCreate() {
		parent::executeCreate();
		$this->history->setObjectId($this->getRequestParameter('object_id', null));
		$this->history->setObjectName($this->getRequestParameter('object_name', null));
		$this->history->setDateRef(time());
	}

	/**
	 * Simply call this action with the object_name parameter and it will add an
	 * history on all objects related by object_name in the cart.
	 */
	public function executeCreateCommonFromCart() {
		$class_name = $this->getClassName();
		$this->object = new $class_name();
		$object_name = $this->getRequestParameter('object_name', $this->getRequestParameter('history[object_name]'));
		$peer_class = $object_name.'Peer';
		$name = $peer_class::getMetadata('name', $object_name);
		if(is_array($name)){
			$plural_name = $name['plural'];
			$name = $name['singular'];
		} else {
			$plural_name = $name.'s';
		}
		$object_count = $this->getCart()->count($object_name);
		$this->history->setObjectName($object_name);
		$this->history->setDateRef(time());
		$this->prepareCommonActions('create');
		$this->action_title = "Ajout d'historique sur {$object_count} ".($object_count > 1 ? $plural_name : $name);
		$this->success = false;
		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->updateHistoryFromRequest();
			$object_ids = $this->getCart()->getAllItemsId($object_name);
			foreach($object_ids as $id){
				$history = new History;
				$history->fromArray($this->history->toArray());
				foreach($this->history->getContacts() as $contact){
					$history->addContact($contact);
				}
				$history->setObjectId($id);
				$history->save();
			}
			$this->success = true;
			$s = ($object_count > 1 ? 's' : '');
			$a = ($object_count > 1 ? 'ont' : 'a');
			$this->setFlash('notice', "{$object_count} historique{$s} {$a} été ajouté{$s}");
		}
	}

	public function executeBlank() {
		$id = $this->getRequestParameter('id');
		$history = HistoryPeer::retrieveByPK($id);
		if(!$history){
			$target = explode('_', $this->getRequestParameter('target'));
			$this->object_id = array_pop($target);
			$this->object_name = array_pop($target);
		} else {
			if($history->getObject()){
				$this->object_id = $history->getObject()->getId();
				$this->object_name = getclass($history->getObject());
			}
		}
		if($this->object_id && $this->object_name) {
			return sfView::SUCCESS;
		}
		return sfView::NONE;
	}

	public function executeCancel() {
		return sfView::NONE;
	}

	public function executeUpdate() {
		$object_id = $this->getRequestParameter('object_id');
		$object_name = $this->getRequestParameter('object_name');
		if($object_id && $object_name) {
			$this->hist_object = surfaceBehavior::doSelectObject($object_id, $object_name);
            if($this->hist_object) {
				return sfView::SUCCESS;
			}
		}
		return sfView::NONE;
	}

	/**
	 * @brief met a jour l'objet suivant les parametres renvoyés
	 * @fn protected function update@FromRequest()
	 *
	 * Cette fonction recupere les parametres de la requete et met a jour
	 * l'objet correspondant
	 *
	 */
	protected function updateHistoryFromRequest() {
		parent::updateHistoryFromRequest();
		$param = $this->getRequestParameter('history');
		if(isset($param['date_ref'])) {
			$this->history->setDateRef($this->formatDate($param['date_ref'], time()));
		}
		if(isset($param['contacts'])) {
			$config = History::getConfig($param['object_name']);
			$object = $config['contact']['object'];
			$contacts = $this->history->getContacts();
			$exist = array();
			foreach($contacts as $contact) {
				$exist[$contact->getId()] = $contact->getId();
			}
			foreach($param['contacts'] as $contact_id) {
				if(!in_array($contact_id, $exist)) {
					$history_contact = new HistoryContact();
					$history_contact->setHistory($this->history);
					$history_contact->setContactId($contact_id);
					$history_contact->setContactName($object);
					$this->history->addHistoryContact($history_contact);
				}
				unset($exist[$contact_id]);
			}
			foreach($exist as $to_delete) {
				foreach($this->history->getHistoryContacts() as $contact) {
					if($contact->getContactId() == $to_delete) {
						$contact->delete();
					}
				}
			}
		}
		if(isset($param['type'])) {
			$this->history->setType($param['type']);
		}
	}

	public function validateCreate() {
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$valid = true;
			$valid = $this->validateType() && $valid;
			$valid = $this->validateContact() && $valid;
			return $valid;
		}
		return true;
	}

	public function validateEdit() {
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$valid = true;
			$valid = $this->validateType() && $valid;
			$valid = $this->validateContact() && $valid;
			return $valid;
		}
		return true;
	}

	protected function validateType() {
		return true;
	}

	protected function validateContact() {
		return true;
	}

}

<?php

/**
 * alert actions.
 *
 * @package surface
 * @subpackage alert
 * @author François <francois@elogys.fr>
 */
class alertActions extends autoAlertActions {

	protected function addFiltersCriteria($c) {
		parent::addFiltersCriteria($c);
		if(isset($this->filters['selected_time_left']) && $this->filters['selected_time_left'] != null) {
			if($this->filters['selected_time_left'] < 0) {
				$deadline = time();
				$sense = Criteria::GREATER_EQUAL;
			}
			else {
				$deadline = time() - $this->filters['selected_time_left'];
				$sense = Criteria::LESS_EQUAL;
			}
			$c->add(AlertPeer::TRIGGER_AT, $deadline, $sense);
		}
		if(!(isset($this->filters['is_acquitted']) && $this->filters['is_acquitted'] == 1)) {
			$c->add(AlertPeer::ACQUITTED_AT, NULL);
		}
		if(isset($this->filters['recipient_id']) && $this->filters['recipient_id'] != null) {
			$recipientId = $this->filters['recipient_id'];
		}
		if(isset($recipientId))
			$c->add(AlertPeer::RECIPIENT_ID, $recipientId);
		$c->addAscendingOrderByColumn(AlertPeer::TRIGGER_AT);
	}

	public function executeConfirm() {
		$this->setFlash('notice', 'Your modifications have been saved');
	}

	public function validateAdd() {
		$isValid = true;
		$this->getAddFormParameters();
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			if(!myTools::isSqlDate($this->triggerDate)) {
				$isValid = false;
				$this->request->setError("triggerDate", "Le format de la date est invalide :" . $this->triggerDate);
				$this->triggerDate = '';
			}
			$sv = new stringValidator();
			$sv->initialize($this->getContext());
			if(!$sv->execute($this->message, $error)) {
				$isValid = false;
				$this->request->setError("message", $error);
			}
		}
		return $isValid;
	}

	public function getAddFormParameters() {
		$this->alertId = $this->getRequestParameter('alertId');
		if(isset($this->alertId) && $this->alertId != '') {
			$this->alert = AlertPeer::retrieveByPk($this->alertId);

			$this->savedAlert = true;
			$this->submittButtonText = 'Modifier';
		}
		else {
			$this->alert = new Alert();

			$this->savedAlert = false;
		}
		$collaboratorId = $this->getRequestParameter('collaboratorId');
		$this->collaboratorId = (isset($collaboratorId) && $collaboratorId !== null) ? $collaboratorId : $this->alert->getRecipientId();

		$message = $this->getRequestParameter('message');
		$this->message = isset($message) ? $message : $this->alert->getMessage();

		$modelId = $this->getRequestParameter('modelId');
		$this->modelId = isset($modelId) ? $modelId : $this->alert->getModelId();

		$modelClass = $this->getRequestParameter('modelClass');
		$this->modelClass = isset($modelClass) ? $modelClass : $this->alert->getModelClass();

//		$objectUrl = $this->getRequestParameter('objectUrl');
//		$this->objectUrl = isset($objectUrl) ? $objectUrl : $this->alert->getTargetUrl();

		$dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
		$triggerDate = $this->getRequestParameter('triggerDate');
		if($triggerDate != '') {
			$triggerDate = $dateFormat->format($triggerDate, 'i', $dateFormat->getInputPattern('d'));
		}
		$this->triggerDate = isset($triggerDate) ? $triggerDate : $this->alert->getTriggerAt();
	}

	public function executeAdd() {
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->handleAddPost();
			$this->getRequest()->setParameter('alert_id', $this->alert->getId());
			$this->forward('alert', 'refresh');
		}
	}

	public function handleAddPost() {
		$this->alert->setRecipientId($this->collaboratorId);
		$this->alert->setTriggerAt($this->triggerDate);
		$this->alert->setMessage($this->message);
//		$this->alert->setTargetUrl($this->objectUrl);
		if(!$this->getRequestParameter('model') == 'NONE') {
			$peer = $this->modelClass . 'Peer::retrieveByPk';
			$object = call_user_func($peer, $this->modelId);
			$object->addAlert($this->alert);
			$object->save();
			$this->alert_object = $object;
		}
		else {
			$this->alert->setModelClass($this->getRequestParameter('modelClass'));
			$this->alert->save();
			$this->alert_object = null;
		}
	}

	public function executeDelete() {
		$alertId = $this->getRequestParameter('id');
		$alert = AlertPeer::retrieveByPk($alertId);
		if(isset($alert)) {
			if($alert->getModelId()) {
				$this->modelId = $alert->getModelId();
				$this->modelClass = $alert->getModelClass();
				$peer = $this->modelClass . 'Peer::retrieveByPk';
				$object = call_user_func($peer, $this->modelId);
				$object->removeAlert($alert);
				$object->save();
			}
			else {
				$alert->delete();
			}
			$this->alert = $alert;
		}
		else {
			return sfView::ERROR;
		}
	}

	public function executeAcquit() {
		$alertId = $this->getRequestParameter('id');
		$alert = AlertPeer::retrieveByPk($alertId);
		if(isset($alert)) {
			$alert->setAcquittedAt(date('Y-m-d'));
			$currentCollaborator = sfContext::getInstance()->getUser()->getCollaborator();
			if(isset($currentCollaborator)) {
				$alert->setAcquittedBy($currentCollaborator->getId());
			}
			$alert->save();

			$this->alert = $alert;
		}
		else {
			return sfView::ERROR;
		}
	}

	public function executeReport() {
		$alertId = $this->getRequestParameter('id');
		$days = $this->getRequestParameter('days', 7);
		$alert = AlertPeer::retrieveByPk($alertId);
		if(isset($alert)) {
			$alert->setTriggerAt(strtotime($alert->getTriggerAt('Y-m-d') . " +" . $days . "day"));

			$currentCollaborator = sfContext::getInstance()->getUser()->getCollaborator();
			if(isset($currentCollaborator)) {
				$alert->setUpdatedBy($currentCollaborator->getId());
			}
			$alert->save();

			$this->alert = $alert;
			$this->alert_id = $alert->getId();
		}
		else {
			return sfView::ERROR;
		}
	}

	public function executeTriggerAlert() {
		
	}

	public function executeAlertForm() {
		
	}

	public function executeTest() {
		
	}

	public function handleErrorAdd() {
		return sfView::SUCCESS;
	}

	public function updateAlertFromRequest() {
		parent::updateAlertFromRequest();
		$isAcquitted = $this->getRequestParameter('alert[is_acquitted]');
		if(isset($isAcquitted) && $isAcquitted != null) {
			$this->alert->setAcquittedAt(date('Y-m-d'));
		}
		else {
			$this->alert->setAcquittedAt(NULL);
		}
	}

	public function executeCreate() {
		return sfView::NONE;
	}

	public function executeRefresh() {
		$this->load = $this->getRequestParameter('load', 0);
		$this->alert_id = $this->getRequestParameter('alert_id', null);

		if($this->alert_id) {
			$this->alert = AlertPeer::retrieveByPK($this->alert_id);
			$this->alert_object = $this->alert->getTargetObject();
		}
		if(isset($this->alert) && $this->alert->getModelId()) {
			$this->modelClass = $this->alert->getModelClass();
			$this->modelId = $this->alert->getModelId();
		}
	}

}

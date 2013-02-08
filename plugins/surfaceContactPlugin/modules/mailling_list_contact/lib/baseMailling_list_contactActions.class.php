<?php
/**
 * @brief actions du module
 * @class 
 * @package Application
 * @subpackage
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 août 2010
 * @version 1.0
 *
 * Regroupe toutes les actions du module ainsi que d'autres fonctions neccessaire a
 * leurs executions
 *
 */
class baseMailling_list_contactActions extends autoMailling_list_contactActions {

	public function executeUnset() {
		$mailling_list_contact = MaillingListContactPeer::retrieveByPK($this->getRequestParameter('contact_id'), $this->getRequestParameter('mailling_list_id'));
		$mailling_list_contact->delete();
		$this->redirect('mailling_list/show?id=' . $mailling_list_contact->getMaillingListId());
	}

	public function executeCreate() {
		parent::executeCreate();
		$this->mailling_list_contact->setMaillingListId($this->getRequestParameter('mailling_list_id'));
	}

	protected function  updateMaillingListContactFromRequest() {
		parent::updateMaillingListContactFromRequest();
		$params = $this->getRequestParameter('mailling_list_contact');
		$this->mailling_list_contact->setContactId($params['contact_id']);
		$this->mailling_list_contact->setMaillingListId($params['mailling_list_id']);
	}

}

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
class baseMailling_listActions extends autoMailling_listActions {

	public function execute() {
		parent::execute();
		if($id = $this->getRequestParameter('id')) {
			$this->redirectUnless($this->isAuthorized($id), 'sfGuardAuth/secure');
		}
	}

	public function executeAutocomplete() {
		$search = $this->getSearch();
		$criteria = new Criteria();
		$criterion_1 = $criteria->getNewCriterion(MaillingListPeer::IS_PRIVATE, false);
		$criterion_2 = $criteria->getNewCriterion(MaillingListPeer::IS_PRIVATE, true);
		$criterion_2->addAnd($criteria->getNewCriterion(MaillingListPeer::CREATED_BY, $this->getUser()->getGuardUser()->getId()));
		$criterion_1->addOr($criterion_2);
		$criteria->add($criterion_1);
		$criteria->add(MaillingListPeer::NAME, $this->search($search), CRITERIA::LIKE);
		$this->search = $search;
		$this->mailling_lists = MaillingListPeer::doSelect($criteria);
	}

	public function executeAddContactToCart() {
		$cart = $this->getUser()->getCart();
		$mailling_list = MaillingListPeer::retrieveByPK($this->getRequestParameter('id'));
		$cart->addAllItems($mailling_list->getContacts());
		$cart->save();
		$this->getUser()->setAttribute('mailling_list_reload_cart', true, 'surface_contact');
		$this->redirect('mailling_list/show?id=' . $mailling_list->getId());
	}

	public function executeAddContactToMaillingList() {
		$cart = $this->getUser()->getCart();
		$mailling_list = MaillingListPeer::retrieveByPK($this->getRequestParameter('id'));
		$ids = $cart->getAllItemsId('PersonEx');
		$ids = array_diff($ids, $mailling_list->getContactIds());
		foreach($ids as $id) {
			$mailling_list_contact = new MaillingListContact();
			$mailling_list_contact->setContactId($id);
			$mailling_list->addMaillingListContact($mailling_list_contact);
		}
		$mailling_list->save();
		$this->redirect('mailling_list/show?id=' . $mailling_list->getId());
	}

	public function addFiltersCriteria($criteria) {
		parent::addFiltersCriteria($criteria);
		/*if (!isset($this->filters['archive'])) {
		    $criteria->add(MaillingListPeer::ARCHIVE, true, Criteria::NOT_EQUAL);
		} else {
		    
		}*/
		
	}

	public function  getDefaultCriteria() {
		$criteria = parent::getDefaultCriteria();
		if(!get('all_private', $this->filters)) {
			$criterion_1 = $criteria->getNewCriterion(MaillingListPeer::IS_PRIVATE, false);
			$criterion_2 = $criteria->getNewCriterion(MaillingListPeer::IS_PRIVATE, true);
			$criterion_2->addAnd($criteria->getNewCriterion(MaillingListPeer::CREATED_BY, $this->getUser()->getGuardUser()->getId()));
			$criterion_1->addOr($criterion_2);
			$criteria->add($criterion_1);
		}
		return $criteria;
	}

	protected function isAuthorized($id) {
		if(!$this->getUser()->hasCredential('admin')) {
			$criteria = new Criteria();
			$criteria->add(MaillingListPeer::ID, $id);
			$criterion_1 = $criteria->getNewCriterion(MaillingListPeer::IS_PRIVATE, false);
			$criterion_2 = $criteria->getNewCriterion(MaillingListPeer::IS_PRIVATE, true);
			$criterion_2->addAnd($criteria->getNewCriterion(MaillingListPeer::CREATED_BY, $this->getUser()->getGuardUser()->getId()));
			$criterion_1->addOr($criterion_2);
			$criteria->add($criterion_1);
			return (bool) MaillingListPeer::doSelectOne($criteria);
		}
		return true;
	}

}

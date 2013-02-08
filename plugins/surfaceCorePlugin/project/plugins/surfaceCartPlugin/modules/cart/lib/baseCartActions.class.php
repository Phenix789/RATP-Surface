<?php
/**
 * @brief actions du module cart
 * @class baseCartActions
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 févr. 2010
 *
 * Regroupe toutes les actions du module ainsi que d'autres fonctions neccessaire a
 * leurs executions
 *
 */
class baseCartActions extends autoCartActions {

	public function executeShow() {
		if($this->getRequestParameter('id')) {
			parent::executeShow();
		}
		else {
			$this->cart = $this->getUser()->getCart();
			$this->action_name = $this->getActionName();
		}
	}

	public function executeSelectCart() {
		$id = $this->getRequestParameter('id');
		if($id) {
			$cart_new = CartPeer::retrieveByPK($id);
			$cart_old = $this->getUser()->getCart(null, false);
			$cart_old_id = ($cart_old && $cart_old->getId()) ? $cart_old->getId() : null;
			$cart_new_id = $cart_new->getId();
			if($cart_new_id != $cart_old_id) {
				if($cart_old) {
					$cart_old->setSelected(false);
					$cart_old->save();
				}
				if($cart_new) {
					$cart_new->setSelected(true);
					$cart_new->save();
				}
			}
			$this->getUser()->setCart($cart_new);
			$this->cart = $cart_new;
			$this->old_cart = $cart_old;
			return sfView::SUCCESS;
		}
		$this->setTemplate('cartError');
		$this->message = 'La session n\'a pas pu être selectionnée.';
	}

	public function executeQuickSelect() {
		$this->executeSelectCart();
	}

	public function executeUnselectCart() {
		$id = $this->getRequestParameter('id');
		if($id) {
			$cart = CartPeer::retrieveByPK($id);
			if($cart && $cart->getSelected()) {
				$cart->setSelected(false);
				$cart->save();
			}
			$this->getUser()->setCart(null);
			$this->cart = $cart;
			return sfView::SUCCESS;
		}
		$this->setTemplate('cartError');
		$this->message = 'La session n\'a pas pu être deselectionnée.';
	}

	public function executeEmptyCart() {
		$id = $this->getRequestParameter('id');
		$cart = CartPeer::retrieveByPK($id);
		if($cart) {
			$cart->emptyCart(true);
			$cart->save();
			$this->cart = $cart;
			return sfView::SUCCESS;
		}
		$this->setTemplate('cartError');
		$this->message = 'La session n\'a pu être vidé.';
	}

	/**
	 * @brief Vide le contenue du panier d'un type donnée et redirige l'action
	 *
	 */
	public function executeEmptyType() {
		$cart_id = $this->getRequestParameter('id');
		$type = $this->getRequestParameter('type');
		$redirect_url = $this->getRequestParameter('redirect_url');
		$cart = CartPeer::retrieveByPK($cart_id);
		if($cart) {
			$this->cart = $cart;
			$this->count = $cart->count($type, true);
			$cart->deleteAllItems($type, true);
			$cart->save();
		}
		if ($redirect_url) {
			$this->redirect($redirect_url . '?id=' . $cart->getId());
		} 
	}

	/**
	 * @brief Ajoute un element au panier
	 *
	 */
	public function executeAddToCart() {
		$id = $this->getRequestParameter('object_id');
		$name = $this->getRequestParameter('object_name');
		if($id && $name) {
			$item = array('id' => $id, 'name' => $name);
			$cart = $this->getUser()->getCart();
			$cart->addItem($item, true);
			$cart->save();
			$this->cart = $cart;
			$this->cart_object = $cart->getItem($item, true);
			$this->refresh_id = $this->getRequestParameter('refresh_id', '');
			return sfView::SUCCESS;
		}
		$this->setTemplate('cartError');
		$this->message = 'L\'item n\'a pu être ajouté à la session.';
	}

	/**
	 * @brief Supprime un element du panier
	 *
	 */
	public function executeRemoveFromCart() {
		$id = $this->getRequestParameter('object_id');
		$name = $this->getRequestParameter('object_name');
		if($id && $name) {
			$item = array('id' => $id, 'name' => $name);
			$cart = $this->getUser()->getCart();
			$cart->deleteItem($item, true);
			$cart->save();
			$this->cart = $cart;
			$this->cart_object = call_user_func($name . 'Peer::retrieveByPk', $id);
			$this->refresh_id = $this->getRequestParameter('refresh_id', '');
			return sfView::SUCCESS;
		}
		$this->setTemplate('cartError');
		$this->message = 'L\'item n\'a pu être enlevé de la session.';
	}

	/**
	 *
	 *
	 */
	public function executeCopyToMyCart() {
		$cart = $this->getUser()->getCart();
		$from_cart = CartPeer::retrieveByPK($this->getRequestParameter('from_cart_id'));
		$type = $this->getRequestParameter('object_name');
		if($cart && $from_cart) {
			$objects = $from_cart->getAllItems($type, true);
			$cart->addAllItems($objects, true);
			$cart->save();
			$this->cart = $cart;
			$this->from_cart = $from_cart;
			$this->type = $type;
			return sfView::SUCCESS;
		}
		$this->setTemplate('cartError');
		$this->message = 'Une erreur est survenue.';
	}

	/**
	 *
	 *
	 */
	public function executeRefreshMenuCart() {
		$this->cart = $this->getUser()->getCart();
	}

/******************************************************************************/
		/*******************/
		/*updateFromRequest*/
		/*******************/
/******************************************************************************/

	protected function updateCartFromRequest() {
		parent::updateCartFromRequest();
		if(!$this->cart->getUserId()) {
			$this->cart->setUserId($this->getUser()->getGuardUser()->getId());
		}
		if($this->cart->isNew()) {
			$this->cart->setSelected(true);
			$cart_old = CartPeer::retrieveCartSelected();
			if($cart_old) {
				$cart_old->setSelected(false);
				$cart_old->save();
			}
		}
	}

/******************************************************************************/
		/********************/
		/*addFiltersCriteria*/
		/********************/
/******************************************************************************/

	protected function addFiltersCriteria($criteria) {
		parent::addFiltersCriteria($criteria);
		if((isset($this->filters['user_id']) && $this->filters['user_id'] != 'all')) {
			$criteria->add(CartPeer::USER_ID, $this->filters['user_id']);
		}
		if(!isset($this->filters['user_id'])) {
			$criteria->add(CartPeer::USER_ID, $this->getUser()->getGuardUser()->getId());
		}
		if(!isset($this->filters['archive']) || $this->filters['archive'] == false) {
			$criteria->add(CartPeer::ARCHIVE, false, CRITERIA::EQUAL);
			$criteria->addOr(CartPeer::ARCHIVE, null, CRITERIA::ISNULL);
		}
	}

	public function executeUpdateMenu(){
		
	}
}

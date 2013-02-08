<?php
/**
 * @brief
 * @class surfaceUser
 *
 */
class surfaceUser extends sfGuardSecurityUser {

        public function getUserId() {
                return $this->getGuardUser()->getId();
        }
		
		public function getProfileName() {
			if($profile = $this->getProfile()) {
				return $profile->getFullName();
			}
			return '';
		}
		
		public function getAvatar() {
			if($profile = $this->getProfile()) {
				return $profile->getAvatar();
			}
			return '/surfaceSocialPlugin/images/avatar.png';
		}

		
        public function getSignature() {
				if ($profile = $this->getProfile()) {
						return $this->getProfile()->getSignature();
				}
                return "";
        }


        public function __toString() {
                return (string) $this->getGuardUser();
        }

        public function getSearchCriteria($category) {
                return $this->getAttribute($category, null, 'surface.search');
        }

        public function setSearchCriteria($category, $value) {
                $this->setAttribute($category, $value, 'surface.search');
        }

        protected function hasCredentialForObject($credential, $object) {
                switch($credential) {
                        case 'owner' :
                                if(method_exists($object, 'getCreatedBy')) {
                                        if($object->getCreatedBy()) {
                                                return $object->getCreatedBy() == $this->getGuardUser()->getId();
                                        }
                                }
                                break;
                }
                return parent::hasCredentialForObject($credential, $object);
        }

        protected function getCredentialFilterCriterionForObject($credential, $classPeerName, Criteria $criteria) {
                switch($credential) {
                        case 'owner' :
                                if(method_exists($classPeerName, 'translateFieldName')) {
                                        try {
                                                $colName = call_user_func(array($classPeerName, 'translateFieldName'), 'created_by', BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
                                                return $criteria->getNewCriterion($colName, $this->getGuardUser()->getId(), Criteria::EQUAL);
                                        }
                                        catch(PropelException $e) {
                                                return null;
                                        }
                                }
                                break;
                }
                return parent::getCredentialFilterCriterionForObject($credential, $classPeerName, $criteria);
        }
		
		
	public function getCollaboratorId() {
		$profile = $this->getProfile();
		if(isset($profile)) {
			return $this->getProfile()->getId();
		}
		return null;
	}

	public function getCollaborator() {

		return $this->getProfile();
	}



	protected $cart;

	/**
	 * @brief Selectionne et retourne le panier precisé ou celui deja selectionné
	 * @param int $id Identifiant d'un panier
	 * @param bool $create_if_null Si vrai, créer un panier si aucun n'est selectionné.
	 * @return Cart Panier selectionné
	 *
	 */
	public function getCart($id = null, $create_if_null = true) {
		if(!$this->cart || ($this->cart && $id && $this->cart->getId() != $id)) {
			//si aucun cart n'etait selectionné en session
			if($id) { $cart = CartPeer::retrieveByPK($id); }
			else { $cart = CartPeer::retrieveCartSelected($this->getGuardUser()->getId()); }
			//si aucun cart recuperer, creation d'un par defaut
			if(!$cart && $create_if_null) {
				$cart = new Cart();
				$cart->setUserId($this->getGuardUser()->getId());
				$cart->setName('Session du ' . date('d-m-Y'));
				$cart->setDescription('Session générée automatiquement le ' . date('d-m-Y'));
				$cart->setSelected(true);
				$cart->save();
			}
			if($cart) {
				$this->cart = $cart;
			}
		}
		return $this->cart;
	}

	/**
	 * @brief Permet de mettre a jour le cart selectionné
	 * @param mixed $cart Un cart
	 *
	 */
	public function setCart($cart) {
		if(strcmp(getclass($cart), 'Cart') == 0) {
			$this->cart = $cart;
		}
		else {
			$this->cart = null;
		}
	}

}

/******************************************************************************/
		/******/
		/*Cart*/
		/******/
/******************************************************************************/
/**
 * Code a include dans le fichier myUser.class.php
 */

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

/******************************************************************************/
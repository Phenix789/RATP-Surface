<?php
/**
 * @brief Plugin Cart
 * @class CartPeer
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 fevrier 2010
 *
 */
class CartPeer extends BaseCartPeer {

	/**
	 * @brief Retrouve le cart selectionné par l'utilisateur
	 * @param int $user_id L'identifiant de l'utilisateur en cours
	 * @return Cart Le cart selectionné
	 *
	 */
	public static function retrieveCartSelected($user_id = null) {
		if(!$user_id) { $user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId(); }
		$criteria = new Criteria();
		$criteria->add(CartPeer::USER_ID, $user_id);
		$criteria->add(CartPeer::SELECTED, true);
		return CartPeer::doSelectOne($criteria);
	}

	/**
	 * @brief Retrouve tous les carts de l'utilisateur
	 * @param int $user_id L'identifiant de l'utilisateir en cours
	 * @return array Les carts de l'utilisateur
	 *
	 */
	public static function doSelectCartsOfUser($user_id = null, $with_archive = false) {
		if(!$user_id) { $user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId(); }
		$criteria = new Criteria();
		$criteria->add(CartPeer::USER_ID, $user_id);
		$criteria->addDescendingOrderByColumn(CartPeer::ID);
		if(!$with_archive) {
			$criteria->add(CartPeer::ARCHIVE, false, CRITERIA::EQUAL);
			$criteria->addOr(CartPeer::ARCHIVE, null, CRITERIA::ISNULL);
		}
		return CartPeer::doSelect($criteria);
	}

	/**
	 * @brief Retrouve les carts non selectionné par l'utilisateur
	 * @param int $user_id L'identifiant de l'utilisateir en cours
	 * @return array Les carts non selectionné par l'utilisateur
	 * 
	 */
	public static function doSelectCartNotSelectedOfUser($user_id = null, $with_archive = false) {
		if(!$user_id) { $user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId(); }
		$criteria = new Criteria();
		$criteria->add(CartPeer::USER_ID, $user_id);
		$criteria->add(CartPeer::SELECTED, false);
		$criteria->addOr(CartPeer::SELECTED, null, CRITERIA::ISNULL);
		$criteria->addDescendingOrderByColumn(CartPeer::ID);
		if(!$with_archive) {
			$criteria->add(CartPeer::ARCHIVE, false, CRITERIA::EQUAL);
			$criteria->addOr(CartPeer::ARCHIVE, null, CRITERIA::ISNULL);
		}
		return CartPeer::doSelect($criteria);
	}

	/**
	 * @brief Retrouve tout les objet lié au cart du type donné
	 * @param int $cart_id Identifiant du cart
	 * @param string $object_name Nom de l'objet
	 * @param array $cart_item_ids Identifiant des items pour limité la selection
	 * @return array Liste des objets lié au cart du type donné
	 * 
	 */
	public static function doSelectAllObjects($cart_id, $object_name, $cart_item_ids = null) {
		$peer = CartPeer::getPeerFromName($object_name);
		$criteria = new Criteria();
		$criteria->addJoin(CartItemPeer::OBJECT_ID, constant($peer . '::ID'), CRITERIA::LEFT_JOIN);
		$criteria->add(CartItemPeer::CART_ID, $cart_id);
		$criteria->add(CartItemPeer::OBJECT_NAME, $object_name);
		if($cart_item_ids) {
			$criteria->add(CartItemPeer::ID, $cart_item_ids, CRITERIA::IN);
		}
		return call_user_func($peer . '::doSelect', $criteria);
	}

	/**
	 * @brief Retrouve la class peer a partir du nom de l'objet
	 * @param string $object_name Nom de l'objet
	 * @return string Nom de la class peer
	 * @throws Exception La class peer n'existe pas
	 *
	 */
	public static function getPeerFromName($object_name) {
		$config = Cart::getConfig($object_name);
		$peer = get('peer', $config, $object_name . 'Peer');
		if(!class_exists($peer)) {
			throw new Exception(sprintf('Class peer %s does not exist', $peer));
		}
		return $peer;
	}



    public static function setSelectedCartOfUser($user_id, $selected_cart_id) {
         $cart_new = CartPeer::retrieveByPK($selected_cart_id);
         if ($cart_new) {
                $cart_old = self::retrieveCartSelected($user_id);
                if($cart_old) {
                    $cart_old->setSelected(false);
                    $cart_old->save();
}
                $cart_new->setSelected(true);
                $cart_new->save();
                return $cart_new;
        }
        return null;
    }

    public static function deleteCartOfUser($user_id, $selected_cart_id) {
         $cart_to_delete = CartPeer::retrieveByPK($selected_cart_id);
         if ($cart_to_delete) {
         	$cart_new = null;
     		if ($cart_to_delete->getSelected()) {
     			$carts = self::doSelectCartNotSelectedOfUser($user_id);
     			if ($carts) {
     				$cart_new = array_shift($carts);
     				$cart_new->setSelected(true);
     				$cart_new->save();
     			}
     		}
     		$cart_to_delete->delete();
            return $cart_new;
        }
        return null;
    }

}

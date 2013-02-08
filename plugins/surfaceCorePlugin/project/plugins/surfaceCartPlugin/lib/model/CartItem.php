<?php
/**
 * @brief Plugin Cart
 * @class CartItem
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 fevrier 2010
 *
 */
class CartItem extends BaseCartItem {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	/**
	 * @var BaseObject Objet lié
	 */
	protected $object;

/******************************************************************************/
		/******************/
		/*Getter && Setter*/
		/******************/
/******************************************************************************/

	/**
	 * @brief Getter Retourne l'objet lié de l'item
	 * @return BaseObject Objet lié
	 * 
	 */
	public function getObject() {
		if(!$this->object) {
			$this->object = CartItemPeer::doSelectObject($this->getObjectId(), $this->getObjectName());
			if(!$this->object) {
				$this->delete();
				return null;
			}
		}
		return $this->object;
	}

	/**
	 * @brief Setter Lie une representation d'un objet a l'item (objet ou tableau)
	 * @param mixed $element Representation de l'objet a lié
	 * 
	 */
	public function setObject($element) {
		if(is_object($element)) {
			$id = $element->getId();
			$name = getclass($element);
			$this->object = $element;
		}
		if(is_array($element)) {
			$id = isset($element['id']) ? $element['id'] : (isset($element[0]) ? $element[0] : null);
			$name = isset($element['name']) ? $element['name'] : (isset($element[1]) ? $element[1] : null);
		}
		if($id && $name) {
			$this->setObjectId($id);
			$this->setObjectName($name);
		}
	}

	/**
	 *
	 */
	public function hasObjectLoaded() {
		return (bool) $this->object;
	}

	/**
	 * @brief Verifie si deux items sont egaux
	 * @param mixed $element Representation d'un objet lié (objet ouu tableau)
	 * @return bool Vrai si l'objet lié est egale a l'element fournit
	 * 
	 */
	public function isEqual($element) {
		$is_equal = false;
		$id = null;
		$name = null;
		if(!$this->isDeleted()) {
			if(is_object($element)) {
				$id = $element->getId();
				$name = getclass($element);
			}
			if(is_array($element)) {
				$id = isset($element['id']) ? $element['id'] : (isset($element[0]) ? $element[0] : null);
				$name = isset($element['name']) ? $element['name'] : (isset($element[1]) ? $element[1] : null);
			}
			if($id && $name) {
				$is_equal = $this->getObjectId() == $id && $this->getObjectName() == $name;
				//Evite une requete pour recuperer l'objet
				if($is_equal && is_object($element)) {
					$this->setObjectLoaded($element);
				}
			}
		}
		return $is_equal;
	}

/******************************************************************************/
		/**********************/
		/*Optimisation requete*/
		/**********************/
/******************************************************************************/

	/**
	 * @brief Fixe l'objet lié 
	 * @param BaseObject $object Objet lié
	 *
	 * Fonction pour le chargement automatique, ne doit pas etre utilisé
	 * pour une utilisation normal
	 *
	 */
	public function setObjectLoaded(BaseObject $object) {
		if(getclass($object) == $this->getObjectName()) {
			$this->object = $object;
		}
	}

/******************************************************************************/
		/************/
		/*Sauvegarde*/
		/************/
/******************************************************************************/

	/**
	 * @brief Sauvegarde l'item en base de donnée
	 * @param Connection $con Connection a la base de donnée
	 * 
	 */
	public function save(PropelPDO $con = null) {
		if($this->getObjectId() && $this->getObjectName()) {
			parent::save();
		}
	}
}
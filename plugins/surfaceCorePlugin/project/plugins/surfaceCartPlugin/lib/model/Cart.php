<?php

/**
 * @brief Plugin Cart
 * @class Cart
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 fevrier 2010
 *
 */
class Cart extends BaseCart{
	/*	 * *************************************************************************** */
	/*	 * ******** */
	/* Attributs */
	/*	 * ******** */
	/*	 * *************************************************************************** */

	/**
	 * @brief Le cart se sauvegarde tout seul dés qu'il est modifié.
	 * @var bool
	 */
	protected $autosave;

	/*	 * *************************************************************************** */
	/*	 * *************** */
	/* Getter && Setter */
	/*	 * *************** */
	/*	 * *************************************************************************** */

	/**
	 * @brief Setter Ajoute l'element donné au panier
	 * @param mixed $element
	 * 
	 */
	public function addItem($element, $dbprocess = false){
		if($element && !$this->hasItem($element, $dbprocess)){
			$cart_item = $this->getNewItem();
			$cart_item->setObject($element);
		}
		if($this->isAutosave()){
			$this->save();
		}
	}

	/**
	 * @brief Setter Ajoute tous les elements au panier
	 * @param array $elements
	 * 
	 */
	public function addAllItems($elements, $dbprocess = false){
		$autosave = $this->isAutosave();
		$this->setAutosave(false);
		if(is_array($elements)){
			foreach($elements as $element){
				$this->addItem($element, $dbprocess);
			}
		}
		$this->setAutosave($autosave);
		if($this->isAutosave()){
			$this->save();
		}
	}

	/**
	 * @brief Getter Retourne l'objet lié correspondant
	 * @param mixed $element Representation d'un item
	 * @return BaseObject L'objet lié
	 * 
	 */
	public function getItem($element, $dbprocess = false){
		if($dbprocess){
			$keys = CartItemPeer::getElementKeys($element);
			$criteria = new Criteria();
			$criteria->add(CartItemPeer::CART_ID, $this->getId());
			$criteria->add(CartItemPeer::OBJECT_ID, $keys['id']);
			$criteria->add(CartItemPeer::OBJECT_NAME, $keys['name']);
			$item = CartItemPeer::doSelectOne($criteria);

			if($item && ($object = $item->getObject())){
				return $object;
			}
		}else{
			foreach($this->getCartItems() as $item){
				if($item->isEqual($element)){
					$object = $item->getObject();
					if($object){
						return $object;
					}
				}
			}
		}
		return null;
	}

	/**
	 * @brief Getter Retourne tous les objets liés au panier
	 * @param string $type Un type d'item du panier
	 * @return array Les objets du panier
	 * 
	 */
	public function getAllItems($type = null, $dbprocess = false){
		$items = array();
		if($dbprocess){
			$criteria = new Criteria();
			if($type){
				$criteria->add(CartItemPeer::CART_ID, $this->getId());
				$criteria->add(CartItemPeer::OBJECT_NAME, $type);
			}
			return CartItemPeer::doSelect($criteria);
		}else{
			$this->loadAllObjects($type);
			foreach($this->getCartItems() as $item){
				if((!$type || ($type && $item->getObjectName() == $type) && $item->getObject())){
					$items[] = $item->getObject();
				}
			}
		}
		return $items;
	}

	/**
	 * @brief Getter Retourne un tableau avec tout les id des objets liés au panier
	 * @param string $type Un type d'item du panier
	 * @return array Les id des objets du panier
	 *
	 */
	public function getAllItemsId($type = null, $dbprocess = false){
		$items = array();
		if($dbprocess){
			$criteria = new Criteria();
			if($type){
				$criteria->add(CartItemPeer::CART_ID, $this->getId());
				$criteria->add(CartItemPeer::OBJECT_NAME, $type);
			}
			$items = CartItemPeer::doSelectFieldValues(CartItemPeer::OBJECT_ID, $criteria, true);
		}else{
			foreach($this->getCartItems() as $item){
				if(!$type || $item->getObjectName() == $type){
					$items[] = $item->getObjectId();
				}
			}
		}
		return $items;
	}

	/**
	 * @brief Setter Supprime un item du panier
	 * @param mixed $element L'item a supprimer
	 * 
	 */
	public function deleteItem($element, $dbprocess = false){
		if($dbprocess){
			$criteria = new Criteria();

			if(is_object($element)){
				$id = $element->getId();
				$name = getclass($element);
			}
			if(is_array($element)){
				$id = isset($element['id']) ? $element['id'] : (isset($element[0]) ? $element[0] : null);
				$name = isset($element['name']) ? $element['name'] : (isset($element[1]) ? $element[1] : null);
			}
			$criteria->add(CartItemPeer::CART_ID, $this->getId());
			$criteria->add(CartItemPeer::OBJECT_ID, $id);
			$criteria->add(CartItemPeer::OBJECT_NAME, $name);
			CartItemPeer::doDelete($criteria);
		}else{
			foreach($this->getCartItems() as $index=>$item){
				if($item->isEqual($element)){
					$item->delete();
					unset($this->collCartItems[$index]);
					break;
				}
			}
			if($this->isAutosave()){
				$this->save();
			}
		}
	}

	/**
	 * @brief Setter Supprime tout le panier
	 * @param string $type Un type d'item du panier
	 * 
	 */
	public function deleteAllItems($type = null, $dbprocess = false){
		if($dbprocess){
			$criteria = new Criteria();
			if($type){
				$criteria->add(CartItemPeer::OBJECT_NAME, $type);
			}
			$criteria->add(CartItemPeer::CART_ID, $this->getId());
			CartItemPeer::doDelete($criteria);
		}else{
			foreach($this->getCartItems() as $index=>$item){
				if(!$type || ($type == $item->getObjectName())){
					$item->delete();
					unset($this->collCartItems[$index]);
				}
			}
			if($this->isAutosave()){
				$this->save();
			}
		}
	}

	/**
	 * @brief Getter Vérifie l'existence d'un item
	 * @param mixed $element L'item a vérifier
	 * @return Vrai si l'item existe
	 * 
	 */
	public function hasItem($element, $dbprocess = false){
		return (bool)$this->getItem($element, $dbprocess);
	}

	/**
	 * @brief Getter Vérifie la présence d'un type d'item
	 * @param string $type Type d'item a vérifié
	 * @return bool Vrai si le type est contenue au moins une fois dans le cart
	 * 
	 */
	public function hasTypeItems($type){
		$types = $this->getStatistic();
		return isset($types[$type]);
	}

	/**
	 * @brief Getter Vérifie si le panier est vide
	 * @return Vrai si le panier est vide
	 * 
	 */
	public function isEmpty(){
		return count($this->getCartItems()) == 0;
	}

	/**
	 * @brief Setter Vide le panier
	 * 
	 */
	public function emptyCart($dbprocess = false){
		$this->deleteAllItems(null, $dbprocess);
	}

	/**
	 * @brief Getter Compte le nombre d'element du panier
	 * @param string $type Un type d'item du panier
	 * @return int Nombre d'element dans le panier
	 * 
	 */
	public function count($type = null, $dbprocess = false){
		return count($this->getAllItemsId($type, $dbprocess));
	}

	/**
	 * @brief Retourne un nouvelle item associé au panier
	 * @return CartItem Un item associé au panier
	 * 
	 */
	protected function getNewItem(){
		$item = new CartItem();
		$this->addCartItem($item);
		return $item;
	}

	/**
	 * @brief Retourne un tableau resumant les items presents
	 * @return array Le tableau resumé
	 *
	 * Retourne un tableau associatif avec comme clef chacun des noms d'items
	 * et comme valeur le nombre de ce type d'item.
	 *
	 */
	public function getStatistic(){
		$array = array();
		foreach($this->getCartItems() as $item){
			$array[] = $item->getObjectName();
		}
		$array = array_count_values($array);

		$config = Cart::getGlobalConfig();
		$order = get(array('order', 'statistic'), $config);
		if(is_array($order)){
			$tmp = $array;
			$array = array();
			foreach($order as $type){
				if(isset($tmp[$type])){
					$array[$type] = $tmp[$type];
					unset($tmp[$type]);
				}
			}
			if(count($tmp)){
				foreach($tmp as $type=>$count){
					$array[$type] = $count;
				}
			}
		}
		return $array;
	}

	/**
	 * @brief Retourne un tableau avec le nom des items
	 * @return array Le tableau des noms
	 * 
	 */
	public function getNamesOfAssociatedItems(){
		$array = array();
		foreach($this->getCartItems() as $item){
			$array[] = $item->getObjectName();
		}
		$array = array_unique($array);

		$config = Cart::getGlobalConfig();
		$order = get(array('order', 'associated_items'), $config);
		if(is_array($order)){
			$tmp = $array;
			$array = array();
			foreach($order as $type){
				if(isset($tmp[$type])){
					$array[] = $type;
					unset($tmp[$type]);
				}
			}
			if(count($tmp)){
				foreach($tmp as $type){
					$array[] = $type;
				}
			}
		}
		return $array;
	}

	/*	 * *************************************************************************** */
	/*	 * ******************* */
	/* Optimisation requete */
	/*	 * ******************* */
	/*	 * *************************************************************************** */

	/**
	 * @brief Charge a partir de la base de données tout les objets d'un type
	 * @param string $object_name Type d'objet
	 *
	 * Cette fonction permet de chargé tout les items d'un type en une
	 * seule requete. Cela limite le nombre de requete lorsqu'on travail
	 * beaucoup sur un type d'element dans une action.
	 * Si cette element est definit comme autoload, cela sera fait
	 * automatiquement au chargement du cart.
	 *
	 */
	public function loadAllObjects($object_name){
		$ids = array();
		$items = $this->getAllItemsNotLoaded($object_name);
		foreach($items as $item){
			$ids[] = $item->getId();
		}
		if(!empty($ids)){
			$objects = CartPeer::doSelectAllObjects($this->getId(), $object_name, $ids);
			foreach($items as $item){
				foreach($objects as $index=>$object){
					if($item->getObjectId() == $object->getid()){
						$item->setObjectLoaded($object);
						unset($objects[$index]);
						break;
					}
				}
			}
		}
	}

	/**
	 * @brief Recupere tout les items, sans leur objet chargé, d'un type donnée
	 * @param string $object_name Type d'objet
	 * @return array Tableau des items sans leur objet chargé
	 *
	 */
	protected function getAllItemsNotLoaded($object_name){
		$items = array();
		foreach($this->getCartItems() as $item){
			if($item->getObjectName() == $object_name && !$item->hasObjectLoaded()){
				$items[] = $item;
			}
		}
		return $items;
	}

	/**
	 * @brief Verifie dans la configuration si le type est en autoload
	 * @param string $type Type d'element
	 * @return bool Vrai si le type donnée est autoloadé
	 *
	 */
	protected function isToAutoload($type = null){
		if($type){
			$config = Cart::getConfig($type);
			$autoload_app = get(array('autoload', 'app'), $autoload, array());
			$autoload_module = get(array('autoload', 'module'), $autoload, array());
			$app = SF_APP;
			$module = sfContext::getInstance()->getModuleName();
			return in_array($app, $autoload_app) || in_array($module, $autoload_module);
		}else{
			$config = Cart::getGlobalConfig();
			return get('autoload', $config, false);
		}
	}

	/*	 * *************************************************************************** */
	/*	 * ****** */
	/* Hydrate */
	/*	 * ****** */
	/*	 * *************************************************************************** */

	/**
	 * @brief Surcharge pour prendre en compte l'autoload
	 * @param ResultSet $rs
	 * @param int $startcol
	 * 
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false){
		parent::hydrate($row, $startcol, $rehydrate);
		if($this->getSelected() && $this->isToAutoload()){
			$names = $this->getNamesOfAssociatedItems();
			foreach($names as $name){
				if($this->isToAutoload($name)){
					$this->loadAllObjects($name);
				}
			}
		}
	}

	/*	 * *************************************************************************** */
	/*	 * ************************ */
	/* Sauvegarde et Suppression */
	/*	 * ************************ */
	/*	 * *************************************************************************** */

	/**
	 * @brief Sauvegarde en base de donnée
	 * @param Connection $con Connection a la base de donnée
	 * 
	 */
	public function save(PropelPDO $con = null){
		parent::save($con);
	}

	/**
	 * @brief Supprime en base de donnée
	 * @param Connection $con Connection a la base de donnée
	 * 
	 */
	public function delete(PropelPDO $con = null){
		$criteria = new Criteria();
		$criteria->add(CartItemPeer::CART_ID, $this->getId());
		CartItemPeer::doDelete($criteria, $con);
		parent::delete($con);
	}

	/*	 * *************************************************************************** */
	/*	 * ******* */
	/* Autosave */
	/*	 * ******* */
	/*	 * *************************************************************************** */

	/**
	 * @brief Retourne vrai si l'objet est en autosave
	 * @return bool Vrai si le cart est en autosave
	 *
	 */
	public function isAutosave(){
		if(!isset($this->autosave)){
			$this->reloadAutosave();
		}
		return $this->autosave;
	}

	/**
	 * @brief Recharge avec la valeur en config l'autosave
	 * 
	 */
	public function reloadAutosave(){
		$config = Cart::getGlobalConfig();
		$this->autosave = get('autosave', $config, true);
	}

	/**
	 * @brief Fixe une valeur pour l'autosave
	 * @param bool $autosave Nouvelle valeur de l'autosave
	 * 
	 */
	public function setAutosave($autosave){
		$this->autosave = (bool)$autosave;
	}

	/*	 * *************************************************************************** */
	/*	 * ************ */
	/* Configuration */
	/*	 * ************ */
	/*	 * *************************************************************************** */

	public static function getConfig($class = null){
		return $config = sfConfig::get('app_cart_'.$class, array());
	}

	public static function getGlobalConfig(){
		return sfConfig::get('app_cart_global');
	}

	public static function getItemName($class, $plural = false){
		$config = Cart::getConfig($class);
		$name = get('name', $config, $class);
		if(is_string($name)){
			if($plural){
				$name = $name.'s';
			}
		}
		if(is_array($name)){
			if($plural){
				$name = get('plural', $name, $class.'s');
			}else{
				$name = get('singular', $name, $class);
			}
		}
		return $name;
	}

}
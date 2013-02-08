<?php

class sfSurfaceBasketHolder{

	protected static $DEFAULT_INFO = array('opened' => false,
		'ref_object_key' => null,
		'module_search' => null,
		'add_item_callback' => null,
		'add_item_name' => 'basket_add',
		'add_item_icon' => '/sfSurfaceGeneratorPlugin/images/link.png',
		'add_item_target' => 'tg_east',
	);
	protected $basket_key = null;
	protected $info = array();
	protected $items = array();

	public function __construct(){
		$this->info = array_merge(array(), self::$DEFAULT_INFO);
	}

	public static function get($basket_key){
		if($basket_key){
			$basket = new sfSurfaceBasketHolder();
			if($basket->load($basket_key)){
				return $basket;
			}
		}
		return null;
	}

	public static function open($basket_key, $ref_object_key){
		if($basket_key){
			if(is_object($ref_object_key)){
				if(is_subclass_of($ref_object_key, 'BaseObject')){
					$ref_object_key = $ref_object_key->getPrimaryKey();
				}
			}

			$basket = new sfSurfaceBasketHolder();
			$basket->load($basket_key);
			$basket->info = array_merge(self::$DEFAULT_INFO, array('opened' => true,
				'ref_object_key' => $ref_object_key));
			$basket->items = array();
			return $basket->save() ? $basket : null;
		}

		return null;
	}

	public function close(){
		$this->info['opened'] = false;
		$this->items = array();
		return $this->destroy();
	}

	public function isOpened(){
		return ($this->info['opened']);
	}

	public function isSameRefObjectKey($cmp_object_key){
		if(is_object($cmp_object_key)){
			if(is_subclass_of($cmp_object_key, 'BaseObject')){
				$cmp_object_key = $cmp_object_key->getPrimaryKey();
			}
		}

		return ($this->info['ref_object_key'] == $cmp_object_key);
	}

	public function getKey(){
		return $this->basket_key;
	}

	public function setInfo($parameters){
		$this->info = array_merge($this->info, $parameters);
		$this->save();
	}

	public function getInfo($parameter){
		return (isset($this->info[$parameter]) ? $this->info[$parameter] : null);
	}

	public function isEmpty($basket_key){
		return empty($this->items);
	}

	public function clear(){
		return $this->destroy();
	}

	public function addItem($item){
		if(is_object($item)){
			if(is_subclass_of($item, 'BaseObject')){
				return $this->addPropelItem(get_class($item), $item->getPrimaryKey());
			}
		} elseif(is_array($item)){
			// TODO
		} else {
			$this->items[] = $item;
			return $this->save();
		}

		return false;
	}

	public function addPropelItem($item_class, $item_key){
		$this->items[$item_class][$item_key] = $item_key;
		return $this->save();
	}

	public function removeItem($item){
		if(is_object($item)){
			if(is_subclass_of($item, 'BaseObject')){
				return $this->removePropelItem(get_class($item), $item->getPrimaryKey());
			}
		} elseif(is_array($item)){
			// TODO
		} else {
			$key = array_search($item, $this->items);
			if($key !== FALSE){
				unset($this->items[$key]);
				return $this->save();
			}
		}

		return false;
	}

	public function removePropelItem($item_class, $item_key){
		unset($this->items[$item_class][$item_key]);
		return $this->save();
	}

	public function hasItem($item){
		if(is_object($item)){
			if(is_subclass_of($item, 'BaseObject')){
				$item_key = $item->getPrimaryKey();
				return (isset($this->items[get_class($item)])) && array_key_exists($item_key, $this->items[get_class($item)]);
			}
		} elseif(is_array($item)){
			// TODO
		} else {
			return in_array($item, $this->items);
		}

		return false;
	}

	public function getItemsPropelKey($object_class){
		if(isset($this->items[$object_class])){
			return array_keys($this->items[$object_class]);
		}

		return array();
	}

	public function getItems(){
		$items = array();
		// return $this->items;
		foreach($this->items as $key => $value){
			if(is_array($value)){
				foreach($value as $pk => $data){
					$object = call_user_func(array($key.'Peer', 'retrieveByPK'), $pk);
					$items[] = $object;
				}
			} else {
				$items[] = $value;
			}
		}

		return $items;
	}

	protected function load($basket_key){
		$this->basket_key = $basket_key;
		$this->data = null;
		if(sfContext::hasInstance()){
			$user = sfContext::getInstance()->getUser();
			if($user){
				$data = $user->getAttribute($basket_key, null, 'surface_basket');
				if($data){
					if(isset($data['info'])){
						$this->info = $data['info'];
					}
					if(isset($data['items'])){
						$this->items = $data['items'];
					}
					return true;
				}
			}
		}

		return false;
	}

	protected function save(){
		if($this->basket_key){
			if(sfContext::hasInstance()){
				$user = sfContext::getInstance()->getUser();
				if($user){
					$data = array('info' => $this->info,
						'items' => $this->items);
					$user->setAttribute($this->basket_key, $data, 'surface_basket');
					return true;
				}
			}
		}

		return false;
	}

	protected function destroy(){
		if(sfContext::hasInstance()){
			$user = sfContext::getInstance()->getUser();
			if($user){
				$user->getAttributeHolder()->remove($this->basket_key, 'surface_basket');
				$this->info = array('opened' => false,);
				$this->items = array();
				$this->basket_key = null;
				return true;
			}
		}

		return false;
	}

	public static function getBasketForModule($search_module){
		if(sfContext::hasInstance()){
			$user = sfContext::getInstance()->getUser();
			if($user){
				$baskets = $user->getAttributeHolder()->getAll('surface_basket');
				foreach($baskets as $basket_key => $basket){
					if(isset($basket['info']['module_search'])
							&& ( $basket['info']['module_search'] == $search_module)){
						return self::get($basket_key);
					}
				}
			}
		}

		return null;
	}

	/*
	 * rotected static $DEFAULT_INFO = array( 'opened'            => false,
	 * module_search'     => null,
	 * add_item_callback' => null,
	 * add_item_name'     => 'basket_add',
	 * add_item_icon'     => '/sfSurfaceGeneratorPlugin/images/link.png',
	 * add_item_target'   => 'tg_east',
	 * ;
	 * rotected $basket_key = null;
	 * rotected $info = array();
	 * rotected $items = array();
	 * ublic function __construct() {
	 * this->info = array_merge(array(), self::$DEFAULT_INFO);
	  }
	 * ublic static function initialize($basket_key) {
	 * f ($basket_key) {
	 * basket = new sfSurfaceBasketHolder();
	 * basket->load($basket_key);
	 * eturn $basket;
	  }
	 * eturn null;
	  }
	 * ublic function isOpened() {
	 * eturn ($this->info['opened']);
	  }
	 * ublic function getKey() {
	 * eturn $this->basket_key;
	  }
	 * ublic function setInfo($parameters) {
	 * this->info = array_merge(self::$DEFAULT_INFO, $parameters);
	 * this->save();
	  }
	 * ublic function getInfo($parameter) {
	 * eturn (isset($this->info[$parameter])? $this->info[$parameter] : null);
	  }
	 * ublic function isEmpty($basket_key) {
	 * eturn empty($this->items);
	  }
	 * ublic function open() {
	 * this->info['opened'] = true;
	 * this->items = array();
	 * eturn $this->save();
	  }
	 * ublic function close() {
	 * this->info['opened'] = false;
	 * this->items = array();
	 * eturn $this->save();
	  }
	 * ublic function clear() {
	 * eturn $this->destroy();
	  }
	 * ublic function addItem($item) {
	 * f (is_object($item)) {
	 * f (is_subclass_of($item, 'BaseObject')) {
	 * eturn $this->addPropelItem(get_class($item), $item->getPrimaryKey());
	  }
	  }
	 * lse if (is_array($item)) {
	 * / TODO
	  }
	 * lse {
	 * items[] = $item;
	 * eturn $this->save();
	  }
	 * eturn false;
	  }
	 * ublic function addPropelItem($item_class, $item_key) {
	 * this->items[$item_class][$item_key] = $item_key;
	 * eturn $this->save();
	  }
	 * ublic function hasItem($item) {
	 * f (is_object($item)) {
	 * f (is_subclass_of($item, 'BaseObject')) {
	 * item_key = $item->getPrimaryKey();
	 * eturn (isset($this->items[get_class($item)])) && array_key_exists($item_key, $this->items[get_class($item)]);
	  }
	  }
	 * lse if (is_array($item)) {
	 * / TODO
	  }
	 * lse {
	 * eturn in_array($item, $this->items);
	  }
	 * eturn false;
	  }
	 * ublic function getItemsPropelKey($object_class) {
	 * f (isset($this->items[$object_class])) {
	 * eturn array_keys($this->items[$object_class]);
	  }
	 * eturn array();
	  }
	 * ublic function getItems() {
	 * items = array();
	 * / return $this->items;
	 * oreach ($this->items as $key => $value) {
	 * f (is_array($value)) {
	 * oreach($value as $pk => $data) {
	 * object = call_user_func(array($key.'Peer', 'retrieveByPK'), $pk);
	 * items[] = $object;
	  }
	  }
	 * lse {
	 * items[] = $value;
	  }
	  }
	 * eturn $items;
	  }
	 * rotected function load($basket_key) {
	 * this->basket_key = $basket_key;
	 * this->data = null;
	 * f (sfContext::hasInstance()) {
	 * user = sfContext::getInstance()->getUser();
	 * f ($user) {
	 * data = $user->getAttribute($basket_key, null, 'surface_basket');
	 * f ($data) {
	 * f (isset($data['info'])) {
	 * this->info = $data['info'];
	  }
	 * f (isset($data['items'])) {
	 * this->items = $data['items'];
	  }
	 * eturn true;
	  }
	  }
	  }
	 * eturn false;
	  }
	 * rotected function save() {
	 * f ($this->basket_key) {
	 * f (sfContext::hasInstance()) {
	 * user = sfContext::getInstance()->getUser();
	 * f ($user) {
	 * data = array('info'    => $this->info,
	 * items'   => $this->items);
	 * user->setAttribute($this->basket_key, $data, 'surface_basket');
	 * eturn true;
	  }
	  }
	  }
	 * eturn false;
	  }
	 * rotected function destroy() {
	 * f (sfContext::hasInstance()) {
	 * user = sfContext::getInstance()->getUser();
	 * f ($user) {
	 * user->getAttributeHolder()->remove($this->basket_key, 'surface_basket');
	 * this->info = array('opened' => false,);
	 * this->items = array();
	 * this->basket_key = null;
	 * eturn true;
	  }
	  }
	 * eturn false;
	  }
	 * ublic static function getBasketForModule($search_module) {
	 * f (sfContext::hasInstance()) {
	 * user = sfContext::getInstance()->getUser();
	 * f ($user) {
	 * baskets = $user->getAttributeHolder()->getAll('surface_basket');
	 * oreach ($baskets as $basket_key => $basket) {
	 * f (   isset($basket['info']['module_search'])
	 * & ($basket['info']['module_search'] == $search_module))
	  {
	 * eturn self::initialize($basket_key);
	  }
	  }
	  }
	  }
	 * eturn null;
	  }
	 */
}


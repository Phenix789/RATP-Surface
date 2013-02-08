<?php
/**
 * @brief Class representant un item de menu surface
 * @class sfcMenuItem
 * @package surface
 * @subpackage menu
 *
 * @author Claude <claude@elogys.fr>
 * @date 6 avr. 2010
 * @version 1.0
 *
 */
class sfcMenuItem {

	/**
	 * @var string Nom de l'item
	 */
	protected $name;
	/**
	 * @var string Label de l'item
	 */
	protected $label;
	/**
	 * @var title Label de l'attribut title d'un lien
	 */
	protected $title = null;
	/**
	 * @var string Lien sur l'image a affiché avec le lien
	 */
	protected $icon;
	/**
	 * @var string Cible du lien
	 */
	protected $link = '#';
	/**
	 * @var bool Definie si le lien est une action ajax
	 */
	protected $is_ajax = false;
	/**
	 * @var string Target pour le resultat d'une action ajax
	 */
	protected $target = null;
	/**
	 * @var bool Determine si l'action s'enregistre dans l'historique de navigation surface
	 */
	protected $skip_navigate = false;
	/**
	 * @var bool Determine si le lien pointe sur un controller
	 */
	protected $is_controller = false;
	/**
	 * @var array Collection d'item pour la construction de sous menu
	 */
	protected $items = array();
	/**
	 * @var array Droit necessaire pour accedez a l'item
	 */
	protected $allow;
	/**
	 * @var string Class CSS a apposé sur l'item
	 */
	protected $class = '';
	/**
	 * @var string Class CSS a apposé sur le lien
	 */
	protected $class_link = '';
	/**
	 * @var array Parametre de rendu spécifique
	 */
	protected $render = null;
	/**
	 * @var sfcMenuItem Element parent a celui ci
	 */
	protected $parent = null;
	/**
	 * @var bool Determine si l'item doit etre mis a jour
	 */
	protected $to_update = false;

	/**
	 * @var string Javascript action to put in onclick
	 */
	protected $onclick;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	/**
	 * @brief Constructeur
	 * @param string $name Nom de l'item
	 */
	public function __construct($name) {
		$this->name = $name;
	}

/******************************************************************************/
		/******************/
		/*Getter && Setter*/
		/******************/
/******************************************************************************/

	/**
	 * @brief Getter - Retourne l'attribut "name"
	 * @return string
	 * 
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @brief Getter - Retourne l'attribut "label"
	 * @return string
	 *
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @brief Setter - Fixe l'attribut "label"
	 * @param string
	 * 
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @brief Getter - Retourne l'attribut "icon"
	 * @return string
	 *
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * @brief Setter - Fixe l'attribut "icon"
	 * @param string
	 *
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}

	/**
	 * @brief Getter - Retourne l'attribut "title"
	 * @return string
	 *
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @brief Setter - Fixe l'attribut "title"
	 * @param string
	 *
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @brief Getter - Retourne l'attribut "link"
	 * @return string
	 *
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @brief Setter - Fixe l'attribut "link"
	 * @param string
	 *
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @brief Vérifie si le lien est une ancre (commence par #)
	 * @return bool Vrai si le lien est une ancre
	 *
	 */
	public function isAnchor() {
		return (bool) (strpos($this->getLink(), "#") === 0);
	}

	/**
	 * @brief Getter - Retourne l'attribut "is_ajax"
	 * @return bool
	 * @see getIsAjax
	 *
	 */
	public function isAjax() {
		return $this->getIsAjax();
	}

	/**
	 * @brief Getter - Retourne l'attribut "is_ajax"
	 * @return bool
	 *
	 */
	public function getIsAjax() {
		return $this->is_ajax;
	}

	/**
	 * @brief Setter - Fixe l'attribut "is_ajax"
	 * @param bool
	 *
	 */
	public function setIsAjax($is_ajax) {
		$this->is_ajax = $is_ajax;
	}

	/**
	 * @brief Getter - Retourne l'attribut "target"
	 * @return string
	 *
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * @brief Setter - Fixe l'attribut "target"
	 * @param string
	 *
	 */
	public function setTarget($target) {
		$this->target = $target;
	}

	/**
	 * @brief Getter - Retourne l'attribut "skip_navigation"
	 * @return bool
	 *
	 */
	public function getSkipNavigate() {
		return $this->skip_navigate;
	}

	/**
	 * @brief Setter - Fixe l'attribut "skip_navigation"
	 * @param bool
	 *
	 */
	public function setSkipNavigate($skip_navigate) {
		$this->skip_navigate = $skip_navigate;
	}

	/**
	 * @brief Getter - Retourne l'attribut "is_controller"
	 * @return bool
	 * @see getIsController
	 *
	 */
	public function isController() {
		return $this->getIsController();
	}

	/**
	 * @brief Getter - Retourne l'attribut "is_controller"
	 * @return bool
	 *
	 */
	public function getIsController() {
		return $this->is_controller;
	}

	/**
	 * @brief Setter - Fixe l'attribut "is_controller"
	 * @param bool
	 *
	 */
	public function setIsController($is_controller) {
		$this->is_controller = $is_controller;
	}

	/**
	 * @brief Getter - Retourne l'attribut "allow"
	 * @return array
	 *
	 */
	public function getAllow() {
		return $this->allow;
	}

	/**
	 * @brief Setter - Fixe l'attribut "allow"
	 * @param array
	 *
	 */
	public function setAllow($allow) {
		$this->allow = $allow;
	}

	/**
	 * @brief Getter - Retourne l'attribut "items"
	 * @return array
	 *
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * @brief Getter - Retourne l'attribut "class"
	 * @return string
	 *
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * @brief Setter - Fixe l'attribut "class"
	 * @param string
	 *
	 */
	public function setClass($class) {
		$this->class = $class;
	}

	/**
	 * @brief Getter - Retourne l'attribut "class"
	 * @return string
	 *
	 */
	public function getClassLink() {
		return $this->class_link;
	}

	/**
	 * @brief Setter - Fixe l'attribut "class_link"
	 * @param string
	 *
	 */
	public function setClassLink($class_link) {
		$this->class_link = $class_link;
	}

	/**
	 * @brief Getter - Retourne l'attribut "render"
	 * @return array
	 *
	 */
	public function getRender() {
		return $this->render;
	}

	/**
	 * @brief Setter - Fixe l'attribut "render"
	 * @param array
	 *
	 */
	public function setRender($render) {
		$this->render = $render;
	}

	/**
	 * @brief Getter - Retourne l'attribut "parent"
	 * @return sfcMenuItem
	 *
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @brief Setter - Fixe l'attribut "parent"
	 * @param sfcMenuItem
	 *
	 */
	public function setParent($parent) {
		$this->parent = $parent;
	}

	/**
	 * @brief Getter - Retourne l'attribut "to_update"
	 * @return string
	 * @see getIsToUpdate
	 *
	 */
	public function isToUpdate() {
		return $this->getIsToUpdate();
	}

	/**
	 * @brief Getter - Retourne l'attribut "to_update"
	 * @return string
	 *
	 */
	public function getIsToUpdate() {
		return $this->to_update;
	}

	/**
	 * @brief Setter - Fixe l'attribut "to_update"
	 * @param bool
	 *
	 */
	public function setIsToUpdate($to_update) {
		$this->to_update = (bool) $to_update;
	}

	/**
	 * @brief Vérifie si l'item de menu est a mettre a jour
	 * @return bool Vrai si au moins un des elements est a mettre a jour
	 *
	 */
	protected function isOrHasChildrenModified() {
		if($this->isToUpdate()) {
			return true;
		}
		else {
			foreach($this->getItems() as $sub_item) {
				if($sub_item->isOrHasChildrenModified()) {
					return true;
				}
			}
		}
		return false;
	}

/******************************************************************************/
		/*******/
		/*Allow*/
		/*******/
/******************************************************************************/

	/**
	 * @brief Allow - Ajoute un droit necessaire
	 * @param string $allow Droit supplementaire
	 * 
	 */
	public function addAllow($allow) {
		$this->allow[]  = $allow;
	}

	/**
	 * @brief Allow - Supprime tout les droits
	 * 
	 */
	public function clearAllow() {
		$this->allow = array();
	}

	/**
	 * @brief Vérifie les droits pour l'utilisateur donné ou a defaut celui en cours
	 * @param sfuser $user L'utilisateur a vérifié
	 * @return bool Vrai si l'utilisateur est autorisé
	 *
	 */
	public function isAuthorizedUser($user = null) {
		if($this->getAllow()) {
			if(!$user) { $user = sfContext::getInstance()->getUser(); }
			return $user->hasCredential($this->getAllow());
		}
		return true;
	}

/******************************************************************************/
		/*******/
		/*Items*/
		/*******/
/******************************************************************************/

	/**
	 * @brief Item - Ajoute l'item donné a la fin de la liste
	 * @param sfcMenuItem $item L'item a ajouter
	 *
	 */
	public function addItem(sfcMenuItem $item) {
		$item->setParent($this);
		$this->items[$item->getName()] = $item;
	}

	/**
	 * @brief Item - Ajoute l'item donné en premiere position
	 * @param sfcMenuItem $item L'item a ajouter
	 */
	public function addItemFirst(sfcMenuItem $item) {
		if($this->hasItems()) {
			$items = $this->getItems();
			$name = reset($items)->getName();
			$this->addItemBefore($item, $name);
		}
		else {
			$this->addItem($item);
		}
	}

	/**
	 * @brief Item - Ajoute l'item donné en derniere position
	 * @param sfcMenuItem $item  L'item a ajouter
	 */
	public function addItemLast(sfcMenuItem $item) {
		$this->addItem($item);
	}

	/**
	 * @brief Item - Ajoute l'item donné avant l'item nommé
	 * @param sfcMenuItem $item L'item a ajouter
	 * @param string $name Nom de l'item de position
	 *
	 */
	public function addItemBefore(sfcMenuItem $item, $name) {
		$item->setParent($this);
		$items = array();
		foreach($this->getItems() as $_item) {
			if($_item->getName() == $name) {
				$items[$item->getName()] = $item;
			}
			$items[$_item->getName()] = $_item;
		}
		$this->items = $items;
	}

	/**
	 * @brief Item - Ajoute l'item donné aprés l'item nommé
	 * @param sfcMenuItem $item L'item a ajouter
	 * @param string $name Nom de l'item de position
	 *
	 */
	public function addItemAfter(sfcMenuItem $item, $name) {
		$item->setParent($this);
		$items = array();
		foreach($this->getItems() as $_item) {
			$items[$_item->getName()] = $_item;
			if($_item->getName() == $name) {
				$items[$item->getName()] = $item;
			}
		}
		$this->items = $items;
	}

	/**
	 * @brief Item - Retourne l'item denommé
	 * @param string $name Nom de l'item
	 * @return sfcMenuItem
	 *
	 */
	public function getItem($name) {
		if(isset($this->items[$name])) {
			return $this->items[$name];
		}
		return null;
	}

	/**
	 * @brief Verifie si l'item dénommé est un sous item de cette ci
	 * @param string $name Nom de l'item recherché
	 * @return bool Vrai si l'item possede le sous item dénommé
	 * 
	 */
	public function hasItem($name) {
		return (bool) $this->getItem($name);
	}

	/**
	 * @brief Item - Verifie si l'item a des sous items
	 * @return bool Vrai si l'item a des sous items
	 *
	 */
	public function hasItems() {
		return (bool) $this->getItems();
	}

	/**
	 * @brief Item - Supprime l'item dénommé
	 * @param string $name Nom de l'item a supprimé
	 * @return sfcMenuItem L'enfant supprimé
	 *
	 */
	public function removeItem($name) {
		$item = $this->getItem($name);
		if($item) {
			$item->setParent(null);
			unset($this->items[$name]);
		}
		return $item;
	}

	/**
	 * @brief Item - Créé et ajoute un nouveau sous item
	 * @param string $name Nom du nouveau sous item
	 * @return sfcMenuItem Le nouveau sous item
	 *
	 */
	public function getNewItem($name) {
		$item = new sfcMenuItem($name);
		$this->addItem($item);
		return $item;
	}

/******************************************************************************/
		/********/
		/*Parent*/
		/********/
/******************************************************************************/

	/**
	 * @brief Tree - Vérifie si l'item est une racine
	 * @return bool Vrai si l'item est une racine
	 *
	 */
	public function isRoot() {
		return !((bool) $this->getParent());
	}

	/**
	 * @brief Tree - Retourne la racine du menu
	 * @return sfcMenuItem La racine du menu
	 * 
	 */
	public function getRoot() {
		if(!$this->isRoot()) {
			return $this->getParent()->getRoot();
		}
		return $this;
	}
	
	/**
	 * @brief Tree - Ajoute l'item donné a la fin de la liste
	 * @param sfcMenuItem $item L'item a ajouter
	 * @see addItem
	 *
	 */
	public function addChild($name) {
		return $this->addItem($name);
	}

	/**
	 * @brief Tree - Vérifie si l'item a l'enfant nommé
	 * @param string $name Nom de l'enfant
	 * @return bool Vrai si l'item a l'enfant nommé
	 * @see hasItem
	 *
	 */
	public function hasChild($name) {
		return $this->hasItem($name);
	}

	/**
	 * @brief Tree - Vérifie si l'item a des enfant
	 * @return bool Vrai si l'item a des enfants
	 * @see hasItems
	 *
	 */
	public function hasChildren() {
		return $this->hasItems();
	}

	/**
	 * @brief Tree - Retourne l'enfant portant le nom donné
	 * @param string $name Nom de l'enfant
	 * @return sfcMenuItem L'enfant
	 * @see getItem
	 *
	 */
	public function getChild($name) {
		return $this->getItem($name);
	}

	/**
	 * @brief Tree - Retourne les enfants de l'item
	 * @return array Les enfants de l'item
	 * @see getItems
	 * 
	 */
	public function getChildren() {
		return $this->getItems();
	}

	/**
	 * @brief Tree - Compte le nombre d'enfant
	 * @return int Nombre d'enfant
	 * 
	 */
	public function getNumberOfChildren() {
		return count($this->getChildren());
	}

	/**
	 * @brief Tree - Verifie si l'item est un enfant de l'item donné
	 * @param mixed $sfc_menu L'item suposé parent
	 * @return bool Vrai si l'item est un enfant de l'item donné
	 *
	 */
	public function isChildOf($sfc_menu) {
		if(is_object($sfc_menu)) {
			$sfc_menu = $sfc_menu->getName();
		}
		if(!$this->isRoot()) {
			return $this->getParent() == $sfc_menu;
		}
		return false;
	}

	/**
	 * @brief Tree - Retourne le niveau de l'item dans l'arbre
	 * @return int Niveau dans l'abre
	 *
	 */
	public function getLevel() {
		if($this->isRoot()) {
			return 0;
		}
		return 1 + $this->getParent()->getLevel();
	}

/******************************************************************************/
		/**********/
		/*toString*/
		/**********/
/******************************************************************************/

	/**
	 * @brief toString
	 * @return string
	 * 
	 */
	public function __toString() {
		return $this->getName();
	}

}

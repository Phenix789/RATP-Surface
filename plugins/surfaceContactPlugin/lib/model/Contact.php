<?php
/**
 * @brief
 * @class
 * @package Plugin
 * @subpackage SurfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 mars 2010
 * @version 1.0
 *
 */
class Contact extends BaseContact {

	/**
	 * @var BaseObject Objet d'extension
	 */
	protected $extend;

	/**
	 * @var string Nom de la class d'extension
	 */
	protected $extend_class;

	/**
	 * @brief Constructeur
	 * 
	 */
	public function __construct() {
		$config = $this->getConfig();
		if(isset($config['extend'])) {
			$this->extend_class = $config['extend'];
		}
	}

	/**
	 * @brief Getter Retourne les groupes du contact
	 * @return array Les groupes du contact
	 *
	 */
	public function getGroups() {
		$groups = array();
		foreach($this->getContactGroups() as $contact_group) {
			$groups[] = $contact_group->getGroup();
		}
		return $groups;
	}

	/**
	 * @brief Setter Ajoute un groupe au contact
	 * @param Group $group Le groupe a ajouté
	 * @return bool Vrai si le groupe a été ajouté.
	 *
	 */
	public function addGroup($group) {
		if($group) {
			foreach($this->getGroups() as $current_group) {
				if($current_group->getCodeName() == $group->getCodeName()) {
					return false;
				}
			}
			$contact_group = new ContactGroup();
			$contact_group->setGroup($group);
			$this->addContactGroup($contact_group);
			return true;
		}
		return false;
	}

	/**
	 * @brief Verifie si l'option groupe est activé pour l'objet
	 * @return bool Vrai si l'option groupe est activé
	 */
	public function groupIsActived() {
		$config = $this->getConfig();
		return get(array('group', 'active'), $config, false);
	}

	/**
	 * @brief Getter Retourne le parent de l'objet
	 * @return Contact Contact parent
	 *
	 */
	public function getParent() {
		return $this->getContactRelatedByParentId();
	}

	public function getParents() {
		return $this->getContactMultiplesRelatedByContactId();
	}

	/**
	 * @brief Setter
	 * @param Contact $parent Contact parent
	 *
	 */
	public function setParent($parent) {
		$this->setContactRelatedByParentId($parent);
	}

	/**
	 * @brief Retourne le nom de la class model de base
	 * @return string Le nom de la class
	 *
	 */
	protected function getBaseClass(){
		return __CLASS__;
	}

	/**
	 * @brief Getter Retrouve le complement du contact
	 * @param bool $create_if_null Créer un complement si aucun n'a été trouvé
	 * @return BaseObject Retourne le complement du contact
	 * 
	 */
	public function getExtend($create_if_null = true) {
		if(!$this->extend && $this->extend_class) {
			$extend_peer = $this->extend_class . 'Peer';
			$criteria = new Criteria();
			$criteria->add(constant($extend_peer . '::ID'), $this->getId());
			$this->extend = call_user_func(array($extend_peer, 'doSelectOne'), $criteria);
			if(!$this->extend && $create_if_null) {
				$this->extend = new $this->extend_class();
				$this->initExtend($this->extend);
			}
		}
		return $this->extend;
	}

	/**
	 * @brief Fonction appelé lors de la création d'un objet d'extension
	 * @param BaseObject Extension du contact
	 *
	 * Fonction vide. Cette fonction a vocation a etre surchargé. Elle est
	 * appelé lorsqu'un objet de la class d'extension est créé.
	 * 
	 */
	public function initExtend($extend) {
		
	}

	public function getConfig() {
		$base_class = $this->getBaseClass();
		$config = sfConfig::get('app_contact_inheritance');
		return get($base_class, $config, array());
	}

	/**
	 * @brief Vérifie si la fonction appelé ne porte pas sur le complement du contact
	 * @param string $name Nom de la fonction appelé
	 * @param array $arguments Arguments de la fonction appelé
	 * @return mixed Le resultat de la function appelé
	 * 
	 */
	public function __call($name, $arguments) {
		if($this->getExtend() && method_exists($this->getExtend(), $name)) {
			return call_user_func_array(array($this->getExtend(), $name), $arguments);
		}
		return parent::__call($name, $arguments);
	}

	/**
	 * @brief Sauvegarde l'objet en base
	 * @param Connection $con
	 * @return int Le nombre de colonne modifié (prend en compte les colonnes de l'extension)
	 *
	 */
	public function save(PropelPDO $con = null) {
		$rows = parent::save($con);
		if($this->getExtend(false)) {
			$this->getExtend()->setId($this->getId());
			$rows += $this->getExtend()->save($con);
		}
		return $rows;
	}

	/**
	 * @brief Supprime l'objet de la base de données
	 * @param Connection $con
	 * 
	 */
	public function delete(PropelPDO $con = null) {
		parent::delete($con);
		if($this->getExtend(false)) {
			$this->getExtend()->delete($con);
		}
	}
	
	
	public function getRoleAndAddressAndPhoneAndEmail() {
	    $data = array();
	    $role = '';
	    if ($this->getStructure()) {
		$data[] = $this->getStructure();
	    }
	    if ($this->getRole()) {
		$data[] = $this->getRole();
	    }
	    if ($this->getAddress1()) {
		$data[] = $this->getAddress1();
	    }
	    if ($this->getAddress2()) {
		$data[] = $this->getAddress2();
	    }
	    if ($this->getCity()) {
		$data[] = trim( $this->getPostalCode(). ' ' . $this->getCity());
	    }
	    if ($this->getPhone()) {
		$data[] = $this->getPhone();
	    }
	    if ($this->getMobile()) {
		$data[] = $this->getMobile();
	    }
	    if ($this->getEmail()) {
		$data[] = $this->getEmail();
	    }
	    return $data;
	}
	
	public function getContactsRelatedByParentId(){
	    
	    return ContactQuery::create()->filterByParentId($this->getId())->find();
	}
	
	
	public function getZone() {
	    if (!class_exists('ZonePeer')) {
		return null;
	    }
	    
	    return ZonePeer::retrieveByPK($this->getZoneId());
	}
	
	public function getZoneBreadcrumbsAsString() {
	    if ($zone = $this->getZone()) {
		return $zone->getBreadcrumbsAsString();
	    }
	    $breadcrumb = array();
	    if ($this->getCountry()) {
		$breadcrumb[] = $this->getCountry();
	    }
	    if ($this->getCity()) {
		$breadcrumb[] = $this->getCity();
	    }
	    return  implode(" > ", $breadcrumb);
	} 
	
	public function getZoneBreadcrumbs() {
	    if ($zone = $this->getZone()) {
		return $zone->getBreadcrumbs();
	    }	    
	}
	
	public function preSave(\PropelPDO $con = null) {
	    if (class_exists('ZonePeer') && ($this->isColumnModified(ContactPeer::POSTAL_CODE) || $this->isColumnModified(ContactPeer::CITY))) {
		$this->updateZoneId();
	    }
	    return parent::preSave($con);	    
	}
	
	public function updateZoneId($debug = false) {
	    $this->setZoneId(null);
	    if (trim($this->getPostalCode())) {
		$postal_code = (int) $this->getPostalCode();
		$city = strtoupper($this->getCity());
		
		if($position  = strpos($city, "CEDEX") ) { 
		    $city = substr($city,0,$position);
		}
		
		$city = trim($city);
		
		if ($debug) {
		    var_dump($postal_code ." ". $city);
		}

		$zone = ZonePeer::retrieveByAttribute1AndName($postal_code, $city, 'commune');
		if($debug) { var_dump('match1 : ' . $zone);}
		
		if(!$zone){
		    $dep_code = substr($postal_code, 0, 2);
		    $zone = ZonePeer::retrieveByAttribute1AndName($dep_code, $city, 'commune', true);
		    if($debug) { var_dump('match2 : ' . $zone);}
		}
		
		if(!$zone){
		    $zone = ZonePeer::retrieveByAttribute1($postal_code, 'commune');
		    if($debug) { var_dump('match3 : ' . $zone);}
		}
		
		if(!$zone && strlen($postal_code) == 2){
		    $zone = ZonePeer::retrieveByAttribute1($postal_code, 'departement');
		    if($debug) { var_dump('match4 : ' . $zone);}
		}

		if($zone){
		    $this->setZoneId($zone->getId());
		}		
	    }
	}
}

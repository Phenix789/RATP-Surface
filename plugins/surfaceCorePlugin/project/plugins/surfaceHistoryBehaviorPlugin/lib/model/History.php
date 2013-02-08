<?php

/**
 *
 *
 */
class History extends BaseHistory{

	protected $contacts; /*	 * @var $contacts Tableau des contacts lié a l'evenement* */
	protected $object; /*	 * @var $object Objet auquel est attaché l'evenement* */

	/**
	 * @brief Retourne les contacts lié a l'evenement
	 * @fn public function getContacts()
	 * @return array Tableau des contacts
	 *
	 */
	public function getContacts(){
		if(!$this->contacts){
			$this->contacts = array();
			foreach($this->getHistoryContacts() as $history_contact){
				if($history_contact->getContact()){
					$this->contacts[] = $history_contact->getContact();
				} else {
					$history_contact->delete();
				}
			}
		}
		return $this->contacts;
	}

	public function addContacts($contacts){
		if(is_array($contacts)){
			foreach($contacts as $contact){
				$this->addContact($contact);
			}
		} else {
			return $this->addContact($contacts);
		}
	}

	public function addContact($contact){
		$config = History::getConfig($this->getObjectName());
		if(is_object($contact)){
			$id = $contact->getId();
			$class = getclass($contact);
		}
		if(is_array($contact)){
			$contact_class = $config['contact']['object'];
			$id = get('id', $contact);
			$class = get('class', $contact, $contact_class);
			if(!$id && isset($contact[0])){
				$id = $contact[0];
			}
			if(!$class){
				if(isset($contact[1])){
					$class = $contact[1];
				} else {
					$class = $config['object'];
				}
			}
		}
		if(is_string($contact)){
			$contact = (int)$contact;
			if($contact === 0){
				$contact = null;
			}
		}
		if(is_int($contact)){
			$id = $contact;
			$contact_class = $config['contact']['object'];
			$class = $contact_class;
		}
		if(isset($id) && isset($class)){
			$exist = false;
			$existing_contacts = $this->getHistoryContacts();
			foreach($existing_contacts as $existing_contact){
				if($existing_contact->getContactId() == $id && $existing_contact->getContactName() == $class){
					$exist = true;
					break;
				}
			}
			if(!$exist){
				$history_contact = new HistoryContact();
				$history_contact->setHistoryId($this->getId());
				$history_contact->setContactId($id);
				$history_contact->setContactName($class);
				$this->addHistoryContact($history_contact);
				return true;
			}
		}
		return false;
	}

	/**
	 * @brief Retourne l'objet auquel est attaché l'evenement
	 * @fn public function getObject()
	 * @return BaseObject l'objet
	 *
	 */
	public function getObject(){
		if(!$this->object){
			$this->object = surfaceBehavior::doSelectObject($this->getObjectId(), $this->getObjectName());
		}
		return $this->object;
	}

	public function setObject($object){
		if(is_object($object) && !$this->getObjectName()){
			$this->setObjectName(get_class($object));
			$this->setObjectId($object->getId());
		}
		if(get_class($object) != $this->getObjectName() || $object->getId() != $object->getId()){
			throw new Exception('Object : '.get_class($object)."({$object->getId()}) is not object associated : {$this->getObjectName()}({$this->getObjectId()})");
		}
		$this->object = $object;
	}

	/**
	 * @brief Sauvegarde l'objet en base de données
	 * @fn public function save(PropelPDO $con = null)
	 * @param Connection $con Connection a la base de données
	 */
	public function save(PropelPDO $con = null){
		if($this->getObject()){
			if(method_exists($this->getObject(), 'surfaceHistoryBehaviorGroupIdCallback')){
				$this->setGroupId($this->getObject()->surfaceHistoryBehaviorGroupIdCallback());
			}
			if(method_exists($this->getObject(), 'surfaceHistoryBehaviorNamespaceCallback')){
				$this->setNamespace($this->getObject()->surfaceHistoryBehaviorNamespaceCallback());
			}
		}
		parent::save($con);
		$this->objectCallback();
	}

	/**
	 * @brief Verifie si des callback sont activés sur l'objet et les appels
	 * 
	 */
	protected function objectCallback(){
		$config = $this->getObjectConfig();
		$to_save = false;
		
		$pending_callback = sfContext::getInstance()->getUser()->getAttribute('pending_callback', false, 'history');
		if(!$pending_callback){
			if(isset($config['callback']) && $config['callback']){
				$callback = $config['callback'];
				if(method_exists($this->getObject(), $callback)){
					$this->getObject()->$callback($this);
					$to_save = true;
				} else {
					trigger_error('Calling to unexisting history callback ('.$callback.') on object '.get_class($this->getObject()));
				}
			}
			if(isset($config['updated_at']) && $config['updated_at']){
				$this->getObject()->setUpdatedAt(time());
				$to_save = true;
			}
			if($to_save){
				sfContext::getInstance()->getUser()->setAttribute('pending_callback', true, 'history');
				$this->getObject()->save();
				sfContext::getInstance()->getUser()->setAttribute('pending_callback', false, 'history');
			}
		}
	}

	/**
	 * @brief Retourne les configuration spécifique de l'objet
	 * @return array Les configurations spécifique a l'objet
	 * @deprecated Il est necessaire de refondre l'organisation de l'app.yml avant sont utilisation en dehors du plugin
	 *
	 */
	public function getObjectConfig(){
		return History::getConfig($this->getObjectName());
	}

	/**
	 * @brief Verifie l'existence d'un contact et le supprime du tableau temporaire
	 * @fn isAlreadySaveAndDeleteInArray(&$contact, &$history_contacts)
	 * @param HistoryContact $contact Contact a verifié
	 * @param array $history_contacts Liste des contacts deja existant
	 * @return bool Vrai si le contact existe deja
	 * 
	 */
	protected function isAlreadySaveAndDeleteInArray(&$contact, &$history_contacts){
		foreach($history_contacts as $index => $history_contact){
			if($history_contact->getContactId() == $contact->getContactId() &&
					$history_contact->getContactName() == $contact->getContactName()){
				unset($history_contacts[$index]);
				return true;
			}
		}
		return false;
	}

	/**
	 * @brief Supprime l'objet de la base de données
	 * @fn public function delete(PropelPDO $con = null)
	 * @param Connection $con Connection a la base de données
	 *
	 */
	public function delete(PropelPDO $con = null){
		$contacts = $this->getHistoryContacts();
		foreach($contacts as $contact){
			$contact->delete();
		}
		parent::delete($con);
	}

	/**
	 * @brief toString personalisé (appel d'une function exterieur)
	 * @fn public function personalToString()
	 * @return string Representation de l'objet
	 *
	 */
	public function personalToString(){
		$config = History::getConfig($this->getObjectName());
		$personal_to_string = $config['personal_to_string'];
		if($personal_to_string && is_callable('history_personal_toString')){
			return history_personal_toString($this);
		} else {
			$date = $config['date'];
			$date = get('active', $date, false);
			$type = $config['type'];
			$type = get('withtime', $type, false);
			$string = "";
			if($type){
				$string .= __($this->getType());
			}
			$format = ' \l\e d/m/Y';
			if($date){
				$format .= ' H:i';
			}
			$string .= $this->getDateRef($format);
			$string .= ' : ';
			$string .= $this->getDescription();
			return $string;
		}
	}

	public function getTdClass($field){
		$config = self::getConfig($this->getObjectName());
		if(get('td_class_function', $config, false) && is_callable(get('td_class_function', $config))){
			$function = get('td_class_function', $config);
			return $function($this, $field);
		}
		return null;
	}

	/**
	 * @brief toString - fait appel a personalToString()
	 * @fn public function __toString()
	 * @return string Representation de l'objet
	 * @see personalToString()
	 *
	 */
	public function __toString(){
		return $this->personalToString();
	}

	/*	 * *************************************************************************** */
	/*	 * ************ */
	/* Configuration */
	/*	 * ************ */
	/*	 * *************************************************************************** */

	public static function getConfig($class = 'default'){
		if(!$class){
			$class = 'default';
		}
		$default_config = sfConfig::get('app_history_default', array());
		$config = sfConfig::get('app_history_'.$class, array());
		//$final = array_merge_recursive($default_config, $config); //Not exactly what we want
		//$final = array_replace($default_config, $config);//Nope, but almost
		$final = array_merge_array($default_config, $config);//This one is worse but looks like array_merge_recursive()
		//var_dump($final);
		return $final;
	}

	public function getObjectUid(){
		return $this->getObjectName().'_'.$this->getObjectId();
	}

	public function getObjectMetadata($info = null, $default = null){
		if($this->getObject()){
			return $this->getObject()->getMetadata($info, $default);
		}
		if($info == 'name'){
			return __(ucwords(getclass($this->getObject())));
		}
	}

}
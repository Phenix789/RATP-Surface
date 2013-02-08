<?php
/**
 * @brief Behavior options
 * @class sfPropelOptionsBehavior
 * @package Plugin
 * @subpackage sfPropelOptionsBehaviorPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.0
 * @license LGPL
 *
 */
class sfPropelOptionsBehavior {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $options;
	protected $new;
	protected $delete;
	protected $model;
	protected $id;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		
	}

/******************************************************************************/
		/****************/
		/*Initialisation*/
		/****************/
/******************************************************************************/

	/**
	 * @brief Charge les options de l'objet a partir de la base ou du ParameterHolder
	 * @fn protected function loadBehavior(BaseObject $object)
	 * @param BaseObject $object objet du behavior
	 * 
	 */
	protected function loadBehavior(BaseObject $object) {
		$this->id = $object->getId();
		$this->model = getclass($object);
		if(!isset($object->_options)) {
			$array = array();
			$id = $object->getId();
			if($object->getId()) { $array = $this->loadOptions(); }
			$object->_options = new sfParameterHolder();
			$object->_options->add(	array(	'options' => $array,
							'new' => array(),
							'delete' => array()));
		}
		$this->options = $object->_options->get('options');
		$this->new = $object->_options->get('new');
		$this->delete = $object->_options->get('delete');
	}

	/**
	 * @brief Sauvegarde les options de l'objet dans le ParameterHolder
	 * @fn protected function saveBehavior(BaseObject $object)
	 * @param BaseObject $object objet du behavior
	 * 
	 */
	protected function saveBehavior(BaseObject $object) {
		$object->_options->set('options', $this->options);
		$object->_options->set('new', $this->new);
		$object->_options->set('delete', $this->delete);
	}

	/**
	 * @brief Charge les options a partir de la base
	 * @fn protected function loadOptions()
	 * @return array liste des options formater pour le behavior
	 * 
	 */
	protected function loadOptions() {
		$options = OptionsPeer::getOptions($this->model, $this->id);
		$res = array();
		if($options) {
			foreach($options as $option) {
				$res[$option->getName()] = $option;
			}
		}
		return $res;
	}

/******************************************************************************/
		/*********************/
		/*Gestion des Options*/
		/*********************/
/******************************************************************************/

	/**
	 * @brief Ajoute une option a l'objet
	 * @fn public function addoption(BaseObject $object, $key, $value)
	 * @param BaseObject $object l'objet du behavior
	 * @param string $key clef de l'option
	 * @param mixed $value valeur de l'option
	 * @return boolean vrai si l'option a correctement ete ajouté
	 * 
	 */
	public function addOption(BaseObject $object, $key, $value) {
		$this->loadBehavior($object);
		if(isset($this->options[$key])) {
			$return = $this->replaceOption($object, $key, $value);
		}
		else {
			$this->new[$key] = new Options();
			$this->new[$key]->setName($key);
			$this->new[$key]->setValue($value);
			$return = true;
		}
		$this->saveBehavior($object);
		return $return;
	}

	/**
	 * @brief Modifie une option
	 * @fn public function setoption(BaseObject $object, $key, $value)
	 * @param BaseObject $object l'objet du behavior
	 * @param string $key clef de l'option
	 * @param mixed $value valeur de l'option
	 * @return boolean vrai si l'option a correctement ete modifié
	 * 
	 */
	public function setOption(BaseObject $object, $key, $value) {
		return $this->replaceOption($object, $key, $value);
	}

	/**
	 * @brief Retourne la valeur d'une option
	 * @fn public function getoptions(BaseObject $object, $key, $default = null)
	 * @param BaseObject $object l'objet du behavior
	 * @param string $key clef de l'option
	 * @param mixed $default valeur par defaut si l'option n'existe pas
	 * @return string valeur de l'option
	 * 
	 */
	public function getOption(BaseObject $object, $key, $default = null) {
		$this->loadBehavior($object);
		if(isset($this->new[$key])) {
			return $this->new[$key]->getValue();
		}
		if(isset($this->options[$key])) {
			return $this->options[$key]->getValue();
		}
		return $default;
	}

	/**
	 * @brief Varifie l'eistance d'une option (si $value alors l'option doit avoir cette valeur)
	 * @param BaseObject $object l'objet du behavior
	 * @param string $key clef de l'option
	 * @param string $value valeur que l'option doit verifié
	 * @return boolean vrai si l'option existe
	 * 
	 */
	public function hasOption(BaseObject $object, $key, $value = null) {
		$this->loadBehavior($object);
		if(isset($this->new[$key])) {
			if(!$value || ($this->new[$key]->getValue() == $value)) {
				return true;
			}
		}
		if(isset($this->options[$key])) {
			if(!$value || ($this->options[$key]->getValue() == $value)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @brief Supprime toutes les options
	 * @fn public function removeAllOptions(baseObject $object)
	 * @param BaseObject $object l'objet du behavior
	 * @return boolean vrai si tout c'est correctement deroulé
	 * 
	 */
	public function removeAllOptions(BaseObject $object) {
		$this->loadBehavior($object);
		foreach($this->options as $option) {
			$this->delete[$option->getKey()] = $option;
		}
		$this->new = array();
		$this->saveBehavior($object);
		return true;
	}

	/**
	 * @brief Supprime une option
	 * @fn public function removeOption(BaseObject $object, $key)
	 * @param BaseObject $object l'objet du behavior
	 * @param string $key clef de l'option
	 * @return boolean vrai si l'option a ete supprimé
	 * 
	 */
	public function removeOption(BaseObject $object, $key) {
		$this->loadBehavior($object);
		$delete = false;
		if(isset($this->new[$key])) {
			unset($this->new[$key]);
			$delete = true;
		}
		if(isset($this->options[$key])) {
			$this->delete[$key] = $this->options[$key];
			unset($this->options[$key]);
			$delete = true;
		}
		$this->saveBehavior($object);
		return $delete;
	}

	/**
	 * @brief Modifie la valeur d'une option
	 * @fn public function replaceOption(BaseObject $object, $key, $value)
	 * @param BaseObject $object l'objet du behavior
	 * @param string $key clef de l'option
	 * @param mixed $value valeur de l'option
	 * @return boolean vrai si l'option a bien ete modifié
	 * 
	 */
	public function replaceOption(BaseObject $object, $key, $value) {
		$this->loadBehavior($object);
		$replace = false;
		if(isset($this->new[$key])) {
			$this->new[$key]->setValue($value);
			$replace = true;
		}
		if(isset($this->options[$key]) && $this->options[$key]->getValue() != $value) {
			$this->new[$key] = $this->options[$key];
			$this->new[$key]->setValue($value);
			$replace = true;
		}
		$this->saveBehavior($object);
		return $replace;
	}

	/**
	 * @brief Modifie une serie d'options
	 * @fn public function setoptions(BaseObject $object, $keys, $values = null)
	 * @param BaseObject $object l'objet du behavior
	 * @param array $keys liste des clefs ou clef/valeur
	 * @param array $values liste des valeurs
	 * @return boolean vrai si toutes les modifications ont ete appliqué
	 * 
	 */
	public function setOptions(BaseObject $object, $keys, $values = null) {
		$this->loadBehavior($object);
		$set = false;
		if(is_array($keys) && !$values) {
			foreach($keys as $key => $value) {
				$this->addOption($object, $key, $value);
			}
			$set = true;
		}
		if(is_array($key) && is_array($value)) {
			foreach($keys as $index => $key) {
				if(isset($values[$index])) {
					$this->addOption($object, $key, $values[$index]);
				}
			}
			$set = true;
		}
		$this->saveBehavior($object);
		return $set;
	}

	/**
	 * @brief Retourne toutes les options sous la forme d'un tableau associatif clef/valeur
	 * @fn public function getOptions(BaseObject $object)
	 * @param BaseObject $object l'objet du behavior
	 * @return array tableau d'options
	 *
	 */
	public function getOptions(BaseObject $object) {
		$this->loadBehavior($object);
		$options = array();
		foreach($this->options as $key => $option) {
			$options[$key] = $option->getValue();
		}
		foreach($this->new as $key => $option) {
			$options[$key] = $option->getValue();
		}
		foreach($this->delete as $key => $option) {
			if(isset($option[$key])) {
				unset($option[$key]);
			}
		}
		return $options;
	}

/******************************************************************************/
		/**************************/
		/*Recuperation des Options*/
		/**************************/
/******************************************************************************/

	/**
	 * @brief Modifie les options suivant les valeurs de la requete
	 * @fn public function setOptionsEdit(BaseObject $object, $options)
	 * @param BaseObject $object l'objet du behavior
	 * @param array $options valeurs des options
	 * @return boolean vrai si toutes les modifications ont ete appliqués
	 * 
	 */
	public function setOptionsEdit(BaseObject $object, $options) {
		$this->loadBehavior($object);
		$array = array();
		foreach($options as $option) {
			$split = split(':', $option);
			if(count($split) == 2) {
				$this->addOption($object, $split[0], $split[1]);
				$array[$split[0]] = $split[1];
			}
		}
		$options = $this->options;
		foreach($array as $key => $option) {
			if(isset($options[$key])) unset($options[$key]);
		}
		$this->delete = $options;
		$this->saveBehavior($object);
		return true;
	}

/******************************************************************************/
		/************/
		/*Pre & Post*/
		/************/
/******************************************************************************/

	/**
	 * @brief Post save
	 * @fn public function postSave(BaseObject $object)
	 * @param BaseObject $object l'objet du behavior
	 * 
	 */
	public function postSave(BaseObject $object) {
		$this->loadBehavior($object);
		foreach($this->new as $option) {
			$option->setModelName($this->model);
			$option->setModelId($this->id);
			$option->save();
		}
		foreach($this->delete as $option) {
			if(!$option->isDeleted()) {
				$option->delete();
			}
			$this->delete = array();
		}
		$this->saveBehavior($object);
	}

	/**
	 * @brief Post delete
	 * @fn public function postDelete(BaseObject $object)
	 * @param BaseObject $object l'objet du behavior
	 * 
	 */
	public function postDelete(BaseObject $object) {
		$this->loadBehavior($object);
		foreach($this->options as $option) {
			$option->delete();
		}
	}

}
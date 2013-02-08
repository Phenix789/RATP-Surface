<?php
/**
 * @brief Behavior ##NAME_BEHAVIOR##
 * @class surface##NAME_BEHAVIOR##Behavior
 * @package Plugin
 * @subpackage surface##NAME_BEHAVIOR##Behavior
 *
 * @author 
 * @date 
 * @version
 * @license 
 *
 */
class surface##NAME_BEHAVIOR##Behavior extends surfaceBehavior {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/



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

	protected function init(BaseObject $object) {
		parent::init($object);
		$this->peer = '##NAME_BEHAVIOR##Peer';
	}

/******************************************************************************/
		/******************/
		/*Prepare Criteria*/
		/******************/
/******************************************************************************/

	/**
	 * @brief Prepare le criteria pour la requete en base de donnée
	 * @param BaseObject $object objet du behavior
	 * @param Criteria $criteria un criteria vide
	 * @return Criteria le criteria preparé
	 *
	 * Prepare un criteria pour la requete en base de donnée pour le premier
	 * chargement de l'objet, Cette methode est voué a etre redefinit pour
	 * personnaliser la requete
	 *
	 */
	protected function prepareCriteriaForRequest(BaseObject $object, Criteria $criteria) {
		return $criteria;
	}

/******************************************************************************/
		/******************/
		/*Getter && Setter*/
		/******************/
/******************************************************************************/

	public function add##NAME_BEHAVIOR##(BaseObject $object, $element) {
		return $this->add($object, $element);
	}

	public function addAll##NAME_BEHAVIOR##s(BaseObject $object, $elements) {
		return $this->addAll($object, $elements);
	}

	public function delete##NAME_BEHAVIOR##(BaseObject $object, $element) {
		return $this->delete($object, $element);
	}

	public function deleteAll##NAME_BEHAVIOR##s(BaseObject $object) {
		return $this->deleteAll($object);
	}

	public function get##NAME_BEHAVIOR##(BaseObject $object, $element) {
		return $this->get($object, $element);
	}

	public function getAll##NAME_BEHAVIOR##s(BaseObject $object) {
		return $this->getAll($object);
	}

	public function set##NAME_BEHAVIOR##(BaseObject $object, $element) {
		return $this->set($object, $element);
	}

	public function setAll##NAME_BEHAVIOR##s(BaseObject $object, $elements) {
		return $this->setAll($object, $elements);
	}

	public function has##NAME_BEHAVIOR##(BaseObject $object, $element) {
		return $this->has($object, $element);
	}

	public function count##NAME_BEHAVIOR##(BaseObject $object) {
		return $this->count($object);
	}

/******************************************************************************/
		/***************************/
		/*Functions supplementaires*/
		/***************************/
/******************************************************************************/

	

/******************************************************************************/
		/******************/
		/*Abstract Methode*/
		/******************/
/******************************************************************************/

	/**
	 * @brief Verifie si les deux elements sont egaux
	 * @param BaseObject $element_1 Element deja attaché a l'objet
	 * @param mixed $element_2 Definition du second element
	 * @param string $method_call Methode qui a appelée isEqual()
	 * @return bool Vrai si les deux elements sont egaux
	 *
	 * Methode abstraite. Methode fournit a l'utilisateur afin qu'il puisse
	 * definir comment les deux elements seront comparés. Le nom de la methode
	 * appelante est fournit dans l'eventualité ou cela aurait une incidence.
	 * La methode doit renvoyer un booleen
	 *
	 */
	protected function isEqual($element_1, $element_2, $method_call = null) {
		return false;
	}

	/**
	 * @brief Créé un element
	 * @param mixed $value Definition d'un element
	 * @return L'element nouvellement créé
	 *
	 * Cette methode créé un element, qui sera rattaché a l'ojet, a partir de
	 * $value
	 *
	 */
	protected function create($value) {
		return new ##NAME_BEHAVIOR##();
	}

	/**
	 * @brief Modifie un element avec les nouvelles valeurs
	 * @param BaseObject $element Element lié a l'objet
	 * @param mixed $new_value Nouveaux parametres de l'element
	 *
	 * Modifie $element avec ses nouveaux parametres fournit dans $new_value
	 *
	 */
	protected function modify(&$element, $new_value) {
		
	}

	/**
	 * @brief Permet de tagger un element avant ca sauvegarde
	 * @param BaseObject $object
	 * @param BaseObject $element
	 * @return L'element modifié
	 *
	 * Donne a l'utilisateur la possibilité de tagger les elements avant que
	 * ceux si ne soyent sauvegardés en base de données. Chaque element est
	 * envoyé dans cette methode, ainsi que l'objet en cours.
	 *
	 */
	protected function preSaveElement(BaseObject $object, &$element) {
		
	}

}

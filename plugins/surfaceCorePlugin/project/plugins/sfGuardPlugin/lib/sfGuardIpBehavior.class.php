<?php
/**
 * @brief Behavior Ip
 * @class sfGuardIpBehavior
 * @package Plugin
 * @subpackage sfGuard
 *
 * @author Claude <claude@elogys.fr>
 * @date 8 juin 2010
 * @version 2.0
 *
 */
class sfGuardIpBehavior extends surfaceBehavior {

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
		$this->peer = 'sfGuardFilteringIpPeer';
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
		$criteria->add(sfGuardFilteringIpPeer::OBJECT_ID, $object->getId());
		$criteria->add(sfGuardFilteringIpPeer::OBJECT_NAME, getclass($object));
		return $criteria;
	}

/******************************************************************************/
		/******************/
		/*Getter && Setter*/
		/******************/
/******************************************************************************/

	public function addIp(BaseObject $object, $element) {
		return $this->add($object, $element);
	}

	public function addAllIps(BaseObject $object, $elements) {
		return $this->addAll($object, $elements);
	}

	public function deleteIp(BaseObject $object, $element) {
		return $this->delete($object, $element);
	}

	public function deleteAllIps(BaseObject $object) {
		return $this->deleteAll($object);
	}

	public function getIp(BaseObject $object, $element) {
		return $this->get($object, $element);
	}

	public function getAllIps(BaseObject $object) {
		return $this->getAll($object);
	}

	public function setIp(BaseObject $object, $element) {
		return $this->set($object, $element);
	}

	public function setAllIps(BaseObject $object, $elements) {
		return $this->setAll($object, $elements);
	}

	public function hasIp(BaseObject $object, $element) {
		return $this->has($object, $element);
	}

	public function countIp(BaseObject $object) {
		return $this->count($object);
	}

/******************************************************************************/
		/***************************/
		/*Functions supplementaires*/
		/***************************/
/******************************************************************************/

	/**
	 * @brief Retourne un tableau des ips authorisé
	 * @param BaseObject $object L'objet du behavior
	 * @return array Tableau d'ips
	 *
	 */
	public function getAllIpsAuthorized(BaseObject $object) {
               	$ips = array();
		foreach($this->getAllIps($object) as $ip) {
			$ips[] = $ip->getIp();
		}
		return $ips;
	}

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
		if(is_object($element_1)) {
			$element_1 = $element_1->getIp();
		}
		if(is_object($element_2)) {
			$element_2 = $element_2->getIp();
		}
		return $element_1 === $element_2;
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
		$ip = new sfGuardFilteringIp();
		$ip->setIp($value);
		return $ip;
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
		$element->setIp($new_value);
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
		$element->setObjectName(getclass($object));
		$element->setObjectId($object->getId());
	}

}

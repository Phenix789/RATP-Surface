<?php

class SfcCommentBehavior extends surfaceBehavior {

	
	public function __construct() {

	}

	protected function init(BaseObject $object) {
		parent::init($object);
		$this->peer = 'SfcCommentPeer';
		$this->method_set = 'setObject';
	}

	/**
	 * @brief Prépare un criteria pour la requête en base de données
	 * @fn protected function prepareCriteriaForRequest(BaseObject $object, Criteria $criteria)
	 * @param BaseObject $object objet du behavior
	 * @param Criteria $criteria un criteria vide
	 * @return Criteria le criteria preparé
	 *
	 * Prépare un criteria pour la requête en base de données pour le premier
	 * chargement de l'objet. Cette méthode est vouée à être redéfinie pour
	 * personnaliser la requete
	 *
	 */
	protected function prepareCriteriaForRequest(BaseObject $object, Criteria $criteria) {
		$criteria->add(SfcCommentPeer::OBJECT_ID, $object->getId());
		$criteria->add(SfcCommentPeer::OBJECT_NAME, getclass($object));
		$criteria->addDescendingOrderByColumn(SfcCommentPeer::DATE_REF);
		$criteria->addDescendingOrderByColumn(SfcCommentPeer::ID);
		return $criteria;
	}

	public function addSfcComment(BaseObject $object, $element) {
		 return parent::add($object, $element);
	}
	
	public function addAllSfcComments(BaseObject $object, $elements) {
		return parent::addAll($object, $elements);
	}

	public function deleteSfcComment(BaseObject $object, $element) {
		return parent::delete($object, $element);
	}

	public function deleteAllSfcComments(BaseObject $object) {
		return parent::deleteAll($object);
	}

	public function getSfcComment(BaseObject $object, $element) {
		return parent::get($object, $element);
	}

	public function getSfcComments(BaseObject $object) {
		return parent::getAll($object);
	}

	public function setSfcComment(BaseObject $object, $element) {
		return parent::set($object, $element);
	}

	public function setAllSfcComments(BaseObject $object, $elements) {
		return parent::setAll($object, $elements);
	}

	public function hasSfcComment(BaseObject $object, $element) {
		return parent::has($object, $element);
	}

	public function countSfcComment(BaseObject $object) {
		return parent::count($object);
	}
	
	public function getSfComments(BaseObject $object){
		return parent::getAll($object);
	}

	/**
	 * @brief Retourne le premier element en date (du type donné)
	 * @fn public function getFirstHistory(BaseObject $object, $type = null)
	 * @param BaseObject $object L'objet du behavior
	 * @param string $type Type de l'evenement
	 * @return History L'evenement correspondant
	 *
	 */
	public function getFirstSfcComment(BaseObject $object, $type = null) {
		$this->load($object);
		$comments = array_merge($this->new, $this->current);
		usort($comments, '_sfc_comment_sort_by_date_ref');
		foreach($comments as $comment) {
			if($type == null) {
				return $comment;
			}
		}
		return null;
	}

	/**
	 * @brief Retourne le dernier element en date (du type donné)
	 * @fn public function getLastHistory(BaseObject $object, $type = null)
	 * @param BaseObject $object L'objet du behavior
	 * @param string $type Type de l'evenement
	 * @return History L'evenement correspondant
	 *
	 */
	public function getLastSfcComment(BaseObject $object, $type = null) {
		$this->load($object);
		$comments = array_merge($this->new, $this->current);
		usort($comments, '_sfc_comment_sort_by_date_ref');
		for($i = count($comments)-1; $i >= 0; $i--) {
			$comment = $comments[$i];
			if($comment->getDateRef('U') <= time()) {
				return $comment;
			}
		}
		return null;
	}

	/**
	 * @brief Retourne le prochain element en date (du type donné)
	 * @fn public function getNextHistory(BaseObject $object, $type = null)
	 * @param BaseObject $object L'objet du behavior
	 * @param string $type Type de l'evenement
	 * @return History L'evenement correspondant
	 *
	 */
	public function getNextSfcComment(BaseObject $object, $type = null) {
		$this->load($object);
		$comments = array_merge($this->new, $this->current);
		usort($comments, '_sfc_comment_sort_by_date_ref');
		for($i = count($comments)-1; $i >= 0; $i--) {
			$comment = $comments[$i];
			if($comment->getDateRef('U') > time()) {
				return $comment;
			}
		}
		return null;
	}

	/**
	 * @brief Retourne le criteria qui a servie pour la recuperation en base de données des evenements
	 * @fn public function getCriteriaFromHistoryBehavior
	 * @param BaseObject $object L'objet du behavior
	 * @return Criteria Criteria
	 *
	 */
	public function getCriteriaFromSfcCommentBehavior(BaseObject $object) {
		$criteria = new Criteria();
		$criteria->add(SfcCommentPeer::OBJECT_ID, $object->getId());
		
		return $criteria;
	}

	/**
	 * @brief Verifie si les deux elements sont egaux
	 * @fn abstract protected function isEqual($element_1, $element_2, $method_call = null)
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
		if(is_array($element_2)) {
			$element_2 = $this->create($element_2);
		}
		if(is_object($element_2)) {
			return	strcmp($element_1->getComment(), $element_2->getComment()) == 0 &&
				$element_1->getDateRef('U') == $element_2->getDateRef('U');
		}
		return false;
	}

	/**
	 * @brief Créé un element
	 * @fn abstract protected function create($value)
	 * @param mixed $value Definition d'un element
	 * @return L'element nouvellement créé
	 *
	 * Cette methode créé un element, qui sera rattaché a l'objet, a partir de
	 * $value
	 *
	 */
	protected function create($value) {
		if(is_object($value) && getclass($value) == 'SfcComment') {
			return $value;
		}
		if(is_array($value)) {
			$sfComment = new SfcComment();
			$sfComment->setObjectName(get('object_name', $value));
			$sfComment->setObjectId(get('object_id', $value));
			$sfComment->setDateRef(get('date_ref', $value));
			$sfComment->setCollaboratorId(get('collaborator_id', $value));
			$sfComment->setComment(get('comment', $value));
			
		}
		return $sfComment;
	}

	/**
	 * @brief Modifie un element avec les nouvelles valeurs
	 * @fn abstract protected function modify($element, $new_value)
	 * @param BaseObject $element Element lié a l'objet
	 * @param mixed $new_value Nouveaux parametres de l'element
	 *
	 * Modifie $element avec ses nouveaux parametres fournit dans $new_value
	 *
	 */
	protected function modify(&$element, $new_value) {
		
	}
	

}
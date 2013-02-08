<?php
/**
 * @brief Behavior History
 * @class surfaceHistoryBehavior
 * @package Plugin
 * @subpackage surfaceHistoryBehavior
 *
 * @author
 * @date
 * @version
 *
 */
class surfaceHistoryBehavior extends surfaceBehavior {

	public function __construct() {

	}

	protected function init(BaseObject $object) {
		parent::init($object);
		$this->peer = 'HistoryPeer';
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
		$criteria->add(HistoryPeer::OBJECT_ID, $object->getId());
		$criteria->add(HistoryPeer::OBJECT_NAME, getclass($object));
		$criteria->addDescendingOrderByColumn(HistoryPeer::DATE_REF);
		$criteria->addDescendingOrderByColumn(HistoryPeer::ID);
		return $criteria;
	}

	public function addHistory(BaseObject $object, $element) {
		 return parent::add($object, $element);
	}

	public function addAllHistorys(BaseObject $object, $elements) {
		return parent::addAll($object, $elements);
	}

	public function deleteHistory(BaseObject $object, $element) {
		return parent::delete($object, $element);
	}

	public function deleteAllHistorys(BaseObject $object) {
		return parent::deleteAll($object);
	}

	public function getHistory(BaseObject $object, $element) {
		return parent::get($object, $element);
	}

	public function getAllHistorys(BaseObject $object) {
		return parent::getAll($object);
	}

	public function setHistory(BaseObject $object, $element) {
		return parent::set($object, $element);
	}

	public function setAllHistorys(BaseObject $object, $elements) {
		return parent::setAll($object, $elements);
	}

	public function hasHistory(BaseObject $object, $element) {
		return parent::has($object, $element);
	}

	public function countHistory(BaseObject $object) {
		return parent::count($object);
	}

	/**
	 * @brief Retourne le premier element en date (du type donné)
	 * @fn public function getFirstHistory(BaseObject $object, $type = null)
	 * @param BaseObject $object L'objet du behavior
	 * @param string $type Type de l'evenement
	 * @return History L'evenement correspondant
	 *
	 */
	public function getFirstHistory(BaseObject $object, $type = null) {
		$this->load($object);
		$histories = array_merge($this->new, $this->current);
		usort($histories, '_history_sort_by_date_ref');
		foreach($histories as $history) {
			if($type == null || $history->getType() == $type) {
				return $history;
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
	public function getLastHistory(BaseObject $object, $type = null) {
		$this->load($object);
		$histories = array_merge($this->new, $this->current);
		usort($histories, '_history_sort_by_date_ref');
		for($i = count($histories)-1; $i >= 0; $i--) {
			$history = $histories[$i];
			if($type == null || $history->getType() == $type) {
				if($history->getDateRef('U') <= time()) {
					return $history;
				}
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
	public function getNextHistory(BaseObject $object, $type = null) {
		$this->load($object);
		$histories = array_merge($this->new, $this->current);
		usort($histories, '_history_sort_by_date_ref');
		for($i = count($histories)-1; $i >= 0; $i--) {
			$history = $histories[$i];
			if($type == null || $history->getType() == $type) {
				if($history->getDateRef('U') > time()) {
					return $history;
				}
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
	public function getCriteriaFromHistoryBehavior(BaseObject $object) {
		$this->load($object);
		$criteria = $object->_behavior->get('criteria', null, $this->namespace);
		$criteria = clone $criteria;
		$criteria->clearOrderByColumns();
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
			return	strcmp($element_1->getDescription(), $element_2->getDescription()) == 0 &&
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
		if(is_object($value) && getclass($value) == 'History') {
			return $value;
		}
		if(is_array($value)) {
			$history = new History();
			$history->setObjectName(get('object_name', $value));
			$history->setDateRef(get('date_ref', $value));
			$history->setDescription(get('description', $value));
			$history->setType(get('type', $value));
			$history->addContacts(get('contacts', $value));
		}
		return $history;
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
		if(is_array($value)) {
			$element->setDateRef(get('date_ref', $new_value, $element->getDate(null)));
			$element->setDescription(get('description', $new_value, $element->getDescription()));
			$element->setType(get('type', $new_value, $element->getType()));
			$element->addContacts(get('contacts', $new_value, $element->getContactsId()));
		}
		return $element;
	}

}

/**
 * @brief Fonction de callback pour le tri des evenements
 * @param History $history_1 Evenement a comparer
 * @param History $history_2 Evenement a comparer
 * @return int Ordre de superiorité des deux elements
 * @see surfaceHistoryBehavior::getFirstHistory()
 * @see surfaceHistoryBehavior::getLastHistory()
 * @see surfaceHistoryBehavior::getNextHistory()
 *
 */
function _history_sort_by_date_ref($history_1, $history_2) {
		sfLoader::loadHelpers('Date');
		$diff = $history_1->getDateRef('U') - $history_2->getDateRef('U');
		if($diff == 0) {
			$diff = $history_1->getId() - $history_2->getId();
		}
		return $diff;
}
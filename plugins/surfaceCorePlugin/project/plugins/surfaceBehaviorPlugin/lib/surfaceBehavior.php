<?php
/**
 * @brief Class de base pour les behaviors
 * @class surfaceBehavior
 * @package Plugin
 * @subpackage surfaceBehavior
 *
 * @author Claude <claude@elogys.fr>
 * @date 14 déc. 2009
 * @version 1.0
 *
 * Cette class propose une base pour tout les behaviors qui attache de nouveaux
 * elements (Comportements) a un objet. Se basant sur un principe de
 * chargement/sauvegarde, le behavior charge les parametres de l'objet. Execute
 * les modifications demandées, apres quoi il sauvegarde les changement de
 * nouveau dans l'objet.
 *
 * Pour ce faire, 3 variables sont utilisé:
 *  - $current represente les elements existants
 *    - Les elements de $current represente les elements deja existant et chargé a
 *     partir de la base de données.
 *  - $new represente les nouveaux elements
 *    - Lors de l'ajout d'un element celui ci s'ajoute au tableau $new et c'est
 *     seulement lors de la sauvegarde de l'objet que les elements de $new seront
 *     sauvegardé en base de données.
 *  - $delete represente les elements existants supprimés
 *    - Les elements de $delete sont quand a eux des elements existant qui on été
 *     supprimé. Ils ont ete deplacés de $current a $delete. Leurs suppression
 *     definitive en base de données de n'executera que lorsque l'objet sera
 *     sauvegardé (ou supprimé)
 * Bien que ces variables soit protegé, donc modifiable par l'heritage, il est
 * conseillé d'utiliser les methodes standart fournit avec la class
 *
 * Enfin, 3 autres variables ont leurs importances, ce sont:
 *  - $namespace:
 *    - Les parametres sont enregistrés sur l'objet grace a une variable crée a
 *     la volée. Cette variable accessible pas $object->_behavior est utilisé par
 *     tout les behaviors utilisant cette class de base. Cette variable est un
 *     sfParameterHolder et chaque behavior enregistre ces informations dans un
 *     namespace. Par defaut ce namespace vaut le nom de la class du behavior
 *  - $peer
 *    - C'est la class peer qui sera utilisé pour charger les parametres a partir
 *     de la base de données
 *  - $method_load
 *    - C'est la methode static qui sera utilisé pour charger les parametres a
 *     partir de la base de données
 * Ces 3 variables sont definit dans la methode init(), ca surcharge permet une
 * redefinition (total ou partiel) ce ces variables
 *
 */
abstract class surfaceBehavior {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $current;	/**@var Elements existants**/
	protected $new;		/**@var Elements nouveaux**/
	protected $delete;	/**@var Elements supprimés**/

	protected $namespace;	/**@var Namespace utilisé pour sauvegarder les parametres**/
	protected $peer;	/**@var Class peer utilisé pour le chargement a partir de la base**/
	protected $method_load;	/**@var Method utilisé pour le chargement a partir de la base**/
	protected $method_set;	/**@var Method utilisé pour associé l'objet a l'item**/

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	/**
	 * @brief Constructeur
	 *
	 */
	public function __construct() {

	}

/******************************************************************************/
		/******/
		/*Init*/
		/******/
/******************************************************************************/

	/**
	 * @brief Initialise le behavior
	 * @param BaseObject $object objet du behavior
	 *
	 * Initialise le behavior en recuperant les informations necessaires sur
	 * le premier objet donné. Les variables initialisées sont $peer, $method_load
	 * et $namespace. La surcharge de cette methode offre la possibilitée de
	 * modifier ces variables
	 *
	 */
	protected function init(BaseObject $object) {
		$this->peer = get_class($object) . 'Peer';
		$this->method_load = 'doSelect';
		$this->namespace = get_class($this);
		$this->method_set = false;
		$this->addCriteriaToObject($object, new Criteria());
	}

	/**
	 * @brief Ajoute le criteria dans les parametres de l'objet
	 * @param BaseObject $object object du behavior
	 * @param Criteria $criteria criteria a ajouté
	 * @see prepareCriteriaForRequest()
	 *
	 * Ajoute le criteria dans les parametres lié a l'objet et prepare
	 * celui ci pour la requete lors du premier chargement
	 *
	 */
	protected function addCriteriaToObject(BaseObject $object, Criteria $criteria) {
		$criteria = $this->prepareCriteriaForRequest($object, $criteria);
		$object->_behavior->set('criteria', $criteria, $this->namespace);
	}

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
		/*************/
		/*Load & Save*/
		/*************/
/******************************************************************************/

	/**
	 * @brief Charge dans le behavior les parametres de l'objet
	 * @param BaseObject $object objet du behavior
	 * @see firstLoad()
	 * @see save()
	 *
	 * Charge dans le behavior les parametres precedements sauvegardées dans
	 * l'objet ou procede au premier chargement si c'est son premier appels.
	 * Il sera alors possible d'utilisé les variables $current, $new et $delete
	 *
	 */
	protected function load(BaseObject $object) {
		if(!isset($object->_behavior)) {
			$object->_behavior = new sfParameterHolder();
		}
		if(!$this->isLoaded($object)) {
			$this->firstLoad($object);
		}
		$this->current = $object->_behavior->get('current', array(), $this->namespace);
		$this->new = $object->_behavior->get('new', array(), $this->namespace);
		$this->delete = $object->_behavior->get('delete', array(), $this->namespace);
	}

	protected function isLoaded(BaseObject $object) {
		return isset($object->_behavior) && $object->_behavior->get('init', false, $this->namespace);
	}

	/**
	 * @brief Charge a partir de la base les parametres de l'objet
	 * @param BaseObject $object objet du behavior
	 * @see load()
	 * @see init()
	 *
	 * Charge dans l'objet les parametres sauvegardés en base de données. Pour
	 * cela, la methode static $method_load de la class $peer sera utilisé.
	 *
	 */
	protected function firstLoad(BaseObject $object) {
		$this->init($object);
		$object->_behavior->set('init', true, $this->namespace);
		$current = call_user_func(array($this->peer, $this->method_load), $object->_behavior->get('criteria', null, $this->namespace));
		if($current == false) { $current = array(); }
		if($this->method_set) {
			$method_set = $this->method_set;
			foreach($current as $item) {
					$item->$method_set($object);
			}
		}
		$object->_behavior->set('current', $current, $this->namespace);
		$object->_behavior->set('new', array(), $this->namespace);
		$object->_behavior->set('delete', array(), $this->namespace);
	}

	/**
	 * @brief Sauvegarde les parametres dans l'objet
	 * @param BaseObject $object objet du behavior
	 * @see load()
	 *
	 * Sauvegarde le contenu des variables $current, $new et $delete dans
	 * un namespace du sfParameterHolder $object->_behavior
	 *
	 */
	protected function save(BaseObject $object) {
		if($this->isLoaded($object)) {
			$object->_behavior->set('current', $this->current, $this->namespace);
			$object->_behavior->set('new', $this->new, $this->namespace);
			$object->_behavior->set('delete', $this->delete, $this->namespace);
		}
	}

	/**
	 * @brief Recharge l'objet tels qu'il est en base de données
	 * @see firstLoad()
	 *
	 * Cette methode recharge l'objet tels qu'il est en base de donnéés.
	 * Pour ce faire, la methode firstLoad() est rappelée.
	 *
	 */
	protected function reload(BaseObject $object) {
		if(isset($object->_behavior)) {
			$object->_behavior->set('init', false, $this->namespace);
		}
	}

/******************************************************************************/
		/******************/
		/*Getter && Setter*/
		/******************/
/******************************************************************************/

	/**
	 * @brief Ajoute un item
	 * @param mixed $element L'element a ajouter
	 * @return bool Vrai si l'element a ete ajouté, faux si l'element existait deja
	 * @see isEqual()
	 * @see create()
	 *
	 * Si un element existant deja renvoie vrai a la methode isEqual() avec
	 * l'element donné, alors celui ci ne sera pas ajouté et la methode r
	 * envera faux. Sinon le resultat de la methode create() avec $element
	 * sera ajouté aux nouveaux.
	 *
	 */
	protected function add(BaseObject $object, $element) {
		$this->load($object);
		$add = true;
		foreach($this->new as $new) {
			if($this->isEqual($new, $element, 'add')) {
				$add = false;
				break;
			}
		}
		if($add) {
			foreach($this->current as $current) {
				if($this->isEqual($current, $element, 'add')) {
					$add = false;
					break;
				}
			}
		}
		if($add) {
			$this->new[] = $this->create($element);
			$this->save($object);
		}
		return $add;
	}

	/**
	 * @brief Ajoute la liste des items
	 * @param array $elements Tableau des items a ajouter
	 * @see add()
	 *
	 * Ajoute la liste des items. Chaque item est envoyé a la methode add.
	 *
	 */
	protected function addAll(BaseObject $object, $elements) {
		if(!is_array($elements)) { $elements = array($elements); }
		foreach($elements as $element) {
			$this->add($object, $element);
		}
	}

	/**
	 * @brief Supprime l'element identifié
	 * @param mixed $element Permet d'identifier un element
	 * @return bool Vrai si l'element a ete supprimé
	 * @see isEqual()
	 *
	 * Supprime le premier element qui renvoie vrai a la methode isEqual() avec
	 * les parametres $element est supprimé.
	 *
	 */
	protected function delete(BaseObject $object, $element) {
		$this->load($object);
		$delete = false;
		foreach($this->new as $index => $new) {
			if($this->isEqual($new, $element, 'delete')) {
				unset($this->new[$index]);
				$delete = true;
				break;
			}
		}
		if(!$delete) {
			foreach($this->current as $index => $current) {
				if($this->isEqual($current, $element, 'delete')) {
					$this->delete[] = $current;
					unset($this->current[$index]);
					$delete = true;
					break;
				}
			}
		}
		$this->save($object);
		return $delete;
	}

	/**
	 * @brief Supprime tout les elements
	 *
	 * Supprime tout les elements.
	 *
	 */
	protected function deleteAll(BaseObject $object) {
		$this->load($object);
		$this->delete = array_merge($this->current, $this->delete);
		$this->current = array();
		$this->new = array();
		$this->save($object);
	}

	/**
	 * @brief Retrouve un element
	 * @param mixed $element Permet d'identifier un element
	 * @param mixed $default la valeur de retour si aucun element n'a ete trouver
	 * @return BaseObject l'element
	 * @see isEqual()
	 *
	 * Permet de retrouver un element. Le premier element qui renvoie vrai
	 * avec la methode isEqual() et $element est renvoyé. Si aucun element
	 * n'a ete trouvé alors $default est renvoyé.
	 *
	 */
	protected function get(BaseObject $object, $element, $default = null) {
		$this->load();
		foreach($this->new as $new) {
			if($this->isEqual($new, $element, 'get')) {
				return $new;
			}
		}
		foreach($this->current as $current) {
			if($this->isEqual($current, $element, 'get')) {
				return $current;
			}
		}
		return $default;
	}

	/**
	 * @brief Retourne la liste de tout les elements
	 * @return array La liste de tout les elements
	 *
	 * Retourne la liste de tout les elements, qu'ils existent deja en base
	 * ou qu'ils soient nouveaux.
	 *
	 */
	protected function getAll(BaseObject $object) {
		$this->load($object);
		return array_merge($this->current, $this->new);
	}

	/**
	 * @brief Modifie ou crée un element
	 * @param mixed $element Permet d'identifier l'element a modifié
	 * @param mixed $new_value Les nouvelles valeurs de l'element a modifié
	 * @return bool Vrai si la modification a bien ete effectué
	 * @see isEqual()
	 * @see create()
	 * @see modify()
	 * @see add()
	 *
	 * Parcourt tout les elements associé a l'objet en cours. Si la methode
	 * isEqual() renvoie vrai pour un element de la liste, alors celui ci
	 * sera modifié par la methode modify(), sinon un element sera crée avec
	 * la methode create() par l'intermediaire de la methode add().
	 *
	 */
	/**@deprecated
	protected function set(BaseObject $object, $element, $new_value) {
		$this->load($object);
		foreach($this->new as $index => $new) {
			if($this->isEqual($new, $element, 'set')) {
				$this->new[$index] = $this->modify($this->new[$index], $new_value);
				$return = true;
			}
		}
		foreach($this->current as $index => $current) {
			if($this->isEqual($current, $element, 'set')) {
				unset($this->current[$index]);
				$this->modify($current, $new_value);
				$this->new[] = $current;
				$return = true;
			}
		}
		$return = $this->add($new_value);
		$this->save($object);
		return $return;
	}
	*/

	/**
	 * @brief Modifie tout les elements
	 * @param mixed $elements La liste des elements a modifier
	 * @param mixed $new_values La liste des valeurs pour les elements a modifier
	 * @param bool $delete_old Definit si ceux qui ne sont pas dans la nouvelle liste seront supprimé ou pas (faux par defaut)
	 * @see set()
	 * @deprecated non fonctionnel
	 *
	 * Tout les nouveaux elements sont envoyés a la methodes set()
	 *
	 */
	/**@deprecated
	protected function setAll(BaseObject $object, $elements, $new_values, $delete_old = false) {
		foreach($elements as $index => $element) {
			$this->set($element, $new_values[$index]);
		}
	}
	*/

	/**
	 * @brief Verifie l'existence d'un element.
	 * @param mixed $element Permet d'identifier un element
	 * @return bool Vrai si l'element existe
	 * @see get()
	 *
	 * Verifie l'existence d'un element. Si la methode get() renvoie un
	 * element, alors la methode renvoie vrai, sinon faux.
	 *
	 */
	protected function has(BaseObject $object, $element = null) {
		$this->load($object);
		if($element) {
			return (bool) $this->get($element, false);
		}
		else {
			return (bool) $this->count($object);
		}
	}

	/**
	 * @brief Compte le nombre d'element
	 * @return int Nombre d'element
	 *
	 */
	protected function count(BaseObject $object) {
		$this->load($object);
		return count($this->current) + count($this->new);
	}

/******************************************************************************/
		/***********************/
		/*PostSave - PostDelete*/
		/***********************/
/******************************************************************************/

	/**
	 * @brief Sauvegarde les parametres du behavior de l'objet en base
	 * @param BaseObject $object objet du behavior
	 * @see preSaveElement()
	 *
	 * Sauvegarde les nouveaux objets contenue dans $new en base de données
	 * et supprime les objets contenue dans $delete. Tous les nouveaux elements
	 * sont envoyé a la methode preSaveElement() afin que l'utilisateur puisse
	 * les tagger.
	 *
	 */
	public function postSave(BaseObject $object) {
		if($this->isLoaded($object)) {
			$this->load($object);
			foreach($this->current as $current) {
				$current->save();
			}
			foreach($this->new as $index => $new) {
				$this->preSaveElement($object, $this->new[$index]);
				$new->save();
			}
			foreach($this->delete as $delete) {
				$delete->delete();
			}
			$this->current = array_merge($this->current, $this->new);
			$this->new = array();
			$this->delete = array();
			$this->save($object);
		}
	}

	/**
	 * @brief Supprime les parametres du behavior de l'objet en base
	 * @param BaseObject $object
	 *
	 * Supprime les objets contenue dans les tableaux $current et $delete de
	 * la base de données
	 *
	 */
	public function postDelete(BaseObject $object) {
		$this->load($object);
		foreach($this->current as $current) {
			$current->delete();
		}
		foreach($this->delete as $delete) {
			$delete->delete();
		}
		$this->current = array();
		$this->new = array();
		$this->delete = array();
		$this->save($object);
	}

/******************************************************************************/
		/********************/
		/*Fonction abstraite*/
		/********************/
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
	abstract protected function isEqual($element_1, $element_2, $method_call = null);

	/**
	 * @brief Créé un element
	 * @param mixed $value Definition d'un element
	 * @return L'element nouvellement créé
	 *
	 * Cette methode créé un element, qui sera rattaché a l'ojet, a partir de
	 * $value
	 *
	 */
	abstract protected function create($value);

	/**
	 * @brief Modifie un element avec les nouvelles valeurs
	 * @param BaseObject $element Element lié a l'objet
	 * @param mixed $new_value Nouveaux parametres de l'element
	 *
	 * Modifie $element avec ses nouveaux parametres fournit dans $new_value
	 *
	 */
	abstract protected function modify(&$element, $new_value);

	/**
	 * @brief Permet de tagger un element avant sa sauvegarde
	 * @param BaseObject $object
	 * @param BaseObject $element
	 * @return L'element modifié
	 *
	 * Donne à l'utilisateur la possibilité de tagger les éléments avant que
	 * ceux-ci ne soient sauvegardés en base de données. Chaque élément est
	 * envoyé dans cette methode, ainsi que l'objet en cours.
	 *
	 */
	protected function preSaveElement(BaseObject $object, &$element) {
		$element->setObjectId($object->getId());
		$element->setObjectName(get_class($object));
	}

	public static function doSelectObject($object_id, $object_name) {
		$peer = $object_name . 'Peer';
		return call_user_func($peer . '::retrieveByPk', $object_id);
	}
}

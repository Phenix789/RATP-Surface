<?php
/**
 * @brief Définition de la class Person
 * @class Person
 * @package Application
 * @subpackage Contact.Person
 *
 * @author Elogys <contact@elogys.fr>
 * @author 
 * @date 17 Mar 2010
 * @version 1.0
 *
 */
class Person extends PhysicalPerson1 {

	/**
	 * @brief Getter Retourne la structure lié
	 * @return Structure La structure lié
	 *
	 */
	public function getStructure() {
		return $this->getContactRelatedByParentId();
	}

	/**
	 * @brief Lie au contact une structure
	 * @param Structure $structure La structure a lié
	 *
	 */
	public function setStructure(Structure $structure) {
		$this->setContactRelatedByParentId($structure);
	}

	/**
	 * @brief Getter Retourne l'id de la structure lié
	 * @return int L'id de la structure lié
	 * 
	 */
	public function getStructureId() {
		return $this->getParentId();
	}

	/**
	 * @brief Setter Lie au contact une structure représenté par son id
	 * @param int $structure_id L'id de la structure a lié
	 * 
	 */
	public function setStructureId($structure_id) {
		$this->setParentId($structure_id);
	}

	public function hasStructure() {
		return (bool) $this->getStructureId();
	}

	/**
	 * @brief Getter Retourne la concatenation du nom et du prenom
	 * @return string Le nom complet
	 *
	 */
	public function getFullName() {
		return trim($this->getCivility() . ' ' . $this->getLastName() . ' ' . $this->getFirstName());
	}

	/**
	 * @brief Getter Retourne la concatenation du nom et du prenom
	 * @return string Le nom complet
	 *
	 */
	public function getFullNameWithLongCilitity() {
		$civility = $this->getCivility();
		if($civility) {
			if($civility->getLongName()) {
				$civility = $civility->getLongName();
			}
			else {
				$civility = $civility->getShortName();
			}
		}
		return trim($civility . ' ' . $this->getLastName() . ' ' . $this->getFirstName());
	}

	public function getFriendlyName() {
		return trim($this->getFirstName() . ' ' . $this->getLastName());
	}

	public function getCivilityName() {
		return trim($this->getCivility() . ' ' . $this->getLastName());
	}
        
        public function getStructureAndFullName() {
            $structure = $this->getParent();
            return $structure ? $structure . ' > '. $this->getFullName() : $this->getFullName();
        }
        
        
        public function getStructureAndFriendlyName() {
            $structure = $this->getParent();
            return $structure ? $structure . ' > '. $this->getFullName() : $this->getFullName();
        }

	/**
	 * @brief Retourne une representation sous forme de chaine de caractere de l'objet
	 * @return string Representation de l'objet
	 *
	 */
	public function __toString() {
		return $this->getFullName();
	}

}

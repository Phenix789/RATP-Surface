<?php
/**
 * @brief Définition de la class Structure
 * @class Structure
 * @package Plugin
 * @subpackage surfaceContact
 *
 * @author Elogys <contact@elogys.fr>
 * @author 
 * @date 17 Mar 2010
 * @version 1.0
 *
 */
class Structure extends MoralPerson1 {

	/**
	 * @brief Retourne une representation sous forme de chaine de caractere de l'objet
	 * @return string Representation de l'objet
	 *
	 */
	public function __toString() {
		return $this->getName();
	}

}

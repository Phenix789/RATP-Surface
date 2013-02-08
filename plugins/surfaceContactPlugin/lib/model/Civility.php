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
class Civility extends BaseCivility {

	public function getConfig() {
		return sfConfig::get('app_contact_civility', array());
	}

	public function count() {
		return $this->countContacts();
	}

	/**
	 * @brief Retourne une representation sous forme de chaine de caractere de l'objet
	 * @return string Representation de l'objet
	 *
	 */
	public function __toString() {
		return $this->getShortName() ? $this->getShortName() : $this->getLongName();
	}

}

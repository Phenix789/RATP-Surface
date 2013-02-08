<?php
/**
 * @brief actions du module
 * @class 
 * @package Application
 * @subpackage
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.0
 * @license LGPL
 *
 * Regroupe toutes les actions du module ainsi que d'autres fonctions neccessaire a
 * leurs executions
 *
 */
class optionsActions extends sfSurfaceActions {

/******************************************************************************/
		/*********/
		/*Actions*/
		/*********/
/******************************************************************************/

	/**
	 * @brief Action qui ajoute un champs de saisie pour une option
	 * @fn public function executeAddOption()
	 * @return string $this->class class de l'objet ausquel appartient la futur option
	 * @return string $this->field partie de nom des champs de saisie
	 *
	 */
	public function executeAddOption() {
		$this->class = $this->getRequestParameter('class');
		$this->field = $this->getRequestParameter('field');
	}

}

<?php
/**
 * @brief Modele de vue
 * @class ModelView
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class ModelView extends View {

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->setType(ViewPeer::CLASSKEY_0);
		$this->setWorksheetId(0);
	}

/******************************************************************************/
		/**********************/
		/*Specifique ModelView*/
		/**********************/
/******************************************************************************/

	public function preSave(PropelPDO $con = null) {
		$this->setWorksheetId(null);
		return true;
	}

//	public function getWorksheet() {
//		return null;
//	}

	public function getModel() {
		return 'ModelView';
	}

}

sfPropelBehavior::add('ModelView', array('sfPropelOptionsBehavior'));

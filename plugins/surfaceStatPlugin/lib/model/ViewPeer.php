<?php
/**
 * @brief Vue
 * @class ViewPeer
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class ViewPeer extends BaseViewPeer {

	/**
	 * @brief Selectionne toutes les vues (hors modele)
	 * @fn public static function doSelectView()
	 * @return array liste de toutes les vues
	 * 
	 */
	public static function doSelectView() {
		$criteria = new Criteria();
		$criteria->add(ViewPeer::WORKSHEET_ID, 0, Criteria::NOT_EQUAL);
		$criteria->addAscendingOrderByColumn(ViewPeer::NAME);
		if($namespaces = sfConfig::get('app_surface_stat_namespaces')) {
			$criterion = $criteria->getNewCriterion(ViewPeer::NAME_SPACE, null, CRITERIA::ISNULL);
			$criterion->addOr($criteria->getNewCriterion(ViewPeer::NAME_SPACE, implode(', ', $namespaces), CRITERIA::IN));
			$criteria->add($criterion);
		}
		return ViewPeer::doSelect($criteria);
	}

	/**
	 * @brief Selectionne tous les modeles de vue
	 * @fn public static function doSelectModel()
	 * @return array liste de touts les modeles
	 *
	 */
	public static function doSelectModel() {
		$c = new Criteria();
		$c->add(ViewPeer::WORKSHEET_ID, 0);
		return ViewPeer::doSelect($c);
	}

	/**
	 * @brief Selectionne toutes les vues avec comme id $id
	 * @fn public static function doSelectMultiple($id)
	 * @param mixed $id $id est un tableau d'entier comprennant les id des elements a selectionner ou est un entier d'un element
	 * @return array liste des vues selectionné
	 * 
	 */
	public static function doSelectMultiple($id) {
		if(is_array($id)) { $comp = Criteria::IN; }
		else { $comp = Criteria::EQUAL; }
		$c = new Criteria();
		$c->add(ViewPeer::ID, $id, $comp);
		return ViewPeer::doSelect($c);
	}

}

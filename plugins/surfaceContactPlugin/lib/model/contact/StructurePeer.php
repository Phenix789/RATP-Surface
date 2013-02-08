<?php
/**
 * @brief Peer de la class Structure
 * @class StructurePeer
 * @package Plugin
 * @subpackage surfaceContact
 *
 * @author Elogys <contact@elogys.fr>
 * @author 
 * @date 17 Mar 2010
 * @version 1.0
 *
 */
class StructurePeer extends ContactPeer {

	/**
	 * @brief Retourne les objets Person correspondant au criteria
	 * @param Criteria $criteria Critere de recherche
	 * @param Connection $con Connection a la base de données
	 * @return array Tableau d'objet Person
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
		$criteria = clone $criteria;
		$criteria->add(ContactPeer::TYPE, StructurePeer::CLASSKEY_MORALPERSON1);
		return parent::doSelect($criteria, $con);
	}

	/**
	 * @brief Compte le nombre d'enregistrement correspondant au criteria
	 * @param Criteria $criteria Critere de recherche
	 * @param bool $distinct Ajoute ou non la clausse distinct
	 * @param Connection $con Connection a la base de données
	 * @return int Nombre d'enregistrement corrspondant
	 * 
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null) {
		$criteria = clone $criteria;
		$criteria->add(ContactPeer::TYPE, StructurePeer::CLASSKEY_MORALPERSON1);
		return parent::doCount($criteria, $distinct, $con);
	}

}

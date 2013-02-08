<?php
/**
 * @brief Peer de la class ##CLASS_NAME##
 * @class ##PEER_NAME##
 * @package Application
 * @subpackage Contact.##CLASS_NAME##
 *
 * @author Elogys <contact@elogys.fr>
 * @author 
 * @date ##DATE##
 * @version 1.0
 *
 */
class ##PEER_NAME## extends ##PEER_MODEL## {

	/**
	 * @brief Retourne les objets ##CLASS_NAME## correspondant au criteria
	 * @param Criteria $criteria Critere de recherche
	 * @param Connection $con Connection a la base de données
	 * @return array Tableau d'objet Person
	 */
	public static function doSelect(Criteria $criteria, $con = null) {
		$criteria = clone $criteria;
		$criteria->add(ContactPeer::TYPE, ##PEER_NAME##::CLASSKEY_##TYPE_ID##);
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
	public static function doCount(Criteria $criteria, $distinct = false, $con = null) {
		$criteria = clone $criteria;
		$criteria->add(ContactPeer::TYPE, ##PEER_NAME##::CLASSKEY_##TYPE_ID##);
		return parent::doCount($criteria, $distinct, $con);
	}

}

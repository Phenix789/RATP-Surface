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
class ContactPeer extends BaseContactPeer{

	/**
	 * @brief Determine la class a créer
	 * @param ResultSet $rs Resultset
	 * @param int $colnum Colonne a examiner pour determiner la class
	 * @return string Nom de la class a créer
	 */
	public static function getOMClass($row, $colnum, $withPrefix = true){
		$omClass = parent::getOMClass($row, $colnum, $withPrefix);
		$config = self::getOMClassConfig($omClass);
		return $config['class'];
	}

	/**
	 * @brief Retrouve les configurations de l'OMClass
	 * @param string $omClass L'OMClass
	 * @return array Les configurations
	 */
	protected static function getOMClassConfig($omClass){
		$omClass = explode('.', $omClass);
		$class = $omClass[count($omClass) - 1];
		unset($omClass[count($omClass) - 1]);
		$path = implode('.', $omClass);
		$config = sfConfig::get('app_contact_inheritance');
		if(isset($config[$class])){
			$options = $config[$class];
		} else {
			$options = array();
		}
		$default_options = array(
			'class' => $class,
			'path' => $path,
		);
		return array_merge($default_options, $options);
	}

	public static function doSelectGroup(Criteria $criteria, Contact $contact, PropelPDO $con = null){
		$config = $contact->getConfig();
		$type = get(array('group', 'type'), $config);
		if($type){
			$namespaces = GroupPeer::getNamespaceGroupType($type);
			$criteria = clone $criteria;
			$criteria->add(GroupPeer::NAME_SPACE, $namespaces, CRITERIA::IN);
		}
		return GroupPeer::doSelect($criteria, $con);
	}

	public static function doSelectService(Criteria $criteria, Contact $contact, PropelPDO $con = null){
		$config = $contact->getConfig();
		$type = get(array('service', 'type'), $config);
		if($type){
			$namespaces = ServicePeer::getNamespaceServiceType($type);
			$criteria = clone $criteria;
			$criteria->add(ServicePeer::NAME_SPACE, $namespaces, CRITERIA::IN);
		}
		return ServicePeer::doSelect($criteria, $con);
	}

	public static function doSelectCivility(Criteria $criteria, Contact $contact, PropelPDO $con = null){
		$config = $contact->getConfig();
		$type = get(array('civility', 'type'), $config);
		if($type){
			$namespaces = CivilityPeer::getNamespaceCivilityType($type);
			$criteria = clone $criteria;
			$criteria->add(CivilityPeer::NAME_SPACE, $namespaces, CRITERIA::IN);
		}
		return CivilityPeer::doSelect($criteria, $con);
	}

	public static function doSelectFromGroup(Group $group){
		$criteria = new Criteria();
		$criteria->add(ContactGroupPeer::GROUP_ID, $group->getId());
		$criteria->addJoin(ContactGroupPeer::CONTACT_ID, ContactPeer::ID);
		return self::doSelect($criteria);
	}


	public static function doSelectOrderedByName(Criteria $criteria, PropelPDO $con = null){
		$criteria->addAscendingOrderByColumn(self::NAME);
		return parent::doSelect($criteria, $con);
	}

	public static function doSelectOrderedByShortName(Criteria $criteria, PropelPDO $con = null){
		$criteria->addAscendingOrderByColumn(self::SHORT_NAME);
		return parent::doSelect($criteria, $con);
	}
	public static function doSelectOrderedByLastName(Criteria $criteria, PropelPDO $con = null){
		$criteria->addAscendingOrderByColumn(self::LAST_NAME);
		return parent::doSelect($criteria, $con);
	}



}

<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUserPeer.php 5760 2007-10-30 07:51:16Z francois $
 */
class sfGuardUserPeer extends PluginsfGuardUserPeer {

	public static function doSelectOrderByProfileName(Criteria $criteria) {
		$criteria->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID, CRITERIA::LEFT_JOIN);
		$criteria->addJoin(sfGuardUserProfilePeer::COLLABORATOR_ID, CollaboratorPeer::ID, CRITERIA::LEFT_JOIN);
		$criteria->addAscendingOrderByColumn(CollaboratorPeer::LAST_NAME);
		$criteria->addAscendingOrderByColumn(CollaboratorPeer::FIRST_NAME);
		return sfGuardUserPeer::doSelect($criteria);
	}
	
/******************************************************************************/
        /**********/
        /* Sudoer */
        /**********/
/******************************************************************************/

	/**
	 * @brief Retrouve le compte déclarer comme compte super admin
	 * @return sfGuardUser
	 *
	 */
	public static function getSudoAccount() {
		$sudo = sfConfig::get('app_surface_sudo_account', 'admin');
		$criteria = new Criteria();
		$criteria->add(sfGuardUserPeer::USERNAME, $sudo);
		return sfGuardUserPeer::doSelectOne($criteria);
       	}

/******************************************************************************/
		/******************/
		/* Gestion des ip */
		/******************/
/******************************************************************************/

        public static function doSelectFilteringIps($id) {
                return sfGuardFilteringIpPeer::doSelectFilteringIps($id, 'user');
        }

/******************************************************************************/

}

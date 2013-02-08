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
 * @version    SVN: $Id: sfGuardGroup.php 5760 2007-10-30 07:51:16Z francois $
 */
class sfGuardGroup extends PluginsfGuardGroup {

/***************************************************************************** */
		/**/
		/**/
		/**/
/***************************************************************************** */

        public function setLoadedPermissions($permissionsData) {
                new sfPropelData();
                foreach($permissionsData as $data) {
                        $groupPermission = new sfGuardGroupPermission();

                        if(isset($data['entity_name'])) {
                                $criteria = new Criteria();
                                $criteria->add(sfGuardEntityPeer::NAME, $data['entity_name'], Criteria::EQUAL);
                                $entity = sfGuardEntityPeer::doSelectOne($criteria);

                                $groupPermission->setsfGuardEntity($entity);
                        }

                        if(isset($data['permission_name'])) {
                                $criteria = new Criteria();
                                $criteria->add(sfGuardPermissionPeer::NAME, $data['permission_name'], Criteria::EQUAL);
                                $permission = sfGuardPermissionPeer::doSelectOne($criteria);
                                $groupPermission->setsfGuardPermission($permission);
                        }

                        $this->addsfGuardGroupPermission($groupPermission);
                }
        }

}

sfPropelBehavior::add('sfGuardGroup', array('sfGuardIpBehavior'));

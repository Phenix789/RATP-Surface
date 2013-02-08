<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Group management.
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 1949 2006-09-05 14:40:20Z fabien $
 */
class basesfGuardGroupActions extends autosfGuardGroupActions {

        protected function savesfGuardGroup($sf_guard_group) {
                parent::savesfGuardGroup($sf_guard_group);

                switch($this->getActionName()) {
                        case 'create':
                        case 'edit' :
                                // Update many-to-many for "associated_entity_permissions"
                                $c = new Criteria();
                                $c->add(sfGuardGroupPermissionPeer::GROUP_ID, $sf_guard_group->getPrimaryKey());
                                sfGuardGroupPermissionPeer::doDelete($c);

                                $ids = $this->getRequestParameter('associated_permissions');
                                if(is_array($ids)) {
                                        $ids = array_unique($ids);
                                        foreach($ids as $id) {
                                                if(preg_match('/(?<entity_id>\d*)\\' . sfGuardEntity::ENTITY_SEPARATOR . '(?<permission_id>\d+)/', $id, $matches)) {
                                                        $sfGuardGroupPermission = new sfGuardGroupPermission();
                                                        $sfGuardGroupPermission->setGroupId($sf_guard_group->getPrimaryKey());
                                                        $sfGuardGroupPermission->setEntityId($matches['entity_id']);
                                                        $sfGuardGroupPermission->setPermissionId($matches['permission_id']);
                                                        $sfGuardGroupPermission->save();
                                                }
                                        }
                                }
                                break;
                }
        }

        protected function updateSfGuardGroupFromRequest() {
                parent::updateSfGuardGroupFromRequest();
                $params = $this->getRequestParameter('sf_guard_group');
                $this->sf_guard_group->deleteAllIps();
                $this->sf_guard_group->addAllIps(get('associated_ip', $params, array()));
        }

}

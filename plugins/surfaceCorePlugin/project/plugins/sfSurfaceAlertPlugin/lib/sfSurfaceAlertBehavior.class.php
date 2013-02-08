<?php
/**
 * @package surface
 * @subpackage alert
 * @author François <francois@elogys.fr>
 */
class sfSurfaceAlertBehavior {

        private static function getAlertHolder(BaseObject $object) {
                if((!isset($object->_alert))|| ( $object->_alert==null)) {
                        if(class_exists('sfNamespacedParameterHolder')) {
                                //Symfony 1.1
                                $parameter_holder = 'sfNamespacedParameterHolder';
                        }
                        else {
                                //Symfony 1.0
                                $parameter_holder = 'sfParameterHolder';
                        }
                        $object->_alert = new $parameter_holder();
                }
                return $object->_alert;
        }

        private function getSavedAlerts(BaseObject $object, $sortColumn='trigger_at', $sortOrder='ASC') {
                if(!isset($object->_alert)|| ! $object->_alert->hasNamespace('ns_saved_alerts')) {
                        $objectId = $object->getId();
                        $objectClass = get_class($object);

                        $c = new Criteria();
                        $c->add(AlertPeer::MODEL_CLASS, $objectClass);
                        $c->add(AlertPeer::MODEL_ID, $objectId);

                        $c->add(AlertPeer::ACQUITTED_AT, null, Criteria::ISNULL);

                        if($sortOrder=='DESC') {
                                $c->addDescendingOrderByColumn(AlertPeer::translateFieldName($sortColumn, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME));
                        }
                        else {
                                $c->addAscendingOrderByColumn(AlertPeer::translateFieldName($sortColumn, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME));
                        }
                        $savedAlertList = AlertPeer::doSelect($c);
                        $savedAlerts = array();
                        foreach($savedAlertList as $alert) {
                                $savedAlerts[$alert->getId()] = $alert;
                        }
                        self::set_saved_alerts($object, $savedAlerts);

                        return $savedAlerts;
                }
                else {
                        return self::get_saved_alerts($object);
                }
        }

        private static function add_alert(BaseObject $object, $alert) {
                self::getAlertHolder($object)->set($alert->getTmpId(), $alert, 'ns_new_alerts');
        }

        private static function add_removed_alert(BaseObject $object, $alert) {
                self::getAlertHolder($object)->set($alert->getId(), $alert, 'ns_removed_alerts');//
        }

        private static function get_saved_alerts(BaseObject $object) {
                return self::getAlertHolder($object)->getAll('ns_saved_alerts');
        }

        private static function get_new_alerts(BaseObject $object) {
                return self::getAlertHolder($object)->getAll('ns_new_alerts');
        }

        private static function get_removed_alerts(BaseObject $object) {
                return self::getAlertHolder($object)->getAll('ns_removed_alerts');
        }

        private static function clear_saved_alerts(BaseObject $object) {
                self::getAlertHolder($object)->removeNamespace('ns_saved_alerts');
        }

        private static function clear_new_alerts(BaseObject $object) {
                self::getAlertHolder($object)->removeNamespace('ns_new_alerts');
        }

        private static function clear_removed_alerts(BaseObject $object) {
                self::getAlertHolder($object)->removeNamespace('ns_removed_alerts');
        }

        private static function set_saved_alerts(BaseObject $object, $alerts) {
                self::clear_saved_alerts($object);
                foreach($alerts as $alert) {
                        self::getAlertHolder($object)->set($alert->getId(), $alert, 'ns_saved_alerts');//
                }
        }

        private static function set_new_alerts(BaseObject $object, $alerts) {
                self::clear_new_alerts($object);
                foreach($alerts as $alert) {
                        self::getAlertHolder($object)->set($alert->getTmpId(), $alert, 'ns_new_alerts');
                }
        }

        public function addAlert(BaseObject $object, $alert) {
                if(is_array($alert)) {
                        foreach($alert as $a) {
                                $this->addAlert($object, $a);
                        }
                }
                else {
                        self::add_alert($object, $alert);
                }
        }

        public function removeAlert(BaseObject $object, $alert) {

                if(is_array($alert)) {
                        foreach($alert as $a) {
                                $this->removeAlert($object, $a);
                        }
                }
                else {

                        $new_alerts = self::get_new_alerts($object);
                        $saved_alerts = $this->getSavedAlerts($object);

                        if(isset($new_alerts[$alert->getTmpId()])) {
                                unset($new_alerts[$alert->getTmpId()]);
                                self::set_new_alerts($object, $new_alerts);
                        }

                        if(isset($saved_alerts[$alert->getId()])) {
                                unset($saved_alerts[$alert->getId()]);
                                self::set_saved_alerts($object, $saved_alerts);
                                self::add_removed_alert($object, $alert);
                        }
                }
        }

        public function setAlertsFromRequest(BaseObject $object, $alerts) {
                $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());

                //on met à jour les alertes existantes et les nouvelles alertes
                foreach($alerts as $alert) {
                        $new = !isset($alert['id']) || $alert['id']=='';
                        if($new) {
                                $a = new Alert();
                        }
                        else {
                                $a = AlertPeer::retrieveByPk($alert['id']);
                        }

                        $triggerDate = $dateFormat->format($alert['triggeredAt'], 'I', $dateFormat->getInputPattern('g'));
                        $a->setTriggerAt($triggerDate);
                        $a->setMessage($alert['message']);
                        if(isset($alert['isAcquitted']) && $alert['isAcquitted']==1) $a->setAcquittedAt(date('Y-m-d'));
                        else $a->setAcquittedAt(NULL);
/////////////===============================à modifier            
                        //           $collaboratorId=(is_callable(array($object,'getCollaboratorId')))?$object->getCollaboratorId():'';
                        //           $a->setCollaboratorId($collaboratorId);
//////////////////====================================


                        $this->addAlert($object, $a);
                        //on ajoute TOUT ce qui est reçu du formulaire car cette methode est appelée par une
                        //surcharge de update<ObjectCible>FromRequest c'est donc la dernière avant le postsave.
                        //la méthode save de l'objet Alert distingue automatiquement l'update du create ou de
                        //l'enregistrement inchangé
                }

                //on determine quelles alertes on étées supprimées
                $savedAlerts = $this->getSavedAlerts($object);
                foreach($savedAlerts as $savedAlert) {
                        $savedAlertId = $savedAlert->getId();
                        $flagToBeRemoved = true;
                        foreach($alerts as $alert) {
                                $alertId = $alert['id'];
                                if($alertId==$savedAlertId) {
                                        $flagToBeRemoved = false;
                                        break;
                                }
                        }
                        if($flagToBeRemoved) {
                                $this->removeAlert($object, $savedAlert);
                        }
                }
        }

        public function getAlerts(BaseObject $object) {
                $alerts = array_merge(self::get_new_alerts($object), $this->getSavedAlerts($object));
                return $alerts;
        }

        public function getAlertsCount(BaseObject $object) {
                return count($this->getAlerts($object));
        }

        public function getCountActiveExpiredAlerts($object) {

                $nb = 0;
                $alerts = $this->getAlerts($object);
                foreach($alerts as $alert) {
                        if($alert->isExpired()&&$alert->getIsActive()) {
                                $nb++;
                        }
                }
                return $nb;
        }

        public function postSave(BaseObject $object) {
                $modelId = $object->getId();
                $modelClass = get_class($object);
                $alerts = self::get_new_alerts($object);
                foreach($alerts as $alert) {
                        $alert->setModelId($modelId);
                        $alert->setModelClass($modelClass);

                        $alert->save();
                }
                $alerts = self::get_removed_alerts($object);
                foreach($alerts as $alert) {
                        $alert->delete();
                }
                self::clear_new_alerts($object);
                self::clear_saved_alerts($object);
                self::clear_removed_alerts($object);
        }

        public function postDelete(BaseObject $object) {
                $alerts = $this->getAlerts($object);
                foreach($alerts as $alert) {
                        $alert->delete();
                }
        }
        
        public function getTitleForAlert(BaseObject $object) {
            $object_type = $object->getMetadata('name');            
            return $object_type . ": " . $object->__toString();
        }
        
        public function getSumupForAlert(BaseObject $object) {     
            return "";
        }

}
?>
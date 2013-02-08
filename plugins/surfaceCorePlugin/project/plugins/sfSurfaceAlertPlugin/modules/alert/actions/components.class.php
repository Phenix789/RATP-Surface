<?php
/**
 * alert components.
 *
 * @package    el_algolite
 * @subpackage alert
 * @author     Your name here
 * @version    SVN: $Id: components.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class alertComponents extends autoAlertComponents {

        protected function addCustomSortCriteria($c, $column_name, $bAsc) {

        }

        public function executeCollaborators() {
                $method = $this->getCollaboratorMethod();
                $c = new Criteria();
                $c->addAscendingOrderByColumn(CollaboratorPeer::FIRST_NAME);
                if($method) {
                    $this->collaborators = CollaboratorPeer::$method($c);
                }
                else {
                    $this->collaborators = CollaboratorPeer::doSelect($c);
                }
                $this->currentCollaboratorId = isset($currentCollaborator) ? $currentCollaborator->getId() : '';
        }

        protected function getCollaboratorMethod() {
            $contact = sfConfig::get('app_alert_contact');
            $method = isset($contact['method']) ? $contact['method'] : false;
            return $method;
        }

        public function executeDashboardAlerts() {
                $c = new Criteria();

                $c->addAscendingOrderByColumn(AlertPeer::MODEL_CLASS);
                $c->addAscendingOrderByColumn(AlertPeer::MODEL_ID);
                $c->addAscendingOrderByColumn(AlertPeer::TRIGGER_AT);
                $c->add(AlertPeer::ACQUITTED_AT, NULL);
                $c->add(AlertPeer::TRIGGER_AT, date('Y-m-d'), Criteria::LESS_EQUAL);
                if(!$this->getContext()->getUser()->hasCredential('alert/admin')) {
                        $currentCollaboratorId = $this->getContext()->getUser()->getProfile()->getId();
                        $c->add(AlertPeer::RECIPIENT_ID, $currentCollaboratorId);
                }

                $this->alerts = AlertPeer::doSelect($c);
        }

        public function executeDashboardAlertsWithColumns() {

                $query = AlertQuery::create()
                            ->filterByAcquittedAt(null)
                            ->filterByTriggerAt(date('Y-m-d'), Criteria::LESS_EQUAL);

                $sf_user = $this->getContext()->getUser();

                if (!$sf_user->hasCredential('alert/admin')) {
                    $currentCollaboratorId = $this->getContext()->getUser()->getProfile()->getId();
                    $query->filterByRecipientId(array(null, 0, $currentCollaboratorId), Criteria::IN)
                        ->_or()
                        ->filterByCreatedBy($sf_user->getGuardUser()->getId());
                }
                
                $query->orderByModelClass()->orderByModelId()->orderByTriggerAt();

                $this->alerts = $query->find();
        }

        public function executeObjectAlerts() {
                $this->alerts = $this->alert_object->getAlerts();
        }

        public function executeAlertListener() {

                $c = new Criteria();
                $c->add(AlertPeer::TRIGGER_AT, time(), Criteria::LESS_EQUAL);
                try {

                        $collaborator = $this->getUser()->getProfile();

                        if(isset($collaborator) && $collaborator!=null) {
                                $c->add(AlertPeer::COLLABORATOR_ID, $collaborator->getId(), Criteria::LESS_EQUAL);
                                $this->alerts = AlertPeer::doSelect($c);
                        }
                        else {
                                echo "Attention il n'y a pas de collaborateur associé à l'utilisateur courant : vous ne recevez pas d'alertes";
                                $this->alerts = array();
                        }
                }
                catch(Exception $e) {
                        echo 'erreur : ' . $e->getMessage() . ' -> les alertes ne s\'adressent pas UNIQUEMENT à leur destinataire';
                }
        }

}


<?php
/**
 * 
 * 
 */
class sfGuardUserProfile extends BasesfGuardUserProfile {

        public function getUsername() {
                if($this->getCollaborator()) {
                        return $this->getCollaborator()->getFirstName() . " " . $this->getCollaborator()->getLastName();
                }
                return $this->getsfGuardUser()->getUsername();
        }

}

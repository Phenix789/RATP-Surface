<?php
/**
 *
 * 
 */
class sfGuardEntity extends BasesfGuardEntity {

        const ENTITY_SEPARATOR = '/';

        public function getFullName() {
                return $this->getName();
        }

}

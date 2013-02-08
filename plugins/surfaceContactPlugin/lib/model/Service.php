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
class Service extends BaseService {

	public function getConfig() {
		return sfConfig::get('app_contact_service', array());
	}

	public function __toString() {
		return $this->getLongName();
	}

}

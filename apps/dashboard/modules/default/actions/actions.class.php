<?php
/**
 *
 *
 *
 */
include(SFC_COMMON_MODULE_DIR . '/default/lib/baseDefaultActions.class.php');
class defaultActions extends baseDefaultActions {

	public function executeShow() {
		$this->configLogo();
		$this->configMessage();
	}

	protected function configLogo() {
		$config_logo = sfConfig::get('app_dashboard_logo');
		$this->logo = isset($config_logo['source']) ? $config_logo['source'] : 'logo.png';
		$this->logo_options = isset($config_logo['options']) ? $config_logo['options'] : array();
	}

	protected function configMessage() {
		$config_message = sfConfig::get('app_dashboard_message');
		$this->msg_active = isset($config_message['active']) ? $config_message['active'] : false;
		$this->msg_allow = isset($config_message['allow']) ? $config_message['allow'] : array();
	}

}

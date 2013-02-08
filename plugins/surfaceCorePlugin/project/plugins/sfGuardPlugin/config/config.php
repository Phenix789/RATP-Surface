<?php

if(sfConfig::get('app_sfGuardPlugin_routes_register', true) && in_array('sfGuardAuth', sfConfig::get('sf_enabled_modules', array()))) {
        $r = sfRouting::getInstance();

        // preprend our routes
        $r->prependRoute('sf_guard_signin', '/login', array('module' => 'sfGuardAuth', 'action' => 'signin'));
        $r->prependRoute('sf_guard_signout', '/logout', array('module' => 'sfGuardAuth', 'action' => 'signout'));
        $r->prependRoute('sf_guard_password', '/request_password', array('module' => 'sfGuardAuth', 'action' => 'password'));
}

/***************************************************************************** */
		/******************/
		/* Gestion des ip */
		/******************/
/***************************************************************************** */

sfPropelBehavior::registerHooks('sfGuardIpBehavior',
				array(	':save:post' => array('sfGuardIpBehavior', 'postSave'),
					':delete:post' => array('sfGuardIpBehavior', 'postDelete')
				)
);

sfPropelBehavior::registerMethods('sfGuardIpBehavior',
	array(
		array('sfGuardIpBehavior', 'addIp'),
		array('sfGuardIpBehavior', 'getIp'),
		array('sfGuardIpBehavior', 'setIp'),
		array('sfGuardIpBehavior', 'deleteIp'),
		array('sfGuardIpBehavior', 'addAllIps'),
		array('sfGuardIpBehavior', 'getAllIps'),
		array('sfGuardIpBehavior', 'setAllIps'),
		array('sfGuardIpBehavior', 'deleteAllIps'),
		array('sfGuardIpBehavior', 'hasIp'),
		array('sfGuardIpBehavior', 'countIp'),
		array('sfGuardIpBehavior', 'getAllIpsAuthorized')
	)
);

/***************************************************************************** */
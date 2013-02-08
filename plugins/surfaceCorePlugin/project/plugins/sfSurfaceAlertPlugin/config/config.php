<?php
sfPropelBehavior::registerHooks('sfSurfaceAlertBehavior',
				array(	':save:post' => array('sfSurfaceAlertBehavior', 'postSave'),
					':delete:post' => array('sfSurfaceAlertBehavior', 'postDelete')
				)
);




sfPropelBehavior::registerMethods('sfSurfaceAlertBehavior',
	array(
		array('sfSurfaceAlertBehavior', 'addAlert'),
                array('sfSurfaceAlertBehavior', 'setAlertsFromRequest'),
                array('sfSurfaceAlertBehavior', 'removeAlert'),
                array('sfSurfaceAlertBehavior', 'getAlerts'),
                array('sfSurfaceAlertBehavior', 'getAlertsCount'),
                array('sfSurfaceAlertBehavior', 'getCountActiveExpiredAlerts'),
                array('sfSurfaceAlertBehavior', 'getSumupForAlert'),
                array('sfSurfaceAlertBehavior', 'getTitleForAlert')
	)
);

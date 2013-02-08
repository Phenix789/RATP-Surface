<?php
/**
 * @brief Enregistrement des methodes du behavior surfaceHistory
 * @package Plugin
 * @subpackage surfaceHistoryBehavior
 *
 * @author 
 * @date 
 * @version 
 *
 */
sfPropelBehavior::registerHooks('surfaceHistoryBehavior',
				array(	':save:post' => array('surfaceHistoryBehavior', 'postSave'),
					':delete:post' => array('surfaceHistoryBehavior', 'postDelete')
				)
);

sfPropelBehavior::registerMethods('surfaceHistoryBehavior',
	array(
		array('surfaceHistoryBehavior', 'addHistory'),
		array('surfaceHistoryBehavior', 'getHistory'),
		array('surfaceHistoryBehavior', 'setHistory'),
		array('surfaceHistoryBehavior', 'deleteHistory'),
		array('surfaceHistoryBehavior', 'addAllHistorys'),
		array('surfaceHistoryBehavior', 'getAllHistorys'),
		array('surfaceHistoryBehavior', 'setAllHistorys'),
		array('surfaceHistoryBehavior', 'deleteAllHistorys'),
		array('surfaceHistoryBehavior', 'hasHistory'),
		array('surfaceHistoryBehavior', 'countHistory'),
		array('surfaceHistoryBehavior', 'getFirstHistory'),
		array('surfaceHistoryBehavior', 'getLastHistory'),
		array('surfaceHistoryBehavior', 'getNextHistory'),
		array('surfaceHistoryBehavior', 'getCriteriaFromHistoryBehavior')
	)
);
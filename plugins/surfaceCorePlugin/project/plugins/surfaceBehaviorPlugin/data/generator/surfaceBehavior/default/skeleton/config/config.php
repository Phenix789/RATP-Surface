<?php
/**
 * @brief Enregistrement des methodes du behavior ##NAME_BEHAVIOR##
 * @package Plugin
 * @subpackage surface##NAME_BEHAVIOR##Behavior
 *
 * @author 
 * @date 
 * @version 
 * @license 
 *
 */
sfPropelBehavior::registerHooks('surface##NAME_BEHAVIOR##Behavior',
				array(	':save:post' => array('surface##NAME_BEHAVIOR##Behavior', 'postSave'),
					':delete:post' => array('surface##NAME_BEHAVIOR##Behavior', 'postDelete')
				)
);

sfPropelBehavior::registerMethods('surface##NAME_BEHAVIOR##Behavior',
	array(
		array('surface##NAME_BEHAVIOR##Behavior', 'add##NAME_BEHAVIOR##'),
		array('surface##NAME_BEHAVIOR##Behavior', 'get##NAME_BEHAVIOR##'),
		array('surface##NAME_BEHAVIOR##Behavior', 'set##NAME_BEHAVIOR##'),
		array('surface##NAME_BEHAVIOR##Behavior', 'delete##NAME_BEHAVIOR##'),
		array('surface##NAME_BEHAVIOR##Behavior', 'addAll##NAME_BEHAVIOR##s'),
		array('surface##NAME_BEHAVIOR##Behavior', 'getAll##NAME_BEHAVIOR##s'),
		array('surface##NAME_BEHAVIOR##Behavior', 'setAll##NAME_BEHAVIOR##s'),
		array('surface##NAME_BEHAVIOR##Behavior', 'deleteAll##NAME_BEHAVIOR##s'),
		array('surface##NAME_BEHAVIOR##Behavior', 'has##NAME_BEHAVIOR##'),
		array('surface##NAME_BEHAVIOR##Behavior', 'count##NAME_BEHAVIOR##')
	)
);
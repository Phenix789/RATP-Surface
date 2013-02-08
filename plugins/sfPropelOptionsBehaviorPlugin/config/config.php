<?php
/**
 * @brief Enregistrment des methodes du behavior
 * @package Plugin
 * @subpackage sfPropelOptionBehaviorPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.0
 * @license LGPL
 * 
 */
sfPropelBehavior::registerHooks('sfPropelOptionsBehavior',
				array(	':save:post' => array('sfPropelOptionsBehavior', 'postSave'),
					':delete:post' => array('sfPropelOptionsBehavior', 'postDelete')
				)
);

sfPropelBehavior::registerMethods('sfPropelOptionsBehavior',
	array(
		array('sfPropelOptionsBehavior', 'addOption'),
		array('sfPropelOptionsBehavior', 'getOption'),
		array('sfPropelOptionsBehavior', 'hasOption'),
		array('sfPropelOptionsBehavior', 'removeAllOptions'),
		array('sfPropelOptionsBehavior', 'removeOption'),
		array('sfPropelOptionsBehavior', 'replaceOption'),
		array('sfPropelOptionsBehavior', 'setOptions'),
		array('sfPropelOptionsBehavior', 'getOptions'),
		array('sfPropelOptionsBehavior', 'setOptionsEdit')
	)
);
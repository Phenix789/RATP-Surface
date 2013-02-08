<?php

sfPropelBehavior::registerHooks('SfcCommentBehavior', array(
    ':save:post'      => array('SfcCommentBehavior',   'postSave'),
    ':delete:post'    => array('SfcCommentBehavior',   'postDelete'), 
));

sfPropelBehavior::registerMethods('SfcCommentBehavior', array(
    array('SfcCommentBehavior',   'addSfcComment'),
    array('SfcCommentBehavior',   'addAllSfcComments'),
	
    array('SfcCommentBehavior',   'getSfcComment'),
    array('SfcCommentBehavior',   'getSfComments'),
    array('SfcCommentBehavior',   'getSfcComments'), 
	
    array('SfcCommentBehavior',   'setAllSfcComments'), 
    array('SfcCommentBehavior',   'setSfcComment'), 
	
		
    array('SfcCommentBehavior',   'deleteAllSfcComments'), 
    array('SfcCommentBehavior',   'deleteSfcComment'), 
	
    array('SfcCommentBehavior',   'countSfcComment'),
    array('SfcCommentBehavior',   'hasSfcComment'),
	array('SfcCommentBehavior',   'getFirstSfcComment'),
	array('SfcCommentBehavior',   'getLastSfcComment'),
	array('SfcCommentBehavior',   'getNextSfcComment'),
	array('SfcCommentBehavior',   'getCriteriaFromSfcCommentBehavior')
));

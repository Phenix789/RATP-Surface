<?php

sfPropelBehavior::registerHooks('sfPropelFileAssocBehavior', array(
    ':save:post'      => array('sfPropelFileAssocBehavior',   'postSave'),
    ':delete:post'    => array('sfPropelFileAssocBehavior',   'postDelete'), 
));

sfPropelBehavior::registerMethods('sfPropelFileAssocBehavior', array(
    array('sfPropelFileAssocBehavior',   'getAssociatedFile'),
    array('sfPropelFileAssocBehavior',   'getAssociatedFiles'),
    array('sfPropelFileAssocBehavior',   'getIsThereAssociatedFiles'),
    array('sfPropelFileAssocBehavior',   'getAssociatedFilesCount'),
    array('sfPropelFileAssocBehavior',   'addAssociatedFile'), 
    array('sfPropelFileAssocBehavior',   'deleteAssociatedFiles'), 
    array('sfPropelFileAssocBehavior',   'updateAssociatedFiles'), 
    array('sfPropelFileAssocBehavior',   'copyAssociatedFiles'), 
    array('sfPropelFileAssocBehavior',   'getPropelFileAssocClass'), 
    array('sfPropelFileAssocBehavior',   'getPropelFileAssocDirectory'), 
));
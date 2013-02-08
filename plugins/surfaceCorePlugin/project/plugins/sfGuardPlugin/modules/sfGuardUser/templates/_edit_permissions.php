<div style="position: relative; width: 500px;">
    <span class="row">

        <div>
            <label><?php echo __("Entity") ?> : </label>
            <?php $entities = sfGuardEntityPeer::doSelect(new Criteria()); ?>
            <?php echo surface_select_tag('sf_guard_entities', _get_options_from_objects($entities, 'getFullName')) ?>
            
            <br/>
            <label><?php echo __("Permission") ?> : </label>
            <?php $permissions = sfGuardPermissionPeer::doSelect(new Criteria()); ?>
            <?php echo surface_select_tag('sf_guard_permissions', _get_options_from_objects($permissions, 'getName')) ?>

            <br/>
            <div style="padding-left:115px;"> 
                <?php echo link_to_function('Ajouter ce couple', "var oList = $('".get_id_from_name('associated_permissions[]')."');
                    entities_text = ($('sf_guard_entities').selectedIndex >= 0)? $('sf_guard_entities').options[$('sf_guard_entities').selectedIndex].text : '';
                    entities_value = ($('sf_guard_entities').selectedIndex >= 0)? $('sf_guard_entities').options[$('sf_guard_entities').selectedIndex].value : '';
                
                    permissn_text = ($('sf_guard_permissions').selectedIndex >= 0)? $('sf_guard_permissions').options[$('sf_guard_permissions').selectedIndex].text : '';
                    permissn_value = ($('sf_guard_permissions').selectedIndex >= 0)? $('sf_guard_permissions').options[$('sf_guard_permissions').selectedIndex].value : '';
                    
                    oList.options[oList.length] = new Option(   entities_text + '".sfGuardEntity::ENTITY_SEPARATOR."' + permissn_text,
                                                                entities_value + '".sfGuardEntity::ENTITY_SEPARATOR."' + permissn_value);
                "); ?>    

                <?php $entity_permissions = array(); ?>
                <?php foreach($sf_guard_user->getsfGuardUserPermissions() as $perms): ?>
                    <?php $entity_permissions[$perms->getEntityId() . sfGuardEntity::ENTITY_SEPARATOR . $perms->getPermissionId()] = ($perms->getsfGuardEntity()? $perms->getsfGuardEntity()->getFullName() : '') . sfGuardEntity::ENTITY_SEPARATOR . ($perms->getsfGuardPermission()? $perms->getsfGuardPermission()->getName() : ''); ?>
                <?php endforeach ?>
                
                <div class="input">
                    <div class="input_wrapper">
                    <?php echo surface_select_tag(  'associated_permissions[]',
                                            options_for_select($entity_permissions, '', array()),
                                            array('size' => 6, 'class' => 'sf_admin_multiple-selected',
                                                  'multiple' => 'multiple')); ?>
                    </div>
                </div>

                 <?php echo link_to_function('Retirer le couple sélectionné', "var oList = $('".get_id_from_name('associated_permissions[]')."');
                    // var selectedList = new Array();
                    for (var i = oList.length - 1; i >= 0; i--) {
                        if (oList.options[i].selected) {
                            // selectedList.push(oList.options[i]);
                            oList.remove(i);
                        }
                    }
                "); ?>
            </div>

        </div>
    </span>
    
</div>

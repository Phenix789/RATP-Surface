<div style="position: relative; left: -100px; width: 500px; padding-top: 20px;">
    <span class="row">
        <?php echo surface_label_for('sf_guard_entities', __("Entity")) ?>
        <div class="input">
            <div class="input_wrapper">
            <?php $entities = sfGuardEntityPeer::doSelect(new Criteria()); ?>
            <?php echo surface_select_tag('sf_guard_entities',
                                  _get_options_from_objects($entities, 'getFullName')) ?>
            
            <?php $permissions = sfGuardPermissionPeer::doSelect(new Criteria()); ?>
            </div>
        </div>
    </span>
    
    
    <span class="row">
        <?php echo surface_label_for('sf_guard_permissions', __("Permission")) ?>
        <div class="input">
            <div class="input_wrapper">
                <?php echo surface_select_tag('sf_guard_permissions', _get_options_from_objects($permissions, 'getName')) ?>
            </div>
        </div>
    </span>    
    
    <span class="row" style="padding-left: 80px;">
        <?php echo link_to_function('add', "var oList = $('".get_id_from_name('associated_permissions[]')."');
        entities_text = ($('sf_guard_entities').selectedIndex >= 0)? $('sf_guard_entities').options[$('sf_guard_entities').selectedIndex].text : '';
        entities_value = ($('sf_guard_entities').selectedIndex >= 0)? $('sf_guard_entities').options[$('sf_guard_entities').selectedIndex].value : '';
    
        permissn_text = ($('sf_guard_permissions').selectedIndex >= 0)? $('sf_guard_permissions').options[$('sf_guard_permissions').selectedIndex].text : '';
        permissn_value = ($('sf_guard_permissions').selectedIndex >= 0)? $('sf_guard_permissions').options[$('sf_guard_permissions').selectedIndex].value : '';
        
        oList.options[oList.length] = new Option(   entities_text + '".sfGuardEntity::ENTITY_SEPARATOR."' + permissn_text,
                                                    entities_value + '".sfGuardEntity::ENTITY_SEPARATOR."' + permissn_value);
    "); ?>
    </span>

    <span class="row">
        <?php $entity_permissions = array(); ?>
        <?php foreach($sf_guard_group->getsfGuardGroupPermissions() as $perms): ?>
            <?php $entity_permissions[$perms->getEntityId() . sfGuardEntity::ENTITY_SEPARATOR . $perms->getPermissionId()] = ($perms->getsfGuardEntity()? $perms->getsfGuardEntity()->getFullName() : '') . sfGuardEntity::ENTITY_SEPARATOR . ($perms->getsfGuardPermission()? $perms->getsfGuardPermission()->getName() : ''); ?>
        <?php endforeach ?>
        
        <?php echo surface_label_for('associated_permissions[]', __("Associated")) ?>
        <div class="input">
            <div class="input_wrapper">
                <?php echo surface_select_tag(  'associated_permissions[]',
                            options_for_select($entity_permissions, '', array()),
                            array('size' => 10, 'class' => 'sf_admin_multiple-selected',
                                  'multiple' => 'multiple')); ?>
            </div>
        </div>
    </span>
    
    <span class="row" style="padding-left: 80px;">
        <?php echo link_to_function('remove', "var oList = $('".get_id_from_name('associated_permissions[]')."');
            // var selectedList = new Array();
            for (var i = oList.length - 1; i >= 0; i--) {
                if (oList.options[i].selected) {
                    // selectedList.push(oList.options[i]);
                    oList.remove(i);
                }
            }
        "); ?>
    </span>
</div>

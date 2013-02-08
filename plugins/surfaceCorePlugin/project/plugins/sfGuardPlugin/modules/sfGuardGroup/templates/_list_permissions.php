<?php
	$entity_permissions = array();
	foreach($sf_guard_group->getsfGuardGroupPermissions() as $perms) {
		$entity_permissions[$perms->getEntityId() . sfGuardEntity::ENTITY_SEPARATOR . $perms->getPermissionId()] = ($perms->getsfGuardEntity() ? $perms->getsfGuardEntity()->getFullName() : '') . sfGuardEntity::ENTITY_SEPARATOR . ($perms->getsfGuardPermission() ? $perms->getsfGuardPermission()->getName() : '');
	}
	sort($entity_permissions, SORT_STRING);
?>
<ul>
        <?php foreach($entity_permissions as $perms): ?>
        	<li><?php echo $perms; ?></li>
        <?php endforeach ?>
</ul>

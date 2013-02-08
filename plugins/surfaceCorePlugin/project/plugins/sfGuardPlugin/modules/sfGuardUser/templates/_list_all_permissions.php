<?php if($sf_guard_user->getIsSuperAdmin()): ?>
        <em>&raquo; Aucune restriction</em>
<?php else: ?>
	<?php
		$entity_permissions = $sf_guard_user->getAllPermissionNames();
		sort($entity_permissions, SORT_STRING);
	?>
	<ul style="color: #666;">
		<?php foreach($entity_permissions as $perms): ?>
			<li><?php echo $perms; ?></li>
		<?php endforeach ?>
	</ul>
<?php endif; ?>

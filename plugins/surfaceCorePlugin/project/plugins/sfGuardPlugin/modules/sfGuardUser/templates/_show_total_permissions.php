<?php if($sf_guard_user->getIsSuperAdmin()): ?>
        <?php echo surface_null_value('Super administrateur !'); ?>
<?php else: ?>
	<?php
		$entity_permissions = $sf_guard_user->getAllPermissionNames();
		sort($entity_permissions, SORT_STRING);
	?>

	<?php if($entity_permissions) : ?>
		<?php foreach($entity_permissions as $perm) : ?>
			<?php echo $perm ?>
			<br/>
		<?php endforeach ?>
	<?php else : ?>
		<?php echo surface_null_value('Aucune permission') ?>
	<?php endif ?>
<?php endif ?>


<?php $entity_permissions = $sf_guard_user->getPermissionNames(); ?>
<?php sort($entity_permissions, SORT_STRING); ?>
<?php if($entity_permissions) : ?>
	<?php foreach($entity_permissions as $perm) : ?>
		<?php echo $perm ?>
		<br/>
	<?php endforeach ?>
<?php else : ?>
	<?php echo surface_null_value(__('Aucune permission')) ?>
<?php endif ?>

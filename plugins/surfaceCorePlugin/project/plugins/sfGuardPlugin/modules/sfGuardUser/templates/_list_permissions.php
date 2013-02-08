<?php $permissions = $sf_guard_user->getAllPermissionNames(); ?>
<?php sort($permissions, SORT_STRING); ?>
<?php if($permissions) : ?>
	<?php 
		$perm_list = array();
		foreach($permissions as $permission) {
			$perm_list[] = (string) $permission;
		} 
		$perm_list = implode("\n",$perm_list);
	?>

	<?php echo surface_link_to(count($permissions)." permission(s)", 'sfGuardUser/show?id='.$sf_guard_user->getId().'#vtab_tg_east_groups_and_perms', 'tg_east', null, array(), array('title' => $perm_list)); ?>
<?php else : ?>
	<?php echo surface_null_value(__('Aucune permission')) ?>
<?php endif ?>

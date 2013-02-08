<?php $users = $collaborator->getUsers(); ?>
<?php if($users ) : ?>
	<?php foreach((array)$users as $user) : ?>
                
		<?php echo surface_link_to($user->getUsername(), 'sfGuardUser/show?id=' . $user->getId(), 'tg_east'); ?>
	<?php endforeach; ?>
<?php else : ?>
	<?php echo surface_link_to('+ Créer un compte', 'sfGuardUser/create?collaborator_id=' . $collaborator->getId(), 'tg_east'); ?>
<?php endif; ?>
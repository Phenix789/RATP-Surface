
<ul>
	<?php $groups = $sf_guard_user->getGroupsOrderedByName(); ?>
	<?php if ($groups && count($groups)) : ?>
	    <?php foreach($groups as $group) : ?>
	    	<li><?php echo surface_link_to($group, 'sfGuardGroup/show?id='.$group->getId(), 'tg_east'); ?></li>
	    <?php endforeach ?>
	<?php else : ?>
		<?php echo surface_null_value('Aucun groupe'); ?>
	<?php endif; ?>
</ul>

<?php $ips = $sf_guard_user->getIpsWithGroups() ?>
<?php if($ips) : ?>
	<?php foreach($ips as $ip) : ?>
		<?php echo $ip ?>
		<br/>
	<?php endforeach ?>
<?php else : ?>
	<?php echo surface_null_value('Pas de restriction.') ?>
<?php endif ?>



<?php $ips = $sf_guard_group->getAllIpsAuthorized() ?>
<?php if($ips) : ?>
	<?php foreach($ips as $ip) : ?>
		<?php echo $ip ?>
		<br/>
	<?php endforeach ?>
<?php else : ?>
	<?php echo surface_null_value(__('Aucune restriction')) ?>
<?php endif ?>

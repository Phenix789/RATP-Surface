
<?php $ips = $sf_guard_user->getAllIpsAuthorized(); ?>
<?php sort($ips, SORT_STRING); ?>
<?php if($ips) : ?>
	<?php 
		$ip_list = array();
		foreach($ips as $ip) {
			$ip_list[] = (string) $ip;
		} 
		$ip_list = implode("\n",$ip_list);
	?>

	<?php echo surface_link_to(count($ips)." ip(s)", 'sfGuardUser/show?id='.$sf_guard_user->getId().'#firewall', 'tg_east', null, array(), array('title' => $ip_list)); ?>
<?php else : ?>
	<?php echo surface_null_value(__('Aucune restriction')) ?>
<?php endif ?>


<?php echo link_to_function('Ajouter cette IP', "
	$('" . get_id_from_name('sf_guard_user[associated_ip][]') . "').options[$('" . get_id_from_name('sf_guard_user[associated_ip][]') . "').length] = new Option($('add_ip').value, $('add_ip').value);
	"); ?>
<span class="row">
	<div class="input">
		<div class="input_wrapper">
			<?php
				$ips = $sf_guard_user->getAllIpsAuthorized();
				if(count($ips) > 0) {
					$ips = array_combine($ips, $ips);
				}
			?>
			<?php echo surface_select_tag(
					'sf_guard_user[associated_ip][]',
					options_for_select($ips, null, array()),
					array('size' => 6, 'class' => 'sf_admin_multiple-selected', 'multiple' => 'multiple')
				);
			?>
		</div>
	</div>
</span>

<?php echo link_to_function('Retirer l\'IP sélectionnée', "var oList = $('".get_id_from_name('sf_guard_user[associated_ip][]')."');
// var selectedList = new Array();
for (var i = oList.length - 1; i >= 0; i--) {
if (oList.options[i].selected) {
// selectedList.push(oList.options[i]);
oList.remove(i);
}
}
"); ?>
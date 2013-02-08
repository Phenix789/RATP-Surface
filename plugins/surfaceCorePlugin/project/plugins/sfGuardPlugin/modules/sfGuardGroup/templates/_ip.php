<?php echo surface_input_tag('add_ip') ?>

<span class="row" style="padding-left: 80px;">
	<?php
		echo link_to_function('add', "
			$('" . get_id_from_name('sf_guard_group[associated_ip][]') . "').options[$('" . get_id_from_name('sf_guard_group[associated_ip][]') . "').length] = new Option($('add_ip').value, $('add_ip').value);
		");
	?>
</span>

<span class="row">
	<div class="input">
		<div class="input_wrapper">
			<?php
				$ips = $sf_guard_group->getAllIpsAuthorized();
				if(count($ips) > 0) {
					$ips = array_combine($ips, $ips);
				}
			?>
                        <?php
				echo surface_select_tag(
					'sf_guard_group[associated_ip][]',
					options_for_select($ips, null, array()),
					array('size' => 10, 'class' => 'sf_admin_multiple-selected', 'multiple' => 'multiple')
				);
                        ?>
		</div>
	</div>
</span>

<span class="row" style="padding-left: 80px;">
        <?php
		echo link_to_function('remove', "var oList = $('" . get_id_from_name('sf_guard_group[associated_ip][]') . "');
			// var selectedList = new Array();
			for (var i = oList.length - 1; i >= 0; i--) {
			if (oList.options[i].selected) {
			// selectedList.push(oList.options[i]);
			oList.remove(i);
			}
			}
			");
	?>
</span>
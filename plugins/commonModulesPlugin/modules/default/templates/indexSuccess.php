<?php use_helper('Javascript') ?>

<?php slot('permalink_actions') ?>
<?php
	if(count($permalink) > 0) {
		foreach($permalink as $target => $url) {
			echo javascript_tag("surface.link_to('" . $url . "', '" . $target . "');");
		}
	}
	else {
		$target = 'tg_center';
		echo javascript_tag("surface.link_to('" . $default_index . "', '" . $target . "');");
	}
?>
<?php end_slot() ?>

<?php echo use_helper('Javascript'); ?>
<div style="position:absolute;bottom:0;width:100%" id="alertListener">
<?php foreach ($alerts as $alert): ?>
	<?php echo surface_link_to($alert, object_surface_url_for($alert->getTargetObject()), object_surface_target_for($alert->getTargetObject())) ?>
	<br/>
<?php endforeach ?>
</div>
<?php use_helper('Alert'); ?>

<div class="alert_box_content" id="alerts_target">
	<?php if($alerts) : ?>
		<?php foreach($alerts as $alert): ?>    
			<?php echo alert_detail($alert, "alerts_target", 0, 0, $sf_user->getCollaboratorId()); ?>
		<?php endforeach ?>
	<?php else : ?>
		<?php echo surface_null_value('Aucune alerte définie.') ?>
	<?php endif ?>
</div>
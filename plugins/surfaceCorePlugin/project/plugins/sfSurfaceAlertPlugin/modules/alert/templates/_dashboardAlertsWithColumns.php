<?php use_helper('Alert'); ?>

<?php $lastModelClass = ''; $modelId = 0 ?>

<?php foreach($alerts as $alert): ?>
	<?php if($alert->getModelClass() != $lastModelClass): ?>

		<?php // cloture des div de la box précédente ?>
		<?php if($lastModelClass != ''): ?>
			</div>
			<!--</div>-->
		<?php endif ?>

		<?php // ouverture de la nouvelle box  ?>
		<!-- <div class="portal_box<?php echo ($lastModelClass == '') ? ' first_column' : ''; ?>">-->
		<div class="title_wrapper">
			<h3>Rappels <?php echo $alert->getModelClassName(); ?></h3>
		</div>
		<?php $modelId++; ?>
		<div class="portal_box_content" id="alert_type_target_object_<?php echo $modelId; ?>">

			<?php // parametres de la nouvelle box ?>
			<?php $lastModelClass = $alert->getModelClass(); ?>
		<?php endif ?>

		<?php echo alert_detail($alert, "alert_type_target_object_".$modelId, 1, $sf_user->hasCredential('alert/admin'), $sf_user->getCollaboratorId()); ?>
<?php endforeach ?>
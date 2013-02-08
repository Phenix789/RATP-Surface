<?php 
use_helper('Validation', 'Javascript');
echo javascript_include_tag('/sfControlsPlugin/js/prototype.js');
echo javascript_include_tag('/sfPropelFileAssocPlugin/js/propel_fileassoc.js');
?>
<html>
<body style="margin:0">
	<div>
		<?php if(isset($bFileUploadSuccess)) : ?>
			<?php if ($bFileUploadSuccess) : ?>     
				<?php echo javascript_tag('addFileAssocStackNew(parent.window.document.getElementById("' . get_id_from_name($name) . '_stack"), "' . escape_javascript($name) . '", "' . escape_javascript($tempFilename) . '", "' . escape_javascript($orgFilename) . '");'); ?>
			<?php else: ?>
				<?php echo "<small>Erreur : taille nulle ou supérieure à " . ini_get('upload_max_filesize') . '. </small>' ?>
			<?php endif; ?>
		<?php endif ?>
		<?php echo form_tag('sfPropelFileAssoc/fileUploader?stack_items_name=' . $name, array('multipart' => true), array('margin' => 0)) ?>
		<fieldset style="border:none;padding:0;">
			<?php echo input_file_tag('filename', array("style" => "width: 100%;")) ?>
			<?php echo submit_tag('Charger le fichier', array('id' => 'upload_submit')); ?>
		</fieldset>
		</form>
	</div>
</body>
</html>
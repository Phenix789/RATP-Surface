[?php // WILL NOT WORK WITHOUT AN ID !!! ?]
[?php if(isset($inline_editing) && $inline_editing): ?]
	<a href="#" id="[?php echo $unique_id.'_id_'.$<?php echo $this->getSingularName() ?>->getId() ?]_delete_action" onclick="surface.archiveRow(this);return false;">
		<img src="/sfSurfaceGeneratorPlugin/images/delete_icon.png" alt="Cancel" />
	</a>
	<a href="#" id="[?php echo $unique_id.'_id_'.$<?php echo $this->getSingularName() ?>->getId() ?]_undelete_action" onclick="surface.unarchiveRow(this);return false;" style="display:none">
		<img src="/sfcThemePlugin/common/icons/cancel.png" alt="Cancel" />
	</a>
	<input type="hidden" name="<?php echo $this->getSingularName() ?>_to_delete[[?php echo $<?php echo $this->getSingularName() ?>->getId() ?]]" id="[?php echo $unique_id.'_id_'.$<?php echo $this->getSingularName() ?>->getId() ?]_todelete" />
[?php endif ?]
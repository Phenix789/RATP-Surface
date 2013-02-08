<?php
$default_actions = array('_show'=>array(), '_edit'=>array(), '_delete_confirm'=>array());
$list_object_actions = $this->getParameterValue($component_generator_key.'.object_actions', $default_actions);
?>
[?php $inline_editing = isset($inline_editing) ? $inline_editing:false ?]
<?php if($list_object_actions !== null && !empty($list_object_actions)) : ?>
	<td class="table_wrapper_actions">
	<?php foreach($list_object_actions as $actionName=>$params): ?>
		<?php
		$cfg_key = $component_generator_key.'.object_actions.'.$actionName;
		if($this->getParameterValue($cfg_key.'.disabled')){
			continue;
		}
		?>
		<?php if($this->getParameterValue($cfg_key.'.partial', false)) : ?>
			[?php include_partial('action_<?php echo $actionName ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
		<?php else : ?>
			<?php if($this->getParameterValue($cfg_key.'.allow_method')) : ?>
				[?php if($<?php echo $this->getSingularName() ?>-><?php echo $this->getParameterValue($cfg_key.'.allow_method') ?>()) : ?]
			<?php endif ?>
			<?php echo $this->addCredentialExCondition($this->getRemoteLinkToAction($actionName, $this->getParameterValue($cfg_key, array()), true, $this->getParameterValue($cfg_key.'.target', sfConfig::get('app_surface_default_target'.$actionName)), true), $this->getParameterValue($cfg_key.'.credentials'), $this->getParameterValue($cfg_key.'.conditions'), '$'.$this->getSingularName()) ?>
			<?php if($this->getParameterValue($component_generator_key.'.object_actions.'.$actionName.'.allow_method')) : ?>
				[?php endif ?]
			<?php endif ?>
		<?php endif ?>

	<?php endforeach; ?>

	<?php if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue($component_generator_key.'.cart.active_actions') && !$this->getParameterValue($component_generator_key.'.cart.separate_actions')) : ?>
		[?php echo cart_object_action_tag($<?php echo $this->getSingularName() ?>, array(), array(), false, $cart) ?]
	<?php endif ?>
	<?php if(!$this->getParameterValue($component_generator_key.'.inline_editing.skip_delete') && $this->getParameterValue($component_generator_key.'.inline_editing')): ?>
		[?php include_partial('<?php echo $this->getModuleName() ?>/<?php echo $component_name ?>_inline_editing_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'inline_editing' => $inline_editing, 'unique_id' => $unique_id)) ?]
	<?php endif ?>
	</td>
<?php else: ?>
	<?php if(!$this->getParameterValue($component_generator_key.'.inline_editing.skip_delete') && $this->getParameterValue($component_generator_key.'.inline_editing')): ?>
		[?php if($inline_editing): ?]
			<td class="table_wrapper_actions">
				[?php include_partial('<?php echo $this->getModuleName() ?>/<?php echo $component_name ?>_inline_editing_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'inline_editing' => $inline_editing, 'unique_id' => $unique_id)) ?]
			</td>
		[?php endif ?]
	<?php endif ?>
<?php endif ?>
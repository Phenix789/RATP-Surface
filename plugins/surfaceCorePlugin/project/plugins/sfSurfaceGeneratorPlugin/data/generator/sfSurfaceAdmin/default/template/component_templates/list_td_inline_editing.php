<?php $hs = $this->getParameterValue($component_generator_key.'.hide', array()) ?>
[?php
	$td_style = '';
	$td_class = '';
?]
<?php foreach($this->getColumns($component_generator_key.'.inline_editing.display') as $column): ?>
	<?php
		if(is_array($this->getParameterValue($component_generator_key.'.td_style'))){
			foreach($this->getColumns($component_generator_key.'.td_style') as $tmp_column){
				?>[?php $td_style = <?php echo $this->getColumnGetter($tmp_column, true, '', $column->getName()) ?>;<?php
			}
		}

		if(is_array($this->getParameterValue($component_generator_key.'.td_class'))){
			foreach($this->getColumns($component_generator_key.'.td_class') as $tmp_column){
				?>[?php $td_class = <?php echo $this->getColumnGetter($tmp_column, true, '', $column->getName()) ?> ?]<?php
			}
		}

		if(in_array($column->getName(), $hs)) continue;
		
		$credentials = $this->getParameterValue($component_generator_key.'.fields.'.$column->getName().'.credentials');
		if($credentials){
			$credentials = str_replace("\n", ' ', var_export($credentials, true));
			?>[?php if ($sf_user->hasCredentialEx(<?php echo $credentials ?>, null)): ?]<?php
		}
	?>
	<td style="[?php echo $td_style ?]" class="inline_editing[?php echo $td_class?' '.$td_class:'' ?]">
		[?php if ($sf_request->hasError('<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}')): ?]
			<span class="system negative">[?php echo form_error('<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}', array('class' => "", 'prefix' => "", 'suffix' => "")) ?]</span>
		[?php endif; ?]
		<div class="input_wrapper">
			[?php $value = <?php echo $this->getColumnEditExTag($component_generator_key, $column, array('control_name_modifier' => 'add_pkey_as_array_key')); ?>; echo $value ? $value : '&nbsp;' ?]
			<span class="help"><?php echo $this->getHelp($column, $component_generator_key) ?></span>
		</div>
	</td>
	
	<?php if($credentials): ?>
		[?php endif ?]
	<?php endif ?>
<?php endforeach ?>

<?php if(!$this->getParameterValue($component_generator_key.'.object_actions_skip', false)) : ?>
	[?php if(!$<?php echo $this->getSingularName() ?>->getId() || $<?php echo $this->getSingularName() ?>->getId() < 0): ?]
		<?php if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue($component_generator_key . '.cart.active_actions') && $this->getParameterValue($component_generator_key . '.cart.separate_actions')): ?>
			<td></td>
		<?php endif ?>
		<td class="inline_editing table_wrapper_actions">
			[?php include_partial('<?php echo $component_name ?>_inline_editing_actions', array_merge(getCurrentViewParameters(), array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'inline_editing' => $inline_editing, 'unique_id' => $unique_id))) ?]
		</td>
	[?php endif ?]
<?php endif ?>
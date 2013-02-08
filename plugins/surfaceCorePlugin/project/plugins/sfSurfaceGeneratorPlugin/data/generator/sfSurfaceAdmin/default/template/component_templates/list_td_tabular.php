<?php $hs = $this->getParameterValue($component_generator_key . '.hide', array()) ?>
[?php $td_style = "" ?]
[?php $td_class = "" ?]
<?php foreach($this->getColumns($component_generator_key . '.display') as $column): ?>
	<?php if(is_array($this->getParameterValue($component_generator_key . '.td_style'))): ?>
		<?php foreach($this->getColumns($component_generator_key . '.td_style') as $tmp_column): ?>
			[?php $td_style = <?php echo $this->getColumnGetter($tmp_column, true, '', $column->getName()) ?> ;?]
		<?php endforeach ?>
	<?php endif ?>
	<?php if(is_array($this->getParameterValue($component_generator_key . '.td_class'))): ?>
		<?php foreach($this->getColumns($component_generator_key . '.td_class') as $tmp_column): ?>
			[?php $td_class = <?php echo $this->getColumnGetter($tmp_column, true, '', $column->getName()) ?> ;?]
		<?php endforeach ?>
	<?php endif ?>
	<?php if(in_array($column->getName(), $hs)) continue ?>
	<?php $credentials = $this->getParameterValue($component_generator_key . '.fields.' . $column->getName() . '.credentials') ?>
	<?php if($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
		[?php if ($sf_user->hasCredentialEx(<?php echo $credentials ?>, null)): ?]
	<?php endif ?>
	<?php if($column->isLink()): ?>
		<td style="[?php echo $td_style ?]" class="[?php echo $td_class ?]">
			<?php $click_action = $this->getParameterValue($component_generator_key . '.click_action', 'show'); ?>
			<?php $click_credentials = $this->getParameterValue($component_generator_key . '.object_actions._' . $click_action . '.credentials'); ?>
			<?php if($click_credentials): $click_credentials = str_replace("\n", ' ', var_export($click_credentials, true)) ?>
				[?php if ($sf_user->hasCredentialEx(<?php echo $click_credentials ?>, $<?php echo $this->getSingularName() ?>)): ?]
			<?php endif ?>
			<?php echo $this->getRemoteLinkTo($click_action, array('name' => $this->getColumnListTag($column), 'action' => $click_action), true, $this->getParameterValue($component_generator_key . '.object_actions._' . $click_action . '.target', sfConfig::get('app_surface_default_target_' . $click_action))) ?>
			<?php if($click_credentials): ?>
				[?php else: ?]
					[?php echo <?php echo $this->getColumnListTag($column) ?> ?]
				[?php endif; ?]
			<?php endif ?>
		</td>
	<?php else: ?>
		<td style="[?php echo $td_style ?]" class="[?php echo $td_class ?]">[?php echo <?php echo $this->getColumnListTag($column) ?> ?]</td>
	<?php endif ?>
	<?php if($credentials): ?>
		[?php endif ?]
	<?php endif ?>
<?php endforeach ?>
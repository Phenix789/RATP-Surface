<?php $hides = $this->getParameterValue($component_generator_key.'.hide', array()) ?>
<?php foreach ($this->getColumns($component_generator_key.'.display') as $column): ?>
	<?php if (in_array($column->getName(), $hides)) continue ?>
	<?php $credentials = $this->getParameterValue($component_generator_key.'.fields.'.$column->getName().'.credentials') ?>
	<?php if ($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
		[?php if ($sf_user->hasCredentialEx(<?php echo $credentials ?>, null)) : ?]
	<?php endif ?>
	[?php $tmp_name = __('<?php echo str_replace("'", "\\'", $this->getParameterValue($component_generator_key.'.fields.'.$column->getName().'.name')) ?>') ?]
	<th id="sf_admin_list_th_<?php echo $column->getName() ?>" title="<?php echo $this->getParameterValue($component_generator_key.'.fields.'.$column->getName().'.title') ?>">
		<?php if ($column->hasSortOrder()) : ?>
			[?php
			$tmp_url = "<?php echo $this->getModuleName() ?>/listUpdate?name=<?php echo $component_name ?>&list_target={$list_target}&sort=<?php echo $column->getRealName() ?>&basket_key=".(isset($basket)? $basket->getKey() : null)."&type=";
			if(isset($list_target)){
				if($sf_user->getAttribute('sort', null, "sf_admin/<?php echo $this->getSurfaceNamespace() ?>/{$list_target}/sort") == '<?php echo $column->getRealName() ?>'){
					$tmp_order = $sf_user->getAttribute('type', 'asc', "sf_admin/<?php echo $this->getSurfaceNamespace() ?>/{$list_target}/sort");
					echo surface_link_to($tmp_name, $tmp_url.($tmp_order == 'asc' ? 'desc' : 'asc'), $list_target, false, array(), array('class' => ($tmp_order == 'asc' ? 'asc' : 'desc')));
				} else {
					echo surface_link_to($tmp_name, $tmp_url.'asc', $list_target);
				}
			} else {
				echo $tmp_name;
			}
			?]
		<?php else: ?>
			[?php echo $tmp_name ?]
		<?php endif ?>
		<?php echo $this->getHelpAsIcon($column, $component_generator_key) ?>
	</th>
	<?php if ($credentials) : ?>
		[?php endif ?]
	<?php endif ?>
<?php endforeach ?>
<?php $categories = $this->getColumnCategories($component_generator_key); ?>
[?php
if(!$noscript){
	echo javascript_tag('surface.mark_current_row("<?php echo $this->getParameterValue('row_marking_module', $this->getModuleName()) ?>_list_<?php echo $this->getPrimaryKeyHTMLParams() ?>.'")');
}
if($render_vtabs): ?]
	<div id="vtab_<?php echo $component_generator_key ?>_[?php echo $target ?]" class="vtabset">
		<?php foreach($categories as $category => $category_data): ?>
			<?php if($category_data['credentials']): ?>
				[?php if ($sf_user->hasCredentialEx(<?php echo $category_data['credentials'] ?>, $object)): ?]
			<?php endif; ?>
			<?php if($category_data['allow_method']): ?>
				[?php if ($object-><?php echo $category_data['allow_method'] ?>()): ?]
			<?php endif; ?>

			<a href="#vtab_<?php echo $this->getTabCategoryName($category) ?>" onclick="return surface.setActiveTab(this.href);"><?php echo $this->getInterpretedString($category_data['name'], true, true) ?></a>

			<?php if($category_data['allow_method']): ?>
				[?php endif; ?]
			<?php endif; ?>
			<?php if($category_data['credentials']): ?>
				[?php endif; ?]
			<?php endif; ?>
		<?php endforeach; ?>
[?php endif; ?]

	<?php foreach($categories as $category => $category_data): ?>
		<?php if($category_data['credentials']): ?>
			[?php if ($sf_user->hasCredentialEx(<?php echo $category_data['credentials'] ?>, $object)): ?]
		<?php endif; ?>

		<?php if($category_data['allow_method']): ?>
			[?php if (call_user_func(array($object, '<?php echo $category_data['allow_method'] ?>'))): ?]
		<?php endif; ?>

		[?php if($render_vtabs) : ?]
			<a href="#vtab_<?php echo $this->getTabCategoryName($category) ?>" class="toprint"><?php echo $this->getInterpretedString($category_data['name'], true, true) ?></a>
			<div id="vtab_<?php echo $this->getTabCategoryName($category) ?>">
		[?php endif;
		if($render_slots){
			slot('<?php echo $this->getSlotName($category) ?>');
		}
		?]

		<fieldset id="sf_fieldset_<?php echo $this->getTabCategoryName($category) ?>" class="<?php echo $category_data['collapse'] ? ' collapse' : '' ?> [?php echo $action_name ?]">
			<?php if($category != 'NONE'): ?>
				[?php if (!$render_vtabs && !$render_slots): ?]
					<h3><?php echo $this->getInterpretedString($category_data['name'], true, true) ?></h3>
				[?php elseif ($render_slots): ?]
					<h2 class="slots_title"><?php echo $this->getInterpretedString($category_data['name'], true, true) ?></h2>
				[?php endif; ?]
			<?php endif; ?>

			<?php foreach($this->getColumns($component_generator_key . '.display', $category) as $name => $column): ?>

				<?php if(is_object($column)): ?>
					[?php
					$column = <?php var_export((array)$this->getParameterValue("{$component_generator_key}.fields.{$column->getName()}")) ?>;
					$column['column_name'] = <?php var_export((string)$column->getName()) ?>;
					if((isset($column['credentials']) && $sf_user->hasCredentialEx($column['credentials'], ($object->isNew() ? null : $object))) || !isset($column['credentials'])){
						$label = get('label', $column, true);
						if($label === 'off'){
							$label = false;
						}
                        ?]
                        <div class="row">
                            [?php
							if($label){
								echo label_for(get('label_for', $column, "{$singular_name}[{$column['column_name']}]"), __($labels[$singular_name.'{'.$column['column_name'].'}']));
							}
							$class = in_array($action_name, array('edit', 'create')) ? 'input_wrapper' : 'shows';
							$class .= ($label === 'top' || !$label) ? ' nolabel' : '';
							$class .= isset($column['class']) ? ' '.$column['class'] : '';
							$input_wrapper_id = get('input_wrapper_id', $column);
							?]
                            <div class="[?php echo $class ?]"[?php echo $input_wrapper_id ? ' id="'.$input_wrapper_id.'"' : '' ?]>
                                [?php
                                if($sf_request->hasError($singular_name.'{'.$column['column_name'].'}')){
									echo '<span class="system negative">'.form_error($singular_name.'{'.$column['column_name'].'}').'</span>';
								}
                                if(in_array($action_name, array('edit', 'create'))){
                                    echo <?php echo $this->getColumnEditExTag($component_generator_key, $column) ?>;
                                } else {
                                    $value = <?php echo $this->getColumnShowTag($column) ?>;
                                    echo $value !== null ? $value : surface_null_value(get('null_value', $column, '&nbsp;'));
                                }							
                                if(isset($column['help'])): ?]
                                    <div class="sf_admin_edit_help">[?php echo __($column['help']) ?]</div>
                                [?php endif ?]
                            </div>
                        </div>
                   [?php 
                   } ?]
				<?php else: ?>
					<?php if(isset($fieldsets_allow_open) && $fieldsets_allow_open) : ?>
						<?php $fieldsets_allow_open = false; ?>
						[?php endif ?]
					<?php endif ?>
					<?php if($allow_method = $this->getParameterValue('fieldsets.' . $column . '.allow_method')): ?>
						<?php $fieldsets_allow_open = true; ?>
						[?php if ($object-><?php echo $allow_method ?>()): ?]
					<?php endif; ?>
					<h3><?php echo $this->getInterpretedString($this->getParameterValue("fieldsets.{$column}.name", $column), true, true) ?></h3>
				<?php endif ?>
			<?php endforeach; ?>
			<?php if(isset($fieldsets_allow_open) && $fieldsets_allow_open) : ?>
				<?php $fieldsets_allow_open = false; ?>
				[?php endif ?]
			<?php endif ?>
		</fieldset>

		[?php if ($render_vtabs) : ?]
			</div>
		[?php endif;
		if ($render_slots){
			end_slot();
		}
		?]

		<?php if($category_data['allow_method']): ?>
			[?php endif; ?]
		<?php endif; ?>

		<?php if($category_data['credentials']): ?>
			[?php endif; ?]
		<?php endif; ?>

	<?php endforeach; ?>

[?php if($render_vtabs) : ?]
	</div>
	<?php
	$tmp = array_keys($categories);
	$active_tab = 'vtab_'.$this->getTabCategoryName(array_shift($tmp));
	?>
	<script>surface.setActiveTab([?php echo $sf_request->getParameter('active_tab') ? "'".$sf_request->getParameter('active_tab')."'" : 'document.location.hash.substr(1)' ?], '<?php echo $active_tab ?>');</script>
[?php endif; ?]

[?php if ($render_slots) : ?]
	[?php include_partial("{$module_name}/{$action_name}_layout", array($singular_name => $object, 'categories' => array(
	<?php
	$categorie_keys = array();
	foreach($categories as $category => $category_data) {
		$categorie_keys[] = "'" . $this->getSlotName($category) . "'";
	}
	echo implode(",", $categorie_keys)
	?>))); ?]
[?php endif; ?]


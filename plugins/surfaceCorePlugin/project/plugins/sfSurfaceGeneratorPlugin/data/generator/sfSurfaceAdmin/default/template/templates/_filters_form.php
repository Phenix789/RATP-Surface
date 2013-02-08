<?php
	$categories = $this->getFiltersCategories();
	$count = count($categories);
	$turn = 0;
?>

[?php
	echo surface_form_to('<?php echo $this->getModuleName() ?>/list',
				'<?php echo $this->getParameterValue('list.filters.target', sfConfig::get('app_surface_default_target_filters') ) ?>',
				array('script' => true),
				array('method' => 'get',
					'class' => 'search_form general_form'
				)
			    )
?]
[?php echo input_hidden_tag('target', $target); ?]

<?php foreach($categories as $category => $category_data): ?>
	<?php $turn++ ?>

	<?php //G EXPANDER ?>
	<?php if($count > 1) : ?>
		<fieldset>
		<?php if($category_data['name']): ?>
			<h3>[?php echo __("<?php echo $category_data['name'] ?>") ?]</h3>
		<?php endif ?>
	<?php endif ?>

	
	<div class="forms">
		<?php foreach($this->getColumns('list.filters', $category) as $column): ?>
			<?php if(is_object($column)): ?>
				<?php if($column->getName() != 'none') : ?>
					<?php $credentials = $this->getParameterValue('list.fields.' . $column->getName() . '.credentials') ?>
					<?php if($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
						[?php if ($sf_user->hasCredentialEx(<?php echo $credentials ?>, null)): ?]
					<?php endif; ?>
					<div class="row">
						<label for="<?php echo $column->getName() ?>">[?php echo __("<?php echo $this->getParameterValue('list.fields.' . $column->getName() . '.name') ?>:") ?]</label>
						<div class="input_wrapper">
							[?php echo <?php echo $this->getColumnFilterTag($column) ?> ?]
							<?php if($this->getParameterValue('list.fields.' . $column->getName() . '.filter_is_empty')): ?>
								<div>[?php echo surface_checkbox_tag('filters[<?php echo $column->getName() ?>_is_empty]', 1, isset($filters['<?php echo $column->getName() ?>_is_empty']) ? $filters['<?php echo $column->getName() ?>_is_empty'] : null) ?][?php echo surface_label_for('filters[<?php echo $column->getName() ?>_is_empty]',  __('is empty')); ?]</div>
							<?php endif; ?>
							<p class="italic_grey"><?php echo $this->getParameterValue('list.fields.' . $column->getName() . '.help') ?></p>
						</div>
					</div>
					<?php if($credentials): ?>
					[?php endif; ?]
					<?php endif; ?>
				<?php endif ?>
			<?php else: ?>
				<h3><?php echo $column; ?></h3>
			<?php endif; ?>
		<?php endforeach; ?>

		<?php /* BEGIN CART */ ?>
		<?php if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue('behaviors.cart.filter') && $turn == $count) : ?>
			<div class="row">
				<label for="filter_cartable">[?php echo __('cart') ?]:</label>
				<div class="input_wrapper">
					[?php echo cart_filter_tag($filters, '<?php echo $this->getClassName() ?>') ?]
				</div>
			</div>
		<?php endif ?>
		<?php /*  END  CART */ ?>
	</div>
	
	<?php //G EXPANDER ?>
	<?php if($count > 1) : ?>
		</fieldset>
	<?php endif ?>

<?php endforeach; ?>

	<fieldset id="advanced_filters_button" style="clear:both;float:none;">
		[?php include_partial('<?php echo $this->getModuleName() ?>/filters_actions') ?]
	</fieldset>
</form>
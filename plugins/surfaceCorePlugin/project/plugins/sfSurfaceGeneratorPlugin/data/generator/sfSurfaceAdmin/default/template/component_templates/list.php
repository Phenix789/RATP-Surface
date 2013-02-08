[?php if(!$do_update): ?]
	<div id="[?php echo $list_target ?]">
[?php endif ?]
[?php
if(isset($component_class_update) && $component_class_update){
	echo surface_register_component($component_class_update, $list_target, "{$module_name}/listUpdate?name={$component_name}&list_target={$list_target}&page={$pager->getPage()}&basket_key=".(isset($basket)? $basket->getKey() : null));
}
if(!isset($params)){
	$params = array();
}

<?php if($this->getParameterValue($component_generator_key.'.inline_editing')): ?>
	if($inline_editing){
		$callbacks = <?php echo $this->getFormCallbacks($component_generator_key.'.inline_editing'); ?>;
		if(isset($dialog) && $dialog){
			$callbacks = array_merge( $callbacks, array('complete' => 'if (json) { SetCursorNormal(); $(\'surface_loading\').hide(); Dialog.okCallback(json); }'));
		}
		<?php if(!$this->getParameterValue($component_generator_key.'.inline_editing.hide_form')): ?>
			echo surface_form_to($module_name.'/listUpdate?skipNav=true', $list_target, $callbacks, array('id' => $unique_id.'_form', 'name' => 'inline_editing_form', 'multipart' => true));
		<?php endif ?>
		echo surface_input_hidden_tag('name', $component_name);
		echo surface_input_hidden_tag('list_target', $list_target);
		echo surface_input_hidden_tag('inline_editing_form', $unique_id.'_form');
	}
	$text_params='';
	foreach($params as $key => $value){
		$text_params = 'params['.urlencode($key).']='.urlencode($value).'&';
		echo surface_input_hidden_tag("params[{$key}]", htmlentities($value));
	}
	$text_params = trim($text_params, '&');
<?php endif ?>

include_partial("{$module_name}/{$component_name}_legend", array('pager' => $pager, 'list_target' => $list_target, 'bTopPosition' => true));
if($pager->getNbResults()){	
	include_partial("{$module_name}/{$component_name}_legend_top", array('pager' => $pager, 'list_target' => $list_target, 'bTopPosition' => true));
	<?php if(!$this->getParameterValue($component_generator_key.'.top_pager_skip', false)) : ?>
		include_partial("{$module_name}/{$component_name}_pager", array('pager' => $pager, 'list_target' => $list_target, 'bTopPosition' => true, 'pager_steps' => $pager_steps, 'unique_id' => $unique_id));
	<?php endif ?>
}
?]
<table id="[?php echo $unique_id ?]_table" class="table_wrapper" cellpadding="0" cellspacing="0">
	[?php if($pager->getNbResults() || $inline_editing): ?]
		<?php if(!$this->getParameterValue($component_generator_key.'.header_skip', false)) : ?>
			<thead>
				<tr>
					[?php if (isset($batch_actions) && $batch_actions && isset($batch_selection) && $batch_selection): ?]
						<th class="table_wrapper_select" style="width: 20px;">
							&nbsp; [?php echo surface_checkbox_tag('check_all', null, false, array('onclick' => "surfaceBatchCheckToggleAll('{$module_name}_{$component_name}_batch_items', this.checked);")) ?]
						</th>
					[?php endif; ?]
					[?php include_partial("{$module_name}/{$component_name}_th_{$layout}", array('pager' => $pager, 'list_target' => $list_target, 'pager_steps' => $pager_steps, 'unique_id' => $unique_id)) ?]

					<?php if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue($component_generator_key.'.cart.active_actions') && $this->getParameterValue($component_generator_key.'.cart.separate_actions')): ?>
						<th class="table_wrapper_cart">[?php echo __('cart') ?]</th>
					<?php endif ?>

					<?php if(!$this->getParameterValue($component_generator_key.'.object_actions_skip', false)) : ?>
						<?php $list_object_actions = $this->getParameterValue($component_generator_key.'.object_actions') ?>
						<?php if(($list_object_actions === null) || !empty($list_object_actions)): ?>
								<th class="table_wrapper_actions">[?php echo __('Actions') ?]</th>
						<?php endif ?>
					<?php endif ?>
				</tr>
			</thead>
		<?php endif ?>
	[?php endif ?]
	[?php $i = 1 ?]
	<tbody id="[?php echo $unique_id ?]_tbody">
		[?php if($pager->getNbResults()): ?]
			[?php foreach($pager->getResults() as $object): ?]
				[?php
				$<?php echo $this->getSingularName() ?> = &$object;
				$odd = fmod(++$i, 2);
				$tr_class = "";
				<?php if(is_array($this->getParameterValue($component_generator_key . '.tr_class'))): ?>
					<?php foreach($this->getColumns($component_generator_key . '.tr_class') as $column): ?>
						$tr_class .= <?php echo $this->getColumnGetter($column, true) ?>;
					<?php endforeach; ?>
				<?php endif; ?>
				?]
				<tr class="table_row_[?php echo $odd.' '.$tr_class ?]" id="[?php echo $unique_id.'_<?php echo $this->getPrimaryKeyHTMLParams() ?> ?]">
					[?php if(isset($batch_actions) && $batch_actions && isset($batch_selection) && $batch_selection): ?]
						<td class="table_wrapper_select" style="width: 20px;">
							[?php echo surface_checkbox_tag("ids[]", <?php echo $this->getBatchPrimaryKeyUrlParams() ?>, false, array('class' => "{$module_name}_{$component_name}_batch_items", 'id' => null)) ?]
						</td>
					[?php endif ?]
					[?php include_partial("{$module_name}/{$component_name}_td_".($inline_editing ? 'inline_editing' : $layout), array('module_name' => $module_name, 'singular_name' => $singular_name, $singular_name => $object, 'object' => $object, 'pager' => $pager, 'unique_id' => $unique_id, 'list_target' => $list_target)) ?]
					<?php if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue($component_generator_key . '.cart.active_actions') && $this->getParameterValue($component_generator_key . '.cart.separate_actions')): ?>
						[?php include_partial("{$module_name}/{$component_name}_td_actions_cart", array($singular_name => $object, 'object' => $object, 'pager' => $pager, 'cart' => isset($cart) ? $cart : null)) ?]
					<?php endif ?>

					<?php if(!$this->getParameterValue($component_generator_key.'.object_actions_skip', false)) : ?>
						[?php
						if(isset($basket) && $basket->isOpened()){
							include_partial("{$module_name}/{$component_name}_td_actions_basket", array($singular_name => $object, 'object' => $object, 'pager' => $pager, 'list_target' => $list_target, 'basket' => $basket));
						} else {
							include_partial("{$module_name}/{$component_name}_td_actions", array($singular_name => $object, 'object' => $object, 'pager' => $pager, 'list_target' => $list_target, 'target' => $target, 'cart' => isset($cart) ? $cart : null));
						}
						?]
					<?php endif ?>
				</tr>
			[?php endforeach; ?]
		[?php endif ?]
	</tbody>
</table>
[?php if(!$pager->getNbResults() && !$inline_editing): ?]
	<div class="pagination noresult">
		[?php echo __('no result') ?]
	</div>
[?php endif ?]

<?php if($this->getParameterValue($component_generator_key.'.inline_editing')): ?>
	<script type="text/javascript">
		if(!document.current_inline_editing_row_id){
			document.current_inline_editing_row_id=new Array();
		}
		document.current_inline_editing_row_id['[?php echo $unique_id ?]'] = -1;
	</script>
	[?php include_partial("{$module_name}/{$component_name}_inline_editing_bottom_actions", array('pager' => $pager, 'inline_editing' => $inline_editing, 'unique_id' => $unique_id, 'text_params' => $text_params, 'params' => $params, 'list_target' => $list_target)) ?]
<?php endif ?>
		
[?php
if($pager->getNbResults()){
	<?php if(!$this->getParameterValue($component_generator_key.'.bottom_pager_skip', false)): ?>
		include_partial("{$module_name}/{$component_name}_pager", array(
				'pager' => $pager,
				'list_target' => $list_target,
				'basket_key' => isset($basket) ? $basket->getKey() : null,
				'bTopPosition' => false,
				'batch_actions' => (isset($batch_actions)) ? $batch_actions : null,
				'batch_confirms' => (isset($batch_confirms)) ? $batch_confirms : array(),
				'pager_steps' => $pager_steps
			));
	<?php endif ?>
	include_partial("{$module_name}/{$component_name}_legend", array('pager' => $pager, 'list_target' => $list_target, 'bTopPosition' => false));
	include_partial("{$module_name}/{$component_name}_legend_bottom", array('pager' => $pager, 'list_target' => $list_target, 'bTopPosition' => false));
}
?]

<?php if($this->getParameterValue($component_generator_key.'.inline_editing')): ?>
	<?php if(!$this->getParameterValue($component_generator_key.'.inline_editing.hide_form')): ?>
		</form>
	<?php endif ?>
<?php endif ?>

[?php if(!$do_update): ?]
	</div>
[?php endif ?]



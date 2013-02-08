[?php if (!$do_update): ?]
<div id="[?php echo $list_target ?]">
	[?php endif ?]

	[?php if (isset($component_class_update) && $component_class_update): ?>
	[?php echo surface_register_component(  $component_class_update,
	$list_target,
	'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null)
	); ?]
	[?php endif; ?]



	[?php if (!$pager->getNbResults()): ?]
	[?php echo __('no result') ?]
	[?php else: ?]

	[?php include_partial('<?php echo $this->getModuleName() ?>/<?php echo $component_name; ?>Map_pager',
	array(  'pager'         => $pager,
	'list_target'   => $list_target,
	'basket_key'    => isset($basket)? $basket->getKey() : null,
	'bTopPosition'  => true,
	'pager_steps'   => $pager_steps,
	)
	);
	?]

	<div class="section_inner">
		<div class="table_wrapper">

			<div class="table_wrapper_inner">
				<?php $map_render = $this->getParameterValue($component_generator_key . '.map_render', array()); ?>
				<?php if($map_render && isset($map_render['display'])): ?>

					<?php // $column = $map_render['display']; ?>
					<?php $column = $this->getAdminColumnForField($map_render['display'], 0) ?>


					<div style="margin: 0 auto; width: 720px;">
						[?php
						$map = get_id_from_name('<?php echo $column->getName() ?>').'_map_list';
						<?php $options = $this->getParameterValue('components.list.fields.params' . $column->getName(), array()); ?>
						<?php $options = array_merge(sfConfig::get('app_sf_openlayers_map_edit', array()), $options); ?>
						$options = <?php var_export($options); ?>;

						$options = array_merge($options, array('pan_zoom_bar'    => true,));

						echo openlayers_map_container($map, array("style" => "width: 720px; height: 540px; border: solid 1px #C0C0C0; display: block; float: left;"));
						// echo openlayers_map_container($map, array("style" => "width: 720px; height: 540px; border: solid 1px #C0C0C0; display: block; margin: 0 auto;"));
						$js  = _object_oljs_create_map($map, $options);
						// $js .= oljs_map_addLayerVector($map, 'dessin', array('name'  => 'Dessin',));
						$js .= oljs_map_addLayerMarker($map, 'marker', array('name'  => 'Markers',));
						$js .= oljs_map_addLayerSwitcher($map);
						$js .= oljs_map_addScaleInfo($map);
						?]

						[?php $i = 1; foreach ($pager->getResults() as $<?php echo $this->getSingularName() ?>): ?]
						[?php
						$wkt = $<?php echo $this->getSingularName() ?>-><?php echo $this->getColumnGetter($column, false) ?>();
						if ($wkt): ?]        
						[?php if (!is_array($wkt)): ?]
						[?php $wkt = array($wkt); ?]
						[?php endif; ?]
						[?php foreach ($wkt as $awkt): ?]
						[?php $popup_content = get_partial('<?php echo $this->getModuleName() ?>/<?php echo $component_name; ?>Map_popup',
						array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>,
						'page'                                   => $pager->getPage(),
						))
						?]

						[?php $js .= oljs_map_add_marker(   $map,
						'marker',
						$awkt,
						array(  'icon' => '<?php echo $this->getParameterValue($component_generator_key . '.map_render.icon', "") ?>',
						'popup_content' => $popup_content,
						'popup_options' => '<?php echo $this->getParameterValue($component_generator_key . '.map_render.popup.options') ?>',
						'zoom'          => false,
						));
						?]
						[?php endforeach; ?]
						[?php $js .= oljs_zoom_on_layer_data($map, 'marker'); ?]
						[?php endif; ?]

						[?php endforeach; ?]

						[?php echo javascript_tag($js); ?]

					</div>

				<?php endif; ?>
			</div>

		</div>
	</div>

	[?php include_partial('<?php echo $this->getModuleName() ?>/<?php echo $component_name; ?>Map_pager',
	array(  'pager'         => $pager,
	'list_target'   => $list_target,
	'basket_key'    => isset($basket)? $basket->getKey() : null,
	'bTopPosition'  => false,
	'pager_steps'   => $pager_steps,
	)
	);
	?]

	[?php endif; ?]

	[?php if (!$do_update): ?]
</div>
[?php endif ?]



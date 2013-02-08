<div class="pagination [?php echo (($bTopPosition)? 'page_top' : 'page_bottom'); ?]">

	<?php //BEGIN OLD BATCH ACTION ?>
	[?php if (isset($batch_actions) && $batch_actions): ?]

        <span class="page_actions">
		<span class="spacer">&nbsp;</span>
		[?php echo surface_select_tag(  '<?php echo $this->getModuleName() . '_' . $component_name ?>_batch_actions',
		options_for_select($batch_actions, '', array('include_custom' => 'Choisir une action')),
		array()
		);
		?]
		<span class="button">
			[?php echo surface_link_to( '&nbsp;', 
			'<?php echo $this->getModuleName() ?>/batchAction?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target,
			true,
			array(  'method'    => 'POST',
			'with'      => "'batch_action=' + $('<?php echo $this->getModuleName() . '_' . $component_name ?>_batch_actions').value + surfaceBatchGetParams('<?php echo $this->getModuleName() . '_' . $component_name ?>_batch_items')",
			'condition' => "surfaceBatchConfirmAction($('<?php echo $this->getModuleName() . '_' . $component_name ?>_batch_actions').value, " . _options_for_javascript($batch_confirms) .")"
			)
			);
			?]
		</span>
        </span>
        <br style="clear: both;" />
	[?php endif; ?]
	<?php //END OLD BATCH ACTION ?>

	<span class="page_no">
		Il y a <strong>[?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?]</strong>.

		<?php /* CART - AJOUTER TOUT - RETIRER TOUT */ ?>
		<?php if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue($component_generator_key . '.cart.add_remove_all')) : ?>
		[?php echo surface_link_to('Ajouter tout', '<?php echo $this->getModuleName() ?>/addSelectionToCart?object_name=<?php echo $this->getClassName() ?>&name=<?php echo $component_name ?>&list_target=' . $list_target, $list_target) ?]
		ou
		[?php echo surface_link_to('Enlever tout', '<?php echo $this->getModuleName() ?>/removeSelectionToCart?object_name=<?php echo $this->getClassName() ?>&name=<?php echo $component_name ?>&list_target=' . $list_target, $list_target) ?]
		de la session.
		<?php endif ?>

	</span>

	<?php $map_render = $this->getParameterValue($component_generator_key . '.map_render', array()); ?>

	<?php $credentials = $this->getParameterValue($component_generator_key . '.map_render.credentials') ?>
	<?php if($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
	        [?php if ($sf_user->hasCredentialEx(<?php echo $credentials ?>, null)): ?]
	<?php endif; ?>
	<?php if($map_render): ?>
	        <span class="render_map">[?php echo surface_link_to("Voir sur la carte",
			'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target); ?]
	        </span>
	<?php endif; ?>
	<?php if($credentials): ?>
	        [?php endif; ?]
	<?php endif; ?>

	<div class="page_list">
		[?php
		$url = '<?php echo $this->getModuleName() ?>/listUpdate?name=<?php echo $component_name; ?>&list_target='.$list_target.'&basket_key='.(isset($basket)? $basket->getKey() : null).'&page=';
		if($pager->haveToPaginate()){
			$pages = $pager->getLinks(3);
			if(isset($pages[0]) && $pages[0] != 1){
				echo surface_link_to('1', $url.'1', $list_target);
			}
			if(!in_array(2, $pages)){
				echo '<span>..</span>';
			}
			foreach($pages as $page){
				if($page == $pager->getPage()){
					echo '<span class="active">'.$page.'</span>';
				} else {
					echo surface_link_to($page, $url.$page,	$list_target);
				}
			}
			if(count($pages)>2){
				if(!in_array($pager->getLastPage()-1, $pages)){
					echo '<span>..</span>';
				}
				if(isset($pages[count($pages)-1]) && $pages[count($pages)-1] != $pager->getLastPage()){
					echo surface_link_to($pager->getLastPage(), $url.$pager->getLastPage(), $list_target);
				}
			}
		}
		
		if(isset($pager_steps) && $pager_steps){
			echo surface_select_link_to( '<?php echo $this->getModuleName() . '_' . $component_name ?>'.(($bTopPosition)? '_top' : '_bottom').'_page_count',
				options_for_select($pager_steps, $pager->getMaxPerPage(), array()),
				array( 'url' => $url.$pager->getPage(), 'target'=>$list_target, 'param_name'=>'max_per_page'));
		}
		?]
	</div>
	<div class="clear"></div>
</div>
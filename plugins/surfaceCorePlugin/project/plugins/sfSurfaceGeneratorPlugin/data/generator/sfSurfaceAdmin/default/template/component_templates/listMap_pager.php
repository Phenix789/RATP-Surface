<div class="pagination [?php echo (($bTopPosition)? 'page_top' : 'page_bottom'); ?]">
	<span class="page_no">
		[?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?]
		[?php if (isset($pager_steps) && $pager_steps): ?]
		| [?php echo surface_select_link_to(  '<?php echo $this->getModuleName() . '_' . $component_name ?>'.(($bTopPosition)? '_top' : '_bottom').'_page_count',
		options_for_select($pager_steps, $pager->getMaxPerPage(), array()),
		array(  'url'        => '<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
		'target'     => $list_target,
		'param_name' => 'max_per_page'
		)
		).' par page';
		?]
		[?php endif; ?]    
	</span>

	<?php $map_render = $this->getParameterValue($component_generator_key . '.map_render', array()); ?>


	<?php $credentials = $this->getParameterValue($component_generator_key . '.map_render.credentials') ?>
	<?php if($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
	        [?php if ($sf_user->hasCredentialEx(<?php echo $credentials ?>, null)): ?]
	<?php endif; ?>
	<?php if($map_render): ?>
	        <span class="render_map">[?php echo surface_link_to("Voir la liste",
			'<?php echo $this->getModuleName() ?>/listUpdate?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target); ?]
	        </span>
	<?php endif; ?>
	<?php if($credentials): ?>
	        [?php endif; ?]
	<?php endif; ?>

	<ul class="pag_list">

		[?php if ($pager->haveToPaginate()): ?]
		<li>
			[?php echo surface_link_to(image_tag('/sfSurfaceGeneratorPlugin/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('first'))),
			'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page=1&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target
			) ?]
		</li>
		<li>
			[?php echo surface_link_to(image_tag('/sfSurfaceGeneratorPlugin/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))),
			'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPreviousPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target
			) ?]
		</li>

		[?php foreach ($pager->getLinks() as $page): ?]
		<li> 
			[?php if ( $page == $pager->getPage() ) : ?]
			<span><strong>[?php echo $page; ?]</strong></span>
			[?php else: ?]
			[?php echo surface_link_to($page,
			'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$page.'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target
			) ?]
			[?php endif; ?]
		</li>

		[?php endforeach; ?]

		<li>
			[?php echo surface_link_to(image_tag('/sfSurfaceGeneratorPlugin/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))),
			'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getNextPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target
			) ?]
		</li>
		<li>
			[?php echo surface_link_to(image_tag('/sfSurfaceGeneratorPlugin/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))),
			'<?php echo $this->getModuleName() ?>/listRenderMap?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getLastPage().'&basket_key='.(isset($basket)? $basket->getKey() : null),
			$list_target
			) ?]
		</li>
		[?php endif; ?]
	</ul>    
</div>
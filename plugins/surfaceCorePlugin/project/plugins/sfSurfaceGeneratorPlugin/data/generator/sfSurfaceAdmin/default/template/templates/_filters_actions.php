[?php if(!isset($submit_value)) { $submit_value = 'filter'; } ?]
<div class="action_wrapper action_wrapper_filters">
	<ul>
		<li>
			[?php echo surface_submit_tag(__('filter'), array('submit_value' => $submit_value, 'name' => 'filter', 'class' => 'button_apply_filter')) ?]
		</li>
		<?php if($this->getParameterValue('list.filter_reset')): ?>
			<li>
				[?php
					echo surface_button_to(__('reset'),
						'<?php echo $this->getModuleName() ?>/list?filter=none&target=<?php echo $this->getParameterValue('list.filters.target', sfConfig::get('app_surface_default_target_filters')) ?>',
						'<?php echo $this->getParameterValue('list.filters.target', sfConfig::get('app_surface_default_target_filters')) ?>',
						true,
						array('script' => true),
						array('class' => 'button_reset_filter')
					)
				?]
			</li>
		<?php endif; ?>
		<li style="padding-left: 5px;">
			[?php
				echo surface_button_to(__('fetch all'),
					'<?php echo $this->getModuleName() ?>/list?filter=filter&target=<?php echo $this->getParameterValue('list.filters.target', sfConfig::get('app_surface_default_target_filters')) ?>',
					'<?php echo $this->getParameterValue('list.filters.target', sfConfig::get('app_surface_default_target_filters')) ?>',
					true,
					array('script' => true),
					array('class' => 'button_showall_filter')
				)
			?]
		</li>
	</ul>
</div>
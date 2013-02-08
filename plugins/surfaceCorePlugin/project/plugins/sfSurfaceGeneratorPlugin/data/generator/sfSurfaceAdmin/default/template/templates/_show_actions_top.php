[?php if($target == 'tg_center' || $target == 'tg_east'): ?]
<div class="action_wrapper action_wrapper_top">
	<ul>
		<?php
		$actions = $this->getActionsParameters('show');
		
		if(null !== $actions){
			foreach((array)$actions as $actionName => $params){
				$target = $this->getParameterValue('show.actions.'.$actionName.'.target', sfConfig::get('app_surface_default_target'.$actionName));
				if(!isset($params['name'])) { $params['name'] = ''; }
                                $params['real_name'] = $params['name'];
                                $params['no_label'] = true;
				$params['name'] = '\').(($sf_request->getParameter(\'target\') == \'tg_center\')?__(\''.$params['name'].'\'):\'';//Don't touch please

				if($this->getParameterValue('show.actions.'.$actionName.'.allow_method')){
					echo '[?php if($'.$this->getSingularName().'->'.$this->getParameterValue('show.actions.'.$actionName.'.allow_method').'()) : ?]';
				}
				echo $this->addCredentialExCondition(
						$this->getRemoteButtonToAction($actionName, $params, true, $target),
						$this->getParameterValue('show.actions.'.$actionName.'.credentials'),
						$this->getParameterValue('show.actions.'.$actionName.'.conditions'),
						'$'.$this->getSingularName()
				);
				if($this->getParameterValue('show.actions.'.$actionName.'.allow_method')){
					echo '[?php endif ?]';
				}
			}
		}
		
		/* BEGIN CART */
		if($this->getParameterValue('behaviors.cart.active') && $this->getParameterValue('show.cart.active_actions')){
			echo '<li>[?php echo cart_show_object_action_tag($'.$this->getSingularName().') ?]</li>';
		}
		/*  END  CART */
		?>
	</ul>
</div>
[?php endif ?]
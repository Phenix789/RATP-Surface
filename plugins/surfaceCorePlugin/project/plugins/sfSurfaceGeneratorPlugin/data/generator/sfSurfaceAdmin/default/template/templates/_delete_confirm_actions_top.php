[?php if($target == 'tg_center'): ?]
<div class="action_wrapper action_wrapper_top">
	<ul>
		<?php
		$actions = $this->getActionsParameters('delete_confirm');
		if(null !== $actions){
			foreach((array) $actions as $actionName => $params){
				$target = $this->getParameterValue('delete_confirm.actions.'.$actionName.'.target', sfConfig::get('app_surface_default_target'.$actionName));
				if(!isset($params['name'])){ $params['name'] = ''; }
				
				$params['name'] = '\').(($sf_request->getParameter(\'target\') == \'tg_center\')?__(\''.$params['name'].'\'):\'';
				echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, $target),
						$this->getParameterValue('delete_confirm.actions.' . $actionName . '.credentials'),
						$this->getParameterValue('delete_confirm.actions.' . $actionName . '.conditions'),
						'$' . $this->getSingularName());
			}
		}
		?>
	</ul>
</div>
[?php endif ?]
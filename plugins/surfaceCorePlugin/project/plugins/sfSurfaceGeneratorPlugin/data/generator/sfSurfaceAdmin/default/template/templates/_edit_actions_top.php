[?php if($sf_request->getParameter('target')=='tg_center'): ?]
<div class="action_wrapper action_wrapper_top">
	<ul>
		<?php $actions = $this->getActionsParameters('edit') ?>
		<?php if(null !== $actions): ?>
			<?php foreach((array) $actions as $actionName => $params): ?>
				<?php $target = $this->getParameterValue('edit.actions.'.$actionName.'.target', sfConfig::get('app_surface_default_target'.$actionName)) ?>
				<?php if(!isset($params['name'])){ $params['name'] = ''; } ?>
				<?php $params['name'] = '\').(($sf_request->getParameter(\'target\') == \'tg_center\')?__(\''.$params['name'].'\'):\'' ?>

				<?php if($this->getParameterValue('edit.actions.' . $actionName . '.allow_method')) : ?>
					[?php if($<?php echo $this->getSingularName() ?>-><?php echo $this->getParameterValue('edit.actions.' . $actionName . '.allow_method') ?>()) : ?]
				<?php endif ?>
				<?php $params = array_merge((array) $params, array('no_label' => true)) ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, $this->getParameterValue('edit.actions.' . $actionName . '.target', sfConfig::get('app_surface_default_target' . $actionName))), $this->getParameterValue('edit.actions.' . $actionName . '.credentials'), $this->getParameterValue('edit.actions.' . $actionName . '.conditions'), '$' . $this->getSingularName()) ?>
				<?php if($this->getParameterValue('edit.actions.' . $actionName . '.allow_method')) : ?>
					[?php endif ?]
				<?php endif ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>
[?php endif ?]
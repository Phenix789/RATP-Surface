<div class="action_wrapper action_wrapper_top">
	<ul>
		<?php $actions = $this->getActionsParameters('list') ?>
		<?php if(null !== $actions): ?>
			<?php foreach((array) $actions as $actionName => $params) : ?>
				<?php $target = $this->getParameterValue('list.actions.'.$actionName.'.target', sfConfig::get('app_surface_default_target'.$actionName)); ?>
				<?php if($this->getParameterValue('list.actions.' . $actionName . '.allow_method')) : ?>
					[?php if($<?php echo $this->getSingularName() ?>-><?php echo $this->getParameterValue('list.actions.' . $actionName . '.allow_method') ?>()) : ?]
				<?php endif ?>
				<?php if(!isset($params['name'])){ $params['name'] = ''; } ?>
				<?php $params['name'] = '\').(($sf_request->getParameter(\'target\') == \'tg_center\')?__(\''.$params['name'].'\'):\'' ?>

				<?php echo $this->addCredentialExCondition(
						$this->getRemoteButtonToAction($actionName, $params, false, $target),
						$this->getParameterValue('list.actions.' . $actionName . '.credentials'),
						$this->getParameterValue('list.actions.' . $actionName . '.conditions'),
						null
					) ?>
				<?php if($this->getParameterValue('list.actions.' . $actionName . '.allow_method')) : ?>
					[?php endif ?]
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	</ul>
</div>
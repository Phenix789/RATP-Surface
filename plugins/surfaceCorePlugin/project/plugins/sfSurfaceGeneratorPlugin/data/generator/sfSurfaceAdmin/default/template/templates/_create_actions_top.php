<div class="action_wrapper action_wrapper_top">
	<ul>
	[?php if (isset($dialog) && $dialog): ?]
		<li><input class="sf_admin_action_save" type="submit" value="[?php echo __('save'); ?]" name="save"  /></li>
		<li><input class="sf_admin_action_cancel" type="button" value="[?php echo __('cancel'); ?]" name="cancel" onclick='Dialog.cancelCallback();' /></li>
	[?php else: ?]
		<?php $actions = $this->getActionsParameters('create') ?>
		<?php if(null !== $actions) : ?>
			<?php foreach((array) $actions as $actionName => $params) : ?>
				<?php $target = $this->getParameterValue('create.actions.'.$actionName.'.target', sfConfig::get('app_surface_default_target'.$actionName)) ?>
				<?php if(!isset($params['name'])){ $params['name']=''; } ?>
				<?php $params['name'] = '\').(($sf_request->getParameter(\'target\') == \'tg_center\')?__(\''.$params['name'].'\'):\'' ?>

				<?php if($this->getParameterValue('create.actions.' . $actionName . '.allow_method')) : ?>
					[?php if($<?php echo $this->getSingularName() ?>-><?php echo $this->getParameterValue('create.actions.' . $actionName . '.allow_method') ?>()) : ?]
				<?php endif ?>
				<?php $params = array_merge((array) $params, array('no_label' => true)); ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, $target),
						$this->getParameterValue('create.actions.' . $actionName . '.credentials'),
						$this->getParameterValue('create.actions.' . $actionName . '.conditions'),
						'$' . $this->getSingularName()
					) ?>
				<?php if($this->getParameterValue('create.actions.' . $actionName . '.allow_method')) : ?>
					[?php endif ?]
				<?php endif ?>
			<?php endforeach; ?>
		<?php endif; ?>
	[?php endif; ?]
	</ul>
</div>
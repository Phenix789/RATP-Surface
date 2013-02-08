<div class="action_wrapper">
	[?php if (isset($dialog) && $dialog): ?]
		<input class="sf_admin_action_save" type="submit" value="[?php echo __('save'); ?]" name="save"  />
		<input class="sf_admin_action_cancel" type="button" value="[?php echo __('cancel'); ?]" name="cancel" onclick='Dialog.cancelCallback();' />
	[?php else: ?]
		<?php $actions = $this->getActionsParameters('create') ?>
		<?php if(null !== $actions): ?>
			<?php foreach((array) $actions as $actionName => $params): ?>
				<?php if($this->getParameterValue('create.actions.' . $actionName . '.allow_method')) : ?>
					[?php if($object-><?php echo $this->getParameterValue('create.actions.' . $actionName . '.allow_method') ?>()) : ?]
				<?php endif ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, '\'.isset($target) ? $target : \''.$this->getParameterValue('create.actions.' . $actionName . '.target', sfConfig::get('app_surface_default_target' . $actionName))), $this->getParameterValue('create.actions.' . $actionName . '.credentials'), $this->getParameterValue('create.actions.' . $actionName . '.conditions'), null) ?>
				<?php if($this->getParameterValue('create.actions.' . $actionName . '.allow_method')) : ?>
					[?php endif ?]
				<?php endif ?>
			<?php endforeach; ?>
		<?php endif; ?>
	[?php endif; ?]
</div>

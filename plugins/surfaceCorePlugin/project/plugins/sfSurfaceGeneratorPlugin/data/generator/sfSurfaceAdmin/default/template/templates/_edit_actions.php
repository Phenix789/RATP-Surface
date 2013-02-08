<div class="action_wrapper">
	<ul>
		<?php $actions = $this->getActionsParameters('edit') ?>
		<?php if(null !== $actions) : ?>
			<?php foreach((array) $actions as $actionName => $params): ?>
				<?php if($actionName == '_cancel') : ?>                
			                [?php if ($target != "popup") : ?]
				<?php endif; ?>
				<?php if($this->getParameterValue('edit.actions.' . $actionName . '.allow_method')) : ?>
					[?php if($<?php echo $this->getSingularName() ?>-><?php echo $this->getParameterValue('edit.actions.' . $actionName . '.allow_method') ?>()) : ?]
				<?php endif ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, $this->getParameterValue('edit.actions.' . $actionName . '.target', sfConfig::get('app_surface_default_target' . $actionName))), $this->getParameterValue('edit.actions.' . $actionName . '.credentials'), $this->getParameterValue('edit.actions.' . $actionName . '.conditions'), '$' . $this->getSingularName()) ?>
				<?php if($this->getParameterValue('edit.actions.' . $actionName . '.allow_method')) : ?>
					[?php endif ?]
				<?php endif ?>
				<?php if($actionName == '_cancel') : ?>                
			                [?php endif; ?]
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>
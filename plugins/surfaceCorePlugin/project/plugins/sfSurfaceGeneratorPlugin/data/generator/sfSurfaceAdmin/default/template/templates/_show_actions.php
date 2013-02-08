<div class="action_wrapper">
	<ul>
		<?php $actions = $this->getActionsParameters('show') ?>
		<?php if(null !== $actions): ?>
			<?php foreach((array) $actions as $actionName => $params): ?>
				<?php if($this->getParameterValue('show.actions.' . $actionName . '.allow_method')) : ?>
					[?php if($<?php echo $this->getSingularName() ?>-><?php echo $this->getParameterValue('show.actions.' . $actionName . '.allow_method') ?>()) : ?]
				<?php endif ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, $this->getParameterValue("show.actions.{$actionName}.target", sfConfig::get('app_surface_default_target' . $actionName))), $this->getParameterValue('show.actions.' . $actionName . '.credentials'), $this->getParameterValue('show.actions.' . $actionName . '.conditions'), '$' . $this->getSingularName()) ?>
				<?php if($this->getParameterValue('show.actions.' . $actionName . '.allow_method')) : ?>
					[?php endif ?]
				<?php endif ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>
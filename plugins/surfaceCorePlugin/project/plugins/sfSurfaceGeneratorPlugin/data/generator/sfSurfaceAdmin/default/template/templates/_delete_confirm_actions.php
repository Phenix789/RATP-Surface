<div class="action_wrapper">
	<ul>
		<?php $actions = $this->getActionsParameters('delete_confirm') ?>
		<?php if(null !== $actions): ?>
			<?php foreach((array) $actions as $actionName => $params): ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteButtonToAction($actionName, $params, true, $this->getParameterValue('delete_confirm.actions.' . $actionName . '.target', sfConfig::get('app_surface_default_target' . $actionName))), $this->getParameterValue('delete_confirm.actions.' . $actionName . '.credentials'), $this->getParameterValue('delete_confirm.actions.' . $actionName . '.conditions'), '$' . $this->getSingularName()) ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>
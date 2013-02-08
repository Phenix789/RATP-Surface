<?php $list_object_actions = array('_show' => $this->getParameterValue($component_generator_key . '.object_actions.show', array())) ?>
<?php if($list_object_actions !== null): ?>
	<?php if(!empty($list_object_actions)): ?>
		<td class="table_wrapper_actions">
			<?php foreach($list_object_actions as $actionName => $params): ?>
				<?php echo $this->addCredentialExCondition($this->getRemoteLinkToAction($actionName, $params, true, $this->getParameterValue($component_generator_key . '.object_actions.' . $actionName . '.target', sfConfig::get('app_surface_default_target' . $actionName)), true), $this->getParameterValue($component_generator_key . '.object_actions.' . $actionName . '.credentials'), $this->getParameterValue($component_generator_key . '.object_actions.' . $actionName . '.conditions'), '$' . $this->getSingularName()) ?>
			<?php endforeach; ?>
			[?php if (!$basket->hasItem($<?php echo $this->getSingularName() ?>)) : ?]
				<?php echo $this->addCredentialExCondition('[?php echo surface_basket_add_item($basket, $' . $this->getSingularName() . ', \'' . $this->getModuleName() . '/listUpdate?name=' . $component_name . '&list_target=\'.$list_target.\'&page=\'.$pager->getPage(), $list_target); ?]', $this->getParameterValue($component_generator_key . '.object_actions.basket_add_item.credentials'), $this->getParameterValue($component_generator_key . '.object_actions.basket_add_item.conditions'), '$' . $this->getSingularName()) ?>
			[?php endif ?]
		</td>
	<?php endif; ?>
<?php endif; ?>
[?php $nb_result = $sf_user->getAttribute('sf_admin/<?php echo $this->getSurfaceNamespace() ?>/<?php echo $this->getSingularName() ?>_list_<?php echo $this->getParameterValue('actions.list.target', 'tg_center') ?>/nb_results') ?]
<div class="export_wrapper">
	<ul>
		<?php foreach($this->getParameterValue('list.exports', array()) as $exportName => $params) : ?>
			<?php
			if(strpos($exportName, '_') === 0) {
					$default = array(
						'outputType' => 'pdf',
						'action' => 'export' . sfInflector::camelize('List' . $exportName),
						'name' => 'imprimer'
					);
					$params = array_merge($default, (array) $params);
				}
			?>
			<?php echo $this->addCredentialExCondition($this->getButtonToExport($exportName, $params, false), $this->getParameterValue('list.exports.' . $exportName . '.credentials'), $this->getParameterValue('list.exports.' . $exportName . '.conditions'), null) ?>
		<?php endforeach ?>
	</ul>
</div>
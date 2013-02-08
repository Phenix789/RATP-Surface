<div class="export_wrapper">
	<ul>
		<?php foreach($this->getParameterValue('show.exports', array()) as $exportName => $params): ?>
			<?php
				if(strpos($exportName, '_') === 0) {
					$default = array(
						'outputType' => 'pdf',
						'action' => 'export' . sfInflector::camelize('Show' . $exportName),
						'name' => 'imprimer'
					);
					$params = array_merge($default, (array) $params);
				}
			?>
			<?php echo $this->addCredentialExCondition($this->getButtonToExport($exportName, $params, true), $this->getParameterValue('show.exports.' . $exportName . '.credentials'), $this->getParameterValue('show.exports.' . $exportName . '.conditions'), '$' . $this->getSingularName()) ?>
		<?php endforeach ?>
	</ul>
</div>
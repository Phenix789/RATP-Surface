<div class="wizard_actions">
	<?php
	$prevStep = $wizard->getPreviousStep();
	if($prevStep){
		echo surface_button_to('Précédent', $prevStep->getUrl(), $wizard->getTarget(), false, array(), array('class' => 'sf_action_wiz_prev'));
	}

	$nextStep = $wizard->getNextStep();
	if($nextStep){
		echo surface_submit_tag('Suivant', array('class' => 'sf_action_wiz_next'));
	} else {
		echo surface_submit_tag('Terminer', array('class' => 'sf_action_wiz_next'));
	}
	?>
</div>
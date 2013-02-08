<?php echo input_hidden_tag('current_step_key', $wizard->getCurrentStep()->getKey()) ?>
<div class="wizardwrapper">
	<div>
		<h1 class="x-panel-header"><?php echo $wizard->getTitle() ?></h1>
	</div>
	<?php $dispStepsInfo = $wizard->getVisibleStepsInfo() ?>
	<ul class="wizardNav stepsBy<?php echo count($dispStepsInfo) ?>" style="background-color:#ebebeb; width:100%; clear: both;">
		<?php foreach ($dispStepsInfo as $stepInfo) : ?>
		<li <?php echo ( count($stepInfo['stepFlag']) > 0 ) ? "class='".implode(" ", $stepInfo['stepFlag'])."' " : "" ?>>
			<p class="wizard_step_label" title="<?php echo $stepInfo['step']->getTitle() ?>" <?php echo ($stepInfo['step']->isDisabled()) ? " class='disabled' ": ""; ?>>
				<strong><?php echo $stepInfo['step']->getLabel() ?><?php echo ($stepInfo['step']->getTitle())? '<br/>' : ''; ?></strong>
				<span><?php echo $stepInfo['step']->getTitle() ?></span>
			</p>
		</li>
		<?php endforeach; ?>
	</ul>
	<div class="wizard_step_title">
		<?php echo include_partial($module_name.'/wizard_actions', array("wizard" => $wizard)) ?>
	</div>
</div>
<?php  use_helper('Validation','Date')  ?>
<div id="alert_form">
	<?php echo surface_form_to('alert/add','alert_form',Array('method'=>'post','script'=>true)) ?>
		<table border="0" width="200px">
			<tr>
				<td valign="top">
					<label for="recipient">Destinataire :</label>
				</td>
				
				<td valign="top">
					<div  class="form-row">
						<?php if(isset($alertId)): ?>
						<?php include_component('alert','collaborators',array('collaboratorId'=>$collaboratorId));?>
						<?php else: ?>
						<?php include_component('alert','collaborators');?>
						<?php endif ?>
					</div>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<label for="triggerDate">Déclenchement&nbsp;le&nbsp;:</label>
				</td>
				<td valign="top">
					<div  class="form-row">
						<?php echo form_error('triggerDate') ?>    
						<?php echo surface_input_date_tag('triggerDate',isset($triggerDate)?$triggerDate:$sf_params->get('triggerDate'),array('rich' => true, 'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png'));?>
					</div>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<label for="message">Message :</label>
				</td>
				<td valign="top" >
					<div id="message" class="form-row">
						<?php echo form_error('message') ?> 
						<?php echo surface_textarea_tag('message',isset($message)?$message:$sf_params->get('message'),array('cols'=>35, 'rows' => 3)); ?>
					</div>
				</td>  
			</tr>
			<tr>
				<td colspan="2" >
		 			<?php echo surface_input_hidden_tag('referenceDate',isset($referenceDate)?$referenceDate:$sf_params->get('referenceDate')); ?>
			        <?php echo surface_input_hidden_tag('modelId',isset($modelId)?$modelId:$sf_params->get('modelId')); ?>
			        <?php echo surface_input_hidden_tag('modelClass',isset($modelClass)?$modelClass:$sf_params->get('modelClass')); ?>
			        <?php echo surface_input_hidden_tag('objectUrl',isset($objectUrl)?$objectUrl:$sf_params->get('objectUrl')); ?>
			        <?php echo surface_input_hidden_tag('alertId',isset($alertId)?$alertId:$sf_params->get('alertId')); ?>
				<?php echo surface_input_hidden_tag('model', $sf_params->get('model', null)) ?>
				<?php echo surface_submit_tag(isset($submittButtonText)?$submittButtonText:'Enregistrer', array('class' => 'sf_admin_action_save')) ?>
				</td>
			</tr>
		<table> 
	</form>
</div>

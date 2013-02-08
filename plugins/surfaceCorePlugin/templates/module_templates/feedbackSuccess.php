<div class="general_form">
    <h3>Support technique</h3>
    
    <?php if (isset($api_response) && isset($api_response['type']) && $api_response['type'] == 'post') : ?>
	Merci.<br/><br/>
	Votre demande a été enregistrée dans le ticket n° <?php echo $api_response['datas']['ticket_id'] ?>.
    <?php else: ?>
		<?php if (isset($api_response) && isset($api_response['type']) && $api_response['type'] == 'error') : ?>
			Une erreur est survenue :<br/><br/>
			<?php echo $api_response['message'] ?>.
		<?php endif; ?>
		<?php echo surface_form_to("/default/feedback", 'tg_lightbox') ?>
			<?php
			echo surface_input_hidden_tag('ticket[link]', $link);
			echo surface_input_hidden_tag('ticket[username]', $user);
			?>
			<fieldset>
				<div class="row nolabel">
					<p class="italic_grey" style="margin-top:10px">Vous pouvez faire une suggestion d'amélioration ou déclarer un incident.<br/>Dès la prise en charge de votre ticket, vous serez averti par email.<br/>Merci de votre contribution.</p>
				</div>
				<h3>Nouveau ticket</h3>

				<div class="row">
					<?php echo label_for('ticket[email]', 'Votre email :') ?>
					<div class="input_wrapper">
				<?php echo surface_input_tag('ticket[email]', $email); ?>
					</div>
				</div>
				<div class="row">
					<?php echo label_for('ticket[type]', 'Catégorie :') ?>
					<div class="input_wrapper">
						<?php echo surface_radiobutton_group_with_label_tag('ticket[type]', array('demande' => 'Suggestion', 'incident' => 'Incident'), 'demande') ?>
					</div>
				</div>
				<div class="row">
					<?php echo label_for('ticket[title]', 'Titre :') ?>
					<div class="input_wrapper">
						<?php echo surface_input_tag('ticket[title]') ?>
					</div>
				</div>
				<div class="row">
					<?php echo label_for('ticket[content]', 'Description :') ?>
					<div class="input_wrapper">
						<?php echo surface_textarea_tag('ticket[content]', '', array('size'=>'25x10')) ?>
					</div>
				</div>
				<div class="row">
					<?php echo label_for('ticket[urgent]', 'Urgent :') ?>
					<div class="input_wrapper">
						<?php echo surface_checkbox_tag('ticket[urgent]', '1') ?> <label for="ticket_urgent">Votre demande sera traitée en priorité</label>
					</div>
				</div>
			</fieldset>
			<div class="action_wrapper">
				<ul>
					<li><span class="button"><input type="submit" name="save" value="Envoyer" class="sf_admin_action_save" /></span></li>
					<li><span class="button"><a class="sf_admin_action_cancel" href="#" onclick="surface.link_to('default/blank','tg_lightbox', {});return false;">Annuler</a></span></li>
				</ul>
			</div>
		</form>
		<div class="clear"></div>
    <?php endif; ?>

</div>

<div class="title_wrapper">
	<h2>
		<img src="/<?php echo sfConfig::get('app_surface_theme_library', 'sfcThemePlugin') ?>/common/icons/doc_pdf.png" alt="pdf"/>
		<?php echo $this->getInterpretedString(get('selectable_title', $export_params, get('title', $export_params)), true, true) ?>
	</h2>
</div>
[?php echo form_tag('<?php echo $this->getModuleName() ?>/exportList<?php echo sfInflector::camelize($export_name) ?>', array('class' => 'general_form', 'name' => 'sf_admin_edit_form')) ?]
	<fieldset id="sf_fieldset_<?php echo get('target', $export_params, 'tg_east') ?>_none" class="">
		<div class="forms">
			<?php if(get('selectable_format', $export_params, true)) : ?>
			<div class="row">
				[?php echo surface_label_for('format', 'Format de sortie : ') ?]
				<div class="input_wrapper">
				[?php
					echo surface_radiobutton_tag('format', 'A4', <?php echo (get('format', $export_params) == 'A4' || get('format', $export_params) == null) ? 'true' : 'false' ?>);
					echo surface_label_for('format_A4', ' A4 ');
					echo surface_radiobutton_tag('format', 'A3', <?php echo get('format', $export_params) == 'A3' ? 'true' : 'false' ?>);
					echo surface_label_for('format_A3', ' A3 ');
				?]
				</div>
			</div>
			<?php endif ?>
			<?php if(get('selectable_sens', $export_params, true)) : ?>
			<div class="row">
				[?php echo surface_label_for('sens', 'Orientation : ') ?]
				<div class="input_wrapper">
					[?php
						echo surface_radiobutton_tag('sens', 'P', <?php echo (get('sens', $export_params) == 'P' || get('sens', $export_params) == null) ? 'true' : 'false' ?>);
						echo surface_label_for('sens_P', ' Portrait ');
						echo surface_radiobutton_tag('sens', 'L', <?php echo get('sens', $export_params) == 'L' ? 'true' : 'false' ?>);
						echo surface_label_for('sens_L', ' Paysage ');
					?]
				</div>
			</div>
			<?php endif ?>
			<div class="row">
				[?php echo surface_label_for('columns', 'Colonnes : ') ?]
				<div class="input_wrapper">
					<ul class="export_selectable_fields">
						<?php foreach($this->getColumns('list.exports._' . $export_name . '.display') as $column) : ?>
							<?php $params = sfToolkit::stringToArray($this->getParameterValue('list.fields.' . $column->getName() . '.export_params')) ?>
							<li style="width: 100%;">
								[?php echo surface_checkbox_with_label('selected[]', '<?php echo $column->getName() ?>', <?php echo $column->isExportSelected() ? 'true' : 'false' ?>, <?php echo $this->getI18NString('list.fields.'.$column->getName().'.name', $column->getName(), null, false) ?>, array('label_name' => 'selected_<?php echo $column->getName() ?>')) ?]
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</fieldset>
	<ul class="system_messages">
		<li class="white"></li>
	</ul>
	<div class="action_wrapper">
		[?php echo surface_submit_tag('Exporter', array('class' => 'sf_admin_export_list_ export sf_admin_export_pdf')) ?]
	</div>
</form>

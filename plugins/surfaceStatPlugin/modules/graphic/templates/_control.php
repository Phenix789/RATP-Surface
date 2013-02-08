<?php use_helper('SControl') ?>

<div id="stat_controls">
	<?php if($view) : ?>
		<?php echo form_to_target('graphic/refresh', 'graphic', false, array(), array('class'=>'search_form general_form'));?>
		
		<?php echo input_hidden_tag('view', $view->getId()) ?>
		
		<h3><a href="#stats_controls_filter" class="gexpander">Filtres</a></h3>
		<div id="stats_controls_filter">
			<fieldset>
				<div class="forms">
					<?php foreach($filters as $filter) : ?>
						<?php echo control($filter, $filter->getName(), $options) ?>
					<?php endforeach ?>
					<?php echo input_hidden_tag('export_hidden', 0) ?>
				</div>
			</fieldset>
<!-- risque d'incompatibilité avec certain navigateur -->
			<div class="action_wrapper action_wrapper_filters">
				<ul>
					<li><?php echo surface_submit_tag('Afficher', array('name' => 'view_graphic', 'class' => 'button_apply_filter', 'onmouseover' => "$('export_hidden').value = 0;")) ?></li>
				</ul>
			</div>
		</div>
		<br style="clear: both;">
		</form>
	<?php endif ?>
</div>
<?php echo javascript_tag("gWidget_InitPane('tg_center');");?>
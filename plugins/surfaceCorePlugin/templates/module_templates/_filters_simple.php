<?php
echo surface_form_to($module_name.'/list', $filters_target, array('script' => true), array('method' => 'get', 'class' => 'search_form general_form'));
echo input_hidden_tag('target', $target);
?>
<fieldset>
	<div class="forms">
		<div class="row">
			<label for="filters_simple">Recherche rapide:</label>
			<div class="input_wrapper">
				<?php echo surface_input_tag('filters[simple]', get('simple', $filters)) ?>
			</div>
		</div>
	</div>
</fieldset>


<fieldset id="simple_filters_button">
	<?php include_partial($module_name.'/filters_actions', array('submit_value' => 'filter_simple')) ?>
</fieldset>
<br style="clear: both;" />

</form>
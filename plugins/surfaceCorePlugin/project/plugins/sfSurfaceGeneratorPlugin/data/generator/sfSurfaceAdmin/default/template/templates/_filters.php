<?php
$filters = (bool)$this->getParameterValue('list.filters', false);
$filters_simple = (bool)$this->getParameterValue('list.filters_simple', false);
?>
<?php if ($filters || $filters_simple) : ?>
	<?php if ($filters_simple) : ?>
		[?php include_partial('<?php echo $this->getModuleName() ?>/filters_simple', getCurrentViewParameters()) ?]
		
		&nbsp;&nbsp;Autres critères : <a href="#" onclick="$('filters_togglable').show()">(+)</a>
		&nbsp;&nbsp;<a href="#" onclick="$('filters_togglable').hide()">(-)</a>
		<div id="filters_togglable" style="display:none">
	<?php endif ?>
	<?php if ($filters) : ?>
		[?php include_partial('<?php echo $this->getModuleName() ?>/filters_form', getCurrentViewParameters()) ?]
	<?php endif ?>
	<?php if ($filters_simple) : ?>
		</div>
	<?php endif ?>
<?php endif; ?>

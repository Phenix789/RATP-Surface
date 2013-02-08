<?php foreach($this->getColumns('list.exports._' . $export_name . '.display') as $column) : ?>
<?php $params = sfToolkit::stringToArray($this->getParameterValue('list.fields.' . $column->getName() . '.export_params')) ?>
<?php if(get('selectable', $export_params)) : ?>[?php if(get(array('<?php echo $column->getName() ?>', 'selected'), $columns)) : ?]<?php endif ?>
<th class="<?php echo trim(strtolower($column->getCreoleAffix()) . ' ' . get('class', $params)) ?>">
	<?php echo $this->getI18NString('list.fields.'.$column->getName().'.name', $column->getName()) ?>
</th>
<?php if(get('selectable', $export_params)) : ?>[?php endif ?]<?php endif ?>
<?php endforeach ?>
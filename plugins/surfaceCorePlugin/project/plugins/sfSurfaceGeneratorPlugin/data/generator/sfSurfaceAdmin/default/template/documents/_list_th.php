<?php foreach ($this->getColumns('list.exports.default.display') as $column): ?>
<TH>
    [?php echo __("<?php echo $this->getParameterValue('list.exports.default.fields.'.$column->getName().'.name') ?>") ?]
</TH>
<?php endforeach ?>	
<?php foreach ($this->getColumns('list.exports.default.display') as $column): ?>
<TD>
    [?php echo <?php echo $this->getColumnListTag($column) ?> ?]
</TD>
<?php endforeach ?>	

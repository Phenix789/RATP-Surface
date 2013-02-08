<td colspan="<?php echo count($this->getColumns($component_generator_key . '.display')) ?>">
	<?php if($this->getParameterValue($component_generator_key . '.params')) : ?>
		<?php echo $this->getI18NString($component_generator_key . '.params') ?>
	<?php else : ?>
		<?php $hides = $this->getParameterValue($component_generator_key . '.hide', array()) ?>
		<?php foreach($this->getColumns($component_generator_key . '.display') as $column) : ?>
			<?php if(in_array($column->getName(), $hides)) continue ?>
			<?php if($column->isLink()) : ?>
				[?php echo link_to(<?php echo $this->getColumnListTag($column) ?> ? <?php echo $this->getColumnListTag($column) ?> : __('-'), '<?php echo $this->getModuleName() ?>/<?php echo $this->getParameterValue($component_generator_key . '.click_action', 'edit') ?>?<?php echo $this->getPrimaryKeyUrlParams() ?>) ?]
			<?php else : ?>
				[?php echo <?php echo $this->getColumnListTag($column) ?> ?]
			<?php endif ?>
			- 
		<?php endforeach ?>
	<?php endif ?>
</td>
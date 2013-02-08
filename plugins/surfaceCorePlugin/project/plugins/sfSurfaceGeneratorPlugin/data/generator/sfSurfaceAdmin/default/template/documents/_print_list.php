<?php $repeat = get('repeat_label', $export_params, false) ?>
<?php $backmarge = get('backmarge', $export_params, sfConfig::get('app_print_list_default_backmarge')) ?>
<style>
	<?php if(get('selectable', $export_params)) : ?>
		[?php
		$style = array();
		$weights = 0;
		$selected = 0;
		foreach($columns as $column => $params) {
			if(get('selected', $params)) {
				$weight = get('weight', $params);
				$weights += $weight;
				$style[$column] = $weight;
				$selected++;
			}
		}
		foreach($style as $name => $weight) {
			$style[$name] = round(100 / $weights * $weight);
		}
		arsort($style);
		$diff = array_sum($style) - 100;
		$inc = $diff < 0 ? -1 : 1;
		reset($style);
		while($diff != 0) {
			$elem = each($style);
			$style[$elem['key']] -= $inc;
			$diff = $diff - $inc;
		}
		foreach($style as $class => $width) {
			echo '.' . $class . ' { width: ' . (int)$width . '% }';
		}
		?]
	<?php else : ?>
	<?php foreach($this->getExportStyleWeight($export_name, 'list') as $name => $weight) : ?>
	td.<?php echo $name ?> {
		width: <?php echo $weight ?>%;
	}
	<?php endforeach ?>
	<?php endif ?>
	#export_table { border-bottom: solid 1px #999; border-right: solid 1px #999; }
	#export_table td { padding: 1px; border-top: solid 1px #999; border-left:solid 1px #999;}
	#export_table th { padding: 1px; text-align: center; background-color: #ccc; border-top: solid 1px #999; border-left: solid 1px #999; }
	/*.even { background-color: #eee; }*/
</style>
[?php include_document_partial('<?php echo sprintf(get('style', $export_params, sfConfig::get('app_print_list_default_style', 'print_list_style_%s')), $export_name) ?>') ?]
<?php if(get('firstpaper', $export_params, false)) : ?>
[?php include_document_partial('print_list_firstpaper_<?php echo $export_name ?>', array('<?php echo $this->getPluralName() ?>' => $<?php echo $this->getPluralName() ?>)) ?]
<?php endif ?>
<?php if(get('open_page', $export_params, true)) : ?>
<page backtop="<?php echo get(0, $backmarge, 14) ?>mm"
      backright="<?php echo get(1, $backmarge, 8) ?>mm"
      backbottom="<?php echo get(2, $backmarge, 14) ?>mm"
      backleft="<?php echo get(3, $backmarge, 8) ?>mm">
<?php endif ?>
	[?php include_document_partial('<?php echo sprintf(get('page_header', $export_params, sfConfig::get('app_print_list_default_page_header', 'print_list_header_%s')), $export_name) ?>'); ?]
	[?php include_document_partial('<?php echo sprintf(get('page_footer', $export_params, sfConfig::get('app_print_list_default_page_footer', 'print_list_footer_%s')), $export_name) ?>'); ?]
	[?php $header = get_document_partial('print_list_label_<?php echo $export_name ?>'<?php if(get('selectable', $export_params, false)) : ?>, array('columns' => $columns)<?php endif ?>) ?]
	<table style="width: 100%;" id="export_table">
		<?php if(!$repeat) : ?>
		<tr class="header">
			[?php echo $header ?]
		</tr>
		<?php endif ?>
		[?php $count = 0 ?]
		[?php foreach($<?php echo $this->getPluralName() ?> as $<?php echo $this->getSingularName() ?>) : ?>
		<?php if($repeat) : ?>
		[?php if($count % <?php echo $repeat ?> == 0) : ?]
		<tr class="header">
			[?php echo $header ?]
		</tr>
		[?php endif ?]
		<?php endif ?>
		<tr class="[?php echo $count % 2 ? 'odd' : 'even' ?]">
			<?php foreach($this->getColumns('list.exports._' . $export_name . '.display') as $column) : ?>
				<?php $params = sfToolkit::stringToArray($this->getParameterValue('list.fields.' . $column->getName() . '.export_params')) ?>
				<?php if(get('selectable', $export_params, false)) : ?>[?php if(get(array('<?php echo $column->getName() ?>', 'selected'), $columns)) : ?]<?php endif ?>
				<td class="<?php echo trim(strtolower($column->getCreoleAffix()) . ' ' . $column->getName() . ' ' . get('class', $params)) ?>">
					[?php $object = $$singular_name ?]
					[?php echo trim(<?php echo $this->getColumnExportListTag($column) ?>) ?]
				</td>
				<?php if(get('selectable', $export_params, false)) : ?>[?php endif ?]<?php endif ?>
			<?php endforeach ?>
		</tr>
		[?php $count++ ?]
		[?php endforeach ?]
	</table>
<?php if(get('close_page', $export_params, true)) : ?>
</page>
<?php endif ?>
<?php if(get('endpaper', $export_params, false)) : ?>
[?php include_document_partial('print_list_endpaper_<?php echo $export_name ?>', array('<?php echo $this->getPluralName() ?>' => $<?php echo $this->getPluralName() ?>)) ?]
<?php endif ?>
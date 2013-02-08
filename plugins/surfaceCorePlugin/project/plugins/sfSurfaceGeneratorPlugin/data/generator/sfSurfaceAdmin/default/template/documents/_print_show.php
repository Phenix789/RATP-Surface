<?php $backmarge = get('backmarge', $export_params, sfConfig::get('app_print_show_default_backmarge')) ?>
<style>
	#export_table h1 { font-size: 10pt; color: #1F476F; margin-bottom: 1mm; }
	#export_table th { color: #666; }
	#export_table hr { color: #ccc; margin: 0; width: 100%; height: 0,2mm; }
</style>
[?php include_document_partial('<?php echo sprintf(get('style', $export_params, sfConfig::get('app_print_show_default_style', 'print_show_style_%s')), $export_name) ?>') ?]
<?php if(get('firstpaper', $export_params, false)) : ?>
[?php include_document_partial('print_show_firstpaper_<?php echo $export_name ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
<?php endif ?>
<?php if(get('open_page', $export_params, true)) : ?>
<page backtop="<?php echo get(0, $backmarge, 14) ?>mm"
      backright="<?php echo get(1, $backmarge, 8) ?>mm"
      backbottom="<?php echo get(2, $backmarge, 14) ?>mm"
      backleft="<?php echo get(3, $backmarge, 8) ?>mm">
<?php endif ?>
	[?php include_document_partial('<?php echo sprintf(get('page_header', $export_params, sfConfig::get('app_print_show_default_header', 'print_show_header_%s')), $export_name) ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
	[?php include_document_partial('<?php echo sprintf(get('page_footer', $export_params, sfConfig::get('app_print_show_default_footer', 'print_show_footer_%s')), $export_name) ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
	<br/>
	<table style="width: 100%;" id="export_table">
		<?php $categories = $this->getColumnCategories('show', 'exports._' . $export_name . '.display') ?>
		<?php foreach($categories as $category_name => $category_data) : ?>
			<?php if(($name = get('name', $category_data)) != 'NONE') : ?>
			<tr>
				<th colspan="2" class="header">
                        <h1>[?php echo __("<?php echo get('name', $category_data) ?>") ?]</h1>
				</th>
			</tr>
			<?php endif ?>
			<?php foreach($this->getColumns('show.exports._' . $export_name . '.display', $category_name) as $column) : ?>
			<?php $params = sfToolkit::stringToArray($this->getParameterValue('show.fields.' . $column->getName() . '.export_params')) ?>
			<?php $class = trim(strtolower($column->getCreoleAffix()) . ' ' . $column->getName() . ' ' . get('class', $params)) ?>
			<tr>
				<?php $label = get('label', $params, true) ?>
				<?php if($label) : ?>
				<th class="<?php echo $class ?>">
					[?php echo __("<?php echo $this->getParameterValue('show.fields.'.$column->getName().'.name') ?>") ?] :
				</th>
				<?php endif ?>
				<td class="<?php echo $class ?>" <?php if(!$label) : ?>colspan="2"<?php endif ?>>
					[?php echo <?php echo $this->getColumnExportShowTag($column) ?> ?]
				</td>
			</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</table>
<?php if(get('close_page', $export_params, true)) : ?>
</page>
<?php endif ?>
<?php if(get('endpaper', $export_params, false)) : ?>
[?php include_document_partial('print_show_endpaper_<?php echo $export_name ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
<?php endif ?>
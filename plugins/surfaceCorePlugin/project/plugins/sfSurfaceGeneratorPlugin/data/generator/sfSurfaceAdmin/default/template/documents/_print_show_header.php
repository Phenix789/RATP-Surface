<style>
	.page_header { border-bottom: solid 1px #999; width: 100%; color: #333; font-size: 10pt; font-weight: bold; padding-top: 5mm; }
	.page_header a { color: #333; }
	.center_header { width: 50%; text-align: center; font-weight: normal; color: #5D616B; font-size: 12pt; }
	.left_header { width: 25%; text-align: left; padding-left: 5mm; font-size: 7pt; }
	.right_header{ width: 25%; text-align: right; padding-right: 5mm; font-size: 7pt; }
</style>
<page_header>
	<table class="page_header">
		<tr>
			<td class="header left_header">
				[?php echo sfConfig::get('app_print_show_left_header') ?]
			</td>
			<td class="header center_header">
				<?php echo $this->getInterpretedString(get('title', $export_params)) ?>
			</td>
			<td class="header right_header">
				[?php echo sfConfig::get('app_print_show_right_header') ?]
			</td>
		</tr>
	</table>
</page_header>
<style>
	.page_header { width: 100%; color: #333; font-size: 10pt; font-weight: bold; padding-top: 5mm; }
	.page_header a { color: #333; }
	.center_header { width: 50%; text-align: center; }
	.left_header { width: 25%; text-align: left; padding-left: 5mm; font-size: 7pt; }
	.right_header{ width: 25%; text-align: right; padding-right: 5mm; font-size: 7pt; }
</style>
<page_header>
	<table class="page_header">
		<tr>
			<td class="header left_header">
				[?php echo sfConfig::get('app_print_list_left_header') ?]
			</td>
			<td class="header center_header">
				<?php echo $this->getInterpretedString(get('title', $export_params), true, true) ?>
			</td>
			<td class="header right_header">
				[?php echo sfConfig::get('app_print_list_right_header') ?]
			</td>
		</tr>
	</table>
</page_header>
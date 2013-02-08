<table class="slots">
	<tr>
		<?php foreach($categories as $category) : ?>
		<td>
			<?php include_slot($category) ?>
		</td>
		<?php endforeach ?>
	</tr>
</table>


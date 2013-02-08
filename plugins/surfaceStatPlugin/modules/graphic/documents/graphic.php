<?php use_helper('SRender') ?>
<html>
	<body>
		<table>
			<thead><?php echo table_line_render($g_view->getNextLine()) ?></thead>
			<tbody>
				<?php while($line = $g_view->getNextLine()) : ?>
					<?php echo table_line_render($line) ?>
				<?php endwhile ?>
			</tbody>
		</table>
	</body>
</html>
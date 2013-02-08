<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<link rel="shortcut icon" href="/images/favicon.ico" />
		<?php
		include_http_metas();
		include_metas();
		include_title();
		surface_layout_header(SURFACE_LOADCTRL_CALENDAR | SURFACE_LOADCTRL_TINYMCE | SURFACE_LOADCTRL_COLORPICKER);
		use_theme();
		?>
	</head>
	<body class="printable">
		<div id="tg_east"><?php echo $sf_data->getRaw('sf_content') ?></div>
		<div id="tg_center"></div>
	</body>
</html>
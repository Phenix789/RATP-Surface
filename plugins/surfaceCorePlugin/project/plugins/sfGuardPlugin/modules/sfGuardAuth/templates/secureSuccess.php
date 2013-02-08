<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SURFACE - ERREUR403</title>
<link rel="stylesheet" type="text/css" href="/<?php echo sfConfig::get('app_surface_theme_library', 'sfcThemePlugin') ?>/common/css/error.css" />
</head>
<body class="error_body" style="background-color:#89acd6">
	<div class="error_wrapper">
		<div class="logo_error"></div>
		<div class="error_box">
			<h3>Accès non autorisé<br/>Votre identifiant : <?php echo $sf_user->getUserName()?></h3>
		</div>
	</div>
</body>
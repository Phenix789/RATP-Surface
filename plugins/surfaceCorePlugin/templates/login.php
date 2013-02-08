<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="shortcut icon" href="/images/favicon.ico" />
		<title><?php echo sfContext::getInstance()->getResponse()->getTitle() ?> - <?php echo __('Connexion') ?></title>
		<?php
		include_http_metas();
		include_metas();
		use_helper('Theme');
		use_theme_login();
		?>
		<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="/dashboard/css/ie-login.css" /><![endif]-->
	</head>

	<body>
		<div id="wrapper">
			<div id="login_header"></div>
			<div class="login_sub_header"></div>
			<div id="content">
				<div id="login_wrapper">
					<div id="logo_login"></div>
					<div class="login_box">
						<h3 id="login_title">Bienvenue, veuillez vous connecter :</h3>
					</div>
					<?php echo $sf_data->getRaw('sf_content') ?>
				</div>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Erreur du système</title>
<link rel="stylesheet" type="text/css" href="/sfcThemePlugin/common/error.css" />
</head>
<body class="error_body">
	<div class="error_wrapper">
		<div class="logo_error_s"></div>
		<div class="error_box">
			Une erreur système s'est produite. <br/>
			<small>Nos techniciens ont été prévenus, veuillez nous excuser pour la gêne occasionnée</small>.
		</div>
	</div>
</body>
<?php
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$content = "";
	$content .= '<a href="'.$url.'">'.$url.'</a><br/>';
	$content .= isset($exception) && method_exists($exception, 'getMessage') ? $exception->getMessage() : '';
	$content .= "<HR>";
	$content .= "<h2>SERVER</h2>";
	$content .= "<table border=\"1\">";
		
	foreach ($_SERVER as $key => $value) {
		$content .= "<tr><td>" . $key . "</td><td>" . $value ."</td></tr>";
	}
	
	$content .= "</table>";

	$content .= "<h2>GET</h2>";
	$content .= "<table border=\"1\">";
	
	foreach ($_GET as $key => $value) {
		$content .= "<tr><td>" . $key . "</td><td>" . print_r($value, true) ."</td></tr>";
	}
	$content .= "</table>";
	$content .= "<h2>POST</h2>";
	$content .= "<table border=\"1\">";
	
	foreach ($_POST as $key => $value) {
		$content .= "<tr><td>" . $key . "</td><td>" . print_r($value, true) ."</td></tr>";
	}
	$content .= "</table>";
	
	if(isset($exception) && method_exists($exception, 'getMessage') && method_exists($exception, 'getTraceAsString')) {
		$content .= '<hr/>';
		$content .= '<h2>TRACE</h2><br/>';
		$content .= $exception->getMessage();
		$content .= '<br/>';
		$content .= nl2br($exception->getTraceAsString());
	}

	$head  = "From:alerte@".$_SERVER['SERVER_NAME']."\n";
	$head .= "MIME-version: 1.0\n";
	$head .= "Content-type: text/html; charset= iso-8859-1\n";
	
	mail("ERROR500-projet@elogys.fr", "[ERREUR500] " . $_SERVER['SERVER_NAME'], $content, $head);
?>
<?php

pake_desc('Insert un fichier sql et releve les potentiels erreurs.');
pake_task('surface-insert-sql-file', 'project_exists');

function run_surface_insert_sql_file($task, $args) {
	$app = pake_surface_get_argument(0, $args, null, true, 'Vous devez spécifiez une application.');
	$file = pake_surface_get_argument(1, $args, null, true, 'Vous devez spécifiez un fichier.');

	pake_surface_initialize($app);

	$con = Propel::getConnection();
	$inserts = file(realpath($file));
	$line = 1;
	$executed = 0;
	$message = '%s/%s ligne executées';
	$show = 1000;
	$errors = array();

	pake_echo_action('Insert', 'Insertion du fichier sql...');
	foreach($inserts as $insert) {
		if(strpos($insert, 'INSERT') !== false) {
			$executed++;
			try {
				$con->execute($insert);
			}
			catch(Exception $e) {
				pake_echo_action('Error', 'Erreur a la ligne ' . $line);
				$message = $e->getMessage();
				pake_echo($message);
				$errors[] = $message . '  ##  ' . $insert;
			}
		}
		$line++;
		if(0 == $line % $show) {
			pake_echo_comment(sprintf($message, $executed, $line));
		}
	}
	pake_echo_comment(sprintf($message, $executed, $line));

	$filename = 'error_insert_' . basename($file) . '.txt';
	pake_surface_write_in_file($filename, array_unshift($errors, 'Lignes ayant provoqués une erreur : '));
}
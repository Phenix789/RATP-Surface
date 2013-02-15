<?php
	$con = oci_connect("hr", "hr", "192.168.100.125/orcl");
	$stmt = oci_parse($con, "SELECT table_name FROM user_tables");
	$rows = oci_execute($stmt);
	$rows = array();
	$count = oci_fetch_all($stmt, $rows);
	foreach ($rows as $line) {
		echo implode(", ", $line) . "\n";
	}
	oci_free_statement($stmt);
	oci_close($con);
	sleep(1);
?>
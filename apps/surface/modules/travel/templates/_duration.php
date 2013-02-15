<?php 
	$duration = $travel->getDuration();
	$hour = (int) ($duration / 3600);
	$min = (int) ($duration % 3600 / 60);
	if ($hour > 0) {
		echo sprintf("%dh %02dmin", $hour, $min);
	}
	else {
		echo sprintf("%02dmin", $min);
	}
?>
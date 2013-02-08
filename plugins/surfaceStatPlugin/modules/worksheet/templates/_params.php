<?php
	$first = $worksheet->getFirstParamName();
	$second = $worksheet->getSecondParamName();

	echo $first;
	echo '<br/>';
	echo $second ? $second : ' -- ';
?>
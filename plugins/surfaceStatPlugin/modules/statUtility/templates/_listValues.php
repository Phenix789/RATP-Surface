<?php
	$i = 1;
	foreach($list as $item) {
		//echo $i . '. ';
		if (is_array($item)) {
			echo surface_link_to($item['name'], $item['url'], 'tg_east');
		} else {
			echo $item;	
		}
		//echo '<br>';		
		$i++;
	}
?>
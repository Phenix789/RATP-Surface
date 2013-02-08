<?php
	if($stat = $cart->getStatistic()) {
		$html = array();
		foreach($stat as $name => $count) {
			$html[] = $count . ' ' . cart_get_name($name, $count > 1);
		}
		echo implode(', ', $html);
	}
	else {
		echo surface_null_value(__('no item'));
	}
?>
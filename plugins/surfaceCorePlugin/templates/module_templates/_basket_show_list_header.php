<?php

if ($basket && $basket->isOpened()) {
	$module_from = $basket->getInfo('module_from');
	$module_from = ($module_from) ? $module_from : $module_name;
	echo "<h4>Sélectionnez dans la liste les éléments à associer ou " . surface_basket_cancel_link(__('cancel'), $basket->getKey(), $module_from, '', false) . "</h4>";
}
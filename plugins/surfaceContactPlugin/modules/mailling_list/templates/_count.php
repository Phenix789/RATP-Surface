<?php
	if($mailling_list->count()) {
		echo $mailling_list->count() . ' contacts';
	}
	else {
		echo surface_null_value('Aucun contact.');
	}
?>
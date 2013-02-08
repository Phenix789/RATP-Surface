<?php

$history = $object->getLastHistory();
if ($history) {
	$link = $object->getLinkTo()
			->setHTMLOption('title', 'Voir les évènements')
			->setContent(__($history->getType()) . ' ' . $history->getDateRef('d/m/Y'));
	$link->getUrl()->setQueryParameter('active_tab', 'vtab_tg_east_historique');
	echo $link;
	echo SfcUtils::summarize($history->getDescription(), 80);
} else {
	echo surface_null_value('Aucun événement.');
}

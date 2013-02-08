<?php
if($history->getObject()){
	echo $history->getObject()->getLinkTo()->setContent("{$history->getObject()} ({$history->getObjectMetadata('name')})");
} else {
	echo $history->getLinkTo()->setContent("Objet manquant : {$history->getObjectName()} : {$history->getObjectId()}");
}

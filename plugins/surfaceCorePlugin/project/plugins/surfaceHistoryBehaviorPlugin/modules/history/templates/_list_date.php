<?php
$config = _history_get_config($history->getObjectName());
$date = get('date', $config, array());
$withtime = get('withtime', $date, false);
$format = $withtime ? 'd/m/Y H:i' : 'd/m/Y';
echo $history->getDateRef($format);

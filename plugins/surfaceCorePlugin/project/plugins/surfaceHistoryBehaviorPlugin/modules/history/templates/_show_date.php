<?php
$config = _history_get_config($history->getObjectName());
$date = get('date', $config, array());
$withtime = get('withtime', $date, false);
$format = $withtime ? 'f' : 'D';
echo format_date($history->getDateRef(null), $format);

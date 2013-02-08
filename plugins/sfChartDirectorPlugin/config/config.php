<?php

$sf_plugin_chart_director       = 'sfChartDirectorPlugin';
$sf_chartdirector_dir = sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.$sf_plugin_chart_director.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR. 'ChartDirector/';

sfConfig::set('sf_chartdirector_dir', $sf_chartdirector_dir);


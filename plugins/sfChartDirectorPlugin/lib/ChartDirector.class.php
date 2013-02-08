<?php

require_once sfConfig::get('sf_chartdirector_dir').'/phpchartdir.php';

class ChartDirector extends XYChart {
  public function plot() {
    return $this->makeChart2(PNG);
  }
}

?>
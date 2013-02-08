<?php

class GraphDynamics extends ChartDirector {
  private $sdate;
  private $edate;
  private $series = array();
  private $layer;

  function __construct($title = '', $sdate, $edate) {
    parent::__construct(300, 210, 0xffffc0, 0x000000);

    $plotAreaObj = $this->setPlotArea(60, 30, 230, 100); 
    $plotAreaObj->setBackground(0xffffff);

    $legendObj = $this->addLegend(50, 140, false, "", 8); 
    $legendObj->setBackground(Transparent); 

    $this->sdate= $sdate;
    $this->edate= $edate;

    if ($sdate || $edate) {
      $title .= ' [';
      $title .= ($sdate) ? $sdate : '...';
      $title .= ' - ';
      $title .= ($edate) ? $edate : '...';
      $title .= ']';
    }
    $textBoxObj = $this->addTitle($title, "arialbd.ttf", 8); 
    $textBoxObj->setBackground(0xffff40, 0); 

    $this->yAxis->setLabelFormat("US\${value}"); 

    $this->xAxis->setLabelStep(20); 

    $this->layer = $this->addAreaLayer2(Stack); 
  }

  function addSeries($start, $changes, $color, $title) {
    $this->series[] = array('start' => $start, 'changes' => $changes,
                            'color' => $color, 'title' => $title);
  }

  function plot() { 
    $labels = array();

    if ($this->sdate)
      $labels[$this->sdate] = $this->sdate;
    if ($this->edate)
      $labels[$this->edate] = $this->edate;

    if ($this->series) foreach($this->series as $s) 
      if ($s['changes']) foreach($s['changes'] as $row) {
        $t = date('Y-m-d', strtotime($row['date']));
        $labels[$t] = $t;
      }
    sort($labels);
    $this->xAxis->setLabels($labels); 

    foreach($this->series as $s) {
      $data = array();
      foreach($labels as $l)
        $data[$l] = $s['start'];

      foreach($s['changes'] as $c) 
        foreach($labels as $l) 
          if (strtotime($c['date']) <= strtotime($l)) 
            $data[$l] += $c['amount'];

      $dat = array();
      foreach($data as $d)
        $dat[] = $d;

      $this->layer->addDataSet($dat, $s['color'], $s['title']); 
    }

    return parent::plot(PNG);
  }
}
?>
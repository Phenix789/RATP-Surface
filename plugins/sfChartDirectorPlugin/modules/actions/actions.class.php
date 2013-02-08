<?php

/**
 * page actions.
 *
 * @package    ChartDirector sample
 * @subpackage page
 * @author     Voznyak Nazar: vozyaknazar@gmailc.com
 * @version    2007-03-27 08:33:51Z narko $
 */
class chartActions extends myActions
{
  public function executeHLOCdata() {
    $data = array(2, 3, 4, 10, 3, 4);
    $labels = array();
    $highData = array();
    $lowData = array();
    $openData = array();
    $closeData = array();
    if ($data) foreach($data as $d => $dat) {
      $labels[] = $d;
      $highData[] = $dat['high'];
      $lowData[] = $dat['low'];
      $openData[] = $dat['open'];
      $closeData[] = $dat['close'];
    }

    $g = new ChartDirectorXY(600, 350);

    $plotAreaObj = $g->setPlotArea(50, 25, 500, 250); 
    $plotAreaObj->setGridColor(0xc0c0c0, 0xc0c0c0);

    $g->addTitle("My Chart");

    $g->addText(50, 25, "http://NarkozaTeam.com", "arialbd.ttf", 12, 0x4040c0); 
  
    $labelsObj = $g->xAxis->setLabels($labels); 
    $labelsObj->setFontAngle(45);

    $g->yAxis->setTitle("Y-Data");
    $g->setYAxisOnRight(true);

    $layer = $g->addHLOCLayer3($highData, $lowData, $openData, $closeData, 
             0x008000, 0xff0000);
    $layer->setLineWidth(2);

    header("Content-type: image/png");
    print($g->plot());
    die();
  }
}

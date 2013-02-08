<?php
/**
 *
 *
 */
class graphicActions extends sfSurfaceActions {

	public function executeRefresh() {
		
	}

	public function executeIndex() {
		
	}

	public function executeViewGraphic() {

	}

	public function executeExportToFile() {
		$ouputType = 'pdf';

		$this->g_view = ViewPeer::retrieveByPK(3);
		$this->g_view->execute();
		$this->g_view->prepareRender();

		return sfOpenOfficeDocument::render($this, 'graphic.php', $ouputType);
	
	}

	public function executeExport() {
		$view_id = $this->getUser()->getAttribute('stat/view');
		$this->g_view = ViewPeer::retrieveByPK($view_id);
		if($this->g_view) {
			$this->g_view->setFiltersValues($this->getUser()->getAttribute('stat/filters', array()));
			$this->g_view->execute();
			$this->g_view->prepareRender();
			$link = $this->g_view->renderToExport();
			if($link) {
				$handle = new upload(sfConfig::get('sf_web_dir') . sfConfig::get('app_surface_stat_cache_dir') . $link);
				header('Content-type: ' . $handle->file_src_mime);
				header("Content-Disposition: attachment; filename=graphic.png;");
				echo $handle->Process();
				die();
			}
			else {
				$handle = new upload($this->resultats_csv());
				header('Content-type: ' . $handle->file_src_mime);
				header("Content-Disposition: attachment; filename=export.csv;");
				echo $handle->Process();
				die();
				//return sfOpenOfficeDocument::render($this, 'graphic.php', 'doc');
				//return sfOpenOfficeDocument::render($this, 'export.ods', 'xls');
			}
		}
		return sfView::NONE;
	}


  public function resultats_csv()
  {
	// Compatibilité template	
	$g_view = $this->g_view;

	$file_path = sfConfig::get('sf_web_dir') . sfConfig::get('app_surface_stat_cache_dir') . 'export.csv';
    $file = fopen($file_path, 'w');

    $sep = ";";
    $esc = '"';

	$title = array($g_view->getName());

	fputcsv($file, $title, $sep, $esc);
	fputcsv($file, array(), $sep, $esc);

	while($line = $g_view->getNextLine()) {
		$csv_line = array();
		if(isset($line['header'])) {
			$csv_line[] = $line['header'];
			unset($line['header']);
		}
		if (isset($line[0]) && is_array($line[0])) {
			$line = $line[0];
		}
		foreach($line as $cel) {
			$csv_line[] = $cel;
		}
		fputcsv($file, $csv_line, $sep, $esc);
	}

	fclose($file);
	return $file_path;
  }
  
	
  
  public function html2rgb($color)
  {
    $tab = array();
    if (substr($color,0,1)=="#") $color=substr($color,1,6);
  
    $tab[0] = hexdec(substr($color, 0, 2));
    $tab[1] = hexdec(substr($color, 2, 2));
    $tab[2] = hexdec(substr($color, 4, 2));
    return $tab;
  }
	public function resultats_xls()
  {
	
	/*
	* Installation SpeadSheet Excel Writer :
	* sudo pear install channel://pear.php.net/OLE-1.0.0RC1
	* sudo pear install Spreadsheet_Excel_Writer-0.9.2
	*
	*/

    require_once 'Spreadsheet/Excel/Writer.php';
    
    // Creating a workbook
    $workbook = new Spreadsheet_Excel_Writer();
    
    // sending HTTP headers
    $workbook->send('Resultats.xls');
    
    // Creating a worksheet
    $worksheet =& $workbook->addWorksheet(utf8_decode('Résultats'));
    
    $worksheet->setInputEncoding('utf-8');
    
    $even_row_color=9; //white    
    $workbook->setCustomColor($even_row_color, 255, $rgb[1], $rgb[2]);
    $rgb=$this->html2rgb("#FFFFFF");
    
    $odd_row_color=10;    
    $workbook->setCustomColor($odd_row_color, $rgb[0], $rgb[1], $rgb[2]);
    $rgb=$this->html2rgb("#FFF3DE");
    
    $header_color =11;
    $workbook->setCustomColor($header_color, $rgb[0], $rgb[1], $rgb[2]);
    $rgb=$this->html2rgb("#00F3DE");
    
    $border_color =12;
    $workbook->setCustomColor($border_color, $rgb[0], $rgb[1], $rgb[2]);
    $rgb=$this->html2rgb("#AAC1C0");
    
    $bg_color =13;
    $workbook->setCustomColor($bg_color, $rgb[0], $rgb[1], $rgb[2]);
    $header_text_color='white';
    
    $odd_text_color   =$header_color;
    $even_text_color  =$header_color;

    $style_H1 = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => 'black',
                                                   'Bold'  => 1,
                                                   'Border'  => 0,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'Size' => 14,
                                                   'FgColor' => 0));
    
    $style_H2 = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => 'orange',
                                                   'Bold'  => 1,
                                                   'Border'  => 0,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'Size' => 12,
                                                   'FgColor' => 0));
    
    $style_H3 = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => 'black',
                                                   'Bold'  => 0,
                                                   'Border'  => 0,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'Italic' => 1,
                                                   'Size' => 10,
                                                   'FgColor' => 0));
    
    $style_H4 = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => 'black',
                                                   'Bold'  => 0,
                                                   'Border'  => 0,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'Italic' => 1,
                                                   'Size' => 12,
                                                   'FgColor' => 0));
    
    $style_TH = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => 'black',
                                                   'Bold'  => 1,
                                                   'Border'  => 1,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'Italic' => 1,
                                                   'Size' => 10,
                                                   'FgColor' => 'silver',
                                                   'TextWrap' => 1));
    
    
    $style_p = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => 'black',
                                                   'Bold'  => 0,
                                                   'Border'  => 0,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'Italic' => 1,
                                                   'Size' => 10,
                                                   'TextWrap' => 1));

    $format_footer   = $workbook->addFormat(array('Align' => 'merge',
                                                   'Color' => $header_color,
                                                   'Bold'  => 0,
                                                   'Border'  => 0,
                                                   'BorderColor'  => $bg_color,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'FgColor' => $bg_color));

    $format_odd_row  = $workbook->addFormat(array('Align' => 'left',
                                                   'Color' => $odd_text_color,
                                                   'Bold'  => 0,
                                                   'Border'  => 0,
                                                   'BorderColor'  => $border_color,
                                                   'Pattern' => 1,
                                                   'FontFamily' => 'Arial',
                                                   'FgColor' => $odd_row_color,
                                                   'TextWrap' => 1));

    $format_even_row = $workbook->addFormat();
    $format_even_row->setAlign('left');
    $format_even_row->setColor($even_text_color);
    $format_even_row->setBorder(1);
    $format_even_row->setBorderColor($border_color);
    $format_even_row->setPattern(0);
    $format_even_row->setFontFamily('Arial');
    $format_even_row->setFgColor($even_row_color);
    $format_even_row->setTextWrap(1);
    
	
    $col_width = array(50,10,10,10,10,10,10,10);
    for($i_col=0;$i_col<count($col_width);$i_col++) {
      $worksheet->setColumn($i_col,$i_col,$col_width[$i_col]);
    }
    
    // Compatibilité template	
	$g_view = $this->g_view;
	
    $i = 0;
    $j = 0;
	
    $style = $style_H1;
    $text = 'Tableau : '.$g_view->getName();
    $worksheet->write($i, $j, utf8_decode($text), $style);
	
	$i++;
	$i++;
	
	$this->xls_table_line_render($worksheet, $g_view->getNextLine(), $i, $j, array('style' => $style_TH, 'style_TD' => $style_TD, 'style_TH' => $style_TH));
	
	while($line = $g_view->getNextLine()) {
		$this->xls_table_line_render($worksheet, $line, $i, $j, array('style' => $style_TD, 'style_TD' => $style_TD, 'style_TH' => $style_TH));
	}

	$i++;
	$i++;
    
    $matrice = $g_view->getMatrice();
    $matrice['axis'][0]['labels']['header'] = '';
	$this->xls_table_line_render($worksheet, $matrice['axis'][0]['labels'], $i, $j, array('style' => $style_TH, 'style_TD' => $style_TD, 'style_TH' => $style_TH));

	for($mj = 0; $mj < $matrice['axis'][1]['count']; $mj++) {
		$line = array();
		for($mi = 0; $mi < $matrice['axis'][0]['count']; $mi++) {
			$line[] = $matrice['data'][$mi][$mj];
		}
        $line['header'] = $matrice['axis'][1]['labels'][$mj];
		$this->xls_table_line_render($worksheet, $line, $i, $j, array('style' => $style_TD, 'style_TD' => $style_TD, 'style_TH' => $style_TH));
	}
	
    $worksheet->setFooter(utf8_decode(""));
    $workbook->close();

  }

	protected function xls_table_line_render($worksheet, $line, &$i, &$j, $options = array()) {
	  
	  $j=0;
	  
	  if(is_array($line) && !is_array($line[0])) {
		  return $this->xls_line_render($worksheet, $line, $i, $j, $options);
	  }
	  if(is_array($line) && is_array($line[0])) {
		  $first = true;
		  $header = $line['header'];
		  unset($line['header']);
		  foreach($line as $subline) {
			  $j=0;
			  if($first) { 
				  $text = $header;
				  $options['style'] = $options['style_TH'];
				  $worksheet->write($i, $j, utf8_decode($text), $options['style']);
				  $j++;
				  $first = false;
			  }
			  $options['style'] = $options['style_TD'];
			  $i = $this->xls_line_render($worksheet, $subline, $i, $j, $options);
		  }
		  return $html;
	  }
	  return $i;
	}
	
	protected function xls_line_render($worksheet, $line, &$i, &$j, $options = array()) {
		$j=0;
		$style_TH = $options['style_TH'];
		
		if(isset($line['header'])) {
			$style = $style_TH;
			$text = $line['header'];
			$worksheet->write($i, $j, utf8_decode($text), $style_TH);
			unset($line['header']);
		}
		foreach($line as $cel) {
			$j++;
			$style = $options['style'];
			$text = $cel;
			$worksheet->write($i, $j, utf8_decode($text), $style);
		}$i++;
		return $i;
	}
}

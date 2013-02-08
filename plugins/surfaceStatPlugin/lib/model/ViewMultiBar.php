<?php
/**
 * @brief Vue (histogramme)
 * @class ViewMultiBar
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class ViewMultiBar extends View {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $render;
	protected $layer;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->setType(ViewPeer::CLASSKEY_2);
	}

/******************************************************************************/
		/********/
		/*Render*/
		/********/
/******************************************************************************/

	public function render() {
		if($this->getSecondParam()) {
			return $this->renderWithSecondParam();
		}
		else {
			return $this->renderWithoutSecondParam();
		}
	}

	protected function renderWithSecondParam() {
		$result = $this->getResult();
		$i = 1;
		$value_id = $this->getWorksheet()->getValues();
		$value_id = 'value_' . $value_id[0]->getId();
		$labels = $this->getWorksheet()->getSecondParamObject()->getDistinct();
		foreach($this->getWorksheet()->getSecondParamObject()->getKey() as $i => $k_2) {
			 $array = array();
			foreach($this->getWorksheet()->getFirstParamObject()->getKey() as $k_1) {
				$array[] = (int) $result->get(array($k_1, $k_2, $value_id));
			}
			$color = $this->getColor($i);
			$this->layer->addDataSet(	$array,
						intval($color, 16),
						$labels[$i]);
			$i++;
		}
		return $this->saveGraphic();
	}

	protected function renderWithoutSecondParam() {
		$result = $this->getResult();
		$i = 1;
		foreach($this->getWorksheet()->getValues() as $v_val) {
			$array = array();
			foreach($this->getWorksheet()->getFirstParamObject()->getKey() as $key) {
				$array[] = (int) $result->get(array($key, 'value_' . $v_val->getId()));
			}
			$color = $this->getColor($i);
			$this->layer->addDataSet(	$array,
						intval($color, 16),
						$v_val->getName());
			$i++;
		}
		return $this->saveGraphic();
	}

	public function prepareRender() {
		parent::prepareRender();
		$this->defaultOptions();
		$this->render = new XYChart(	$this->getOpt('size-x'),
						$this->getOpt('size-y'));
			/*Titre*/
		$this->render->addTitle(	$this->getOpt('title-name'),
						$this->getOpt('title-font'),
						$this->getOpt('title-size'),
						$this->getOpt('title-color'));
			/*Plot*/
		$this->render->setPlotArea(	$this->getOpt('plot-decal-x'),
						$this->getOpt('plot-decal-y'),
						$this->getOpt('plot-width'),
						$this->getOpt('plot-height'),
						$this->render->linearGradientColor(	$this->getOpt('plot-decal-x'),
											$this->getOpt('plot-decal-y'),
											$this->getOpt('size-x'),
											$this->getOpt('size-y'),
											$this->getOpt('plot-color-begin'),
											$this->getOpt('plot-color-end'),
											-1,
											$this->getOpt('plot-color-line-v'),
											$this->getOpt('plot-color-line-h')));
			/*Legende*/
		$legend = $this->render->addLegend(	$this->getOpt('legend-decal-x'),
							$this->getOpt('legend-decal-y'),
							$this->getOpt('legend-vertical'),
							$this->getOpt('legend-font'),
							$this->getOpt('legend-size'));
		$legend->setBackground(Transparent);
			/*Legende X*/
		$this->render->xAxis->setLabels($this->getWorksheet()->getFirstParamObject()->getDistinct());
		$this->render->xAxis->setTickOffset(0.5);

		$this->render->xAxis->setTitle(		$this->getOpt('legend-x-name'));
		$this->render->xAxis->setLabelStyle(	$this->getOpt('legend-x-font'),
							$this->getOpt('legend-x-size'),
							$this->getOpt('legend-x-color'),
							$this->getOpt('legend-x-rotation'));
		$this->render->xAxis->setWidth(2);
			/*Legende Y*/
		$this->render->yAxis->setTitle(		$this->getOpt('legend-y-name'));
		$this->render->yAxis->setLabelStyle(	$this->getOpt('legend-y-font'),
							$this->getOpt('legend-y-size'),
							$this->getOpt('legend-y-color'),
							$this->getOpt('legend-y-rotation'));
		$this->render->yAxis->setWidth(2);

		if($this->getOpt('swap-xy')) { $this->render->swapXY(); $this->render->xAxis->setReverse(); }
		$this->layer = $this->render->addBarLayer2(constant($this->getOpt('graphic-type')));		//Percentage pour les barres en pourcentage / Stack pour empiler / Side pour plusieurs barres

//		$this->layer->setBorderColor(Transparent, glassEffect(NormalGlare, Left));
//		$this->layer->setBorderColor(Transparent, softLighting());

		$this->layer->setBarGap(0.2, TouchBar);
	}

/******************************************************************************/
		/*********/
		/*Options*/
		/*********/
/******************************************************************************/

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array_merge(parent::defaultOptions(), array(
			'title-name' => array(		'code' => 'title-name',
							'type' => 'string',
							'default' => '',
							'name' => 'Titre',
							'list' => array()),
			'title-size' => array(		'code' => 'title-size',
							'type' => 'int',
							'default' => '18',
							'name' => 'Titre (taille)',
							'list' => array()),
			'title-font' => array(		'code' => 'title-font',
							'type' => 'string',
							'default' => 'timesbi.ttf',
							'name' => 'Titre (police)',
							'list' => array()),
			'title-color' => array(		'code' => 'title-color',
							'type' => '0x',
							'default' => '0x0000CC',
							'name' => 'Titre (couleur)',
							'list' => array()),
			'size-x' => array(		'code' => 'size-x',
							'type' => 'int',
							'default' => '600',
							'name' => 'Taille (X)',
							'list' => array()),
			'size-y' => array(		'code' => 'size-y',
							'type' => 'int',
							'default' => '400',
							'name' => 'Taille (Y)',
							'list' => array()),
			'plot-decal-x' => array(	'code' => 'plot-decal-x',
							'type' => 'int',
							'default' => '60',
							'name' => 'Marge (X)',
							'list' => array()),
			'plot-decal-y' => array(	'code' => 'plot-decal-y',
							'type' => 'int',
							'default' => '55',
							'name' => 'Marge (Y)',
							'list' => array()),
			'plot-width' => array(		'code' => 'plot-width',
							'type' => 'int',
							'default' => '500',
							'name' => 'Taille graphique (X)',
							'list' => array()),
			'plot-height' => array(		'code' => 'plot-height',
							'type' => 'int',
							'default' => '320',
							'name' => 'Taille graphique (Y)',
							'list' => array()),
			'plot-color-begin' => array(	'code' => 'plot-color-begin',
							'type' => '0x',
							'default' => '0xF1F1F1',
							'name' => 'Couleur dégradé début',
							'list' => array()),
			'plot-color-end' => array(	'code' => 'plot-color-end',
							'type' => '0x',
							'default' => '0xF1F1F1',
							'name' => 'Couleur dégradé fin',
							'list' => array()),
			'plot-color-line-v' => array(	'code' => 'plot-color-line-v',
							'type' => '0x',
							'default' => '0x000000',
							'name' => 'Couleur ligne vertical',
							'list' => array()),
			'plot-color-line-h' => array(	'code' => 'plot-color-line-h',
							'type' => '0x',
							'default' => '0x000000',
							'name' => 'Couleur ligne Horizontal',
							'list' => array()),
			'legend-x-name' => array(	'code' => 'legend-x-name',
							'type' => 'string',
							'default' => '',
							'name' => 'Légende axe X',
							'list' => array()),
			'legend-x-size' => array(	'code' => 'legend-x-size',
							'type' => 'int',
							'default' => '8',
							'name' => 'Légende axe X (taille)',
							'list' => array()),
			'legend-x-font' => array(	'code' => 'legend-x-font',
							'type' => 'string',
							'default' => 'arial.ttf',
							'name' => 'Légende axe X (police)',
							'list' => array()),
			'legend-x-color' => array(	'code' => 'legend-x-color',
							'type' => '0x',
							'default' => '0x333333',
							'name' => 'Légende axe X (couleur)',
							'list' => array()),
			'legend-x-rotation' => array(	'code' => 'legend-x-rotation',
							'type' => 'int',
							'default' => '0',
							'name' => 'Légende axe X (Rotation)',
							'list' => array()),
			'legend-y-name' => array(	'code' => 'legend-y-name',
							'type' => 'string',
							'default' => '',
							'name' => 'Légende axe Y',
							'list' => array()),
			'legend-y-size' => array(	'code' => 'legend-y-size',
							'type' => 'int',
							'default' => '8',
							'name' => 'Légende axe Y (taille)',
							'list' => array()),
			'legend-y-font' => array(	'code' => 'legend-y-font',
							'type' => 'string',
							'default' => 'arial.ttf',
							'name' => 'Légende axe Y (police)',
							'list' => array()),
			'legend-y-color' => array(	'code' => 'legend-y-color',
							'type' => '0x',
							'default' => '0x666666',
							'name' => 'Légende axe Y (couleur)',
							'list' => array()),
			'legend-y-rotation' => array(	'code' => 'legend-y-rotation',
							'type' => 'int',
							'default' => '0',
							'name' => 'Légende axe Y (Rotation)',
							'list' => array()),
			'legend-decal-x' => array(	'code' => 'legend-decal-x',
							'type' => 'int',
							'default' => '50',
							'name' => 'Marge (X) de la légende',
							'list' => array()),
			'legend-decal-y' => array(	'code' => 'legend-decal-y',
							'type' => 'int',
							'default' => '12',
							'name' => 'marge (Y) de la légende',
							'list' => array()),
			'legend-vertical' => array(	'code' => 'legend-vertical',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Légende Vertical ?',
							'list' => array()),
			'legend-font' => array(		'code' => 'legend-font',
							'type' => 'string',
							'default' => 'arialbd.ttf',
							'name' => 'Légende (police)',
							'list' => array()),
			'legend-size' => array(		'code' => 'legend-size',
							'type' => 'int',
							'default' => '10',
							'name' => 'Légende (taille)',
							'list' => array()),
			'bar-color-default' => array(	'code' => 'bar-color-default',
							'type' => '0x',
							'default' => '0x8FCDEA',
							'name' => 'Couleur par défaut des barres',
							'list' => array()),
			'graphic-type' => array(	'code' => 'graphic-type',
							'type' => 'string',
							'default' => 'Side',
							'name' => 'Type de graphique',
							'list' => array('Side' => 'Multi-barres', 'Stack' => 'Barres empilées', 'Percentage' => 'Barres empilées (pourcentage)')),
			'swap-xy' => array(		'code' => 'swap-xy',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Histogramme horizontal'
			)
//			'' => array(		'code' => '',
//							'type' => '',
//							'default' => '',
//							'name' => '',
//							'list' => array('key' => 'value')),
			));
		}
		return $this->options;
	}

}

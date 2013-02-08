<?php
/**
 * @brief Vue (camember)
 * @class ViewPie
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class ViewPie extends View {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $render;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->setType(ViewPeer::CLASSKEY_3);
	}

/******************************************************************************/
		/********/
		/*Render*/
		/********/
/******************************************************************************/

	public function render() {
		if($this->getSecondParam()) { return null; }
		$result = $this->getResult();
		$value = $this->getWorksheet()->getValues();
		$value = $value[0]->getId();
		$labels = $this->getFirstParamObject()->getDistinct();
		$array = array();
		foreach($this->getWorksheet()->getFirstParamObject()->getKey() as $key) {
			$array[] = (int) $result->get(array($key, 'value_' . $value));
		}
		$this->render->setData(	$array, $labels);
		return $this->saveGraphic();
	}

	public function prepareRender() {
		parent::prepareRender();
		$this->defaultOptions();
		$this->render = new PieChart(	$this->getOpt('size-x'),
						$this->getOpt('size-y'));
		$this->render->setPieSize(	$this->getOpt('center-x'),
						$this->getOpt('center-y'),
						$this->getOpt('radius'));
		if($this->getOpt('render-3d')) $this->render->set3D();
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
							'default' => '400',
							'name' => 'Taille (X)',
							'list' => array()),
			'size-y' => array(		'code' => 'size-y',
							'type' => 'int',
							'default' => '400',
							'name' => 'Taille (Y)',
							'list' => array()),
			'center-x' => array(		'code' => 'center-x',
							'type' => 'int',
							'default' => '200',
							'name' => 'Centre (X)',
							'list' => array()),
			'center-y' => array(		'code' => 'center-y',
							'type' => 'int',
							'default' => '200',
							'name' => 'Centre (Y)',
							'list' => array()),
			'radius' => array(		'code' => 'radius',
							'type' => 'int',
							'default' => '120',
							'name' => 'Rayon',
							'list' => array()),
			'render-3d' => array(		'code' => 'render-3d',
							'type' => 'bool',
							'default' => 'true',
							'name' => 'Rendu en 3D',
							'list' => array('0' => 'Non', '1' => 'Oui'))
			));
		}
		return $this->options;
	}

}

<?php
/**
 * @brief Vue (tableau)
 * @class ViewArray
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class ViewArray extends View {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $first_values;
	protected $first_keys;
	protected $second_values;
	protected $second_keys;
	protected $continue_values;
	protected $continue_keys;
	protected $position;
	protected $max;
	protected $options_view;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		$this->setType(ViewPeer::CLASSKEY_1);
	}
/******************************************************************************/
		/************/
		/*Foncctions*/
		/************/
/******************************************************************************/

	public function getNumberColumn($with_header_and_total = true) {
		if($this->getOpt('swap-xy')) {
			$nb = 0;
			if($this->getSecondParam()) { $nb += count($this->second_keys); }
			else { $nb += count($this->continue_keys); }
			if($with_header_and_total) {
				if($this->getOpt('total-line')) { $nb++; }
				$nb++;
			}
		}
		else {
			$nb = 1;
			$nb += count($this->first_keys);
			if($this->getSecondParam()) { $nb += 1; }
			if($this->getOpt('total-cel')) { $nb += 1; }
		}
		return $nb;
	}

	public function getNumberLine($with_header_and_total = true) {
		if($this->getOpt('swap-xy')) {
			$nb = 1;
			$nb += count($this->first_keys);
			if($this->getSecondParam()) { $nb += 1; }
			if($this->getOpt('total-cel')) { $nb += 1; }
		}
		else {
			$nb = 0;
			if($this->getSecondParam()) { $nb += count($this->second_keys); }
			else { $nb += count($this->continue_keys); }
			if($with_header_and_total) {
				if($this->getOpt('total-line')) { $nb++; }
				$nb++;
			}
		}
		return $nb;
	}

	public function hasSecondHeader() {
		return (bool) $this->getSecondParam();
	}

	public function hasTotalLine() {
		return $this->getOpt('total-line');
	}

	public function hasTotalColumn() {
		return $this->getOpt('total-cel');
	}

/******************************************************************************/
		/**********************/
		/*Preparation du rendu*/
		/**********************/
/******************************************************************************/

	public function prepareRender() {
		$this->first_values = $this->getFirstParamObject()->getDistinct();
		$this->first_keys = $this->getFirstParamObject()->getKey();
		if($this->getSecondParam()) {
			$this->second_values = $this->getSecondParamObject()->getDistinct();
			$this->second_keys = $this->getSecondParamObject()->getKey();
		}
		$this->continue_values = array();
		$this->continue_keys = array();
		foreach($this->getValues() as $value) {
			$this->continue_values[] = $value->getName();
			$this->continue_keys[] = $value->getId();
		}
		$this->position = -1;
		if($this->getOpt('swap-xy')) {
			$this->max = count($this->first_keys);
		}
		else {
			if($this->second_keys) { $this->max = count($this->second_keys); }
			else { $this->max = count($this->continue_keys); }
		}
		$this->defaultOptions();
	}

	public function renderToExport() {
		return null;
	}

/******************************************************************************/
		/*******/
		/*Rendu*/
		/*******/
/******************************************************************************/

	public function getNextLine() {
		if($this->position == -1) { return $this->getFirstLine(); }
		if($this->position > $this->max) { return null; }

		if($this->position == $this->max) { $line = array(); /*$this->getTotalLine();*/ }
		else {
			if($this->getSecondParam()) { $line = $this->getNextLineWithSecond(); }
			else { $line = $this->getNextLineWithoutSecond(); }
		}

		$line = $this->postTraitment($line);
		$this->position++;
		return $line;
	}

	public function getFirstLine() {
		$this->position++;
		$header = array('header' => '');
		if($this->getOpt('column-name-values')) { $header['subheader'] = ''; }
		else { $header['header'] = $this->getValuesToString(); }
		if($this->getOpt('swap-xy')) {
			if($this->getSecondParam()) { $header = array_merge($header, $this->second_values); }
			else { $header = array_merge(array('header' => ''), $this->continue_values); }
			if($this->getOpt('total-cel')) { $header = array_merge($header, array(e_OPERATOR::getName($this->getOpt('total-line-operator')))); }
		}
		else {
			if($this->getSecondParam()) { $header = array_merge($header, $this->first_values); }
			else { $header = array_merge(array('header' => ''), $this->first_values); }
			if($this->getOpt('total-cel')) { $header = array_merge($header, array(e_OPERATOR::getName($this->getOpt('total-cel-operator')))); }
		}
		return $header;
	}

	public function getValuesToString() {
		return implode('/', (array)$this->getValues());
	}

	public function getTotalLine() {
		if($this->getOpt('total-line')) {
			if($this->getSecondParam()) { $line = $this->getTotalLineWithSecond(); }
			else { $line = $this->getTotalLineWithoutSecond(); }
			$this->position++;
			return $line;
		}
		$this->position++;
		return null;
	}

/******************************************************************************/
		/****************************/
		/*Traitement deux parametres*/
		/****************************/
/******************************************************************************/

	protected function getNextLineWithSecond() {
		if($this->getOpt('swap-xy')) { return $this->getNextLineWithSecondSwap(); }
		$result = $this->getResult();
		$round = $this->getOpt('round');
		$i = 0;
		$line = array();
		$line['header'] = get($this->position, $this->second_values);
		$path = get($this->position, $this->second_keys);
		foreach($this->continue_keys as $value_key) {
			$row = array();
			foreach($this->first_keys as $first_key) {
				$row[] = round($result->get(array($first_key, $path, 'value_' . $value_key), 0), $round);
			}
			$row = $this->getTotalCel($row, $round);
			if($this->getOpt('column-name-values')) {
				$row['header'] = $this->continue_values[$i];
			}
			$line[] = $row;
			$i++;
		}
		return $line;
	}
	
	protected function getNextLineWithSecondSwap() {
		$result = $this->getResult();
		$round = $this->getOpt('round');
		$i = 0;
		$line = array();
		$line['header'] = get($this->position, $this->first_values);
		$path = get($this->position, $this->first_keys);
		foreach($this->continue_keys as $value_key) {
			$row = array();
			foreach($this->second_keys as $second_key) {
				$row[] = round($result->get(array($path, $second_key, 'value_' . $value_key), 0), $round);
			}
			$row = $this->getTotalCel($row, $round);
			if($this->getOpt('column-name-values')) {
				$row['header'] = $this->continue_values[$i];
			}
			$line[] = $row;
			$i++;
		}
		return $line;
	}

	protected function getTotalLineWithSecond() {
		if($this->getOpt('swap-xy')) { return $this->getTotalLineWithSecondSwap(); }
		$line = array();
		$result = $this->getResult();
		$round = $this->getOpt('round');
		$i = 0;
		foreach($this->continue_keys as $continue_key) {
			$subline = array();
			foreach($this->first_keys as $first_key) {
				$cel = array();
				foreach($this->second_keys as $second_key) {
					$cel[] = round($result->get(array($first_key, $second_key, 'value_' . $continue_key), 0), $round);
				}
				$subline[] = $this->applyOperator($this->getOpt('total-line-operator'), $cel);
			}
			$subline = $this->getTotalCel($subline, $round);
			if($this->getOpt('column-name-values')) {
				$row['header'] = $this->continue_values[$i];
			}
			$i++;
			$line[] = $subline;
		}
		$line['header'] = e_OPERATOR::getName($this->getOpt('total-line-operator'));
		return $line;
	}

	protected function getTotalLineWithSecondSwap() {
		$line = array();
		$result = $this->getResult();
		$round = $this->getOpt('round');
		$i = 0;
		foreach($this->continue_keys as $continue_key) {
			$subline = array();
			foreach($this->second_keys as $second_key) {
				$cel = array();
				foreach($this->first_keys as $first_key) {
					$cel[] = round($result->get(array($first_key, $second_key, 'value_' . $continue_key), 0), $round);
				}
				$subline[] = $this->applyOperator($this->getOpt('total-line-operator'), $cel);
			}
			$subline = $this->getTotalCel($subline, $round);
			if($this->getOpt('column-name-values')) {
				$row['header'] = $this->continue_values[$i];
			}
			$i++;
			$line[] = $subline;
		}
		$line['header'] = e_OPERATOR::getName($this->getOpt('total-line-operator'));
		return $line;
	}

/******************************************************************************/
		/*************************/
		/*Traitement un parametre*/
		/*************************/
/******************************************************************************/

	protected function getNextLineWithoutSecond() {
		if($this->getOpt('swap-xy')) { return $this->getNextLineWithoutSecondSwap(); }
		$result = $this->getResult();
		$round = $this->getOpt('round');
		$line = array();
		$path = $this->continue_keys[$this->position];
		foreach($this->first_keys as $first_key) {
			$line[] = round($result->get(array($first_key, 'value_' . $path), 0), $round);
		}
		$line = $this->getTotalCel($line, $round);
		$line['header'] = $this->continue_values[$this->position];
		return $line;
	}

	protected function getNextLineWithoutSecondSwap() {
		$result = $this->getResult();
		$round = $this->getOpt('round');
		$line = array();
		$path = get($this->position, $this->first_keys);
		foreach($this->continue_keys as $continue_key) {
			$line[] = round($result->get(array($path, 'value_' . $continue_key), 0), $round);
		}
		$line = $this->getTotalCel($line, $round);
		$line['header'] = $this->first_values[$this->position];
		return $line;
	}

	protected function getTotalLineWithoutSecond() {
		if($this->getOpt('swap-xy')) { return $this->getTotalLineWithoutSecondSwap(); }
		$result = $this->getResult();
		$line = array();
		$round = $this->getOpt('round');
		foreach($this->first_keys as $first_key) {
			$cel = array();
			foreach($this->continue_keys as $continue_key) {
				$cel[] = round($result->get(array($first_key, 'value_' . $continue_key), 0), $round);
			}
			$line[] = $this->applyOperator($this->getOpt('total-line-operator'), $cel);
		}
		$line = $this->getTotalCel($line, $round);
		$line['header'] = e_OPERATOR::getName($this->getOpt('total-line-operator'));
		return $line;
	}

	protected function getTotalLineWithoutSecondSwap() {
		$result = $this->getResult();
		$line = array();
		$round = $this->getOpt('round');
		foreach($this->continue_keys as $continue_key) {
			$cel = array();
			foreach($this->first_keys as $first_key) {
				$cel[] = round($result->get(array($first_key, 'value_' . $continue_key), 0), $round);
			}
			$line[] = $this->applyOperator($this->getOpt('total-line-operator'), $cel);
		}
		$line = $this->getTotalCel($line, $round);
		$line['header'] = e_OPERATOR::getName($this->getOpt('total-line-operator'));
		return $line;
	}
	
	public function getMatrice() {

		$result = $this->getResult();
		$round = $this->getOpt('round');

		$matrice = array();
		$matrice['axis'][0]['count'] = 0;
		$matrice['axis'][1]['count'] = 0;

		$matrice['axis'][0]['labels'] = array();
		$matrice['axis'][1]['labels'] = array();

		$matrice['data'] = array();

		$i = 0;
		$j = 0;

		foreach ($this->continue_keys as $continue_key) {
			$matrice['axis'][0]['labels'][] = $this->continue_values[$i];
			$j = 0;
			foreach ($this->first_keys as $first_key) {
				if ($i == 0) {
					$matrice['axis'][1]['labels'][] = $this->first_values[$j];
				}
				$matrice['data'][$i][$j] = round($result->get(array($first_key, 'value_' . $continue_key), 0), $round);
				$j++;
			}
			$i++;
		}
		$matrice['axis'][0]['count'] = $i;
		$matrice['axis'][1]['count'] = $j;


		if ($this->getOpt('total-cel')) {
			$max_axis = array();
			$max_axis[0] = $matrice['axis'][0]['count'];
			$max_axis[1] = $matrice['axis'][1]['count'];

			for ($j = 0; $j < $max_axis[1]; $j++) {
				$serie = array();
				for ($i = 0; $i < $max_axis[0]; $i++) {
					$serie[] = $matrice['data'][$i][$j];
				}
				$value = round($this->applyOperator($this->getOpt('total-cel-operator'), $serie), $round);
				$matrice['data'][$max_axis[0]][$j] = $value;
			}

			$matrice['axis'][0]['labels'][$max_axis[0]] = e_OPERATOR::getName($this->getOpt('total-cel-operator'));
			$matrice['axis'][0]['count'] += 1;
		}

		if ($this->getOpt('total-line')) {
			$max_axis = array();
			$max_axis[0] = $matrice['axis'][0]['count'];
			$max_axis[1] = $matrice['axis'][1]['count'];

			for ($i = 0; $i < $max_axis[0]; $i++) {
				$serie = array();
				for ($j = 0; $j < $max_axis[1]; $j++) {
					$serie[] = $matrice['data'][$i][$j];
				}
				$value = round($this->applyOperator($this->getOpt('total-line-operator'), $serie), $round);
				$matrice['data'][$i][$max_axis[1]] = $value;
			}

			$matrice['axis'][1]['labels'][$max_axis[1]] = e_OPERATOR::getName($this->getOpt('total-line-operator'));
			$matrice['axis'][1]['count'] += 1;
		}

		return $matrice;
	}

/******************************************************************************/
		/*********************/
		/*Fonctions partagées*/
		/*********************/
/******************************************************************************/

	protected function getTotalCel($line, $round) {
		if($this->getOpt('total-cel')) {
			$line = array_merge($line, array(round($this->applyOperator($this->getOpt('total-cel-operator'), $line), $round)));
		}
		return $line;
	}

	protected function applyOperator($operator, $line) {
		switch($operator) {
			case e_OPERATOR::SUM : return array_sum($line); break;
			case e_OPERATOR::AVERAGE : return array_sum($line)/count($line); break;
			case e_OPERATOR::COUNT : return count($line); break;
			default : return 0; break;
		}
	}

	protected function postTraitment($line) {
		if($this->getOpt('symbol-null-value-active')) {
			$line = $this->replaceWithSymbolValue($line, $this->getOpt('symbol-null-value'));
		}
		return $line;
	}

	protected function replaceWithSymbolValue($line, $symbol) {
		if(is_array($line)) {
			foreach($line as $index => $value) {
				if(is_array($value)) {
					$line[$index] = $this->replaceWithSymbolValue($value, $symbol);
				}
				else {
					$value == null ? $line[$index] = $symbol : null;
				}
			}
		}
		return $line;
	}

	public function getOptionsView() {
		if(!$this->options_view) {
			$this->options_view = array();
			if($this->getOpt('bring-out-value')) {
				$i = 1;
				while($option = $this->getOpt('bring-out-marge-' . $i)) {
					$this->options_view['bring-out-marge-' . $i] = $option;
					$this->options_view['bring-out-class-' . $i] = $this->getOpt('bring-out-class-' . $i, $this->getOpt('bring-out-class-default'));
					$i++;
				}
			}
		}
		return $this->options_view;
	}

/******************************************************************************/
		/*********/
		/*Options*/
		/*********/
/******************************************************************************/

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array_merge(parent::defaultOptions(), array(
			'total-cel' => array(		'code' => 'total-cel',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Colonne Total',
							'list' => array()),
			'total-cel-operator' => array(	'code' => 'total-cel-operator',
							'type' => 'int',
							'default' => '1',
							'name' => 'Opérateur Total (Colonne)',
							'list' => e_OPERATOR::getList()),
			'total-line' => array(		'code' => 'total-line',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Ligne Total',
							'list' => array()),
			'total-line-operator' => array(	'code' => 'total-line-operator',
							'type' => 'int',
							'default' => '1',
							'name' => 'Opérateur Total (Ligne)',
							'list' => array()),
			'round' => array(		'code' => 'round',
							'type' => 'int',
							'default' => '2',
							'name' => 'Arrondie',
							'list' => array()),
			'column-name-values' => array(	'code' => 'column-name-values',
							'type' => 'bool',
							'default' => false,
							'name' => 'Colonne avec le nom des valeurs',
							'list' => array()),
			'bring-out-value' => array(	'code' => 'bring-out-value',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Mettre en evidence les valeurs',
							'list' => array()),
			'bring-out-class-default' => array(	'code' => 'bring-out-class-default',
							'type' => 'string',
							'default' => 'red',
							'name' => 'Class pour la mise en evidence (defaut)',
							'list' => array()),
			'symbol-null-value-active' => array(	'code' => 'symbole-null-value-active',
							'type' => 'bool',
							'default' => 'false',
							'name' => 'Active le symbole pour les valeurs null',
							'list' => array()),
			'symbol-null-value' => array(	'code' => 'symbole-null-value',
							'type' => 'string',
							'default' => '',
							'name' => 'Symbole si la valeur est null',
							'list' => array())
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

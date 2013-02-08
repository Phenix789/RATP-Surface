<?php
/**
 * @brief Valeur discrete (DATE)
 * @class DiscreteFieldDATE
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DiscreteFieldDATE extends DiscreteFieldPERIOD {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/



/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		parent::__construct();
		$this->setType(DiscreteFieldPeer::CLASSKEY_2);
	}

/******************************************************************************/
		/**********************/
		/** Getter && Setter **/
		/*Fonctions Racourcies*/
		/**********************/
/******************************************************************************/

	public function setFilterValue($value) {
		$split = explode('/', $value);
		if(count($split) == 2) {
			parent::setFilterValue(array('begin' => $split[0], 'end' => $split[1]));
		}
	}

/******************************************************************************/
		/************************/
		/*Surcharge de fonctions*/
		/************************/
/******************************************************************************/

	public function getWhereQuery() {
		if($this->filter_value) {
			$begin = $this->filter_value['begin'];
			$end = $this->filter_value['end'];
		}
		else {
			$format = 'Y-m-d H:i:s';
			$begin = $this->getBegin(false);
			$this->getSubType() == e_DURATION::WEEK ? $day = date('j', $begin) + 7 : $day = 1;
			$this->getSubType() == e_DURATION::MONTH ? $month = date('n', $begin) + 1 : $month = date('n', $begin);
			if($this->getSubType() == e_DURATION::YEAR) { $month = 1; $year = date('Y', $begin) + 1; }
			else { $year = date('Y', $begin); }
			$end = date($format, mktime(0, 0, 0, $month, $day, $year));
			$begin = date($format, $begin);
		}
		$query = "";
		if($this->db_adapter == 'mssql') {
			$query .= $this->getCodeField() . " >= '" . dateMySqlToMsSql($begin) . "' AND ";
			$query .= $this->getCodeField() . " < '" . dateMySqlToMsSql($end) . "' ";
		} else {
			$query .= $this->getCodeField() . " >= '" . $begin . "' AND ";
			$query .= $this->getCodeField() . " < '" . $end . "'";
		}
		return $query;
	}

	protected function getBegin($offset = true) {
		if(isset($this->filter_value['begin']) && $this->filter_value['begin'] != '') {
			return $this->filterToTimestamp('begin');
		}
		else {
			if($this->getSubType() == e_DURATION::WEEK) { $begin = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1, date('Y')); }
			if($this->getSubType() == e_DURATION::MONTH) { $begin = mktime(0, 0, 0, date('m'), 1 , date('Y')); }
			if($this->getSubType() == e_DURATION::YEAR) { $begin = mktime(0, 0, 0, 1, 1, date('Y')); }
		}
		if($offset) {
			if($this->getSubType() == e_DURATION::WEEK) { $duration = 'weeks'; }
			if($this->getSubType() == e_DURATION::MONTH) { $duration = 'months'; }
			if($this->getSubType() == e_DURATION::YEAR) { $duration = 'years'; }
			if($this->getOpt('offset') < 0) {
				$begin = strtotime(date('Y-m-d H:i:s', $begin) . ' +' . $this->getOpt('offset') . $duration);
			}
		}
		return $begin;
	}

	protected function getEnd($offset = true) {
		if(isset($this->filter_value['end']) && $this->filter_value['end'] != '') {
			$end = $this->filterToTimestamp('end');
		}
		else {
			if($this->getSubType() == e_DURATION::WEEK) { $end = mktime(0, 0, 0, date('m'), date('d') - date('w') + 8, date('Y')); }
			if($this->getSubType() == e_DURATION::MONTH) { $end = mktime(0, 0, 0, date('m') + 1, 1 , date('Y')); }
			if($this->getSubType() == e_DURATION::YEAR) { $end = mktime(0, 0, 0, 1, 1, date('Y') + 1); }
		}
		if($offset) {
			if($this->getSubType() == e_DURATION::WEEK) { $duration = 'weeks'; }
			if($this->getSubType() == e_DURATION::MONTH) { $duration = 'months'; }
			if($this->getSubType() == e_DURATION::YEAR) { $duration = 'years'; }
			if($this->getOpt('offset') < 0) {
				$end = strtotime(date('Y-m-d H:i:s', $end) . ' +' . $this->getOpt('offset') . $duration);
			}
		}
		return $end;
	}

/* CONTROL ********************************************************************/

	public function getControl() {
		if(!$this->control) {
			$imax = $this->getIMax();
			$begin = $this->getVirtualBegin();
			$step = $this->getVirtualStep();
			$list = array();
			for($i = 0; $i < $imax; $i++) {
				$list[$this->getIndexControl($begin)] = $this->formatControl($begin);
				$begin = $this->getNextBegin($begin, $step, -1);
			}
			$this->control = $list;
		}
		return $this->control;
	}

	protected function getIMax() {
		return $this->getOpt('nb-select');
	}

	protected function getVirtualBegin() {
		$time = time();
		$offset = $this->getOpt('offset');
		$day = date('j', $time);
		$month = date('n', $time);
		$year = date('Y', $time);
		if($this->getSubType() == e_DURATION::WEEK) { $day = $day - date('N', $time) + 1 + 7 * $offset; }
		if($this->getSubType() == e_DURATION::MONTH) { $day = 1; $month += $offset; }
		if($this->getSubType() == e_DURATION::YEAR) { $day = 1; $month = 1; $year += $offset; }
		return mktime(0, 0, 0, $month, $day, $year);
	}

	protected function getVirtualStep() {
		if($this->getSubType() == e_DURATION::WEEK) return e_STEP::WEEK;
		if($this->getSubType() == e_DURATION::MONTH) return e_STEP::MONTH;
		if($this->getSubType() == e_DURATION::YEAR) return e_STEP::YEAR;
	}

	protected function getIndexControl($begin) {
		$format = 'Y-m-d H:i:s';
		$day = date('j', $begin);
		$month = date('n', $begin);
		$year = date('Y', $begin);
		if($this->getSubType() == e_DURATION::WEEK) { $day += 7 ; }
		if($this->getSubType() == e_DURATION::MONTH) { $month++; }
		if($this->getSubType() == e_DURATION::YEAR) { $year++; }
		$end = mktime(0, 0, 0, $month, $day, $year);
		return date($format, $begin) . '/' . date($format, $end);
	}

	protected function formatControl($begin) {
		if($this->getSubType() == e_DURATION::WEEK) return 'Semaine ' . date("W - Y", $begin);
		if($this->getSubType() == e_DURATION::MONTH) return $this->replace(date("F Y", $begin));
		if($this->getSubType() == e_DURATION::YEAR) return 'Année ' . date("Y", $begin);
	}

	protected function filterToTimestamp($i = 'begin') {
		if(isset($this->filter_value[$i])) {
			$date = $this->filter_value[$i];
			$year = substr($date, 0, 4);
			$month = substr($date, 5, 2);
			$day = substr($date, 8, 2);
			return mktime(0, 0, 0, $month, $day, $year);
		}
	}

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array_merge(parent::defaultOptions(), array(
			'date-type' => array(		'code' => 'date-type',
							'type' => 'int',
							'default' => '2',
							'name' => 'Durée',
							'list' => array(e_DURATION::getList())),
			'nb-select' => array(		'code' => 'nb-select',
							'type' => 'int',
							'default' => '10',
							'name' => 'Nombre de selection',
							'list' => array()),
			'offset' => array(		'code' => 'offset',
							'type' => 'int',
							'default' => '0',
							'name' => 'Offset',
							'list' => array())
					));
		}
		return $this->options;
	}

}

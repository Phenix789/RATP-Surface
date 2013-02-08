<?php
/**
 * @brief Valeur discrete (PERIODE)
 * @class DiscreteFieldPERIOD
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DiscreteFieldPERIOD extends DiscreteField {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $distinct_key;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct() {
		parent::__construct();
		$this->setType(DiscreteFieldPeer::CLASSKEY_3);
	}

/******************************************************************************/
		/**********************/
		/** Getter && Setter **/
		/*Fonctions Racourcies*/
		/**********************/
/******************************************************************************/

	public function getSubType() {
		$option = $this->getOption('date-type');
		if(!$option) $option = e_DURATION::MONTH;
		return $option;
	}

	public function getSubTypeName() {
		$subtype = $this->getOption('date-type');
		if(!$subtype) $subtype = e_DURATION::MONTH;
		return e_DURATION::getName($subtype);
	}

	public function getCodeFieldSql() {
		$code = $this->getCodeField();
		$step = $this->getOption('step', $this->getSubType());
		if($this->db_adapter == 'mysql') {
			if($step == e_STEP::DAY) return 'YEAR(' . $code . ')*1000 + DAYOFYEAR(' . $code . ')';		//AAAAJJJ
			if($step == e_STEP::WEEK) return 'YEARWEEK(' . $code . ', 1)';					//AAAAWW
			if($step == e_STEP::MONTH) return 'YEAR(' . $code . ')*100 + MONTH(' . $code . ')';		//AAAAMM
			if($step == e_STEP::YEAR) return 'YEAR(' . $code . ')';						//AAAA
			if($step == e_STEP::QUARTER) return 'YEAR(' . $code . ')*10 + QUARTER(' . $code . ')';		//AAAAQ
			if($step == e_STEP::HALF) return 'YEAR(' . $code . ')*10 + QUARTER(' . $code . ')/2';		//AAAAH
		}
		if($this->db_adapter == 'mssql') {
			if($step == e_STEP::DAY) return 'YEAR(' . $code . ')*1000 + DATEPART( dy, ' . $code . ')';	//AAAAJJJ
			if($step == e_STEP::WEEK) return 'YEAR(' . $code . ')*100 + DATEPART( wk, ' . $code . ')';	//AAAAWW
			if($step == e_STEP::MONTH) return 'YEAR(' . $code . ')*100 + MONTH(' . $code . ')';		//AAAAMM
			if($step == e_STEP::YEAR) return 'YEAR(' . $code . ')';						//AAAA
			if($step == e_STEP::QUARTER) return 'YEAR(' . $code . ')*10 + DATEPART(q, ' . $code . ')';	//AAAAQ
			if($step == e_STEP::HALF) return 'YEAR(' . $code . ')*10 + DATEPART(q, ' . $code . ')/2';	//AAAAH
		}
		if($this->db_adapter == 'pgsql') {
			if($step == e_STEP::DAY) return 'EXTRACT(YEAR FROM ' . $code . ')*1000 + EXTRACT(DOY FROM ' . $code . ')';	//AAAAJJJ
			if($step == e_STEP::WEEK) return 'EXTRACT(YEAR FROM ' . $code . ')*100 + EXTRACT(WEEK FROM ' . $code . ')';	//AAAAWW
			if($step == e_STEP::MONTH) return 'EXTRACT(YEAR FROM ' . $code . ')*100 + EXTRACT(MONTH FROM ' . $code . ')';	//AAAAMM
			if($step == e_STEP::YEAR) return 'EXTRACT(YEAR FROM ' . $code . ')';						//AAAA
			if($step == e_STEP::QUARTER) return 'EXTRACT(YEAR FROM ' . $code . ')*10 + EXTRACT(QUARTER FROM ' . $code . ')';//AAAAQ
			if($step == e_STEP::HALF) return 'EXTRACT(YEAR FROM ' . $code . ')*10 + EXTRACT(QUARTER FROM ' . $code . ')/2';	//AAAAH
		}
		return parent::getCodeFieldSql();
	}

	public function getLabelFieldSql() {
		return 'MAX(' . $this->getCodeFieldSql() . ')';
	}

/* DISTINCT *******************************************************************/

	public function getDistinct() {
		if(!$this->distinct) {
			$list = $this->getDistinctKey();
			foreach($list as $key => $value) {
				$list[$key] = $this->formatDistinct($value);
			}
			$this->distinct = $list;
		}
		return $this->distinct;
	}

	public function getDistinctKey() {
		if(!$this->distinct_key) {
			$begin = $this->getBegin();
			$end = $this->getEnd();
			$step = $this->getOption('step', $this->getSubType());
			$list = array();
			while($begin < $end) {
				$list[] = $begin;
				$begin = $this->getNextBegin($begin, $step);
			}
			$this->distinct_key = $list;
		}
		return $this->distinct_key;
	}

	protected function getBegin() {
		if(isset($this->filter_value['begin']) && $this->filter_value['begin'] != '') {
			return $this->filterToTimestamp('begin');
		}
		else {
			$time = time();
			if($this->getSubType() == e_DURATION::WEEK) {
				$time = strtotime(date("Y-W"));
			}
			if($this->getSubType() == e_DURATION::MONTH) {
				$time = strtotime(date("Y-m-d"));
			}
			if($this->getSubType() == e_DURATION::YEAR) { 
				$time = strtotime(date("Y-m"));
				$time = strtotime("-1 year", $time);
			}
			return $time;
		}
	}

	protected function getEnd() {
		if(isset($this->filter_value['end']) && $this->filter_value['end'] != '') {
			return $this->filterToTimestamp('end');
		}
		else {
			$time = time();
			if($this->getSubType() == e_DURATION::WEEK) {
				$time = strtotime(date("Y-W"));
				$time = strtotime("+1 week", $time);
			}
			if($this->getSubType() == e_DURATION::MONTH) {
				$time = strtotime(date("Y-m-d"));
				$time = strtotime("+1 month", $time);
			}
			if($this->getSubType() == e_DURATION::YEAR) { 
				$time = strtotime(date("Y-m"));
				$time = strtotime("+1 month", $time);
			}
			return $time;
		}
	}

	protected function filterToTimestamp($i = 'begin') {
		if(isset($this->filter_value[$i])) {
			$date = $this->filter_value[$i];
			$year = substr($date, 6, 4);
			$month = substr($date, 3, 2);
			$day = substr($date, 0, 2);
			return mktime(0, 0, 0, $month, $day, $year);
		}
	}

	protected function getNextBegin($begin, $step, $up = 1) {
		$up >= 0 ? $up = 1 : $up = -1;
		$day = date('j', $begin);
		$month = date('n', $begin);
		$year = date('Y', $begin);
		if($step == e_STEP::DAY) { $day += 1 * $up; }
		if($step == e_STEP::WEEK) { $day = ($day - date('N', $begin) + 1) + 7 * $up; }
		if($step == e_STEP::MONTH) { $month += 1 * $up; $day = 1; }
		if($step == e_STEP::QUARTER) { $month += 3 * $up; }
		if($step == e_STEP::HALF) { $month += 6 * $up; }
		if($step == e_STEP::YEAR) { $year += 1 * $up; $day = 1; $month = 1; }
		return mktime(0, 0, 0, $month, $day, $year);
	}

	protected function formatDistinct($begin) {
		$step = $this->getOption('step', $this->getSubType());
		if($step == e_STEP::DAY) return $this->replace(date('l', $begin));
		if($step == e_STEP::WEEK) return 'Semaine ' . date('W Y', $begin);
		if($step == e_STEP::MONTH) return $this->replace(date('F Y', $begin));
		if($step == e_STEP::QUARTER) return 'Trimestre ' . (int) ((date('n', $begin)-1)/3+1);
		if($step == e_STEP::HALF) return 'Semestre ' . (int) ((date('n', $begin)-1)/6+1);
		if($step == e_STEP::YEAR) return 'Année ' . date('Y', $begin);
	}
/* KEY ************************************************************************/

	public function getKey() {
		if(!$this->key) {
			$list = $this->getDistinctKey();
			foreach($list as $key => $value) {
				$list[$key] = $this->formatKey($value);
			}
			$this->key = $list;
		}
		return $this->key;
	}

	protected function formatKey($value) {
		$step = $this->getOption('step', $this->getSubType());
		if($step == e_STEP::DAY) return date('Y', $value)*1000 + date('z', $value) + 1; //+1 du au decallage entre php et mysql => 1° janvier => php: 0 // mysql: 1
		if($step == e_STEP::WEEK) return date('YW', $value);
		if($step == e_STEP::MONTH) return date('Ym', $value);
		if($step == e_STEP::QUARTER) return date('Y')*100 + (int)((date('n', $value)-1)/3+1);
		if($step == e_STEP::HALF) return date('Y')*100 + (int)((date('n', $value)-1)/3+1);
		if($step == e_STEP::YEAR) return date('Y', $value);
	}

	protected function replace($format) {
		return  str_replace(	array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
					array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'),
					$format
			);
	}

/* QUERY **********************************************************************/

	public function getWhereQuery() {
		$query = "";
		if($this->db_adapter == 'mssql') {
			if(isset($this->filter_value['begin'])) {
				$query .= $this->getCodeField() . " >= CAST('" . $this->formatSql($this->filter_value['begin']) . "' AS DATETIME)";
			}
			if(isset($this->filter_value['begin']) && isset($this->filter_value['end'])) {
				$query .= ' AND ';
			}
			if(isset($this->filter_value['end'])) {
				$query .= $this->getCodeField() . " < CAST('" . $this->formatSql($this->filter_value['end']) . "' AS DATETIME)";
			}
		} else {
			if(isset($this->filter_value['begin']) && $this->filter_value['begin'] != '') {
				$query .= $this->getCodeField() . " >= '" . $this->formatSql($this->filter_value['begin']) . "'";
			}
			if(isset($this->filter_value['begin']) && isset($this->filter_value['end']) && $this->filter_value['begin'] != '' && $this->filter_value['end'] != '') {
				$query .= ' AND ';
			}
			if(isset($this->filter_value['end']) && $this->filter_value['end'] != '') {
				$query .= $this->getCodeField() . " < '" . $this->formatSql($this->filter_value['end']) . "'";
			}                    
                }
		return $query;
	}

	public function formatSql($date) {
		$split = explode('/', $date);
		if(count($split) == 3) {
			$date = mktime(0, 0, 0, $split[1], $split[0], $split[2]);
		}
		else {
			$date = time();
		}
		if($this->db_adapter == 'mssql') { return dateMySqlToMsSql(date('Y-m-d H:i:s', $date)); }
		return date('Y-m-d H:i:s', $date);
	}

/******************************************************************************/
		/*********/
		/*Options*/
		/*********/
/******************************************************************************/

	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array_merge(parent::defaultOptions(), array(
			'step' => array(		'code' => 'step',
							'type' => 'int',
							'default' => '2',
							'name' => 'Pas',
							'list' => array(e_STEP::getList())),
			'strict' => array(		'code' => 'strict',
							'type' => 'bool',
							'default' => 'true',
							'name' => 'Pas strict',
							'list' => array('0' => 'Non', '1' => 'Oui'))
			));
		}
		return $this->options;
	}

}

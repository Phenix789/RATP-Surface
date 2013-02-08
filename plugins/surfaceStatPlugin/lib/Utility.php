<?php

/******************************************************************************/
		/*************/
		/*Enumeration*/
		/*************/
/******************************************************************************/

/**
 * Type de donnée discrete
 */
class e_TYPE {
	const ID = 1;
	const DATE = 2;
	const PERIOD = 3;
	const TEXT = 4;
	const NUMBER = 5;

	public static function getList() {
		$list = array();
		$list[(string)e_TYPE::ID] =			'CODE';
		$list[(string)e_TYPE::DATE] =			'DATE';
		$list[(string)e_TYPE::PERIOD] =			'PERIODE';
		$list[(string)e_TYPE::TEXT] =			'TEXTE';
		$list[(string)e_TYPE::NUMBER] =			'NOMBRE';
		return $list;
	}

	public static function isID($type) {
		return $type == e_TYPE::ID;
	}

	public static function isDATE($type) {
		return $type == e_TYPE::DATE;
	}

	public static function isPERIOD($type) {
		return $type == e_TYPE::PERIOD;
	}

	public static function isTEXT($type) {
		return $type == e_TYPE::TEXT;
	}

	public static function isNUMBER($type) {
		return $type == e_TYPE::NUMBER;
	}

	public static function getName($type) {
		$list = e_TYPE::getList();
		return isset($list[$type]) ? $list[$type] : '';
	}

}

class e_OPERATOR {
	const NOTHING = 0;
	const SUM = 1;
	const AVERAGE = 2;
	const COUNT = 3;

	public static function getList() {
		$list = array();
		$list[(string)e_OPERATOR::NOTHING] =		'Aucun';
		$list[(string)e_OPERATOR::SUM] =		'Somme';
		$list[(string)e_OPERATOR::AVERAGE] =		'Moyenne';
		$list[(string)e_OPERATOR::COUNT] =		'Décompte';
		return $list;
	}

	public static function getName($operator) {
		$list = e_OPERATOR::getList();
		return isset($list[(string)$operator]) ? $list[$operator] : '';
	}

}

class e_DURATION {
	const WEEK = 1;
	const MONTH = 2;
	const YEAR = 3;

	public static function isWEEK($period) {
		return $period == e_DURATION::WEEK;
	}

	public static function isMONTH($period) {
		return $period == e_DURATION::MONTH;
	}

	public static function isYEAR($epriod) {
		return $period == e_DURATION::YEAR;
	}

	public static function getName($period) {
		$list = e_DURATION::getList();
		return isset($list[$period]) ? $list[$period] : '';
	}

	public static function getList() {
		$list = array();
		$list[(string)e_DURATION::WEEK] = 'Semaine';
		$list[(string)e_DURATION::MONTH] = 'Mois';
		$list[(string)e_DURATION::YEAR] = 'Année';
		return $list;
	}

}

class e_MATH_OPERATOR {
	const EQUAL = 0;
	const LESS_THAN = 1;
	const LESS_EQUAL = 2;
	const GREAT_THAN = 3;
	const GREAT_EQUAL = 4;
	const NOT_EQUAL = 5;

	public static function getList() {
		$list = array();
		$list[(string)e_MATH_OPERATOR::EQUAL] =		'=';
		$list[(string)e_MATH_OPERATOR::LESS_THAN] =	'<';
		$list[(string)e_MATH_OPERATOR::LESS_EQUAL] =	'<=';
		$list[(string)e_MATH_OPERATOR::GREAT_THAN] =	'>';
		$list[(string)e_MATH_OPERATOR::GREAT_EQUAL] =	'>=';
		$list[(string)e_MATH_OPERATOR::NOT_EQUAL] =	'!=';
		return $list;
	}

	public static function getSymbol($operator) {
		return e_MATH_OPERATOR::getName($operator);
	}

	public static function getName($operator) {
		$list = e_MATH_OPERATOR::getList();
		return isset($list[$operator]) ? $list[$operator] : '';
	}
}

class e_STEP {
	const DAY = 1;
	const WEEK = 2;
	const MONTH = 3;
	const QUARTER = 4;
	const HALF = 5;
	const YEAR = 6;

	public static function getList() {
		$list = array();
		$list[(string)e_STEP::DAY] =			'Jour';
		$list[(string)e_STEP::WEEK] =			'Semaine';
		$list[(string)e_STEP::MONTH] =			'Mois';
		$list[(string)e_STEP::QUARTER] =		'Trimestre';
		$list[(string)e_STEP::HALF] =			'Semestre';
		$list[(string)e_STEP::YEAR] =			'Année';
		return $list;
	}

	public static function getName($step) {
		$list = e_STEP::getList();
		return isset($list[$step]) ? $list[$step] : '';
	}

}

class e_TYPE_GRAPHIC {
	const MODEL = 0;
	const TABS = 1;
	const MULTI_BAR = 2;
	const PIE = 3;

	public static function getList() {
		return array(
			'0' => 'Modèle',
			'1' => 'Tableau',
			'2' => 'Multi Barres',
			'3' => 'Camembert'
		);
	}

	public static function getName($type) {
		$list = e_TYPE_GRAPHIC::getList();
		return $list[$type];
	}
}

class e_SCALE {
	const NORMAL = 1;
	const LOG = 2;
	const PERCENT = 3;
}

function dateMySqlToMsSql($date) {
	$day = substr($date, 8, 2);
	$month = substr($date, 5, 2);
	$year = substr($date, 0, 4);
	return $day . '/' . $month . '/' . $year;
}
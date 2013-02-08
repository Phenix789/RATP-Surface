<?php
/**
 *
 *
 *
 */
class sfcPhone {

	const TYPE_UNKNOWN = 0;
	const TYPE_FRENCH = 1;
	const TYPE_INTERNATIONAL_FRENCH = 101;

	protected static $text = array(
			self::TYPE_FRENCH => "Numero français",
			self::TYPE_INTERNATIONAL_FRENCH => "Numero français (format international)",
			self::TYPE_UNKNOWN => "Numero non reconnu"
	);

	protected static $regexps = array(
			self::TYPE_FRENCH => "#^(0[1-9])([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})$#",
			self::TYPE_INTERNATIONAL_FRENCH => "#^(\+33|\+33 ?\(0\))([1-9])([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})$#",
		);

	protected static $cleaner = array(
		' ', '.', '-', '/',				//Séparateur
		'(0)'						//0 du numero national/international
	);

	public static function clean($phone, $cleaner = array()) {
		return str_replace(array_merge(sfcPhone::$cleaner, $cleaner), '', $phone);
	}

	public static function format($phone, $separator = null) {
		if($phone) {
			$separator = is_null($separator) ? sfcPhone::getSeparator() : $separator;
			$phone = sfcPhone::clean($phone);
			$matched = array();
			if(preg_match(sfcPhone::getRegExpOf(self::TYPE_FRENCH), $phone, $matched)) {
				unset($matched[0]);
				$phone = implode($separator, $matched);
			}
			else if(preg_match(sfcPhone::getRegExpOf(self::TYPE_INTERNATIONAL_FRENCH), $phone, $matched)) {
				unset($matched[0]);
				$phone = $matched[1];
				unset($matched[1]);
				$phone .= ' (0)' . implode($separator, $matched);
			}
		}
		return $phone;
	}

	public static function check($phone) {
		$phone = sfcPhone::clean($phone);
		foreach(sfcPhone::$regexps as $type => $regexp) {
			if(preg_match($regexp, $phone)) {
				return $type;
			}
		}
		return self::TYPE_UNKNOWN;
	}

	public static function getTextType($type) {
		return get($type, self::$text, get(self::TYPE_UNKNOWN, self::$text));
	}

	protected static function getSeparator() {
		$config = sfConfig::get('app_surface_format');
		return get(array('sfc_phone', 'separator'), $config, '');
	}

	protected static function getRegExpOf($type) {
		return get($type, sfcPhone::$regexps);
	}

	public static function unitTest($personal = array()) {
		$tests = array(
			'0365957426',
			'03 65 95 74 26',
			'03-65-95-74-26',
			'03.65.95.74.26',
			'03-65 95.74-26',
			'+333 65 95 74 26',
			'+333.65-95 74 26',
			'+33 3.65-95 74 26',
			'+33(0)3 65 95 74 26',

			'numero de tel',
			'numerodetel',
			'9999999999',
			'0000000000',
			'03a65a95a74a26',
			'+3303 65 95 74 26',
		);
		$tests = array_merge($tests, $personal);
		foreach($tests as $test) {
			echo $test . ' : ';
			if(sfcPhone::check($test)) {
				echo "OK";
				echo "\n\t" . sfcPhone::clean($test);
				echo "\n\t" . sfcPhone::format($test);
			}
			else {
				echo "KO";
			}
			echo "\n";
		}
	}

}
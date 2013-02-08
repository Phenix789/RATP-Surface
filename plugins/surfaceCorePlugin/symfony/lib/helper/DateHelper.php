<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * DateHelper.
 *
 * @package    symfony
 * @subpackage helper
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: DateHelper.php 8763 2008-05-04 07:24:40Z fabien $
 */

function format_daterange($start_date, $end_date, $format = 'd', $full_text, $start_text, $end_text, $culture = null, $charset = null)
{
  if ($start_date != '' && $end_date != '')
  {
    return sprintf($full_text, format_date($start_date, $format, $culture, $charset), format_date($end_date, $format, $culture, $charset));
  }
  else if ($start_date != '')
  {
    return sprintf($start_text, format_date($start_date, $format, $culture, $charset));
  }
  else if ($end_date != '')
  {
    return sprintf($end_text, format_date($end_date, $format, $culture, $charset));
  }
}

//PATCH FR
function formatDate($date, $default = null, $input = 'd', $output = 'i'){
  try{
    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $value = $dateFormat->format($date, $output, $dateFormat->getInputPattern($input));
  } catch(sfException $e){
    $value = $default;
  }
  return $value;
}

function format_date($date, $format = 'd', $culture = null, $charset = null)
{
  //var_dump($date, $format, $culture, $charset);
  return formatDate($date, null, 'd', $format);
}

/*function format_date($date, $format = 'd', $culture = null, $charset = null)
{
  static $dateFormats = array();

  if (is_null($date))
  {
    return null;
  }

  if (!$culture)
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();
  }

  if (!$charset)
  {
    $charset = sfConfig::get('sf_charset');
  }

  if (!isset($dateFormats[$culture]))
  {
    $dateFormats[$culture] = new sfDateFormat($culture);
  }

  return $dateFormats[$culture]->format($date, $format, null, $charset);
}*/

function format_datetime($date, $format = 'F', $culture = null, $charset = null)
{
  return format_date($date, $format, $culture, $charset);
}

function distance_of_time_in_words($from_time, $to_time = null, $include_seconds = false)
{
  $to_time = $to_time? $to_time: time();

  $distance_in_minutes = floor(abs($to_time - $from_time) / 60);
  $distance_in_seconds = floor(abs($to_time - $from_time));

  $string = '';
  $parameters = array();

  if ($distance_in_minutes <= 1)
  {
    if (!$include_seconds)
    {
      $string = $distance_in_minutes == 0 ? 'less than a minute' : '1 minute';
    }
    else
    {
      if ($distance_in_seconds <= 5)
      {
        $string = 'less than 5 seconds';
      }
      else if ($distance_in_seconds >= 6 && $distance_in_seconds <= 10)
      {
        $string = 'less than 10 seconds';
      }
      else if ($distance_in_seconds >= 11 && $distance_in_seconds <= 20)
      {
        $string = 'less than 20 seconds';
      }
      else if ($distance_in_seconds >= 21 && $distance_in_seconds <= 40)
      {
        $string = 'half a minute';
      }
      else if ($distance_in_seconds >= 41 && $distance_in_seconds <= 59)
      {
        $string = 'less than a minute';
      }
      else
      {
        $string = '1 minute';
      }
    }
  }
  else if ($distance_in_minutes >= 2 && $distance_in_minutes <= 44)
  {
    $string = '%minutes% minutes';
    $parameters['%minutes%'] = $distance_in_minutes;
  }
  else if ($distance_in_minutes >= 45 && $distance_in_minutes <= 89)
  {
    $string = 'about 1 hour';
  }
  else if ($distance_in_minutes >= 90 && $distance_in_minutes <= 1439)
  {
    $string = 'about %hours% hours';
    $parameters['%hours%'] = round($distance_in_minutes / 60);
  }
  else if ($distance_in_minutes >= 1440 && $distance_in_minutes <= 2879)
  {
    $string = '1 day';
  }
  else if ($distance_in_minutes >= 2880 && $distance_in_minutes <= 43199)
  {
    $string = '%days% days';
    $parameters['%days%'] = round($distance_in_minutes / 1440);
  }
  else if ($distance_in_minutes >= 43200 && $distance_in_minutes <= 86399)
  {
    $string = 'about 1 month';
  }
  else if ($distance_in_minutes >= 86400 && $distance_in_minutes <= 525959)
  {
    $string = '%months% months';
    $parameters['%months%'] = round($distance_in_minutes / 43200);
  }
  else if ($distance_in_minutes >= 525960 && $distance_in_minutes <= 1051919)
  {
    $string = 'about 1 year';
  }
  else
  {
    $string = 'over %years% years';
    $parameters['%years%'] = floor($distance_in_minutes / 525960);
  }

  if (sfConfig::get('sf_i18n'))
  {
    use_helper('I18N');

    return __($string, $parameters);
  }
  else
  {
    return strtr($string, $parameters);
  }
}

// Like distance_of_time_in_words, but where to_time is fixed to time()
function time_ago_in_words($from_time, $include_seconds = false)
{
  return distance_of_time_in_words($from_time, time(), $include_seconds);
}

function diffToSeconds(DateInterval $diff) {
  $diffSeconds = (int) $diff->days * 86400 + $diff->h * 3600 + $diff->i * 60 + $diff->s;
  if ($diff->invert)
    $diffSeconds *= -1;
  return $diffSeconds;
}


/**
 * Return a formated string with the elapsed time since the given date
 */
function date_since($timestamp, $more_infos = false, $with_hours = false){
	$diff = abs(time() - $timestamp);

	if($with_hours){
		if($diff < 60){//If less than one minute
			return $diff.' secondes';
		}
		if($diff < 3600){//If less than one hour
			$m=floor($diff / 60);
			if($m == 1){
				return '1 minute';
			}
			return $m.' minutes';
		}
		if($diff < 86400){//If less than one day
			$h=floor($diff / 3600);
			if($h == 1){
				return '1 heure';
			}
			return $h.' heures';
		}
	} else {
		if($diff < 86400){
			return "aujourd'hui";
		}
	}

	//If more than one day:

	$day=(int)date('j', $diff);
	$mon=(int)date('n', $diff) - 1;
	$yea=(int)date('Y', $diff) - 1970;

	$tmp=array();

	if($day > 0){
		if($day == 1){
			$tmp[]='1 jour';
		}else{
			$tmp[]=$day.' jours';
		}
	}
	if($mon > 0){
		if($mon == 1){
			$tmp[]='1 mois';
		}else{
			$tmp[]=$mon.' mois';
		}
	}
	if($yea > 0){
		if($yea == 1){
			$tmp[]='1 an';
		}else{
			$tmp[]=$yea.' ans';
		}
	}
	if(!$more_infos){
		return array_pop($tmp);
	}
	$separator=array(', ', ' et ', '');
	$final=array();
	foreach($tmp as $value){
		$final[]=$value.array_pop($separator);
	}
	return implode(array_reverse($final));
}

function date_tag($timestamp, $in = "dans", $for = "depuis", $today = "aujourd'hui"){
	$since = date_since($timestamp);
	$str = '<date title="le '.date('d/m/Y à H:i', (int)$timestamp).'">';
	if(date('Y-m-d') == date('Y-m-d', $timestamp)){
		$str .= $today;
	} elseif($timestamp > time()){
		$str .= "$in $since";
	} else {
		$str .= "$for $since";
	}
	return $str.'</date>';
}
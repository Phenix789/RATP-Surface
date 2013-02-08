<?php
use_helper('DateForm');

function _parse_time($str_time) {
    if (sscanf($str_time, "%d:%2d", $hour, $min) == 2) {
        return ($hour * 60) + $min;
    }
    
    return 0;
}

function input_time_tag($name, $value = null, $options = array()) {
    // return select_time_tag($name, $value, $options);
    
    $start   = _parse_time(_get_option($options,  'min',          '0:00'));
    $end     = _parse_time(_get_option($options,  'max',          '24:00'));
    $step    = _get_option($options,  'increment',    5);
    $len     = _get_option($options,  'size',         6);
    $bSecond = _get_option($options,  'with_seconds', false);
    $noInput = _get_option($options,  'no_input',     false);

    if (sscanf($value, "%2d:%2d:%2d", $hour, $min, $sec) == 3) {
        $value = sprintf("%02d:%02d", $hour, $min);
    }
    
    $times = array();
    for ($time = $start; $time < $end; $time += $step) {
        $str = sprintf("%02d:%02d", ($time / 60) , ($time % 60));
        $times[$str] = $str; 
    }

    $select_options = options_for_select($times, $value, $options);
       
    return select_tag($name, $select_options, $options);
}
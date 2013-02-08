<?php 

echo surface_select_tag('filters[selected_time_left]',
                        options_for_select(Array(-1=>'à venir', 0=>'dépassée',172800=>'dépassée depuis plus de 2 jours',604800=>'dépassée depuis plus de 7 jours'), isset($filters['selected_time_left'])?$filters['selected_time_left']:null, array('include_custom'=>'Toutes'))); 
 
?>
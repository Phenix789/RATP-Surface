<?php use_helper('Javascript');

function set_tooltip($field_id, $content, $options = array()) {
    /*
     
     			backgroundColor: '#999', // Default background color
			borderColor: '#666', // Default border color
			textColor: '', // Default text color (use CSS value)
			textShadowColor: '', // Default text shadow color (use CSS value)
			maxWidth: 250,	// Default tooltip width
			align: "left", // Default align
			delay: 250, // Default delay before tooltip appears in ms
			mouseFollow: true, // Tooltips follows the mouse moving
			opacity: .75, // Default tooltips opacity
			appearDuration: .25, // Default appear duration in sec
			hideDuration: .25 // Default disappear duration in sec
    */
    $response = sfContext::getInstance()->getResponse();
    
    $response->addJavascript(sfConfig::get('sf_controls_plugin_web_dir').'/js/tooltips.js');
    $response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/tooltips.css');
 
    
    $javascript = "new Tooltip(";
    
    $javascript .= "'".get_id_from_name($field_id)."', ";
    $javascript .= "'".escape_javascript($content)."', ";

    $js_options = array();
   
    if (isset($options['background_color'])) {
        $js_options['backgroundColor'] = "'".$options['background_color']."'";
    }       
    if (isset($options['border_color'])) {
        $js_options['borderColor'] = "'".$options['border_color']."'";
    }   
    if (isset($options['text_color'])) {
        $js_options['textColor'] = "'".$options['text_color']."'";
    }     
    if (isset($options['text_shadow_color'])) {
        $js_options['textShadowColor'] = "'".$options['text_shadow_color']."'";
    }
    if (isset($options['max_width'])) {
        $js_options['maxWidth'] = $options['max_width'];
    }
    if (isset($options['align'])) {
        $js_options['align'] = "'".$options['align']."'";
    }
    if (isset($options['delay'])) {
        $js_options['delay'] = $options['delay'];
    }
    if (isset($options['mouse_follow'])) {
        $js_options['mouseFollow'] = $options['mouse_follow']? 'true' : 'false';
    }
    if (isset($options['opacity'])) {
        $js_options['opacity'] = $options['opacity'];
    }
    if (isset($options['appear_duration'])) {
        $js_options['appearDuration'] = $options['appear_duration'];
    }
    if (isset($options['hide_duration'])) {
        $js_options['hideDuration'] = $options['hide_duration'];
    }
    
    $javascript .= _options_for_javascript($js_options);
    $javascript .= ');';

    return javascript_tag($javascript);
}  
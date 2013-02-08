<?php use_helper('Form', 'Javascript');
   
/**
*/
function input_color_tag($name, $value = null, $options = array(), $jsoptions = array()) {
    $response = sfContext::getInstance()->getResponse();
    $response->addJavascript(sfConfig::get('sf_controls_plugin_web_dir').'/js/colorpicker.js');
    $response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/colorpicker.css');
      
    // $options['selectBoxOptions'] = implode(";", $select_options);
    
    $javascript = input_tag($name, $value, $options);
    $javascript .= javascript_tag("new Control.ColorPicker($('". get_id_from_name($name)."'), " . _options_for_javascript($jsoptions) . ");");
    return $javascript;
}

function object_input_color_tag($object, $method, $options = array(), $default_value = null)
{
  $options = _parse_attributes($options);

  $value = _get_object_value($object, $method, $default_value);

  return input_color_tag(_convert_method_to_name($method, $options), $value, $options);
}

function show_color_tag($value, $options = array()) {
    $options['class'] = "colorDisplay";
    $options['style'] = "background-color: ".$value."; ";
    
    $html = content_tag("div", "", $options);
        
    return $html;
}
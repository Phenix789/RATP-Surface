<?php use_helper('Form', 'Javascript');
   
/**
*/
function input_edit_select_box($name, $value = null, $select_options = array(), $options = array()) {
    $response = sfContext::getInstance()->getResponse();
    $response->addJavascript(sfConfig::get('sf_controls_plugin_web_dir').'/js/editSelectBox');
    $response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/editSelectBox/input_edit_select_box.css');
      
    $options['selectBoxOptions'] = implode(";", $select_options);
    
    // $javascript = content_tag('script', "alert('hum');", array('type' => 'text/javascript'));
    //$javascript = content_tag('script', "createEditableSelect($('". get_id_from_name($name)."'));", array('type' => 'text/javascript'));
    //$javascript = javascript_tag("createEditableSelect($('". get_id_from_name($name)."'));");
    $javascript = input_tag($name, $value, $options);
    $javascript .= javascript_tag("createEditableSelect($('". get_id_from_name($name)."'));");

    return $javascript;
}


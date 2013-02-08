<?php
  use_helper('Javascript');
  
   function _splitter($container, $pane1, $pane2, $options = array())
    {
        $javascript = "new UI.Splitter(";

        $js_options = array();
        $js_options['container']    = "'".$container."'";
        $js_options['pane1']        = "'".$pane1."'";
        $js_options['pane2']        = "'".$pane2."'";
        
        if (isset($options['horizontal'])) {
            $js_options['splitHorizontal'] = "true";
        }       
        if (isset($options['vertical'])) {
            $js_options['splitHorizontal'] = "false";
        }   
        if (isset($options['sizable'])) {
            $js_options['sizable'] = "'".$options['sizable']."'";
        }
        if (isset($options['pane_1_collapsable'])) {
            $js_options['pane1Collapsable'] = "'".$options['pane_1_collapsable']."'";
        }
        if (isset($options['pane_2_collapsable'])) {
            $js_options['pane2Collapsable'] = "'".$options['pane_2_collapsable']."'";
        }
        if (isset($options['use_theme'])) {
            $js_options['theme'] = "'".$options['use_theme']."'";
        }       
            
        $javascript .= _options_for_javascript($js_options);
        $javascript .= ');';

        return javascript_tag($javascript);
    }  
  
   /**
   */
  function splitter_tag($container, $pane1, $pane2, $options = array())
  {
    $response = sfContext::getInstance()->getResponse();
 
    $response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/themes/splitter/splitter.css');
            
    $options = _convert_options($options);
    if (isset($options['use_theme']))
    {
      $response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/themes/splitter/'.$options['use_theme'].'.css');
    }
    else {
      $response->addStylesheet(sfConfig::get('sf_controls_plugin_web_dir').'/css/themes/splitter/default.css');    
    }
    
    return _splitter($container, $pane1, $pane2, $options);
  }
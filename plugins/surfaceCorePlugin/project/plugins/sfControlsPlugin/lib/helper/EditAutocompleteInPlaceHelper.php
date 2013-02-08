<?php
  use_helper('Javascript');
  
  /*
   * Makes an HTML element specified by the DOM ID '$field_id' become an in-place
   * editor of a property.
   *
   * A form is automatically created and displayed when the user clicks the element,
   * something like this:
   * <form id="myElement-in-place-edit-form" target="specified url">
   *   <input name="value" text="The content of myElement"/>
   *   <input type="submit" value="ok"/>
   *   <a onclick="javascript to cancel the editing">cancel</a>
   * </form>
   *
   * The form is serialized and sent to the server using an AJAX call, the action on
   * the server should process the value and return the updated value in the body of
   * the reponse. The element will automatically be updated with the changed value
   * (as returned from the server).
   *
   * Required '$options' are:
   * 'url'                 Specifies the url where the updated value should
   *                       be sent after the user presses "ok".
   *
   * Addtional '$options' are:
   * 'rows'                Number of rows (more than 1 will use a TEXTAREA)
   * 'cancel_text'         The text on the cancel link. (default: "cancel")
   * 'save_text'           The text on the save link. (default: "ok")
   * 'control'             The control use to edit
   * 'external_control'    The id of an external control used to enter edit mode.
   * 'options'             Pass through options to the AJAX call (see prototype's Ajax.Updater)
   * 'with'                JavaScript snippet that should return what is to be sent
   *                       in the AJAX call, 'form' is an implicit parameter
   */
    function _in_place_auto_complete_editor($field_id, $urlAutoComplete, $urlOnOk, $options = array(), $completion_options = array())
    {
      $javascript = "new Ajax.InPlaceAutocompleteEditor(";

      $javascript .= "'$field_id', ";
      $javascript .= "'" . url_for($urlAutoComplete) . "', ";
      $javascript .= "'" . url_for($urlOnOk) . "'";

      $js_options = array();

      if (isset($options['tokens'])) $js_options['tokens'] = _array_or_string_for_javascript($options['tokens']);

      if (isset($options['cancel_text']))
      {
        $js_options['cancelText'] = "'".$options['cancel_text']."'";
      }
      if (isset($options['save_text']))
      {
        $js_options['okText'] = "'".$options['save_text']."'";
      }
      if (isset($options['cols']))
      {
        $js_options['cols'] = $options['cols'];
      }
      if (isset($options['rows']))
      {
        $js_options['rows'] = $options['rows'];
      }
      if (isset($options['size']))
      {
        $js_options['size'] = $options['size'];
      }
      if (isset($options['controls_in_line']))
      {
        $js_options['controlsInLine'] = "'".$options['controls_in_line']."'";
      }
      if (isset($options['external_control']))
      {
        $js_options['externalControl'] = "'".$options['external_control']."'";
      }
      if (isset($options['options']))
      {
        $js_options['ajaxOptions'] = $options['options'];
      }
      if (isset($options['with']))
      {
        $js_options['callback'] = "function(form, value) { return ".$options['with']." }";
      }
      if (isset($options['highlightcolor']))
      {
        $js_options['highlightcolor'] = "'".$options['highlightcolor']."'";
      }
      if (isset($options['highlightendcolor']))
      {
        $js_options['highlightendcolor'] = "'".$options['highlightendcolor']."'";
      }
      if (isset($options['loadTextURL']))
      {
        $js_options['loadTextURL'] =  "'".$options['loadTextURL']."'";
      }
      if (isset($options['updateElement']))
      {
        $js_options['updateElement'] =  "'".$options['updateElement']."'";
      }
      
      $javascript .= ', '._options_for_javascript($js_options);
      $javascript .= ', '._options_for_ajax($completion_options);
      $javascript .= ');';

      return javascript_tag($javascript);
    }


  /**
   * wrapper for script.aculo.us/prototype Ajax.InPlaceEditor.
   * @param string name id of field that can be edited
   * @param string url of module/action to be called when ok is clicked
   * @param array editor tag options. (rows, cols, highlightcolor, highlightendcolor, etc...)
   *
   * @return string javascript to manipulate the id field to allow click and edit functionality
   */
  function input_in_place_auto_complete_editor_tag($name, $urlAutoComplete, $urlOnOk, $editor_options = array(), $completion_options = array())
  {
    $response = sfContext::getInstance()->getResponse();
    $response->addJavascript(sfConfig::get('sf_controls_plugin_web_dir').'/js/editAutocompleteInPlace');

    $editor_options = _convert_options($editor_options);
    $default_options = array('tag' => 'span', 'id' => '\''.$name.'_in_place_editor', 'class' => 'in_place_editor_field');
   
    $comp_options = _convert_options($completion_options);
    if (isset($comp_options['use_style']) && $comp_options['use_style'] == true)
    {
      $response->addStylesheet(sfConfig::get('sf_prototype_web_dir').'/css/input_auto_complete_tag');
    }
    
    return _in_place_auto_complete_editor($name, $urlAutoComplete, $urlOnOk, array_merge($default_options, $editor_options), $comp_options);
  }

?>
<?php
use_helper(
		'Javascript',
//	'Window',
//        'Spin',
//	'ToolTip',
		'FormSurface', 'surfaceBasket', 'gWidgets',
//        'OpenLayers',
		//Helper Claude
		'Function'
);


define("SURFACE_LOADCTRL_NONE", 0x0000);
define("SURFACE_LOADCTRL_CALENDAR", 0x0001); // Calendrier standard
define("SURFACE_LOADCTRL_TINYMCE", 0x0002); // Tiny MCE
define("SURFACE_LOADCTRL_EDIT_EX", 0x0004); // Edit autocomplete in place et edit select box
define("SURFACE_LOADCTRL_COLORPICKER", 0x0008); // Color picker
define("SURFACE_LOADCTRL_SPINNER", 0x0010); // Spinner / Time
define("SURFACE_LOADCTRL_TOOLTIP", 0x0020); // ToolTips
//define("SURFACE_LOADCTRL_OPENLAYERS", 0x0040);    // OpenLayers
define("SURFACE_LOADCTRL_ALL", 0xFFFF);

// Load all js

function surface_layout_header($loadctrl_flags = SURFACE_LOADCTRL_CALENDAR){
	//sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/surface-layout.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/surface-updater.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/surface.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/surface-menu.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/double_list.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/stack.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/surface-batch.js');
	sfContext::getInstance()->getResponse()->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/collapse.js');
	sfContext::getInstance()->getResponse()->addJavascript('/dwPrototypeWindowPlugin/js/window.js');
	sfContext::getInstance()->getResponse()->addJavascript('/dwPrototypeWindowPlugin/js/window_ext.js');
	sfContext::getInstance()->getResponse()->addJavascript('/sfSurfaceGeneratorPlugin/js/inPlaceRichEditor/tiny_mce/tiny_mce.js');

	sfContext::getInstance()->getResponse()->addStylesheet('/sfSurfaceGeneratorPlugin/css/surface-wizard.css');
	sfContext::getInstance()->getResponse()->addStylesheet(sfConfig::get('sf_prototype_web_dir').'/css/input_auto_complete_tag');
	sfContext::getInstance()->getResponse()->addStylesheet('/dwPrototypeWindowPlugin/themes/default.css');
	sfContext::getInstance()->getResponse()->addStylesheet('/dwPrototypeWindowPlugin/themes/whale.css');

	if($loadctrl_flags & SURFACE_LOADCTRL_CALENDAR){
		// Calendrier
		input_date_tag('dummy', null, array('rich' => true)); // Juste pour charger les scripts javascript de calendrier !
	}
	if($loadctrl_flags & SURFACE_LOADCTRL_EDIT_EX){
		// Edit AutoComplete in Place
		sfContext::getInstance()->getResponse()->addJavascript('/sfControlsPlugin/js/editAutocompleteInPlace.js');
		sfContext::getInstance()->getResponse()->addStylesheet(sfConfig::get('sf_prototype_web_dir').'/css/input_auto_complete_tag');

		sfContext::getInstance()->getResponse()->addJavascript('/sfControlsPlugin/js/editSelectBox.js');
		sfContext::getInstance()->getResponse()->addStylesheet('/sfControlsPlugin/css/editSelectBox/input_edit_select_box.css');
	}
	if($loadctrl_flags & SURFACE_LOADCTRL_COLORPICKER){
		// ColorPicker
		sfContext::getInstance()->getResponse()->addJavascript('/sfControlsPlugin/js/prototype-base-extensions.js');
		sfContext::getInstance()->getResponse()->addJavascript('/sfControlsPlugin/js/colorpicker.js');
		sfContext::getInstance()->getResponse()->addStylesheet(sfConfig::get('sf_prototype_web_dir').'/css/colorpicker.css');
	}
	if($loadctrl_flags & SURFACE_LOADCTRL_SPINNER){
		// Spinner
		// Calendrier
		use_helper('Spin');
		input_spin_tag('dummy', null, array()); // Juste pour charger les scripts javascript de calendrier !
	}
	if($loadctrl_flags & SURFACE_LOADCTRL_TOOLTIP){
		// Spinner
		// Calendrier
		use_helper('ToolTip');
		set_tooltip('dummy', null, array()); // Juste pour charger les scripts javascript de calendrier !
	}
}

function surface_layout_init($center_props = null, $north_props = null, $south_props = null, $west_props = null, $east_props = null
){
	$html = "";

	$html .= javascript_tag("surface.sfController = '".$_SERVER['SCRIPT_NAME']."';
                            surface.east_cmp_name = '".sfConfig::get('app_surface_east_panel')."';
                            surface.east_cmp_name = 'east';
                            surface.east_cmp_size = '200';");

	if(($west_props !== null) || ( $east_props !== null) || ( $center_props !== null)){
		$layout_west_prop = array();
		$layout_west_prop['content'] = "'"._get_option($west_props, 'contentEl', 'west')."'";
		$layout_west_prop['size'] = _get_option($west_props, 'width', '100');
		$layout_west_prop['title'] = "'".escape_javascript(_get_option($west_props, 'title', 'West'))."'";

		$layout_east_prop = array();
		$layout_east_prop['content'] = "'"._get_option($east_props, 'contentEl', 'east')."'";
		$layout_east_prop['size'] = _get_option($east_props, 'width', '400');
		$def_title = ""; //surface_toolbar_create_collapsible("east", true) . "East" . surface_toolbar_create_navigation("east", "tg_east") . surface_toolbar_create_context("east", "tg_east");
		$layout_east_prop['title'] = "'".escape_javascript(_get_option($east_props, 'title', $def_title))."'";


		$layout_center_prop = array();
		$layout_center_prop['content'] = "'"._get_option($center_props, 'contentEl', 'center')."'";
		$def_title = ""; //surface_toolbar_create_navigation("center", "tg_center");
		$layout_center_prop['title'] = "'".escape_javascript(_get_option($center_props, 'title', $def_title))."'";

		$html .= javascript_tag("surface.initLayout({
                                west:   "._options_for_javascript($layout_west_prop).",
                                east:   "._options_for_javascript($layout_east_prop).",
                                center: "._options_for_javascript($layout_center_prop)."
                                }); surface.close_east();");
	}

	return $html;
}

function _surface_javascript_link_to($url, $target, $options = array()){
	$options = _parse_attributes($options);

	$jsfunction = "";
	if(isset($target) && ( $target == 'tg_east')){
		$jsfunction .= "surface.open_east();";
	}

	$surface_options = array();
	$surface_options = _build_callbacks($options);
	if(isset($options['type']) && ( $options['type'] == 'synchronous'))
		$surface_options['asynchronous'] = 'false';
	if(isset($options['method']))
		$surface_options['method'] = _method_option_to_s($options['method']);
	if(isset($options['position']))
		$surface_options['insertion'] = "Insertion.".sfInflector::camelize($options['position']);
	if(isset($options['script']) && ( ($options['script'] == '0') || ( $options['script'] == false)))
		$surface_options['evalScripts'] = 'false';

	//if (isset($options['form']))  {  $surface_options['parameters'] = 'Form.serialize(this)';  }
	//else if (isset($options['submit'])) { $surface_options['parameters'] = "Form.serialize(document.getElementById('{$options['submit']}'))";    }
	//else if (isset($options['with'])) { $js_options['parameters'] = $options['with']; }
	if(isset($options['success']))
		$surface_options['success'] = escape_javascript($options['success']);

	if(isset($options['parameters']))
		$surface_options['parameters'] = $options['parameters'];
	else if(isset($options['with']))
		$surface_options['parameters'] = $options['with'];

	if(isset($options['popup_width']))
		$surface_options['popup_width'] = $options['popup_width'];
	if(isset($options['popup_height']))
		$surface_options['popup_height'] = $options['popup_height'];
	if(isset($options['popup_title']))
		$surface_options['popup_title'] = $options['popup_title'];



	if(sfConfig::get('app_surface_auto_update', false)){
		$component_update = _get_option($options, 'component_class_update', null);
		if($component_update){
			if(is_array($component_update)){
				$surface_options['component_class_update'] = _array_or_string_for_javascript($component_update);
			} else {
				$surface_options['component_class_update'] = "'".$component_update."'";
			}
		}
	}

	if(_get_option($options, 'surface_method') == 'submit_to'){
		$jsfunction = "surface.submit_to(this, '".$url."', '".$target."', "._options_for_javascript($surface_options).");";
	} else {
		$jsfunction = "surface.link_to('".$url."','".$target."', "._options_for_javascript($surface_options).");";
	}

	if(isset($options['before']))
		$jsfunction = $options['before'].'; '.$jsfunction;
	if(isset($options['after']))
		$jsfunction = $jsfunction.'; '.$options['after'];

	if(isset($options['confirm'])){
		$jsfunction = "if (confirm('".escape_javascript($options['confirm'])."')) { $jsfunction; }";
		if(isset($options['cancel'])){
			$jsfunction = $jsfunction.' else { '.$options['cancel'].' }';
		}
	}

	if(isset($options['condition']))
		$jsfunction = 'if ('.$options['condition'].') { '.$jsfunction.'; }';

	// $jsfunction .= "return false;";

	return $jsfunction;
}

function _surface_javascript_chain_link_to($chain, $options = array()){
	$jsfunction = "";

	$last = true;
	$link_to = end($chain);
	while($link_to !== FALSE){
		$link_options = _get_option($link_to, 'options', array());
		$link_options = _parse_attributes($link_options);
		if(!$last && !isset($link_options['type'])){
			$link_options['type'] = 'synchronous';
		}
		$jsfunction = _surface_javascript_link_to($link_to['url'], $link_to['target'], $link_options).$jsfunction;

		$last = false;
		$link_to = prev($chain);
	}

	return $jsfunction;
}

function surface_link_to($name, $url, $target, $skipNavigate = false, $options = array(), $html_options = array()){
	return SurfaceLinkTo::create($name, $url, $target)->setSkipNav($skipNavigate)->setOptions((array)$options)->setHTMLOptions((array)$html_options);
}

function surface_permalink_to($name, $url, $target, $controller = null, $options = array(), $html_options = array()){
	if(is_array($url)){
		$link = '@permalink_2?target1='.get(0, $target, 'tg_center').'&url1='._format_permalink_url(get(0, $url, 'default/blank'));
		$link .= '&target2='.get(1, $target, 'tg_east').'&url2='._format_permalink_url(get(1, $url, 'default/blank'));
	} else {
		$link = '@permalink?target1='.$target.'&url1='._format_permalink_url($url);
	}
	if($controller != SF_APP){
		$link = url_for($link, false);
		if(($pos = strpos($link, '.php')) !== false){
			//supprime le controller
			$link = substr($link, $pos + 4);
		}
		//ajoute le controller
		$link = '/'.$controller.(SF_ENVIRONMENT == 'dev' ? '_dev' : '').'.php'.$link;

		$html_options['href'] = $link;
		return content_tag('a', $name, $html_options);
	} else {
		return link_to($name, $link, $html_options);
	}
}

function _format_permalink_url($url){
	return str_replace(array('/', '?', '&'), array('|', '$', '£'), $url);
}

function surface_chain_link_to($name, $chain, $options = array(), $html_options = array()){
	$jsfunction = _surface_javascript_chain_link_to($chain);
	$html_options = _parse_attributes($html_options);

	return link_to_function($name, $jsfunction, $html_options);
}

function surface_button_to($name, $url, $target, $skipNavigate = false, $options = array(), $html_options = array()){
	if($skipNavigate){
		$url .= strrpos($url, "?") === false ? '?skipNav=true' : '&skipNav=true';
	}

	$url .= strrpos($url, "?") === false ? '?target='.$target : '&target='.$target;
	$jsfunction = _surface_javascript_link_to($url, $target, $options);
	$html_options = _parse_attributes($html_options);

	$button_class = "button "._get_option($options, 'button_class');

	if(isset($html_options['no_label']) && $html_options['no_label']){
		$html_options['title'] = $name;
		return "<span class='".$button_class."'>".link_to_function("&nbsp;", $jsfunction, $html_options)."</span>";
	}

	return "<span class='".$button_class."'>".link_to_function($name, $jsfunction, $html_options)."</span>";
}

function surface_submit_to($value, $url, $target, $ajax_options, $html_options){
	$ajax_options['surface_method'] = 'submit_to';
	return surface_button_to($value, $url, $target, false, $ajax_options, $html_options);
}

function surface_chain_button_to($name, $chain, $options = array(), $html_options = array()){
	$jsfunction = _surface_javascript_chain_link_to($chain);
	$html_options = _parse_attributes($html_options);

	$button_class = "button "._get_option($options, 'button_class');

	if(isset($html_options['no_label']) && $html_options['no_label']){
		$html_options['title'] = $name;
		return "<span class='".$button_class."'>".link_to_function("&nbsp;", $jsfunction, $html_options)."</span>";
	}

	return "<span class='".$button_class."'>".link_to_function($name, $jsfunction, $html_options)."</span>";
}

function _surface_options_for_ajax($options){
	$js_options = _build_callbacks($options);

	$js_options['asynchronous'] = (isset($options['type']) && ( $options['type'] == 'synchronous')) ? 'false' : 'true';
	if(isset($options['method']))
		$js_options['method'] = _method_option_to_s($options['method']);
	if(isset($options['position']))
		$js_options['insertion'] = "Insertion.".sfInflector::camelize($options['position']);
	$js_options['evalScripts'] = (!isset($options['script']) || $options['script'] == '0' || $options['script'] == false) ? 'false' : 'true';

	if(isset($options['form'])){
		$js_options['parameters'] = 'Form.serialize(this)';
	} else if(isset($options['submit'])){
		$js_options['parameters'] = "Form.serialize(document.getElementById('{$options['submit']}'))";
	} else if(isset($options['with'])){
		$js_options['parameters'] = $options['with'];
	}

	if(sfConfig::get('app_surface_auto_update', false)){
		$component_update = _get_option($options, 'component_class_update', null);
		if($component_update){
			if(is_array($component_update)){
				$js_options['component_class_update'] = _array_or_string_for_javascript($component_update);
			} else {
				$js_options['component_class_update'] = "'".$component_update."'";
			}
		}
	}

	return _options_for_javascript($js_options);
}

function surface_form_to($url, $target, $options = array(), $html_options = array()){
	$jsoptions = _surface_options_for_ajax($options);

	$jsfunction = "";
	$jsfunction .= "surface.form_to(this, '".$url."', '".$target."', ".$jsoptions.");";

	if(isset($options['before']))
		$jsfunction = $options['before'].'; '.$jsfunction;
	if(isset($options['after']))
		$jsfunction = $jsfunction.'; '.$options['after'];

	if(isset($options['condition']))
		$jsfunction = 'if ('.$options['condition'].') { '.$jsfunction.'; }';

	if(isset($options['confirm'])){
		$jsfunction = "if (confirm('".escape_javascript($options['confirm'])."')) { $jsfunction; }";
		if(isset($options['cancel'])){
			$jsfunction = $jsfunction.' else { '.$options['cancel'].' }';
		}
	}
	// $html_options['action'] = isset($html_options['action']) ? $html_options['action'] : url_for($url);

	return form_to_function($jsfunction, $html_options);
}

function surface_get_component($moduleName, $componentName, $vars = array()){
	try{
		sfConfigCache::getInstance()->import(sfConfig::get('sf_app_module_dir_name').'/'.$moduleName.'/'.sfConfig::get('sf_app_module_config_dir_name').'/generator.yml', true, true);
		try{
			$component = get_component($moduleName, $componentName, $vars);
		} catch(sfException $e){
			$context = sfContext::getInstance();
			$controller = $context->getController();

			$context->getLogger()->info('{'.$e->getName().'} '.$e->getMessage());

			$orgModulename = $moduleName;
			$moduleName = 'auto'.ucfirst($moduleName);

			require_once(sfConfig::get('sf_module_cache_dir').'/'.$moduleName.'/actions/components.class.php');
			//$component = get_component($moduleName, $componentName, $vars);

			$actionName = '_'.$componentName;

			// check cache
			if($cacheManager = $context->getViewCacheManager()){
				$cacheManager->registerConfiguration($moduleName);
				$uri = '@sf_cache_partial?module='.$moduleName.'&action='.$actionName.'&sf_cache_key='.(isset($vars['sf_cache_key']) ? $vars['sf_cache_key'] : md5(serialize($vars)));
				if($retval = _get_cache($cacheManager, $uri)){
					return $retval;
				}
			}

			// create an instance of the action
			$componentClassname = $moduleName.'Components';
			$componentInstance = new $componentClassname(); // $controller->getComponent($moduleName, $componentName);
			// initialize the action
			if(!$componentInstance->initialize($context)){
				// component failed to initialize
				$error = 'Component initialization failed for module "%s", component "%s"';
				$error = sprintf($error, $moduleName, $componentName);

				throw $e;
				throw new sfInitializationException($error);
			}

			// load component's module config file
			require(sfConfigCache::getInstance()->checkConfig(sfConfig::get('sf_app_module_dir_name').'/'.$moduleName.'/'.sfConfig::get('sf_app_module_config_dir_name').'/module.yml'));

			$componentInstance->getVarHolder()->add($vars);

			// dispatch component
			$componentToRun = 'execute'.ucfirst($componentName);

			if(!method_exists($componentInstance, $componentToRun)){
				if(!method_exists($componentInstance, 'execute')){
					// component not found
					$error = 'sfComponent initialization failed for module "%s", component "%s"';
					$error = sprintf($error, $moduleName, $componentName);
					throw new sfInitializationException($error);
				}
				$componentToRun = 'execute';
			}

			if(sfConfig::get('sf_logging_enabled')){
				$context->getLogger()->info('{PartialHelper} call "'.$moduleName.'->'.$componentToRun.'()'.'"');
			}

			// run component
			if(sfConfig::get('sf_debug') && sfConfig::get('sf_logging_enabled')){
				$timer = sfTimerManager::getTimer(sprintf('Component "%s/%s"', $moduleName, $componentName));
			}

			try{
				$retval = $componentInstance->$componentToRun();
			} catch(sfInitializationException $i){
				throw $e;
			}

			if(sfConfig::get('sf_debug') && sfConfig::get('sf_logging_enabled')){
				$timer->addTime();
			}

			if($retval != sfView::NONE){
				// render
				$view = new sfPartialView();
				$view->initialize($context, $moduleName, $actionName, '');

				try{
					// $view->getTemplate();
					// $view->setDirectory(sfConfig::get('sf_app_module_dir_name').'/'.$orgModulename.'/templates');
					$view->initialize($context, $orgModulename, $actionName, '');
					$retval = $view->render($componentInstance->getVarHolder()->getAll());
				} catch(Exception $e){
					$view->initialize($context, $moduleName, $actionName, '');
					$view->setDirectory(sfConfig::get('sf_module_cache_dir').'/'.$moduleName.'/templates');
					$retval = $view->render($componentInstance->getVarHolder()->getAll());
				}

				if($cacheManager){
					$retval = _set_cache($cacheManager, $uri, $retval);
				}

				$component = $retval;
			}
		}
		return $component;
	} catch(sfException $e){
		if(SF_ENVIRONMENT == 'dev'){
			throw $e;
		}
		return null;
	}
}

function surface_include_component($moduleName, $componentName, $vars = array()){
	echo surface_get_component($moduleName, $componentName, $vars);
}

function link_to_external($name, $url, $options = array()){
	if($url != ''){
		if(stristr($url, "http://") === false){
			$url = "http://".$url;
		}

		return link_to($name, $url, $options);
	}

	return "";
}

function surface_link_to_external($name, $url, $options = array()){
	return link_to_external($name, $url, $options);
}

function getCurrentViewParameters($object_name = null, $object = null){
	$instance = sfContext::getInstance();
	$params = $instance->getActionStack()->getLastEntry()->getActionInstance()->getVarHolder()->getAll();
	if($object_name && $object){
		$params[$object_name] = $object;
	}
	$singular_name = get('singular_name', $params);
	if($singular_name && !get($singular_name, $params)){ // Hack to associate object to it's variable with singular name (Sfc 1.6)
		$params[$singular_name] = get('object', $params);
	}
	return $params;
}

function getCurrentViewParameter($key, $default = null){
	$instance = sfContext::getInstance();
	return $instance->getActionStack()->getLastEntry()->getActionInstance()->getVarHolder()->get($key, $default);
}

function surface_register_component($class_id, $dom_id, $update_url){
	if(sfConfig::get('app_surface_auto_update', false)){
		$js = "surface.component_register('".$class_id."', '".$dom_id."', '".$update_url."');";
		return javascript_tag($js);
	}

	return "";
}

function surface_dorefresh_components($class){
	if(sfConfig::get('app_surface_auto_update', false)){
		if(is_array($class)){
			$class = _array_or_string_for_javascript($class);
		} else {
			$class = "'".$class."'";
		}

		$js = "surface.components_refresh(".$class.");";
		return javascript_tag($js);
	}

	return "";
}

function remote_function_to_target($url, $target, $synchronous = false, $skipNavigate = false, $options = array()){
	$url .= ( strrpos($url, "?") === false) ? '?target='.$target : '&target='.$target;
	if($skipNavigate)
		$url .= '&skipNav=true';

	$options = _parse_attributes($options);
	$options = array_merge(array('method' => 'get',
		'update' => $target,
		'script' => true,
		'url' => $url,
		'type' => $synchronous ? 'synchronous' : 'asynchronous',
		'loading' => "SetCursorWait();",
		'complete' => "SetCursorNormal();",
			), $options);
	return remote_function($options);
}

function link_to_target($name, $url, $target, $skipNavigate = false, $options = array(), $html_options = array()){
	if(isset($target) && ( $target != 'tg_center')){
		if(isset($html_options['class']))
			$html_options['class'] .= " ".$target."_open";
		else
			$html_options['class'] = $target."_open";
	}

	return link_to_function($name, remote_function_to_target($url, $target, false, $skipNavigate, $options), $html_options);
}

function link_to_tg_east($name, $url, $options = array(), $html_options = array()){
	return link_to_target($name, $url, 'tg_east', false, $options, $html_options);
}

function link_to_tg_center($name, $url, $options = array(), $html_options = array()){
	return link_to_target($name, $url, 'tg_center', false, $options, $html_options);
}

function button_to_target($name, $url, $target, $skipNavigate = false, $options = array(), $html_options = array()){
	if(isset($target) && ( $target != 'tg_center')){
		if(isset($html_options['class']))
			$html_options['class'] .= " ".$target."_open";
		else
			$html_options['class'] = $target."_open";
	}

	return button_to_function($name, remote_function_to_target($url, $target, false, $skipNavigate, $options), $html_options);
}

function button_to_tg_east($name, $url, $options = array(), $html_options = array()){
	return button_to_target($name, $url, 'tg_east', false, $options, $html_options);
}

function button_to_tg_center($name, $url, $options = array(), $html_options = array()){
	return button_to_target($name, $url, 'tg_center', false, $options, $html_options);
}

function button_to_targets($name, $remote_functions = array(), $html_options = array()){
	$options = implode("; ", $remote_functions);

	return button_to_function($name, $options, $html_options);
}

function form_to_function($function, $options_html = array()){
	$options_html = _parse_attributes($options_html);

	$options_html['onsubmit'] = $function.'; return false;';
	$options_html['action'] = isset($options_html['action']) ? $options_html['action'] : '';
	$options_html['method'] = isset($options_html['method']) ? $options_html['method'] : 'post';

	return tag('form', $options_html, true);
}

function form_to_target($url, $target, $skipNavigate = false, $options = array(), $html_options = array()){
	if(isset($target) && ( $target != 'tg_center')){
		if(isset($html_options['class']))
			$html_options['class'] .= " ".$target."_open";
		else
			$html_options['class'] = $target."_open";
	}

	$options = array_merge(array('form' => true), $options);

	return form_to_function(remote_function_to_target($url, $target, false, $skipNavigate, $options), $html_options);

	$options = implode("; ", $remote_functions);
	return form_to_function($options, $html_options);
}

function form_to_targets($remote_functions = array(), $html_options = array()){
	$options = implode("; ", $remote_functions);
	return form_to_function($options, $html_options);
}

function row_edit_tag($label, $label_for, $content){
	return row_tag($label, $label_for, $content, 'input_wrapper');
}

function row_show_tag($label, $content){
	return row_tag($label, '', $content, 'shows');
}

function row_tag($label, $label_for, $content, $class){
	$label = label_for($label_for, $label.':');
	$content = content_tag('div', $content, array('class' => $class));
	return content_tag('div', $label.$content, array('class' => 'row'));
}

function surface_label_for_checkbox_tag($id, $label, $options = array()){
	_inject_class($options, 'italic');
	return surface_label_for($id, $label, $options);
}

function surface_checkbox_with_label($name, $value, $checked, $label, $options = array()){
	$checkbox = surface_checkbox_tag($name, $value, $checked, $options);
	$label = surface_label_for_checkbox_tag(get('label_name', $options, get_id_from_name($name), true), $label, $options);
	return $checkbox.$label;
}

function surface_radiobutton_with_label($name, $value, $checked, $label, $options = array()){
	$radiobutton = surface_radiobutton_tag($name, $value, $checked, $options);
	$label = surface_label_for_checkbox_tag(get('label_name', $options, get_id_from_name($name."_".$value), true), $label, $options);
	return $radiobutton.$label;
}

function surface_input_filter_tag($filter_name, $filters, $options = array()){

	return surface_input_tag('filters['.$filter_name.']', get($filter_name, $filters), $options);
}

function surface_boolean_filter_tag($filter_name, $filters, $default_value = null){
	return surface_radiobutton_filter_tag($filter_name, $filters, array(1 => __('yes'), 0 => __('no')), $default_value);
}

function surface_radiobutton_filter_tag($filter_name, $filters, $states, $default_value = null){
	if(count($states) > 0 && is_object(reset($states))){
		$objects = $states;
		$states = array();
		foreach($objects as $object){
			$states[$object->getId()] = $object->__toString();
		}
	}
	$states['all'] = 'Tous';

	if(!isset($default_value)){
		$keys = array_keys($states);
		$default_value = array_pop($keys);
	}

	$html = '';
	foreach($states as $key => $label){
		$value = get($filter_name, $filters, $default_value);
		$html .= content_tag('li', surface_radiobutton_with_label('filters['.$filter_name.']', $key, ($value == $key), $label));
	}
	return content_tag('ul', $html);
}

function surface_checkbox_filter_tag($filter_name, $filters, $states, $default_value = null){

	$html = "";

	if(count($states) > 0 && is_object(reset($states))){
		$objects = $states;
		$states = array();
		foreach($objects as $object){
			$states[$object->getId()] = $object->__toString();
		}
	}

	if(!isset($default_value)){
		$keys = array_keys($states);
		$default_value = array_pop($keys);
	}

	foreach($states as $key => $label){
		$value = get($filter_name, $filters, $default_value);
		$html .= content_tag('li', surface_checkbox_with_label('filters['.$filter_name.']['.$key.']', 1, (get(array($filter_name, $key), $filters)) ? true : false, $label));
	}
	return content_tag('ul', $html);
}

function surface_null_value($text, $options = array()){
	_inject_class($options, 'null_value');
	return content_tag('div', $text, $options);
}

function surface_input_range_tag($name, $values, $options = array()){
	$text1 = _get_option($options, 'text1', 'de');
	$text2 = _get_option($options, 'text2', 'à');
	$unit = _get_option($options, 'unit');
	$size = _get_option($options, 'size', 50);
	$mask = '%s&nbsp;&nbsp;%s&nbsp;&nbsp;%s&nbsp;&nbsp;%s&nbsp;%s';
	return sprintf($mask, $text1, surface_input_number_tag($name.'[min]', get('min', $values), array('style' => 'width: '.$size.'px')), $text2, surface_input_number_tag($name.'[max]', get('max', $values), array('style' => 'width: '.$size.'px')), $unit);
}

function surface_autocomplete_success_tag($objects, $search = null, $id_method = 'getId', $string_method = '__toString', $options = array()){
	$values = array();
	foreach((array)$objects as $object){
		$values[$object->$id_method()] = $object->$string_method();
	}
	return surface_autocomplete_values_success_tag($values, $search, $options);
}

function surface_autocomplete_values_success_tag($values, $search = null, $options = array()){
	$html = "";
	if($search && !is_array($search)){
		$search = array($search);
	}
	if($values){
		foreach((array)$values as $key => $value){
			foreach((array)$search as $string){
				$value = str_ireplace($string, "<b>{$string}</b>", $value);
			}
			$html .= content_tag('li', $value, array('id' => $key));
		}
	} else {
		if(get('null_value', $options, true)){
			$html = content_tag('li', surface_null_value('Aucun résultat'));
		}
	}
	return content_tag('ul', $html);
}

function surface_autocomplete_key_values_success_tag($key, $values, $search = null, $options = array()){
	return surface_autocomplete_values_success_tag(array_combine($key, $values), $search, $options);
}

function surface_image_actions_tag($actions, $options = array()){
	_inject_class($options, 'fieldset_actions');
	if(!is_array($actions)){
		$actions = array($actions);
	}
	return content_tag('div', implode(' ', $actions), $options);
}

function surface_image_action($name, $url, $target, $class = 'sf_admin_action_create', $skipNav = false, $options = array(), $html_options = array()){
	$html_options['title'] = $name;
	_inject($html_options, 'class', $class.' action_img');
	if($target){
		return surface_link_to('', $url, $target, $skipNav, $options, $html_options);
	} else {
		return link_to(' ', $url, $html_options);
	}
}

function surface_image_action_tag($name, $url, $target = 'div_add', $class = 'sf_admin_action_create', $skipNav = false, $options = array(), $html_options = array()){
	return surface_image_actions_tag(surface_image_action($name, $url, $target, $class, $skipNav, $options, $html_options));
}

function image_surface_link_to_tag($img_src, $url, $target, $skipNavigate = false, $options = array(), $image_options = array(), $link_options = array()){
	$image = image_tag($img_src, $image_options);
	$image = content_tag('span', content_tag('span', $image));
	return surface_link_to($image, $url, $target, $skipNavigate, $options, $link_options);
}

function surface_add_target($id = 'div_add', $options = array()){
	$options['id'] = $id;
	_inject_class($options, 'add_target');
	$html = content_tag('div', null, $options);
	$options['id'] = $id.'_loading_mask';
	$options['class'] = 'surface_mask';
	$html .= content_tag('div', null, $options);
	return $html;
}

/* * *************************************************************************** */

function surface_gtab_header_tag($sections, $options){
	return content_tag('ul', implode('', $sections), $options);
}

function surface_gtab_header_section_tag($name, $reference, $options = array()){
	return content_tag('li', link_to($name, '#gtab_'.$reference));
}

function surface_gtab_section_tag($content, $reference, $options = array()){
	$options['id'] = 'gtab_'.$reference;
	_inject($options, 'id', 'gtab-hide');
	return content_tag('div', content_tag('fieldset', content_tag('div', $content, array('class' => 'forms')), array('id' => 'fieldset_getab_'.$reference)), $options);
}

function surface_gtab_javascript($name, $javascript_tag = true){
	$js = 'gWidget_InitPane(\''.$name.'\');';
	if($javascript_tag){
		$js = javascript_tag($js);
	}
	return $js;
}

/* * *************************************************************************** */

function surface_section_tag($label, $content, $label_for = ''){
	return content_tag('div', surface_label_for($label_for, $label).content_tag('div', $content, array('class' => 'input_wrapper')), array('class' => 'row'));
}

function surface_section_title_tag($title){
	return content_tag('h3', $title);
}


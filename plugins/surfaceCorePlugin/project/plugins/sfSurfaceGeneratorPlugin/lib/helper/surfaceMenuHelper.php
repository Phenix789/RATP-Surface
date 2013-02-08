<?php
surfaceMenuHelper();
//use_helper('Javascript');
//
//define("__SURFACE_MENU_CONFIG", 'sf_menu_generator_');
//
//function surface_menu($menu, $html_attrs = array(), $reverse = false, $ajax_target = '') {
//        $menuItem = sfConfig::get('app_' . __SURFACE_MENU_CONFIG . $menu, null);
//        $nodes = isset($menuItem['items']) ? $menuItem['items'] : array();
//
//        $html = _surface_menuitem($nodes, $html_attrs, $reverse, $ajax_target, 0);
//
//        $html .= javascript_tag("var surface_menu = new SurfaceMenu('" . $menu . "', {
//                                                              classNames : {
//                                                                  toggle :        'surface_menu_toggle',
//                                                                  toggleActive :  'surface_menu_toggle_active',
//                                                                  content :       'surface_menu_content'
//                                                              },
//                                                              direction : 'vertical'
//                                                              /*, onEvent:  'mouseover'*/
//                                                          });
//                          surface_menu.activate($$('.surface_menu_toggle')[0]);                                                 
//                          ");
//        return $html;
//}
//
//function _surface_menuitem($nodes = array(), $html_attrs = array(), $reverse = false, $ajax_target = '', $level = 0) {
//        $lis = array();
//        $modName = sfContext::getInstance()->getModuleName();
//
//        foreach($nodes as $node) {
//                if(($parsed = _suface_menuitem_parse($node, $modName, $reverse, $ajax_target, $level)) !== false) {
//                        $lis[] = $parsed;
//                }
//        }
//
//        $html_attrs['class'] = isset($html_attrs['class']) ? $html_attrs['class'] : 'mg';
//        $htmlattrs = array();
//        foreach($html_attrs as $attribute => $value) {
//                $htmlattrs[] = $attribute . '="' . $value . '"';
//        }
//
//        $html = implode('', $lis);
//
//        return $html;
//}
//
//function _suface_menuitem_parse($node, $module, $reverse, $ajax_target, $level) {
//        $menuItem = sfConfig::get('app_' . __SURFACE_MENU_CONFIG . $node, array());
//        $app_items = isset($menuItem['items']) ? $menuItem['items'] : array();
//        $app_allow = isset($menuItem['allow']) ? $menuItem['allow'] : array();
//        $app_deny = isset($menuItem['deny']) ? $menuItem['deny'] : array();
//
//        $ajax_target = array_key_exists('target', $menuItem) ? $menuItem['target'] : $ajax_target;
//
//        $htmlattrs = array();
//        $aattrs = array();
//        if($modMI = sfConfig::get('mod_' . $module . '_' . __SURFACE_MENU_CONFIG . $node, null)) {
//                foreach($modMI as $key => $value) {
//                        if($key == 'items') {
//                                $app_items = _surface_menuitems_merge($app_items, $value);
//                        }
//                        else if($key == 'allow') {
//                                $app_allow = _surface_menuitems_merge($app_allow, $value);
//                        }
//                        else if($key == 'deny') {
//                                $app_deny = _surface_menuitems_merge($app_deny, $value);
//                        }
//                        else {
//                                $menuItem[$key] = $value;
//                        }
//                }
//        }
//
//        if(!$menuItem) {
//                return false;
//        }
//        $menuItem['html_class'] = isset($menuItem['html_class']) ? $menuItem['html_class'] : 'mg';
//        $menuItem['html_class'] .= ' node_' . $node;
//
//        $app_allow = (count($app_allow) > 0) ? $app_allow : array('any');
//
//        if(!_surface_menuitem_match_user_credentials($app_allow, $app_deny)) {
//                return false;
//        }
//
//        foreach($menuItem as $key => $value) {
//                if(substr($key, 0, 5) == 'html_') {
//                        $htmlattrs[] = substr($key, 5) . "=\"$value\"";
//                }
//                if(substr($key, 0, 2) == 'a_') {
//                        $aattrs[] = substr($key, 2) . "=\"$value\"";
//                }
//        }
//
//        $prepend = '';
//
//        $html = $prepend;
//        if(isset($ajax_target) && $ajax_target) {
//                $html .= '<h1 class="surface_menu_toggle">'
//                        . surface_link_to((isset($menuItem['text']) ? $menuItem['text'] : ''),
//                                (isset($menuItem['link']) ? $menuItem['link'] : '#'),
//                                $ajax_target,
//                                false,
//                                array('before' => 'surface.close_east();')
//                        )
//                        . '</h1>';
//        }
//        else {
//                $html .= '<h1 class="surface_menu_toggle">'
//                        . link_to((isset($menuItem['text']) ? $menuItem['text'] : ''),
//                                (isset($menuItem['link']) ? $menuItem['link'] : '#')
//                        )
//                        . '</h1>';
//        }
//
//        $childs = _surface_menuitem($app_items, array(), false, $ajax_target, $level + 1);
//        if($childs) {
//                $html .= '<div class="surface_menu_content">'
//                        . $childs
//                        . '</div>';
//        }
//
//        return $html;
//}
//
//function _surface_menuitems_merge($app_items, $mod_items) {
//        foreach($mod_items as $mod_item) {
//                if($mod_item == '-*') {
//                        $app_items = array();
//                }
//                else if($mod_item{0} == '-') {
//                        if(($pos = array_search(substr($mod_item, 1), $app_items))!== false) {
//                                array_splice($app_items, $pos, 1);
//                        }
//                }
//                else if(!in_array($mod_item, $app_items)) {
//                        $app_items[] = $mod_item;
//                }
//        }
//
//        return $app_items;
//}
//
//function _surface_menuitem_match_user_credentials($app_allow, $app_deny) {
//        $user = sfContext::getInstance()->getUser();
//        if($user) {
//                if(count(array_intersect($app_deny, $user->listCredentials())) > 0) {
//                        return false;
//                }
//
//                foreach($app_allow as $allow) {
//                        if(($user->hasCredential($allow) || $allow == 'any')) {
//                                return true;
//                        }
//                }
//        }
//
//        return false;
//}
//

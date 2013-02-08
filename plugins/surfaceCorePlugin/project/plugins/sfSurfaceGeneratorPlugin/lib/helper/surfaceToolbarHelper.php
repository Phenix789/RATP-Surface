<?php
surfaceToolbarHelper();
//use_helper('Javascript');
//
//function _toolbar_create_button($tb_dom_id, $button_id, $options) {
//        if(isset($options['picture']) && $options['picture']) {
//                $img = content_tag("img",
//                                "",
//                                array('src' => image_path($options['picture'], true),
//                                        'title' => $options['label']));
//        }
//        else {
//                $img = $options['label'];
//        }
//
//        return content_tag("a",
//                $img,
//                array('id' => $tb_dom_id . $button_id,
//                        'class' => "surface_panel_tool",
//                        'href' => "#",
//                        'onclick' => $options['action'] . "Event.extend(event).stop(); return false;"));
//}
//
//function _toolbar_set_button_enable($tb_dom_id, $button_id, $bEnable = true) {
//        $buton_dom_id = $tb_dom_id . $button_id;
//
//        $js = 'if (Object.isElement($("' . $buton_dom_id . '"))) {';
//        $js .= $bEnable ? '$("' . $buton_dom_id . '").removeClassName("surface_panel_tool_disabled");' : '$("' . $buton_dom_id . '").addClassName("surface_panel_tool_disabled");';
//        $js .= '}';
//
//        return javascript_tag($js);
//}
//
//function _toolbar_set_button_visible($tb_dom_id, $button_id, $bVisible = true) {
//        $buton_dom_id = $tb_dom_id . $button_id;
//
//        $js = 'if (Object.isElement($("' . $buton_dom_id . '"))) {';
//        $js .= $bVisible ? '$("' . $buton_dom_id . '").show();' : '$("' . $buton_dom_id . '").hide();';
//        $js .= '}';
//
//        return javascript_tag($js);
//}
//
//function _toolbar_add_button($tb_dom_id, $button_id, $options) {
//        $buton_dom_id = $tb_dom_id . $button_id;
//
//        $js = 'if (Object.isElement($("' . $buton_dom_id . '"))) {';
//        $js .= '$("' . $buton_dom_id . '").remove();';
//        $js .= '}';
//
//        $js = 'if (Object.isElement($("' . $tb_dom_id . '"))) {';
//        $js .= '$("' . $tb_dom_id . '").appendChild(\'' . _toolbar_create_button($tb_dom_id, $button_id, $options) . '\')';
//        $js .= '}';
//
//        return javascript_tag($js);
//}
//
//function _toolbar_del_button($tb_dom_id, $button_id) {
//        $buton_dom_id = $tb_dom_id . $button_id;
//
//        $js = 'if (Object.isElement($("' . $buton_dom_id . '"))) {';
//        $js .= '$("' . $buton_dom_id . '").remove();';
//        $js .= '}';
//
//        return javascript_tag($js);
//}
//
//function _toolbar_create($tb_dom_id, $buttons = array(), $class = "surface_panel_toolbar") {
//        $html = '<div id="' . $tb_dom_id . '" class="' . $class . '">';
//
//        foreach($buttons as $id => $button) {
//                $html .= _toolbar_create_button($tb_dom_id, $id, $button);
//        }
//        $html .= '</div>';
//
//        return $html;
//}
//
//function surface_toolbar_create_collapsible($pane, $bToggleSize = false) {
//        $buttons = array('close' => array('label' => 'Fermer le panneau',
//                        'picture' => '/sfSurfaceHistoryPlugin/images/close.png',
//                        'action' => 'surface.clear_close_' . $pane . '();'
//                ),
//        );
//
//        if($bToggleSize) {
//                $buttons += array('toggle_size' => array('label' => 'Agrandir / réduire le panneau',
//                                'picture' => '/sfSurfaceHistoryPlugin/images/open_wide.png',
//                                'action' => 'surface.toggle_' . $pane . '_width();'
//                        ),
//                );
//        }
//
//        return _toolbar_create('tb_col_' . $pane, $buttons);
//}
//
//function surface_toolbar_create_navigation($pane, $target) {
//        return _toolbar_create("tb_nav_" . $target,
//                array('nav_prev' => array('label' => 'Précédent',
//                                'picture' => '/sfSurfaceHistoryPlugin/images/previous.png',
//                                'action' => 'surface.link_to("sfSurfaceHistoryNavigate/previous", "' . $target . '");',
//                        ),
//                        'nav_next' => array('label' => 'Suivant',
//                                'picture' => '/sfSurfaceHistoryPlugin/images/next.png',
//                                'action' => 'surface.link_to("sfSurfaceHistoryNavigate/next", "' . $target . '");',
//                        ),
//                        'nav_reload' => array('label' => 'Recharger',
//                                'picture' => '/sfSurfaceHistoryPlugin/images/reload.png',
//                                'action' => 'surface.link_to("sfSurfaceHistoryNavigate/refresh", "' . $target . '");',
//                        ),
//                )
//        );
//}
//
//function surface_toolbar_set_navigation_button_enable($target, $button, $bEnable = true) {
//        return _toolbar_set_button_enable("tb_nav_" . $target, $button, $bEnable);
//}
//
//function surface_toolbar_create_context($pane, $target) {
//        return _toolbar_create("tb_context_" . $target, array());
//}
//

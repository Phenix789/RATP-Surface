<?php

function surface_basket_open_link($link_name, $basket_key, $module_name, $open_params, $search_url, $options = array()) {
        $url = $module_name . '/basketOpen?basket_key=' . $basket_key . '&' . $open_params;

        $search_url .= ( strrpos($search_url, '?') === FALSE) ? '?basket_key=' . $basket_key : '&basket_key=' . $basket_key;

        $button = _get_option($options, 'button', true);
        $search_module_name = _get_option($options, 'search_module', null);

        if(!$search_module_name) {
                if(false !== $sep = strpos($search_url, '/')) {
                        $search_module_name = substr($search_url, 0, $sep);
                }
                else {
                        $search_module_name = sfContext::getInstance()->getActionStack()->getLastEntry()->getModuleName();
                }
        }
        $url .= '&search_module=' . $search_module_name;

        if($button) {
                return surface_chain_button_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $search_url,
                                        'target' => 'tg_center'),
                        ),
			$options
                );
        }
        else {
                return surface_chain_link_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $search_url,
                                        'target' => 'tg_center'),
                        ),
			$options
                );
        }
}

function surface_basket_close_link($link_name, $basket_key, $module_name, $open_params, $button = true) {
        $url = $module_name . '/basketClose?' . $open_params . '&basket_key=' . $basket_key;
        $list_url = $module_name . '/list';

        if($button) {
                return surface_chain_button_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $list_url,
                                        'target' => 'tg_center'),
                        )
                );
        }
        else {
                return surface_chain_link_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $list_url,
                                        'target' => 'tg_center'),
                        )
                );
        }
}

function surface_basket_cancel_link($link_name, $basket_key, $module_name, $open_params, $button = true) {

        $url = $module_name . '/basketCancel?' . $open_params . '&basket_key=' . $basket_key;
        $list_url = $module_name . '/list';

        if($button) {
                return surface_chain_button_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $list_url,
                                        'target' => 'tg_center'),
                        )
                );
        }
        else {
                return surface_chain_link_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $list_url,
                                        'target' => 'tg_center'),
                        ),
                        array(),
                        array('class' => 'basket_cancel')
                );
        }
}

function surface_basket_show_link($link_name, $basket_key, $module_name, $open_params, $button = true) {

        $url = $module_name . '/basketShow?' . $open_params . '&basket_key=' . $basket_key;
        $list_url = $module_name . '/list';

        if($button) {
                return surface_chain_button_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $list_url,
                                        'target' => 'tg_center'),
                        )
                );
        }
        else {
                return surface_chain_link_to($link_name,
                        array(array('url' => $url,
                                        'target' => 'tg_east'),
                                array('url' => $list_url,
                                        'target' => 'tg_center'),
                        )
                // array(),
                // array('class' => 'basket_cancel')
                );
        }
}

function surface_basket_remove_item($link_name, $basket_key, $item, $module_name, $open_params, $search_url, $link_icon = null) {
        if($link_icon) {
                $name = image_tag($link_icon,
                                array('alt' => $link_name,
                                        'title' => $link_name));
        }
        else {
                $name = $link_name;
        }

        if(false !== $sep = strpos($search_url, '/')) {
                $search_module_name = substr($search_url, 0, $sep);
        }
        else {
                $search_module_name = sfContext::getInstance()->getActionStack()->getLastEntry()->getModuleName();
        }

        $url = $module_name . '/basketRemoveItem?' . $open_params . '&basket_key=' . $basket_key;
        $list_url = $search_module_name . '/list';

        if($item) {
                if(is_object($item)) {
                        if(is_subclass_of($item, 'BaseObject')) {
                                $item_key = $item->getPrimaryKey();
                                $url .= "&item[class]=" . get_class($item) . "&item[key]=" . $item_key;
                        }
                }
                else if(is_array($item)) {
                        // TODO
                }
                else {
                        $url .= "&item=" . $item;
                }
        }

        return surface_chain_link_to($name,
                array(array('url' => $url,
                                'target' => 'tg_east'),
                        array('url' => $list_url,
                                'target' => 'tg_center'),
                )
        );
}

function surface_basket_add_item($basket, $item, $search_url = null, $search_target = null) {
        $name = "<span><span>"
                . image_tag($basket->getInfo('add_item_icon'), array('alt' => __($basket->getInfo('add_item_name')),
                        'title' => __($basket->getInfo('add_item_name'))))
                . "</span></span>";

        $url = $basket->getInfo('add_item_callback');
        $url .= ( strrpos($url, '?') === FALSE) ? '?basket_key=' . $basket->getKey() : '&basket_key=' . $basket->getKey();
        $target = ($basket->getInfo('add_item_target') ? $basket->getInfo('add_item_target') : $basket->getInfo('container'));

        if($item) {
                if(is_object($item)) {
                        if(is_subclass_of($item, 'BaseObject')) {
                                $item_key = $item->getPrimaryKey();
                                $url .= "&item[class]=" . get_class($item) . "&item[key]=" . $item_key;
                        }
                }
                else if(is_array($item)) {
                        // TODO
                }
                else {
                        $url .= "&item=" . $item;
                }
        }

        if(!$search_url) {
                $search_url = $basket->getInfo('module_search') . "/list";
        }
        $search_url .= ( strrpos($search_url, '?') === FALSE) ? '?basket_key=' . $basket->getKey() : '&basket_key=' . $basket->getKey();
        if(!$search_target) {
                $search_target = "tg_center";
        }

        return surface_chain_link_to($name,
                array(array('url' => $url,
                                'target' => $target),
                        array('url' => $search_url,
                                'target' => $search_target),
                )
        );
}

function surface_basket($basket_key, $module_search, $container = null, $options = array()) {
        /* return include_component('sfSurfaceBasket',
         * show',
         * rray('basket'         => $basket,
         * basket_key'     => $basket_key,
         * module_search'  => $module_search));
         */
        $basket_options = $options;
        $basket_options['container'] = ($container) ? $container : $basket_key . "_container";
        $basket_options['module_search'] = $module_search;

        return include_component('sfSurfaceBasket',
                'show',
                array('basket_key' => $basket_key,
                        'options' => $basket_options,
                        'create_container' => true,
                )
        );
}


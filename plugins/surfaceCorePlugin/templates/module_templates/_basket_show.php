<?php

if ($basket && $basket->isOpened()) {
	if ($basket->isSameRefObjectKey($object)) {
		include_partial("{$module_name}/basket_show_opened", array($singular_name => $object,
			'object' => $object,
			'basket' => $basket,
			'search_url' => $search_url,
			'close_name' => $close_name,
			'cancel_name' => $cancel_name,
			'remove_item_name' => $remove_item_name,
			'remove_item_icon' => $remove_item_icon,
			'options' => $options));
	} else {
		include_partial("{$module_name}/basket_show_another_opened", array($singular_name => $object,
			'object' => $object,
			'basket' => $basket,
			'search_url' => $search_url,
			'close_name' => $close_name,
			'cancel_name' => $cancel_name,
			'remove_item_name' => $remove_item_name,
			'remove_item_icon' => $remove_item_icon,
			'options' => $options));
	}
} else {
	include_partial("{$module_name}/basket_show_closed", array($singular_name => $object,
		'basket_key' => $basket_key,
                                    'search_url' => $search_url,
                                    'open_name'  => $open_name,
                                    'options'    => $options));
}
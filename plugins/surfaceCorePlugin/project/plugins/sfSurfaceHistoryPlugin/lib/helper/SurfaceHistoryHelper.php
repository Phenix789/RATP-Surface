<?php

function navigate_button_to_function($name, $function, $html_options = array()) {
        $html_options = _parse_attributes($html_options);

        $html_options = array_merge(array('onclick' => $function . '; return false;',
                        'type' => 'button',
                        'value' => $name),
                        $html_options);

        return tag('input', $html_options);
}

function navigate_button_to_remote($name, $target, $url, $image = null, $image_grayed = null, $enable = true, $options = array(), $html_options = array()) {

        $options = array_merge(array('url' => $url,
                        'script' => true,
                        'update' => $target,
                        'method' => 'get',
                        'loading' => "SetCursorWait();",
                        'complete' => "SetCursorNormal();",
                        ),
                        $options);

        if(($image != null) || ( ($image_grayed != null) && ! $enable)) $html_options = array_merge(array('type' => 'image',
                                'src' => $enable ? $image : $image_grayed,
                                'alt' => $name,
                                'title' => $name
                                ),
                                $html_options);
        if(!$enable) $html_options = array_merge($html_options, array('DISABLED' => true));

        return navigate_button_to_function($name, remote_function($options), $html_options);
}

function navigate_previous_button_remote($label, $target, $html_options = array()) {
        return navigate_button_to_remote($label, $target,
                "sfSurfaceHistoryNavigate/previous?target=" . $target,
                sfConfig::get('sf_surface_history_images_dir') . 'previous.png',
                sfConfig::get('sf_surface_history_images_dir') . 'previous-grayed.png',
                sfSurfaceHistory::hasPrevious($target), $html_options);
}

function navigate_next_button_remote($label, $target, $html_options = array()) {
        return navigate_button_to_remote($label, $target,
                "sfSurfaceHistoryNavigate/next?target=" . $target,
                sfConfig::get('sf_surface_history_images_dir') . 'next.png',
                sfConfig::get('sf_surface_history_images_dir') . 'next-grayed.png',
                sfSurfaceHistory::hasNext($target), $html_options);
}

function navigate_refresh_button_remote($label, $target, $html_options = array()) {
        return navigate_button_to_remote($label, $target,
                "sfSurfaceHistoryNavigate/refresh?target=" . $target,
                sfConfig::get('sf_surface_history_images_dir') . 'reload.png',
                null, true, $html_options);
}

function navigate_close_button_remote($label, $target, $url, $html_options = array()) {
        return navigate_button_to_remote($label, $target,
                $url,
                sfConfig::get('sf_surface_history_images_dir') . 'close.png',
                null, true, array(), $html_options);
}

function navigate_list_button_remote($label, $target, $url, $html_options = array()) {
        return navigate_button_to_remote($label, $target,
                $url,
                sfConfig::get('sf_surface_history_images_dir') . 'list.png',
                null, true, array(), $html_options);
}


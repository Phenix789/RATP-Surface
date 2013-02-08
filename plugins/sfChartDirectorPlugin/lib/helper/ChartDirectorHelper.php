<?php

function chartdirector_display($width, $height, $src) {
    return tag('img', array('src'   => $src,
                            'style' => "width: ".$width."px; height: ".$height."px;"
			));
}
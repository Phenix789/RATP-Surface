<?php

function stat_use_theme($theme = null) {
	use_stylesheet('/surfaceStatPlugin/css/surfaceStatPlugin.css', 'last');
	use_javascript('/surfaceStatPlugin/js/sorttable.js');
}
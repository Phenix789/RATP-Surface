<?php

sfLoader::loadHelpers($use_helpers, $module_name);
surface_include_component($module_name, $component_name, getCurrentViewParameters());
use_helper('Function');
echo _surface_callbacks_for_list_update($callbacks);

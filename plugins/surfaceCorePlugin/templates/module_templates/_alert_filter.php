<?php
echo surface_checkbox_tag('filters[sf_alert_plugin]', 1, (isset($filters['sf_alert_plugin']) && ($filters['sf_alert_plugin'] == 1)));
echo surface_label_for_checkbox_tag(get_id_from_name('filters[sf_alert_plugin]'), __('alert is active'));

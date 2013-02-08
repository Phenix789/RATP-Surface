<?php use_helper('Alert'); ?>
<?php if ($load) : ?>
    <?php if ($load == 'object' && isset($alert_object)) : ?>
        <?php surface_include_component('alert', 'objectAlerts', array('alert_object' => $alert_object)); ?>
    <?php elseif ($load == 'all') : ?>
        <?php surface_include_component('alert', 'dashboardAlertsWithColumns'); ?>
    <?php endif; ?>
<?php else : ?>
    <?php echo javascript_tag("Dialog.cancelCallback();"); ?>
    <?php echo javascript_tag("if ($('alerts_target') != undefined ) { surface.link_to('alert/refresh?alert_id=".$alert_id."&load=object','alerts_target') }
                              else { surface.link_to('alert/refresh?alert_id=".$alert_id."&load=all','dashboard_alerts') } "); ?>
    
<?php endif; ?>
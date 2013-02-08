
<div class="action_wrapper">
    <ul>
        <li class="float-left">
          <?php if ($alert->getId()): ?>
            <?php echo surface_button_to(__('acquit'),
                                         'alert/acquit2?id='.$alert->getId(),
                                         'tg_east',
                                         false,
                                         array ('component_class_update' => 'alert',),
                                         array ('post' => true,
                                                'class' => 'alert_acquit',)) ?>
          <?php endif; ?>
        </li>
        <li>
          <?php echo surface_button_to(__('cancel'),
                                     'alert/cancel?id='.$alert->getId(),
                                     'tg_east',
                                     false,
                                     array (),
                                     array ('class' => 'sf_admin_action_cancel',)) ?>
        </li>
    </ul>
</div>

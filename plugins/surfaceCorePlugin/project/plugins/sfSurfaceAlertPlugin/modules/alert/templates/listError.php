<?php if($sf_request->hasError('collaborateur non attibué')): ?>
<ul class="system_messages">
    <li class="red"><span class="ico"></span>
        <dl>
        <?php foreach ($sf_request->getErrorNames() as $name): ?>
          <?php if (isset($labels[$name])): ?>
            <dt><?php echo __($labels[$name]) ?></dt>
          <?php else: ?>
            <dt><?php echo __($name) ?></dt>  
          <?php endif; ?>
          <dd><?php echo $sf_request->getError($name) ?></dd>
        <?php endforeach; ?>
        </dl>
    </li>
</ul>        
<?php endif ?>
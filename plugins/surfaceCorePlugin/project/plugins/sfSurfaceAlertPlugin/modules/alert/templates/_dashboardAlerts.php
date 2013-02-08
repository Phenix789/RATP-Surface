<?php use_helper('Alert'); ?>

<?php $lastModelClass='';$modelId=1?>   

<div class="alert_type_target_object" id="alert_type_target_object_<?php echo $modelId;?>">
 
<?php foreach($alerts as $alert):?>
    <?php if($alert->getModelClass()!=$lastModelClass ):?>       
        <?php if($lastModelClass!=''): ?>
            <?php $modelId++; ?>
            </div>
            <div class="alert_type_target_object" id="alert_type_target_object_<?php echo $modelId;?>">
        <?php endif ?>
        
        <?php $lastModelClass=$alert->getModelClass();?>
        <h3>
            Rappels <?php echo $lastModelClass; ?>
        </h3>
        
    <?php endif ?>
    
    <?php echo alert_detail($alert,"alert_type_target_object_".$modelId,1,$sf_user->hasCredential('alert/admin'), $sf_user->getCollaboratorId());?>
<?php endforeach ?>
</div>
<br style="clear:both;" />            
           
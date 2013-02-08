
<div class="social_comment" id="social_comment">
	
	<div style="width: 100%;">
		<?php if($nb_comments > $nb_current_comments && $nb_comments > 5){   ?>
			<?php	$limit =$limit+5;
				echo surface_form_to('surfaceComment/comment?object_name='.getclass($object).'&object_id='.$object->getId().'&limit='.$limit, 'social_comment');
			?>
			<a onclick="surface.submitNearestForm(this);; return false;" href="#">Voir les messages plus anciens</a>
			
			</form>
		<?php } ?>

		
		<!--<div style="width: 80%; float:left; text-align:right;"> <?php echo ($nb_comments>1) ? $nb_current_comments. ' / '. $nb_comments." <b>commenatires</b>" : $nb_current_comments. ' / '.$nb_comments ." <b>commentaire</b>"; ?></div>-->
	
	</div>
	<div class="social_comment_list" style="width: 385px; padding-bottom: 2px;">
		<?php foreach ($comments as $comment) : ?>
			<?php 
				$avatar = null;
				$collaborator_name = 'Anonyme';
				if($collaborator= CollaboratorPeer::retrieveByPK($comment->getCollaboratorId())) {
					$avatar = $collaborator->getAvatar();
					$collaborator_name = $collaborator->getFriendlyName();
				}
				if (!$avatar) {
					$avatar = '/surfaceSocialPlugin/images/avatar.png';
				}

			?>
			<div class="social_comment_detail" style="color: #666; float: left; margin-bottom: 7px;width: 100%">
				<img src="<?php echo $avatar  ?>" alt="<?php echo ($collaborator);  ?>" style="float: left; padding: 3px; width:35px; height:35px; border-radius: 5px 5px 5px 5px;" />
				<div style="float: left; padding-left: 6px;  width: 81%; line-height:1.1em;box-shadow: 0px 0px 1px 0 #aaa; min-height:39px;margin-left:5px;border-radius: 4px;width:85%;">
					<div style="font-weight:bold; padding:3px 0px;">
						<?php echo $collaborator_name ?> 
						<span style='font-weight:normal'>le <?php echo $comment->getCreatedAt(); ?></span>
					</div>
					<?php echo $comment->getComment(); ?>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="my_comment" id="my_comment"></div>
	
	<div class="clear"></div>
	<div style="margin-top: 8px; width: 100%;">

		<?php echo surface_form_to('surfaceComment/comment?object_name='.getclass($object).'&object_id='.$object->getId(), 'social_comment'); ?>
			<span style="float:left; margin-right:5px">
				<?php echo input_tag('sfc_comment[comment]', '', array('style' => 'width: 300px;','class'=>'input_text')); ?>
			</span>

			<span class="button simple">
				<a onclick="surface.submitNearestForm(this);; return false;" href="#">OK</a>
			</span>
		</form>
	</div>
</div>
<?php use_helper('Menu', 'Date', 'Alert') ?>
<div class="portal_inner" style="padding-top:20px;">
	<div style="float:left;" >
		<div class="portal_box single" id="welcome">
			<div class="title_wrapper">
				<h3 class="today"><?php echo format_date(time(), 'P') ?></h3>
			</div>
			<?php echo image_tag($logo, $logo_options) ?>
			<p>
				<?php if($msg_active && $sf_user->hasCredential($msg_allow)) { echo DashboardMessagePeer::getLastMessage(); } ?>
			</p>
			<p>
			<img src="<?php echo $sf_user->getAvatar() ?>" alt="avatar" style="float: left; padding: 3px; width:70px; height:70px; border-radius: 5px 5px 5px 5px;" />
			Bienvenue 
			<?php if ($collaborator = $sf_user->getProfile()) :?>				
				<strong><?php echo $collaborator->getFriendlyName() ?></strong><br/>
				<small>Dernière connexion le <?php echo $sf_user->getGuardUser()->getLastLogin('d/m/Y à H:i'); ?></small>
				<?php echo surface_link_to('Modifier mon profil', 'collaborator/edit?id='.$collaborator->getId(), 'tg_east'); ?>
			<?php else :?>
				<strong><?php echo $sf_user->getGuardUser()->getUsername() ?></strong><br/>
				<small>Dernière connexion le <?php echo $sf_user->getGuardUser()->getLastLogin('d/m/Y à H:i'); ?></small>
					
			<?php endif ?>
			</p>
		</div>
		<div class="portal_box double">
			<div class="title_wrapper">
				<h3>Accès rapides à vos applications</h3>
			</div>
			<div class="portal_box_content">
				<?php echo menu_tag(sfcMenu::getInstance('speed_access')) ?>
			</div>
		</div>


	</div>
</div>
<div class="clear"></div>

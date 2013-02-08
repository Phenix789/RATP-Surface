<?php use_helper('Theme');  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	<link rel="shortcut icon" href="/images/favicon.ico" />
	<?php
		echo surface_layout_header(SURFACE_LOADCTRL_CALENDAR | SURFACE_LOADCTRL_TINYMCE);

		//CSS DASHBOARD
		use_theme();
	?>
</head>
<body>
	<!-- BEGIN DASHBORD -->
	<div id="project_menu">
		<div class="inner">
			<div id="logNavigation">
				<?php echo menu_tag(sfcMenu::getInstance('log_navigation')) ?>
			</div>
			<div id="userNavigation">
				<?php echo menu_tag(sfcMenu::getInstance('user_navigation')) ?>
			</div>
			<div id="notices">
			</div>
			<div id="surface_loading" style="display: none; position: absolute; width: 220px; top: 30px; right: 10px;">
				<?php echo image_tag("/sfSurfaceHistoryPlugin/images/barre.gif"); ?>
			</div>
			<div id="main_menu">
				<?php echo menu_tag(sfcMenu::getInstance('main_menu')) ?>
			</div>
			<div id="appNavigation">
				<?php echo menu_tag(sfcMenu::getInstance('app_navigation')) ?>
			</div>
			<div id="eastNavigation">
				<?php echo menu_tag(sfcMenu::getInstance('east_navigation')) ?>
			</div>
		</div>
	</div>
	<!-- END DASHBORD -->

	<!-- BEGIN SURFACE -->
	<div id="center">
		<div id="tg_center">
			<?php if (has_slot('tg_center')) : ?>
				<?php include_slot('tg_center'); ?>
			<?php endif; ?>
		</div>
		
	</div>
	<div id="east">
		<div id="tg_east">
			<?php if (has_slot('tg_east')) : ?>
				<?php include_slot('tg_east'); ?>
			<?php endif; ?>
		</div>
		
	</div>

	<?php
	echo surface_layout_init(
				array(),					//CENTER
				null,						//NORTH
				array(						//SOUTH
					'contentEl'	=> 'south',
					'id'		=> null,
					'title'		=> '',
					'autoScroll'	=> true,
					'items'		=>  null,
				),
				array(						//WEST
					'id'		=> null,
					'contentEl'	=> 'west',
					'title'		=> '',
					'split'         => false,
					'collapsible'   => false,
					'collapsed'    	=> false,
					'items'		=> null,
					'width'         => 0,
				),
				array(						//EAST
					'title'		=> '',
					'split'		=> true,
					'minSize'	=> 200,
					'maxSize'	=> 800,
				)
			);
	?>
	<?php echo javascript_tag("surface.layout_top = 96; surface.layout.updateLayoutSize();") ?>
	<!-- END SURFACE -->

	<?php if (has_slot('permalink_actions')) : ?>
	    <?php include_slot('permalink_actions'); ?>
	<?php endif; ?>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<link rel="shortcut icon" href="/images/favicon.ico" />
		<?php
		include_http_metas();
		include_metas();
		include_title();
		surface_layout_header(SURFACE_LOADCTRL_CALENDAR | SURFACE_LOADCTRL_TINYMCE | SURFACE_LOADCTRL_COLORPICKER);
		use_theme();
		?>
	</head>
	<body>
		<script>surface.sfController = '<?php echo $_SERVER['SCRIPT_NAME'] ?>';</script>
		<table id="surface_layout" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td id="top_menu_bar" colspan="2">
						<?php if (file_exists(SF_ROOT_DIR . '/web/images/logo-top.png')) : ?>
							<div id="logo-top">
								<img src='images/logo-top.png' ></div>
							</div>
						<?php endif ?>
						<div id="logNavigation" class="no_loading_mask" style="position:absolute;"><?php echo cart_menu_tag() ?></div>
						<div id="userNavigation"><?php echo menu_tag('user_navigation') ?></div>
						<div id="surface_loading" style="display:none;">	</div>
						<div id="notices" class="no_loading_mask"></div>
						<div id="main_menu"><?php echo menu_tag('main_menu') ?></div>
					</td>
				</tr>
				<tr>
					<td id="center">
						<div id="appNavigation">
							<?php echo menu_tag('app_navigation') ?>
							<div class="clear"></div>
						</div>
						<div id="tg_center">
							<?php has_slot('tg_center') ? include_slot('tg_center') : null ?>
						</div>
					</td>
					<td id="east" style="display:none;">
						<div id="eastNavigation">
							<?php echo menu_tag('east_navigation') ?>
							<div class="clear"></div>
						</div>
						<div id="tg_east">
							<?php has_slot('tg_east') ? include_slot('tg_east') : null ?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<?php has_slot('permalink_actions') ? include_slot('permalink_actions') : null ?>
		<div id="lightbox">
			<span></span>
			<div class="container">
				<div class="header">
					<a title="<?php echo _('reload') ?>" class="button_reset_filter action_img" href="#" onclick="surface.link_to(surface.getLastLightboxUrl(),'tg_lightbox');return false;"></a>
					<a title="<?php echo _('close') ?>" class="sf_admin_action_delete action_img" href="#" onclick="surface.link_to('default/blank?skipNav=true','tg_lightbox');return false;"></a>
				</div>
				<div id="tg_lightbox"></div>
			</div>
		</div>
		<script>
			surface.resizeScreen();
			window.onresize = surface.resizeScreen;
		</script>
	</body>
</html>
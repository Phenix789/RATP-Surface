<?php if($sf_user->getAttribute('mailling_list_reload_cart', false, 'surface_contact')) : ?>
	<?php use_helper('Cart', 'Notice') ?>
	<?php echo cart_update_menu_tag() ?>
	<?php
		$notice = new Notice('Contacts ajoutés à la session.');
		$notice->setIsUpdate(true);
		echo $notice;
	?>
	<?php $sf_user->getAttributeHolder()->remove('mailling_list_reload_cart', 'surface_contact') ?>
<?php endif ?>
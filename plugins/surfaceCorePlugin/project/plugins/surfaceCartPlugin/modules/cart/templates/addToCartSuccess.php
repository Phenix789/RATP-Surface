<?php use_helper('Cart') ?>
<?php echo cart_notice_add_to_cart_tag($cart, $cart_object) ?>
<?php echo cart_update_menu_tag() ?>
<?php echo cart_update_object_action_tag($cart_object, $refresh_id) ?>
<?php echo cart_update_show_object_action_tag($cart_object, $refresh_id) ?>
<?php echo cart_partial_success_tag($cart, $cart_object) ?>
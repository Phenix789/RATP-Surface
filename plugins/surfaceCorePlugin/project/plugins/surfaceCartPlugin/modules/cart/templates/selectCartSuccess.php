<?php
/**
 * @brief
 * @author Claude <claude@elogys.fr>
 */

 /**
  * Attributs :
  *
  */
?>
<?php use_helper('Cart') ?>
<?php echo cart_notice_select_cart_tag($cart) ?>
<?php echo cart_update_menu_tag() ?>
<?php echo cart_update_action_select_cart_tag($cart, $old_cart) ?>
<?php
/**
 * @brief
 * @author Claude <claude@elogys.fr>
 * 
 */

 /**
  * Attributs :
  * @var 
  */
?>
<?php use_helper('Cart') ?>
<?php echo cart_update_menu_tag() ?>
<?php echo cart_notice_remove_multiple_from_cart_tag($cart, $count) ?>
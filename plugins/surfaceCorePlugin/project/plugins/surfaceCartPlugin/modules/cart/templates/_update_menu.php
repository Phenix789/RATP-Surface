<?php use_helper('Menu', 'Cart') ?>
<?php
	$menu = sfcMenu::getInstance('log_navigation');
//	if($cart->getId() != $sf_user->getCart()->getId()) {
//		$item = new sfcMenuItem('menu_cart');
//		$item->setLabel(__('Grab into my session'));
//		$item->setIsAjax(false);
//		foreach($cart->getStatistic() as $cart_item_name => $cart_item_count) {
//			$sub_item = new sfcMenuItem('sub_nav_' . $cart_item_name);
//			$sub_item->setLabel($cart_item_count . ' ' . cart_get_name($cart_item_name, $cart_item_count > 1));
//			$sub_item->setIsAjax(true);
//			$sub_item->setSkipNavigate(true);
//			$sub_item->setLink('cart/copyToMyCart?from_cart_id=' . $cart->getId() . '&object_name=' . $cart_item_name);
//			$sub_item->setTarget('notices');
//			$item->addItem($sub_item);
//		}
//		$menu->addItem($item);
//	}
	echo menu_update_tag($menu);
?>
<div style="border: groove 1px #CCCCCC;">
<h4>Sélectionnez les éléments à associer dans la liste de gauche...</h4>

[?php $items = $basket->getItems(); ?]
<ul>
[?php foreach ($items as $item): ?]
    <li style="vertical-align: middle;">
        [?php echo surface_basket_remove_item( __($remove_item_name),
                                               $basket->getKey(),
                                               $item,
                                               '<?php echo $this->getModuleName() ?>',
                                               '<?php echo $this->getPrimaryKeyUrlParams(); ?>,
                                               $search_url,
                                               $remove_item_icon
        ); ?]
        <span style="vertical-align: middle; padding-left: 1px;">[?php echo $item; ?]</span>
    </li>
[?php endforeach; ?]
</ul>


<ul>
    [?php if ($close_name): ?]
    <li style="float: right;">
        [?php echo surface_basket_close_link(   __($close_name),
                                                $basket->getKey(),
                                                '<?php echo $this->getModuleName() ?>',
                                                '<?php echo $this->getPrimaryKeyUrlParams(); ?>
        ); ?]
    </li>
    [?php endif; ?]
    [?php if ($cancel_name): ?]
    <li style="float: right;">
        [?php echo surface_basket_cancel_link(  __($cancel_name),
                                                $basket->getKey(),
                                                '<?php echo $this->getModuleName() ?>',
                                                '<?php echo $this->getPrimaryKeyUrlParams(); ?>
        ); ?]
    </li>
    [?php endif; ?]

</ul>
<BR style="clear: both;"/>

</div>
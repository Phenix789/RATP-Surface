<div id="<?php echo $singular_name ?>_create_parent_node_id">
	<?php surface_include_component('node', 'parent_selector', array('node_type' => $node->getNodeType(), 'selected_parent_node_id' => $node->getParentId(), 'singular_name' => $singular_name, 'include_blank' => $tree_include_blank)) ?>
</div>
<?php
if(!isset($node)){
	$node = getCurrentViewParameter('node', $object->getFirstNodeOrCreate());
}
$js = "if(confirm('Attention, cette action peut engendrer des comportements imprévus, êtes-vous sûr de vouloir modifier le type de l\'objet ?')){this.style.display='none';}";
echo '<div class="select_mask"><span onclick="'.$js.'"></span>';
$js = "surface.updateParentNodeSelector(this, '{$singular_name}', '{$singular_name}_edit_parent_node_id', '{$node->getParentId()}')";
echo surface_select_tag($singular_name.'[node_type_id]', node_type_options_for_select($node), array('onclick'=>$js, 'onchange'=>$js));
echo '</div>';

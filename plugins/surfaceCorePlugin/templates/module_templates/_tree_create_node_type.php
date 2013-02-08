<?php
$js = "if(confirm('Attention, cette action peut engendrer des comportements imprévus, êtes-vous sûr de vouloir modifier le type de l\'objet ?')){this.style.display='none';}";
echo '<div class="select_mask"><span onclick="'.$js.'"></span>';
$js = "surface.updateParentNodeSelector(this, '{$singular_name}', '{$singular_name}_create_parent_node_id', '{$node->getParentId()}')";
echo surface_select_tag($singular_name.'[node_type_id]', options_for_node_type_select(NodeTypePeer::doSelect(NodeTypePeer::getCriteriaForObjectName($object)), $object->getNodeTypeId(), $object->getNodeTypeId()), array('onclick'=>$js, 'onchange'=>$js));
echo '</div>';
?>
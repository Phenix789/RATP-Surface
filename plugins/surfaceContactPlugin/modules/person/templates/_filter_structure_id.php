<?php
/**
 * @brief
 * @author Claude <claude@elogys.fr>
 * 
 */

 /**
  * Attributs :
  * @var $filters Tableau des filtres
  */
?>
<?php
	$criteria = new Criteria();
	$criteria->addAscendingOrderByColumn(StructurePeer::NAME);
	$structures = StructurePeer::doSelect($criteria);
	$options = objects_for_select($structures, 'getId', '__toString', isset($filters['parent_id']) ? $filters['parent_id'] : null, array('include_blank' => true));
	echo surface_select_tag('filter[parent_id]', $options);
?>
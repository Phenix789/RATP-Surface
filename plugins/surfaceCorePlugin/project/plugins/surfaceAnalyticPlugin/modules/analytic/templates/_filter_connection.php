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
<?php echo surface_select_tag('filters[connection][]', options_for_select(e_ANALYTIC_CONNECTION_ERROR::getList(), isset($filters['connection']) ? $filters['connection'] : null), array('include_blank' => true, 'multiple' => 'multiple', 'size' => 5)) ?>
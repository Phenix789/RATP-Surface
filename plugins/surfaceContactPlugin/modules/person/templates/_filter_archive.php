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
<?php echo surface_checkbox_tag('filter[archive]', 1, isset($filters['archive']) ? $filters['archive'] : null) ?>
<?php echo surface_label_for_checkbox_tag(get_id_from_name('filter[archive]'), __('including archived contacts.')) ?>
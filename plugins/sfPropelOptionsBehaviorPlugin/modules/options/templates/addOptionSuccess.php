<?php
/**
 * @brief Vue de l'action addOption
 * @author Claude <claude@elogys.fr>
 */

 /**
  * Attributs :
  * @param string $class class de l'objet auquel appartient la futur option
  * @param string $field partie du nom des champs de saisie
  */
?>
<?php use_helper('SOptions') ?>
<?php echo add_option_tag($class, $field) ?>
<?php
/**
 * @brief
 * @author Claude <claude@elogys.fr>
 */

 /**
  * Attributs :
  * @var $analytic Objet en cours
  */
?>
<?php $percent = ($analytic->getScreenWidth() * $analytic->getScreenHeight()) ? round($analytic->getScreenInnerWidth() * $analytic->getScreenInnerHeight() * 100 / ($analytic->getScreenWidth() * $analytic->getScreenHeight()), 0) : '~' ?>
<?php echo $analytic->getScreenInnerWidth() . ' x ' . $analytic->getScreenInnerHeight() . ' (' . $percent . '%)' ?>

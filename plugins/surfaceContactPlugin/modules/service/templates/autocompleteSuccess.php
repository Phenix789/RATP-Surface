<?php
/**
 * @brief View Vue de l'action autocomplete
 * @author Claude <claude@elogys.fr>
 * 
 */

 /**
  * Attributs :
  * @var $services La liste des services correspondant a la recherche
  */
?>
<ul>
<?php foreach($services as $service) : ?>
	<li><?php echo $service ?></li>
<?php endforeach ?>
</ul>
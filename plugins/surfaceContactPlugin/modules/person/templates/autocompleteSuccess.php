<?php
/**
 * @brief View Vue de l'action autocomplete
 * @author Claude <claude@elogys.fr>
 * 
 */

 /**
  * Attributs :
  * @var $persons La liste des personnes correspondant a la recherche
  */
?>
<ul>
<?php foreach($persons as $person) : ?>
	<li><?php echo $person ?></li>
<?php endforeach ?>
</ul>
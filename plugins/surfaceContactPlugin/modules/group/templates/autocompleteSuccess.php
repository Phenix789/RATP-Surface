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
<?php foreach($groups as $group) : ?>
	<li><?php echo $group ?></li>
<?php endforeach ?>
</ul>
<?php
/**
 * @brief
 * @author Claude <claude@elogys.fr>
 * 
 */

 /**
  * Attributs :
  * @var 
  */
?>
<?php
	$groups = $structure->getGroups();
	$implode = array();
	foreach($groups as $group) {
		$implode[] = $group->getName();
	}
	echo implode(', ', $implode);
?>
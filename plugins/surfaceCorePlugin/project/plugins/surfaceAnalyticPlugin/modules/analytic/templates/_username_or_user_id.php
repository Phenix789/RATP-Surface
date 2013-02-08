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
<?php
	if($analytic->getUserId() && $user = sfGuardUserPeer::retrieveByPK($analytic->getUserId())) {
		echo surface_link_to((string) $user, 'sfGuardUser/show?id=' . $user->getId(), 'tg_east');
	}
	else {
		echo $analytic->getUsername();
	}
?>

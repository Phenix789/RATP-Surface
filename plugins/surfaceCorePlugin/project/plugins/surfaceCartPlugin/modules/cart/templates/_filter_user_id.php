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
	$selected = isset($filters['user_id']) ? $filters['user_id'] : $sf_user->getGuardUser()->getId();
	$users = sfGuardUserPeer::doSelect(new Criteria());
	$options = array();
	foreach($users as $user) {
		$options[$user->getId()] = $user->getProfileName();
	}
	asort($options);
	$options = options_for_select($options, $selected);
	$options = '<option value="all"></option>' . $options;
	echo select_tag('filters[user_id]', $options);
?>
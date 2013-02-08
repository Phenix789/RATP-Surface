<?php
/**
 * @brief Helper pour le plugin sfGuard
 *
 * @author Claude Ramseyer <claude@elogys.fr>
 * @date 18 aout 2010
 *
 */

function sf_guard_link_to_profile(sfGuarduser $user) {
	if($user->hasProfile()) {
		$profile = $user->getProfile();
		$config = sf_guard_get_profile_config(getclass($profile));
		$module = get('module', $config, sfInflector::underscore(getclass($profile)));
		$app = get('app', $config, SF_APP);
		return surface_link_to($profile, $module . '/show?id=' . $profile->getId(), $app . '|tg_east');
	}
	return surface_null_value(__('no profile.'));
}

function sf_guard_autocomplete_profile(sfGuardUser $user, $name = 'sf_guard_user[collaborator_id]') {
	$profile = $user->getProfile();
	$config = sf_guard_get_profile_config(getclass($profile));
	$module = get('module', $config, 'collaborator');
	$autocomplete = get('autocomplete', $config, 'autocomplete');
	return input_auto_complete_peer_tag($name, $profile ? $profile->getId() : null, $profile, $module . '/' . $autocomplete);
}

function sf_guard_get_profile_config($class) {
	$config = sfConfig::get('app_sf_guard_plugin_profile');
	$default = get('default', $config, array());
	$spec = get($class, $config, array());
	return array_merge($default, $spec);
}

/******************************************************************************/
		/******/
		/*Menu*/
		/******/
/******************************************************************************/

function sf_guard_menu_user_info_tag(sfcMenuItem $menu) {
	$user = sfContext::getInstance()->getUser();
	$name = $user->getGuardUser()->getProfileName();
	$menu->setLabel('Profil : ' . $name);
       	$menu->setIsAjax(false);
	$menu->setClass('connect');
	$menu->setRender(null);
	if($user->hasSudo()) {
		$menu->setIcon('/'.sfConfig::get('app_surface_theme_library', 'sfcThemePlugin').'/common/icons/super_users.png');
	}
	else {
		$menu->setIcon('/'.sfConfig::get('app_surface_theme_library', 'sfcThemePlugin').'/common/icons/user.png');
	}
	return _menu_item_tag($menu);
}

function sf_guard_menu_sudoer_tag(sfcMenuItem $item) {
	$user = sfContext::getInstance()->getUser();
	if($user->isSudoer()) {
		if($user->hasSudo()) {
			$item->setLabel('Revenir en droits restreints');
			$item->setIcon('/'.sfConfig::get('app_surface_theme_library', 'sfcThemePlugin').'/common/icons/user.png');
			$item->setLink('sfGuardAuth/lostSudo');
		}
		else {
			$item->setLabel('Basculer en droits étendus');
			$item->setIcon('/'.sfConfig::get('app_surface_theme_library', 'sfcThemePlugin').'/common/icons/super_users.png');
			$item->setLink('sfGuardAuth/sudo');
		}
		return _menu_item_tag($item);
	}
	return '';
}

function sf_guard_menu_change_password_tag(sfcMenuItem $item) {
	return content_tag('li',
		surface_link_to($item->getLabel(), $item->getLink(), $item->getTarget(), false, array('popup_width' => 220, 'popup_height' => 230), array()),
		array('class' => $item->getClass()));
}

function sf_guard_menu_clear_cache_tag(sfcMenuItem $item) {
	$user = sfContext::getInstance()->getUser();
	if($user->isSuperAdmin() || $user->isSudoer()) {
		return _menu_item_tag($item);
	}
	return '';
}

/******************************************************************************/
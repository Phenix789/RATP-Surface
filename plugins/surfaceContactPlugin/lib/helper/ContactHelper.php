<?php
/**
 * @brief Helper Contact
 * @package Plugin
 * @subpackage surfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 fevrier 2010
 * @version 1.0
 *
 */

function contact_namespace_select_tag($object, $name) {
	$config = $object->getConfig();
	$namespaces = get('namespace', $config, array());
	$options = array();
	foreach($namespaces as $namespace) {
		$options[$namespace] = __($namespace);
	}
	$options = options_for_select($options, $object->getNameSpace());
	return surface_select_tag($name . '[name_space]', $options);
}

function contact_group_select_tag(Contact $contact, $name, $custom = false, $default = array()) {
	$groups = ContactPeer::doSelectGroup(new Criteria(), $contact);
	$config = $contact->getConfig();
	$contact_groups = $contact->getGroups();
	if(!$contact_groups) { $contact_groups = $default; }
	if(isset($config['group']['multiple']) && $config['group']['multiple']) {
		$selected = array();
		foreach($contact_groups as $contact_group) {
			$selected[] = $contact_group->getId();
		}
		$html = "";
		foreach($groups as $group) {
			$checkbox = surface_checkbox_tag($name . '[]', $group->getId(), in_array($group->getId(), $selected));
			$label = surface_label_for(get_id_from_name($name) . '_' . $group->getId(), $group->getName());
			$html .= content_tag('li', $checkbox . $label);
		}
		return content_tag('ul', $html);
	}
	else {
		if(is_array($contact_groups) && count($contact_groups) > 0) {
			$contact_groups = $contact_groups[0];
		}
		$options = objects_for_select($groups, 'getId', '__toString', $contact_groups ? $contact_groups->getId() : null, array('include_custom' => $custom));
		return surface_select_tag($name, $options);
	}
}

function contact_group_filter_tag($type, $selected = null, $name = 'filters[group]', $multiple = false) {
	$groups = GroupPeer::doSelectTypeGroup(new Criteria(), $type);
	if($multiple) {
		if(!is_array($selected)) { $selected = array($selected); }
		$html = "";
		foreach($groups as $group) {
			$html .= content_tag('li', surface_checkbox_tag($name . '[]', $group->getId(), in_array($group->getId(), $selected)) . surface_label_for(get_id_from_name($name) . '_' . $group->getId(), $group));
		}
		return content_tag('ul', $html);
	}
	else {
		$options = objects_for_select($groups, 'getId', '__toString', $selected, array('include_blank' => true));
		return surface_select_tag($name, $options);
	}
}

function contact_civility_select_tag($name, $type, $options = array()) {
	$default_options = array('include_blank' => true);
	$options = array_merge($default_options, $options);
	$civilities = CivilityPeer::doSelectTypeCivility(new Criteria(), $type);
	$civilities = objects_for_select($civilities, get('value_method', $options, 'getId'), get('text_method', $options, '__toString'), get('selected', $options), $options);
	return surface_select_tag($name, $civilities, $options);
}

function contact_civility_genre_select_tag($civility, $name = 'civility[genre]', $options_tag = array()) {
	$options_tag['include_blank'] = true;
	$config = $civility->getConfig();
	$genres = get('genre', $config, array(0=>'--', 1=>'Masculin', 2=>'Féminin'));
	$options = options_for_select($genres, $civility->getGenre(), $options_tag);
	return surface_select_tag($name, $options);
}

function contact_civility_genre_filter_select_tag($filter, $name = 'genre') {
	$config = sfConfig::get('app_contact_civility', array());
	$options = options_for_select(get('genre', $config, array()), get($name, $filter), array('include_blank' => true));
	return surface_select_tag('filters[' . $name . ']', $options);
}

function contact_civility_show_genre($civility) {
	$config = $civility->getConfig();
	$config = array_merge(array('genre' => array(0=>'--', 1=>'Masculin', 2=>'Féminin')), $config);
	return get(array('genre', $civility->getGenre()), $config);
}

function contact_get_config($type) {
	$config = sfConfig::get('app_contact_inheritance');
	return get($type, $config, array());
}

/******************************************************************************/

function contact_parent_select_tag(Contact $contact, $name) {
	$config = $contact->getConfig();
	$config_parent = get('parent', $config);
	$multiple = get('multiple', $config_parent, false);
	$url = get('autocomplete_url', $config_parent);
	$tag_options = get('tag_options', $config_parent, array());
	$completion_options = array_merge(get('completion_options', $config_parent, array()), array('add_url' => get('add_url', $config_parent)));
	if($multiple) {
		$values = array();
		foreach($contact->getParents() as $parent) {
			$values[$parent->getId()] = $parent;
		}
		return input_autocomplete_list_tag($name . '[parents][]', $values, $url, $tag_options, $completion_options);
	}
	else {
		$parent = $contact->getParent();
		return input_auto_complete_peer_tag($name . '[parent_id]', $contact->getParentId(), $parent, $url, $tag_options, $completion_options);
	}
}

function contact_add_parent_with_role_tag(Contact $contact, $label, $button = true, $url = 'contact_multiple/create', $target = 'div_add_parent') {
	if($button) {
		$html = surface_button_to($label, $url . '?contact_id=' . $contact->getId(), $target, true, array(), array('class' => 'sf_admin_action_create'));
	}
	else {
		$html = surface_link_to('', $url . '?contact_id=' . $contact->getId(), $target, true, array(), array('class' => 'sf_admin_action_create action_img', 'title' => $label));
	}
	$div_add = content_tag('div', null, array('id' => 'div_add_parent'));
	return $html . $div_add;
}

function contact_add_contact_with_role_tag(Contact $contact, $label, $url = 'contact_multiple/create', $target = 'div_add_parent') {
	$button = surface_button_to($label, $url . '?parent_id=' . $contact->getId(), $target, true, array(), array('class' => 'sf_admin_action_create'));
	$div_add = content_tag('div', null, array('id' => 'div_add_parent', 'style' => 'min-height: 5px; margin-top: 30px;'));
	return $button . $div_add;
}

function contact_list_parent_component_tag(Contact $contact, $componentName = 'list_parent_with_role', $moduleName = 'contact_multiple') {
	$criteria = new Criteria();
	$criteria->add(ContactMultiplePeer::CONTACT_ID, $contact->getId());
	return surface_get_component($moduleName, $componentName, array('criteria' => $criteria));
}

function contact_list_contact_component_tag(Contact $contact, $componentName = 'list_contact_with_role', $moduleName = 'contact_multiple') {
	$criteria = new Criteria();
	$criteria->add(ContactMultiplePeer::PARENT_ID, $contact->getId());
	return surface_get_component($moduleName, $componentName, array('criteria' => $criteria));
}
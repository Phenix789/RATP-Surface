<?php

/**
 * @brief Helper Historique
 * @package Plugin
 * @subpackage surfaceHistoryBehavior
 *
 * @author Claude <claude@elogys.fr>
 * @date 16 déc. 2009
 * @version 1.0
 *
 */
/* * *************************************************************************** */
/* * ****************** */
/* Fonctions Publiques */
/* * ****************** */
/* * *************************************************************************** */

/**
 * @brief Helper - Construit le contenue de l'onglet Historique (action et liste)
 * @param $object BaseObject objet portant les historiques
 * @return string code html du composant
 *
 * Cet helper construit tout ce qui est necessaire a l'onglet historique.
 * Composé de trois partie, le bouton 'Créer' pour créer un nouvel historique
 * directement rattaché a l'objet en cours, la section pour recevoir le formulaire
 * d'un nouvel historique et la liste des derniers historiques (composant)
 *
 */
function history_tag(BaseObject $object, $action = true){
	$html = "";
	$html .= content_tag('div', _history_action_tag($object, $action), array('class'=>'history_action', 'id'=>'history_action'));
	$html .= content_tag('div', _history_for_new_tag($object), array('class'=>'history_for_new', 'id'=>'history_for_new_'.getclass($object).'_'.$object->getId()));
	$html .= content_tag('div', _history_list_tag($object), array('class'=>'history_list', 'id'=>'history_list_'.getclass($object).'_'.$object->getId()));
	return content_tag('div', $html, array('class'=>'history_tab', 'id'=>'history_tab'));
}

/**
 * @brief Construit une liste des contacts lié a l'historique
 * @param History $history un historique
 * @return string code html de la liste des contacts
 *
 */
function history_list_contacts_tag(History $history){
	$html = "";
	$contacts = $history->getContacts();
	$config = _history_get_config($history->getObjectName());
	$module = get(array('contact', 'module'), $config, 'contact');
	foreach($contacts as $contact){
		$link = surface_link_to($contact, $module.'/show?object_name='.$history->getObjectName().'&object_id='.$history->getObjectId().'&id='.$contact->getId(), 'tg_east');
		$html .= content_tag('li', (string)$link);
	}
	return content_tag('ul', $html, array('class'=>'history_no_padding'));
}

/* * *************************************************************************** */
/* * **************** */
/* Fonctions Privées */
/* * **************** */
/* * *************************************************************************** */

/**
 * @brief Construit le bouton 'Créer'
 * @param BaseObject $object objet portant les historiques
 * @return string code html du bouton
 *
 */
function _history_action_tag(BaseObject $object, $action = true){
	$config = _history_get_config(getclass($object));
	$actions = (array)SfcUtils::getKey('action_with_create', $config, array('show'));
	if($action && in_array(sfContext::getInstance()->getActionName(), $actions)){
			$target = 'history_for_new_'.getclass($object).'_'.$object->getId();
			return surface_image_actions_tag(array(
						surface_image_action(__('create'), 'history/create?object_name='.getclass($object).'&object_id='.$object->getId(), $target, 'sf_admin_action_create', true)
					));
	}
	return '';
}

/**
 * @brief Contenue de la section pour le formulaire d'un nouvel historique (vide)
 * @param BaseObject $object objet portant les historiques
 * @return string code html
 * 
 */
function _history_for_new_tag(BaseObject $object){
	return '';
}

/**
 * @brief Composant de liste des historiques associés a l'objet
 * @param BaseObject $object objet portant les historiques
 * @return string code html du composant
 *
 * Retourne le code html du composant de liste list_history_ibject definie dans
 * le fichier generator.yml. Celui ci repertorie les derniers historiques rattachés
 * a l'objet en cours
 *
 */
function _history_list_tag(BaseObject $object){
	return surface_get_component('history', 'list_history_object', array('criteria'=>$object->getCriteriaFromHistoryBehavior()));
}

/**
 * @brief Retourne la configuration specifique des historiques pour une class
 * @param string $class Class pour la config spécifique
 * @return array Configuration spécifique
 *
 * Il est possible de définir plusieurs configuration des historiques suivant l'objet
 * sur lesquelles ils portent. Cette fonction retourne la configuration spécifique
 * pour une class donnée en prenant en compte la configuration de base et celle
 * spécifique.
 *
 */
function _history_get_config($class){
	return History::getConfig($class);
}
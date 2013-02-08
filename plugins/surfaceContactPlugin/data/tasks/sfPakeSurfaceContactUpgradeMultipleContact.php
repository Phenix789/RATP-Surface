<?php
/**
 * @brief PakeTask migrant la gestion de contact simple vers les contacts multiples
 * @package Plugin
 * @subpackage SurfaceContact
 *
 * @author Claude <claude@elogys.fr>
 * @date 10 aout 2010
 * @version 1.0
 *
 */

pake_desc('Upgrade to multiple contact');
pake_task('surface-contact-upgrade-multiple', 'project_exists');

/**
 *
 *
 * 
 */
function run_surface_contact_upgrade_multiple($task, $args) {
	_pake_contact_initialize($args);

	pake_echo_action('Upgrade', 'Upgrade to contact multiple.');
	$config = sfConfig::get('app_contact_inheritance');

	$objects = array();
	foreach($config as $class => $class_config) {
		$objects[get('class', $class_config)] = $class;
	}

	foreach($args as $arg) {
		$type_config = get(get($arg, $objects), $config);
		if($type_config) {
			if(get(array('parent', 'multiple'), $type_config)) {
				pake_echo_action(get('class', $type_config), 'Upgrade.');
				$peer = get('peer', $type_config);
				$contacts = call_user_func($peer . '::doSelect', new Criteria());
				//PHP 5.3
				//$contacts = $peer::doSelect(new Criteria());
				$count = count($contacts);
				$up = 0;
				foreach($contacts as $contact) {
					if($contact->getParentId()) {
						$contact_multiple = new ContactMultiple();
						$contact_multiple->setContactId($contact->getId());
						$contact_multiple->setParentId($contact->getParentId());
						$contact_multiple->save();
						$up++;
					}
				}
				pake_echo_comment($up . ' of ' . $count . ' have been upgraded.');
			}
			else {
				pake_echo_action(get('class', $type_config), 'No upgrade because parent/multiple options is false.');
			}
		}
		else {
			pake_echo_action('Error', 'Config not found for ' . $arg);
		}
	}
}

function _pake_contact_initialize(&$args) {
	pake_echo_action('Initialize', 'Initialize symfony and database.');

	$regexp = "#^app=(.*)$#";
	$matches = array();
	foreach($args as $index => $arg) {
		if(preg_match($regexp, $arg, $matches)) {
			unset($args[$index]);
			break;
		}
	}
	$app = get(1, $matches, 'surface');
	pake_echo_comment('Application found : ' . $app);

	define('SF_ROOT_DIR', realpath(dirname(__FILE__).'/../../../..'));
	define('SF_APP', $app);
	define('SF_ENVIRONMENT', 'dev');
	define('SF_DEBUG', true);

	require_once(SF_ROOT_DIR . DIRECTORY_SEPARATOR . 'apps' . DIRECTORY_SEPARATOR . SF_APP.DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php');

	$databaseManager = new sfDatabaseManager();
	$databaseManager->initialize();
}
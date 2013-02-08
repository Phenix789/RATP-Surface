<?php
/**
 * @brief Valide une adresse ip
 * @class IpValidator
 * @package Plugin
 * @subpackage sfGuardPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 3 déc. 2009
 * @version 1.0
 *
 * Valide une ip
 * Une ip bien formée doit contenir quatre nombres compris entre 0 et 255
 * et chaque nombre doit etre séparé par un point
 * Masque: X.X.X.X (X etant compris entre 0 et 255)
 *
 */
class IpValidator extends sfValidator {

/******************************************************************************/
		/*********/
		/*Execute*/
		/*********/
/******************************************************************************/

	public function execute(&$ips, &$error) {
		foreach($ips as $ip) {
			preg_match('#^([0-9]+)*\.([0-9]+)*\.([0-9]+)*\.([0-9]+)*$#', $ip, $res);
			if( !(count($res) == 5 &&
			    $res[1] >= 0 && $res[1] <= 255 &&
			    $res[2] >= 0 && $res[2] <= 255 &&
			    $res[3] >= 0 && $res[3] <= 255 &&
			    $res[4] >= 0 && $res[4] <= 255
			    )) {
				$error = 'IP invalide';
				return false;
			    }
		}
		return true;
	}

}

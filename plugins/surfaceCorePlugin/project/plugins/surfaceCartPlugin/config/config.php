<?php
/**
 * @brief Plugin de gestion de session de travail
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 févr. 2010
 *
 * @version 1.0.0 Plugin de base
 * @version 1.0.1 Modification suite a la modification d'interface de surface
 * @version 1.0.2 Harmonisation de la configuration et retrait des fonctions devenue inutile / Ajout de la possibilité d'archive
 *
 * Le plugin Cart permet de deployer des sessions de travail dans une application.
 * Une session de travail permet de memoriser des elements (Enregistrement de
 * base de données). Il est ensuite possible de les retrouver facilement pour
 * effectuer des operations sur des ensembles d'elements.
 * Le plugin fournit tout un ensemble de fonctionnalité afin de faciliter son
 * déploiement et son utilisation. De plus, il est possible de personnaliser
 * un grand nombre de parametre a l'aide des options de configurations.
 *
 */

/*CONSTANTE*/
define('SFC_CART_PLUGIN_DIR', dirname(__FILE__) . '/..');
define('SFC_CART_MODULE_DIR', dirname(__FILE__) . '/../modules/cart');
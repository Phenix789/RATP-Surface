<?php
/**
 * @brief Options
 * @class OptionsPeer
 * @package Plugin
 * @subpackage sfPropelOptionsBehaviorPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.0
 * @license LGPL
 *
 */
class OptionsPeer extends BaseOptionsPeer {

	/**
	 * @brief Retourne toutes les options d'un objet
	 * @fn public static function getOptions($model, $id)
	 * @param string $model model de l'objet
	 * @param int $id id de l'objet
	 * @return array options de l'objet
	 * 
	 */
	public static function getOptions($model, $id) {
		$criteria = new Criteria();
		$criteria->add(self::MODEL_ID, $id);
		$criteria->add(self::MODEL_NAME, $model);
		$criteria->addAscendingOrderByColumn(self::NAME);
		return self::doSelect($criteria);
	}

}

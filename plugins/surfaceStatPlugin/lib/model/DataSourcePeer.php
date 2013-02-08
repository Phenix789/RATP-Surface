<?php
/**
 * @brief Source de données
 * @class DataSourcePeer
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DataSourcePeer extends BaseDataSourcePeer {

	public static function doSelectOneWithTableRef($table_ref) {
		$criteria = new Criteria();
		$criteria->add(DataSourcePeer::TABLE_REF, $table_ref);
		return self::doSelectOne($criteria);
	}

}

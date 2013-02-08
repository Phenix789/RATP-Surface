<?php

/**
 * @brief Source de données
 * @class DataSource
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class DataSource extends BaseDataSource {

	public function __toString() {
		return $this->getTableRef();
	}

	/**
	 * @brief Renvoie la liste des tables et vues de la base de données
	 * @fn public static function getTablesAndViews(PropelPDO $con = null)
	 * @param PropelPDO $con PropelPDO a la base de données
	 * @return array liste des tables et vues de la base
	 *
	 */
	public static function getTablesAndViews(PropelPDO $con = null) {
		$exclude = (array)sfConfig::get('app_stat_exclude', array());
		if (!$con) {
			$con = Propel::getConnection();
		}
		$list = array();
		switch ($con->getConfiguration()->getParameter('datasources.propel.adapter')) {
			case 'mysql':
				$stmt = $con->query("SHOW TABLES");
				break;
			case 'pgsql':
				$stmt = $con->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' ORDER BY table_name");
				break;
			case 'mssql':
				$stmt = $con->query("SELECT name FROM sys.tables ORDER BY name");
				break;
			case 'default':
				throw new PropelException("Unknown database type for table listing");
				break;
		}
		while ($row = $stmt->fetch()) {
			$row = array_pop($row);
			if (!in_array($row, (array)$exclude)) {
				$list[$row] = $row;
			}
		}
		return $list;
	}

	/**
	 *
	 * @param PropelPDO $con
	 * @return <type>
	 * 
	 */
	public function getListFields(PropelPDO $con = null) {
		$list = array();
		if ($con == null) {
			$con = Propel::getConnection();
		}
		$list = array();
		switch ($con->getConfiguration()->getParameter('datasources.propel.adapter')) {
			case 'mysql':
				$stmt = $con->prepare("SHOW COLUMNS FROM " . $this->getTableRef());
				break;
			case 'pgsql':
				$stmt = $con->prepare("SELECT column_name as Field FROM information_schema.columns WHERE table_name = :table AND table_schema = 'public'");
				$stmt->bindValue('table', $this->getTableRef());
				break;
			case 'mssql':
				$stmt = $con->prepare("SELECT columns.name as Field  FROM sys.columns AS columns, sys.tables AS tables WHERE columns.object_id = tables.object_id AND tables.name = :table ORDER BY columns.name");
				$stmt->bindValue('table', $this->getTableRef());
				break;
			case 'default':
				throw new PropelException("Unknown database type for table listing");
				break;
		}

		
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$field_name = $row['Field'];
			$list[] = $field_name;
		}
		return $list;
	}

	/**
	 *
	 * @param PropelPDO $con
	 * @return <type>
	 * 
	 */
	protected function isViewPgsql(PropelPDO $con = null) {
		return in_array($this->getTableRef(), DataSource::getViewsPgsql($con, array(), sfConfig::get('app_stat_exclude')));
	}

	protected function isViewMssql(PropelPDO $con = null) {
		return in_array($this->getTableRef(), DataSource::getViewsMssql($con, array(), sfConfig::get('app_stat_exclude')));
	}

	/**
	 *
	 * @param PropelPDO $con
	 * @return <type>
	 * 
	 */
	protected function getListFieldsInViewPgsql(PropelPDO $con = null) {
		$list = array();
		$result = pg_query($con->getResource(), sprintf("select *
							from information_schema.columns
							where table_name = '%s'", $this->getTableRef()));
		if ($result) {
			while ($field = pg_fetch_assoc($result)) {
				$list[] = $field['column_name'];
			}
		}
		return $list;
	}

	/**
	 *
	 * @param PropelPDO $con
	 * @return <type>
	 * 
	 */
	protected function getListFieldsInViewMssql(PropelPDO $con = null) {
		$list = array();
		$result = mssql_query(sprintf("SELECT name as column_name FROM syscolumns
						WHERE id = (SELECT top 1 id FROM sysobjects WHERE xtype='V' AND name='" . $this->getTableRef() . "'
						ORDER BY offset desc) ", $this->getTableRef()), $con->getResource());
		if ($result) {
			while ($field = mssql_fetch_assoc($result)) {
				$list[] = $field['column_name'];
			}
		}
		return $list;
	}

}
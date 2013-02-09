<?php


/**
 * Base static class for performing query and update operations on the 'sf_guard_user' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardUserPeer {

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'sf_guard_user';

    /** the related Propel class for this table */
    const OM_CLASS = 'sfGuardUser';

    /** the related TableMap class for this table */
    const TM_CLASS = 'sfGuardUserTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the ID field */
    const ID = 'sf_guard_user.ID';

    /** the column name for the USERNAME field */
    const USERNAME = 'sf_guard_user.USERNAME';

    /** the column name for the ALGORITHM field */
    const ALGORITHM = 'sf_guard_user.ALGORITHM';

    /** the column name for the SALT field */
    const SALT = 'sf_guard_user.SALT';

    /** the column name for the PASSWORD field */
    const PASSWORD = 'sf_guard_user.PASSWORD';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'sf_guard_user.CREATED_AT';

    /** the column name for the LAST_LOGIN field */
    const LAST_LOGIN = 'sf_guard_user.LAST_LOGIN';

    /** the column name for the IS_ACTIVE field */
    const IS_ACTIVE = 'sf_guard_user.IS_ACTIVE';

    /** the column name for the IS_SUPER_ADMIN field */
    const IS_SUPER_ADMIN = 'sf_guard_user.IS_SUPER_ADMIN';

    /** the column name for the IS_SUDOER field */
    const IS_SUDOER = 'sf_guard_user.IS_SUDOER';

    /** the column name for the TIME_SUDOER field */
    const TIME_SUDOER = 'sf_guard_user.TIME_SUDOER';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of sfGuardUser objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array sfGuardUser[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Username', 'Algorithm', 'Salt', 'Password', 'CreatedAt', 'LastLogin', 'IsActive', 'IsSuperAdmin', 'IsSudoer', 'TimeSudoer', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'username', 'algorithm', 'salt', 'password', 'createdAt', 'lastLogin', 'isActive', 'isSuperAdmin', 'isSudoer', 'timeSudoer', ),
        BasePeer::TYPE_COLNAME => array (self::ID, self::USERNAME, self::ALGORITHM, self::SALT, self::PASSWORD, self::CREATED_AT, self::LAST_LOGIN, self::IS_ACTIVE, self::IS_SUPER_ADMIN, self::IS_SUDOER, self::TIME_SUDOER, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'USERNAME', 'ALGORITHM', 'SALT', 'PASSWORD', 'CREATED_AT', 'LAST_LOGIN', 'IS_ACTIVE', 'IS_SUPER_ADMIN', 'IS_SUDOER', 'TIME_SUDOER', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'username', 'algorithm', 'salt', 'password', 'created_at', 'last_login', 'is_active', 'is_super_admin', 'is_sudoer', 'time_sudoer', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Username' => 1, 'Algorithm' => 2, 'Salt' => 3, 'Password' => 4, 'CreatedAt' => 5, 'LastLogin' => 6, 'IsActive' => 7, 'IsSuperAdmin' => 8, 'IsSudoer' => 9, 'TimeSudoer' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'username' => 1, 'algorithm' => 2, 'salt' => 3, 'password' => 4, 'createdAt' => 5, 'lastLogin' => 6, 'isActive' => 7, 'isSuperAdmin' => 8, 'isSudoer' => 9, 'timeSudoer' => 10, ),
        BasePeer::TYPE_COLNAME => array (self::ID => 0, self::USERNAME => 1, self::ALGORITHM => 2, self::SALT => 3, self::PASSWORD => 4, self::CREATED_AT => 5, self::LAST_LOGIN => 6, self::IS_ACTIVE => 7, self::IS_SUPER_ADMIN => 8, self::IS_SUDOER => 9, self::TIME_SUDOER => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'USERNAME' => 1, 'ALGORITHM' => 2, 'SALT' => 3, 'PASSWORD' => 4, 'CREATED_AT' => 5, 'LAST_LOGIN' => 6, 'IS_ACTIVE' => 7, 'IS_SUPER_ADMIN' => 8, 'IS_SUDOER' => 9, 'TIME_SUDOER' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'username' => 1, 'algorithm' => 2, 'salt' => 3, 'password' => 4, 'created_at' => 5, 'last_login' => 6, 'is_active' => 7, 'is_super_admin' => 8, 'is_sudoer' => 9, 'time_sudoer' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = self::getFieldNames($toType);
        $key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, self::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return self::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. sfGuardUserPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(sfGuardUserPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(sfGuardUserPeer::ID);
			$criteria->addSelectColumn(sfGuardUserPeer::USERNAME);
			$criteria->addSelectColumn(sfGuardUserPeer::ALGORITHM);
			$criteria->addSelectColumn(sfGuardUserPeer::SALT);
			$criteria->addSelectColumn(sfGuardUserPeer::PASSWORD);
			$criteria->addSelectColumn(sfGuardUserPeer::CREATED_AT);
			$criteria->addSelectColumn(sfGuardUserPeer::LAST_LOGIN);
			$criteria->addSelectColumn(sfGuardUserPeer::IS_ACTIVE);
			$criteria->addSelectColumn(sfGuardUserPeer::IS_SUPER_ADMIN);
			$criteria->addSelectColumn(sfGuardUserPeer::IS_SUDOER);
			$criteria->addSelectColumn(sfGuardUserPeer::TIME_SUDOER);
		} else {
			$criteria->addSelectColumn($alias.'.ID');
			$criteria->addSelectColumn($alias.'.USERNAME');
			$criteria->addSelectColumn($alias.'.ALGORITHM');
			$criteria->addSelectColumn($alias.'.SALT');
			$criteria->addSelectColumn($alias.'.PASSWORD');
			$criteria->addSelectColumn($alias.'.CREATED_AT');
			$criteria->addSelectColumn($alias.'.LAST_LOGIN');
			$criteria->addSelectColumn($alias.'.IS_ACTIVE');
			$criteria->addSelectColumn($alias.'.IS_SUPER_ADMIN');
			$criteria->addSelectColumn($alias.'.IS_SUDOER');
			$criteria->addSelectColumn($alias.'.TIME_SUDOER');
		}
	}

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(sfGuardUserPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            sfGuardUserPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 sfGuardUser
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = sfGuardUserPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return sfGuardUserPeer::populateObjects(sfGuardUserPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            sfGuardUserPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      sfGuardUser $obj A sfGuardUser object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A sfGuardUser object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof sfGuardUser) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or sfGuardUser object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   sfGuardUser Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(self::$instances[$key])) {
                return self::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        self::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sf_guard_user
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in CollaboratorPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CollaboratorPeer::clearInstancePool();
        // Invalidate objects in CollaboratorPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CollaboratorPeer::clearInstancePool();
        // Invalidate objects in sfGuardUserProfilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfGuardUserProfilePeer::clearInstancePool();
        // Invalidate objects in DashboardMessagePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        DashboardMessagePeer::clearInstancePool();
        // Invalidate objects in DashboardMessagePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        DashboardMessagePeer::clearInstancePool();
        // Invalidate objects in StationPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        StationPeer::clearInstancePool();
        // Invalidate objects in StationPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        StationPeer::clearInstancePool();
        // Invalidate objects in TransportTypePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TransportTypePeer::clearInstancePool();
        // Invalidate objects in TransportTypePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TransportTypePeer::clearInstancePool();
        // Invalidate objects in SubscriptionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SubscriptionPeer::clearInstancePool();
        // Invalidate objects in SubscriptionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SubscriptionPeer::clearInstancePool();
        // Invalidate objects in ClientPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientPeer::clearInstancePool();
        // Invalidate objects in ClientPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientPeer::clearInstancePool();
        // Invalidate objects in ClientSubscriptionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientSubscriptionPeer::clearInstancePool();
        // Invalidate objects in ClientSubscriptionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ClientSubscriptionPeer::clearInstancePool();
        // Invalidate objects in TravelPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TravelPeer::clearInstancePool();
        // Invalidate objects in TravelPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        TravelPeer::clearInstancePool();
        // Invalidate objects in ContactPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactPeer::clearInstancePool();
        // Invalidate objects in ContactPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactPeer::clearInstancePool();
        // Invalidate objects in MaillingListPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        MaillingListPeer::clearInstancePool();
        // Invalidate objects in MaillingListPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        MaillingListPeer::clearInstancePool();
        // Invalidate objects in sfGuardUserPermissionPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfGuardUserPermissionPeer::clearInstancePool();
        // Invalidate objects in sfGuardUserGroupPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfGuardUserGroupPeer::clearInstancePool();
        // Invalidate objects in sfGuardRememberKeyPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfGuardRememberKeyPeer::clearInstancePool();
        // Invalidate objects in sfcSettingPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfcSettingPeer::clearInstancePool();
        // Invalidate objects in sfcSettingPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfcSettingPeer::clearInstancePool();
        // Invalidate objects in SfcCommentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SfcCommentPeer::clearInstancePool();
        // Invalidate objects in SfcCommentPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        SfcCommentPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or NULL if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = sfGuardUserPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = sfGuardUserPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                sfGuardUserPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (sfGuardUser object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = sfGuardUserPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = sfGuardUserPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            sfGuardUserPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasesfGuardUserPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasesfGuardUserPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new sfGuardUserTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return sfGuardUserPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a sfGuardUser or Criteria object.
     *
     * @param      mixed $values Criteria or sfGuardUser object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BasesfGuardUserPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from sfGuardUser object
        }

        if ($criteria->containsKey(sfGuardUserPeer::ID) && $criteria->keyContainsValue(sfGuardUserPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.sfGuardUserPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a sfGuardUser or Criteria object.
     *
     * @param      mixed $values Criteria or sfGuardUser object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BasesfGuardUserPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(self::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(sfGuardUserPeer::ID);
            $value = $criteria->remove(sfGuardUserPeer::ID);
            if ($value) {
                $selectCriteria->add(sfGuardUserPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(sfGuardUserPeer::TABLE_NAME);
            }

        } else { // $values is sfGuardUser object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sf_guard_user table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += sfGuardUserPeer::doOnDeleteCascade(new Criteria(sfGuardUserPeer::DATABASE_NAME), $con);
            sfGuardUserPeer::doOnDeleteSetNull(new Criteria(sfGuardUserPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(sfGuardUserPeer::TABLE_NAME, $con, sfGuardUserPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            sfGuardUserPeer::clearInstancePool();
            sfGuardUserPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a sfGuardUser or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or sfGuardUser object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof sfGuardUser) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(sfGuardUserPeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += sfGuardUserPeer::doOnDeleteCascade($c, $con);
            
            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            sfGuardUserPeer::doOnDeleteSetNull($c, $con);
            
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                sfGuardUserPeer::clearInstancePool();
            } elseif ($values instanceof sfGuardUser) { // it's a model object
                sfGuardUserPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    sfGuardUserPeer::removeInstanceFromPool($singleval);
                }
            }
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            sfGuardUserPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = sfGuardUserPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related sfGuardUserProfile objects
            $criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);
            
            $criteria->add(sfGuardUserProfilePeer::USER_ID, $obj->getId());
            $affectedRows += sfGuardUserProfilePeer::doDelete($criteria, $con);

            // delete related sfGuardUserPermission objects
            $criteria = new Criteria(sfGuardUserPermissionPeer::DATABASE_NAME);
            
            $criteria->add(sfGuardUserPermissionPeer::USER_ID, $obj->getId());
            $affectedRows += sfGuardUserPermissionPeer::doDelete($criteria, $con);

            // delete related sfGuardUserGroup objects
            $criteria = new Criteria(sfGuardUserGroupPeer::DATABASE_NAME);
            
            $criteria->add(sfGuardUserGroupPeer::USER_ID, $obj->getId());
            $affectedRows += sfGuardUserGroupPeer::doDelete($criteria, $con);

            // delete related sfGuardRememberKey objects
            $criteria = new Criteria(sfGuardRememberKeyPeer::DATABASE_NAME);
            
            $criteria->add(sfGuardRememberKeyPeer::USER_ID, $obj->getId());
            $affectedRows += sfGuardRememberKeyPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * This is a method for emulating ON DELETE SET NULL DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return void
     */
    protected static function doOnDeleteSetNull(Criteria $criteria, PropelPDO $con)
    {

        // first find the objects that are implicated by the $criteria
        $objects = sfGuardUserPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {

            // set fkey col in related Collaborator rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(CollaboratorPeer::CREATED_BY, $obj->getId());
            $updateValues->add(CollaboratorPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Collaborator rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(CollaboratorPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(CollaboratorPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related DashboardMessage rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(DashboardMessagePeer::CREATED_BY, $obj->getId());
            $updateValues->add(DashboardMessagePeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related DashboardMessage rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(DashboardMessagePeer::UPDATED_BY, $obj->getId());
            $updateValues->add(DashboardMessagePeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Station rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(StationPeer::CREATED_BY, $obj->getId());
            $updateValues->add(StationPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Station rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(StationPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(StationPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related TransportType rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(TransportTypePeer::CREATED_BY, $obj->getId());
            $updateValues->add(TransportTypePeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related TransportType rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(TransportTypePeer::UPDATED_BY, $obj->getId());
            $updateValues->add(TransportTypePeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Subscription rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(SubscriptionPeer::CREATED_BY, $obj->getId());
            $updateValues->add(SubscriptionPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Subscription rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(SubscriptionPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(SubscriptionPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Client rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(ClientPeer::CREATED_BY, $obj->getId());
            $updateValues->add(ClientPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Client rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(ClientPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(ClientPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related ClientSubscription rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(ClientSubscriptionPeer::CREATED_BY, $obj->getId());
            $updateValues->add(ClientSubscriptionPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related ClientSubscription rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(ClientSubscriptionPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(ClientSubscriptionPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Travel rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(TravelPeer::CREATED_BY, $obj->getId());
            $updateValues->add(TravelPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Travel rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(TravelPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(TravelPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Contact rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(ContactPeer::CREATED_BY, $obj->getId());
            $updateValues->add(ContactPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related Contact rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(ContactPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(ContactPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related MaillingList rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(MaillingListPeer::CREATED_BY, $obj->getId());
            $updateValues->add(MaillingListPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related MaillingList rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(MaillingListPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(MaillingListPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related sfcSetting rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(sfcSettingPeer::CREATED_BY, $obj->getId());
            $updateValues->add(sfcSettingPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related sfcSetting rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(sfcSettingPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(sfcSettingPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related SfcComment rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(SfcCommentPeer::CREATED_BY, $obj->getId());
            $updateValues->add(SfcCommentPeer::CREATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

            // set fkey col in related SfcComment rows to NULL
            $selectCriteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $updateValues = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $selectCriteria->add(SfcCommentPeer::UPDATED_BY, $obj->getId());
            $updateValues->add(SfcCommentPeer::UPDATED_BY, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

        }
    }

    /**
     * Validates all modified columns of given sfGuardUser object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      sfGuardUser $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(sfGuardUserPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(sfGuardUserPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        $res =  BasePeer::doValidate(sfGuardUserPeer::DATABASE_NAME, sfGuardUserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardUserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
    }

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     sfGuardUser
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{
		$pk = (int) $pk; // Casting pk as it's php type to prevent error from empty string
		if(!$pk){
			return null;
		}

		if (null !== ($obj = sfGuardUserPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
		$criteria->add(sfGuardUserPeer::ID, $pk);

		$v = sfGuardUserPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return sfGuardUser[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
            $criteria->add(sfGuardUserPeer::ID, $pks, Criteria::IN);
            $objs = sfGuardUserPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

	/**
	 * Retrieve PK of all matched record.
	 * @param Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param Connection $con The connection to use.
	 * @return array Array of PK of selected record.
	 * @see doSelectField
	 */
	public static function doSelectPK(Criteria $criteria = null, $con = null) {
		return sfGuardUserPeer::doSelectFieldValues(sfGuardUserPeer::ID, $criteria, true, $con);
	}
  
  /**
   * Retrieve Field of all matched record.
   * @param string $field Field of table
   * @param Criteria $criteria Criteria
   * @param boolean $distinct If select only distinct values
   * @param Connection $con Connection to use
   * @return array Array of field values
   */
  public static function doSelectFieldValues($field, $criteria = null, $distinct = false, $con = null) {
      if(!$criteria) {
          $criteria = new Criteria();
      }
      else {
          $criteria = clone $criteria;
      }
      if($distinct) {
          if (! in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
              $criteria->setDistinct();
          }
      }
      if (in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
          //$criteria->clearOrderByColumns();
      }
      $column = sfGuardUserPeer::getTableMap()->getColumn($field);
      $criteria->clearSelectColumns();
      $criteria->addSelectColumn($field);
      $stmt = sfGuardUserPeer::doSelectStmt($criteria, $con);
      $fields = array();
      while($row = $stmt->fetch()) {
          $fields[] = $row[0];
      }
      return $fields;
  }
  
	protected static $_metadata;

	/**
	 *
	 *
	 */
	public static function getMetadata($info = null, $default = null, $class = 'sfGuardUser') {
		if(!sfGuardUserPeer::$_metadata) {
			$metadata = sfConfig::get('app_metadata_' . $class, array());
			$default_metadata = array(
				'name' => $class,
				'app' => sfConfig::get('sf_app'),
				'module' => sfInflector::underscore($class)
			);
			sfGuardUserPeer::$_metadata = array_merge($default_metadata, $metadata);
		}
		if($info) {
			return get($info, sfGuardUserPeer::$_metadata, $default);
		}
		return sfGuardUserPeer::$_metadata;
	}
} // BasesfGuardUserPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasesfGuardUserPeer::buildTableMap();


<?php


/**
 * Base static class for performing query and update operations on the 'plugin_cart' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceCartPlugin.lib.model.om
 */
abstract class BaseCartPeer {

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'plugin_cart';

    /** the related Propel class for this table */
    const OM_CLASS = 'Cart';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CartTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the ID field */
    const ID = 'plugin_cart.ID';

    /** the column name for the NAME field */
    const NAME = 'plugin_cart.NAME';

    /** the column name for the DESCRIPTION field */
    const DESCRIPTION = 'plugin_cart.DESCRIPTION';

    /** the column name for the SELECTED field */
    const SELECTED = 'plugin_cart.SELECTED';

    /** the column name for the ARCHIVE field */
    const ARCHIVE = 'plugin_cart.ARCHIVE';

    /** the column name for the USER_ID field */
    const USER_ID = 'plugin_cart.USER_ID';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'plugin_cart.CREATED_AT';

    /** the column name for the CREATED_BY field */
    const CREATED_BY = 'plugin_cart.CREATED_BY';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'plugin_cart.UPDATED_AT';

    /** the column name for the UPDATED_BY field */
    const UPDATED_BY = 'plugin_cart.UPDATED_BY';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Cart objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Cart[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Description', 'Selected', 'Archive', 'UserId', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'description', 'selected', 'archive', 'userId', 'createdAt', 'createdBy', 'updatedAt', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (self::ID, self::NAME, self::DESCRIPTION, self::SELECTED, self::ARCHIVE, self::USER_ID, self::CREATED_AT, self::CREATED_BY, self::UPDATED_AT, self::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'NAME', 'DESCRIPTION', 'SELECTED', 'ARCHIVE', 'USER_ID', 'CREATED_AT', 'CREATED_BY', 'UPDATED_AT', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'description', 'selected', 'archive', 'user_id', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Description' => 2, 'Selected' => 3, 'Archive' => 4, 'UserId' => 5, 'CreatedAt' => 6, 'CreatedBy' => 7, 'UpdatedAt' => 8, 'UpdatedBy' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'description' => 2, 'selected' => 3, 'archive' => 4, 'userId' => 5, 'createdAt' => 6, 'createdBy' => 7, 'updatedAt' => 8, 'updatedBy' => 9, ),
        BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NAME => 1, self::DESCRIPTION => 2, self::SELECTED => 3, self::ARCHIVE => 4, self::USER_ID => 5, self::CREATED_AT => 6, self::CREATED_BY => 7, self::UPDATED_AT => 8, self::UPDATED_BY => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'NAME' => 1, 'DESCRIPTION' => 2, 'SELECTED' => 3, 'ARCHIVE' => 4, 'USER_ID' => 5, 'CREATED_AT' => 6, 'CREATED_BY' => 7, 'UPDATED_AT' => 8, 'UPDATED_BY' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'description' => 2, 'selected' => 3, 'archive' => 4, 'user_id' => 5, 'created_at' => 6, 'created_by' => 7, 'updated_at' => 8, 'updated_by' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
     * @param      string $column The column name for current table. (i.e. CartPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(CartPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(CartPeer::ID);
			$criteria->addSelectColumn(CartPeer::NAME);
			$criteria->addSelectColumn(CartPeer::DESCRIPTION);
			$criteria->addSelectColumn(CartPeer::SELECTED);
			$criteria->addSelectColumn(CartPeer::ARCHIVE);
			$criteria->addSelectColumn(CartPeer::USER_ID);
			$criteria->addSelectColumn(CartPeer::CREATED_AT);
			$criteria->addSelectColumn(CartPeer::CREATED_BY);
			$criteria->addSelectColumn(CartPeer::UPDATED_AT);
			$criteria->addSelectColumn(CartPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias.'.ID');
			$criteria->addSelectColumn($alias.'.NAME');
			$criteria->addSelectColumn($alias.'.DESCRIPTION');
			$criteria->addSelectColumn($alias.'.SELECTED');
			$criteria->addSelectColumn($alias.'.ARCHIVE');
			$criteria->addSelectColumn($alias.'.USER_ID');
			$criteria->addSelectColumn($alias.'.CREATED_AT');
			$criteria->addSelectColumn($alias.'.CREATED_BY');
			$criteria->addSelectColumn($alias.'.UPDATED_AT');
			$criteria->addSelectColumn($alias.'.UPDATED_BY');
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
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Cart
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = CartPeer::doSelect($critcopy, $con);
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
        return CartPeer::populateObjects(CartPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            CartPeer::addSelectColumns($criteria);
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
     * @param      Cart $obj A Cart object.
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
     * @param      mixed $value A Cart object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Cart) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Cart object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
     * @return   Cart Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
     * Method to invalidate the instance pool of all tables related to plugin_cart
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
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
        $cls = CartPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = CartPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CartPeer::addInstanceToPool($obj, $key);
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
     * @return array (Cart object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = CartPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = CartPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + CartPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CartPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            CartPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUserId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinsfGuardUserRelatedByUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CartPeer::USER_ID, sfGuardUserPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CartPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CartPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Selects a collection of Cart objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinsfGuardUserRelatedByUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol = CartPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(CartPeer::USER_ID, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    sfGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Cart) to $obj2 (sfGuardUser)
                $obj2->addCartRelatedByUserId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Cart objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol = CartPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(CartPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    sfGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Cart) to $obj2 (sfGuardUser)
                $obj2->addCartRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Cart objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol = CartPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(CartPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    sfGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Cart) to $obj2 (sfGuardUser)
                $obj2->addCartRelatedByUpdatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CartPeer::USER_ID, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(CartPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(CartPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Selects a collection of Cart objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol2 = CartPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(CartPeer::USER_ID, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(CartPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(CartPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined sfGuardUser rows

            $key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    sfGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Cart) to the collection in $obj2 (sfGuardUser)
                $obj2->addCartRelatedByUserId($obj1);
            } // if joined row not null

            // Add objects for joined sfGuardUser rows

            $key3 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = sfGuardUserPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    sfGuardUserPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Cart) to the collection in $obj3 (sfGuardUser)
                $obj3->addCartRelatedByCreatedBy($obj1);
            } // if joined row not null

            // Add objects for joined sfGuardUser rows

            $key4 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = sfGuardUserPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    sfGuardUserPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Cart) to the collection in $obj4 (sfGuardUser)
                $obj4->addCartRelatedByUpdatedBy($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUserId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptsfGuardUserRelatedByUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
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
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
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
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(CartPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CartPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
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
     * Selects a collection of Cart objects pre-filled with all related objects except sfGuardUserRelatedByUserId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptsfGuardUserRelatedByUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol2 = CartPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Cart objects pre-filled with all related objects except sfGuardUserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol2 = CartPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Cart objects pre-filled with all related objects except sfGuardUserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Cart objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        CartPeer::addSelectColumns($criteria);
        $startcol2 = CartPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CartPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CartPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CartPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CartPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
      $dbMap = Propel::getDatabaseMap(BaseCartPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseCartPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new CartTableMap());
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
        return CartPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Cart or Criteria object.
     *
     * @param      mixed $values Criteria or Cart object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseCartPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCartPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Cart object
        }

        if ($criteria->containsKey(CartPeer::ID) && $criteria->keyContainsValue(CartPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CartPeer::ID.')');
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
     * Performs an UPDATE on the database, given a Cart or Criteria object.
     *
     * @param      mixed $values Criteria or Cart object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseCartPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCartPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(self::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(CartPeer::ID);
            $value = $criteria->remove(CartPeer::ID);
            if ($value) {
                $selectCriteria->add(CartPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(CartPeer::TABLE_NAME);
            }

        } else { // $values is Cart object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the plugin_cart table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(CartPeer::TABLE_NAME, $con, CartPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CartPeer::clearInstancePool();
            CartPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Cart or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Cart object or primary key or array of primary keys
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
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            CartPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Cart) { // it's a model object
            // invalidate the cache for this single object
            CartPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(CartPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                CartPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            CartPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Cart object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Cart $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(CartPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(CartPeer::TABLE_NAME);

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

        $res =  BasePeer::doValidate(CartPeer::DATABASE_NAME, CartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
	 * @return     Cart
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{
		$pk = (int) $pk; // Casting pk as it's php type to prevent error from empty string
		if(!$pk){
			return null;
		}

		if (null !== ($obj = CartPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CartPeer::DATABASE_NAME);
		$criteria->add(CartPeer::ID, $pk);

		$v = CartPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Cart[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(CartPeer::DATABASE_NAME);
            $criteria->add(CartPeer::ID, $pks, Criteria::IN);
            $objs = CartPeer::doSelect($criteria, $con);
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
		return CartPeer::doSelectFieldValues(CartPeer::ID, $criteria, true, $con);
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
      $column = CartPeer::getTableMap()->getColumn($field);
      $criteria->clearSelectColumns();
      $criteria->addSelectColumn($field);
      $stmt = CartPeer::doSelectStmt($criteria, $con);
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
	public static function getMetadata($info = null, $default = null, $class = 'Cart') {
		if(!CartPeer::$_metadata) {
			$metadata = sfConfig::get('app_metadata_' . $class, array());
			$default_metadata = array(
				'name' => $class,
				'app' => sfConfig::get('sf_app'),
				'module' => sfInflector::underscore($class)
			);
			CartPeer::$_metadata = array_merge($default_metadata, $metadata);
		}
		if($info) {
			return get($info, CartPeer::$_metadata, $default);
		}
		return CartPeer::$_metadata;
	}
} // BaseCartPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCartPeer::buildTableMap();


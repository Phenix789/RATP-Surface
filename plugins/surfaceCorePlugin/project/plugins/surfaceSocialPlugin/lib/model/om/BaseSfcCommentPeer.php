<?php


/**
 * Base static class for performing query and update operations on the 'sfc_social_comment' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceSocialPlugin.lib.model.om
 */
abstract class BaseSfcCommentPeer {

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'sfc_social_comment';

    /** the related Propel class for this table */
    const OM_CLASS = 'SfcComment';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SfcCommentTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the ID field */
    const ID = 'sfc_social_comment.ID';

    /** the column name for the OBJECT_NAME field */
    const OBJECT_NAME = 'sfc_social_comment.OBJECT_NAME';

    /** the column name for the OBJECT_ID field */
    const OBJECT_ID = 'sfc_social_comment.OBJECT_ID';

    /** the column name for the CATEGORY field */
    const CATEGORY = 'sfc_social_comment.CATEGORY';

    /** the column name for the COMMENT field */
    const COMMENT = 'sfc_social_comment.COMMENT';

    /** the column name for the DATE_REF field */
    const DATE_REF = 'sfc_social_comment.DATE_REF';

    /** the column name for the COLLABORATOR_ID field */
    const COLLABORATOR_ID = 'sfc_social_comment.COLLABORATOR_ID';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'sfc_social_comment.CREATED_AT';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'sfc_social_comment.UPDATED_AT';

    /** the column name for the CREATED_BY field */
    const CREATED_BY = 'sfc_social_comment.CREATED_BY';

    /** the column name for the UPDATED_BY field */
    const UPDATED_BY = 'sfc_social_comment.UPDATED_BY';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of SfcComment objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SfcComment[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'ObjectName', 'ObjectId', 'Category', 'Comment', 'DateRef', 'CollaboratorId', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'objectName', 'objectId', 'category', 'comment', 'dateRef', 'collaboratorId', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (self::ID, self::OBJECT_NAME, self::OBJECT_ID, self::CATEGORY, self::COMMENT, self::DATE_REF, self::COLLABORATOR_ID, self::CREATED_AT, self::UPDATED_AT, self::CREATED_BY, self::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'OBJECT_NAME', 'OBJECT_ID', 'CATEGORY', 'COMMENT', 'DATE_REF', 'COLLABORATOR_ID', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'object_name', 'object_id', 'category', 'comment', 'date_ref', 'collaborator_id', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ObjectName' => 1, 'ObjectId' => 2, 'Category' => 3, 'Comment' => 4, 'DateRef' => 5, 'CollaboratorId' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, 'CreatedBy' => 9, 'UpdatedBy' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'objectName' => 1, 'objectId' => 2, 'category' => 3, 'comment' => 4, 'dateRef' => 5, 'collaboratorId' => 6, 'createdAt' => 7, 'updatedAt' => 8, 'createdBy' => 9, 'updatedBy' => 10, ),
        BasePeer::TYPE_COLNAME => array (self::ID => 0, self::OBJECT_NAME => 1, self::OBJECT_ID => 2, self::CATEGORY => 3, self::COMMENT => 4, self::DATE_REF => 5, self::COLLABORATOR_ID => 6, self::CREATED_AT => 7, self::UPDATED_AT => 8, self::CREATED_BY => 9, self::UPDATED_BY => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'OBJECT_NAME' => 1, 'OBJECT_ID' => 2, 'CATEGORY' => 3, 'COMMENT' => 4, 'DATE_REF' => 5, 'COLLABORATOR_ID' => 6, 'CREATED_AT' => 7, 'UPDATED_AT' => 8, 'CREATED_BY' => 9, 'UPDATED_BY' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'object_name' => 1, 'object_id' => 2, 'category' => 3, 'comment' => 4, 'date_ref' => 5, 'collaborator_id' => 6, 'created_at' => 7, 'updated_at' => 8, 'created_by' => 9, 'updated_by' => 10, ),
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
     * @param      string $column The column name for current table. (i.e. SfcCommentPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SfcCommentPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(SfcCommentPeer::ID);
			$criteria->addSelectColumn(SfcCommentPeer::OBJECT_NAME);
			$criteria->addSelectColumn(SfcCommentPeer::OBJECT_ID);
			$criteria->addSelectColumn(SfcCommentPeer::CATEGORY);
			$criteria->addSelectColumn(SfcCommentPeer::COMMENT);
			$criteria->addSelectColumn(SfcCommentPeer::DATE_REF);
			$criteria->addSelectColumn(SfcCommentPeer::COLLABORATOR_ID);
			$criteria->addSelectColumn(SfcCommentPeer::CREATED_AT);
			$criteria->addSelectColumn(SfcCommentPeer::UPDATED_AT);
			$criteria->addSelectColumn(SfcCommentPeer::CREATED_BY);
			$criteria->addSelectColumn(SfcCommentPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias.'.ID');
			$criteria->addSelectColumn($alias.'.OBJECT_NAME');
			$criteria->addSelectColumn($alias.'.OBJECT_ID');
			$criteria->addSelectColumn($alias.'.CATEGORY');
			$criteria->addSelectColumn($alias.'.COMMENT');
			$criteria->addSelectColumn($alias.'.DATE_REF');
			$criteria->addSelectColumn($alias.'.COLLABORATOR_ID');
			$criteria->addSelectColumn($alias.'.CREATED_AT');
			$criteria->addSelectColumn($alias.'.UPDATED_AT');
			$criteria->addSelectColumn($alias.'.CREATED_BY');
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
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SfcComment
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SfcCommentPeer::doSelect($critcopy, $con);
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
        return SfcCommentPeer::populateObjects(SfcCommentPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SfcCommentPeer::addSelectColumns($criteria);
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
     * @param      SfcComment $obj A SfcComment object.
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
     * @param      mixed $value A SfcComment object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SfcComment) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SfcComment object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
     * @return   SfcComment Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
     * Method to invalidate the instance pool of all tables related to sfc_social_comment
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
        $cls = SfcCommentPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SfcCommentPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SfcCommentPeer::addInstanceToPool($obj, $key);
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
     * @return array (SfcComment object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SfcCommentPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SfcCommentPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SfcCommentPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SfcCommentPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SfcCommentPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SfcCommentPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SfcCommentPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Collaborator table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinCollaborator(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);

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
     * Selects a collection of SfcComment objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
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

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol = SfcCommentPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(SfcCommentPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SfcComment) to $obj2 (sfGuardUser)
                $obj2->addSfcCommentRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SfcComment objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
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

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol = SfcCommentPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(SfcCommentPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SfcComment) to $obj2 (sfGuardUser)
                $obj2->addSfcCommentRelatedByUpdatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SfcComment objects pre-filled with their Collaborator objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCollaborator(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol = SfcCommentPeer::NUM_HYDRATE_COLUMNS;
        CollaboratorPeer::addSelectColumns($criteria);

        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = CollaboratorPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = CollaboratorPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    CollaboratorPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SfcComment) to $obj2 (Collaborator)
                $obj2->addSfcComment($obj1);

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
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SfcCommentPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(SfcCommentPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);

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
     * Selects a collection of SfcComment objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
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

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol2 = SfcCommentPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + CollaboratorPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SfcCommentPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(SfcCommentPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SfcComment) to the collection in $obj2 (sfGuardUser)
                $obj2->addSfcCommentRelatedByCreatedBy($obj1);
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

                // Add the $obj1 (SfcComment) to the collection in $obj3 (sfGuardUser)
                $obj3->addSfcCommentRelatedByUpdatedBy($obj1);
            } // if joined row not null

            // Add objects for joined Collaborator rows

            $key4 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = CollaboratorPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = CollaboratorPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    CollaboratorPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (SfcComment) to the collection in $obj4 (Collaborator)
                $obj4->addSfcComment($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Collaborator table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptCollaborator(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SfcCommentPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SfcCommentPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(SfcCommentPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Selects a collection of SfcComment objects pre-filled with all related objects except sfGuardUserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
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

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol2 = SfcCommentPeer::NUM_HYDRATE_COLUMNS;

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CollaboratorPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Collaborator rows

                $key2 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = CollaboratorPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = CollaboratorPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CollaboratorPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SfcComment) to the collection in $obj2 (Collaborator)
                $obj2->addSfcComment($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SfcComment objects pre-filled with all related objects except sfGuardUserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
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

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol2 = SfcCommentPeer::NUM_HYDRATE_COLUMNS;

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CollaboratorPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SfcCommentPeer::COLLABORATOR_ID, CollaboratorPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Collaborator rows

                $key2 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = CollaboratorPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = CollaboratorPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CollaboratorPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SfcComment) to the collection in $obj2 (Collaborator)
                $obj2->addSfcComment($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SfcComment objects pre-filled with all related objects except Collaborator.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SfcComment objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptCollaborator(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        SfcCommentPeer::addSelectColumns($criteria);
        $startcol2 = SfcCommentPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SfcCommentPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(SfcCommentPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SfcCommentPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SfcCommentPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SfcCommentPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SfcCommentPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (SfcComment) to the collection in $obj2 (sfGuardUser)
                $obj2->addSfcCommentRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key3 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = sfGuardUserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    sfGuardUserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SfcComment) to the collection in $obj3 (sfGuardUser)
                $obj3->addSfcCommentRelatedByUpdatedBy($obj1);

            } // if joined row is not null

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
      $dbMap = Propel::getDatabaseMap(BaseSfcCommentPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSfcCommentPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SfcCommentTableMap());
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
        return SfcCommentPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SfcComment or Criteria object.
     *
     * @param      mixed $values Criteria or SfcComment object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseSfcCommentPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSfcCommentPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SfcComment object
        }

        if ($criteria->containsKey(SfcCommentPeer::ID) && $criteria->keyContainsValue(SfcCommentPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SfcCommentPeer::ID.')');
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
     * Performs an UPDATE on the database, given a SfcComment or Criteria object.
     *
     * @param      mixed $values Criteria or SfcComment object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseSfcCommentPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSfcCommentPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(self::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SfcCommentPeer::ID);
            $value = $criteria->remove(SfcCommentPeer::ID);
            if ($value) {
                $selectCriteria->add(SfcCommentPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SfcCommentPeer::TABLE_NAME);
            }

        } else { // $values is SfcComment object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sfc_social_comment table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SfcCommentPeer::TABLE_NAME, $con, SfcCommentPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SfcCommentPeer::clearInstancePool();
            SfcCommentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SfcComment or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SfcComment object or primary key or array of primary keys
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
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SfcCommentPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SfcComment) { // it's a model object
            // invalidate the cache for this single object
            SfcCommentPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(SfcCommentPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                SfcCommentPeer::removeInstanceFromPool($singleval);
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
            SfcCommentPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SfcComment object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      SfcComment $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SfcCommentPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SfcCommentPeer::TABLE_NAME);

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

        $res =  BasePeer::doValidate(SfcCommentPeer::DATABASE_NAME, SfcCommentPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SfcCommentPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
	 * @return     SfcComment
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{
		$pk = (int) $pk; // Casting pk as it's php type to prevent error from empty string
		if(!$pk){
			return null;
		}

		if (null !== ($obj = SfcCommentPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SfcCommentPeer::DATABASE_NAME);
		$criteria->add(SfcCommentPeer::ID, $pk);

		$v = SfcCommentPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return SfcComment[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SfcCommentPeer::DATABASE_NAME);
            $criteria->add(SfcCommentPeer::ID, $pks, Criteria::IN);
            $objs = SfcCommentPeer::doSelect($criteria, $con);
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
		return SfcCommentPeer::doSelectFieldValues(SfcCommentPeer::ID, $criteria, true, $con);
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
      $column = SfcCommentPeer::getTableMap()->getColumn($field);
      $criteria->clearSelectColumns();
      $criteria->addSelectColumn($field);
      $stmt = SfcCommentPeer::doSelectStmt($criteria, $con);
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
	public static function getMetadata($info = null, $default = null, $class = 'SfcComment') {
		if(!SfcCommentPeer::$_metadata) {
			$metadata = sfConfig::get('app_metadata_' . $class, array());
			$default_metadata = array(
				'name' => $class,
				'app' => sfConfig::get('sf_app'),
				'module' => sfInflector::underscore($class)
			);
			SfcCommentPeer::$_metadata = array_merge($default_metadata, $metadata);
		}
		if($info) {
			return get($info, SfcCommentPeer::$_metadata, $default);
		}
		return SfcCommentPeer::$_metadata;
	}
} // BaseSfcCommentPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSfcCommentPeer::buildTableMap();

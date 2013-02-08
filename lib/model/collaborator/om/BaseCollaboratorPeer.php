<?php


/**
 * Base static class for performing query and update operations on the 'collaborator' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.collaborator.om
 */
abstract class BaseCollaboratorPeer {

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'collaborator';

    /** the related Propel class for this table */
    const OM_CLASS = 'Collaborator';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CollaboratorTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the ID field */
    const ID = 'collaborator.ID';

    /** the column name for the IS_ACTIVE field */
    const IS_ACTIVE = 'collaborator.IS_ACTIVE';

    /** the column name for the FIRST_NAME field */
    const FIRST_NAME = 'collaborator.FIRST_NAME';

    /** the column name for the LAST_NAME field */
    const LAST_NAME = 'collaborator.LAST_NAME';

    /** the column name for the EMAIL field */
    const EMAIL = 'collaborator.EMAIL';

    /** the column name for the SIGNATURE field */
    const SIGNATURE = 'collaborator.SIGNATURE';

    /** the column name for the JOB_ROLE field */
    const JOB_ROLE = 'collaborator.JOB_ROLE';

    /** the column name for the ADDRESS field */
    const ADDRESS = 'collaborator.ADDRESS';

    /** the column name for the CITY field */
    const CITY = 'collaborator.CITY';

    /** the column name for the POSTAL_CODE field */
    const POSTAL_CODE = 'collaborator.POSTAL_CODE';

    /** the column name for the COUNTRY field */
    const COUNTRY = 'collaborator.COUNTRY';

    /** the column name for the PHONE_NUMBER field */
    const PHONE_NUMBER = 'collaborator.PHONE_NUMBER';

    /** the column name for the MOBILE_NUMBER field */
    const MOBILE_NUMBER = 'collaborator.MOBILE_NUMBER';

    /** the column name for the FAX_NUMBER field */
    const FAX_NUMBER = 'collaborator.FAX_NUMBER';

    /** the column name for the COMMENT field */
    const COMMENT = 'collaborator.COMMENT';

    /** the column name for the CONFIDENTIAL field */
    const CONFIDENTIAL = 'collaborator.CONFIDENTIAL';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'collaborator.CREATED_AT';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'collaborator.UPDATED_AT';

    /** the column name for the CREATED_BY field */
    const CREATED_BY = 'collaborator.CREATED_BY';

    /** the column name for the UPDATED_BY field */
    const UPDATED_BY = 'collaborator.UPDATED_BY';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Collaborator objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Collaborator[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'IsActive', 'FirstName', 'LastName', 'Email', 'Signature', 'JobRole', 'Address', 'City', 'PostalCode', 'Country', 'PhoneNumber', 'MobileNumber', 'FaxNumber', 'Comment', 'Confidential', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'isActive', 'firstName', 'lastName', 'email', 'signature', 'jobRole', 'address', 'city', 'postalCode', 'country', 'phoneNumber', 'mobileNumber', 'faxNumber', 'comment', 'confidential', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (self::ID, self::IS_ACTIVE, self::FIRST_NAME, self::LAST_NAME, self::EMAIL, self::SIGNATURE, self::JOB_ROLE, self::ADDRESS, self::CITY, self::POSTAL_CODE, self::COUNTRY, self::PHONE_NUMBER, self::MOBILE_NUMBER, self::FAX_NUMBER, self::COMMENT, self::CONFIDENTIAL, self::CREATED_AT, self::UPDATED_AT, self::CREATED_BY, self::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'IS_ACTIVE', 'FIRST_NAME', 'LAST_NAME', 'EMAIL', 'SIGNATURE', 'JOB_ROLE', 'ADDRESS', 'CITY', 'POSTAL_CODE', 'COUNTRY', 'PHONE_NUMBER', 'MOBILE_NUMBER', 'FAX_NUMBER', 'COMMENT', 'CONFIDENTIAL', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'is_active', 'first_name', 'last_name', 'email', 'signature', 'job_role', 'address', 'city', 'postal_code', 'country', 'phone_number', 'mobile_number', 'fax_number', 'comment', 'confidential', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IsActive' => 1, 'FirstName' => 2, 'LastName' => 3, 'Email' => 4, 'Signature' => 5, 'JobRole' => 6, 'Address' => 7, 'City' => 8, 'PostalCode' => 9, 'Country' => 10, 'PhoneNumber' => 11, 'MobileNumber' => 12, 'FaxNumber' => 13, 'Comment' => 14, 'Confidential' => 15, 'CreatedAt' => 16, 'UpdatedAt' => 17, 'CreatedBy' => 18, 'UpdatedBy' => 19, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'isActive' => 1, 'firstName' => 2, 'lastName' => 3, 'email' => 4, 'signature' => 5, 'jobRole' => 6, 'address' => 7, 'city' => 8, 'postalCode' => 9, 'country' => 10, 'phoneNumber' => 11, 'mobileNumber' => 12, 'faxNumber' => 13, 'comment' => 14, 'confidential' => 15, 'createdAt' => 16, 'updatedAt' => 17, 'createdBy' => 18, 'updatedBy' => 19, ),
        BasePeer::TYPE_COLNAME => array (self::ID => 0, self::IS_ACTIVE => 1, self::FIRST_NAME => 2, self::LAST_NAME => 3, self::EMAIL => 4, self::SIGNATURE => 5, self::JOB_ROLE => 6, self::ADDRESS => 7, self::CITY => 8, self::POSTAL_CODE => 9, self::COUNTRY => 10, self::PHONE_NUMBER => 11, self::MOBILE_NUMBER => 12, self::FAX_NUMBER => 13, self::COMMENT => 14, self::CONFIDENTIAL => 15, self::CREATED_AT => 16, self::UPDATED_AT => 17, self::CREATED_BY => 18, self::UPDATED_BY => 19, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'IS_ACTIVE' => 1, 'FIRST_NAME' => 2, 'LAST_NAME' => 3, 'EMAIL' => 4, 'SIGNATURE' => 5, 'JOB_ROLE' => 6, 'ADDRESS' => 7, 'CITY' => 8, 'POSTAL_CODE' => 9, 'COUNTRY' => 10, 'PHONE_NUMBER' => 11, 'MOBILE_NUMBER' => 12, 'FAX_NUMBER' => 13, 'COMMENT' => 14, 'CONFIDENTIAL' => 15, 'CREATED_AT' => 16, 'UPDATED_AT' => 17, 'CREATED_BY' => 18, 'UPDATED_BY' => 19, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'is_active' => 1, 'first_name' => 2, 'last_name' => 3, 'email' => 4, 'signature' => 5, 'job_role' => 6, 'address' => 7, 'city' => 8, 'postal_code' => 9, 'country' => 10, 'phone_number' => 11, 'mobile_number' => 12, 'fax_number' => 13, 'comment' => 14, 'confidential' => 15, 'created_at' => 16, 'updated_at' => 17, 'created_by' => 18, 'updated_by' => 19, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
     * @param      string $column The column name for current table. (i.e. CollaboratorPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(CollaboratorPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(CollaboratorPeer::ID);
			$criteria->addSelectColumn(CollaboratorPeer::IS_ACTIVE);
			$criteria->addSelectColumn(CollaboratorPeer::FIRST_NAME);
			$criteria->addSelectColumn(CollaboratorPeer::LAST_NAME);
			$criteria->addSelectColumn(CollaboratorPeer::EMAIL);
			$criteria->addSelectColumn(CollaboratorPeer::SIGNATURE);
			$criteria->addSelectColumn(CollaboratorPeer::JOB_ROLE);
			$criteria->addSelectColumn(CollaboratorPeer::ADDRESS);
			$criteria->addSelectColumn(CollaboratorPeer::CITY);
			$criteria->addSelectColumn(CollaboratorPeer::POSTAL_CODE);
			$criteria->addSelectColumn(CollaboratorPeer::COUNTRY);
			$criteria->addSelectColumn(CollaboratorPeer::PHONE_NUMBER);
			$criteria->addSelectColumn(CollaboratorPeer::MOBILE_NUMBER);
			$criteria->addSelectColumn(CollaboratorPeer::FAX_NUMBER);
			$criteria->addSelectColumn(CollaboratorPeer::COMMENT);
			$criteria->addSelectColumn(CollaboratorPeer::CONFIDENTIAL);
			$criteria->addSelectColumn(CollaboratorPeer::CREATED_AT);
			$criteria->addSelectColumn(CollaboratorPeer::UPDATED_AT);
			$criteria->addSelectColumn(CollaboratorPeer::CREATED_BY);
			$criteria->addSelectColumn(CollaboratorPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias.'.ID');
			$criteria->addSelectColumn($alias.'.IS_ACTIVE');
			$criteria->addSelectColumn($alias.'.FIRST_NAME');
			$criteria->addSelectColumn($alias.'.LAST_NAME');
			$criteria->addSelectColumn($alias.'.EMAIL');
			$criteria->addSelectColumn($alias.'.SIGNATURE');
			$criteria->addSelectColumn($alias.'.JOB_ROLE');
			$criteria->addSelectColumn($alias.'.ADDRESS');
			$criteria->addSelectColumn($alias.'.CITY');
			$criteria->addSelectColumn($alias.'.POSTAL_CODE');
			$criteria->addSelectColumn($alias.'.COUNTRY');
			$criteria->addSelectColumn($alias.'.PHONE_NUMBER');
			$criteria->addSelectColumn($alias.'.MOBILE_NUMBER');
			$criteria->addSelectColumn($alias.'.FAX_NUMBER');
			$criteria->addSelectColumn($alias.'.COMMENT');
			$criteria->addSelectColumn($alias.'.CONFIDENTIAL');
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
        $criteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CollaboratorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Collaborator
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = CollaboratorPeer::doSelect($critcopy, $con);
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
        return CollaboratorPeer::populateObjects(CollaboratorPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            CollaboratorPeer::addSelectColumns($criteria);
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
     * @param      Collaborator $obj A Collaborator object.
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
     * @param      mixed $value A Collaborator object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Collaborator) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Collaborator object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
     * @return   Collaborator Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
     * Method to invalidate the instance pool of all tables related to collaborator
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in sfGuardUserProfilePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        sfGuardUserProfilePeer::clearInstancePool();
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
        $cls = CollaboratorPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = CollaboratorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = CollaboratorPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CollaboratorPeer::addInstanceToPool($obj, $key);
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
     * @return array (Collaborator object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = CollaboratorPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = CollaboratorPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + CollaboratorPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CollaboratorPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            CollaboratorPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CollaboratorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CollaboratorPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
        $criteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CollaboratorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CollaboratorPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Selects a collection of Collaborator objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Collaborator objects.
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

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol = CollaboratorPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(CollaboratorPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CollaboratorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CollaboratorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CollaboratorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Collaborator) to $obj2 (sfGuardUser)
                $obj2->addCollaboratorRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Collaborator objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Collaborator objects.
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

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol = CollaboratorPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(CollaboratorPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CollaboratorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = CollaboratorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CollaboratorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Collaborator) to $obj2 (sfGuardUser)
                $obj2->addCollaboratorRelatedByUpdatedBy($obj1);

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
        $criteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CollaboratorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(CollaboratorPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(CollaboratorPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

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
     * Selects a collection of Collaborator objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Collaborator objects.
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

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol2 = CollaboratorPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(CollaboratorPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(CollaboratorPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CollaboratorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CollaboratorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CollaboratorPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Collaborator) to the collection in $obj2 (sfGuardUser)
                $obj2->addCollaboratorRelatedByCreatedBy($obj1);
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

                // Add the $obj1 (Collaborator) to the collection in $obj3 (sfGuardUser)
                $obj3->addCollaboratorRelatedByUpdatedBy($obj1);
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
        $criteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CollaboratorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
        $criteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            CollaboratorPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Selects a collection of Collaborator objects pre-filled with all related objects except sfGuardUserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Collaborator objects.
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

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol2 = CollaboratorPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CollaboratorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CollaboratorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CollaboratorPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Collaborator objects pre-filled with all related objects except sfGuardUserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Collaborator objects.
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

        CollaboratorPeer::addSelectColumns($criteria);
        $startcol2 = CollaboratorPeer::NUM_HYDRATE_COLUMNS;


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = CollaboratorPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = CollaboratorPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = CollaboratorPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                CollaboratorPeer::addInstanceToPool($obj1, $key1);
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
      $dbMap = Propel::getDatabaseMap(BaseCollaboratorPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseCollaboratorPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new CollaboratorTableMap());
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
        return CollaboratorPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Collaborator or Criteria object.
     *
     * @param      mixed $values Criteria or Collaborator object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseCollaboratorPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCollaboratorPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Collaborator object
        }

        if ($criteria->containsKey(CollaboratorPeer::ID) && $criteria->keyContainsValue(CollaboratorPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CollaboratorPeer::ID.')');
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
     * Performs an UPDATE on the database, given a Collaborator or Criteria object.
     *
     * @param      mixed $values Criteria or Collaborator object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseCollaboratorPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseCollaboratorPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(self::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(CollaboratorPeer::ID);
            $value = $criteria->remove(CollaboratorPeer::ID);
            if ($value) {
                $selectCriteria->add(CollaboratorPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(CollaboratorPeer::TABLE_NAME);
            }

        } else { // $values is Collaborator object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the collaborator table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += CollaboratorPeer::doOnDeleteCascade(new Criteria(CollaboratorPeer::DATABASE_NAME), $con);
            CollaboratorPeer::doOnDeleteSetNull(new Criteria(CollaboratorPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(CollaboratorPeer::TABLE_NAME, $con, CollaboratorPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CollaboratorPeer::clearInstancePool();
            CollaboratorPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Collaborator or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Collaborator object or primary key or array of primary keys
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
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Collaborator) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(CollaboratorPeer::ID, (array) $values, Criteria::IN);
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
            $affectedRows += CollaboratorPeer::doOnDeleteCascade($c, $con);
            
            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            CollaboratorPeer::doOnDeleteSetNull($c, $con);
            
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                CollaboratorPeer::clearInstancePool();
            } elseif ($values instanceof Collaborator) { // it's a model object
                CollaboratorPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    CollaboratorPeer::removeInstanceFromPool($singleval);
                }
            }
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            CollaboratorPeer::clearRelatedInstancePool();
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
        $objects = CollaboratorPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related sfGuardUserProfile objects
            $criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);
            
            $criteria->add(sfGuardUserProfilePeer::COLLABORATOR_ID, $obj->getId());
            $affectedRows += sfGuardUserProfilePeer::doDelete($criteria, $con);
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
        $objects = CollaboratorPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {

            // set fkey col in related SfcComment rows to NULL
            $selectCriteria = new Criteria(CollaboratorPeer::DATABASE_NAME);
            $updateValues = new Criteria(CollaboratorPeer::DATABASE_NAME);
            $selectCriteria->add(SfcCommentPeer::COLLABORATOR_ID, $obj->getId());
            $updateValues->add(SfcCommentPeer::COLLABORATOR_ID, null);

            BasePeer::doUpdate($selectCriteria, $updateValues, $con); // use BasePeer because generated Peer doUpdate() methods only update using pkey

        }
    }

    /**
     * Validates all modified columns of given Collaborator object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Collaborator $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(CollaboratorPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(CollaboratorPeer::TABLE_NAME);

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

        $res =  BasePeer::doValidate(CollaboratorPeer::DATABASE_NAME, CollaboratorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CollaboratorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
	 * @return     Collaborator
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{
		$pk = (int) $pk; // Casting pk as it's php type to prevent error from empty string
		if(!$pk){
			return null;
		}

		if (null !== ($obj = CollaboratorPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CollaboratorPeer::DATABASE_NAME);
		$criteria->add(CollaboratorPeer::ID, $pk);

		$v = CollaboratorPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Collaborator[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(CollaboratorPeer::DATABASE_NAME);
            $criteria->add(CollaboratorPeer::ID, $pks, Criteria::IN);
            $objs = CollaboratorPeer::doSelect($criteria, $con);
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
		return CollaboratorPeer::doSelectFieldValues(CollaboratorPeer::ID, $criteria, true, $con);
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
      $column = CollaboratorPeer::getTableMap()->getColumn($field);
      $criteria->clearSelectColumns();
      $criteria->addSelectColumn($field);
      $stmt = CollaboratorPeer::doSelectStmt($criteria, $con);
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
	public static function getMetadata($info = null, $default = null, $class = 'Collaborator') {
		if(!CollaboratorPeer::$_metadata) {
			$metadata = sfConfig::get('app_metadata_' . $class, array());
			$default_metadata = array(
				'name' => $class,
				'app' => sfConfig::get('sf_app'),
				'module' => sfInflector::underscore($class)
			);
			CollaboratorPeer::$_metadata = array_merge($default_metadata, $metadata);
		}
		if($info) {
			return get($info, CollaboratorPeer::$_metadata, $default);
		}
		return CollaboratorPeer::$_metadata;
	}
} // BaseCollaboratorPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCollaboratorPeer::buildTableMap();


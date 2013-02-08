<?php


/**
 * Base class that represents a query for the 'plugin_history' table.
 *
 * 
 *
 * @method     HistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     HistoryQuery orderByDateRef($order = Criteria::ASC) Order by the date_ref column
 * @method     HistoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     HistoryQuery orderByObjectId($order = Criteria::ASC) Order by the object_id column
 * @method     HistoryQuery orderByObjectName($order = Criteria::ASC) Order by the object_name column
 * @method     HistoryQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     HistoryQuery orderByNameSpace($order = Criteria::ASC) Order by the name_space column
 * @method     HistoryQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method     HistoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     HistoryQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     HistoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     HistoryQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     HistoryQuery groupById() Group by the id column
 * @method     HistoryQuery groupByDateRef() Group by the date_ref column
 * @method     HistoryQuery groupByDescription() Group by the description column
 * @method     HistoryQuery groupByObjectId() Group by the object_id column
 * @method     HistoryQuery groupByObjectName() Group by the object_name column
 * @method     HistoryQuery groupByType() Group by the type column
 * @method     HistoryQuery groupByNameSpace() Group by the name_space column
 * @method     HistoryQuery groupByGroupId() Group by the group_id column
 * @method     HistoryQuery groupByCreatedAt() Group by the created_at column
 * @method     HistoryQuery groupByCreatedBy() Group by the created_by column
 * @method     HistoryQuery groupByUpdatedAt() Group by the updated_at column
 * @method     HistoryQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     HistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     HistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     HistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     HistoryQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     HistoryQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     HistoryQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     HistoryQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     HistoryQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     HistoryQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     HistoryQuery leftJoinHistoryContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the HistoryContact relation
 * @method     HistoryQuery rightJoinHistoryContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HistoryContact relation
 * @method     HistoryQuery innerJoinHistoryContact($relationAlias = null) Adds a INNER JOIN clause to the query using the HistoryContact relation
 *
 * @method     History findOne(PropelPDO $con = null) Return the first History matching the query
 * @method     History findOneOrCreate(PropelPDO $con = null) Return the first History matching the query, or a new History object populated from the query conditions when no match is found
 *
 * @method     History findOneById(int $id) Return the first History filtered by the id column
 * @method     History findOneByDateRef(string $date_ref) Return the first History filtered by the date_ref column
 * @method     History findOneByDescription(string $description) Return the first History filtered by the description column
 * @method     History findOneByObjectId(int $object_id) Return the first History filtered by the object_id column
 * @method     History findOneByObjectName(string $object_name) Return the first History filtered by the object_name column
 * @method     History findOneByType(string $type) Return the first History filtered by the type column
 * @method     History findOneByNameSpace(string $name_space) Return the first History filtered by the name_space column
 * @method     History findOneByGroupId(int $group_id) Return the first History filtered by the group_id column
 * @method     History findOneByCreatedAt(string $created_at) Return the first History filtered by the created_at column
 * @method     History findOneByCreatedBy(int $created_by) Return the first History filtered by the created_by column
 * @method     History findOneByUpdatedAt(string $updated_at) Return the first History filtered by the updated_at column
 * @method     History findOneByUpdatedBy(int $updated_by) Return the first History filtered by the updated_by column
 *
 * @method     array findById(int $id) Return History objects filtered by the id column
 * @method     array findByDateRef(string $date_ref) Return History objects filtered by the date_ref column
 * @method     array findByDescription(string $description) Return History objects filtered by the description column
 * @method     array findByObjectId(int $object_id) Return History objects filtered by the object_id column
 * @method     array findByObjectName(string $object_name) Return History objects filtered by the object_name column
 * @method     array findByType(string $type) Return History objects filtered by the type column
 * @method     array findByNameSpace(string $name_space) Return History objects filtered by the name_space column
 * @method     array findByGroupId(int $group_id) Return History objects filtered by the group_id column
 * @method     array findByCreatedAt(string $created_at) Return History objects filtered by the created_at column
 * @method     array findByCreatedBy(int $created_by) Return History objects filtered by the created_by column
 * @method     array findByUpdatedAt(string $updated_at) Return History objects filtered by the updated_at column
 * @method     array findByUpdatedBy(int $updated_by) Return History objects filtered by the updated_by column
 *
 * @package    propel.generator.plugins.surfaceHistoryBehaviorPlugin.lib.model.om
 */
abstract class BaseHistoryQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseHistoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'History', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new HistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     HistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return HistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof HistoryQuery) {
            return $criteria;
        }
        $query = new HistoryQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   History|History[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = HistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(HistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   History A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DATE_REF`, `DESCRIPTION`, `OBJECT_ID`, `OBJECT_NAME`, `TYPE`, `NAME_SPACE`, `GROUP_ID`, `CREATED_AT`, `CREATED_BY`, `UPDATED_AT`, `UPDATED_BY` FROM `plugin_history` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new History();
            $obj->hydrate($row);
            HistoryPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return History|History[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|History[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HistoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HistoryPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(HistoryPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the date_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByDateRef('2011-03-14'); // WHERE date_ref = '2011-03-14'
     * $query->filterByDateRef('now'); // WHERE date_ref = '2011-03-14'
     * $query->filterByDateRef(array('max' => 'yesterday')); // WHERE date_ref > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateRef The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByDateRef($dateRef = null, $comparison = null)
    {
        if (is_array($dateRef)) {
            $useMinMax = false;
            if (isset($dateRef['min'])) {
                $this->addUsingAlias(HistoryPeer::DATE_REF, $dateRef['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateRef['max'])) {
                $this->addUsingAlias(HistoryPeer::DATE_REF, $dateRef['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::DATE_REF, $dateRef, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HistoryPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the object_id column
     *
     * Example usage:
     * <code>
     * $query->filterByObjectId(1234); // WHERE object_id = 1234
     * $query->filterByObjectId(array(12, 34)); // WHERE object_id IN (12, 34)
     * $query->filterByObjectId(array('min' => 12)); // WHERE object_id > 12
     * </code>
     *
     * @param     mixed $objectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByObjectId($objectId = null, $comparison = null)
    {
        if (is_array($objectId)) {
            $useMinMax = false;
            if (isset($objectId['min'])) {
                $this->addUsingAlias(HistoryPeer::OBJECT_ID, $objectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objectId['max'])) {
                $this->addUsingAlias(HistoryPeer::OBJECT_ID, $objectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::OBJECT_ID, $objectId, $comparison);
    }

    /**
     * Filter the query on the object_name column
     *
     * Example usage:
     * <code>
     * $query->filterByObjectName('fooValue');   // WHERE object_name = 'fooValue'
     * $query->filterByObjectName('%fooValue%'); // WHERE object_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $objectName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByObjectName($objectName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($objectName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $objectName)) {
                $objectName = str_replace('*', '%', $objectName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HistoryPeer::OBJECT_NAME, $objectName, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HistoryPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the name_space column
     *
     * Example usage:
     * <code>
     * $query->filterByNameSpace('fooValue');   // WHERE name_space = 'fooValue'
     * $query->filterByNameSpace('%fooValue%'); // WHERE name_space LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameSpace The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByNameSpace($nameSpace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameSpace)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nameSpace)) {
                $nameSpace = str_replace('*', '%', $nameSpace);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HistoryPeer::NAME_SPACE, $nameSpace, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id > 12
     * </code>
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(HistoryPeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(HistoryPeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(HistoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(HistoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
     * </code>
     *
     * @see       filterBysfGuardUserRelatedByCreatedBy()
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(HistoryPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(HistoryPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(HistoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(HistoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by > 12
     * </code>
     *
     * @see       filterBysfGuardUserRelatedByUpdatedBy()
     *
     * @param     mixed $updatedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(HistoryPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(HistoryPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   HistoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(HistoryPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HistoryPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfGuardUserRelatedByCreatedBy() only accepts arguments of type sfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function joinsfGuardUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserRelatedByCreatedBy');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'sfGuardUserRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserRelatedByCreatedBy relation sfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfGuardUserRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByCreatedBy', 'sfGuardUserQuery');
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   HistoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(HistoryPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HistoryPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfGuardUserRelatedByUpdatedBy() only accepts arguments of type sfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function joinsfGuardUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserRelatedByUpdatedBy');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'sfGuardUserRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserRelatedByUpdatedBy relation sfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfGuardUserRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByUpdatedBy', 'sfGuardUserQuery');
    }

    /**
     * Filter the query by a related HistoryContact object
     *
     * @param   HistoryContact|PropelObjectCollection $historyContact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   HistoryQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByHistoryContact($historyContact, $comparison = null)
    {
        if ($historyContact instanceof HistoryContact) {
            return $this
                ->addUsingAlias(HistoryPeer::ID, $historyContact->getHistoryId(), $comparison);
        } elseif ($historyContact instanceof PropelObjectCollection) {
            return $this
                ->useHistoryContactQuery()
                ->filterByPrimaryKeys($historyContact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHistoryContact() only accepts arguments of type HistoryContact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HistoryContact relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function joinHistoryContact($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HistoryContact');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'HistoryContact');
        }

        return $this;
    }

    /**
     * Use the HistoryContact relation HistoryContact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   HistoryContactQuery A secondary query class using the current class as primary query
     */
    public function useHistoryContactQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHistoryContact($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HistoryContact', 'HistoryContactQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   History $history Object to remove from the list of results
     *
     * @return HistoryQuery The current query, for fluid interface
     */
    public function prune($history = null)
    {
        if ($history) {
            $this->addUsingAlias(HistoryPeer::ID, $history->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseHistoryQuery
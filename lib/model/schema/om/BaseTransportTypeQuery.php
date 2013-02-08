<?php


/**
 * Base class that represents a query for the 'ratp_transport_type' table.
 *
 * 
 *
 * @method     TransportTypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TransportTypeQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     TransportTypeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TransportTypeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     TransportTypeQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     TransportTypeQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     TransportTypeQuery groupById() Group by the id column
 * @method     TransportTypeQuery groupByType() Group by the type column
 * @method     TransportTypeQuery groupByCreatedAt() Group by the created_at column
 * @method     TransportTypeQuery groupByUpdatedAt() Group by the updated_at column
 * @method     TransportTypeQuery groupByCreatedBy() Group by the created_by column
 * @method     TransportTypeQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     TransportTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TransportTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TransportTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TransportTypeQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     TransportTypeQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     TransportTypeQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     TransportTypeQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     TransportTypeQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     TransportTypeQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     TransportTypeQuery leftJoinStationType($relationAlias = null) Adds a LEFT JOIN clause to the query using the StationType relation
 * @method     TransportTypeQuery rightJoinStationType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StationType relation
 * @method     TransportTypeQuery innerJoinStationType($relationAlias = null) Adds a INNER JOIN clause to the query using the StationType relation
 *
 * @method     TransportType findOne(PropelPDO $con = null) Return the first TransportType matching the query
 * @method     TransportType findOneOrCreate(PropelPDO $con = null) Return the first TransportType matching the query, or a new TransportType object populated from the query conditions when no match is found
 *
 * @method     TransportType findOneById(int $id) Return the first TransportType filtered by the id column
 * @method     TransportType findOneByType(string $type) Return the first TransportType filtered by the type column
 * @method     TransportType findOneByCreatedAt(string $created_at) Return the first TransportType filtered by the created_at column
 * @method     TransportType findOneByUpdatedAt(string $updated_at) Return the first TransportType filtered by the updated_at column
 * @method     TransportType findOneByCreatedBy(int $created_by) Return the first TransportType filtered by the created_by column
 * @method     TransportType findOneByUpdatedBy(int $updated_by) Return the first TransportType filtered by the updated_by column
 *
 * @method     array findById(int $id) Return TransportType objects filtered by the id column
 * @method     array findByType(string $type) Return TransportType objects filtered by the type column
 * @method     array findByCreatedAt(string $created_at) Return TransportType objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return TransportType objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return TransportType objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return TransportType objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.schema.om
 */
abstract class BaseTransportTypeQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseTransportTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'TransportType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TransportTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TransportTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TransportTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TransportTypeQuery) {
            return $criteria;
        }
        $query = new TransportTypeQuery();
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
     * @return   TransportType|TransportType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TransportTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TransportTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   TransportType A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `TYPE`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `ratp_transport_type` WHERE `ID` = :p0';
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
            $obj = new TransportType();
            $obj->hydrate($row);
            TransportTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return TransportType|TransportType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TransportType[]|mixed the list of results, formatted by the current formatter
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
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TransportTypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TransportTypePeer::ID, $keys, Criteria::IN);
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
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TransportTypePeer::ID, $id, $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TransportTypePeer::TYPE, $type, $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TransportTypePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TransportTypePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransportTypePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TransportTypePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TransportTypePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransportTypePeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(TransportTypePeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(TransportTypePeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransportTypePeer::CREATED_BY, $createdBy, $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(TransportTypePeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(TransportTypePeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TransportTypePeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TransportTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(TransportTypePeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TransportTypePeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
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
     * @return   TransportTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(TransportTypePeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TransportTypePeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TransportTypeQuery The current query, for fluid interface
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
     * Filter the query by a related StationType object
     *
     * @param   StationType|PropelObjectCollection $stationType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TransportTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStationType($stationType, $comparison = null)
    {
        if ($stationType instanceof StationType) {
            return $this
                ->addUsingAlias(TransportTypePeer::ID, $stationType->getTypeId(), $comparison);
        } elseif ($stationType instanceof PropelObjectCollection) {
            return $this
                ->useStationTypeQuery()
                ->filterByPrimaryKeys($stationType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStationType() only accepts arguments of type StationType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StationType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function joinStationType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StationType');

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
            $this->addJoinObject($join, 'StationType');
        }

        return $this;
    }

    /**
     * Use the StationType relation StationType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationTypeQuery A secondary query class using the current class as primary query
     */
    public function useStationTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStationType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StationType', 'StationTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TransportType $transportType Object to remove from the list of results
     *
     * @return TransportTypeQuery The current query, for fluid interface
     */
    public function prune($transportType = null)
    {
        if ($transportType) {
            $this->addUsingAlias(TransportTypePeer::ID, $transportType->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseTransportTypeQuery
<?php


/**
 * Base class that represents a query for the 'ratp_station_type' table.
 *
 * 
 *
 * @method     StationTypeQuery orderByStationId($order = Criteria::ASC) Order by the station_id column
 * @method     StationTypeQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 *
 * @method     StationTypeQuery groupByStationId() Group by the station_id column
 * @method     StationTypeQuery groupByTypeId() Group by the type_id column
 *
 * @method     StationTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     StationTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     StationTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     StationTypeQuery leftJoinStation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Station relation
 * @method     StationTypeQuery rightJoinStation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Station relation
 * @method     StationTypeQuery innerJoinStation($relationAlias = null) Adds a INNER JOIN clause to the query using the Station relation
 *
 * @method     StationTypeQuery leftJoinTransportType($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransportType relation
 * @method     StationTypeQuery rightJoinTransportType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransportType relation
 * @method     StationTypeQuery innerJoinTransportType($relationAlias = null) Adds a INNER JOIN clause to the query using the TransportType relation
 *
 * @method     StationType findOne(PropelPDO $con = null) Return the first StationType matching the query
 * @method     StationType findOneOrCreate(PropelPDO $con = null) Return the first StationType matching the query, or a new StationType object populated from the query conditions when no match is found
 *
 * @method     StationType findOneByStationId(int $station_id) Return the first StationType filtered by the station_id column
 * @method     StationType findOneByTypeId(int $type_id) Return the first StationType filtered by the type_id column
 *
 * @method     array findByStationId(int $station_id) Return StationType objects filtered by the station_id column
 * @method     array findByTypeId(int $type_id) Return StationType objects filtered by the type_id column
 *
 * @package    propel.generator.lib.model.schema.om
 */
abstract class BaseStationTypeQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseStationTypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'StationType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StationTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     StationTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StationTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StationTypeQuery) {
            return $criteria;
        }
        $query = new StationTypeQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$station_id, $type_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   StationType|StationType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StationTypePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StationTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   StationType A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `STATION_ID`, `TYPE_ID` FROM `ratp_station_type` WHERE `STATION_ID` = :p0 AND `TYPE_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new StationType();
            $obj->hydrate($row);
            StationTypePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return StationType|StationType[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|StationType[]|mixed the list of results, formatted by the current formatter
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
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(StationTypePeer::STATION_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(StationTypePeer::TYPE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(StationTypePeer::STATION_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(StationTypePeer::TYPE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the station_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStationId(1234); // WHERE station_id = 1234
     * $query->filterByStationId(array(12, 34)); // WHERE station_id IN (12, 34)
     * $query->filterByStationId(array('min' => 12)); // WHERE station_id > 12
     * </code>
     *
     * @see       filterByStation()
     *
     * @param     mixed $stationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function filterByStationId($stationId = null, $comparison = null)
    {
        if (is_array($stationId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(StationTypePeer::STATION_ID, $stationId, $comparison);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id > 12
     * </code>
     *
     * @see       filterByTransportType()
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(StationTypePeer::TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query by a related Station object
     *
     * @param   Station|PropelObjectCollection $station The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   StationTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStation($station, $comparison = null)
    {
        if ($station instanceof Station) {
            return $this
                ->addUsingAlias(StationTypePeer::STATION_ID, $station->getId(), $comparison);
        } elseif ($station instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StationTypePeer::STATION_ID, $station->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStation() only accepts arguments of type Station or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Station relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function joinStation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Station');

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
            $this->addJoinObject($join, 'Station');
        }

        return $this;
    }

    /**
     * Use the Station relation Station object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationQuery A secondary query class using the current class as primary query
     */
    public function useStationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Station', 'StationQuery');
    }

    /**
     * Filter the query by a related TransportType object
     *
     * @param   TransportType|PropelObjectCollection $transportType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   StationTypeQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTransportType($transportType, $comparison = null)
    {
        if ($transportType instanceof TransportType) {
            return $this
                ->addUsingAlias(StationTypePeer::TYPE_ID, $transportType->getId(), $comparison);
        } elseif ($transportType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StationTypePeer::TYPE_ID, $transportType->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTransportType() only accepts arguments of type TransportType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransportType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function joinTransportType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TransportType');

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
            $this->addJoinObject($join, 'TransportType');
        }

        return $this;
    }

    /**
     * Use the TransportType relation TransportType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TransportTypeQuery A secondary query class using the current class as primary query
     */
    public function useTransportTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTransportType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransportType', 'TransportTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   StationType $stationType Object to remove from the list of results
     *
     * @return StationTypeQuery The current query, for fluid interface
     */
    public function prune($stationType = null)
    {
        if ($stationType) {
            $this->addCond('pruneCond0', $this->getAliasedColName(StationTypePeer::STATION_ID), $stationType->getStationId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(StationTypePeer::TYPE_ID), $stationType->getTypeId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseStationTypeQuery
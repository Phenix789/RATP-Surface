<?php


/**
 * Base class that represents a query for the 'stat_filter' table.
 *
 * 
 *
 * @method     FilterQuery orderByWorksheetId($order = Criteria::ASC) Order by the worksheet_id column
 * @method     FilterQuery orderByDiscreteFieldId($order = Criteria::ASC) Order by the discrete_field_id column
 *
 * @method     FilterQuery groupByWorksheetId() Group by the worksheet_id column
 * @method     FilterQuery groupByDiscreteFieldId() Group by the discrete_field_id column
 *
 * @method     FilterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FilterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FilterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FilterQuery leftJoinWorksheet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Worksheet relation
 * @method     FilterQuery rightJoinWorksheet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Worksheet relation
 * @method     FilterQuery innerJoinWorksheet($relationAlias = null) Adds a INNER JOIN clause to the query using the Worksheet relation
 *
 * @method     FilterQuery leftJoinDiscreteField($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiscreteField relation
 * @method     FilterQuery rightJoinDiscreteField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiscreteField relation
 * @method     FilterQuery innerJoinDiscreteField($relationAlias = null) Adds a INNER JOIN clause to the query using the DiscreteField relation
 *
 * @method     Filter findOne(PropelPDO $con = null) Return the first Filter matching the query
 * @method     Filter findOneOrCreate(PropelPDO $con = null) Return the first Filter matching the query, or a new Filter object populated from the query conditions when no match is found
 *
 * @method     Filter findOneByWorksheetId(int $worksheet_id) Return the first Filter filtered by the worksheet_id column
 * @method     Filter findOneByDiscreteFieldId(int $discrete_field_id) Return the first Filter filtered by the discrete_field_id column
 *
 * @method     array findByWorksheetId(int $worksheet_id) Return Filter objects filtered by the worksheet_id column
 * @method     array findByDiscreteFieldId(int $discrete_field_id) Return Filter objects filtered by the discrete_field_id column
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseFilterQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseFilterQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Filter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FilterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FilterQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FilterQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FilterQuery) {
            return $criteria;
        }
        $query = new FilterQuery();
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
                         A Primary key composition: [$worksheet_id, $discrete_field_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Filter|Filter[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FilterPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FilterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Filter A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `WORKSHEET_ID`, `DISCRETE_FIELD_ID` FROM `stat_filter` WHERE `WORKSHEET_ID` = :p0 AND `DISCRETE_FIELD_ID` = :p1';
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
            $obj = new Filter();
            $obj->hydrate($row);
            FilterPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Filter|Filter[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Filter[]|mixed the list of results, formatted by the current formatter
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
     * @return FilterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FilterPeer::WORKSHEET_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FilterPeer::DISCRETE_FIELD_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FilterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FilterPeer::WORKSHEET_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FilterPeer::DISCRETE_FIELD_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the worksheet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWorksheetId(1234); // WHERE worksheet_id = 1234
     * $query->filterByWorksheetId(array(12, 34)); // WHERE worksheet_id IN (12, 34)
     * $query->filterByWorksheetId(array('min' => 12)); // WHERE worksheet_id > 12
     * </code>
     *
     * @see       filterByWorksheet()
     *
     * @param     mixed $worksheetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilterQuery The current query, for fluid interface
     */
    public function filterByWorksheetId($worksheetId = null, $comparison = null)
    {
        if (is_array($worksheetId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FilterPeer::WORKSHEET_ID, $worksheetId, $comparison);
    }

    /**
     * Filter the query on the discrete_field_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscreteFieldId(1234); // WHERE discrete_field_id = 1234
     * $query->filterByDiscreteFieldId(array(12, 34)); // WHERE discrete_field_id IN (12, 34)
     * $query->filterByDiscreteFieldId(array('min' => 12)); // WHERE discrete_field_id > 12
     * </code>
     *
     * @see       filterByDiscreteField()
     *
     * @param     mixed $discreteFieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FilterQuery The current query, for fluid interface
     */
    public function filterByDiscreteFieldId($discreteFieldId = null, $comparison = null)
    {
        if (is_array($discreteFieldId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FilterPeer::DISCRETE_FIELD_ID, $discreteFieldId, $comparison);
    }

    /**
     * Filter the query by a related Worksheet object
     *
     * @param   Worksheet|PropelObjectCollection $worksheet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FilterQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByWorksheet($worksheet, $comparison = null)
    {
        if ($worksheet instanceof Worksheet) {
            return $this
                ->addUsingAlias(FilterPeer::WORKSHEET_ID, $worksheet->getId(), $comparison);
        } elseif ($worksheet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FilterPeer::WORKSHEET_ID, $worksheet->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByWorksheet() only accepts arguments of type Worksheet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Worksheet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FilterQuery The current query, for fluid interface
     */
    public function joinWorksheet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Worksheet');

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
            $this->addJoinObject($join, 'Worksheet');
        }

        return $this;
    }

    /**
     * Use the Worksheet relation Worksheet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   WorksheetQuery A secondary query class using the current class as primary query
     */
    public function useWorksheetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWorksheet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Worksheet', 'WorksheetQuery');
    }

    /**
     * Filter the query by a related DiscreteField object
     *
     * @param   DiscreteField|PropelObjectCollection $discreteField The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   FilterQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDiscreteField($discreteField, $comparison = null)
    {
        if ($discreteField instanceof DiscreteField) {
            return $this
                ->addUsingAlias(FilterPeer::DISCRETE_FIELD_ID, $discreteField->getId(), $comparison);
        } elseif ($discreteField instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FilterPeer::DISCRETE_FIELD_ID, $discreteField->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDiscreteField() only accepts arguments of type DiscreteField or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DiscreteField relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FilterQuery The current query, for fluid interface
     */
    public function joinDiscreteField($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DiscreteField');

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
            $this->addJoinObject($join, 'DiscreteField');
        }

        return $this;
    }

    /**
     * Use the DiscreteField relation DiscreteField object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DiscreteFieldQuery A secondary query class using the current class as primary query
     */
    public function useDiscreteFieldQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiscreteField($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DiscreteField', 'DiscreteFieldQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Filter $filter Object to remove from the list of results
     *
     * @return FilterQuery The current query, for fluid interface
     */
    public function prune($filter = null)
    {
        if ($filter) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FilterPeer::WORKSHEET_ID), $filter->getWorksheetId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FilterPeer::DISCRETE_FIELD_ID), $filter->getDiscreteFieldId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseFilterQuery
<?php


/**
 * Base class that represents a query for the 'stat_value' table.
 *
 * 
 *
 * @method     ValueQuery orderByWorksheetId($order = Criteria::ASC) Order by the worksheet_id column
 * @method     ValueQuery orderByContinueFieldId($order = Criteria::ASC) Order by the continue_field_id column
 *
 * @method     ValueQuery groupByWorksheetId() Group by the worksheet_id column
 * @method     ValueQuery groupByContinueFieldId() Group by the continue_field_id column
 *
 * @method     ValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ValueQuery leftJoinWorksheet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Worksheet relation
 * @method     ValueQuery rightJoinWorksheet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Worksheet relation
 * @method     ValueQuery innerJoinWorksheet($relationAlias = null) Adds a INNER JOIN clause to the query using the Worksheet relation
 *
 * @method     ValueQuery leftJoinContinueField($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContinueField relation
 * @method     ValueQuery rightJoinContinueField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContinueField relation
 * @method     ValueQuery innerJoinContinueField($relationAlias = null) Adds a INNER JOIN clause to the query using the ContinueField relation
 *
 * @method     Value findOne(PropelPDO $con = null) Return the first Value matching the query
 * @method     Value findOneOrCreate(PropelPDO $con = null) Return the first Value matching the query, or a new Value object populated from the query conditions when no match is found
 *
 * @method     Value findOneByWorksheetId(int $worksheet_id) Return the first Value filtered by the worksheet_id column
 * @method     Value findOneByContinueFieldId(int $continue_field_id) Return the first Value filtered by the continue_field_id column
 *
 * @method     array findByWorksheetId(int $worksheet_id) Return Value objects filtered by the worksheet_id column
 * @method     array findByContinueFieldId(int $continue_field_id) Return Value objects filtered by the continue_field_id column
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseValueQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseValueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Value', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ValueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ValueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ValueQuery) {
            return $criteria;
        }
        $query = new ValueQuery();
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
                         A Primary key composition: [$worksheet_id, $continue_field_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Value|Value[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ValuePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ValuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Value A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `WORKSHEET_ID`, `CONTINUE_FIELD_ID` FROM `stat_value` WHERE `WORKSHEET_ID` = :p0 AND `CONTINUE_FIELD_ID` = :p1';
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
            $obj = new Value();
            $obj->hydrate($row);
            ValuePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Value|Value[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Value[]|mixed the list of results, formatted by the current formatter
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
     * @return ValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ValuePeer::WORKSHEET_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ValuePeer::CONTINUE_FIELD_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ValuePeer::WORKSHEET_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ValuePeer::CONTINUE_FIELD_ID, $key[1], Criteria::EQUAL);
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
     * @return ValueQuery The current query, for fluid interface
     */
    public function filterByWorksheetId($worksheetId = null, $comparison = null)
    {
        if (is_array($worksheetId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ValuePeer::WORKSHEET_ID, $worksheetId, $comparison);
    }

    /**
     * Filter the query on the continue_field_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContinueFieldId(1234); // WHERE continue_field_id = 1234
     * $query->filterByContinueFieldId(array(12, 34)); // WHERE continue_field_id IN (12, 34)
     * $query->filterByContinueFieldId(array('min' => 12)); // WHERE continue_field_id > 12
     * </code>
     *
     * @see       filterByContinueField()
     *
     * @param     mixed $continueFieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ValueQuery The current query, for fluid interface
     */
    public function filterByContinueFieldId($continueFieldId = null, $comparison = null)
    {
        if (is_array($continueFieldId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ValuePeer::CONTINUE_FIELD_ID, $continueFieldId, $comparison);
    }

    /**
     * Filter the query by a related Worksheet object
     *
     * @param   Worksheet|PropelObjectCollection $worksheet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ValueQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByWorksheet($worksheet, $comparison = null)
    {
        if ($worksheet instanceof Worksheet) {
            return $this
                ->addUsingAlias(ValuePeer::WORKSHEET_ID, $worksheet->getId(), $comparison);
        } elseif ($worksheet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ValuePeer::WORKSHEET_ID, $worksheet->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ValueQuery The current query, for fluid interface
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
     * Filter the query by a related ContinueField object
     *
     * @param   ContinueField|PropelObjectCollection $continueField The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ValueQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContinueField($continueField, $comparison = null)
    {
        if ($continueField instanceof ContinueField) {
            return $this
                ->addUsingAlias(ValuePeer::CONTINUE_FIELD_ID, $continueField->getId(), $comparison);
        } elseif ($continueField instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ValuePeer::CONTINUE_FIELD_ID, $continueField->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContinueField() only accepts arguments of type ContinueField or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContinueField relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ValueQuery The current query, for fluid interface
     */
    public function joinContinueField($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContinueField');

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
            $this->addJoinObject($join, 'ContinueField');
        }

        return $this;
    }

    /**
     * Use the ContinueField relation ContinueField object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContinueFieldQuery A secondary query class using the current class as primary query
     */
    public function useContinueFieldQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContinueField($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContinueField', 'ContinueFieldQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Value $value Object to remove from the list of results
     *
     * @return ValueQuery The current query, for fluid interface
     */
    public function prune($value = null)
    {
        if ($value) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ValuePeer::WORKSHEET_ID), $value->getWorksheetId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ValuePeer::CONTINUE_FIELD_ID), $value->getContinueFieldId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseValueQuery
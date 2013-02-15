<?php


/**
 * Base class that represents a query for the 'stat_continue_field' table.
 *
 * 
 *
 * @method     ContinueFieldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ContinueFieldQuery orderByDatasourceId($order = Criteria::ASC) Order by the datasource_id column
 * @method     ContinueFieldQuery orderByField($order = Criteria::ASC) Order by the field column
 * @method     ContinueFieldQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ContinueFieldQuery orderByOperator($order = Criteria::ASC) Order by the operator column
 *
 * @method     ContinueFieldQuery groupById() Group by the id column
 * @method     ContinueFieldQuery groupByDatasourceId() Group by the datasource_id column
 * @method     ContinueFieldQuery groupByField() Group by the field column
 * @method     ContinueFieldQuery groupByName() Group by the name column
 * @method     ContinueFieldQuery groupByOperator() Group by the operator column
 *
 * @method     ContinueFieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ContinueFieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ContinueFieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ContinueFieldQuery leftJoinDataSource($relationAlias = null) Adds a LEFT JOIN clause to the query using the DataSource relation
 * @method     ContinueFieldQuery rightJoinDataSource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DataSource relation
 * @method     ContinueFieldQuery innerJoinDataSource($relationAlias = null) Adds a INNER JOIN clause to the query using the DataSource relation
 *
 * @method     ContinueFieldQuery leftJoinValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Value relation
 * @method     ContinueFieldQuery rightJoinValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Value relation
 * @method     ContinueFieldQuery innerJoinValue($relationAlias = null) Adds a INNER JOIN clause to the query using the Value relation
 *
 * @method     ContinueField findOne(PropelPDO $con = null) Return the first ContinueField matching the query
 * @method     ContinueField findOneOrCreate(PropelPDO $con = null) Return the first ContinueField matching the query, or a new ContinueField object populated from the query conditions when no match is found
 *
 * @method     ContinueField findOneById(int $id) Return the first ContinueField filtered by the id column
 * @method     ContinueField findOneByDatasourceId(int $datasource_id) Return the first ContinueField filtered by the datasource_id column
 * @method     ContinueField findOneByField(string $field) Return the first ContinueField filtered by the field column
 * @method     ContinueField findOneByName(string $name) Return the first ContinueField filtered by the name column
 * @method     ContinueField findOneByOperator(int $operator) Return the first ContinueField filtered by the operator column
 *
 * @method     array findById(int $id) Return ContinueField objects filtered by the id column
 * @method     array findByDatasourceId(int $datasource_id) Return ContinueField objects filtered by the datasource_id column
 * @method     array findByField(string $field) Return ContinueField objects filtered by the field column
 * @method     array findByName(string $name) Return ContinueField objects filtered by the name column
 * @method     array findByOperator(int $operator) Return ContinueField objects filtered by the operator column
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseContinueFieldQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseContinueFieldQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ContinueField', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContinueFieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ContinueFieldQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContinueFieldQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContinueFieldQuery) {
            return $criteria;
        }
        $query = new ContinueFieldQuery();
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
     * @return   ContinueField|ContinueField[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContinueFieldPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContinueFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ContinueField A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, DATASOURCE_ID, FIELD, NAME, OPERATOR FROM stat_continue_field WHERE ID = :p0';
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
            $obj = new ContinueField();
            $obj->hydrate($row);
            ContinueFieldPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ContinueField|ContinueField[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContinueField[]|mixed the list of results, formatted by the current formatter
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
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContinueFieldPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContinueFieldPeer::ID, $keys, Criteria::IN);
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
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContinueFieldPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the datasource_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDatasourceId(1234); // WHERE datasource_id = 1234
     * $query->filterByDatasourceId(array(12, 34)); // WHERE datasource_id IN (12, 34)
     * $query->filterByDatasourceId(array('min' => 12)); // WHERE datasource_id > 12
     * </code>
     *
     * @see       filterByDataSource()
     *
     * @param     mixed $datasourceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterByDatasourceId($datasourceId = null, $comparison = null)
    {
        if (is_array($datasourceId)) {
            $useMinMax = false;
            if (isset($datasourceId['min'])) {
                $this->addUsingAlias(ContinueFieldPeer::DATASOURCE_ID, $datasourceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datasourceId['max'])) {
                $this->addUsingAlias(ContinueFieldPeer::DATASOURCE_ID, $datasourceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContinueFieldPeer::DATASOURCE_ID, $datasourceId, $comparison);
    }

    /**
     * Filter the query on the field column
     *
     * Example usage:
     * <code>
     * $query->filterByField('fooValue');   // WHERE field = 'fooValue'
     * $query->filterByField('%fooValue%'); // WHERE field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $field The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterByField($field = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($field)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $field)) {
                $field = str_replace('*', '%', $field);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContinueFieldPeer::FIELD, $field, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContinueFieldPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the operator column
     *
     * Example usage:
     * <code>
     * $query->filterByOperator(1234); // WHERE operator = 1234
     * $query->filterByOperator(array(12, 34)); // WHERE operator IN (12, 34)
     * $query->filterByOperator(array('min' => 12)); // WHERE operator > 12
     * </code>
     *
     * @param     mixed $operator The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function filterByOperator($operator = null, $comparison = null)
    {
        if (is_array($operator)) {
            $useMinMax = false;
            if (isset($operator['min'])) {
                $this->addUsingAlias(ContinueFieldPeer::OPERATOR, $operator['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($operator['max'])) {
                $this->addUsingAlias(ContinueFieldPeer::OPERATOR, $operator['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContinueFieldPeer::OPERATOR, $operator, $comparison);
    }

    /**
     * Filter the query by a related DataSource object
     *
     * @param   DataSource|PropelObjectCollection $dataSource The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContinueFieldQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDataSource($dataSource, $comparison = null)
    {
        if ($dataSource instanceof DataSource) {
            return $this
                ->addUsingAlias(ContinueFieldPeer::DATASOURCE_ID, $dataSource->getId(), $comparison);
        } elseif ($dataSource instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContinueFieldPeer::DATASOURCE_ID, $dataSource->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDataSource() only accepts arguments of type DataSource or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DataSource relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function joinDataSource($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DataSource');

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
            $this->addJoinObject($join, 'DataSource');
        }

        return $this;
    }

    /**
     * Use the DataSource relation DataSource object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DataSourceQuery A secondary query class using the current class as primary query
     */
    public function useDataSourceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDataSource($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DataSource', 'DataSourceQuery');
    }

    /**
     * Filter the query by a related Value object
     *
     * @param   Value|PropelObjectCollection $value  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContinueFieldQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByValue($value, $comparison = null)
    {
        if ($value instanceof Value) {
            return $this
                ->addUsingAlias(ContinueFieldPeer::ID, $value->getContinueFieldId(), $comparison);
        } elseif ($value instanceof PropelObjectCollection) {
            return $this
                ->useValueQuery()
                ->filterByPrimaryKeys($value->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByValue() only accepts arguments of type Value or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Value relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function joinValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Value');

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
            $this->addJoinObject($join, 'Value');
        }

        return $this;
    }

    /**
     * Use the Value relation Value object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ValueQuery A secondary query class using the current class as primary query
     */
    public function useValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Value', 'ValueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ContinueField $continueField Object to remove from the list of results
     *
     * @return ContinueFieldQuery The current query, for fluid interface
     */
    public function prune($continueField = null)
    {
        if ($continueField) {
            $this->addUsingAlias(ContinueFieldPeer::ID, $continueField->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseContinueFieldQuery
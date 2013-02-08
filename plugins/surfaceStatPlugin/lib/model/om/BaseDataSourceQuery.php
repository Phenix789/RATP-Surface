<?php


/**
 * Base class that represents a query for the 'stat_datasource' table.
 *
 * 
 *
 * @method     DataSourceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DataSourceQuery orderByTableRef($order = Criteria::ASC) Order by the table_ref column
 *
 * @method     DataSourceQuery groupById() Group by the id column
 * @method     DataSourceQuery groupByTableRef() Group by the table_ref column
 *
 * @method     DataSourceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DataSourceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DataSourceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DataSourceQuery leftJoinContinueField($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContinueField relation
 * @method     DataSourceQuery rightJoinContinueField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContinueField relation
 * @method     DataSourceQuery innerJoinContinueField($relationAlias = null) Adds a INNER JOIN clause to the query using the ContinueField relation
 *
 * @method     DataSourceQuery leftJoinDiscreteField($relationAlias = null) Adds a LEFT JOIN clause to the query using the DiscreteField relation
 * @method     DataSourceQuery rightJoinDiscreteField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DiscreteField relation
 * @method     DataSourceQuery innerJoinDiscreteField($relationAlias = null) Adds a INNER JOIN clause to the query using the DiscreteField relation
 *
 * @method     DataSource findOne(PropelPDO $con = null) Return the first DataSource matching the query
 * @method     DataSource findOneOrCreate(PropelPDO $con = null) Return the first DataSource matching the query, or a new DataSource object populated from the query conditions when no match is found
 *
 * @method     DataSource findOneById(int $id) Return the first DataSource filtered by the id column
 * @method     DataSource findOneByTableRef(string $table_ref) Return the first DataSource filtered by the table_ref column
 *
 * @method     array findById(int $id) Return DataSource objects filtered by the id column
 * @method     array findByTableRef(string $table_ref) Return DataSource objects filtered by the table_ref column
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseDataSourceQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseDataSourceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'DataSource', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DataSourceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DataSourceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DataSourceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DataSourceQuery) {
            return $criteria;
        }
        $query = new DataSourceQuery();
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
     * @return   DataSource|DataSource[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DataSourcePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DataSourcePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   DataSource A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `TABLE_REF` FROM `stat_datasource` WHERE `ID` = :p0';
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
            $obj = new DataSource();
            $obj->hydrate($row);
            DataSourcePeer::addInstanceToPool($obj, (string) $key);
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
     * @return DataSource|DataSource[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DataSource[]|mixed the list of results, formatted by the current formatter
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
     * @return DataSourceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DataSourcePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DataSourceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DataSourcePeer::ID, $keys, Criteria::IN);
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
     * @return DataSourceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DataSourcePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the table_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByTableRef('fooValue');   // WHERE table_ref = 'fooValue'
     * $query->filterByTableRef('%fooValue%'); // WHERE table_ref LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableRef The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DataSourceQuery The current query, for fluid interface
     */
    public function filterByTableRef($tableRef = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableRef)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tableRef)) {
                $tableRef = str_replace('*', '%', $tableRef);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DataSourcePeer::TABLE_REF, $tableRef, $comparison);
    }

    /**
     * Filter the query by a related ContinueField object
     *
     * @param   ContinueField|PropelObjectCollection $continueField  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DataSourceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContinueField($continueField, $comparison = null)
    {
        if ($continueField instanceof ContinueField) {
            return $this
                ->addUsingAlias(DataSourcePeer::ID, $continueField->getDatasourceId(), $comparison);
        } elseif ($continueField instanceof PropelObjectCollection) {
            return $this
                ->useContinueFieldQuery()
                ->filterByPrimaryKeys($continueField->getPrimaryKeys())
                ->endUse();
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
     * @return DataSourceQuery The current query, for fluid interface
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
     * Filter the query by a related DiscreteField object
     *
     * @param   DiscreteField|PropelObjectCollection $discreteField  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DataSourceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDiscreteField($discreteField, $comparison = null)
    {
        if ($discreteField instanceof DiscreteField) {
            return $this
                ->addUsingAlias(DataSourcePeer::ID, $discreteField->getDatasourceId(), $comparison);
        } elseif ($discreteField instanceof PropelObjectCollection) {
            return $this
                ->useDiscreteFieldQuery()
                ->filterByPrimaryKeys($discreteField->getPrimaryKeys())
                ->endUse();
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
     * @return DataSourceQuery The current query, for fluid interface
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
     * @param   DataSource $dataSource Object to remove from the list of results
     *
     * @return DataSourceQuery The current query, for fluid interface
     */
    public function prune($dataSource = null)
    {
        if ($dataSource) {
            $this->addUsingAlias(DataSourcePeer::ID, $dataSource->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseDataSourceQuery
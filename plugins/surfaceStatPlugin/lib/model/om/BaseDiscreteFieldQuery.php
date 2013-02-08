<?php


/**
 * Base class that represents a query for the 'stat_discrete_field' table.
 *
 * 
 *
 * @method     DiscreteFieldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DiscreteFieldQuery orderByDatasourceId($order = Criteria::ASC) Order by the datasource_id column
 * @method     DiscreteFieldQuery orderByCodeField($order = Criteria::ASC) Order by the code_field column
 * @method     DiscreteFieldQuery orderByLabelField($order = Criteria::ASC) Order by the label_field column
 * @method     DiscreteFieldQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     DiscreteFieldQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     DiscreteFieldQuery groupById() Group by the id column
 * @method     DiscreteFieldQuery groupByDatasourceId() Group by the datasource_id column
 * @method     DiscreteFieldQuery groupByCodeField() Group by the code_field column
 * @method     DiscreteFieldQuery groupByLabelField() Group by the label_field column
 * @method     DiscreteFieldQuery groupByName() Group by the name column
 * @method     DiscreteFieldQuery groupByType() Group by the type column
 *
 * @method     DiscreteFieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DiscreteFieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DiscreteFieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DiscreteFieldQuery leftJoinDataSource($relationAlias = null) Adds a LEFT JOIN clause to the query using the DataSource relation
 * @method     DiscreteFieldQuery rightJoinDataSource($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DataSource relation
 * @method     DiscreteFieldQuery innerJoinDataSource($relationAlias = null) Adds a INNER JOIN clause to the query using the DataSource relation
 *
 * @method     DiscreteFieldQuery leftJoinWorksheetRelatedByFirstParam($relationAlias = null) Adds a LEFT JOIN clause to the query using the WorksheetRelatedByFirstParam relation
 * @method     DiscreteFieldQuery rightJoinWorksheetRelatedByFirstParam($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WorksheetRelatedByFirstParam relation
 * @method     DiscreteFieldQuery innerJoinWorksheetRelatedByFirstParam($relationAlias = null) Adds a INNER JOIN clause to the query using the WorksheetRelatedByFirstParam relation
 *
 * @method     DiscreteFieldQuery leftJoinWorksheetRelatedBySecondParam($relationAlias = null) Adds a LEFT JOIN clause to the query using the WorksheetRelatedBySecondParam relation
 * @method     DiscreteFieldQuery rightJoinWorksheetRelatedBySecondParam($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WorksheetRelatedBySecondParam relation
 * @method     DiscreteFieldQuery innerJoinWorksheetRelatedBySecondParam($relationAlias = null) Adds a INNER JOIN clause to the query using the WorksheetRelatedBySecondParam relation
 *
 * @method     DiscreteFieldQuery leftJoinFilter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Filter relation
 * @method     DiscreteFieldQuery rightJoinFilter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Filter relation
 * @method     DiscreteFieldQuery innerJoinFilter($relationAlias = null) Adds a INNER JOIN clause to the query using the Filter relation
 *
 * @method     DiscreteField findOne(PropelPDO $con = null) Return the first DiscreteField matching the query
 * @method     DiscreteField findOneOrCreate(PropelPDO $con = null) Return the first DiscreteField matching the query, or a new DiscreteField object populated from the query conditions when no match is found
 *
 * @method     DiscreteField findOneById(int $id) Return the first DiscreteField filtered by the id column
 * @method     DiscreteField findOneByDatasourceId(int $datasource_id) Return the first DiscreteField filtered by the datasource_id column
 * @method     DiscreteField findOneByCodeField(string $code_field) Return the first DiscreteField filtered by the code_field column
 * @method     DiscreteField findOneByLabelField(string $label_field) Return the first DiscreteField filtered by the label_field column
 * @method     DiscreteField findOneByName(string $name) Return the first DiscreteField filtered by the name column
 * @method     DiscreteField findOneByType(int $type) Return the first DiscreteField filtered by the type column
 *
 * @method     array findById(int $id) Return DiscreteField objects filtered by the id column
 * @method     array findByDatasourceId(int $datasource_id) Return DiscreteField objects filtered by the datasource_id column
 * @method     array findByCodeField(string $code_field) Return DiscreteField objects filtered by the code_field column
 * @method     array findByLabelField(string $label_field) Return DiscreteField objects filtered by the label_field column
 * @method     array findByName(string $name) Return DiscreteField objects filtered by the name column
 * @method     array findByType(int $type) Return DiscreteField objects filtered by the type column
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseDiscreteFieldQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseDiscreteFieldQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'DiscreteField', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DiscreteFieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     DiscreteFieldQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DiscreteFieldQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DiscreteFieldQuery) {
            return $criteria;
        }
        $query = new DiscreteFieldQuery();
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
     * @return   DiscreteField|DiscreteField[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiscreteFieldPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DiscreteFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   DiscreteField A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `DATASOURCE_ID`, `CODE_FIELD`, `LABEL_FIELD`, `NAME`, `TYPE` FROM `stat_discrete_field` WHERE `ID` = :p0';
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
            $cls = DiscreteFieldPeer::getOMClass($row, 0);
            $obj = new $cls();
            $obj->hydrate($row);
            DiscreteFieldPeer::addInstanceToPool($obj, (string) $key);
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
     * @return DiscreteField|DiscreteField[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DiscreteField[]|mixed the list of results, formatted by the current formatter
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
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiscreteFieldPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiscreteFieldPeer::ID, $keys, Criteria::IN);
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
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(DiscreteFieldPeer::ID, $id, $comparison);
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
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterByDatasourceId($datasourceId = null, $comparison = null)
    {
        if (is_array($datasourceId)) {
            $useMinMax = false;
            if (isset($datasourceId['min'])) {
                $this->addUsingAlias(DiscreteFieldPeer::DATASOURCE_ID, $datasourceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datasourceId['max'])) {
                $this->addUsingAlias(DiscreteFieldPeer::DATASOURCE_ID, $datasourceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscreteFieldPeer::DATASOURCE_ID, $datasourceId, $comparison);
    }

    /**
     * Filter the query on the code_field column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeField('fooValue');   // WHERE code_field = 'fooValue'
     * $query->filterByCodeField('%fooValue%'); // WHERE code_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeField The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterByCodeField($codeField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeField)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codeField)) {
                $codeField = str_replace('*', '%', $codeField);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiscreteFieldPeer::CODE_FIELD, $codeField, $comparison);
    }

    /**
     * Filter the query on the label_field column
     *
     * Example usage:
     * <code>
     * $query->filterByLabelField('fooValue');   // WHERE label_field = 'fooValue'
     * $query->filterByLabelField('%fooValue%'); // WHERE label_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labelField The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterByLabelField($labelField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labelField)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $labelField)) {
                $labelField = str_replace('*', '%', $labelField);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiscreteFieldPeer::LABEL_FIELD, $labelField, $comparison);
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
     * @return DiscreteFieldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiscreteFieldPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(DiscreteFieldPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(DiscreteFieldPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiscreteFieldPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query by a related DataSource object
     *
     * @param   DataSource|PropelObjectCollection $dataSource The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DiscreteFieldQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDataSource($dataSource, $comparison = null)
    {
        if ($dataSource instanceof DataSource) {
            return $this
                ->addUsingAlias(DiscreteFieldPeer::DATASOURCE_ID, $dataSource->getId(), $comparison);
        } elseif ($dataSource instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiscreteFieldPeer::DATASOURCE_ID, $dataSource->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DiscreteFieldQuery The current query, for fluid interface
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
     * Filter the query by a related Worksheet object
     *
     * @param   Worksheet|PropelObjectCollection $worksheet  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DiscreteFieldQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByWorksheetRelatedByFirstParam($worksheet, $comparison = null)
    {
        if ($worksheet instanceof Worksheet) {
            return $this
                ->addUsingAlias(DiscreteFieldPeer::ID, $worksheet->getFirstParam(), $comparison);
        } elseif ($worksheet instanceof PropelObjectCollection) {
            return $this
                ->useWorksheetRelatedByFirstParamQuery()
                ->filterByPrimaryKeys($worksheet->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWorksheetRelatedByFirstParam() only accepts arguments of type Worksheet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WorksheetRelatedByFirstParam relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function joinWorksheetRelatedByFirstParam($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WorksheetRelatedByFirstParam');

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
            $this->addJoinObject($join, 'WorksheetRelatedByFirstParam');
        }

        return $this;
    }

    /**
     * Use the WorksheetRelatedByFirstParam relation Worksheet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   WorksheetQuery A secondary query class using the current class as primary query
     */
    public function useWorksheetRelatedByFirstParamQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWorksheetRelatedByFirstParam($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WorksheetRelatedByFirstParam', 'WorksheetQuery');
    }

    /**
     * Filter the query by a related Worksheet object
     *
     * @param   Worksheet|PropelObjectCollection $worksheet  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DiscreteFieldQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByWorksheetRelatedBySecondParam($worksheet, $comparison = null)
    {
        if ($worksheet instanceof Worksheet) {
            return $this
                ->addUsingAlias(DiscreteFieldPeer::ID, $worksheet->getSecondParam(), $comparison);
        } elseif ($worksheet instanceof PropelObjectCollection) {
            return $this
                ->useWorksheetRelatedBySecondParamQuery()
                ->filterByPrimaryKeys($worksheet->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWorksheetRelatedBySecondParam() only accepts arguments of type Worksheet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WorksheetRelatedBySecondParam relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function joinWorksheetRelatedBySecondParam($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WorksheetRelatedBySecondParam');

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
            $this->addJoinObject($join, 'WorksheetRelatedBySecondParam');
        }

        return $this;
    }

    /**
     * Use the WorksheetRelatedBySecondParam relation Worksheet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   WorksheetQuery A secondary query class using the current class as primary query
     */
    public function useWorksheetRelatedBySecondParamQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinWorksheetRelatedBySecondParam($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WorksheetRelatedBySecondParam', 'WorksheetQuery');
    }

    /**
     * Filter the query by a related Filter object
     *
     * @param   Filter|PropelObjectCollection $filter  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   DiscreteFieldQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByFilter($filter, $comparison = null)
    {
        if ($filter instanceof Filter) {
            return $this
                ->addUsingAlias(DiscreteFieldPeer::ID, $filter->getDiscreteFieldId(), $comparison);
        } elseif ($filter instanceof PropelObjectCollection) {
            return $this
                ->useFilterQuery()
                ->filterByPrimaryKeys($filter->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFilter() only accepts arguments of type Filter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Filter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function joinFilter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Filter');

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
            $this->addJoinObject($join, 'Filter');
        }

        return $this;
    }

    /**
     * Use the Filter relation Filter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   FilterQuery A secondary query class using the current class as primary query
     */
    public function useFilterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFilter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Filter', 'FilterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   DiscreteField $discreteField Object to remove from the list of results
     *
     * @return DiscreteFieldQuery The current query, for fluid interface
     */
    public function prune($discreteField = null)
    {
        if ($discreteField) {
            $this->addUsingAlias(DiscreteFieldPeer::ID, $discreteField->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseDiscreteFieldQuery
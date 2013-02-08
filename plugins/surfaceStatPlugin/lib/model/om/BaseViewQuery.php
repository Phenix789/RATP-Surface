<?php


/**
 * Base class that represents a query for the 'stat_view' table.
 *
 * 
 *
 * @method     ViewQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ViewQuery orderByWorksheetId($order = Criteria::ASC) Order by the worksheet_id column
 * @method     ViewQuery orderByModelViewId($order = Criteria::ASC) Order by the model_view_id column
 * @method     ViewQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ViewQuery orderByNameSpace($order = Criteria::ASC) Order by the name_space column
 * @method     ViewQuery orderByType($order = Criteria::ASC) Order by the type column
 *
 * @method     ViewQuery groupById() Group by the id column
 * @method     ViewQuery groupByWorksheetId() Group by the worksheet_id column
 * @method     ViewQuery groupByModelViewId() Group by the model_view_id column
 * @method     ViewQuery groupByName() Group by the name column
 * @method     ViewQuery groupByNameSpace() Group by the name_space column
 * @method     ViewQuery groupByType() Group by the type column
 *
 * @method     ViewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ViewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ViewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ViewQuery leftJoinWorksheet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Worksheet relation
 * @method     ViewQuery rightJoinWorksheet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Worksheet relation
 * @method     ViewQuery innerJoinWorksheet($relationAlias = null) Adds a INNER JOIN clause to the query using the Worksheet relation
 *
 * @method     ViewQuery leftJoinViewRelatedByModelViewId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ViewRelatedByModelViewId relation
 * @method     ViewQuery rightJoinViewRelatedByModelViewId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ViewRelatedByModelViewId relation
 * @method     ViewQuery innerJoinViewRelatedByModelViewId($relationAlias = null) Adds a INNER JOIN clause to the query using the ViewRelatedByModelViewId relation
 *
 * @method     ViewQuery leftJoinViewRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the ViewRelatedById relation
 * @method     ViewQuery rightJoinViewRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ViewRelatedById relation
 * @method     ViewQuery innerJoinViewRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the ViewRelatedById relation
 *
 * @method     View findOne(PropelPDO $con = null) Return the first View matching the query
 * @method     View findOneOrCreate(PropelPDO $con = null) Return the first View matching the query, or a new View object populated from the query conditions when no match is found
 *
 * @method     View findOneById(int $id) Return the first View filtered by the id column
 * @method     View findOneByWorksheetId(int $worksheet_id) Return the first View filtered by the worksheet_id column
 * @method     View findOneByModelViewId(int $model_view_id) Return the first View filtered by the model_view_id column
 * @method     View findOneByName(string $name) Return the first View filtered by the name column
 * @method     View findOneByNameSpace(string $name_space) Return the first View filtered by the name_space column
 * @method     View findOneByType(int $type) Return the first View filtered by the type column
 *
 * @method     array findById(int $id) Return View objects filtered by the id column
 * @method     array findByWorksheetId(int $worksheet_id) Return View objects filtered by the worksheet_id column
 * @method     array findByModelViewId(int $model_view_id) Return View objects filtered by the model_view_id column
 * @method     array findByName(string $name) Return View objects filtered by the name column
 * @method     array findByNameSpace(string $name_space) Return View objects filtered by the name_space column
 * @method     array findByType(int $type) Return View objects filtered by the type column
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseViewQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseViewQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'View', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ViewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ViewQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ViewQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ViewQuery) {
            return $criteria;
        }
        $query = new ViewQuery();
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
     * @return   View|View[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ViewPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ViewPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   View A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `WORKSHEET_ID`, `MODEL_VIEW_ID`, `NAME`, `NAME_SPACE`, `TYPE` FROM `stat_view` WHERE `ID` = :p0';
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
            $cls = ViewPeer::getOMClass($row, 0);
            $obj = new $cls();
            $obj->hydrate($row);
            ViewPeer::addInstanceToPool($obj, (string) $key);
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
     * @return View|View[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|View[]|mixed the list of results, formatted by the current formatter
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
     * @return ViewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ViewPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ViewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ViewPeer::ID, $keys, Criteria::IN);
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
     * @return ViewQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ViewPeer::ID, $id, $comparison);
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
     * @return ViewQuery The current query, for fluid interface
     */
    public function filterByWorksheetId($worksheetId = null, $comparison = null)
    {
        if (is_array($worksheetId)) {
            $useMinMax = false;
            if (isset($worksheetId['min'])) {
                $this->addUsingAlias(ViewPeer::WORKSHEET_ID, $worksheetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($worksheetId['max'])) {
                $this->addUsingAlias(ViewPeer::WORKSHEET_ID, $worksheetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ViewPeer::WORKSHEET_ID, $worksheetId, $comparison);
    }

    /**
     * Filter the query on the model_view_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModelViewId(1234); // WHERE model_view_id = 1234
     * $query->filterByModelViewId(array(12, 34)); // WHERE model_view_id IN (12, 34)
     * $query->filterByModelViewId(array('min' => 12)); // WHERE model_view_id > 12
     * </code>
     *
     * @see       filterByViewRelatedByModelViewId()
     *
     * @param     mixed $modelViewId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ViewQuery The current query, for fluid interface
     */
    public function filterByModelViewId($modelViewId = null, $comparison = null)
    {
        if (is_array($modelViewId)) {
            $useMinMax = false;
            if (isset($modelViewId['min'])) {
                $this->addUsingAlias(ViewPeer::MODEL_VIEW_ID, $modelViewId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modelViewId['max'])) {
                $this->addUsingAlias(ViewPeer::MODEL_VIEW_ID, $modelViewId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ViewPeer::MODEL_VIEW_ID, $modelViewId, $comparison);
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
     * @return ViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ViewPeer::NAME, $name, $comparison);
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
     * @return ViewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ViewPeer::NAME_SPACE, $nameSpace, $comparison);
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
     * @return ViewQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(ViewPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(ViewPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ViewPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query by a related Worksheet object
     *
     * @param   Worksheet|PropelObjectCollection $worksheet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ViewQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByWorksheet($worksheet, $comparison = null)
    {
        if ($worksheet instanceof Worksheet) {
            return $this
                ->addUsingAlias(ViewPeer::WORKSHEET_ID, $worksheet->getId(), $comparison);
        } elseif ($worksheet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ViewPeer::WORKSHEET_ID, $worksheet->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ViewQuery The current query, for fluid interface
     */
    public function joinWorksheet($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useWorksheetQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinWorksheet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Worksheet', 'WorksheetQuery');
    }

    /**
     * Filter the query by a related View object
     *
     * @param   View|PropelObjectCollection $view The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ViewQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByViewRelatedByModelViewId($view, $comparison = null)
    {
        if ($view instanceof View) {
            return $this
                ->addUsingAlias(ViewPeer::MODEL_VIEW_ID, $view->getId(), $comparison);
        } elseif ($view instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ViewPeer::MODEL_VIEW_ID, $view->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByViewRelatedByModelViewId() only accepts arguments of type View or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ViewRelatedByModelViewId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ViewQuery The current query, for fluid interface
     */
    public function joinViewRelatedByModelViewId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ViewRelatedByModelViewId');

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
            $this->addJoinObject($join, 'ViewRelatedByModelViewId');
        }

        return $this;
    }

    /**
     * Use the ViewRelatedByModelViewId relation View object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ViewQuery A secondary query class using the current class as primary query
     */
    public function useViewRelatedByModelViewIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinViewRelatedByModelViewId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ViewRelatedByModelViewId', 'ViewQuery');
    }

    /**
     * Filter the query by a related View object
     *
     * @param   View|PropelObjectCollection $view  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ViewQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByViewRelatedById($view, $comparison = null)
    {
        if ($view instanceof View) {
            return $this
                ->addUsingAlias(ViewPeer::ID, $view->getModelViewId(), $comparison);
        } elseif ($view instanceof PropelObjectCollection) {
            return $this
                ->useViewRelatedByIdQuery()
                ->filterByPrimaryKeys($view->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByViewRelatedById() only accepts arguments of type View or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ViewRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ViewQuery The current query, for fluid interface
     */
    public function joinViewRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ViewRelatedById');

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
            $this->addJoinObject($join, 'ViewRelatedById');
        }

        return $this;
    }

    /**
     * Use the ViewRelatedById relation View object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ViewQuery A secondary query class using the current class as primary query
     */
    public function useViewRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinViewRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ViewRelatedById', 'ViewQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   View $view Object to remove from the list of results
     *
     * @return ViewQuery The current query, for fluid interface
     */
    public function prune($view = null)
    {
        if ($view) {
            $this->addUsingAlias(ViewPeer::ID, $view->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseViewQuery
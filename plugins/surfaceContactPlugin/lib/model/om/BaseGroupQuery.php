<?php


/**
 * Base class that represents a query for the 'sfc_abk_group' table.
 *
 * 
 *
 * @method     GroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     GroupQuery orderByCodeName($order = Criteria::ASC) Order by the code_name column
 * @method     GroupQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     GroupQuery orderByNameSpace($order = Criteria::ASC) Order by the name_space column
 *
 * @method     GroupQuery groupById() Group by the id column
 * @method     GroupQuery groupByName() Group by the name column
 * @method     GroupQuery groupByCodeName() Group by the code_name column
 * @method     GroupQuery groupByComment() Group by the comment column
 * @method     GroupQuery groupByNameSpace() Group by the name_space column
 *
 * @method     GroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GroupQuery leftJoinContactGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactGroup relation
 * @method     GroupQuery rightJoinContactGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactGroup relation
 * @method     GroupQuery innerJoinContactGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactGroup relation
 *
 * @method     Group findOne(PropelPDO $con = null) Return the first Group matching the query
 * @method     Group findOneOrCreate(PropelPDO $con = null) Return the first Group matching the query, or a new Group object populated from the query conditions when no match is found
 *
 * @method     Group findOneById(int $id) Return the first Group filtered by the id column
 * @method     Group findOneByName(string $name) Return the first Group filtered by the name column
 * @method     Group findOneByCodeName(string $code_name) Return the first Group filtered by the code_name column
 * @method     Group findOneByComment(string $comment) Return the first Group filtered by the comment column
 * @method     Group findOneByNameSpace(string $name_space) Return the first Group filtered by the name_space column
 *
 * @method     array findById(int $id) Return Group objects filtered by the id column
 * @method     array findByName(string $name) Return Group objects filtered by the name column
 * @method     array findByCodeName(string $code_name) Return Group objects filtered by the code_name column
 * @method     array findByComment(string $comment) Return Group objects filtered by the comment column
 * @method     array findByNameSpace(string $name_space) Return Group objects filtered by the name_space column
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseGroupQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Group', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     GroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GroupQuery) {
            return $criteria;
        }
        $query = new GroupQuery();
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
     * @return   Group|Group[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Group A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, NAME, CODE_NAME, COMMENT, NAME_SPACE FROM sfc_abk_group WHERE ID = :p0';
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
            $obj = new Group();
            $obj->hydrate($row);
            GroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Group|Group[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Group[]|mixed the list of results, formatted by the current formatter
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
     * @return GroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GroupPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GroupPeer::ID, $keys, Criteria::IN);
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
     * @return GroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(GroupPeer::ID, $id, $comparison);
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
     * @return GroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GroupPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the code_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeName('fooValue');   // WHERE code_name = 'fooValue'
     * $query->filterByCodeName('%fooValue%'); // WHERE code_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupQuery The current query, for fluid interface
     */
    public function filterByCodeName($codeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codeName)) {
                $codeName = str_replace('*', '%', $codeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupPeer::CODE_NAME, $codeName, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupPeer::COMMENT, $comment, $comparison);
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
     * @return GroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GroupPeer::NAME_SPACE, $nameSpace, $comparison);
    }

    /**
     * Filter the query by a related ContactGroup object
     *
     * @param   ContactGroup|PropelObjectCollection $contactGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactGroup($contactGroup, $comparison = null)
    {
        if ($contactGroup instanceof ContactGroup) {
            return $this
                ->addUsingAlias(GroupPeer::ID, $contactGroup->getGroupId(), $comparison);
        } elseif ($contactGroup instanceof PropelObjectCollection) {
            return $this
                ->useContactGroupQuery()
                ->filterByPrimaryKeys($contactGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactGroup() only accepts arguments of type ContactGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupQuery The current query, for fluid interface
     */
    public function joinContactGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactGroup');

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
            $this->addJoinObject($join, 'ContactGroup');
        }

        return $this;
    }

    /**
     * Use the ContactGroup relation ContactGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactGroupQuery A secondary query class using the current class as primary query
     */
    public function useContactGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactGroup', 'ContactGroupQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Group $group Object to remove from the list of results
     *
     * @return GroupQuery The current query, for fluid interface
     */
    public function prune($group = null)
    {
        if ($group) {
            $this->addUsingAlias(GroupPeer::ID, $group->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseGroupQuery
<?php


/**
 * Base class that represents a query for the 'sf_guard_user_profile' table.
 *
 * 
 *
 * @method     sfGuardUserProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfGuardUserProfileQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     sfGuardUserProfileQuery orderByCollaboratorId($order = Criteria::ASC) Order by the collaborator_id column
 *
 * @method     sfGuardUserProfileQuery groupById() Group by the id column
 * @method     sfGuardUserProfileQuery groupByUserId() Group by the user_id column
 * @method     sfGuardUserProfileQuery groupByCollaboratorId() Group by the collaborator_id column
 *
 * @method     sfGuardUserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     sfGuardUserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     sfGuardUserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     sfGuardUserProfileQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method     sfGuardUserProfileQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method     sfGuardUserProfileQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method     sfGuardUserProfileQuery leftJoinCollaborator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Collaborator relation
 * @method     sfGuardUserProfileQuery rightJoinCollaborator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Collaborator relation
 * @method     sfGuardUserProfileQuery innerJoinCollaborator($relationAlias = null) Adds a INNER JOIN clause to the query using the Collaborator relation
 *
 * @method     sfGuardUserProfile findOne(PropelPDO $con = null) Return the first sfGuardUserProfile matching the query
 * @method     sfGuardUserProfile findOneOrCreate(PropelPDO $con = null) Return the first sfGuardUserProfile matching the query, or a new sfGuardUserProfile object populated from the query conditions when no match is found
 *
 * @method     sfGuardUserProfile findOneById(int $id) Return the first sfGuardUserProfile filtered by the id column
 * @method     sfGuardUserProfile findOneByUserId(int $user_id) Return the first sfGuardUserProfile filtered by the user_id column
 * @method     sfGuardUserProfile findOneByCollaboratorId(int $collaborator_id) Return the first sfGuardUserProfile filtered by the collaborator_id column
 *
 * @method     array findById(int $id) Return sfGuardUserProfile objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return sfGuardUserProfile objects filtered by the user_id column
 * @method     array findByCollaboratorId(int $collaborator_id) Return sfGuardUserProfile objects filtered by the collaborator_id column
 *
 * @package    propel.generator.lib.model.collaborator.om
 */
abstract class BasesfGuardUserProfileQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BasesfGuardUserProfileQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'sfGuardUserProfile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new sfGuardUserProfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     sfGuardUserProfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return sfGuardUserProfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof sfGuardUserProfileQuery) {
            return $criteria;
        }
        $query = new sfGuardUserProfileQuery();
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
     * @return   sfGuardUserProfile|sfGuardUserProfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = sfGuardUserProfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   sfGuardUserProfile A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, USER_ID, COLLABORATOR_ID FROM sf_guard_user_profile WHERE ID = :p0';
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
            $obj = new sfGuardUserProfile();
            $obj->hydrate($row);
            sfGuardUserProfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return sfGuardUserProfile|sfGuardUserProfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|sfGuardUserProfile[]|mixed the list of results, formatted by the current formatter
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
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(sfGuardUserProfilePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(sfGuardUserProfilePeer::ID, $keys, Criteria::IN);
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
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(sfGuardUserProfilePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterBysfGuardUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(sfGuardUserProfilePeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(sfGuardUserProfilePeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfGuardUserProfilePeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the collaborator_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCollaboratorId(1234); // WHERE collaborator_id = 1234
     * $query->filterByCollaboratorId(array(12, 34)); // WHERE collaborator_id IN (12, 34)
     * $query->filterByCollaboratorId(array('min' => 12)); // WHERE collaborator_id > 12
     * </code>
     *
     * @see       filterByCollaborator()
     *
     * @param     mixed $collaboratorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function filterByCollaboratorId($collaboratorId = null, $comparison = null)
    {
        if (is_array($collaboratorId)) {
            $useMinMax = false;
            if (isset($collaboratorId['min'])) {
                $this->addUsingAlias(sfGuardUserProfilePeer::COLLABORATOR_ID, $collaboratorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($collaboratorId['max'])) {
                $this->addUsingAlias(sfGuardUserProfilePeer::COLLABORATOR_ID, $collaboratorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfGuardUserProfilePeer::COLLABORATOR_ID, $collaboratorId, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserProfileQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(sfGuardUserProfilePeer::USER_ID, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(sfGuardUserProfilePeer::USER_ID, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfGuardUser() only accepts arguments of type sfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function joinsfGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUser');

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
            $this->addJoinObject($join, 'sfGuardUser');
        }

        return $this;
    }

    /**
     * Use the sfGuardUser relation sfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfGuardUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUser', 'sfGuardUserQuery');
    }

    /**
     * Filter the query by a related Collaborator object
     *
     * @param   Collaborator|PropelObjectCollection $collaborator The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserProfileQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCollaborator($collaborator, $comparison = null)
    {
        if ($collaborator instanceof Collaborator) {
            return $this
                ->addUsingAlias(sfGuardUserProfilePeer::COLLABORATOR_ID, $collaborator->getId(), $comparison);
        } elseif ($collaborator instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(sfGuardUserProfilePeer::COLLABORATOR_ID, $collaborator->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCollaborator() only accepts arguments of type Collaborator or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Collaborator relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function joinCollaborator($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Collaborator');

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
            $this->addJoinObject($join, 'Collaborator');
        }

        return $this;
    }

    /**
     * Use the Collaborator relation Collaborator object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CollaboratorQuery A secondary query class using the current class as primary query
     */
    public function useCollaboratorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCollaborator($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Collaborator', 'CollaboratorQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   sfGuardUserProfile $sfGuardUserProfile Object to remove from the list of results
     *
     * @return sfGuardUserProfileQuery The current query, for fluid interface
     */
    public function prune($sfGuardUserProfile = null)
    {
        if ($sfGuardUserProfile) {
            $this->addUsingAlias(sfGuardUserProfilePeer::ID, $sfGuardUserProfile->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BasesfGuardUserProfileQuery
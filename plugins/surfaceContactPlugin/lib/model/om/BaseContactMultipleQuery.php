<?php


/**
 * Base class that represents a query for the 'sfc_abk_contact_multiple' table.
 *
 * 
 *
 * @method     ContactMultipleQuery orderByContactId($order = Criteria::ASC) Order by the contact_id column
 * @method     ContactMultipleQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ContactMultipleQuery orderByRole($order = Criteria::ASC) Order by the role column
 *
 * @method     ContactMultipleQuery groupByContactId() Group by the contact_id column
 * @method     ContactMultipleQuery groupByParentId() Group by the parent_id column
 * @method     ContactMultipleQuery groupByRole() Group by the role column
 *
 * @method     ContactMultipleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ContactMultipleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ContactMultipleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ContactMultipleQuery leftJoinContactRelatedByContactId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactRelatedByContactId relation
 * @method     ContactMultipleQuery rightJoinContactRelatedByContactId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactRelatedByContactId relation
 * @method     ContactMultipleQuery innerJoinContactRelatedByContactId($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactRelatedByContactId relation
 *
 * @method     ContactMultipleQuery leftJoinContactRelatedByParentId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactRelatedByParentId relation
 * @method     ContactMultipleQuery rightJoinContactRelatedByParentId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactRelatedByParentId relation
 * @method     ContactMultipleQuery innerJoinContactRelatedByParentId($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactRelatedByParentId relation
 *
 * @method     ContactMultiple findOne(PropelPDO $con = null) Return the first ContactMultiple matching the query
 * @method     ContactMultiple findOneOrCreate(PropelPDO $con = null) Return the first ContactMultiple matching the query, or a new ContactMultiple object populated from the query conditions when no match is found
 *
 * @method     ContactMultiple findOneByContactId(int $contact_id) Return the first ContactMultiple filtered by the contact_id column
 * @method     ContactMultiple findOneByParentId(int $parent_id) Return the first ContactMultiple filtered by the parent_id column
 * @method     ContactMultiple findOneByRole(string $role) Return the first ContactMultiple filtered by the role column
 *
 * @method     array findByContactId(int $contact_id) Return ContactMultiple objects filtered by the contact_id column
 * @method     array findByParentId(int $parent_id) Return ContactMultiple objects filtered by the parent_id column
 * @method     array findByRole(string $role) Return ContactMultiple objects filtered by the role column
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseContactMultipleQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseContactMultipleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ContactMultiple', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactMultipleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ContactMultipleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactMultipleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactMultipleQuery) {
            return $criteria;
        }
        $query = new ContactMultipleQuery();
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
                         A Primary key composition: [$contact_id, $parent_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ContactMultiple|ContactMultiple[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactMultiplePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactMultiplePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ContactMultiple A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT CONTACT_ID, PARENT_ID, ROLE FROM sfc_abk_contact_multiple WHERE CONTACT_ID = :p0 AND PARENT_ID = :p1';
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
            $obj = new ContactMultiple();
            $obj->hydrate($row);
            ContactMultiplePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ContactMultiple|ContactMultiple[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContactMultiple[]|mixed the list of results, formatted by the current formatter
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
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ContactMultiplePeer::CONTACT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ContactMultiplePeer::PARENT_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ContactMultiplePeer::CONTACT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ContactMultiplePeer::PARENT_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the contact_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContactId(1234); // WHERE contact_id = 1234
     * $query->filterByContactId(array(12, 34)); // WHERE contact_id IN (12, 34)
     * $query->filterByContactId(array('min' => 12)); // WHERE contact_id > 12
     * </code>
     *
     * @see       filterByContactRelatedByContactId()
     *
     * @param     mixed $contactId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function filterByContactId($contactId = null, $comparison = null)
    {
        if (is_array($contactId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContactMultiplePeer::CONTACT_ID, $contactId, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @see       filterByContactRelatedByParentId()
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContactMultiplePeer::PARENT_ID, $parentId, $comparison);
    }

    /**
     * Filter the query on the role column
     *
     * Example usage:
     * <code>
     * $query->filterByRole('fooValue');   // WHERE role = 'fooValue'
     * $query->filterByRole('%fooValue%'); // WHERE role LIKE '%fooValue%'
     * </code>
     *
     * @param     string $role The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function filterByRole($role = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($role)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $role)) {
                $role = str_replace('*', '%', $role);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactMultiplePeer::ROLE, $role, $comparison);
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactMultipleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactRelatedByContactId($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(ContactMultiplePeer::CONTACT_ID, $contact->getId(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactMultiplePeer::CONTACT_ID, $contact->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContactRelatedByContactId() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactRelatedByContactId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function joinContactRelatedByContactId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactRelatedByContactId');

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
            $this->addJoinObject($join, 'ContactRelatedByContactId');
        }

        return $this;
    }

    /**
     * Use the ContactRelatedByContactId relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactRelatedByContactIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactRelatedByContactId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactRelatedByContactId', 'ContactQuery');
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactMultipleQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactRelatedByParentId($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(ContactMultiplePeer::PARENT_ID, $contact->getId(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactMultiplePeer::PARENT_ID, $contact->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContactRelatedByParentId() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactRelatedByParentId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function joinContactRelatedByParentId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactRelatedByParentId');

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
            $this->addJoinObject($join, 'ContactRelatedByParentId');
        }

        return $this;
    }

    /**
     * Use the ContactRelatedByParentId relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactRelatedByParentIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactRelatedByParentId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactRelatedByParentId', 'ContactQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ContactMultiple $contactMultiple Object to remove from the list of results
     *
     * @return ContactMultipleQuery The current query, for fluid interface
     */
    public function prune($contactMultiple = null)
    {
        if ($contactMultiple) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ContactMultiplePeer::CONTACT_ID), $contactMultiple->getContactId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ContactMultiplePeer::PARENT_ID), $contactMultiple->getParentId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseContactMultipleQuery
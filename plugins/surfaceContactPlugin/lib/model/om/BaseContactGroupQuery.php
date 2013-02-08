<?php


/**
 * Base class that represents a query for the 'sfc_abk_contact_group' table.
 *
 * 
 *
 * @method     ContactGroupQuery orderByContactId($order = Criteria::ASC) Order by the contact_id column
 * @method     ContactGroupQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 *
 * @method     ContactGroupQuery groupByContactId() Group by the contact_id column
 * @method     ContactGroupQuery groupByGroupId() Group by the group_id column
 *
 * @method     ContactGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ContactGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ContactGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ContactGroupQuery leftJoinContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contact relation
 * @method     ContactGroupQuery rightJoinContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contact relation
 * @method     ContactGroupQuery innerJoinContact($relationAlias = null) Adds a INNER JOIN clause to the query using the Contact relation
 *
 * @method     ContactGroupQuery leftJoinGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the Group relation
 * @method     ContactGroupQuery rightJoinGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Group relation
 * @method     ContactGroupQuery innerJoinGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the Group relation
 *
 * @method     ContactGroup findOne(PropelPDO $con = null) Return the first ContactGroup matching the query
 * @method     ContactGroup findOneOrCreate(PropelPDO $con = null) Return the first ContactGroup matching the query, or a new ContactGroup object populated from the query conditions when no match is found
 *
 * @method     ContactGroup findOneByContactId(int $contact_id) Return the first ContactGroup filtered by the contact_id column
 * @method     ContactGroup findOneByGroupId(int $group_id) Return the first ContactGroup filtered by the group_id column
 *
 * @method     array findByContactId(int $contact_id) Return ContactGroup objects filtered by the contact_id column
 * @method     array findByGroupId(int $group_id) Return ContactGroup objects filtered by the group_id column
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseContactGroupQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseContactGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'ContactGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ContactGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactGroupQuery) {
            return $criteria;
        }
        $query = new ContactGroupQuery();
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
                         A Primary key composition: [$contact_id, $group_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ContactGroup|ContactGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactGroupPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   ContactGroup A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `CONTACT_ID`, `GROUP_ID` FROM `sfc_abk_contact_group` WHERE `CONTACT_ID` = :p0 AND `GROUP_ID` = :p1';
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
            $obj = new ContactGroup();
            $obj->hydrate($row);
            ContactGroupPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ContactGroup|ContactGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContactGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ContactGroupPeer::CONTACT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ContactGroupPeer::GROUP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ContactGroupPeer::CONTACT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ContactGroupPeer::GROUP_ID, $key[1], Criteria::EQUAL);
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
     * @see       filterByContact()
     *
     * @param     mixed $contactId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function filterByContactId($contactId = null, $comparison = null)
    {
        if (is_array($contactId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContactGroupPeer::CONTACT_ID, $contactId, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id > 12
     * </code>
     *
     * @see       filterByGroup()
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContactGroupPeer::GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContact($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(ContactGroupPeer::CONTACT_ID, $contact->getId(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactGroupPeer::CONTACT_ID, $contact->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContact() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contact relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function joinContact($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contact');

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
            $this->addJoinObject($join, 'Contact');
        }

        return $this;
    }

    /**
     * Use the Contact relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContact($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contact', 'ContactQuery');
    }

    /**
     * Filter the query by a related Group object
     *
     * @param   Group|PropelObjectCollection $group The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGroup($group, $comparison = null)
    {
        if ($group instanceof Group) {
            return $this
                ->addUsingAlias(ContactGroupPeer::GROUP_ID, $group->getId(), $comparison);
        } elseif ($group instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactGroupPeer::GROUP_ID, $group->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGroup() only accepts arguments of type Group or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Group relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function joinGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Group');

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
            $this->addJoinObject($join, 'Group');
        }

        return $this;
    }

    /**
     * Use the Group relation Group object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GroupQuery A secondary query class using the current class as primary query
     */
    public function useGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Group', 'GroupQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ContactGroup $contactGroup Object to remove from the list of results
     *
     * @return ContactGroupQuery The current query, for fluid interface
     */
    public function prune($contactGroup = null)
    {
        if ($contactGroup) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ContactGroupPeer::CONTACT_ID), $contactGroup->getContactId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ContactGroupPeer::GROUP_ID), $contactGroup->getGroupId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

} // BaseContactGroupQuery
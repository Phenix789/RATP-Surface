<?php


/**
 * Base class that represents a query for the 'plugin_history_contact' table.
 *
 * 
 *
 * @method     HistoryContactQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     HistoryContactQuery orderByHistoryId($order = Criteria::ASC) Order by the history_id column
 * @method     HistoryContactQuery orderByContactId($order = Criteria::ASC) Order by the contact_id column
 * @method     HistoryContactQuery orderByContactName($order = Criteria::ASC) Order by the contact_name column
 *
 * @method     HistoryContactQuery groupById() Group by the id column
 * @method     HistoryContactQuery groupByHistoryId() Group by the history_id column
 * @method     HistoryContactQuery groupByContactId() Group by the contact_id column
 * @method     HistoryContactQuery groupByContactName() Group by the contact_name column
 *
 * @method     HistoryContactQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     HistoryContactQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     HistoryContactQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     HistoryContactQuery leftJoinHistory($relationAlias = null) Adds a LEFT JOIN clause to the query using the History relation
 * @method     HistoryContactQuery rightJoinHistory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the History relation
 * @method     HistoryContactQuery innerJoinHistory($relationAlias = null) Adds a INNER JOIN clause to the query using the History relation
 *
 * @method     HistoryContact findOne(PropelPDO $con = null) Return the first HistoryContact matching the query
 * @method     HistoryContact findOneOrCreate(PropelPDO $con = null) Return the first HistoryContact matching the query, or a new HistoryContact object populated from the query conditions when no match is found
 *
 * @method     HistoryContact findOneById(int $id) Return the first HistoryContact filtered by the id column
 * @method     HistoryContact findOneByHistoryId(int $history_id) Return the first HistoryContact filtered by the history_id column
 * @method     HistoryContact findOneByContactId(int $contact_id) Return the first HistoryContact filtered by the contact_id column
 * @method     HistoryContact findOneByContactName(string $contact_name) Return the first HistoryContact filtered by the contact_name column
 *
 * @method     array findById(int $id) Return HistoryContact objects filtered by the id column
 * @method     array findByHistoryId(int $history_id) Return HistoryContact objects filtered by the history_id column
 * @method     array findByContactId(int $contact_id) Return HistoryContact objects filtered by the contact_id column
 * @method     array findByContactName(string $contact_name) Return HistoryContact objects filtered by the contact_name column
 *
 * @package    propel.generator.plugins.surfaceHistoryBehaviorPlugin.lib.model.om
 */
abstract class BaseHistoryContactQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseHistoryContactQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'HistoryContact', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new HistoryContactQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     HistoryContactQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return HistoryContactQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof HistoryContactQuery) {
            return $criteria;
        }
        $query = new HistoryContactQuery();
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
     * @return   HistoryContact|HistoryContact[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = HistoryContactPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(HistoryContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   HistoryContact A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, HISTORY_ID, CONTACT_ID, CONTACT_NAME FROM plugin_history_contact WHERE ID = :p0';
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
            $obj = new HistoryContact();
            $obj->hydrate($row);
            HistoryContactPeer::addInstanceToPool($obj, (string) $key);
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
     * @return HistoryContact|HistoryContact[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|HistoryContact[]|mixed the list of results, formatted by the current formatter
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
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HistoryContactPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HistoryContactPeer::ID, $keys, Criteria::IN);
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
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(HistoryContactPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the history_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHistoryId(1234); // WHERE history_id = 1234
     * $query->filterByHistoryId(array(12, 34)); // WHERE history_id IN (12, 34)
     * $query->filterByHistoryId(array('min' => 12)); // WHERE history_id > 12
     * </code>
     *
     * @see       filterByHistory()
     *
     * @param     mixed $historyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function filterByHistoryId($historyId = null, $comparison = null)
    {
        if (is_array($historyId)) {
            $useMinMax = false;
            if (isset($historyId['min'])) {
                $this->addUsingAlias(HistoryContactPeer::HISTORY_ID, $historyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($historyId['max'])) {
                $this->addUsingAlias(HistoryContactPeer::HISTORY_ID, $historyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryContactPeer::HISTORY_ID, $historyId, $comparison);
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
     * @param     mixed $contactId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function filterByContactId($contactId = null, $comparison = null)
    {
        if (is_array($contactId)) {
            $useMinMax = false;
            if (isset($contactId['min'])) {
                $this->addUsingAlias(HistoryContactPeer::CONTACT_ID, $contactId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contactId['max'])) {
                $this->addUsingAlias(HistoryContactPeer::CONTACT_ID, $contactId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HistoryContactPeer::CONTACT_ID, $contactId, $comparison);
    }

    /**
     * Filter the query on the contact_name column
     *
     * Example usage:
     * <code>
     * $query->filterByContactName('fooValue');   // WHERE contact_name = 'fooValue'
     * $query->filterByContactName('%fooValue%'); // WHERE contact_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function filterByContactName($contactName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactName)) {
                $contactName = str_replace('*', '%', $contactName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(HistoryContactPeer::CONTACT_NAME, $contactName, $comparison);
    }

    /**
     * Filter the query by a related History object
     *
     * @param   History|PropelObjectCollection $history The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   HistoryContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByHistory($history, $comparison = null)
    {
        if ($history instanceof History) {
            return $this
                ->addUsingAlias(HistoryContactPeer::HISTORY_ID, $history->getId(), $comparison);
        } elseif ($history instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HistoryContactPeer::HISTORY_ID, $history->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByHistory() only accepts arguments of type History or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the History relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function joinHistory($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('History');

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
            $this->addJoinObject($join, 'History');
        }

        return $this;
    }

    /**
     * Use the History relation History object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   HistoryQuery A secondary query class using the current class as primary query
     */
    public function useHistoryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHistory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'History', 'HistoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   HistoryContact $historyContact Object to remove from the list of results
     *
     * @return HistoryContactQuery The current query, for fluid interface
     */
    public function prune($historyContact = null)
    {
        if ($historyContact) {
            $this->addUsingAlias(HistoryContactPeer::ID, $historyContact->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseHistoryContactQuery
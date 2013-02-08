<?php


/**
 * Base class that represents a query for the 'sfc_abk_service' table.
 *
 * 
 *
 * @method     ServiceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ServiceQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method     ServiceQuery orderByLongName($order = Criteria::ASC) Order by the long_name column
 * @method     ServiceQuery orderByNameSpace($order = Criteria::ASC) Order by the name_space column
 *
 * @method     ServiceQuery groupById() Group by the id column
 * @method     ServiceQuery groupByShortName() Group by the short_name column
 * @method     ServiceQuery groupByLongName() Group by the long_name column
 * @method     ServiceQuery groupByNameSpace() Group by the name_space column
 *
 * @method     ServiceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ServiceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ServiceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ServiceQuery leftJoinContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contact relation
 * @method     ServiceQuery rightJoinContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contact relation
 * @method     ServiceQuery innerJoinContact($relationAlias = null) Adds a INNER JOIN clause to the query using the Contact relation
 *
 * @method     Service findOne(PropelPDO $con = null) Return the first Service matching the query
 * @method     Service findOneOrCreate(PropelPDO $con = null) Return the first Service matching the query, or a new Service object populated from the query conditions when no match is found
 *
 * @method     Service findOneById(int $id) Return the first Service filtered by the id column
 * @method     Service findOneByShortName(string $short_name) Return the first Service filtered by the short_name column
 * @method     Service findOneByLongName(string $long_name) Return the first Service filtered by the long_name column
 * @method     Service findOneByNameSpace(string $name_space) Return the first Service filtered by the name_space column
 *
 * @method     array findById(int $id) Return Service objects filtered by the id column
 * @method     array findByShortName(string $short_name) Return Service objects filtered by the short_name column
 * @method     array findByLongName(string $long_name) Return Service objects filtered by the long_name column
 * @method     array findByNameSpace(string $name_space) Return Service objects filtered by the name_space column
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseServiceQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseServiceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Service', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ServiceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ServiceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ServiceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ServiceQuery) {
            return $criteria;
        }
        $query = new ServiceQuery();
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
     * @return   Service|Service[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ServicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ServicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Service A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `SHORT_NAME`, `LONG_NAME`, `NAME_SPACE` FROM `sfc_abk_service` WHERE `ID` = :p0';
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
            $obj = new Service();
            $obj->hydrate($row);
            ServicePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Service|Service[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Service[]|mixed the list of results, formatted by the current formatter
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ServicePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ServicePeer::ID, $keys, Criteria::IN);
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ServicePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the short_name column
     *
     * Example usage:
     * <code>
     * $query->filterByShortName('fooValue');   // WHERE short_name = 'fooValue'
     * $query->filterByShortName('%fooValue%'); // WHERE short_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shortName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByShortName($shortName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $shortName)) {
                $shortName = str_replace('*', '%', $shortName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::SHORT_NAME, $shortName, $comparison);
    }

    /**
     * Filter the query on the long_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLongName('fooValue');   // WHERE long_name = 'fooValue'
     * $query->filterByLongName('%fooValue%'); // WHERE long_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $longName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function filterByLongName($longName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $longName)) {
                $longName = str_replace('*', '%', $longName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ServicePeer::LONG_NAME, $longName, $comparison);
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
     * @return ServiceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ServicePeer::NAME_SPACE, $nameSpace, $comparison);
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ServiceQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContact($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(ServicePeer::ID, $contact->getServiceId(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            return $this
                ->useContactQuery()
                ->filterByPrimaryKeys($contact->getPrimaryKeys())
                ->endUse();
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
     * @return ServiceQuery The current query, for fluid interface
     */
    public function joinContact($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useContactQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContact($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contact', 'ContactQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Service $service Object to remove from the list of results
     *
     * @return ServiceQuery The current query, for fluid interface
     */
    public function prune($service = null)
    {
        if ($service) {
            $this->addUsingAlias(ServicePeer::ID, $service->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseServiceQuery
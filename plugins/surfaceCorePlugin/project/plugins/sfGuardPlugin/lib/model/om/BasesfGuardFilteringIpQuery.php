<?php


/**
 * Base class that represents a query for the 'sf_guard_filtering_ip' table.
 *
 * 
 *
 * @method     sfGuardFilteringIpQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfGuardFilteringIpQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     sfGuardFilteringIpQuery orderByObjectId($order = Criteria::ASC) Order by the object_id column
 * @method     sfGuardFilteringIpQuery orderByObjectName($order = Criteria::ASC) Order by the object_name column
 *
 * @method     sfGuardFilteringIpQuery groupById() Group by the id column
 * @method     sfGuardFilteringIpQuery groupByIp() Group by the ip column
 * @method     sfGuardFilteringIpQuery groupByObjectId() Group by the object_id column
 * @method     sfGuardFilteringIpQuery groupByObjectName() Group by the object_name column
 *
 * @method     sfGuardFilteringIpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     sfGuardFilteringIpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     sfGuardFilteringIpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     sfGuardFilteringIp findOne(PropelPDO $con = null) Return the first sfGuardFilteringIp matching the query
 * @method     sfGuardFilteringIp findOneOrCreate(PropelPDO $con = null) Return the first sfGuardFilteringIp matching the query, or a new sfGuardFilteringIp object populated from the query conditions when no match is found
 *
 * @method     sfGuardFilteringIp findOneById(int $id) Return the first sfGuardFilteringIp filtered by the id column
 * @method     sfGuardFilteringIp findOneByIp(string $ip) Return the first sfGuardFilteringIp filtered by the ip column
 * @method     sfGuardFilteringIp findOneByObjectId(int $object_id) Return the first sfGuardFilteringIp filtered by the object_id column
 * @method     sfGuardFilteringIp findOneByObjectName(string $object_name) Return the first sfGuardFilteringIp filtered by the object_name column
 *
 * @method     array findById(int $id) Return sfGuardFilteringIp objects filtered by the id column
 * @method     array findByIp(string $ip) Return sfGuardFilteringIp objects filtered by the ip column
 * @method     array findByObjectId(int $object_id) Return sfGuardFilteringIp objects filtered by the object_id column
 * @method     array findByObjectName(string $object_name) Return sfGuardFilteringIp objects filtered by the object_name column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardFilteringIpQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BasesfGuardFilteringIpQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'sfGuardFilteringIp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new sfGuardFilteringIpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     sfGuardFilteringIpQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return sfGuardFilteringIpQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof sfGuardFilteringIpQuery) {
            return $criteria;
        }
        $query = new sfGuardFilteringIpQuery();
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
     * @return   sfGuardFilteringIp|sfGuardFilteringIp[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = sfGuardFilteringIpPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(sfGuardFilteringIpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   sfGuardFilteringIp A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `IP`, `OBJECT_ID`, `OBJECT_NAME` FROM `sf_guard_filtering_ip` WHERE `ID` = :p0';
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
            $obj = new sfGuardFilteringIp();
            $obj->hydrate($row);
            sfGuardFilteringIpPeer::addInstanceToPool($obj, (string) $key);
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
     * @return sfGuardFilteringIp|sfGuardFilteringIp[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|sfGuardFilteringIp[]|mixed the list of results, formatted by the current formatter
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
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(sfGuardFilteringIpPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(sfGuardFilteringIpPeer::ID, $keys, Criteria::IN);
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
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(sfGuardFilteringIpPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%'); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ip)) {
                $ip = str_replace('*', '%', $ip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfGuardFilteringIpPeer::IP, $ip, $comparison);
    }

    /**
     * Filter the query on the object_id column
     *
     * Example usage:
     * <code>
     * $query->filterByObjectId(1234); // WHERE object_id = 1234
     * $query->filterByObjectId(array(12, 34)); // WHERE object_id IN (12, 34)
     * $query->filterByObjectId(array('min' => 12)); // WHERE object_id > 12
     * </code>
     *
     * @param     mixed $objectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function filterByObjectId($objectId = null, $comparison = null)
    {
        if (is_array($objectId)) {
            $useMinMax = false;
            if (isset($objectId['min'])) {
                $this->addUsingAlias(sfGuardFilteringIpPeer::OBJECT_ID, $objectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objectId['max'])) {
                $this->addUsingAlias(sfGuardFilteringIpPeer::OBJECT_ID, $objectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfGuardFilteringIpPeer::OBJECT_ID, $objectId, $comparison);
    }

    /**
     * Filter the query on the object_name column
     *
     * Example usage:
     * <code>
     * $query->filterByObjectName('fooValue');   // WHERE object_name = 'fooValue'
     * $query->filterByObjectName('%fooValue%'); // WHERE object_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $objectName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function filterByObjectName($objectName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($objectName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $objectName)) {
                $objectName = str_replace('*', '%', $objectName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfGuardFilteringIpPeer::OBJECT_NAME, $objectName, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   sfGuardFilteringIp $sfGuardFilteringIp Object to remove from the list of results
     *
     * @return sfGuardFilteringIpQuery The current query, for fluid interface
     */
    public function prune($sfGuardFilteringIp = null)
    {
        if ($sfGuardFilteringIp) {
            $this->addUsingAlias(sfGuardFilteringIpPeer::ID, $sfGuardFilteringIp->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BasesfGuardFilteringIpQuery
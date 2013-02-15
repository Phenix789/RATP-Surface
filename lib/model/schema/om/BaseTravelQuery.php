<?php


/**
 * Base class that represents a query for the 'ratp_travel' table.
 *
 * 
 *
 * @method     TravelQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TravelQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method     TravelQuery orderByStationInId($order = Criteria::ASC) Order by the station_in_id column
 * @method     TravelQuery orderByStationOutId($order = Criteria::ASC) Order by the station_out_id column
 * @method     TravelQuery orderByDateIn($order = Criteria::ASC) Order by the date_in column
 * @method     TravelQuery orderByDateOut($order = Criteria::ASC) Order by the date_out column
 * @method     TravelQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     TravelQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     TravelQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     TravelQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     TravelQuery groupById() Group by the id column
 * @method     TravelQuery groupByClientId() Group by the client_id column
 * @method     TravelQuery groupByStationInId() Group by the station_in_id column
 * @method     TravelQuery groupByStationOutId() Group by the station_out_id column
 * @method     TravelQuery groupByDateIn() Group by the date_in column
 * @method     TravelQuery groupByDateOut() Group by the date_out column
 * @method     TravelQuery groupByCreatedAt() Group by the created_at column
 * @method     TravelQuery groupByUpdatedAt() Group by the updated_at column
 * @method     TravelQuery groupByCreatedBy() Group by the created_by column
 * @method     TravelQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     TravelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TravelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TravelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TravelQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     TravelQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     TravelQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     TravelQuery leftJoinStationRelatedByStationInId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StationRelatedByStationInId relation
 * @method     TravelQuery rightJoinStationRelatedByStationInId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StationRelatedByStationInId relation
 * @method     TravelQuery innerJoinStationRelatedByStationInId($relationAlias = null) Adds a INNER JOIN clause to the query using the StationRelatedByStationInId relation
 *
 * @method     TravelQuery leftJoinStationRelatedByStationOutId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StationRelatedByStationOutId relation
 * @method     TravelQuery rightJoinStationRelatedByStationOutId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StationRelatedByStationOutId relation
 * @method     TravelQuery innerJoinStationRelatedByStationOutId($relationAlias = null) Adds a INNER JOIN clause to the query using the StationRelatedByStationOutId relation
 *
 * @method     TravelQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     TravelQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     TravelQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     TravelQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     TravelQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     TravelQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     Travel findOne(PropelPDO $con = null) Return the first Travel matching the query
 * @method     Travel findOneOrCreate(PropelPDO $con = null) Return the first Travel matching the query, or a new Travel object populated from the query conditions when no match is found
 *
 * @method     Travel findOneById(int $id) Return the first Travel filtered by the id column
 * @method     Travel findOneByClientId(int $client_id) Return the first Travel filtered by the client_id column
 * @method     Travel findOneByStationInId(int $station_in_id) Return the first Travel filtered by the station_in_id column
 * @method     Travel findOneByStationOutId(int $station_out_id) Return the first Travel filtered by the station_out_id column
 * @method     Travel findOneByDateIn(string $date_in) Return the first Travel filtered by the date_in column
 * @method     Travel findOneByDateOut(string $date_out) Return the first Travel filtered by the date_out column
 * @method     Travel findOneByCreatedAt(string $created_at) Return the first Travel filtered by the created_at column
 * @method     Travel findOneByUpdatedAt(string $updated_at) Return the first Travel filtered by the updated_at column
 * @method     Travel findOneByCreatedBy(int $created_by) Return the first Travel filtered by the created_by column
 * @method     Travel findOneByUpdatedBy(int $updated_by) Return the first Travel filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Travel objects filtered by the id column
 * @method     array findByClientId(int $client_id) Return Travel objects filtered by the client_id column
 * @method     array findByStationInId(int $station_in_id) Return Travel objects filtered by the station_in_id column
 * @method     array findByStationOutId(int $station_out_id) Return Travel objects filtered by the station_out_id column
 * @method     array findByDateIn(string $date_in) Return Travel objects filtered by the date_in column
 * @method     array findByDateOut(string $date_out) Return Travel objects filtered by the date_out column
 * @method     array findByCreatedAt(string $created_at) Return Travel objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Travel objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return Travel objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return Travel objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.schema.om
 */
abstract class BaseTravelQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseTravelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Travel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TravelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TravelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TravelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TravelQuery) {
            return $criteria;
        }
        $query = new TravelQuery();
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
     * @return   Travel|Travel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TravelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TravelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Travel A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CLIENT_ID, STATION_IN_ID, STATION_OUT_ID, DATE_IN, DATE_OUT, CREATED_AT, UPDATED_AT, CREATED_BY, UPDATED_BY FROM ratp_travel WHERE ID = :p0';
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
            $obj = new Travel();
            $obj->hydrate($row);
            TravelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Travel|Travel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Travel[]|mixed the list of results, formatted by the current formatter
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
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TravelPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TravelPeer::ID, $keys, Criteria::IN);
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
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TravelPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id > 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(TravelPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(TravelPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the station_in_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStationInId(1234); // WHERE station_in_id = 1234
     * $query->filterByStationInId(array(12, 34)); // WHERE station_in_id IN (12, 34)
     * $query->filterByStationInId(array('min' => 12)); // WHERE station_in_id > 12
     * </code>
     *
     * @see       filterByStationRelatedByStationInId()
     *
     * @param     mixed $stationInId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByStationInId($stationInId = null, $comparison = null)
    {
        if (is_array($stationInId)) {
            $useMinMax = false;
            if (isset($stationInId['min'])) {
                $this->addUsingAlias(TravelPeer::STATION_IN_ID, $stationInId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stationInId['max'])) {
                $this->addUsingAlias(TravelPeer::STATION_IN_ID, $stationInId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::STATION_IN_ID, $stationInId, $comparison);
    }

    /**
     * Filter the query on the station_out_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStationOutId(1234); // WHERE station_out_id = 1234
     * $query->filterByStationOutId(array(12, 34)); // WHERE station_out_id IN (12, 34)
     * $query->filterByStationOutId(array('min' => 12)); // WHERE station_out_id > 12
     * </code>
     *
     * @see       filterByStationRelatedByStationOutId()
     *
     * @param     mixed $stationOutId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByStationOutId($stationOutId = null, $comparison = null)
    {
        if (is_array($stationOutId)) {
            $useMinMax = false;
            if (isset($stationOutId['min'])) {
                $this->addUsingAlias(TravelPeer::STATION_OUT_ID, $stationOutId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stationOutId['max'])) {
                $this->addUsingAlias(TravelPeer::STATION_OUT_ID, $stationOutId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::STATION_OUT_ID, $stationOutId, $comparison);
    }

    /**
     * Filter the query on the date_in column
     *
     * Example usage:
     * <code>
     * $query->filterByDateIn('2011-03-14'); // WHERE date_in = '2011-03-14'
     * $query->filterByDateIn('now'); // WHERE date_in = '2011-03-14'
     * $query->filterByDateIn(array('max' => 'yesterday')); // WHERE date_in > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateIn The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByDateIn($dateIn = null, $comparison = null)
    {
        if (is_array($dateIn)) {
            $useMinMax = false;
            if (isset($dateIn['min'])) {
                $this->addUsingAlias(TravelPeer::DATE_IN, $dateIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateIn['max'])) {
                $this->addUsingAlias(TravelPeer::DATE_IN, $dateIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::DATE_IN, $dateIn, $comparison);
    }

    /**
     * Filter the query on the date_out column
     *
     * Example usage:
     * <code>
     * $query->filterByDateOut('2011-03-14'); // WHERE date_out = '2011-03-14'
     * $query->filterByDateOut('now'); // WHERE date_out = '2011-03-14'
     * $query->filterByDateOut(array('max' => 'yesterday')); // WHERE date_out > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateOut The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByDateOut($dateOut = null, $comparison = null)
    {
        if (is_array($dateOut)) {
            $useMinMax = false;
            if (isset($dateOut['min'])) {
                $this->addUsingAlias(TravelPeer::DATE_OUT, $dateOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOut['max'])) {
                $this->addUsingAlias(TravelPeer::DATE_OUT, $dateOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::DATE_OUT, $dateOut, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(TravelPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(TravelPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(TravelPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(TravelPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
     * </code>
     *
     * @see       filterBysfGuardUserRelatedByCreatedBy()
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(TravelPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(TravelPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by > 12
     * </code>
     *
     * @see       filterBysfGuardUserRelatedByUpdatedBy()
     *
     * @param     mixed $updatedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(TravelPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(TravelPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TravelPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TravelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(TravelPeer::CLIENT_ID, $client->getId(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TravelPeer::CLIENT_ID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Filter the query by a related Station object
     *
     * @param   Station|PropelObjectCollection $station The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TravelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStationRelatedByStationInId($station, $comparison = null)
    {
        if ($station instanceof Station) {
            return $this
                ->addUsingAlias(TravelPeer::STATION_IN_ID, $station->getId(), $comparison);
        } elseif ($station instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TravelPeer::STATION_IN_ID, $station->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStationRelatedByStationInId() only accepts arguments of type Station or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StationRelatedByStationInId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function joinStationRelatedByStationInId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StationRelatedByStationInId');

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
            $this->addJoinObject($join, 'StationRelatedByStationInId');
        }

        return $this;
    }

    /**
     * Use the StationRelatedByStationInId relation Station object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationQuery A secondary query class using the current class as primary query
     */
    public function useStationRelatedByStationInIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStationRelatedByStationInId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StationRelatedByStationInId', 'StationQuery');
    }

    /**
     * Filter the query by a related Station object
     *
     * @param   Station|PropelObjectCollection $station The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TravelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStationRelatedByStationOutId($station, $comparison = null)
    {
        if ($station instanceof Station) {
            return $this
                ->addUsingAlias(TravelPeer::STATION_OUT_ID, $station->getId(), $comparison);
        } elseif ($station instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TravelPeer::STATION_OUT_ID, $station->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStationRelatedByStationOutId() only accepts arguments of type Station or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StationRelatedByStationOutId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function joinStationRelatedByStationOutId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StationRelatedByStationOutId');

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
            $this->addJoinObject($join, 'StationRelatedByStationOutId');
        }

        return $this;
    }

    /**
     * Use the StationRelatedByStationOutId relation Station object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationQuery A secondary query class using the current class as primary query
     */
    public function useStationRelatedByStationOutIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStationRelatedByStationOutId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StationRelatedByStationOutId', 'StationQuery');
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TravelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(TravelPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TravelPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfGuardUserRelatedByCreatedBy() only accepts arguments of type sfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function joinsfGuardUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'sfGuardUserRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserRelatedByCreatedBy relation sfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfGuardUserRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByCreatedBy', 'sfGuardUserQuery');
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   TravelQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(TravelPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TravelPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfGuardUserRelatedByUpdatedBy() only accepts arguments of type sfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function joinsfGuardUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'sfGuardUserRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserRelatedByUpdatedBy relation sfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfGuardUserRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserRelatedByUpdatedBy', 'sfGuardUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Travel $travel Object to remove from the list of results
     *
     * @return TravelQuery The current query, for fluid interface
     */
    public function prune($travel = null)
    {
        if ($travel) {
            $this->addUsingAlias(TravelPeer::ID, $travel->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseTravelQuery
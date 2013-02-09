<?php


/**
 * Base class that represents a query for the 'ratp_station' table.
 *
 * 
 *
 * @method     StationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     StationQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     StationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     StationQuery orderByGeoX($order = Criteria::ASC) Order by the geo_x column
 * @method     StationQuery orderByGeoY($order = Criteria::ASC) Order by the geo_y column
 * @method     StationQuery orderByZone($order = Criteria::ASC) Order by the zone column
 * @method     StationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     StationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     StationQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     StationQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     StationQuery groupById() Group by the id column
 * @method     StationQuery groupByCode() Group by the code column
 * @method     StationQuery groupByName() Group by the name column
 * @method     StationQuery groupByGeoX() Group by the geo_x column
 * @method     StationQuery groupByGeoY() Group by the geo_y column
 * @method     StationQuery groupByZone() Group by the zone column
 * @method     StationQuery groupByCreatedAt() Group by the created_at column
 * @method     StationQuery groupByUpdatedAt() Group by the updated_at column
 * @method     StationQuery groupByCreatedBy() Group by the created_by column
 * @method     StationQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     StationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     StationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     StationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     StationQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     StationQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     StationQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     StationQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     StationQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     StationQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     StationQuery leftJoinStationType($relationAlias = null) Adds a LEFT JOIN clause to the query using the StationType relation
 * @method     StationQuery rightJoinStationType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StationType relation
 * @method     StationQuery innerJoinStationType($relationAlias = null) Adds a INNER JOIN clause to the query using the StationType relation
 *
 * @method     StationQuery leftJoinTravelRelatedByStationInId($relationAlias = null) Adds a LEFT JOIN clause to the query using the TravelRelatedByStationInId relation
 * @method     StationQuery rightJoinTravelRelatedByStationInId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TravelRelatedByStationInId relation
 * @method     StationQuery innerJoinTravelRelatedByStationInId($relationAlias = null) Adds a INNER JOIN clause to the query using the TravelRelatedByStationInId relation
 *
 * @method     StationQuery leftJoinTravelRelatedByStationOutId($relationAlias = null) Adds a LEFT JOIN clause to the query using the TravelRelatedByStationOutId relation
 * @method     StationQuery rightJoinTravelRelatedByStationOutId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TravelRelatedByStationOutId relation
 * @method     StationQuery innerJoinTravelRelatedByStationOutId($relationAlias = null) Adds a INNER JOIN clause to the query using the TravelRelatedByStationOutId relation
 *
 * @method     Station findOne(PropelPDO $con = null) Return the first Station matching the query
 * @method     Station findOneOrCreate(PropelPDO $con = null) Return the first Station matching the query, or a new Station object populated from the query conditions when no match is found
 *
 * @method     Station findOneById(int $id) Return the first Station filtered by the id column
 * @method     Station findOneByCode(string $code) Return the first Station filtered by the code column
 * @method     Station findOneByName(string $name) Return the first Station filtered by the name column
 * @method     Station findOneByGeoX(double $geo_x) Return the first Station filtered by the geo_x column
 * @method     Station findOneByGeoY(double $geo_y) Return the first Station filtered by the geo_y column
 * @method     Station findOneByZone(int $zone) Return the first Station filtered by the zone column
 * @method     Station findOneByCreatedAt(string $created_at) Return the first Station filtered by the created_at column
 * @method     Station findOneByUpdatedAt(string $updated_at) Return the first Station filtered by the updated_at column
 * @method     Station findOneByCreatedBy(int $created_by) Return the first Station filtered by the created_by column
 * @method     Station findOneByUpdatedBy(int $updated_by) Return the first Station filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Station objects filtered by the id column
 * @method     array findByCode(string $code) Return Station objects filtered by the code column
 * @method     array findByName(string $name) Return Station objects filtered by the name column
 * @method     array findByGeoX(double $geo_x) Return Station objects filtered by the geo_x column
 * @method     array findByGeoY(double $geo_y) Return Station objects filtered by the geo_y column
 * @method     array findByZone(int $zone) Return Station objects filtered by the zone column
 * @method     array findByCreatedAt(string $created_at) Return Station objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Station objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return Station objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return Station objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.schema.om
 */
abstract class BaseStationQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseStationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Station', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     StationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StationQuery) {
            return $criteria;
        }
        $query = new StationQuery();
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
     * @return   Station|Station[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Station A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CODE`, `NAME`, `GEO_X`, `GEO_Y`, `ZONE`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `ratp_station` WHERE `ID` = :p0';
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
            $obj = new Station();
            $obj->hydrate($row);
            StationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Station|Station[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Station[]|mixed the list of results, formatted by the current formatter
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
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StationPeer::ID, $keys, Criteria::IN);
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
     * @return StationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(StationPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StationPeer::CODE, $code, $comparison);
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
     * @return StationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StationPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the geo_x column
     *
     * Example usage:
     * <code>
     * $query->filterByGeoX(1234); // WHERE geo_x = 1234
     * $query->filterByGeoX(array(12, 34)); // WHERE geo_x IN (12, 34)
     * $query->filterByGeoX(array('min' => 12)); // WHERE geo_x > 12
     * </code>
     *
     * @param     mixed $geoX The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByGeoX($geoX = null, $comparison = null)
    {
        if (is_array($geoX)) {
            $useMinMax = false;
            if (isset($geoX['min'])) {
                $this->addUsingAlias(StationPeer::GEO_X, $geoX['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geoX['max'])) {
                $this->addUsingAlias(StationPeer::GEO_X, $geoX['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::GEO_X, $geoX, $comparison);
    }

    /**
     * Filter the query on the geo_y column
     *
     * Example usage:
     * <code>
     * $query->filterByGeoY(1234); // WHERE geo_y = 1234
     * $query->filterByGeoY(array(12, 34)); // WHERE geo_y IN (12, 34)
     * $query->filterByGeoY(array('min' => 12)); // WHERE geo_y > 12
     * </code>
     *
     * @param     mixed $geoY The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByGeoY($geoY = null, $comparison = null)
    {
        if (is_array($geoY)) {
            $useMinMax = false;
            if (isset($geoY['min'])) {
                $this->addUsingAlias(StationPeer::GEO_Y, $geoY['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geoY['max'])) {
                $this->addUsingAlias(StationPeer::GEO_Y, $geoY['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::GEO_Y, $geoY, $comparison);
    }

    /**
     * Filter the query on the zone column
     *
     * Example usage:
     * <code>
     * $query->filterByZone(1234); // WHERE zone = 1234
     * $query->filterByZone(array(12, 34)); // WHERE zone IN (12, 34)
     * $query->filterByZone(array('min' => 12)); // WHERE zone > 12
     * </code>
     *
     * @param     mixed $zone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByZone($zone = null, $comparison = null)
    {
        if (is_array($zone)) {
            $useMinMax = false;
            if (isset($zone['min'])) {
                $this->addUsingAlias(StationPeer::ZONE, $zone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zone['max'])) {
                $this->addUsingAlias(StationPeer::ZONE, $zone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::ZONE, $zone, $comparison);
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
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(StationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(StationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(StationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(StationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(StationPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(StationPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return StationQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(StationPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(StationPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StationPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   StationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(StationPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StationPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StationQuery The current query, for fluid interface
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
     * @return   StationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(StationPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StationPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StationQuery The current query, for fluid interface
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
     * Filter the query by a related StationType object
     *
     * @param   StationType|PropelObjectCollection $stationType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   StationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStationType($stationType, $comparison = null)
    {
        if ($stationType instanceof StationType) {
            return $this
                ->addUsingAlias(StationPeer::ID, $stationType->getStationId(), $comparison);
        } elseif ($stationType instanceof PropelObjectCollection) {
            return $this
                ->useStationTypeQuery()
                ->filterByPrimaryKeys($stationType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStationType() only accepts arguments of type StationType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StationType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function joinStationType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StationType');

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
            $this->addJoinObject($join, 'StationType');
        }

        return $this;
    }

    /**
     * Use the StationType relation StationType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationTypeQuery A secondary query class using the current class as primary query
     */
    public function useStationTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStationType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StationType', 'StationTypeQuery');
    }

    /**
     * Filter the query by a related Travel object
     *
     * @param   Travel|PropelObjectCollection $travel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   StationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTravelRelatedByStationInId($travel, $comparison = null)
    {
        if ($travel instanceof Travel) {
            return $this
                ->addUsingAlias(StationPeer::ID, $travel->getStationInId(), $comparison);
        } elseif ($travel instanceof PropelObjectCollection) {
            return $this
                ->useTravelRelatedByStationInIdQuery()
                ->filterByPrimaryKeys($travel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTravelRelatedByStationInId() only accepts arguments of type Travel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TravelRelatedByStationInId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function joinTravelRelatedByStationInId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TravelRelatedByStationInId');

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
            $this->addJoinObject($join, 'TravelRelatedByStationInId');
        }

        return $this;
    }

    /**
     * Use the TravelRelatedByStationInId relation Travel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TravelQuery A secondary query class using the current class as primary query
     */
    public function useTravelRelatedByStationInIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTravelRelatedByStationInId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TravelRelatedByStationInId', 'TravelQuery');
    }

    /**
     * Filter the query by a related Travel object
     *
     * @param   Travel|PropelObjectCollection $travel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   StationQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTravelRelatedByStationOutId($travel, $comparison = null)
    {
        if ($travel instanceof Travel) {
            return $this
                ->addUsingAlias(StationPeer::ID, $travel->getStationOutId(), $comparison);
        } elseif ($travel instanceof PropelObjectCollection) {
            return $this
                ->useTravelRelatedByStationOutIdQuery()
                ->filterByPrimaryKeys($travel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTravelRelatedByStationOutId() only accepts arguments of type Travel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TravelRelatedByStationOutId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function joinTravelRelatedByStationOutId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TravelRelatedByStationOutId');

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
            $this->addJoinObject($join, 'TravelRelatedByStationOutId');
        }

        return $this;
    }

    /**
     * Use the TravelRelatedByStationOutId relation Travel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TravelQuery A secondary query class using the current class as primary query
     */
    public function useTravelRelatedByStationOutIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTravelRelatedByStationOutId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TravelRelatedByStationOutId', 'TravelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Station $station Object to remove from the list of results
     *
     * @return StationQuery The current query, for fluid interface
     */
    public function prune($station = null)
    {
        if ($station) {
            $this->addUsingAlias(StationPeer::ID, $station->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseStationQuery
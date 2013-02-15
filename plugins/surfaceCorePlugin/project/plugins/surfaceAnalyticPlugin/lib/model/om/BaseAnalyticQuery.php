<?php


/**
 * Base class that represents a query for the 'sfc_plugin_analytic' table.
 *
 * 
 *
 * @method     AnalyticQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AnalyticQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     AnalyticQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     AnalyticQuery orderByConnection($order = Criteria::ASC) Order by the connection column
 * @method     AnalyticQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     AnalyticQuery orderByUserAgent($order = Criteria::ASC) Order by the user_agent column
 * @method     AnalyticQuery orderByScreenWidth($order = Criteria::ASC) Order by the screen_width column
 * @method     AnalyticQuery orderByScreenHeight($order = Criteria::ASC) Order by the screen_height column
 * @method     AnalyticQuery orderByScreenInnerWidth($order = Criteria::ASC) Order by the screen_inner_width column
 * @method     AnalyticQuery orderByScreenInnerHeight($order = Criteria::ASC) Order by the screen_inner_height column
 * @method     AnalyticQuery orderByCookieEnabled($order = Criteria::ASC) Order by the cookie_enabled column
 * @method     AnalyticQuery orderByLanguage($order = Criteria::ASC) Order by the language column
 * @method     AnalyticQuery orderByPlatform($order = Criteria::ASC) Order by the platform column
 * @method     AnalyticQuery orderByProduct($order = Criteria::ASC) Order by the product column
 * @method     AnalyticQuery orderByProductSub($order = Criteria::ASC) Order by the product_sub column
 * @method     AnalyticQuery orderByVendor($order = Criteria::ASC) Order by the vendor column
 * @method     AnalyticQuery orderByVendorSub($order = Criteria::ASC) Order by the vendor_sub column
 * @method     AnalyticQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     AnalyticQuery groupById() Group by the id column
 * @method     AnalyticQuery groupByUsername() Group by the username column
 * @method     AnalyticQuery groupByUserId() Group by the user_id column
 * @method     AnalyticQuery groupByConnection() Group by the connection column
 * @method     AnalyticQuery groupByIp() Group by the ip column
 * @method     AnalyticQuery groupByUserAgent() Group by the user_agent column
 * @method     AnalyticQuery groupByScreenWidth() Group by the screen_width column
 * @method     AnalyticQuery groupByScreenHeight() Group by the screen_height column
 * @method     AnalyticQuery groupByScreenInnerWidth() Group by the screen_inner_width column
 * @method     AnalyticQuery groupByScreenInnerHeight() Group by the screen_inner_height column
 * @method     AnalyticQuery groupByCookieEnabled() Group by the cookie_enabled column
 * @method     AnalyticQuery groupByLanguage() Group by the language column
 * @method     AnalyticQuery groupByPlatform() Group by the platform column
 * @method     AnalyticQuery groupByProduct() Group by the product column
 * @method     AnalyticQuery groupByProductSub() Group by the product_sub column
 * @method     AnalyticQuery groupByVendor() Group by the vendor column
 * @method     AnalyticQuery groupByVendorSub() Group by the vendor_sub column
 * @method     AnalyticQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     AnalyticQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AnalyticQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AnalyticQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AnalyticQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method     AnalyticQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method     AnalyticQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method     Analytic findOne(PropelPDO $con = null) Return the first Analytic matching the query
 * @method     Analytic findOneOrCreate(PropelPDO $con = null) Return the first Analytic matching the query, or a new Analytic object populated from the query conditions when no match is found
 *
 * @method     Analytic findOneById(int $id) Return the first Analytic filtered by the id column
 * @method     Analytic findOneByUsername(string $username) Return the first Analytic filtered by the username column
 * @method     Analytic findOneByUserId(int $user_id) Return the first Analytic filtered by the user_id column
 * @method     Analytic findOneByConnection(int $connection) Return the first Analytic filtered by the connection column
 * @method     Analytic findOneByIp(string $ip) Return the first Analytic filtered by the ip column
 * @method     Analytic findOneByUserAgent(string $user_agent) Return the first Analytic filtered by the user_agent column
 * @method     Analytic findOneByScreenWidth(int $screen_width) Return the first Analytic filtered by the screen_width column
 * @method     Analytic findOneByScreenHeight(int $screen_height) Return the first Analytic filtered by the screen_height column
 * @method     Analytic findOneByScreenInnerWidth(int $screen_inner_width) Return the first Analytic filtered by the screen_inner_width column
 * @method     Analytic findOneByScreenInnerHeight(int $screen_inner_height) Return the first Analytic filtered by the screen_inner_height column
 * @method     Analytic findOneByCookieEnabled(boolean $cookie_enabled) Return the first Analytic filtered by the cookie_enabled column
 * @method     Analytic findOneByLanguage(string $language) Return the first Analytic filtered by the language column
 * @method     Analytic findOneByPlatform(string $platform) Return the first Analytic filtered by the platform column
 * @method     Analytic findOneByProduct(string $product) Return the first Analytic filtered by the product column
 * @method     Analytic findOneByProductSub(string $product_sub) Return the first Analytic filtered by the product_sub column
 * @method     Analytic findOneByVendor(string $vendor) Return the first Analytic filtered by the vendor column
 * @method     Analytic findOneByVendorSub(string $vendor_sub) Return the first Analytic filtered by the vendor_sub column
 * @method     Analytic findOneByCreatedAt(string $created_at) Return the first Analytic filtered by the created_at column
 *
 * @method     array findById(int $id) Return Analytic objects filtered by the id column
 * @method     array findByUsername(string $username) Return Analytic objects filtered by the username column
 * @method     array findByUserId(int $user_id) Return Analytic objects filtered by the user_id column
 * @method     array findByConnection(int $connection) Return Analytic objects filtered by the connection column
 * @method     array findByIp(string $ip) Return Analytic objects filtered by the ip column
 * @method     array findByUserAgent(string $user_agent) Return Analytic objects filtered by the user_agent column
 * @method     array findByScreenWidth(int $screen_width) Return Analytic objects filtered by the screen_width column
 * @method     array findByScreenHeight(int $screen_height) Return Analytic objects filtered by the screen_height column
 * @method     array findByScreenInnerWidth(int $screen_inner_width) Return Analytic objects filtered by the screen_inner_width column
 * @method     array findByScreenInnerHeight(int $screen_inner_height) Return Analytic objects filtered by the screen_inner_height column
 * @method     array findByCookieEnabled(boolean $cookie_enabled) Return Analytic objects filtered by the cookie_enabled column
 * @method     array findByLanguage(string $language) Return Analytic objects filtered by the language column
 * @method     array findByPlatform(string $platform) Return Analytic objects filtered by the platform column
 * @method     array findByProduct(string $product) Return Analytic objects filtered by the product column
 * @method     array findByProductSub(string $product_sub) Return Analytic objects filtered by the product_sub column
 * @method     array findByVendor(string $vendor) Return Analytic objects filtered by the vendor column
 * @method     array findByVendorSub(string $vendor_sub) Return Analytic objects filtered by the vendor_sub column
 * @method     array findByCreatedAt(string $created_at) Return Analytic objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.surfaceAnalyticPlugin.lib.model.om
 */
abstract class BaseAnalyticQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseAnalyticQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Analytic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AnalyticQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AnalyticQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AnalyticQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AnalyticQuery) {
            return $criteria;
        }
        $query = new AnalyticQuery();
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
     * @return   Analytic|Analytic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AnalyticPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AnalyticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Analytic A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, USERNAME, USER_ID, CONNECTION, IP, USER_AGENT, SCREEN_WIDTH, SCREEN_HEIGHT, SCREEN_INNER_WIDTH, SCREEN_INNER_HEIGHT, COOKIE_ENABLED, LANGUAGE, PLATFORM, PRODUCT, PRODUCT_SUB, VENDOR, VENDOR_SUB, CREATED_AT FROM sfc_plugin_analytic WHERE ID = :p0';
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
            $obj = new Analytic();
            $obj->hydrate($row);
            AnalyticPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Analytic|Analytic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Analytic[]|mixed the list of results, formatted by the current formatter
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
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnalyticPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnalyticPeer::ID, $keys, Criteria::IN);
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
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AnalyticPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::USERNAME, $username, $comparison);
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
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(AnalyticPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(AnalyticPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the connection column
     *
     * Example usage:
     * <code>
     * $query->filterByConnection(1234); // WHERE connection = 1234
     * $query->filterByConnection(array(12, 34)); // WHERE connection IN (12, 34)
     * $query->filterByConnection(array('min' => 12)); // WHERE connection > 12
     * </code>
     *
     * @param     mixed $connection The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByConnection($connection = null, $comparison = null)
    {
        if (is_array($connection)) {
            $useMinMax = false;
            if (isset($connection['min'])) {
                $this->addUsingAlias(AnalyticPeer::CONNECTION, $connection['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($connection['max'])) {
                $this->addUsingAlias(AnalyticPeer::CONNECTION, $connection['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::CONNECTION, $connection, $comparison);
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
     * @return AnalyticQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnalyticPeer::IP, $ip, $comparison);
    }

    /**
     * Filter the query on the user_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAgent('fooValue');   // WHERE user_agent = 'fooValue'
     * $query->filterByUserAgent('%fooValue%'); // WHERE user_agent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userAgent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByUserAgent($userAgent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userAgent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userAgent)) {
                $userAgent = str_replace('*', '%', $userAgent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::USER_AGENT, $userAgent, $comparison);
    }

    /**
     * Filter the query on the screen_width column
     *
     * Example usage:
     * <code>
     * $query->filterByScreenWidth(1234); // WHERE screen_width = 1234
     * $query->filterByScreenWidth(array(12, 34)); // WHERE screen_width IN (12, 34)
     * $query->filterByScreenWidth(array('min' => 12)); // WHERE screen_width > 12
     * </code>
     *
     * @param     mixed $screenWidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByScreenWidth($screenWidth = null, $comparison = null)
    {
        if (is_array($screenWidth)) {
            $useMinMax = false;
            if (isset($screenWidth['min'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_WIDTH, $screenWidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($screenWidth['max'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_WIDTH, $screenWidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::SCREEN_WIDTH, $screenWidth, $comparison);
    }

    /**
     * Filter the query on the screen_height column
     *
     * Example usage:
     * <code>
     * $query->filterByScreenHeight(1234); // WHERE screen_height = 1234
     * $query->filterByScreenHeight(array(12, 34)); // WHERE screen_height IN (12, 34)
     * $query->filterByScreenHeight(array('min' => 12)); // WHERE screen_height > 12
     * </code>
     *
     * @param     mixed $screenHeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByScreenHeight($screenHeight = null, $comparison = null)
    {
        if (is_array($screenHeight)) {
            $useMinMax = false;
            if (isset($screenHeight['min'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_HEIGHT, $screenHeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($screenHeight['max'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_HEIGHT, $screenHeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::SCREEN_HEIGHT, $screenHeight, $comparison);
    }

    /**
     * Filter the query on the screen_inner_width column
     *
     * Example usage:
     * <code>
     * $query->filterByScreenInnerWidth(1234); // WHERE screen_inner_width = 1234
     * $query->filterByScreenInnerWidth(array(12, 34)); // WHERE screen_inner_width IN (12, 34)
     * $query->filterByScreenInnerWidth(array('min' => 12)); // WHERE screen_inner_width > 12
     * </code>
     *
     * @param     mixed $screenInnerWidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByScreenInnerWidth($screenInnerWidth = null, $comparison = null)
    {
        if (is_array($screenInnerWidth)) {
            $useMinMax = false;
            if (isset($screenInnerWidth['min'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_INNER_WIDTH, $screenInnerWidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($screenInnerWidth['max'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_INNER_WIDTH, $screenInnerWidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::SCREEN_INNER_WIDTH, $screenInnerWidth, $comparison);
    }

    /**
     * Filter the query on the screen_inner_height column
     *
     * Example usage:
     * <code>
     * $query->filterByScreenInnerHeight(1234); // WHERE screen_inner_height = 1234
     * $query->filterByScreenInnerHeight(array(12, 34)); // WHERE screen_inner_height IN (12, 34)
     * $query->filterByScreenInnerHeight(array('min' => 12)); // WHERE screen_inner_height > 12
     * </code>
     *
     * @param     mixed $screenInnerHeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByScreenInnerHeight($screenInnerHeight = null, $comparison = null)
    {
        if (is_array($screenInnerHeight)) {
            $useMinMax = false;
            if (isset($screenInnerHeight['min'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_INNER_HEIGHT, $screenInnerHeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($screenInnerHeight['max'])) {
                $this->addUsingAlias(AnalyticPeer::SCREEN_INNER_HEIGHT, $screenInnerHeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::SCREEN_INNER_HEIGHT, $screenInnerHeight, $comparison);
    }

    /**
     * Filter the query on the cookie_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByCookieEnabled(true); // WHERE cookie_enabled = true
     * $query->filterByCookieEnabled('yes'); // WHERE cookie_enabled = true
     * </code>
     *
     * @param     boolean|string $cookieEnabled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByCookieEnabled($cookieEnabled = null, $comparison = null)
    {
        if (is_string($cookieEnabled)) {
            $cookie_enabled = in_array(strtolower($cookieEnabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AnalyticPeer::COOKIE_ENABLED, $cookieEnabled, $comparison);
    }

    /**
     * Filter the query on the language column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguage('fooValue');   // WHERE language = 'fooValue'
     * $query->filterByLanguage('%fooValue%'); // WHERE language LIKE '%fooValue%'
     * </code>
     *
     * @param     string $language The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByLanguage($language = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($language)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $language)) {
                $language = str_replace('*', '%', $language);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::LANGUAGE, $language, $comparison);
    }

    /**
     * Filter the query on the platform column
     *
     * Example usage:
     * <code>
     * $query->filterByPlatform('fooValue');   // WHERE platform = 'fooValue'
     * $query->filterByPlatform('%fooValue%'); // WHERE platform LIKE '%fooValue%'
     * </code>
     *
     * @param     string $platform The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByPlatform($platform = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($platform)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $platform)) {
                $platform = str_replace('*', '%', $platform);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::PLATFORM, $platform, $comparison);
    }

    /**
     * Filter the query on the product column
     *
     * Example usage:
     * <code>
     * $query->filterByProduct('fooValue');   // WHERE product = 'fooValue'
     * $query->filterByProduct('%fooValue%'); // WHERE product LIKE '%fooValue%'
     * </code>
     *
     * @param     string $product The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByProduct($product = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($product)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $product)) {
                $product = str_replace('*', '%', $product);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::PRODUCT, $product, $comparison);
    }

    /**
     * Filter the query on the product_sub column
     *
     * Example usage:
     * <code>
     * $query->filterByProductSub('fooValue');   // WHERE product_sub = 'fooValue'
     * $query->filterByProductSub('%fooValue%'); // WHERE product_sub LIKE '%fooValue%'
     * </code>
     *
     * @param     string $productSub The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByProductSub($productSub = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($productSub)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $productSub)) {
                $productSub = str_replace('*', '%', $productSub);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::PRODUCT_SUB, $productSub, $comparison);
    }

    /**
     * Filter the query on the vendor column
     *
     * Example usage:
     * <code>
     * $query->filterByVendor('fooValue');   // WHERE vendor = 'fooValue'
     * $query->filterByVendor('%fooValue%'); // WHERE vendor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByVendor($vendor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $vendor)) {
                $vendor = str_replace('*', '%', $vendor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::VENDOR, $vendor, $comparison);
    }

    /**
     * Filter the query on the vendor_sub column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorSub('fooValue');   // WHERE vendor_sub = 'fooValue'
     * $query->filterByVendorSub('%fooValue%'); // WHERE vendor_sub LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendorSub The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByVendorSub($vendorSub = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorSub)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $vendorSub)) {
                $vendorSub = str_replace('*', '%', $vendorSub);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::VENDOR_SUB, $vendorSub, $comparison);
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
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AnalyticPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AnalyticPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyticPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AnalyticQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(AnalyticPeer::USER_ID, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyticPeer::USER_ID, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function joinsfGuardUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usesfGuardUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfGuardUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUser', 'sfGuardUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Analytic $analytic Object to remove from the list of results
     *
     * @return AnalyticQuery The current query, for fluid interface
     */
    public function prune($analytic = null)
    {
        if ($analytic) {
            $this->addUsingAlias(AnalyticPeer::ID, $analytic->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseAnalyticQuery
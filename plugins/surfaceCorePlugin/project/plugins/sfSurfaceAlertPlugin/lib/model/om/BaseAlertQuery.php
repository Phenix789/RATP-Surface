<?php


/**
 * Base class that represents a query for the 'sfc_plugin_alert' table.
 *
 * 
 *
 * @method     AlertQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AlertQuery orderByRecipientId($order = Criteria::ASC) Order by the recipient_id column
 * @method     AlertQuery orderByTriggerAt($order = Criteria::ASC) Order by the trigger_at column
 * @method     AlertQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     AlertQuery orderByModelId($order = Criteria::ASC) Order by the model_id column
 * @method     AlertQuery orderByModelClass($order = Criteria::ASC) Order by the model_class column
 * @method     AlertQuery orderBySent($order = Criteria::ASC) Order by the sent column
 * @method     AlertQuery orderByAcquittedAt($order = Criteria::ASC) Order by the acquitted_at column
 * @method     AlertQuery orderByAcquittedBy($order = Criteria::ASC) Order by the acquitted_by column
 * @method     AlertQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     AlertQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     AlertQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     AlertQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     AlertQuery groupById() Group by the id column
 * @method     AlertQuery groupByRecipientId() Group by the recipient_id column
 * @method     AlertQuery groupByTriggerAt() Group by the trigger_at column
 * @method     AlertQuery groupByMessage() Group by the message column
 * @method     AlertQuery groupByModelId() Group by the model_id column
 * @method     AlertQuery groupByModelClass() Group by the model_class column
 * @method     AlertQuery groupBySent() Group by the sent column
 * @method     AlertQuery groupByAcquittedAt() Group by the acquitted_at column
 * @method     AlertQuery groupByAcquittedBy() Group by the acquitted_by column
 * @method     AlertQuery groupByCreatedAt() Group by the created_at column
 * @method     AlertQuery groupByUpdatedAt() Group by the updated_at column
 * @method     AlertQuery groupByCreatedBy() Group by the created_by column
 * @method     AlertQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     AlertQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlertQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlertQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlertQuery leftJoinCollaboratorRelatedByAcquittedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CollaboratorRelatedByAcquittedBy relation
 * @method     AlertQuery rightJoinCollaboratorRelatedByAcquittedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CollaboratorRelatedByAcquittedBy relation
 * @method     AlertQuery innerJoinCollaboratorRelatedByAcquittedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CollaboratorRelatedByAcquittedBy relation
 *
 * @method     AlertQuery leftJoinCollaboratorRelatedByRecipientId($relationAlias = null) Adds a LEFT JOIN clause to the query using the CollaboratorRelatedByRecipientId relation
 * @method     AlertQuery rightJoinCollaboratorRelatedByRecipientId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CollaboratorRelatedByRecipientId relation
 * @method     AlertQuery innerJoinCollaboratorRelatedByRecipientId($relationAlias = null) Adds a INNER JOIN clause to the query using the CollaboratorRelatedByRecipientId relation
 *
 * @method     AlertQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     AlertQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     AlertQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     AlertQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     AlertQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     AlertQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     Alert findOne(PropelPDO $con = null) Return the first Alert matching the query
 * @method     Alert findOneOrCreate(PropelPDO $con = null) Return the first Alert matching the query, or a new Alert object populated from the query conditions when no match is found
 *
 * @method     Alert findOneById(int $id) Return the first Alert filtered by the id column
 * @method     Alert findOneByRecipientId(int $recipient_id) Return the first Alert filtered by the recipient_id column
 * @method     Alert findOneByTriggerAt(string $trigger_at) Return the first Alert filtered by the trigger_at column
 * @method     Alert findOneByMessage(string $message) Return the first Alert filtered by the message column
 * @method     Alert findOneByModelId(int $model_id) Return the first Alert filtered by the model_id column
 * @method     Alert findOneByModelClass(string $model_class) Return the first Alert filtered by the model_class column
 * @method     Alert findOneBySent(string $sent) Return the first Alert filtered by the sent column
 * @method     Alert findOneByAcquittedAt(string $acquitted_at) Return the first Alert filtered by the acquitted_at column
 * @method     Alert findOneByAcquittedBy(int $acquitted_by) Return the first Alert filtered by the acquitted_by column
 * @method     Alert findOneByCreatedAt(string $created_at) Return the first Alert filtered by the created_at column
 * @method     Alert findOneByUpdatedAt(string $updated_at) Return the first Alert filtered by the updated_at column
 * @method     Alert findOneByCreatedBy(int $created_by) Return the first Alert filtered by the created_by column
 * @method     Alert findOneByUpdatedBy(int $updated_by) Return the first Alert filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Alert objects filtered by the id column
 * @method     array findByRecipientId(int $recipient_id) Return Alert objects filtered by the recipient_id column
 * @method     array findByTriggerAt(string $trigger_at) Return Alert objects filtered by the trigger_at column
 * @method     array findByMessage(string $message) Return Alert objects filtered by the message column
 * @method     array findByModelId(int $model_id) Return Alert objects filtered by the model_id column
 * @method     array findByModelClass(string $model_class) Return Alert objects filtered by the model_class column
 * @method     array findBySent(string $sent) Return Alert objects filtered by the sent column
 * @method     array findByAcquittedAt(string $acquitted_at) Return Alert objects filtered by the acquitted_at column
 * @method     array findByAcquittedBy(int $acquitted_by) Return Alert objects filtered by the acquitted_by column
 * @method     array findByCreatedAt(string $created_at) Return Alert objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Alert objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return Alert objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return Alert objects filtered by the updated_by column
 *
 * @package    propel.generator.plugins.sfSurfaceAlertPlugin.lib.model.om
 */
abstract class BaseAlertQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseAlertQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Alert', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlertQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     AlertQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlertQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlertQuery) {
            return $criteria;
        }
        $query = new AlertQuery();
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
     * @return   Alert|Alert[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlertPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlertPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Alert A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `RECIPIENT_ID`, `TRIGGER_AT`, `MESSAGE`, `MODEL_ID`, `MODEL_CLASS`, `SENT`, `ACQUITTED_AT`, `ACQUITTED_BY`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `sfc_plugin_alert` WHERE `ID` = :p0';
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
            $obj = new Alert();
            $obj->hydrate($row);
            AlertPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Alert|Alert[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Alert[]|mixed the list of results, formatted by the current formatter
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
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AlertPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AlertPeer::ID, $keys, Criteria::IN);
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
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(AlertPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the recipient_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipientId(1234); // WHERE recipient_id = 1234
     * $query->filterByRecipientId(array(12, 34)); // WHERE recipient_id IN (12, 34)
     * $query->filterByRecipientId(array('min' => 12)); // WHERE recipient_id > 12
     * </code>
     *
     * @see       filterByCollaboratorRelatedByRecipientId()
     *
     * @param     mixed $recipientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByRecipientId($recipientId = null, $comparison = null)
    {
        if (is_array($recipientId)) {
            $useMinMax = false;
            if (isset($recipientId['min'])) {
                $this->addUsingAlias(AlertPeer::RECIPIENT_ID, $recipientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recipientId['max'])) {
                $this->addUsingAlias(AlertPeer::RECIPIENT_ID, $recipientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::RECIPIENT_ID, $recipientId, $comparison);
    }

    /**
     * Filter the query on the trigger_at column
     *
     * Example usage:
     * <code>
     * $query->filterByTriggerAt('2011-03-14'); // WHERE trigger_at = '2011-03-14'
     * $query->filterByTriggerAt('now'); // WHERE trigger_at = '2011-03-14'
     * $query->filterByTriggerAt(array('max' => 'yesterday')); // WHERE trigger_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $triggerAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByTriggerAt($triggerAt = null, $comparison = null)
    {
        if (is_array($triggerAt)) {
            $useMinMax = false;
            if (isset($triggerAt['min'])) {
                $this->addUsingAlias(AlertPeer::TRIGGER_AT, $triggerAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($triggerAt['max'])) {
                $this->addUsingAlias(AlertPeer::TRIGGER_AT, $triggerAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::TRIGGER_AT, $triggerAt, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlertPeer::MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the model_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModelId(1234); // WHERE model_id = 1234
     * $query->filterByModelId(array(12, 34)); // WHERE model_id IN (12, 34)
     * $query->filterByModelId(array('min' => 12)); // WHERE model_id > 12
     * </code>
     *
     * @param     mixed $modelId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByModelId($modelId = null, $comparison = null)
    {
        if (is_array($modelId)) {
            $useMinMax = false;
            if (isset($modelId['min'])) {
                $this->addUsingAlias(AlertPeer::MODEL_ID, $modelId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modelId['max'])) {
                $this->addUsingAlias(AlertPeer::MODEL_ID, $modelId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::MODEL_ID, $modelId, $comparison);
    }

    /**
     * Filter the query on the model_class column
     *
     * Example usage:
     * <code>
     * $query->filterByModelClass('fooValue');   // WHERE model_class = 'fooValue'
     * $query->filterByModelClass('%fooValue%'); // WHERE model_class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modelClass The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByModelClass($modelClass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modelClass)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $modelClass)) {
                $modelClass = str_replace('*', '%', $modelClass);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlertPeer::MODEL_CLASS, $modelClass, $comparison);
    }

    /**
     * Filter the query on the sent column
     *
     * Example usage:
     * <code>
     * $query->filterBySent('2011-03-14'); // WHERE sent = '2011-03-14'
     * $query->filterBySent('now'); // WHERE sent = '2011-03-14'
     * $query->filterBySent(array('max' => 'yesterday')); // WHERE sent > '2011-03-13'
     * </code>
     *
     * @param     mixed $sent The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterBySent($sent = null, $comparison = null)
    {
        if (is_array($sent)) {
            $useMinMax = false;
            if (isset($sent['min'])) {
                $this->addUsingAlias(AlertPeer::SENT, $sent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sent['max'])) {
                $this->addUsingAlias(AlertPeer::SENT, $sent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::SENT, $sent, $comparison);
    }

    /**
     * Filter the query on the acquitted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByAcquittedAt('2011-03-14'); // WHERE acquitted_at = '2011-03-14'
     * $query->filterByAcquittedAt('now'); // WHERE acquitted_at = '2011-03-14'
     * $query->filterByAcquittedAt(array('max' => 'yesterday')); // WHERE acquitted_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $acquittedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByAcquittedAt($acquittedAt = null, $comparison = null)
    {
        if (is_array($acquittedAt)) {
            $useMinMax = false;
            if (isset($acquittedAt['min'])) {
                $this->addUsingAlias(AlertPeer::ACQUITTED_AT, $acquittedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acquittedAt['max'])) {
                $this->addUsingAlias(AlertPeer::ACQUITTED_AT, $acquittedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::ACQUITTED_AT, $acquittedAt, $comparison);
    }

    /**
     * Filter the query on the acquitted_by column
     *
     * Example usage:
     * <code>
     * $query->filterByAcquittedBy(1234); // WHERE acquitted_by = 1234
     * $query->filterByAcquittedBy(array(12, 34)); // WHERE acquitted_by IN (12, 34)
     * $query->filterByAcquittedBy(array('min' => 12)); // WHERE acquitted_by > 12
     * </code>
     *
     * @see       filterByCollaboratorRelatedByAcquittedBy()
     *
     * @param     mixed $acquittedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByAcquittedBy($acquittedBy = null, $comparison = null)
    {
        if (is_array($acquittedBy)) {
            $useMinMax = false;
            if (isset($acquittedBy['min'])) {
                $this->addUsingAlias(AlertPeer::ACQUITTED_BY, $acquittedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($acquittedBy['max'])) {
                $this->addUsingAlias(AlertPeer::ACQUITTED_BY, $acquittedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::ACQUITTED_BY, $acquittedBy, $comparison);
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
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(AlertPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(AlertPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(AlertPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(AlertPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(AlertPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(AlertPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return AlertQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(AlertPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(AlertPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlertPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Collaborator object
     *
     * @param   Collaborator|PropelObjectCollection $collaborator The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AlertQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCollaboratorRelatedByAcquittedBy($collaborator, $comparison = null)
    {
        if ($collaborator instanceof Collaborator) {
            return $this
                ->addUsingAlias(AlertPeer::ACQUITTED_BY, $collaborator->getId(), $comparison);
        } elseif ($collaborator instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlertPeer::ACQUITTED_BY, $collaborator->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCollaboratorRelatedByAcquittedBy() only accepts arguments of type Collaborator or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CollaboratorRelatedByAcquittedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function joinCollaboratorRelatedByAcquittedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CollaboratorRelatedByAcquittedBy');

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
            $this->addJoinObject($join, 'CollaboratorRelatedByAcquittedBy');
        }

        return $this;
    }

    /**
     * Use the CollaboratorRelatedByAcquittedBy relation Collaborator object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CollaboratorQuery A secondary query class using the current class as primary query
     */
    public function useCollaboratorRelatedByAcquittedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCollaboratorRelatedByAcquittedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CollaboratorRelatedByAcquittedBy', 'CollaboratorQuery');
    }

    /**
     * Filter the query by a related Collaborator object
     *
     * @param   Collaborator|PropelObjectCollection $collaborator The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AlertQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCollaboratorRelatedByRecipientId($collaborator, $comparison = null)
    {
        if ($collaborator instanceof Collaborator) {
            return $this
                ->addUsingAlias(AlertPeer::RECIPIENT_ID, $collaborator->getId(), $comparison);
        } elseif ($collaborator instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlertPeer::RECIPIENT_ID, $collaborator->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCollaboratorRelatedByRecipientId() only accepts arguments of type Collaborator or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CollaboratorRelatedByRecipientId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function joinCollaboratorRelatedByRecipientId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CollaboratorRelatedByRecipientId');

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
            $this->addJoinObject($join, 'CollaboratorRelatedByRecipientId');
        }

        return $this;
    }

    /**
     * Use the CollaboratorRelatedByRecipientId relation Collaborator object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CollaboratorQuery A secondary query class using the current class as primary query
     */
    public function useCollaboratorRelatedByRecipientIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCollaboratorRelatedByRecipientId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CollaboratorRelatedByRecipientId', 'CollaboratorQuery');
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AlertQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(AlertPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlertPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return AlertQuery The current query, for fluid interface
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
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   AlertQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(AlertPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlertPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return AlertQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Alert $alert Object to remove from the list of results
     *
     * @return AlertQuery The current query, for fluid interface
     */
    public function prune($alert = null)
    {
        if ($alert) {
            $this->addUsingAlias(AlertPeer::ID, $alert->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseAlertQuery
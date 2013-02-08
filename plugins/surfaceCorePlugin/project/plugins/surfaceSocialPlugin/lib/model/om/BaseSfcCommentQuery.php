<?php


/**
 * Base class that represents a query for the 'sfc_social_comment' table.
 *
 * 
 *
 * @method     SfcCommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SfcCommentQuery orderByObjectName($order = Criteria::ASC) Order by the object_name column
 * @method     SfcCommentQuery orderByObjectId($order = Criteria::ASC) Order by the object_id column
 * @method     SfcCommentQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     SfcCommentQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     SfcCommentQuery orderByDateRef($order = Criteria::ASC) Order by the date_ref column
 * @method     SfcCommentQuery orderByCollaboratorId($order = Criteria::ASC) Order by the collaborator_id column
 * @method     SfcCommentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SfcCommentQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     SfcCommentQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     SfcCommentQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     SfcCommentQuery groupById() Group by the id column
 * @method     SfcCommentQuery groupByObjectName() Group by the object_name column
 * @method     SfcCommentQuery groupByObjectId() Group by the object_id column
 * @method     SfcCommentQuery groupByCategory() Group by the category column
 * @method     SfcCommentQuery groupByComment() Group by the comment column
 * @method     SfcCommentQuery groupByDateRef() Group by the date_ref column
 * @method     SfcCommentQuery groupByCollaboratorId() Group by the collaborator_id column
 * @method     SfcCommentQuery groupByCreatedAt() Group by the created_at column
 * @method     SfcCommentQuery groupByUpdatedAt() Group by the updated_at column
 * @method     SfcCommentQuery groupByCreatedBy() Group by the created_by column
 * @method     SfcCommentQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     SfcCommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SfcCommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SfcCommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SfcCommentQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     SfcCommentQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     SfcCommentQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     SfcCommentQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     SfcCommentQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     SfcCommentQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     SfcCommentQuery leftJoinCollaborator($relationAlias = null) Adds a LEFT JOIN clause to the query using the Collaborator relation
 * @method     SfcCommentQuery rightJoinCollaborator($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Collaborator relation
 * @method     SfcCommentQuery innerJoinCollaborator($relationAlias = null) Adds a INNER JOIN clause to the query using the Collaborator relation
 *
 * @method     SfcComment findOne(PropelPDO $con = null) Return the first SfcComment matching the query
 * @method     SfcComment findOneOrCreate(PropelPDO $con = null) Return the first SfcComment matching the query, or a new SfcComment object populated from the query conditions when no match is found
 *
 * @method     SfcComment findOneById(int $id) Return the first SfcComment filtered by the id column
 * @method     SfcComment findOneByObjectName(string $object_name) Return the first SfcComment filtered by the object_name column
 * @method     SfcComment findOneByObjectId(int $object_id) Return the first SfcComment filtered by the object_id column
 * @method     SfcComment findOneByCategory(string $category) Return the first SfcComment filtered by the category column
 * @method     SfcComment findOneByComment(string $comment) Return the first SfcComment filtered by the comment column
 * @method     SfcComment findOneByDateRef(string $date_ref) Return the first SfcComment filtered by the date_ref column
 * @method     SfcComment findOneByCollaboratorId(int $collaborator_id) Return the first SfcComment filtered by the collaborator_id column
 * @method     SfcComment findOneByCreatedAt(string $created_at) Return the first SfcComment filtered by the created_at column
 * @method     SfcComment findOneByUpdatedAt(string $updated_at) Return the first SfcComment filtered by the updated_at column
 * @method     SfcComment findOneByCreatedBy(int $created_by) Return the first SfcComment filtered by the created_by column
 * @method     SfcComment findOneByUpdatedBy(int $updated_by) Return the first SfcComment filtered by the updated_by column
 *
 * @method     array findById(int $id) Return SfcComment objects filtered by the id column
 * @method     array findByObjectName(string $object_name) Return SfcComment objects filtered by the object_name column
 * @method     array findByObjectId(int $object_id) Return SfcComment objects filtered by the object_id column
 * @method     array findByCategory(string $category) Return SfcComment objects filtered by the category column
 * @method     array findByComment(string $comment) Return SfcComment objects filtered by the comment column
 * @method     array findByDateRef(string $date_ref) Return SfcComment objects filtered by the date_ref column
 * @method     array findByCollaboratorId(int $collaborator_id) Return SfcComment objects filtered by the collaborator_id column
 * @method     array findByCreatedAt(string $created_at) Return SfcComment objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return SfcComment objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return SfcComment objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return SfcComment objects filtered by the updated_by column
 *
 * @package    propel.generator.plugins.surfaceSocialPlugin.lib.model.om
 */
abstract class BaseSfcCommentQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseSfcCommentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'SfcComment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SfcCommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     SfcCommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SfcCommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SfcCommentQuery) {
            return $criteria;
        }
        $query = new SfcCommentQuery();
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
     * @return   SfcComment|SfcComment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SfcCommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SfcCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   SfcComment A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `OBJECT_NAME`, `OBJECT_ID`, `CATEGORY`, `COMMENT`, `DATE_REF`, `COLLABORATOR_ID`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `sfc_social_comment` WHERE `ID` = :p0';
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
            $obj = new SfcComment();
            $obj->hydrate($row);
            SfcCommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SfcComment|SfcComment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SfcComment[]|mixed the list of results, formatted by the current formatter
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SfcCommentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SfcCommentPeer::ID, $keys, Criteria::IN);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SfcCommentPeer::ID, $id, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SfcCommentPeer::OBJECT_NAME, $objectName, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByObjectId($objectId = null, $comparison = null)
    {
        if (is_array($objectId)) {
            $useMinMax = false;
            if (isset($objectId['min'])) {
                $this->addUsingAlias(SfcCommentPeer::OBJECT_ID, $objectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($objectId['max'])) {
                $this->addUsingAlias(SfcCommentPeer::OBJECT_ID, $objectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::OBJECT_ID, $objectId, $comparison);
    }

    /**
     * Filter the query on the category column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory('fooValue');   // WHERE category = 'fooValue'
     * $query->filterByCategory('%fooValue%'); // WHERE category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $category The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByCategory($category = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($category)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $category)) {
                $category = str_replace('*', '%', $category);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::CATEGORY, $category, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the date_ref column
     *
     * Example usage:
     * <code>
     * $query->filterByDateRef('2011-03-14'); // WHERE date_ref = '2011-03-14'
     * $query->filterByDateRef('now'); // WHERE date_ref = '2011-03-14'
     * $query->filterByDateRef(array('max' => 'yesterday')); // WHERE date_ref > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateRef The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByDateRef($dateRef = null, $comparison = null)
    {
        if (is_array($dateRef)) {
            $useMinMax = false;
            if (isset($dateRef['min'])) {
                $this->addUsingAlias(SfcCommentPeer::DATE_REF, $dateRef['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateRef['max'])) {
                $this->addUsingAlias(SfcCommentPeer::DATE_REF, $dateRef['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::DATE_REF, $dateRef, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByCollaboratorId($collaboratorId = null, $comparison = null)
    {
        if (is_array($collaboratorId)) {
            $useMinMax = false;
            if (isset($collaboratorId['min'])) {
                $this->addUsingAlias(SfcCommentPeer::COLLABORATOR_ID, $collaboratorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($collaboratorId['max'])) {
                $this->addUsingAlias(SfcCommentPeer::COLLABORATOR_ID, $collaboratorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::COLLABORATOR_ID, $collaboratorId, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SfcCommentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SfcCommentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SfcCommentPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SfcCommentPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(SfcCommentPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(SfcCommentPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(SfcCommentPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(SfcCommentPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfcCommentPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SfcCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(SfcCommentPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SfcCommentPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
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
     * @return   SfcCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(SfcCommentPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SfcCommentPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
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
     * Filter the query by a related Collaborator object
     *
     * @param   Collaborator|PropelObjectCollection $collaborator The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SfcCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCollaborator($collaborator, $comparison = null)
    {
        if ($collaborator instanceof Collaborator) {
            return $this
                ->addUsingAlias(SfcCommentPeer::COLLABORATOR_ID, $collaborator->getId(), $comparison);
        } elseif ($collaborator instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SfcCommentPeer::COLLABORATOR_ID, $collaborator->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return SfcCommentQuery The current query, for fluid interface
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
     * @param   SfcComment $sfcComment Object to remove from the list of results
     *
     * @return SfcCommentQuery The current query, for fluid interface
     */
    public function prune($sfcComment = null)
    {
        if ($sfcComment) {
            $this->addUsingAlias(SfcCommentPeer::ID, $sfcComment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseSfcCommentQuery
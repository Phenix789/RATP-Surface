<?php


/**
 * Base class that represents a query for the 'collaborator' table.
 *
 * 
 *
 * @method     CollaboratorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CollaboratorQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     CollaboratorQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     CollaboratorQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     CollaboratorQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     CollaboratorQuery orderBySignature($order = Criteria::ASC) Order by the signature column
 * @method     CollaboratorQuery orderByJobRole($order = Criteria::ASC) Order by the job_role column
 * @method     CollaboratorQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     CollaboratorQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     CollaboratorQuery orderByPostalCode($order = Criteria::ASC) Order by the postal_code column
 * @method     CollaboratorQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     CollaboratorQuery orderByPhoneNumber($order = Criteria::ASC) Order by the phone_number column
 * @method     CollaboratorQuery orderByMobileNumber($order = Criteria::ASC) Order by the mobile_number column
 * @method     CollaboratorQuery orderByFaxNumber($order = Criteria::ASC) Order by the fax_number column
 * @method     CollaboratorQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     CollaboratorQuery orderByConfidential($order = Criteria::ASC) Order by the confidential column
 * @method     CollaboratorQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     CollaboratorQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     CollaboratorQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     CollaboratorQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     CollaboratorQuery groupById() Group by the id column
 * @method     CollaboratorQuery groupByIsActive() Group by the is_active column
 * @method     CollaboratorQuery groupByFirstName() Group by the first_name column
 * @method     CollaboratorQuery groupByLastName() Group by the last_name column
 * @method     CollaboratorQuery groupByEmail() Group by the email column
 * @method     CollaboratorQuery groupBySignature() Group by the signature column
 * @method     CollaboratorQuery groupByJobRole() Group by the job_role column
 * @method     CollaboratorQuery groupByAddress() Group by the address column
 * @method     CollaboratorQuery groupByCity() Group by the city column
 * @method     CollaboratorQuery groupByPostalCode() Group by the postal_code column
 * @method     CollaboratorQuery groupByCountry() Group by the country column
 * @method     CollaboratorQuery groupByPhoneNumber() Group by the phone_number column
 * @method     CollaboratorQuery groupByMobileNumber() Group by the mobile_number column
 * @method     CollaboratorQuery groupByFaxNumber() Group by the fax_number column
 * @method     CollaboratorQuery groupByComment() Group by the comment column
 * @method     CollaboratorQuery groupByConfidential() Group by the confidential column
 * @method     CollaboratorQuery groupByCreatedAt() Group by the created_at column
 * @method     CollaboratorQuery groupByUpdatedAt() Group by the updated_at column
 * @method     CollaboratorQuery groupByCreatedBy() Group by the created_by column
 * @method     CollaboratorQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     CollaboratorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CollaboratorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CollaboratorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CollaboratorQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     CollaboratorQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     CollaboratorQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     CollaboratorQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     CollaboratorQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     CollaboratorQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     CollaboratorQuery leftJoinsfGuardUserProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserProfile relation
 * @method     CollaboratorQuery rightJoinsfGuardUserProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserProfile relation
 * @method     CollaboratorQuery innerJoinsfGuardUserProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserProfile relation
 *
 * @method     CollaboratorQuery leftJoinAlertRelatedByAcquittedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertRelatedByAcquittedBy relation
 * @method     CollaboratorQuery rightJoinAlertRelatedByAcquittedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertRelatedByAcquittedBy relation
 * @method     CollaboratorQuery innerJoinAlertRelatedByAcquittedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertRelatedByAcquittedBy relation
 *
 * @method     CollaboratorQuery leftJoinAlertRelatedByRecipientId($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertRelatedByRecipientId relation
 * @method     CollaboratorQuery rightJoinAlertRelatedByRecipientId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertRelatedByRecipientId relation
 * @method     CollaboratorQuery innerJoinAlertRelatedByRecipientId($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertRelatedByRecipientId relation
 *
 * @method     CollaboratorQuery leftJoinSfcComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the SfcComment relation
 * @method     CollaboratorQuery rightJoinSfcComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SfcComment relation
 * @method     CollaboratorQuery innerJoinSfcComment($relationAlias = null) Adds a INNER JOIN clause to the query using the SfcComment relation
 *
 * @method     Collaborator findOne(PropelPDO $con = null) Return the first Collaborator matching the query
 * @method     Collaborator findOneOrCreate(PropelPDO $con = null) Return the first Collaborator matching the query, or a new Collaborator object populated from the query conditions when no match is found
 *
 * @method     Collaborator findOneById(int $id) Return the first Collaborator filtered by the id column
 * @method     Collaborator findOneByIsActive(boolean $is_active) Return the first Collaborator filtered by the is_active column
 * @method     Collaborator findOneByFirstName(string $first_name) Return the first Collaborator filtered by the first_name column
 * @method     Collaborator findOneByLastName(string $last_name) Return the first Collaborator filtered by the last_name column
 * @method     Collaborator findOneByEmail(string $email) Return the first Collaborator filtered by the email column
 * @method     Collaborator findOneBySignature(string $signature) Return the first Collaborator filtered by the signature column
 * @method     Collaborator findOneByJobRole(string $job_role) Return the first Collaborator filtered by the job_role column
 * @method     Collaborator findOneByAddress(string $address) Return the first Collaborator filtered by the address column
 * @method     Collaborator findOneByCity(string $city) Return the first Collaborator filtered by the city column
 * @method     Collaborator findOneByPostalCode(string $postal_code) Return the first Collaborator filtered by the postal_code column
 * @method     Collaborator findOneByCountry(string $country) Return the first Collaborator filtered by the country column
 * @method     Collaborator findOneByPhoneNumber(string $phone_number) Return the first Collaborator filtered by the phone_number column
 * @method     Collaborator findOneByMobileNumber(string $mobile_number) Return the first Collaborator filtered by the mobile_number column
 * @method     Collaborator findOneByFaxNumber(string $fax_number) Return the first Collaborator filtered by the fax_number column
 * @method     Collaborator findOneByComment(string $comment) Return the first Collaborator filtered by the comment column
 * @method     Collaborator findOneByConfidential(string $confidential) Return the first Collaborator filtered by the confidential column
 * @method     Collaborator findOneByCreatedAt(string $created_at) Return the first Collaborator filtered by the created_at column
 * @method     Collaborator findOneByUpdatedAt(string $updated_at) Return the first Collaborator filtered by the updated_at column
 * @method     Collaborator findOneByCreatedBy(int $created_by) Return the first Collaborator filtered by the created_by column
 * @method     Collaborator findOneByUpdatedBy(int $updated_by) Return the first Collaborator filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Collaborator objects filtered by the id column
 * @method     array findByIsActive(boolean $is_active) Return Collaborator objects filtered by the is_active column
 * @method     array findByFirstName(string $first_name) Return Collaborator objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return Collaborator objects filtered by the last_name column
 * @method     array findByEmail(string $email) Return Collaborator objects filtered by the email column
 * @method     array findBySignature(string $signature) Return Collaborator objects filtered by the signature column
 * @method     array findByJobRole(string $job_role) Return Collaborator objects filtered by the job_role column
 * @method     array findByAddress(string $address) Return Collaborator objects filtered by the address column
 * @method     array findByCity(string $city) Return Collaborator objects filtered by the city column
 * @method     array findByPostalCode(string $postal_code) Return Collaborator objects filtered by the postal_code column
 * @method     array findByCountry(string $country) Return Collaborator objects filtered by the country column
 * @method     array findByPhoneNumber(string $phone_number) Return Collaborator objects filtered by the phone_number column
 * @method     array findByMobileNumber(string $mobile_number) Return Collaborator objects filtered by the mobile_number column
 * @method     array findByFaxNumber(string $fax_number) Return Collaborator objects filtered by the fax_number column
 * @method     array findByComment(string $comment) Return Collaborator objects filtered by the comment column
 * @method     array findByConfidential(string $confidential) Return Collaborator objects filtered by the confidential column
 * @method     array findByCreatedAt(string $created_at) Return Collaborator objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Collaborator objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return Collaborator objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return Collaborator objects filtered by the updated_by column
 *
 * @package    propel.generator.lib.model.collaborator.om
 */
abstract class BaseCollaboratorQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseCollaboratorQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Collaborator', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CollaboratorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CollaboratorQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CollaboratorQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CollaboratorQuery) {
            return $criteria;
        }
        $query = new CollaboratorQuery();
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
     * @return   Collaborator|Collaborator[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CollaboratorPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Collaborator A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `IS_ACTIVE`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `SIGNATURE`, `JOB_ROLE`, `ADDRESS`, `CITY`, `POSTAL_CODE`, `COUNTRY`, `PHONE_NUMBER`, `MOBILE_NUMBER`, `FAX_NUMBER`, `COMMENT`, `CONFIDENTIAL`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `collaborator` WHERE `ID` = :p0';
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
            $obj = new Collaborator();
            $obj->hydrate($row);
            CollaboratorPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Collaborator|Collaborator[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Collaborator[]|mixed the list of results, formatted by the current formatter
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
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CollaboratorPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CollaboratorPeer::ID, $keys, Criteria::IN);
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
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CollaboratorPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CollaboratorPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the signature column
     *
     * Example usage:
     * <code>
     * $query->filterBySignature('fooValue');   // WHERE signature = 'fooValue'
     * $query->filterBySignature('%fooValue%'); // WHERE signature LIKE '%fooValue%'
     * </code>
     *
     * @param     string $signature The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterBySignature($signature = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($signature)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $signature)) {
                $signature = str_replace('*', '%', $signature);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::SIGNATURE, $signature, $comparison);
    }

    /**
     * Filter the query on the job_role column
     *
     * Example usage:
     * <code>
     * $query->filterByJobRole('fooValue');   // WHERE job_role = 'fooValue'
     * $query->filterByJobRole('%fooValue%'); // WHERE job_role LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jobRole The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByJobRole($jobRole = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jobRole)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jobRole)) {
                $jobRole = str_replace('*', '%', $jobRole);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::JOB_ROLE, $jobRole, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the postal_code column
     *
     * Example usage:
     * <code>
     * $query->filterByPostalCode('fooValue');   // WHERE postal_code = 'fooValue'
     * $query->filterByPostalCode('%fooValue%'); // WHERE postal_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postalCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByPostalCode($postalCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postalCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $postalCode)) {
                $postalCode = str_replace('*', '%', $postalCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::POSTAL_CODE, $postalCode, $comparison);
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%'); // WHERE country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $country)) {
                $country = str_replace('*', '%', $country);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the phone_number column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneNumber('fooValue');   // WHERE phone_number = 'fooValue'
     * $query->filterByPhoneNumber('%fooValue%'); // WHERE phone_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByPhoneNumber($phoneNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phoneNumber)) {
                $phoneNumber = str_replace('*', '%', $phoneNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::PHONE_NUMBER, $phoneNumber, $comparison);
    }

    /**
     * Filter the query on the mobile_number column
     *
     * Example usage:
     * <code>
     * $query->filterByMobileNumber('fooValue');   // WHERE mobile_number = 'fooValue'
     * $query->filterByMobileNumber('%fooValue%'); // WHERE mobile_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobileNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByMobileNumber($mobileNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobileNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mobileNumber)) {
                $mobileNumber = str_replace('*', '%', $mobileNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::MOBILE_NUMBER, $mobileNumber, $comparison);
    }

    /**
     * Filter the query on the fax_number column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxNumber('fooValue');   // WHERE fax_number = 'fooValue'
     * $query->filterByFaxNumber('%fooValue%'); // WHERE fax_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByFaxNumber($faxNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $faxNumber)) {
                $faxNumber = str_replace('*', '%', $faxNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::FAX_NUMBER, $faxNumber, $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CollaboratorPeer::COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the confidential column
     *
     * Example usage:
     * <code>
     * $query->filterByConfidential('fooValue');   // WHERE confidential = 'fooValue'
     * $query->filterByConfidential('%fooValue%'); // WHERE confidential LIKE '%fooValue%'
     * </code>
     *
     * @param     string $confidential The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByConfidential($confidential = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($confidential)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $confidential)) {
                $confidential = str_replace('*', '%', $confidential);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::CONFIDENTIAL, $confidential, $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CollaboratorPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CollaboratorPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CollaboratorPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CollaboratorPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(CollaboratorPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(CollaboratorPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(CollaboratorPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(CollaboratorPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CollaboratorPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CollaboratorQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(CollaboratorPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CollaboratorPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
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
     * @return   CollaboratorQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(CollaboratorPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CollaboratorPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CollaboratorQuery The current query, for fluid interface
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
     * Filter the query by a related sfGuardUserProfile object
     *
     * @param   sfGuardUserProfile|PropelObjectCollection $sfGuardUserProfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CollaboratorQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserProfile($sfGuardUserProfile, $comparison = null)
    {
        if ($sfGuardUserProfile instanceof sfGuardUserProfile) {
            return $this
                ->addUsingAlias(CollaboratorPeer::ID, $sfGuardUserProfile->getCollaboratorId(), $comparison);
        } elseif ($sfGuardUserProfile instanceof PropelObjectCollection) {
            return $this
                ->usesfGuardUserProfileQuery()
                ->filterByPrimaryKeys($sfGuardUserProfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfGuardUserProfile() only accepts arguments of type sfGuardUserProfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserProfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function joinsfGuardUserProfile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserProfile');

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
            $this->addJoinObject($join, 'sfGuardUserProfile');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserProfile relation sfGuardUserProfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserProfileQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserProfileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfGuardUserProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserProfile', 'sfGuardUserProfileQuery');
    }

    /**
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CollaboratorQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlertRelatedByAcquittedBy($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(CollaboratorPeer::ID, $alert->getAcquittedBy(), $comparison);
        } elseif ($alert instanceof PropelObjectCollection) {
            return $this
                ->useAlertRelatedByAcquittedByQuery()
                ->filterByPrimaryKeys($alert->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlertRelatedByAcquittedBy() only accepts arguments of type Alert or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlertRelatedByAcquittedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function joinAlertRelatedByAcquittedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlertRelatedByAcquittedBy');

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
            $this->addJoinObject($join, 'AlertRelatedByAcquittedBy');
        }

        return $this;
    }

    /**
     * Use the AlertRelatedByAcquittedBy relation Alert object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlertQuery A secondary query class using the current class as primary query
     */
    public function useAlertRelatedByAcquittedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlertRelatedByAcquittedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlertRelatedByAcquittedBy', 'AlertQuery');
    }

    /**
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CollaboratorQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlertRelatedByRecipientId($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(CollaboratorPeer::ID, $alert->getRecipientId(), $comparison);
        } elseif ($alert instanceof PropelObjectCollection) {
            return $this
                ->useAlertRelatedByRecipientIdQuery()
                ->filterByPrimaryKeys($alert->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlertRelatedByRecipientId() only accepts arguments of type Alert or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlertRelatedByRecipientId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function joinAlertRelatedByRecipientId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlertRelatedByRecipientId');

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
            $this->addJoinObject($join, 'AlertRelatedByRecipientId');
        }

        return $this;
    }

    /**
     * Use the AlertRelatedByRecipientId relation Alert object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlertQuery A secondary query class using the current class as primary query
     */
    public function useAlertRelatedByRecipientIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlertRelatedByRecipientId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlertRelatedByRecipientId', 'AlertQuery');
    }

    /**
     * Filter the query by a related SfcComment object
     *
     * @param   SfcComment|PropelObjectCollection $sfcComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CollaboratorQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySfcComment($sfcComment, $comparison = null)
    {
        if ($sfcComment instanceof SfcComment) {
            return $this
                ->addUsingAlias(CollaboratorPeer::ID, $sfcComment->getCollaboratorId(), $comparison);
        } elseif ($sfcComment instanceof PropelObjectCollection) {
            return $this
                ->useSfcCommentQuery()
                ->filterByPrimaryKeys($sfcComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySfcComment() only accepts arguments of type SfcComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SfcComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function joinSfcComment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SfcComment');

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
            $this->addJoinObject($join, 'SfcComment');
        }

        return $this;
    }

    /**
     * Use the SfcComment relation SfcComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SfcCommentQuery A secondary query class using the current class as primary query
     */
    public function useSfcCommentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSfcComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SfcComment', 'SfcCommentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Collaborator $collaborator Object to remove from the list of results
     *
     * @return CollaboratorQuery The current query, for fluid interface
     */
    public function prune($collaborator = null)
    {
        if ($collaborator) {
            $this->addUsingAlias(CollaboratorPeer::ID, $collaborator->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseCollaboratorQuery
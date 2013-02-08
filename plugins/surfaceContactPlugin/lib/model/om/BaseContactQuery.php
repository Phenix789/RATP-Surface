<?php


/**
 * Base class that represents a query for the 'sfc_abk_contact' table.
 *
 * 
 *
 * @method     ContactQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ContactQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ContactQuery orderByCivilityId($order = Criteria::ASC) Order by the civility_id column
 * @method     ContactQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method     ContactQuery orderByRole($order = Criteria::ASC) Order by the role column
 * @method     ContactQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ContactQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ContactQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ContactQuery orderByMaidenName($order = Criteria::ASC) Order by the maiden_name column
 * @method     ContactQuery orderByComplementName($order = Criteria::ASC) Order by the complement_name column
 * @method     ContactQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ContactQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method     ContactQuery orderByZoneId($order = Criteria::ASC) Order by the zone_id column
 * @method     ContactQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ContactQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ContactQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ContactQuery orderByPostalCode($order = Criteria::ASC) Order by the postal_code column
 * @method     ContactQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     ContactQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ContactQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ContactQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 * @method     ContactQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ContactQuery orderByWeb($order = Criteria::ASC) Order by the web column
 * @method     ContactQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ContactQuery orderByHiddenComment($order = Criteria::ASC) Order by the hidden_comment column
 * @method     ContactQuery orderByBirthDate($order = Criteria::ASC) Order by the birth_date column
 * @method     ContactQuery orderByBirthPlace($order = Criteria::ASC) Order by the birth_place column
 * @method     ContactQuery orderByBirthPlaceCode($order = Criteria::ASC) Order by the birth_place_code column
 * @method     ContactQuery orderByIsArchive($order = Criteria::ASC) Order by the is_archive column
 * @method     ContactQuery orderByArchiveDate($order = Criteria::ASC) Order by the archive_date column
 * @method     ContactQuery orderByArchiveComment($order = Criteria::ASC) Order by the archive_comment column
 * @method     ContactQuery orderBySecuNumber($order = Criteria::ASC) Order by the secu_number column
 * @method     ContactQuery orderBySiret($order = Criteria::ASC) Order by the siret column
 * @method     ContactQuery orderBySiren($order = Criteria::ASC) Order by the siren column
 * @method     ContactQuery orderByNafCode($order = Criteria::ASC) Order by the naf_code column
 * @method     ContactQuery orderByApeCode($order = Criteria::ASC) Order by the ape_code column
 * @method     ContactQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ContactQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ContactQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ContactQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ContactQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     ContactQuery groupById() Group by the id column
 * @method     ContactQuery groupByParentId() Group by the parent_id column
 * @method     ContactQuery groupByCivilityId() Group by the civility_id column
 * @method     ContactQuery groupByServiceId() Group by the service_id column
 * @method     ContactQuery groupByRole() Group by the role column
 * @method     ContactQuery groupByTitle() Group by the title column
 * @method     ContactQuery groupByFirstName() Group by the first_name column
 * @method     ContactQuery groupByLastName() Group by the last_name column
 * @method     ContactQuery groupByMaidenName() Group by the maiden_name column
 * @method     ContactQuery groupByComplementName() Group by the complement_name column
 * @method     ContactQuery groupByName() Group by the name column
 * @method     ContactQuery groupByShortName() Group by the short_name column
 * @method     ContactQuery groupByZoneId() Group by the zone_id column
 * @method     ContactQuery groupByAddress1() Group by the address1 column
 * @method     ContactQuery groupByAddress2() Group by the address2 column
 * @method     ContactQuery groupByCity() Group by the city column
 * @method     ContactQuery groupByPostalCode() Group by the postal_code column
 * @method     ContactQuery groupByCountry() Group by the country column
 * @method     ContactQuery groupByPhone() Group by the phone column
 * @method     ContactQuery groupByFax() Group by the fax column
 * @method     ContactQuery groupByMobile() Group by the mobile column
 * @method     ContactQuery groupByEmail() Group by the email column
 * @method     ContactQuery groupByWeb() Group by the web column
 * @method     ContactQuery groupByComment() Group by the comment column
 * @method     ContactQuery groupByHiddenComment() Group by the hidden_comment column
 * @method     ContactQuery groupByBirthDate() Group by the birth_date column
 * @method     ContactQuery groupByBirthPlace() Group by the birth_place column
 * @method     ContactQuery groupByBirthPlaceCode() Group by the birth_place_code column
 * @method     ContactQuery groupByIsArchive() Group by the is_archive column
 * @method     ContactQuery groupByArchiveDate() Group by the archive_date column
 * @method     ContactQuery groupByArchiveComment() Group by the archive_comment column
 * @method     ContactQuery groupBySecuNumber() Group by the secu_number column
 * @method     ContactQuery groupBySiret() Group by the siret column
 * @method     ContactQuery groupBySiren() Group by the siren column
 * @method     ContactQuery groupByNafCode() Group by the naf_code column
 * @method     ContactQuery groupByApeCode() Group by the ape_code column
 * @method     ContactQuery groupByType() Group by the type column
 * @method     ContactQuery groupByCreatedAt() Group by the created_at column
 * @method     ContactQuery groupByCreatedBy() Group by the created_by column
 * @method     ContactQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ContactQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     ContactQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ContactQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ContactQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ContactQuery leftJoinContactRelatedByParentId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactRelatedByParentId relation
 * @method     ContactQuery rightJoinContactRelatedByParentId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactRelatedByParentId relation
 * @method     ContactQuery innerJoinContactRelatedByParentId($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactRelatedByParentId relation
 *
 * @method     ContactQuery leftJoinCivility($relationAlias = null) Adds a LEFT JOIN clause to the query using the Civility relation
 * @method     ContactQuery rightJoinCivility($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Civility relation
 * @method     ContactQuery innerJoinCivility($relationAlias = null) Adds a INNER JOIN clause to the query using the Civility relation
 *
 * @method     ContactQuery leftJoinService($relationAlias = null) Adds a LEFT JOIN clause to the query using the Service relation
 * @method     ContactQuery rightJoinService($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Service relation
 * @method     ContactQuery innerJoinService($relationAlias = null) Adds a INNER JOIN clause to the query using the Service relation
 *
 * @method     ContactQuery leftJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     ContactQuery rightJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 * @method     ContactQuery innerJoinsfGuardUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByCreatedBy relation
 *
 * @method     ContactQuery leftJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     ContactQuery rightJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 * @method     ContactQuery innerJoinsfGuardUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserRelatedByUpdatedBy relation
 *
 * @method     ContactQuery leftJoinContactRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactRelatedById relation
 * @method     ContactQuery rightJoinContactRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactRelatedById relation
 * @method     ContactQuery innerJoinContactRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactRelatedById relation
 *
 * @method     ContactQuery leftJoinContactMultipleRelatedByContactId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactMultipleRelatedByContactId relation
 * @method     ContactQuery rightJoinContactMultipleRelatedByContactId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactMultipleRelatedByContactId relation
 * @method     ContactQuery innerJoinContactMultipleRelatedByContactId($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactMultipleRelatedByContactId relation
 *
 * @method     ContactQuery leftJoinContactMultipleRelatedByParentId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactMultipleRelatedByParentId relation
 * @method     ContactQuery rightJoinContactMultipleRelatedByParentId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactMultipleRelatedByParentId relation
 * @method     ContactQuery innerJoinContactMultipleRelatedByParentId($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactMultipleRelatedByParentId relation
 *
 * @method     ContactQuery leftJoinContactGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactGroup relation
 * @method     ContactQuery rightJoinContactGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactGroup relation
 * @method     ContactQuery innerJoinContactGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactGroup relation
 *
 * @method     ContactQuery leftJoinMaillingListContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the MaillingListContact relation
 * @method     ContactQuery rightJoinMaillingListContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MaillingListContact relation
 * @method     ContactQuery innerJoinMaillingListContact($relationAlias = null) Adds a INNER JOIN clause to the query using the MaillingListContact relation
 *
 * @method     Contact findOne(PropelPDO $con = null) Return the first Contact matching the query
 * @method     Contact findOneOrCreate(PropelPDO $con = null) Return the first Contact matching the query, or a new Contact object populated from the query conditions when no match is found
 *
 * @method     Contact findOneById(int $id) Return the first Contact filtered by the id column
 * @method     Contact findOneByParentId(int $parent_id) Return the first Contact filtered by the parent_id column
 * @method     Contact findOneByCivilityId(int $civility_id) Return the first Contact filtered by the civility_id column
 * @method     Contact findOneByServiceId(int $service_id) Return the first Contact filtered by the service_id column
 * @method     Contact findOneByRole(string $role) Return the first Contact filtered by the role column
 * @method     Contact findOneByTitle(string $title) Return the first Contact filtered by the title column
 * @method     Contact findOneByFirstName(string $first_name) Return the first Contact filtered by the first_name column
 * @method     Contact findOneByLastName(string $last_name) Return the first Contact filtered by the last_name column
 * @method     Contact findOneByMaidenName(string $maiden_name) Return the first Contact filtered by the maiden_name column
 * @method     Contact findOneByComplementName(string $complement_name) Return the first Contact filtered by the complement_name column
 * @method     Contact findOneByName(string $name) Return the first Contact filtered by the name column
 * @method     Contact findOneByShortName(string $short_name) Return the first Contact filtered by the short_name column
 * @method     Contact findOneByZoneId(int $zone_id) Return the first Contact filtered by the zone_id column
 * @method     Contact findOneByAddress1(string $address1) Return the first Contact filtered by the address1 column
 * @method     Contact findOneByAddress2(string $address2) Return the first Contact filtered by the address2 column
 * @method     Contact findOneByCity(string $city) Return the first Contact filtered by the city column
 * @method     Contact findOneByPostalCode(string $postal_code) Return the first Contact filtered by the postal_code column
 * @method     Contact findOneByCountry(string $country) Return the first Contact filtered by the country column
 * @method     Contact findOneByPhone(string $phone) Return the first Contact filtered by the phone column
 * @method     Contact findOneByFax(string $fax) Return the first Contact filtered by the fax column
 * @method     Contact findOneByMobile(string $mobile) Return the first Contact filtered by the mobile column
 * @method     Contact findOneByEmail(string $email) Return the first Contact filtered by the email column
 * @method     Contact findOneByWeb(string $web) Return the first Contact filtered by the web column
 * @method     Contact findOneByComment(string $comment) Return the first Contact filtered by the comment column
 * @method     Contact findOneByHiddenComment(string $hidden_comment) Return the first Contact filtered by the hidden_comment column
 * @method     Contact findOneByBirthDate(string $birth_date) Return the first Contact filtered by the birth_date column
 * @method     Contact findOneByBirthPlace(string $birth_place) Return the first Contact filtered by the birth_place column
 * @method     Contact findOneByBirthPlaceCode(string $birth_place_code) Return the first Contact filtered by the birth_place_code column
 * @method     Contact findOneByIsArchive(boolean $is_archive) Return the first Contact filtered by the is_archive column
 * @method     Contact findOneByArchiveDate(string $archive_date) Return the first Contact filtered by the archive_date column
 * @method     Contact findOneByArchiveComment(string $archive_comment) Return the first Contact filtered by the archive_comment column
 * @method     Contact findOneBySecuNumber(string $secu_number) Return the first Contact filtered by the secu_number column
 * @method     Contact findOneBySiret(string $siret) Return the first Contact filtered by the siret column
 * @method     Contact findOneBySiren(string $siren) Return the first Contact filtered by the siren column
 * @method     Contact findOneByNafCode(string $naf_code) Return the first Contact filtered by the naf_code column
 * @method     Contact findOneByApeCode(string $ape_code) Return the first Contact filtered by the ape_code column
 * @method     Contact findOneByType(int $type) Return the first Contact filtered by the type column
 * @method     Contact findOneByCreatedAt(string $created_at) Return the first Contact filtered by the created_at column
 * @method     Contact findOneByCreatedBy(int $created_by) Return the first Contact filtered by the created_by column
 * @method     Contact findOneByUpdatedAt(string $updated_at) Return the first Contact filtered by the updated_at column
 * @method     Contact findOneByUpdatedBy(int $updated_by) Return the first Contact filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Contact objects filtered by the id column
 * @method     array findByParentId(int $parent_id) Return Contact objects filtered by the parent_id column
 * @method     array findByCivilityId(int $civility_id) Return Contact objects filtered by the civility_id column
 * @method     array findByServiceId(int $service_id) Return Contact objects filtered by the service_id column
 * @method     array findByRole(string $role) Return Contact objects filtered by the role column
 * @method     array findByTitle(string $title) Return Contact objects filtered by the title column
 * @method     array findByFirstName(string $first_name) Return Contact objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return Contact objects filtered by the last_name column
 * @method     array findByMaidenName(string $maiden_name) Return Contact objects filtered by the maiden_name column
 * @method     array findByComplementName(string $complement_name) Return Contact objects filtered by the complement_name column
 * @method     array findByName(string $name) Return Contact objects filtered by the name column
 * @method     array findByShortName(string $short_name) Return Contact objects filtered by the short_name column
 * @method     array findByZoneId(int $zone_id) Return Contact objects filtered by the zone_id column
 * @method     array findByAddress1(string $address1) Return Contact objects filtered by the address1 column
 * @method     array findByAddress2(string $address2) Return Contact objects filtered by the address2 column
 * @method     array findByCity(string $city) Return Contact objects filtered by the city column
 * @method     array findByPostalCode(string $postal_code) Return Contact objects filtered by the postal_code column
 * @method     array findByCountry(string $country) Return Contact objects filtered by the country column
 * @method     array findByPhone(string $phone) Return Contact objects filtered by the phone column
 * @method     array findByFax(string $fax) Return Contact objects filtered by the fax column
 * @method     array findByMobile(string $mobile) Return Contact objects filtered by the mobile column
 * @method     array findByEmail(string $email) Return Contact objects filtered by the email column
 * @method     array findByWeb(string $web) Return Contact objects filtered by the web column
 * @method     array findByComment(string $comment) Return Contact objects filtered by the comment column
 * @method     array findByHiddenComment(string $hidden_comment) Return Contact objects filtered by the hidden_comment column
 * @method     array findByBirthDate(string $birth_date) Return Contact objects filtered by the birth_date column
 * @method     array findByBirthPlace(string $birth_place) Return Contact objects filtered by the birth_place column
 * @method     array findByBirthPlaceCode(string $birth_place_code) Return Contact objects filtered by the birth_place_code column
 * @method     array findByIsArchive(boolean $is_archive) Return Contact objects filtered by the is_archive column
 * @method     array findByArchiveDate(string $archive_date) Return Contact objects filtered by the archive_date column
 * @method     array findByArchiveComment(string $archive_comment) Return Contact objects filtered by the archive_comment column
 * @method     array findBySecuNumber(string $secu_number) Return Contact objects filtered by the secu_number column
 * @method     array findBySiret(string $siret) Return Contact objects filtered by the siret column
 * @method     array findBySiren(string $siren) Return Contact objects filtered by the siren column
 * @method     array findByNafCode(string $naf_code) Return Contact objects filtered by the naf_code column
 * @method     array findByApeCode(string $ape_code) Return Contact objects filtered by the ape_code column
 * @method     array findByType(int $type) Return Contact objects filtered by the type column
 * @method     array findByCreatedAt(string $created_at) Return Contact objects filtered by the created_at column
 * @method     array findByCreatedBy(int $created_by) Return Contact objects filtered by the created_by column
 * @method     array findByUpdatedAt(string $updated_at) Return Contact objects filtered by the updated_at column
 * @method     array findByUpdatedBy(int $updated_by) Return Contact objects filtered by the updated_by column
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseContactQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseContactQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Contact', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContactQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ContactQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContactQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContactQuery) {
            return $criteria;
        }
        $query = new ContactQuery();
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
     * @return   Contact|Contact[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContactPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Contact A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `PARENT_ID`, `CIVILITY_ID`, `SERVICE_ID`, `ROLE`, `TITLE`, `FIRST_NAME`, `LAST_NAME`, `MAIDEN_NAME`, `COMPLEMENT_NAME`, `NAME`, `SHORT_NAME`, `ZONE_ID`, `ADDRESS1`, `ADDRESS2`, `CITY`, `POSTAL_CODE`, `COUNTRY`, `PHONE`, `FAX`, `MOBILE`, `EMAIL`, `WEB`, `COMMENT`, `HIDDEN_COMMENT`, `BIRTH_DATE`, `BIRTH_PLACE`, `BIRTH_PLACE_CODE`, `IS_ARCHIVE`, `ARCHIVE_DATE`, `ARCHIVE_COMMENT`, `SECU_NUMBER`, `SIRET`, `SIREN`, `NAF_CODE`, `APE_CODE`, `TYPE`, `CREATED_AT`, `CREATED_BY`, `UPDATED_AT`, `UPDATED_BY` FROM `sfc_abk_contact` WHERE `ID` = :p0';
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
            $cls = ContactPeer::getOMClass($row, 0);
            $obj = new $cls();
            $obj->hydrate($row);
            ContactPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Contact|Contact[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Contact[]|mixed the list of results, formatted by the current formatter
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
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContactPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContactPeer::ID, $keys, Criteria::IN);
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
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ContactPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @see       filterByContactRelatedByParentId()
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(ContactPeer::PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(ContactPeer::PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::PARENT_ID, $parentId, $comparison);
    }

    /**
     * Filter the query on the civility_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCivilityId(1234); // WHERE civility_id = 1234
     * $query->filterByCivilityId(array(12, 34)); // WHERE civility_id IN (12, 34)
     * $query->filterByCivilityId(array('min' => 12)); // WHERE civility_id > 12
     * </code>
     *
     * @see       filterByCivility()
     *
     * @param     mixed $civilityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByCivilityId($civilityId = null, $comparison = null)
    {
        if (is_array($civilityId)) {
            $useMinMax = false;
            if (isset($civilityId['min'])) {
                $this->addUsingAlias(ContactPeer::CIVILITY_ID, $civilityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($civilityId['max'])) {
                $this->addUsingAlias(ContactPeer::CIVILITY_ID, $civilityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::CIVILITY_ID, $civilityId, $comparison);
    }

    /**
     * Filter the query on the service_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceId(1234); // WHERE service_id = 1234
     * $query->filterByServiceId(array(12, 34)); // WHERE service_id IN (12, 34)
     * $query->filterByServiceId(array('min' => 12)); // WHERE service_id > 12
     * </code>
     *
     * @see       filterByService()
     *
     * @param     mixed $serviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(ContactPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(ContactPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Filter the query on the role column
     *
     * Example usage:
     * <code>
     * $query->filterByRole('fooValue');   // WHERE role = 'fooValue'
     * $query->filterByRole('%fooValue%'); // WHERE role LIKE '%fooValue%'
     * </code>
     *
     * @param     string $role The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByRole($role = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($role)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $role)) {
                $role = str_replace('*', '%', $role);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::ROLE, $role, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::TITLE, $title, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::FIRST_NAME, $firstName, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the maiden_name column
     *
     * Example usage:
     * <code>
     * $query->filterByMaidenName('fooValue');   // WHERE maiden_name = 'fooValue'
     * $query->filterByMaidenName('%fooValue%'); // WHERE maiden_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $maidenName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByMaidenName($maidenName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($maidenName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $maidenName)) {
                $maidenName = str_replace('*', '%', $maidenName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::MAIDEN_NAME, $maidenName, $comparison);
    }

    /**
     * Filter the query on the complement_name column
     *
     * Example usage:
     * <code>
     * $query->filterByComplementName('fooValue');   // WHERE complement_name = 'fooValue'
     * $query->filterByComplementName('%fooValue%'); // WHERE complement_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $complementName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByComplementName($complementName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($complementName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $complementName)) {
                $complementName = str_replace('*', '%', $complementName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::COMPLEMENT_NAME, $complementName, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::NAME, $name, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::SHORT_NAME, $shortName, $comparison);
    }

    /**
     * Filter the query on the zone_id column
     *
     * Example usage:
     * <code>
     * $query->filterByZoneId(1234); // WHERE zone_id = 1234
     * $query->filterByZoneId(array(12, 34)); // WHERE zone_id IN (12, 34)
     * $query->filterByZoneId(array('min' => 12)); // WHERE zone_id > 12
     * </code>
     *
     * @param     mixed $zoneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByZoneId($zoneId = null, $comparison = null)
    {
        if (is_array($zoneId)) {
            $useMinMax = false;
            if (isset($zoneId['min'])) {
                $this->addUsingAlias(ContactPeer::ZONE_ID, $zoneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zoneId['max'])) {
                $this->addUsingAlias(ContactPeer::ZONE_ID, $zoneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::ZONE_ID, $zoneId, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::ADDRESS2, $address2, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::CITY, $city, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::POSTAL_CODE, $postalCode, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%'); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fax)) {
                $fax = str_replace('*', '%', $fax);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%'); // WHERE mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mobile)) {
                $mobile = str_replace('*', '%', $mobile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::MOBILE, $mobile, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the web column
     *
     * Example usage:
     * <code>
     * $query->filterByWeb('fooValue');   // WHERE web = 'fooValue'
     * $query->filterByWeb('%fooValue%'); // WHERE web LIKE '%fooValue%'
     * </code>
     *
     * @param     string $web The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByWeb($web = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($web)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $web)) {
                $web = str_replace('*', '%', $web);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::WEB, $web, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContactPeer::COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the hidden_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByHiddenComment('fooValue');   // WHERE hidden_comment = 'fooValue'
     * $query->filterByHiddenComment('%fooValue%'); // WHERE hidden_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hiddenComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByHiddenComment($hiddenComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hiddenComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hiddenComment)) {
                $hiddenComment = str_replace('*', '%', $hiddenComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::HIDDEN_COMMENT, $hiddenComment, $comparison);
    }

    /**
     * Filter the query on the birth_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthDate('2011-03-14'); // WHERE birth_date = '2011-03-14'
     * $query->filterByBirthDate('now'); // WHERE birth_date = '2011-03-14'
     * $query->filterByBirthDate(array('max' => 'yesterday')); // WHERE birth_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByBirthDate($birthDate = null, $comparison = null)
    {
        if (is_array($birthDate)) {
            $useMinMax = false;
            if (isset($birthDate['min'])) {
                $this->addUsingAlias(ContactPeer::BIRTH_DATE, $birthDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthDate['max'])) {
                $this->addUsingAlias(ContactPeer::BIRTH_DATE, $birthDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::BIRTH_DATE, $birthDate, $comparison);
    }

    /**
     * Filter the query on the birth_place column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthPlace('fooValue');   // WHERE birth_place = 'fooValue'
     * $query->filterByBirthPlace('%fooValue%'); // WHERE birth_place LIKE '%fooValue%'
     * </code>
     *
     * @param     string $birthPlace The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByBirthPlace($birthPlace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($birthPlace)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $birthPlace)) {
                $birthPlace = str_replace('*', '%', $birthPlace);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::BIRTH_PLACE, $birthPlace, $comparison);
    }

    /**
     * Filter the query on the birth_place_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthPlaceCode('fooValue');   // WHERE birth_place_code = 'fooValue'
     * $query->filterByBirthPlaceCode('%fooValue%'); // WHERE birth_place_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $birthPlaceCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByBirthPlaceCode($birthPlaceCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($birthPlaceCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $birthPlaceCode)) {
                $birthPlaceCode = str_replace('*', '%', $birthPlaceCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::BIRTH_PLACE_CODE, $birthPlaceCode, $comparison);
    }

    /**
     * Filter the query on the is_archive column
     *
     * Example usage:
     * <code>
     * $query->filterByIsArchive(true); // WHERE is_archive = true
     * $query->filterByIsArchive('yes'); // WHERE is_archive = true
     * </code>
     *
     * @param     boolean|string $isArchive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByIsArchive($isArchive = null, $comparison = null)
    {
        if (is_string($isArchive)) {
            $is_archive = in_array(strtolower($isArchive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContactPeer::IS_ARCHIVE, $isArchive, $comparison);
    }

    /**
     * Filter the query on the archive_date column
     *
     * Example usage:
     * <code>
     * $query->filterByArchiveDate('2011-03-14'); // WHERE archive_date = '2011-03-14'
     * $query->filterByArchiveDate('now'); // WHERE archive_date = '2011-03-14'
     * $query->filterByArchiveDate(array('max' => 'yesterday')); // WHERE archive_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $archiveDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByArchiveDate($archiveDate = null, $comparison = null)
    {
        if (is_array($archiveDate)) {
            $useMinMax = false;
            if (isset($archiveDate['min'])) {
                $this->addUsingAlias(ContactPeer::ARCHIVE_DATE, $archiveDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archiveDate['max'])) {
                $this->addUsingAlias(ContactPeer::ARCHIVE_DATE, $archiveDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::ARCHIVE_DATE, $archiveDate, $comparison);
    }

    /**
     * Filter the query on the archive_comment column
     *
     * Example usage:
     * <code>
     * $query->filterByArchiveComment('fooValue');   // WHERE archive_comment = 'fooValue'
     * $query->filterByArchiveComment('%fooValue%'); // WHERE archive_comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $archiveComment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByArchiveComment($archiveComment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($archiveComment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $archiveComment)) {
                $archiveComment = str_replace('*', '%', $archiveComment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::ARCHIVE_COMMENT, $archiveComment, $comparison);
    }

    /**
     * Filter the query on the secu_number column
     *
     * Example usage:
     * <code>
     * $query->filterBySecuNumber('fooValue');   // WHERE secu_number = 'fooValue'
     * $query->filterBySecuNumber('%fooValue%'); // WHERE secu_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $secuNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterBySecuNumber($secuNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($secuNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $secuNumber)) {
                $secuNumber = str_replace('*', '%', $secuNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::SECU_NUMBER, $secuNumber, $comparison);
    }

    /**
     * Filter the query on the siret column
     *
     * Example usage:
     * <code>
     * $query->filterBySiret('fooValue');   // WHERE siret = 'fooValue'
     * $query->filterBySiret('%fooValue%'); // WHERE siret LIKE '%fooValue%'
     * </code>
     *
     * @param     string $siret The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterBySiret($siret = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($siret)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $siret)) {
                $siret = str_replace('*', '%', $siret);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::SIRET, $siret, $comparison);
    }

    /**
     * Filter the query on the siren column
     *
     * Example usage:
     * <code>
     * $query->filterBySiren('fooValue');   // WHERE siren = 'fooValue'
     * $query->filterBySiren('%fooValue%'); // WHERE siren LIKE '%fooValue%'
     * </code>
     *
     * @param     string $siren The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterBySiren($siren = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($siren)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $siren)) {
                $siren = str_replace('*', '%', $siren);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::SIREN, $siren, $comparison);
    }

    /**
     * Filter the query on the naf_code column
     *
     * Example usage:
     * <code>
     * $query->filterByNafCode('fooValue');   // WHERE naf_code = 'fooValue'
     * $query->filterByNafCode('%fooValue%'); // WHERE naf_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nafCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByNafCode($nafCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nafCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nafCode)) {
                $nafCode = str_replace('*', '%', $nafCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::NAF_CODE, $nafCode, $comparison);
    }

    /**
     * Filter the query on the ape_code column
     *
     * Example usage:
     * <code>
     * $query->filterByApeCode('fooValue');   // WHERE ape_code = 'fooValue'
     * $query->filterByApeCode('%fooValue%'); // WHERE ape_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apeCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByApeCode($apeCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apeCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apeCode)) {
                $apeCode = str_replace('*', '%', $apeCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContactPeer::APE_CODE, $apeCode, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(ContactPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(ContactPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::TYPE, $type, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ContactPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ContactPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ContactPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ContactPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ContactPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ContactPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::UPDATED_AT, $updatedAt, $comparison);
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
     * @return ContactQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(ContactPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(ContactPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContactPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactRelatedByParentId($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(ContactPeer::PARENT_ID, $contact->getId(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactPeer::PARENT_ID, $contact->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContactRelatedByParentId() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactRelatedByParentId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinContactRelatedByParentId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactRelatedByParentId');

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
            $this->addJoinObject($join, 'ContactRelatedByParentId');
        }

        return $this;
    }

    /**
     * Use the ContactRelatedByParentId relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactRelatedByParentIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContactRelatedByParentId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactRelatedByParentId', 'ContactQuery');
    }

    /**
     * Filter the query by a related Civility object
     *
     * @param   Civility|PropelObjectCollection $civility The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCivility($civility, $comparison = null)
    {
        if ($civility instanceof Civility) {
            return $this
                ->addUsingAlias(ContactPeer::CIVILITY_ID, $civility->getId(), $comparison);
        } elseif ($civility instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactPeer::CIVILITY_ID, $civility->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCivility() only accepts arguments of type Civility or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Civility relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinCivility($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Civility');

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
            $this->addJoinObject($join, 'Civility');
        }

        return $this;
    }

    /**
     * Use the Civility relation Civility object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CivilityQuery A secondary query class using the current class as primary query
     */
    public function useCivilityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCivility($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Civility', 'CivilityQuery');
    }

    /**
     * Filter the query by a related Service object
     *
     * @param   Service|PropelObjectCollection $service The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByService($service, $comparison = null)
    {
        if ($service instanceof Service) {
            return $this
                ->addUsingAlias(ContactPeer::SERVICE_ID, $service->getId(), $comparison);
        } elseif ($service instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactPeer::SERVICE_ID, $service->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByService() only accepts arguments of type Service or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Service relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinService($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Service');

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
            $this->addJoinObject($join, 'Service');
        }

        return $this;
    }

    /**
     * Use the Service relation Service object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ServiceQuery A secondary query class using the current class as primary query
     */
    public function useServiceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinService($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Service', 'ServiceQuery');
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByCreatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(ContactPeer::CREATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactPeer::CREATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserRelatedByUpdatedBy($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(ContactPeer::UPDATED_BY, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContactPeer::UPDATED_BY, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ContactQuery The current query, for fluid interface
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
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactRelatedById($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(ContactPeer::ID, $contact->getParentId(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            return $this
                ->useContactRelatedByIdQuery()
                ->filterByPrimaryKeys($contact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactRelatedById() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinContactRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactRelatedById');

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
            $this->addJoinObject($join, 'ContactRelatedById');
        }

        return $this;
    }

    /**
     * Use the ContactRelatedById relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContactRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactRelatedById', 'ContactQuery');
    }

    /**
     * Filter the query by a related ContactMultiple object
     *
     * @param   ContactMultiple|PropelObjectCollection $contactMultiple  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactMultipleRelatedByContactId($contactMultiple, $comparison = null)
    {
        if ($contactMultiple instanceof ContactMultiple) {
            return $this
                ->addUsingAlias(ContactPeer::ID, $contactMultiple->getContactId(), $comparison);
        } elseif ($contactMultiple instanceof PropelObjectCollection) {
            return $this
                ->useContactMultipleRelatedByContactIdQuery()
                ->filterByPrimaryKeys($contactMultiple->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactMultipleRelatedByContactId() only accepts arguments of type ContactMultiple or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactMultipleRelatedByContactId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinContactMultipleRelatedByContactId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactMultipleRelatedByContactId');

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
            $this->addJoinObject($join, 'ContactMultipleRelatedByContactId');
        }

        return $this;
    }

    /**
     * Use the ContactMultipleRelatedByContactId relation ContactMultiple object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactMultipleQuery A secondary query class using the current class as primary query
     */
    public function useContactMultipleRelatedByContactIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactMultipleRelatedByContactId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactMultipleRelatedByContactId', 'ContactMultipleQuery');
    }

    /**
     * Filter the query by a related ContactMultiple object
     *
     * @param   ContactMultiple|PropelObjectCollection $contactMultiple  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactMultipleRelatedByParentId($contactMultiple, $comparison = null)
    {
        if ($contactMultiple instanceof ContactMultiple) {
            return $this
                ->addUsingAlias(ContactPeer::ID, $contactMultiple->getParentId(), $comparison);
        } elseif ($contactMultiple instanceof PropelObjectCollection) {
            return $this
                ->useContactMultipleRelatedByParentIdQuery()
                ->filterByPrimaryKeys($contactMultiple->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactMultipleRelatedByParentId() only accepts arguments of type ContactMultiple or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactMultipleRelatedByParentId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinContactMultipleRelatedByParentId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactMultipleRelatedByParentId');

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
            $this->addJoinObject($join, 'ContactMultipleRelatedByParentId');
        }

        return $this;
    }

    /**
     * Use the ContactMultipleRelatedByParentId relation ContactMultiple object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactMultipleQuery A secondary query class using the current class as primary query
     */
    public function useContactMultipleRelatedByParentIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactMultipleRelatedByParentId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactMultipleRelatedByParentId', 'ContactMultipleQuery');
    }

    /**
     * Filter the query by a related ContactGroup object
     *
     * @param   ContactGroup|PropelObjectCollection $contactGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactGroup($contactGroup, $comparison = null)
    {
        if ($contactGroup instanceof ContactGroup) {
            return $this
                ->addUsingAlias(ContactPeer::ID, $contactGroup->getContactId(), $comparison);
        } elseif ($contactGroup instanceof PropelObjectCollection) {
            return $this
                ->useContactGroupQuery()
                ->filterByPrimaryKeys($contactGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactGroup() only accepts arguments of type ContactGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinContactGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactGroup');

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
            $this->addJoinObject($join, 'ContactGroup');
        }

        return $this;
    }

    /**
     * Use the ContactGroup relation ContactGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactGroupQuery A secondary query class using the current class as primary query
     */
    public function useContactGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContactGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactGroup', 'ContactGroupQuery');
    }

    /**
     * Filter the query by a related MaillingListContact object
     *
     * @param   MaillingListContact|PropelObjectCollection $maillingListContact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ContactQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMaillingListContact($maillingListContact, $comparison = null)
    {
        if ($maillingListContact instanceof MaillingListContact) {
            return $this
                ->addUsingAlias(ContactPeer::ID, $maillingListContact->getContactId(), $comparison);
        } elseif ($maillingListContact instanceof PropelObjectCollection) {
            return $this
                ->useMaillingListContactQuery()
                ->filterByPrimaryKeys($maillingListContact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaillingListContact() only accepts arguments of type MaillingListContact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MaillingListContact relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function joinMaillingListContact($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MaillingListContact');

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
            $this->addJoinObject($join, 'MaillingListContact');
        }

        return $this;
    }

    /**
     * Use the MaillingListContact relation MaillingListContact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MaillingListContactQuery A secondary query class using the current class as primary query
     */
    public function useMaillingListContactQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMaillingListContact($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MaillingListContact', 'MaillingListContactQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Contact $contact Object to remove from the list of results
     *
     * @return ContactQuery The current query, for fluid interface
     */
    public function prune($contact = null)
    {
        if ($contact) {
            $this->addUsingAlias(ContactPeer::ID, $contact->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseContactQuery
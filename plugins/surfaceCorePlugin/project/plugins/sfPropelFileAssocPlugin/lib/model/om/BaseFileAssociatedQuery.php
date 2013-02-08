<?php


/**
 * Base class that represents a query for the 'file_associated' table.
 *
 * 
 *
 * @method     FileAssociatedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FileAssociatedQuery orderByClassName($order = Criteria::ASC) Order by the class_name column
 * @method     FileAssociatedQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     FileAssociatedQuery orderByFieldId($order = Criteria::ASC) Order by the field_id column
 * @method     FileAssociatedQuery orderByFilepath($order = Criteria::ASC) Order by the filepath column
 * @method     FileAssociatedQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     FileAssociatedQuery orderByOrginalFilename($order = Criteria::ASC) Order by the orginal_filename column
 * @method     FileAssociatedQuery orderByTitle($order = Criteria::ASC) Order by the title column
 *
 * @method     FileAssociatedQuery groupById() Group by the id column
 * @method     FileAssociatedQuery groupByClassName() Group by the class_name column
 * @method     FileAssociatedQuery groupByCategory() Group by the category column
 * @method     FileAssociatedQuery groupByFieldId() Group by the field_id column
 * @method     FileAssociatedQuery groupByFilepath() Group by the filepath column
 * @method     FileAssociatedQuery groupByFilename() Group by the filename column
 * @method     FileAssociatedQuery groupByOrginalFilename() Group by the orginal_filename column
 * @method     FileAssociatedQuery groupByTitle() Group by the title column
 *
 * @method     FileAssociatedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FileAssociatedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FileAssociatedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FileAssociated findOne(PropelPDO $con = null) Return the first FileAssociated matching the query
 * @method     FileAssociated findOneOrCreate(PropelPDO $con = null) Return the first FileAssociated matching the query, or a new FileAssociated object populated from the query conditions when no match is found
 *
 * @method     FileAssociated findOneById(int $id) Return the first FileAssociated filtered by the id column
 * @method     FileAssociated findOneByClassName(string $class_name) Return the first FileAssociated filtered by the class_name column
 * @method     FileAssociated findOneByCategory(string $category) Return the first FileAssociated filtered by the category column
 * @method     FileAssociated findOneByFieldId(int $field_id) Return the first FileAssociated filtered by the field_id column
 * @method     FileAssociated findOneByFilepath(string $filepath) Return the first FileAssociated filtered by the filepath column
 * @method     FileAssociated findOneByFilename(string $filename) Return the first FileAssociated filtered by the filename column
 * @method     FileAssociated findOneByOrginalFilename(string $orginal_filename) Return the first FileAssociated filtered by the orginal_filename column
 * @method     FileAssociated findOneByTitle(string $title) Return the first FileAssociated filtered by the title column
 *
 * @method     array findById(int $id) Return FileAssociated objects filtered by the id column
 * @method     array findByClassName(string $class_name) Return FileAssociated objects filtered by the class_name column
 * @method     array findByCategory(string $category) Return FileAssociated objects filtered by the category column
 * @method     array findByFieldId(int $field_id) Return FileAssociated objects filtered by the field_id column
 * @method     array findByFilepath(string $filepath) Return FileAssociated objects filtered by the filepath column
 * @method     array findByFilename(string $filename) Return FileAssociated objects filtered by the filename column
 * @method     array findByOrginalFilename(string $orginal_filename) Return FileAssociated objects filtered by the orginal_filename column
 * @method     array findByTitle(string $title) Return FileAssociated objects filtered by the title column
 *
 * @package    propel.generator.plugins.sfPropelFileAssocPlugin.lib.model.om
 */
abstract class BaseFileAssociatedQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseFileAssociatedQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'FileAssociated', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FileAssociatedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     FileAssociatedQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FileAssociatedQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FileAssociatedQuery) {
            return $criteria;
        }
        $query = new FileAssociatedQuery();
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
     * @return   FileAssociated|FileAssociated[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FileAssociatedPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FileAssociatedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   FileAssociated A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `CLASS_NAME`, `CATEGORY`, `FIELD_ID`, `FILEPATH`, `FILENAME`, `ORGINAL_FILENAME`, `TITLE` FROM `file_associated` WHERE `ID` = :p0';
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
            $obj = new FileAssociated();
            $obj->hydrate($row);
            FileAssociatedPeer::addInstanceToPool($obj, (string) $key);
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
     * @return FileAssociated|FileAssociated[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|FileAssociated[]|mixed the list of results, formatted by the current formatter
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
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FileAssociatedPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FileAssociatedPeer::ID, $keys, Criteria::IN);
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
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(FileAssociatedPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the class_name column
     *
     * Example usage:
     * <code>
     * $query->filterByClassName('fooValue');   // WHERE class_name = 'fooValue'
     * $query->filterByClassName('%fooValue%'); // WHERE class_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $className The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByClassName($className = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($className)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $className)) {
                $className = str_replace('*', '%', $className);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FileAssociatedPeer::CLASS_NAME, $className, $comparison);
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
     * @return FileAssociatedQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FileAssociatedPeer::CATEGORY, $category, $comparison);
    }

    /**
     * Filter the query on the field_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldId(1234); // WHERE field_id = 1234
     * $query->filterByFieldId(array(12, 34)); // WHERE field_id IN (12, 34)
     * $query->filterByFieldId(array('min' => 12)); // WHERE field_id > 12
     * </code>
     *
     * @param     mixed $fieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByFieldId($fieldId = null, $comparison = null)
    {
        if (is_array($fieldId)) {
            $useMinMax = false;
            if (isset($fieldId['min'])) {
                $this->addUsingAlias(FileAssociatedPeer::FIELD_ID, $fieldId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldId['max'])) {
                $this->addUsingAlias(FileAssociatedPeer::FIELD_ID, $fieldId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FileAssociatedPeer::FIELD_ID, $fieldId, $comparison);
    }

    /**
     * Filter the query on the filepath column
     *
     * Example usage:
     * <code>
     * $query->filterByFilepath('fooValue');   // WHERE filepath = 'fooValue'
     * $query->filterByFilepath('%fooValue%'); // WHERE filepath LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filepath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByFilepath($filepath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filepath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filepath)) {
                $filepath = str_replace('*', '%', $filepath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FileAssociatedPeer::FILEPATH, $filepath, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FileAssociatedPeer::FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the orginal_filename column
     *
     * Example usage:
     * <code>
     * $query->filterByOrginalFilename('fooValue');   // WHERE orginal_filename = 'fooValue'
     * $query->filterByOrginalFilename('%fooValue%'); // WHERE orginal_filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orginalFilename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function filterByOrginalFilename($orginalFilename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orginalFilename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orginalFilename)) {
                $orginalFilename = str_replace('*', '%', $orginalFilename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FileAssociatedPeer::ORGINAL_FILENAME, $orginalFilename, $comparison);
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
     * @return FileAssociatedQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FileAssociatedPeer::TITLE, $title, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   FileAssociated $fileAssociated Object to remove from the list of results
     *
     * @return FileAssociatedQuery The current query, for fluid interface
     */
    public function prune($fileAssociated = null)
    {
        if ($fileAssociated) {
            $this->addUsingAlias(FileAssociatedPeer::ID, $fileAssociated->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseFileAssociatedQuery
<?php


/**
 * Base class that represents a query for the 'sfc_abk_civility' table.
 *
 * 
 *
 * @method     CivilityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CivilityQuery orderByShortName($order = Criteria::ASC) Order by the short_name column
 * @method     CivilityQuery orderByLongName($order = Criteria::ASC) Order by the long_name column
 * @method     CivilityQuery orderByGenre($order = Criteria::ASC) Order by the genre column
 * @method     CivilityQuery orderByNameSpace($order = Criteria::ASC) Order by the name_space column
 *
 * @method     CivilityQuery groupById() Group by the id column
 * @method     CivilityQuery groupByShortName() Group by the short_name column
 * @method     CivilityQuery groupByLongName() Group by the long_name column
 * @method     CivilityQuery groupByGenre() Group by the genre column
 * @method     CivilityQuery groupByNameSpace() Group by the name_space column
 *
 * @method     CivilityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CivilityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CivilityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CivilityQuery leftJoinContact($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contact relation
 * @method     CivilityQuery rightJoinContact($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contact relation
 * @method     CivilityQuery innerJoinContact($relationAlias = null) Adds a INNER JOIN clause to the query using the Contact relation
 *
 * @method     Civility findOne(PropelPDO $con = null) Return the first Civility matching the query
 * @method     Civility findOneOrCreate(PropelPDO $con = null) Return the first Civility matching the query, or a new Civility object populated from the query conditions when no match is found
 *
 * @method     Civility findOneById(int $id) Return the first Civility filtered by the id column
 * @method     Civility findOneByShortName(string $short_name) Return the first Civility filtered by the short_name column
 * @method     Civility findOneByLongName(string $long_name) Return the first Civility filtered by the long_name column
 * @method     Civility findOneByGenre(int $genre) Return the first Civility filtered by the genre column
 * @method     Civility findOneByNameSpace(string $name_space) Return the first Civility filtered by the name_space column
 *
 * @method     array findById(int $id) Return Civility objects filtered by the id column
 * @method     array findByShortName(string $short_name) Return Civility objects filtered by the short_name column
 * @method     array findByLongName(string $long_name) Return Civility objects filtered by the long_name column
 * @method     array findByGenre(int $genre) Return Civility objects filtered by the genre column
 * @method     array findByNameSpace(string $name_space) Return Civility objects filtered by the name_space column
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseCivilityQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseCivilityQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Civility', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CivilityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     CivilityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CivilityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CivilityQuery) {
            return $criteria;
        }
        $query = new CivilityQuery();
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
     * @return   Civility|Civility[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CivilityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CivilityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Civility A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, SHORT_NAME, LONG_NAME, GENRE, NAME_SPACE FROM sfc_abk_civility WHERE ID = :p0';
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
            $obj = new Civility();
            $obj->hydrate($row);
            CivilityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Civility|Civility[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Civility[]|mixed the list of results, formatted by the current formatter
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
     * @return CivilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CivilityPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CivilityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CivilityPeer::ID, $keys, Criteria::IN);
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
     * @return CivilityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(CivilityPeer::ID, $id, $comparison);
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
     * @return CivilityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CivilityPeer::SHORT_NAME, $shortName, $comparison);
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
     * @return CivilityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CivilityPeer::LONG_NAME, $longName, $comparison);
    }

    /**
     * Filter the query on the genre column
     *
     * Example usage:
     * <code>
     * $query->filterByGenre(1234); // WHERE genre = 1234
     * $query->filterByGenre(array(12, 34)); // WHERE genre IN (12, 34)
     * $query->filterByGenre(array('min' => 12)); // WHERE genre > 12
     * </code>
     *
     * @param     mixed $genre The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CivilityQuery The current query, for fluid interface
     */
    public function filterByGenre($genre = null, $comparison = null)
    {
        if (is_array($genre)) {
            $useMinMax = false;
            if (isset($genre['min'])) {
                $this->addUsingAlias(CivilityPeer::GENRE, $genre['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($genre['max'])) {
                $this->addUsingAlias(CivilityPeer::GENRE, $genre['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CivilityPeer::GENRE, $genre, $comparison);
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
     * @return CivilityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CivilityPeer::NAME_SPACE, $nameSpace, $comparison);
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   CivilityQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContact($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(CivilityPeer::ID, $contact->getCivilityId(), $comparison);
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
     * @return CivilityQuery The current query, for fluid interface
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
     * @param   Civility $civility Object to remove from the list of results
     *
     * @return CivilityQuery The current query, for fluid interface
     */
    public function prune($civility = null)
    {
        if ($civility) {
            $this->addUsingAlias(CivilityPeer::ID, $civility->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseCivilityQuery
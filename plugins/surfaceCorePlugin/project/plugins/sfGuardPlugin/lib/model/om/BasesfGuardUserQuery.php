<?php


/**
 * Base class that represents a query for the 'sf_guard_user' table.
 *
 * 
 *
 * @method     sfGuardUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     sfGuardUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     sfGuardUserQuery orderByAlgorithm($order = Criteria::ASC) Order by the algorithm column
 * @method     sfGuardUserQuery orderBySalt($order = Criteria::ASC) Order by the salt column
 * @method     sfGuardUserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     sfGuardUserQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     sfGuardUserQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     sfGuardUserQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     sfGuardUserQuery orderByIsSuperAdmin($order = Criteria::ASC) Order by the is_super_admin column
 * @method     sfGuardUserQuery orderByIsSudoer($order = Criteria::ASC) Order by the is_sudoer column
 * @method     sfGuardUserQuery orderByTimeSudoer($order = Criteria::ASC) Order by the time_sudoer column
 *
 * @method     sfGuardUserQuery groupById() Group by the id column
 * @method     sfGuardUserQuery groupByUsername() Group by the username column
 * @method     sfGuardUserQuery groupByAlgorithm() Group by the algorithm column
 * @method     sfGuardUserQuery groupBySalt() Group by the salt column
 * @method     sfGuardUserQuery groupByPassword() Group by the password column
 * @method     sfGuardUserQuery groupByCreatedAt() Group by the created_at column
 * @method     sfGuardUserQuery groupByLastLogin() Group by the last_login column
 * @method     sfGuardUserQuery groupByIsActive() Group by the is_active column
 * @method     sfGuardUserQuery groupByIsSuperAdmin() Group by the is_super_admin column
 * @method     sfGuardUserQuery groupByIsSudoer() Group by the is_sudoer column
 * @method     sfGuardUserQuery groupByTimeSudoer() Group by the time_sudoer column
 *
 * @method     sfGuardUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     sfGuardUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     sfGuardUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     sfGuardUserQuery leftJoinCollaboratorRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CollaboratorRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinCollaboratorRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CollaboratorRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinCollaboratorRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CollaboratorRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinCollaboratorRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CollaboratorRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinCollaboratorRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CollaboratorRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinCollaboratorRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CollaboratorRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardUserProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserProfile relation
 * @method     sfGuardUserQuery rightJoinsfGuardUserProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserProfile relation
 * @method     sfGuardUserQuery innerJoinsfGuardUserProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserProfile relation
 *
 * @method     sfGuardUserQuery leftJoinDashboardMessageRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the DashboardMessageRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinDashboardMessageRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DashboardMessageRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinDashboardMessageRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the DashboardMessageRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinDashboardMessageRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the DashboardMessageRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinDashboardMessageRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DashboardMessageRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinDashboardMessageRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the DashboardMessageRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinStationRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the StationRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinStationRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StationRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinStationRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the StationRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinStationRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the StationRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinStationRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StationRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinStationRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the StationRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinTransportTypeRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransportTypeRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinTransportTypeRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransportTypeRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinTransportTypeRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the TransportTypeRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinTransportTypeRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the TransportTypeRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinTransportTypeRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TransportTypeRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinTransportTypeRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the TransportTypeRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinSubscriptionRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the SubscriptionRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinSubscriptionRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SubscriptionRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinSubscriptionRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the SubscriptionRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinSubscriptionRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the SubscriptionRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinSubscriptionRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SubscriptionRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinSubscriptionRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the SubscriptionRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinClientRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinClientRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinClientRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinClientRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinClientRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinClientRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinClientSubscriptionRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientSubscriptionRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinClientSubscriptionRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientSubscriptionRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinClientSubscriptionRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientSubscriptionRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinClientSubscriptionRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientSubscriptionRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinClientSubscriptionRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientSubscriptionRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinClientSubscriptionRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientSubscriptionRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinTravelRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the TravelRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinTravelRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TravelRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinTravelRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the TravelRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinTravelRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the TravelRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinTravelRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TravelRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinTravelRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the TravelRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinContactRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinContactRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinContactRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinContactRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ContactRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinContactRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ContactRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinContactRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ContactRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinMaillingListRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the MaillingListRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinMaillingListRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MaillingListRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinMaillingListRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the MaillingListRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinMaillingListRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the MaillingListRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinMaillingListRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MaillingListRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinMaillingListRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the MaillingListRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinCartRelatedByUserId($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartRelatedByUserId relation
 * @method     sfGuardUserQuery rightJoinCartRelatedByUserId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartRelatedByUserId relation
 * @method     sfGuardUserQuery innerJoinCartRelatedByUserId($relationAlias = null) Adds a INNER JOIN clause to the query using the CartRelatedByUserId relation
 *
 * @method     sfGuardUserQuery leftJoinCartRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinCartRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinCartRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CartRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinCartRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinCartRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinCartRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CartRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinCartItemRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartItemRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinCartItemRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartItemRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinCartItemRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CartItemRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinCartItemRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartItemRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinCartItemRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartItemRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinCartItemRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the CartItemRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardUserPermission($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserPermission relation
 * @method     sfGuardUserQuery rightJoinsfGuardUserPermission($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserPermission relation
 * @method     sfGuardUserQuery innerJoinsfGuardUserPermission($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserPermission relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUserGroup relation
 * @method     sfGuardUserQuery rightJoinsfGuardUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUserGroup relation
 * @method     sfGuardUserQuery innerJoinsfGuardUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUserGroup relation
 *
 * @method     sfGuardUserQuery leftJoinsfGuardRememberKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardRememberKey relation
 * @method     sfGuardUserQuery rightJoinsfGuardRememberKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardRememberKey relation
 * @method     sfGuardUserQuery innerJoinsfGuardRememberKey($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardRememberKey relation
 *
 * @method     sfGuardUserQuery leftJoinAnalytic($relationAlias = null) Adds a LEFT JOIN clause to the query using the Analytic relation
 * @method     sfGuardUserQuery rightJoinAnalytic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Analytic relation
 * @method     sfGuardUserQuery innerJoinAnalytic($relationAlias = null) Adds a INNER JOIN clause to the query using the Analytic relation
 *
 * @method     sfGuardUserQuery leftJoinHistoryRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the HistoryRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinHistoryRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HistoryRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinHistoryRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the HistoryRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinHistoryRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the HistoryRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinHistoryRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the HistoryRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinHistoryRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the HistoryRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinsfcSettingRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfcSettingRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinsfcSettingRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfcSettingRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinsfcSettingRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfcSettingRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinsfcSettingRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfcSettingRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinsfcSettingRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfcSettingRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinsfcSettingRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the sfcSettingRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinAlertRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinAlertRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinAlertRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertRelatedByUpdatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinAlertRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinAlertRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinAlertRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinSfcCommentRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the SfcCommentRelatedByCreatedBy relation
 * @method     sfGuardUserQuery rightJoinSfcCommentRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SfcCommentRelatedByCreatedBy relation
 * @method     sfGuardUserQuery innerJoinSfcCommentRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the SfcCommentRelatedByCreatedBy relation
 *
 * @method     sfGuardUserQuery leftJoinSfcCommentRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the SfcCommentRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery rightJoinSfcCommentRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SfcCommentRelatedByUpdatedBy relation
 * @method     sfGuardUserQuery innerJoinSfcCommentRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the SfcCommentRelatedByUpdatedBy relation
 *
 * @method     sfGuardUser findOne(PropelPDO $con = null) Return the first sfGuardUser matching the query
 * @method     sfGuardUser findOneOrCreate(PropelPDO $con = null) Return the first sfGuardUser matching the query, or a new sfGuardUser object populated from the query conditions when no match is found
 *
 * @method     sfGuardUser findOneById(int $id) Return the first sfGuardUser filtered by the id column
 * @method     sfGuardUser findOneByUsername(string $username) Return the first sfGuardUser filtered by the username column
 * @method     sfGuardUser findOneByAlgorithm(string $algorithm) Return the first sfGuardUser filtered by the algorithm column
 * @method     sfGuardUser findOneBySalt(string $salt) Return the first sfGuardUser filtered by the salt column
 * @method     sfGuardUser findOneByPassword(string $password) Return the first sfGuardUser filtered by the password column
 * @method     sfGuardUser findOneByCreatedAt(string $created_at) Return the first sfGuardUser filtered by the created_at column
 * @method     sfGuardUser findOneByLastLogin(string $last_login) Return the first sfGuardUser filtered by the last_login column
 * @method     sfGuardUser findOneByIsActive(boolean $is_active) Return the first sfGuardUser filtered by the is_active column
 * @method     sfGuardUser findOneByIsSuperAdmin(boolean $is_super_admin) Return the first sfGuardUser filtered by the is_super_admin column
 * @method     sfGuardUser findOneByIsSudoer(boolean $is_sudoer) Return the first sfGuardUser filtered by the is_sudoer column
 * @method     sfGuardUser findOneByTimeSudoer(int $time_sudoer) Return the first sfGuardUser filtered by the time_sudoer column
 *
 * @method     array findById(int $id) Return sfGuardUser objects filtered by the id column
 * @method     array findByUsername(string $username) Return sfGuardUser objects filtered by the username column
 * @method     array findByAlgorithm(string $algorithm) Return sfGuardUser objects filtered by the algorithm column
 * @method     array findBySalt(string $salt) Return sfGuardUser objects filtered by the salt column
 * @method     array findByPassword(string $password) Return sfGuardUser objects filtered by the password column
 * @method     array findByCreatedAt(string $created_at) Return sfGuardUser objects filtered by the created_at column
 * @method     array findByLastLogin(string $last_login) Return sfGuardUser objects filtered by the last_login column
 * @method     array findByIsActive(boolean $is_active) Return sfGuardUser objects filtered by the is_active column
 * @method     array findByIsSuperAdmin(boolean $is_super_admin) Return sfGuardUser objects filtered by the is_super_admin column
 * @method     array findByIsSudoer(boolean $is_sudoer) Return sfGuardUser objects filtered by the is_sudoer column
 * @method     array findByTimeSudoer(int $time_sudoer) Return sfGuardUser objects filtered by the time_sudoer column
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardUserQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BasesfGuardUserQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'sfGuardUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new sfGuardUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     sfGuardUserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return sfGuardUserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof sfGuardUserQuery) {
            return $criteria;
        }
        $query = new sfGuardUserQuery();
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
     * @return   sfGuardUser|sfGuardUser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = sfGuardUserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   sfGuardUser A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, USERNAME, ALGORITHM, SALT, PASSWORD, CREATED_AT, LAST_LOGIN, IS_ACTIVE, IS_SUPER_ADMIN, IS_SUDOER, TIME_SUDOER FROM sf_guard_user WHERE ID = :p0';
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
            $obj = new sfGuardUser();
            $obj->hydrate($row);
            sfGuardUserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return sfGuardUser|sfGuardUser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|sfGuardUser[]|mixed the list of results, formatted by the current formatter
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
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(sfGuardUserPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(sfGuardUserPeer::ID, $keys, Criteria::IN);
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
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(sfGuardUserPeer::ID, $id, $comparison);
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
     * @return sfGuardUserQuery The current query, for fluid interface
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

        return $this->addUsingAlias(sfGuardUserPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the algorithm column
     *
     * Example usage:
     * <code>
     * $query->filterByAlgorithm('fooValue');   // WHERE algorithm = 'fooValue'
     * $query->filterByAlgorithm('%fooValue%'); // WHERE algorithm LIKE '%fooValue%'
     * </code>
     *
     * @param     string $algorithm The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByAlgorithm($algorithm = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($algorithm)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $algorithm)) {
                $algorithm = str_replace('*', '%', $algorithm);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfGuardUserPeer::ALGORITHM, $algorithm, $comparison);
    }

    /**
     * Filter the query on the salt column
     *
     * Example usage:
     * <code>
     * $query->filterBySalt('fooValue');   // WHERE salt = 'fooValue'
     * $query->filterBySalt('%fooValue%'); // WHERE salt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterBySalt($salt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $salt)) {
                $salt = str_replace('*', '%', $salt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfGuardUserPeer::SALT, $salt, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfGuardUserPeer::PASSWORD, $password, $comparison);
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
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(sfGuardUserPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(sfGuardUserPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfGuardUserPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(sfGuardUserPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(sfGuardUserPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfGuardUserPeer::LAST_LOGIN, $lastLogin, $comparison);
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
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(sfGuardUserPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the is_super_admin column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSuperAdmin(true); // WHERE is_super_admin = true
     * $query->filterByIsSuperAdmin('yes'); // WHERE is_super_admin = true
     * </code>
     *
     * @param     boolean|string $isSuperAdmin The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByIsSuperAdmin($isSuperAdmin = null, $comparison = null)
    {
        if (is_string($isSuperAdmin)) {
            $is_super_admin = in_array(strtolower($isSuperAdmin), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(sfGuardUserPeer::IS_SUPER_ADMIN, $isSuperAdmin, $comparison);
    }

    /**
     * Filter the query on the is_sudoer column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSudoer(true); // WHERE is_sudoer = true
     * $query->filterByIsSudoer('yes'); // WHERE is_sudoer = true
     * </code>
     *
     * @param     boolean|string $isSudoer The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByIsSudoer($isSudoer = null, $comparison = null)
    {
        if (is_string($isSudoer)) {
            $is_sudoer = in_array(strtolower($isSudoer), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(sfGuardUserPeer::IS_SUDOER, $isSudoer, $comparison);
    }

    /**
     * Filter the query on the time_sudoer column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeSudoer(1234); // WHERE time_sudoer = 1234
     * $query->filterByTimeSudoer(array(12, 34)); // WHERE time_sudoer IN (12, 34)
     * $query->filterByTimeSudoer(array('min' => 12)); // WHERE time_sudoer > 12
     * </code>
     *
     * @param     mixed $timeSudoer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function filterByTimeSudoer($timeSudoer = null, $comparison = null)
    {
        if (is_array($timeSudoer)) {
            $useMinMax = false;
            if (isset($timeSudoer['min'])) {
                $this->addUsingAlias(sfGuardUserPeer::TIME_SUDOER, $timeSudoer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeSudoer['max'])) {
                $this->addUsingAlias(sfGuardUserPeer::TIME_SUDOER, $timeSudoer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfGuardUserPeer::TIME_SUDOER, $timeSudoer, $comparison);
    }

    /**
     * Filter the query by a related Collaborator object
     *
     * @param   Collaborator|PropelObjectCollection $collaborator  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCollaboratorRelatedByCreatedBy($collaborator, $comparison = null)
    {
        if ($collaborator instanceof Collaborator) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $collaborator->getCreatedBy(), $comparison);
        } elseif ($collaborator instanceof PropelObjectCollection) {
            return $this
                ->useCollaboratorRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($collaborator->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCollaboratorRelatedByCreatedBy() only accepts arguments of type Collaborator or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CollaboratorRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCollaboratorRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CollaboratorRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'CollaboratorRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the CollaboratorRelatedByCreatedBy relation Collaborator object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CollaboratorQuery A secondary query class using the current class as primary query
     */
    public function useCollaboratorRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCollaboratorRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CollaboratorRelatedByCreatedBy', 'CollaboratorQuery');
    }

    /**
     * Filter the query by a related Collaborator object
     *
     * @param   Collaborator|PropelObjectCollection $collaborator  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCollaboratorRelatedByUpdatedBy($collaborator, $comparison = null)
    {
        if ($collaborator instanceof Collaborator) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $collaborator->getUpdatedBy(), $comparison);
        } elseif ($collaborator instanceof PropelObjectCollection) {
            return $this
                ->useCollaboratorRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($collaborator->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCollaboratorRelatedByUpdatedBy() only accepts arguments of type Collaborator or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CollaboratorRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCollaboratorRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CollaboratorRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'CollaboratorRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the CollaboratorRelatedByUpdatedBy relation Collaborator object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CollaboratorQuery A secondary query class using the current class as primary query
     */
    public function useCollaboratorRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCollaboratorRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CollaboratorRelatedByUpdatedBy', 'CollaboratorQuery');
    }

    /**
     * Filter the query by a related sfGuardUserProfile object
     *
     * @param   sfGuardUserProfile|PropelObjectCollection $sfGuardUserProfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserProfile($sfGuardUserProfile, $comparison = null)
    {
        if ($sfGuardUserProfile instanceof sfGuardUserProfile) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUserProfile->getUserId(), $comparison);
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
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinsfGuardUserProfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usesfGuardUserProfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfGuardUserProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserProfile', 'sfGuardUserProfileQuery');
    }

    /**
     * Filter the query by a related DashboardMessage object
     *
     * @param   DashboardMessage|PropelObjectCollection $dashboardMessage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDashboardMessageRelatedByCreatedBy($dashboardMessage, $comparison = null)
    {
        if ($dashboardMessage instanceof DashboardMessage) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $dashboardMessage->getCreatedBy(), $comparison);
        } elseif ($dashboardMessage instanceof PropelObjectCollection) {
            return $this
                ->useDashboardMessageRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($dashboardMessage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDashboardMessageRelatedByCreatedBy() only accepts arguments of type DashboardMessage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DashboardMessageRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinDashboardMessageRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DashboardMessageRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'DashboardMessageRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the DashboardMessageRelatedByCreatedBy relation DashboardMessage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DashboardMessageQuery A secondary query class using the current class as primary query
     */
    public function useDashboardMessageRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDashboardMessageRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DashboardMessageRelatedByCreatedBy', 'DashboardMessageQuery');
    }

    /**
     * Filter the query by a related DashboardMessage object
     *
     * @param   DashboardMessage|PropelObjectCollection $dashboardMessage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByDashboardMessageRelatedByUpdatedBy($dashboardMessage, $comparison = null)
    {
        if ($dashboardMessage instanceof DashboardMessage) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $dashboardMessage->getUpdatedBy(), $comparison);
        } elseif ($dashboardMessage instanceof PropelObjectCollection) {
            return $this
                ->useDashboardMessageRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($dashboardMessage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDashboardMessageRelatedByUpdatedBy() only accepts arguments of type DashboardMessage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DashboardMessageRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinDashboardMessageRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DashboardMessageRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'DashboardMessageRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the DashboardMessageRelatedByUpdatedBy relation DashboardMessage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DashboardMessageQuery A secondary query class using the current class as primary query
     */
    public function useDashboardMessageRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDashboardMessageRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DashboardMessageRelatedByUpdatedBy', 'DashboardMessageQuery');
    }

    /**
     * Filter the query by a related Station object
     *
     * @param   Station|PropelObjectCollection $station  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStationRelatedByCreatedBy($station, $comparison = null)
    {
        if ($station instanceof Station) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $station->getCreatedBy(), $comparison);
        } elseif ($station instanceof PropelObjectCollection) {
            return $this
                ->useStationRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($station->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStationRelatedByCreatedBy() only accepts arguments of type Station or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StationRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinStationRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StationRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'StationRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the StationRelatedByCreatedBy relation Station object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationQuery A secondary query class using the current class as primary query
     */
    public function useStationRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStationRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StationRelatedByCreatedBy', 'StationQuery');
    }

    /**
     * Filter the query by a related Station object
     *
     * @param   Station|PropelObjectCollection $station  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByStationRelatedByUpdatedBy($station, $comparison = null)
    {
        if ($station instanceof Station) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $station->getUpdatedBy(), $comparison);
        } elseif ($station instanceof PropelObjectCollection) {
            return $this
                ->useStationRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($station->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStationRelatedByUpdatedBy() only accepts arguments of type Station or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StationRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinStationRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StationRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'StationRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the StationRelatedByUpdatedBy relation Station object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   StationQuery A secondary query class using the current class as primary query
     */
    public function useStationRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStationRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StationRelatedByUpdatedBy', 'StationQuery');
    }

    /**
     * Filter the query by a related TransportType object
     *
     * @param   TransportType|PropelObjectCollection $transportType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTransportTypeRelatedByCreatedBy($transportType, $comparison = null)
    {
        if ($transportType instanceof TransportType) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $transportType->getCreatedBy(), $comparison);
        } elseif ($transportType instanceof PropelObjectCollection) {
            return $this
                ->useTransportTypeRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($transportType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransportTypeRelatedByCreatedBy() only accepts arguments of type TransportType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransportTypeRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinTransportTypeRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TransportTypeRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'TransportTypeRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the TransportTypeRelatedByCreatedBy relation TransportType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TransportTypeQuery A secondary query class using the current class as primary query
     */
    public function useTransportTypeRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTransportTypeRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransportTypeRelatedByCreatedBy', 'TransportTypeQuery');
    }

    /**
     * Filter the query by a related TransportType object
     *
     * @param   TransportType|PropelObjectCollection $transportType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTransportTypeRelatedByUpdatedBy($transportType, $comparison = null)
    {
        if ($transportType instanceof TransportType) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $transportType->getUpdatedBy(), $comparison);
        } elseif ($transportType instanceof PropelObjectCollection) {
            return $this
                ->useTransportTypeRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($transportType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTransportTypeRelatedByUpdatedBy() only accepts arguments of type TransportType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TransportTypeRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinTransportTypeRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TransportTypeRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'TransportTypeRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the TransportTypeRelatedByUpdatedBy relation TransportType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TransportTypeQuery A secondary query class using the current class as primary query
     */
    public function useTransportTypeRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTransportTypeRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TransportTypeRelatedByUpdatedBy', 'TransportTypeQuery');
    }

    /**
     * Filter the query by a related Subscription object
     *
     * @param   Subscription|PropelObjectCollection $subscription  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySubscriptionRelatedByCreatedBy($subscription, $comparison = null)
    {
        if ($subscription instanceof Subscription) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $subscription->getCreatedBy(), $comparison);
        } elseif ($subscription instanceof PropelObjectCollection) {
            return $this
                ->useSubscriptionRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($subscription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySubscriptionRelatedByCreatedBy() only accepts arguments of type Subscription or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SubscriptionRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinSubscriptionRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SubscriptionRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'SubscriptionRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the SubscriptionRelatedByCreatedBy relation Subscription object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SubscriptionQuery A secondary query class using the current class as primary query
     */
    public function useSubscriptionRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSubscriptionRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SubscriptionRelatedByCreatedBy', 'SubscriptionQuery');
    }

    /**
     * Filter the query by a related Subscription object
     *
     * @param   Subscription|PropelObjectCollection $subscription  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySubscriptionRelatedByUpdatedBy($subscription, $comparison = null)
    {
        if ($subscription instanceof Subscription) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $subscription->getUpdatedBy(), $comparison);
        } elseif ($subscription instanceof PropelObjectCollection) {
            return $this
                ->useSubscriptionRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($subscription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySubscriptionRelatedByUpdatedBy() only accepts arguments of type Subscription or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SubscriptionRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinSubscriptionRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SubscriptionRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'SubscriptionRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the SubscriptionRelatedByUpdatedBy relation Subscription object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SubscriptionQuery A secondary query class using the current class as primary query
     */
    public function useSubscriptionRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSubscriptionRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SubscriptionRelatedByUpdatedBy', 'SubscriptionQuery');
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByClientRelatedByCreatedBy($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $client->getCreatedBy(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            return $this
                ->useClientRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($client->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientRelatedByCreatedBy() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClientRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinClientRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClientRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'ClientRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the ClientRelatedByCreatedBy relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClientRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClientRelatedByCreatedBy', 'ClientQuery');
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByClientRelatedByUpdatedBy($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $client->getUpdatedBy(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            return $this
                ->useClientRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($client->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientRelatedByUpdatedBy() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClientRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinClientRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClientRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'ClientRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the ClientRelatedByUpdatedBy relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClientRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClientRelatedByUpdatedBy', 'ClientQuery');
    }

    /**
     * Filter the query by a related ClientSubscription object
     *
     * @param   ClientSubscription|PropelObjectCollection $clientSubscription  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByClientSubscriptionRelatedByCreatedBy($clientSubscription, $comparison = null)
    {
        if ($clientSubscription instanceof ClientSubscription) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $clientSubscription->getCreatedBy(), $comparison);
        } elseif ($clientSubscription instanceof PropelObjectCollection) {
            return $this
                ->useClientSubscriptionRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($clientSubscription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientSubscriptionRelatedByCreatedBy() only accepts arguments of type ClientSubscription or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClientSubscriptionRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinClientSubscriptionRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClientSubscriptionRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'ClientSubscriptionRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the ClientSubscriptionRelatedByCreatedBy relation ClientSubscription object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientSubscriptionQuery A secondary query class using the current class as primary query
     */
    public function useClientSubscriptionRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClientSubscriptionRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClientSubscriptionRelatedByCreatedBy', 'ClientSubscriptionQuery');
    }

    /**
     * Filter the query by a related ClientSubscription object
     *
     * @param   ClientSubscription|PropelObjectCollection $clientSubscription  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByClientSubscriptionRelatedByUpdatedBy($clientSubscription, $comparison = null)
    {
        if ($clientSubscription instanceof ClientSubscription) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $clientSubscription->getUpdatedBy(), $comparison);
        } elseif ($clientSubscription instanceof PropelObjectCollection) {
            return $this
                ->useClientSubscriptionRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($clientSubscription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientSubscriptionRelatedByUpdatedBy() only accepts arguments of type ClientSubscription or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClientSubscriptionRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinClientSubscriptionRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClientSubscriptionRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'ClientSubscriptionRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the ClientSubscriptionRelatedByUpdatedBy relation ClientSubscription object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientSubscriptionQuery A secondary query class using the current class as primary query
     */
    public function useClientSubscriptionRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClientSubscriptionRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClientSubscriptionRelatedByUpdatedBy', 'ClientSubscriptionQuery');
    }

    /**
     * Filter the query by a related Travel object
     *
     * @param   Travel|PropelObjectCollection $travel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTravelRelatedByCreatedBy($travel, $comparison = null)
    {
        if ($travel instanceof Travel) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $travel->getCreatedBy(), $comparison);
        } elseif ($travel instanceof PropelObjectCollection) {
            return $this
                ->useTravelRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($travel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTravelRelatedByCreatedBy() only accepts arguments of type Travel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TravelRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinTravelRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TravelRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'TravelRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the TravelRelatedByCreatedBy relation Travel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TravelQuery A secondary query class using the current class as primary query
     */
    public function useTravelRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTravelRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TravelRelatedByCreatedBy', 'TravelQuery');
    }

    /**
     * Filter the query by a related Travel object
     *
     * @param   Travel|PropelObjectCollection $travel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByTravelRelatedByUpdatedBy($travel, $comparison = null)
    {
        if ($travel instanceof Travel) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $travel->getUpdatedBy(), $comparison);
        } elseif ($travel instanceof PropelObjectCollection) {
            return $this
                ->useTravelRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($travel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTravelRelatedByUpdatedBy() only accepts arguments of type Travel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TravelRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinTravelRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TravelRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'TravelRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the TravelRelatedByUpdatedBy relation Travel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TravelQuery A secondary query class using the current class as primary query
     */
    public function useTravelRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTravelRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TravelRelatedByUpdatedBy', 'TravelQuery');
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactRelatedByCreatedBy($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $contact->getCreatedBy(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            return $this
                ->useContactRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($contact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactRelatedByCreatedBy() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinContactRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'ContactRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the ContactRelatedByCreatedBy relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContactRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactRelatedByCreatedBy', 'ContactQuery');
    }

    /**
     * Filter the query by a related Contact object
     *
     * @param   Contact|PropelObjectCollection $contact  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByContactRelatedByUpdatedBy($contact, $comparison = null)
    {
        if ($contact instanceof Contact) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $contact->getUpdatedBy(), $comparison);
        } elseif ($contact instanceof PropelObjectCollection) {
            return $this
                ->useContactRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($contact->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContactRelatedByUpdatedBy() only accepts arguments of type Contact or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ContactRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinContactRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ContactRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'ContactRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the ContactRelatedByUpdatedBy relation Contact object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ContactQuery A secondary query class using the current class as primary query
     */
    public function useContactRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContactRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ContactRelatedByUpdatedBy', 'ContactQuery');
    }

    /**
     * Filter the query by a related MaillingList object
     *
     * @param   MaillingList|PropelObjectCollection $maillingList  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMaillingListRelatedByCreatedBy($maillingList, $comparison = null)
    {
        if ($maillingList instanceof MaillingList) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $maillingList->getCreatedBy(), $comparison);
        } elseif ($maillingList instanceof PropelObjectCollection) {
            return $this
                ->useMaillingListRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($maillingList->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaillingListRelatedByCreatedBy() only accepts arguments of type MaillingList or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MaillingListRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinMaillingListRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MaillingListRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'MaillingListRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the MaillingListRelatedByCreatedBy relation MaillingList object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MaillingListQuery A secondary query class using the current class as primary query
     */
    public function useMaillingListRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMaillingListRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MaillingListRelatedByCreatedBy', 'MaillingListQuery');
    }

    /**
     * Filter the query by a related MaillingList object
     *
     * @param   MaillingList|PropelObjectCollection $maillingList  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMaillingListRelatedByUpdatedBy($maillingList, $comparison = null)
    {
        if ($maillingList instanceof MaillingList) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $maillingList->getUpdatedBy(), $comparison);
        } elseif ($maillingList instanceof PropelObjectCollection) {
            return $this
                ->useMaillingListRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($maillingList->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMaillingListRelatedByUpdatedBy() only accepts arguments of type MaillingList or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MaillingListRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinMaillingListRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MaillingListRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'MaillingListRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the MaillingListRelatedByUpdatedBy relation MaillingList object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MaillingListQuery A secondary query class using the current class as primary query
     */
    public function useMaillingListRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMaillingListRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MaillingListRelatedByUpdatedBy', 'MaillingListQuery');
    }

    /**
     * Filter the query by a related Cart object
     *
     * @param   Cart|PropelObjectCollection $cart  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCartRelatedByUserId($cart, $comparison = null)
    {
        if ($cart instanceof Cart) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $cart->getUserId(), $comparison);
        } elseif ($cart instanceof PropelObjectCollection) {
            return $this
                ->useCartRelatedByUserIdQuery()
                ->filterByPrimaryKeys($cart->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartRelatedByUserId() only accepts arguments of type Cart or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartRelatedByUserId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCartRelatedByUserId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartRelatedByUserId');

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
            $this->addJoinObject($join, 'CartRelatedByUserId');
        }

        return $this;
    }

    /**
     * Use the CartRelatedByUserId relation Cart object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CartQuery A secondary query class using the current class as primary query
     */
    public function useCartRelatedByUserIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCartRelatedByUserId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartRelatedByUserId', 'CartQuery');
    }

    /**
     * Filter the query by a related Cart object
     *
     * @param   Cart|PropelObjectCollection $cart  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCartRelatedByCreatedBy($cart, $comparison = null)
    {
        if ($cart instanceof Cart) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $cart->getCreatedBy(), $comparison);
        } elseif ($cart instanceof PropelObjectCollection) {
            return $this
                ->useCartRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($cart->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartRelatedByCreatedBy() only accepts arguments of type Cart or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCartRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'CartRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the CartRelatedByCreatedBy relation Cart object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CartQuery A secondary query class using the current class as primary query
     */
    public function useCartRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCartRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartRelatedByCreatedBy', 'CartQuery');
    }

    /**
     * Filter the query by a related Cart object
     *
     * @param   Cart|PropelObjectCollection $cart  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCartRelatedByUpdatedBy($cart, $comparison = null)
    {
        if ($cart instanceof Cart) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $cart->getUpdatedBy(), $comparison);
        } elseif ($cart instanceof PropelObjectCollection) {
            return $this
                ->useCartRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($cart->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartRelatedByUpdatedBy() only accepts arguments of type Cart or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCartRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'CartRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the CartRelatedByUpdatedBy relation Cart object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CartQuery A secondary query class using the current class as primary query
     */
    public function useCartRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCartRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartRelatedByUpdatedBy', 'CartQuery');
    }

    /**
     * Filter the query by a related CartItem object
     *
     * @param   CartItem|PropelObjectCollection $cartItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCartItemRelatedByCreatedBy($cartItem, $comparison = null)
    {
        if ($cartItem instanceof CartItem) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $cartItem->getCreatedBy(), $comparison);
        } elseif ($cartItem instanceof PropelObjectCollection) {
            return $this
                ->useCartItemRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($cartItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartItemRelatedByCreatedBy() only accepts arguments of type CartItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartItemRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCartItemRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartItemRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'CartItemRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the CartItemRelatedByCreatedBy relation CartItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CartItemQuery A secondary query class using the current class as primary query
     */
    public function useCartItemRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCartItemRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartItemRelatedByCreatedBy', 'CartItemQuery');
    }

    /**
     * Filter the query by a related CartItem object
     *
     * @param   CartItem|PropelObjectCollection $cartItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByCartItemRelatedByUpdatedBy($cartItem, $comparison = null)
    {
        if ($cartItem instanceof CartItem) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $cartItem->getUpdatedBy(), $comparison);
        } elseif ($cartItem instanceof PropelObjectCollection) {
            return $this
                ->useCartItemRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($cartItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCartItemRelatedByUpdatedBy() only accepts arguments of type CartItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartItemRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinCartItemRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartItemRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'CartItemRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the CartItemRelatedByUpdatedBy relation CartItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CartItemQuery A secondary query class using the current class as primary query
     */
    public function useCartItemRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCartItemRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartItemRelatedByUpdatedBy', 'CartItemQuery');
    }

    /**
     * Filter the query by a related sfGuardUserPermission object
     *
     * @param   sfGuardUserPermission|PropelObjectCollection $sfGuardUserPermission  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserPermission($sfGuardUserPermission, $comparison = null)
    {
        if ($sfGuardUserPermission instanceof sfGuardUserPermission) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUserPermission->getUserId(), $comparison);
        } elseif ($sfGuardUserPermission instanceof PropelObjectCollection) {
            return $this
                ->usesfGuardUserPermissionQuery()
                ->filterByPrimaryKeys($sfGuardUserPermission->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfGuardUserPermission() only accepts arguments of type sfGuardUserPermission or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserPermission relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinsfGuardUserPermission($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserPermission');

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
            $this->addJoinObject($join, 'sfGuardUserPermission');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserPermission relation sfGuardUserPermission object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserPermissionQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserPermissionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfGuardUserPermission($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserPermission', 'sfGuardUserPermissionQuery');
    }

    /**
     * Filter the query by a related sfGuardUserGroup object
     *
     * @param   sfGuardUserGroup|PropelObjectCollection $sfGuardUserGroup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUserGroup($sfGuardUserGroup, $comparison = null)
    {
        if ($sfGuardUserGroup instanceof sfGuardUserGroup) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUserGroup->getUserId(), $comparison);
        } elseif ($sfGuardUserGroup instanceof PropelObjectCollection) {
            return $this
                ->usesfGuardUserGroupQuery()
                ->filterByPrimaryKeys($sfGuardUserGroup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfGuardUserGroup() only accepts arguments of type sfGuardUserGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUserGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinsfGuardUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUserGroup');

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
            $this->addJoinObject($join, 'sfGuardUserGroup');
        }

        return $this;
    }

    /**
     * Use the sfGuardUserGroup relation sfGuardUserGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserGroupQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfGuardUserGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUserGroup', 'sfGuardUserGroupQuery');
    }

    /**
     * Filter the query by a related sfGuardRememberKey object
     *
     * @param   sfGuardRememberKey|PropelObjectCollection $sfGuardRememberKey  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardRememberKey($sfGuardRememberKey, $comparison = null)
    {
        if ($sfGuardRememberKey instanceof sfGuardRememberKey) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfGuardRememberKey->getUserId(), $comparison);
        } elseif ($sfGuardRememberKey instanceof PropelObjectCollection) {
            return $this
                ->usesfGuardRememberKeyQuery()
                ->filterByPrimaryKeys($sfGuardRememberKey->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfGuardRememberKey() only accepts arguments of type sfGuardRememberKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardRememberKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinsfGuardRememberKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardRememberKey');

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
            $this->addJoinObject($join, 'sfGuardRememberKey');
        }

        return $this;
    }

    /**
     * Use the sfGuardRememberKey relation sfGuardRememberKey object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardRememberKeyQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardRememberKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfGuardRememberKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardRememberKey', 'sfGuardRememberKeyQuery');
    }

    /**
     * Filter the query by a related Analytic object
     *
     * @param   Analytic|PropelObjectCollection $analytic  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAnalytic($analytic, $comparison = null)
    {
        if ($analytic instanceof Analytic) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $analytic->getUserId(), $comparison);
        } elseif ($analytic instanceof PropelObjectCollection) {
            return $this
                ->useAnalyticQuery()
                ->filterByPrimaryKeys($analytic->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalytic() only accepts arguments of type Analytic or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Analytic relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinAnalytic($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Analytic');

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
            $this->addJoinObject($join, 'Analytic');
        }

        return $this;
    }

    /**
     * Use the Analytic relation Analytic object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AnalyticQuery A secondary query class using the current class as primary query
     */
    public function useAnalyticQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAnalytic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Analytic', 'AnalyticQuery');
    }

    /**
     * Filter the query by a related History object
     *
     * @param   History|PropelObjectCollection $history  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByHistoryRelatedByCreatedBy($history, $comparison = null)
    {
        if ($history instanceof History) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $history->getCreatedBy(), $comparison);
        } elseif ($history instanceof PropelObjectCollection) {
            return $this
                ->useHistoryRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($history->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHistoryRelatedByCreatedBy() only accepts arguments of type History or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HistoryRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinHistoryRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HistoryRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'HistoryRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the HistoryRelatedByCreatedBy relation History object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   HistoryQuery A secondary query class using the current class as primary query
     */
    public function useHistoryRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHistoryRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HistoryRelatedByCreatedBy', 'HistoryQuery');
    }

    /**
     * Filter the query by a related History object
     *
     * @param   History|PropelObjectCollection $history  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByHistoryRelatedByUpdatedBy($history, $comparison = null)
    {
        if ($history instanceof History) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $history->getUpdatedBy(), $comparison);
        } elseif ($history instanceof PropelObjectCollection) {
            return $this
                ->useHistoryRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($history->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHistoryRelatedByUpdatedBy() only accepts arguments of type History or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the HistoryRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinHistoryRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('HistoryRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'HistoryRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the HistoryRelatedByUpdatedBy relation History object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   HistoryQuery A secondary query class using the current class as primary query
     */
    public function useHistoryRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinHistoryRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'HistoryRelatedByUpdatedBy', 'HistoryQuery');
    }

    /**
     * Filter the query by a related sfcSetting object
     *
     * @param   sfcSetting|PropelObjectCollection $sfcSetting  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfcSettingRelatedByCreatedBy($sfcSetting, $comparison = null)
    {
        if ($sfcSetting instanceof sfcSetting) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfcSetting->getCreatedBy(), $comparison);
        } elseif ($sfcSetting instanceof PropelObjectCollection) {
            return $this
                ->usesfcSettingRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($sfcSetting->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfcSettingRelatedByCreatedBy() only accepts arguments of type sfcSetting or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfcSettingRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinsfcSettingRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfcSettingRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'sfcSettingRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the sfcSettingRelatedByCreatedBy relation sfcSetting object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfcSettingQuery A secondary query class using the current class as primary query
     */
    public function usesfcSettingRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfcSettingRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfcSettingRelatedByCreatedBy', 'sfcSettingQuery');
    }

    /**
     * Filter the query by a related sfcSetting object
     *
     * @param   sfcSetting|PropelObjectCollection $sfcSetting  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfcSettingRelatedByUpdatedBy($sfcSetting, $comparison = null)
    {
        if ($sfcSetting instanceof sfcSetting) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfcSetting->getUpdatedBy(), $comparison);
        } elseif ($sfcSetting instanceof PropelObjectCollection) {
            return $this
                ->usesfcSettingRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($sfcSetting->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfcSettingRelatedByUpdatedBy() only accepts arguments of type sfcSetting or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfcSettingRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinsfcSettingRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfcSettingRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'sfcSettingRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the sfcSettingRelatedByUpdatedBy relation sfcSetting object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfcSettingQuery A secondary query class using the current class as primary query
     */
    public function usesfcSettingRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinsfcSettingRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfcSettingRelatedByUpdatedBy', 'sfcSettingQuery');
    }

    /**
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlertRelatedByUpdatedBy($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $alert->getUpdatedBy(), $comparison);
        } elseif ($alert instanceof PropelObjectCollection) {
            return $this
                ->useAlertRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($alert->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlertRelatedByUpdatedBy() only accepts arguments of type Alert or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlertRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinAlertRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlertRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'AlertRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the AlertRelatedByUpdatedBy relation Alert object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlertQuery A secondary query class using the current class as primary query
     */
    public function useAlertRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlertRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlertRelatedByUpdatedBy', 'AlertQuery');
    }

    /**
     * Filter the query by a related Alert object
     *
     * @param   Alert|PropelObjectCollection $alert  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAlertRelatedByCreatedBy($alert, $comparison = null)
    {
        if ($alert instanceof Alert) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $alert->getCreatedBy(), $comparison);
        } elseif ($alert instanceof PropelObjectCollection) {
            return $this
                ->useAlertRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($alert->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlertRelatedByCreatedBy() only accepts arguments of type Alert or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlertRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinAlertRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlertRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'AlertRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the AlertRelatedByCreatedBy relation Alert object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AlertQuery A secondary query class using the current class as primary query
     */
    public function useAlertRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlertRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlertRelatedByCreatedBy', 'AlertQuery');
    }

    /**
     * Filter the query by a related SfcComment object
     *
     * @param   SfcComment|PropelObjectCollection $sfcComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySfcCommentRelatedByCreatedBy($sfcComment, $comparison = null)
    {
        if ($sfcComment instanceof SfcComment) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfcComment->getCreatedBy(), $comparison);
        } elseif ($sfcComment instanceof PropelObjectCollection) {
            return $this
                ->useSfcCommentRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($sfcComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySfcCommentRelatedByCreatedBy() only accepts arguments of type SfcComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SfcCommentRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinSfcCommentRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SfcCommentRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'SfcCommentRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the SfcCommentRelatedByCreatedBy relation SfcComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SfcCommentQuery A secondary query class using the current class as primary query
     */
    public function useSfcCommentRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSfcCommentRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SfcCommentRelatedByCreatedBy', 'SfcCommentQuery');
    }

    /**
     * Filter the query by a related SfcComment object
     *
     * @param   SfcComment|PropelObjectCollection $sfcComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfGuardUserQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySfcCommentRelatedByUpdatedBy($sfcComment, $comparison = null)
    {
        if ($sfcComment instanceof SfcComment) {
            return $this
                ->addUsingAlias(sfGuardUserPeer::ID, $sfcComment->getUpdatedBy(), $comparison);
        } elseif ($sfcComment instanceof PropelObjectCollection) {
            return $this
                ->useSfcCommentRelatedByUpdatedByQuery()
                ->filterByPrimaryKeys($sfcComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySfcCommentRelatedByUpdatedBy() only accepts arguments of type SfcComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SfcCommentRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function joinSfcCommentRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SfcCommentRelatedByUpdatedBy');

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
            $this->addJoinObject($join, 'SfcCommentRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the SfcCommentRelatedByUpdatedBy relation SfcComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SfcCommentQuery A secondary query class using the current class as primary query
     */
    public function useSfcCommentRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSfcCommentRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SfcCommentRelatedByUpdatedBy', 'SfcCommentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   sfGuardUser $sfGuardUser Object to remove from the list of results
     *
     * @return sfGuardUserQuery The current query, for fluid interface
     */
    public function prune($sfGuardUser = null)
    {
        if ($sfGuardUser) {
            $this->addUsingAlias(sfGuardUserPeer::ID, $sfGuardUser->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BasesfGuardUserQuery
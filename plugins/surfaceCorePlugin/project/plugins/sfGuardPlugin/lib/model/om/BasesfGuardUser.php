<?php


/**
 * Base class that represents a row from the 'sf_guard_user' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardUser extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'sfGuardUserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        sfGuardUserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the username field.
     * @var        string
     */
    protected $username;

    /**
     * The value for the algorithm field.
     * Note: this column has a database default value of: 'sha1'
     * @var        string
     */
    protected $algorithm;

    /**
     * The value for the salt field.
     * @var        string
     */
    protected $salt;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the last_login field.
     * @var        string
     */
    protected $last_login;

    /**
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the is_super_admin field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_super_admin;

    /**
     * The value for the is_sudoer field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_sudoer;

    /**
     * The value for the time_sudoer field.
     * Note: this column has a database default value of: 60
     * @var        int
     */
    protected $time_sudoer;

    /**
     * @var        PropelObjectCollection|Collaborator[] Collection to store aggregation of Collaborator objects.
     */
    protected $collCollaboratorsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Collaborator[] Collection to store aggregation of Collaborator objects.
     */
    protected $collCollaboratorsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|sfGuardUserProfile[] Collection to store aggregation of sfGuardUserProfile objects.
     */
    protected $collsfGuardUserProfiles;

    /**
     * @var        PropelObjectCollection|DashboardMessage[] Collection to store aggregation of DashboardMessage objects.
     */
    protected $collDashboardMessagesRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|DashboardMessage[] Collection to store aggregation of DashboardMessage objects.
     */
    protected $collDashboardMessagesRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Station[] Collection to store aggregation of Station objects.
     */
    protected $collStationsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Station[] Collection to store aggregation of Station objects.
     */
    protected $collStationsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|TransportType[] Collection to store aggregation of TransportType objects.
     */
    protected $collTransportTypesRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|TransportType[] Collection to store aggregation of TransportType objects.
     */
    protected $collTransportTypesRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Subscription[] Collection to store aggregation of Subscription objects.
     */
    protected $collSubscriptionsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Subscription[] Collection to store aggregation of Subscription objects.
     */
    protected $collSubscriptionsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Client[] Collection to store aggregation of Client objects.
     */
    protected $collClientsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Client[] Collection to store aggregation of Client objects.
     */
    protected $collClientsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|ClientSubscription[] Collection to store aggregation of ClientSubscription objects.
     */
    protected $collClientSubscriptionsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|ClientSubscription[] Collection to store aggregation of ClientSubscription objects.
     */
    protected $collClientSubscriptionsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Travel[] Collection to store aggregation of Travel objects.
     */
    protected $collTravelsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Travel[] Collection to store aggregation of Travel objects.
     */
    protected $collTravelsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Contact[] Collection to store aggregation of Contact objects.
     */
    protected $collContactsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Contact[] Collection to store aggregation of Contact objects.
     */
    protected $collContactsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|MaillingList[] Collection to store aggregation of MaillingList objects.
     */
    protected $collMaillingListsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|MaillingList[] Collection to store aggregation of MaillingList objects.
     */
    protected $collMaillingListsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Cart[] Collection to store aggregation of Cart objects.
     */
    protected $collCartsRelatedByUserId;

    /**
     * @var        PropelObjectCollection|Cart[] Collection to store aggregation of Cart objects.
     */
    protected $collCartsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|Cart[] Collection to store aggregation of Cart objects.
     */
    protected $collCartsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|CartItem[] Collection to store aggregation of CartItem objects.
     */
    protected $collCartItemsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|CartItem[] Collection to store aggregation of CartItem objects.
     */
    protected $collCartItemsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|sfGuardUserPermission[] Collection to store aggregation of sfGuardUserPermission objects.
     */
    protected $collsfGuardUserPermissions;

    /**
     * @var        PropelObjectCollection|sfGuardUserGroup[] Collection to store aggregation of sfGuardUserGroup objects.
     */
    protected $collsfGuardUserGroups;

    /**
     * @var        PropelObjectCollection|sfGuardRememberKey[] Collection to store aggregation of sfGuardRememberKey objects.
     */
    protected $collsfGuardRememberKeys;

    /**
     * @var        PropelObjectCollection|Analytic[] Collection to store aggregation of Analytic objects.
     */
    protected $collAnalytics;

    /**
     * @var        PropelObjectCollection|History[] Collection to store aggregation of History objects.
     */
    protected $collHistorysRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|History[] Collection to store aggregation of History objects.
     */
    protected $collHistorysRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|sfcSetting[] Collection to store aggregation of sfcSetting objects.
     */
    protected $collsfcSettingsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|sfcSetting[] Collection to store aggregation of sfcSetting objects.
     */
    protected $collsfcSettingsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlertsRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlertsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|SfcComment[] Collection to store aggregation of SfcComment objects.
     */
    protected $collSfcCommentsRelatedByCreatedBy;

    /**
     * @var        PropelObjectCollection|SfcComment[] Collection to store aggregation of SfcComment objects.
     */
    protected $collSfcCommentsRelatedByUpdatedBy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $collaboratorsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $collaboratorsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardUserProfilesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $dashboardMessagesRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $dashboardMessagesRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stationsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $stationsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $transportTypesRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $transportTypesRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $subscriptionsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $subscriptionsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientSubscriptionsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientSubscriptionsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $travelsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $travelsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contactsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contactsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $maillingListsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $maillingListsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cartsRelatedByUserIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cartsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cartsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cartItemsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cartItemsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardUserPermissionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardUserGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardRememberKeysScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $analyticsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $historysRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $historysRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfcSettingsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfcSettingsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alertsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alertsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfcCommentsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfcCommentsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->algorithm = 'sha1';
        $this->is_active = true;
        $this->is_super_admin = false;
        $this->is_sudoer = false;
        $this->time_sudoer = 60;
    }

    /**
     * Initializes internal state of BasesfGuardUser object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     * 
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [username] column value.
     * 
     * @return   string
     */
    public function getUsername()
    {

        return $this->username;
    }

    /**
     * Get the [algorithm] column value.
     * 
     * @return   string
     */
    public function getAlgorithm()
    {

        return $this->algorithm;
    }

    /**
     * Get the [salt] column value.
     * 
     * @return   string
     */
    public function getSalt()
    {

        return $this->salt;
    }

    /**
     * Get the [password] column value.
     * 
     * @return   string
     */
    public function getPassword()
    {

        return $this->password;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }


        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->created_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [optionally formatted] temporal [last_login] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastLogin($format = 'Y-m-d H:i:s')
    {
        if ($this->last_login === null) {
            return null;
        }


        if ($this->last_login === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->last_login);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_login, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [is_active] column value.
     * 
     * @return   boolean
     */
    public function getIsActive()
    {

        return $this->is_active;
    }

    /**
     * Get the [is_super_admin] column value.
     * 
     * @return   boolean
     */
    public function getIsSuperAdmin()
    {

        return $this->is_super_admin;
    }

    /**
     * Get the [is_sudoer] column value.
     * 
     * @return   boolean
     */
    public function getIsSudoer()
    {

        return $this->is_sudoer;
    }

    /**
     * Get the [time_sudoer] column value.
     * 
     * @return   int
     */
    public function getTimeSudoer()
    {

        return $this->time_sudoer;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [username] column.
     * 
     * @param      string $v new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [algorithm] column.
     * 
     * @param      string $v new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setAlgorithm($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->algorithm !== $v) {
            $this->algorithm = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::ALGORITHM;
        }


        return $this;
    } // setAlgorithm()

    /**
     * Set the value of [salt] column.
     * 
     * @param      string $v new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setSalt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salt !== $v) {
            $this->salt = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::SALT;
        }


        return $this;
    } // setSalt()

    /**
     * Set the value of [password] column.
     * 
     * @param      string $v new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = sfGuardUserPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [last_login] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setLastLogin($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_login !== null || $dt !== null) {
            $currentDateAsString = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_login = $newDateAsString;
                $this->modifiedColumns[] = sfGuardUserPeer::LAST_LOGIN;
            }
        } // if either are not null


        return $this;
    } // setLastLogin()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setIsActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_active !== $v) {
            $this->is_active = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Sets the value of the [is_super_admin] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setIsSuperAdmin($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_super_admin !== $v) {
            $this->is_super_admin = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::IS_SUPER_ADMIN;
        }


        return $this;
    } // setIsSuperAdmin()

    /**
     * Sets the value of the [is_sudoer] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setIsSudoer($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_sudoer !== $v) {
            $this->is_sudoer = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::IS_SUDOER;
        }


        return $this;
    } // setIsSudoer()

    /**
     * Set the value of [time_sudoer] column.
     * 
     * @param      int $v new value
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function setTimeSudoer($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time_sudoer !== $v) {
            $this->time_sudoer = $v;
            $this->modifiedColumns[] = sfGuardUserPeer::TIME_SUDOER;
        }


        return $this;
    } // setTimeSudoer()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->algorithm !== 'sha1') {
                return false;
            }

            if ($this->is_active !== true) {
                return false;
            }

            if ($this->is_super_admin !== false) {
                return false;
            }

            if ($this->is_sudoer !== false) {
                return false;
            }

            if ($this->time_sudoer !== 60) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->algorithm = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->salt = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->created_at = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_login = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->is_active = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
            $this->is_super_admin = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
            $this->is_sudoer = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->time_sudoer = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = sfGuardUserPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating sfGuardUser object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = sfGuardUserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCollaboratorsRelatedByCreatedBy = null;

            $this->collCollaboratorsRelatedByUpdatedBy = null;

            $this->collsfGuardUserProfiles = null;

            $this->collDashboardMessagesRelatedByCreatedBy = null;

            $this->collDashboardMessagesRelatedByUpdatedBy = null;

            $this->collStationsRelatedByCreatedBy = null;

            $this->collStationsRelatedByUpdatedBy = null;

            $this->collTransportTypesRelatedByCreatedBy = null;

            $this->collTransportTypesRelatedByUpdatedBy = null;

            $this->collSubscriptionsRelatedByCreatedBy = null;

            $this->collSubscriptionsRelatedByUpdatedBy = null;

            $this->collClientsRelatedByCreatedBy = null;

            $this->collClientsRelatedByUpdatedBy = null;

            $this->collClientSubscriptionsRelatedByCreatedBy = null;

            $this->collClientSubscriptionsRelatedByUpdatedBy = null;

            $this->collTravelsRelatedByCreatedBy = null;

            $this->collTravelsRelatedByUpdatedBy = null;

            $this->collContactsRelatedByCreatedBy = null;

            $this->collContactsRelatedByUpdatedBy = null;

            $this->collMaillingListsRelatedByCreatedBy = null;

            $this->collMaillingListsRelatedByUpdatedBy = null;

            $this->collCartsRelatedByUserId = null;

            $this->collCartsRelatedByCreatedBy = null;

            $this->collCartsRelatedByUpdatedBy = null;

            $this->collCartItemsRelatedByCreatedBy = null;

            $this->collCartItemsRelatedByUpdatedBy = null;

            $this->collsfGuardUserPermissions = null;

            $this->collsfGuardUserGroups = null;

            $this->collsfGuardRememberKeys = null;

            $this->collAnalytics = null;

            $this->collHistorysRelatedByCreatedBy = null;

            $this->collHistorysRelatedByUpdatedBy = null;

            $this->collsfcSettingsRelatedByCreatedBy = null;

            $this->collsfcSettingsRelatedByUpdatedBy = null;

            $this->collAlertsRelatedByUpdatedBy = null;

            $this->collAlertsRelatedByCreatedBy = null;

            $this->collSfcCommentsRelatedByCreatedBy = null;

            $this->collSfcCommentsRelatedByUpdatedBy = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = sfGuardUserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
    if ($this->isNew()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(sfGuardUserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    }


    foreach (sfMixer::getCallables('BasesfGuardUser:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfGuardUserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                sfGuardUserPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BasesfGuardUser:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }


            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->collaboratorsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->collaboratorsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->collaboratorsRelatedByCreatedByScheduledForDeletion as $collaboratorRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $collaboratorRelatedByCreatedBy->save($con);
                    }
                    $this->collaboratorsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCollaboratorsRelatedByCreatedBy !== null) {
                foreach ($this->collCollaboratorsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->collaboratorsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->collaboratorsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->collaboratorsRelatedByUpdatedByScheduledForDeletion as $collaboratorRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $collaboratorRelatedByUpdatedBy->save($con);
                    }
                    $this->collaboratorsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCollaboratorsRelatedByUpdatedBy !== null) {
                foreach ($this->collCollaboratorsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfGuardUserProfilesScheduledForDeletion !== null) {
                if (!$this->sfGuardUserProfilesScheduledForDeletion->isEmpty()) {
                    sfGuardUserProfileQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardUserProfilesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardUserProfilesScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardUserProfiles !== null) {
                foreach ($this->collsfGuardUserProfiles as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->dashboardMessagesRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->dashboardMessagesRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->dashboardMessagesRelatedByCreatedByScheduledForDeletion as $dashboardMessageRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $dashboardMessageRelatedByCreatedBy->save($con);
                    }
                    $this->dashboardMessagesRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collDashboardMessagesRelatedByCreatedBy !== null) {
                foreach ($this->collDashboardMessagesRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion as $dashboardMessageRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $dashboardMessageRelatedByUpdatedBy->save($con);
                    }
                    $this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collDashboardMessagesRelatedByUpdatedBy !== null) {
                foreach ($this->collDashboardMessagesRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stationsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->stationsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->stationsRelatedByCreatedByScheduledForDeletion as $stationRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $stationRelatedByCreatedBy->save($con);
                    }
                    $this->stationsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collStationsRelatedByCreatedBy !== null) {
                foreach ($this->collStationsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->stationsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->stationsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->stationsRelatedByUpdatedByScheduledForDeletion as $stationRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $stationRelatedByUpdatedBy->save($con);
                    }
                    $this->stationsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collStationsRelatedByUpdatedBy !== null) {
                foreach ($this->collStationsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->transportTypesRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->transportTypesRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->transportTypesRelatedByCreatedByScheduledForDeletion as $transportTypeRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $transportTypeRelatedByCreatedBy->save($con);
                    }
                    $this->transportTypesRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collTransportTypesRelatedByCreatedBy !== null) {
                foreach ($this->collTransportTypesRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->transportTypesRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->transportTypesRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->transportTypesRelatedByUpdatedByScheduledForDeletion as $transportTypeRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $transportTypeRelatedByUpdatedBy->save($con);
                    }
                    $this->transportTypesRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collTransportTypesRelatedByUpdatedBy !== null) {
                foreach ($this->collTransportTypesRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->subscriptionsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->subscriptionsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->subscriptionsRelatedByCreatedByScheduledForDeletion as $subscriptionRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $subscriptionRelatedByCreatedBy->save($con);
                    }
                    $this->subscriptionsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collSubscriptionsRelatedByCreatedBy !== null) {
                foreach ($this->collSubscriptionsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->subscriptionsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->subscriptionsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->subscriptionsRelatedByUpdatedByScheduledForDeletion as $subscriptionRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $subscriptionRelatedByUpdatedBy->save($con);
                    }
                    $this->subscriptionsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collSubscriptionsRelatedByUpdatedBy !== null) {
                foreach ($this->collSubscriptionsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->clientsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->clientsRelatedByCreatedByScheduledForDeletion as $clientRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $clientRelatedByCreatedBy->save($con);
                    }
                    $this->clientsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collClientsRelatedByCreatedBy !== null) {
                foreach ($this->collClientsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->clientsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->clientsRelatedByUpdatedByScheduledForDeletion as $clientRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $clientRelatedByUpdatedBy->save($con);
                    }
                    $this->clientsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collClientsRelatedByUpdatedBy !== null) {
                foreach ($this->collClientsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion as $clientSubscriptionRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $clientSubscriptionRelatedByCreatedBy->save($con);
                    }
                    $this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collClientSubscriptionsRelatedByCreatedBy !== null) {
                foreach ($this->collClientSubscriptionsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion as $clientSubscriptionRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $clientSubscriptionRelatedByUpdatedBy->save($con);
                    }
                    $this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collClientSubscriptionsRelatedByUpdatedBy !== null) {
                foreach ($this->collClientSubscriptionsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->travelsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->travelsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->travelsRelatedByCreatedByScheduledForDeletion as $travelRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $travelRelatedByCreatedBy->save($con);
                    }
                    $this->travelsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collTravelsRelatedByCreatedBy !== null) {
                foreach ($this->collTravelsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->travelsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->travelsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->travelsRelatedByUpdatedByScheduledForDeletion as $travelRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $travelRelatedByUpdatedBy->save($con);
                    }
                    $this->travelsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collTravelsRelatedByUpdatedBy !== null) {
                foreach ($this->collTravelsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->contactsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->contactsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->contactsRelatedByCreatedByScheduledForDeletion as $contactRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $contactRelatedByCreatedBy->save($con);
                    }
                    $this->contactsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collContactsRelatedByCreatedBy !== null) {
                foreach ($this->collContactsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->contactsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->contactsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->contactsRelatedByUpdatedByScheduledForDeletion as $contactRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $contactRelatedByUpdatedBy->save($con);
                    }
                    $this->contactsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collContactsRelatedByUpdatedBy !== null) {
                foreach ($this->collContactsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->maillingListsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->maillingListsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->maillingListsRelatedByCreatedByScheduledForDeletion as $maillingListRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $maillingListRelatedByCreatedBy->save($con);
                    }
                    $this->maillingListsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collMaillingListsRelatedByCreatedBy !== null) {
                foreach ($this->collMaillingListsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->maillingListsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->maillingListsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->maillingListsRelatedByUpdatedByScheduledForDeletion as $maillingListRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $maillingListRelatedByUpdatedBy->save($con);
                    }
                    $this->maillingListsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collMaillingListsRelatedByUpdatedBy !== null) {
                foreach ($this->collMaillingListsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cartsRelatedByUserIdScheduledForDeletion !== null) {
                if (!$this->cartsRelatedByUserIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->cartsRelatedByUserIdScheduledForDeletion as $cartRelatedByUserId) {
                        // need to save related object because we set the relation to null
                        $cartRelatedByUserId->save($con);
                    }
                    $this->cartsRelatedByUserIdScheduledForDeletion = null;
                }
            }

            if ($this->collCartsRelatedByUserId !== null) {
                foreach ($this->collCartsRelatedByUserId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cartsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->cartsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->cartsRelatedByCreatedByScheduledForDeletion as $cartRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $cartRelatedByCreatedBy->save($con);
                    }
                    $this->cartsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCartsRelatedByCreatedBy !== null) {
                foreach ($this->collCartsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cartsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->cartsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->cartsRelatedByUpdatedByScheduledForDeletion as $cartRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $cartRelatedByUpdatedBy->save($con);
                    }
                    $this->cartsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCartsRelatedByUpdatedBy !== null) {
                foreach ($this->collCartsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cartItemsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->cartItemsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->cartItemsRelatedByCreatedByScheduledForDeletion as $cartItemRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $cartItemRelatedByCreatedBy->save($con);
                    }
                    $this->cartItemsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCartItemsRelatedByCreatedBy !== null) {
                foreach ($this->collCartItemsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cartItemsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->cartItemsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->cartItemsRelatedByUpdatedByScheduledForDeletion as $cartItemRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $cartItemRelatedByUpdatedBy->save($con);
                    }
                    $this->cartItemsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCartItemsRelatedByUpdatedBy !== null) {
                foreach ($this->collCartItemsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfGuardUserPermissionsScheduledForDeletion !== null) {
                if (!$this->sfGuardUserPermissionsScheduledForDeletion->isEmpty()) {
                    sfGuardUserPermissionQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardUserPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardUserPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardUserPermissions !== null) {
                foreach ($this->collsfGuardUserPermissions as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfGuardUserGroupsScheduledForDeletion !== null) {
                if (!$this->sfGuardUserGroupsScheduledForDeletion->isEmpty()) {
                    sfGuardUserGroupQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardUserGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardUserGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardUserGroups !== null) {
                foreach ($this->collsfGuardUserGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfGuardRememberKeysScheduledForDeletion !== null) {
                if (!$this->sfGuardRememberKeysScheduledForDeletion->isEmpty()) {
                    sfGuardRememberKeyQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardRememberKeysScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardRememberKeysScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardRememberKeys !== null) {
                foreach ($this->collsfGuardRememberKeys as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyticsScheduledForDeletion !== null) {
                if (!$this->analyticsScheduledForDeletion->isEmpty()) {
                    foreach ($this->analyticsScheduledForDeletion as $analytic) {
                        // need to save related object because we set the relation to null
                        $analytic->save($con);
                    }
                    $this->analyticsScheduledForDeletion = null;
                }
            }

            if ($this->collAnalytics !== null) {
                foreach ($this->collAnalytics as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->historysRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->historysRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->historysRelatedByCreatedByScheduledForDeletion as $historyRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $historyRelatedByCreatedBy->save($con);
                    }
                    $this->historysRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collHistorysRelatedByCreatedBy !== null) {
                foreach ($this->collHistorysRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->historysRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->historysRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->historysRelatedByUpdatedByScheduledForDeletion as $historyRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $historyRelatedByUpdatedBy->save($con);
                    }
                    $this->historysRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collHistorysRelatedByUpdatedBy !== null) {
                foreach ($this->collHistorysRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfcSettingsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->sfcSettingsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->sfcSettingsRelatedByCreatedByScheduledForDeletion as $sfcSettingRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $sfcSettingRelatedByCreatedBy->save($con);
                    }
                    $this->sfcSettingsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collsfcSettingsRelatedByCreatedBy !== null) {
                foreach ($this->collsfcSettingsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfcSettingsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->sfcSettingsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->sfcSettingsRelatedByUpdatedByScheduledForDeletion as $sfcSettingRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $sfcSettingRelatedByUpdatedBy->save($con);
                    }
                    $this->sfcSettingsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collsfcSettingsRelatedByUpdatedBy !== null) {
                foreach ($this->collsfcSettingsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->alertsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->alertsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->alertsRelatedByUpdatedByScheduledForDeletion as $alertRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $alertRelatedByUpdatedBy->save($con);
                    }
                    $this->alertsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collAlertsRelatedByUpdatedBy !== null) {
                foreach ($this->collAlertsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->alertsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->alertsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->alertsRelatedByCreatedByScheduledForDeletion as $alertRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $alertRelatedByCreatedBy->save($con);
                    }
                    $this->alertsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collAlertsRelatedByCreatedBy !== null) {
                foreach ($this->collAlertsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfcCommentsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->sfcCommentsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->sfcCommentsRelatedByCreatedByScheduledForDeletion as $sfcCommentRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $sfcCommentRelatedByCreatedBy->save($con);
                    }
                    $this->sfcCommentsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collSfcCommentsRelatedByCreatedBy !== null) {
                foreach ($this->collSfcCommentsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfcCommentsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->sfcCommentsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->sfcCommentsRelatedByUpdatedByScheduledForDeletion as $sfcCommentRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $sfcCommentRelatedByUpdatedBy->save($con);
                    }
                    $this->sfcCommentsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collSfcCommentsRelatedByUpdatedBy !== null) {
                foreach ($this->collSfcCommentsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = sfGuardUserPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . sfGuardUserPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(sfGuardUserPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`USERNAME`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::ALGORITHM)) {
            $modifiedColumns[':p' . $index++]  = '`ALGORITHM`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::SALT)) {
            $modifiedColumns[':p' . $index++]  = '`SALT`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`PASSWORD`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_AT`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::LAST_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = '`LAST_LOGIN`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = '`IS_ACTIVE`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::IS_SUPER_ADMIN)) {
            $modifiedColumns[':p' . $index++]  = '`IS_SUPER_ADMIN`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::IS_SUDOER)) {
            $modifiedColumns[':p' . $index++]  = '`IS_SUDOER`';
        }
        if ($this->isColumnModified(sfGuardUserPeer::TIME_SUDOER)) {
            $modifiedColumns[':p' . $index++]  = '`TIME_SUDOER`';
        }

        $sql = sprintf(
            'INSERT INTO `sf_guard_user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`USERNAME`':
						$stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`ALGORITHM`':
						$stmt->bindValue($identifier, $this->algorithm, PDO::PARAM_STR);
                        break;
                    case '`SALT`':
						$stmt->bindValue($identifier, $this->salt, PDO::PARAM_STR);
                        break;
                    case '`PASSWORD`':
						$stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`CREATED_AT`':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`LAST_LOGIN`':
						$stmt->bindValue($identifier, $this->last_login, PDO::PARAM_STR);
                        break;
                    case '`IS_ACTIVE`':
						$stmt->bindValue($identifier, (int) $this->is_active, PDO::PARAM_INT);
                        break;
                    case '`IS_SUPER_ADMIN`':
						$stmt->bindValue($identifier, (int) $this->is_super_admin, PDO::PARAM_INT);
                        break;
                    case '`IS_SUDOER`':
						$stmt->bindValue($identifier, (int) $this->is_sudoer, PDO::PARAM_INT);
                        break;
                    case '`TIME_SUDOER`':
						$stmt->bindValue($identifier, $this->time_sudoer, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
			$pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = sfGuardUserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCollaboratorsRelatedByCreatedBy !== null) {
                    foreach ($this->collCollaboratorsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCollaboratorsRelatedByUpdatedBy !== null) {
                    foreach ($this->collCollaboratorsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfGuardUserProfiles !== null) {
                    foreach ($this->collsfGuardUserProfiles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDashboardMessagesRelatedByCreatedBy !== null) {
                    foreach ($this->collDashboardMessagesRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collDashboardMessagesRelatedByUpdatedBy !== null) {
                    foreach ($this->collDashboardMessagesRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStationsRelatedByCreatedBy !== null) {
                    foreach ($this->collStationsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStationsRelatedByUpdatedBy !== null) {
                    foreach ($this->collStationsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTransportTypesRelatedByCreatedBy !== null) {
                    foreach ($this->collTransportTypesRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTransportTypesRelatedByUpdatedBy !== null) {
                    foreach ($this->collTransportTypesRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSubscriptionsRelatedByCreatedBy !== null) {
                    foreach ($this->collSubscriptionsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSubscriptionsRelatedByUpdatedBy !== null) {
                    foreach ($this->collSubscriptionsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClientsRelatedByCreatedBy !== null) {
                    foreach ($this->collClientsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClientsRelatedByUpdatedBy !== null) {
                    foreach ($this->collClientsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClientSubscriptionsRelatedByCreatedBy !== null) {
                    foreach ($this->collClientSubscriptionsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collClientSubscriptionsRelatedByUpdatedBy !== null) {
                    foreach ($this->collClientSubscriptionsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTravelsRelatedByCreatedBy !== null) {
                    foreach ($this->collTravelsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTravelsRelatedByUpdatedBy !== null) {
                    foreach ($this->collTravelsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContactsRelatedByCreatedBy !== null) {
                    foreach ($this->collContactsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContactsRelatedByUpdatedBy !== null) {
                    foreach ($this->collContactsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMaillingListsRelatedByCreatedBy !== null) {
                    foreach ($this->collMaillingListsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMaillingListsRelatedByUpdatedBy !== null) {
                    foreach ($this->collMaillingListsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCartsRelatedByUserId !== null) {
                    foreach ($this->collCartsRelatedByUserId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCartsRelatedByCreatedBy !== null) {
                    foreach ($this->collCartsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCartsRelatedByUpdatedBy !== null) {
                    foreach ($this->collCartsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCartItemsRelatedByCreatedBy !== null) {
                    foreach ($this->collCartItemsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCartItemsRelatedByUpdatedBy !== null) {
                    foreach ($this->collCartItemsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfGuardUserPermissions !== null) {
                    foreach ($this->collsfGuardUserPermissions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfGuardUserGroups !== null) {
                    foreach ($this->collsfGuardUserGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfGuardRememberKeys !== null) {
                    foreach ($this->collsfGuardRememberKeys as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAnalytics !== null) {
                    foreach ($this->collAnalytics as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collHistorysRelatedByCreatedBy !== null) {
                    foreach ($this->collHistorysRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collHistorysRelatedByUpdatedBy !== null) {
                    foreach ($this->collHistorysRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfcSettingsRelatedByCreatedBy !== null) {
                    foreach ($this->collsfcSettingsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfcSettingsRelatedByUpdatedBy !== null) {
                    foreach ($this->collsfcSettingsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlertsRelatedByUpdatedBy !== null) {
                    foreach ($this->collAlertsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlertsRelatedByCreatedBy !== null) {
                    foreach ($this->collAlertsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSfcCommentsRelatedByCreatedBy !== null) {
                    foreach ($this->collSfcCommentsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSfcCommentsRelatedByUpdatedBy !== null) {
                    foreach ($this->collSfcCommentsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getUsername();
                break;
            case 2:
                return $this->getAlgorithm();
                break;
            case 3:
                return $this->getSalt();
                break;
            case 4:
                return $this->getPassword();
                break;
            case 5:
                return $this->getCreatedAt();
                break;
            case 6:
                return $this->getLastLogin();
                break;
            case 7:
                return $this->getIsActive();
                break;
            case 8:
                return $this->getIsSuperAdmin();
                break;
            case 9:
                return $this->getIsSudoer();
                break;
            case 10:
                return $this->getTimeSudoer();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['sfGuardUser'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['sfGuardUser'][$this->getPrimaryKey()] = true;
        $keys = sfGuardUserPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUsername(),
            $keys[2] => $this->getAlgorithm(),
            $keys[3] => $this->getSalt(),
            $keys[4] => $this->getPassword(),
            $keys[5] => $this->getCreatedAt(),
            $keys[6] => $this->getLastLogin(),
            $keys[7] => $this->getIsActive(),
            $keys[8] => $this->getIsSuperAdmin(),
            $keys[9] => $this->getIsSudoer(),
            $keys[10] => $this->getTimeSudoer(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collCollaboratorsRelatedByCreatedBy) {
                $result['CollaboratorsRelatedByCreatedBy'] = $this->collCollaboratorsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCollaboratorsRelatedByUpdatedBy) {
                $result['CollaboratorsRelatedByUpdatedBy'] = $this->collCollaboratorsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfGuardUserProfiles) {
                $result['sfGuardUserProfiles'] = $this->collsfGuardUserProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDashboardMessagesRelatedByCreatedBy) {
                $result['DashboardMessagesRelatedByCreatedBy'] = $this->collDashboardMessagesRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDashboardMessagesRelatedByUpdatedBy) {
                $result['DashboardMessagesRelatedByUpdatedBy'] = $this->collDashboardMessagesRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStationsRelatedByCreatedBy) {
                $result['StationsRelatedByCreatedBy'] = $this->collStationsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStationsRelatedByUpdatedBy) {
                $result['StationsRelatedByUpdatedBy'] = $this->collStationsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTransportTypesRelatedByCreatedBy) {
                $result['TransportTypesRelatedByCreatedBy'] = $this->collTransportTypesRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTransportTypesRelatedByUpdatedBy) {
                $result['TransportTypesRelatedByUpdatedBy'] = $this->collTransportTypesRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSubscriptionsRelatedByCreatedBy) {
                $result['SubscriptionsRelatedByCreatedBy'] = $this->collSubscriptionsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSubscriptionsRelatedByUpdatedBy) {
                $result['SubscriptionsRelatedByUpdatedBy'] = $this->collSubscriptionsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientsRelatedByCreatedBy) {
                $result['ClientsRelatedByCreatedBy'] = $this->collClientsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientsRelatedByUpdatedBy) {
                $result['ClientsRelatedByUpdatedBy'] = $this->collClientsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientSubscriptionsRelatedByCreatedBy) {
                $result['ClientSubscriptionsRelatedByCreatedBy'] = $this->collClientSubscriptionsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientSubscriptionsRelatedByUpdatedBy) {
                $result['ClientSubscriptionsRelatedByUpdatedBy'] = $this->collClientSubscriptionsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTravelsRelatedByCreatedBy) {
                $result['TravelsRelatedByCreatedBy'] = $this->collTravelsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTravelsRelatedByUpdatedBy) {
                $result['TravelsRelatedByUpdatedBy'] = $this->collTravelsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContactsRelatedByCreatedBy) {
                $result['ContactsRelatedByCreatedBy'] = $this->collContactsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContactsRelatedByUpdatedBy) {
                $result['ContactsRelatedByUpdatedBy'] = $this->collContactsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMaillingListsRelatedByCreatedBy) {
                $result['MaillingListsRelatedByCreatedBy'] = $this->collMaillingListsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMaillingListsRelatedByUpdatedBy) {
                $result['MaillingListsRelatedByUpdatedBy'] = $this->collMaillingListsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCartsRelatedByUserId) {
                $result['CartsRelatedByUserId'] = $this->collCartsRelatedByUserId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCartsRelatedByCreatedBy) {
                $result['CartsRelatedByCreatedBy'] = $this->collCartsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCartsRelatedByUpdatedBy) {
                $result['CartsRelatedByUpdatedBy'] = $this->collCartsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCartItemsRelatedByCreatedBy) {
                $result['CartItemsRelatedByCreatedBy'] = $this->collCartItemsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCartItemsRelatedByUpdatedBy) {
                $result['CartItemsRelatedByUpdatedBy'] = $this->collCartItemsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfGuardUserPermissions) {
                $result['sfGuardUserPermissions'] = $this->collsfGuardUserPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfGuardUserGroups) {
                $result['sfGuardUserGroups'] = $this->collsfGuardUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfGuardRememberKeys) {
                $result['sfGuardRememberKeys'] = $this->collsfGuardRememberKeys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalytics) {
                $result['Analytics'] = $this->collAnalytics->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHistorysRelatedByCreatedBy) {
                $result['HistorysRelatedByCreatedBy'] = $this->collHistorysRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHistorysRelatedByUpdatedBy) {
                $result['HistorysRelatedByUpdatedBy'] = $this->collHistorysRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfcSettingsRelatedByCreatedBy) {
                $result['sfcSettingsRelatedByCreatedBy'] = $this->collsfcSettingsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfcSettingsRelatedByUpdatedBy) {
                $result['sfcSettingsRelatedByUpdatedBy'] = $this->collsfcSettingsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlertsRelatedByUpdatedBy) {
                $result['AlertsRelatedByUpdatedBy'] = $this->collAlertsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlertsRelatedByCreatedBy) {
                $result['AlertsRelatedByCreatedBy'] = $this->collAlertsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSfcCommentsRelatedByCreatedBy) {
                $result['SfcCommentsRelatedByCreatedBy'] = $this->collSfcCommentsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSfcCommentsRelatedByUpdatedBy) {
                $result['SfcCommentsRelatedByUpdatedBy'] = $this->collSfcCommentsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setUsername($value);
                break;
            case 2:
                $this->setAlgorithm($value);
                break;
            case 3:
                $this->setSalt($value);
                break;
            case 4:
                $this->setPassword($value);
                break;
            case 5:
                $this->setCreatedAt($value);
                break;
            case 6:
                $this->setLastLogin($value);
                break;
            case 7:
                $this->setIsActive($value);
                break;
            case 8:
                $this->setIsSuperAdmin($value);
                break;
            case 9:
                $this->setIsSudoer($value);
                break;
            case 10:
                $this->setTimeSudoer($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = sfGuardUserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIsSuperAdmin($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setIsSudoer($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTimeSudoer($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

        if ($this->isColumnModified(sfGuardUserPeer::ID)) $criteria->add(sfGuardUserPeer::ID, $this->id);
        if ($this->isColumnModified(sfGuardUserPeer::USERNAME)) $criteria->add(sfGuardUserPeer::USERNAME, $this->username);
        if ($this->isColumnModified(sfGuardUserPeer::ALGORITHM)) $criteria->add(sfGuardUserPeer::ALGORITHM, $this->algorithm);
        if ($this->isColumnModified(sfGuardUserPeer::SALT)) $criteria->add(sfGuardUserPeer::SALT, $this->salt);
        if ($this->isColumnModified(sfGuardUserPeer::PASSWORD)) $criteria->add(sfGuardUserPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(sfGuardUserPeer::CREATED_AT)) $criteria->add(sfGuardUserPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(sfGuardUserPeer::LAST_LOGIN)) $criteria->add(sfGuardUserPeer::LAST_LOGIN, $this->last_login);
        if ($this->isColumnModified(sfGuardUserPeer::IS_ACTIVE)) $criteria->add(sfGuardUserPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(sfGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(sfGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);
        if ($this->isColumnModified(sfGuardUserPeer::IS_SUDOER)) $criteria->add(sfGuardUserPeer::IS_SUDOER, $this->is_sudoer);
        if ($this->isColumnModified(sfGuardUserPeer::TIME_SUDOER)) $criteria->add(sfGuardUserPeer::TIME_SUDOER, $this->time_sudoer);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);
        $criteria->add(sfGuardUserPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of sfGuardUser (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsername($this->getUsername());
        $copyObj->setAlgorithm($this->getAlgorithm());
        $copyObj->setSalt($this->getSalt());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setLastLogin($this->getLastLogin());
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setIsSuperAdmin($this->getIsSuperAdmin());
        $copyObj->setIsSudoer($this->getIsSudoer());
        $copyObj->setTimeSudoer($this->getTimeSudoer());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCollaboratorsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCollaboratorRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCollaboratorsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCollaboratorRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfGuardUserProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardUserProfile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDashboardMessagesRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDashboardMessageRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDashboardMessagesRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDashboardMessageRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStationsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStationRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStationsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStationRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTransportTypesRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransportTypeRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTransportTypesRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTransportTypeRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSubscriptionsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSubscriptionRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSubscriptionsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSubscriptionRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientSubscriptionsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientSubscriptionRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientSubscriptionsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientSubscriptionRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTravelsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTravelRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTravelsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTravelRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContactsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContactsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMaillingListsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMaillingListRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMaillingListsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMaillingListRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCartsRelatedByUserId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCartRelatedByUserId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCartsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCartRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCartsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCartRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCartItemsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCartItemRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCartItemsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCartItemRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfGuardUserPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfGuardUserGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardUserGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfGuardRememberKeys() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardRememberKey($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalytics() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalytic($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHistorysRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistoryRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHistorysRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistoryRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfcSettingsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfcSettingRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfcSettingsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfcSettingRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlertsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlertRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlertsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlertRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSfcCommentsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSfcCommentRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSfcCommentsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSfcCommentRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 sfGuardUser Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return   sfGuardUserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new sfGuardUserPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CollaboratorRelatedByCreatedBy' == $relationName) {
            $this->initCollaboratorsRelatedByCreatedBy();
        }
        if ('CollaboratorRelatedByUpdatedBy' == $relationName) {
            $this->initCollaboratorsRelatedByUpdatedBy();
        }
        if ('sfGuardUserProfile' == $relationName) {
            $this->initsfGuardUserProfiles();
        }
        if ('DashboardMessageRelatedByCreatedBy' == $relationName) {
            $this->initDashboardMessagesRelatedByCreatedBy();
        }
        if ('DashboardMessageRelatedByUpdatedBy' == $relationName) {
            $this->initDashboardMessagesRelatedByUpdatedBy();
        }
        if ('StationRelatedByCreatedBy' == $relationName) {
            $this->initStationsRelatedByCreatedBy();
        }
        if ('StationRelatedByUpdatedBy' == $relationName) {
            $this->initStationsRelatedByUpdatedBy();
        }
        if ('TransportTypeRelatedByCreatedBy' == $relationName) {
            $this->initTransportTypesRelatedByCreatedBy();
        }
        if ('TransportTypeRelatedByUpdatedBy' == $relationName) {
            $this->initTransportTypesRelatedByUpdatedBy();
        }
        if ('SubscriptionRelatedByCreatedBy' == $relationName) {
            $this->initSubscriptionsRelatedByCreatedBy();
        }
        if ('SubscriptionRelatedByUpdatedBy' == $relationName) {
            $this->initSubscriptionsRelatedByUpdatedBy();
        }
        if ('ClientRelatedByCreatedBy' == $relationName) {
            $this->initClientsRelatedByCreatedBy();
        }
        if ('ClientRelatedByUpdatedBy' == $relationName) {
            $this->initClientsRelatedByUpdatedBy();
        }
        if ('ClientSubscriptionRelatedByCreatedBy' == $relationName) {
            $this->initClientSubscriptionsRelatedByCreatedBy();
        }
        if ('ClientSubscriptionRelatedByUpdatedBy' == $relationName) {
            $this->initClientSubscriptionsRelatedByUpdatedBy();
        }
        if ('TravelRelatedByCreatedBy' == $relationName) {
            $this->initTravelsRelatedByCreatedBy();
        }
        if ('TravelRelatedByUpdatedBy' == $relationName) {
            $this->initTravelsRelatedByUpdatedBy();
        }
        if ('ContactRelatedByCreatedBy' == $relationName) {
            $this->initContactsRelatedByCreatedBy();
        }
        if ('ContactRelatedByUpdatedBy' == $relationName) {
            $this->initContactsRelatedByUpdatedBy();
        }
        if ('MaillingListRelatedByCreatedBy' == $relationName) {
            $this->initMaillingListsRelatedByCreatedBy();
        }
        if ('MaillingListRelatedByUpdatedBy' == $relationName) {
            $this->initMaillingListsRelatedByUpdatedBy();
        }
        if ('CartRelatedByUserId' == $relationName) {
            $this->initCartsRelatedByUserId();
        }
        if ('CartRelatedByCreatedBy' == $relationName) {
            $this->initCartsRelatedByCreatedBy();
        }
        if ('CartRelatedByUpdatedBy' == $relationName) {
            $this->initCartsRelatedByUpdatedBy();
        }
        if ('CartItemRelatedByCreatedBy' == $relationName) {
            $this->initCartItemsRelatedByCreatedBy();
        }
        if ('CartItemRelatedByUpdatedBy' == $relationName) {
            $this->initCartItemsRelatedByUpdatedBy();
        }
        if ('sfGuardUserPermission' == $relationName) {
            $this->initsfGuardUserPermissions();
        }
        if ('sfGuardUserGroup' == $relationName) {
            $this->initsfGuardUserGroups();
        }
        if ('sfGuardRememberKey' == $relationName) {
            $this->initsfGuardRememberKeys();
        }
        if ('Analytic' == $relationName) {
            $this->initAnalytics();
        }
        if ('HistoryRelatedByCreatedBy' == $relationName) {
            $this->initHistorysRelatedByCreatedBy();
        }
        if ('HistoryRelatedByUpdatedBy' == $relationName) {
            $this->initHistorysRelatedByUpdatedBy();
        }
        if ('sfcSettingRelatedByCreatedBy' == $relationName) {
            $this->initsfcSettingsRelatedByCreatedBy();
        }
        if ('sfcSettingRelatedByUpdatedBy' == $relationName) {
            $this->initsfcSettingsRelatedByUpdatedBy();
        }
        if ('AlertRelatedByUpdatedBy' == $relationName) {
            $this->initAlertsRelatedByUpdatedBy();
        }
        if ('AlertRelatedByCreatedBy' == $relationName) {
            $this->initAlertsRelatedByCreatedBy();
        }
        if ('SfcCommentRelatedByCreatedBy' == $relationName) {
            $this->initSfcCommentsRelatedByCreatedBy();
        }
        if ('SfcCommentRelatedByUpdatedBy' == $relationName) {
            $this->initSfcCommentsRelatedByUpdatedBy();
        }
    }

    /**
     * Clears out the collCollaboratorsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCollaboratorsRelatedByCreatedBy()
     */
    public function clearCollaboratorsRelatedByCreatedBy()
    {
        $this->collCollaboratorsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCollaboratorsRelatedByCreatedBy collection.
     *
     * By default this just sets the collCollaboratorsRelatedByCreatedBy collection to an empty array (like clearcollCollaboratorsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCollaboratorsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collCollaboratorsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collCollaboratorsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collCollaboratorsRelatedByCreatedBy->setModel('Collaborator');
    }

    /**
     * Gets an array of Collaborator objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Collaborator[] List of Collaborator objects
     * @throws PropelException
     */
    public function getCollaboratorsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCollaboratorsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCollaboratorsRelatedByCreatedBy) {
                // return empty collection
                $this->initCollaboratorsRelatedByCreatedBy();
            } else {
                $collCollaboratorsRelatedByCreatedBy = CollaboratorQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCollaboratorsRelatedByCreatedBy;
                }
                $this->collCollaboratorsRelatedByCreatedBy = $collCollaboratorsRelatedByCreatedBy;
            }
        }

        return $this->collCollaboratorsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of CollaboratorRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $collaboratorsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCollaboratorsRelatedByCreatedBy(PropelCollection $collaboratorsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->collaboratorsRelatedByCreatedByScheduledForDeletion = $this->getCollaboratorsRelatedByCreatedBy(new Criteria(), $con)->diff($collaboratorsRelatedByCreatedBy);

        foreach ($this->collaboratorsRelatedByCreatedByScheduledForDeletion as $collaboratorRelatedByCreatedByRemoved) {
            $collaboratorRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collCollaboratorsRelatedByCreatedBy = null;
        foreach ($collaboratorsRelatedByCreatedBy as $collaboratorRelatedByCreatedBy) {
            $this->addCollaboratorRelatedByCreatedBy($collaboratorRelatedByCreatedBy);
        }

        $this->collCollaboratorsRelatedByCreatedBy = $collaboratorsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Collaborator objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Collaborator objects.
     * @throws PropelException
     */
    public function countCollaboratorsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCollaboratorsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCollaboratorsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = CollaboratorQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collCollaboratorsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Collaborator object to this object
     * through the Collaborator foreign key attribute.
     *
     * @param    Collaborator $l Collaborator
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCollaboratorRelatedByCreatedBy(Collaborator $l)
    {
        if ($this->collCollaboratorsRelatedByCreatedBy === null) {
            $this->initCollaboratorsRelatedByCreatedBy();
        }
        if (!$this->collCollaboratorsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCollaboratorRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	CollaboratorRelatedByCreatedBy $collaboratorRelatedByCreatedBy The collaboratorRelatedByCreatedBy object to add.
     */
    protected function doAddCollaboratorRelatedByCreatedBy($collaboratorRelatedByCreatedBy)
    {
        $this->collCollaboratorsRelatedByCreatedBy[]= $collaboratorRelatedByCreatedBy;
        $collaboratorRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	CollaboratorRelatedByCreatedBy $collaboratorRelatedByCreatedBy The collaboratorRelatedByCreatedBy object to remove.
     */
    public function removeCollaboratorRelatedByCreatedBy($collaboratorRelatedByCreatedBy)
    {
        if ($this->getCollaboratorsRelatedByCreatedBy()->contains($collaboratorRelatedByCreatedBy)) {
            $this->collCollaboratorsRelatedByCreatedBy->remove($this->collCollaboratorsRelatedByCreatedBy->search($collaboratorRelatedByCreatedBy));
            if (null === $this->collaboratorsRelatedByCreatedByScheduledForDeletion) {
                $this->collaboratorsRelatedByCreatedByScheduledForDeletion = clone $this->collCollaboratorsRelatedByCreatedBy;
                $this->collaboratorsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->collaboratorsRelatedByCreatedByScheduledForDeletion[]= $collaboratorRelatedByCreatedBy;
            $collaboratorRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collCollaboratorsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCollaboratorsRelatedByUpdatedBy()
     */
    public function clearCollaboratorsRelatedByUpdatedBy()
    {
        $this->collCollaboratorsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCollaboratorsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collCollaboratorsRelatedByUpdatedBy collection to an empty array (like clearcollCollaboratorsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCollaboratorsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collCollaboratorsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collCollaboratorsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collCollaboratorsRelatedByUpdatedBy->setModel('Collaborator');
    }

    /**
     * Gets an array of Collaborator objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Collaborator[] List of Collaborator objects
     * @throws PropelException
     */
    public function getCollaboratorsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCollaboratorsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCollaboratorsRelatedByUpdatedBy) {
                // return empty collection
                $this->initCollaboratorsRelatedByUpdatedBy();
            } else {
                $collCollaboratorsRelatedByUpdatedBy = CollaboratorQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCollaboratorsRelatedByUpdatedBy;
                }
                $this->collCollaboratorsRelatedByUpdatedBy = $collCollaboratorsRelatedByUpdatedBy;
            }
        }

        return $this->collCollaboratorsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of CollaboratorRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $collaboratorsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCollaboratorsRelatedByUpdatedBy(PropelCollection $collaboratorsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->collaboratorsRelatedByUpdatedByScheduledForDeletion = $this->getCollaboratorsRelatedByUpdatedBy(new Criteria(), $con)->diff($collaboratorsRelatedByUpdatedBy);

        foreach ($this->collaboratorsRelatedByUpdatedByScheduledForDeletion as $collaboratorRelatedByUpdatedByRemoved) {
            $collaboratorRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collCollaboratorsRelatedByUpdatedBy = null;
        foreach ($collaboratorsRelatedByUpdatedBy as $collaboratorRelatedByUpdatedBy) {
            $this->addCollaboratorRelatedByUpdatedBy($collaboratorRelatedByUpdatedBy);
        }

        $this->collCollaboratorsRelatedByUpdatedBy = $collaboratorsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Collaborator objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Collaborator objects.
     * @throws PropelException
     */
    public function countCollaboratorsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCollaboratorsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCollaboratorsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = CollaboratorQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collCollaboratorsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Collaborator object to this object
     * through the Collaborator foreign key attribute.
     *
     * @param    Collaborator $l Collaborator
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCollaboratorRelatedByUpdatedBy(Collaborator $l)
    {
        if ($this->collCollaboratorsRelatedByUpdatedBy === null) {
            $this->initCollaboratorsRelatedByUpdatedBy();
        }
        if (!$this->collCollaboratorsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCollaboratorRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	CollaboratorRelatedByUpdatedBy $collaboratorRelatedByUpdatedBy The collaboratorRelatedByUpdatedBy object to add.
     */
    protected function doAddCollaboratorRelatedByUpdatedBy($collaboratorRelatedByUpdatedBy)
    {
        $this->collCollaboratorsRelatedByUpdatedBy[]= $collaboratorRelatedByUpdatedBy;
        $collaboratorRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	CollaboratorRelatedByUpdatedBy $collaboratorRelatedByUpdatedBy The collaboratorRelatedByUpdatedBy object to remove.
     */
    public function removeCollaboratorRelatedByUpdatedBy($collaboratorRelatedByUpdatedBy)
    {
        if ($this->getCollaboratorsRelatedByUpdatedBy()->contains($collaboratorRelatedByUpdatedBy)) {
            $this->collCollaboratorsRelatedByUpdatedBy->remove($this->collCollaboratorsRelatedByUpdatedBy->search($collaboratorRelatedByUpdatedBy));
            if (null === $this->collaboratorsRelatedByUpdatedByScheduledForDeletion) {
                $this->collaboratorsRelatedByUpdatedByScheduledForDeletion = clone $this->collCollaboratorsRelatedByUpdatedBy;
                $this->collaboratorsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->collaboratorsRelatedByUpdatedByScheduledForDeletion[]= $collaboratorRelatedByUpdatedBy;
            $collaboratorRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collsfGuardUserProfiles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfGuardUserProfiles()
     */
    public function clearsfGuardUserProfiles()
    {
        $this->collsfGuardUserProfiles = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfGuardUserProfiles collection.
     *
     * By default this just sets the collsfGuardUserProfiles collection to an empty array (like clearcollsfGuardUserProfiles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardUserProfiles($overrideExisting = true)
    {
        if (null !== $this->collsfGuardUserProfiles && !$overrideExisting) {
            return;
        }
        $this->collsfGuardUserProfiles = new PropelObjectCollection();
        $this->collsfGuardUserProfiles->setModel('sfGuardUserProfile');
    }

    /**
     * Gets an array of sfGuardUserProfile objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardUserProfile[] List of sfGuardUserProfile objects
     * @throws PropelException
     */
    public function getsfGuardUserProfiles($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardUserProfiles || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardUserProfiles) {
                // return empty collection
                $this->initsfGuardUserProfiles();
            } else {
                $collsfGuardUserProfiles = sfGuardUserProfileQuery::create(null, $criteria)
                    ->filterBysfGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfGuardUserProfiles;
                }
                $this->collsfGuardUserProfiles = $collsfGuardUserProfiles;
            }
        }

        return $this->collsfGuardUserProfiles;
    }

    /**
     * Sets a collection of sfGuardUserProfile objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfGuardUserProfiles A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfGuardUserProfiles(PropelCollection $sfGuardUserProfiles, PropelPDO $con = null)
    {
        $this->sfGuardUserProfilesScheduledForDeletion = $this->getsfGuardUserProfiles(new Criteria(), $con)->diff($sfGuardUserProfiles);

        foreach ($this->sfGuardUserProfilesScheduledForDeletion as $sfGuardUserProfileRemoved) {
            $sfGuardUserProfileRemoved->setsfGuardUser(null);
        }

        $this->collsfGuardUserProfiles = null;
        foreach ($sfGuardUserProfiles as $sfGuardUserProfile) {
            $this->addsfGuardUserProfile($sfGuardUserProfile);
        }

        $this->collsfGuardUserProfiles = $sfGuardUserProfiles;
    }

    /**
     * Returns the number of related sfGuardUserProfile objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfGuardUserProfile objects.
     * @throws PropelException
     */
    public function countsfGuardUserProfiles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardUserProfiles || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardUserProfiles) {
                return 0;
            } else {
                $query = sfGuardUserProfileQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfGuardUserProfiles);
        }
    }

    /**
     * Method called to associate a sfGuardUserProfile object to this object
     * through the sfGuardUserProfile foreign key attribute.
     *
     * @param    sfGuardUserProfile $l sfGuardUserProfile
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addsfGuardUserProfile(sfGuardUserProfile $l)
    {
        if ($this->collsfGuardUserProfiles === null) {
            $this->initsfGuardUserProfiles();
        }
        if (!$this->collsfGuardUserProfiles->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardUserProfile($l);
        }

        return $this;
    }

    /**
     * @param	sfGuardUserProfile $sfGuardUserProfile The sfGuardUserProfile object to add.
     */
    protected function doAddsfGuardUserProfile($sfGuardUserProfile)
    {
        $this->collsfGuardUserProfiles[]= $sfGuardUserProfile;
        $sfGuardUserProfile->setsfGuardUser($this);
    }

    /**
     * @param	sfGuardUserProfile $sfGuardUserProfile The sfGuardUserProfile object to remove.
     */
    public function removesfGuardUserProfile($sfGuardUserProfile)
    {
        if ($this->getsfGuardUserProfiles()->contains($sfGuardUserProfile)) {
            $this->collsfGuardUserProfiles->remove($this->collsfGuardUserProfiles->search($sfGuardUserProfile));
            if (null === $this->sfGuardUserProfilesScheduledForDeletion) {
                $this->sfGuardUserProfilesScheduledForDeletion = clone $this->collsfGuardUserProfiles;
                $this->sfGuardUserProfilesScheduledForDeletion->clear();
            }
            $this->sfGuardUserProfilesScheduledForDeletion[]= $sfGuardUserProfile;
            $sfGuardUserProfile->setsfGuardUser(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related sfGuardUserProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserProfile[] List of sfGuardUserProfile objects
     */
    public function getsfGuardUserProfilesJoinCollaborator($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserProfileQuery::create(null, $criteria);
        $query->joinWith('Collaborator', $join_behavior);

        return $this->getsfGuardUserProfiles($query, $con);
    }

    /**
     * Clears out the collDashboardMessagesRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDashboardMessagesRelatedByCreatedBy()
     */
    public function clearDashboardMessagesRelatedByCreatedBy()
    {
        $this->collDashboardMessagesRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collDashboardMessagesRelatedByCreatedBy collection.
     *
     * By default this just sets the collDashboardMessagesRelatedByCreatedBy collection to an empty array (like clearcollDashboardMessagesRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDashboardMessagesRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collDashboardMessagesRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collDashboardMessagesRelatedByCreatedBy = new PropelObjectCollection();
        $this->collDashboardMessagesRelatedByCreatedBy->setModel('DashboardMessage');
    }

    /**
     * Gets an array of DashboardMessage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|DashboardMessage[] List of DashboardMessage objects
     * @throws PropelException
     */
    public function getDashboardMessagesRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collDashboardMessagesRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collDashboardMessagesRelatedByCreatedBy) {
                // return empty collection
                $this->initDashboardMessagesRelatedByCreatedBy();
            } else {
                $collDashboardMessagesRelatedByCreatedBy = DashboardMessageQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collDashboardMessagesRelatedByCreatedBy;
                }
                $this->collDashboardMessagesRelatedByCreatedBy = $collDashboardMessagesRelatedByCreatedBy;
            }
        }

        return $this->collDashboardMessagesRelatedByCreatedBy;
    }

    /**
     * Sets a collection of DashboardMessageRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $dashboardMessagesRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setDashboardMessagesRelatedByCreatedBy(PropelCollection $dashboardMessagesRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->dashboardMessagesRelatedByCreatedByScheduledForDeletion = $this->getDashboardMessagesRelatedByCreatedBy(new Criteria(), $con)->diff($dashboardMessagesRelatedByCreatedBy);

        foreach ($this->dashboardMessagesRelatedByCreatedByScheduledForDeletion as $dashboardMessageRelatedByCreatedByRemoved) {
            $dashboardMessageRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collDashboardMessagesRelatedByCreatedBy = null;
        foreach ($dashboardMessagesRelatedByCreatedBy as $dashboardMessageRelatedByCreatedBy) {
            $this->addDashboardMessageRelatedByCreatedBy($dashboardMessageRelatedByCreatedBy);
        }

        $this->collDashboardMessagesRelatedByCreatedBy = $dashboardMessagesRelatedByCreatedBy;
    }

    /**
     * Returns the number of related DashboardMessage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related DashboardMessage objects.
     * @throws PropelException
     */
    public function countDashboardMessagesRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collDashboardMessagesRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collDashboardMessagesRelatedByCreatedBy) {
                return 0;
            } else {
                $query = DashboardMessageQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collDashboardMessagesRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a DashboardMessage object to this object
     * through the DashboardMessage foreign key attribute.
     *
     * @param    DashboardMessage $l DashboardMessage
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addDashboardMessageRelatedByCreatedBy(DashboardMessage $l)
    {
        if ($this->collDashboardMessagesRelatedByCreatedBy === null) {
            $this->initDashboardMessagesRelatedByCreatedBy();
        }
        if (!$this->collDashboardMessagesRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddDashboardMessageRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	DashboardMessageRelatedByCreatedBy $dashboardMessageRelatedByCreatedBy The dashboardMessageRelatedByCreatedBy object to add.
     */
    protected function doAddDashboardMessageRelatedByCreatedBy($dashboardMessageRelatedByCreatedBy)
    {
        $this->collDashboardMessagesRelatedByCreatedBy[]= $dashboardMessageRelatedByCreatedBy;
        $dashboardMessageRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	DashboardMessageRelatedByCreatedBy $dashboardMessageRelatedByCreatedBy The dashboardMessageRelatedByCreatedBy object to remove.
     */
    public function removeDashboardMessageRelatedByCreatedBy($dashboardMessageRelatedByCreatedBy)
    {
        if ($this->getDashboardMessagesRelatedByCreatedBy()->contains($dashboardMessageRelatedByCreatedBy)) {
            $this->collDashboardMessagesRelatedByCreatedBy->remove($this->collDashboardMessagesRelatedByCreatedBy->search($dashboardMessageRelatedByCreatedBy));
            if (null === $this->dashboardMessagesRelatedByCreatedByScheduledForDeletion) {
                $this->dashboardMessagesRelatedByCreatedByScheduledForDeletion = clone $this->collDashboardMessagesRelatedByCreatedBy;
                $this->dashboardMessagesRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->dashboardMessagesRelatedByCreatedByScheduledForDeletion[]= $dashboardMessageRelatedByCreatedBy;
            $dashboardMessageRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collDashboardMessagesRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDashboardMessagesRelatedByUpdatedBy()
     */
    public function clearDashboardMessagesRelatedByUpdatedBy()
    {
        $this->collDashboardMessagesRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collDashboardMessagesRelatedByUpdatedBy collection.
     *
     * By default this just sets the collDashboardMessagesRelatedByUpdatedBy collection to an empty array (like clearcollDashboardMessagesRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDashboardMessagesRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collDashboardMessagesRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collDashboardMessagesRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collDashboardMessagesRelatedByUpdatedBy->setModel('DashboardMessage');
    }

    /**
     * Gets an array of DashboardMessage objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|DashboardMessage[] List of DashboardMessage objects
     * @throws PropelException
     */
    public function getDashboardMessagesRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collDashboardMessagesRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collDashboardMessagesRelatedByUpdatedBy) {
                // return empty collection
                $this->initDashboardMessagesRelatedByUpdatedBy();
            } else {
                $collDashboardMessagesRelatedByUpdatedBy = DashboardMessageQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collDashboardMessagesRelatedByUpdatedBy;
                }
                $this->collDashboardMessagesRelatedByUpdatedBy = $collDashboardMessagesRelatedByUpdatedBy;
            }
        }

        return $this->collDashboardMessagesRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of DashboardMessageRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $dashboardMessagesRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setDashboardMessagesRelatedByUpdatedBy(PropelCollection $dashboardMessagesRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion = $this->getDashboardMessagesRelatedByUpdatedBy(new Criteria(), $con)->diff($dashboardMessagesRelatedByUpdatedBy);

        foreach ($this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion as $dashboardMessageRelatedByUpdatedByRemoved) {
            $dashboardMessageRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collDashboardMessagesRelatedByUpdatedBy = null;
        foreach ($dashboardMessagesRelatedByUpdatedBy as $dashboardMessageRelatedByUpdatedBy) {
            $this->addDashboardMessageRelatedByUpdatedBy($dashboardMessageRelatedByUpdatedBy);
        }

        $this->collDashboardMessagesRelatedByUpdatedBy = $dashboardMessagesRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related DashboardMessage objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related DashboardMessage objects.
     * @throws PropelException
     */
    public function countDashboardMessagesRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collDashboardMessagesRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collDashboardMessagesRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = DashboardMessageQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collDashboardMessagesRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a DashboardMessage object to this object
     * through the DashboardMessage foreign key attribute.
     *
     * @param    DashboardMessage $l DashboardMessage
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addDashboardMessageRelatedByUpdatedBy(DashboardMessage $l)
    {
        if ($this->collDashboardMessagesRelatedByUpdatedBy === null) {
            $this->initDashboardMessagesRelatedByUpdatedBy();
        }
        if (!$this->collDashboardMessagesRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddDashboardMessageRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	DashboardMessageRelatedByUpdatedBy $dashboardMessageRelatedByUpdatedBy The dashboardMessageRelatedByUpdatedBy object to add.
     */
    protected function doAddDashboardMessageRelatedByUpdatedBy($dashboardMessageRelatedByUpdatedBy)
    {
        $this->collDashboardMessagesRelatedByUpdatedBy[]= $dashboardMessageRelatedByUpdatedBy;
        $dashboardMessageRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	DashboardMessageRelatedByUpdatedBy $dashboardMessageRelatedByUpdatedBy The dashboardMessageRelatedByUpdatedBy object to remove.
     */
    public function removeDashboardMessageRelatedByUpdatedBy($dashboardMessageRelatedByUpdatedBy)
    {
        if ($this->getDashboardMessagesRelatedByUpdatedBy()->contains($dashboardMessageRelatedByUpdatedBy)) {
            $this->collDashboardMessagesRelatedByUpdatedBy->remove($this->collDashboardMessagesRelatedByUpdatedBy->search($dashboardMessageRelatedByUpdatedBy));
            if (null === $this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion) {
                $this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion = clone $this->collDashboardMessagesRelatedByUpdatedBy;
                $this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->dashboardMessagesRelatedByUpdatedByScheduledForDeletion[]= $dashboardMessageRelatedByUpdatedBy;
            $dashboardMessageRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collStationsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addStationsRelatedByCreatedBy()
     */
    public function clearStationsRelatedByCreatedBy()
    {
        $this->collStationsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collStationsRelatedByCreatedBy collection.
     *
     * By default this just sets the collStationsRelatedByCreatedBy collection to an empty array (like clearcollStationsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStationsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collStationsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collStationsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collStationsRelatedByCreatedBy->setModel('Station');
    }

    /**
     * Gets an array of Station objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Station[] List of Station objects
     * @throws PropelException
     */
    public function getStationsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collStationsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collStationsRelatedByCreatedBy) {
                // return empty collection
                $this->initStationsRelatedByCreatedBy();
            } else {
                $collStationsRelatedByCreatedBy = StationQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collStationsRelatedByCreatedBy;
                }
                $this->collStationsRelatedByCreatedBy = $collStationsRelatedByCreatedBy;
            }
        }

        return $this->collStationsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of StationRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $stationsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setStationsRelatedByCreatedBy(PropelCollection $stationsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->stationsRelatedByCreatedByScheduledForDeletion = $this->getStationsRelatedByCreatedBy(new Criteria(), $con)->diff($stationsRelatedByCreatedBy);

        foreach ($this->stationsRelatedByCreatedByScheduledForDeletion as $stationRelatedByCreatedByRemoved) {
            $stationRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collStationsRelatedByCreatedBy = null;
        foreach ($stationsRelatedByCreatedBy as $stationRelatedByCreatedBy) {
            $this->addStationRelatedByCreatedBy($stationRelatedByCreatedBy);
        }

        $this->collStationsRelatedByCreatedBy = $stationsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Station objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Station objects.
     * @throws PropelException
     */
    public function countStationsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collStationsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collStationsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = StationQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collStationsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Station object to this object
     * through the Station foreign key attribute.
     *
     * @param    Station $l Station
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addStationRelatedByCreatedBy(Station $l)
    {
        if ($this->collStationsRelatedByCreatedBy === null) {
            $this->initStationsRelatedByCreatedBy();
        }
        if (!$this->collStationsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddStationRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	StationRelatedByCreatedBy $stationRelatedByCreatedBy The stationRelatedByCreatedBy object to add.
     */
    protected function doAddStationRelatedByCreatedBy($stationRelatedByCreatedBy)
    {
        $this->collStationsRelatedByCreatedBy[]= $stationRelatedByCreatedBy;
        $stationRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	StationRelatedByCreatedBy $stationRelatedByCreatedBy The stationRelatedByCreatedBy object to remove.
     */
    public function removeStationRelatedByCreatedBy($stationRelatedByCreatedBy)
    {
        if ($this->getStationsRelatedByCreatedBy()->contains($stationRelatedByCreatedBy)) {
            $this->collStationsRelatedByCreatedBy->remove($this->collStationsRelatedByCreatedBy->search($stationRelatedByCreatedBy));
            if (null === $this->stationsRelatedByCreatedByScheduledForDeletion) {
                $this->stationsRelatedByCreatedByScheduledForDeletion = clone $this->collStationsRelatedByCreatedBy;
                $this->stationsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->stationsRelatedByCreatedByScheduledForDeletion[]= $stationRelatedByCreatedBy;
            $stationRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collStationsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addStationsRelatedByUpdatedBy()
     */
    public function clearStationsRelatedByUpdatedBy()
    {
        $this->collStationsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collStationsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collStationsRelatedByUpdatedBy collection to an empty array (like clearcollStationsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStationsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collStationsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collStationsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collStationsRelatedByUpdatedBy->setModel('Station');
    }

    /**
     * Gets an array of Station objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Station[] List of Station objects
     * @throws PropelException
     */
    public function getStationsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collStationsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collStationsRelatedByUpdatedBy) {
                // return empty collection
                $this->initStationsRelatedByUpdatedBy();
            } else {
                $collStationsRelatedByUpdatedBy = StationQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collStationsRelatedByUpdatedBy;
                }
                $this->collStationsRelatedByUpdatedBy = $collStationsRelatedByUpdatedBy;
            }
        }

        return $this->collStationsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of StationRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $stationsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setStationsRelatedByUpdatedBy(PropelCollection $stationsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->stationsRelatedByUpdatedByScheduledForDeletion = $this->getStationsRelatedByUpdatedBy(new Criteria(), $con)->diff($stationsRelatedByUpdatedBy);

        foreach ($this->stationsRelatedByUpdatedByScheduledForDeletion as $stationRelatedByUpdatedByRemoved) {
            $stationRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collStationsRelatedByUpdatedBy = null;
        foreach ($stationsRelatedByUpdatedBy as $stationRelatedByUpdatedBy) {
            $this->addStationRelatedByUpdatedBy($stationRelatedByUpdatedBy);
        }

        $this->collStationsRelatedByUpdatedBy = $stationsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Station objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Station objects.
     * @throws PropelException
     */
    public function countStationsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collStationsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collStationsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = StationQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collStationsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Station object to this object
     * through the Station foreign key attribute.
     *
     * @param    Station $l Station
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addStationRelatedByUpdatedBy(Station $l)
    {
        if ($this->collStationsRelatedByUpdatedBy === null) {
            $this->initStationsRelatedByUpdatedBy();
        }
        if (!$this->collStationsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddStationRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	StationRelatedByUpdatedBy $stationRelatedByUpdatedBy The stationRelatedByUpdatedBy object to add.
     */
    protected function doAddStationRelatedByUpdatedBy($stationRelatedByUpdatedBy)
    {
        $this->collStationsRelatedByUpdatedBy[]= $stationRelatedByUpdatedBy;
        $stationRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	StationRelatedByUpdatedBy $stationRelatedByUpdatedBy The stationRelatedByUpdatedBy object to remove.
     */
    public function removeStationRelatedByUpdatedBy($stationRelatedByUpdatedBy)
    {
        if ($this->getStationsRelatedByUpdatedBy()->contains($stationRelatedByUpdatedBy)) {
            $this->collStationsRelatedByUpdatedBy->remove($this->collStationsRelatedByUpdatedBy->search($stationRelatedByUpdatedBy));
            if (null === $this->stationsRelatedByUpdatedByScheduledForDeletion) {
                $this->stationsRelatedByUpdatedByScheduledForDeletion = clone $this->collStationsRelatedByUpdatedBy;
                $this->stationsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->stationsRelatedByUpdatedByScheduledForDeletion[]= $stationRelatedByUpdatedBy;
            $stationRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collTransportTypesRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTransportTypesRelatedByCreatedBy()
     */
    public function clearTransportTypesRelatedByCreatedBy()
    {
        $this->collTransportTypesRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTransportTypesRelatedByCreatedBy collection.
     *
     * By default this just sets the collTransportTypesRelatedByCreatedBy collection to an empty array (like clearcollTransportTypesRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTransportTypesRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collTransportTypesRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collTransportTypesRelatedByCreatedBy = new PropelObjectCollection();
        $this->collTransportTypesRelatedByCreatedBy->setModel('TransportType');
    }

    /**
     * Gets an array of TransportType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|TransportType[] List of TransportType objects
     * @throws PropelException
     */
    public function getTransportTypesRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTransportTypesRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTransportTypesRelatedByCreatedBy) {
                // return empty collection
                $this->initTransportTypesRelatedByCreatedBy();
            } else {
                $collTransportTypesRelatedByCreatedBy = TransportTypeQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTransportTypesRelatedByCreatedBy;
                }
                $this->collTransportTypesRelatedByCreatedBy = $collTransportTypesRelatedByCreatedBy;
            }
        }

        return $this->collTransportTypesRelatedByCreatedBy;
    }

    /**
     * Sets a collection of TransportTypeRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $transportTypesRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTransportTypesRelatedByCreatedBy(PropelCollection $transportTypesRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->transportTypesRelatedByCreatedByScheduledForDeletion = $this->getTransportTypesRelatedByCreatedBy(new Criteria(), $con)->diff($transportTypesRelatedByCreatedBy);

        foreach ($this->transportTypesRelatedByCreatedByScheduledForDeletion as $transportTypeRelatedByCreatedByRemoved) {
            $transportTypeRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collTransportTypesRelatedByCreatedBy = null;
        foreach ($transportTypesRelatedByCreatedBy as $transportTypeRelatedByCreatedBy) {
            $this->addTransportTypeRelatedByCreatedBy($transportTypeRelatedByCreatedBy);
        }

        $this->collTransportTypesRelatedByCreatedBy = $transportTypesRelatedByCreatedBy;
    }

    /**
     * Returns the number of related TransportType objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related TransportType objects.
     * @throws PropelException
     */
    public function countTransportTypesRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTransportTypesRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTransportTypesRelatedByCreatedBy) {
                return 0;
            } else {
                $query = TransportTypeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collTransportTypesRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a TransportType object to this object
     * through the TransportType foreign key attribute.
     *
     * @param    TransportType $l TransportType
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addTransportTypeRelatedByCreatedBy(TransportType $l)
    {
        if ($this->collTransportTypesRelatedByCreatedBy === null) {
            $this->initTransportTypesRelatedByCreatedBy();
        }
        if (!$this->collTransportTypesRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTransportTypeRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	TransportTypeRelatedByCreatedBy $transportTypeRelatedByCreatedBy The transportTypeRelatedByCreatedBy object to add.
     */
    protected function doAddTransportTypeRelatedByCreatedBy($transportTypeRelatedByCreatedBy)
    {
        $this->collTransportTypesRelatedByCreatedBy[]= $transportTypeRelatedByCreatedBy;
        $transportTypeRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	TransportTypeRelatedByCreatedBy $transportTypeRelatedByCreatedBy The transportTypeRelatedByCreatedBy object to remove.
     */
    public function removeTransportTypeRelatedByCreatedBy($transportTypeRelatedByCreatedBy)
    {
        if ($this->getTransportTypesRelatedByCreatedBy()->contains($transportTypeRelatedByCreatedBy)) {
            $this->collTransportTypesRelatedByCreatedBy->remove($this->collTransportTypesRelatedByCreatedBy->search($transportTypeRelatedByCreatedBy));
            if (null === $this->transportTypesRelatedByCreatedByScheduledForDeletion) {
                $this->transportTypesRelatedByCreatedByScheduledForDeletion = clone $this->collTransportTypesRelatedByCreatedBy;
                $this->transportTypesRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->transportTypesRelatedByCreatedByScheduledForDeletion[]= $transportTypeRelatedByCreatedBy;
            $transportTypeRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collTransportTypesRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTransportTypesRelatedByUpdatedBy()
     */
    public function clearTransportTypesRelatedByUpdatedBy()
    {
        $this->collTransportTypesRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTransportTypesRelatedByUpdatedBy collection.
     *
     * By default this just sets the collTransportTypesRelatedByUpdatedBy collection to an empty array (like clearcollTransportTypesRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTransportTypesRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collTransportTypesRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collTransportTypesRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collTransportTypesRelatedByUpdatedBy->setModel('TransportType');
    }

    /**
     * Gets an array of TransportType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|TransportType[] List of TransportType objects
     * @throws PropelException
     */
    public function getTransportTypesRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTransportTypesRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTransportTypesRelatedByUpdatedBy) {
                // return empty collection
                $this->initTransportTypesRelatedByUpdatedBy();
            } else {
                $collTransportTypesRelatedByUpdatedBy = TransportTypeQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTransportTypesRelatedByUpdatedBy;
                }
                $this->collTransportTypesRelatedByUpdatedBy = $collTransportTypesRelatedByUpdatedBy;
            }
        }

        return $this->collTransportTypesRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of TransportTypeRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $transportTypesRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTransportTypesRelatedByUpdatedBy(PropelCollection $transportTypesRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->transportTypesRelatedByUpdatedByScheduledForDeletion = $this->getTransportTypesRelatedByUpdatedBy(new Criteria(), $con)->diff($transportTypesRelatedByUpdatedBy);

        foreach ($this->transportTypesRelatedByUpdatedByScheduledForDeletion as $transportTypeRelatedByUpdatedByRemoved) {
            $transportTypeRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collTransportTypesRelatedByUpdatedBy = null;
        foreach ($transportTypesRelatedByUpdatedBy as $transportTypeRelatedByUpdatedBy) {
            $this->addTransportTypeRelatedByUpdatedBy($transportTypeRelatedByUpdatedBy);
        }

        $this->collTransportTypesRelatedByUpdatedBy = $transportTypesRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related TransportType objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related TransportType objects.
     * @throws PropelException
     */
    public function countTransportTypesRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTransportTypesRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTransportTypesRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = TransportTypeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collTransportTypesRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a TransportType object to this object
     * through the TransportType foreign key attribute.
     *
     * @param    TransportType $l TransportType
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addTransportTypeRelatedByUpdatedBy(TransportType $l)
    {
        if ($this->collTransportTypesRelatedByUpdatedBy === null) {
            $this->initTransportTypesRelatedByUpdatedBy();
        }
        if (!$this->collTransportTypesRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTransportTypeRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	TransportTypeRelatedByUpdatedBy $transportTypeRelatedByUpdatedBy The transportTypeRelatedByUpdatedBy object to add.
     */
    protected function doAddTransportTypeRelatedByUpdatedBy($transportTypeRelatedByUpdatedBy)
    {
        $this->collTransportTypesRelatedByUpdatedBy[]= $transportTypeRelatedByUpdatedBy;
        $transportTypeRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	TransportTypeRelatedByUpdatedBy $transportTypeRelatedByUpdatedBy The transportTypeRelatedByUpdatedBy object to remove.
     */
    public function removeTransportTypeRelatedByUpdatedBy($transportTypeRelatedByUpdatedBy)
    {
        if ($this->getTransportTypesRelatedByUpdatedBy()->contains($transportTypeRelatedByUpdatedBy)) {
            $this->collTransportTypesRelatedByUpdatedBy->remove($this->collTransportTypesRelatedByUpdatedBy->search($transportTypeRelatedByUpdatedBy));
            if (null === $this->transportTypesRelatedByUpdatedByScheduledForDeletion) {
                $this->transportTypesRelatedByUpdatedByScheduledForDeletion = clone $this->collTransportTypesRelatedByUpdatedBy;
                $this->transportTypesRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->transportTypesRelatedByUpdatedByScheduledForDeletion[]= $transportTypeRelatedByUpdatedBy;
            $transportTypeRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collSubscriptionsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSubscriptionsRelatedByCreatedBy()
     */
    public function clearSubscriptionsRelatedByCreatedBy()
    {
        $this->collSubscriptionsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSubscriptionsRelatedByCreatedBy collection.
     *
     * By default this just sets the collSubscriptionsRelatedByCreatedBy collection to an empty array (like clearcollSubscriptionsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSubscriptionsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collSubscriptionsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collSubscriptionsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collSubscriptionsRelatedByCreatedBy->setModel('Subscription');
    }

    /**
     * Gets an array of Subscription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Subscription[] List of Subscription objects
     * @throws PropelException
     */
    public function getSubscriptionsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSubscriptionsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSubscriptionsRelatedByCreatedBy) {
                // return empty collection
                $this->initSubscriptionsRelatedByCreatedBy();
            } else {
                $collSubscriptionsRelatedByCreatedBy = SubscriptionQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSubscriptionsRelatedByCreatedBy;
                }
                $this->collSubscriptionsRelatedByCreatedBy = $collSubscriptionsRelatedByCreatedBy;
            }
        }

        return $this->collSubscriptionsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of SubscriptionRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $subscriptionsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setSubscriptionsRelatedByCreatedBy(PropelCollection $subscriptionsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->subscriptionsRelatedByCreatedByScheduledForDeletion = $this->getSubscriptionsRelatedByCreatedBy(new Criteria(), $con)->diff($subscriptionsRelatedByCreatedBy);

        foreach ($this->subscriptionsRelatedByCreatedByScheduledForDeletion as $subscriptionRelatedByCreatedByRemoved) {
            $subscriptionRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collSubscriptionsRelatedByCreatedBy = null;
        foreach ($subscriptionsRelatedByCreatedBy as $subscriptionRelatedByCreatedBy) {
            $this->addSubscriptionRelatedByCreatedBy($subscriptionRelatedByCreatedBy);
        }

        $this->collSubscriptionsRelatedByCreatedBy = $subscriptionsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Subscription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Subscription objects.
     * @throws PropelException
     */
    public function countSubscriptionsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSubscriptionsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSubscriptionsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = SubscriptionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collSubscriptionsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Subscription object to this object
     * through the Subscription foreign key attribute.
     *
     * @param    Subscription $l Subscription
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addSubscriptionRelatedByCreatedBy(Subscription $l)
    {
        if ($this->collSubscriptionsRelatedByCreatedBy === null) {
            $this->initSubscriptionsRelatedByCreatedBy();
        }
        if (!$this->collSubscriptionsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSubscriptionRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	SubscriptionRelatedByCreatedBy $subscriptionRelatedByCreatedBy The subscriptionRelatedByCreatedBy object to add.
     */
    protected function doAddSubscriptionRelatedByCreatedBy($subscriptionRelatedByCreatedBy)
    {
        $this->collSubscriptionsRelatedByCreatedBy[]= $subscriptionRelatedByCreatedBy;
        $subscriptionRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	SubscriptionRelatedByCreatedBy $subscriptionRelatedByCreatedBy The subscriptionRelatedByCreatedBy object to remove.
     */
    public function removeSubscriptionRelatedByCreatedBy($subscriptionRelatedByCreatedBy)
    {
        if ($this->getSubscriptionsRelatedByCreatedBy()->contains($subscriptionRelatedByCreatedBy)) {
            $this->collSubscriptionsRelatedByCreatedBy->remove($this->collSubscriptionsRelatedByCreatedBy->search($subscriptionRelatedByCreatedBy));
            if (null === $this->subscriptionsRelatedByCreatedByScheduledForDeletion) {
                $this->subscriptionsRelatedByCreatedByScheduledForDeletion = clone $this->collSubscriptionsRelatedByCreatedBy;
                $this->subscriptionsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->subscriptionsRelatedByCreatedByScheduledForDeletion[]= $subscriptionRelatedByCreatedBy;
            $subscriptionRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collSubscriptionsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSubscriptionsRelatedByUpdatedBy()
     */
    public function clearSubscriptionsRelatedByUpdatedBy()
    {
        $this->collSubscriptionsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSubscriptionsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collSubscriptionsRelatedByUpdatedBy collection to an empty array (like clearcollSubscriptionsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSubscriptionsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collSubscriptionsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collSubscriptionsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collSubscriptionsRelatedByUpdatedBy->setModel('Subscription');
    }

    /**
     * Gets an array of Subscription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Subscription[] List of Subscription objects
     * @throws PropelException
     */
    public function getSubscriptionsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSubscriptionsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSubscriptionsRelatedByUpdatedBy) {
                // return empty collection
                $this->initSubscriptionsRelatedByUpdatedBy();
            } else {
                $collSubscriptionsRelatedByUpdatedBy = SubscriptionQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSubscriptionsRelatedByUpdatedBy;
                }
                $this->collSubscriptionsRelatedByUpdatedBy = $collSubscriptionsRelatedByUpdatedBy;
            }
        }

        return $this->collSubscriptionsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of SubscriptionRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $subscriptionsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setSubscriptionsRelatedByUpdatedBy(PropelCollection $subscriptionsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->subscriptionsRelatedByUpdatedByScheduledForDeletion = $this->getSubscriptionsRelatedByUpdatedBy(new Criteria(), $con)->diff($subscriptionsRelatedByUpdatedBy);

        foreach ($this->subscriptionsRelatedByUpdatedByScheduledForDeletion as $subscriptionRelatedByUpdatedByRemoved) {
            $subscriptionRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collSubscriptionsRelatedByUpdatedBy = null;
        foreach ($subscriptionsRelatedByUpdatedBy as $subscriptionRelatedByUpdatedBy) {
            $this->addSubscriptionRelatedByUpdatedBy($subscriptionRelatedByUpdatedBy);
        }

        $this->collSubscriptionsRelatedByUpdatedBy = $subscriptionsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Subscription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Subscription objects.
     * @throws PropelException
     */
    public function countSubscriptionsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSubscriptionsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSubscriptionsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = SubscriptionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collSubscriptionsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Subscription object to this object
     * through the Subscription foreign key attribute.
     *
     * @param    Subscription $l Subscription
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addSubscriptionRelatedByUpdatedBy(Subscription $l)
    {
        if ($this->collSubscriptionsRelatedByUpdatedBy === null) {
            $this->initSubscriptionsRelatedByUpdatedBy();
        }
        if (!$this->collSubscriptionsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSubscriptionRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	SubscriptionRelatedByUpdatedBy $subscriptionRelatedByUpdatedBy The subscriptionRelatedByUpdatedBy object to add.
     */
    protected function doAddSubscriptionRelatedByUpdatedBy($subscriptionRelatedByUpdatedBy)
    {
        $this->collSubscriptionsRelatedByUpdatedBy[]= $subscriptionRelatedByUpdatedBy;
        $subscriptionRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	SubscriptionRelatedByUpdatedBy $subscriptionRelatedByUpdatedBy The subscriptionRelatedByUpdatedBy object to remove.
     */
    public function removeSubscriptionRelatedByUpdatedBy($subscriptionRelatedByUpdatedBy)
    {
        if ($this->getSubscriptionsRelatedByUpdatedBy()->contains($subscriptionRelatedByUpdatedBy)) {
            $this->collSubscriptionsRelatedByUpdatedBy->remove($this->collSubscriptionsRelatedByUpdatedBy->search($subscriptionRelatedByUpdatedBy));
            if (null === $this->subscriptionsRelatedByUpdatedByScheduledForDeletion) {
                $this->subscriptionsRelatedByUpdatedByScheduledForDeletion = clone $this->collSubscriptionsRelatedByUpdatedBy;
                $this->subscriptionsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->subscriptionsRelatedByUpdatedByScheduledForDeletion[]= $subscriptionRelatedByUpdatedBy;
            $subscriptionRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collClientsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClientsRelatedByCreatedBy()
     */
    public function clearClientsRelatedByCreatedBy()
    {
        $this->collClientsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collClientsRelatedByCreatedBy collection.
     *
     * By default this just sets the collClientsRelatedByCreatedBy collection to an empty array (like clearcollClientsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collClientsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collClientsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collClientsRelatedByCreatedBy->setModel('Client');
    }

    /**
     * Gets an array of Client objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Client[] List of Client objects
     * @throws PropelException
     */
    public function getClientsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collClientsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientsRelatedByCreatedBy) {
                // return empty collection
                $this->initClientsRelatedByCreatedBy();
            } else {
                $collClientsRelatedByCreatedBy = ClientQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collClientsRelatedByCreatedBy;
                }
                $this->collClientsRelatedByCreatedBy = $collClientsRelatedByCreatedBy;
            }
        }

        return $this->collClientsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of ClientRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $clientsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setClientsRelatedByCreatedBy(PropelCollection $clientsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->clientsRelatedByCreatedByScheduledForDeletion = $this->getClientsRelatedByCreatedBy(new Criteria(), $con)->diff($clientsRelatedByCreatedBy);

        foreach ($this->clientsRelatedByCreatedByScheduledForDeletion as $clientRelatedByCreatedByRemoved) {
            $clientRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collClientsRelatedByCreatedBy = null;
        foreach ($clientsRelatedByCreatedBy as $clientRelatedByCreatedBy) {
            $this->addClientRelatedByCreatedBy($clientRelatedByCreatedBy);
        }

        $this->collClientsRelatedByCreatedBy = $clientsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Client objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Client objects.
     * @throws PropelException
     */
    public function countClientsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collClientsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = ClientQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collClientsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Client object to this object
     * through the Client foreign key attribute.
     *
     * @param    Client $l Client
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addClientRelatedByCreatedBy(Client $l)
    {
        if ($this->collClientsRelatedByCreatedBy === null) {
            $this->initClientsRelatedByCreatedBy();
        }
        if (!$this->collClientsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddClientRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	ClientRelatedByCreatedBy $clientRelatedByCreatedBy The clientRelatedByCreatedBy object to add.
     */
    protected function doAddClientRelatedByCreatedBy($clientRelatedByCreatedBy)
    {
        $this->collClientsRelatedByCreatedBy[]= $clientRelatedByCreatedBy;
        $clientRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	ClientRelatedByCreatedBy $clientRelatedByCreatedBy The clientRelatedByCreatedBy object to remove.
     */
    public function removeClientRelatedByCreatedBy($clientRelatedByCreatedBy)
    {
        if ($this->getClientsRelatedByCreatedBy()->contains($clientRelatedByCreatedBy)) {
            $this->collClientsRelatedByCreatedBy->remove($this->collClientsRelatedByCreatedBy->search($clientRelatedByCreatedBy));
            if (null === $this->clientsRelatedByCreatedByScheduledForDeletion) {
                $this->clientsRelatedByCreatedByScheduledForDeletion = clone $this->collClientsRelatedByCreatedBy;
                $this->clientsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->clientsRelatedByCreatedByScheduledForDeletion[]= $clientRelatedByCreatedBy;
            $clientRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collClientsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClientsRelatedByUpdatedBy()
     */
    public function clearClientsRelatedByUpdatedBy()
    {
        $this->collClientsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collClientsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collClientsRelatedByUpdatedBy collection to an empty array (like clearcollClientsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collClientsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collClientsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collClientsRelatedByUpdatedBy->setModel('Client');
    }

    /**
     * Gets an array of Client objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Client[] List of Client objects
     * @throws PropelException
     */
    public function getClientsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collClientsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientsRelatedByUpdatedBy) {
                // return empty collection
                $this->initClientsRelatedByUpdatedBy();
            } else {
                $collClientsRelatedByUpdatedBy = ClientQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collClientsRelatedByUpdatedBy;
                }
                $this->collClientsRelatedByUpdatedBy = $collClientsRelatedByUpdatedBy;
            }
        }

        return $this->collClientsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of ClientRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $clientsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setClientsRelatedByUpdatedBy(PropelCollection $clientsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->clientsRelatedByUpdatedByScheduledForDeletion = $this->getClientsRelatedByUpdatedBy(new Criteria(), $con)->diff($clientsRelatedByUpdatedBy);

        foreach ($this->clientsRelatedByUpdatedByScheduledForDeletion as $clientRelatedByUpdatedByRemoved) {
            $clientRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collClientsRelatedByUpdatedBy = null;
        foreach ($clientsRelatedByUpdatedBy as $clientRelatedByUpdatedBy) {
            $this->addClientRelatedByUpdatedBy($clientRelatedByUpdatedBy);
        }

        $this->collClientsRelatedByUpdatedBy = $clientsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Client objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Client objects.
     * @throws PropelException
     */
    public function countClientsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collClientsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = ClientQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collClientsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Client object to this object
     * through the Client foreign key attribute.
     *
     * @param    Client $l Client
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addClientRelatedByUpdatedBy(Client $l)
    {
        if ($this->collClientsRelatedByUpdatedBy === null) {
            $this->initClientsRelatedByUpdatedBy();
        }
        if (!$this->collClientsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddClientRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	ClientRelatedByUpdatedBy $clientRelatedByUpdatedBy The clientRelatedByUpdatedBy object to add.
     */
    protected function doAddClientRelatedByUpdatedBy($clientRelatedByUpdatedBy)
    {
        $this->collClientsRelatedByUpdatedBy[]= $clientRelatedByUpdatedBy;
        $clientRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	ClientRelatedByUpdatedBy $clientRelatedByUpdatedBy The clientRelatedByUpdatedBy object to remove.
     */
    public function removeClientRelatedByUpdatedBy($clientRelatedByUpdatedBy)
    {
        if ($this->getClientsRelatedByUpdatedBy()->contains($clientRelatedByUpdatedBy)) {
            $this->collClientsRelatedByUpdatedBy->remove($this->collClientsRelatedByUpdatedBy->search($clientRelatedByUpdatedBy));
            if (null === $this->clientsRelatedByUpdatedByScheduledForDeletion) {
                $this->clientsRelatedByUpdatedByScheduledForDeletion = clone $this->collClientsRelatedByUpdatedBy;
                $this->clientsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->clientsRelatedByUpdatedByScheduledForDeletion[]= $clientRelatedByUpdatedBy;
            $clientRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collClientSubscriptionsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClientSubscriptionsRelatedByCreatedBy()
     */
    public function clearClientSubscriptionsRelatedByCreatedBy()
    {
        $this->collClientSubscriptionsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collClientSubscriptionsRelatedByCreatedBy collection.
     *
     * By default this just sets the collClientSubscriptionsRelatedByCreatedBy collection to an empty array (like clearcollClientSubscriptionsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientSubscriptionsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collClientSubscriptionsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collClientSubscriptionsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collClientSubscriptionsRelatedByCreatedBy->setModel('ClientSubscription');
    }

    /**
     * Gets an array of ClientSubscription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClientSubscription[] List of ClientSubscription objects
     * @throws PropelException
     */
    public function getClientSubscriptionsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collClientSubscriptionsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientSubscriptionsRelatedByCreatedBy) {
                // return empty collection
                $this->initClientSubscriptionsRelatedByCreatedBy();
            } else {
                $collClientSubscriptionsRelatedByCreatedBy = ClientSubscriptionQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collClientSubscriptionsRelatedByCreatedBy;
                }
                $this->collClientSubscriptionsRelatedByCreatedBy = $collClientSubscriptionsRelatedByCreatedBy;
            }
        }

        return $this->collClientSubscriptionsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of ClientSubscriptionRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $clientSubscriptionsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setClientSubscriptionsRelatedByCreatedBy(PropelCollection $clientSubscriptionsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion = $this->getClientSubscriptionsRelatedByCreatedBy(new Criteria(), $con)->diff($clientSubscriptionsRelatedByCreatedBy);

        foreach ($this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion as $clientSubscriptionRelatedByCreatedByRemoved) {
            $clientSubscriptionRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collClientSubscriptionsRelatedByCreatedBy = null;
        foreach ($clientSubscriptionsRelatedByCreatedBy as $clientSubscriptionRelatedByCreatedBy) {
            $this->addClientSubscriptionRelatedByCreatedBy($clientSubscriptionRelatedByCreatedBy);
        }

        $this->collClientSubscriptionsRelatedByCreatedBy = $clientSubscriptionsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related ClientSubscription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ClientSubscription objects.
     * @throws PropelException
     */
    public function countClientSubscriptionsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collClientSubscriptionsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientSubscriptionsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = ClientSubscriptionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collClientSubscriptionsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a ClientSubscription object to this object
     * through the ClientSubscription foreign key attribute.
     *
     * @param    ClientSubscription $l ClientSubscription
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addClientSubscriptionRelatedByCreatedBy(ClientSubscription $l)
    {
        if ($this->collClientSubscriptionsRelatedByCreatedBy === null) {
            $this->initClientSubscriptionsRelatedByCreatedBy();
        }
        if (!$this->collClientSubscriptionsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddClientSubscriptionRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	ClientSubscriptionRelatedByCreatedBy $clientSubscriptionRelatedByCreatedBy The clientSubscriptionRelatedByCreatedBy object to add.
     */
    protected function doAddClientSubscriptionRelatedByCreatedBy($clientSubscriptionRelatedByCreatedBy)
    {
        $this->collClientSubscriptionsRelatedByCreatedBy[]= $clientSubscriptionRelatedByCreatedBy;
        $clientSubscriptionRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	ClientSubscriptionRelatedByCreatedBy $clientSubscriptionRelatedByCreatedBy The clientSubscriptionRelatedByCreatedBy object to remove.
     */
    public function removeClientSubscriptionRelatedByCreatedBy($clientSubscriptionRelatedByCreatedBy)
    {
        if ($this->getClientSubscriptionsRelatedByCreatedBy()->contains($clientSubscriptionRelatedByCreatedBy)) {
            $this->collClientSubscriptionsRelatedByCreatedBy->remove($this->collClientSubscriptionsRelatedByCreatedBy->search($clientSubscriptionRelatedByCreatedBy));
            if (null === $this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion) {
                $this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion = clone $this->collClientSubscriptionsRelatedByCreatedBy;
                $this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->clientSubscriptionsRelatedByCreatedByScheduledForDeletion[]= $clientSubscriptionRelatedByCreatedBy;
            $clientSubscriptionRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ClientSubscriptionsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClientSubscription[] List of ClientSubscription objects
     */
    public function getClientSubscriptionsRelatedByCreatedByJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientSubscriptionQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getClientSubscriptionsRelatedByCreatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ClientSubscriptionsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClientSubscription[] List of ClientSubscription objects
     */
    public function getClientSubscriptionsRelatedByCreatedByJoinSubscription($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientSubscriptionQuery::create(null, $criteria);
        $query->joinWith('Subscription', $join_behavior);

        return $this->getClientSubscriptionsRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collClientSubscriptionsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClientSubscriptionsRelatedByUpdatedBy()
     */
    public function clearClientSubscriptionsRelatedByUpdatedBy()
    {
        $this->collClientSubscriptionsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collClientSubscriptionsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collClientSubscriptionsRelatedByUpdatedBy collection to an empty array (like clearcollClientSubscriptionsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientSubscriptionsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collClientSubscriptionsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collClientSubscriptionsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collClientSubscriptionsRelatedByUpdatedBy->setModel('ClientSubscription');
    }

    /**
     * Gets an array of ClientSubscription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClientSubscription[] List of ClientSubscription objects
     * @throws PropelException
     */
    public function getClientSubscriptionsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collClientSubscriptionsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientSubscriptionsRelatedByUpdatedBy) {
                // return empty collection
                $this->initClientSubscriptionsRelatedByUpdatedBy();
            } else {
                $collClientSubscriptionsRelatedByUpdatedBy = ClientSubscriptionQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collClientSubscriptionsRelatedByUpdatedBy;
                }
                $this->collClientSubscriptionsRelatedByUpdatedBy = $collClientSubscriptionsRelatedByUpdatedBy;
            }
        }

        return $this->collClientSubscriptionsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of ClientSubscriptionRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $clientSubscriptionsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setClientSubscriptionsRelatedByUpdatedBy(PropelCollection $clientSubscriptionsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion = $this->getClientSubscriptionsRelatedByUpdatedBy(new Criteria(), $con)->diff($clientSubscriptionsRelatedByUpdatedBy);

        foreach ($this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion as $clientSubscriptionRelatedByUpdatedByRemoved) {
            $clientSubscriptionRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collClientSubscriptionsRelatedByUpdatedBy = null;
        foreach ($clientSubscriptionsRelatedByUpdatedBy as $clientSubscriptionRelatedByUpdatedBy) {
            $this->addClientSubscriptionRelatedByUpdatedBy($clientSubscriptionRelatedByUpdatedBy);
        }

        $this->collClientSubscriptionsRelatedByUpdatedBy = $clientSubscriptionsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related ClientSubscription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ClientSubscription objects.
     * @throws PropelException
     */
    public function countClientSubscriptionsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collClientSubscriptionsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collClientSubscriptionsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = ClientSubscriptionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collClientSubscriptionsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a ClientSubscription object to this object
     * through the ClientSubscription foreign key attribute.
     *
     * @param    ClientSubscription $l ClientSubscription
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addClientSubscriptionRelatedByUpdatedBy(ClientSubscription $l)
    {
        if ($this->collClientSubscriptionsRelatedByUpdatedBy === null) {
            $this->initClientSubscriptionsRelatedByUpdatedBy();
        }
        if (!$this->collClientSubscriptionsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddClientSubscriptionRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	ClientSubscriptionRelatedByUpdatedBy $clientSubscriptionRelatedByUpdatedBy The clientSubscriptionRelatedByUpdatedBy object to add.
     */
    protected function doAddClientSubscriptionRelatedByUpdatedBy($clientSubscriptionRelatedByUpdatedBy)
    {
        $this->collClientSubscriptionsRelatedByUpdatedBy[]= $clientSubscriptionRelatedByUpdatedBy;
        $clientSubscriptionRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	ClientSubscriptionRelatedByUpdatedBy $clientSubscriptionRelatedByUpdatedBy The clientSubscriptionRelatedByUpdatedBy object to remove.
     */
    public function removeClientSubscriptionRelatedByUpdatedBy($clientSubscriptionRelatedByUpdatedBy)
    {
        if ($this->getClientSubscriptionsRelatedByUpdatedBy()->contains($clientSubscriptionRelatedByUpdatedBy)) {
            $this->collClientSubscriptionsRelatedByUpdatedBy->remove($this->collClientSubscriptionsRelatedByUpdatedBy->search($clientSubscriptionRelatedByUpdatedBy));
            if (null === $this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion) {
                $this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion = clone $this->collClientSubscriptionsRelatedByUpdatedBy;
                $this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->clientSubscriptionsRelatedByUpdatedByScheduledForDeletion[]= $clientSubscriptionRelatedByUpdatedBy;
            $clientSubscriptionRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ClientSubscriptionsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClientSubscription[] List of ClientSubscription objects
     */
    public function getClientSubscriptionsRelatedByUpdatedByJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientSubscriptionQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getClientSubscriptionsRelatedByUpdatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ClientSubscriptionsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClientSubscription[] List of ClientSubscription objects
     */
    public function getClientSubscriptionsRelatedByUpdatedByJoinSubscription($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClientSubscriptionQuery::create(null, $criteria);
        $query->joinWith('Subscription', $join_behavior);

        return $this->getClientSubscriptionsRelatedByUpdatedBy($query, $con);
    }

    /**
     * Clears out the collTravelsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTravelsRelatedByCreatedBy()
     */
    public function clearTravelsRelatedByCreatedBy()
    {
        $this->collTravelsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTravelsRelatedByCreatedBy collection.
     *
     * By default this just sets the collTravelsRelatedByCreatedBy collection to an empty array (like clearcollTravelsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTravelsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collTravelsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collTravelsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collTravelsRelatedByCreatedBy->setModel('Travel');
    }

    /**
     * Gets an array of Travel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Travel[] List of Travel objects
     * @throws PropelException
     */
    public function getTravelsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByCreatedBy) {
                // return empty collection
                $this->initTravelsRelatedByCreatedBy();
            } else {
                $collTravelsRelatedByCreatedBy = TravelQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTravelsRelatedByCreatedBy;
                }
                $this->collTravelsRelatedByCreatedBy = $collTravelsRelatedByCreatedBy;
            }
        }

        return $this->collTravelsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of TravelRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $travelsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTravelsRelatedByCreatedBy(PropelCollection $travelsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->travelsRelatedByCreatedByScheduledForDeletion = $this->getTravelsRelatedByCreatedBy(new Criteria(), $con)->diff($travelsRelatedByCreatedBy);

        foreach ($this->travelsRelatedByCreatedByScheduledForDeletion as $travelRelatedByCreatedByRemoved) {
            $travelRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collTravelsRelatedByCreatedBy = null;
        foreach ($travelsRelatedByCreatedBy as $travelRelatedByCreatedBy) {
            $this->addTravelRelatedByCreatedBy($travelRelatedByCreatedBy);
        }

        $this->collTravelsRelatedByCreatedBy = $travelsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Travel objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Travel objects.
     * @throws PropelException
     */
    public function countTravelsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = TravelQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collTravelsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Travel object to this object
     * through the Travel foreign key attribute.
     *
     * @param    Travel $l Travel
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addTravelRelatedByCreatedBy(Travel $l)
    {
        if ($this->collTravelsRelatedByCreatedBy === null) {
            $this->initTravelsRelatedByCreatedBy();
        }
        if (!$this->collTravelsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTravelRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	TravelRelatedByCreatedBy $travelRelatedByCreatedBy The travelRelatedByCreatedBy object to add.
     */
    protected function doAddTravelRelatedByCreatedBy($travelRelatedByCreatedBy)
    {
        $this->collTravelsRelatedByCreatedBy[]= $travelRelatedByCreatedBy;
        $travelRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	TravelRelatedByCreatedBy $travelRelatedByCreatedBy The travelRelatedByCreatedBy object to remove.
     */
    public function removeTravelRelatedByCreatedBy($travelRelatedByCreatedBy)
    {
        if ($this->getTravelsRelatedByCreatedBy()->contains($travelRelatedByCreatedBy)) {
            $this->collTravelsRelatedByCreatedBy->remove($this->collTravelsRelatedByCreatedBy->search($travelRelatedByCreatedBy));
            if (null === $this->travelsRelatedByCreatedByScheduledForDeletion) {
                $this->travelsRelatedByCreatedByScheduledForDeletion = clone $this->collTravelsRelatedByCreatedBy;
                $this->travelsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->travelsRelatedByCreatedByScheduledForDeletion[]= $travelRelatedByCreatedBy;
            $travelRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related TravelsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByCreatedByJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getTravelsRelatedByCreatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related TravelsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByCreatedByJoinStationRelatedByStationInId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('StationRelatedByStationInId', $join_behavior);

        return $this->getTravelsRelatedByCreatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related TravelsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByCreatedByJoinStationRelatedByStationOutId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('StationRelatedByStationOutId', $join_behavior);

        return $this->getTravelsRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collTravelsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTravelsRelatedByUpdatedBy()
     */
    public function clearTravelsRelatedByUpdatedBy()
    {
        $this->collTravelsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTravelsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collTravelsRelatedByUpdatedBy collection to an empty array (like clearcollTravelsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTravelsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collTravelsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collTravelsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collTravelsRelatedByUpdatedBy->setModel('Travel');
    }

    /**
     * Gets an array of Travel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Travel[] List of Travel objects
     * @throws PropelException
     */
    public function getTravelsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByUpdatedBy) {
                // return empty collection
                $this->initTravelsRelatedByUpdatedBy();
            } else {
                $collTravelsRelatedByUpdatedBy = TravelQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTravelsRelatedByUpdatedBy;
                }
                $this->collTravelsRelatedByUpdatedBy = $collTravelsRelatedByUpdatedBy;
            }
        }

        return $this->collTravelsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of TravelRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $travelsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTravelsRelatedByUpdatedBy(PropelCollection $travelsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->travelsRelatedByUpdatedByScheduledForDeletion = $this->getTravelsRelatedByUpdatedBy(new Criteria(), $con)->diff($travelsRelatedByUpdatedBy);

        foreach ($this->travelsRelatedByUpdatedByScheduledForDeletion as $travelRelatedByUpdatedByRemoved) {
            $travelRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collTravelsRelatedByUpdatedBy = null;
        foreach ($travelsRelatedByUpdatedBy as $travelRelatedByUpdatedBy) {
            $this->addTravelRelatedByUpdatedBy($travelRelatedByUpdatedBy);
        }

        $this->collTravelsRelatedByUpdatedBy = $travelsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Travel objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Travel objects.
     * @throws PropelException
     */
    public function countTravelsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = TravelQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collTravelsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Travel object to this object
     * through the Travel foreign key attribute.
     *
     * @param    Travel $l Travel
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addTravelRelatedByUpdatedBy(Travel $l)
    {
        if ($this->collTravelsRelatedByUpdatedBy === null) {
            $this->initTravelsRelatedByUpdatedBy();
        }
        if (!$this->collTravelsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTravelRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	TravelRelatedByUpdatedBy $travelRelatedByUpdatedBy The travelRelatedByUpdatedBy object to add.
     */
    protected function doAddTravelRelatedByUpdatedBy($travelRelatedByUpdatedBy)
    {
        $this->collTravelsRelatedByUpdatedBy[]= $travelRelatedByUpdatedBy;
        $travelRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	TravelRelatedByUpdatedBy $travelRelatedByUpdatedBy The travelRelatedByUpdatedBy object to remove.
     */
    public function removeTravelRelatedByUpdatedBy($travelRelatedByUpdatedBy)
    {
        if ($this->getTravelsRelatedByUpdatedBy()->contains($travelRelatedByUpdatedBy)) {
            $this->collTravelsRelatedByUpdatedBy->remove($this->collTravelsRelatedByUpdatedBy->search($travelRelatedByUpdatedBy));
            if (null === $this->travelsRelatedByUpdatedByScheduledForDeletion) {
                $this->travelsRelatedByUpdatedByScheduledForDeletion = clone $this->collTravelsRelatedByUpdatedBy;
                $this->travelsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->travelsRelatedByUpdatedByScheduledForDeletion[]= $travelRelatedByUpdatedBy;
            $travelRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related TravelsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByUpdatedByJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getTravelsRelatedByUpdatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related TravelsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByUpdatedByJoinStationRelatedByStationInId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('StationRelatedByStationInId', $join_behavior);

        return $this->getTravelsRelatedByUpdatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related TravelsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByUpdatedByJoinStationRelatedByStationOutId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('StationRelatedByStationOutId', $join_behavior);

        return $this->getTravelsRelatedByUpdatedBy($query, $con);
    }

    /**
     * Clears out the collContactsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactsRelatedByCreatedBy()
     */
    public function clearContactsRelatedByCreatedBy()
    {
        $this->collContactsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactsRelatedByCreatedBy collection.
     *
     * By default this just sets the collContactsRelatedByCreatedBy collection to an empty array (like clearcollContactsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collContactsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collContactsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collContactsRelatedByCreatedBy->setModel('Contact');
    }

    /**
     * Gets an array of Contact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Contact[] List of Contact objects
     * @throws PropelException
     */
    public function getContactsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContactsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactsRelatedByCreatedBy) {
                // return empty collection
                $this->initContactsRelatedByCreatedBy();
            } else {
                $collContactsRelatedByCreatedBy = ContactQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContactsRelatedByCreatedBy;
                }
                $this->collContactsRelatedByCreatedBy = $collContactsRelatedByCreatedBy;
            }
        }

        return $this->collContactsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of ContactRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contactsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContactsRelatedByCreatedBy(PropelCollection $contactsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->contactsRelatedByCreatedByScheduledForDeletion = $this->getContactsRelatedByCreatedBy(new Criteria(), $con)->diff($contactsRelatedByCreatedBy);

        foreach ($this->contactsRelatedByCreatedByScheduledForDeletion as $contactRelatedByCreatedByRemoved) {
            $contactRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collContactsRelatedByCreatedBy = null;
        foreach ($contactsRelatedByCreatedBy as $contactRelatedByCreatedBy) {
            $this->addContactRelatedByCreatedBy($contactRelatedByCreatedBy);
        }

        $this->collContactsRelatedByCreatedBy = $contactsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Contact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Contact objects.
     * @throws PropelException
     */
    public function countContactsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContactsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = ContactQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a BaseContact object to this object
     * through the BaseContact foreign key attribute.
     *
     * @param    BaseContact $l BaseContact
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addContactRelatedByCreatedBy(BaseContact $l)
    {
        if ($this->collContactsRelatedByCreatedBy === null) {
            $this->initContactsRelatedByCreatedBy();
        }
        if (!$this->collContactsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContactRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	ContactRelatedByCreatedBy $contactRelatedByCreatedBy The contactRelatedByCreatedBy object to add.
     */
    protected function doAddContactRelatedByCreatedBy($contactRelatedByCreatedBy)
    {
        $this->collContactsRelatedByCreatedBy[]= $contactRelatedByCreatedBy;
        $contactRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	ContactRelatedByCreatedBy $contactRelatedByCreatedBy The contactRelatedByCreatedBy object to remove.
     */
    public function removeContactRelatedByCreatedBy($contactRelatedByCreatedBy)
    {
        if ($this->getContactsRelatedByCreatedBy()->contains($contactRelatedByCreatedBy)) {
            $this->collContactsRelatedByCreatedBy->remove($this->collContactsRelatedByCreatedBy->search($contactRelatedByCreatedBy));
            if (null === $this->contactsRelatedByCreatedByScheduledForDeletion) {
                $this->contactsRelatedByCreatedByScheduledForDeletion = clone $this->collContactsRelatedByCreatedBy;
                $this->contactsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->contactsRelatedByCreatedByScheduledForDeletion[]= $contactRelatedByCreatedBy;
            $contactRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ContactsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByCreatedByJoinContactRelatedByParentId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('ContactRelatedByParentId', $join_behavior);

        return $this->getContactsRelatedByCreatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ContactsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByCreatedByJoinCivility($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('Civility', $join_behavior);

        return $this->getContactsRelatedByCreatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ContactsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByCreatedByJoinService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('Service', $join_behavior);

        return $this->getContactsRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collContactsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactsRelatedByUpdatedBy()
     */
    public function clearContactsRelatedByUpdatedBy()
    {
        $this->collContactsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collContactsRelatedByUpdatedBy collection to an empty array (like clearcollContactsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collContactsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collContactsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collContactsRelatedByUpdatedBy->setModel('Contact');
    }

    /**
     * Gets an array of Contact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Contact[] List of Contact objects
     * @throws PropelException
     */
    public function getContactsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContactsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactsRelatedByUpdatedBy) {
                // return empty collection
                $this->initContactsRelatedByUpdatedBy();
            } else {
                $collContactsRelatedByUpdatedBy = ContactQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContactsRelatedByUpdatedBy;
                }
                $this->collContactsRelatedByUpdatedBy = $collContactsRelatedByUpdatedBy;
            }
        }

        return $this->collContactsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of ContactRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contactsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContactsRelatedByUpdatedBy(PropelCollection $contactsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->contactsRelatedByUpdatedByScheduledForDeletion = $this->getContactsRelatedByUpdatedBy(new Criteria(), $con)->diff($contactsRelatedByUpdatedBy);

        foreach ($this->contactsRelatedByUpdatedByScheduledForDeletion as $contactRelatedByUpdatedByRemoved) {
            $contactRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collContactsRelatedByUpdatedBy = null;
        foreach ($contactsRelatedByUpdatedBy as $contactRelatedByUpdatedBy) {
            $this->addContactRelatedByUpdatedBy($contactRelatedByUpdatedBy);
        }

        $this->collContactsRelatedByUpdatedBy = $contactsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Contact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Contact objects.
     * @throws PropelException
     */
    public function countContactsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContactsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = ContactQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a BaseContact object to this object
     * through the BaseContact foreign key attribute.
     *
     * @param    BaseContact $l BaseContact
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addContactRelatedByUpdatedBy(BaseContact $l)
    {
        if ($this->collContactsRelatedByUpdatedBy === null) {
            $this->initContactsRelatedByUpdatedBy();
        }
        if (!$this->collContactsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContactRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	ContactRelatedByUpdatedBy $contactRelatedByUpdatedBy The contactRelatedByUpdatedBy object to add.
     */
    protected function doAddContactRelatedByUpdatedBy($contactRelatedByUpdatedBy)
    {
        $this->collContactsRelatedByUpdatedBy[]= $contactRelatedByUpdatedBy;
        $contactRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	ContactRelatedByUpdatedBy $contactRelatedByUpdatedBy The contactRelatedByUpdatedBy object to remove.
     */
    public function removeContactRelatedByUpdatedBy($contactRelatedByUpdatedBy)
    {
        if ($this->getContactsRelatedByUpdatedBy()->contains($contactRelatedByUpdatedBy)) {
            $this->collContactsRelatedByUpdatedBy->remove($this->collContactsRelatedByUpdatedBy->search($contactRelatedByUpdatedBy));
            if (null === $this->contactsRelatedByUpdatedByScheduledForDeletion) {
                $this->contactsRelatedByUpdatedByScheduledForDeletion = clone $this->collContactsRelatedByUpdatedBy;
                $this->contactsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->contactsRelatedByUpdatedByScheduledForDeletion[]= $contactRelatedByUpdatedBy;
            $contactRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ContactsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByUpdatedByJoinContactRelatedByParentId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('ContactRelatedByParentId', $join_behavior);

        return $this->getContactsRelatedByUpdatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ContactsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByUpdatedByJoinCivility($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('Civility', $join_behavior);

        return $this->getContactsRelatedByUpdatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related ContactsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByUpdatedByJoinService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('Service', $join_behavior);

        return $this->getContactsRelatedByUpdatedBy($query, $con);
    }

    /**
     * Clears out the collMaillingListsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMaillingListsRelatedByCreatedBy()
     */
    public function clearMaillingListsRelatedByCreatedBy()
    {
        $this->collMaillingListsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collMaillingListsRelatedByCreatedBy collection.
     *
     * By default this just sets the collMaillingListsRelatedByCreatedBy collection to an empty array (like clearcollMaillingListsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMaillingListsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collMaillingListsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collMaillingListsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collMaillingListsRelatedByCreatedBy->setModel('MaillingList');
    }

    /**
     * Gets an array of MaillingList objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|MaillingList[] List of MaillingList objects
     * @throws PropelException
     */
    public function getMaillingListsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collMaillingListsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collMaillingListsRelatedByCreatedBy) {
                // return empty collection
                $this->initMaillingListsRelatedByCreatedBy();
            } else {
                $collMaillingListsRelatedByCreatedBy = MaillingListQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collMaillingListsRelatedByCreatedBy;
                }
                $this->collMaillingListsRelatedByCreatedBy = $collMaillingListsRelatedByCreatedBy;
            }
        }

        return $this->collMaillingListsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of MaillingListRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $maillingListsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setMaillingListsRelatedByCreatedBy(PropelCollection $maillingListsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->maillingListsRelatedByCreatedByScheduledForDeletion = $this->getMaillingListsRelatedByCreatedBy(new Criteria(), $con)->diff($maillingListsRelatedByCreatedBy);

        foreach ($this->maillingListsRelatedByCreatedByScheduledForDeletion as $maillingListRelatedByCreatedByRemoved) {
            $maillingListRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collMaillingListsRelatedByCreatedBy = null;
        foreach ($maillingListsRelatedByCreatedBy as $maillingListRelatedByCreatedBy) {
            $this->addMaillingListRelatedByCreatedBy($maillingListRelatedByCreatedBy);
        }

        $this->collMaillingListsRelatedByCreatedBy = $maillingListsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related MaillingList objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related MaillingList objects.
     * @throws PropelException
     */
    public function countMaillingListsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collMaillingListsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collMaillingListsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = MaillingListQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collMaillingListsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a MaillingList object to this object
     * through the MaillingList foreign key attribute.
     *
     * @param    MaillingList $l MaillingList
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addMaillingListRelatedByCreatedBy(MaillingList $l)
    {
        if ($this->collMaillingListsRelatedByCreatedBy === null) {
            $this->initMaillingListsRelatedByCreatedBy();
        }
        if (!$this->collMaillingListsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddMaillingListRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	MaillingListRelatedByCreatedBy $maillingListRelatedByCreatedBy The maillingListRelatedByCreatedBy object to add.
     */
    protected function doAddMaillingListRelatedByCreatedBy($maillingListRelatedByCreatedBy)
    {
        $this->collMaillingListsRelatedByCreatedBy[]= $maillingListRelatedByCreatedBy;
        $maillingListRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	MaillingListRelatedByCreatedBy $maillingListRelatedByCreatedBy The maillingListRelatedByCreatedBy object to remove.
     */
    public function removeMaillingListRelatedByCreatedBy($maillingListRelatedByCreatedBy)
    {
        if ($this->getMaillingListsRelatedByCreatedBy()->contains($maillingListRelatedByCreatedBy)) {
            $this->collMaillingListsRelatedByCreatedBy->remove($this->collMaillingListsRelatedByCreatedBy->search($maillingListRelatedByCreatedBy));
            if (null === $this->maillingListsRelatedByCreatedByScheduledForDeletion) {
                $this->maillingListsRelatedByCreatedByScheduledForDeletion = clone $this->collMaillingListsRelatedByCreatedBy;
                $this->maillingListsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->maillingListsRelatedByCreatedByScheduledForDeletion[]= $maillingListRelatedByCreatedBy;
            $maillingListRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collMaillingListsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMaillingListsRelatedByUpdatedBy()
     */
    public function clearMaillingListsRelatedByUpdatedBy()
    {
        $this->collMaillingListsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collMaillingListsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collMaillingListsRelatedByUpdatedBy collection to an empty array (like clearcollMaillingListsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMaillingListsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collMaillingListsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collMaillingListsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collMaillingListsRelatedByUpdatedBy->setModel('MaillingList');
    }

    /**
     * Gets an array of MaillingList objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|MaillingList[] List of MaillingList objects
     * @throws PropelException
     */
    public function getMaillingListsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collMaillingListsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collMaillingListsRelatedByUpdatedBy) {
                // return empty collection
                $this->initMaillingListsRelatedByUpdatedBy();
            } else {
                $collMaillingListsRelatedByUpdatedBy = MaillingListQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collMaillingListsRelatedByUpdatedBy;
                }
                $this->collMaillingListsRelatedByUpdatedBy = $collMaillingListsRelatedByUpdatedBy;
            }
        }

        return $this->collMaillingListsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of MaillingListRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $maillingListsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setMaillingListsRelatedByUpdatedBy(PropelCollection $maillingListsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->maillingListsRelatedByUpdatedByScheduledForDeletion = $this->getMaillingListsRelatedByUpdatedBy(new Criteria(), $con)->diff($maillingListsRelatedByUpdatedBy);

        foreach ($this->maillingListsRelatedByUpdatedByScheduledForDeletion as $maillingListRelatedByUpdatedByRemoved) {
            $maillingListRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collMaillingListsRelatedByUpdatedBy = null;
        foreach ($maillingListsRelatedByUpdatedBy as $maillingListRelatedByUpdatedBy) {
            $this->addMaillingListRelatedByUpdatedBy($maillingListRelatedByUpdatedBy);
        }

        $this->collMaillingListsRelatedByUpdatedBy = $maillingListsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related MaillingList objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related MaillingList objects.
     * @throws PropelException
     */
    public function countMaillingListsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collMaillingListsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collMaillingListsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = MaillingListQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collMaillingListsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a MaillingList object to this object
     * through the MaillingList foreign key attribute.
     *
     * @param    MaillingList $l MaillingList
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addMaillingListRelatedByUpdatedBy(MaillingList $l)
    {
        if ($this->collMaillingListsRelatedByUpdatedBy === null) {
            $this->initMaillingListsRelatedByUpdatedBy();
        }
        if (!$this->collMaillingListsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddMaillingListRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	MaillingListRelatedByUpdatedBy $maillingListRelatedByUpdatedBy The maillingListRelatedByUpdatedBy object to add.
     */
    protected function doAddMaillingListRelatedByUpdatedBy($maillingListRelatedByUpdatedBy)
    {
        $this->collMaillingListsRelatedByUpdatedBy[]= $maillingListRelatedByUpdatedBy;
        $maillingListRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	MaillingListRelatedByUpdatedBy $maillingListRelatedByUpdatedBy The maillingListRelatedByUpdatedBy object to remove.
     */
    public function removeMaillingListRelatedByUpdatedBy($maillingListRelatedByUpdatedBy)
    {
        if ($this->getMaillingListsRelatedByUpdatedBy()->contains($maillingListRelatedByUpdatedBy)) {
            $this->collMaillingListsRelatedByUpdatedBy->remove($this->collMaillingListsRelatedByUpdatedBy->search($maillingListRelatedByUpdatedBy));
            if (null === $this->maillingListsRelatedByUpdatedByScheduledForDeletion) {
                $this->maillingListsRelatedByUpdatedByScheduledForDeletion = clone $this->collMaillingListsRelatedByUpdatedBy;
                $this->maillingListsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->maillingListsRelatedByUpdatedByScheduledForDeletion[]= $maillingListRelatedByUpdatedBy;
            $maillingListRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collCartsRelatedByUserId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCartsRelatedByUserId()
     */
    public function clearCartsRelatedByUserId()
    {
        $this->collCartsRelatedByUserId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCartsRelatedByUserId collection.
     *
     * By default this just sets the collCartsRelatedByUserId collection to an empty array (like clearcollCartsRelatedByUserId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCartsRelatedByUserId($overrideExisting = true)
    {
        if (null !== $this->collCartsRelatedByUserId && !$overrideExisting) {
            return;
        }
        $this->collCartsRelatedByUserId = new PropelObjectCollection();
        $this->collCartsRelatedByUserId->setModel('Cart');
    }

    /**
     * Gets an array of Cart objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Cart[] List of Cart objects
     * @throws PropelException
     */
    public function getCartsRelatedByUserId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCartsRelatedByUserId || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartsRelatedByUserId) {
                // return empty collection
                $this->initCartsRelatedByUserId();
            } else {
                $collCartsRelatedByUserId = CartQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUserId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCartsRelatedByUserId;
                }
                $this->collCartsRelatedByUserId = $collCartsRelatedByUserId;
            }
        }

        return $this->collCartsRelatedByUserId;
    }

    /**
     * Sets a collection of CartRelatedByUserId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cartsRelatedByUserId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCartsRelatedByUserId(PropelCollection $cartsRelatedByUserId, PropelPDO $con = null)
    {
        $this->cartsRelatedByUserIdScheduledForDeletion = $this->getCartsRelatedByUserId(new Criteria(), $con)->diff($cartsRelatedByUserId);

        foreach ($this->cartsRelatedByUserIdScheduledForDeletion as $cartRelatedByUserIdRemoved) {
            $cartRelatedByUserIdRemoved->setsfGuardUserRelatedByUserId(null);
        }

        $this->collCartsRelatedByUserId = null;
        foreach ($cartsRelatedByUserId as $cartRelatedByUserId) {
            $this->addCartRelatedByUserId($cartRelatedByUserId);
        }

        $this->collCartsRelatedByUserId = $cartsRelatedByUserId;
    }

    /**
     * Returns the number of related Cart objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Cart objects.
     * @throws PropelException
     */
    public function countCartsRelatedByUserId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCartsRelatedByUserId || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartsRelatedByUserId) {
                return 0;
            } else {
                $query = CartQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUserId($this)
                    ->count($con);
            }
        } else {
            return count($this->collCartsRelatedByUserId);
        }
    }

    /**
     * Method called to associate a Cart object to this object
     * through the Cart foreign key attribute.
     *
     * @param    Cart $l Cart
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCartRelatedByUserId(Cart $l)
    {
        if ($this->collCartsRelatedByUserId === null) {
            $this->initCartsRelatedByUserId();
        }
        if (!$this->collCartsRelatedByUserId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCartRelatedByUserId($l);
        }

        return $this;
    }

    /**
     * @param	CartRelatedByUserId $cartRelatedByUserId The cartRelatedByUserId object to add.
     */
    protected function doAddCartRelatedByUserId($cartRelatedByUserId)
    {
        $this->collCartsRelatedByUserId[]= $cartRelatedByUserId;
        $cartRelatedByUserId->setsfGuardUserRelatedByUserId($this);
    }

    /**
     * @param	CartRelatedByUserId $cartRelatedByUserId The cartRelatedByUserId object to remove.
     */
    public function removeCartRelatedByUserId($cartRelatedByUserId)
    {
        if ($this->getCartsRelatedByUserId()->contains($cartRelatedByUserId)) {
            $this->collCartsRelatedByUserId->remove($this->collCartsRelatedByUserId->search($cartRelatedByUserId));
            if (null === $this->cartsRelatedByUserIdScheduledForDeletion) {
                $this->cartsRelatedByUserIdScheduledForDeletion = clone $this->collCartsRelatedByUserId;
                $this->cartsRelatedByUserIdScheduledForDeletion->clear();
            }
            $this->cartsRelatedByUserIdScheduledForDeletion[]= $cartRelatedByUserId;
            $cartRelatedByUserId->setsfGuardUserRelatedByUserId(null);
        }
    }

    /**
     * Clears out the collCartsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCartsRelatedByCreatedBy()
     */
    public function clearCartsRelatedByCreatedBy()
    {
        $this->collCartsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCartsRelatedByCreatedBy collection.
     *
     * By default this just sets the collCartsRelatedByCreatedBy collection to an empty array (like clearcollCartsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCartsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collCartsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collCartsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collCartsRelatedByCreatedBy->setModel('Cart');
    }

    /**
     * Gets an array of Cart objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Cart[] List of Cart objects
     * @throws PropelException
     */
    public function getCartsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCartsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartsRelatedByCreatedBy) {
                // return empty collection
                $this->initCartsRelatedByCreatedBy();
            } else {
                $collCartsRelatedByCreatedBy = CartQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCartsRelatedByCreatedBy;
                }
                $this->collCartsRelatedByCreatedBy = $collCartsRelatedByCreatedBy;
            }
        }

        return $this->collCartsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of CartRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cartsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCartsRelatedByCreatedBy(PropelCollection $cartsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->cartsRelatedByCreatedByScheduledForDeletion = $this->getCartsRelatedByCreatedBy(new Criteria(), $con)->diff($cartsRelatedByCreatedBy);

        foreach ($this->cartsRelatedByCreatedByScheduledForDeletion as $cartRelatedByCreatedByRemoved) {
            $cartRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collCartsRelatedByCreatedBy = null;
        foreach ($cartsRelatedByCreatedBy as $cartRelatedByCreatedBy) {
            $this->addCartRelatedByCreatedBy($cartRelatedByCreatedBy);
        }

        $this->collCartsRelatedByCreatedBy = $cartsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Cart objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Cart objects.
     * @throws PropelException
     */
    public function countCartsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCartsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = CartQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collCartsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Cart object to this object
     * through the Cart foreign key attribute.
     *
     * @param    Cart $l Cart
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCartRelatedByCreatedBy(Cart $l)
    {
        if ($this->collCartsRelatedByCreatedBy === null) {
            $this->initCartsRelatedByCreatedBy();
        }
        if (!$this->collCartsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCartRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	CartRelatedByCreatedBy $cartRelatedByCreatedBy The cartRelatedByCreatedBy object to add.
     */
    protected function doAddCartRelatedByCreatedBy($cartRelatedByCreatedBy)
    {
        $this->collCartsRelatedByCreatedBy[]= $cartRelatedByCreatedBy;
        $cartRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	CartRelatedByCreatedBy $cartRelatedByCreatedBy The cartRelatedByCreatedBy object to remove.
     */
    public function removeCartRelatedByCreatedBy($cartRelatedByCreatedBy)
    {
        if ($this->getCartsRelatedByCreatedBy()->contains($cartRelatedByCreatedBy)) {
            $this->collCartsRelatedByCreatedBy->remove($this->collCartsRelatedByCreatedBy->search($cartRelatedByCreatedBy));
            if (null === $this->cartsRelatedByCreatedByScheduledForDeletion) {
                $this->cartsRelatedByCreatedByScheduledForDeletion = clone $this->collCartsRelatedByCreatedBy;
                $this->cartsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->cartsRelatedByCreatedByScheduledForDeletion[]= $cartRelatedByCreatedBy;
            $cartRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collCartsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCartsRelatedByUpdatedBy()
     */
    public function clearCartsRelatedByUpdatedBy()
    {
        $this->collCartsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCartsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collCartsRelatedByUpdatedBy collection to an empty array (like clearcollCartsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCartsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collCartsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collCartsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collCartsRelatedByUpdatedBy->setModel('Cart');
    }

    /**
     * Gets an array of Cart objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Cart[] List of Cart objects
     * @throws PropelException
     */
    public function getCartsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCartsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartsRelatedByUpdatedBy) {
                // return empty collection
                $this->initCartsRelatedByUpdatedBy();
            } else {
                $collCartsRelatedByUpdatedBy = CartQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCartsRelatedByUpdatedBy;
                }
                $this->collCartsRelatedByUpdatedBy = $collCartsRelatedByUpdatedBy;
            }
        }

        return $this->collCartsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of CartRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cartsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCartsRelatedByUpdatedBy(PropelCollection $cartsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->cartsRelatedByUpdatedByScheduledForDeletion = $this->getCartsRelatedByUpdatedBy(new Criteria(), $con)->diff($cartsRelatedByUpdatedBy);

        foreach ($this->cartsRelatedByUpdatedByScheduledForDeletion as $cartRelatedByUpdatedByRemoved) {
            $cartRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collCartsRelatedByUpdatedBy = null;
        foreach ($cartsRelatedByUpdatedBy as $cartRelatedByUpdatedBy) {
            $this->addCartRelatedByUpdatedBy($cartRelatedByUpdatedBy);
        }

        $this->collCartsRelatedByUpdatedBy = $cartsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Cart objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Cart objects.
     * @throws PropelException
     */
    public function countCartsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCartsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = CartQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collCartsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Cart object to this object
     * through the Cart foreign key attribute.
     *
     * @param    Cart $l Cart
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCartRelatedByUpdatedBy(Cart $l)
    {
        if ($this->collCartsRelatedByUpdatedBy === null) {
            $this->initCartsRelatedByUpdatedBy();
        }
        if (!$this->collCartsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCartRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	CartRelatedByUpdatedBy $cartRelatedByUpdatedBy The cartRelatedByUpdatedBy object to add.
     */
    protected function doAddCartRelatedByUpdatedBy($cartRelatedByUpdatedBy)
    {
        $this->collCartsRelatedByUpdatedBy[]= $cartRelatedByUpdatedBy;
        $cartRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	CartRelatedByUpdatedBy $cartRelatedByUpdatedBy The cartRelatedByUpdatedBy object to remove.
     */
    public function removeCartRelatedByUpdatedBy($cartRelatedByUpdatedBy)
    {
        if ($this->getCartsRelatedByUpdatedBy()->contains($cartRelatedByUpdatedBy)) {
            $this->collCartsRelatedByUpdatedBy->remove($this->collCartsRelatedByUpdatedBy->search($cartRelatedByUpdatedBy));
            if (null === $this->cartsRelatedByUpdatedByScheduledForDeletion) {
                $this->cartsRelatedByUpdatedByScheduledForDeletion = clone $this->collCartsRelatedByUpdatedBy;
                $this->cartsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->cartsRelatedByUpdatedByScheduledForDeletion[]= $cartRelatedByUpdatedBy;
            $cartRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collCartItemsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCartItemsRelatedByCreatedBy()
     */
    public function clearCartItemsRelatedByCreatedBy()
    {
        $this->collCartItemsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCartItemsRelatedByCreatedBy collection.
     *
     * By default this just sets the collCartItemsRelatedByCreatedBy collection to an empty array (like clearcollCartItemsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCartItemsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collCartItemsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collCartItemsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collCartItemsRelatedByCreatedBy->setModel('CartItem');
    }

    /**
     * Gets an array of CartItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|CartItem[] List of CartItem objects
     * @throws PropelException
     */
    public function getCartItemsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCartItemsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartItemsRelatedByCreatedBy) {
                // return empty collection
                $this->initCartItemsRelatedByCreatedBy();
            } else {
                $collCartItemsRelatedByCreatedBy = CartItemQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCartItemsRelatedByCreatedBy;
                }
                $this->collCartItemsRelatedByCreatedBy = $collCartItemsRelatedByCreatedBy;
            }
        }

        return $this->collCartItemsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of CartItemRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cartItemsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCartItemsRelatedByCreatedBy(PropelCollection $cartItemsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->cartItemsRelatedByCreatedByScheduledForDeletion = $this->getCartItemsRelatedByCreatedBy(new Criteria(), $con)->diff($cartItemsRelatedByCreatedBy);

        foreach ($this->cartItemsRelatedByCreatedByScheduledForDeletion as $cartItemRelatedByCreatedByRemoved) {
            $cartItemRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collCartItemsRelatedByCreatedBy = null;
        foreach ($cartItemsRelatedByCreatedBy as $cartItemRelatedByCreatedBy) {
            $this->addCartItemRelatedByCreatedBy($cartItemRelatedByCreatedBy);
        }

        $this->collCartItemsRelatedByCreatedBy = $cartItemsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related CartItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related CartItem objects.
     * @throws PropelException
     */
    public function countCartItemsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCartItemsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartItemsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = CartItemQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collCartItemsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a CartItem object to this object
     * through the CartItem foreign key attribute.
     *
     * @param    CartItem $l CartItem
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCartItemRelatedByCreatedBy(CartItem $l)
    {
        if ($this->collCartItemsRelatedByCreatedBy === null) {
            $this->initCartItemsRelatedByCreatedBy();
        }
        if (!$this->collCartItemsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCartItemRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	CartItemRelatedByCreatedBy $cartItemRelatedByCreatedBy The cartItemRelatedByCreatedBy object to add.
     */
    protected function doAddCartItemRelatedByCreatedBy($cartItemRelatedByCreatedBy)
    {
        $this->collCartItemsRelatedByCreatedBy[]= $cartItemRelatedByCreatedBy;
        $cartItemRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	CartItemRelatedByCreatedBy $cartItemRelatedByCreatedBy The cartItemRelatedByCreatedBy object to remove.
     */
    public function removeCartItemRelatedByCreatedBy($cartItemRelatedByCreatedBy)
    {
        if ($this->getCartItemsRelatedByCreatedBy()->contains($cartItemRelatedByCreatedBy)) {
            $this->collCartItemsRelatedByCreatedBy->remove($this->collCartItemsRelatedByCreatedBy->search($cartItemRelatedByCreatedBy));
            if (null === $this->cartItemsRelatedByCreatedByScheduledForDeletion) {
                $this->cartItemsRelatedByCreatedByScheduledForDeletion = clone $this->collCartItemsRelatedByCreatedBy;
                $this->cartItemsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->cartItemsRelatedByCreatedByScheduledForDeletion[]= $cartItemRelatedByCreatedBy;
            $cartItemRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related CartItemsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CartItem[] List of CartItem objects
     */
    public function getCartItemsRelatedByCreatedByJoinCart($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CartItemQuery::create(null, $criteria);
        $query->joinWith('Cart', $join_behavior);

        return $this->getCartItemsRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collCartItemsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCartItemsRelatedByUpdatedBy()
     */
    public function clearCartItemsRelatedByUpdatedBy()
    {
        $this->collCartItemsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collCartItemsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collCartItemsRelatedByUpdatedBy collection to an empty array (like clearcollCartItemsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCartItemsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collCartItemsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collCartItemsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collCartItemsRelatedByUpdatedBy->setModel('CartItem');
    }

    /**
     * Gets an array of CartItem objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|CartItem[] List of CartItem objects
     * @throws PropelException
     */
    public function getCartItemsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collCartItemsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartItemsRelatedByUpdatedBy) {
                // return empty collection
                $this->initCartItemsRelatedByUpdatedBy();
            } else {
                $collCartItemsRelatedByUpdatedBy = CartItemQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collCartItemsRelatedByUpdatedBy;
                }
                $this->collCartItemsRelatedByUpdatedBy = $collCartItemsRelatedByUpdatedBy;
            }
        }

        return $this->collCartItemsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of CartItemRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $cartItemsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setCartItemsRelatedByUpdatedBy(PropelCollection $cartItemsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->cartItemsRelatedByUpdatedByScheduledForDeletion = $this->getCartItemsRelatedByUpdatedBy(new Criteria(), $con)->diff($cartItemsRelatedByUpdatedBy);

        foreach ($this->cartItemsRelatedByUpdatedByScheduledForDeletion as $cartItemRelatedByUpdatedByRemoved) {
            $cartItemRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collCartItemsRelatedByUpdatedBy = null;
        foreach ($cartItemsRelatedByUpdatedBy as $cartItemRelatedByUpdatedBy) {
            $this->addCartItemRelatedByUpdatedBy($cartItemRelatedByUpdatedBy);
        }

        $this->collCartItemsRelatedByUpdatedBy = $cartItemsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related CartItem objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related CartItem objects.
     * @throws PropelException
     */
    public function countCartItemsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collCartItemsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collCartItemsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = CartItemQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collCartItemsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a CartItem object to this object
     * through the CartItem foreign key attribute.
     *
     * @param    CartItem $l CartItem
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addCartItemRelatedByUpdatedBy(CartItem $l)
    {
        if ($this->collCartItemsRelatedByUpdatedBy === null) {
            $this->initCartItemsRelatedByUpdatedBy();
        }
        if (!$this->collCartItemsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddCartItemRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	CartItemRelatedByUpdatedBy $cartItemRelatedByUpdatedBy The cartItemRelatedByUpdatedBy object to add.
     */
    protected function doAddCartItemRelatedByUpdatedBy($cartItemRelatedByUpdatedBy)
    {
        $this->collCartItemsRelatedByUpdatedBy[]= $cartItemRelatedByUpdatedBy;
        $cartItemRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	CartItemRelatedByUpdatedBy $cartItemRelatedByUpdatedBy The cartItemRelatedByUpdatedBy object to remove.
     */
    public function removeCartItemRelatedByUpdatedBy($cartItemRelatedByUpdatedBy)
    {
        if ($this->getCartItemsRelatedByUpdatedBy()->contains($cartItemRelatedByUpdatedBy)) {
            $this->collCartItemsRelatedByUpdatedBy->remove($this->collCartItemsRelatedByUpdatedBy->search($cartItemRelatedByUpdatedBy));
            if (null === $this->cartItemsRelatedByUpdatedByScheduledForDeletion) {
                $this->cartItemsRelatedByUpdatedByScheduledForDeletion = clone $this->collCartItemsRelatedByUpdatedBy;
                $this->cartItemsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->cartItemsRelatedByUpdatedByScheduledForDeletion[]= $cartItemRelatedByUpdatedBy;
            $cartItemRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related CartItemsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CartItem[] List of CartItem objects
     */
    public function getCartItemsRelatedByUpdatedByJoinCart($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CartItemQuery::create(null, $criteria);
        $query->joinWith('Cart', $join_behavior);

        return $this->getCartItemsRelatedByUpdatedBy($query, $con);
    }

    /**
     * Clears out the collsfGuardUserPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfGuardUserPermissions()
     */
    public function clearsfGuardUserPermissions()
    {
        $this->collsfGuardUserPermissions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfGuardUserPermissions collection.
     *
     * By default this just sets the collsfGuardUserPermissions collection to an empty array (like clearcollsfGuardUserPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardUserPermissions($overrideExisting = true)
    {
        if (null !== $this->collsfGuardUserPermissions && !$overrideExisting) {
            return;
        }
        $this->collsfGuardUserPermissions = new PropelObjectCollection();
        $this->collsfGuardUserPermissions->setModel('sfGuardUserPermission');
    }

    /**
     * Gets an array of sfGuardUserPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardUserPermission[] List of sfGuardUserPermission objects
     * @throws PropelException
     */
    public function getsfGuardUserPermissions($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardUserPermissions || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardUserPermissions) {
                // return empty collection
                $this->initsfGuardUserPermissions();
            } else {
                $collsfGuardUserPermissions = sfGuardUserPermissionQuery::create(null, $criteria)
                    ->filterBysfGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfGuardUserPermissions;
                }
                $this->collsfGuardUserPermissions = $collsfGuardUserPermissions;
            }
        }

        return $this->collsfGuardUserPermissions;
    }

    /**
     * Sets a collection of sfGuardUserPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfGuardUserPermissions A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfGuardUserPermissions(PropelCollection $sfGuardUserPermissions, PropelPDO $con = null)
    {
        $this->sfGuardUserPermissionsScheduledForDeletion = $this->getsfGuardUserPermissions(new Criteria(), $con)->diff($sfGuardUserPermissions);

        foreach ($this->sfGuardUserPermissionsScheduledForDeletion as $sfGuardUserPermissionRemoved) {
            $sfGuardUserPermissionRemoved->setsfGuardUser(null);
        }

        $this->collsfGuardUserPermissions = null;
        foreach ($sfGuardUserPermissions as $sfGuardUserPermission) {
            $this->addsfGuardUserPermission($sfGuardUserPermission);
        }

        $this->collsfGuardUserPermissions = $sfGuardUserPermissions;
    }

    /**
     * Returns the number of related sfGuardUserPermission objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfGuardUserPermission objects.
     * @throws PropelException
     */
    public function countsfGuardUserPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardUserPermissions || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardUserPermissions) {
                return 0;
            } else {
                $query = sfGuardUserPermissionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfGuardUserPermissions);
        }
    }

    /**
     * Method called to associate a sfGuardUserPermission object to this object
     * through the sfGuardUserPermission foreign key attribute.
     *
     * @param    sfGuardUserPermission $l sfGuardUserPermission
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addsfGuardUserPermission(sfGuardUserPermission $l)
    {
        if ($this->collsfGuardUserPermissions === null) {
            $this->initsfGuardUserPermissions();
        }
        if (!$this->collsfGuardUserPermissions->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardUserPermission($l);
        }

        return $this;
    }

    /**
     * @param	sfGuardUserPermission $sfGuardUserPermission The sfGuardUserPermission object to add.
     */
    protected function doAddsfGuardUserPermission($sfGuardUserPermission)
    {
        $this->collsfGuardUserPermissions[]= $sfGuardUserPermission;
        $sfGuardUserPermission->setsfGuardUser($this);
    }

    /**
     * @param	sfGuardUserPermission $sfGuardUserPermission The sfGuardUserPermission object to remove.
     */
    public function removesfGuardUserPermission($sfGuardUserPermission)
    {
        if ($this->getsfGuardUserPermissions()->contains($sfGuardUserPermission)) {
            $this->collsfGuardUserPermissions->remove($this->collsfGuardUserPermissions->search($sfGuardUserPermission));
            if (null === $this->sfGuardUserPermissionsScheduledForDeletion) {
                $this->sfGuardUserPermissionsScheduledForDeletion = clone $this->collsfGuardUserPermissions;
                $this->sfGuardUserPermissionsScheduledForDeletion->clear();
            }
            $this->sfGuardUserPermissionsScheduledForDeletion[]= $sfGuardUserPermission;
            $sfGuardUserPermission->setsfGuardUser(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related sfGuardUserPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserPermission[] List of sfGuardUserPermission objects
     */
    public function getsfGuardUserPermissionsJoinsfGuardPermission($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserPermissionQuery::create(null, $criteria);
        $query->joinWith('sfGuardPermission', $join_behavior);

        return $this->getsfGuardUserPermissions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related sfGuardUserPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserPermission[] List of sfGuardUserPermission objects
     */
    public function getsfGuardUserPermissionsJoinsfGuardEntity($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserPermissionQuery::create(null, $criteria);
        $query->joinWith('sfGuardEntity', $join_behavior);

        return $this->getsfGuardUserPermissions($query, $con);
    }

    /**
     * Clears out the collsfGuardUserGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfGuardUserGroups()
     */
    public function clearsfGuardUserGroups()
    {
        $this->collsfGuardUserGroups = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfGuardUserGroups collection.
     *
     * By default this just sets the collsfGuardUserGroups collection to an empty array (like clearcollsfGuardUserGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardUserGroups($overrideExisting = true)
    {
        if (null !== $this->collsfGuardUserGroups && !$overrideExisting) {
            return;
        }
        $this->collsfGuardUserGroups = new PropelObjectCollection();
        $this->collsfGuardUserGroups->setModel('sfGuardUserGroup');
    }

    /**
     * Gets an array of sfGuardUserGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardUserGroup[] List of sfGuardUserGroup objects
     * @throws PropelException
     */
    public function getsfGuardUserGroups($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardUserGroups || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardUserGroups) {
                // return empty collection
                $this->initsfGuardUserGroups();
            } else {
                $collsfGuardUserGroups = sfGuardUserGroupQuery::create(null, $criteria)
                    ->filterBysfGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfGuardUserGroups;
                }
                $this->collsfGuardUserGroups = $collsfGuardUserGroups;
            }
        }

        return $this->collsfGuardUserGroups;
    }

    /**
     * Sets a collection of sfGuardUserGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfGuardUserGroups A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfGuardUserGroups(PropelCollection $sfGuardUserGroups, PropelPDO $con = null)
    {
        $this->sfGuardUserGroupsScheduledForDeletion = $this->getsfGuardUserGroups(new Criteria(), $con)->diff($sfGuardUserGroups);

        foreach ($this->sfGuardUserGroupsScheduledForDeletion as $sfGuardUserGroupRemoved) {
            $sfGuardUserGroupRemoved->setsfGuardUser(null);
        }

        $this->collsfGuardUserGroups = null;
        foreach ($sfGuardUserGroups as $sfGuardUserGroup) {
            $this->addsfGuardUserGroup($sfGuardUserGroup);
        }

        $this->collsfGuardUserGroups = $sfGuardUserGroups;
    }

    /**
     * Returns the number of related sfGuardUserGroup objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfGuardUserGroup objects.
     * @throws PropelException
     */
    public function countsfGuardUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardUserGroups || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardUserGroups) {
                return 0;
            } else {
                $query = sfGuardUserGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfGuardUserGroups);
        }
    }

    /**
     * Method called to associate a sfGuardUserGroup object to this object
     * through the sfGuardUserGroup foreign key attribute.
     *
     * @param    sfGuardUserGroup $l sfGuardUserGroup
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addsfGuardUserGroup(sfGuardUserGroup $l)
    {
        if ($this->collsfGuardUserGroups === null) {
            $this->initsfGuardUserGroups();
        }
        if (!$this->collsfGuardUserGroups->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardUserGroup($l);
        }

        return $this;
    }

    /**
     * @param	sfGuardUserGroup $sfGuardUserGroup The sfGuardUserGroup object to add.
     */
    protected function doAddsfGuardUserGroup($sfGuardUserGroup)
    {
        $this->collsfGuardUserGroups[]= $sfGuardUserGroup;
        $sfGuardUserGroup->setsfGuardUser($this);
    }

    /**
     * @param	sfGuardUserGroup $sfGuardUserGroup The sfGuardUserGroup object to remove.
     */
    public function removesfGuardUserGroup($sfGuardUserGroup)
    {
        if ($this->getsfGuardUserGroups()->contains($sfGuardUserGroup)) {
            $this->collsfGuardUserGroups->remove($this->collsfGuardUserGroups->search($sfGuardUserGroup));
            if (null === $this->sfGuardUserGroupsScheduledForDeletion) {
                $this->sfGuardUserGroupsScheduledForDeletion = clone $this->collsfGuardUserGroups;
                $this->sfGuardUserGroupsScheduledForDeletion->clear();
            }
            $this->sfGuardUserGroupsScheduledForDeletion[]= $sfGuardUserGroup;
            $sfGuardUserGroup->setsfGuardUser(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related sfGuardUserGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserGroup[] List of sfGuardUserGroup objects
     */
    public function getsfGuardUserGroupsJoinsfGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserGroupQuery::create(null, $criteria);
        $query->joinWith('sfGuardGroup', $join_behavior);

        return $this->getsfGuardUserGroups($query, $con);
    }

    /**
     * Clears out the collsfGuardRememberKeys collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfGuardRememberKeys()
     */
    public function clearsfGuardRememberKeys()
    {
        $this->collsfGuardRememberKeys = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfGuardRememberKeys collection.
     *
     * By default this just sets the collsfGuardRememberKeys collection to an empty array (like clearcollsfGuardRememberKeys());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardRememberKeys($overrideExisting = true)
    {
        if (null !== $this->collsfGuardRememberKeys && !$overrideExisting) {
            return;
        }
        $this->collsfGuardRememberKeys = new PropelObjectCollection();
        $this->collsfGuardRememberKeys->setModel('sfGuardRememberKey');
    }

    /**
     * Gets an array of sfGuardRememberKey objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardRememberKey[] List of sfGuardRememberKey objects
     * @throws PropelException
     */
    public function getsfGuardRememberKeys($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardRememberKeys || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardRememberKeys) {
                // return empty collection
                $this->initsfGuardRememberKeys();
            } else {
                $collsfGuardRememberKeys = sfGuardRememberKeyQuery::create(null, $criteria)
                    ->filterBysfGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfGuardRememberKeys;
                }
                $this->collsfGuardRememberKeys = $collsfGuardRememberKeys;
            }
        }

        return $this->collsfGuardRememberKeys;
    }

    /**
     * Sets a collection of sfGuardRememberKey objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfGuardRememberKeys A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfGuardRememberKeys(PropelCollection $sfGuardRememberKeys, PropelPDO $con = null)
    {
        $this->sfGuardRememberKeysScheduledForDeletion = $this->getsfGuardRememberKeys(new Criteria(), $con)->diff($sfGuardRememberKeys);

        foreach ($this->sfGuardRememberKeysScheduledForDeletion as $sfGuardRememberKeyRemoved) {
            $sfGuardRememberKeyRemoved->setsfGuardUser(null);
        }

        $this->collsfGuardRememberKeys = null;
        foreach ($sfGuardRememberKeys as $sfGuardRememberKey) {
            $this->addsfGuardRememberKey($sfGuardRememberKey);
        }

        $this->collsfGuardRememberKeys = $sfGuardRememberKeys;
    }

    /**
     * Returns the number of related sfGuardRememberKey objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfGuardRememberKey objects.
     * @throws PropelException
     */
    public function countsfGuardRememberKeys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardRememberKeys || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardRememberKeys) {
                return 0;
            } else {
                $query = sfGuardRememberKeyQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfGuardRememberKeys);
        }
    }

    /**
     * Method called to associate a sfGuardRememberKey object to this object
     * through the sfGuardRememberKey foreign key attribute.
     *
     * @param    sfGuardRememberKey $l sfGuardRememberKey
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addsfGuardRememberKey(sfGuardRememberKey $l)
    {
        if ($this->collsfGuardRememberKeys === null) {
            $this->initsfGuardRememberKeys();
        }
        if (!$this->collsfGuardRememberKeys->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardRememberKey($l);
        }

        return $this;
    }

    /**
     * @param	sfGuardRememberKey $sfGuardRememberKey The sfGuardRememberKey object to add.
     */
    protected function doAddsfGuardRememberKey($sfGuardRememberKey)
    {
        $this->collsfGuardRememberKeys[]= $sfGuardRememberKey;
        $sfGuardRememberKey->setsfGuardUser($this);
    }

    /**
     * @param	sfGuardRememberKey $sfGuardRememberKey The sfGuardRememberKey object to remove.
     */
    public function removesfGuardRememberKey($sfGuardRememberKey)
    {
        if ($this->getsfGuardRememberKeys()->contains($sfGuardRememberKey)) {
            $this->collsfGuardRememberKeys->remove($this->collsfGuardRememberKeys->search($sfGuardRememberKey));
            if (null === $this->sfGuardRememberKeysScheduledForDeletion) {
                $this->sfGuardRememberKeysScheduledForDeletion = clone $this->collsfGuardRememberKeys;
                $this->sfGuardRememberKeysScheduledForDeletion->clear();
            }
            $this->sfGuardRememberKeysScheduledForDeletion[]= $sfGuardRememberKey;
            $sfGuardRememberKey->setsfGuardUser(null);
        }
    }

    /**
     * Clears out the collAnalytics collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalytics()
     */
    public function clearAnalytics()
    {
        $this->collAnalytics = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAnalytics collection.
     *
     * By default this just sets the collAnalytics collection to an empty array (like clearcollAnalytics());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalytics($overrideExisting = true)
    {
        if (null !== $this->collAnalytics && !$overrideExisting) {
            return;
        }
        $this->collAnalytics = new PropelObjectCollection();
        $this->collAnalytics->setModel('Analytic');
    }

    /**
     * Gets an array of Analytic objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Analytic[] List of Analytic objects
     * @throws PropelException
     */
    public function getAnalytics($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAnalytics || null !== $criteria) {
            if ($this->isNew() && null === $this->collAnalytics) {
                // return empty collection
                $this->initAnalytics();
            } else {
                $collAnalytics = AnalyticQuery::create(null, $criteria)
                    ->filterBysfGuardUser($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAnalytics;
                }
                $this->collAnalytics = $collAnalytics;
            }
        }

        return $this->collAnalytics;
    }

    /**
     * Sets a collection of Analytic objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $analytics A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAnalytics(PropelCollection $analytics, PropelPDO $con = null)
    {
        $this->analyticsScheduledForDeletion = $this->getAnalytics(new Criteria(), $con)->diff($analytics);

        foreach ($this->analyticsScheduledForDeletion as $analyticRemoved) {
            $analyticRemoved->setsfGuardUser(null);
        }

        $this->collAnalytics = null;
        foreach ($analytics as $analytic) {
            $this->addAnalytic($analytic);
        }

        $this->collAnalytics = $analytics;
    }

    /**
     * Returns the number of related Analytic objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Analytic objects.
     * @throws PropelException
     */
    public function countAnalytics(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAnalytics || null !== $criteria) {
            if ($this->isNew() && null === $this->collAnalytics) {
                return 0;
            } else {
                $query = AnalyticQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUser($this)
                    ->count($con);
            }
        } else {
            return count($this->collAnalytics);
        }
    }

    /**
     * Method called to associate a Analytic object to this object
     * through the Analytic foreign key attribute.
     *
     * @param    Analytic $l Analytic
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addAnalytic(Analytic $l)
    {
        if ($this->collAnalytics === null) {
            $this->initAnalytics();
        }
        if (!$this->collAnalytics->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAnalytic($l);
        }

        return $this;
    }

    /**
     * @param	Analytic $analytic The analytic object to add.
     */
    protected function doAddAnalytic($analytic)
    {
        $this->collAnalytics[]= $analytic;
        $analytic->setsfGuardUser($this);
    }

    /**
     * @param	Analytic $analytic The analytic object to remove.
     */
    public function removeAnalytic($analytic)
    {
        if ($this->getAnalytics()->contains($analytic)) {
            $this->collAnalytics->remove($this->collAnalytics->search($analytic));
            if (null === $this->analyticsScheduledForDeletion) {
                $this->analyticsScheduledForDeletion = clone $this->collAnalytics;
                $this->analyticsScheduledForDeletion->clear();
            }
            $this->analyticsScheduledForDeletion[]= $analytic;
            $analytic->setsfGuardUser(null);
        }
    }

    /**
     * Clears out the collHistorysRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHistorysRelatedByCreatedBy()
     */
    public function clearHistorysRelatedByCreatedBy()
    {
        $this->collHistorysRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collHistorysRelatedByCreatedBy collection.
     *
     * By default this just sets the collHistorysRelatedByCreatedBy collection to an empty array (like clearcollHistorysRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistorysRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collHistorysRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collHistorysRelatedByCreatedBy = new PropelObjectCollection();
        $this->collHistorysRelatedByCreatedBy->setModel('History');
    }

    /**
     * Gets an array of History objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|History[] List of History objects
     * @throws PropelException
     */
    public function getHistorysRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collHistorysRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collHistorysRelatedByCreatedBy) {
                // return empty collection
                $this->initHistorysRelatedByCreatedBy();
            } else {
                $collHistorysRelatedByCreatedBy = HistoryQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collHistorysRelatedByCreatedBy;
                }
                $this->collHistorysRelatedByCreatedBy = $collHistorysRelatedByCreatedBy;
            }
        }

        return $this->collHistorysRelatedByCreatedBy;
    }

    /**
     * Sets a collection of HistoryRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $historysRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setHistorysRelatedByCreatedBy(PropelCollection $historysRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->historysRelatedByCreatedByScheduledForDeletion = $this->getHistorysRelatedByCreatedBy(new Criteria(), $con)->diff($historysRelatedByCreatedBy);

        foreach ($this->historysRelatedByCreatedByScheduledForDeletion as $historyRelatedByCreatedByRemoved) {
            $historyRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collHistorysRelatedByCreatedBy = null;
        foreach ($historysRelatedByCreatedBy as $historyRelatedByCreatedBy) {
            $this->addHistoryRelatedByCreatedBy($historyRelatedByCreatedBy);
        }

        $this->collHistorysRelatedByCreatedBy = $historysRelatedByCreatedBy;
    }

    /**
     * Returns the number of related History objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related History objects.
     * @throws PropelException
     */
    public function countHistorysRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collHistorysRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collHistorysRelatedByCreatedBy) {
                return 0;
            } else {
                $query = HistoryQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collHistorysRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a History object to this object
     * through the History foreign key attribute.
     *
     * @param    History $l History
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addHistoryRelatedByCreatedBy(History $l)
    {
        if ($this->collHistorysRelatedByCreatedBy === null) {
            $this->initHistorysRelatedByCreatedBy();
        }
        if (!$this->collHistorysRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddHistoryRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	HistoryRelatedByCreatedBy $historyRelatedByCreatedBy The historyRelatedByCreatedBy object to add.
     */
    protected function doAddHistoryRelatedByCreatedBy($historyRelatedByCreatedBy)
    {
        $this->collHistorysRelatedByCreatedBy[]= $historyRelatedByCreatedBy;
        $historyRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	HistoryRelatedByCreatedBy $historyRelatedByCreatedBy The historyRelatedByCreatedBy object to remove.
     */
    public function removeHistoryRelatedByCreatedBy($historyRelatedByCreatedBy)
    {
        if ($this->getHistorysRelatedByCreatedBy()->contains($historyRelatedByCreatedBy)) {
            $this->collHistorysRelatedByCreatedBy->remove($this->collHistorysRelatedByCreatedBy->search($historyRelatedByCreatedBy));
            if (null === $this->historysRelatedByCreatedByScheduledForDeletion) {
                $this->historysRelatedByCreatedByScheduledForDeletion = clone $this->collHistorysRelatedByCreatedBy;
                $this->historysRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->historysRelatedByCreatedByScheduledForDeletion[]= $historyRelatedByCreatedBy;
            $historyRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collHistorysRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHistorysRelatedByUpdatedBy()
     */
    public function clearHistorysRelatedByUpdatedBy()
    {
        $this->collHistorysRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collHistorysRelatedByUpdatedBy collection.
     *
     * By default this just sets the collHistorysRelatedByUpdatedBy collection to an empty array (like clearcollHistorysRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistorysRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collHistorysRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collHistorysRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collHistorysRelatedByUpdatedBy->setModel('History');
    }

    /**
     * Gets an array of History objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|History[] List of History objects
     * @throws PropelException
     */
    public function getHistorysRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collHistorysRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collHistorysRelatedByUpdatedBy) {
                // return empty collection
                $this->initHistorysRelatedByUpdatedBy();
            } else {
                $collHistorysRelatedByUpdatedBy = HistoryQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collHistorysRelatedByUpdatedBy;
                }
                $this->collHistorysRelatedByUpdatedBy = $collHistorysRelatedByUpdatedBy;
            }
        }

        return $this->collHistorysRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of HistoryRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $historysRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setHistorysRelatedByUpdatedBy(PropelCollection $historysRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->historysRelatedByUpdatedByScheduledForDeletion = $this->getHistorysRelatedByUpdatedBy(new Criteria(), $con)->diff($historysRelatedByUpdatedBy);

        foreach ($this->historysRelatedByUpdatedByScheduledForDeletion as $historyRelatedByUpdatedByRemoved) {
            $historyRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collHistorysRelatedByUpdatedBy = null;
        foreach ($historysRelatedByUpdatedBy as $historyRelatedByUpdatedBy) {
            $this->addHistoryRelatedByUpdatedBy($historyRelatedByUpdatedBy);
        }

        $this->collHistorysRelatedByUpdatedBy = $historysRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related History objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related History objects.
     * @throws PropelException
     */
    public function countHistorysRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collHistorysRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collHistorysRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = HistoryQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collHistorysRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a History object to this object
     * through the History foreign key attribute.
     *
     * @param    History $l History
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addHistoryRelatedByUpdatedBy(History $l)
    {
        if ($this->collHistorysRelatedByUpdatedBy === null) {
            $this->initHistorysRelatedByUpdatedBy();
        }
        if (!$this->collHistorysRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddHistoryRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	HistoryRelatedByUpdatedBy $historyRelatedByUpdatedBy The historyRelatedByUpdatedBy object to add.
     */
    protected function doAddHistoryRelatedByUpdatedBy($historyRelatedByUpdatedBy)
    {
        $this->collHistorysRelatedByUpdatedBy[]= $historyRelatedByUpdatedBy;
        $historyRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	HistoryRelatedByUpdatedBy $historyRelatedByUpdatedBy The historyRelatedByUpdatedBy object to remove.
     */
    public function removeHistoryRelatedByUpdatedBy($historyRelatedByUpdatedBy)
    {
        if ($this->getHistorysRelatedByUpdatedBy()->contains($historyRelatedByUpdatedBy)) {
            $this->collHistorysRelatedByUpdatedBy->remove($this->collHistorysRelatedByUpdatedBy->search($historyRelatedByUpdatedBy));
            if (null === $this->historysRelatedByUpdatedByScheduledForDeletion) {
                $this->historysRelatedByUpdatedByScheduledForDeletion = clone $this->collHistorysRelatedByUpdatedBy;
                $this->historysRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->historysRelatedByUpdatedByScheduledForDeletion[]= $historyRelatedByUpdatedBy;
            $historyRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collsfcSettingsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfcSettingsRelatedByCreatedBy()
     */
    public function clearsfcSettingsRelatedByCreatedBy()
    {
        $this->collsfcSettingsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfcSettingsRelatedByCreatedBy collection.
     *
     * By default this just sets the collsfcSettingsRelatedByCreatedBy collection to an empty array (like clearcollsfcSettingsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfcSettingsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collsfcSettingsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collsfcSettingsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collsfcSettingsRelatedByCreatedBy->setModel('sfcSetting');
    }

    /**
     * Gets an array of sfcSetting objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfcSetting[] List of sfcSetting objects
     * @throws PropelException
     */
    public function getsfcSettingsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfcSettingsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfcSettingsRelatedByCreatedBy) {
                // return empty collection
                $this->initsfcSettingsRelatedByCreatedBy();
            } else {
                $collsfcSettingsRelatedByCreatedBy = sfcSettingQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfcSettingsRelatedByCreatedBy;
                }
                $this->collsfcSettingsRelatedByCreatedBy = $collsfcSettingsRelatedByCreatedBy;
            }
        }

        return $this->collsfcSettingsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of sfcSettingRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfcSettingsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfcSettingsRelatedByCreatedBy(PropelCollection $sfcSettingsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->sfcSettingsRelatedByCreatedByScheduledForDeletion = $this->getsfcSettingsRelatedByCreatedBy(new Criteria(), $con)->diff($sfcSettingsRelatedByCreatedBy);

        foreach ($this->sfcSettingsRelatedByCreatedByScheduledForDeletion as $sfcSettingRelatedByCreatedByRemoved) {
            $sfcSettingRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collsfcSettingsRelatedByCreatedBy = null;
        foreach ($sfcSettingsRelatedByCreatedBy as $sfcSettingRelatedByCreatedBy) {
            $this->addsfcSettingRelatedByCreatedBy($sfcSettingRelatedByCreatedBy);
        }

        $this->collsfcSettingsRelatedByCreatedBy = $sfcSettingsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related sfcSetting objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfcSetting objects.
     * @throws PropelException
     */
    public function countsfcSettingsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfcSettingsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfcSettingsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = sfcSettingQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfcSettingsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a sfcSetting object to this object
     * through the sfcSetting foreign key attribute.
     *
     * @param    sfcSetting $l sfcSetting
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addsfcSettingRelatedByCreatedBy(sfcSetting $l)
    {
        if ($this->collsfcSettingsRelatedByCreatedBy === null) {
            $this->initsfcSettingsRelatedByCreatedBy();
        }
        if (!$this->collsfcSettingsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfcSettingRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	sfcSettingRelatedByCreatedBy $sfcSettingRelatedByCreatedBy The sfcSettingRelatedByCreatedBy object to add.
     */
    protected function doAddsfcSettingRelatedByCreatedBy($sfcSettingRelatedByCreatedBy)
    {
        $this->collsfcSettingsRelatedByCreatedBy[]= $sfcSettingRelatedByCreatedBy;
        $sfcSettingRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	sfcSettingRelatedByCreatedBy $sfcSettingRelatedByCreatedBy The sfcSettingRelatedByCreatedBy object to remove.
     */
    public function removesfcSettingRelatedByCreatedBy($sfcSettingRelatedByCreatedBy)
    {
        if ($this->getsfcSettingsRelatedByCreatedBy()->contains($sfcSettingRelatedByCreatedBy)) {
            $this->collsfcSettingsRelatedByCreatedBy->remove($this->collsfcSettingsRelatedByCreatedBy->search($sfcSettingRelatedByCreatedBy));
            if (null === $this->sfcSettingsRelatedByCreatedByScheduledForDeletion) {
                $this->sfcSettingsRelatedByCreatedByScheduledForDeletion = clone $this->collsfcSettingsRelatedByCreatedBy;
                $this->sfcSettingsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->sfcSettingsRelatedByCreatedByScheduledForDeletion[]= $sfcSettingRelatedByCreatedBy;
            $sfcSettingRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }

    /**
     * Clears out the collsfcSettingsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfcSettingsRelatedByUpdatedBy()
     */
    public function clearsfcSettingsRelatedByUpdatedBy()
    {
        $this->collsfcSettingsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfcSettingsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collsfcSettingsRelatedByUpdatedBy collection to an empty array (like clearcollsfcSettingsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfcSettingsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collsfcSettingsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collsfcSettingsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collsfcSettingsRelatedByUpdatedBy->setModel('sfcSetting');
    }

    /**
     * Gets an array of sfcSetting objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfcSetting[] List of sfcSetting objects
     * @throws PropelException
     */
    public function getsfcSettingsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfcSettingsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfcSettingsRelatedByUpdatedBy) {
                // return empty collection
                $this->initsfcSettingsRelatedByUpdatedBy();
            } else {
                $collsfcSettingsRelatedByUpdatedBy = sfcSettingQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfcSettingsRelatedByUpdatedBy;
                }
                $this->collsfcSettingsRelatedByUpdatedBy = $collsfcSettingsRelatedByUpdatedBy;
            }
        }

        return $this->collsfcSettingsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of sfcSettingRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfcSettingsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfcSettingsRelatedByUpdatedBy(PropelCollection $sfcSettingsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->sfcSettingsRelatedByUpdatedByScheduledForDeletion = $this->getsfcSettingsRelatedByUpdatedBy(new Criteria(), $con)->diff($sfcSettingsRelatedByUpdatedBy);

        foreach ($this->sfcSettingsRelatedByUpdatedByScheduledForDeletion as $sfcSettingRelatedByUpdatedByRemoved) {
            $sfcSettingRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collsfcSettingsRelatedByUpdatedBy = null;
        foreach ($sfcSettingsRelatedByUpdatedBy as $sfcSettingRelatedByUpdatedBy) {
            $this->addsfcSettingRelatedByUpdatedBy($sfcSettingRelatedByUpdatedBy);
        }

        $this->collsfcSettingsRelatedByUpdatedBy = $sfcSettingsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related sfcSetting objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfcSetting objects.
     * @throws PropelException
     */
    public function countsfcSettingsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfcSettingsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfcSettingsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = sfcSettingQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfcSettingsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a sfcSetting object to this object
     * through the sfcSetting foreign key attribute.
     *
     * @param    sfcSetting $l sfcSetting
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addsfcSettingRelatedByUpdatedBy(sfcSetting $l)
    {
        if ($this->collsfcSettingsRelatedByUpdatedBy === null) {
            $this->initsfcSettingsRelatedByUpdatedBy();
        }
        if (!$this->collsfcSettingsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfcSettingRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	sfcSettingRelatedByUpdatedBy $sfcSettingRelatedByUpdatedBy The sfcSettingRelatedByUpdatedBy object to add.
     */
    protected function doAddsfcSettingRelatedByUpdatedBy($sfcSettingRelatedByUpdatedBy)
    {
        $this->collsfcSettingsRelatedByUpdatedBy[]= $sfcSettingRelatedByUpdatedBy;
        $sfcSettingRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	sfcSettingRelatedByUpdatedBy $sfcSettingRelatedByUpdatedBy The sfcSettingRelatedByUpdatedBy object to remove.
     */
    public function removesfcSettingRelatedByUpdatedBy($sfcSettingRelatedByUpdatedBy)
    {
        if ($this->getsfcSettingsRelatedByUpdatedBy()->contains($sfcSettingRelatedByUpdatedBy)) {
            $this->collsfcSettingsRelatedByUpdatedBy->remove($this->collsfcSettingsRelatedByUpdatedBy->search($sfcSettingRelatedByUpdatedBy));
            if (null === $this->sfcSettingsRelatedByUpdatedByScheduledForDeletion) {
                $this->sfcSettingsRelatedByUpdatedByScheduledForDeletion = clone $this->collsfcSettingsRelatedByUpdatedBy;
                $this->sfcSettingsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->sfcSettingsRelatedByUpdatedByScheduledForDeletion[]= $sfcSettingRelatedByUpdatedBy;
            $sfcSettingRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }

    /**
     * Clears out the collAlertsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAlertsRelatedByUpdatedBy()
     */
    public function clearAlertsRelatedByUpdatedBy()
    {
        $this->collAlertsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAlertsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collAlertsRelatedByUpdatedBy collection to an empty array (like clearcollAlertsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlertsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collAlertsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collAlertsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collAlertsRelatedByUpdatedBy->setModel('Alert');
    }

    /**
     * Gets an array of Alert objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alert[] List of Alert objects
     * @throws PropelException
     */
    public function getAlertsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByUpdatedBy) {
                // return empty collection
                $this->initAlertsRelatedByUpdatedBy();
            } else {
                $collAlertsRelatedByUpdatedBy = AlertQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAlertsRelatedByUpdatedBy;
                }
                $this->collAlertsRelatedByUpdatedBy = $collAlertsRelatedByUpdatedBy;
            }
        }

        return $this->collAlertsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of AlertRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $alertsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAlertsRelatedByUpdatedBy(PropelCollection $alertsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->alertsRelatedByUpdatedByScheduledForDeletion = $this->getAlertsRelatedByUpdatedBy(new Criteria(), $con)->diff($alertsRelatedByUpdatedBy);

        foreach ($this->alertsRelatedByUpdatedByScheduledForDeletion as $alertRelatedByUpdatedByRemoved) {
            $alertRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collAlertsRelatedByUpdatedBy = null;
        foreach ($alertsRelatedByUpdatedBy as $alertRelatedByUpdatedBy) {
            $this->addAlertRelatedByUpdatedBy($alertRelatedByUpdatedBy);
        }

        $this->collAlertsRelatedByUpdatedBy = $alertsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related Alert objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Alert objects.
     * @throws PropelException
     */
    public function countAlertsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = AlertQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collAlertsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a Alert object to this object
     * through the Alert foreign key attribute.
     *
     * @param    Alert $l Alert
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addAlertRelatedByUpdatedBy(Alert $l)
    {
        if ($this->collAlertsRelatedByUpdatedBy === null) {
            $this->initAlertsRelatedByUpdatedBy();
        }
        if (!$this->collAlertsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAlertRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	AlertRelatedByUpdatedBy $alertRelatedByUpdatedBy The alertRelatedByUpdatedBy object to add.
     */
    protected function doAddAlertRelatedByUpdatedBy($alertRelatedByUpdatedBy)
    {
        $this->collAlertsRelatedByUpdatedBy[]= $alertRelatedByUpdatedBy;
        $alertRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	AlertRelatedByUpdatedBy $alertRelatedByUpdatedBy The alertRelatedByUpdatedBy object to remove.
     */
    public function removeAlertRelatedByUpdatedBy($alertRelatedByUpdatedBy)
    {
        if ($this->getAlertsRelatedByUpdatedBy()->contains($alertRelatedByUpdatedBy)) {
            $this->collAlertsRelatedByUpdatedBy->remove($this->collAlertsRelatedByUpdatedBy->search($alertRelatedByUpdatedBy));
            if (null === $this->alertsRelatedByUpdatedByScheduledForDeletion) {
                $this->alertsRelatedByUpdatedByScheduledForDeletion = clone $this->collAlertsRelatedByUpdatedBy;
                $this->alertsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->alertsRelatedByUpdatedByScheduledForDeletion[]= $alertRelatedByUpdatedBy;
            $alertRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related AlertsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByUpdatedByJoinCollaboratorRelatedByAcquittedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('CollaboratorRelatedByAcquittedBy', $join_behavior);

        return $this->getAlertsRelatedByUpdatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related AlertsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByUpdatedByJoinCollaboratorRelatedByRecipientId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('CollaboratorRelatedByRecipientId', $join_behavior);

        return $this->getAlertsRelatedByUpdatedBy($query, $con);
    }

    /**
     * Clears out the collAlertsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAlertsRelatedByCreatedBy()
     */
    public function clearAlertsRelatedByCreatedBy()
    {
        $this->collAlertsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAlertsRelatedByCreatedBy collection.
     *
     * By default this just sets the collAlertsRelatedByCreatedBy collection to an empty array (like clearcollAlertsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlertsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collAlertsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collAlertsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collAlertsRelatedByCreatedBy->setModel('Alert');
    }

    /**
     * Gets an array of Alert objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alert[] List of Alert objects
     * @throws PropelException
     */
    public function getAlertsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByCreatedBy) {
                // return empty collection
                $this->initAlertsRelatedByCreatedBy();
            } else {
                $collAlertsRelatedByCreatedBy = AlertQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAlertsRelatedByCreatedBy;
                }
                $this->collAlertsRelatedByCreatedBy = $collAlertsRelatedByCreatedBy;
            }
        }

        return $this->collAlertsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of AlertRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $alertsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAlertsRelatedByCreatedBy(PropelCollection $alertsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->alertsRelatedByCreatedByScheduledForDeletion = $this->getAlertsRelatedByCreatedBy(new Criteria(), $con)->diff($alertsRelatedByCreatedBy);

        foreach ($this->alertsRelatedByCreatedByScheduledForDeletion as $alertRelatedByCreatedByRemoved) {
            $alertRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collAlertsRelatedByCreatedBy = null;
        foreach ($alertsRelatedByCreatedBy as $alertRelatedByCreatedBy) {
            $this->addAlertRelatedByCreatedBy($alertRelatedByCreatedBy);
        }

        $this->collAlertsRelatedByCreatedBy = $alertsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related Alert objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Alert objects.
     * @throws PropelException
     */
    public function countAlertsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = AlertQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collAlertsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a Alert object to this object
     * through the Alert foreign key attribute.
     *
     * @param    Alert $l Alert
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addAlertRelatedByCreatedBy(Alert $l)
    {
        if ($this->collAlertsRelatedByCreatedBy === null) {
            $this->initAlertsRelatedByCreatedBy();
        }
        if (!$this->collAlertsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAlertRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	AlertRelatedByCreatedBy $alertRelatedByCreatedBy The alertRelatedByCreatedBy object to add.
     */
    protected function doAddAlertRelatedByCreatedBy($alertRelatedByCreatedBy)
    {
        $this->collAlertsRelatedByCreatedBy[]= $alertRelatedByCreatedBy;
        $alertRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	AlertRelatedByCreatedBy $alertRelatedByCreatedBy The alertRelatedByCreatedBy object to remove.
     */
    public function removeAlertRelatedByCreatedBy($alertRelatedByCreatedBy)
    {
        if ($this->getAlertsRelatedByCreatedBy()->contains($alertRelatedByCreatedBy)) {
            $this->collAlertsRelatedByCreatedBy->remove($this->collAlertsRelatedByCreatedBy->search($alertRelatedByCreatedBy));
            if (null === $this->alertsRelatedByCreatedByScheduledForDeletion) {
                $this->alertsRelatedByCreatedByScheduledForDeletion = clone $this->collAlertsRelatedByCreatedBy;
                $this->alertsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->alertsRelatedByCreatedByScheduledForDeletion[]= $alertRelatedByCreatedBy;
            $alertRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related AlertsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByCreatedByJoinCollaboratorRelatedByAcquittedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('CollaboratorRelatedByAcquittedBy', $join_behavior);

        return $this->getAlertsRelatedByCreatedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related AlertsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByCreatedByJoinCollaboratorRelatedByRecipientId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('CollaboratorRelatedByRecipientId', $join_behavior);

        return $this->getAlertsRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collSfcCommentsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSfcCommentsRelatedByCreatedBy()
     */
    public function clearSfcCommentsRelatedByCreatedBy()
    {
        $this->collSfcCommentsRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSfcCommentsRelatedByCreatedBy collection.
     *
     * By default this just sets the collSfcCommentsRelatedByCreatedBy collection to an empty array (like clearcollSfcCommentsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSfcCommentsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collSfcCommentsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collSfcCommentsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collSfcCommentsRelatedByCreatedBy->setModel('SfcComment');
    }

    /**
     * Gets an array of SfcComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     * @throws PropelException
     */
    public function getSfcCommentsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSfcCommentsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSfcCommentsRelatedByCreatedBy) {
                // return empty collection
                $this->initSfcCommentsRelatedByCreatedBy();
            } else {
                $collSfcCommentsRelatedByCreatedBy = SfcCommentQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSfcCommentsRelatedByCreatedBy;
                }
                $this->collSfcCommentsRelatedByCreatedBy = $collSfcCommentsRelatedByCreatedBy;
            }
        }

        return $this->collSfcCommentsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of SfcCommentRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfcCommentsRelatedByCreatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setSfcCommentsRelatedByCreatedBy(PropelCollection $sfcCommentsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $this->sfcCommentsRelatedByCreatedByScheduledForDeletion = $this->getSfcCommentsRelatedByCreatedBy(new Criteria(), $con)->diff($sfcCommentsRelatedByCreatedBy);

        foreach ($this->sfcCommentsRelatedByCreatedByScheduledForDeletion as $sfcCommentRelatedByCreatedByRemoved) {
            $sfcCommentRelatedByCreatedByRemoved->setsfGuardUserRelatedByCreatedBy(null);
        }

        $this->collSfcCommentsRelatedByCreatedBy = null;
        foreach ($sfcCommentsRelatedByCreatedBy as $sfcCommentRelatedByCreatedBy) {
            $this->addSfcCommentRelatedByCreatedBy($sfcCommentRelatedByCreatedBy);
        }

        $this->collSfcCommentsRelatedByCreatedBy = $sfcCommentsRelatedByCreatedBy;
    }

    /**
     * Returns the number of related SfcComment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related SfcComment objects.
     * @throws PropelException
     */
    public function countSfcCommentsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSfcCommentsRelatedByCreatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSfcCommentsRelatedByCreatedBy) {
                return 0;
            } else {
                $query = SfcCommentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByCreatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collSfcCommentsRelatedByCreatedBy);
        }
    }

    /**
     * Method called to associate a SfcComment object to this object
     * through the SfcComment foreign key attribute.
     *
     * @param    SfcComment $l SfcComment
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addSfcCommentRelatedByCreatedBy(SfcComment $l)
    {
        if ($this->collSfcCommentsRelatedByCreatedBy === null) {
            $this->initSfcCommentsRelatedByCreatedBy();
        }
        if (!$this->collSfcCommentsRelatedByCreatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSfcCommentRelatedByCreatedBy($l);
        }

        return $this;
    }

    /**
     * @param	SfcCommentRelatedByCreatedBy $sfcCommentRelatedByCreatedBy The sfcCommentRelatedByCreatedBy object to add.
     */
    protected function doAddSfcCommentRelatedByCreatedBy($sfcCommentRelatedByCreatedBy)
    {
        $this->collSfcCommentsRelatedByCreatedBy[]= $sfcCommentRelatedByCreatedBy;
        $sfcCommentRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy($this);
    }

    /**
     * @param	SfcCommentRelatedByCreatedBy $sfcCommentRelatedByCreatedBy The sfcCommentRelatedByCreatedBy object to remove.
     */
    public function removeSfcCommentRelatedByCreatedBy($sfcCommentRelatedByCreatedBy)
    {
        if ($this->getSfcCommentsRelatedByCreatedBy()->contains($sfcCommentRelatedByCreatedBy)) {
            $this->collSfcCommentsRelatedByCreatedBy->remove($this->collSfcCommentsRelatedByCreatedBy->search($sfcCommentRelatedByCreatedBy));
            if (null === $this->sfcCommentsRelatedByCreatedByScheduledForDeletion) {
                $this->sfcCommentsRelatedByCreatedByScheduledForDeletion = clone $this->collSfcCommentsRelatedByCreatedBy;
                $this->sfcCommentsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->sfcCommentsRelatedByCreatedByScheduledForDeletion[]= $sfcCommentRelatedByCreatedBy;
            $sfcCommentRelatedByCreatedBy->setsfGuardUserRelatedByCreatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related SfcCommentsRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     */
    public function getSfcCommentsRelatedByCreatedByJoinCollaborator($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SfcCommentQuery::create(null, $criteria);
        $query->joinWith('Collaborator', $join_behavior);

        return $this->getSfcCommentsRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collSfcCommentsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSfcCommentsRelatedByUpdatedBy()
     */
    public function clearSfcCommentsRelatedByUpdatedBy()
    {
        $this->collSfcCommentsRelatedByUpdatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSfcCommentsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collSfcCommentsRelatedByUpdatedBy collection to an empty array (like clearcollSfcCommentsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSfcCommentsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collSfcCommentsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collSfcCommentsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collSfcCommentsRelatedByUpdatedBy->setModel('SfcComment');
    }

    /**
     * Gets an array of SfcComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardUser is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     * @throws PropelException
     */
    public function getSfcCommentsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSfcCommentsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSfcCommentsRelatedByUpdatedBy) {
                // return empty collection
                $this->initSfcCommentsRelatedByUpdatedBy();
            } else {
                $collSfcCommentsRelatedByUpdatedBy = SfcCommentQuery::create(null, $criteria)
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSfcCommentsRelatedByUpdatedBy;
                }
                $this->collSfcCommentsRelatedByUpdatedBy = $collSfcCommentsRelatedByUpdatedBy;
            }
        }

        return $this->collSfcCommentsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of SfcCommentRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfcCommentsRelatedByUpdatedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setSfcCommentsRelatedByUpdatedBy(PropelCollection $sfcCommentsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $this->sfcCommentsRelatedByUpdatedByScheduledForDeletion = $this->getSfcCommentsRelatedByUpdatedBy(new Criteria(), $con)->diff($sfcCommentsRelatedByUpdatedBy);

        foreach ($this->sfcCommentsRelatedByUpdatedByScheduledForDeletion as $sfcCommentRelatedByUpdatedByRemoved) {
            $sfcCommentRelatedByUpdatedByRemoved->setsfGuardUserRelatedByUpdatedBy(null);
        }

        $this->collSfcCommentsRelatedByUpdatedBy = null;
        foreach ($sfcCommentsRelatedByUpdatedBy as $sfcCommentRelatedByUpdatedBy) {
            $this->addSfcCommentRelatedByUpdatedBy($sfcCommentRelatedByUpdatedBy);
        }

        $this->collSfcCommentsRelatedByUpdatedBy = $sfcCommentsRelatedByUpdatedBy;
    }

    /**
     * Returns the number of related SfcComment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related SfcComment objects.
     * @throws PropelException
     */
    public function countSfcCommentsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSfcCommentsRelatedByUpdatedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collSfcCommentsRelatedByUpdatedBy) {
                return 0;
            } else {
                $query = SfcCommentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardUserRelatedByUpdatedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collSfcCommentsRelatedByUpdatedBy);
        }
    }

    /**
     * Method called to associate a SfcComment object to this object
     * through the SfcComment foreign key attribute.
     *
     * @param    SfcComment $l SfcComment
     * @return   sfGuardUser The current object (for fluent API support)
     */
    public function addSfcCommentRelatedByUpdatedBy(SfcComment $l)
    {
        if ($this->collSfcCommentsRelatedByUpdatedBy === null) {
            $this->initSfcCommentsRelatedByUpdatedBy();
        }
        if (!$this->collSfcCommentsRelatedByUpdatedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSfcCommentRelatedByUpdatedBy($l);
        }

        return $this;
    }

    /**
     * @param	SfcCommentRelatedByUpdatedBy $sfcCommentRelatedByUpdatedBy The sfcCommentRelatedByUpdatedBy object to add.
     */
    protected function doAddSfcCommentRelatedByUpdatedBy($sfcCommentRelatedByUpdatedBy)
    {
        $this->collSfcCommentsRelatedByUpdatedBy[]= $sfcCommentRelatedByUpdatedBy;
        $sfcCommentRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	SfcCommentRelatedByUpdatedBy $sfcCommentRelatedByUpdatedBy The sfcCommentRelatedByUpdatedBy object to remove.
     */
    public function removeSfcCommentRelatedByUpdatedBy($sfcCommentRelatedByUpdatedBy)
    {
        if ($this->getSfcCommentsRelatedByUpdatedBy()->contains($sfcCommentRelatedByUpdatedBy)) {
            $this->collSfcCommentsRelatedByUpdatedBy->remove($this->collSfcCommentsRelatedByUpdatedBy->search($sfcCommentRelatedByUpdatedBy));
            if (null === $this->sfcCommentsRelatedByUpdatedByScheduledForDeletion) {
                $this->sfcCommentsRelatedByUpdatedByScheduledForDeletion = clone $this->collSfcCommentsRelatedByUpdatedBy;
                $this->sfcCommentsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->sfcCommentsRelatedByUpdatedByScheduledForDeletion[]= $sfcCommentRelatedByUpdatedBy;
            $sfcCommentRelatedByUpdatedBy->setsfGuardUserRelatedByUpdatedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardUser is new, it will return
     * an empty collection; or if this sfGuardUser has previously
     * been saved, it will retrieve related SfcCommentsRelatedByUpdatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardUser.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     */
    public function getSfcCommentsRelatedByUpdatedByJoinCollaborator($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SfcCommentQuery::create(null, $criteria);
        $query->joinWith('Collaborator', $join_behavior);

        return $this->getSfcCommentsRelatedByUpdatedBy($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->username = null;
        $this->algorithm = null;
        $this->salt = null;
        $this->password = null;
        $this->created_at = null;
        $this->last_login = null;
        $this->is_active = null;
        $this->is_super_admin = null;
        $this->is_sudoer = null;
        $this->time_sudoer = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collCollaboratorsRelatedByCreatedBy) {
                foreach ($this->collCollaboratorsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCollaboratorsRelatedByUpdatedBy) {
                foreach ($this->collCollaboratorsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfGuardUserProfiles) {
                foreach ($this->collsfGuardUserProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDashboardMessagesRelatedByCreatedBy) {
                foreach ($this->collDashboardMessagesRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDashboardMessagesRelatedByUpdatedBy) {
                foreach ($this->collDashboardMessagesRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStationsRelatedByCreatedBy) {
                foreach ($this->collStationsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStationsRelatedByUpdatedBy) {
                foreach ($this->collStationsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTransportTypesRelatedByCreatedBy) {
                foreach ($this->collTransportTypesRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTransportTypesRelatedByUpdatedBy) {
                foreach ($this->collTransportTypesRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSubscriptionsRelatedByCreatedBy) {
                foreach ($this->collSubscriptionsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSubscriptionsRelatedByUpdatedBy) {
                foreach ($this->collSubscriptionsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientsRelatedByCreatedBy) {
                foreach ($this->collClientsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientsRelatedByUpdatedBy) {
                foreach ($this->collClientsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientSubscriptionsRelatedByCreatedBy) {
                foreach ($this->collClientSubscriptionsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientSubscriptionsRelatedByUpdatedBy) {
                foreach ($this->collClientSubscriptionsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTravelsRelatedByCreatedBy) {
                foreach ($this->collTravelsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTravelsRelatedByUpdatedBy) {
                foreach ($this->collTravelsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContactsRelatedByCreatedBy) {
                foreach ($this->collContactsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContactsRelatedByUpdatedBy) {
                foreach ($this->collContactsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMaillingListsRelatedByCreatedBy) {
                foreach ($this->collMaillingListsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMaillingListsRelatedByUpdatedBy) {
                foreach ($this->collMaillingListsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCartsRelatedByUserId) {
                foreach ($this->collCartsRelatedByUserId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCartsRelatedByCreatedBy) {
                foreach ($this->collCartsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCartsRelatedByUpdatedBy) {
                foreach ($this->collCartsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCartItemsRelatedByCreatedBy) {
                foreach ($this->collCartItemsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCartItemsRelatedByUpdatedBy) {
                foreach ($this->collCartItemsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfGuardUserPermissions) {
                foreach ($this->collsfGuardUserPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfGuardUserGroups) {
                foreach ($this->collsfGuardUserGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfGuardRememberKeys) {
                foreach ($this->collsfGuardRememberKeys as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalytics) {
                foreach ($this->collAnalytics as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHistorysRelatedByCreatedBy) {
                foreach ($this->collHistorysRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHistorysRelatedByUpdatedBy) {
                foreach ($this->collHistorysRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfcSettingsRelatedByCreatedBy) {
                foreach ($this->collsfcSettingsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfcSettingsRelatedByUpdatedBy) {
                foreach ($this->collsfcSettingsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlertsRelatedByUpdatedBy) {
                foreach ($this->collAlertsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlertsRelatedByCreatedBy) {
                foreach ($this->collAlertsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSfcCommentsRelatedByCreatedBy) {
                foreach ($this->collSfcCommentsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSfcCommentsRelatedByUpdatedBy) {
                foreach ($this->collSfcCommentsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collCollaboratorsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collCollaboratorsRelatedByCreatedBy->clearIterator();
        }
        $this->collCollaboratorsRelatedByCreatedBy = null;
        if ($this->collCollaboratorsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collCollaboratorsRelatedByUpdatedBy->clearIterator();
        }
        $this->collCollaboratorsRelatedByUpdatedBy = null;
        if ($this->collsfGuardUserProfiles instanceof PropelCollection) {
            $this->collsfGuardUserProfiles->clearIterator();
        }
        $this->collsfGuardUserProfiles = null;
        if ($this->collDashboardMessagesRelatedByCreatedBy instanceof PropelCollection) {
            $this->collDashboardMessagesRelatedByCreatedBy->clearIterator();
        }
        $this->collDashboardMessagesRelatedByCreatedBy = null;
        if ($this->collDashboardMessagesRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collDashboardMessagesRelatedByUpdatedBy->clearIterator();
        }
        $this->collDashboardMessagesRelatedByUpdatedBy = null;
        if ($this->collStationsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collStationsRelatedByCreatedBy->clearIterator();
        }
        $this->collStationsRelatedByCreatedBy = null;
        if ($this->collStationsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collStationsRelatedByUpdatedBy->clearIterator();
        }
        $this->collStationsRelatedByUpdatedBy = null;
        if ($this->collTransportTypesRelatedByCreatedBy instanceof PropelCollection) {
            $this->collTransportTypesRelatedByCreatedBy->clearIterator();
        }
        $this->collTransportTypesRelatedByCreatedBy = null;
        if ($this->collTransportTypesRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collTransportTypesRelatedByUpdatedBy->clearIterator();
        }
        $this->collTransportTypesRelatedByUpdatedBy = null;
        if ($this->collSubscriptionsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collSubscriptionsRelatedByCreatedBy->clearIterator();
        }
        $this->collSubscriptionsRelatedByCreatedBy = null;
        if ($this->collSubscriptionsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collSubscriptionsRelatedByUpdatedBy->clearIterator();
        }
        $this->collSubscriptionsRelatedByUpdatedBy = null;
        if ($this->collClientsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collClientsRelatedByCreatedBy->clearIterator();
        }
        $this->collClientsRelatedByCreatedBy = null;
        if ($this->collClientsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collClientsRelatedByUpdatedBy->clearIterator();
        }
        $this->collClientsRelatedByUpdatedBy = null;
        if ($this->collClientSubscriptionsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collClientSubscriptionsRelatedByCreatedBy->clearIterator();
        }
        $this->collClientSubscriptionsRelatedByCreatedBy = null;
        if ($this->collClientSubscriptionsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collClientSubscriptionsRelatedByUpdatedBy->clearIterator();
        }
        $this->collClientSubscriptionsRelatedByUpdatedBy = null;
        if ($this->collTravelsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collTravelsRelatedByCreatedBy->clearIterator();
        }
        $this->collTravelsRelatedByCreatedBy = null;
        if ($this->collTravelsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collTravelsRelatedByUpdatedBy->clearIterator();
        }
        $this->collTravelsRelatedByUpdatedBy = null;
        if ($this->collContactsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collContactsRelatedByCreatedBy->clearIterator();
        }
        $this->collContactsRelatedByCreatedBy = null;
        if ($this->collContactsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collContactsRelatedByUpdatedBy->clearIterator();
        }
        $this->collContactsRelatedByUpdatedBy = null;
        if ($this->collMaillingListsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collMaillingListsRelatedByCreatedBy->clearIterator();
        }
        $this->collMaillingListsRelatedByCreatedBy = null;
        if ($this->collMaillingListsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collMaillingListsRelatedByUpdatedBy->clearIterator();
        }
        $this->collMaillingListsRelatedByUpdatedBy = null;
        if ($this->collCartsRelatedByUserId instanceof PropelCollection) {
            $this->collCartsRelatedByUserId->clearIterator();
        }
        $this->collCartsRelatedByUserId = null;
        if ($this->collCartsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collCartsRelatedByCreatedBy->clearIterator();
        }
        $this->collCartsRelatedByCreatedBy = null;
        if ($this->collCartsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collCartsRelatedByUpdatedBy->clearIterator();
        }
        $this->collCartsRelatedByUpdatedBy = null;
        if ($this->collCartItemsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collCartItemsRelatedByCreatedBy->clearIterator();
        }
        $this->collCartItemsRelatedByCreatedBy = null;
        if ($this->collCartItemsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collCartItemsRelatedByUpdatedBy->clearIterator();
        }
        $this->collCartItemsRelatedByUpdatedBy = null;
        if ($this->collsfGuardUserPermissions instanceof PropelCollection) {
            $this->collsfGuardUserPermissions->clearIterator();
        }
        $this->collsfGuardUserPermissions = null;
        if ($this->collsfGuardUserGroups instanceof PropelCollection) {
            $this->collsfGuardUserGroups->clearIterator();
        }
        $this->collsfGuardUserGroups = null;
        if ($this->collsfGuardRememberKeys instanceof PropelCollection) {
            $this->collsfGuardRememberKeys->clearIterator();
        }
        $this->collsfGuardRememberKeys = null;
        if ($this->collAnalytics instanceof PropelCollection) {
            $this->collAnalytics->clearIterator();
        }
        $this->collAnalytics = null;
        if ($this->collHistorysRelatedByCreatedBy instanceof PropelCollection) {
            $this->collHistorysRelatedByCreatedBy->clearIterator();
        }
        $this->collHistorysRelatedByCreatedBy = null;
        if ($this->collHistorysRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collHistorysRelatedByUpdatedBy->clearIterator();
        }
        $this->collHistorysRelatedByUpdatedBy = null;
        if ($this->collsfcSettingsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collsfcSettingsRelatedByCreatedBy->clearIterator();
        }
        $this->collsfcSettingsRelatedByCreatedBy = null;
        if ($this->collsfcSettingsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collsfcSettingsRelatedByUpdatedBy->clearIterator();
        }
        $this->collsfcSettingsRelatedByUpdatedBy = null;
        if ($this->collAlertsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collAlertsRelatedByUpdatedBy->clearIterator();
        }
        $this->collAlertsRelatedByUpdatedBy = null;
        if ($this->collAlertsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collAlertsRelatedByCreatedBy->clearIterator();
        }
        $this->collAlertsRelatedByCreatedBy = null;
        if ($this->collSfcCommentsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collSfcCommentsRelatedByCreatedBy->clearIterator();
        }
        $this->collSfcCommentsRelatedByCreatedBy = null;
        if ($this->collSfcCommentsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collSfcCommentsRelatedByUpdatedBy->clearIterator();
        }
        $this->collSfcCommentsRelatedByUpdatedBy = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(sfGuardUserPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {
        
   /* symfony 1.0 behavior
    *   Old symfony behavior engine.
    *   Moved from sfObjectBuilder::addCall
    *   By Colin Michoudet
    */
  try {
    if (!$callable = sfMixer::getCallable('BasesfGuardUser:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardUser::%s', $name));
    }
    array_unshift($params, $this);
    return call_user_func_array($callable, $params);
  } catch (sfException $e) {
    if (sfConfig::get('sf_logging_enabled')) {
      sfContext::getInstance()->getLogger()->debug('[symfony magic call] : ' . $e->getMessage());
    }
  }
  /* end symfony 1.0 behavior code */


        return parent::__call($name, $params);
    }

  /**
  * Returns a defaut text representation of this object.
  *
  * @return     string
  */
  public function sfcToString()
  {
    return (string) $this->getUsername();
  }
  
  public function toStringWithType() {
    return $this->getMetadata('name') . ' : ' . $this->__toString();
  }

  public function exportTo($parser, $includeLazyLoadColumns = true) {
    if ($parser == constant(self::PEER . '::DEFAULT_STRING_FORMAT')) {
      return $this->sfcToString();
    } else {
      return parent::exportTo($parser);
    }
  }

	/**
	 * Returns a list of all modified fields of this object.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     array()
	 */
	public function getModifiedColumns()
	{
		return $this->modifiedColumns;
	}

	protected $skip_edited = false;

	/**
	 *
	 *
	 */
	public function setSkipEdited($skip) {
		$this->skip_edited = (bool) $skip;
	}

	/**
	 *
	 *
	 */
	public function isSkipEdited() {
		return $this->skip_edited;
	}

	/**
	 *
	 *
	 */
	public function getMetadata($info = null, $default = null) {
		return sfGuardUserPeer::getMetadata($info, $default, get_class($this));
	}
	public function getLinkTo($action = null, $target = null){
		return SurfaceLinkTo::create($this, $action, $target);
    }
	public function getSurfaceUrl($action = null, $target = null){
		return $this->getLinkTo($action, $target)->getUrl();
    }
	public function getToString(){
		return $this->__toString();
    }
} // BasesfGuardUser

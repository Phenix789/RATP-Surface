<?php


/**
 * Base class that represents a row from the 'collaborator' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.collaborator.om
 */
abstract class BaseCollaborator extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'CollaboratorPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CollaboratorPeer
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
     * The value for the is_active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_active;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the signature field.
     * @var        string
     */
    protected $signature;

    /**
     * The value for the job_role field.
     * @var        string
     */
    protected $job_role;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the city field.
     * @var        string
     */
    protected $city;

    /**
     * The value for the postal_code field.
     * @var        string
     */
    protected $postal_code;

    /**
     * The value for the country field.
     * @var        string
     */
    protected $country;

    /**
     * The value for the phone_number field.
     * @var        string
     */
    protected $phone_number;

    /**
     * The value for the mobile_number field.
     * @var        string
     */
    protected $mobile_number;

    /**
     * The value for the fax_number field.
     * @var        string
     */
    protected $fax_number;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the confidential field.
     * @var        string
     */
    protected $confidential;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * The value for the created_by field.
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the updated_by field.
     * @var        int
     */
    protected $updated_by;

    /**
     * @var        sfGuardUser
     */
    protected $asfGuardUserRelatedByCreatedBy;

    /**
     * @var        sfGuardUser
     */
    protected $asfGuardUserRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|sfGuardUserProfile[] Collection to store aggregation of sfGuardUserProfile objects.
     */
    protected $collsfGuardUserProfiles;

    /**
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlertsRelatedByAcquittedBy;

    /**
     * @var        PropelObjectCollection|Alert[] Collection to store aggregation of Alert objects.
     */
    protected $collAlertsRelatedByRecipientId;

    /**
     * @var        PropelObjectCollection|SfcComment[] Collection to store aggregation of SfcComment objects.
     */
    protected $collSfcComments;

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
    protected $sfGuardUserProfilesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alertsRelatedByAcquittedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $alertsRelatedByRecipientIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfcCommentsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_active = true;
    }

    /**
     * Initializes internal state of BaseCollaborator object.
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
     * Get the [is_active] column value.
     * 
     * @return   boolean
     */
    public function getIsActive()
    {

        return $this->is_active;
    }

    /**
     * Get the [first_name] column value.
     * 
     * @return   string
     */
    public function getFirstName()
    {

        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     * 
     * @return   string
     */
    public function getLastName()
    {

        return $this->last_name;
    }

    /**
     * Get the [email] column value.
     * 
     * @return   string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [signature] column value.
     * 
     * @return   string
     */
    public function getSignature()
    {

        return $this->signature;
    }

    /**
     * Get the [job_role] column value.
     * 
     * @return   string
     */
    public function getJobRole()
    {

        return $this->job_role;
    }

    /**
     * Get the [address] column value.
     * 
     * @return   string
     */
    public function getAddress()
    {

        return $this->address;
    }

    /**
     * Get the [city] column value.
     * 
     * @return   string
     */
    public function getCity()
    {

        return $this->city;
    }

    /**
     * Get the [postal_code] column value.
     * 
     * @return   string
     */
    public function getPostalCode()
    {

        return $this->postal_code;
    }

    /**
     * Get the [country] column value.
     * 
     * @return   string
     */
    public function getCountry()
    {

        return $this->country;
    }

    /**
     * Get the [phone_number] column value.
     * 
     * @return   string
     */
    public function getPhoneNumber()
    {

        return $this->phone_number;
    }

    /**
     * Get the [mobile_number] column value.
     * 
     * @return   string
     */
    public function getMobileNumber()
    {

        return $this->mobile_number;
    }

    /**
     * Get the [fax_number] column value.
     * 
     * @return   string
     */
    public function getFaxNumber()
    {

        return $this->fax_number;
    }

    /**
     * Get the [comment] column value.
     * 
     * @return   string
     */
    public function getComment()
    {

        return $this->comment;
    }

    /**
     * Get the [confidential] column value.
     * 
     * @return   string
     */
    public function getConfidential()
    {

        return $this->confidential;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }



        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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
     * Get the [optionally formatted] temporal [updated_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }



        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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
     * Get the [created_by] column value.
     * 
     * @return   int
     */
    public function getCreatedBy()
    {

        return $this->created_by;
    }

    /**
     * Get the [updated_by] column value.
     * 
     * @return   int
     */
    public function getUpdatedBy()
    {

        return $this->updated_by;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CollaboratorPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of the [is_active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   Collaborator The current object (for fluent API support)
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
            $this->modifiedColumns[] = CollaboratorPeer::IS_ACTIVE;
        }


        return $this;
    } // setIsActive()

    /**
     * Set the value of [first_name] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = CollaboratorPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = CollaboratorPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [email] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = CollaboratorPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [signature] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setSignature($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->signature !== $v) {
            $this->signature = $v;
            $this->modifiedColumns[] = CollaboratorPeer::SIGNATURE;
        }


        return $this;
    } // setSignature()

    /**
     * Set the value of [job_role] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setJobRole($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->job_role !== $v) {
            $this->job_role = $v;
            $this->modifiedColumns[] = CollaboratorPeer::JOB_ROLE;
        }


        return $this;
    } // setJobRole()

    /**
     * Set the value of [address] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[] = CollaboratorPeer::ADDRESS;
        }


        return $this;
    } // setAddress()

    /**
     * Set the value of [city] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = CollaboratorPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [postal_code] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setPostalCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->postal_code !== $v) {
            $this->postal_code = $v;
            $this->modifiedColumns[] = CollaboratorPeer::POSTAL_CODE;
        }


        return $this;
    } // setPostalCode()

    /**
     * Set the value of [country] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country !== $v) {
            $this->country = $v;
            $this->modifiedColumns[] = CollaboratorPeer::COUNTRY;
        }


        return $this;
    } // setCountry()

    /**
     * Set the value of [phone_number] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setPhoneNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_number !== $v) {
            $this->phone_number = $v;
            $this->modifiedColumns[] = CollaboratorPeer::PHONE_NUMBER;
        }


        return $this;
    } // setPhoneNumber()

    /**
     * Set the value of [mobile_number] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setMobileNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mobile_number !== $v) {
            $this->mobile_number = $v;
            $this->modifiedColumns[] = CollaboratorPeer::MOBILE_NUMBER;
        }


        return $this;
    } // setMobileNumber()

    /**
     * Set the value of [fax_number] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setFaxNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax_number !== $v) {
            $this->fax_number = $v;
            $this->modifiedColumns[] = CollaboratorPeer::FAX_NUMBER;
        }


        return $this;
    } // setFaxNumber()

    /**
     * Set the value of [comment] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = CollaboratorPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [confidential] column.
     * 
     * @param      string $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setConfidential($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->confidential !== $v) {
            $this->confidential = $v;
            $this->modifiedColumns[] = CollaboratorPeer::CONFIDENTIAL;
        }


        return $this;
    } // setConfidential()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Collaborator The current object (for fluent API support)
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
                $this->modifiedColumns[] = CollaboratorPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = CollaboratorPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [created_by] column.
     * 
     * @param      int $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = CollaboratorPeer::CREATED_BY;
        }

        if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
            $this->asfGuardUserRelatedByCreatedBy = null;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     * 
     * @param      int $v new value
     * @return   Collaborator The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = CollaboratorPeer::UPDATED_BY;
        }

        if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
            $this->asfGuardUserRelatedByUpdatedBy = null;
        }


        return $this;
    } // setUpdatedBy()

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
            if ($this->is_active !== true) {
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
            $this->is_active = ($row[$startcol + 1] !== null) ? (boolean) $row[$startcol + 1] : null;
            $this->first_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->last_name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->signature = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->job_role = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->address = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->city = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->postal_code = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->country = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->phone_number = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->mobile_number = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->fax_number = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->comment = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->confidential = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->created_at = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->updated_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->created_by = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
            $this->updated_by = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = CollaboratorPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Collaborator object", $e);
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

        if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->created_by !== $this->asfGuardUserRelatedByCreatedBy->getId()) {
            $this->asfGuardUserRelatedByCreatedBy = null;
        }
        if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->updated_by !== $this->asfGuardUserRelatedByUpdatedBy->getId()) {
            $this->asfGuardUserRelatedByUpdatedBy = null;
        }
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
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CollaboratorPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->asfGuardUserRelatedByCreatedBy = null;
            $this->asfGuardUserRelatedByUpdatedBy = null;
            $this->collsfGuardUserProfiles = null;

            $this->collAlertsRelatedByAcquittedBy = null;

            $this->collAlertsRelatedByRecipientId = null;

            $this->collSfcComments = null;

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

    foreach (sfMixer::getCallables('BaseCollaborator:delete:pre') as $callable)
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
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CollaboratorQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseCollaborator:delete:post') as $callable)
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
    if ($this->isModified()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(CollaboratorPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(CollaboratorPeer::UPDATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setUpdatedBy($user_id);
    }

    }

    if ($this->isNew()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(CollaboratorPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(CollaboratorPeer::CREATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setCreatedBy($user_id);
    }

    }


    foreach (sfMixer::getCallables('BaseCollaborator:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(CollaboratorPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CollaboratorPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(CollaboratorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CollaboratorPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseCollaborator:save:post') as $callable)
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->asfGuardUserRelatedByCreatedBy !== null) {
                if ($this->asfGuardUserRelatedByCreatedBy->isModified() || $this->asfGuardUserRelatedByCreatedBy->isNew()) {
                    $affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
                }
                $this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
            }

            if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
                if ($this->asfGuardUserRelatedByUpdatedBy->isModified() || $this->asfGuardUserRelatedByUpdatedBy->isNew()) {
                    $affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
                }
                $this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
            }

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

            if ($this->sfGuardUserProfilesScheduledForDeletion !== null) {
                if (!$this->sfGuardUserProfilesScheduledForDeletion->isEmpty()) {
                    foreach ($this->sfGuardUserProfilesScheduledForDeletion as $sfGuardUserProfile) {
                        // need to save related object because we set the relation to null
                        $sfGuardUserProfile->save($con);
                    }
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

            if ($this->alertsRelatedByAcquittedByScheduledForDeletion !== null) {
                if (!$this->alertsRelatedByAcquittedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->alertsRelatedByAcquittedByScheduledForDeletion as $alertRelatedByAcquittedBy) {
                        // need to save related object because we set the relation to null
                        $alertRelatedByAcquittedBy->save($con);
                    }
                    $this->alertsRelatedByAcquittedByScheduledForDeletion = null;
                }
            }

            if ($this->collAlertsRelatedByAcquittedBy !== null) {
                foreach ($this->collAlertsRelatedByAcquittedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->alertsRelatedByRecipientIdScheduledForDeletion !== null) {
                if (!$this->alertsRelatedByRecipientIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->alertsRelatedByRecipientIdScheduledForDeletion as $alertRelatedByRecipientId) {
                        // need to save related object because we set the relation to null
                        $alertRelatedByRecipientId->save($con);
                    }
                    $this->alertsRelatedByRecipientIdScheduledForDeletion = null;
                }
            }

            if ($this->collAlertsRelatedByRecipientId !== null) {
                foreach ($this->collAlertsRelatedByRecipientId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfcCommentsScheduledForDeletion !== null) {
                if (!$this->sfcCommentsScheduledForDeletion->isEmpty()) {
                    foreach ($this->sfcCommentsScheduledForDeletion as $sfcComment) {
                        // need to save related object because we set the relation to null
                        $sfcComment->save($con);
                    }
                    $this->sfcCommentsScheduledForDeletion = null;
                }
            }

            if ($this->collSfcComments !== null) {
                foreach ($this->collSfcComments as $referrerFK) {
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

        $this->modifiedColumns[] = CollaboratorPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CollaboratorPeer::ID . ')');
        }
        if (null === $this->id) {
            try {				
				$stmt = $con->query('SELECT collaborator_SEQ.nextval FROM dual');
				$row = $stmt->fetch(PDO::FETCH_NUM);
				$this->id = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CollaboratorPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(CollaboratorPeer::IS_ACTIVE)) {
            $modifiedColumns[':p' . $index++]  = 'IS_ACTIVE';
        }
        if ($this->isColumnModified(CollaboratorPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'FIRST_NAME';
        }
        if ($this->isColumnModified(CollaboratorPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'LAST_NAME';
        }
        if ($this->isColumnModified(CollaboratorPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'EMAIL';
        }
        if ($this->isColumnModified(CollaboratorPeer::SIGNATURE)) {
            $modifiedColumns[':p' . $index++]  = 'SIGNATURE';
        }
        if ($this->isColumnModified(CollaboratorPeer::JOB_ROLE)) {
            $modifiedColumns[':p' . $index++]  = 'JOB_ROLE';
        }
        if ($this->isColumnModified(CollaboratorPeer::ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'ADDRESS';
        }
        if ($this->isColumnModified(CollaboratorPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = 'CITY';
        }
        if ($this->isColumnModified(CollaboratorPeer::POSTAL_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'POSTAL_CODE';
        }
        if ($this->isColumnModified(CollaboratorPeer::COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'COUNTRY';
        }
        if ($this->isColumnModified(CollaboratorPeer::PHONE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'PHONE_NUMBER';
        }
        if ($this->isColumnModified(CollaboratorPeer::MOBILE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'MOBILE_NUMBER';
        }
        if ($this->isColumnModified(CollaboratorPeer::FAX_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'FAX_NUMBER';
        }
        if ($this->isColumnModified(CollaboratorPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'COMMENT';
        }
        if ($this->isColumnModified(CollaboratorPeer::CONFIDENTIAL)) {
            $modifiedColumns[':p' . $index++]  = 'CONFIDENTIAL';
        }
        if ($this->isColumnModified(CollaboratorPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'CREATED_AT';
        }
        if ($this->isColumnModified(CollaboratorPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'UPDATED_AT';
        }
        if ($this->isColumnModified(CollaboratorPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = 'CREATED_BY';
        }
        if ($this->isColumnModified(CollaboratorPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = 'UPDATED_BY';
        }

        $sql = sprintf(
            'INSERT INTO collaborator (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ID':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'IS_ACTIVE':
						$stmt->bindValue($identifier, $this->is_active, PDO::PARAM_INT);
                        break;
                    case 'FIRST_NAME':
						$stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'LAST_NAME':
						$stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'EMAIL':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'SIGNATURE':
						$stmt->bindValue($identifier, $this->signature, PDO::PARAM_STR);
                        break;
                    case 'JOB_ROLE':
						$stmt->bindValue($identifier, $this->job_role, PDO::PARAM_STR);
                        break;
                    case 'ADDRESS':
						$stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'CITY':
						$stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'POSTAL_CODE':
						$stmt->bindValue($identifier, $this->postal_code, PDO::PARAM_STR);
                        break;
                    case 'COUNTRY':
						$stmt->bindValue($identifier, $this->country, PDO::PARAM_STR);
                        break;
                    case 'PHONE_NUMBER':
						$stmt->bindValue($identifier, $this->phone_number, PDO::PARAM_STR);
                        break;
                    case 'MOBILE_NUMBER':
						$stmt->bindValue($identifier, $this->mobile_number, PDO::PARAM_STR);
                        break;
                    case 'FAX_NUMBER':
						$stmt->bindValue($identifier, $this->fax_number, PDO::PARAM_STR);
                        break;
                    case 'COMMENT':
						$stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'CONFIDENTIAL':
						$stmt->bindValue($identifier, $this->confidential, PDO::PARAM_STR);
                        break;
                    case 'CREATED_AT':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case 'UPDATED_AT':
						$stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                    case 'CREATED_BY':
						$stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case 'UPDATED_BY':
						$stmt->bindValue($identifier, $this->updated_by, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->asfGuardUserRelatedByCreatedBy !== null) {
                if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
                }
            }

            if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
                if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
                }
            }


            if (($retval = CollaboratorPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collsfGuardUserProfiles !== null) {
                    foreach ($this->collsfGuardUserProfiles as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlertsRelatedByAcquittedBy !== null) {
                    foreach ($this->collAlertsRelatedByAcquittedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAlertsRelatedByRecipientId !== null) {
                    foreach ($this->collAlertsRelatedByRecipientId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSfcComments !== null) {
                    foreach ($this->collSfcComments as $referrerFK) {
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
        $pos = CollaboratorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIsActive();
                break;
            case 2:
                return $this->getFirstName();
                break;
            case 3:
                return $this->getLastName();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getSignature();
                break;
            case 6:
                return $this->getJobRole();
                break;
            case 7:
                return $this->getAddress();
                break;
            case 8:
                return $this->getCity();
                break;
            case 9:
                return $this->getPostalCode();
                break;
            case 10:
                return $this->getCountry();
                break;
            case 11:
                return $this->getPhoneNumber();
                break;
            case 12:
                return $this->getMobileNumber();
                break;
            case 13:
                return $this->getFaxNumber();
                break;
            case 14:
                return $this->getComment();
                break;
            case 15:
                return $this->getConfidential();
                break;
            case 16:
                return $this->getCreatedAt();
                break;
            case 17:
                return $this->getUpdatedAt();
                break;
            case 18:
                return $this->getCreatedBy();
                break;
            case 19:
                return $this->getUpdatedBy();
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
        if (isset($alreadyDumpedObjects['Collaborator'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Collaborator'][$this->getPrimaryKey()] = true;
        $keys = CollaboratorPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getIsActive(),
            $keys[2] => $this->getFirstName(),
            $keys[3] => $this->getLastName(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getSignature(),
            $keys[6] => $this->getJobRole(),
            $keys[7] => $this->getAddress(),
            $keys[8] => $this->getCity(),
            $keys[9] => $this->getPostalCode(),
            $keys[10] => $this->getCountry(),
            $keys[11] => $this->getPhoneNumber(),
            $keys[12] => $this->getMobileNumber(),
            $keys[13] => $this->getFaxNumber(),
            $keys[14] => $this->getComment(),
            $keys[15] => $this->getConfidential(),
            $keys[16] => $this->getCreatedAt(),
            $keys[17] => $this->getUpdatedAt(),
            $keys[18] => $this->getCreatedBy(),
            $keys[19] => $this->getUpdatedBy(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->asfGuardUserRelatedByCreatedBy) {
                $result['sfGuardUserRelatedByCreatedBy'] = $this->asfGuardUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->asfGuardUserRelatedByUpdatedBy) {
                $result['sfGuardUserRelatedByUpdatedBy'] = $this->asfGuardUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collsfGuardUserProfiles) {
                $result['sfGuardUserProfiles'] = $this->collsfGuardUserProfiles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlertsRelatedByAcquittedBy) {
                $result['AlertsRelatedByAcquittedBy'] = $this->collAlertsRelatedByAcquittedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAlertsRelatedByRecipientId) {
                $result['AlertsRelatedByRecipientId'] = $this->collAlertsRelatedByRecipientId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSfcComments) {
                $result['SfcComments'] = $this->collSfcComments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = CollaboratorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIsActive($value);
                break;
            case 2:
                $this->setFirstName($value);
                break;
            case 3:
                $this->setLastName($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setSignature($value);
                break;
            case 6:
                $this->setJobRole($value);
                break;
            case 7:
                $this->setAddress($value);
                break;
            case 8:
                $this->setCity($value);
                break;
            case 9:
                $this->setPostalCode($value);
                break;
            case 10:
                $this->setCountry($value);
                break;
            case 11:
                $this->setPhoneNumber($value);
                break;
            case 12:
                $this->setMobileNumber($value);
                break;
            case 13:
                $this->setFaxNumber($value);
                break;
            case 14:
                $this->setComment($value);
                break;
            case 15:
                $this->setConfidential($value);
                break;
            case 16:
                $this->setCreatedAt($value);
                break;
            case 17:
                $this->setUpdatedAt($value);
                break;
            case 18:
                $this->setCreatedBy($value);
                break;
            case 19:
                $this->setUpdatedBy($value);
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
        $keys = CollaboratorPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIsActive($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFirstName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLastName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setEmail($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSignature($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJobRole($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAddress($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCity($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPostalCode($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCountry($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setPhoneNumber($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setMobileNumber($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setFaxNumber($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setComment($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setConfidential($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setCreatedAt($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setUpdatedAt($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setCreatedBy($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setUpdatedBy($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CollaboratorPeer::DATABASE_NAME);

        if ($this->isColumnModified(CollaboratorPeer::ID)) $criteria->add(CollaboratorPeer::ID, $this->id);
        if ($this->isColumnModified(CollaboratorPeer::IS_ACTIVE)) $criteria->add(CollaboratorPeer::IS_ACTIVE, $this->is_active);
        if ($this->isColumnModified(CollaboratorPeer::FIRST_NAME)) $criteria->add(CollaboratorPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(CollaboratorPeer::LAST_NAME)) $criteria->add(CollaboratorPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(CollaboratorPeer::EMAIL)) $criteria->add(CollaboratorPeer::EMAIL, $this->email);
        if ($this->isColumnModified(CollaboratorPeer::SIGNATURE)) $criteria->add(CollaboratorPeer::SIGNATURE, $this->signature);
        if ($this->isColumnModified(CollaboratorPeer::JOB_ROLE)) $criteria->add(CollaboratorPeer::JOB_ROLE, $this->job_role);
        if ($this->isColumnModified(CollaboratorPeer::ADDRESS)) $criteria->add(CollaboratorPeer::ADDRESS, $this->address);
        if ($this->isColumnModified(CollaboratorPeer::CITY)) $criteria->add(CollaboratorPeer::CITY, $this->city);
        if ($this->isColumnModified(CollaboratorPeer::POSTAL_CODE)) $criteria->add(CollaboratorPeer::POSTAL_CODE, $this->postal_code);
        if ($this->isColumnModified(CollaboratorPeer::COUNTRY)) $criteria->add(CollaboratorPeer::COUNTRY, $this->country);
        if ($this->isColumnModified(CollaboratorPeer::PHONE_NUMBER)) $criteria->add(CollaboratorPeer::PHONE_NUMBER, $this->phone_number);
        if ($this->isColumnModified(CollaboratorPeer::MOBILE_NUMBER)) $criteria->add(CollaboratorPeer::MOBILE_NUMBER, $this->mobile_number);
        if ($this->isColumnModified(CollaboratorPeer::FAX_NUMBER)) $criteria->add(CollaboratorPeer::FAX_NUMBER, $this->fax_number);
        if ($this->isColumnModified(CollaboratorPeer::COMMENT)) $criteria->add(CollaboratorPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(CollaboratorPeer::CONFIDENTIAL)) $criteria->add(CollaboratorPeer::CONFIDENTIAL, $this->confidential);
        if ($this->isColumnModified(CollaboratorPeer::CREATED_AT)) $criteria->add(CollaboratorPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(CollaboratorPeer::UPDATED_AT)) $criteria->add(CollaboratorPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(CollaboratorPeer::CREATED_BY)) $criteria->add(CollaboratorPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(CollaboratorPeer::UPDATED_BY)) $criteria->add(CollaboratorPeer::UPDATED_BY, $this->updated_by);

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
        $criteria = new Criteria(CollaboratorPeer::DATABASE_NAME);
        $criteria->add(CollaboratorPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Collaborator (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIsActive($this->getIsActive());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSignature($this->getSignature());
        $copyObj->setJobRole($this->getJobRole());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setCity($this->getCity());
        $copyObj->setPostalCode($this->getPostalCode());
        $copyObj->setCountry($this->getCountry());
        $copyObj->setPhoneNumber($this->getPhoneNumber());
        $copyObj->setMobileNumber($this->getMobileNumber());
        $copyObj->setFaxNumber($this->getFaxNumber());
        $copyObj->setComment($this->getComment());
        $copyObj->setConfidential($this->getConfidential());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setUpdatedBy($this->getUpdatedBy());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getsfGuardUserProfiles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardUserProfile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlertsRelatedByAcquittedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlertRelatedByAcquittedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAlertsRelatedByRecipientId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlertRelatedByRecipientId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSfcComments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSfcComment($relObj->copy($deepCopy));
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
     * @return                 Collaborator Clone of current object.
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
     * @return   CollaboratorPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CollaboratorPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Collaborator The current object (for fluent API support)
     * @throws PropelException
     */
    public function setsfGuardUserRelatedByCreatedBy(sfGuardUser $v = null)
    {
        if ($v === null) {
            $this->setCreatedBy(NULL);
        } else {
            $this->setCreatedBy($v->getId());
        }

        $this->asfGuardUserRelatedByCreatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the sfGuardUser object, it will not be re-added.
        if ($v !== null) {
            $v->addCollaboratorRelatedByCreatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated sfGuardUser object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 sfGuardUser The associated sfGuardUser object.
     * @throws PropelException
     */
    public function getsfGuardUserRelatedByCreatedBy(PropelPDO $con = null)
    {
        if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
            $this->asfGuardUserRelatedByCreatedBy = sfGuardUserQuery::create()->findPk($this->created_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->asfGuardUserRelatedByCreatedBy->addCollaboratorsRelatedByCreatedBy($this);
             */
        }

        return $this->asfGuardUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Collaborator The current object (for fluent API support)
     * @throws PropelException
     */
    public function setsfGuardUserRelatedByUpdatedBy(sfGuardUser $v = null)
    {
        if ($v === null) {
            $this->setUpdatedBy(NULL);
        } else {
            $this->setUpdatedBy($v->getId());
        }

        $this->asfGuardUserRelatedByUpdatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the sfGuardUser object, it will not be re-added.
        if ($v !== null) {
            $v->addCollaboratorRelatedByUpdatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated sfGuardUser object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 sfGuardUser The associated sfGuardUser object.
     * @throws PropelException
     */
    public function getsfGuardUserRelatedByUpdatedBy(PropelPDO $con = null)
    {
        if ($this->asfGuardUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
            $this->asfGuardUserRelatedByUpdatedBy = sfGuardUserQuery::create()->findPk($this->updated_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->asfGuardUserRelatedByUpdatedBy->addCollaboratorsRelatedByUpdatedBy($this);
             */
        }

        return $this->asfGuardUserRelatedByUpdatedBy;
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
        if ('sfGuardUserProfile' == $relationName) {
            $this->initsfGuardUserProfiles();
        }
        if ('AlertRelatedByAcquittedBy' == $relationName) {
            $this->initAlertsRelatedByAcquittedBy();
        }
        if ('AlertRelatedByRecipientId' == $relationName) {
            $this->initAlertsRelatedByRecipientId();
        }
        if ('SfcComment' == $relationName) {
            $this->initSfcComments();
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
     * If this Collaborator is new, it will return
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
                    ->filterByCollaborator($this)
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
            $sfGuardUserProfileRemoved->setCollaborator(null);
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
                    ->filterByCollaborator($this)
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
     * @return   Collaborator The current object (for fluent API support)
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
        $sfGuardUserProfile->setCollaborator($this);
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
            $sfGuardUserProfile->setCollaborator(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related sfGuardUserProfiles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserProfile[] List of sfGuardUserProfile objects
     */
    public function getsfGuardUserProfilesJoinsfGuardUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserProfileQuery::create(null, $criteria);
        $query->joinWith('sfGuardUser', $join_behavior);

        return $this->getsfGuardUserProfiles($query, $con);
    }

    /**
     * Clears out the collAlertsRelatedByAcquittedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAlertsRelatedByAcquittedBy()
     */
    public function clearAlertsRelatedByAcquittedBy()
    {
        $this->collAlertsRelatedByAcquittedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAlertsRelatedByAcquittedBy collection.
     *
     * By default this just sets the collAlertsRelatedByAcquittedBy collection to an empty array (like clearcollAlertsRelatedByAcquittedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlertsRelatedByAcquittedBy($overrideExisting = true)
    {
        if (null !== $this->collAlertsRelatedByAcquittedBy && !$overrideExisting) {
            return;
        }
        $this->collAlertsRelatedByAcquittedBy = new PropelObjectCollection();
        $this->collAlertsRelatedByAcquittedBy->setModel('Alert');
    }

    /**
     * Gets an array of Alert objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Collaborator is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alert[] List of Alert objects
     * @throws PropelException
     */
    public function getAlertsRelatedByAcquittedBy($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByAcquittedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByAcquittedBy) {
                // return empty collection
                $this->initAlertsRelatedByAcquittedBy();
            } else {
                $collAlertsRelatedByAcquittedBy = AlertQuery::create(null, $criteria)
                    ->filterByCollaboratorRelatedByAcquittedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAlertsRelatedByAcquittedBy;
                }
                $this->collAlertsRelatedByAcquittedBy = $collAlertsRelatedByAcquittedBy;
            }
        }

        return $this->collAlertsRelatedByAcquittedBy;
    }

    /**
     * Sets a collection of AlertRelatedByAcquittedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $alertsRelatedByAcquittedBy A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAlertsRelatedByAcquittedBy(PropelCollection $alertsRelatedByAcquittedBy, PropelPDO $con = null)
    {
        $this->alertsRelatedByAcquittedByScheduledForDeletion = $this->getAlertsRelatedByAcquittedBy(new Criteria(), $con)->diff($alertsRelatedByAcquittedBy);

        foreach ($this->alertsRelatedByAcquittedByScheduledForDeletion as $alertRelatedByAcquittedByRemoved) {
            $alertRelatedByAcquittedByRemoved->setCollaboratorRelatedByAcquittedBy(null);
        }

        $this->collAlertsRelatedByAcquittedBy = null;
        foreach ($alertsRelatedByAcquittedBy as $alertRelatedByAcquittedBy) {
            $this->addAlertRelatedByAcquittedBy($alertRelatedByAcquittedBy);
        }

        $this->collAlertsRelatedByAcquittedBy = $alertsRelatedByAcquittedBy;
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
    public function countAlertsRelatedByAcquittedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByAcquittedBy || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByAcquittedBy) {
                return 0;
            } else {
                $query = AlertQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCollaboratorRelatedByAcquittedBy($this)
                    ->count($con);
            }
        } else {
            return count($this->collAlertsRelatedByAcquittedBy);
        }
    }

    /**
     * Method called to associate a Alert object to this object
     * through the Alert foreign key attribute.
     *
     * @param    Alert $l Alert
     * @return   Collaborator The current object (for fluent API support)
     */
    public function addAlertRelatedByAcquittedBy(Alert $l)
    {
        if ($this->collAlertsRelatedByAcquittedBy === null) {
            $this->initAlertsRelatedByAcquittedBy();
        }
        if (!$this->collAlertsRelatedByAcquittedBy->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAlertRelatedByAcquittedBy($l);
        }

        return $this;
    }

    /**
     * @param	AlertRelatedByAcquittedBy $alertRelatedByAcquittedBy The alertRelatedByAcquittedBy object to add.
     */
    protected function doAddAlertRelatedByAcquittedBy($alertRelatedByAcquittedBy)
    {
        $this->collAlertsRelatedByAcquittedBy[]= $alertRelatedByAcquittedBy;
        $alertRelatedByAcquittedBy->setCollaboratorRelatedByAcquittedBy($this);
    }

    /**
     * @param	AlertRelatedByAcquittedBy $alertRelatedByAcquittedBy The alertRelatedByAcquittedBy object to remove.
     */
    public function removeAlertRelatedByAcquittedBy($alertRelatedByAcquittedBy)
    {
        if ($this->getAlertsRelatedByAcquittedBy()->contains($alertRelatedByAcquittedBy)) {
            $this->collAlertsRelatedByAcquittedBy->remove($this->collAlertsRelatedByAcquittedBy->search($alertRelatedByAcquittedBy));
            if (null === $this->alertsRelatedByAcquittedByScheduledForDeletion) {
                $this->alertsRelatedByAcquittedByScheduledForDeletion = clone $this->collAlertsRelatedByAcquittedBy;
                $this->alertsRelatedByAcquittedByScheduledForDeletion->clear();
            }
            $this->alertsRelatedByAcquittedByScheduledForDeletion[]= $alertRelatedByAcquittedBy;
            $alertRelatedByAcquittedBy->setCollaboratorRelatedByAcquittedBy(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related AlertsRelatedByAcquittedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByAcquittedByJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByUpdatedBy', $join_behavior);

        return $this->getAlertsRelatedByAcquittedBy($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related AlertsRelatedByAcquittedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByAcquittedByJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByCreatedBy', $join_behavior);

        return $this->getAlertsRelatedByAcquittedBy($query, $con);
    }

    /**
     * Clears out the collAlertsRelatedByRecipientId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAlertsRelatedByRecipientId()
     */
    public function clearAlertsRelatedByRecipientId()
    {
        $this->collAlertsRelatedByRecipientId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collAlertsRelatedByRecipientId collection.
     *
     * By default this just sets the collAlertsRelatedByRecipientId collection to an empty array (like clearcollAlertsRelatedByRecipientId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlertsRelatedByRecipientId($overrideExisting = true)
    {
        if (null !== $this->collAlertsRelatedByRecipientId && !$overrideExisting) {
            return;
        }
        $this->collAlertsRelatedByRecipientId = new PropelObjectCollection();
        $this->collAlertsRelatedByRecipientId->setModel('Alert');
    }

    /**
     * Gets an array of Alert objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Collaborator is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alert[] List of Alert objects
     * @throws PropelException
     */
    public function getAlertsRelatedByRecipientId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByRecipientId || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByRecipientId) {
                // return empty collection
                $this->initAlertsRelatedByRecipientId();
            } else {
                $collAlertsRelatedByRecipientId = AlertQuery::create(null, $criteria)
                    ->filterByCollaboratorRelatedByRecipientId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collAlertsRelatedByRecipientId;
                }
                $this->collAlertsRelatedByRecipientId = $collAlertsRelatedByRecipientId;
            }
        }

        return $this->collAlertsRelatedByRecipientId;
    }

    /**
     * Sets a collection of AlertRelatedByRecipientId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $alertsRelatedByRecipientId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setAlertsRelatedByRecipientId(PropelCollection $alertsRelatedByRecipientId, PropelPDO $con = null)
    {
        $this->alertsRelatedByRecipientIdScheduledForDeletion = $this->getAlertsRelatedByRecipientId(new Criteria(), $con)->diff($alertsRelatedByRecipientId);

        foreach ($this->alertsRelatedByRecipientIdScheduledForDeletion as $alertRelatedByRecipientIdRemoved) {
            $alertRelatedByRecipientIdRemoved->setCollaboratorRelatedByRecipientId(null);
        }

        $this->collAlertsRelatedByRecipientId = null;
        foreach ($alertsRelatedByRecipientId as $alertRelatedByRecipientId) {
            $this->addAlertRelatedByRecipientId($alertRelatedByRecipientId);
        }

        $this->collAlertsRelatedByRecipientId = $alertsRelatedByRecipientId;
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
    public function countAlertsRelatedByRecipientId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collAlertsRelatedByRecipientId || null !== $criteria) {
            if ($this->isNew() && null === $this->collAlertsRelatedByRecipientId) {
                return 0;
            } else {
                $query = AlertQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCollaboratorRelatedByRecipientId($this)
                    ->count($con);
            }
        } else {
            return count($this->collAlertsRelatedByRecipientId);
        }
    }

    /**
     * Method called to associate a Alert object to this object
     * through the Alert foreign key attribute.
     *
     * @param    Alert $l Alert
     * @return   Collaborator The current object (for fluent API support)
     */
    public function addAlertRelatedByRecipientId(Alert $l)
    {
        if ($this->collAlertsRelatedByRecipientId === null) {
            $this->initAlertsRelatedByRecipientId();
        }
        if (!$this->collAlertsRelatedByRecipientId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddAlertRelatedByRecipientId($l);
        }

        return $this;
    }

    /**
     * @param	AlertRelatedByRecipientId $alertRelatedByRecipientId The alertRelatedByRecipientId object to add.
     */
    protected function doAddAlertRelatedByRecipientId($alertRelatedByRecipientId)
    {
        $this->collAlertsRelatedByRecipientId[]= $alertRelatedByRecipientId;
        $alertRelatedByRecipientId->setCollaboratorRelatedByRecipientId($this);
    }

    /**
     * @param	AlertRelatedByRecipientId $alertRelatedByRecipientId The alertRelatedByRecipientId object to remove.
     */
    public function removeAlertRelatedByRecipientId($alertRelatedByRecipientId)
    {
        if ($this->getAlertsRelatedByRecipientId()->contains($alertRelatedByRecipientId)) {
            $this->collAlertsRelatedByRecipientId->remove($this->collAlertsRelatedByRecipientId->search($alertRelatedByRecipientId));
            if (null === $this->alertsRelatedByRecipientIdScheduledForDeletion) {
                $this->alertsRelatedByRecipientIdScheduledForDeletion = clone $this->collAlertsRelatedByRecipientId;
                $this->alertsRelatedByRecipientIdScheduledForDeletion->clear();
            }
            $this->alertsRelatedByRecipientIdScheduledForDeletion[]= $alertRelatedByRecipientId;
            $alertRelatedByRecipientId->setCollaboratorRelatedByRecipientId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related AlertsRelatedByRecipientId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByRecipientIdJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByUpdatedBy', $join_behavior);

        return $this->getAlertsRelatedByRecipientId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related AlertsRelatedByRecipientId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alert[] List of Alert objects
     */
    public function getAlertsRelatedByRecipientIdJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlertQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByCreatedBy', $join_behavior);

        return $this->getAlertsRelatedByRecipientId($query, $con);
    }

    /**
     * Clears out the collSfcComments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addSfcComments()
     */
    public function clearSfcComments()
    {
        $this->collSfcComments = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collSfcComments collection.
     *
     * By default this just sets the collSfcComments collection to an empty array (like clearcollSfcComments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSfcComments($overrideExisting = true)
    {
        if (null !== $this->collSfcComments && !$overrideExisting) {
            return;
        }
        $this->collSfcComments = new PropelObjectCollection();
        $this->collSfcComments->setModel('SfcComment');
    }

    /**
     * Gets an array of SfcComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Collaborator is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     * @throws PropelException
     */
    public function getSfcComments($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collSfcComments || null !== $criteria) {
            if ($this->isNew() && null === $this->collSfcComments) {
                // return empty collection
                $this->initSfcComments();
            } else {
                $collSfcComments = SfcCommentQuery::create(null, $criteria)
                    ->filterByCollaborator($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collSfcComments;
                }
                $this->collSfcComments = $collSfcComments;
            }
        }

        return $this->collSfcComments;
    }

    /**
     * Sets a collection of SfcComment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfcComments A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setSfcComments(PropelCollection $sfcComments, PropelPDO $con = null)
    {
        $this->sfcCommentsScheduledForDeletion = $this->getSfcComments(new Criteria(), $con)->diff($sfcComments);

        foreach ($this->sfcCommentsScheduledForDeletion as $sfcCommentRemoved) {
            $sfcCommentRemoved->setCollaborator(null);
        }

        $this->collSfcComments = null;
        foreach ($sfcComments as $sfcComment) {
            $this->addSfcComment($sfcComment);
        }

        $this->collSfcComments = $sfcComments;
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
    public function countSfcComments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collSfcComments || null !== $criteria) {
            if ($this->isNew() && null === $this->collSfcComments) {
                return 0;
            } else {
                $query = SfcCommentQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByCollaborator($this)
                    ->count($con);
            }
        } else {
            return count($this->collSfcComments);
        }
    }

    /**
     * Method called to associate a SfcComment object to this object
     * through the SfcComment foreign key attribute.
     *
     * @param    SfcComment $l SfcComment
     * @return   Collaborator The current object (for fluent API support)
     */
    public function addSfcComment(SfcComment $l)
    {
        if ($this->collSfcComments === null) {
            $this->initSfcComments();
        }
        if (!$this->collSfcComments->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddSfcComment($l);
        }

        return $this;
    }

    /**
     * @param	SfcComment $sfcComment The sfcComment object to add.
     */
    protected function doAddSfcComment($sfcComment)
    {
        $this->collSfcComments[]= $sfcComment;
        $sfcComment->setCollaborator($this);
    }

    /**
     * @param	SfcComment $sfcComment The sfcComment object to remove.
     */
    public function removeSfcComment($sfcComment)
    {
        if ($this->getSfcComments()->contains($sfcComment)) {
            $this->collSfcComments->remove($this->collSfcComments->search($sfcComment));
            if (null === $this->sfcCommentsScheduledForDeletion) {
                $this->sfcCommentsScheduledForDeletion = clone $this->collSfcComments;
                $this->sfcCommentsScheduledForDeletion->clear();
            }
            $this->sfcCommentsScheduledForDeletion[]= $sfcComment;
            $sfcComment->setCollaborator(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related SfcComments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     */
    public function getSfcCommentsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SfcCommentQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByCreatedBy', $join_behavior);

        return $this->getSfcComments($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Collaborator is new, it will return
     * an empty collection; or if this Collaborator has previously
     * been saved, it will retrieve related SfcComments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Collaborator.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SfcComment[] List of SfcComment objects
     */
    public function getSfcCommentsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SfcCommentQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByUpdatedBy', $join_behavior);

        return $this->getSfcComments($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->is_active = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->signature = null;
        $this->job_role = null;
        $this->address = null;
        $this->city = null;
        $this->postal_code = null;
        $this->country = null;
        $this->phone_number = null;
        $this->mobile_number = null;
        $this->fax_number = null;
        $this->comment = null;
        $this->confidential = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->created_by = null;
        $this->updated_by = null;
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
            if ($this->collsfGuardUserProfiles) {
                foreach ($this->collsfGuardUserProfiles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlertsRelatedByAcquittedBy) {
                foreach ($this->collAlertsRelatedByAcquittedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAlertsRelatedByRecipientId) {
                foreach ($this->collAlertsRelatedByRecipientId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSfcComments) {
                foreach ($this->collSfcComments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collsfGuardUserProfiles instanceof PropelCollection) {
            $this->collsfGuardUserProfiles->clearIterator();
        }
        $this->collsfGuardUserProfiles = null;
        if ($this->collAlertsRelatedByAcquittedBy instanceof PropelCollection) {
            $this->collAlertsRelatedByAcquittedBy->clearIterator();
        }
        $this->collAlertsRelatedByAcquittedBy = null;
        if ($this->collAlertsRelatedByRecipientId instanceof PropelCollection) {
            $this->collAlertsRelatedByRecipientId->clearIterator();
        }
        $this->collAlertsRelatedByRecipientId = null;
        if ($this->collSfcComments instanceof PropelCollection) {
            $this->collSfcComments->clearIterator();
        }
        $this->collSfcComments = null;
        $this->asfGuardUserRelatedByCreatedBy = null;
        $this->asfGuardUserRelatedByUpdatedBy = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CollaboratorPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseCollaborator:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseCollaborator::%s', $name));
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
    return (string) $this->getFirstName();
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
		return CollaboratorPeer::getMetadata($info, $default, get_class($this));
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
} // BaseCollaborator

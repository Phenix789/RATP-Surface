<?php


/**
 * Base class that represents a row from the 'sfc_plugin_analytic' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceAnalyticPlugin.lib.model.om
 */
abstract class BaseAnalytic extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'AnalyticPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AnalyticPeer
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
     * The value for the user_id field.
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the connection field.
     * @var        int
     */
    protected $connection;

    /**
     * The value for the ip field.
     * @var        string
     */
    protected $ip;

    /**
     * The value for the user_agent field.
     * @var        string
     */
    protected $user_agent;

    /**
     * The value for the screen_width field.
     * @var        int
     */
    protected $screen_width;

    /**
     * The value for the screen_height field.
     * @var        int
     */
    protected $screen_height;

    /**
     * The value for the screen_inner_width field.
     * @var        int
     */
    protected $screen_inner_width;

    /**
     * The value for the screen_inner_height field.
     * @var        int
     */
    protected $screen_inner_height;

    /**
     * The value for the cookie_enabled field.
     * @var        boolean
     */
    protected $cookie_enabled;

    /**
     * The value for the language field.
     * @var        string
     */
    protected $language;

    /**
     * The value for the platform field.
     * @var        string
     */
    protected $platform;

    /**
     * The value for the product field.
     * @var        string
     */
    protected $product;

    /**
     * The value for the product_sub field.
     * @var        string
     */
    protected $product_sub;

    /**
     * The value for the vendor field.
     * @var        string
     */
    protected $vendor;

    /**
     * The value for the vendor_sub field.
     * @var        string
     */
    protected $vendor_sub;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * @var        sfGuardUser
     */
    protected $asfGuardUser;

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
     * Get the [user_id] column value.
     * 
     * @return   int
     */
    public function getUserId()
    {

        return $this->user_id;
    }

    /**
     * Get the [connection] column value.
     * 
     * @return   int
     */
    public function getConnection()
    {

        return $this->connection;
    }

    /**
     * Get the [ip] column value.
     * 
     * @return   string
     */
    public function getIp()
    {

        return $this->ip;
    }

    /**
     * Get the [user_agent] column value.
     * 
     * @return   string
     */
    public function getUserAgent()
    {

        return $this->user_agent;
    }

    /**
     * Get the [screen_width] column value.
     * 
     * @return   int
     */
    public function getScreenWidth()
    {

        return $this->screen_width;
    }

    /**
     * Get the [screen_height] column value.
     * 
     * @return   int
     */
    public function getScreenHeight()
    {

        return $this->screen_height;
    }

    /**
     * Get the [screen_inner_width] column value.
     * 
     * @return   int
     */
    public function getScreenInnerWidth()
    {

        return $this->screen_inner_width;
    }

    /**
     * Get the [screen_inner_height] column value.
     * 
     * @return   int
     */
    public function getScreenInnerHeight()
    {

        return $this->screen_inner_height;
    }

    /**
     * Get the [cookie_enabled] column value.
     * 
     * @return   boolean
     */
    public function getCookieEnabled()
    {

        return $this->cookie_enabled;
    }

    /**
     * Get the [language] column value.
     * 
     * @return   string
     */
    public function getLanguage()
    {

        return $this->language;
    }

    /**
     * Get the [platform] column value.
     * 
     * @return   string
     */
    public function getPlatform()
    {

        return $this->platform;
    }

    /**
     * Get the [product] column value.
     * 
     * @return   string
     */
    public function getProduct()
    {

        return $this->product;
    }

    /**
     * Get the [product_sub] column value.
     * 
     * @return   string
     */
    public function getProductSub()
    {

        return $this->product_sub;
    }

    /**
     * Get the [vendor] column value.
     * 
     * @return   string
     */
    public function getVendor()
    {

        return $this->vendor;
    }

    /**
     * Get the [vendor_sub] column value.
     * 
     * @return   string
     */
    public function getVendorSub()
    {

        return $this->vendor_sub;
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
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = AnalyticPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [username] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = AnalyticPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [user_id] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setUserId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[] = AnalyticPeer::USER_ID;
        }

        if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
            $this->asfGuardUser = null;
        }


        return $this;
    } // setUserId()

    /**
     * Set the value of [connection] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setConnection($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->connection !== $v) {
            $this->connection = $v;
            $this->modifiedColumns[] = AnalyticPeer::CONNECTION;
        }


        return $this;
    } // setConnection()

    /**
     * Set the value of [ip] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ip !== $v) {
            $this->ip = $v;
            $this->modifiedColumns[] = AnalyticPeer::IP;
        }


        return $this;
    } // setIp()

    /**
     * Set the value of [user_agent] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setUserAgent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_agent !== $v) {
            $this->user_agent = $v;
            $this->modifiedColumns[] = AnalyticPeer::USER_AGENT;
        }


        return $this;
    } // setUserAgent()

    /**
     * Set the value of [screen_width] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setScreenWidth($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->screen_width !== $v) {
            $this->screen_width = $v;
            $this->modifiedColumns[] = AnalyticPeer::SCREEN_WIDTH;
        }


        return $this;
    } // setScreenWidth()

    /**
     * Set the value of [screen_height] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setScreenHeight($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->screen_height !== $v) {
            $this->screen_height = $v;
            $this->modifiedColumns[] = AnalyticPeer::SCREEN_HEIGHT;
        }


        return $this;
    } // setScreenHeight()

    /**
     * Set the value of [screen_inner_width] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setScreenInnerWidth($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->screen_inner_width !== $v) {
            $this->screen_inner_width = $v;
            $this->modifiedColumns[] = AnalyticPeer::SCREEN_INNER_WIDTH;
        }


        return $this;
    } // setScreenInnerWidth()

    /**
     * Set the value of [screen_inner_height] column.
     * 
     * @param      int $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setScreenInnerHeight($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->screen_inner_height !== $v) {
            $this->screen_inner_height = $v;
            $this->modifiedColumns[] = AnalyticPeer::SCREEN_INNER_HEIGHT;
        }


        return $this;
    } // setScreenInnerHeight()

    /**
     * Sets the value of the [cookie_enabled] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setCookieEnabled($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->cookie_enabled !== $v) {
            $this->cookie_enabled = $v;
            $this->modifiedColumns[] = AnalyticPeer::COOKIE_ENABLED;
        }


        return $this;
    } // setCookieEnabled()

    /**
     * Set the value of [language] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setLanguage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->language !== $v) {
            $this->language = $v;
            $this->modifiedColumns[] = AnalyticPeer::LANGUAGE;
        }


        return $this;
    } // setLanguage()

    /**
     * Set the value of [platform] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setPlatform($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->platform !== $v) {
            $this->platform = $v;
            $this->modifiedColumns[] = AnalyticPeer::PLATFORM;
        }


        return $this;
    } // setPlatform()

    /**
     * Set the value of [product] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setProduct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->product !== $v) {
            $this->product = $v;
            $this->modifiedColumns[] = AnalyticPeer::PRODUCT;
        }


        return $this;
    } // setProduct()

    /**
     * Set the value of [product_sub] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setProductSub($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->product_sub !== $v) {
            $this->product_sub = $v;
            $this->modifiedColumns[] = AnalyticPeer::PRODUCT_SUB;
        }


        return $this;
    } // setProductSub()

    /**
     * Set the value of [vendor] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setVendor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendor !== $v) {
            $this->vendor = $v;
            $this->modifiedColumns[] = AnalyticPeer::VENDOR;
        }


        return $this;
    } // setVendor()

    /**
     * Set the value of [vendor_sub] column.
     * 
     * @param      string $v new value
     * @return   Analytic The current object (for fluent API support)
     */
    public function setVendorSub($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vendor_sub !== $v) {
            $this->vendor_sub = $v;
            $this->modifiedColumns[] = AnalyticPeer::VENDOR_SUB;
        }


        return $this;
    } // setVendorSub()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Analytic The current object (for fluent API support)
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
                $this->modifiedColumns[] = AnalyticPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

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
            $this->user_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->connection = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->ip = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->user_agent = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->screen_width = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->screen_height = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->screen_inner_width = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->screen_inner_height = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->cookie_enabled = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
            $this->language = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->platform = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->product = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->product_sub = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->vendor = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->vendor_sub = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->created_at = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 18; // 18 = AnalyticPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Analytic object", $e);
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

        if ($this->asfGuardUser !== null && $this->user_id !== $this->asfGuardUser->getId()) {
            $this->asfGuardUser = null;
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
            $con = Propel::getConnection(AnalyticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AnalyticPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->asfGuardUser = null;
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

    foreach (sfMixer::getCallables('BaseAnalytic:delete:pre') as $callable)
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
            $con = Propel::getConnection(AnalyticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AnalyticQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseAnalytic:delete:post') as $callable)
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

    if (!$this->isSkipEdited() && !$this->isColumnModified(AnalyticPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    }


    foreach (sfMixer::getCallables('BaseAnalytic:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(AnalyticPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(AnalyticPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AnalyticPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseAnalytic:save:post') as $callable)
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

            if ($this->asfGuardUser !== null) {
                if ($this->asfGuardUser->isModified() || $this->asfGuardUser->isNew()) {
                    $affectedRows += $this->asfGuardUser->save($con);
                }
                $this->setsfGuardUser($this->asfGuardUser);
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

        $this->modifiedColumns[] = AnalyticPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AnalyticPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AnalyticPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(AnalyticPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`USERNAME`';
        }
        if ($this->isColumnModified(AnalyticPeer::USER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`USER_ID`';
        }
        if ($this->isColumnModified(AnalyticPeer::CONNECTION)) {
            $modifiedColumns[':p' . $index++]  = '`CONNECTION`';
        }
        if ($this->isColumnModified(AnalyticPeer::IP)) {
            $modifiedColumns[':p' . $index++]  = '`IP`';
        }
        if ($this->isColumnModified(AnalyticPeer::USER_AGENT)) {
            $modifiedColumns[':p' . $index++]  = '`USER_AGENT`';
        }
        if ($this->isColumnModified(AnalyticPeer::SCREEN_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = '`SCREEN_WIDTH`';
        }
        if ($this->isColumnModified(AnalyticPeer::SCREEN_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`SCREEN_HEIGHT`';
        }
        if ($this->isColumnModified(AnalyticPeer::SCREEN_INNER_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = '`SCREEN_INNER_WIDTH`';
        }
        if ($this->isColumnModified(AnalyticPeer::SCREEN_INNER_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`SCREEN_INNER_HEIGHT`';
        }
        if ($this->isColumnModified(AnalyticPeer::COOKIE_ENABLED)) {
            $modifiedColumns[':p' . $index++]  = '`COOKIE_ENABLED`';
        }
        if ($this->isColumnModified(AnalyticPeer::LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = '`LANGUAGE`';
        }
        if ($this->isColumnModified(AnalyticPeer::PLATFORM)) {
            $modifiedColumns[':p' . $index++]  = '`PLATFORM`';
        }
        if ($this->isColumnModified(AnalyticPeer::PRODUCT)) {
            $modifiedColumns[':p' . $index++]  = '`PRODUCT`';
        }
        if ($this->isColumnModified(AnalyticPeer::PRODUCT_SUB)) {
            $modifiedColumns[':p' . $index++]  = '`PRODUCT_SUB`';
        }
        if ($this->isColumnModified(AnalyticPeer::VENDOR)) {
            $modifiedColumns[':p' . $index++]  = '`VENDOR`';
        }
        if ($this->isColumnModified(AnalyticPeer::VENDOR_SUB)) {
            $modifiedColumns[':p' . $index++]  = '`VENDOR_SUB`';
        }
        if ($this->isColumnModified(AnalyticPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_AT`';
        }

        $sql = sprintf(
            'INSERT INTO `sfc_plugin_analytic` (%s) VALUES (%s)',
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
                    case '`USER_ID`':
						$stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case '`CONNECTION`':
						$stmt->bindValue($identifier, $this->connection, PDO::PARAM_INT);
                        break;
                    case '`IP`':
						$stmt->bindValue($identifier, $this->ip, PDO::PARAM_STR);
                        break;
                    case '`USER_AGENT`':
						$stmt->bindValue($identifier, $this->user_agent, PDO::PARAM_STR);
                        break;
                    case '`SCREEN_WIDTH`':
						$stmt->bindValue($identifier, $this->screen_width, PDO::PARAM_INT);
                        break;
                    case '`SCREEN_HEIGHT`':
						$stmt->bindValue($identifier, $this->screen_height, PDO::PARAM_INT);
                        break;
                    case '`SCREEN_INNER_WIDTH`':
						$stmt->bindValue($identifier, $this->screen_inner_width, PDO::PARAM_INT);
                        break;
                    case '`SCREEN_INNER_HEIGHT`':
						$stmt->bindValue($identifier, $this->screen_inner_height, PDO::PARAM_INT);
                        break;
                    case '`COOKIE_ENABLED`':
						$stmt->bindValue($identifier, (int) $this->cookie_enabled, PDO::PARAM_INT);
                        break;
                    case '`LANGUAGE`':
						$stmt->bindValue($identifier, $this->language, PDO::PARAM_STR);
                        break;
                    case '`PLATFORM`':
						$stmt->bindValue($identifier, $this->platform, PDO::PARAM_STR);
                        break;
                    case '`PRODUCT`':
						$stmt->bindValue($identifier, $this->product, PDO::PARAM_STR);
                        break;
                    case '`PRODUCT_SUB`':
						$stmt->bindValue($identifier, $this->product_sub, PDO::PARAM_STR);
                        break;
                    case '`VENDOR`':
						$stmt->bindValue($identifier, $this->vendor, PDO::PARAM_STR);
                        break;
                    case '`VENDOR_SUB`':
						$stmt->bindValue($identifier, $this->vendor_sub, PDO::PARAM_STR);
                        break;
                    case '`CREATED_AT`':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->asfGuardUser !== null) {
                if (!$this->asfGuardUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
                }
            }


            if (($retval = AnalyticPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = AnalyticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUserId();
                break;
            case 3:
                return $this->getConnection();
                break;
            case 4:
                return $this->getIp();
                break;
            case 5:
                return $this->getUserAgent();
                break;
            case 6:
                return $this->getScreenWidth();
                break;
            case 7:
                return $this->getScreenHeight();
                break;
            case 8:
                return $this->getScreenInnerWidth();
                break;
            case 9:
                return $this->getScreenInnerHeight();
                break;
            case 10:
                return $this->getCookieEnabled();
                break;
            case 11:
                return $this->getLanguage();
                break;
            case 12:
                return $this->getPlatform();
                break;
            case 13:
                return $this->getProduct();
                break;
            case 14:
                return $this->getProductSub();
                break;
            case 15:
                return $this->getVendor();
                break;
            case 16:
                return $this->getVendorSub();
                break;
            case 17:
                return $this->getCreatedAt();
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
        if (isset($alreadyDumpedObjects['Analytic'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Analytic'][$this->getPrimaryKey()] = true;
        $keys = AnalyticPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUsername(),
            $keys[2] => $this->getUserId(),
            $keys[3] => $this->getConnection(),
            $keys[4] => $this->getIp(),
            $keys[5] => $this->getUserAgent(),
            $keys[6] => $this->getScreenWidth(),
            $keys[7] => $this->getScreenHeight(),
            $keys[8] => $this->getScreenInnerWidth(),
            $keys[9] => $this->getScreenInnerHeight(),
            $keys[10] => $this->getCookieEnabled(),
            $keys[11] => $this->getLanguage(),
            $keys[12] => $this->getPlatform(),
            $keys[13] => $this->getProduct(),
            $keys[14] => $this->getProductSub(),
            $keys[15] => $this->getVendor(),
            $keys[16] => $this->getVendorSub(),
            $keys[17] => $this->getCreatedAt(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->asfGuardUser) {
                $result['sfGuardUser'] = $this->asfGuardUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = AnalyticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUserId($value);
                break;
            case 3:
                $this->setConnection($value);
                break;
            case 4:
                $this->setIp($value);
                break;
            case 5:
                $this->setUserAgent($value);
                break;
            case 6:
                $this->setScreenWidth($value);
                break;
            case 7:
                $this->setScreenHeight($value);
                break;
            case 8:
                $this->setScreenInnerWidth($value);
                break;
            case 9:
                $this->setScreenInnerHeight($value);
                break;
            case 10:
                $this->setCookieEnabled($value);
                break;
            case 11:
                $this->setLanguage($value);
                break;
            case 12:
                $this->setPlatform($value);
                break;
            case 13:
                $this->setProduct($value);
                break;
            case 14:
                $this->setProductSub($value);
                break;
            case 15:
                $this->setVendor($value);
                break;
            case 16:
                $this->setVendorSub($value);
                break;
            case 17:
                $this->setCreatedAt($value);
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
        $keys = AnalyticPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setConnection($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIp($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setUserAgent($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setScreenWidth($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setScreenHeight($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setScreenInnerWidth($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setScreenInnerHeight($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCookieEnabled($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLanguage($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setPlatform($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setProduct($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setProductSub($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setVendor($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setVendorSub($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCreatedAt($arr[$keys[17]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AnalyticPeer::DATABASE_NAME);

        if ($this->isColumnModified(AnalyticPeer::ID)) $criteria->add(AnalyticPeer::ID, $this->id);
        if ($this->isColumnModified(AnalyticPeer::USERNAME)) $criteria->add(AnalyticPeer::USERNAME, $this->username);
        if ($this->isColumnModified(AnalyticPeer::USER_ID)) $criteria->add(AnalyticPeer::USER_ID, $this->user_id);
        if ($this->isColumnModified(AnalyticPeer::CONNECTION)) $criteria->add(AnalyticPeer::CONNECTION, $this->connection);
        if ($this->isColumnModified(AnalyticPeer::IP)) $criteria->add(AnalyticPeer::IP, $this->ip);
        if ($this->isColumnModified(AnalyticPeer::USER_AGENT)) $criteria->add(AnalyticPeer::USER_AGENT, $this->user_agent);
        if ($this->isColumnModified(AnalyticPeer::SCREEN_WIDTH)) $criteria->add(AnalyticPeer::SCREEN_WIDTH, $this->screen_width);
        if ($this->isColumnModified(AnalyticPeer::SCREEN_HEIGHT)) $criteria->add(AnalyticPeer::SCREEN_HEIGHT, $this->screen_height);
        if ($this->isColumnModified(AnalyticPeer::SCREEN_INNER_WIDTH)) $criteria->add(AnalyticPeer::SCREEN_INNER_WIDTH, $this->screen_inner_width);
        if ($this->isColumnModified(AnalyticPeer::SCREEN_INNER_HEIGHT)) $criteria->add(AnalyticPeer::SCREEN_INNER_HEIGHT, $this->screen_inner_height);
        if ($this->isColumnModified(AnalyticPeer::COOKIE_ENABLED)) $criteria->add(AnalyticPeer::COOKIE_ENABLED, $this->cookie_enabled);
        if ($this->isColumnModified(AnalyticPeer::LANGUAGE)) $criteria->add(AnalyticPeer::LANGUAGE, $this->language);
        if ($this->isColumnModified(AnalyticPeer::PLATFORM)) $criteria->add(AnalyticPeer::PLATFORM, $this->platform);
        if ($this->isColumnModified(AnalyticPeer::PRODUCT)) $criteria->add(AnalyticPeer::PRODUCT, $this->product);
        if ($this->isColumnModified(AnalyticPeer::PRODUCT_SUB)) $criteria->add(AnalyticPeer::PRODUCT_SUB, $this->product_sub);
        if ($this->isColumnModified(AnalyticPeer::VENDOR)) $criteria->add(AnalyticPeer::VENDOR, $this->vendor);
        if ($this->isColumnModified(AnalyticPeer::VENDOR_SUB)) $criteria->add(AnalyticPeer::VENDOR_SUB, $this->vendor_sub);
        if ($this->isColumnModified(AnalyticPeer::CREATED_AT)) $criteria->add(AnalyticPeer::CREATED_AT, $this->created_at);

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
        $criteria = new Criteria(AnalyticPeer::DATABASE_NAME);
        $criteria->add(AnalyticPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Analytic (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsername($this->getUsername());
        $copyObj->setUserId($this->getUserId());
        $copyObj->setConnection($this->getConnection());
        $copyObj->setIp($this->getIp());
        $copyObj->setUserAgent($this->getUserAgent());
        $copyObj->setScreenWidth($this->getScreenWidth());
        $copyObj->setScreenHeight($this->getScreenHeight());
        $copyObj->setScreenInnerWidth($this->getScreenInnerWidth());
        $copyObj->setScreenInnerHeight($this->getScreenInnerHeight());
        $copyObj->setCookieEnabled($this->getCookieEnabled());
        $copyObj->setLanguage($this->getLanguage());
        $copyObj->setPlatform($this->getPlatform());
        $copyObj->setProduct($this->getProduct());
        $copyObj->setProductSub($this->getProductSub());
        $copyObj->setVendor($this->getVendor());
        $copyObj->setVendorSub($this->getVendorSub());
        $copyObj->setCreatedAt($this->getCreatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
     * @return                 Analytic Clone of current object.
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
     * @return   AnalyticPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AnalyticPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Analytic The current object (for fluent API support)
     * @throws PropelException
     */
    public function setsfGuardUser(sfGuardUser $v = null)
    {
        if ($v === null) {
            $this->setUserId(NULL);
        } else {
            $this->setUserId($v->getId());
        }

        $this->asfGuardUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the sfGuardUser object, it will not be re-added.
        if ($v !== null) {
            $v->addAnalytic($this);
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
    public function getsfGuardUser(PropelPDO $con = null)
    {
        if ($this->asfGuardUser === null && ($this->user_id !== null)) {
            $this->asfGuardUser = sfGuardUserQuery::create()->findPk($this->user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->asfGuardUser->addAnalytics($this);
             */
        }

        return $this->asfGuardUser;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->username = null;
        $this->user_id = null;
        $this->connection = null;
        $this->ip = null;
        $this->user_agent = null;
        $this->screen_width = null;
        $this->screen_height = null;
        $this->screen_inner_width = null;
        $this->screen_inner_height = null;
        $this->cookie_enabled = null;
        $this->language = null;
        $this->platform = null;
        $this->product = null;
        $this->product_sub = null;
        $this->vendor = null;
        $this->vendor_sub = null;
        $this->created_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
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
        } // if ($deep)

        $this->asfGuardUser = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AnalyticPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseAnalytic:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseAnalytic::%s', $name));
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
		return AnalyticPeer::getMetadata($info, $default, get_class($this));
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
} // BaseAnalytic

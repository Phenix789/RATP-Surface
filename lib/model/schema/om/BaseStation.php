<?php


/**
 * Base class that represents a row from the 'ratp_station' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.schema.om
 */
abstract class BaseStation extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'StationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        StationPeer
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
     * The value for the code field.
     * @var        string
     */
    protected $code;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the geo_x field.
     * @var        double
     */
    protected $geo_x;

    /**
     * The value for the geo_y field.
     * @var        double
     */
    protected $geo_y;

    /**
     * The value for the zone field.
     * @var        int
     */
    protected $zone;

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
     * @var        PropelObjectCollection|StationType[] Collection to store aggregation of StationType objects.
     */
    protected $collStationTypes;

    /**
     * @var        PropelObjectCollection|Travel[] Collection to store aggregation of Travel objects.
     */
    protected $collTravelsRelatedByStationInId;

    /**
     * @var        PropelObjectCollection|Travel[] Collection to store aggregation of Travel objects.
     */
    protected $collTravelsRelatedByStationOutId;

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
    protected $stationTypesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $travelsRelatedByStationInIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $travelsRelatedByStationOutIdScheduledForDeletion = null;

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
     * Get the [code] column value.
     * 
     * @return   string
     */
    public function getCode()
    {

        return $this->code;
    }

    /**
     * Get the [name] column value.
     * 
     * @return   string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [geo_x] column value.
     * 
     * @return   double
     */
    public function getGeoX()
    {

        return $this->geo_x;
    }

    /**
     * Get the [geo_y] column value.
     * 
     * @return   double
     */
    public function getGeoY()
    {

        return $this->geo_y;
    }

    /**
     * Get the [zone] column value.
     * 
     * @return   int
     */
    public function getZone()
    {

        return $this->zone;
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
     * Get the [optionally formatted] temporal [updated_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }


        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->updated_at);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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
     * @return   Station The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = StationPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [code] column.
     * 
     * @param      string $v new value
     * @return   Station The current object (for fluent API support)
     */
    public function setCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code !== $v) {
            $this->code = $v;
            $this->modifiedColumns[] = StationPeer::CODE;
        }


        return $this;
    } // setCode()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   Station The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = StationPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [geo_x] column.
     * 
     * @param      double $v new value
     * @return   Station The current object (for fluent API support)
     */
    public function setGeoX($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->geo_x !== $v) {
            $this->geo_x = $v;
            $this->modifiedColumns[] = StationPeer::GEO_X;
        }


        return $this;
    } // setGeoX()

    /**
     * Set the value of [geo_y] column.
     * 
     * @param      double $v new value
     * @return   Station The current object (for fluent API support)
     */
    public function setGeoY($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->geo_y !== $v) {
            $this->geo_y = $v;
            $this->modifiedColumns[] = StationPeer::GEO_Y;
        }


        return $this;
    } // setGeoY()

    /**
     * Set the value of [zone] column.
     * 
     * @param      int $v new value
     * @return   Station The current object (for fluent API support)
     */
    public function setZone($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->zone !== $v) {
            $this->zone = $v;
            $this->modifiedColumns[] = StationPeer::ZONE;
        }


        return $this;
    } // setZone()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Station The current object (for fluent API support)
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
                $this->modifiedColumns[] = StationPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Station The current object (for fluent API support)
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
                $this->modifiedColumns[] = StationPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [created_by] column.
     * 
     * @param      int $v new value
     * @return   Station The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = StationPeer::CREATED_BY;
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
     * @return   Station The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = StationPeer::UPDATED_BY;
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
            $this->code = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->geo_x = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
            $this->geo_y = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
            $this->zone = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->created_at = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->updated_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->created_by = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->updated_by = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = StationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Station object", $e);
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
            $con = Propel::getConnection(StationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = StationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->asfGuardUserRelatedByCreatedBy = null;
            $this->asfGuardUserRelatedByUpdatedBy = null;
            $this->collStationTypes = null;

            $this->collTravelsRelatedByStationInId = null;

            $this->collTravelsRelatedByStationOutId = null;

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

    foreach (sfMixer::getCallables('BaseStation:delete:pre') as $callable)
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
            $con = Propel::getConnection(StationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = StationQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseStation:delete:post') as $callable)
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

    if (!$this->isSkipEdited() && !$this->isColumnModified(StationPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(StationPeer::UPDATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setUpdatedBy($user_id);
    }

    }

    if ($this->isNew()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(StationPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(StationPeer::CREATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setCreatedBy($user_id);
    }

    }


    foreach (sfMixer::getCallables('BaseStation:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(StationPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(StationPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(StationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                StationPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseStation:save:post') as $callable)
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

            if ($this->stationTypesScheduledForDeletion !== null) {
                if (!$this->stationTypesScheduledForDeletion->isEmpty()) {
                    StationTypeQuery::create()
                        ->filterByPrimaryKeys($this->stationTypesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->stationTypesScheduledForDeletion = null;
                }
            }

            if ($this->collStationTypes !== null) {
                foreach ($this->collStationTypes as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->travelsRelatedByStationInIdScheduledForDeletion !== null) {
                if (!$this->travelsRelatedByStationInIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->travelsRelatedByStationInIdScheduledForDeletion as $travelRelatedByStationInId) {
                        // need to save related object because we set the relation to null
                        $travelRelatedByStationInId->save($con);
                    }
                    $this->travelsRelatedByStationInIdScheduledForDeletion = null;
                }
            }

            if ($this->collTravelsRelatedByStationInId !== null) {
                foreach ($this->collTravelsRelatedByStationInId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->travelsRelatedByStationOutIdScheduledForDeletion !== null) {
                if (!$this->travelsRelatedByStationOutIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->travelsRelatedByStationOutIdScheduledForDeletion as $travelRelatedByStationOutId) {
                        // need to save related object because we set the relation to null
                        $travelRelatedByStationOutId->save($con);
                    }
                    $this->travelsRelatedByStationOutIdScheduledForDeletion = null;
                }
            }

            if ($this->collTravelsRelatedByStationOutId !== null) {
                foreach ($this->collTravelsRelatedByStationOutId as $referrerFK) {
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

        $this->modifiedColumns[] = StationPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . StationPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(StationPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(StationPeer::CODE)) {
            $modifiedColumns[':p' . $index++]  = '`CODE`';
        }
        if ($this->isColumnModified(StationPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }
        if ($this->isColumnModified(StationPeer::GEO_X)) {
            $modifiedColumns[':p' . $index++]  = '`GEO_X`';
        }
        if ($this->isColumnModified(StationPeer::GEO_Y)) {
            $modifiedColumns[':p' . $index++]  = '`GEO_Y`';
        }
        if ($this->isColumnModified(StationPeer::ZONE)) {
            $modifiedColumns[':p' . $index++]  = '`ZONE`';
        }
        if ($this->isColumnModified(StationPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_AT`';
        }
        if ($this->isColumnModified(StationPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`UPDATED_AT`';
        }
        if ($this->isColumnModified(StationPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_BY`';
        }
        if ($this->isColumnModified(StationPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`UPDATED_BY`';
        }

        $sql = sprintf(
            'INSERT INTO `ratp_station` (%s) VALUES (%s)',
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
                    case '`CODE`':
						$stmt->bindValue($identifier, $this->code, PDO::PARAM_STR);
                        break;
                    case '`NAME`':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`GEO_X`':
						$stmt->bindValue($identifier, $this->geo_x, PDO::PARAM_STR);
                        break;
                    case '`GEO_Y`':
						$stmt->bindValue($identifier, $this->geo_y, PDO::PARAM_STR);
                        break;
                    case '`ZONE`':
						$stmt->bindValue($identifier, $this->zone, PDO::PARAM_INT);
                        break;
                    case '`CREATED_AT`':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`UPDATED_AT`':
						$stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                    case '`CREATED_BY`':
						$stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`UPDATED_BY`':
						$stmt->bindValue($identifier, $this->updated_by, PDO::PARAM_INT);
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


            if (($retval = StationPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collStationTypes !== null) {
                    foreach ($this->collStationTypes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTravelsRelatedByStationInId !== null) {
                    foreach ($this->collTravelsRelatedByStationInId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTravelsRelatedByStationOutId !== null) {
                    foreach ($this->collTravelsRelatedByStationOutId as $referrerFK) {
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
        $pos = StationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCode();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getGeoX();
                break;
            case 4:
                return $this->getGeoY();
                break;
            case 5:
                return $this->getZone();
                break;
            case 6:
                return $this->getCreatedAt();
                break;
            case 7:
                return $this->getUpdatedAt();
                break;
            case 8:
                return $this->getCreatedBy();
                break;
            case 9:
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
        if (isset($alreadyDumpedObjects['Station'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Station'][$this->getPrimaryKey()] = true;
        $keys = StationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCode(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getGeoX(),
            $keys[4] => $this->getGeoY(),
            $keys[5] => $this->getZone(),
            $keys[6] => $this->getCreatedAt(),
            $keys[7] => $this->getUpdatedAt(),
            $keys[8] => $this->getCreatedBy(),
            $keys[9] => $this->getUpdatedBy(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->asfGuardUserRelatedByCreatedBy) {
                $result['sfGuardUserRelatedByCreatedBy'] = $this->asfGuardUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->asfGuardUserRelatedByUpdatedBy) {
                $result['sfGuardUserRelatedByUpdatedBy'] = $this->asfGuardUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collStationTypes) {
                $result['StationTypes'] = $this->collStationTypes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTravelsRelatedByStationInId) {
                $result['TravelsRelatedByStationInId'] = $this->collTravelsRelatedByStationInId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTravelsRelatedByStationOutId) {
                $result['TravelsRelatedByStationOutId'] = $this->collTravelsRelatedByStationOutId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = StationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCode($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setGeoX($value);
                break;
            case 4:
                $this->setGeoY($value);
                break;
            case 5:
                $this->setZone($value);
                break;
            case 6:
                $this->setCreatedAt($value);
                break;
            case 7:
                $this->setUpdatedAt($value);
                break;
            case 8:
                $this->setCreatedBy($value);
                break;
            case 9:
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
        $keys = StationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setCode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setGeoX($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setGeoY($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setZone($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(StationPeer::DATABASE_NAME);

        if ($this->isColumnModified(StationPeer::ID)) $criteria->add(StationPeer::ID, $this->id);
        if ($this->isColumnModified(StationPeer::CODE)) $criteria->add(StationPeer::CODE, $this->code);
        if ($this->isColumnModified(StationPeer::NAME)) $criteria->add(StationPeer::NAME, $this->name);
        if ($this->isColumnModified(StationPeer::GEO_X)) $criteria->add(StationPeer::GEO_X, $this->geo_x);
        if ($this->isColumnModified(StationPeer::GEO_Y)) $criteria->add(StationPeer::GEO_Y, $this->geo_y);
        if ($this->isColumnModified(StationPeer::ZONE)) $criteria->add(StationPeer::ZONE, $this->zone);
        if ($this->isColumnModified(StationPeer::CREATED_AT)) $criteria->add(StationPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(StationPeer::UPDATED_AT)) $criteria->add(StationPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(StationPeer::CREATED_BY)) $criteria->add(StationPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(StationPeer::UPDATED_BY)) $criteria->add(StationPeer::UPDATED_BY, $this->updated_by);

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
        $criteria = new Criteria(StationPeer::DATABASE_NAME);
        $criteria->add(StationPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Station (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCode($this->getCode());
        $copyObj->setName($this->getName());
        $copyObj->setGeoX($this->getGeoX());
        $copyObj->setGeoY($this->getGeoY());
        $copyObj->setZone($this->getZone());
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

            foreach ($this->getStationTypes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStationType($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTravelsRelatedByStationInId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTravelRelatedByStationInId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTravelsRelatedByStationOutId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTravelRelatedByStationOutId($relObj->copy($deepCopy));
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
     * @return                 Station Clone of current object.
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
     * @return   StationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new StationPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Station The current object (for fluent API support)
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
            $v->addStationRelatedByCreatedBy($this);
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
                $this->asfGuardUserRelatedByCreatedBy->addStationsRelatedByCreatedBy($this);
             */
        }

        return $this->asfGuardUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Station The current object (for fluent API support)
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
            $v->addStationRelatedByUpdatedBy($this);
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
                $this->asfGuardUserRelatedByUpdatedBy->addStationsRelatedByUpdatedBy($this);
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
        if ('StationType' == $relationName) {
            $this->initStationTypes();
        }
        if ('TravelRelatedByStationInId' == $relationName) {
            $this->initTravelsRelatedByStationInId();
        }
        if ('TravelRelatedByStationOutId' == $relationName) {
            $this->initTravelsRelatedByStationOutId();
        }
    }

    /**
     * Clears out the collStationTypes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addStationTypes()
     */
    public function clearStationTypes()
    {
        $this->collStationTypes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collStationTypes collection.
     *
     * By default this just sets the collStationTypes collection to an empty array (like clearcollStationTypes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStationTypes($overrideExisting = true)
    {
        if (null !== $this->collStationTypes && !$overrideExisting) {
            return;
        }
        $this->collStationTypes = new PropelObjectCollection();
        $this->collStationTypes->setModel('StationType');
    }

    /**
     * Gets an array of StationType objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Station is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|StationType[] List of StationType objects
     * @throws PropelException
     */
    public function getStationTypes($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collStationTypes || null !== $criteria) {
            if ($this->isNew() && null === $this->collStationTypes) {
                // return empty collection
                $this->initStationTypes();
            } else {
                $collStationTypes = StationTypeQuery::create(null, $criteria)
                    ->filterByStation($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collStationTypes;
                }
                $this->collStationTypes = $collStationTypes;
            }
        }

        return $this->collStationTypes;
    }

    /**
     * Sets a collection of StationType objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $stationTypes A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setStationTypes(PropelCollection $stationTypes, PropelPDO $con = null)
    {
        $this->stationTypesScheduledForDeletion = $this->getStationTypes(new Criteria(), $con)->diff($stationTypes);

        foreach ($this->stationTypesScheduledForDeletion as $stationTypeRemoved) {
            $stationTypeRemoved->setStation(null);
        }

        $this->collStationTypes = null;
        foreach ($stationTypes as $stationType) {
            $this->addStationType($stationType);
        }

        $this->collStationTypes = $stationTypes;
    }

    /**
     * Returns the number of related StationType objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related StationType objects.
     * @throws PropelException
     */
    public function countStationTypes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collStationTypes || null !== $criteria) {
            if ($this->isNew() && null === $this->collStationTypes) {
                return 0;
            } else {
                $query = StationTypeQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByStation($this)
                    ->count($con);
            }
        } else {
            return count($this->collStationTypes);
        }
    }

    /**
     * Method called to associate a StationType object to this object
     * through the StationType foreign key attribute.
     *
     * @param    StationType $l StationType
     * @return   Station The current object (for fluent API support)
     */
    public function addStationType(StationType $l)
    {
        if ($this->collStationTypes === null) {
            $this->initStationTypes();
        }
        if (!$this->collStationTypes->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddStationType($l);
        }

        return $this;
    }

    /**
     * @param	StationType $stationType The stationType object to add.
     */
    protected function doAddStationType($stationType)
    {
        $this->collStationTypes[]= $stationType;
        $stationType->setStation($this);
    }

    /**
     * @param	StationType $stationType The stationType object to remove.
     */
    public function removeStationType($stationType)
    {
        if ($this->getStationTypes()->contains($stationType)) {
            $this->collStationTypes->remove($this->collStationTypes->search($stationType));
            if (null === $this->stationTypesScheduledForDeletion) {
                $this->stationTypesScheduledForDeletion = clone $this->collStationTypes;
                $this->stationTypesScheduledForDeletion->clear();
            }
            $this->stationTypesScheduledForDeletion[]= $stationType;
            $stationType->setStation(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related StationTypes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StationType[] List of StationType objects
     */
    public function getStationTypesJoinTransportType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StationTypeQuery::create(null, $criteria);
        $query->joinWith('TransportType', $join_behavior);

        return $this->getStationTypes($query, $con);
    }

    /**
     * Clears out the collTravelsRelatedByStationInId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTravelsRelatedByStationInId()
     */
    public function clearTravelsRelatedByStationInId()
    {
        $this->collTravelsRelatedByStationInId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTravelsRelatedByStationInId collection.
     *
     * By default this just sets the collTravelsRelatedByStationInId collection to an empty array (like clearcollTravelsRelatedByStationInId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTravelsRelatedByStationInId($overrideExisting = true)
    {
        if (null !== $this->collTravelsRelatedByStationInId && !$overrideExisting) {
            return;
        }
        $this->collTravelsRelatedByStationInId = new PropelObjectCollection();
        $this->collTravelsRelatedByStationInId->setModel('Travel');
    }

    /**
     * Gets an array of Travel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Station is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Travel[] List of Travel objects
     * @throws PropelException
     */
    public function getTravelsRelatedByStationInId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByStationInId || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByStationInId) {
                // return empty collection
                $this->initTravelsRelatedByStationInId();
            } else {
                $collTravelsRelatedByStationInId = TravelQuery::create(null, $criteria)
                    ->filterByStationRelatedByStationInId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTravelsRelatedByStationInId;
                }
                $this->collTravelsRelatedByStationInId = $collTravelsRelatedByStationInId;
            }
        }

        return $this->collTravelsRelatedByStationInId;
    }

    /**
     * Sets a collection of TravelRelatedByStationInId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $travelsRelatedByStationInId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTravelsRelatedByStationInId(PropelCollection $travelsRelatedByStationInId, PropelPDO $con = null)
    {
        $this->travelsRelatedByStationInIdScheduledForDeletion = $this->getTravelsRelatedByStationInId(new Criteria(), $con)->diff($travelsRelatedByStationInId);

        foreach ($this->travelsRelatedByStationInIdScheduledForDeletion as $travelRelatedByStationInIdRemoved) {
            $travelRelatedByStationInIdRemoved->setStationRelatedByStationInId(null);
        }

        $this->collTravelsRelatedByStationInId = null;
        foreach ($travelsRelatedByStationInId as $travelRelatedByStationInId) {
            $this->addTravelRelatedByStationInId($travelRelatedByStationInId);
        }

        $this->collTravelsRelatedByStationInId = $travelsRelatedByStationInId;
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
    public function countTravelsRelatedByStationInId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByStationInId || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByStationInId) {
                return 0;
            } else {
                $query = TravelQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByStationRelatedByStationInId($this)
                    ->count($con);
            }
        } else {
            return count($this->collTravelsRelatedByStationInId);
        }
    }

    /**
     * Method called to associate a Travel object to this object
     * through the Travel foreign key attribute.
     *
     * @param    Travel $l Travel
     * @return   Station The current object (for fluent API support)
     */
    public function addTravelRelatedByStationInId(Travel $l)
    {
        if ($this->collTravelsRelatedByStationInId === null) {
            $this->initTravelsRelatedByStationInId();
        }
        if (!$this->collTravelsRelatedByStationInId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTravelRelatedByStationInId($l);
        }

        return $this;
    }

    /**
     * @param	TravelRelatedByStationInId $travelRelatedByStationInId The travelRelatedByStationInId object to add.
     */
    protected function doAddTravelRelatedByStationInId($travelRelatedByStationInId)
    {
        $this->collTravelsRelatedByStationInId[]= $travelRelatedByStationInId;
        $travelRelatedByStationInId->setStationRelatedByStationInId($this);
    }

    /**
     * @param	TravelRelatedByStationInId $travelRelatedByStationInId The travelRelatedByStationInId object to remove.
     */
    public function removeTravelRelatedByStationInId($travelRelatedByStationInId)
    {
        if ($this->getTravelsRelatedByStationInId()->contains($travelRelatedByStationInId)) {
            $this->collTravelsRelatedByStationInId->remove($this->collTravelsRelatedByStationInId->search($travelRelatedByStationInId));
            if (null === $this->travelsRelatedByStationInIdScheduledForDeletion) {
                $this->travelsRelatedByStationInIdScheduledForDeletion = clone $this->collTravelsRelatedByStationInId;
                $this->travelsRelatedByStationInIdScheduledForDeletion->clear();
            }
            $this->travelsRelatedByStationInIdScheduledForDeletion[]= $travelRelatedByStationInId;
            $travelRelatedByStationInId->setStationRelatedByStationInId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related TravelsRelatedByStationInId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByStationInIdJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getTravelsRelatedByStationInId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related TravelsRelatedByStationInId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByStationInIdJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByCreatedBy', $join_behavior);

        return $this->getTravelsRelatedByStationInId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related TravelsRelatedByStationInId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByStationInIdJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByUpdatedBy', $join_behavior);

        return $this->getTravelsRelatedByStationInId($query, $con);
    }

    /**
     * Clears out the collTravelsRelatedByStationOutId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTravelsRelatedByStationOutId()
     */
    public function clearTravelsRelatedByStationOutId()
    {
        $this->collTravelsRelatedByStationOutId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collTravelsRelatedByStationOutId collection.
     *
     * By default this just sets the collTravelsRelatedByStationOutId collection to an empty array (like clearcollTravelsRelatedByStationOutId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTravelsRelatedByStationOutId($overrideExisting = true)
    {
        if (null !== $this->collTravelsRelatedByStationOutId && !$overrideExisting) {
            return;
        }
        $this->collTravelsRelatedByStationOutId = new PropelObjectCollection();
        $this->collTravelsRelatedByStationOutId->setModel('Travel');
    }

    /**
     * Gets an array of Travel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Station is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Travel[] List of Travel objects
     * @throws PropelException
     */
    public function getTravelsRelatedByStationOutId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByStationOutId || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByStationOutId) {
                // return empty collection
                $this->initTravelsRelatedByStationOutId();
            } else {
                $collTravelsRelatedByStationOutId = TravelQuery::create(null, $criteria)
                    ->filterByStationRelatedByStationOutId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collTravelsRelatedByStationOutId;
                }
                $this->collTravelsRelatedByStationOutId = $collTravelsRelatedByStationOutId;
            }
        }

        return $this->collTravelsRelatedByStationOutId;
    }

    /**
     * Sets a collection of TravelRelatedByStationOutId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $travelsRelatedByStationOutId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setTravelsRelatedByStationOutId(PropelCollection $travelsRelatedByStationOutId, PropelPDO $con = null)
    {
        $this->travelsRelatedByStationOutIdScheduledForDeletion = $this->getTravelsRelatedByStationOutId(new Criteria(), $con)->diff($travelsRelatedByStationOutId);

        foreach ($this->travelsRelatedByStationOutIdScheduledForDeletion as $travelRelatedByStationOutIdRemoved) {
            $travelRelatedByStationOutIdRemoved->setStationRelatedByStationOutId(null);
        }

        $this->collTravelsRelatedByStationOutId = null;
        foreach ($travelsRelatedByStationOutId as $travelRelatedByStationOutId) {
            $this->addTravelRelatedByStationOutId($travelRelatedByStationOutId);
        }

        $this->collTravelsRelatedByStationOutId = $travelsRelatedByStationOutId;
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
    public function countTravelsRelatedByStationOutId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collTravelsRelatedByStationOutId || null !== $criteria) {
            if ($this->isNew() && null === $this->collTravelsRelatedByStationOutId) {
                return 0;
            } else {
                $query = TravelQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByStationRelatedByStationOutId($this)
                    ->count($con);
            }
        } else {
            return count($this->collTravelsRelatedByStationOutId);
        }
    }

    /**
     * Method called to associate a Travel object to this object
     * through the Travel foreign key attribute.
     *
     * @param    Travel $l Travel
     * @return   Station The current object (for fluent API support)
     */
    public function addTravelRelatedByStationOutId(Travel $l)
    {
        if ($this->collTravelsRelatedByStationOutId === null) {
            $this->initTravelsRelatedByStationOutId();
        }
        if (!$this->collTravelsRelatedByStationOutId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddTravelRelatedByStationOutId($l);
        }

        return $this;
    }

    /**
     * @param	TravelRelatedByStationOutId $travelRelatedByStationOutId The travelRelatedByStationOutId object to add.
     */
    protected function doAddTravelRelatedByStationOutId($travelRelatedByStationOutId)
    {
        $this->collTravelsRelatedByStationOutId[]= $travelRelatedByStationOutId;
        $travelRelatedByStationOutId->setStationRelatedByStationOutId($this);
    }

    /**
     * @param	TravelRelatedByStationOutId $travelRelatedByStationOutId The travelRelatedByStationOutId object to remove.
     */
    public function removeTravelRelatedByStationOutId($travelRelatedByStationOutId)
    {
        if ($this->getTravelsRelatedByStationOutId()->contains($travelRelatedByStationOutId)) {
            $this->collTravelsRelatedByStationOutId->remove($this->collTravelsRelatedByStationOutId->search($travelRelatedByStationOutId));
            if (null === $this->travelsRelatedByStationOutIdScheduledForDeletion) {
                $this->travelsRelatedByStationOutIdScheduledForDeletion = clone $this->collTravelsRelatedByStationOutId;
                $this->travelsRelatedByStationOutIdScheduledForDeletion->clear();
            }
            $this->travelsRelatedByStationOutIdScheduledForDeletion[]= $travelRelatedByStationOutId;
            $travelRelatedByStationOutId->setStationRelatedByStationOutId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related TravelsRelatedByStationOutId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByStationOutIdJoinClient($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('Client', $join_behavior);

        return $this->getTravelsRelatedByStationOutId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related TravelsRelatedByStationOutId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByStationOutIdJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByCreatedBy', $join_behavior);

        return $this->getTravelsRelatedByStationOutId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Station is new, it will return
     * an empty collection; or if this Station has previously
     * been saved, it will retrieve related TravelsRelatedByStationOutId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Station.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Travel[] List of Travel objects
     */
    public function getTravelsRelatedByStationOutIdJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TravelQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByUpdatedBy', $join_behavior);

        return $this->getTravelsRelatedByStationOutId($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->code = null;
        $this->name = null;
        $this->geo_x = null;
        $this->geo_y = null;
        $this->zone = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->created_by = null;
        $this->updated_by = null;
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
            if ($this->collStationTypes) {
                foreach ($this->collStationTypes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTravelsRelatedByStationInId) {
                foreach ($this->collTravelsRelatedByStationInId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTravelsRelatedByStationOutId) {
                foreach ($this->collTravelsRelatedByStationOutId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collStationTypes instanceof PropelCollection) {
            $this->collStationTypes->clearIterator();
        }
        $this->collStationTypes = null;
        if ($this->collTravelsRelatedByStationInId instanceof PropelCollection) {
            $this->collTravelsRelatedByStationInId->clearIterator();
        }
        $this->collTravelsRelatedByStationInId = null;
        if ($this->collTravelsRelatedByStationOutId instanceof PropelCollection) {
            $this->collTravelsRelatedByStationOutId->clearIterator();
        }
        $this->collTravelsRelatedByStationOutId = null;
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
        return (string) $this->exportTo(StationPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseStation:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseStation::%s', $name));
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
    return (string) $this->getCode();
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
		return StationPeer::getMetadata($info, $default, get_class($this));
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
} // BaseStation

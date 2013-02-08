<?php


/**
 * Base class that represents a row from the 'plugin_history' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceHistoryBehaviorPlugin.lib.model.om
 */
abstract class BaseHistory extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'HistoryPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        HistoryPeer
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
     * The value for the date_ref field.
     * @var        string
     */
    protected $date_ref;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the object_id field.
     * @var        int
     */
    protected $object_id;

    /**
     * The value for the object_name field.
     * @var        string
     */
    protected $object_name;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the name_space field.
     * @var        string
     */
    protected $name_space;

    /**
     * The value for the group_id field.
     * @var        int
     */
    protected $group_id;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the created_by field.
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

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
     * @var        PropelObjectCollection|HistoryContact[] Collection to store aggregation of HistoryContact objects.
     */
    protected $collHistoryContacts;

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
    protected $historyContactsScheduledForDeletion = null;

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
     * Get the [optionally formatted] temporal [date_ref] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateRef($format = 'Y-m-d H:i:s')
    {
        if ($this->date_ref === null) {
            return null;
        }


        if ($this->date_ref === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->date_ref);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_ref, true), $x);
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
     * Get the [description] column value.
     * 
     * @return   string
     */
    public function getDescription()
    {

        return $this->description;
    }

    /**
     * Get the [object_id] column value.
     * 
     * @return   int
     */
    public function getObjectId()
    {

        return $this->object_id;
    }

    /**
     * Get the [object_name] column value.
     * 
     * @return   string
     */
    public function getObjectName()
    {

        return $this->object_name;
    }

    /**
     * Get the [type] column value.
     * 
     * @return   string
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Get the [name_space] column value.
     * 
     * @return   string
     */
    public function getNameSpace()
    {

        return $this->name_space;
    }

    /**
     * Get the [group_id] column value.
     * 
     * @return   int
     */
    public function getGroupId()
    {

        return $this->group_id;
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
     * Get the [created_by] column value.
     * 
     * @return   int
     */
    public function getCreatedBy()
    {

        return $this->created_by;
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
     * @return   History The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = HistoryPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Sets the value of [date_ref] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   History The current object (for fluent API support)
     */
    public function setDateRef($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_ref !== null || $dt !== null) {
            $currentDateAsString = ($this->date_ref !== null && $tmpDt = new DateTime($this->date_ref)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date_ref = $newDateAsString;
                $this->modifiedColumns[] = HistoryPeer::DATE_REF;
            }
        } // if either are not null


        return $this;
    } // setDateRef()

    /**
     * Set the value of [description] column.
     * 
     * @param      string $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = HistoryPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Set the value of [object_id] column.
     * 
     * @param      int $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setObjectId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->object_id !== $v) {
            $this->object_id = $v;
            $this->modifiedColumns[] = HistoryPeer::OBJECT_ID;
        }


        return $this;
    } // setObjectId()

    /**
     * Set the value of [object_name] column.
     * 
     * @param      string $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setObjectName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->object_name !== $v) {
            $this->object_name = $v;
            $this->modifiedColumns[] = HistoryPeer::OBJECT_NAME;
        }


        return $this;
    } // setObjectName()

    /**
     * Set the value of [type] column.
     * 
     * @param      string $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = HistoryPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [name_space] column.
     * 
     * @param      string $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setNameSpace($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_space !== $v) {
            $this->name_space = $v;
            $this->modifiedColumns[] = HistoryPeer::NAME_SPACE;
        }


        return $this;
    } // setNameSpace()

    /**
     * Set the value of [group_id] column.
     * 
     * @param      int $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setGroupId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->group_id !== $v) {
            $this->group_id = $v;
            $this->modifiedColumns[] = HistoryPeer::GROUP_ID;
        }


        return $this;
    } // setGroupId()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   History The current object (for fluent API support)
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
                $this->modifiedColumns[] = HistoryPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Set the value of [created_by] column.
     * 
     * @param      int $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = HistoryPeer::CREATED_BY;
        }

        if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
            $this->asfGuardUserRelatedByCreatedBy = null;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   History The current object (for fluent API support)
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
                $this->modifiedColumns[] = HistoryPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [updated_by] column.
     * 
     * @param      int $v new value
     * @return   History The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = HistoryPeer::UPDATED_BY;
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
            $this->date_ref = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->object_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->object_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->type = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->name_space = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->group_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->created_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->created_by = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->updated_by = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = HistoryPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating History object", $e);
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
            $con = Propel::getConnection(HistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = HistoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->asfGuardUserRelatedByCreatedBy = null;
            $this->asfGuardUserRelatedByUpdatedBy = null;
            $this->collHistoryContacts = null;

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

    foreach (sfMixer::getCallables('BaseHistory:delete:pre') as $callable)
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
            $con = Propel::getConnection(HistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = HistoryQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseHistory:delete:post') as $callable)
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

    if (!$this->isSkipEdited() && !$this->isColumnModified(HistoryPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(HistoryPeer::UPDATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setUpdatedBy($user_id);
    }

    }

    if ($this->isNew()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(HistoryPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(HistoryPeer::CREATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setCreatedBy($user_id);
    }

    }


    foreach (sfMixer::getCallables('BaseHistory:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(HistoryPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(HistoryPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(HistoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                HistoryPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseHistory:save:post') as $callable)
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

            if ($this->historyContactsScheduledForDeletion !== null) {
                if (!$this->historyContactsScheduledForDeletion->isEmpty()) {
                    foreach ($this->historyContactsScheduledForDeletion as $historyContact) {
                        // need to save related object because we set the relation to null
                        $historyContact->save($con);
                    }
                    $this->historyContactsScheduledForDeletion = null;
                }
            }

            if ($this->collHistoryContacts !== null) {
                foreach ($this->collHistoryContacts as $referrerFK) {
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

        $this->modifiedColumns[] = HistoryPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . HistoryPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(HistoryPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(HistoryPeer::DATE_REF)) {
            $modifiedColumns[':p' . $index++]  = '`DATE_REF`';
        }
        if ($this->isColumnModified(HistoryPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
        }
        if ($this->isColumnModified(HistoryPeer::OBJECT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`OBJECT_ID`';
        }
        if ($this->isColumnModified(HistoryPeer::OBJECT_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`OBJECT_NAME`';
        }
        if ($this->isColumnModified(HistoryPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`TYPE`';
        }
        if ($this->isColumnModified(HistoryPeer::NAME_SPACE)) {
            $modifiedColumns[':p' . $index++]  = '`NAME_SPACE`';
        }
        if ($this->isColumnModified(HistoryPeer::GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = '`GROUP_ID`';
        }
        if ($this->isColumnModified(HistoryPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_AT`';
        }
        if ($this->isColumnModified(HistoryPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`CREATED_BY`';
        }
        if ($this->isColumnModified(HistoryPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`UPDATED_AT`';
        }
        if ($this->isColumnModified(HistoryPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`UPDATED_BY`';
        }

        $sql = sprintf(
            'INSERT INTO `plugin_history` (%s) VALUES (%s)',
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
                    case '`DATE_REF`':
						$stmt->bindValue($identifier, $this->date_ref, PDO::PARAM_STR);
                        break;
                    case '`DESCRIPTION`':
						$stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`OBJECT_ID`':
						$stmt->bindValue($identifier, $this->object_id, PDO::PARAM_INT);
                        break;
                    case '`OBJECT_NAME`':
						$stmt->bindValue($identifier, $this->object_name, PDO::PARAM_STR);
                        break;
                    case '`TYPE`':
						$stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case '`NAME_SPACE`':
						$stmt->bindValue($identifier, $this->name_space, PDO::PARAM_STR);
                        break;
                    case '`GROUP_ID`':
						$stmt->bindValue($identifier, $this->group_id, PDO::PARAM_INT);
                        break;
                    case '`CREATED_AT`':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`CREATED_BY`':
						$stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`UPDATED_AT`':
						$stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
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


            if (($retval = HistoryPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collHistoryContacts !== null) {
                    foreach ($this->collHistoryContacts as $referrerFK) {
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
        $pos = HistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDateRef();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getObjectId();
                break;
            case 4:
                return $this->getObjectName();
                break;
            case 5:
                return $this->getType();
                break;
            case 6:
                return $this->getNameSpace();
                break;
            case 7:
                return $this->getGroupId();
                break;
            case 8:
                return $this->getCreatedAt();
                break;
            case 9:
                return $this->getCreatedBy();
                break;
            case 10:
                return $this->getUpdatedAt();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['History'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['History'][$this->getPrimaryKey()] = true;
        $keys = HistoryPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDateRef(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getObjectId(),
            $keys[4] => $this->getObjectName(),
            $keys[5] => $this->getType(),
            $keys[6] => $this->getNameSpace(),
            $keys[7] => $this->getGroupId(),
            $keys[8] => $this->getCreatedAt(),
            $keys[9] => $this->getCreatedBy(),
            $keys[10] => $this->getUpdatedAt(),
            $keys[11] => $this->getUpdatedBy(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->asfGuardUserRelatedByCreatedBy) {
                $result['sfGuardUserRelatedByCreatedBy'] = $this->asfGuardUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->asfGuardUserRelatedByUpdatedBy) {
                $result['sfGuardUserRelatedByUpdatedBy'] = $this->asfGuardUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collHistoryContacts) {
                $result['HistoryContacts'] = $this->collHistoryContacts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = HistoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDateRef($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setObjectId($value);
                break;
            case 4:
                $this->setObjectName($value);
                break;
            case 5:
                $this->setType($value);
                break;
            case 6:
                $this->setNameSpace($value);
                break;
            case 7:
                $this->setGroupId($value);
                break;
            case 8:
                $this->setCreatedAt($value);
                break;
            case 9:
                $this->setCreatedBy($value);
                break;
            case 10:
                $this->setUpdatedAt($value);
                break;
            case 11:
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
        $keys = HistoryPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDateRef($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setObjectId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setObjectName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNameSpace($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setGroupId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(HistoryPeer::DATABASE_NAME);

        if ($this->isColumnModified(HistoryPeer::ID)) $criteria->add(HistoryPeer::ID, $this->id);
        if ($this->isColumnModified(HistoryPeer::DATE_REF)) $criteria->add(HistoryPeer::DATE_REF, $this->date_ref);
        if ($this->isColumnModified(HistoryPeer::DESCRIPTION)) $criteria->add(HistoryPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(HistoryPeer::OBJECT_ID)) $criteria->add(HistoryPeer::OBJECT_ID, $this->object_id);
        if ($this->isColumnModified(HistoryPeer::OBJECT_NAME)) $criteria->add(HistoryPeer::OBJECT_NAME, $this->object_name);
        if ($this->isColumnModified(HistoryPeer::TYPE)) $criteria->add(HistoryPeer::TYPE, $this->type);
        if ($this->isColumnModified(HistoryPeer::NAME_SPACE)) $criteria->add(HistoryPeer::NAME_SPACE, $this->name_space);
        if ($this->isColumnModified(HistoryPeer::GROUP_ID)) $criteria->add(HistoryPeer::GROUP_ID, $this->group_id);
        if ($this->isColumnModified(HistoryPeer::CREATED_AT)) $criteria->add(HistoryPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(HistoryPeer::CREATED_BY)) $criteria->add(HistoryPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(HistoryPeer::UPDATED_AT)) $criteria->add(HistoryPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(HistoryPeer::UPDATED_BY)) $criteria->add(HistoryPeer::UPDATED_BY, $this->updated_by);

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
        $criteria = new Criteria(HistoryPeer::DATABASE_NAME);
        $criteria->add(HistoryPeer::ID, $this->id);

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
     * @param      object $copyObj An object of History (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDateRef($this->getDateRef());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setObjectId($this->getObjectId());
        $copyObj->setObjectName($this->getObjectName());
        $copyObj->setType($this->getType());
        $copyObj->setNameSpace($this->getNameSpace());
        $copyObj->setGroupId($this->getGroupId());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setUpdatedBy($this->getUpdatedBy());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getHistoryContacts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistoryContact($relObj->copy($deepCopy));
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
     * @return                 History Clone of current object.
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
     * @return   HistoryPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new HistoryPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 History The current object (for fluent API support)
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
            $v->addHistoryRelatedByCreatedBy($this);
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
                $this->asfGuardUserRelatedByCreatedBy->addHistorysRelatedByCreatedBy($this);
             */
        }

        return $this->asfGuardUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 History The current object (for fluent API support)
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
            $v->addHistoryRelatedByUpdatedBy($this);
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
                $this->asfGuardUserRelatedByUpdatedBy->addHistorysRelatedByUpdatedBy($this);
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
        if ('HistoryContact' == $relationName) {
            $this->initHistoryContacts();
        }
    }

    /**
     * Clears out the collHistoryContacts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHistoryContacts()
     */
    public function clearHistoryContacts()
    {
        $this->collHistoryContacts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collHistoryContacts collection.
     *
     * By default this just sets the collHistoryContacts collection to an empty array (like clearcollHistoryContacts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistoryContacts($overrideExisting = true)
    {
        if (null !== $this->collHistoryContacts && !$overrideExisting) {
            return;
        }
        $this->collHistoryContacts = new PropelObjectCollection();
        $this->collHistoryContacts->setModel('HistoryContact');
    }

    /**
     * Gets an array of HistoryContact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this History is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|HistoryContact[] List of HistoryContact objects
     * @throws PropelException
     */
    public function getHistoryContacts($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collHistoryContacts || null !== $criteria) {
            if ($this->isNew() && null === $this->collHistoryContacts) {
                // return empty collection
                $this->initHistoryContacts();
            } else {
                $collHistoryContacts = HistoryContactQuery::create(null, $criteria)
                    ->filterByHistory($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collHistoryContacts;
                }
                $this->collHistoryContacts = $collHistoryContacts;
            }
        }

        return $this->collHistoryContacts;
    }

    /**
     * Sets a collection of HistoryContact objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $historyContacts A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setHistoryContacts(PropelCollection $historyContacts, PropelPDO $con = null)
    {
        $this->historyContactsScheduledForDeletion = $this->getHistoryContacts(new Criteria(), $con)->diff($historyContacts);

        foreach ($this->historyContactsScheduledForDeletion as $historyContactRemoved) {
            $historyContactRemoved->setHistory(null);
        }

        $this->collHistoryContacts = null;
        foreach ($historyContacts as $historyContact) {
            $this->addHistoryContact($historyContact);
        }

        $this->collHistoryContacts = $historyContacts;
    }

    /**
     * Returns the number of related HistoryContact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related HistoryContact objects.
     * @throws PropelException
     */
    public function countHistoryContacts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collHistoryContacts || null !== $criteria) {
            if ($this->isNew() && null === $this->collHistoryContacts) {
                return 0;
            } else {
                $query = HistoryContactQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByHistory($this)
                    ->count($con);
            }
        } else {
            return count($this->collHistoryContacts);
        }
    }

    /**
     * Method called to associate a HistoryContact object to this object
     * through the HistoryContact foreign key attribute.
     *
     * @param    HistoryContact $l HistoryContact
     * @return   History The current object (for fluent API support)
     */
    public function addHistoryContact(HistoryContact $l)
    {
        if ($this->collHistoryContacts === null) {
            $this->initHistoryContacts();
        }
        if (!$this->collHistoryContacts->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddHistoryContact($l);
        }

        return $this;
    }

    /**
     * @param	HistoryContact $historyContact The historyContact object to add.
     */
    protected function doAddHistoryContact($historyContact)
    {
        $this->collHistoryContacts[]= $historyContact;
        $historyContact->setHistory($this);
    }

    /**
     * @param	HistoryContact $historyContact The historyContact object to remove.
     */
    public function removeHistoryContact($historyContact)
    {
        if ($this->getHistoryContacts()->contains($historyContact)) {
            $this->collHistoryContacts->remove($this->collHistoryContacts->search($historyContact));
            if (null === $this->historyContactsScheduledForDeletion) {
                $this->historyContactsScheduledForDeletion = clone $this->collHistoryContacts;
                $this->historyContactsScheduledForDeletion->clear();
            }
            $this->historyContactsScheduledForDeletion[]= $historyContact;
            $historyContact->setHistory(null);
        }
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->date_ref = null;
        $this->description = null;
        $this->object_id = null;
        $this->object_name = null;
        $this->type = null;
        $this->name_space = null;
        $this->group_id = null;
        $this->created_at = null;
        $this->created_by = null;
        $this->updated_at = null;
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
            if ($this->collHistoryContacts) {
                foreach ($this->collHistoryContacts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collHistoryContacts instanceof PropelCollection) {
            $this->collHistoryContacts->clearIterator();
        }
        $this->collHistoryContacts = null;
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
        return (string) $this->exportTo(HistoryPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseHistory:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseHistory::%s', $name));
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
    return (string) $this->getDateRef();
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
		return HistoryPeer::getMetadata($info, $default, get_class($this));
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
} // BaseHistory

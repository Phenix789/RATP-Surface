<?php


/**
 * Base class that represents a row from the 'stat_view' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseView extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'ViewPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ViewPeer
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
     * The value for the worksheet_id field.
     * @var        int
     */
    protected $worksheet_id;

    /**
     * The value for the model_view_id field.
     * @var        int
     */
    protected $model_view_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the name_space field.
     * @var        string
     */
    protected $name_space;

    /**
     * The value for the type field.
     * @var        int
     */
    protected $type;

    /**
     * @var        Worksheet
     */
    protected $aWorksheet;

    /**
     * @var        View
     */
    protected $aViewRelatedByModelViewId;

    /**
     * @var        PropelObjectCollection|View[] Collection to store aggregation of View objects.
     */
    protected $collViewsRelatedById;

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
    protected $viewsRelatedByIdScheduledForDeletion = null;

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
     * Get the [worksheet_id] column value.
     * 
     * @return   int
     */
    public function getWorksheetId()
    {

        return $this->worksheet_id;
    }

    /**
     * Get the [model_view_id] column value.
     * 
     * @return   int
     */
    public function getModelViewId()
    {

        return $this->model_view_id;
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
     * Get the [name_space] column value.
     * 
     * @return   string
     */
    public function getNameSpace()
    {

        return $this->name_space;
    }

    /**
     * Get the [type] column value.
     * 
     * @return   int
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   View The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ViewPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [worksheet_id] column.
     * 
     * @param      int $v new value
     * @return   View The current object (for fluent API support)
     */
    public function setWorksheetId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->worksheet_id !== $v) {
            $this->worksheet_id = $v;
            $this->modifiedColumns[] = ViewPeer::WORKSHEET_ID;
        }

        if ($this->aWorksheet !== null && $this->aWorksheet->getId() !== $v) {
            $this->aWorksheet = null;
        }


        return $this;
    } // setWorksheetId()

    /**
     * Set the value of [model_view_id] column.
     * 
     * @param      int $v new value
     * @return   View The current object (for fluent API support)
     */
    public function setModelViewId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->model_view_id !== $v) {
            $this->model_view_id = $v;
            $this->modifiedColumns[] = ViewPeer::MODEL_VIEW_ID;
        }

        if ($this->aViewRelatedByModelViewId !== null && $this->aViewRelatedByModelViewId->getId() !== $v) {
            $this->aViewRelatedByModelViewId = null;
        }


        return $this;
    } // setModelViewId()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   View The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ViewPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [name_space] column.
     * 
     * @param      string $v new value
     * @return   View The current object (for fluent API support)
     */
    public function setNameSpace($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name_space !== $v) {
            $this->name_space = $v;
            $this->modifiedColumns[] = ViewPeer::NAME_SPACE;
        }


        return $this;
    } // setNameSpace()

    /**
     * Set the value of [type] column.
     * 
     * @param      int $v new value
     * @return   View The current object (for fluent API support)
     */
    public function setType($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = ViewPeer::TYPE;
        }


        return $this;
    } // setType()

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
            $this->worksheet_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->model_view_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->name_space = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->type = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = ViewPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating View object", $e);
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

        if ($this->aWorksheet !== null && $this->worksheet_id !== $this->aWorksheet->getId()) {
            $this->aWorksheet = null;
        }
        if ($this->aViewRelatedByModelViewId !== null && $this->model_view_id !== $this->aViewRelatedByModelViewId->getId()) {
            $this->aViewRelatedByModelViewId = null;
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
            $con = Propel::getConnection(ViewPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ViewPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aWorksheet = null;
            $this->aViewRelatedByModelViewId = null;
            $this->collViewsRelatedById = null;

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

    foreach (sfMixer::getCallables('BaseView:delete:pre') as $callable)
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
            $con = Propel::getConnection(ViewPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ViewQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseView:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BaseView:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ViewPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ViewPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseView:save:post') as $callable)
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

            if ($this->aWorksheet !== null) {
                if ($this->aWorksheet->isModified() || $this->aWorksheet->isNew()) {
                    $affectedRows += $this->aWorksheet->save($con);
                }
                $this->setWorksheet($this->aWorksheet);
            }

            if ($this->aViewRelatedByModelViewId !== null) {
                if ($this->aViewRelatedByModelViewId->isModified() || $this->aViewRelatedByModelViewId->isNew()) {
                    $affectedRows += $this->aViewRelatedByModelViewId->save($con);
                }
                $this->setViewRelatedByModelViewId($this->aViewRelatedByModelViewId);
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

            if ($this->viewsRelatedByIdScheduledForDeletion !== null) {
                if (!$this->viewsRelatedByIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->viewsRelatedByIdScheduledForDeletion as $viewRelatedById) {
                        // need to save related object because we set the relation to null
                        $viewRelatedById->save($con);
                    }
                    $this->viewsRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collViewsRelatedById !== null) {
                foreach ($this->collViewsRelatedById as $referrerFK) {
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

        $this->modifiedColumns[] = ViewPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ViewPeer::ID . ')');
        }
        if (null === $this->id) {
            try {				
				$stmt = $con->query('SELECT stat_view_SEQ.nextval FROM dual');
				$row = $stmt->fetch(PDO::FETCH_NUM);
				$this->id = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ViewPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(ViewPeer::WORKSHEET_ID)) {
            $modifiedColumns[':p' . $index++]  = 'WORKSHEET_ID';
        }
        if ($this->isColumnModified(ViewPeer::MODEL_VIEW_ID)) {
            $modifiedColumns[':p' . $index++]  = 'MODEL_VIEW_ID';
        }
        if ($this->isColumnModified(ViewPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = 'NAME';
        }
        if ($this->isColumnModified(ViewPeer::NAME_SPACE)) {
            $modifiedColumns[':p' . $index++]  = 'NAME_SPACE';
        }
        if ($this->isColumnModified(ViewPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'TYPE';
        }

        $sql = sprintf(
            'INSERT INTO stat_view (%s) VALUES (%s)',
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
                    case 'WORKSHEET_ID':
						$stmt->bindValue($identifier, $this->worksheet_id, PDO::PARAM_INT);
                        break;
                    case 'MODEL_VIEW_ID':
						$stmt->bindValue($identifier, $this->model_view_id, PDO::PARAM_INT);
                        break;
                    case 'NAME':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'NAME_SPACE':
						$stmt->bindValue($identifier, $this->name_space, PDO::PARAM_STR);
                        break;
                    case 'TYPE':
						$stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
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

            if ($this->aWorksheet !== null) {
                if (!$this->aWorksheet->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aWorksheet->getValidationFailures());
                }
            }

            if ($this->aViewRelatedByModelViewId !== null) {
                if (!$this->aViewRelatedByModelViewId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aViewRelatedByModelViewId->getValidationFailures());
                }
            }


            if (($retval = ViewPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collViewsRelatedById !== null) {
                    foreach ($this->collViewsRelatedById as $referrerFK) {
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
        $pos = ViewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getWorksheetId();
                break;
            case 2:
                return $this->getModelViewId();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getNameSpace();
                break;
            case 5:
                return $this->getType();
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
        if (isset($alreadyDumpedObjects['View'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['View'][$this->getPrimaryKey()] = true;
        $keys = ViewPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getWorksheetId(),
            $keys[2] => $this->getModelViewId(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getNameSpace(),
            $keys[5] => $this->getType(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aWorksheet) {
                $result['Worksheet'] = $this->aWorksheet->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aViewRelatedByModelViewId) {
                $result['ViewRelatedByModelViewId'] = $this->aViewRelatedByModelViewId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collViewsRelatedById) {
                $result['ViewsRelatedById'] = $this->collViewsRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ViewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setWorksheetId($value);
                break;
            case 2:
                $this->setModelViewId($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setNameSpace($value);
                break;
            case 5:
                $this->setType($value);
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
        $keys = ViewPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setWorksheetId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setModelViewId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNameSpace($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ViewPeer::DATABASE_NAME);

        if ($this->isColumnModified(ViewPeer::ID)) $criteria->add(ViewPeer::ID, $this->id);
        if ($this->isColumnModified(ViewPeer::WORKSHEET_ID)) $criteria->add(ViewPeer::WORKSHEET_ID, $this->worksheet_id);
        if ($this->isColumnModified(ViewPeer::MODEL_VIEW_ID)) $criteria->add(ViewPeer::MODEL_VIEW_ID, $this->model_view_id);
        if ($this->isColumnModified(ViewPeer::NAME)) $criteria->add(ViewPeer::NAME, $this->name);
        if ($this->isColumnModified(ViewPeer::NAME_SPACE)) $criteria->add(ViewPeer::NAME_SPACE, $this->name_space);
        if ($this->isColumnModified(ViewPeer::TYPE)) $criteria->add(ViewPeer::TYPE, $this->type);

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
        $criteria = new Criteria(ViewPeer::DATABASE_NAME);
        $criteria->add(ViewPeer::ID, $this->id);

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
     * @param      object $copyObj An object of View (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setWorksheetId($this->getWorksheetId());
        $copyObj->setModelViewId($this->getModelViewId());
        $copyObj->setName($this->getName());
        $copyObj->setNameSpace($this->getNameSpace());
        $copyObj->setType($this->getType());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getViewsRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addViewRelatedById($relObj->copy($deepCopy));
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
     * @return                 View Clone of current object.
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
     * @return   ViewPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ViewPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Worksheet object.
     *
     * @param                  Worksheet $v
     * @return                 View The current object (for fluent API support)
     * @throws PropelException
     */
    public function setWorksheet(Worksheet $v = null)
    {
        if ($v === null) {
            $this->setWorksheetId(NULL);
        } else {
            $this->setWorksheetId($v->getId());
        }

        $this->aWorksheet = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Worksheet object, it will not be re-added.
        if ($v !== null) {
            $v->addView($this);
        }


        return $this;
    }


    /**
     * Get the associated Worksheet object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Worksheet The associated Worksheet object.
     * @throws PropelException
     */
    public function getWorksheet(PropelPDO $con = null)
    {
        if ($this->aWorksheet === null && ($this->worksheet_id !== null)) {
            $this->aWorksheet = WorksheetQuery::create()->findPk($this->worksheet_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aWorksheet->addViews($this);
             */
        }

        return $this->aWorksheet;
    }

    /**
     * Declares an association between this object and a View object.
     *
     * @param                  View $v
     * @return                 View The current object (for fluent API support)
     * @throws PropelException
     */
    public function setViewRelatedByModelViewId(View $v = null)
    {
        if ($v === null) {
            $this->setModelViewId(NULL);
        } else {
            $this->setModelViewId($v->getId());
        }

        $this->aViewRelatedByModelViewId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the View object, it will not be re-added.
        if ($v !== null) {
            $v->addViewRelatedById($this);
        }


        return $this;
    }


    /**
     * Get the associated View object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 View The associated View object.
     * @throws PropelException
     */
    public function getViewRelatedByModelViewId(PropelPDO $con = null)
    {
        if ($this->aViewRelatedByModelViewId === null && ($this->model_view_id !== null)) {
            $this->aViewRelatedByModelViewId = ViewQuery::create()->findPk($this->model_view_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aViewRelatedByModelViewId->addViewsRelatedById($this);
             */
        }

        return $this->aViewRelatedByModelViewId;
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
        if ('ViewRelatedById' == $relationName) {
            $this->initViewsRelatedById();
        }
    }

    /**
     * Clears out the collViewsRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addViewsRelatedById()
     */
    public function clearViewsRelatedById()
    {
        $this->collViewsRelatedById = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collViewsRelatedById collection.
     *
     * By default this just sets the collViewsRelatedById collection to an empty array (like clearcollViewsRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initViewsRelatedById($overrideExisting = true)
    {
        if (null !== $this->collViewsRelatedById && !$overrideExisting) {
            return;
        }
        $this->collViewsRelatedById = new PropelObjectCollection();
        $this->collViewsRelatedById->setModel('View');
    }

    /**
     * Gets an array of View objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this View is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|View[] List of View objects
     * @throws PropelException
     */
    public function getViewsRelatedById($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collViewsRelatedById || null !== $criteria) {
            if ($this->isNew() && null === $this->collViewsRelatedById) {
                // return empty collection
                $this->initViewsRelatedById();
            } else {
                $collViewsRelatedById = ViewQuery::create(null, $criteria)
                    ->filterByViewRelatedByModelViewId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collViewsRelatedById;
                }
                $this->collViewsRelatedById = $collViewsRelatedById;
            }
        }

        return $this->collViewsRelatedById;
    }

    /**
     * Sets a collection of ViewRelatedById objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $viewsRelatedById A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setViewsRelatedById(PropelCollection $viewsRelatedById, PropelPDO $con = null)
    {
        $this->viewsRelatedByIdScheduledForDeletion = $this->getViewsRelatedById(new Criteria(), $con)->diff($viewsRelatedById);

        foreach ($this->viewsRelatedByIdScheduledForDeletion as $viewRelatedByIdRemoved) {
            $viewRelatedByIdRemoved->setViewRelatedByModelViewId(null);
        }

        $this->collViewsRelatedById = null;
        foreach ($viewsRelatedById as $viewRelatedById) {
            $this->addViewRelatedById($viewRelatedById);
        }

        $this->collViewsRelatedById = $viewsRelatedById;
    }

    /**
     * Returns the number of related View objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related View objects.
     * @throws PropelException
     */
    public function countViewsRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collViewsRelatedById || null !== $criteria) {
            if ($this->isNew() && null === $this->collViewsRelatedById) {
                return 0;
            } else {
                $query = ViewQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByViewRelatedByModelViewId($this)
                    ->count($con);
            }
        } else {
            return count($this->collViewsRelatedById);
        }
    }

    /**
     * Method called to associate a BaseView object to this object
     * through the BaseView foreign key attribute.
     *
     * @param    BaseView $l BaseView
     * @return   View The current object (for fluent API support)
     */
    public function addViewRelatedById(BaseView $l)
    {
        if ($this->collViewsRelatedById === null) {
            $this->initViewsRelatedById();
        }
        if (!$this->collViewsRelatedById->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddViewRelatedById($l);
        }

        return $this;
    }

    /**
     * @param	ViewRelatedById $viewRelatedById The viewRelatedById object to add.
     */
    protected function doAddViewRelatedById($viewRelatedById)
    {
        $this->collViewsRelatedById[]= $viewRelatedById;
        $viewRelatedById->setViewRelatedByModelViewId($this);
    }

    /**
     * @param	ViewRelatedById $viewRelatedById The viewRelatedById object to remove.
     */
    public function removeViewRelatedById($viewRelatedById)
    {
        if ($this->getViewsRelatedById()->contains($viewRelatedById)) {
            $this->collViewsRelatedById->remove($this->collViewsRelatedById->search($viewRelatedById));
            if (null === $this->viewsRelatedByIdScheduledForDeletion) {
                $this->viewsRelatedByIdScheduledForDeletion = clone $this->collViewsRelatedById;
                $this->viewsRelatedByIdScheduledForDeletion->clear();
            }
            $this->viewsRelatedByIdScheduledForDeletion[]= $viewRelatedById;
            $viewRelatedById->setViewRelatedByModelViewId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this View is new, it will return
     * an empty collection; or if this View has previously
     * been saved, it will retrieve related ViewsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in View.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|View[] List of View objects
     */
    public function getViewsRelatedByIdJoinWorksheet($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ViewQuery::create(null, $criteria);
        $query->joinWith('Worksheet', $join_behavior);

        return $this->getViewsRelatedById($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->worksheet_id = null;
        $this->model_view_id = null;
        $this->name = null;
        $this->name_space = null;
        $this->type = null;
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
            if ($this->collViewsRelatedById) {
                foreach ($this->collViewsRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collViewsRelatedById instanceof PropelCollection) {
            $this->collViewsRelatedById->clearIterator();
        }
        $this->collViewsRelatedById = null;
        $this->aWorksheet = null;
        $this->aViewRelatedByModelViewId = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ViewPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseView:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseView::%s', $name));
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
    return (string) $this->getName();
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
		return ViewPeer::getMetadata($info, $default, get_class($this));
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
} // BaseView

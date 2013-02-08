<?php


/**
 * Base class that represents a row from the 'plugin_options_behavior' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfPropelOptionsBehaviorPlugin.lib.model.om
 */
abstract class BaseOptions extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'OptionsPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        OptionsPeer
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
     * The value for the model_name field.
     * @var        string
     */
    protected $model_name;

    /**
     * The value for the model_id field.
     * @var        int
     */
    protected $model_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the value field.
     * @var        string
     */
    protected $value;

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
     * Get the [model_name] column value.
     * 
     * @return   string
     */
    public function getModelName()
    {

        return $this->model_name;
    }

    /**
     * Get the [model_id] column value.
     * 
     * @return   int
     */
    public function getModelId()
    {

        return $this->model_id;
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
     * Get the [value] column value.
     * 
     * @return   string
     */
    public function getValue()
    {

        return $this->value;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Options The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = OptionsPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [model_name] column.
     * 
     * @param      string $v new value
     * @return   Options The current object (for fluent API support)
     */
    public function setModelName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->model_name !== $v) {
            $this->model_name = $v;
            $this->modifiedColumns[] = OptionsPeer::MODEL_NAME;
        }


        return $this;
    } // setModelName()

    /**
     * Set the value of [model_id] column.
     * 
     * @param      int $v new value
     * @return   Options The current object (for fluent API support)
     */
    public function setModelId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->model_id !== $v) {
            $this->model_id = $v;
            $this->modifiedColumns[] = OptionsPeer::MODEL_ID;
        }


        return $this;
    } // setModelId()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   Options The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = OptionsPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [value] column.
     * 
     * @param      string $v new value
     * @return   Options The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = OptionsPeer::VALUE;
        }


        return $this;
    } // setValue()

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
            $this->model_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->model_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->name = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->value = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = OptionsPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Options object", $e);
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
            $con = Propel::getConnection(OptionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = OptionsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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

    foreach (sfMixer::getCallables('BaseOptions:delete:pre') as $callable)
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
            $con = Propel::getConnection(OptionsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = OptionsQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseOptions:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BaseOptions:save:pre') as $callable)
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
            $con = Propel::getConnection(OptionsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                OptionsPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseOptions:save:post') as $callable)
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

        $this->modifiedColumns[] = OptionsPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . OptionsPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(OptionsPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`ID`';
        }
        if ($this->isColumnModified(OptionsPeer::MODEL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`MODEL_NAME`';
        }
        if ($this->isColumnModified(OptionsPeer::MODEL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`MODEL_ID`';
        }
        if ($this->isColumnModified(OptionsPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`NAME`';
        }
        if ($this->isColumnModified(OptionsPeer::VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`VALUE`';
        }

        $sql = sprintf(
            'INSERT INTO `plugin_options_behavior` (%s) VALUES (%s)',
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
                    case '`MODEL_NAME`':
						$stmt->bindValue($identifier, $this->model_name, PDO::PARAM_STR);
                        break;
                    case '`MODEL_ID`':
						$stmt->bindValue($identifier, $this->model_id, PDO::PARAM_INT);
                        break;
                    case '`NAME`':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`VALUE`':
						$stmt->bindValue($identifier, $this->value, PDO::PARAM_STR);
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


            if (($retval = OptionsPeer::doValidate($this, $columns)) !== true) {
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
        $pos = OptionsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getModelName();
                break;
            case 2:
                return $this->getModelId();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getValue();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['Options'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Options'][$this->getPrimaryKey()] = true;
        $keys = OptionsPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getModelName(),
            $keys[2] => $this->getModelId(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getValue(),
        );

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
        $pos = OptionsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setModelName($value);
                break;
            case 2:
                $this->setModelId($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setValue($value);
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
        $keys = OptionsPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setModelName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setModelId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setValue($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(OptionsPeer::DATABASE_NAME);

        if ($this->isColumnModified(OptionsPeer::ID)) $criteria->add(OptionsPeer::ID, $this->id);
        if ($this->isColumnModified(OptionsPeer::MODEL_NAME)) $criteria->add(OptionsPeer::MODEL_NAME, $this->model_name);
        if ($this->isColumnModified(OptionsPeer::MODEL_ID)) $criteria->add(OptionsPeer::MODEL_ID, $this->model_id);
        if ($this->isColumnModified(OptionsPeer::NAME)) $criteria->add(OptionsPeer::NAME, $this->name);
        if ($this->isColumnModified(OptionsPeer::VALUE)) $criteria->add(OptionsPeer::VALUE, $this->value);

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
        $criteria = new Criteria(OptionsPeer::DATABASE_NAME);
        $criteria->add(OptionsPeer::ID, $this->id);

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
     * @param      object $copyObj An object of Options (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setModelName($this->getModelName());
        $copyObj->setModelId($this->getModelId());
        $copyObj->setName($this->getName());
        $copyObj->setValue($this->getValue());
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
     * @return                 Options Clone of current object.
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
     * @return   OptionsPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new OptionsPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->model_name = null;
        $this->model_id = null;
        $this->name = null;
        $this->value = null;
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

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(OptionsPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseOptions:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseOptions::%s', $name));
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
    return (string) $this->getModelName();
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
		return OptionsPeer::getMetadata($info, $default, get_class($this));
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
} // BaseOptions

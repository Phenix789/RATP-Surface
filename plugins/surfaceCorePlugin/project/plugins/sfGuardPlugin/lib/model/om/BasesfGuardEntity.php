<?php


/**
 * Base class that represents a row from the 'sf_guard_entity' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardEntity extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'sfGuardEntityPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        sfGuardEntityPeer
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
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the discriminant field.
     * @var        string
     */
    protected $discriminant;

    /**
     * @var        PropelObjectCollection|sfGuardGroupPermission[] Collection to store aggregation of sfGuardGroupPermission objects.
     */
    protected $collsfGuardGroupPermissions;

    /**
     * @var        PropelObjectCollection|sfGuardUserPermission[] Collection to store aggregation of sfGuardUserPermission objects.
     */
    protected $collsfGuardUserPermissions;

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
    protected $sfGuardGroupPermissionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardUserPermissionsScheduledForDeletion = null;

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
     * Get the [name] column value.
     * 
     * @return   string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [discriminant] column value.
     * 
     * @return   string
     */
    public function getDiscriminant()
    {

        return $this->discriminant;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   sfGuardEntity The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = sfGuardEntityPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   sfGuardEntity The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = sfGuardEntityPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [discriminant] column.
     * 
     * @param      string $v new value
     * @return   sfGuardEntity The current object (for fluent API support)
     */
    public function setDiscriminant($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discriminant !== $v) {
            $this->discriminant = $v;
            $this->modifiedColumns[] = sfGuardEntityPeer::DISCRIMINANT;
        }


        return $this;
    } // setDiscriminant()

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
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->discriminant = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 3; // 3 = sfGuardEntityPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating sfGuardEntity object", $e);
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
            $con = Propel::getConnection(sfGuardEntityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = sfGuardEntityPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collsfGuardGroupPermissions = null;

            $this->collsfGuardUserPermissions = null;

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

    foreach (sfMixer::getCallables('BasesfGuardEntity:delete:pre') as $callable)
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
            $con = Propel::getConnection(sfGuardEntityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = sfGuardEntityQuery::create()
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
    

    foreach (sfMixer::getCallables('BasesfGuardEntity:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BasesfGuardEntity:save:pre') as $callable)
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
            $con = Propel::getConnection(sfGuardEntityPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                sfGuardEntityPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BasesfGuardEntity:save:post') as $callable)
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

            if ($this->sfGuardGroupPermissionsScheduledForDeletion !== null) {
                if (!$this->sfGuardGroupPermissionsScheduledForDeletion->isEmpty()) {
                    sfGuardGroupPermissionQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardGroupPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardGroupPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardGroupPermissions !== null) {
                foreach ($this->collsfGuardGroupPermissions as $referrerFK) {
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

        $this->modifiedColumns[] = sfGuardEntityPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . sfGuardEntityPeer::ID . ')');
        }
        if (null === $this->id) {
            try {				
				$stmt = $con->query('SELECT sf_guard_entity_SEQ.nextval FROM dual');
				$row = $stmt->fetch(PDO::FETCH_NUM);
				$this->id = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(sfGuardEntityPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(sfGuardEntityPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = 'NAME';
        }
        if ($this->isColumnModified(sfGuardEntityPeer::DISCRIMINANT)) {
            $modifiedColumns[':p' . $index++]  = 'DISCRIMINANT';
        }

        $sql = sprintf(
            'INSERT INTO sf_guard_entity (%s) VALUES (%s)',
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
                    case 'NAME':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'DISCRIMINANT':
						$stmt->bindValue($identifier, $this->discriminant, PDO::PARAM_STR);
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


            if (($retval = sfGuardEntityPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collsfGuardGroupPermissions !== null) {
                    foreach ($this->collsfGuardGroupPermissions as $referrerFK) {
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
        $pos = sfGuardEntityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getDiscriminant();
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
        if (isset($alreadyDumpedObjects['sfGuardEntity'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['sfGuardEntity'][$this->getPrimaryKey()] = true;
        $keys = sfGuardEntityPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDiscriminant(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collsfGuardGroupPermissions) {
                $result['sfGuardGroupPermissions'] = $this->collsfGuardGroupPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfGuardUserPermissions) {
                $result['sfGuardUserPermissions'] = $this->collsfGuardUserPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = sfGuardEntityPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 2:
                $this->setDiscriminant($value);
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
        $keys = sfGuardEntityPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDiscriminant($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(sfGuardEntityPeer::DATABASE_NAME);

        if ($this->isColumnModified(sfGuardEntityPeer::ID)) $criteria->add(sfGuardEntityPeer::ID, $this->id);
        if ($this->isColumnModified(sfGuardEntityPeer::NAME)) $criteria->add(sfGuardEntityPeer::NAME, $this->name);
        if ($this->isColumnModified(sfGuardEntityPeer::DISCRIMINANT)) $criteria->add(sfGuardEntityPeer::DISCRIMINANT, $this->discriminant);

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
        $criteria = new Criteria(sfGuardEntityPeer::DATABASE_NAME);
        $criteria->add(sfGuardEntityPeer::ID, $this->id);

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
     * @param      object $copyObj An object of sfGuardEntity (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDiscriminant($this->getDiscriminant());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getsfGuardGroupPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardGroupPermission($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfGuardUserPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
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
     * @return                 sfGuardEntity Clone of current object.
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
     * @return   sfGuardEntityPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new sfGuardEntityPeer();
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
        if ('sfGuardGroupPermission' == $relationName) {
            $this->initsfGuardGroupPermissions();
        }
        if ('sfGuardUserPermission' == $relationName) {
            $this->initsfGuardUserPermissions();
        }
    }

    /**
     * Clears out the collsfGuardGroupPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addsfGuardGroupPermissions()
     */
    public function clearsfGuardGroupPermissions()
    {
        $this->collsfGuardGroupPermissions = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collsfGuardGroupPermissions collection.
     *
     * By default this just sets the collsfGuardGroupPermissions collection to an empty array (like clearcollsfGuardGroupPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardGroupPermissions($overrideExisting = true)
    {
        if (null !== $this->collsfGuardGroupPermissions && !$overrideExisting) {
            return;
        }
        $this->collsfGuardGroupPermissions = new PropelObjectCollection();
        $this->collsfGuardGroupPermissions->setModel('sfGuardGroupPermission');
    }

    /**
     * Gets an array of sfGuardGroupPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardEntity is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardGroupPermission[] List of sfGuardGroupPermission objects
     * @throws PropelException
     */
    public function getsfGuardGroupPermissions($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardGroupPermissions || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardGroupPermissions) {
                // return empty collection
                $this->initsfGuardGroupPermissions();
            } else {
                $collsfGuardGroupPermissions = sfGuardGroupPermissionQuery::create(null, $criteria)
                    ->filterBysfGuardEntity($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collsfGuardGroupPermissions;
                }
                $this->collsfGuardGroupPermissions = $collsfGuardGroupPermissions;
            }
        }

        return $this->collsfGuardGroupPermissions;
    }

    /**
     * Sets a collection of sfGuardGroupPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $sfGuardGroupPermissions A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setsfGuardGroupPermissions(PropelCollection $sfGuardGroupPermissions, PropelPDO $con = null)
    {
        $this->sfGuardGroupPermissionsScheduledForDeletion = $this->getsfGuardGroupPermissions(new Criteria(), $con)->diff($sfGuardGroupPermissions);

        foreach ($this->sfGuardGroupPermissionsScheduledForDeletion as $sfGuardGroupPermissionRemoved) {
            $sfGuardGroupPermissionRemoved->setsfGuardEntity(null);
        }

        $this->collsfGuardGroupPermissions = null;
        foreach ($sfGuardGroupPermissions as $sfGuardGroupPermission) {
            $this->addsfGuardGroupPermission($sfGuardGroupPermission);
        }

        $this->collsfGuardGroupPermissions = $sfGuardGroupPermissions;
    }

    /**
     * Returns the number of related sfGuardGroupPermission objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related sfGuardGroupPermission objects.
     * @throws PropelException
     */
    public function countsfGuardGroupPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collsfGuardGroupPermissions || null !== $criteria) {
            if ($this->isNew() && null === $this->collsfGuardGroupPermissions) {
                return 0;
            } else {
                $query = sfGuardGroupPermissionQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterBysfGuardEntity($this)
                    ->count($con);
            }
        } else {
            return count($this->collsfGuardGroupPermissions);
        }
    }

    /**
     * Method called to associate a sfGuardGroupPermission object to this object
     * through the sfGuardGroupPermission foreign key attribute.
     *
     * @param    sfGuardGroupPermission $l sfGuardGroupPermission
     * @return   sfGuardEntity The current object (for fluent API support)
     */
    public function addsfGuardGroupPermission(sfGuardGroupPermission $l)
    {
        if ($this->collsfGuardGroupPermissions === null) {
            $this->initsfGuardGroupPermissions();
        }
        if (!$this->collsfGuardGroupPermissions->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardGroupPermission($l);
        }

        return $this;
    }

    /**
     * @param	sfGuardGroupPermission $sfGuardGroupPermission The sfGuardGroupPermission object to add.
     */
    protected function doAddsfGuardGroupPermission($sfGuardGroupPermission)
    {
        $this->collsfGuardGroupPermissions[]= $sfGuardGroupPermission;
        $sfGuardGroupPermission->setsfGuardEntity($this);
    }

    /**
     * @param	sfGuardGroupPermission $sfGuardGroupPermission The sfGuardGroupPermission object to remove.
     */
    public function removesfGuardGroupPermission($sfGuardGroupPermission)
    {
        if ($this->getsfGuardGroupPermissions()->contains($sfGuardGroupPermission)) {
            $this->collsfGuardGroupPermissions->remove($this->collsfGuardGroupPermissions->search($sfGuardGroupPermission));
            if (null === $this->sfGuardGroupPermissionsScheduledForDeletion) {
                $this->sfGuardGroupPermissionsScheduledForDeletion = clone $this->collsfGuardGroupPermissions;
                $this->sfGuardGroupPermissionsScheduledForDeletion->clear();
            }
            $this->sfGuardGroupPermissionsScheduledForDeletion[]= $sfGuardGroupPermission;
            $sfGuardGroupPermission->setsfGuardEntity(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardEntity is new, it will return
     * an empty collection; or if this sfGuardEntity has previously
     * been saved, it will retrieve related sfGuardGroupPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardEntity.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardGroupPermission[] List of sfGuardGroupPermission objects
     */
    public function getsfGuardGroupPermissionsJoinsfGuardGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardGroupPermissionQuery::create(null, $criteria);
        $query->joinWith('sfGuardGroup', $join_behavior);

        return $this->getsfGuardGroupPermissions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardEntity is new, it will return
     * an empty collection; or if this sfGuardEntity has previously
     * been saved, it will retrieve related sfGuardGroupPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardEntity.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardGroupPermission[] List of sfGuardGroupPermission objects
     */
    public function getsfGuardGroupPermissionsJoinsfGuardPermission($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardGroupPermissionQuery::create(null, $criteria);
        $query->joinWith('sfGuardPermission', $join_behavior);

        return $this->getsfGuardGroupPermissions($query, $con);
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
     * If this sfGuardEntity is new, it will return
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
                    ->filterBysfGuardEntity($this)
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
            $sfGuardUserPermissionRemoved->setsfGuardEntity(null);
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
                    ->filterBysfGuardEntity($this)
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
     * @return   sfGuardEntity The current object (for fluent API support)
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
        $sfGuardUserPermission->setsfGuardEntity($this);
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
            $sfGuardUserPermission->setsfGuardEntity(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardEntity is new, it will return
     * an empty collection; or if this sfGuardEntity has previously
     * been saved, it will retrieve related sfGuardUserPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardEntity.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserPermission[] List of sfGuardUserPermission objects
     */
    public function getsfGuardUserPermissionsJoinsfGuardUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserPermissionQuery::create(null, $criteria);
        $query->joinWith('sfGuardUser', $join_behavior);

        return $this->getsfGuardUserPermissions($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardEntity is new, it will return
     * an empty collection; or if this sfGuardEntity has previously
     * been saved, it will retrieve related sfGuardUserPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardEntity.
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
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->discriminant = null;
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
            if ($this->collsfGuardGroupPermissions) {
                foreach ($this->collsfGuardGroupPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfGuardUserPermissions) {
                foreach ($this->collsfGuardUserPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collsfGuardGroupPermissions instanceof PropelCollection) {
            $this->collsfGuardGroupPermissions->clearIterator();
        }
        $this->collsfGuardGroupPermissions = null;
        if ($this->collsfGuardUserPermissions instanceof PropelCollection) {
            $this->collsfGuardUserPermissions->clearIterator();
        }
        $this->collsfGuardUserPermissions = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(sfGuardEntityPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BasesfGuardEntity:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardEntity::%s', $name));
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
		return sfGuardEntityPeer::getMetadata($info, $default, get_class($this));
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
} // BasesfGuardEntity

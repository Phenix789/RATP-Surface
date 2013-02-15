<?php


/**
 * Base class that represents a row from the 'file_associated' table.
 *
 * 
 *
 * @package    propel.generator.plugins.sfPropelFileAssocPlugin.lib.model.om
 */
abstract class BaseFileAssociated extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'FileAssociatedPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        FileAssociatedPeer
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
     * The value for the class_name field.
     * @var        string
     */
    protected $class_name;

    /**
     * The value for the category field.
     * @var        string
     */
    protected $category;

    /**
     * The value for the field_id field.
     * @var        int
     */
    protected $field_id;

    /**
     * The value for the filepath field.
     * @var        string
     */
    protected $filepath;

    /**
     * The value for the filename field.
     * @var        string
     */
    protected $filename;

    /**
     * The value for the orginal_filename field.
     * @var        string
     */
    protected $orginal_filename;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

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
     * Get the [class_name] column value.
     * 
     * @return   string
     */
    public function getClassName()
    {

        return $this->class_name;
    }

    /**
     * Get the [category] column value.
     * 
     * @return   string
     */
    public function getCategory()
    {

        return $this->category;
    }

    /**
     * Get the [field_id] column value.
     * 
     * @return   int
     */
    public function getFieldId()
    {

        return $this->field_id;
    }

    /**
     * Get the [filepath] column value.
     * 
     * @return   string
     */
    public function getFilepath()
    {

        return $this->filepath;
    }

    /**
     * Get the [filename] column value.
     * 
     * @return   string
     */
    public function getFilename()
    {

        return $this->filename;
    }

    /**
     * Get the [orginal_filename] column value.
     * 
     * @return   string
     */
    public function getOrginalFilename()
    {

        return $this->orginal_filename;
    }

    /**
     * Get the [title] column value.
     * 
     * @return   string
     */
    public function getTitle()
    {

        return $this->title;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [class_name] column.
     * 
     * @param      string $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setClassName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->class_name !== $v) {
            $this->class_name = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::CLASS_NAME;
        }


        return $this;
    } // setClassName()

    /**
     * Set the value of [category] column.
     * 
     * @param      string $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setCategory($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->category !== $v) {
            $this->category = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::CATEGORY;
        }


        return $this;
    } // setCategory()

    /**
     * Set the value of [field_id] column.
     * 
     * @param      int $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setFieldId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->field_id !== $v) {
            $this->field_id = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::FIELD_ID;
        }


        return $this;
    } // setFieldId()

    /**
     * Set the value of [filepath] column.
     * 
     * @param      string $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setFilepath($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->filepath !== $v) {
            $this->filepath = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::FILEPATH;
        }


        return $this;
    } // setFilepath()

    /**
     * Set the value of [filename] column.
     * 
     * @param      string $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setFilename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->filename !== $v) {
            $this->filename = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::FILENAME;
        }


        return $this;
    } // setFilename()

    /**
     * Set the value of [orginal_filename] column.
     * 
     * @param      string $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setOrginalFilename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orginal_filename !== $v) {
            $this->orginal_filename = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::ORGINAL_FILENAME;
        }


        return $this;
    } // setOrginalFilename()

    /**
     * Set the value of [title] column.
     * 
     * @param      string $v new value
     * @return   FileAssociated The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = FileAssociatedPeer::TITLE;
        }


        return $this;
    } // setTitle()

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
            $this->class_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->category = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->field_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->filepath = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->filename = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->orginal_filename = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->title = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = FileAssociatedPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating FileAssociated object", $e);
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
            $con = Propel::getConnection(FileAssociatedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = FileAssociatedPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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

    foreach (sfMixer::getCallables('BaseFileAssociated:delete:pre') as $callable)
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
            $con = Propel::getConnection(FileAssociatedPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = FileAssociatedQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseFileAssociated:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BaseFileAssociated:save:pre') as $callable)
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
            $con = Propel::getConnection(FileAssociatedPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                FileAssociatedPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseFileAssociated:save:post') as $callable)
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

        $this->modifiedColumns[] = FileAssociatedPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FileAssociatedPeer::ID . ')');
        }
        if (null === $this->id) {
            try {				
				$stmt = $con->query('SELECT file_associated_SEQ.nextval FROM dual');
				$row = $stmt->fetch(PDO::FETCH_NUM);
				$this->id = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FileAssociatedPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(FileAssociatedPeer::CLASS_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'CLASS_NAME';
        }
        if ($this->isColumnModified(FileAssociatedPeer::CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'CATEGORY';
        }
        if ($this->isColumnModified(FileAssociatedPeer::FIELD_ID)) {
            $modifiedColumns[':p' . $index++]  = 'FIELD_ID';
        }
        if ($this->isColumnModified(FileAssociatedPeer::FILEPATH)) {
            $modifiedColumns[':p' . $index++]  = 'FILEPATH';
        }
        if ($this->isColumnModified(FileAssociatedPeer::FILENAME)) {
            $modifiedColumns[':p' . $index++]  = 'FILENAME';
        }
        if ($this->isColumnModified(FileAssociatedPeer::ORGINAL_FILENAME)) {
            $modifiedColumns[':p' . $index++]  = 'ORGINAL_FILENAME';
        }
        if ($this->isColumnModified(FileAssociatedPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'TITLE';
        }

        $sql = sprintf(
            'INSERT INTO file_associated (%s) VALUES (%s)',
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
                    case 'CLASS_NAME':
						$stmt->bindValue($identifier, $this->class_name, PDO::PARAM_STR);
                        break;
                    case 'CATEGORY':
						$stmt->bindValue($identifier, $this->category, PDO::PARAM_STR);
                        break;
                    case 'FIELD_ID':
						$stmt->bindValue($identifier, $this->field_id, PDO::PARAM_INT);
                        break;
                    case 'FILEPATH':
						$stmt->bindValue($identifier, $this->filepath, PDO::PARAM_STR);
                        break;
                    case 'FILENAME':
						$stmt->bindValue($identifier, $this->filename, PDO::PARAM_STR);
                        break;
                    case 'ORGINAL_FILENAME':
						$stmt->bindValue($identifier, $this->orginal_filename, PDO::PARAM_STR);
                        break;
                    case 'TITLE':
						$stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
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


            if (($retval = FileAssociatedPeer::doValidate($this, $columns)) !== true) {
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
        $pos = FileAssociatedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getClassName();
                break;
            case 2:
                return $this->getCategory();
                break;
            case 3:
                return $this->getFieldId();
                break;
            case 4:
                return $this->getFilepath();
                break;
            case 5:
                return $this->getFilename();
                break;
            case 6:
                return $this->getOrginalFilename();
                break;
            case 7:
                return $this->getTitle();
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
        if (isset($alreadyDumpedObjects['FileAssociated'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['FileAssociated'][$this->getPrimaryKey()] = true;
        $keys = FileAssociatedPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClassName(),
            $keys[2] => $this->getCategory(),
            $keys[3] => $this->getFieldId(),
            $keys[4] => $this->getFilepath(),
            $keys[5] => $this->getFilename(),
            $keys[6] => $this->getOrginalFilename(),
            $keys[7] => $this->getTitle(),
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
        $pos = FileAssociatedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setClassName($value);
                break;
            case 2:
                $this->setCategory($value);
                break;
            case 3:
                $this->setFieldId($value);
                break;
            case 4:
                $this->setFilepath($value);
                break;
            case 5:
                $this->setFilename($value);
                break;
            case 6:
                $this->setOrginalFilename($value);
                break;
            case 7:
                $this->setTitle($value);
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
        $keys = FileAssociatedPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setClassName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCategory($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setFieldId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFilepath($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setFilename($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setOrginalFilename($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTitle($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FileAssociatedPeer::DATABASE_NAME);

        if ($this->isColumnModified(FileAssociatedPeer::ID)) $criteria->add(FileAssociatedPeer::ID, $this->id);
        if ($this->isColumnModified(FileAssociatedPeer::CLASS_NAME)) $criteria->add(FileAssociatedPeer::CLASS_NAME, $this->class_name);
        if ($this->isColumnModified(FileAssociatedPeer::CATEGORY)) $criteria->add(FileAssociatedPeer::CATEGORY, $this->category);
        if ($this->isColumnModified(FileAssociatedPeer::FIELD_ID)) $criteria->add(FileAssociatedPeer::FIELD_ID, $this->field_id);
        if ($this->isColumnModified(FileAssociatedPeer::FILEPATH)) $criteria->add(FileAssociatedPeer::FILEPATH, $this->filepath);
        if ($this->isColumnModified(FileAssociatedPeer::FILENAME)) $criteria->add(FileAssociatedPeer::FILENAME, $this->filename);
        if ($this->isColumnModified(FileAssociatedPeer::ORGINAL_FILENAME)) $criteria->add(FileAssociatedPeer::ORGINAL_FILENAME, $this->orginal_filename);
        if ($this->isColumnModified(FileAssociatedPeer::TITLE)) $criteria->add(FileAssociatedPeer::TITLE, $this->title);

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
        $criteria = new Criteria(FileAssociatedPeer::DATABASE_NAME);
        $criteria->add(FileAssociatedPeer::ID, $this->id);

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
     * @param      object $copyObj An object of FileAssociated (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClassName($this->getClassName());
        $copyObj->setCategory($this->getCategory());
        $copyObj->setFieldId($this->getFieldId());
        $copyObj->setFilepath($this->getFilepath());
        $copyObj->setFilename($this->getFilename());
        $copyObj->setOrginalFilename($this->getOrginalFilename());
        $copyObj->setTitle($this->getTitle());
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
     * @return                 FileAssociated Clone of current object.
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
     * @return   FileAssociatedPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new FileAssociatedPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->class_name = null;
        $this->category = null;
        $this->field_id = null;
        $this->filepath = null;
        $this->filename = null;
        $this->orginal_filename = null;
        $this->title = null;
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
        return (string) $this->exportTo(FileAssociatedPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseFileAssociated:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseFileAssociated::%s', $name));
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
    return (string) $this->getClassName();
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
		return FileAssociatedPeer::getMetadata($info, $default, get_class($this));
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
} // BaseFileAssociated

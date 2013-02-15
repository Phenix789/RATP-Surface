<?php


/**
 * Base class that represents a row from the 'stat_discrete_field' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
abstract class BaseDiscreteField extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'DiscreteFieldPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DiscreteFieldPeer
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
     * The value for the datasource_id field.
     * @var        int
     */
    protected $datasource_id;

    /**
     * The value for the code_field field.
     * @var        string
     */
    protected $code_field;

    /**
     * The value for the label_field field.
     * @var        string
     */
    protected $label_field;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the type field.
     * @var        int
     */
    protected $type;

    /**
     * @var        DataSource
     */
    protected $aDataSource;

    /**
     * @var        PropelObjectCollection|Worksheet[] Collection to store aggregation of Worksheet objects.
     */
    protected $collWorksheetsRelatedByFirstParam;

    /**
     * @var        PropelObjectCollection|Worksheet[] Collection to store aggregation of Worksheet objects.
     */
    protected $collWorksheetsRelatedBySecondParam;

    /**
     * @var        PropelObjectCollection|Filter[] Collection to store aggregation of Filter objects.
     */
    protected $collFilters;

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
    protected $worksheetsRelatedByFirstParamScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $worksheetsRelatedBySecondParamScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $filtersScheduledForDeletion = null;

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
     * Get the [datasource_id] column value.
     * 
     * @return   int
     */
    public function getDatasourceId()
    {

        return $this->datasource_id;
    }

    /**
     * Get the [code_field] column value.
     * 
     * @return   string
     */
    public function getCodeField()
    {

        return $this->code_field;
    }

    /**
     * Get the [label_field] column value.
     * 
     * @return   string
     */
    public function getLabelField()
    {

        return $this->label_field;
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
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = DiscreteFieldPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [datasource_id] column.
     * 
     * @param      int $v new value
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function setDatasourceId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->datasource_id !== $v) {
            $this->datasource_id = $v;
            $this->modifiedColumns[] = DiscreteFieldPeer::DATASOURCE_ID;
        }

        if ($this->aDataSource !== null && $this->aDataSource->getId() !== $v) {
            $this->aDataSource = null;
        }


        return $this;
    } // setDatasourceId()

    /**
     * Set the value of [code_field] column.
     * 
     * @param      string $v new value
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function setCodeField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->code_field !== $v) {
            $this->code_field = $v;
            $this->modifiedColumns[] = DiscreteFieldPeer::CODE_FIELD;
        }


        return $this;
    } // setCodeField()

    /**
     * Set the value of [label_field] column.
     * 
     * @param      string $v new value
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function setLabelField($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->label_field !== $v) {
            $this->label_field = $v;
            $this->modifiedColumns[] = DiscreteFieldPeer::LABEL_FIELD;
        }


        return $this;
    } // setLabelField()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = DiscreteFieldPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [type] column.
     * 
     * @param      int $v new value
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function setType($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = DiscreteFieldPeer::TYPE;
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
            $this->datasource_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->code_field = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->label_field = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->type = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = DiscreteFieldPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating DiscreteField object", $e);
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

        if ($this->aDataSource !== null && $this->datasource_id !== $this->aDataSource->getId()) {
            $this->aDataSource = null;
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
            $con = Propel::getConnection(DiscreteFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DiscreteFieldPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDataSource = null;
            $this->collWorksheetsRelatedByFirstParam = null;

            $this->collWorksheetsRelatedBySecondParam = null;

            $this->collFilters = null;

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

    foreach (sfMixer::getCallables('BaseDiscreteField:delete:pre') as $callable)
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
            $con = Propel::getConnection(DiscreteFieldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DiscreteFieldQuery::create()
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
    

    foreach (sfMixer::getCallables('BaseDiscreteField:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BaseDiscreteField:save:pre') as $callable)
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
            $con = Propel::getConnection(DiscreteFieldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DiscreteFieldPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseDiscreteField:save:post') as $callable)
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

            if ($this->aDataSource !== null) {
                if ($this->aDataSource->isModified() || $this->aDataSource->isNew()) {
                    $affectedRows += $this->aDataSource->save($con);
                }
                $this->setDataSource($this->aDataSource);
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

            if ($this->worksheetsRelatedByFirstParamScheduledForDeletion !== null) {
                if (!$this->worksheetsRelatedByFirstParamScheduledForDeletion->isEmpty()) {
                    WorksheetQuery::create()
                        ->filterByPrimaryKeys($this->worksheetsRelatedByFirstParamScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->worksheetsRelatedByFirstParamScheduledForDeletion = null;
                }
            }

            if ($this->collWorksheetsRelatedByFirstParam !== null) {
                foreach ($this->collWorksheetsRelatedByFirstParam as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->worksheetsRelatedBySecondParamScheduledForDeletion !== null) {
                if (!$this->worksheetsRelatedBySecondParamScheduledForDeletion->isEmpty()) {
                    foreach ($this->worksheetsRelatedBySecondParamScheduledForDeletion as $worksheetRelatedBySecondParam) {
                        // need to save related object because we set the relation to null
                        $worksheetRelatedBySecondParam->save($con);
                    }
                    $this->worksheetsRelatedBySecondParamScheduledForDeletion = null;
                }
            }

            if ($this->collWorksheetsRelatedBySecondParam !== null) {
                foreach ($this->collWorksheetsRelatedBySecondParam as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->filtersScheduledForDeletion !== null) {
                if (!$this->filtersScheduledForDeletion->isEmpty()) {
                    FilterQuery::create()
                        ->filterByPrimaryKeys($this->filtersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->filtersScheduledForDeletion = null;
                }
            }

            if ($this->collFilters !== null) {
                foreach ($this->collFilters as $referrerFK) {
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

        $this->modifiedColumns[] = DiscreteFieldPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . DiscreteFieldPeer::ID . ')');
        }
        if (null === $this->id) {
            try {				
				$stmt = $con->query('SELECT stat_discrete_field_SEQ.nextval FROM dual');
				$row = $stmt->fetch(PDO::FETCH_NUM);
				$this->id = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DiscreteFieldPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(DiscreteFieldPeer::DATASOURCE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'DATASOURCE_ID';
        }
        if ($this->isColumnModified(DiscreteFieldPeer::CODE_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'CODE_FIELD';
        }
        if ($this->isColumnModified(DiscreteFieldPeer::LABEL_FIELD)) {
            $modifiedColumns[':p' . $index++]  = 'LABEL_FIELD';
        }
        if ($this->isColumnModified(DiscreteFieldPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = 'NAME';
        }
        if ($this->isColumnModified(DiscreteFieldPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'TYPE';
        }

        $sql = sprintf(
            'INSERT INTO stat_discrete_field (%s) VALUES (%s)',
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
                    case 'DATASOURCE_ID':
						$stmt->bindValue($identifier, $this->datasource_id, PDO::PARAM_INT);
                        break;
                    case 'CODE_FIELD':
						$stmt->bindValue($identifier, $this->code_field, PDO::PARAM_STR);
                        break;
                    case 'LABEL_FIELD':
						$stmt->bindValue($identifier, $this->label_field, PDO::PARAM_STR);
                        break;
                    case 'NAME':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
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

            if ($this->aDataSource !== null) {
                if (!$this->aDataSource->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDataSource->getValidationFailures());
                }
            }


            if (($retval = DiscreteFieldPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collWorksheetsRelatedByFirstParam !== null) {
                    foreach ($this->collWorksheetsRelatedByFirstParam as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collWorksheetsRelatedBySecondParam !== null) {
                    foreach ($this->collWorksheetsRelatedBySecondParam as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collFilters !== null) {
                    foreach ($this->collFilters as $referrerFK) {
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
        $pos = DiscreteFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDatasourceId();
                break;
            case 2:
                return $this->getCodeField();
                break;
            case 3:
                return $this->getLabelField();
                break;
            case 4:
                return $this->getName();
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
        if (isset($alreadyDumpedObjects['DiscreteField'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['DiscreteField'][$this->getPrimaryKey()] = true;
        $keys = DiscreteFieldPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDatasourceId(),
            $keys[2] => $this->getCodeField(),
            $keys[3] => $this->getLabelField(),
            $keys[4] => $this->getName(),
            $keys[5] => $this->getType(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDataSource) {
                $result['DataSource'] = $this->aDataSource->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collWorksheetsRelatedByFirstParam) {
                $result['WorksheetsRelatedByFirstParam'] = $this->collWorksheetsRelatedByFirstParam->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collWorksheetsRelatedBySecondParam) {
                $result['WorksheetsRelatedBySecondParam'] = $this->collWorksheetsRelatedBySecondParam->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collFilters) {
                $result['Filters'] = $this->collFilters->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = DiscreteFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDatasourceId($value);
                break;
            case 2:
                $this->setCodeField($value);
                break;
            case 3:
                $this->setLabelField($value);
                break;
            case 4:
                $this->setName($value);
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
        $keys = DiscreteFieldPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDatasourceId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCodeField($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLabelField($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setType($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DiscreteFieldPeer::DATABASE_NAME);

        if ($this->isColumnModified(DiscreteFieldPeer::ID)) $criteria->add(DiscreteFieldPeer::ID, $this->id);
        if ($this->isColumnModified(DiscreteFieldPeer::DATASOURCE_ID)) $criteria->add(DiscreteFieldPeer::DATASOURCE_ID, $this->datasource_id);
        if ($this->isColumnModified(DiscreteFieldPeer::CODE_FIELD)) $criteria->add(DiscreteFieldPeer::CODE_FIELD, $this->code_field);
        if ($this->isColumnModified(DiscreteFieldPeer::LABEL_FIELD)) $criteria->add(DiscreteFieldPeer::LABEL_FIELD, $this->label_field);
        if ($this->isColumnModified(DiscreteFieldPeer::NAME)) $criteria->add(DiscreteFieldPeer::NAME, $this->name);
        if ($this->isColumnModified(DiscreteFieldPeer::TYPE)) $criteria->add(DiscreteFieldPeer::TYPE, $this->type);

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
        $criteria = new Criteria(DiscreteFieldPeer::DATABASE_NAME);
        $criteria->add(DiscreteFieldPeer::ID, $this->id);

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
     * @param      object $copyObj An object of DiscreteField (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDatasourceId($this->getDatasourceId());
        $copyObj->setCodeField($this->getCodeField());
        $copyObj->setLabelField($this->getLabelField());
        $copyObj->setName($this->getName());
        $copyObj->setType($this->getType());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getWorksheetsRelatedByFirstParam() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addWorksheetRelatedByFirstParam($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getWorksheetsRelatedBySecondParam() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addWorksheetRelatedBySecondParam($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getFilters() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addFilter($relObj->copy($deepCopy));
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
     * @return                 DiscreteField Clone of current object.
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
     * @return   DiscreteFieldPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DiscreteFieldPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a DataSource object.
     *
     * @param                  DataSource $v
     * @return                 DiscreteField The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDataSource(DataSource $v = null)
    {
        if ($v === null) {
            $this->setDatasourceId(NULL);
        } else {
            $this->setDatasourceId($v->getId());
        }

        $this->aDataSource = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the DataSource object, it will not be re-added.
        if ($v !== null) {
            $v->addDiscreteField($this);
        }


        return $this;
    }


    /**
     * Get the associated DataSource object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 DataSource The associated DataSource object.
     * @throws PropelException
     */
    public function getDataSource(PropelPDO $con = null)
    {
        if ($this->aDataSource === null && ($this->datasource_id !== null)) {
            $this->aDataSource = DataSourceQuery::create()->findPk($this->datasource_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDataSource->addDiscreteFields($this);
             */
        }

        return $this->aDataSource;
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
        if ('WorksheetRelatedByFirstParam' == $relationName) {
            $this->initWorksheetsRelatedByFirstParam();
        }
        if ('WorksheetRelatedBySecondParam' == $relationName) {
            $this->initWorksheetsRelatedBySecondParam();
        }
        if ('Filter' == $relationName) {
            $this->initFilters();
        }
    }

    /**
     * Clears out the collWorksheetsRelatedByFirstParam collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addWorksheetsRelatedByFirstParam()
     */
    public function clearWorksheetsRelatedByFirstParam()
    {
        $this->collWorksheetsRelatedByFirstParam = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collWorksheetsRelatedByFirstParam collection.
     *
     * By default this just sets the collWorksheetsRelatedByFirstParam collection to an empty array (like clearcollWorksheetsRelatedByFirstParam());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initWorksheetsRelatedByFirstParam($overrideExisting = true)
    {
        if (null !== $this->collWorksheetsRelatedByFirstParam && !$overrideExisting) {
            return;
        }
        $this->collWorksheetsRelatedByFirstParam = new PropelObjectCollection();
        $this->collWorksheetsRelatedByFirstParam->setModel('Worksheet');
    }

    /**
     * Gets an array of Worksheet objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this DiscreteField is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Worksheet[] List of Worksheet objects
     * @throws PropelException
     */
    public function getWorksheetsRelatedByFirstParam($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collWorksheetsRelatedByFirstParam || null !== $criteria) {
            if ($this->isNew() && null === $this->collWorksheetsRelatedByFirstParam) {
                // return empty collection
                $this->initWorksheetsRelatedByFirstParam();
            } else {
                $collWorksheetsRelatedByFirstParam = WorksheetQuery::create(null, $criteria)
                    ->filterByDiscreteFieldRelatedByFirstParam($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collWorksheetsRelatedByFirstParam;
                }
                $this->collWorksheetsRelatedByFirstParam = $collWorksheetsRelatedByFirstParam;
            }
        }

        return $this->collWorksheetsRelatedByFirstParam;
    }

    /**
     * Sets a collection of WorksheetRelatedByFirstParam objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $worksheetsRelatedByFirstParam A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setWorksheetsRelatedByFirstParam(PropelCollection $worksheetsRelatedByFirstParam, PropelPDO $con = null)
    {
        $this->worksheetsRelatedByFirstParamScheduledForDeletion = $this->getWorksheetsRelatedByFirstParam(new Criteria(), $con)->diff($worksheetsRelatedByFirstParam);

        foreach ($this->worksheetsRelatedByFirstParamScheduledForDeletion as $worksheetRelatedByFirstParamRemoved) {
            $worksheetRelatedByFirstParamRemoved->setDiscreteFieldRelatedByFirstParam(null);
        }

        $this->collWorksheetsRelatedByFirstParam = null;
        foreach ($worksheetsRelatedByFirstParam as $worksheetRelatedByFirstParam) {
            $this->addWorksheetRelatedByFirstParam($worksheetRelatedByFirstParam);
        }

        $this->collWorksheetsRelatedByFirstParam = $worksheetsRelatedByFirstParam;
    }

    /**
     * Returns the number of related Worksheet objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Worksheet objects.
     * @throws PropelException
     */
    public function countWorksheetsRelatedByFirstParam(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collWorksheetsRelatedByFirstParam || null !== $criteria) {
            if ($this->isNew() && null === $this->collWorksheetsRelatedByFirstParam) {
                return 0;
            } else {
                $query = WorksheetQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByDiscreteFieldRelatedByFirstParam($this)
                    ->count($con);
            }
        } else {
            return count($this->collWorksheetsRelatedByFirstParam);
        }
    }

    /**
     * Method called to associate a Worksheet object to this object
     * through the Worksheet foreign key attribute.
     *
     * @param    Worksheet $l Worksheet
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function addWorksheetRelatedByFirstParam(Worksheet $l)
    {
        if ($this->collWorksheetsRelatedByFirstParam === null) {
            $this->initWorksheetsRelatedByFirstParam();
        }
        if (!$this->collWorksheetsRelatedByFirstParam->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddWorksheetRelatedByFirstParam($l);
        }

        return $this;
    }

    /**
     * @param	WorksheetRelatedByFirstParam $worksheetRelatedByFirstParam The worksheetRelatedByFirstParam object to add.
     */
    protected function doAddWorksheetRelatedByFirstParam($worksheetRelatedByFirstParam)
    {
        $this->collWorksheetsRelatedByFirstParam[]= $worksheetRelatedByFirstParam;
        $worksheetRelatedByFirstParam->setDiscreteFieldRelatedByFirstParam($this);
    }

    /**
     * @param	WorksheetRelatedByFirstParam $worksheetRelatedByFirstParam The worksheetRelatedByFirstParam object to remove.
     */
    public function removeWorksheetRelatedByFirstParam($worksheetRelatedByFirstParam)
    {
        if ($this->getWorksheetsRelatedByFirstParam()->contains($worksheetRelatedByFirstParam)) {
            $this->collWorksheetsRelatedByFirstParam->remove($this->collWorksheetsRelatedByFirstParam->search($worksheetRelatedByFirstParam));
            if (null === $this->worksheetsRelatedByFirstParamScheduledForDeletion) {
                $this->worksheetsRelatedByFirstParamScheduledForDeletion = clone $this->collWorksheetsRelatedByFirstParam;
                $this->worksheetsRelatedByFirstParamScheduledForDeletion->clear();
            }
            $this->worksheetsRelatedByFirstParamScheduledForDeletion[]= $worksheetRelatedByFirstParam;
            $worksheetRelatedByFirstParam->setDiscreteFieldRelatedByFirstParam(null);
        }
    }

    /**
     * Clears out the collWorksheetsRelatedBySecondParam collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addWorksheetsRelatedBySecondParam()
     */
    public function clearWorksheetsRelatedBySecondParam()
    {
        $this->collWorksheetsRelatedBySecondParam = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collWorksheetsRelatedBySecondParam collection.
     *
     * By default this just sets the collWorksheetsRelatedBySecondParam collection to an empty array (like clearcollWorksheetsRelatedBySecondParam());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initWorksheetsRelatedBySecondParam($overrideExisting = true)
    {
        if (null !== $this->collWorksheetsRelatedBySecondParam && !$overrideExisting) {
            return;
        }
        $this->collWorksheetsRelatedBySecondParam = new PropelObjectCollection();
        $this->collWorksheetsRelatedBySecondParam->setModel('Worksheet');
    }

    /**
     * Gets an array of Worksheet objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this DiscreteField is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Worksheet[] List of Worksheet objects
     * @throws PropelException
     */
    public function getWorksheetsRelatedBySecondParam($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collWorksheetsRelatedBySecondParam || null !== $criteria) {
            if ($this->isNew() && null === $this->collWorksheetsRelatedBySecondParam) {
                // return empty collection
                $this->initWorksheetsRelatedBySecondParam();
            } else {
                $collWorksheetsRelatedBySecondParam = WorksheetQuery::create(null, $criteria)
                    ->filterByDiscreteFieldRelatedBySecondParam($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collWorksheetsRelatedBySecondParam;
                }
                $this->collWorksheetsRelatedBySecondParam = $collWorksheetsRelatedBySecondParam;
            }
        }

        return $this->collWorksheetsRelatedBySecondParam;
    }

    /**
     * Sets a collection of WorksheetRelatedBySecondParam objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $worksheetsRelatedBySecondParam A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setWorksheetsRelatedBySecondParam(PropelCollection $worksheetsRelatedBySecondParam, PropelPDO $con = null)
    {
        $this->worksheetsRelatedBySecondParamScheduledForDeletion = $this->getWorksheetsRelatedBySecondParam(new Criteria(), $con)->diff($worksheetsRelatedBySecondParam);

        foreach ($this->worksheetsRelatedBySecondParamScheduledForDeletion as $worksheetRelatedBySecondParamRemoved) {
            $worksheetRelatedBySecondParamRemoved->setDiscreteFieldRelatedBySecondParam(null);
        }

        $this->collWorksheetsRelatedBySecondParam = null;
        foreach ($worksheetsRelatedBySecondParam as $worksheetRelatedBySecondParam) {
            $this->addWorksheetRelatedBySecondParam($worksheetRelatedBySecondParam);
        }

        $this->collWorksheetsRelatedBySecondParam = $worksheetsRelatedBySecondParam;
    }

    /**
     * Returns the number of related Worksheet objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Worksheet objects.
     * @throws PropelException
     */
    public function countWorksheetsRelatedBySecondParam(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collWorksheetsRelatedBySecondParam || null !== $criteria) {
            if ($this->isNew() && null === $this->collWorksheetsRelatedBySecondParam) {
                return 0;
            } else {
                $query = WorksheetQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByDiscreteFieldRelatedBySecondParam($this)
                    ->count($con);
            }
        } else {
            return count($this->collWorksheetsRelatedBySecondParam);
        }
    }

    /**
     * Method called to associate a Worksheet object to this object
     * through the Worksheet foreign key attribute.
     *
     * @param    Worksheet $l Worksheet
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function addWorksheetRelatedBySecondParam(Worksheet $l)
    {
        if ($this->collWorksheetsRelatedBySecondParam === null) {
            $this->initWorksheetsRelatedBySecondParam();
        }
        if (!$this->collWorksheetsRelatedBySecondParam->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddWorksheetRelatedBySecondParam($l);
        }

        return $this;
    }

    /**
     * @param	WorksheetRelatedBySecondParam $worksheetRelatedBySecondParam The worksheetRelatedBySecondParam object to add.
     */
    protected function doAddWorksheetRelatedBySecondParam($worksheetRelatedBySecondParam)
    {
        $this->collWorksheetsRelatedBySecondParam[]= $worksheetRelatedBySecondParam;
        $worksheetRelatedBySecondParam->setDiscreteFieldRelatedBySecondParam($this);
    }

    /**
     * @param	WorksheetRelatedBySecondParam $worksheetRelatedBySecondParam The worksheetRelatedBySecondParam object to remove.
     */
    public function removeWorksheetRelatedBySecondParam($worksheetRelatedBySecondParam)
    {
        if ($this->getWorksheetsRelatedBySecondParam()->contains($worksheetRelatedBySecondParam)) {
            $this->collWorksheetsRelatedBySecondParam->remove($this->collWorksheetsRelatedBySecondParam->search($worksheetRelatedBySecondParam));
            if (null === $this->worksheetsRelatedBySecondParamScheduledForDeletion) {
                $this->worksheetsRelatedBySecondParamScheduledForDeletion = clone $this->collWorksheetsRelatedBySecondParam;
                $this->worksheetsRelatedBySecondParamScheduledForDeletion->clear();
            }
            $this->worksheetsRelatedBySecondParamScheduledForDeletion[]= $worksheetRelatedBySecondParam;
            $worksheetRelatedBySecondParam->setDiscreteFieldRelatedBySecondParam(null);
        }
    }

    /**
     * Clears out the collFilters collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addFilters()
     */
    public function clearFilters()
    {
        $this->collFilters = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collFilters collection.
     *
     * By default this just sets the collFilters collection to an empty array (like clearcollFilters());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initFilters($overrideExisting = true)
    {
        if (null !== $this->collFilters && !$overrideExisting) {
            return;
        }
        $this->collFilters = new PropelObjectCollection();
        $this->collFilters->setModel('Filter');
    }

    /**
     * Gets an array of Filter objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this DiscreteField is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Filter[] List of Filter objects
     * @throws PropelException
     */
    public function getFilters($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collFilters || null !== $criteria) {
            if ($this->isNew() && null === $this->collFilters) {
                // return empty collection
                $this->initFilters();
            } else {
                $collFilters = FilterQuery::create(null, $criteria)
                    ->filterByDiscreteField($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collFilters;
                }
                $this->collFilters = $collFilters;
            }
        }

        return $this->collFilters;
    }

    /**
     * Sets a collection of Filter objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $filters A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setFilters(PropelCollection $filters, PropelPDO $con = null)
    {
        $this->filtersScheduledForDeletion = $this->getFilters(new Criteria(), $con)->diff($filters);

        foreach ($this->filtersScheduledForDeletion as $filterRemoved) {
            $filterRemoved->setDiscreteField(null);
        }

        $this->collFilters = null;
        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }

        $this->collFilters = $filters;
    }

    /**
     * Returns the number of related Filter objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Filter objects.
     * @throws PropelException
     */
    public function countFilters(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collFilters || null !== $criteria) {
            if ($this->isNew() && null === $this->collFilters) {
                return 0;
            } else {
                $query = FilterQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByDiscreteField($this)
                    ->count($con);
            }
        } else {
            return count($this->collFilters);
        }
    }

    /**
     * Method called to associate a Filter object to this object
     * through the Filter foreign key attribute.
     *
     * @param    Filter $l Filter
     * @return   DiscreteField The current object (for fluent API support)
     */
    public function addFilter(Filter $l)
    {
        if ($this->collFilters === null) {
            $this->initFilters();
        }
        if (!$this->collFilters->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddFilter($l);
        }

        return $this;
    }

    /**
     * @param	Filter $filter The filter object to add.
     */
    protected function doAddFilter($filter)
    {
        $this->collFilters[]= $filter;
        $filter->setDiscreteField($this);
    }

    /**
     * @param	Filter $filter The filter object to remove.
     */
    public function removeFilter($filter)
    {
        if ($this->getFilters()->contains($filter)) {
            $this->collFilters->remove($this->collFilters->search($filter));
            if (null === $this->filtersScheduledForDeletion) {
                $this->filtersScheduledForDeletion = clone $this->collFilters;
                $this->filtersScheduledForDeletion->clear();
            }
            $this->filtersScheduledForDeletion[]= $filter;
            $filter->setDiscreteField(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this DiscreteField is new, it will return
     * an empty collection; or if this DiscreteField has previously
     * been saved, it will retrieve related Filters from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in DiscreteField.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Filter[] List of Filter objects
     */
    public function getFiltersJoinWorksheet($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = FilterQuery::create(null, $criteria);
        $query->joinWith('Worksheet', $join_behavior);

        return $this->getFilters($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->datasource_id = null;
        $this->code_field = null;
        $this->label_field = null;
        $this->name = null;
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
            if ($this->collWorksheetsRelatedByFirstParam) {
                foreach ($this->collWorksheetsRelatedByFirstParam as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collWorksheetsRelatedBySecondParam) {
                foreach ($this->collWorksheetsRelatedBySecondParam as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collFilters) {
                foreach ($this->collFilters as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collWorksheetsRelatedByFirstParam instanceof PropelCollection) {
            $this->collWorksheetsRelatedByFirstParam->clearIterator();
        }
        $this->collWorksheetsRelatedByFirstParam = null;
        if ($this->collWorksheetsRelatedBySecondParam instanceof PropelCollection) {
            $this->collWorksheetsRelatedBySecondParam->clearIterator();
        }
        $this->collWorksheetsRelatedBySecondParam = null;
        if ($this->collFilters instanceof PropelCollection) {
            $this->collFilters->clearIterator();
        }
        $this->collFilters = null;
        $this->aDataSource = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DiscreteFieldPeer::DEFAULT_STRING_FORMAT);
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
    if (!$callable = sfMixer::getCallable('BaseDiscreteField:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseDiscreteField::%s', $name));
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
    return (string) $this->getCodeField();
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
		return DiscreteFieldPeer::getMetadata($info, $default, get_class($this));
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
} // BaseDiscreteField

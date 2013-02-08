<?php

require_once 'addon/propel/builder/SfObjectBuilder.php';

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @package    symfony
 * @subpackage addon
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: SfObjectBuilder.php 3493 2007-02-18 09:23:10Z fabien $
 */
class SfSurfaceObjectBuilder extends SfObjectBuilder{

	protected function addSave(&$script){
		$tmp = '';
		parent::addSave($tmp);

		// add support for created_(at|on) and updated_(at|on) columns
		$update_script = '';
		$creator_script = '';
		$updated = false;
		$created = false;
		foreach ($this->getTable()->getColumns() as $col){
			$clo = strtolower($col->getName());

			if (in_array($clo, array('updated_at', 'updated_on'))){
				$update_script .= "
    if (!\$this->isSkipEdited() && !\$this->isColumnModified(".$this->getColumnConstant($col)."))
    {
      \$this->set".$col->getPhpName()."(time());
    }
";
			} else if (in_array($clo, array('updated_by'))){
				$update_script .= "
    if (!\$this->isSkipEdited() && !\$this->isColumnModified(".$this->getColumnConstant($col)."))
    {
      \$user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      \$this->set".$col->getPhpName()."(\$user_id);
    }
";
			} else if (in_array($clo, array('created_at', 'created_on'))){
				$create_script .= "
    if (!\$this->isSkipEdited() && !\$this->isColumnModified(".$this->getColumnConstant($col)."))
    {
      \$this->set".$col->getPhpName()."(time());
    }
";
			} else if (in_array($clo, array('created_by'))){
				$create_script .= "
    if (!\$this->isSkipEdited() && !\$this->isColumnModified(".$this->getColumnConstant($col)."))
    {
      \$user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      \$this->set".$col->getPhpName()."(\$user_id);
    }
";
			}
		}

		if ($update_script){
			$update_script = "
    if (\$this->isModified()) {
".$update_script."
    }
";
		}
		if ($create_script){
			$create_script = "
    if (\$this->isNew()) {
".$create_script."
    }
";
		}

		$tmp = preg_replace('/{/', '{'.$update_script.$create_script, $tmp, 1);

		/* if (DataModelBuilder::getBuildProperty('builderAddBehaviors'))
		  {
		  // add sfMixer call
		  $pre_mixer_script = "

		  foreach (sfMixer::getCallables('{$this->getClassname()}:save:pre') as \$callable)
		  {
		  \$affectedRows = call_user_func(\$callable, \$this, \$con);
		  if (is_int(\$affectedRows))
		  {
		  return \$affectedRows;
		  }
		  }

		  ";
		  $post_mixer_script = <<<EOF

		  foreach (sfMixer::getCallables('{$this->getClassname()}:save:post') as \$callable)
		  {
		  call_user_func(\$callable, \$this, \$con, \$affectedRows);
		  }

		  EOF;
		  $tmp = preg_replace('/{/', '{'.$pre_mixer_script, $tmp, 1);
		  $tmp = preg_replace('/(\$con\->commit\(\);)/', '$1'.$post_mixer_script, $tmp);
		  } */

		// update current script
		$script .= $tmp;
	}

	/**
	 * Adds the getModifiedColumns() method.
	 * This is a convenient, non introspective way of getting all the modified fields for a particular object.
	 * @param      string &$script The script will be modified in this method.
	 */
	protected function addGetModifiedColumns(&$script){
		$script .= "
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
		return \$this->modifiedColumns;
	}
";
	}

	/**
	 * Adds the __toString() method.
	 * Return a defaut text representation of this object
	 * @param      string &$script The script will be modified in this method.
	 */
	protected function addToString(&$script){
		$table = $this->getTable();
		$columns = $table->getColumns();

		$done = false;
		$col = reset($columns);
		while ($col && !$done){
			if (PropelTypes::isTextType($col->getType())){
				$cfc = $col->getPhpName();
				$script .= "
  /**
  * Returns a defaut text representation of this object.
  *
  * @return     string
  */
  public function sfcToString()
  {
    return (string) \$this->get$cfc();
  }
  ";
				$done = true;
			}
			$col = next($columns);
		}

		$script .= <<<'EOT'

  public function toStringWithType() {
    return $this->getMetadata('name') . ' : ' . $this->__toString();
  }

EOT;

		$script .= <<<'EOT'

  public function exportTo($parser, $includeLazyLoadColumns = true) {
    if ($parser == constant(self::PEER . '::DEFAULT_STRING_FORMAT')) {
      return $this->sfcToString();
    } else {
      return parent::exportTo($parser);
    }
  }

EOT;
	}

	protected function addClassBody(&$script){
		parent::addClassBody($script);

		$this->addToString($script);
		$this->addGetModifiedColumns($script);
		$this->addSkipEdited($script);
		$this->addGetMetadata($script);
		$this->addGetLinkTo($script);
		$this->addGetSurfaceUrl($script);
		$this->addGetToString($script);
	}

	protected function addSkipEdited(&$script){
		$function = array();

		//Attribut
		$function[] = "";
		$function[] = "	protected \$skip_edited = false;";

		//Comment
		$function[] = "";
		$function[] = "	/**";
		$function[] = "	 *";
		$function[] = "	 *";
		$function[] = "	 */";
		//setSkipEdited
		$function[] = "	public function setSkipEdited(\$skip) {";
		$function[] = "		\$this->skip_edited = (bool) \$skip;";
		$function[] = "	}";

		//Comment
		$function[] = "";
		$function[] = "	/**";
		$function[] = "	 *";
		$function[] = "	 *";
		$function[] = "	 */";
		//isSkipEdited
		$function[] = "	public function isSkipEdited() {";
		$function[] = "		return \$this->skip_edited;";
		$function[] = "	}";
		$function[] = "";

		$script .= implode("\n", $function);
	}

	protected function addGetMetadata(&$script){
		//Comment
		$function[] = "";
		$function[] = "	/**";
		$function[] = "	 *";
		$function[] = "	 *";
		$function[] = "	 */";
		//Function
		$function[] = "	public function getMetadata(\$info = null, \$default = null) {";
		$function[] = "		return %CLASS_PEER%::getMetadata(\$info, \$default, get_class(\$this));";
		$function[] = "	}";

		$script .= str_replace(array('%CLASS_PEER%'), array($this->getPeerClassname()), implode("\n", $function));
	}

	/**
	 * Adds a magic __call() method
	 * @param      string &$script The script will be modified in this method.
	 */
	protected function addMagicCall(&$script){
		$behaviorCallScript = '';
		if (DataModelBuilder::getBuildProperty('builderAddBehaviors')){
			$toAdd = <<<'EOT'

   /* symfony 1.0 behavior
    *   Old symfony behavior engine.
    *   Moved from sfObjectBuilder::addCall
    *   By Colin Michoudet
    */
  try {
    if (!$callable = sfMixer::getCallable('%_CLASSNAME_%:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method %_CLASSNAME_%::%s', $name));
    }
    array_unshift($params, $this);
    return call_user_func_array($callable, $params);
  } catch (sfException $e) {
    if (sfConfig::get('sf_logging_enabled')) {
      sfContext::getInstance()->getLogger()->debug('[symfony magic call] : ' . $e->getMessage());
    }
  }
  /* end symfony 1.0 behavior code */

EOT;
			$behaviorCallScript .= str_replace('%_CLASSNAME_%', $this->getClassname(), $toAdd);
		}
		$this->applyBehaviorModifier('objectCall', $behaviorCallScript, "		");
		if ($behaviorCallScript){
			$script .= "
    /**
     * Catches calls to virtual methods
     */
    public function __call(\$name, \$params)
    {
        $behaviorCallScript

        return parent::__call(\$name, \$params);
    }
";
		}
	}

	/**
	 * Adds the function body for the hydrate method
	 * @param      string &$script The script will be modified in this method.
	 * @see        addHydrate()
	 */
	protected function addHydrateBody(&$script){
		$table = $this->getTable();
		$platform = $this->getPlatform();
		$script .= "
        try {
";
		$n = 0;
		foreach ($table->getColumns() as $col){
			if (!$col->isLazyLoad()){
				$clo = strtolower($col->getName());
				if ($col->getType() === PropelTypes::CLOB_EMU && $this->getPlatform() instanceof OraclePlatform){
					// PDO_OCI returns a stream for CLOB objects, while other PDO adapters return a string...
					$script .= "
            \$this->{$clo} = stream_get_contents(\$row[\$startcol + {$n}]);";
				} elseif ($col->isLobType() && !$platform->hasStreamBlobImpl()){
					$script .= "
            if (\$row[\$startcol + {$n}] !== null) {
                \$this->{$clo} = fopen('php://memory', 'r+');
                fwrite(\$this->{$clo}, \$row[\$startcol + {$n}]);
                rewind(\$this->{$clo});
            } else {
                \$this->{$clo} = null;
            }";
				} elseif ($col->getPhpType() === 'string' && $this->getPlatform() instanceof MssqlPlatform){
					$script .= "
			\$this->{$clo} = (\$row[\$startcol + {$n}] !== null && \$row[\$startcol + {$n}] !== ' ') ? (string) \$row[\$startcol + {$n}] : null;";
				} elseif ($col->isPhpPrimitiveType()){
					$script .= "
            \$this->{$clo} = (\$row[\$startcol + {$n}] !== null) ? ({$col->getPhpType()}) \$row[\$startcol + {$n}] : null;";
				} elseif ($col->getType() === PropelTypes::OBJECT){
					$script .= "
            \$this->{$clo} = \$row[\$startcol + {$n}];";
				} elseif ($col->getType() === PropelTypes::PHP_ARRAY){
					$script .= "
            \$this->{$clo} = \$row[\$startcol + {$n}];
            \$this->{$clo}_unserialized = null;";
				} elseif ($col->isPhpObjectType()){
					$script .= "
            \$this->{$clo} = (\$row[\$startcol + {$n}] !== null) ? new {$col->getPhpType()}(\$row[\$startcol + {$n}]) : null;";
//					if($col->getPhpType() == 'Geometry'){
//						$n++;
//						$script .= "
//            \$this->{$clo}[1] = \$row[\$startcol + {$n}];";
//					}
				} else{
					$script .= "
            \$this->{$clo} = \$row[\$startcol + {$n}];";
				}
				$n++;
			} // if col->isLazyLoad()
		} /* foreach */

		if ($this->getBuildProperty("addSaveMethod")){
			$script .= "
            \$this->resetModified();
";
		}

		$script .= "
            \$this->setNew(false);

            if (\$rehydrate) {
                \$this->ensureConsistency();
            }

            return \$startcol + $n; // $n = ".$this->getPeerClassname()."::NUM_HYDRATE_COLUMNS.

        } catch (Exception \$e) {
            throw new PropelException(\"Error populating ".$this->getStubObjectBuilder()->getClassname()." object\", \$e);
        }";
	}

	protected function addGetLinkTo(&$script){
		$script .= "
	public function getLinkTo(\$action = null, \$target = null){
		return SurfaceLinkTo::create(\$this, \$action, \$target);
    }";
	}

	protected function addGetSurfaceUrl(&$script){
		$script .= "
	public function getSurfaceUrl(\$action = null, \$target = null){
		return \$this->getLinkTo(\$action, \$target)->getUrl();
    }";
	}

	protected function addGetToString(&$script){
		$script .= "
	public function getToString(){
		return \$this->__toString();
    }";
	}

	/**
	 * Boosts ActiveRecord::doInsert() by doing more calculations at buildtime.
	 */
	protected function addDoInsertBodyRaw(){
		$this->declareClasses('Propel', 'PDO', 'PropelTypes');
		$table = $this->getTable();
		$peerClassname = $this->getPeerClassname();
		$platform = $this->getPlatform();
		if(!($platform instanceof PgsqlPlatform)){
			return parent::addDoInsertBodyRaw();
		}
		$primaryKeyMethodInfo = '';
		if ($table->getIdMethodParameters()){
			$params = $table->getIdMethodParameters();
			$imp = $params[0];
			$primaryKeyMethodInfo = $imp->getValue();
		} elseif ($table->getIdMethod() == IDMethod::NATIVE && ($platform->getNativeIdMethod() == PropelPlatformInterface::SEQUENCE || $platform->getNativeIdMethod() == PropelPlatformInterface::SERIAL)){
			$primaryKeyMethodInfo = $platform->getSequenceName($table);
		}
		$query = "INSERT INTO {$platform->quoteIdentifier($table->getName())} (%s) VALUES (%s)";
		$script = "
        \$modifiedColumns = array();
		\$params = array();
        \$index = 0;
";

		foreach ($table->getPrimaryKey() as $column){
			if (!$column->isAutoIncrement()){
				continue;
			}
			$constantName = $this->getColumnConstant($column);
			if ($platform->supportsInsertNullPk()){
				$script .= "
        \$this->modifiedColumns[] = $constantName;";
			}
			$columnProperty = strtolower($column->getName());
			if (!$table->isAllowPkInsert()){
				$script .= "
        if (null !== \$this->{$columnProperty}) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . $constantName . ')');
        }";
			} elseif (!$platform->supportsInsertNullPk()){
				$script .= "
        // add primary key column only if it is not null since this database does not accept that
        if (null !== \$this->{$columnProperty}) {
            \$this->modifiedColumns[] = $constantName;
        }";
			}
		}

		// if non auto-increment but using sequence, get the id first
		if (!$platform->isNativeIdMethodAutoIncrement() && $table->getIdMethod() == "native"){
			$column = $table->getFirstPrimaryKeyColumn();
			$columnProperty = strtolower($column->getName());
			$script .= "
        if (null === \$this->{$columnProperty}) {
            try {";
			$script .= $platform->getIdentifierPhp('$this->'.$columnProperty, '$con', $primaryKeyMethodInfo, '				');
			$script .= "
				\$this->modifiedColumns[] = {$constantName};
            } catch (Exception \$e) {
                throw new PropelException('Unable to get sequence id.', \$e);
            }
        }
";
		}

		$script .= "
        foreach((array){$this->getPeerClassname()}::getTableMap()->getColumns() as \$column){
			if(\$this->isColumnModified(\$column->getFullyQualifiedName())){
				\$column_name = strtolower(\$column->getName());
				\$params[\$column->getName()] = array(
					'name' => \$column->getName(),
					'value' => \$this->\$column_name,
					'pdo_type' => \$column->getPdoType(),
				);
				if(\$column->getType() == 'GEOMETRY' || \$column->getType() == 'MULTIPOLYGON' ){
					\$modifiedColumns[\$column->getName()] = 'ST_GeomFromText(:'.\$column->getName().', :'.\$column->getName().'_SRID)';
					\$params[\$column->getName().'_SRID'] = array(
						'name' => \$column->getName().'_SRID',
						'value' => \$params[\$column->getName()]['value'][1],
						'pdo_type' => PDO::PARAM_STR,
					);
					\$params[\$column->getName()]['value'] = \$params[\$column->getName()]['value'][0];
				} else {
					\$modifiedColumns[\$column->getName()] = ':'.\$column->getName();
				}

			}
		}

        \$sql = 'INSERT INTO '.{$this->getPeerClassname()}::TABLE_NAME.' ('.implode(', ', array_keys(\$modifiedColumns)).') VALUES ('.implode(', ', \$modifiedColumns).')';

        try {
            \$stmt = \$con->prepare(\$sql);
			foreach(\$params as \$param){
				\$stmt->bindValue(':'.\$param['name'], \$param['value'], \$param['pdo_type']);
			}
            \$stmt->execute();
        } catch (Exception \$e) {
            Propel::log(\$e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(\"Unable to execute INSERT statement [{\$sql}]<br/>\n with following parameters: <pre>\".var_export(\$params, true).\"</pre>\", \$e);
        }
";

		// if auto-increment, get the id after
		if ($platform->isNativeIdMethodAutoIncrement() && $table->getIdMethod() == "native"){
			$column = $table->getFirstPrimaryKeyColumn();
			$columnProperty = strtolower($column->getName());
			$script .= "
        try {";
			$script .= $platform->getIdentifierPhp('$pk', '$con', $primaryKeyMethodInfo);
			$script .= "
        } catch (Exception \$e) {
            throw new PropelException('Unable to get autoincrement id.', \$e);
        }";
			if ($table->isAllowPkInsert()){
				$script .= "
        if (\$pk !== null) {
            \$this->set".$column->getPhpName()."(\$pk);
        }";
			} else{
				$script .= "
        \$this->set".$column->getPhpName()."(\$pk);";
			}
			$script .= "
";
		}

		return $script;
	}

	/**
	 * Adds the function body of the buildCriteria method
	 * @param      string &$script The script will be modified in this method.
	 * @see        addBuildCriteria()
	 * */
	protected function addBuildCriteriaBody(&$script){
		$script .= "
        \$criteria = new Criteria({$this->getPeerClassname()}::DATABASE_NAME);
";
		foreach ($this->getTable()->getColumns() as $col){
			$column_name = strtolower($col->getName());
			if ($col->getPhpType() == 'Geometry'){
				$script .= "
		if (\$this->isColumnModified({$this->getColumnConstant($col)})) \$criteria->add(".$this->getColumnConstant($col).", 
					(null === \$this->{$column_name}[0]) ? null : array('raw' => 'ST_GeomFromText(?, '.(int)\$this->{$column_name}[1].')', 'value' => \$this->{$column_name}[0]), 
					(null === \$this->{$column_name}[0]) ? Criteria::EQUAL : Criteria::CUSTOM_EQUAL);";
			} else{
				$script .= "
        if (\$this->isColumnModified(".$this->getColumnConstant($col).")) \$criteria->add(".$this->getColumnConstant($col).", \$this->{$column_name});";
			}
		}
	}

	/**
     * Adds a setter for Object columns.
     * @param      string &$script The script will be modified in this method.
     * @param Column $col The current column.
     * @see        parent::addColumnMutators()
     */
    protected function addGeometryMutator(&$script, Column $col)
    {
        $clo = strtolower($col->getName());
        $this->addMutatorOpen($script, $col);

        $script .= "
		if (\$v instanceof Geometry) {
			\$this->$clo = \$v;
		} else {
			\$this->$clo = new Geometry(\$v);
		}
		\$this->modifiedColumns[] = ".$this->getColumnConstant($col).";
";
        $this->addMutatorClose($script, $col);
    }

	/**
     * Adds the mutator (setter) methods for setting column values.
     * This is here because it is probably generic enough to apply to templates being generated
     * in different langauges (e.g. PHP4 and PHP5).
     * @param      string &$script The script will be modified in this method.
     */
    protected function addColumnMutatorMethods(&$script)
    {
        foreach ($this->getTable()->getColumns() as $col) {
            if ($col->isLobType()) {
                $this->addLobMutator($script, $col);
            } elseif ($col->getType() === PropelTypes::DATE || $col->getType() === PropelTypes::TIME || $col->getType() === PropelTypes::TIMESTAMP) {
                $this->addTemporalMutator($script, $col);
            } elseif (PropelTypes::getPhpNative($col->getType()) === PropelTypes::GEOMETRY_NATIVE_TYPE) {
				if(method_exists($this, 'addGeometryMutator')){
					$this->addGeometryMutator($script, $col);
				}
            } elseif ($col->getType() === PropelTypes::OBJECT) {
                $this->addObjectMutator($script, $col);
            } elseif ($col->getType() === PropelTypes::PHP_ARRAY) {
                $this->addArrayMutator($script, $col);
                if ($col->isNamePlural()) {
                    $this->addAddArrayElement($script, $col);
                    $this->addRemoveArrayElement($script, $col);
                }
            } elseif ($col->isEnumType()) {
                $this->addEnumMutator($script, $col);
            } elseif ($col->isBooleanType()) {
                $this->addBooleanMutator($script, $col);
            } elseif ($col->isNumericType()) {
                $this->addNumericMutator($script, $col);
            } else {
                $this->addDefaultMutator($script, $col);
            }
        }
    }

	/**
     * Adds a setter method for date/time/timestamp columns.
     * @param      string &$script The script will be modified in this method.
     * @param Column $col The current column.
     * @see        parent::addColumnMutators()
     */
    protected function addTemporalMutator(&$script, Column $col)
    {
        $cfc = $col->getPhpName();
        $clo = strtolower($col->getName());
        $visibility = $col->getMutatorVisibility();

        $dateTimeClass = $this->getBuildProperty('dateTimeClass');
        if (!$dateTimeClass) {
            $dateTimeClass = 'DateTime';
        }
        $this->declareClasses($dateTimeClass, 'DateTimeZone', 'PropelDateTime');

        $this->addTemporalMutatorComment($script, $col);
        $this->addMutatorOpenOpen($script, $col);
        $this->addMutatorOpenBody($script, $col);

        $fmt = var_export($this->getTemporalFormatter($col), true);

        $script .= "
        if(is_string(\$v)){
            \$v = SfcUtils::dateTimeFormat(\$v);
        }
        \$dt = PropelDateTime::newInstance(\$v, null, '$dateTimeClass');
        if (\$this->$clo !== null || \$dt !== null) {
            \$currentDateAsString = (\$this->$clo !== null && \$tmpDt = new $dateTimeClass(\$this->$clo)) ? \$tmpDt->format($fmt) : null;
            \$newDateAsString = \$dt ? \$dt->format($fmt) : null;";

        if (($def = $col->getDefaultValue()) !== null && !$def->isExpression()) {
            $defaultValue = $this->getDefaultValueString($col);
            $script .= "
            if ( (\$currentDateAsString !== \$newDateAsString) // normalized values don't match
                || (\$dt->format($fmt) === $defaultValue) // or the entered value matches the default
                 ) {";
        } else {
            $script .= "
            if (\$currentDateAsString !== \$newDateAsString) {";
        }

        $script .= "
                \$this->$clo = \$newDateAsString;
                \$this->modifiedColumns[] = ".$this->getColumnConstant($col).";
            }
        } // if either are not null
";
        $this->addMutatorClose($script, $col);
    }

	/**
     * Adds setter method for numeric columns.
     * @param      string &$script The script will be modified in this method.
     * @param Column $col The current column.
     * @see        parent::addColumnMutators()
     */
    protected function addNumericMutator(&$script, Column $col)
    {
        $clo = strtolower($col->getName());

        $this->addMutatorOpen($script, $col);

        // Perform type-casting to ensure that we can use type-sensitive
        // checking in mutators.
        if ($col->isPhpPrimitiveType()) {
            $script .= "
		\$v = SfcUtils::numberParse(\$v);
        if (\$v !== null) {
            \$v = (".$col->getPhpType().") \$v;
        }
";
        }

        $script .= "
        if (\$this->$clo !== \$v) {
            \$this->$clo = \$v;
            \$this->modifiedColumns[] = ".$this->getColumnConstant($col).";
        }
";
        $this->addMutatorClose($script, $col);
    }
}

<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'addon/propel/builder/SfPeerBuilder.php';

/**
 * @package    symfony
 * @subpackage addon
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: SfPeerBuilder.php 17357 2009-04-16 11:46:01Z FabianLange $
 */
class SfSurfacePeerBuilder extends SfPeerBuilder{

	protected function addClassBody(&$script){
		parent::addClassBody($script);
		$this->addDoSelectIds($script);
		$this->addDoSelectField($script);
		$this->addGetMetadata($script);
	}

	/**
	 * Adds the doSelectPK() method.
	 * @param string &$script The script will be modified in this method.
	 */
	protected function addDoSelectIds(&$script){
		if (count($this->getTable()->getPrimaryKey()) !== 1){
			return null;
		}
		$pk = array_shift($this->getTable()->getPrimaryKey());
		$function = array();

		//Comment
		$function[] = "";
		$function[] = "	/**";
		$function[] = "	 * Retrieve PK of all matched record.";
		$function[] = "	 * @param Criteria \$criteria The Criteria object used to build the SELECT statement.";
		$function[] = "	 * @param Connection \$con The connection to use.";
		$function[] = "	 * @return array Array of PK of selected record.";
		$function[] = "	 * @see doSelectField";
		$function[] = "	 */";

		//Function
		$function[] = "	public static function doSelectPK(Criteria \$criteria = null, \$con = null) {";
		$function[] = "		return %CLASS_PEER%::doSelectFieldValues(%CONSTANT_PK%, \$criteria, true, \$con);";
		$function[] = "	}";
		$function[] = "";

		$script .= str_replace(array('%CLASS_PEER%', '%CONSTANT_PK%'), array($this->getPeerClassname(), $this->getColumnConstant($pk)), implode("\n", $function));
	}

	protected function addDoSelectField(&$script){
		$toAdd = <<<'EOT'
  
  /**
   * Retrieve Field of all matched record.
   * @param string $field Field of table
   * @param Criteria $criteria Criteria
   * @param boolean $distinct If select only distinct values
   * @param Connection $con Connection to use
   * @return array Array of field values
   */
  public static function doSelectFieldValues($field, $criteria = null, $distinct = false, $con = null) {
      if(!$criteria) {
          $criteria = new Criteria();
      }
      else {
          $criteria = clone $criteria;
      }
      if($distinct) {
          if (! in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
              $criteria->setDistinct();
          }
      }
      if (in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
          //$criteria->clearOrderByColumns();
      }
      $column = %CLASS_PEER%::getTableMap()->getColumn($field);
      $criteria->clearSelectColumns();
      $criteria->addSelectColumn($field);
      $stmt = %CLASS_PEER%::doSelectStmt($criteria, $con);
      $fields = array();
      while($row = $stmt->fetch()) {
          $fields[] = $row[0];
      }
      return $fields;
  }
  
EOT;
		$script .= str_replace(array('%CLASS_PEER%'), array($this->getPeerClassname()), $toAdd);
	}

	protected function addGetMetadata(&$script){
		$function[] = "";
		$function[] = "	protected static \$_metadata;";
		//Coment
		$function[] = "";
		$function[] = "	/**";
		$function[] = "	 *";
		$function[] = "	 *";
		$function[] = "	 */";
		//Function
		$function[] = "	public static function getMetadata(\$info = null, \$default = null, \$class = '%CLASS_NAME%') {";
		$function[] = "		if(!%CLASS_PEER%::\$_metadata) {";
		$function[] = "			\$metadata = sfConfig::get('app_metadata_' . \$class, array());";
		$function[] = "			\$default_metadata = array(";
		$function[] = "				'name' => \$class,";
		$function[] = "				'app' => sfConfig::get('sf_app'),";
		$function[] = "				'module' => sfInflector::underscore(\$class)";
		$function[] = "			);";
		$function[] = "			%CLASS_PEER%::\$_metadata = array_merge(\$default_metadata, \$metadata);";
		$function[] = "		}";
		$function[] = "		if(\$info) {";
		$function[] = "			return get(\$info, %CLASS_PEER%::\$_metadata, \$default);";
		$function[] = "		}";
		$function[] = "		return %CLASS_PEER%::\$_metadata;";
		$function[] = "	}";

		$script .= str_replace(array('%CLASS_PEER%', '%CLASS_NAME%'), array($this->getPeerClassname(), $this->getObjectClassname()), implode("\n", $function));
	}

	/**
	 * Adds the addSelectColumns() method.
	 * @param      string &$script The script will be modified in this method.
	 */
	protected function addAddSelectColumns(&$script){
		$script .= "
	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad=\"true\" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria \$criteria object containing the columns to add.
	 * @param      string   \$alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria \$criteria, \$alias = null)
	{
		if (null === \$alias) {";
		foreach ($this->getTable()->getColumns() as $col){
			if (!$col->isLazyLoad()){
				if ($col->getPhpType() == PropelTypes::GEOMETRY_NATIVE_TYPE){
					$script .= "
			\$criteria->addSelectColumn('AsText('.{$this->getPeerClassname()}::{$this->getColumnName($col)}.')');";
				} else{
					$script .= "
			\$criteria->addSelectColumn({$this->getPeerClassname()}::{$this->getColumnName($col)});";
				}
			} // if !col->isLazyLoad
		} // foreach
		$script .= "
		} else {";
		foreach ($this->getTable()->getColumns() as $col){
			if (!$col->isLazyLoad()){
				if ($col->getPhpType() == PropelTypes::GEOMETRY_NATIVE_TYPE){
					$script .= "
			\$criteria->addSelectColumn('AsText('.\$alias.'.{$col->getConstantColumnName()})');";
				} else{
					$script .= "
			\$criteria->addSelectColumn(\$alias.'.{$col->getConstantColumnName()}');";
				}
			} // if !col->isLazyLoad
		} // foreach
		$script .= "
		}";
		$script .="
	}
";
	}

// addAddSelectColumns()

	/**
	 * Adds the retrieveByPK method for tables with single-column primary key.
	 * @param      string &$script The script will be modified in this method.
	 */
	protected function addRetrieveByPK_SinglePK(&$script){
		$table = $this->getTable();
		$pks = $table->getPrimaryKey();
		$col = $pks[0];

		$script .= "
	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      {$col->getPhpType()} \$pk the primary key.
	 * @param      PropelPDO \$con the connection to use
	 * @return     {$this->getObjectClassname()}
	 */
	public static function {$this->getRetrieveMethodName()}(\$pk, PropelPDO \$con = null)
	{
		\$pk = ({$col->getPhpType()}) \$pk; // Casting pk as it's php type to prevent error from empty string
		if(!\$pk){
			return null;
		}

		if (null !== (\$obj = {$this->getPeerClassname()}::getInstanceFromPool({$this->getInstancePoolKeySnippet('$pk')}))) {
			return \$obj;
		}

		if (\$con === null) {
			\$con = Propel::getConnection({$this->getPeerClassname()}::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		\$criteria = new Criteria({$this->getPeerClassname()}::DATABASE_NAME);
		\$criteria->add({$this->getColumnConstant($col)}, \$pk);

		\$v = {$this->getPeerClassname()}::doSelect(\$criteria, \$con);

		return !empty(\$v) > 0 ? \$v[0] : null;
	}
";
	}

}

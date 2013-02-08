<?php

class sfSurfacePropelData extends sfPropelData {

	/**
	 * Dumps data to fixture from one or more tables.
	 *
	 * @param string directory or file to dump to
	 * @param mixed  name or names of tables to dump (or all to dump all tables)
	 * @param string connection name
	 */
	public function dumpData($directory_or_file = null, $tables = 'all', $connectionName = 'propel') {
		$sameFile = true;
		if (is_dir($directory_or_file)) {
			// multi files
			$sameFile = false;
		}
		else {
			// same file
			// delete file
		}

		$this->con = Propel::getConnection($connectionName);

		// get tables
		if ('all' === $tables || is_null($tables)) {
			// load all map builder classes
			$files = sfFinder::type('file')->ignore_version_control()->name('*MapBuilder.php')->in(sfLoader::getModelDirs());
			foreach ($files as $file) {
				$mapBuilderClass = basename($file, '.php');
				$map = new $mapBuilderClass();
				$map->doBuild();
			}

			$dbMap = Propel::getDatabaseMap($connectionName);
			$tables = array();
			foreach ($dbMap->getTables() as $table) {
				$tables[] = $table->getPhpName();
			}
		}
		else if (!is_array($tables)) {
			$tables = array($tables);
		}

		$dumpData = array();

		// load map classes
		array_walk($tables, array($this, 'loadMapBuilder'));

		$tables = $this->fixOrderingOfForeignKeyData($tables);
		foreach ($tables as $tableName) {
			$tableMap = $this->maps[$tableName]->getDatabaseMap()->getTable(constant($tableName . 'Peer::TABLE_NAME'));
			$hasParent = false;
			$haveParents = false;
			$fixColumn = null;
			foreach ($tableMap->getColumns() as $column) {
				$col = strtolower($column->getColumnName());
				if ($column->isForeignKey()) {
					$relatedTable = $this->maps[$tableName]->getDatabaseMap()->getTable($column->getRelatedTableName());
					if ($tableName === $relatedTable->getPhpName()) {
						if ($hasParent) {
							$haveParents = true;
						}
						else {
							$fixColumn = $column;
							$hasParent = true;
						}
					}
				}
			}

			if ($haveParents) {
				// unable to dump tables having multi-recursive references
				continue;
			}

			// get db info
			$resultsSets = array();
			if ($hasParent) {
				$resultsSets = $this->fixOrderingOfForeignKeyDataInSameTableEx($tableMap, $resultsSets, $tableName, $fixColumn);
			}
			else {
				$resultsSets[] = $this->con->execute('SELECT ' . $this->getTableSelectedFields($tableMap) . ' FROM ' . constant($tableName . 'Peer::TABLE_NAME'));
			}

			foreach ($resultsSets as $rs) {
				if ($rs->getRecordCount() > 0 && !isset($dumpData[$tableName])) {
					$dumpData[$tableName] = array();
				}

				while ($rs->fetch()) {
					$pk = $tableName;
					$values = array();
					$primaryKeys = array();
					$foreignKeys = array();

					foreach ($tableMap->getColumns() as $column) {
						$col = strtolower($column->getColumnName());
						$isPrimaryKey = $column->isPrimaryKey();

						if (is_null($rs->get($col))) {
							continue;
						}

						if ($isPrimaryKey) {
							$value = $rs->get($col);
							$pk .= '_' . $value;
							$primaryKeys[$col] = $value;
						}

						if ($column->isForeignKey()) {
							$relatedTable = $this->maps[$tableName]->getDatabaseMap()->getTable($column->getRelatedTableName());
							if ($isPrimaryKey) {
								$foreignKeys[$col] = $rs->get($col);
								$primaryKeys[$col] = $relatedTable->getPhpName() . '_' . $rs->get($col);
							}
							else {
								$values[$col] = $relatedTable->getPhpName() . '_' . $rs->get($col);
							}
						}
						elseif (!$isPrimaryKey || ( $isPrimaryKey && !$tableMap->isUseIdGenerator())) {
							// We did not want auto incremented primary keys
							$values[$col] = $rs->get($col);
						}
					}

					if (count($primaryKeys) > 1 || ( count($primaryKeys) > 0 && count($foreignKeys) > 0)) {
						$values = array_merge($primaryKeys, $values);
					}

					$dumpData[$tableName][$pk] = $values;
				}
			}
		}

		// save to file(s)
		if ($sameFile) {
			file_put_contents($directory_or_file, Spyc::YAMLDump($dumpData));
		}
		else {
			$i = 0;
			foreach ($tables as $tableName) {
				if (!isset($dumpData[$tableName])) {
					continue;
				}

				file_put_contents(sprintf("%s/%03d-%s.yml", $directory_or_file, ++$i, $tableName), Spyc::YAMLDump(array($tableName => $dumpData[$tableName])));
			}
		}
	}

	protected function fixOrderingOfForeignKeyDataInSameTableEx($tableMap, $resultsSets, $tableName, $column, $in = null) {
		$rs = $this->con->execute(sprintf('SELECT %s FROM %s WHERE %s %s',
					$this->getTableSelectedFields($tableMap),
					constant($tableName . 'Peer::TABLE_NAME'),
					strtolower($column->getNativeType()),
					is_null($in) ? 'IS NULL' : 'IN (' . $in . ')'
			));
		$in = array();
		while ($rs->fetch()) {
			$in[] = "'" . $rs->get(strtolower($column->getRelatedColumnName())) . "'";
		}

		if ($in = implode(', ', $in)) {
			$rs->seek(0);
			$resultsSets[] = $rs;
			$resultsSets = $this->fixOrderingOfForeignKeyDataInSameTableEx($tableMap, $resultsSets, $tableName, $column, $in);
		}

		return $resultsSets;
	}

	protected function getTableSelectedFields($tableMap) {
		$fields = array();
		$columns = $tableMap->getColumns();
		foreach ($columns as $columnMap) {
			switch ($columnMap->getCreoleType()) {
				case CreoleTypes::POINT:
				case CreoleTypes::LINESTRING:
				case CreoleTypes::POLYGON:
				case CreoleTypes::MULTIPOINT:
				case CreoleTypes::MULTILINESTRING:
				case CreoleTypes::MULTIPOLYGON:
				case CreoleTypes::GEOMETRY:
				case CreoleTypes::GEOMETRYCOLLECTION:
					$fields[] = sprintf('asText(%s) as %s', $columnMap->getColumnName(), $columnMap->getColumnName());
					break;
				default :
					$fields[] = $columnMap->getColumnName();
			}
		}

		$sql = implode(", ", $fields);

		// echo $sql;

		return $sql;
	}

}


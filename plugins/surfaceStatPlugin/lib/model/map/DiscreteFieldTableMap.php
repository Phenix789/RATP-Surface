<?php



/**
 * This class defines the structure of the 'stat_discrete_field' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.map
 */
class DiscreteFieldTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceStatPlugin.lib.model.map.DiscreteFieldTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('stat_discrete_field');
        $this->setPhpName('DiscreteField');
        $this->setClassname('DiscreteField');
        $this->setPackage('plugins.surfaceStatPlugin.lib.model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('stat_discrete_field_SEQ');
        $this->setSingleTableInheritance(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('DATASOURCE_ID', 'DatasourceId', 'INTEGER', 'stat_datasource', 'ID', true, null, null);
        $this->addColumn('CODE_FIELD', 'CodeField', 'VARCHAR', true, 255, null);
        $this->addColumn('LABEL_FIELD', 'LabelField', 'VARCHAR', false, 255, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('TYPE', 'Type', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DataSource', 'DataSource', RelationMap::MANY_TO_ONE, array('datasource_id' => 'id', ), null, null);
        $this->addRelation('WorksheetRelatedByFirstParam', 'Worksheet', RelationMap::ONE_TO_MANY, array('id' => 'first_param', ), 'SET NULL', null, 'WorksheetsRelatedByFirstParam');
        $this->addRelation('WorksheetRelatedBySecondParam', 'Worksheet', RelationMap::ONE_TO_MANY, array('id' => 'second_param', ), 'SET NULL', null, 'WorksheetsRelatedBySecondParam');
        $this->addRelation('Filter', 'Filter', RelationMap::ONE_TO_MANY, array('id' => 'discrete_field_id', ), 'CASCADE', null, 'Filters');
    } // buildRelations()

} // DiscreteFieldTableMap

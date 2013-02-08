<?php



/**
 * This class defines the structure of the 'stat_worksheet' table.
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
class WorksheetTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceStatPlugin.lib.model.map.WorksheetTableMap';

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
        $this->setName('stat_worksheet');
        $this->setPhpName('Worksheet');
        $this->setClassname('Worksheet');
        $this->setPackage('plugins.surfaceStatPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('FIRST_PARAM', 'FirstParam', 'INTEGER', 'stat_discrete_field', 'ID', true, null, null);
        $this->addForeignKey('SECOND_PARAM', 'SecondParam', 'INTEGER', 'stat_discrete_field', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DiscreteFieldRelatedByFirstParam', 'DiscreteField', RelationMap::MANY_TO_ONE, array('first_param' => 'id', ), 'SET NULL', null);
        $this->addRelation('DiscreteFieldRelatedBySecondParam', 'DiscreteField', RelationMap::MANY_TO_ONE, array('second_param' => 'id', ), 'SET NULL', null);
        $this->addRelation('Value', 'Value', RelationMap::ONE_TO_MANY, array('id' => 'worksheet_id', ), 'CASCADE', null, 'Values');
        $this->addRelation('Filter', 'Filter', RelationMap::ONE_TO_MANY, array('id' => 'worksheet_id', ), 'CASCADE', null, 'Filters');
        $this->addRelation('View', 'View', RelationMap::ONE_TO_MANY, array('id' => 'worksheet_id', ), 'CASCADE', null, 'Views');
    } // buildRelations()

} // WorksheetTableMap

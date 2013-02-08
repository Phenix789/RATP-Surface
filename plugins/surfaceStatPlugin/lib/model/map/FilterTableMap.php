<?php



/**
 * This class defines the structure of the 'stat_filter' table.
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
class FilterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceStatPlugin.lib.model.map.FilterTableMap';

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
        $this->setName('stat_filter');
        $this->setPhpName('Filter');
        $this->setClassname('Filter');
        $this->setPackage('plugins.surfaceStatPlugin.lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('WORKSHEET_ID', 'WorksheetId', 'INTEGER' , 'stat_worksheet', 'ID', true, null, null);
        $this->addForeignPrimaryKey('DISCRETE_FIELD_ID', 'DiscreteFieldId', 'INTEGER' , 'stat_discrete_field', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Worksheet', 'Worksheet', RelationMap::MANY_TO_ONE, array('worksheet_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('DiscreteField', 'DiscreteField', RelationMap::MANY_TO_ONE, array('discrete_field_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // FilterTableMap

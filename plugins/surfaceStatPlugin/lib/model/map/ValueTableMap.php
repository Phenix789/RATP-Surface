<?php



/**
 * This class defines the structure of the 'stat_value' table.
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
class ValueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceStatPlugin.lib.model.map.ValueTableMap';

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
        $this->setName('stat_value');
        $this->setPhpName('Value');
        $this->setClassname('Value');
        $this->setPackage('plugins.surfaceStatPlugin.lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('WORKSHEET_ID', 'WorksheetId', 'INTEGER' , 'stat_worksheet', 'ID', true, null, null);
        $this->addForeignPrimaryKey('CONTINUE_FIELD_ID', 'ContinueFieldId', 'INTEGER' , 'stat_continue_field', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Worksheet', 'Worksheet', RelationMap::MANY_TO_ONE, array('worksheet_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('ContinueField', 'ContinueField', RelationMap::MANY_TO_ONE, array('continue_field_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // ValueTableMap

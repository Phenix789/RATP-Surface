<?php



/**
 * This class defines the structure of the 'plugin_options_behavior' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfPropelOptionsBehaviorPlugin.lib.model.map
 */
class OptionsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfPropelOptionsBehaviorPlugin.lib.model.map.OptionsTableMap';

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
        $this->setName('plugin_options_behavior');
        $this->setPhpName('Options');
        $this->setClassname('Options');
        $this->setPackage('plugins.sfPropelOptionsBehaviorPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('MODEL_NAME', 'ModelName', 'VARCHAR', false, 255, null);
        $this->addColumn('MODEL_ID', 'ModelId', 'INTEGER', false, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('VALUE', 'Value', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // OptionsTableMap

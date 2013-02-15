<?php



/**
 * This class defines the structure of the 'sf_guard_filtering_ip' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardFilteringIpTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardFilteringIpTableMap';

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
        $this->setName('sf_guard_filtering_ip');
        $this->setPhpName('sfGuardFilteringIp');
        $this->setClassname('sfGuardFilteringIp');
        $this->setPackage('plugins.sfGuardPlugin.lib.model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('sf_guard_filtering_ip_SEQ');
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('IP', 'Ip', 'VARCHAR', false, 100, null);
        $this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, null, null);
        $this->addColumn('OBJECT_NAME', 'ObjectName', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // sfGuardFilteringIpTableMap

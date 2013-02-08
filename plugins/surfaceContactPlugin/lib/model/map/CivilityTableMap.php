<?php



/**
 * This class defines the structure of the 'sfc_abk_civility' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.map
 */
class CivilityTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceContactPlugin.lib.model.map.CivilityTableMap';

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
        $this->setName('sfc_abk_civility');
        $this->setPhpName('Civility');
        $this->setClassname('Civility');
        $this->setPackage('plugins.surfaceContactPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('SHORT_NAME', 'ShortName', 'VARCHAR', false, 255, null);
        $this->addColumn('LONG_NAME', 'LongName', 'VARCHAR', false, 255, null);
        $this->addColumn('GENRE', 'Genre', 'INTEGER', false, null, null);
        $this->addColumn('NAME_SPACE', 'NameSpace', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Contact', 'Contact', RelationMap::ONE_TO_MANY, array('id' => 'civility_id', ), 'SET NULL', null, 'Contacts');
    } // buildRelations()

} // CivilityTableMap

<?php



/**
 * This class defines the structure of the 'stat_view' table.
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
class ViewTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceStatPlugin.lib.model.map.ViewTableMap';

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
        $this->setName('stat_view');
        $this->setPhpName('View');
        $this->setClassname('View');
        $this->setPackage('plugins.surfaceStatPlugin.lib.model');
        $this->setUseIdGenerator(true);
        $this->setSingleTableInheritance(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('WORKSHEET_ID', 'WorksheetId', 'INTEGER', 'stat_worksheet', 'ID', false, null, null);
        $this->addForeignKey('MODEL_VIEW_ID', 'ModelViewId', 'INTEGER', 'stat_view', 'ID', false, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('NAME_SPACE', 'NameSpace', 'VARCHAR', false, 255, null);
        $this->addColumn('TYPE', 'Type', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Worksheet', 'Worksheet', RelationMap::MANY_TO_ONE, array('worksheet_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('ViewRelatedByModelViewId', 'View', RelationMap::MANY_TO_ONE, array('model_view_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('ViewRelatedById', 'View', RelationMap::ONE_TO_MANY, array('id' => 'model_view_id', ), 'SET NULL', null, 'ViewsRelatedById');
    } // buildRelations()

} // ViewTableMap

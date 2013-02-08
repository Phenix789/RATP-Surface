<?php



/**
 * This class defines the structure of the 'plugin_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.surfaceHistoryBehaviorPlugin.lib.model.map
 */
class HistoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceHistoryBehaviorPlugin.lib.model.map.HistoryTableMap';

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
        $this->setName('plugin_history');
        $this->setPhpName('History');
        $this->setClassname('History');
        $this->setPackage('plugins.surfaceHistoryBehaviorPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('DATE_REF', 'DateRef', 'TIMESTAMP', false, null, null);
        $this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, null, null);
        $this->addColumn('OBJECT_NAME', 'ObjectName', 'VARCHAR', false, 255, null);
        $this->addColumn('TYPE', 'Type', 'VARCHAR', false, 255, null);
        $this->addColumn('NAME_SPACE', 'NameSpace', 'VARCHAR', false, 255, null);
        $this->addColumn('GROUP_ID', 'GroupId', 'INTEGER', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), null, null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), null, null);
        $this->addRelation('HistoryContact', 'HistoryContact', RelationMap::ONE_TO_MANY, array('id' => 'history_id', ), null, null, 'HistoryContacts');
    } // buildRelations()

} // HistoryTableMap

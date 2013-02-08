<?php



/**
 * This class defines the structure of the 'sfc_plugin_alert' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfSurfaceAlertPlugin.lib.model.map
 */
class AlertTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfSurfaceAlertPlugin.lib.model.map.AlertTableMap';

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
        $this->setName('sfc_plugin_alert');
        $this->setPhpName('Alert');
        $this->setClassname('Alert');
        $this->setPackage('plugins.sfSurfaceAlertPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('RECIPIENT_ID', 'RecipientId', 'INTEGER', 'collaborator', 'ID', false, null, null);
        $this->addColumn('TRIGGER_AT', 'TriggerAt', 'DATE', false, null, null);
        $this->addColumn('MESSAGE', 'Message', 'LONGVARCHAR', false, null, null);
        $this->addColumn('MODEL_ID', 'ModelId', 'INTEGER', false, null, null);
        $this->addColumn('MODEL_CLASS', 'ModelClass', 'VARCHAR', false, 45, null);
        $this->addColumn('SENT', 'Sent', 'TIMESTAMP', false, null, null);
        $this->addColumn('ACQUITTED_AT', 'AcquittedAt', 'DATE', false, null, null);
        $this->addForeignKey('ACQUITTED_BY', 'AcquittedBy', 'INTEGER', 'collaborator', 'ID', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        $this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CollaboratorRelatedByAcquittedBy', 'Collaborator', RelationMap::MANY_TO_ONE, array('acquitted_by' => 'id', ), null, null);
        $this->addRelation('CollaboratorRelatedByRecipientId', 'Collaborator', RelationMap::MANY_TO_ONE, array('recipient_id' => 'id', ), null, null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), null, null);
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), null, null);
    } // buildRelations()

} // AlertTableMap

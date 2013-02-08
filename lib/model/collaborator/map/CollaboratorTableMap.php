<?php



/**
 * This class defines the structure of the 'collaborator' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.collaborator.map
 */
class CollaboratorTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.collaborator.map.CollaboratorTableMap';

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
        $this->setName('collaborator');
        $this->setPhpName('Collaborator');
        $this->setClassname('Collaborator');
        $this->setPackage('lib.model.collaborator');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, 1, true);
        $this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 60, null);
        $this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 60, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('SIGNATURE', 'Signature', 'VARCHAR', false, 255, null);
        $this->addColumn('JOB_ROLE', 'JobRole', 'VARCHAR', false, 128, null);
        $this->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255, null);
        $this->addColumn('CITY', 'City', 'VARCHAR', false, 60, null);
        $this->addColumn('POSTAL_CODE', 'PostalCode', 'VARCHAR', false, 20, null);
        $this->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 60, null);
        $this->addColumn('PHONE_NUMBER', 'PhoneNumber', 'VARCHAR', false, 20, null);
        $this->addColumn('MOBILE_NUMBER', 'MobileNumber', 'VARCHAR', false, 20, null);
        $this->addColumn('FAX_NUMBER', 'FaxNumber', 'VARCHAR', false, 20, null);
        $this->addColumn('COMMENT', 'Comment', 'VARCHAR', false, 255, null);
        $this->addColumn('CONFIDENTIAL', 'Confidential', 'VARCHAR', false, 255, null);
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
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserProfile', 'sfGuardUserProfile', RelationMap::ONE_TO_MANY, array('id' => 'collaborator_id', ), 'CASCADE', null, 'sfGuardUserProfiles');
        $this->addRelation('AlertRelatedByAcquittedBy', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'acquitted_by', ), null, null, 'AlertsRelatedByAcquittedBy');
        $this->addRelation('AlertRelatedByRecipientId', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'recipient_id', ), null, null, 'AlertsRelatedByRecipientId');
        $this->addRelation('SfcComment', 'SfcComment', RelationMap::ONE_TO_MANY, array('id' => 'collaborator_id', ), 'SET NULL', null, 'SfcComments');
    } // buildRelations()

} // CollaboratorTableMap

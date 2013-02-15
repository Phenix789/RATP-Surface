<?php



/**
 * This class defines the structure of the 'sfc_abk_contact' table.
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
class ContactTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceContactPlugin.lib.model.map.ContactTableMap';

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
        $this->setName('sfc_abk_contact');
        $this->setPhpName('Contact');
        $this->setClassname('Contact');
        $this->setPackage('plugins.surfaceContactPlugin.lib.model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('sfc_abk_contact_SEQ');
        $this->setSingleTableInheritance(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PARENT_ID', 'ParentId', 'INTEGER', 'sfc_abk_contact', 'ID', false, null, null);
        $this->addForeignKey('CIVILITY_ID', 'CivilityId', 'INTEGER', 'sfc_abk_civility', 'ID', false, null, null);
        $this->addForeignKey('SERVICE_ID', 'ServiceId', 'INTEGER', 'sfc_abk_service', 'ID', false, null, null);
        $this->addColumn('ROLE', 'Role', 'VARCHAR', false, 255, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 255, null);
        $this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 255, null);
        $this->addColumn('MAIDEN_NAME', 'MaidenName', 'VARCHAR', false, 255, null);
        $this->addColumn('COMPLEMENT_NAME', 'ComplementName', 'VARCHAR', false, 255, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('SHORT_NAME', 'ShortName', 'VARCHAR', false, 255, null);
        $this->addColumn('ZONE_ID', 'ZoneId', 'INTEGER', false, null, null);
        $this->addColumn('ADDRESS1', 'Address1', 'VARCHAR', false, 255, null);
        $this->addColumn('ADDRESS2', 'Address2', 'VARCHAR', false, 255, null);
        $this->addColumn('CITY', 'City', 'VARCHAR', false, 255, null);
        $this->addColumn('POSTAL_CODE', 'PostalCode', 'VARCHAR', false, 255, null);
        $this->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 255, null);
        $this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('FAX', 'Fax', 'VARCHAR', false, 255, null);
        $this->addColumn('MOBILE', 'Mobile', 'VARCHAR', false, 255, null);
        $this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('WEB', 'Web', 'VARCHAR', false, 255, null);
        $this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, 2000, null);
        $this->addColumn('HIDDEN_COMMENT', 'HiddenComment', 'LONGVARCHAR', false, 2000, null);
        $this->addColumn('BIRTH_DATE', 'BirthDate', 'DATE', false, null, null);
        $this->addColumn('BIRTH_PLACE', 'BirthPlace', 'VARCHAR', false, 255, null);
        $this->addColumn('BIRTH_PLACE_CODE', 'BirthPlaceCode', 'VARCHAR', false, 255, null);
        $this->addColumn('IS_ARCHIVE', 'IsArchive', 'BOOLEAN_EMU', false, 1, '0');
        $this->addColumn('ARCHIVE_DATE', 'ArchiveDate', 'DATE', false, null, null);
        $this->addColumn('ARCHIVE_COMMENT', 'ArchiveComment', 'LONGVARCHAR', false, 2000, null);
        $this->addColumn('SECU_NUMBER', 'SecuNumber', 'VARCHAR', false, 255, null);
        $this->addColumn('SIRET', 'Siret', 'VARCHAR', false, 255, null);
        $this->addColumn('SIREN', 'Siren', 'VARCHAR', false, 255, null);
        $this->addColumn('NAF_CODE', 'NafCode', 'VARCHAR', false, 255, null);
        $this->addColumn('APE_CODE', 'ApeCode', 'VARCHAR', false, 255, null);
        $this->addColumn('TYPE', 'Type', 'INTEGER', true, null, null);
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
        $this->addRelation('ContactRelatedByParentId', 'Contact', RelationMap::MANY_TO_ONE, array('parent_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Civility', 'Civility', RelationMap::MANY_TO_ONE, array('civility_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('Service', 'Service', RelationMap::MANY_TO_ONE, array('service_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('ContactRelatedById', 'Contact', RelationMap::ONE_TO_MANY, array('id' => 'parent_id', ), 'SET NULL', null, 'ContactsRelatedById');
        $this->addRelation('ContactMultipleRelatedByContactId', 'ContactMultiple', RelationMap::ONE_TO_MANY, array('id' => 'contact_id', ), 'CASCADE', null, 'ContactMultiplesRelatedByContactId');
        $this->addRelation('ContactMultipleRelatedByParentId', 'ContactMultiple', RelationMap::ONE_TO_MANY, array('id' => 'parent_id', ), 'CASCADE', null, 'ContactMultiplesRelatedByParentId');
        $this->addRelation('ContactGroup', 'ContactGroup', RelationMap::ONE_TO_MANY, array('id' => 'contact_id', ), 'CASCADE', null, 'ContactGroups');
        $this->addRelation('MaillingListContact', 'MaillingListContact', RelationMap::ONE_TO_MANY, array('id' => 'contact_id', ), 'CASCADE', null, 'MaillingListContacts');
    } // buildRelations()

} // ContactTableMap

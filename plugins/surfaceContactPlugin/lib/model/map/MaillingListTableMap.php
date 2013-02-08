<?php



/**
 * This class defines the structure of the 'sfc_abk_mailling_list' table.
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
class MaillingListTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceContactPlugin.lib.model.map.MaillingListTableMap';

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
        $this->setName('sfc_abk_mailling_list');
        $this->setPhpName('MaillingList');
        $this->setClassname('MaillingList');
        $this->setPackage('plugins.surfaceContactPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('IS_PRIVATE', 'IsPrivate', 'BOOLEAN', false, 1, false);
        $this->addColumn('ARCHIVE', 'Archive', 'BOOLEAN', false, 1, false);
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
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('MaillingListContact', 'MaillingListContact', RelationMap::ONE_TO_MANY, array('id' => 'mailling_list_id', ), 'CASCADE', null, 'MaillingListContacts');
    } // buildRelations()

} // MaillingListTableMap

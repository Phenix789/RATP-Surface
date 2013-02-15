<?php



/**
 * This class defines the structure of the 'sfc_social_comment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.surfaceSocialPlugin.lib.model.map
 */
class SfcCommentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceSocialPlugin.lib.model.map.SfcCommentTableMap';

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
        $this->setName('sfc_social_comment');
        $this->setPhpName('SfcComment');
        $this->setClassname('SfcComment');
        $this->setPackage('plugins.surfaceSocialPlugin.lib.model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('sfc_social_comment_SEQ');
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('OBJECT_NAME', 'ObjectName', 'VARCHAR', false, 100, null);
        $this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, null, null);
        $this->addColumn('CATEGORY', 'Category', 'VARCHAR', false, 100, null);
        $this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, 2000, null);
        $this->addColumn('DATE_REF', 'DateRef', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('COLLABORATOR_ID', 'CollaboratorId', 'INTEGER', 'collaborator', 'ID', false, null, null);
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
        $this->addRelation('Collaborator', 'Collaborator', RelationMap::MANY_TO_ONE, array('collaborator_id' => 'id', ), 'SET NULL', null);
    } // buildRelations()

} // SfcCommentTableMap

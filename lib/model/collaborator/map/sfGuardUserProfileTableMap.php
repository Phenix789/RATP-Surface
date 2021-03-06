<?php



/**
 * This class defines the structure of the 'sf_guard_user_profile' table.
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
class sfGuardUserProfileTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.collaborator.map.sfGuardUserProfileTableMap';

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
        $this->setName('sf_guard_user_profile');
        $this->setPhpName('sfGuardUserProfile');
        $this->setClassname('sfGuardUserProfile');
        $this->setPackage('lib.model.collaborator');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('sf_guard_user_profile_SEQ');
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
        $this->addForeignKey('COLLABORATOR_ID', 'CollaboratorId', 'INTEGER', 'collaborator', 'ID', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Collaborator', 'Collaborator', RelationMap::MANY_TO_ONE, array('collaborator_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // sfGuardUserProfileTableMap

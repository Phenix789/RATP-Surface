<?php



/**
 * This class defines the structure of the 'ratp_client_subscription' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.schema.map
 */
class ClientSubscriptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.schema.map.ClientSubscriptionTableMap';

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
        $this->setName('ratp_client_subscription');
        $this->setPhpName('ClientSubscription');
        $this->setClassname('ClientSubscription');
        $this->setPackage('lib.model.schema');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('ratp_client_subscription_SEQ');
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CLIENT_ID', 'ClientId', 'INTEGER', 'ratp_client', 'ID', false, null, null);
        $this->addForeignKey('SUBSCRIPTION_ID', 'SubscriptionId', 'INTEGER', 'ratp_subscription', 'ID', false, null, null);
        $this->addColumn('BEGIN_DATE', 'BeginDate', 'TIMESTAMP', false, null, null);
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
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('client_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('Subscription', 'Subscription', RelationMap::MANY_TO_ONE, array('subscription_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
    } // buildRelations()

} // ClientSubscriptionTableMap

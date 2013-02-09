<?php



/**
 * This class defines the structure of the 'sf_guard_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardUserTableMap';

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
        $this->setName('sf_guard_user');
        $this->setPhpName('sfGuardUser');
        $this->setClassname('sfGuardUser');
        $this->setPackage('plugins.sfGuardPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 128, null);
        $this->addColumn('ALGORITHM', 'Algorithm', 'VARCHAR', true, 128, 'sha1');
        $this->addColumn('SALT', 'Salt', 'VARCHAR', true, 128, null);
        $this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 128, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', true, 1, true);
        $this->addColumn('IS_SUPER_ADMIN', 'IsSuperAdmin', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_SUDOER', 'IsSudoer', 'BOOLEAN', false, 1, false);
        $this->addColumn('TIME_SUDOER', 'TimeSudoer', 'INTEGER', false, null, 60);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CollaboratorRelatedByCreatedBy', 'Collaborator', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'CollaboratorsRelatedByCreatedBy');
        $this->addRelation('CollaboratorRelatedByUpdatedBy', 'Collaborator', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'CollaboratorsRelatedByUpdatedBy');
        $this->addRelation('sfGuardUserProfile', 'sfGuardUserProfile', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardUserProfiles');
        $this->addRelation('DashboardMessageRelatedByCreatedBy', 'DashboardMessage', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'DashboardMessagesRelatedByCreatedBy');
        $this->addRelation('DashboardMessageRelatedByUpdatedBy', 'DashboardMessage', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'DashboardMessagesRelatedByUpdatedBy');
        $this->addRelation('StationRelatedByCreatedBy', 'Station', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'StationsRelatedByCreatedBy');
        $this->addRelation('StationRelatedByUpdatedBy', 'Station', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'StationsRelatedByUpdatedBy');
        $this->addRelation('TransportTypeRelatedByCreatedBy', 'TransportType', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'TransportTypesRelatedByCreatedBy');
        $this->addRelation('TransportTypeRelatedByUpdatedBy', 'TransportType', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'TransportTypesRelatedByUpdatedBy');
        $this->addRelation('SubscriptionRelatedByCreatedBy', 'Subscription', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'SubscriptionsRelatedByCreatedBy');
        $this->addRelation('SubscriptionRelatedByUpdatedBy', 'Subscription', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'SubscriptionsRelatedByUpdatedBy');
        $this->addRelation('ClientRelatedByCreatedBy', 'Client', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'ClientsRelatedByCreatedBy');
        $this->addRelation('ClientRelatedByUpdatedBy', 'Client', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'ClientsRelatedByUpdatedBy');
        $this->addRelation('ClientSubscriptionRelatedByCreatedBy', 'ClientSubscription', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'ClientSubscriptionsRelatedByCreatedBy');
        $this->addRelation('ClientSubscriptionRelatedByUpdatedBy', 'ClientSubscription', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'ClientSubscriptionsRelatedByUpdatedBy');
        $this->addRelation('TravelRelatedByCreatedBy', 'Travel', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'TravelsRelatedByCreatedBy');
        $this->addRelation('TravelRelatedByUpdatedBy', 'Travel', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'TravelsRelatedByUpdatedBy');
        $this->addRelation('ContactRelatedByCreatedBy', 'Contact', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'ContactsRelatedByCreatedBy');
        $this->addRelation('ContactRelatedByUpdatedBy', 'Contact', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'ContactsRelatedByUpdatedBy');
        $this->addRelation('MaillingListRelatedByCreatedBy', 'MaillingList', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'MaillingListsRelatedByCreatedBy');
        $this->addRelation('MaillingListRelatedByUpdatedBy', 'MaillingList', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'MaillingListsRelatedByUpdatedBy');
        $this->addRelation('CartRelatedByUserId', 'Cart', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'CartsRelatedByUserId');
        $this->addRelation('CartRelatedByCreatedBy', 'Cart', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'CartsRelatedByCreatedBy');
        $this->addRelation('CartRelatedByUpdatedBy', 'Cart', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'CartsRelatedByUpdatedBy');
        $this->addRelation('CartItemRelatedByCreatedBy', 'CartItem', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'CartItemsRelatedByCreatedBy');
        $this->addRelation('CartItemRelatedByUpdatedBy', 'CartItem', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'CartItemsRelatedByUpdatedBy');
        $this->addRelation('sfGuardUserPermission', 'sfGuardUserPermission', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardUserPermissions');
        $this->addRelation('sfGuardUserGroup', 'sfGuardUserGroup', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardUserGroups');
        $this->addRelation('sfGuardRememberKey', 'sfGuardRememberKey', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardRememberKeys');
        $this->addRelation('Analytic', 'Analytic', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'Analytics');
        $this->addRelation('HistoryRelatedByCreatedBy', 'History', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'HistorysRelatedByCreatedBy');
        $this->addRelation('HistoryRelatedByUpdatedBy', 'History', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'HistorysRelatedByUpdatedBy');
        $this->addRelation('sfcSettingRelatedByCreatedBy', 'sfcSetting', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'sfcSettingsRelatedByCreatedBy');
        $this->addRelation('sfcSettingRelatedByUpdatedBy', 'sfcSetting', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'sfcSettingsRelatedByUpdatedBy');
        $this->addRelation('AlertRelatedByUpdatedBy', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'AlertsRelatedByUpdatedBy');
        $this->addRelation('AlertRelatedByCreatedBy', 'Alert', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'AlertsRelatedByCreatedBy');
        $this->addRelation('SfcCommentRelatedByCreatedBy', 'SfcComment', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), 'SET NULL', null, 'SfcCommentsRelatedByCreatedBy');
        $this->addRelation('SfcCommentRelatedByUpdatedBy', 'SfcComment', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), 'SET NULL', null, 'SfcCommentsRelatedByUpdatedBy');
    } // buildRelations()

} // sfGuardUserTableMap

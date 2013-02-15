<?php



/**
 * This class defines the structure of the 'ratp_travel' table.
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
class TravelTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.schema.map.TravelTableMap';

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
        $this->setName('ratp_travel');
        $this->setPhpName('Travel');
        $this->setClassname('Travel');
        $this->setPackage('lib.model.schema');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('ratp_travel_SEQ');
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CLIENT_ID', 'ClientId', 'INTEGER', 'ratp_client', 'ID', false, null, null);
        $this->addForeignKey('STATION_IN_ID', 'StationInId', 'INTEGER', 'ratp_station', 'ID', false, null, null);
        $this->addForeignKey('STATION_OUT_ID', 'StationOutId', 'INTEGER', 'ratp_station', 'ID', false, null, null);
        $this->addColumn('DATE_IN', 'DateIn', 'TIMESTAMP', false, null, null);
        $this->addColumn('DATE_OUT', 'DateOut', 'TIMESTAMP', false, null, null);
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
        $this->addRelation('StationRelatedByStationInId', 'Station', RelationMap::MANY_TO_ONE, array('station_in_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('StationRelatedByStationOutId', 'Station', RelationMap::MANY_TO_ONE, array('station_out_id' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
    } // buildRelations()

} // TravelTableMap

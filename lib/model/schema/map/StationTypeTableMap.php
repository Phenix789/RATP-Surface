<?php



/**
 * This class defines the structure of the 'ratp_station_type' table.
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
class StationTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.schema.map.StationTypeTableMap';

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
        $this->setName('ratp_station_type');
        $this->setPhpName('StationType');
        $this->setClassname('StationType');
        $this->setPackage('lib.model.schema');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('STATION_ID', 'StationId', 'INTEGER' , 'ratp_station', 'ID', true, null, null);
        $this->addForeignPrimaryKey('TYPE_ID', 'TypeId', 'INTEGER' , 'ratp_transport_type', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Station', 'Station', RelationMap::MANY_TO_ONE, array('station_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('TransportType', 'TransportType', RelationMap::MANY_TO_ONE, array('type_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // StationTypeTableMap

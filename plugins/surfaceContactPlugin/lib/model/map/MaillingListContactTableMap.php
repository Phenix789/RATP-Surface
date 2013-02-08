<?php



/**
 * This class defines the structure of the 'sfc_abk_mailling_list_contact' table.
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
class MaillingListContactTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceContactPlugin.lib.model.map.MaillingListContactTableMap';

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
        $this->setName('sfc_abk_mailling_list_contact');
        $this->setPhpName('MaillingListContact');
        $this->setClassname('MaillingListContact');
        $this->setPackage('plugins.surfaceContactPlugin.lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('CONTACT_ID', 'ContactId', 'INTEGER' , 'sfc_abk_contact', 'ID', true, null, null);
        $this->addForeignPrimaryKey('MAILLING_LIST_ID', 'MaillingListId', 'INTEGER' , 'sfc_abk_mailling_list', 'ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Contact', 'Contact', RelationMap::MANY_TO_ONE, array('contact_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('MaillingList', 'MaillingList', RelationMap::MANY_TO_ONE, array('mailling_list_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // MaillingListContactTableMap

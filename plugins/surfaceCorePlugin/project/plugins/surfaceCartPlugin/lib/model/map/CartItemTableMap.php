<?php



/**
 * This class defines the structure of the 'plugin_cart_item' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.surfaceCartPlugin.lib.model.map
 */
class CartItemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceCartPlugin.lib.model.map.CartItemTableMap';

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
        $this->setName('plugin_cart_item');
        $this->setPhpName('CartItem');
        $this->setClassname('CartItem');
        $this->setPackage('plugins.surfaceCartPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('CART_ID', 'CartId', 'INTEGER', 'plugin_cart', 'ID', false, null, null);
        $this->addColumn('OBJECT_ID', 'ObjectId', 'INTEGER', false, null, null);
        $this->addColumn('OBJECT_NAME', 'ObjectName', 'VARCHAR', false, 255, null);
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
        $this->addRelation('Cart', 'Cart', RelationMap::MANY_TO_ONE, array('cart_id' => 'id', ), null, null);
        $this->addRelation('sfGuardUserRelatedByCreatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), null, null);
        $this->addRelation('sfGuardUserRelatedByUpdatedBy', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), null, null);
    } // buildRelations()

} // CartItemTableMap

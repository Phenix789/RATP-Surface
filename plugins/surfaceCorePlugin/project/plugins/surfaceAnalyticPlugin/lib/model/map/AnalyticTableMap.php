<?php



/**
 * This class defines the structure of the 'sfc_plugin_analytic' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.surfaceAnalyticPlugin.lib.model.map
 */
class AnalyticTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.surfaceAnalyticPlugin.lib.model.map.AnalyticTableMap';

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
        $this->setName('sfc_plugin_analytic');
        $this->setPhpName('Analytic');
        $this->setClassname('Analytic');
        $this->setPackage('plugins.surfaceAnalyticPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('USERNAME', 'Username', 'VARCHAR', false, 255, null);
        $this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        $this->addColumn('CONNECTION', 'Connection', 'INTEGER', false, null, null);
        $this->addColumn('IP', 'Ip', 'VARCHAR', false, 255, null);
        $this->addColumn('USER_AGENT', 'UserAgent', 'VARCHAR', false, 255, null);
        $this->addColumn('SCREEN_WIDTH', 'ScreenWidth', 'INTEGER', false, null, null);
        $this->addColumn('SCREEN_HEIGHT', 'ScreenHeight', 'INTEGER', false, null, null);
        $this->addColumn('SCREEN_INNER_WIDTH', 'ScreenInnerWidth', 'INTEGER', false, null, null);
        $this->addColumn('SCREEN_INNER_HEIGHT', 'ScreenInnerHeight', 'INTEGER', false, null, null);
        $this->addColumn('COOKIE_ENABLED', 'CookieEnabled', 'BOOLEAN', false, 1, null);
        $this->addColumn('LANGUAGE', 'Language', 'VARCHAR', false, 255, null);
        $this->addColumn('PLATFORM', 'Platform', 'VARCHAR', false, 255, null);
        $this->addColumn('PRODUCT', 'Product', 'VARCHAR', false, 255, null);
        $this->addColumn('PRODUCT_SUB', 'ProductSub', 'VARCHAR', false, 255, null);
        $this->addColumn('VENDOR', 'Vendor', 'VARCHAR', false, 255, null);
        $this->addColumn('VENDOR_SUB', 'VendorSub', 'VARCHAR', false, 255, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), null, null);
    } // buildRelations()

} // AnalyticTableMap

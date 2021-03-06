<?php



/**
 * This class defines the structure of the 'file_associated' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfPropelFileAssocPlugin.lib.model.map
 */
class FileAssociatedTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfPropelFileAssocPlugin.lib.model.map.FileAssociatedTableMap';

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
        $this->setName('file_associated');
        $this->setPhpName('FileAssociated');
        $this->setClassname('FileAssociated');
        $this->setPackage('plugins.sfPropelFileAssocPlugin.lib.model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('file_associated_SEQ');
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('CLASS_NAME', 'ClassName', 'VARCHAR', false, 100, null);
        $this->addColumn('CATEGORY', 'Category', 'VARCHAR', false, 100, null);
        $this->addColumn('FIELD_ID', 'FieldId', 'INTEGER', false, null, null);
        $this->addColumn('FILEPATH', 'Filepath', 'VARCHAR', false, 255, null);
        $this->addColumn('FILENAME', 'Filename', 'VARCHAR', false, 255, null);
        $this->addColumn('ORGINAL_FILENAME', 'OrginalFilename', 'VARCHAR', false, 255, null);
        $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 60, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // FileAssociatedTableMap

<?php


/**
 * Base static class for performing query and update operations on the 'sfc_abk_contact' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseContactPeer {

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'sfc_abk_contact';

    /** the related Propel class for this table */
    const OM_CLASS = 'Contact';

    /** the related TableMap class for this table */
    const TM_CLASS = 'ContactTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 41;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 41;

    /** the column name for the ID field */
    const ID = 'sfc_abk_contact.ID';

    /** the column name for the PARENT_ID field */
    const PARENT_ID = 'sfc_abk_contact.PARENT_ID';

    /** the column name for the CIVILITY_ID field */
    const CIVILITY_ID = 'sfc_abk_contact.CIVILITY_ID';

    /** the column name for the SERVICE_ID field */
    const SERVICE_ID = 'sfc_abk_contact.SERVICE_ID';

    /** the column name for the ROLE field */
    const ROLE = 'sfc_abk_contact.ROLE';

    /** the column name for the TITLE field */
    const TITLE = 'sfc_abk_contact.TITLE';

    /** the column name for the FIRST_NAME field */
    const FIRST_NAME = 'sfc_abk_contact.FIRST_NAME';

    /** the column name for the LAST_NAME field */
    const LAST_NAME = 'sfc_abk_contact.LAST_NAME';

    /** the column name for the MAIDEN_NAME field */
    const MAIDEN_NAME = 'sfc_abk_contact.MAIDEN_NAME';

    /** the column name for the COMPLEMENT_NAME field */
    const COMPLEMENT_NAME = 'sfc_abk_contact.COMPLEMENT_NAME';

    /** the column name for the NAME field */
    const NAME = 'sfc_abk_contact.NAME';

    /** the column name for the SHORT_NAME field */
    const SHORT_NAME = 'sfc_abk_contact.SHORT_NAME';

    /** the column name for the ZONE_ID field */
    const ZONE_ID = 'sfc_abk_contact.ZONE_ID';

    /** the column name for the ADDRESS1 field */
    const ADDRESS1 = 'sfc_abk_contact.ADDRESS1';

    /** the column name for the ADDRESS2 field */
    const ADDRESS2 = 'sfc_abk_contact.ADDRESS2';

    /** the column name for the CITY field */
    const CITY = 'sfc_abk_contact.CITY';

    /** the column name for the POSTAL_CODE field */
    const POSTAL_CODE = 'sfc_abk_contact.POSTAL_CODE';

    /** the column name for the COUNTRY field */
    const COUNTRY = 'sfc_abk_contact.COUNTRY';

    /** the column name for the PHONE field */
    const PHONE = 'sfc_abk_contact.PHONE';

    /** the column name for the FAX field */
    const FAX = 'sfc_abk_contact.FAX';

    /** the column name for the MOBILE field */
    const MOBILE = 'sfc_abk_contact.MOBILE';

    /** the column name for the EMAIL field */
    const EMAIL = 'sfc_abk_contact.EMAIL';

    /** the column name for the WEB field */
    const WEB = 'sfc_abk_contact.WEB';

    /** the column name for the COMMENT field */
    const COMMENT = 'sfc_abk_contact.COMMENT';

    /** the column name for the HIDDEN_COMMENT field */
    const HIDDEN_COMMENT = 'sfc_abk_contact.HIDDEN_COMMENT';

    /** the column name for the BIRTH_DATE field */
    const BIRTH_DATE = 'sfc_abk_contact.BIRTH_DATE';

    /** the column name for the BIRTH_PLACE field */
    const BIRTH_PLACE = 'sfc_abk_contact.BIRTH_PLACE';

    /** the column name for the BIRTH_PLACE_CODE field */
    const BIRTH_PLACE_CODE = 'sfc_abk_contact.BIRTH_PLACE_CODE';

    /** the column name for the IS_ARCHIVE field */
    const IS_ARCHIVE = 'sfc_abk_contact.IS_ARCHIVE';

    /** the column name for the ARCHIVE_DATE field */
    const ARCHIVE_DATE = 'sfc_abk_contact.ARCHIVE_DATE';

    /** the column name for the ARCHIVE_COMMENT field */
    const ARCHIVE_COMMENT = 'sfc_abk_contact.ARCHIVE_COMMENT';

    /** the column name for the SECU_NUMBER field */
    const SECU_NUMBER = 'sfc_abk_contact.SECU_NUMBER';

    /** the column name for the SIRET field */
    const SIRET = 'sfc_abk_contact.SIRET';

    /** the column name for the SIREN field */
    const SIREN = 'sfc_abk_contact.SIREN';

    /** the column name for the NAF_CODE field */
    const NAF_CODE = 'sfc_abk_contact.NAF_CODE';

    /** the column name for the APE_CODE field */
    const APE_CODE = 'sfc_abk_contact.APE_CODE';

    /** the column name for the TYPE field */
    const TYPE = 'sfc_abk_contact.TYPE';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'sfc_abk_contact.CREATED_AT';

    /** the column name for the CREATED_BY field */
    const CREATED_BY = 'sfc_abk_contact.CREATED_BY';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'sfc_abk_contact.UPDATED_AT';

    /** the column name for the UPDATED_BY field */
    const UPDATED_BY = 'sfc_abk_contact.UPDATED_BY';

    /** A key representing a particular subclass */
    const CLASSKEY_0 = '0';

    /** A key representing a particular subclass */
    const CLASSKEY_PHYSICALPERSON = '0';

    /** A class that can be returned by this peer. */
    const CLASSNAME_0 = 'PhysicalPerson';

    /** A key representing a particular subclass */
    const CLASSKEY_1 = '1';

    /** A key representing a particular subclass */
    const CLASSKEY_PHYSICALPERSON1 = '1';

    /** A class that can be returned by this peer. */
    const CLASSNAME_1 = 'PhysicalPerson1';

    /** A key representing a particular subclass */
    const CLASSKEY_2 = '2';

    /** A key representing a particular subclass */
    const CLASSKEY_PHYSICALPERSON2 = '2';

    /** A class that can be returned by this peer. */
    const CLASSNAME_2 = 'PhysicalPerson2';

    /** A key representing a particular subclass */
    const CLASSKEY_3 = '3';

    /** A key representing a particular subclass */
    const CLASSKEY_PHYSICALPERSON3 = '3';

    /** A class that can be returned by this peer. */
    const CLASSNAME_3 = 'PhysicalPerson3';

    /** A key representing a particular subclass */
    const CLASSKEY_4 = '4';

    /** A key representing a particular subclass */
    const CLASSKEY_PHYSICALPERSON4 = '4';

    /** A class that can be returned by this peer. */
    const CLASSNAME_4 = 'PhysicalPerson4';

    /** A key representing a particular subclass */
    const CLASSKEY_5 = '5';

    /** A key representing a particular subclass */
    const CLASSKEY_PHYSICALPERSON5 = '5';

    /** A class that can be returned by this peer. */
    const CLASSNAME_5 = 'PhysicalPerson5';

    /** A key representing a particular subclass */
    const CLASSKEY_100 = '100';

    /** A key representing a particular subclass */
    const CLASSKEY_MORALPERSON = '100';

    /** A class that can be returned by this peer. */
    const CLASSNAME_100 = 'MoralPerson';

    /** A key representing a particular subclass */
    const CLASSKEY_101 = '101';

    /** A key representing a particular subclass */
    const CLASSKEY_MORALPERSON1 = '101';

    /** A class that can be returned by this peer. */
    const CLASSNAME_101 = 'MoralPerson1';

    /** A key representing a particular subclass */
    const CLASSKEY_102 = '102';

    /** A key representing a particular subclass */
    const CLASSKEY_MORALPERSON2 = '102';

    /** A class that can be returned by this peer. */
    const CLASSNAME_102 = 'MoralPerson2';

    /** A key representing a particular subclass */
    const CLASSKEY_103 = '103';

    /** A key representing a particular subclass */
    const CLASSKEY_MORALPERSON3 = '103';

    /** A class that can be returned by this peer. */
    const CLASSNAME_103 = 'MoralPerson3';

    /** A key representing a particular subclass */
    const CLASSKEY_104 = '104';

    /** A key representing a particular subclass */
    const CLASSKEY_MORALPERSON4 = '104';

    /** A class that can be returned by this peer. */
    const CLASSNAME_104 = 'MoralPerson4';

    /** A key representing a particular subclass */
    const CLASSKEY_105 = '105';

    /** A key representing a particular subclass */
    const CLASSKEY_MORALPERSON5 = '105';

    /** A class that can be returned by this peer. */
    const CLASSNAME_105 = 'MoralPerson5';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Contact objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Contact[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'ParentId', 'CivilityId', 'ServiceId', 'Role', 'Title', 'FirstName', 'LastName', 'MaidenName', 'ComplementName', 'Name', 'ShortName', 'ZoneId', 'Address1', 'Address2', 'City', 'PostalCode', 'Country', 'Phone', 'Fax', 'Mobile', 'Email', 'Web', 'Comment', 'HiddenComment', 'BirthDate', 'BirthPlace', 'BirthPlaceCode', 'IsArchive', 'ArchiveDate', 'ArchiveComment', 'SecuNumber', 'Siret', 'Siren', 'NafCode', 'ApeCode', 'Type', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'parentId', 'civilityId', 'serviceId', 'role', 'title', 'firstName', 'lastName', 'maidenName', 'complementName', 'name', 'shortName', 'zoneId', 'address1', 'address2', 'city', 'postalCode', 'country', 'phone', 'fax', 'mobile', 'email', 'web', 'comment', 'hiddenComment', 'birthDate', 'birthPlace', 'birthPlaceCode', 'isArchive', 'archiveDate', 'archiveComment', 'secuNumber', 'siret', 'siren', 'nafCode', 'apeCode', 'type', 'createdAt', 'createdBy', 'updatedAt', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (self::ID, self::PARENT_ID, self::CIVILITY_ID, self::SERVICE_ID, self::ROLE, self::TITLE, self::FIRST_NAME, self::LAST_NAME, self::MAIDEN_NAME, self::COMPLEMENT_NAME, self::NAME, self::SHORT_NAME, self::ZONE_ID, self::ADDRESS1, self::ADDRESS2, self::CITY, self::POSTAL_CODE, self::COUNTRY, self::PHONE, self::FAX, self::MOBILE, self::EMAIL, self::WEB, self::COMMENT, self::HIDDEN_COMMENT, self::BIRTH_DATE, self::BIRTH_PLACE, self::BIRTH_PLACE_CODE, self::IS_ARCHIVE, self::ARCHIVE_DATE, self::ARCHIVE_COMMENT, self::SECU_NUMBER, self::SIRET, self::SIREN, self::NAF_CODE, self::APE_CODE, self::TYPE, self::CREATED_AT, self::CREATED_BY, self::UPDATED_AT, self::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'PARENT_ID', 'CIVILITY_ID', 'SERVICE_ID', 'ROLE', 'TITLE', 'FIRST_NAME', 'LAST_NAME', 'MAIDEN_NAME', 'COMPLEMENT_NAME', 'NAME', 'SHORT_NAME', 'ZONE_ID', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL_CODE', 'COUNTRY', 'PHONE', 'FAX', 'MOBILE', 'EMAIL', 'WEB', 'COMMENT', 'HIDDEN_COMMENT', 'BIRTH_DATE', 'BIRTH_PLACE', 'BIRTH_PLACE_CODE', 'IS_ARCHIVE', 'ARCHIVE_DATE', 'ARCHIVE_COMMENT', 'SECU_NUMBER', 'SIRET', 'SIREN', 'NAF_CODE', 'APE_CODE', 'TYPE', 'CREATED_AT', 'CREATED_BY', 'UPDATED_AT', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'parent_id', 'civility_id', 'service_id', 'role', 'title', 'first_name', 'last_name', 'maiden_name', 'complement_name', 'name', 'short_name', 'zone_id', 'address1', 'address2', 'city', 'postal_code', 'country', 'phone', 'fax', 'mobile', 'email', 'web', 'comment', 'hidden_comment', 'birth_date', 'birth_place', 'birth_place_code', 'is_archive', 'archive_date', 'archive_comment', 'secu_number', 'siret', 'siren', 'naf_code', 'ape_code', 'type', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ParentId' => 1, 'CivilityId' => 2, 'ServiceId' => 3, 'Role' => 4, 'Title' => 5, 'FirstName' => 6, 'LastName' => 7, 'MaidenName' => 8, 'ComplementName' => 9, 'Name' => 10, 'ShortName' => 11, 'ZoneId' => 12, 'Address1' => 13, 'Address2' => 14, 'City' => 15, 'PostalCode' => 16, 'Country' => 17, 'Phone' => 18, 'Fax' => 19, 'Mobile' => 20, 'Email' => 21, 'Web' => 22, 'Comment' => 23, 'HiddenComment' => 24, 'BirthDate' => 25, 'BirthPlace' => 26, 'BirthPlaceCode' => 27, 'IsArchive' => 28, 'ArchiveDate' => 29, 'ArchiveComment' => 30, 'SecuNumber' => 31, 'Siret' => 32, 'Siren' => 33, 'NafCode' => 34, 'ApeCode' => 35, 'Type' => 36, 'CreatedAt' => 37, 'CreatedBy' => 38, 'UpdatedAt' => 39, 'UpdatedBy' => 40, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'parentId' => 1, 'civilityId' => 2, 'serviceId' => 3, 'role' => 4, 'title' => 5, 'firstName' => 6, 'lastName' => 7, 'maidenName' => 8, 'complementName' => 9, 'name' => 10, 'shortName' => 11, 'zoneId' => 12, 'address1' => 13, 'address2' => 14, 'city' => 15, 'postalCode' => 16, 'country' => 17, 'phone' => 18, 'fax' => 19, 'mobile' => 20, 'email' => 21, 'web' => 22, 'comment' => 23, 'hiddenComment' => 24, 'birthDate' => 25, 'birthPlace' => 26, 'birthPlaceCode' => 27, 'isArchive' => 28, 'archiveDate' => 29, 'archiveComment' => 30, 'secuNumber' => 31, 'siret' => 32, 'siren' => 33, 'nafCode' => 34, 'apeCode' => 35, 'type' => 36, 'createdAt' => 37, 'createdBy' => 38, 'updatedAt' => 39, 'updatedBy' => 40, ),
        BasePeer::TYPE_COLNAME => array (self::ID => 0, self::PARENT_ID => 1, self::CIVILITY_ID => 2, self::SERVICE_ID => 3, self::ROLE => 4, self::TITLE => 5, self::FIRST_NAME => 6, self::LAST_NAME => 7, self::MAIDEN_NAME => 8, self::COMPLEMENT_NAME => 9, self::NAME => 10, self::SHORT_NAME => 11, self::ZONE_ID => 12, self::ADDRESS1 => 13, self::ADDRESS2 => 14, self::CITY => 15, self::POSTAL_CODE => 16, self::COUNTRY => 17, self::PHONE => 18, self::FAX => 19, self::MOBILE => 20, self::EMAIL => 21, self::WEB => 22, self::COMMENT => 23, self::HIDDEN_COMMENT => 24, self::BIRTH_DATE => 25, self::BIRTH_PLACE => 26, self::BIRTH_PLACE_CODE => 27, self::IS_ARCHIVE => 28, self::ARCHIVE_DATE => 29, self::ARCHIVE_COMMENT => 30, self::SECU_NUMBER => 31, self::SIRET => 32, self::SIREN => 33, self::NAF_CODE => 34, self::APE_CODE => 35, self::TYPE => 36, self::CREATED_AT => 37, self::CREATED_BY => 38, self::UPDATED_AT => 39, self::UPDATED_BY => 40, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'PARENT_ID' => 1, 'CIVILITY_ID' => 2, 'SERVICE_ID' => 3, 'ROLE' => 4, 'TITLE' => 5, 'FIRST_NAME' => 6, 'LAST_NAME' => 7, 'MAIDEN_NAME' => 8, 'COMPLEMENT_NAME' => 9, 'NAME' => 10, 'SHORT_NAME' => 11, 'ZONE_ID' => 12, 'ADDRESS1' => 13, 'ADDRESS2' => 14, 'CITY' => 15, 'POSTAL_CODE' => 16, 'COUNTRY' => 17, 'PHONE' => 18, 'FAX' => 19, 'MOBILE' => 20, 'EMAIL' => 21, 'WEB' => 22, 'COMMENT' => 23, 'HIDDEN_COMMENT' => 24, 'BIRTH_DATE' => 25, 'BIRTH_PLACE' => 26, 'BIRTH_PLACE_CODE' => 27, 'IS_ARCHIVE' => 28, 'ARCHIVE_DATE' => 29, 'ARCHIVE_COMMENT' => 30, 'SECU_NUMBER' => 31, 'SIRET' => 32, 'SIREN' => 33, 'NAF_CODE' => 34, 'APE_CODE' => 35, 'TYPE' => 36, 'CREATED_AT' => 37, 'CREATED_BY' => 38, 'UPDATED_AT' => 39, 'UPDATED_BY' => 40, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'parent_id' => 1, 'civility_id' => 2, 'service_id' => 3, 'role' => 4, 'title' => 5, 'first_name' => 6, 'last_name' => 7, 'maiden_name' => 8, 'complement_name' => 9, 'name' => 10, 'short_name' => 11, 'zone_id' => 12, 'address1' => 13, 'address2' => 14, 'city' => 15, 'postal_code' => 16, 'country' => 17, 'phone' => 18, 'fax' => 19, 'mobile' => 20, 'email' => 21, 'web' => 22, 'comment' => 23, 'hidden_comment' => 24, 'birth_date' => 25, 'birth_place' => 26, 'birth_place_code' => 27, 'is_archive' => 28, 'archive_date' => 29, 'archive_comment' => 30, 'secu_number' => 31, 'siret' => 32, 'siren' => 33, 'naf_code' => 34, 'ape_code' => 35, 'type' => 36, 'created_at' => 37, 'created_by' => 38, 'updated_at' => 39, 'updated_by' => 40, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = self::getFieldNames($toType);
        $key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, self::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return self::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. ContactPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(ContactPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(ContactPeer::ID);
			$criteria->addSelectColumn(ContactPeer::PARENT_ID);
			$criteria->addSelectColumn(ContactPeer::CIVILITY_ID);
			$criteria->addSelectColumn(ContactPeer::SERVICE_ID);
			$criteria->addSelectColumn(ContactPeer::ROLE);
			$criteria->addSelectColumn(ContactPeer::TITLE);
			$criteria->addSelectColumn(ContactPeer::FIRST_NAME);
			$criteria->addSelectColumn(ContactPeer::LAST_NAME);
			$criteria->addSelectColumn(ContactPeer::MAIDEN_NAME);
			$criteria->addSelectColumn(ContactPeer::COMPLEMENT_NAME);
			$criteria->addSelectColumn(ContactPeer::NAME);
			$criteria->addSelectColumn(ContactPeer::SHORT_NAME);
			$criteria->addSelectColumn(ContactPeer::ZONE_ID);
			$criteria->addSelectColumn(ContactPeer::ADDRESS1);
			$criteria->addSelectColumn(ContactPeer::ADDRESS2);
			$criteria->addSelectColumn(ContactPeer::CITY);
			$criteria->addSelectColumn(ContactPeer::POSTAL_CODE);
			$criteria->addSelectColumn(ContactPeer::COUNTRY);
			$criteria->addSelectColumn(ContactPeer::PHONE);
			$criteria->addSelectColumn(ContactPeer::FAX);
			$criteria->addSelectColumn(ContactPeer::MOBILE);
			$criteria->addSelectColumn(ContactPeer::EMAIL);
			$criteria->addSelectColumn(ContactPeer::WEB);
			$criteria->addSelectColumn(ContactPeer::COMMENT);
			$criteria->addSelectColumn(ContactPeer::HIDDEN_COMMENT);
			$criteria->addSelectColumn(ContactPeer::BIRTH_DATE);
			$criteria->addSelectColumn(ContactPeer::BIRTH_PLACE);
			$criteria->addSelectColumn(ContactPeer::BIRTH_PLACE_CODE);
			$criteria->addSelectColumn(ContactPeer::IS_ARCHIVE);
			$criteria->addSelectColumn(ContactPeer::ARCHIVE_DATE);
			$criteria->addSelectColumn(ContactPeer::ARCHIVE_COMMENT);
			$criteria->addSelectColumn(ContactPeer::SECU_NUMBER);
			$criteria->addSelectColumn(ContactPeer::SIRET);
			$criteria->addSelectColumn(ContactPeer::SIREN);
			$criteria->addSelectColumn(ContactPeer::NAF_CODE);
			$criteria->addSelectColumn(ContactPeer::APE_CODE);
			$criteria->addSelectColumn(ContactPeer::TYPE);
			$criteria->addSelectColumn(ContactPeer::CREATED_AT);
			$criteria->addSelectColumn(ContactPeer::CREATED_BY);
			$criteria->addSelectColumn(ContactPeer::UPDATED_AT);
			$criteria->addSelectColumn(ContactPeer::UPDATED_BY);
		} else {
			$criteria->addSelectColumn($alias.'.ID');
			$criteria->addSelectColumn($alias.'.PARENT_ID');
			$criteria->addSelectColumn($alias.'.CIVILITY_ID');
			$criteria->addSelectColumn($alias.'.SERVICE_ID');
			$criteria->addSelectColumn($alias.'.ROLE');
			$criteria->addSelectColumn($alias.'.TITLE');
			$criteria->addSelectColumn($alias.'.FIRST_NAME');
			$criteria->addSelectColumn($alias.'.LAST_NAME');
			$criteria->addSelectColumn($alias.'.MAIDEN_NAME');
			$criteria->addSelectColumn($alias.'.COMPLEMENT_NAME');
			$criteria->addSelectColumn($alias.'.NAME');
			$criteria->addSelectColumn($alias.'.SHORT_NAME');
			$criteria->addSelectColumn($alias.'.ZONE_ID');
			$criteria->addSelectColumn($alias.'.ADDRESS1');
			$criteria->addSelectColumn($alias.'.ADDRESS2');
			$criteria->addSelectColumn($alias.'.CITY');
			$criteria->addSelectColumn($alias.'.POSTAL_CODE');
			$criteria->addSelectColumn($alias.'.COUNTRY');
			$criteria->addSelectColumn($alias.'.PHONE');
			$criteria->addSelectColumn($alias.'.FAX');
			$criteria->addSelectColumn($alias.'.MOBILE');
			$criteria->addSelectColumn($alias.'.EMAIL');
			$criteria->addSelectColumn($alias.'.WEB');
			$criteria->addSelectColumn($alias.'.COMMENT');
			$criteria->addSelectColumn($alias.'.HIDDEN_COMMENT');
			$criteria->addSelectColumn($alias.'.BIRTH_DATE');
			$criteria->addSelectColumn($alias.'.BIRTH_PLACE');
			$criteria->addSelectColumn($alias.'.BIRTH_PLACE_CODE');
			$criteria->addSelectColumn($alias.'.IS_ARCHIVE');
			$criteria->addSelectColumn($alias.'.ARCHIVE_DATE');
			$criteria->addSelectColumn($alias.'.ARCHIVE_COMMENT');
			$criteria->addSelectColumn($alias.'.SECU_NUMBER');
			$criteria->addSelectColumn($alias.'.SIRET');
			$criteria->addSelectColumn($alias.'.SIREN');
			$criteria->addSelectColumn($alias.'.NAF_CODE');
			$criteria->addSelectColumn($alias.'.APE_CODE');
			$criteria->addSelectColumn($alias.'.TYPE');
			$criteria->addSelectColumn($alias.'.CREATED_AT');
			$criteria->addSelectColumn($alias.'.CREATED_BY');
			$criteria->addSelectColumn($alias.'.UPDATED_AT');
			$criteria->addSelectColumn($alias.'.UPDATED_BY');
		}
	}

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Contact
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = ContactPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return ContactPeer::populateObjects(ContactPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            ContactPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Contact $obj A Contact object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Contact object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Contact) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Contact object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Contact Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(self::$instances[$key])) {
                return self::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        self::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sfc_abk_contact
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ContactPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactPeer::clearInstancePool();
        // Invalidate objects in ContactMultiplePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactMultiplePeer::clearInstancePool();
        // Invalidate objects in ContactMultiplePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactMultiplePeer::clearInstancePool();
        // Invalidate objects in ContactGroupPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ContactGroupPeer::clearInstancePool();
        // Invalidate objects in MaillingListContactPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        MaillingListContactPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or NULL if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = ContactPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                // class must be set each time from the record row
                $cls = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ContactPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Contact object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = ContactPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = ContactPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + ContactPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ContactPeer::getOMClass($row, $startcol);
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            ContactPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Civility table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinCivility(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Service table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinService(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Contact objects pre-filled with their Civility objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinCivility(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol = ContactPeer::NUM_HYDRATE_COLUMNS;
        CivilityPeer::addSelectColumns($criteria);

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = CivilityPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = CivilityPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = CivilityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    CivilityPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Contact) to $obj2 (Civility)
                $obj2->addContact($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with their Service objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinService(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol = ContactPeer::NUM_HYDRATE_COLUMNS;
        ServicePeer::addSelectColumns($criteria);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ServicePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ServicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ServicePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Contact) to $obj2 (Service)
                $obj2->addContact($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol = ContactPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    sfGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Contact) to $obj2 (sfGuardUser)
                $obj2->addContactRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with their sfGuardUser objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol = ContactPeer::NUM_HYDRATE_COLUMNS;
        sfGuardUserPeer::addSelectColumns($criteria);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = sfGuardUserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    sfGuardUserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Contact) to $obj2 (sfGuardUser)
                $obj2->addContactRelatedByUpdatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Contact objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol2 = ContactPeer::NUM_HYDRATE_COLUMNS;

        CivilityPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CivilityPeer::NUM_HYDRATE_COLUMNS;

        ServicePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ServicePeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $omClass = ContactPeer::getOMClass($row, 0);
        $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Civility rows

            $key2 = CivilityPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = CivilityPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = CivilityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CivilityPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Contact) to the collection in $obj2 (Civility)
                $obj2->addContact($obj1);
            } // if joined row not null

            // Add objects for joined Service rows

            $key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = ServicePeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = ServicePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ServicePeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Contact) to the collection in $obj3 (Service)
                $obj3->addContact($obj1);
            } // if joined row not null

            // Add objects for joined sfGuardUser rows

            $key4 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = sfGuardUserPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    sfGuardUserPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Contact) to the collection in $obj4 (sfGuardUser)
                $obj4->addContactRelatedByCreatedBy($obj1);
            } // if joined row not null

            // Add objects for joined sfGuardUser rows

            $key5 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = sfGuardUserPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = sfGuardUserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    sfGuardUserPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Contact) to the collection in $obj5 (sfGuardUser)
                $obj5->addContactRelatedByUpdatedBy($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related ContactRelatedByParentId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptContactRelatedByParentId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Civility table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptCivility(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Service table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptService(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related sfGuardUserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(ContactPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            ContactPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Contact objects pre-filled with all related objects except ContactRelatedByParentId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptContactRelatedByParentId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol2 = ContactPeer::NUM_HYDRATE_COLUMNS;

        CivilityPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CivilityPeer::NUM_HYDRATE_COLUMNS;

        ServicePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ServicePeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Civility rows

                $key2 = CivilityPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = CivilityPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = CivilityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CivilityPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Contact) to the collection in $obj2 (Civility)
                $obj2->addContact($obj1);

            } // if joined row is not null

                // Add objects for joined Service rows

                $key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ServicePeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = ServicePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ServicePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Contact) to the collection in $obj3 (Service)
                $obj3->addContact($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key4 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = sfGuardUserPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    sfGuardUserPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Contact) to the collection in $obj4 (sfGuardUser)
                $obj4->addContactRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key5 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = sfGuardUserPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    sfGuardUserPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Contact) to the collection in $obj5 (sfGuardUser)
                $obj5->addContactRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with all related objects except Civility.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptCivility(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol2 = ContactPeer::NUM_HYDRATE_COLUMNS;

        ServicePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ServicePeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Service rows

                $key2 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ServicePeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = ServicePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ServicePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Contact) to the collection in $obj2 (Service)
                $obj2->addContact($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key3 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = sfGuardUserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    sfGuardUserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Contact) to the collection in $obj3 (sfGuardUser)
                $obj3->addContactRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key4 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = sfGuardUserPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    sfGuardUserPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Contact) to the collection in $obj4 (sfGuardUser)
                $obj4->addContactRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with all related objects except Service.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptService(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol2 = ContactPeer::NUM_HYDRATE_COLUMNS;

        CivilityPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CivilityPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        sfGuardUserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + sfGuardUserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::CREATED_BY, sfGuardUserPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::UPDATED_BY, sfGuardUserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Civility rows

                $key2 = CivilityPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = CivilityPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = CivilityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CivilityPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Contact) to the collection in $obj2 (Civility)
                $obj2->addContact($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key3 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = sfGuardUserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    sfGuardUserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Contact) to the collection in $obj3 (sfGuardUser)
                $obj3->addContactRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined sfGuardUser rows

                $key4 = sfGuardUserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = sfGuardUserPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = sfGuardUserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    sfGuardUserPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Contact) to the collection in $obj4 (sfGuardUser)
                $obj4->addContactRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with all related objects except sfGuardUserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol2 = ContactPeer::NUM_HYDRATE_COLUMNS;

        CivilityPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CivilityPeer::NUM_HYDRATE_COLUMNS;

        ServicePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ServicePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Civility rows

                $key2 = CivilityPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = CivilityPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = CivilityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CivilityPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Contact) to the collection in $obj2 (Civility)
                $obj2->addContact($obj1);

            } // if joined row is not null

                // Add objects for joined Service rows

                $key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ServicePeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = ServicePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ServicePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Contact) to the collection in $obj3 (Service)
                $obj3->addContact($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Contact objects pre-filled with all related objects except sfGuardUserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Contact objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(self::DATABASE_NAME);
        }

        ContactPeer::addSelectColumns($criteria);
        $startcol2 = ContactPeer::NUM_HYDRATE_COLUMNS;

        CivilityPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + CivilityPeer::NUM_HYDRATE_COLUMNS;

        ServicePeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + ServicePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(ContactPeer::CIVILITY_ID, CivilityPeer::ID, $join_behavior);

        $criteria->addJoin(ContactPeer::SERVICE_ID, ServicePeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = ContactPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = ContactPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $omClass = ContactPeer::getOMClass($row, 0);
                $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);

                $obj1 = new $cls();
                $obj1->hydrate($row);
                ContactPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Civility rows

                $key2 = CivilityPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = CivilityPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = CivilityPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    CivilityPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Contact) to the collection in $obj2 (Civility)
                $obj2->addContact($obj1);

            } // if joined row is not null

                // Add objects for joined Service rows

                $key3 = ServicePeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = ServicePeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = ServicePeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    ServicePeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Contact) to the collection in $obj3 (Service)
                $obj3->addContact($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseContactPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseContactPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new ContactTableMap());
      }
    }

    /**
     * The returned Class will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param      array $row PropelPDO result row.
     * @param      int $colnum Column to examine for OM class information (first is 0).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getOMClass($row, $colnum)
    {
        try {

            $omClass = null;
            $classKey = $row[$colnum + 36];

            switch ($classKey) {

                case self::CLASSKEY_0:
                    $omClass = self::CLASSNAME_0;
                    break;

                case self::CLASSKEY_1:
                    $omClass = self::CLASSNAME_1;
                    break;

                case self::CLASSKEY_2:
                    $omClass = self::CLASSNAME_2;
                    break;

                case self::CLASSKEY_3:
                    $omClass = self::CLASSNAME_3;
                    break;

                case self::CLASSKEY_4:
                    $omClass = self::CLASSNAME_4;
                    break;

                case self::CLASSKEY_5:
                    $omClass = self::CLASSNAME_5;
                    break;

                case self::CLASSKEY_100:
                    $omClass = self::CLASSNAME_100;
                    break;

                case self::CLASSKEY_101:
                    $omClass = self::CLASSNAME_101;
                    break;

                case self::CLASSKEY_102:
                    $omClass = self::CLASSNAME_102;
                    break;

                case self::CLASSKEY_103:
                    $omClass = self::CLASSNAME_103;
                    break;

                case self::CLASSKEY_104:
                    $omClass = self::CLASSNAME_104;
                    break;

                case self::CLASSKEY_105:
                    $omClass = self::CLASSNAME_105;
                    break;

                default:
                    $omClass = ContactPeer::OM_CLASS;

            } // switch

        } catch (Exception $e) {
            throw new PropelException('Unable to get OM class.', $e);
        }

        return $omClass;
    }

    /**
     * Performs an INSERT on the database, given a Contact or Criteria object.
     *
     * @param      mixed $values Criteria or Contact object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseContactPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Contact object
        }

        if ($criteria->containsKey(ContactPeer::ID) && $criteria->keyContainsValue(ContactPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContactPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Contact or Criteria object.
     *
     * @param      mixed $values Criteria or Contact object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseContactPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContactPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(self::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(ContactPeer::ID);
            $value = $criteria->remove(ContactPeer::ID);
            if ($value) {
                $selectCriteria->add(ContactPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(ContactPeer::TABLE_NAME);
            }

        } else { // $values is Contact object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sfc_abk_contact table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(ContactPeer::TABLE_NAME, $con, ContactPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContactPeer::clearInstancePool();
            ContactPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Contact or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Contact object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            ContactPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Contact) { // it's a model object
            // invalidate the cache for this single object
            ContactPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(ContactPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                ContactPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(self::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            ContactPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Contact object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Contact $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(ContactPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(ContactPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        $res =  BasePeer::doValidate(ContactPeer::DATABASE_NAME, ContactPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContactPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
    }

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Contact
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{
		$pk = (int) $pk; // Casting pk as it's php type to prevent error from empty string
		if(!$pk){
			return null;
		}

		if (null !== ($obj = ContactPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ContactPeer::DATABASE_NAME);
		$criteria->add(ContactPeer::ID, $pk);

		$v = ContactPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Contact[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(ContactPeer::DATABASE_NAME);
            $criteria->add(ContactPeer::ID, $pks, Criteria::IN);
            $objs = ContactPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

	/**
	 * Retrieve PK of all matched record.
	 * @param Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param Connection $con The connection to use.
	 * @return array Array of PK of selected record.
	 * @see doSelectField
	 */
	public static function doSelectPK(Criteria $criteria = null, $con = null) {
		return ContactPeer::doSelectFieldValues(ContactPeer::ID, $criteria, true, $con);
	}
  
  /**
   * Retrieve Field of all matched record.
   * @param string $field Field of table
   * @param Criteria $criteria Criteria
   * @param boolean $distinct If select only distinct values
   * @param Connection $con Connection to use
   * @return array Array of field values
   */
  public static function doSelectFieldValues($field, $criteria = null, $distinct = false, $con = null) {
      if(!$criteria) {
          $criteria = new Criteria();
      }
      else {
          $criteria = clone $criteria;
      }
      if($distinct) {
          if (! in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
              $criteria->setDistinct();
          }
      }
      if (in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
          //$criteria->clearOrderByColumns();
      }
      $column = ContactPeer::getTableMap()->getColumn($field);
      $criteria->clearSelectColumns();
      $criteria->addSelectColumn($field);
      $stmt = ContactPeer::doSelectStmt($criteria, $con);
      $fields = array();
      while($row = $stmt->fetch()) {
          $fields[] = $row[0];
      }
      return $fields;
  }
  
	protected static $_metadata;

	/**
	 *
	 *
	 */
	public static function getMetadata($info = null, $default = null, $class = 'Contact') {
		if(!ContactPeer::$_metadata) {
			$metadata = sfConfig::get('app_metadata_' . $class, array());
			$default_metadata = array(
				'name' => $class,
				'app' => sfConfig::get('sf_app'),
				'module' => sfInflector::underscore($class)
			);
			ContactPeer::$_metadata = array_merge($default_metadata, $metadata);
		}
		if($info) {
			return get($info, ContactPeer::$_metadata, $default);
		}
		return ContactPeer::$_metadata;
	}
} // BaseContactPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContactPeer::buildTableMap();


<?php


/**
 * Base class that represents a row from the 'sfc_abk_contact' table.
 *
 * 
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
abstract class BaseContact extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'ContactPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ContactPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the parent_id field.
     * @var        int
     */
    protected $parent_id;

    /**
     * The value for the civility_id field.
     * @var        int
     */
    protected $civility_id;

    /**
     * The value for the service_id field.
     * @var        int
     */
    protected $service_id;

    /**
     * The value for the role field.
     * @var        string
     */
    protected $role;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the maiden_name field.
     * @var        string
     */
    protected $maiden_name;

    /**
     * The value for the complement_name field.
     * @var        string
     */
    protected $complement_name;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the short_name field.
     * @var        string
     */
    protected $short_name;

    /**
     * The value for the zone_id field.
     * @var        int
     */
    protected $zone_id;

    /**
     * The value for the address1 field.
     * @var        string
     */
    protected $address1;

    /**
     * The value for the address2 field.
     * @var        string
     */
    protected $address2;

    /**
     * The value for the city field.
     * @var        string
     */
    protected $city;

    /**
     * The value for the postal_code field.
     * @var        string
     */
    protected $postal_code;

    /**
     * The value for the country field.
     * @var        string
     */
    protected $country;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the fax field.
     * @var        string
     */
    protected $fax;

    /**
     * The value for the mobile field.
     * @var        string
     */
    protected $mobile;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the web field.
     * @var        string
     */
    protected $web;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the hidden_comment field.
     * @var        string
     */
    protected $hidden_comment;

    /**
     * The value for the birth_date field.
     * @var        string
     */
    protected $birth_date;

    /**
     * The value for the birth_place field.
     * @var        string
     */
    protected $birth_place;

    /**
     * The value for the birth_place_code field.
     * @var        string
     */
    protected $birth_place_code;

    /**
     * The value for the is_archive field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $is_archive;

    /**
     * The value for the archive_date field.
     * @var        string
     */
    protected $archive_date;

    /**
     * The value for the archive_comment field.
     * @var        string
     */
    protected $archive_comment;

    /**
     * The value for the secu_number field.
     * @var        string
     */
    protected $secu_number;

    /**
     * The value for the siret field.
     * @var        string
     */
    protected $siret;

    /**
     * The value for the siren field.
     * @var        string
     */
    protected $siren;

    /**
     * The value for the naf_code field.
     * @var        string
     */
    protected $naf_code;

    /**
     * The value for the ape_code field.
     * @var        string
     */
    protected $ape_code;

    /**
     * The value for the type field.
     * @var        int
     */
    protected $type;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the created_by field.
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * The value for the updated_by field.
     * @var        int
     */
    protected $updated_by;

    /**
     * @var        Contact
     */
    protected $aContactRelatedByParentId;

    /**
     * @var        Civility
     */
    protected $aCivility;

    /**
     * @var        Service
     */
    protected $aService;

    /**
     * @var        sfGuardUser
     */
    protected $asfGuardUserRelatedByCreatedBy;

    /**
     * @var        sfGuardUser
     */
    protected $asfGuardUserRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|Contact[] Collection to store aggregation of Contact objects.
     */
    protected $collContactsRelatedById;

    /**
     * @var        PropelObjectCollection|ContactMultiple[] Collection to store aggregation of ContactMultiple objects.
     */
    protected $collContactMultiplesRelatedByContactId;

    /**
     * @var        PropelObjectCollection|ContactMultiple[] Collection to store aggregation of ContactMultiple objects.
     */
    protected $collContactMultiplesRelatedByParentId;

    /**
     * @var        PropelObjectCollection|ContactGroup[] Collection to store aggregation of ContactGroup objects.
     */
    protected $collContactGroups;

    /**
     * @var        PropelObjectCollection|MaillingListContact[] Collection to store aggregation of MaillingListContact objects.
     */
    protected $collMaillingListContacts;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contactsRelatedByIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contactMultiplesRelatedByContactIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contactMultiplesRelatedByParentIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $contactGroupsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $maillingListContactsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_archive = false;
    }

    /**
     * Initializes internal state of BaseContact object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     * 
     * @return   int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [parent_id] column value.
     * 
     * @return   int
     */
    public function getParentId()
    {

        return $this->parent_id;
    }

    /**
     * Get the [civility_id] column value.
     * 
     * @return   int
     */
    public function getCivilityId()
    {

        return $this->civility_id;
    }

    /**
     * Get the [service_id] column value.
     * 
     * @return   int
     */
    public function getServiceId()
    {

        return $this->service_id;
    }

    /**
     * Get the [role] column value.
     * 
     * @return   string
     */
    public function getRole()
    {

        return $this->role;
    }

    /**
     * Get the [title] column value.
     * 
     * @return   string
     */
    public function getTitle()
    {

        return $this->title;
    }

    /**
     * Get the [first_name] column value.
     * 
     * @return   string
     */
    public function getFirstName()
    {

        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     * 
     * @return   string
     */
    public function getLastName()
    {

        return $this->last_name;
    }

    /**
     * Get the [maiden_name] column value.
     * 
     * @return   string
     */
    public function getMaidenName()
    {

        return $this->maiden_name;
    }

    /**
     * Get the [complement_name] column value.
     * 
     * @return   string
     */
    public function getComplementName()
    {

        return $this->complement_name;
    }

    /**
     * Get the [name] column value.
     * 
     * @return   string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [short_name] column value.
     * 
     * @return   string
     */
    public function getShortName()
    {

        return $this->short_name;
    }

    /**
     * Get the [zone_id] column value.
     * 
     * @return   int
     */
    public function getZoneId()
    {

        return $this->zone_id;
    }

    /**
     * Get the [address1] column value.
     * 
     * @return   string
     */
    public function getAddress1()
    {

        return $this->address1;
    }

    /**
     * Get the [address2] column value.
     * 
     * @return   string
     */
    public function getAddress2()
    {

        return $this->address2;
    }

    /**
     * Get the [city] column value.
     * 
     * @return   string
     */
    public function getCity()
    {

        return $this->city;
    }

    /**
     * Get the [postal_code] column value.
     * 
     * @return   string
     */
    public function getPostalCode()
    {

        return $this->postal_code;
    }

    /**
     * Get the [country] column value.
     * 
     * @return   string
     */
    public function getCountry()
    {

        return $this->country;
    }

    /**
     * Get the [phone] column value.
     * 
     * @return   string
     */
    public function getPhone()
    {

        return $this->phone;
    }

    /**
     * Get the [fax] column value.
     * 
     * @return   string
     */
    public function getFax()
    {

        return $this->fax;
    }

    /**
     * Get the [mobile] column value.
     * 
     * @return   string
     */
    public function getMobile()
    {

        return $this->mobile;
    }

    /**
     * Get the [email] column value.
     * 
     * @return   string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [web] column value.
     * 
     * @return   string
     */
    public function getWeb()
    {

        return $this->web;
    }

    /**
     * Get the [comment] column value.
     * 
     * @return   string
     */
    public function getComment()
    {

        return $this->comment;
    }

    /**
     * Get the [hidden_comment] column value.
     * 
     * @return   string
     */
    public function getHiddenComment()
    {

        return $this->hidden_comment;
    }

    /**
     * Get the [optionally formatted] temporal [birth_date] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBirthDate($format = '%x')
    {
        if ($this->birth_date === null) {
            return null;
        }



        try {
            $dt = new DateTime($this->birth_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->birth_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [birth_place] column value.
     * 
     * @return   string
     */
    public function getBirthPlace()
    {

        return $this->birth_place;
    }

    /**
     * Get the [birth_place_code] column value.
     * 
     * @return   string
     */
    public function getBirthPlaceCode()
    {

        return $this->birth_place_code;
    }

    /**
     * Get the [is_archive] column value.
     * 
     * @return   boolean
     */
    public function getIsArchive()
    {

        return $this->is_archive;
    }

    /**
     * Get the [optionally formatted] temporal [archive_date] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getArchiveDate($format = '%x')
    {
        if ($this->archive_date === null) {
            return null;
        }



        try {
            $dt = new DateTime($this->archive_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->archive_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [archive_comment] column value.
     * 
     * @return   string
     */
    public function getArchiveComment()
    {

        return $this->archive_comment;
    }

    /**
     * Get the [secu_number] column value.
     * 
     * @return   string
     */
    public function getSecuNumber()
    {

        return $this->secu_number;
    }

    /**
     * Get the [siret] column value.
     * 
     * @return   string
     */
    public function getSiret()
    {

        return $this->siret;
    }

    /**
     * Get the [siren] column value.
     * 
     * @return   string
     */
    public function getSiren()
    {

        return $this->siren;
    }

    /**
     * Get the [naf_code] column value.
     * 
     * @return   string
     */
    public function getNafCode()
    {

        return $this->naf_code;
    }

    /**
     * Get the [ape_code] column value.
     * 
     * @return   string
     */
    public function getApeCode()
    {

        return $this->ape_code;
    }

    /**
     * Get the [type] column value.
     * 
     * @return   int
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }



        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [created_by] column value.
     * 
     * @return   int
     */
    public function getCreatedBy()
    {

        return $this->created_by;
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }



        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [updated_by] column value.
     * 
     * @return   int
     */
    public function getUpdatedBy()
    {

        return $this->updated_by;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = ContactPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [parent_id] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setParentId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->parent_id !== $v) {
            $this->parent_id = $v;
            $this->modifiedColumns[] = ContactPeer::PARENT_ID;
        }

        if ($this->aContactRelatedByParentId !== null && $this->aContactRelatedByParentId->getId() !== $v) {
            $this->aContactRelatedByParentId = null;
        }


        return $this;
    } // setParentId()

    /**
     * Set the value of [civility_id] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setCivilityId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->civility_id !== $v) {
            $this->civility_id = $v;
            $this->modifiedColumns[] = ContactPeer::CIVILITY_ID;
        }

        if ($this->aCivility !== null && $this->aCivility->getId() !== $v) {
            $this->aCivility = null;
        }


        return $this;
    } // setCivilityId()

    /**
     * Set the value of [service_id] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setServiceId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->service_id !== $v) {
            $this->service_id = $v;
            $this->modifiedColumns[] = ContactPeer::SERVICE_ID;
        }

        if ($this->aService !== null && $this->aService->getId() !== $v) {
            $this->aService = null;
        }


        return $this;
    } // setServiceId()

    /**
     * Set the value of [role] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setRole($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->role !== $v) {
            $this->role = $v;
            $this->modifiedColumns[] = ContactPeer::ROLE;
        }


        return $this;
    } // setRole()

    /**
     * Set the value of [title] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = ContactPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [first_name] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = ContactPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = ContactPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [maiden_name] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setMaidenName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->maiden_name !== $v) {
            $this->maiden_name = $v;
            $this->modifiedColumns[] = ContactPeer::MAIDEN_NAME;
        }


        return $this;
    } // setMaidenName()

    /**
     * Set the value of [complement_name] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setComplementName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->complement_name !== $v) {
            $this->complement_name = $v;
            $this->modifiedColumns[] = ContactPeer::COMPLEMENT_NAME;
        }


        return $this;
    } // setComplementName()

    /**
     * Set the value of [name] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = ContactPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [short_name] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setShortName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->short_name !== $v) {
            $this->short_name = $v;
            $this->modifiedColumns[] = ContactPeer::SHORT_NAME;
        }


        return $this;
    } // setShortName()

    /**
     * Set the value of [zone_id] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setZoneId($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->zone_id !== $v) {
            $this->zone_id = $v;
            $this->modifiedColumns[] = ContactPeer::ZONE_ID;
        }


        return $this;
    } // setZoneId()

    /**
     * Set the value of [address1] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address1 !== $v) {
            $this->address1 = $v;
            $this->modifiedColumns[] = ContactPeer::ADDRESS1;
        }


        return $this;
    } // setAddress1()

    /**
     * Set the value of [address2] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address2 !== $v) {
            $this->address2 = $v;
            $this->modifiedColumns[] = ContactPeer::ADDRESS2;
        }


        return $this;
    } // setAddress2()

    /**
     * Set the value of [city] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[] = ContactPeer::CITY;
        }


        return $this;
    } // setCity()

    /**
     * Set the value of [postal_code] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setPostalCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->postal_code !== $v) {
            $this->postal_code = $v;
            $this->modifiedColumns[] = ContactPeer::POSTAL_CODE;
        }


        return $this;
    } // setPostalCode()

    /**
     * Set the value of [country] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country !== $v) {
            $this->country = $v;
            $this->modifiedColumns[] = ContactPeer::COUNTRY;
        }


        return $this;
    } // setCountry()

    /**
     * Set the value of [phone] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = ContactPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [fax] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[] = ContactPeer::FAX;
        }


        return $this;
    } // setFax()

    /**
     * Set the value of [mobile] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setMobile($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mobile !== $v) {
            $this->mobile = $v;
            $this->modifiedColumns[] = ContactPeer::MOBILE;
        }


        return $this;
    } // setMobile()

    /**
     * Set the value of [email] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = ContactPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [web] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setWeb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->web !== $v) {
            $this->web = $v;
            $this->modifiedColumns[] = ContactPeer::WEB;
        }


        return $this;
    } // setWeb()

    /**
     * Set the value of [comment] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[] = ContactPeer::COMMENT;
        }


        return $this;
    } // setComment()

    /**
     * Set the value of [hidden_comment] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setHiddenComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hidden_comment !== $v) {
            $this->hidden_comment = $v;
            $this->modifiedColumns[] = ContactPeer::HIDDEN_COMMENT;
        }


        return $this;
    } // setHiddenComment()

    /**
     * Sets the value of [birth_date] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Contact The current object (for fluent API support)
     */
    public function setBirthDate($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->birth_date !== null || $dt !== null) {
            $currentDateAsString = ($this->birth_date !== null && $tmpDt = new DateTime($this->birth_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->birth_date = $newDateAsString;
                $this->modifiedColumns[] = ContactPeer::BIRTH_DATE;
            }
        } // if either are not null


        return $this;
    } // setBirthDate()

    /**
     * Set the value of [birth_place] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setBirthPlace($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->birth_place !== $v) {
            $this->birth_place = $v;
            $this->modifiedColumns[] = ContactPeer::BIRTH_PLACE;
        }


        return $this;
    } // setBirthPlace()

    /**
     * Set the value of [birth_place_code] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setBirthPlaceCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->birth_place_code !== $v) {
            $this->birth_place_code = $v;
            $this->modifiedColumns[] = ContactPeer::BIRTH_PLACE_CODE;
        }


        return $this;
    } // setBirthPlaceCode()

    /**
     * Sets the value of the [is_archive] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * 
     * @param      boolean|integer|string $v The new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setIsArchive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_archive !== $v) {
            $this->is_archive = $v;
            $this->modifiedColumns[] = ContactPeer::IS_ARCHIVE;
        }


        return $this;
    } // setIsArchive()

    /**
     * Sets the value of [archive_date] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Contact The current object (for fluent API support)
     */
    public function setArchiveDate($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->archive_date !== null || $dt !== null) {
            $currentDateAsString = ($this->archive_date !== null && $tmpDt = new DateTime($this->archive_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->archive_date = $newDateAsString;
                $this->modifiedColumns[] = ContactPeer::ARCHIVE_DATE;
            }
        } // if either are not null


        return $this;
    } // setArchiveDate()

    /**
     * Set the value of [archive_comment] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setArchiveComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->archive_comment !== $v) {
            $this->archive_comment = $v;
            $this->modifiedColumns[] = ContactPeer::ARCHIVE_COMMENT;
        }


        return $this;
    } // setArchiveComment()

    /**
     * Set the value of [secu_number] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setSecuNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->secu_number !== $v) {
            $this->secu_number = $v;
            $this->modifiedColumns[] = ContactPeer::SECU_NUMBER;
        }


        return $this;
    } // setSecuNumber()

    /**
     * Set the value of [siret] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setSiret($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->siret !== $v) {
            $this->siret = $v;
            $this->modifiedColumns[] = ContactPeer::SIRET;
        }


        return $this;
    } // setSiret()

    /**
     * Set the value of [siren] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setSiren($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->siren !== $v) {
            $this->siren = $v;
            $this->modifiedColumns[] = ContactPeer::SIREN;
        }


        return $this;
    } // setSiren()

    /**
     * Set the value of [naf_code] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setNafCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->naf_code !== $v) {
            $this->naf_code = $v;
            $this->modifiedColumns[] = ContactPeer::NAF_CODE;
        }


        return $this;
    } // setNafCode()

    /**
     * Set the value of [ape_code] column.
     * 
     * @param      string $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setApeCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ape_code !== $v) {
            $this->ape_code = $v;
            $this->modifiedColumns[] = ContactPeer::APE_CODE;
        }


        return $this;
    } // setApeCode()

    /**
     * Set the value of [type] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setType($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = ContactPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Contact The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = ContactPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Set the value of [created_by] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = ContactPeer::CREATED_BY;
        }

        if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
            $this->asfGuardUserRelatedByCreatedBy = null;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   Contact The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        if(is_string($v)){
            $v = SfcUtils::dateTimeFormat($v);
        }
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = ContactPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Set the value of [updated_by] column.
     * 
     * @param      int $v new value
     * @return   Contact The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
		$v = SfcUtils::numberParse($v);
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = ContactPeer::UPDATED_BY;
        }

        if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
            $this->asfGuardUserRelatedByUpdatedBy = null;
        }


        return $this;
    } // setUpdatedBy()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->is_archive !== false) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->parent_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->civility_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->service_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->role = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->title = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->first_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_name = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->maiden_name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->complement_name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->name = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->short_name = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->zone_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
            $this->address1 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->address2 = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->city = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->postal_code = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->country = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->phone = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->fax = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->mobile = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->email = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->web = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->comment = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->hidden_comment = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->birth_date = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
            $this->birth_place = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
            $this->birth_place_code = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
            $this->is_archive = ($row[$startcol + 28] !== null) ? (boolean) $row[$startcol + 28] : null;
            $this->archive_date = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
            $this->archive_comment = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
            $this->secu_number = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
            $this->siret = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
            $this->siren = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
            $this->naf_code = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
            $this->ape_code = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
            $this->type = ($row[$startcol + 36] !== null) ? (int) $row[$startcol + 36] : null;
            $this->created_at = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
            $this->created_by = ($row[$startcol + 38] !== null) ? (int) $row[$startcol + 38] : null;
            $this->updated_at = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
            $this->updated_by = ($row[$startcol + 40] !== null) ? (int) $row[$startcol + 40] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 41; // 41 = ContactPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Contact object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aContactRelatedByParentId !== null && $this->parent_id !== $this->aContactRelatedByParentId->getId()) {
            $this->aContactRelatedByParentId = null;
        }
        if ($this->aCivility !== null && $this->civility_id !== $this->aCivility->getId()) {
            $this->aCivility = null;
        }
        if ($this->aService !== null && $this->service_id !== $this->aService->getId()) {
            $this->aService = null;
        }
        if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->created_by !== $this->asfGuardUserRelatedByCreatedBy->getId()) {
            $this->asfGuardUserRelatedByCreatedBy = null;
        }
        if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->updated_by !== $this->asfGuardUserRelatedByUpdatedBy->getId()) {
            $this->asfGuardUserRelatedByUpdatedBy = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ContactPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aContactRelatedByParentId = null;
            $this->aCivility = null;
            $this->aService = null;
            $this->asfGuardUserRelatedByCreatedBy = null;
            $this->asfGuardUserRelatedByUpdatedBy = null;
            $this->collContactsRelatedById = null;

            $this->collContactMultiplesRelatedByContactId = null;

            $this->collContactMultiplesRelatedByParentId = null;

            $this->collContactGroups = null;

            $this->collMaillingListContacts = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {

    foreach (sfMixer::getCallables('BaseContact:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ContactQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    

    foreach (sfMixer::getCallables('BaseContact:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
    if ($this->isModified()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(ContactPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(ContactPeer::UPDATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setUpdatedBy($user_id);
    }

    }

    if ($this->isNew()) {

    if (!$this->isSkipEdited() && !$this->isColumnModified(ContactPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if (!$this->isSkipEdited() && !$this->isColumnModified(ContactPeer::CREATED_BY))
    {
      $user_id = (sfContext::getInstance() && sfContext::getInstance()->getUser() && sfContext::getInstance()->getUser()->getGuardUser())? sfContext::getInstance()->getUser()->getGuardUser()->getId() : null;
      $this->setCreatedBy($user_id);
    }

    }


    foreach (sfMixer::getCallables('BaseContact:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ContactPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ContactPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ContactPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ContactPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();
    foreach (sfMixer::getCallables('BaseContact:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }


            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aContactRelatedByParentId !== null) {
                if ($this->aContactRelatedByParentId->isModified() || $this->aContactRelatedByParentId->isNew()) {
                    $affectedRows += $this->aContactRelatedByParentId->save($con);
                }
                $this->setContactRelatedByParentId($this->aContactRelatedByParentId);
            }

            if ($this->aCivility !== null) {
                if ($this->aCivility->isModified() || $this->aCivility->isNew()) {
                    $affectedRows += $this->aCivility->save($con);
                }
                $this->setCivility($this->aCivility);
            }

            if ($this->aService !== null) {
                if ($this->aService->isModified() || $this->aService->isNew()) {
                    $affectedRows += $this->aService->save($con);
                }
                $this->setService($this->aService);
            }

            if ($this->asfGuardUserRelatedByCreatedBy !== null) {
                if ($this->asfGuardUserRelatedByCreatedBy->isModified() || $this->asfGuardUserRelatedByCreatedBy->isNew()) {
                    $affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
                }
                $this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
            }

            if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
                if ($this->asfGuardUserRelatedByUpdatedBy->isModified() || $this->asfGuardUserRelatedByUpdatedBy->isNew()) {
                    $affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
                }
                $this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->contactsRelatedByIdScheduledForDeletion !== null) {
                if (!$this->contactsRelatedByIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->contactsRelatedByIdScheduledForDeletion as $contactRelatedById) {
                        // need to save related object because we set the relation to null
                        $contactRelatedById->save($con);
                    }
                    $this->contactsRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collContactsRelatedById !== null) {
                foreach ($this->collContactsRelatedById as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->contactMultiplesRelatedByContactIdScheduledForDeletion !== null) {
                if (!$this->contactMultiplesRelatedByContactIdScheduledForDeletion->isEmpty()) {
                    ContactMultipleQuery::create()
                        ->filterByPrimaryKeys($this->contactMultiplesRelatedByContactIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->contactMultiplesRelatedByContactIdScheduledForDeletion = null;
                }
            }

            if ($this->collContactMultiplesRelatedByContactId !== null) {
                foreach ($this->collContactMultiplesRelatedByContactId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->contactMultiplesRelatedByParentIdScheduledForDeletion !== null) {
                if (!$this->contactMultiplesRelatedByParentIdScheduledForDeletion->isEmpty()) {
                    ContactMultipleQuery::create()
                        ->filterByPrimaryKeys($this->contactMultiplesRelatedByParentIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->contactMultiplesRelatedByParentIdScheduledForDeletion = null;
                }
            }

            if ($this->collContactMultiplesRelatedByParentId !== null) {
                foreach ($this->collContactMultiplesRelatedByParentId as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->contactGroupsScheduledForDeletion !== null) {
                if (!$this->contactGroupsScheduledForDeletion->isEmpty()) {
                    ContactGroupQuery::create()
                        ->filterByPrimaryKeys($this->contactGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->contactGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collContactGroups !== null) {
                foreach ($this->collContactGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->maillingListContactsScheduledForDeletion !== null) {
                if (!$this->maillingListContactsScheduledForDeletion->isEmpty()) {
                    MaillingListContactQuery::create()
                        ->filterByPrimaryKeys($this->maillingListContactsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->maillingListContactsScheduledForDeletion = null;
                }
            }

            if ($this->collMaillingListContacts !== null) {
                foreach ($this->collMaillingListContacts as $referrerFK) {
                    if (!$referrerFK->isDeleted()) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ContactPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ContactPeer::ID . ')');
        }
        if (null === $this->id) {
            try {				
				$stmt = $con->query('SELECT sfc_abk_contact_SEQ.nextval FROM dual');
				$row = $stmt->fetch(PDO::FETCH_NUM);
				$this->id = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ContactPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(ContactPeer::PARENT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'PARENT_ID';
        }
        if ($this->isColumnModified(ContactPeer::CIVILITY_ID)) {
            $modifiedColumns[':p' . $index++]  = 'CIVILITY_ID';
        }
        if ($this->isColumnModified(ContactPeer::SERVICE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'SERVICE_ID';
        }
        if ($this->isColumnModified(ContactPeer::ROLE)) {
            $modifiedColumns[':p' . $index++]  = 'ROLE';
        }
        if ($this->isColumnModified(ContactPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'TITLE';
        }
        if ($this->isColumnModified(ContactPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'FIRST_NAME';
        }
        if ($this->isColumnModified(ContactPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'LAST_NAME';
        }
        if ($this->isColumnModified(ContactPeer::MAIDEN_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'MAIDEN_NAME';
        }
        if ($this->isColumnModified(ContactPeer::COMPLEMENT_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'COMPLEMENT_NAME';
        }
        if ($this->isColumnModified(ContactPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = 'NAME';
        }
        if ($this->isColumnModified(ContactPeer::SHORT_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'SHORT_NAME';
        }
        if ($this->isColumnModified(ContactPeer::ZONE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ZONE_ID';
        }
        if ($this->isColumnModified(ContactPeer::ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = 'ADDRESS1';
        }
        if ($this->isColumnModified(ContactPeer::ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'ADDRESS2';
        }
        if ($this->isColumnModified(ContactPeer::CITY)) {
            $modifiedColumns[':p' . $index++]  = 'CITY';
        }
        if ($this->isColumnModified(ContactPeer::POSTAL_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'POSTAL_CODE';
        }
        if ($this->isColumnModified(ContactPeer::COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'COUNTRY';
        }
        if ($this->isColumnModified(ContactPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'PHONE';
        }
        if ($this->isColumnModified(ContactPeer::FAX)) {
            $modifiedColumns[':p' . $index++]  = 'FAX';
        }
        if ($this->isColumnModified(ContactPeer::MOBILE)) {
            $modifiedColumns[':p' . $index++]  = 'MOBILE';
        }
        if ($this->isColumnModified(ContactPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'EMAIL';
        }
        if ($this->isColumnModified(ContactPeer::WEB)) {
            $modifiedColumns[':p' . $index++]  = 'WEB';
        }
        if ($this->isColumnModified(ContactPeer::COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'COMMENT';
        }
        if ($this->isColumnModified(ContactPeer::HIDDEN_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'HIDDEN_COMMENT';
        }
        if ($this->isColumnModified(ContactPeer::BIRTH_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'BIRTH_DATE';
        }
        if ($this->isColumnModified(ContactPeer::BIRTH_PLACE)) {
            $modifiedColumns[':p' . $index++]  = 'BIRTH_PLACE';
        }
        if ($this->isColumnModified(ContactPeer::BIRTH_PLACE_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'BIRTH_PLACE_CODE';
        }
        if ($this->isColumnModified(ContactPeer::IS_ARCHIVE)) {
            $modifiedColumns[':p' . $index++]  = 'IS_ARCHIVE';
        }
        if ($this->isColumnModified(ContactPeer::ARCHIVE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'ARCHIVE_DATE';
        }
        if ($this->isColumnModified(ContactPeer::ARCHIVE_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'ARCHIVE_COMMENT';
        }
        if ($this->isColumnModified(ContactPeer::SECU_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'SECU_NUMBER';
        }
        if ($this->isColumnModified(ContactPeer::SIRET)) {
            $modifiedColumns[':p' . $index++]  = 'SIRET';
        }
        if ($this->isColumnModified(ContactPeer::SIREN)) {
            $modifiedColumns[':p' . $index++]  = 'SIREN';
        }
        if ($this->isColumnModified(ContactPeer::NAF_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'NAF_CODE';
        }
        if ($this->isColumnModified(ContactPeer::APE_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'APE_CODE';
        }
        if ($this->isColumnModified(ContactPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'TYPE';
        }
        if ($this->isColumnModified(ContactPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'CREATED_AT';
        }
        if ($this->isColumnModified(ContactPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = 'CREATED_BY';
        }
        if ($this->isColumnModified(ContactPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'UPDATED_AT';
        }
        if ($this->isColumnModified(ContactPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = 'UPDATED_BY';
        }

        $sql = sprintf(
            'INSERT INTO sfc_abk_contact (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ID':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'PARENT_ID':
						$stmt->bindValue($identifier, $this->parent_id, PDO::PARAM_INT);
                        break;
                    case 'CIVILITY_ID':
						$stmt->bindValue($identifier, $this->civility_id, PDO::PARAM_INT);
                        break;
                    case 'SERVICE_ID':
						$stmt->bindValue($identifier, $this->service_id, PDO::PARAM_INT);
                        break;
                    case 'ROLE':
						$stmt->bindValue($identifier, $this->role, PDO::PARAM_STR);
                        break;
                    case 'TITLE':
						$stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'FIRST_NAME':
						$stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case 'LAST_NAME':
						$stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case 'MAIDEN_NAME':
						$stmt->bindValue($identifier, $this->maiden_name, PDO::PARAM_STR);
                        break;
                    case 'COMPLEMENT_NAME':
						$stmt->bindValue($identifier, $this->complement_name, PDO::PARAM_STR);
                        break;
                    case 'NAME':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'SHORT_NAME':
						$stmt->bindValue($identifier, $this->short_name, PDO::PARAM_STR);
                        break;
                    case 'ZONE_ID':
						$stmt->bindValue($identifier, $this->zone_id, PDO::PARAM_INT);
                        break;
                    case 'ADDRESS1':
						$stmt->bindValue($identifier, $this->address1, PDO::PARAM_STR);
                        break;
                    case 'ADDRESS2':
						$stmt->bindValue($identifier, $this->address2, PDO::PARAM_STR);
                        break;
                    case 'CITY':
						$stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'POSTAL_CODE':
						$stmt->bindValue($identifier, $this->postal_code, PDO::PARAM_STR);
                        break;
                    case 'COUNTRY':
						$stmt->bindValue($identifier, $this->country, PDO::PARAM_STR);
                        break;
                    case 'PHONE':
						$stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'FAX':
						$stmt->bindValue($identifier, $this->fax, PDO::PARAM_STR);
                        break;
                    case 'MOBILE':
						$stmt->bindValue($identifier, $this->mobile, PDO::PARAM_STR);
                        break;
                    case 'EMAIL':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'WEB':
						$stmt->bindValue($identifier, $this->web, PDO::PARAM_STR);
                        break;
                    case 'COMMENT':
						$stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'HIDDEN_COMMENT':
						$stmt->bindValue($identifier, $this->hidden_comment, PDO::PARAM_STR);
                        break;
                    case 'BIRTH_DATE':
						$stmt->bindValue($identifier, $this->birth_date, PDO::PARAM_STR);
                        break;
                    case 'BIRTH_PLACE':
						$stmt->bindValue($identifier, $this->birth_place, PDO::PARAM_STR);
                        break;
                    case 'BIRTH_PLACE_CODE':
						$stmt->bindValue($identifier, $this->birth_place_code, PDO::PARAM_STR);
                        break;
                    case 'IS_ARCHIVE':
						$stmt->bindValue($identifier, $this->is_archive, PDO::PARAM_INT);
                        break;
                    case 'ARCHIVE_DATE':
						$stmt->bindValue($identifier, $this->archive_date, PDO::PARAM_STR);
                        break;
                    case 'ARCHIVE_COMMENT':
						$stmt->bindValue($identifier, $this->archive_comment, PDO::PARAM_STR);
                        break;
                    case 'SECU_NUMBER':
						$stmt->bindValue($identifier, $this->secu_number, PDO::PARAM_STR);
                        break;
                    case 'SIRET':
						$stmt->bindValue($identifier, $this->siret, PDO::PARAM_STR);
                        break;
                    case 'SIREN':
						$stmt->bindValue($identifier, $this->siren, PDO::PARAM_STR);
                        break;
                    case 'NAF_CODE':
						$stmt->bindValue($identifier, $this->naf_code, PDO::PARAM_STR);
                        break;
                    case 'APE_CODE':
						$stmt->bindValue($identifier, $this->ape_code, PDO::PARAM_STR);
                        break;
                    case 'TYPE':
						$stmt->bindValue($identifier, $this->type, PDO::PARAM_INT);
                        break;
                    case 'CREATED_AT':
						$stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case 'CREATED_BY':
						$stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case 'UPDATED_AT':
						$stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                    case 'UPDATED_BY':
						$stmt->bindValue($identifier, $this->updated_by, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aContactRelatedByParentId !== null) {
                if (!$this->aContactRelatedByParentId->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aContactRelatedByParentId->getValidationFailures());
                }
            }

            if ($this->aCivility !== null) {
                if (!$this->aCivility->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCivility->getValidationFailures());
                }
            }

            if ($this->aService !== null) {
                if (!$this->aService->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aService->getValidationFailures());
                }
            }

            if ($this->asfGuardUserRelatedByCreatedBy !== null) {
                if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
                }
            }

            if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
                if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
                }
            }


            if (($retval = ContactPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collContactsRelatedById !== null) {
                    foreach ($this->collContactsRelatedById as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContactMultiplesRelatedByContactId !== null) {
                    foreach ($this->collContactMultiplesRelatedByContactId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContactMultiplesRelatedByParentId !== null) {
                    foreach ($this->collContactMultiplesRelatedByParentId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collContactGroups !== null) {
                    foreach ($this->collContactGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMaillingListContacts !== null) {
                    foreach ($this->collMaillingListContacts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getParentId();
                break;
            case 2:
                return $this->getCivilityId();
                break;
            case 3:
                return $this->getServiceId();
                break;
            case 4:
                return $this->getRole();
                break;
            case 5:
                return $this->getTitle();
                break;
            case 6:
                return $this->getFirstName();
                break;
            case 7:
                return $this->getLastName();
                break;
            case 8:
                return $this->getMaidenName();
                break;
            case 9:
                return $this->getComplementName();
                break;
            case 10:
                return $this->getName();
                break;
            case 11:
                return $this->getShortName();
                break;
            case 12:
                return $this->getZoneId();
                break;
            case 13:
                return $this->getAddress1();
                break;
            case 14:
                return $this->getAddress2();
                break;
            case 15:
                return $this->getCity();
                break;
            case 16:
                return $this->getPostalCode();
                break;
            case 17:
                return $this->getCountry();
                break;
            case 18:
                return $this->getPhone();
                break;
            case 19:
                return $this->getFax();
                break;
            case 20:
                return $this->getMobile();
                break;
            case 21:
                return $this->getEmail();
                break;
            case 22:
                return $this->getWeb();
                break;
            case 23:
                return $this->getComment();
                break;
            case 24:
                return $this->getHiddenComment();
                break;
            case 25:
                return $this->getBirthDate();
                break;
            case 26:
                return $this->getBirthPlace();
                break;
            case 27:
                return $this->getBirthPlaceCode();
                break;
            case 28:
                return $this->getIsArchive();
                break;
            case 29:
                return $this->getArchiveDate();
                break;
            case 30:
                return $this->getArchiveComment();
                break;
            case 31:
                return $this->getSecuNumber();
                break;
            case 32:
                return $this->getSiret();
                break;
            case 33:
                return $this->getSiren();
                break;
            case 34:
                return $this->getNafCode();
                break;
            case 35:
                return $this->getApeCode();
                break;
            case 36:
                return $this->getType();
                break;
            case 37:
                return $this->getCreatedAt();
                break;
            case 38:
                return $this->getCreatedBy();
                break;
            case 39:
                return $this->getUpdatedAt();
                break;
            case 40:
                return $this->getUpdatedBy();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Contact'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Contact'][$this->getPrimaryKey()] = true;
        $keys = ContactPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getParentId(),
            $keys[2] => $this->getCivilityId(),
            $keys[3] => $this->getServiceId(),
            $keys[4] => $this->getRole(),
            $keys[5] => $this->getTitle(),
            $keys[6] => $this->getFirstName(),
            $keys[7] => $this->getLastName(),
            $keys[8] => $this->getMaidenName(),
            $keys[9] => $this->getComplementName(),
            $keys[10] => $this->getName(),
            $keys[11] => $this->getShortName(),
            $keys[12] => $this->getZoneId(),
            $keys[13] => $this->getAddress1(),
            $keys[14] => $this->getAddress2(),
            $keys[15] => $this->getCity(),
            $keys[16] => $this->getPostalCode(),
            $keys[17] => $this->getCountry(),
            $keys[18] => $this->getPhone(),
            $keys[19] => $this->getFax(),
            $keys[20] => $this->getMobile(),
            $keys[21] => $this->getEmail(),
            $keys[22] => $this->getWeb(),
            $keys[23] => $this->getComment(),
            $keys[24] => $this->getHiddenComment(),
            $keys[25] => $this->getBirthDate(),
            $keys[26] => $this->getBirthPlace(),
            $keys[27] => $this->getBirthPlaceCode(),
            $keys[28] => $this->getIsArchive(),
            $keys[29] => $this->getArchiveDate(),
            $keys[30] => $this->getArchiveComment(),
            $keys[31] => $this->getSecuNumber(),
            $keys[32] => $this->getSiret(),
            $keys[33] => $this->getSiren(),
            $keys[34] => $this->getNafCode(),
            $keys[35] => $this->getApeCode(),
            $keys[36] => $this->getType(),
            $keys[37] => $this->getCreatedAt(),
            $keys[38] => $this->getCreatedBy(),
            $keys[39] => $this->getUpdatedAt(),
            $keys[40] => $this->getUpdatedBy(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aContactRelatedByParentId) {
                $result['ContactRelatedByParentId'] = $this->aContactRelatedByParentId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCivility) {
                $result['Civility'] = $this->aCivility->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aService) {
                $result['Service'] = $this->aService->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->asfGuardUserRelatedByCreatedBy) {
                $result['sfGuardUserRelatedByCreatedBy'] = $this->asfGuardUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->asfGuardUserRelatedByUpdatedBy) {
                $result['sfGuardUserRelatedByUpdatedBy'] = $this->asfGuardUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collContactsRelatedById) {
                $result['ContactsRelatedById'] = $this->collContactsRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContactMultiplesRelatedByContactId) {
                $result['ContactMultiplesRelatedByContactId'] = $this->collContactMultiplesRelatedByContactId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContactMultiplesRelatedByParentId) {
                $result['ContactMultiplesRelatedByParentId'] = $this->collContactMultiplesRelatedByParentId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collContactGroups) {
                $result['ContactGroups'] = $this->collContactGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMaillingListContacts) {
                $result['MaillingListContacts'] = $this->collMaillingListContacts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ContactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setParentId($value);
                break;
            case 2:
                $this->setCivilityId($value);
                break;
            case 3:
                $this->setServiceId($value);
                break;
            case 4:
                $this->setRole($value);
                break;
            case 5:
                $this->setTitle($value);
                break;
            case 6:
                $this->setFirstName($value);
                break;
            case 7:
                $this->setLastName($value);
                break;
            case 8:
                $this->setMaidenName($value);
                break;
            case 9:
                $this->setComplementName($value);
                break;
            case 10:
                $this->setName($value);
                break;
            case 11:
                $this->setShortName($value);
                break;
            case 12:
                $this->setZoneId($value);
                break;
            case 13:
                $this->setAddress1($value);
                break;
            case 14:
                $this->setAddress2($value);
                break;
            case 15:
                $this->setCity($value);
                break;
            case 16:
                $this->setPostalCode($value);
                break;
            case 17:
                $this->setCountry($value);
                break;
            case 18:
                $this->setPhone($value);
                break;
            case 19:
                $this->setFax($value);
                break;
            case 20:
                $this->setMobile($value);
                break;
            case 21:
                $this->setEmail($value);
                break;
            case 22:
                $this->setWeb($value);
                break;
            case 23:
                $this->setComment($value);
                break;
            case 24:
                $this->setHiddenComment($value);
                break;
            case 25:
                $this->setBirthDate($value);
                break;
            case 26:
                $this->setBirthPlace($value);
                break;
            case 27:
                $this->setBirthPlaceCode($value);
                break;
            case 28:
                $this->setIsArchive($value);
                break;
            case 29:
                $this->setArchiveDate($value);
                break;
            case 30:
                $this->setArchiveComment($value);
                break;
            case 31:
                $this->setSecuNumber($value);
                break;
            case 32:
                $this->setSiret($value);
                break;
            case 33:
                $this->setSiren($value);
                break;
            case 34:
                $this->setNafCode($value);
                break;
            case 35:
                $this->setApeCode($value);
                break;
            case 36:
                $this->setType($value);
                break;
            case 37:
                $this->setCreatedAt($value);
                break;
            case 38:
                $this->setCreatedBy($value);
                break;
            case 39:
                $this->setUpdatedAt($value);
                break;
            case 40:
                $this->setUpdatedBy($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ContactPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setParentId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCivilityId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setServiceId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRole($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTitle($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setFirstName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastName($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setMaidenName($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setComplementName($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setName($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setShortName($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setZoneId($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAddress1($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setAddress2($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setCity($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setPostalCode($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setCountry($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setPhone($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setFax($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setMobile($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setEmail($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setWeb($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setComment($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setHiddenComment($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setBirthDate($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setBirthPlace($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setBirthPlaceCode($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setIsArchive($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setArchiveDate($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setArchiveComment($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setSecuNumber($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setSiret($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setSiren($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setNafCode($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setApeCode($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setType($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setCreatedAt($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setCreatedBy($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setUpdatedAt($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setUpdatedBy($arr[$keys[40]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ContactPeer::DATABASE_NAME);

        if ($this->isColumnModified(ContactPeer::ID)) $criteria->add(ContactPeer::ID, $this->id);
        if ($this->isColumnModified(ContactPeer::PARENT_ID)) $criteria->add(ContactPeer::PARENT_ID, $this->parent_id);
        if ($this->isColumnModified(ContactPeer::CIVILITY_ID)) $criteria->add(ContactPeer::CIVILITY_ID, $this->civility_id);
        if ($this->isColumnModified(ContactPeer::SERVICE_ID)) $criteria->add(ContactPeer::SERVICE_ID, $this->service_id);
        if ($this->isColumnModified(ContactPeer::ROLE)) $criteria->add(ContactPeer::ROLE, $this->role);
        if ($this->isColumnModified(ContactPeer::TITLE)) $criteria->add(ContactPeer::TITLE, $this->title);
        if ($this->isColumnModified(ContactPeer::FIRST_NAME)) $criteria->add(ContactPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(ContactPeer::LAST_NAME)) $criteria->add(ContactPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(ContactPeer::MAIDEN_NAME)) $criteria->add(ContactPeer::MAIDEN_NAME, $this->maiden_name);
        if ($this->isColumnModified(ContactPeer::COMPLEMENT_NAME)) $criteria->add(ContactPeer::COMPLEMENT_NAME, $this->complement_name);
        if ($this->isColumnModified(ContactPeer::NAME)) $criteria->add(ContactPeer::NAME, $this->name);
        if ($this->isColumnModified(ContactPeer::SHORT_NAME)) $criteria->add(ContactPeer::SHORT_NAME, $this->short_name);
        if ($this->isColumnModified(ContactPeer::ZONE_ID)) $criteria->add(ContactPeer::ZONE_ID, $this->zone_id);
        if ($this->isColumnModified(ContactPeer::ADDRESS1)) $criteria->add(ContactPeer::ADDRESS1, $this->address1);
        if ($this->isColumnModified(ContactPeer::ADDRESS2)) $criteria->add(ContactPeer::ADDRESS2, $this->address2);
        if ($this->isColumnModified(ContactPeer::CITY)) $criteria->add(ContactPeer::CITY, $this->city);
        if ($this->isColumnModified(ContactPeer::POSTAL_CODE)) $criteria->add(ContactPeer::POSTAL_CODE, $this->postal_code);
        if ($this->isColumnModified(ContactPeer::COUNTRY)) $criteria->add(ContactPeer::COUNTRY, $this->country);
        if ($this->isColumnModified(ContactPeer::PHONE)) $criteria->add(ContactPeer::PHONE, $this->phone);
        if ($this->isColumnModified(ContactPeer::FAX)) $criteria->add(ContactPeer::FAX, $this->fax);
        if ($this->isColumnModified(ContactPeer::MOBILE)) $criteria->add(ContactPeer::MOBILE, $this->mobile);
        if ($this->isColumnModified(ContactPeer::EMAIL)) $criteria->add(ContactPeer::EMAIL, $this->email);
        if ($this->isColumnModified(ContactPeer::WEB)) $criteria->add(ContactPeer::WEB, $this->web);
        if ($this->isColumnModified(ContactPeer::COMMENT)) $criteria->add(ContactPeer::COMMENT, $this->comment);
        if ($this->isColumnModified(ContactPeer::HIDDEN_COMMENT)) $criteria->add(ContactPeer::HIDDEN_COMMENT, $this->hidden_comment);
        if ($this->isColumnModified(ContactPeer::BIRTH_DATE)) $criteria->add(ContactPeer::BIRTH_DATE, $this->birth_date);
        if ($this->isColumnModified(ContactPeer::BIRTH_PLACE)) $criteria->add(ContactPeer::BIRTH_PLACE, $this->birth_place);
        if ($this->isColumnModified(ContactPeer::BIRTH_PLACE_CODE)) $criteria->add(ContactPeer::BIRTH_PLACE_CODE, $this->birth_place_code);
        if ($this->isColumnModified(ContactPeer::IS_ARCHIVE)) $criteria->add(ContactPeer::IS_ARCHIVE, $this->is_archive);
        if ($this->isColumnModified(ContactPeer::ARCHIVE_DATE)) $criteria->add(ContactPeer::ARCHIVE_DATE, $this->archive_date);
        if ($this->isColumnModified(ContactPeer::ARCHIVE_COMMENT)) $criteria->add(ContactPeer::ARCHIVE_COMMENT, $this->archive_comment);
        if ($this->isColumnModified(ContactPeer::SECU_NUMBER)) $criteria->add(ContactPeer::SECU_NUMBER, $this->secu_number);
        if ($this->isColumnModified(ContactPeer::SIRET)) $criteria->add(ContactPeer::SIRET, $this->siret);
        if ($this->isColumnModified(ContactPeer::SIREN)) $criteria->add(ContactPeer::SIREN, $this->siren);
        if ($this->isColumnModified(ContactPeer::NAF_CODE)) $criteria->add(ContactPeer::NAF_CODE, $this->naf_code);
        if ($this->isColumnModified(ContactPeer::APE_CODE)) $criteria->add(ContactPeer::APE_CODE, $this->ape_code);
        if ($this->isColumnModified(ContactPeer::TYPE)) $criteria->add(ContactPeer::TYPE, $this->type);
        if ($this->isColumnModified(ContactPeer::CREATED_AT)) $criteria->add(ContactPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(ContactPeer::CREATED_BY)) $criteria->add(ContactPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(ContactPeer::UPDATED_AT)) $criteria->add(ContactPeer::UPDATED_AT, $this->updated_at);
        if ($this->isColumnModified(ContactPeer::UPDATED_BY)) $criteria->add(ContactPeer::UPDATED_BY, $this->updated_by);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ContactPeer::DATABASE_NAME);
        $criteria->add(ContactPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of Contact (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setParentId($this->getParentId());
        $copyObj->setCivilityId($this->getCivilityId());
        $copyObj->setServiceId($this->getServiceId());
        $copyObj->setRole($this->getRole());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setMaidenName($this->getMaidenName());
        $copyObj->setComplementName($this->getComplementName());
        $copyObj->setName($this->getName());
        $copyObj->setShortName($this->getShortName());
        $copyObj->setZoneId($this->getZoneId());
        $copyObj->setAddress1($this->getAddress1());
        $copyObj->setAddress2($this->getAddress2());
        $copyObj->setCity($this->getCity());
        $copyObj->setPostalCode($this->getPostalCode());
        $copyObj->setCountry($this->getCountry());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setFax($this->getFax());
        $copyObj->setMobile($this->getMobile());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setWeb($this->getWeb());
        $copyObj->setComment($this->getComment());
        $copyObj->setHiddenComment($this->getHiddenComment());
        $copyObj->setBirthDate($this->getBirthDate());
        $copyObj->setBirthPlace($this->getBirthPlace());
        $copyObj->setBirthPlaceCode($this->getBirthPlaceCode());
        $copyObj->setIsArchive($this->getIsArchive());
        $copyObj->setArchiveDate($this->getArchiveDate());
        $copyObj->setArchiveComment($this->getArchiveComment());
        $copyObj->setSecuNumber($this->getSecuNumber());
        $copyObj->setSiret($this->getSiret());
        $copyObj->setSiren($this->getSiren());
        $copyObj->setNafCode($this->getNafCode());
        $copyObj->setApeCode($this->getApeCode());
        $copyObj->setType($this->getType());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setUpdatedBy($this->getUpdatedBy());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getContactsRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactRelatedById($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContactMultiplesRelatedByContactId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactMultipleRelatedByContactId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContactMultiplesRelatedByParentId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactMultipleRelatedByParentId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getContactGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addContactGroup($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMaillingListContacts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMaillingListContact($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 Contact Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return   ContactPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ContactPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Contact object.
     *
     * @param                  Contact $v
     * @return                 Contact The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContactRelatedByParentId(Contact $v = null)
    {
        if ($v === null) {
            $this->setParentId(NULL);
        } else {
            $this->setParentId($v->getId());
        }

        $this->aContactRelatedByParentId = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Contact object, it will not be re-added.
        if ($v !== null) {
            $v->addContactRelatedById($this);
        }


        return $this;
    }


    /**
     * Get the associated Contact object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Contact The associated Contact object.
     * @throws PropelException
     */
    public function getContactRelatedByParentId(PropelPDO $con = null)
    {
        if ($this->aContactRelatedByParentId === null && ($this->parent_id !== null)) {
            $this->aContactRelatedByParentId = ContactQuery::create()->findPk($this->parent_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContactRelatedByParentId->addContactsRelatedById($this);
             */
        }

        return $this->aContactRelatedByParentId;
    }

    /**
     * Declares an association between this object and a Civility object.
     *
     * @param                  Civility $v
     * @return                 Contact The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCivility(Civility $v = null)
    {
        if ($v === null) {
            $this->setCivilityId(NULL);
        } else {
            $this->setCivilityId($v->getId());
        }

        $this->aCivility = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Civility object, it will not be re-added.
        if ($v !== null) {
            $v->addContact($this);
        }


        return $this;
    }


    /**
     * Get the associated Civility object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Civility The associated Civility object.
     * @throws PropelException
     */
    public function getCivility(PropelPDO $con = null)
    {
        if ($this->aCivility === null && ($this->civility_id !== null)) {
            $this->aCivility = CivilityQuery::create()->findPk($this->civility_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCivility->addContacts($this);
             */
        }

        return $this->aCivility;
    }

    /**
     * Declares an association between this object and a Service object.
     *
     * @param                  Service $v
     * @return                 Contact The current object (for fluent API support)
     * @throws PropelException
     */
    public function setService(Service $v = null)
    {
        if ($v === null) {
            $this->setServiceId(NULL);
        } else {
            $this->setServiceId($v->getId());
        }

        $this->aService = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Service object, it will not be re-added.
        if ($v !== null) {
            $v->addContact($this);
        }


        return $this;
    }


    /**
     * Get the associated Service object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 Service The associated Service object.
     * @throws PropelException
     */
    public function getService(PropelPDO $con = null)
    {
        if ($this->aService === null && ($this->service_id !== null)) {
            $this->aService = ServiceQuery::create()->findPk($this->service_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aService->addContacts($this);
             */
        }

        return $this->aService;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Contact The current object (for fluent API support)
     * @throws PropelException
     */
    public function setsfGuardUserRelatedByCreatedBy(sfGuardUser $v = null)
    {
        if ($v === null) {
            $this->setCreatedBy(NULL);
        } else {
            $this->setCreatedBy($v->getId());
        }

        $this->asfGuardUserRelatedByCreatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the sfGuardUser object, it will not be re-added.
        if ($v !== null) {
            $v->addContactRelatedByCreatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated sfGuardUser object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 sfGuardUser The associated sfGuardUser object.
     * @throws PropelException
     */
    public function getsfGuardUserRelatedByCreatedBy(PropelPDO $con = null)
    {
        if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
            $this->asfGuardUserRelatedByCreatedBy = sfGuardUserQuery::create()->findPk($this->created_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->asfGuardUserRelatedByCreatedBy->addContactsRelatedByCreatedBy($this);
             */
        }

        return $this->asfGuardUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a sfGuardUser object.
     *
     * @param                  sfGuardUser $v
     * @return                 Contact The current object (for fluent API support)
     * @throws PropelException
     */
    public function setsfGuardUserRelatedByUpdatedBy(sfGuardUser $v = null)
    {
        if ($v === null) {
            $this->setUpdatedBy(NULL);
        } else {
            $this->setUpdatedBy($v->getId());
        }

        $this->asfGuardUserRelatedByUpdatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the sfGuardUser object, it will not be re-added.
        if ($v !== null) {
            $v->addContactRelatedByUpdatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated sfGuardUser object
     *
     * @param      PropelPDO $con Optional Connection object.
     * @return                 sfGuardUser The associated sfGuardUser object.
     * @throws PropelException
     */
    public function getsfGuardUserRelatedByUpdatedBy(PropelPDO $con = null)
    {
        if ($this->asfGuardUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
            $this->asfGuardUserRelatedByUpdatedBy = sfGuardUserQuery::create()->findPk($this->updated_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->asfGuardUserRelatedByUpdatedBy->addContactsRelatedByUpdatedBy($this);
             */
        }

        return $this->asfGuardUserRelatedByUpdatedBy;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ContactRelatedById' == $relationName) {
            $this->initContactsRelatedById();
        }
        if ('ContactMultipleRelatedByContactId' == $relationName) {
            $this->initContactMultiplesRelatedByContactId();
        }
        if ('ContactMultipleRelatedByParentId' == $relationName) {
            $this->initContactMultiplesRelatedByParentId();
        }
        if ('ContactGroup' == $relationName) {
            $this->initContactGroups();
        }
        if ('MaillingListContact' == $relationName) {
            $this->initMaillingListContacts();
        }
    }

    /**
     * Clears out the collContactsRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactsRelatedById()
     */
    public function clearContactsRelatedById()
    {
        $this->collContactsRelatedById = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactsRelatedById collection.
     *
     * By default this just sets the collContactsRelatedById collection to an empty array (like clearcollContactsRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactsRelatedById($overrideExisting = true)
    {
        if (null !== $this->collContactsRelatedById && !$overrideExisting) {
            return;
        }
        $this->collContactsRelatedById = new PropelObjectCollection();
        $this->collContactsRelatedById->setModel('Contact');
    }

    /**
     * Gets an array of Contact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Contact is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|Contact[] List of Contact objects
     * @throws PropelException
     */
    public function getContactsRelatedById($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContactsRelatedById || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactsRelatedById) {
                // return empty collection
                $this->initContactsRelatedById();
            } else {
                $collContactsRelatedById = ContactQuery::create(null, $criteria)
                    ->filterByContactRelatedByParentId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContactsRelatedById;
                }
                $this->collContactsRelatedById = $collContactsRelatedById;
            }
        }

        return $this->collContactsRelatedById;
    }

    /**
     * Sets a collection of ContactRelatedById objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contactsRelatedById A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContactsRelatedById(PropelCollection $contactsRelatedById, PropelPDO $con = null)
    {
        $this->contactsRelatedByIdScheduledForDeletion = $this->getContactsRelatedById(new Criteria(), $con)->diff($contactsRelatedById);

        foreach ($this->contactsRelatedByIdScheduledForDeletion as $contactRelatedByIdRemoved) {
            $contactRelatedByIdRemoved->setContactRelatedByParentId(null);
        }

        $this->collContactsRelatedById = null;
        foreach ($contactsRelatedById as $contactRelatedById) {
            $this->addContactRelatedById($contactRelatedById);
        }

        $this->collContactsRelatedById = $contactsRelatedById;
    }

    /**
     * Returns the number of related Contact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related Contact objects.
     * @throws PropelException
     */
    public function countContactsRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContactsRelatedById || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactsRelatedById) {
                return 0;
            } else {
                $query = ContactQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByContactRelatedByParentId($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactsRelatedById);
        }
    }

    /**
     * Method called to associate a BaseContact object to this object
     * through the BaseContact foreign key attribute.
     *
     * @param    BaseContact $l BaseContact
     * @return   Contact The current object (for fluent API support)
     */
    public function addContactRelatedById(BaseContact $l)
    {
        if ($this->collContactsRelatedById === null) {
            $this->initContactsRelatedById();
        }
        if (!$this->collContactsRelatedById->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContactRelatedById($l);
        }

        return $this;
    }

    /**
     * @param	ContactRelatedById $contactRelatedById The contactRelatedById object to add.
     */
    protected function doAddContactRelatedById($contactRelatedById)
    {
        $this->collContactsRelatedById[]= $contactRelatedById;
        $contactRelatedById->setContactRelatedByParentId($this);
    }

    /**
     * @param	ContactRelatedById $contactRelatedById The contactRelatedById object to remove.
     */
    public function removeContactRelatedById($contactRelatedById)
    {
        if ($this->getContactsRelatedById()->contains($contactRelatedById)) {
            $this->collContactsRelatedById->remove($this->collContactsRelatedById->search($contactRelatedById));
            if (null === $this->contactsRelatedByIdScheduledForDeletion) {
                $this->contactsRelatedByIdScheduledForDeletion = clone $this->collContactsRelatedById;
                $this->contactsRelatedByIdScheduledForDeletion->clear();
            }
            $this->contactsRelatedByIdScheduledForDeletion[]= $contactRelatedById;
            $contactRelatedById->setContactRelatedByParentId(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Contact is new, it will return
     * an empty collection; or if this Contact has previously
     * been saved, it will retrieve related ContactsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Contact.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByIdJoinCivility($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('Civility', $join_behavior);

        return $this->getContactsRelatedById($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Contact is new, it will return
     * an empty collection; or if this Contact has previously
     * been saved, it will retrieve related ContactsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Contact.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByIdJoinService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('Service', $join_behavior);

        return $this->getContactsRelatedById($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Contact is new, it will return
     * an empty collection; or if this Contact has previously
     * been saved, it will retrieve related ContactsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Contact.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByIdJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByCreatedBy', $join_behavior);

        return $this->getContactsRelatedById($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Contact is new, it will return
     * an empty collection; or if this Contact has previously
     * been saved, it will retrieve related ContactsRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Contact.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Contact[] List of Contact objects
     */
    public function getContactsRelatedByIdJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactQuery::create(null, $criteria);
        $query->joinWith('sfGuardUserRelatedByUpdatedBy', $join_behavior);

        return $this->getContactsRelatedById($query, $con);
    }

    /**
     * Clears out the collContactMultiplesRelatedByContactId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactMultiplesRelatedByContactId()
     */
    public function clearContactMultiplesRelatedByContactId()
    {
        $this->collContactMultiplesRelatedByContactId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactMultiplesRelatedByContactId collection.
     *
     * By default this just sets the collContactMultiplesRelatedByContactId collection to an empty array (like clearcollContactMultiplesRelatedByContactId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactMultiplesRelatedByContactId($overrideExisting = true)
    {
        if (null !== $this->collContactMultiplesRelatedByContactId && !$overrideExisting) {
            return;
        }
        $this->collContactMultiplesRelatedByContactId = new PropelObjectCollection();
        $this->collContactMultiplesRelatedByContactId->setModel('ContactMultiple');
    }

    /**
     * Gets an array of ContactMultiple objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Contact is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ContactMultiple[] List of ContactMultiple objects
     * @throws PropelException
     */
    public function getContactMultiplesRelatedByContactId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContactMultiplesRelatedByContactId || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactMultiplesRelatedByContactId) {
                // return empty collection
                $this->initContactMultiplesRelatedByContactId();
            } else {
                $collContactMultiplesRelatedByContactId = ContactMultipleQuery::create(null, $criteria)
                    ->filterByContactRelatedByContactId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContactMultiplesRelatedByContactId;
                }
                $this->collContactMultiplesRelatedByContactId = $collContactMultiplesRelatedByContactId;
            }
        }

        return $this->collContactMultiplesRelatedByContactId;
    }

    /**
     * Sets a collection of ContactMultipleRelatedByContactId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contactMultiplesRelatedByContactId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContactMultiplesRelatedByContactId(PropelCollection $contactMultiplesRelatedByContactId, PropelPDO $con = null)
    {
        $this->contactMultiplesRelatedByContactIdScheduledForDeletion = $this->getContactMultiplesRelatedByContactId(new Criteria(), $con)->diff($contactMultiplesRelatedByContactId);

        foreach ($this->contactMultiplesRelatedByContactIdScheduledForDeletion as $contactMultipleRelatedByContactIdRemoved) {
            $contactMultipleRelatedByContactIdRemoved->setContactRelatedByContactId(null);
        }

        $this->collContactMultiplesRelatedByContactId = null;
        foreach ($contactMultiplesRelatedByContactId as $contactMultipleRelatedByContactId) {
            $this->addContactMultipleRelatedByContactId($contactMultipleRelatedByContactId);
        }

        $this->collContactMultiplesRelatedByContactId = $contactMultiplesRelatedByContactId;
    }

    /**
     * Returns the number of related ContactMultiple objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ContactMultiple objects.
     * @throws PropelException
     */
    public function countContactMultiplesRelatedByContactId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContactMultiplesRelatedByContactId || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactMultiplesRelatedByContactId) {
                return 0;
            } else {
                $query = ContactMultipleQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByContactRelatedByContactId($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactMultiplesRelatedByContactId);
        }
    }

    /**
     * Method called to associate a ContactMultiple object to this object
     * through the ContactMultiple foreign key attribute.
     *
     * @param    ContactMultiple $l ContactMultiple
     * @return   Contact The current object (for fluent API support)
     */
    public function addContactMultipleRelatedByContactId(ContactMultiple $l)
    {
        if ($this->collContactMultiplesRelatedByContactId === null) {
            $this->initContactMultiplesRelatedByContactId();
        }
        if (!$this->collContactMultiplesRelatedByContactId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContactMultipleRelatedByContactId($l);
        }

        return $this;
    }

    /**
     * @param	ContactMultipleRelatedByContactId $contactMultipleRelatedByContactId The contactMultipleRelatedByContactId object to add.
     */
    protected function doAddContactMultipleRelatedByContactId($contactMultipleRelatedByContactId)
    {
        $this->collContactMultiplesRelatedByContactId[]= $contactMultipleRelatedByContactId;
        $contactMultipleRelatedByContactId->setContactRelatedByContactId($this);
    }

    /**
     * @param	ContactMultipleRelatedByContactId $contactMultipleRelatedByContactId The contactMultipleRelatedByContactId object to remove.
     */
    public function removeContactMultipleRelatedByContactId($contactMultipleRelatedByContactId)
    {
        if ($this->getContactMultiplesRelatedByContactId()->contains($contactMultipleRelatedByContactId)) {
            $this->collContactMultiplesRelatedByContactId->remove($this->collContactMultiplesRelatedByContactId->search($contactMultipleRelatedByContactId));
            if (null === $this->contactMultiplesRelatedByContactIdScheduledForDeletion) {
                $this->contactMultiplesRelatedByContactIdScheduledForDeletion = clone $this->collContactMultiplesRelatedByContactId;
                $this->contactMultiplesRelatedByContactIdScheduledForDeletion->clear();
            }
            $this->contactMultiplesRelatedByContactIdScheduledForDeletion[]= $contactMultipleRelatedByContactId;
            $contactMultipleRelatedByContactId->setContactRelatedByContactId(null);
        }
    }

    /**
     * Clears out the collContactMultiplesRelatedByParentId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactMultiplesRelatedByParentId()
     */
    public function clearContactMultiplesRelatedByParentId()
    {
        $this->collContactMultiplesRelatedByParentId = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactMultiplesRelatedByParentId collection.
     *
     * By default this just sets the collContactMultiplesRelatedByParentId collection to an empty array (like clearcollContactMultiplesRelatedByParentId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactMultiplesRelatedByParentId($overrideExisting = true)
    {
        if (null !== $this->collContactMultiplesRelatedByParentId && !$overrideExisting) {
            return;
        }
        $this->collContactMultiplesRelatedByParentId = new PropelObjectCollection();
        $this->collContactMultiplesRelatedByParentId->setModel('ContactMultiple');
    }

    /**
     * Gets an array of ContactMultiple objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Contact is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ContactMultiple[] List of ContactMultiple objects
     * @throws PropelException
     */
    public function getContactMultiplesRelatedByParentId($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContactMultiplesRelatedByParentId || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactMultiplesRelatedByParentId) {
                // return empty collection
                $this->initContactMultiplesRelatedByParentId();
            } else {
                $collContactMultiplesRelatedByParentId = ContactMultipleQuery::create(null, $criteria)
                    ->filterByContactRelatedByParentId($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContactMultiplesRelatedByParentId;
                }
                $this->collContactMultiplesRelatedByParentId = $collContactMultiplesRelatedByParentId;
            }
        }

        return $this->collContactMultiplesRelatedByParentId;
    }

    /**
     * Sets a collection of ContactMultipleRelatedByParentId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contactMultiplesRelatedByParentId A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContactMultiplesRelatedByParentId(PropelCollection $contactMultiplesRelatedByParentId, PropelPDO $con = null)
    {
        $this->contactMultiplesRelatedByParentIdScheduledForDeletion = $this->getContactMultiplesRelatedByParentId(new Criteria(), $con)->diff($contactMultiplesRelatedByParentId);

        foreach ($this->contactMultiplesRelatedByParentIdScheduledForDeletion as $contactMultipleRelatedByParentIdRemoved) {
            $contactMultipleRelatedByParentIdRemoved->setContactRelatedByParentId(null);
        }

        $this->collContactMultiplesRelatedByParentId = null;
        foreach ($contactMultiplesRelatedByParentId as $contactMultipleRelatedByParentId) {
            $this->addContactMultipleRelatedByParentId($contactMultipleRelatedByParentId);
        }

        $this->collContactMultiplesRelatedByParentId = $contactMultiplesRelatedByParentId;
    }

    /**
     * Returns the number of related ContactMultiple objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ContactMultiple objects.
     * @throws PropelException
     */
    public function countContactMultiplesRelatedByParentId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContactMultiplesRelatedByParentId || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactMultiplesRelatedByParentId) {
                return 0;
            } else {
                $query = ContactMultipleQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByContactRelatedByParentId($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactMultiplesRelatedByParentId);
        }
    }

    /**
     * Method called to associate a ContactMultiple object to this object
     * through the ContactMultiple foreign key attribute.
     *
     * @param    ContactMultiple $l ContactMultiple
     * @return   Contact The current object (for fluent API support)
     */
    public function addContactMultipleRelatedByParentId(ContactMultiple $l)
    {
        if ($this->collContactMultiplesRelatedByParentId === null) {
            $this->initContactMultiplesRelatedByParentId();
        }
        if (!$this->collContactMultiplesRelatedByParentId->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContactMultipleRelatedByParentId($l);
        }

        return $this;
    }

    /**
     * @param	ContactMultipleRelatedByParentId $contactMultipleRelatedByParentId The contactMultipleRelatedByParentId object to add.
     */
    protected function doAddContactMultipleRelatedByParentId($contactMultipleRelatedByParentId)
    {
        $this->collContactMultiplesRelatedByParentId[]= $contactMultipleRelatedByParentId;
        $contactMultipleRelatedByParentId->setContactRelatedByParentId($this);
    }

    /**
     * @param	ContactMultipleRelatedByParentId $contactMultipleRelatedByParentId The contactMultipleRelatedByParentId object to remove.
     */
    public function removeContactMultipleRelatedByParentId($contactMultipleRelatedByParentId)
    {
        if ($this->getContactMultiplesRelatedByParentId()->contains($contactMultipleRelatedByParentId)) {
            $this->collContactMultiplesRelatedByParentId->remove($this->collContactMultiplesRelatedByParentId->search($contactMultipleRelatedByParentId));
            if (null === $this->contactMultiplesRelatedByParentIdScheduledForDeletion) {
                $this->contactMultiplesRelatedByParentIdScheduledForDeletion = clone $this->collContactMultiplesRelatedByParentId;
                $this->contactMultiplesRelatedByParentIdScheduledForDeletion->clear();
            }
            $this->contactMultiplesRelatedByParentIdScheduledForDeletion[]= $contactMultipleRelatedByParentId;
            $contactMultipleRelatedByParentId->setContactRelatedByParentId(null);
        }
    }

    /**
     * Clears out the collContactGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addContactGroups()
     */
    public function clearContactGroups()
    {
        $this->collContactGroups = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collContactGroups collection.
     *
     * By default this just sets the collContactGroups collection to an empty array (like clearcollContactGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initContactGroups($overrideExisting = true)
    {
        if (null !== $this->collContactGroups && !$overrideExisting) {
            return;
        }
        $this->collContactGroups = new PropelObjectCollection();
        $this->collContactGroups->setModel('ContactGroup');
    }

    /**
     * Gets an array of ContactGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Contact is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|ContactGroup[] List of ContactGroup objects
     * @throws PropelException
     */
    public function getContactGroups($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collContactGroups || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactGroups) {
                // return empty collection
                $this->initContactGroups();
            } else {
                $collContactGroups = ContactGroupQuery::create(null, $criteria)
                    ->filterByContact($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collContactGroups;
                }
                $this->collContactGroups = $collContactGroups;
            }
        }

        return $this->collContactGroups;
    }

    /**
     * Sets a collection of ContactGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $contactGroups A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setContactGroups(PropelCollection $contactGroups, PropelPDO $con = null)
    {
        $this->contactGroupsScheduledForDeletion = $this->getContactGroups(new Criteria(), $con)->diff($contactGroups);

        foreach ($this->contactGroupsScheduledForDeletion as $contactGroupRemoved) {
            $contactGroupRemoved->setContact(null);
        }

        $this->collContactGroups = null;
        foreach ($contactGroups as $contactGroup) {
            $this->addContactGroup($contactGroup);
        }

        $this->collContactGroups = $contactGroups;
    }

    /**
     * Returns the number of related ContactGroup objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related ContactGroup objects.
     * @throws PropelException
     */
    public function countContactGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collContactGroups || null !== $criteria) {
            if ($this->isNew() && null === $this->collContactGroups) {
                return 0;
            } else {
                $query = ContactGroupQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByContact($this)
                    ->count($con);
            }
        } else {
            return count($this->collContactGroups);
        }
    }

    /**
     * Method called to associate a ContactGroup object to this object
     * through the ContactGroup foreign key attribute.
     *
     * @param    ContactGroup $l ContactGroup
     * @return   Contact The current object (for fluent API support)
     */
    public function addContactGroup(ContactGroup $l)
    {
        if ($this->collContactGroups === null) {
            $this->initContactGroups();
        }
        if (!$this->collContactGroups->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddContactGroup($l);
        }

        return $this;
    }

    /**
     * @param	ContactGroup $contactGroup The contactGroup object to add.
     */
    protected function doAddContactGroup($contactGroup)
    {
        $this->collContactGroups[]= $contactGroup;
        $contactGroup->setContact($this);
    }

    /**
     * @param	ContactGroup $contactGroup The contactGroup object to remove.
     */
    public function removeContactGroup($contactGroup)
    {
        if ($this->getContactGroups()->contains($contactGroup)) {
            $this->collContactGroups->remove($this->collContactGroups->search($contactGroup));
            if (null === $this->contactGroupsScheduledForDeletion) {
                $this->contactGroupsScheduledForDeletion = clone $this->collContactGroups;
                $this->contactGroupsScheduledForDeletion->clear();
            }
            $this->contactGroupsScheduledForDeletion[]= $contactGroup;
            $contactGroup->setContact(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Contact is new, it will return
     * an empty collection; or if this Contact has previously
     * been saved, it will retrieve related ContactGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Contact.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ContactGroup[] List of ContactGroup objects
     */
    public function getContactGroupsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ContactGroupQuery::create(null, $criteria);
        $query->joinWith('Group', $join_behavior);

        return $this->getContactGroups($query, $con);
    }

    /**
     * Clears out the collMaillingListContacts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMaillingListContacts()
     */
    public function clearMaillingListContacts()
    {
        $this->collMaillingListContacts = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Initializes the collMaillingListContacts collection.
     *
     * By default this just sets the collMaillingListContacts collection to an empty array (like clearcollMaillingListContacts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMaillingListContacts($overrideExisting = true)
    {
        if (null !== $this->collMaillingListContacts && !$overrideExisting) {
            return;
        }
        $this->collMaillingListContacts = new PropelObjectCollection();
        $this->collMaillingListContacts->setModel('MaillingListContact');
    }

    /**
     * Gets an array of MaillingListContact objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Contact is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return PropelObjectCollection|MaillingListContact[] List of MaillingListContact objects
     * @throws PropelException
     */
    public function getMaillingListContacts($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collMaillingListContacts || null !== $criteria) {
            if ($this->isNew() && null === $this->collMaillingListContacts) {
                // return empty collection
                $this->initMaillingListContacts();
            } else {
                $collMaillingListContacts = MaillingListContactQuery::create(null, $criteria)
                    ->filterByContact($this)
                    ->find($con);
                if (null !== $criteria) {
                    return $collMaillingListContacts;
                }
                $this->collMaillingListContacts = $collMaillingListContacts;
            }
        }

        return $this->collMaillingListContacts;
    }

    /**
     * Sets a collection of MaillingListContact objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      PropelCollection $maillingListContacts A Propel collection.
     * @param      PropelPDO $con Optional connection object
     */
    public function setMaillingListContacts(PropelCollection $maillingListContacts, PropelPDO $con = null)
    {
        $this->maillingListContactsScheduledForDeletion = $this->getMaillingListContacts(new Criteria(), $con)->diff($maillingListContacts);

        foreach ($this->maillingListContactsScheduledForDeletion as $maillingListContactRemoved) {
            $maillingListContactRemoved->setContact(null);
        }

        $this->collMaillingListContacts = null;
        foreach ($maillingListContacts as $maillingListContact) {
            $this->addMaillingListContact($maillingListContact);
        }

        $this->collMaillingListContacts = $maillingListContacts;
    }

    /**
     * Returns the number of related MaillingListContact objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      PropelPDO $con
     * @return int             Count of related MaillingListContact objects.
     * @throws PropelException
     */
    public function countMaillingListContacts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        if (null === $this->collMaillingListContacts || null !== $criteria) {
            if ($this->isNew() && null === $this->collMaillingListContacts) {
                return 0;
            } else {
                $query = MaillingListContactQuery::create(null, $criteria);
                if ($distinct) {
                    $query->distinct();
                }

                return $query
                    ->filterByContact($this)
                    ->count($con);
            }
        } else {
            return count($this->collMaillingListContacts);
        }
    }

    /**
     * Method called to associate a MaillingListContact object to this object
     * through the MaillingListContact foreign key attribute.
     *
     * @param    MaillingListContact $l MaillingListContact
     * @return   Contact The current object (for fluent API support)
     */
    public function addMaillingListContact(MaillingListContact $l)
    {
        if ($this->collMaillingListContacts === null) {
            $this->initMaillingListContacts();
        }
        if (!$this->collMaillingListContacts->contains($l)) { // only add it if the **same** object is not already associated
            $this->doAddMaillingListContact($l);
        }

        return $this;
    }

    /**
     * @param	MaillingListContact $maillingListContact The maillingListContact object to add.
     */
    protected function doAddMaillingListContact($maillingListContact)
    {
        $this->collMaillingListContacts[]= $maillingListContact;
        $maillingListContact->setContact($this);
    }

    /**
     * @param	MaillingListContact $maillingListContact The maillingListContact object to remove.
     */
    public function removeMaillingListContact($maillingListContact)
    {
        if ($this->getMaillingListContacts()->contains($maillingListContact)) {
            $this->collMaillingListContacts->remove($this->collMaillingListContacts->search($maillingListContact));
            if (null === $this->maillingListContactsScheduledForDeletion) {
                $this->maillingListContactsScheduledForDeletion = clone $this->collMaillingListContacts;
                $this->maillingListContactsScheduledForDeletion->clear();
            }
            $this->maillingListContactsScheduledForDeletion[]= $maillingListContact;
            $maillingListContact->setContact(null);
        }
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Contact is new, it will return
     * an empty collection; or if this Contact has previously
     * been saved, it will retrieve related MaillingListContacts from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Contact.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MaillingListContact[] List of MaillingListContact objects
     */
    public function getMaillingListContactsJoinMaillingList($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MaillingListContactQuery::create(null, $criteria);
        $query->joinWith('MaillingList', $join_behavior);

        return $this->getMaillingListContacts($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->parent_id = null;
        $this->civility_id = null;
        $this->service_id = null;
        $this->role = null;
        $this->title = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->maiden_name = null;
        $this->complement_name = null;
        $this->name = null;
        $this->short_name = null;
        $this->zone_id = null;
        $this->address1 = null;
        $this->address2 = null;
        $this->city = null;
        $this->postal_code = null;
        $this->country = null;
        $this->phone = null;
        $this->fax = null;
        $this->mobile = null;
        $this->email = null;
        $this->web = null;
        $this->comment = null;
        $this->hidden_comment = null;
        $this->birth_date = null;
        $this->birth_place = null;
        $this->birth_place_code = null;
        $this->is_archive = null;
        $this->archive_date = null;
        $this->archive_comment = null;
        $this->secu_number = null;
        $this->siret = null;
        $this->siren = null;
        $this->naf_code = null;
        $this->ape_code = null;
        $this->type = null;
        $this->created_at = null;
        $this->created_by = null;
        $this->updated_at = null;
        $this->updated_by = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collContactsRelatedById) {
                foreach ($this->collContactsRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContactMultiplesRelatedByContactId) {
                foreach ($this->collContactMultiplesRelatedByContactId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContactMultiplesRelatedByParentId) {
                foreach ($this->collContactMultiplesRelatedByParentId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collContactGroups) {
                foreach ($this->collContactGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMaillingListContacts) {
                foreach ($this->collMaillingListContacts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        if ($this->collContactsRelatedById instanceof PropelCollection) {
            $this->collContactsRelatedById->clearIterator();
        }
        $this->collContactsRelatedById = null;
        if ($this->collContactMultiplesRelatedByContactId instanceof PropelCollection) {
            $this->collContactMultiplesRelatedByContactId->clearIterator();
        }
        $this->collContactMultiplesRelatedByContactId = null;
        if ($this->collContactMultiplesRelatedByParentId instanceof PropelCollection) {
            $this->collContactMultiplesRelatedByParentId->clearIterator();
        }
        $this->collContactMultiplesRelatedByParentId = null;
        if ($this->collContactGroups instanceof PropelCollection) {
            $this->collContactGroups->clearIterator();
        }
        $this->collContactGroups = null;
        if ($this->collMaillingListContacts instanceof PropelCollection) {
            $this->collMaillingListContacts->clearIterator();
        }
        $this->collMaillingListContacts = null;
        $this->aContactRelatedByParentId = null;
        $this->aCivility = null;
        $this->aService = null;
        $this->asfGuardUserRelatedByCreatedBy = null;
        $this->asfGuardUserRelatedByUpdatedBy = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ContactPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {
        
   /* symfony 1.0 behavior
    *   Old symfony behavior engine.
    *   Moved from sfObjectBuilder::addCall
    *   By Colin Michoudet
    */
  try {
    if (!$callable = sfMixer::getCallable('BaseContact:'.$name))
    {
      throw new sfException(sprintf('Call to undefined method BaseContact::%s', $name));
    }
    array_unshift($params, $this);
    return call_user_func_array($callable, $params);
  } catch (sfException $e) {
    if (sfConfig::get('sf_logging_enabled')) {
      sfContext::getInstance()->getLogger()->debug('[symfony magic call] : ' . $e->getMessage());
    }
  }
  /* end symfony 1.0 behavior code */


        return parent::__call($name, $params);
    }

  /**
  * Returns a defaut text representation of this object.
  *
  * @return     string
  */
  public function sfcToString()
  {
    return (string) $this->getRole();
  }
  
  public function toStringWithType() {
    return $this->getMetadata('name') . ' : ' . $this->__toString();
  }

  public function exportTo($parser, $includeLazyLoadColumns = true) {
    if ($parser == constant(self::PEER . '::DEFAULT_STRING_FORMAT')) {
      return $this->sfcToString();
    } else {
      return parent::exportTo($parser);
    }
  }

	/**
	 * Returns a list of all modified fields of this object.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     array()
	 */
	public function getModifiedColumns()
	{
		return $this->modifiedColumns;
	}

	protected $skip_edited = false;

	/**
	 *
	 *
	 */
	public function setSkipEdited($skip) {
		$this->skip_edited = (bool) $skip;
	}

	/**
	 *
	 *
	 */
	public function isSkipEdited() {
		return $this->skip_edited;
	}

	/**
	 *
	 *
	 */
	public function getMetadata($info = null, $default = null) {
		return ContactPeer::getMetadata($info, $default, get_class($this));
	}
	public function getLinkTo($action = null, $target = null){
		return SurfaceLinkTo::create($this, $action, $target);
    }
	public function getSurfaceUrl($action = null, $target = null){
		return $this->getLinkTo($action, $target)->getUrl();
    }
	public function getToString(){
		return $this->__toString();
    }
} // BaseContact

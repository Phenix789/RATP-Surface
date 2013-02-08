<?php


/**
 * Skeleton subclass for representing a query for one of the subclasses of the 'sfc_abk_contact' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.surfaceContactPlugin.lib.model.om
 */
class BaseMoralPerson3Query extends MoralPersonQuery {

    /**
     * Returns a new MoralPerson3Query object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return MoralPerson3Query
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MoralPerson3Query) {
            return $criteria;
        }
        $query = new MoralPerson3Query();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Filters the query to target only MoralPerson3 objects.
     */
    public function preSelect(PropelPDO $con)
    {
        $this->addUsingAlias(ContactPeer::TYPE, ContactPeer::CLASSKEY_103);
    }

    /**
     * Filters the query to target only MoralPerson3 objects.
     */
    public function preUpdate(&$values, PropelPDO $con, $forceIndividualSaves = false)
    {
        $this->addUsingAlias(ContactPeer::TYPE, ContactPeer::CLASSKEY_103);
    }

    /**
     * Filters the query to target only MoralPerson3 objects.
     */
    public function preDelete(PropelPDO $con)
    {
        $this->addUsingAlias(ContactPeer::TYPE, ContactPeer::CLASSKEY_103);
    }

    /**
     * Issue a DELETE query based on the current ModelCriteria deleting all rows in the table
     * Having the MoralPerson3 class.
     * This method is called by ModelCriteria::deleteAll() inside a transaction
     *
     * @param PropelPDO $con a connection object
     *
     * @return integer the number of deleted rows
     */
    public function doDeleteAll($con)
    {
        // condition on class key is already added in preDelete()
        return parent::doDelete($con);
    }

} // BaseMoralPerson3Query

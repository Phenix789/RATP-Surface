<?php


/**
 * Skeleton subclass for representing a query for one of the subclasses of the 'stat_discrete_field' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.plugins.surfaceStatPlugin.lib.model.om
 */
class BaseDiscreteFieldIDQuery extends DiscreteFieldQuery {

    /**
     * Returns a new DiscreteFieldIDQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return DiscreteFieldIDQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DiscreteFieldIDQuery) {
            return $criteria;
        }
        $query = new DiscreteFieldIDQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Filters the query to target only DiscreteFieldID objects.
     */
    public function preSelect(PropelPDO $con)
    {
        $this->addUsingAlias(DiscreteFieldPeer::TYPE, DiscreteFieldPeer::CLASSKEY_1);
    }

    /**
     * Filters the query to target only DiscreteFieldID objects.
     */
    public function preUpdate(&$values, PropelPDO $con, $forceIndividualSaves = false)
    {
        $this->addUsingAlias(DiscreteFieldPeer::TYPE, DiscreteFieldPeer::CLASSKEY_1);
    }

    /**
     * Filters the query to target only DiscreteFieldID objects.
     */
    public function preDelete(PropelPDO $con)
    {
        $this->addUsingAlias(DiscreteFieldPeer::TYPE, DiscreteFieldPeer::CLASSKEY_1);
    }

    /**
     * Issue a DELETE query based on the current ModelCriteria deleting all rows in the table
     * Having the DiscreteFieldID class.
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

} // BaseDiscreteFieldIDQuery
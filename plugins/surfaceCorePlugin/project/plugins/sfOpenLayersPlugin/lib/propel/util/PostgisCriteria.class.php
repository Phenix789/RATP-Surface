<?php

class PostgisCriteria {
    // Comparaison operators
	const EQUAL		    = "=";
	const NOT_EQUAL	    = "<>";

	const DISTANCE 	    = "Distance";
	const EQUALS 		= "Equals";
	const DISJOINT 	    = "Disjoint";
	const TOUCHES 		= "Touches";
	const CROSSES 		= "Crosses";
    const WITHIN 		= "Within";
	const OVERLAPS 	    = "Overlaps";
	const CONTAINS 	    = "Contains";
    const INTERSERCT 	= "Intersects";
    const RELATE 		= "Relate";
    const BELOW 		= "below";
	
	const IS_EMPTY 	        = "IsEmpty";
	const IS_SIMPLE         = "IsSimple";
	const IS_CLOSED         = "IsClosed";
	const IS_RING  	        = "IsRing";
    
    // Functions
    const GET_AREA		    = "Area";
	const GET_LENGTH	    = "Length";	
	const GET_DIMENSION     = "Dimension";
	const GET_TYPE 	        = "GeometryType";

    public static function add($criteria, $p1, $value = null, $comparison = null) {
        self::updateCriteriaExParams($p1, $value, $comparison);

        return $criteria->add($p1, $value, $comparison);
    }
    
	public static function addOr($criteria, $p1, $p2 = null, $p3 = null) {
        self::updateCriteriaExParams($p1, $p2, $p3);

        return $criteria->addOr($p1, $p2, $p3);
	}
    
    public static function getNewCriterion($criteria, $column, $value, $comparison = null) {
        self::updateCriteriaExParams($column, $value, $comparison);
        
        return $criteria->getNewCriterion($column, $value, $comparison);
    }
    
    public static function addAsColumn($criteria, $name, $column, $value = null, $function) {
		$sql = self::getSql($column, $value, $function);
		if ($sql) {        
            return $criteria->addAsColumn($name, $sql);
        }
        
        return $criteria;
    }
    
    protected static function updateCriteriaExParams(&$p1, &$value, &$comparison) {
        if ($value) {
            if (self::isTableField($p1)) {
                $criteria_table_field = $p1;
            }
            else {
                $criteria_table_field = $value;
            }
        }
        else {
            $criteria_table_field = $p1;
        }        
        
		$sql = self::getSql($p1, $value, $comparison);
		if ($sql) {
            $p1 = $criteria_table_field;
            $value = $sql;
            $comparison = Criteria::CUSTOM;
        }
    }
    
    public static function getSql($column, $value, $operation) {
        $sql = null;
		$mode = null;
		
        switch ($operation) {
		// Geometry Relationship Functions
		case PostgisCriteria::EQUAL:
		case PostgisCriteria::NOT_EQUAL:
			$mode = "inline";
			break;
		case PostgisCriteria::DISTANCE :
		case PostgisCriteria::EQUALS :		
		case PostgisCriteria::DISJOINT :	
		case PostgisCriteria::TOUCHES :
		case PostgisCriteria::CROSSES :	
		case PostgisCriteria::WITHIN :		
		case PostgisCriteria::OVERLAPS :	
		case PostgisCriteria::CONTAINS :	
		case PostgisCriteria::INTERSERCT :	
		case PostgisCriteria::RELATE :
		case PostgisCriteria::BELOW :
            $mode = "args2";
            break;
        
		// Geometry Processing Functions
		case PostgisCriteria::GET_AREA :
		case PostgisCriteria::GET_LENGTH :
		case PostgisCriteria::GET_DIMENSION :
		case PostgisCriteria::GET_TYPE :
		case PostgisCriteria::IS_EMPTY :
		case PostgisCriteria::IS_SIMPLE :
		case PostgisCriteria::IS_CLOSED :
		case PostgisCriteria::IS_RING :
            $mode = "args1";
            break;
		}

		if ($mode == "inline") {
            $sql = sprintf("%s%s%s", self::textToGeom($column), $operation, self::textToGeom($value));
		}
		elseif ($mode == "args2") {
            $sql = sprintf("%s(%s, %s)", $operation, self::textToGeom($column), self::textToGeom($value));
        }
		elseif ($mode == "args1") {
            $sql = sprintf("%s(%s)", $operation, self::textToGeom($column));
        }
        
        return $sql;
    }
    
    protected static function isTableField($value) {
        return (is_string($value) && (preg_match('/^[^.]+\.[^.]+$/', $value) == 1));
    }
    
    protected static function textToGeom($value) {
        if (is_array($value)) {
            return sprintf("GeometryFromText('%s', %d)", $value[0], $value[1]);
        }
        elseif (self::isTableField($value)) {
            return $value;
        }
        else {
            return sprintf("GeometryFromText('%s')", $value);                
        }
    }
}

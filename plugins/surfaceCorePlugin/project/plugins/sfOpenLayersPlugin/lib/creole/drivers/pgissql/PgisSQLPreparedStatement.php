<?php

class PgisSQLPreparedStatement extends PgSQLPreparedStatement {
    
    public function setGeometryValue($paramIndex, $value, $srid = null) {
        if (($value === null) || !$value) {
            $this->setNull($paramIndex);
        }
        else {
            //if (is_object($blob)) {
            //    $blob = $blob->__toString();
            //}
            $this->boundInVars[$paramIndex] = "GeometryFromText('" . $this->escape( $value ) . "', " . ($srid? $srid : -1).")";
        }
    }
    
}

<?php
/*
 *  $Id: PgSQLPreparedStatement.php,v 1.14 2005/04/16 18:55:28 hlellelid Exp $
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://creole.phpdb.org>.
 */
 
include_once 'creole/drivers/pgsql/PgSQLPreparedStatement.php';

/**
 * PgSQL subclass for prepared statements.
 * 
 * @author Hans Lellelid <hans@xmpl.org>
 * @version $Revision: 1.14 $
 * @package creole.drivers.pgsql
 */
class PgiSQLPreparedStatement extends PgSQLPreparedStatement {
    
    /**
     * For setting value of Postgres BOOLEAN column.
     * @param int $paramIndex
     * @param boolean $value
     * @return void
     */
    function setGeometry($paramIndex, $value) {
	    $this->sql_cache_valid = false;
        if (($value === null) || ($value === '')) {
            $this->setNull($paramIndex);
        } else {
            if (is_array($value) && (count($value) == 2)) {
                if ($value[0]) {
                    $this->boundInVars[$paramIndex] = "GeometryFromText('" . $this->escape( $value[0] ) . "', " . $value[1].")";
                }
                else {
                    $this->setNull($paramIndex);
                }
            }
            else {
                $this->boundInVars[$paramIndex] = "GeometryFromText('" . $this->escape( $value ) . "', -1)";
            }
        }
    }
}

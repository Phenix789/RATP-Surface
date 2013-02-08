<?php
/*
 *  $Id: PgSQLConnection.php,v 1.21 2005/08/03 17:56:22 hlellelid Exp $
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
 
include_once 'creole/drivers/pgsql/PgSQLConnection.php';
include_once 'PgiSQLResultSet.php';

/**
 * PgSQL implementation of Connection.
 * 
 * @author    Hans Lellelid <hans@xmpl.org> (Creole)
 * @author    Stig Bakken <ssb@fast.no> (PEAR::DB)
 * @author    Lukas Smith (PEAR::MDB)
 * @version   $Revision: 1.21 $
 * @package   creole.drivers.pgsql
 */ 
class PgiSQLConnection extends PgSQLConnection {
    
    /**
     * @see Connection::simpleQuery()
     */
    function executeQuery($sql, $fetchmode = null)
    {
        $result = @pg_query($this->dblink, $sql);
        if (!$result) {
            throw new SQLException('Could not execute query', pg_last_error($this->dblink), $sql);
        }
        $this->result_affected_rows = (int) @pg_affected_rows($result);

        return new PgiSQLResultSet($this, $result, $fetchmode);
    }
    
    /**
     * @see Connection::getDatabaseInfo()
     */
    //public function getDatabaseInfo()
    //{
    //    require_once 'PgiSQLDatabaseInfo.php';
    //    return new PgiSQLDatabaseInfo($this);
    //}
    
    /**
     * @see Connection::getIdGenerator()
     */
    //public function getIdGenerator()
    //{
    //    require_once 'PgiSQLIdGenerator.php';
    //    return new PgiSQLIdGenerator($this);
    //}
    
    /**
     * @see Connection::prepareStatement()
     */
    public function prepareStatement($sql) 
    {
        require_once 'PgiSQLPreparedStatement.php';
        return new PgiSQLPreparedStatement($this, $sql);
    }
    
    /**
     * @see Connection::createStatement()
     */
    //public function createStatement()
    //{
    //    require_once 'PgiSQLStatement.php';
    //    return new PgiSQLStatement($this);
    //}
}

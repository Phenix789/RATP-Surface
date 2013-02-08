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
 
require_once 'creole/Connection.php';
//require_once 'creole/common/ConnectionCommon.php';
//include_once 'creole/drivers/pgsql/PgSQLResultSet.php';

/**
 * PgSQL implementation of Connection.
 * 
 * @author    Hans Lellelid <hans@xmpl.org> (Creole)
 * @author    Stig Bakken <ssb@fast.no> (PEAR::DB)
 * @author    Lukas Smith (PEAR::MDB)
 * @version   $Revision: 1.21 $
 * @package   creole.drivers.pgsql
 */ 
class PgisSQLConnection implements Connection {
    protected $baseConnection;
    
    public function __construct($con) {
        $this->baseConnection = $con;
    }

    public function connect($dsn, $flags = false) {
        return $this->baseConnection->connect($dsn, $flags);
    }
    
    public function getResource() {
        return $this->baseConnection->getResource();
    }
        
    public function getFlags() {
        return $this->baseConnection->getFlags();
    }
    
    public function getDSN() {
        return $this->baseConnection->getDSN();
    }
    
    public function getDatabaseInfo() {
        return $this->baseConnection->getDatabaseInfo();
        
        // return new PgisSQLDatabaseInfo($this);
    }
    
    public function getIdGenerator() {
        return $this->baseConnection->getIdGenerator();
    }
    
    public function prepareStatement($sql) {
        // return $this->baseConnection->prepareStatement($sql);
        return new PgisSQLPreparedStatement($this, $sql);
    }
    
    public function createStatement() {
        return $this->baseConnection->createStatement();
        // return new PgisSQLStatement();
    }
    
    public function applyLimit(&$sql, $offset, $limit) {
        return $this->baseConnection->applyLimit($sql, $offset, $limit);
    }
    
    public function executeQuery($sql, $fetchmode = null) {
        return $this->baseConnection->executeQuery($sql, $fetchmode);
    }

    public function executeUpdate($sql) {
        return $this->baseConnection->executeUpdate($sql);
    }
    
    public function prepareCall($sql) {
        return $this->baseConnection->prepareCall($sql);
    }
    
    public function close() {
        return $this->baseConnection->close();
    }
    
    public function isConnected() {
        return $this->baseConnection->isConnected();
    }
    
    public function getAutoCommit() {
        return $this->baseConnection->isConnected();
    }
    
    public function setAutoCommit($bit) {
        return $this->baseConnection->setAutoCommit($bit);
    }
    
    public function begin() {
        return $this->baseConnection->begin();
    }
    
    public function commit() {
        return $this->baseConnection->commit();
    }
    
    public function rollback() {
        return $this->baseConnection->rollback();
    }
    
    public function getUpdateCount() {
        return $this->baseConnection->isConnected();
    }
    
}

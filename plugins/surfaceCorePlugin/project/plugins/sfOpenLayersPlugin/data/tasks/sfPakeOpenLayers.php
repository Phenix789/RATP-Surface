<?php

pake_desc('load shape file in new database table');
pake_task('gis-load-shape', 'app_exists');

function run_gis_load_shape($task, $args) {
    if (count($args) < 2) {
        throw new Exception('You must provide a shape file.');
    }
    if (count($args) < 3) {
        throw new Exception('You must provide a table name.');
    }
    
    $app         = $args[0];
    $shape_file  = $args[1];
    $table_name  = $args[2];
    $action      = "-c";
    $encoding    = "LATIN1";
    
    if (strpos($shape_file, '/') === FALSE) {
        $shape_file = 'data/carto/'.$shape_file;
    }
    
    $sql_file = preg_replace('/([^.]+)(\.shp)/i', '$1.sql', $shape_file);
    
    // create sql file
    $content = pake_sh('shp2pgsql '.$action.' -W '.$encoding.' '.$shape_file.' '.$table_name);

    file_put_contents($sql_file, $content);
    pake_echo_action('file+', $sql_file);
    
    // load sql in database
    // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         $app);
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
   
    // get configuration
    require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
    
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();

    /*
    $con = Propel::getConnection('propel');
    try
    {
      $con->begin();
      $con->executeUpdate($content);
      $con->commit();
    }
    catch (Exception $e)
    {
        $con->rollback();
        // throw new pakeException(sprintf('Problem executing command %s', $verbose ? "\n".$content : ''));
        // throw $e;
    }
    */
}

pake_desc('add geometry column in a database table');
pake_task('gis-propel-geometry-add', 'app_exists');

function run_gis_propel_geometry_add($task, $args) {
    $allowed_types = array('POINT', 'LINESTRING', 'POLYGON', 'MULTIPOINT', 'MULTILINESTRING', 'MULTIPOLYGON', 'GEOMETRY', 'GEOMETRYCOLLECTION', );

    if (count($args) < 2) {
        throw new Exception('You must provide a table name.');
    }
    if (count($args) < 3) {
        throw new Exception('You must provide a new column name.');
    }
    if (count($args) < 4) {
        throw new Exception('You must provide a geometry projection (srid), -1 for unknown.');
    }
    if (count($args) < 5) {
        throw new Exception('You must provide a geometry type ('.implode(", ", $allowed_types).').');
    }
    if (count($args) < 6) {
        throw new Exception('You must provide a geometry dimension (1, 2 or 3).');
    }

    
    $app            = $args[0];
    $table_name     = $args[1];
    $column_name    = $args[2];
    $geom_srid      = $args[3];
    $geom_type      = strtoupper($args[4]);
    $geom_dimension = $args[5];

    if (!in_array($geom_type, $allowed_types)) {
        throw new Exception("Unknowned type '".$geom_type."' ! Allowed types are ".implode(", ", $allowed_types).".");
    }

    // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         $app);
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
   
    // get configuration
    require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
    
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();

    $sql = "SELECT addgeometrycolumn('".$table_name."', '".$column_name."', ".$geom_srid.", '".$geom_type."', ".$geom_dimension.");"; 

    $con = Propel::getConnection('propel');

    pake_echo_action('geometry+', $table_name.".".$column_name);
    
    $con->begin();
    $con->executeUpdate($sql);
    $con->commit();
}

pake_desc('drop a geometry column of a database table');
pake_task('gis-propel-geometry-drop', 'app_exists');

function run_gis_propel_geometry_drop($task, $args) {
    if (count($args) < 2) {
        throw new Exception('You must provide a table name.');
    }
    if (count($args) < 3) {
        throw new Exception('You must provide a new column name.');
    }
    
    $app            = $args[0];
    $table_name     = $args[1];
    $column_name    = $args[2];
   
    // load sql in database
    // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         $app);
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
   
    // get configuration
    require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
    
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();

    $sql = "SELECT dropgeometrycolumn('".$table_name."', '".$column_name."');"; 

    $con = Propel::getConnection('propel');

    pake_echo_action('geometry-', $table_name.".".$column_name);
    
    $con->begin();
    $con->executeUpdate($sql);
    $con->commit();
}

pake_desc('add a geometry index on a table\'s geometry column');
pake_task('gis-propel-geometry-index-add', 'app_exists');

function run_gis_propel_geometry_index_add($task, $args) {
    if (count($args) < 2) {
        throw new Exception('You must provide a table name.');
    }
    if (count($args) < 3) {
        throw new Exception('You must provide an existing column name.');
    }
    if (count($args) < 4) {
        throw new Exception('You must provide a new index name.');
    }
    
    $app            = $args[0];
    $table_name     = $args[1];
    $column_name    = $args[2];
    $index_name     = $args[3];
    
    // load sql in database
    // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         $app);
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
   
    // get configuration
    require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
    
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();

    $sql = "CREATE INDEX '".$index_name."' ON '".$table_name."' USING GIST ('".$column_name."');"; 
    
    $con = Propel::getConnection('propel');

    pake_echo_action('geometry index+', $index_name." ON ".$table_name.".".$column_name);
    
    $con->begin();
    $con->executeUpdate($sql);
    $con->commit();
}

pake_desc('drop a geometry index of a table');
pake_task('gis-propel-geometry-index-drop', 'app_exists');

function run_gis_propel_geometry_index_drop($task, $args) {
    if (count($args) < 2) {
        throw new Exception('You must provide an existing index name.');
    }
    
    $app            = $args[0];
    $index_name     = $args[1];
    
    // load sql in database
    // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         $app);
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
   
    // get configuration
    require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
    
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();

    $sql = "DROP INDEX '".$index_name."';"; 
    
    $con = Propel::getConnection('propel');

    pake_echo_action('geometry index-', $index_name);
    
    $con->begin();
    $con->executeUpdate($sql);
    $con->commit();
}

pake_desc('cluster a geometry index');
pake_task('gis-propel-geometry-index-cluster', 'app_exists');

function run_gis_propel_geometry_index_cluster($task, $args) {
    if (count($args) < 2) {
        throw new Exception('You must provide a table name.');
    }
    if (count($args) < 3) {
        throw new Exception('You must provide an existing column name.');
    }
    if (count($args) < 4) {
        throw new Exception('You must provide an existing index name.');
    }
    
    $app            = $args[0];
    $table_name     = $args[1];
    $index_name     = $args[2];
    $column_name    = $args[3];
    
    // load sql in database
    // define constants
    define('SF_ROOT_DIR',    sfConfig::get('sf_root_dir'));
    define('SF_APP',         $app);
    define('SF_ENVIRONMENT', 'dev');
    define('SF_DEBUG',       true);
   
    // get configuration
    require_once SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps'.DIRECTORY_SEPARATOR.SF_APP.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php';
    
    $databaseManager = new sfDatabaseManager();
    $databaseManager->initialize();

    $sql  = "ALTER TABLE '".$table_name."' ALTER COLUMN '".$column_name."' SET NOT NULL;";
    $sql .= "CLUSTER '".$index_name."' ON '".$table_name."';"; 
    
    $con = Propel::getConnection('propel');

    pake_echo_action('geometry index clustered', $index_name." ON ".$table_name.".".$column_name);
    
    $con->begin();
    $con->executeUpdate($sql);
    $con->commit();
}











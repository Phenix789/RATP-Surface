<?php

pake_desc('retile raster layers files in pyramid');
pake_task('gdal-pyramid');

function run_gdal_pyramid($task, $args) {
    if (count($args) < 1) {
        throw new Exception('You must provide a source name.');
    }
    
    if (count($args) < 2) {
        throw new Exception('You must provide the source files extension (ex : tif).');
    }
    
    if (count($args) < 3) {
        throw new Exception('You must provide the generated tiles size.');
    }
    
    $source_name  = $args[0];
    $source_ext   = $args[1];
    $tile_size    = $args[2];
    $level_count  = (isset($args[3])? $args[3] : 9);
    
    $shape_path = sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . "carto/shapes/";
    $src_path  = $shape_path . "sources/" . $source_name;
    $dest_path = $shape_path . $source_name . '_pyramid';

    $retile_cmd = sprintf("gdal_retile.py -levels %d -ps %d %d -targetDir %s %s/*.%s",
                          $level_count,
                          $tile_size, $tile_size,
                          $dest_path,
                          $src_path,
                          $source_ext);

    pake_deltree($dest_path);
    $indexes = glob($shape_path.$source_name.'_p*.*');
    foreach ($indexes as $index) {
        pake_remove($index, $shape_path);
    }
    
    pake_mkdirs($dest_path);
    
    pake_echo_action('gdal+', "Generating pyramid files...");
    pake_echo("    from $src_path");
    pake_echo("    to   $dest_path");
    pake_sh($retile_cmd);
    
    pake_echo_action('gdal+', "Indexing pyramid files...");
    pake_echo("Indexing pyramid files...");
    
    $index_cmd = sprintf("gdaltindex -write_absolute_path %s_p00.shp %s/*.tif",
                         $shape_path . $source_name,
                         $dest_path);
    pake_sh($index_cmd);
    
    for ($lvl = 1; $lvl <= $level_count; $lvl++) {
        $index_cmd = sprintf("gdaltindex -write_absolute_path %s_p%02d.shp %s/%d/*.tif",
                             $shape_path . $source_name,
                             $lvl,
                             $dest_path,
                             $lvl);
        pake_sh($index_cmd);        
    }
}

pake_desc('index raster layers files');
pake_task('gdal-index');

function run_gdal_index($task, $args) {
    if (count($args) < 1) {
        throw new Exception('You must provide a source name.');
    }
    
    if (count($args) < 2) {
        throw new Exception('You must provide the source files extension (ex : tif).');
    }
    
    $source_name  = $args[0];
    $source_ext   = $args[1];
    
    $shape_path = sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . "carto/shapes/";
    $src_path  = $shape_path . "sources/" . $source_name;
    $dest_path = $shape_path . $source_name;

    $indexes = glob($dest_path.'.*');
    foreach ($indexes as $index) {
        pake_remove($index, $shape_path);
    }
    
    pake_echo_action('gdal+', "Indexing files...");

    $index_cmd = sprintf("gdaltindex -write_absolute_path %s.shp %s/*.%s",
                         $dest_path,
                         $src_path,
                         $source_ext);
    pake_sh($index_cmd);
}
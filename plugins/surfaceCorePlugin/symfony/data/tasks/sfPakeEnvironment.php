<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

pake_desc('synchronise project with another machine');
pake_task('sync', 'project_exists');

function run_sync($task, $args)
{
  if (!count($args))
  {
    throw new Exception('You must provide an environment to synchronize.');
  }

  $env = $args[0];

  $dryrun = isset($args[1]) ? $args[1] : false;

  if (!file_exists('config/rsync_exclude.txt'))
  {
    throw new Exception('You must create a rsync_exclude file for your project.');
  }

  $host = $task->get_property('host', $env);
  $dir  = $task->get_property('dir', $env);
  try
  {
    $user = $task->get_property('user', $env).'@';
  }
  catch (pakeException $e)
  {
    $user = '';
  }

  if (substr($dir, -1) != '/')
  {
    $dir .= '/';
  }

  $ssh = 'ssh';

  try
  {
    $port = $task->get_property('port', $env);
    $ssh = '"ssh -p'.$port.'"';
  }
  catch (pakeException $e) {}

  try
  {
    $parameters = $task->get_property('parameters', $env);
  }
  catch (pakeException $e)
  {
    $parameters = '-azCc --force --delete';
    if (file_exists('config/rsync_exclude.txt'))
    {
      $parameters .= ' --exclude-from=config/rsync_exclude.txt';
    }

    if (file_exists('config/rsync_include.txt'))
    {
      $parameters .= ' --include-from=config/rsync_include.txt';
    }

    if (file_exists('config/rsync.txt'))
    {
      $parameters .= ' --files-from=config/rsync.txt';
    }
  }

  $dry_run = ($dryrun == 'go' || $dryrun == 'ok') ? '' : '--dry-run';

  if($dry_run == ''){
		$file_text = '';

		// Retrieve current Linux user
		$sub_result = exec('users');
		$sync_by = array_pop(explode(" ", $sub_result));
		$properties_file = "./config/properties.ini";
		
		if(file_exists($properties_file)){
                        $params = parse_ini_file($properties_file, true);
                        
                        if($params[$env] && $params = ($params[$env])){
                            $sync_history = './data/sync/sync_history.ini';
                            $file_text['sync_by'] =  $sync_by;
                            
                            $file_text['sync_at'] =  date('d/m/Y à H:i');

                            $file_text['host'] = $params['host'];

                            $file_text['user'] =  $params['user'];

                            $file_text['dir'] = $params['dir'];


                            $ini_parameters[time()] = $file_text;
                            write_ini_file($ini_parameters, $sync_history, true);
                        }
		}
    }
        
  $cmd = "rsync --progress $dry_run $parameters -e $ssh ./ $user$host:$dir";

  echo pake_sh($cmd);
}


function write_ini_file($assoc_arr, $path, $has_sections=FALSE) { 
    $content = ""; 
    if ($has_sections) { 
        foreach ($assoc_arr as $key=>$elem) { 
            $content .= "[".$key."]\n"; 
            foreach ($elem as $key2=>$elem2) { 
                if(is_array($elem2)) 
                { 
                    for($i=0;$i<count($elem2);$i++) 
                    { 
                        $content .= $key2."[] = \"".$elem2[$i]."\"\n"; 
                    } 
                } 
                else if($elem2=="") $content .= $key2." = \n"; 
                else $content .= $key2." = \"".$elem2."\"\n"; 
            } 
        } 
    } 
    else { 
        foreach ($assoc_arr as $key=>$elem) { 
            if(is_array($elem)) 
            { 
                for($i=0;$i<count($elem);$i++) 
                { 
                    $content .= $key2."[] = \"".$elem[$i]."\"\n"; 
                } 
            } 
            else if($elem=="") $content .= $key2." = \n"; 
            else $content .= $key2." = \"".$elem."\"\n"; 
        } 
    } 

    if (!$handle = fopen($path, 'a')) { 
        return false; 
    } 
    if (!fwrite($handle, $content)) { 
        return false; 
    }
	
    fclose($handle); 
    return true; 
}

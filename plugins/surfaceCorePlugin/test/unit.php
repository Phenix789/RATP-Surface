<?php

namespace tests\units;

define('SF_ROOT_DIR', realpath(dirname(__FILE__).'/../../..'));
define('SF_APP',         'dashboard');
define('SF_ENVIRONMENT', 'dev');
define('SF_DEBUG',       true);

include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');
require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
\sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);

require_once __DIR__.'/mageekguy.atoum.phar';

use \mageekguy\atoum;

abstract class sfcTest extends atoum\test {

}
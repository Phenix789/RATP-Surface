<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardAuthActions.class.php 5003 2007-09-08 08:42:27Z fabien $
 */
class BaseHelpActions extends sfSurfaceActions {
	
	public function executeIndex() {
		$this->datas = null;
		$sync_file = SF_ROOT_DIR. '/data/sync/sync_history.ini';
		
		if(file_exists($sync_file)){
			$parameters = parse_ini_file($sync_file, true);
			
			$params = array_pop($parameters);
			$this->datas = $params;
		}
	}
}
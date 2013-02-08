[?php

/**
 * <?php echo $this->getGeneratedModuleName() ?> components.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>

 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 300 2007-10-23 15:18:49Z romain $
 */
 
 
/**
 * <?php echo $this->getGeneratedModuleName() ?> components.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>

 * @author     ELOGYS/FRANKONCEPT
 */
 
class <?php echo $this->getGeneratedModuleName() ?>Components extends sfComponents
{

protected $surface_namespace = '<?php echo $this->getSurfaceNamespace() ?>';

    /**
     *  Params :
     *      action_name :   Name of the action (edit, show, create...)
     *                 
     */
    public function executeFlash_messages() {
        switch ($this->action_name) {
        case 'create' :
        case 'edit' :
        case 'show' :
        case 'delete_confirm' :
            $action_name = $this->action_name . '_fields';
            break;
        default :
            $action_name = $this->action_name;
        }
        
        $this->labels = $this->getLabels($action_name);
    }
    
    /**
     *
     *
     */
    public function executeShow_update_info() {
    }
    
    protected function getLabels($actionName) {
        switch ($actionName) {
    <?php $components = $this->getComponentInfo(); ?>
    <?php foreach ($components as $component_name => $params): ?>
        case '<?php echo $component_name; ?>':
            return array(
        <?php foreach ($this->getColumnCategories($params['generator_key']) as $category => $categoty_data): ?>
        <?php foreach ($this->getColumns($params['generator_key'].'.display', $category) as $name => $column): ?>
            <?php if (is_object($column)): ?>
                '<?php echo $this->getSingularName() ?>{<?php echo $column->getName() ?>}' => '<?php $label_name = str_replace("'", "\\'", $this->getParameterValue($params['generator_key'].'.fields.'.$column->getName().'.name')); echo $label_name ?><?php if ($label_name): ?>:<?php endif ?>',
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>
                );
          break;      
    <?php endforeach; ?>
        }
        
        return array();
    }


    /**
     * @brief Complete le criteria utilisé pour la search bar
     * @param Criteria $criteria le criteria utilisé
     * @param string $search le parametre de recherche
     *
     * Cette fonction complete le criteria qui sera utilisé pour retrouver tout
     * les elements a afficher dans la search bar. Cette fonction est généré
     * automatiquement en prenant en compte les parametres donnés dans le tag
     * 'searchable' du component search_bar dans le generator.yml
     *
     */
    protected function addSearchBarCriteria(Criteria $criteria, $search) {
	<?php if($this->getParameterValue('components.search_bar.searchable')) : ?>
		<?php $first = true ?>
		<?php foreach($this->getColumns('components.search_bar.searchable') as $column) : ?>
			<?php if(is_object($column) && is_object($column->getTable())) : ?>
				<?php
					$column_const = $column->getTable()->getPhpName() . 'Peer::' . $column->getColumnName();
					if(	$column->getCreoleType() == CREOLETYPES::VARCHAR ||
						$column->getCreoleType() == CREOLETYPES::LONGVARCHAR
							) {
						$value = '\'%\' . $search . \'%\'';
						$criteria_const = 'CRITERIA::LIKE';
					}
					else {
						$value = '$search';
						$criteria_const = 'CRITERIA::EQUAL';
					}
				?>
				<?php if($first) : ?>
					$criterion = $criteria->getNewCriterion(<?php echo $column_const ?>, <?php echo $value ?>, <?php echo $criteria_const ?>);
					<?php $first = false ?>
				<?php else : ?>
					$criterion->addOr($criteria->getNewCriterion(<?php echo $column_const ?>, <?php echo $value ?>, <?php echo $criteria_const ?>));
				<?php endif ?>
			<?php endif ?>
		<?php endforeach ?>
	$criteria->add($criterion);
	<?php endif ?>
	return $criteria;
    }

    protected function addSortCriteria($list_target, $c, $generator_key = 'list') {
		$sort = $this->getGeneratorParameter("{$generator_key}.sort");
        $sort_column = $this->getUser()->getAttribute('sort', get(0, $sort, $sort), "sf_admin/{$this->surface_namespace}/{$list_target}/sort");
        $sort_order = $this->getUser()->getAttribute('type', get(1, $sort, 'asc'), "sf_admin/{$this->surface_namespace}/{$list_target}/sort");
    
        if ($sort_column) {
            try { 
                $sort_column = <?php echo $this->getClassName() ?>Peer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
                if ($sort_order == 'asc') {
                    $c->addAscendingOrderByColumn($sort_column);
                } else {
                    $c->addDescendingOrderByColumn($sort_column);
                }
            } catch (PropelException $e) {
                $this->addCustomSortCriteria($c, $sort_column, ($this->getUser()->getAttribute('type', $sort_order, "sf_admin/{$this->surface_namespace}/{$list_target}/sort") == 'asc'));
            } 
        }
		<?php $pk = $this->getPrimaryKey(); if(count($pk) == 1 && $pk[0]->getColumnName() == 'ID') : ?>
		if($sort_column != <?php echo $this->getPeerClassName() ?>::ID) {
			$c->addDescendingOrderByColumn(<?php echo $this->getPeerClassName() ?>::ID);
		}
		<?php endif ?>
    }
    
    protected function addCustomSortCriteria($c, $column_name, $bAsc) {
    }
    
    /**
     *  Params :
     *      <?php echo $this->getModuleName() ?> :  Object to display basket
     *      basket_key:                             Basket key
     *                 
     */
    public function executeBasket_show() {
		$this->module_name = '<?php echo $this->getModuleName() ?>';
		$this->component_name = 'basket_show';
		if(!isset($this->singular_name)){
			$this->singular_name = '<?php echo $this->getSingularName() ?>';
		}
		if(!isset($this->object)){
			if(isset($this-><?php echo $this->getSingularName() ?>)){
				$this->object = $this-><?php echo $this->getSingularName() ?>;
			}
		} else {
			$this-><?php echo $this->getSingularName() ?> = $this->object;
		}
        $this->basket = sfSurfaceBasketHolder::get($this->basket_key);
        
        if (!isset($this->search_url)) {
            $this->search_url = '<?php echo $this->getModuleName() ?>/list';
        }
        
        $this->options = array();
        if (isset($this->search_module) && $this->search_module) {
            $this->options['search_module'] = $this->search_module;
        }
        
        if (!isset($this->open_name)) {
            $this->open_name = "open";
        }
        if (!isset($this->close_name)) {
            $this->close_name = "save";
        }
        if (!isset($this->cancel_name)) {
            $this->cancel_name = "cancel";
        }
        if (!isset($this->remove_item_name)) {
            $this->remove_item_name = "remove";
        }
        if (!isset($this->remove_item_icon)) {
            $this->remove_item_icon = sfConfig::get('sf_admin_web_dir').'/images/cancel.png';
        }
    }
    
<?php $components = $this->getComponentInfo(); ?>
<?php foreach ($components as $name => $params): ?>
<?php if ($params['type'] == 'list'): ?>
    protected function get<?php echo ucfirst($name); ?>PagerSteps($pager, $max_per_page) {
        $pager_steps = <?php echo var_export($this->getParameterPagerSteps($params['generator_key']), true) ?>;
        $count = $pager->getNbResults();
        if ($pager_steps && ($count > 0)) {   
            if (!isset($pager_steps[$max_per_page])) {
                $pager_steps[$max_per_page] = $max_per_page;
                ksort($pager_steps, SORT_NUMERIC);
            }
            
            /*
            //Permet de supprimer des éléments inutiles?
            foreach ($pager_steps as $key => $val) {
                if (((double)$val / (double)$count) >= 1.2) {
                   unset($pager_steps[$key]);
                }
            }*/
            
            $first = reset($pager_steps); $last = end($pager_steps);
            if (($first !== FALSE) && ($last !== FALSE) && (($last + $first) > $count) && ($count > $last)) {
                $pager_steps[$last + $first] = $last + $first;
            }
        }
        
        return $pager_steps;
    }

    /**
     *  Params :
     *      list_target:    DOM id of the list container
     *    OPTIONNAL
     *      page_num :      Index of displayed page ( >= 1)
     *      criteria :      Filter criteria
     *      max_per_page :  Numbers of rows per page (use generator.yml for default value)
     *
     */
    public function execute<?php echo ucfirst($name); ?>(){
		$this->unique_id = '<?php echo $this->getModuleName().'_'.$name ?>';
		$this->module_name = '<?php echo $this->getModuleName() ?>';
		$this->component_name = '<?php echo $name ?>';
		if(!isset($this->singular_name)){
			$this->singular_name = '<?php echo $this->getSingularName() ?>';
		}
		if(!isset($this->noscript)){
			$this->noscript = false;
		}
		
        if (!isset($this->list_target)) {
            $this->list_target = $this->getRequestParameter('list_target', 'tg_'.$this->unique_id);
        }

        if (!isset($this->component_class_update)) {
            $this->component_class_update = '<?php echo $this->getParameterValue($params['generator_key'].'.component_class_update', $this->getModuleName()) ?>';
        }
        
        if (!isset($this->batch_actions)) {
            $this->batch_actions = array();
            <?php $batch_actions = $this->getParameterValue($params['generator_key'].'.batch_actions', array()); ?>
            <?php foreach ($batch_actions as $actionName => $actionParams): ?>
                <?php $actionParams = $this->getParameterValue($params['generator_key'].'.batch_actions.'.$actionName, array()); ?>
                <?php $actionName = (($actionName[0] == '_')? substr($actionName, 1) : $actionName); ?>
                
                <?php $actionLabel = (isset($actionParams['name']))? $actionParams['name'] : sfInflector::humanize($actionName); ?>

            $sf_user = $this->getUser();
                <?php if (isset($actionParams['credentials'])): ?>
            if ($sf_user->hasCredentialEx(<?php echo str_replace("\n", ' ', var_export($actionParams['credentials'], true)); ?>, null)) {
                <?php endif; ?>
                $this->batch_actions['<?php echo $actionName ?>'] = '<?php echo $actionLabel ?>';
                <?php if (isset($actionParams['credentials'])): ?>
            }
                <?php endif; ?>
             
            <?php endforeach; ?>
        }
        if (!isset($this->batch_confirms)) {
            $this->batch_confirms = array(); 
            <?php $batch_actions = $this->getParameterValue($params['generator_key'].'.batch_actions', array()); ?>
            <?php foreach ($batch_actions as $actionName => $actionParams): ?>
                <?php $actionParams = $this->getParameterValue($params['generator_key'].'.batch_actions.'.$actionName, array()); ?>
                <?php $actionParams = isset($actionParams['params'])? $actionParams['params'] : array(); ?>
                <?php if (is_string($actionParams)): ?>
                    <?php $actionParams = sfToolkit::stringToArray($actionParams); ?>
                <?php endif; ?>
                <?php $actionName = (($actionName[0] == '_')? substr($actionName, 1) : $actionName); ?>
                
                <?php if ((isset($actionParams['confirm'])) && $actionParams['confirm'] ): ?>
                    $this->batch_confirms['\'<?php echo $actionName ?>\''] = '\'<?php echo addslashes($actionParams['confirm']) ?>\'';
                
                <?php endif; ?>            
            <?php endforeach; ?>
        }
        
        if (!isset($this->batch_selection)) {
            $this->batch_selection = <?php echo ($this->getParameterValue($params['generator_key'].'.batch_selection', true))? 'true' : 'false'; ?>;
        }
    
        if (isset($this->do_update) && $this->do_update) {
			if(!(isset($this->criteria) && $this->criteria)){
				$old_criteria = unserialize($this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria'));
				if($old_criteria){
					$this->criteria = $old_criteria;
				} else {
					$this->criteria = new Criteria();
				}
			}
            $this->criteria->clearOrderByColumns();

            $this->addSortCriteria($this->list_target, $this->criteria, '<?php echo $params['generator_key'] ?>');
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria', serialize($this->criteria));

            // Chargement des classes 'Peer' associé au criteria.
            $criteriaClassPeer = $this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria_class_peer', array());
            foreach($criteriaClassPeer as $classPeer) {
                sfCore::splAutoload($classPeer);
            }
            
            $max_per_page = $this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page', <?php echo $this->getParameterValue($params['generator_key'].'.max_per_page', 20) ?>);
            if (isset($this->max_per_page)) {
                if (($this->max_per_page != $max_per_page) && isset($this->page_num) && ($this->page_num > 0)) {
                    $this->page_num = (($max_per_page * ($this->page_num - 1)) / $this->max_per_page) + 1;
                }
            
                $max_per_page = $this->max_per_page;
                $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page');
                $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page', $max_per_page);
            }
        } else {
            $this->do_update = false;
            if (!isset($this->criteria)) {
                $this->criteria = new Criteria();
                $this->criteria->setIgnoreCase(<?php echo $this->getParameterValue($params['generator_key'].'.filters_ignore_case', true) ?>);
            }
			$this->addSortCriteria($this->list_target, $this->criteria, '<?php echo $params['generator_key'] ?>');
            <?php if(strstr($params['generator_key'], 'components.search_bar')) : ?>
				if($this->search) $this->addSearchBarCriteria($this->criteria, $this->search);
			<?php endif ?>
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria', serialize($this->criteria));
                   
            // Nécessaire pour le chargement des classes 'Peer' associées au criteria lors de la mise à jour.
            $criteriaClassPeer = array();
            $dbMap = Propel::getDatabaseMap('propel');
            $joins = $this->criteria->getJoins();
            foreach ($joins as $join) {
                foreach (array($join->getLeftColumn(), $join->getRightColumn()) as $colname) {
                    if ( strpos($colname, '.') > 0) {
                        $colname = substr($colname, 0, strpos($colname, '.'));
                    }
                    
                    if (!isset($criteriaClassPeer[$colname]) && $dbMap->containsTable($colname)) {
                        $dbTable = $dbMap->getTable($colname);
                        if ($dbTable) {
                            $criteriaClassPeer[$colname] = $dbTable->getPhpName().'Peer';
                        }
                    }
                }
            }
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria_class_peer');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria_class_peer', $criteriaClassPeer);
            
            $max_per_page = isset($this->max_per_page)? $this->max_per_page : <?php echo $this->getParameterValue($params['generator_key'].'.max_per_page', 20) ?>;
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page', $max_per_page);
        }
    
        // pager
        $this->pager = new sfPropelPager('<?php echo $this->getClassName() ?>', $max_per_page);
              
        $this->pager->setCriteria($this->criteria);
        $this->pager->setPage(isset($this->page_num)? $this->page_num : 1);
		<?php if ($this->getParameterValue($params['generator_key'].'.peer_method')): ?>
			$this->pager->setPeerMethod('<?php echo $this->getParameterValue($params['generator_key'].'.peer_method') ?>');
		<?php endif ?>
		<?php if ($this->getParameterValue($params['generator_key'].'.peer_count_method')): ?>
			$this->pager->setPeerCountMethod('<?php echo $this->getParameterValue($params['generator_key'].'.peer_count_method') ?>');
		<?php endif ?>
    
        $this->pager->init();
        $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/nb_results', $this->pager->getNbResults());
        $this->pager_steps = $this->get<?php echo ucfirst($name); ?>PagerSteps($this->pager, $max_per_page);
		if(!isset($this->target)){
			$this->target = $this->getRequestParameter('target', '<?php echo $this->getParameterValue($params['generator_key'].'.inline_editing.target', sfConfig::get('app_surface_default_target_edit')) ?>');
		}
		
		<?php if($this->getParameterValue($params['generator_key'].'.inline_editing')): ?>
			if(!isset($this->inline_editing)){
				$this->inline_editing = $this->getRequestParameter('inline_editing');
			}
			$this->component_class_update = false;
		<?php endif ?>
		if(!isset($this->layout)){
			$this->layout = '<?php echo $this->getParameterValue($params['generator_key'].'.layout', 'tabular') ?>';
		}
		if(!isset($this->inline_editing)){
			$this->inline_editing = false;
		}
		if(!isset($this->render_vtabs)){
			$this->render_vtabs = false;
		}
		if(!isset($this->target)){
			$this->target = sfContext::getInstance()->getRequest()->getParameter('target', 'tg_east');
		}
    }
    
    public function execute<?php echo ucfirst($name); ?>Map(){
        $this->unique_id = '<?php echo $this->getModuleName().'_'.$name ?>';
		$this->module_name = '<?php echo $this->getModuleName() ?>';
		$this->component_name = '<?php echo $name ?>';
        if (!isset($this->list_target)) {
            $this->list_target = $this->getRequestParameter('list_target', 'tg_'.$this->unique_id);
        }
		if(!isset($this->noscript)){
			$this->noscript = false;
		}
    
        if (isset($this->do_update) && $this->do_update) {
            $this->criteria = unserialize($this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria'));
            
            // Chargement des classes 'Peer' associé au criteria.
            $criteriaClassPeer = $this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria_class_peer');
            foreach($criteriaClassPeer as $classPeer) {
                sfCore::splAutoload($classPeer);
            }
            
            $max_per_page = $this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page', <?php echo $this->getParameterValue($params['generator_key'].'.max_per_page', 20) ?>);
            if (isset($this->max_per_page)) {
                if (($this->max_per_page != $max_per_page) && isset($this->page_num) && ($this->page_num > 0)) {
                    $this->page_num = (($max_per_page * ($this->page_num - 1)) / $this->max_per_page) + 1;
                }
            
                $max_per_page = $this->max_per_page;
                $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page');
                $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page', $max_per_page);
            }
        } else {
            $this->do_update = false;
            if (!isset($this->criteria)) {
                $this->criteria = new Criteria();
                $this->criteria->setIgnoreCase(<?php echo $this->getParameterValue($params['generator_key'].'.filters_ignore_case', true) ?>);
            }
            
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria', serialize($this->criteria));
                   
            // Nécessaire pour le chargement des classes 'Peer' associé au criteria lors de la mise à jour.
            $criteriaClassPeer = array();
            $dbMap = Propel::getDatabaseMap('propel');
            $joins = $this->criteria->getJoins();
            foreach ($joins as $join) {
                foreach (array($join->getLeftColumn(), $join->getRightColumn()) as $colname) {
                    if ( strpos($colname, '.') > 0) {
                        $colname = substr($colname, 0, strpos($colname, '.'));
                    }
                    
                    if (!isset($criteriaClassPeer[$colname]) && $dbMap->containsTable($colname)) {
                        $dbTable = $dbMap->getTable($colname);
                        if ($dbTable) {
                            $criteriaClassPeer[$colname] = $dbTable->getPhpName().'Peer';
                        }
                    }
                }
            }
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria_class_peer');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/criteria_class_peer', $criteriaClassPeer);
            
            $max_per_page = isset($this->max_per_page)? $this->max_per_page : <?php echo $this->getParameterValue($params['generator_key'].'.max_per_page', 20) ?>;
            $this->getUser()->getAttributeHolder()->remove('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page');
            $this->getUser()->setAttribute('sf_admin/' . $this->surface_namespace . '/'.$this->list_target.'/max_per_page', $max_per_page);
        }
    
        $this->addSortCriteria($this->list_target, $this->criteria, '<?php echo $params['generator_key'] ?>');
    
        // pager
        $this->pager = new sfPropelPager('<?php echo $this->getClassName() ?>', /*1000 */$max_per_page);
              
        $this->pager->setCriteria($this->criteria);
        $this->pager->setPage(isset($this->page_num)? $this->page_num : 1);
    <?php if ($this->getParameterValue($params['generator_key'].'.peer_method')): ?>
        $this->pager->setPeerMethod('<?php echo $this->getParameterValue($params['generator_key'].'.peer_method') ?>');
    <?php endif ?>
    <?php if ($this->getParameterValue($params['generator_key'].'.peer_count_method')): ?>
        $this->pager->setPeerCountMethod('<?php echo $this->getParameterValue($params['generator_key'].'.peer_count_method') ?>');
    <?php endif ?>
    
        $this->pager->init();
        
        $this->pager_steps = $this->get<?php echo ucfirst($name); ?>PagerSteps($this->pager, $max_per_page);
    }
    
<?php else: ?>
    /**
     *  Params :
     *      <?php echo $this->getModuleName() ?> :  Object to show
     *      bRenderTabs:                            Render the categories using a tab control
     *      target:                                 Target
     *                 
     */
    public function execute<?php echo ucfirst($name); ?>() {
		$this->module_name = '<?php echo $this->getModuleName() ?>';
		$this->component_name = '<?php echo $name ?>';
		
        if(!isset($this->action_name)){
			$this->action_name = '<?php echo $name?>';
        }
		$this->labels = $this->getLabels('<?php echo $name; ?>');
		if(!isset($this->render_vtabs)){
			$this->render_vtabs = false;
		}
		if(!isset($this->render_slots)){
			$this->render_slots = false;
		}
		if(!isset($this->noscript)){
			$this->noscript = false;
		}
		if(!isset($this->singular_name)){
			$this->singular_name = '<?php echo $this->getSingularName() ?>';
		}
		if(!isset($this-><?php echo $this->getSingularName() ?>) && isset($this->object)){
			$this-><?php echo $this->getSingularName() ?> = $this->object;
		}
		if(!isset($this->target)){
			$this->target = sfContext::getInstance()->getRequest()->getParameter('target', 'tg_east');
		}
    }
<?php endif; ?>
<?php endforeach; ?>

	/**
	 * Get a parameter from the generator.yml configuration
	 * @param string $key
	 * @param mixed $default
	 */
	public function getGeneratorParameter($key, $default = null){
		$this->initGeneratorParameters();
		return $this->generator_parameters->getParameter($key, $default);
	}

	/**
	 * Get all parameters from generator.yml
	 * @return array
	 */
	public function getGeneratorParameters(){
		$this->initGeneratorParameters();
		return $this->generator_parameters->getParameters();
	}

	/**
	 * Initialize generator parameters holder
	 */
	protected function initGeneratorParameters(){
		if(!$this->generator_parameters){
			$gen_file = sfConfig::get('sf_module_cache_dir').'/auto'.ucfirst('<?php echo $this->getModuleName() ?>').'/surface_generator.yml.php';
			if(file_exists($gen_file)){
				include $gen_file;
				$this->generator_parameters = new PropelConfiguration($generator_params);
			} else {
				$this->generator_parameters = new PropelConfiguration(array());
			}
		}
	}
}




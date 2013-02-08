[?php

/**
 * Generated Surface 1.6 actions
 */
class <?php echo $this->getGeneratedModuleName() ?>Actions extends sfSurfaceActions{

	/**
	 * Surface 1.6 Ready
	 */
	public function initialize($context){
		parent::initialize($context);
		$this->surface_namespace = '<?php echo $this->getSurfaceNamespace() ?>';
		$this->singular_name = '<?php echo $this->getSingularName() ?>';
		$this->plural_name = '<?php echo $this->getPluralName() ?>';
		$this->class_name = '<?php echo $this->getClassName() ?>';
		$this->primary_keys = array(<?php foreach($this->getPrimaryKey() as $pk){echo '"'.strtolower($pk->getColumnName()).'",';} ?>);
		return true;
	}


  public function executeDelete()
  {
    $this->object = <?php echo $this->getPeerClassName() ?>::retrieveByPk(<?php echo $this->getRetrieveByPkParamsForAction(40) ?>);
    $this->forward404Unless($this->object);


    try
    {
      $this->delete<?php echo $this->getClassName() ?>($this->object);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected '.sfInflector::humanize($this->getSingularName()).'. Make sure it does not have any associated items.');
      // return $this->forward($this->getModuleName(), 'list');
      return $this->forward($this->getModuleName(), 'delete_confirm');
    }

    switch ($this->getActionName()) {
<?php foreach (array('create', 'edit') as $action): ?>
      case '<?php echo $action; ?>':
<?php foreach ($this->getColumnCategories($action) as $category => $categoty_data): ?>
<?php foreach ($this->getColumns($action.'.display', $category) as $name => $column): ?>
    <?php if (is_object($column)): ?>
<?php $input_type = $this->getParameterValue($action.'.fields.'.$column->getName().'.type') ?>
<?php if ($input_type == 'admin_input_file_tag'): ?>
<?php $upload_dir = $this->replaceConstants($this->getParameterValue($action.'.fields.'.$column->getName().'.upload_dir')) ?>
        $currentFile = sfConfig::get('sf_upload_dir')."/<?php echo $upload_dir ?>/".$this->object->get<?php echo $column->getPhpName() ?>();
        if (is_file($currentFile))
        {
          unlink($currentFile);
        }

<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
        break;
<?php endforeach; ?>
    }

    <?php if (($redirect = $this->getParameterValue('actions._delete.redirect_url', null))): ?>
        return $this->redirect('<?php echo $redirect ?>');
    <?php elseif (($redirect_action = $this->getParameterValue('actions._delete.redirect_action', null))) : ?>
        $target = $this->getRequestParameter('target');
        return $this->redirect($this->getModuleName().'/<?php echo $redirect_action ?>'.($target ? '?target='.$target : ''));
    <?php else: ?>
		$this->target = $this->getRequestParameter('target');
		if($this->target=='tg_center'){
			return $this->redirect($this->getModuleName().'/list?target=tg_center');
		}
		$this->module_name = $this->getModuleName();
    <?php endif; ?>
}


  protected function getDialogResultData($object) {
    $output = array();
    $key = null;
    <?php foreach ($this->getAllColumns() as $column): ?>
    $output['<?php echo $column->getName(); ?>'] = str_replace("\n","",$object->get<?php echo $column->getPhpName() ?>());

    <?php if ($column->isPrimaryKey()): ?>
    $key = ($key)? $key.';'.$output['<?php echo $column->getName(); ?>'] : $output['<?php echo $column->getName(); ?>'];
    <?php endif; ?>

    <?php endforeach; ?>

    $output['key'] = $key;
    $output['__text'] = call_user_func(array($object, '__toString'));

    return $output;
  }

  protected function saveObject($object){
	return $this->save<?php echo $this->getClassName() ?>($object);
  }

  protected function save<?php echo $this->getClassName() ?>($object)
  {
    $object->save();

    switch ($this->getActionName()) {
<?php foreach (array('create', 'edit') as $action): ?>
      case '<?php echo $action ?>':
<?php foreach ($this->getColumnCategories($action) as $category => $categoty_data): ?>
<?php foreach ($this->getColumns($action.'.display', $category) as $name => $column): ?>
    <?php if (is_object($column)): ?>
        <?php $type = $column->getCreoleType($this->getParameterValue("{$action}.fields.{$column->getName()}.creole_type")); ?>
        <?php $name = $column->getName() ?>
        <?php if ($column->isPrimaryKey()) continue ?>
        <?php $credentials = $this->getParameterValue($action.'.fields.'.$column->getName().'.credentials') ?>
        <?php $input_type = $this->getParameterValue($action.'.fields.'.$column->getName().'.type') ?>
        <?php
            $user_params = $this->getParameterValue($action.'.fields.'.$column->getName().'.params');
            $user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
            $through_class = isset($user_params['through_class']) ? $user_params['through_class'] : '';
            $remote_column = isset($user_params['related_column']) ? $user_params['related_column'] : '';
        ?>
        <?php if ($through_class): ?>
        <?php
            $class = $this->getClassName();
            $related_class = sfPropelManyToMany::getRelatedClass($class, $through_class, $remote_column);
            $related_table = constant($related_class.'Peer::TABLE_NAME');
            $middle_table = constant($through_class.'Peer::TABLE_NAME');
            $this_table = constant($class.'Peer::TABLE_NAME');

            $related_column = sfPropelManyToMany::getRelatedColumn($class, $through_class, $remote_column);
            $column = sfPropelManyToMany::getColumn($class, $through_class, $remote_column);
        ?>
        <?php if (($input_type == 'admin_double_list') || ($input_type == 'admin_check_list') || ($input_type == 'admin_select_list') || ($input_type == 'surface_autocomplete_list') || ($input_type == 'surface_double_list') || ($input_type == 'surface_check_list')): ?>
            <?php if ($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
        if ($this->getUser()->hasCredentialEx(<?php echo $credentials ?>, $object)){
            <?php endif; ?>
          // Update many-to-many for "<?php echo $name ?>"
          $c = $this->getDefaultCriteria();
          $c->add(<?php echo $through_class ?>Peer::<?php echo strtoupper($column->getColumnName()) ?>, $object->getPrimaryKey());
          <?php echo $through_class ?>Peer::doDelete($c);

          $ids = $this->getRequestParameter('associated_<?php echo $name ?>');
          if (is_array($ids))
          {
            $ids = array_unique($ids);
            foreach ($ids as $id)
            {
              $<?php echo ucfirst($through_class) ?> = new <?php echo $through_class ?>();
              $<?php echo ucfirst($through_class) ?>->set<?php echo $column->getPhpName() ?>($object->getPrimaryKey());
              $<?php echo ucfirst($through_class) ?>->set<?php echo $related_column->getPhpName() ?>($id);
              $<?php echo ucfirst($through_class) ?>->save();
            }
          }

            <?php if ($credentials): ?>
        }
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif ($input_type == 'assoc_files'): ?>
            <?php if ($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
        if ($this->getUser()->hasCredentialEx(<?php echo $credentials ?>, $object))
        {
            <?php endif; ?>
            $files = $this->getRequestParameter('associated_<?php echo $name ?>', array());
            if (is_array($files)) {
                $files = array_unique($files);
                $object->updateAssociatedFiles($files, 'get<?php echo $column->getPhpName() ?>');
            }
            <?php if ($credentials): ?>
        }
            <?php endif; ?>
        <?php endif; ?>

    <?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
        break;
<?php endforeach; ?>
    }
  }

	protected function delete<?php echo $this->getClassName() ?>($object){
		$this->deleteObject($object);
	}

	protected function update<?php echo $this->getClassName() ?>FromRequest(){
		$this->updateObjectFromRequest();
	}

	public function getTitleForAction($action = 'show'){
		foreach($this->getVarHolder()->getAll() as $key => $var){
			$$key = $var;
		}
		switch($action){
			case 'show':
				return <?php echo $this->getI18NString('show.title', 'show ' . $this->getModuleName(), false) ?>;
			case 'delete_confirm':
				return <?php echo $this->getI18NString('delete_confirm.title', 'delete ' . $this->getModuleName(), false) ?>;
			case 'create':
				return <?php echo $this->getI18NString('create.title', 'create ' . $this->getModuleName(), false) ?>;
			case 'edit':
				return <?php echo $this->getI18NString('edit.title', 'edit ' . $this->getModuleName(), false) ?>;
			case 'list':
				return <?php echo $this->getI18NString('list.title', 'list ' . $this->getModuleName(), false) ?>;
			default:
				return parent::getTitleForAction($action);
		}
	}

  public static function updateFromActionRequest($action, & $object)
  {
    $prm_object = $action->getRequestParameter($action->getSingularName());

    $action_name = isset($action->action_name) ? $action->action_name : $action->getActionName();

    switch ($action_name) {
<?php foreach (array('create', 'edit') as $action): ?>
      case '<?php echo $action; ?>':
<?php foreach ($this->getColumnCategories($action) as $category => $categoty_data): ?>
<?php foreach ($this->getColumns($action.'.display', $category) as $name => $column): ?>
    <?php if (is_object($column)): ?>
        <?php
		$type = $column->getCreoleType($this->getParameterValue("{$action}.fields.{$column->getName()}.creole_type"));
		$field_name = $this->getParameterValue($action.'.fields.'.$column->getName().'.field_name');
		if($field_name){
			$tmp_column = $this->getAdminColumnForField($field_name);
			if($tmp_column && is_object($tmp_column)){
				$column = $tmp_column;
			}
		}
		$name = $column->getName();
		if ($column->isPrimaryKey()){
			continue;
		}

    // Attention, certains partials de plugins définissent des paramètres à sauvegarder sans surcharger l'action
		/*if ($column->isPartial()) {
			continue;
		}*/
        $credentials = $this->getParameterValue($action.'.fields.'.$name.'.credentials');
        $input_type = $this->getParameterValue($action.'.fields.'.$name.'.type');
		?>
        <?php if ($credentials): $credentials = str_replace("\n", ' ', var_export($credentials, true)) ?>
      if ($action->getUser()->hasCredentialEx(<?php echo $credentials ?>, $object))
      {
    <?php endif; ?>

    <?php if ($input_type == 'admin_input_file_tag'): ?>
        <?php $upload_dir = $this->replaceConstants($this->getParameterValue($action.'.fields.'.$name.'.upload_dir')) ?>
        $currentFile = sfConfig::get('sf_upload_dir')."/<?php echo $upload_dir ?>/".$object->get<?php echo $column->getPhpName() ?>();
        if (!$action->getRequest()->hasErrors() && isset($prm_object['<?php echo $name ?>_remove']))
        {
            $object->set<?php echo $column->getPhpName() ?>('');
            if (is_file($currentFile))
            {
            unlink($currentFile);
            }
        }

        if (!$action->getRequest()->hasErrors() && $action->getRequest()->getFileSize($action->getSingularName().'[<?php echo $name ?>]'))
        {
        <?php if ($this->getParameterValue($action.'.fields.'.$name.'.filename')): ?>
          $fileName = "<?php echo str_replace('"', '\\"', $this->replaceConstants($this->getParameterValue($action.'.fields.'.$name.'.filename'))) ?>";
        <?php else: ?>
          $fileName = md5($action->getRequest()->getFileName($action->getSingularName().'[<?php echo $name ?>]').time().rand(0, 99999));
        <?php endif ?>
          $ext = $action->getRequest()->getFileExtension($action->getSingularName().'[<?php echo $name ?>]');
          if (is_file($currentFile))
          {
            unlink($currentFile);
          }
          $action->getRequest()->moveFile($action->getSingularName().'[<?php echo $name ?>]', sfConfig::get('sf_upload_dir')."/<?php echo $upload_dir ?>/".$fileName.$ext);
          $object->set<?php echo $column->getPhpName() ?>($fileName.$ext);
        }
    <?php else: ?>
        <?php if (($type != CreoleTypes::BOOLEAN) && ($input_type != 'checkbox_tag')): ?>
        if (isset($prm_object['<?php echo $name ?>']))
        {
        <?php endif; ?>

        <?php if ($type == CreoleTypes::DATE || $type == CreoleTypes::TIMESTAMP): ?>
          if ($prm_object['<?php echo $name ?>'])
          {
            try
            {
              $dateFormat = new sfDateFormat($action->getUser()->getCulture());
              <?php $inputPattern  = $type == CreoleTypes::DATE ? 'd' : 'g'; ?>
              <?php $outputPattern = $type == CreoleTypes::DATE ? 'i' : 'I'; ?>
              if (!is_array($prm_object['<?php echo $name ?>']))
              {
                $value = $dateFormat->format($prm_object['<?php echo $name ?>'], '<?php echo $outputPattern ?>', $dateFormat->getInputPattern('<?php echo $inputPattern ?>'));
              }
              else
              {
                $value_array = $prm_object['<?php echo $name ?>'];
                $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
              }
              $object->set<?php echo $column->getPhpName() ?>($value);
            }
            catch (sfException $e)
            {
              // not a date
            }
          } else {
            try {
            	$object->set<?php echo $column->getPhpName() ?>(null);
            } catch (Exception $e) {}
          }
        <?php elseif (($type == CreoleTypes::BOOLEAN) || ($input_type == 'checkbox_tag')): ?>
			try {
				$object->set<?php echo $column->getPhpName() ?>(isset($prm_object['<?php echo $name ?>']) ? $prm_object['<?php echo $name ?>'] : null);
			} catch (Exception $e) {}
        <?php elseif ($column->isForeignKey()): ?>
			try {
				$object->set<?php echo $column->getPhpName() ?>($prm_object['<?php echo $name ?>'] ? $prm_object['<?php echo $name ?>'] : null);
			} catch (Exception $e) {}
        <?php else: ?>
			try {
				$object->set<?php echo $column->getPhpName() ?>($prm_object['<?php echo $name ?>']);
			} catch (Exception $e) {}
        <?php endif; ?>
        <?php if (($type != CreoleTypes::BOOLEAN) && ($input_type != 'checkbox_tag')): ?>
            }
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($credentials): ?>
      }
    <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
      break;
<?php endforeach; ?>
    }
	<?php if($this->getParameterValue('behaviors.tree.active')): ?>
		$node_type = NodeTypePeer::retrieveByPK($action->getRequestParameter($action->getSingularName().'[node_type_id]'));
		if($node_type){
			$object->setNodeType($node_type);
		}

		$parent_node = NodePeer::retrieveByPk($action->getRequestParameter($action->getSingularName().'[parent_node_id]'));
		if($parent_node){
			$node = $object->getFirstNodeOrCreate();
			$node->setParent($parent_node);
			if($node->getId()){
				$node->save();
			}
		}

		foreach((array)$action->getRequestParameter($action->getSingularName().'[nodes]') as $node_id => $params){
			$node = NodePeer::retrieveByPK($node_id);
			if($node){
				$parent = NodePeer::retrieveByPK($params['parent_node_id']);
				if($parent){
					$node->setParent($parent);
					$node->save();
				}
			}
		}
	<?php endif ?>
  }

  protected function updateObjectRelatedFromRequest(){
    $this->update<?php echo $this->getClassName() ?>RelatedFromRequest();
  }

  protected function update<?php echo $this->getClassName() ?>RelatedFromRequest()
  {
    switch ($this->getActionName()) {
<?php foreach (array('create', 'edit') as $action): ?>
      case '<?php echo $action; ?>':
    <?php foreach ($this->getColumnCategories($action) as $category => $categoty_data): ?>
    <?php foreach ($this->getColumns($action.'.display', $category) as $name => $column): ?>
        <?php if (is_object($column)): ?>
            <?php if ($column->isPrimaryKey()) continue ?>
			<?php
			$field_name = $this->getParameterValue("{$action}.fields.{$column->getName()}.field_name");
			if($field_name){
				$tmp_column = $this->getAdminColumnForField($field_name);
				if($tmp_column && is_object($tmp_column)){
					$column = $tmp_column;
				}
			}
			$name = $column->getName();
			?>
            <?php $input_type = $this->getParameterValue($action.'.fields.'.$name.'.type') ?>

            <?php if (($input_type == 'surface_autocomplete_list') || ($input_type == 'surface_check_list')): ?>

                <?php
                 $user_params = $this->getParameterValue($action.'.fields.'.$name.'.params');
                 $user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
                 $through_class = isset($user_params['through_class']) ? $user_params['through_class'] : '';
                 $remote_column = isset($user_params['related_column']) ? $user_params['related_column'] : '';
                 $related_column = sfPropelManyToMany::getRelatedColumn($class, $through_class, $remote_column);
                 $related_class = sfPropelManyToMany::getRelatedClass($class, $through_class, $remote_column);
                 $column = sfPropelManyToMany::getColumn($class, $through_class);
                 ?>
                <?php if ($through_class): ?>
          $this-><?php echo $this->getSingularName() . ucfirst($name) ?> = array();
          $ids = $this->getRequestParameter('associated_<?php echo $name ?>');
          if (is_array($ids)) {
            $ids = array_unique($ids);
            foreach ($ids as $id) {
               $<?php echo ucfirst($related_class) ?> = call_user_func(array('<?php echo $related_class ?>Peer', 'retrieveByPKs'), $id);
               if ($<?php echo ucfirst($related_class) ?> && !empty($<?php echo ucfirst($related_class) ?>)) {
                    $this-><?php echo $this->getSingularName() . ucfirst($name) ?>[$id] = reset($<?php echo ucfirst($related_class) ?>);
                }
            }
          }
                <?php endif; ?>
            <?php elseif ($input_type == 'assoc_files'): ?>
          $this-><?php echo $this->getSingularName() . ucfirst($name) ?> = $this->getRequestParameter('associated_<?php echo $name ?>');
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>
        break;
<?php endforeach; ?>
    }
  }

	protected function get<?php echo $this->getClassName() ?>OrCreate($pk0 = 'primary_key', $pk1 = 'primary_key', $pk2 = 'primary_key'){
		return $this->getObjectOrCreate($pk0, $pk1, $pk2);
	}

	protected function processFilters(){
		$filters = $this->getRequestParameter('filters');
		if(!$filters){
			if($this->getRequestParameter('filter')){
				$this->getUser()->getAttributeHolder()->removeNamespace("sf_admin/{$this->getSurfaceNamespace()}/filters");
				return array();
			}
			return $this->getUser()->getAttributeHolder()->getAll("sf_admin/{$this->getSurfaceNamespace()}/filters");
		}
		<?php $categories = $this->getFiltersCategories(); ?>
		<?php foreach ($categories as $category => $category_data): ?>
			<?php foreach ($this->getColumns('list.filters', $category) as $column): ?>
				<?php if (is_object($column)): ?>
					<?php $type = $column->getCreoleType($this->getParameterValue("list.fields.{$column->getName()}.creole_type")); ?>
					<?php if ($type == CreoleTypes::DATE || $type == CreoleTypes::TIMESTAMP): ?>
						if (isset($filters['<?php echo $column->getName() ?>']['from']) && $filters['<?php echo $column->getName() ?>']['from']) {
							$filters['<?php echo $column->getName() ?>']['from'] = sfI18N::getTimestampForCulture($filters['<?php echo $column->getName() ?>']['from'], $this->getUser()->getCulture());
						}
						if (isset($filters['<?php echo $column->getName() ?>']['to']) && $filters['<?php echo $column->getName() ?>']['to']) {
							$filters['<?php echo $column->getName() ?>']['to'] = sfI18N::getTimestampForCulture($filters['<?php echo $column->getName() ?>']['to'], $this->getUser()->getCulture());
						}
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endforeach; ?>

		$this->getUser()->getAttributeHolder()->removeNamespace("sf_admin/{$this->getSurfaceNamespace()}/filters");
		$this->getUser()->getAttributeHolder()->add($filters, "sf_admin/{$this->getSurfaceNamespace()}/filters");
		return $filters;
	}

	protected function addFiltersCriteria($c) {
		$c->setIgnoreCase(<?php echo $this->getParameterValue('list.filters_ignore_case', true) ?>);
		$peer_class = $this->getPeerClassName();
		<?php
		$categories = (array)$this->getFiltersCategories();
		foreach ($categories as $category => $category_data):
			foreach ($this->getColumns('list.filters', $category) as $column):
				if (!is_object($column)){
					continue;
				}
				$field_name = $this->getParameterValue("{$action}.fields.{$column->getName()}.field_name");
				if($field_name){
					$tmp_column = $this->getAdminColumnForField($field_name);
					if($tmp_column && is_object($tmp_column)){
						$column = $tmp_column;
					}
				}
				$name = $column->getName();
				$type = $column->getCreoleType($this->getParameterValue("{$action}.fields.{$column->getName()}.creole_type"));
				if (($column->isPartial() || ($column->isComponent()) && $this->getParameterValue("list.fields.{$column->getName()}.filter_criteria_disabled")) || !$column->isReal()) {
					continue;
				}
				?>
				$column_name = '<?php echo strtoupper($column->getRealName()) ?>';
				$php_name = '<?php echo $column->getName() ?>';
				<?php if ($type == CreoleTypes::DATE || $type == CreoleTypes::TIMESTAMP): ?>
					if (isset($this->filters[$php_name])) {
						if (isset($this->filters[$php_name]['from']) && $this->filters[$php_name]['from']) {
							<?php if ($type == CreoleTypes::DATE): ?>
								$value = date('Y-m-d', $this->filters[$php_name]['from']);
							<?php else: ?>
								$value = $this->filters[$php_name]['from'];
							<?php endif; ?>
							$criterion = $c->getNewCriterion(constant($peer_class.'::'.$column_name), $value, Criteria::GREATER_EQUAL);
						}

						if (isset($this->filters[$php_name]['to']) && $this->filters[$php_name]['to']) {
							<?php if ($type == CreoleTypes::DATE): ?>
								$value = date('Y-m-d', $this->filters[$php_name]['to']);
							<?php else: ?>
								$value = $this->filters[$php_name]['to'];
							<?php endif; ?>
							if (isset($criterion)) {
								$criterion->addAnd($c->getNewCriterion(constant($peer_class.'::'.$column_name), date('Y-m-d', $this->filters[$php_name]['to']), Criteria::LESS_EQUAL));
							} else {
								$criterion = $c->getNewCriterion(constant($peer_class.'::'.$column_name), date('Y-m-d', $this->filters[$php_name]['to']), Criteria::LESS_EQUAL);
							}
						}

						if (isset($this->filters[$php_name.'_is_empty'])) {
							if (isset($criterion)) {
								$criterion->addOr($c->getNewCriterion(constant($peer_class.'::'.$column_name), null, Criteria::ISNULL));
							} else {
								$criterion = $c->getNewCriterion(constant($peer_class.'::'.$column_name), null, Criteria::ISNULL);
							}
						}

						if (isset($criterion)) {
							$c->add($criterion);
						}
					}
				<?php elseif($type == CreoleTypes::BOOLEAN || $this->getParameterValue("list.fields.{$column->getName()}.type") == 'surface_boolean_tag'): ?>
					if (isset($this->filters[$php_name]) && $this->filters[$php_name] !== '') {
						if ($this->filters[$php_name] != 'all') {
							$c->add(constant($peer_class.'::'.$column_name), (bool)$this->filters[$php_name]);
						}
					} else {
						$field_params = $this->getGeneratorParameter("fields.{$php_name}.params");
						if(is_string($field_params)){
							$field_params = sfToolkit::stringToArray($field_params);
						}
						if (isset($field_params['filter_default']) && $field_params['filter_default'] !== 'all') {
							$c->add(constant($peer_class.'::'.$column_name), $field_params['filter_default']);
						}
					}
				<?php else: ?>
					if (isset($this->filters[$php_name.'_is_empty'])) {
						$criterion = $c->getNewCriterion(constant($peer_class.'::'.$column_name), '');
						$criterion->addOr($c->getNewCriterion(constant($peer_class.'::'.$column_name), null, Criteria::ISNULL));
						$c->add($criterion);
					} elseif (isset($this->filters[$php_name]) && $this->filters[$php_name] !== '') {
						<?php if ($type == CreoleTypes::POINT || $type == CreoleTypes::LINESTRING || $type == CreoleTypes::POLYGON || ($type == CreoleTypes::MULTIPOINT) || ($type == CreoleTypes::MULTILINESTRING) || ($type == CreoleTypes::MULTIPOLYGON) || ($type == CreoleTypes::GEOMETRY) || ($type == CreoleTypes::GEOMETRYCOLLECTION)): ?>
							PostgisCriteria::add($c, constant($peer_class.'::'.$column_name), array($this->filters[$php_name], constant($peer_class.'::'.$column_name.'_SRID')), PostgisCriteria::INTERSERCT);
						<?php elseif ($type == CreoleTypes::CHAR || $type == CreoleTypes::VARCHAR || $type == CreoleTypes::LONGVARCHAR): ?>
							$searchTexts = $this->filters[$php_name];
							if($searchTexts){
								if(is_array($searchTexts)){
									$searchTexts = array_keys($searchTexts);
								} else {
									$searchTexts = array($searchTexts);
								}
								foreach((array)$searchTexts as $searchText){
									$searchText = strtr($searchText, array('*' => '%', '?' => '_'));
									$searchText .= '%';
									if(!isset($critmp)){
										$critmp = $c->getNewCriterion(constant($peer_class.'::'.$column_name), $searchText, Criteria::LIKE);
									} else {
										$critmp->addOr($c->getNewCriterion(constant($peer_class.'::'.$column_name), $searchText, Criteria::LIKE));
									}
								}
								$c->add($critmp);
								unset($critmp);
							}
						<?php elseif ($this->getParameterValue("list.fields.{$column->getName()}.type") == 'input_number_tag'): ?>
							<?php
							$field_params = $this->getParameterValue("list.fields.{$column->getName()}.params");
							if(is_string($field_params)) {
								$field_params = sfToolkit::stringToArray($field_params);
							}
							if (isset($field_params['filter_type']) && $field_params['filter_type'] == 'input_range_tag') : ?>
								if($value = $this->filters[$php_name]['min']) {
									$c->add(constant($peer_class.'::'.$column_name), $value, CRITERIA::GREATER_EQUAL);
								}
								if($value = $this->filters[$php_name]['max']) {
									$c->addAnd(constant($peer_class.'::'.$column_name), $value, CRITERIA::LESS_EQUAL);
								}
							<?php else: ?>
								$c->add(constant($peer_class.'::'.$column_name), $this->filters[$php_name]);
							<?php endif ?>
						<?php else: ?>
							$searches = $this->filters[$php_name];
							if($searches){
								if(is_array($searches)){
									$searches = array_keys($searches);
								} else {
									$searches = array($searches);
								}
								foreach((array)$searches as $search){
									if(!isset($critmp)){
										$critmp = $c->getNewCriterion(constant($peer_class.'::'.$column_name), $search);
									} else {
										$critmp->addOr($c->getNewCriterion(constant($peer_class.'::'.$column_name), $search));
									}
								}
								$c->add($critmp);
								unset($critmp);
							}
						<?php endif; ?>
					}
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endforeach; ?>

		if(isset($this->filters['sf_alert_plugin']) && ($this->filters['sf_alert_plugin'] == 1)){
			$alert_crit = new Criteria();
			$alert_crit->add(AlertPeer::MODEL_CLASS, $this->getClassName());
			$alert_crit->add(AlertPeer::TRIGGER_AT, date('Y-m-d'), Criteria::LESS_EQUAL);
			$alert_crit->add(AlertPeer::ACQUITTED_AT, null, Criteria::ISNULL);
			$alertes_id = AlertPeer::doSelectModelId($alert_crit);

			$c->addAnd($peer_class::ID, $alertes_id, Criteria::IN);
		}
		
		if(isset($this->filters['cartable']) && $this->filters['cartable'] == true) {
			$cart = $this->getUser()->getCart(null, false);
			if($cart) {
				$items = $cart->getAllItemsId($this->getClassName());
				$c->add($peer_class::ID, $items, CRITERIA::IN);
			}
		}

		if($this->getGeneratorParameter('behaviors.tree.active') && isset($this->filters['node_type_id'])){
			$value = NodeTypePeer::retrieveByPk($this->filters['node_type_id']);
			if($this->filters['node_type_id'] && $value){
				$tmp = array($value->getId());
				foreach($value->getDescendants() as $descendant){
					$tmp[] = $descendant->getId();
				}
				$c->add($peer_class::NODE_TYPE_ID, $tmp, Criteria::IN);
			}
		}
	}


<?php $wizards = $this->getWizards(); ?>
  // Wizards handling
  protected static $wizards_params = <?php echo var_export($wizards, true); ?>;

<?php foreach ($wizards as $wizard_id => $wiz_params): ?>
<?php foreach ($wiz_params['steps'] as $step_id => $wiz_step): ?>
  public function execute<?php echo ucfirst($wiz_step['action_name']); ?>() {
    $this->wizard_id = '<?php echo $wizard_id; ?>';
    $this->initWizard($this->wizard_id, self::$wizards_params[$this->wizard_id]);
    $this->labels = array();

    $this->{$this->wizard_id} = $this->getWizardCollectedData($this->wizard_id, array());

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
        $action_data = $this->getRequestParameter($this->wizard_id, array());
        $action_data = array_merge($this->{$this->wizard_id}, $action_data);
        $this->setWizardCollectedData($this->wizard_id, $action_data);
        $this->{$this->wizard_id} = $this->getWizardCollectedData($this->wizard_id, array());
    }
	$this->prepareCommonActions();
  }

  public function handleError<?php echo ucfirst($wiz_step['action_name']); ?>() {
    $this->wizard_id = '<?php echo $wizard_id; ?>';
    $this->preExecute();

    $this->initWizard($this->wizard_id, self::$wizards_params[$this->wizard_id]);
    $this->labels = array();

    $this->{$this->wizard_id} = $this->getWizardCollectedData($this->wizard_id, array());
	$this->prepareCommonActions();
    return sfView::SUCCESS;
  }

<?php endforeach; ?>
<?php endforeach; ?>

  # Batch actions
  protected function batchPksToObject($pks) {
    if ($pks) {
        $criteria = $this->getDefaultCriteria();
        <?php echo $this->getBatchCriteriaByPk('$pks'); ?>

        return <?php echo $this->getPeerClassName() ?>::doSelect($criteria);
    }

    return array();
  }

  protected function batchPksTo<?php echo $this->getClassName() ?>($pks) {
     return batchPksToObject($pks);
  }


/******************************************************************************/
		/********/
		/*EXPORT*/
		/********/
/******************************************************************************/
//Export list
<?php foreach((array) $this->getParameterValue('list.exports') as $export_name => $export_params) : ?>
	<?php if(strpos($export_name, '_') !== 0) continue ?>
	<?php $export_name = substr($export_name, 1) ?>
	<?php $prefixe = 'list_' ?>
	<?php $marge = array_merge((array) sfConfig::get('app_print_list_default_marge', array(5, 5, 5, 5)), (array)get('marge', $export_params)) ?>

	public function executeExportList<?php echo sfInflector::camelize($export_name) ?>() {
	<?php if(get('selectable', $export_params)) : ?>
		<?php
			$columns = array();
			foreach($this->getColumns('list.exports._' . $export_name . '.display') as $column) {
				$params = sfToolkit::stringToArray($this->getParameterValue('list.fields.' . $column->getName() . '.export_params'));
				$columns[$column->getName()] = array(
					'weight' => $this->getColumnExportWeight($column, 'list')
					);
			}
		?>
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$columns = <?php echo var_export($columns) ?>;
			$selected = $this->getRequestParameter('selected', array());
			foreach($columns as $column => $params) {
				$columns[$column]['selected'] = in_array($column, $selected);
			}
	<?php endif ?>
		$this->loadHelpers(array('OpenOffice'));
		$content = get_document_partial('print_<?php echo $prefixe . $export_name ?>', array('singular_name' => $this->getSingularName(), $this->getPluralName() => $this->_getExportListObjects(), 'params' => array()<?php if(get('selectable', $export_params)) : ?>, 'columns' => $columns<?php endif ?>));
		$pdf = $this->getHtml2PdfObject($this->getRequestParameter('sens', '<?php echo get('sens', $export_params, 'L') ?>'), $this->getRequestParameter('format', '<?php echo get('format', $export_params, 'A4') ?>'), <?php var_export($marge) ?>, '<?php echo $prefixe . $export_name ?>');
		$pdf->writeHTML($content);
		<?php if(get('debug', $export_params, false)) : ?>
		echo $content;
		<?php else : ?>
		$pdf->Output(sfInflector::underscore(<?php echo $this->getInterpretedString(get('filename', $export_params, 'export'), false, false) ?>) . '.pdf', 'D');
		<?php endif ?>
		return sfView::NONE;
	<?php if(get('selectable', $export_params)) : ?>
		}
	<?php endif ?>
	}
<?php endforeach ?>

//Export show
<?php foreach((array) $this->getParameterValue('show.exports') as $export_name => $export_params) : ?>
	<?php if(strpos($export_name, '_') !== 0) continue ?>
	<?php $export_name = substr($export_name, 1) ?>
	<?php $prefixe = 'show_' ?>
	<?php $marge = array_merge((array) sfConfig::get('app_print_show_default_marge', array(5, 5, 5, 5)), (array)get('marge', $export_params)) ?>

	public function executeExportShow<?php echo sfInflector::camelize($export_name) ?>() {
		$object = <?php echo $this->getPeerClassName() ?>::retrieveByPk($this->getRequestParameter('id'));
		if($object) {
			$this->loadHelpers(array('OpenOffice'));
			$content = get_document_partial('print_<?php echo $prefixe . $export_name ?>', array($this->getSingularName() => $object));
			$pdf = $this->getHtml2PdfObject('<?php echo get('sens', $export_params, 'P') ?>', '<?php echo get('format', $export_params, 'A4') ?>', <?php var_export($marge) ?>, '<?php echo $prefixe . $export_name ?>');
			$pdf->writeHTML($content);
			<?php if(get('debug', $export_params, false)) : ?>
			echo $content;
			<?php else : ?>
			$pdf->Output(sfInflector::underscore(<?php echo $this->getInterpretedString(get('filename', $export_params, 'export'), false, false) ?>) . '.pdf', 'D');
			<?php endif ?>
		}
		return sfView::NONE;
	}
<?php endforeach ?>


	<?php
		$components = array_keys((array)$this->getParameterValue('components'));
		$components[]='list';
	?>
	<?php foreach($components as $component): ?>
		public function execute<?php echo ucfirst($component) ?>InlineEditingRow(){
			$this->executeComponentInlineEditingRow('<?php echo $component ?>');
		}
	<?php endforeach ?>

		

	
	
}

<?php

/* Cart */
define('CART_ACTIVE', false);
define('CART_ACTIVE_ACTIONS', true);
define('CART_SEPARATE_ACTIONS', true);
define('CART_FILTER', true);
define('CART_ADD_REMOVE_ALL', false);

/**
 * Propel Admin generator.
 *
 * This class generates an admin module with propel.
 *
 * @package    symfony
 * @subpackage generator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfPropelAdminGenerator.class.php 3302 2007-01-18 13:42:46Z fabien $
 */
class sfSurfaceAdminColumn extends sfAdminColumn {

	public function hasSortOrder() {
		return $this->isReal() || in_array('sort', $this->flags);
	}

	public function getCreoleAffix() {
		try {
			return CreoleTypes::getAffix($this->getCreoleType());
		} catch (SQLException $e) {
			return 'unknow';
		}
	}

	public function isExportSelected() {
		return in_array('+', $this->flags);
	}

	public function getRealName() {
		if ($this->column) {
			return sfInflector::underscore($this->column->getPhpName());
		} elseif (in_array('sort', $this->flags)) {
			return $this->getName();
		}
	}

	public function getCreoleType($default = null) {
		if ($this->column) {
			return CreoleTypes::getCreoleCode($this->column->getType());
		}
		return $default;
	}

}

/**
 * Surface generator.
 *
 * This class generates an admin module with propel.
 *
 * @package    Surface
 * @subpackage generator
 * @author     ELOGYS/FRANKONCEPT
 */
class sfSurfaceGenerator extends sfPropelAdminGenerator {

	/**
	 * Initializes the current sfGenerator instance.
	 *
	 * @param sfGeneratorManager A sfGeneratorManager instance
	 */
	public function initialize($generatorManager) {
		parent::initialize($generatorManager);

		$this->setGeneratorClass('sfSurfaceAdmin');
	}

	/**
	 * Returns the getter either non-developped: 'getFoo' or developped: '$class->getFoo()'.
	 *
	 * @param string  The column name
	 * @param boolean true if you want developped method names, false otherwise
	 * @param string The prefix value
	 * @param param  String of the variable param name ex: '$criteria'
	 *
	 * @return string PHP code
	 */
	function getColumnGetter($column, $developed = false, $prefix = '', $param = null) {
		$getter = 'get' . $column->getPhpName();
		if ($developed) {
			if (isset($param)) {
				$getter = sprintf('$%s%s->%s(\'' . $param . '\')', $prefix, $this->getSingularName(), $getter);
			} else {
				$getter = sprintf('$%s%s->%s()', $prefix, $this->getSingularName(), $getter);
			}
		}

		return $getter;
	}

	// Components and documents handling in generator -->
	protected function generatePhpFiles($generatedModuleName, $templateFiles = array(), $configFiles = array()) {
		parent::generatePhpFiles($generatedModuleName, $templateFiles, $configFiles);

		// eval components file
		$retval = $this->evalTemplate('actions/components.class.php');

		// save components class
		$this->getGeneratorManager()->getCache()->set('components.class.php', $generatedModuleName . DIRECTORY_SEPARATOR . 'actions', $retval);

		// OLD generate document files
//		$themeDir = sfLoader::getGeneratorTemplate($this->getGeneratorClass(), $this->getTheme(), '');
//		$documentFiles = sfFinder::type('file')->name('*.php')->relative()->in($themeDir . '/documents');
//		foreach($documentFiles as $document) {
//			// eval template file
//			$retval = $this->evalTemplate('documents/' . $document);
//
//			// save template file
//			$this->getGeneratorManager()->getCache()->set($document, $generatedModuleName . DIRECTORY_SEPARATOR . 'documents', $retval);
//		}
		// generate documents files
		$export_templates = array(
			'list' => array('_print_list', '_print_list_footer', '_print_list_header', '_print_list_label', '_print_list_style'),
			'show' => array('_print_show', '_print_show_footer', '_print_show_header', '_print_show_style')
		);
		foreach (array('list', 'show') as $component) {
			foreach ((array)$this->getParameterValue($component . '.exports') as $export_name => $export_params) {
				if (strpos($export_name, '_') !== 0)
					continue;
				$export_name = substr($export_name, 1);
				foreach ($export_templates[$component] as $export_template) {
					$retval = $this->evalDocumentTemplate(
							'documents/' . $export_template . '.php', $export_name, $export_params
					);
					$this->getGeneratorManager()->getCache()->set($export_template . '_' . $export_name . '.php', $generatedModuleName . DIRECTORY_SEPARATOR . 'documents', $retval);
				}
				if (get('selectable', $export_params)) {
					$retval = $this->evalDocumentTemplate(
							'documents/exportSelectableSuccess.php', $export_name, $export_params
					);
					$this->getGeneratorManager()->getCache()->set('exportList' . sfInflector::camelize($export_name) . 'Success.php', $generatedModuleName . DIRECTORY_SEPARATOR . 'templates', $retval);
				}
			}
		}
		// generate components templates
		$components = $this->getParameterValue('components', array());
		foreach ($this->getComponentInfo() as $component_name => $component_info) {
			if ($component_info['type'] == 'list') {
				foreach (array('_legend', '_legend_top', '_legend_bottom', '_pager', '_th_stacked', '_th_tabular', '_th_inline_editing', '_td_stacked', '_td_tabular', '_td_inline_editing', '_inline_editing_actions', '_inline_editing_bottom_actions', '_td_actions', '_td_actions_cart', '_td_actions_basket', 'Map', 'Map_pager', 'Map_popup') as $list_chunk) {
					// eval component template file
					$retval = $this->evalComponentTemplate('component_templates/' . $component_info['type'] . $list_chunk . '.php', $component_info['generator_key'], $component_name);

					// save template file
					$this->getGeneratorManager()->getCache()->set('_' . $component_name . $list_chunk . '.php', $generatedModuleName . DIRECTORY_SEPARATOR . 'templates', $retval);
				}
			}

			// eval component template file
			$retval = $this->evalComponentTemplate('component_templates/' . $component_info['type'] . '.php', $component_info['generator_key'], $component_name);

			// save template file
			$this->getGeneratorManager()->getCache()->set('_' . $component_name . '.php', $generatedModuleName . DIRECTORY_SEPARATOR . 'templates', $retval);
		}

		// generate wizard templates
		$wizards = $this->getWizards();
		foreach ($wizards as $wizard_id => $wiz_params) {
			foreach ($wiz_params['steps'] as $step_id => $wiz_step) {
				// eval component template file
				$retval = $this->evalWizardTemplate('wizard_templates/success.php', $step_id, $wiz_step);

				// save template file
				$this->getGeneratorManager()->getCache()->set($wiz_step['action_name'] . 'Success.php', $generatedModuleName . DIRECTORY_SEPARATOR . 'templates', $retval);
			}
		}
	}

	public function generate($params = array()) {
		//  $params['theme'] = "defaultv2";

		$data = parent::generate($params);

		// require generated component class
		$data .= "require_once(sfConfig::get('sf_module_cache_dir').'/" . $this->generatedModuleName . "/actions/components.class.php');\n";
		$generator = sfConfig::get('sf_module_cache_dir') . '/' . $this->generatedModuleName . '/surface_generator.yml.php';
		file_put_contents($generator, '<?php $generator_params = ' . var_export($this->params, true) . ";\n");
		return $data;
	}

	protected function evalComponentTemplate($templateFile, $component_generator_key, $component_name) {
		$templateFile = sfLoader::getGeneratorTemplate($this->getGeneratorClass(), $this->getTheme(), $templateFile);
		// eval template file
		ob_start();
		require($templateFile);
		$content = ob_get_clean();

		// replace [?php and ?]
		$content = $this->replacePhpMarks($content);

		$retval = "<?php\n" .
				"// auto-generated by " . $this->getGeneratorClass() . "\n" .
				"// date: %s\n?>\n%s";
		$retval = sprintf($retval, date('Y/m/d H:i:s'), $content);

		return $retval;
	}

	protected function evalWizardTemplate($templateFile, $wiz_step_id, $wiz_step) {
		$templateFile = sfLoader::getGeneratorTemplate($this->getGeneratorClass(), $this->getTheme(), $templateFile);

		// eval template file
		ob_start();
		require($templateFile);
		$content = ob_get_clean();

		// replace [?php and ?]
		return $this->replacePhpMarks($content);
	}

	protected function evalDocumentTemplate($templateFile, $export_name, $export_params) {
		$templateFile = sfLoader::getGeneratorTemplate($this->getGeneratorClass(), $this->getTheme(), $templateFile);
		ob_start();
		require($templateFile);
		$content = ob_get_clean();
		return $this->replacePhpMarks($content);
	}

	protected function getComponentInfo() {
		// Default actions generated components
		$components = array(
			'show_fields' => array('type' => 'fields',
				'generator_key' => 'show'
			),
			'delete_confirm_fields' => array('type' => 'fields',
				'generator_key' => 'delete_confirm'
			),
			'edit_fields' => array('type' => 'fields',
				'generator_key' => 'edit'
			),
			'create_fields' => array('type' => 'fields',
				'generator_key' => 'create'
			),
			'list' => array('type' => 'list',
				'generator_key' => 'list'
			),
			'search_bar' => array('type' => 'list',
				'generator_key' => 'list'
			)
		);

		if ($this->getParameterValue('cartable')) {
			$components['list_cart'] = array('type' => 'list', 'generator_key' => 'list');
		}

		$extra_components = $this->getParameterValue('components', array());
		foreach ($extra_components as $component_name => $component_data) {
			$components[$component_name] = array('type' => $component_data['type'],
				'generator_key' => 'components.' . $component_name
			);
		}

		return $components;
	}

	// <-- Components and documents handling in generator
	public function getColumnFilterTag($column, $params = array()) {
		$user_params = $this->getParameterValue('list.fields.' . $column->getName() . '.params');
		$user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
		$params = $user_params ? array_merge($params, $user_params) : $params;
		$module_name = get('module_name', $params, $this->getModuleName());

		if ($column->isComponent()) {
			return "get_component('{$module_name}', '{$column->getName()}', getCurrentViewParameters())";
		} elseif ($column->isPartial()) {
			$partial_name = $column->getName();
			if (strpos($partial_name, '/') === false) {
				$partial_name = $module_name . '/' . $partial_name;
			}
			return "get_partial('{$partial_name}', getCurrentViewParameters())";
		}
		
//		/*MAPPING*/
//		if($helper = $this->getTypeHelper('filter', 'list', $column)) {
//			return sprintf('%s(get(\'%s\', $filters), \'%s\', %s)', $helper, $columns->getName(), $columns->getName(), $this->getObjectTagParams($params));
//		}

		$type = $column->getCreoleType($this->getParameterValue("list.fields.{$column->getName()}.creole_type"));

		$filter_default = (isset($user_params['filter_default'])) ? $user_params['filter_default'] : 'null';

		if ($filter_default != 'null' && is_string($filter_default)) {
			$filter_default = "'" . $filter_default . "'";
		}

		$default_value = "isset(\$filters['" . $column->getName() . "']) ? \$filters['" . $column->getName() . "'] : " . $filter_default;

		//$default_value = "isset(\$filters['".$column->getName()."']) ? \$filters['".$column->getName()."'] : null";
		$unquotedName = 'filters[' . $column->getName() . ']';
		$name = "'$unquotedName'";
		$filterType = $this->getParameterValue('list.fields.' . $column->getName() . '.filter_type');

		if ($column->isForeignKey()) {
			$completion_url = isset($params['completion_url']) ? $params['completion_url'] : strtolower(substr($this->getRelatedClassName($column), 0, 1)) . substr($this->getRelatedClassName($column), 1) . '/autocompleteSearch';
			$params = $this->getObjectTagParams($params, array('include_blank' => true, 'related_class' => $this->getRelatedClassName($column), 'text_method' => '__toString', 'control_name' => $unquotedName));
			if (!isset($filterType)) {
				return "object_select_tag($default_value, null, $params)";
			}
			if ($filterType == 'surface_autocomplete_peer' && $completion_url != '') {
				return "surface_input_auto_complete_peer_tag('{$unquotedName}', \$sf_params->get('{$unquotedName}'), \$sf_params->get('autocomplete_{$unquotedName}'),
										'{$completion_url}', array('class'=>'auto_complete_input_filter'), array())";
			}
		} elseif ($type == CreoleTypes::DATE || $filterType == 'surface_input_date_range_tag') {
			$params = $this->getObjectTagParams($params, array('rich' => true, 'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png'));
			return "surface_input_date_range_tag($name, $default_value, $params)";
		} elseif ($type == CreoleTypes::TIMESTAMP) {
			$params = $this->getObjectTagParams($params, array('rich' => true, 'withtime' => true, 'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png'));
			return "surface_input_date_range_tag($name, $default_value, $params)";
		} elseif ($type == CreoleTypes::BOOLEAN || $this->getParameterValue("list.fields.{$column->getName()}.type") == 'surface_boolean_tag') {
			$default_value = (isset($user_params['filter_default'])) ? "'{$user_params['filter_default']}'" : 'null';
			return "surface_boolean_filter_tag('{$column->getName()}', \$filters, {$default_value})";
		} elseif (($type == CreoleTypes::POINT) || ( $type == CreoleTypes::LINESTRING) || ( $type == CreoleTypes::POLYGON)
				|| ( $type == CreoleTypes::MULTIPOINT) || ( $type == CreoleTypes::MULTILINESTRING) || ( $type == CreoleTypes::MULTIPOLYGON)
				|| ( $type == CreoleTypes::GEOMETRY) || ( $type == CreoleTypes::GEOMETRYCOLLECTION)) {
			$params = $this->getObjectTagParams($params);
			return "openlayers_input($name, $default_value, $params, $name.'_map_filter')";
		} elseif ($type == CreoleTypes::CHAR || $type == CreoleTypes::VARCHAR || $type == CreoleTypes::TEXT || $type == CreoleTypes::LONGVARCHAR) {
			$size = ($column->getSize() < 15 ? $column->getSize() : 15);
			$params = $this->getObjectTagParams($params, array('size' => $size));
			return "surface_input_tag($name, $default_value, $params)";
		} elseif ($type == CreoleTypes::INTEGER || $type == CreoleTypes::TINYINT || $type == CreoleTypes::SMALLINT || $type == CreoleTypes::BIGINT ||
				$type == CreoleTypes::FLOAT || $type == CreoleTypes::DOUBLE || $type == CreoleTypes::DECIMAL || $type == CreoleTypes::NUMERIC || $type == CreoleTypes::REAL) {

			$filter_type = $this->getParameterValue('list.fields.' . $column->getName() . '.filter_type');
			$params = $this->getObjectTagParams($params, array());
			if (isset($filter_type) && $filter_type == 'input_range_tag') {
				return "surface_input_range_tag($name, $default_value, $params)";
			} else {
				return "surface_input_number_tag($name, $default_value, $params)";
			}
		} else {
			$params = $this->getObjectTagParams($params, array('disabled' => true));
			return "surface_input_tag($name, $default_value, $params)";
		}

		return parent::getColumnFilterTag($column, $params);
	}

	public function getColumnEditExTag($generator_key, $column, $params = array()) {
		// user defined parameters
		$user_params = $this->getParameterValue($generator_key . '.fields.' . $column->getName() . '.params');
		$user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
		$params = $user_params ? array_merge($params, $user_params) : $params;
		$type = $column->getCreoleType($this->getParameterValue("{$generator_key}.fields.{$column->getName()}.creole_type"));
		$columnGetter = $this->getColumnGetter($column, true);
		$module_name = get('module_name', $params, $this->getModuleName());

		if ($column->isComponent()) {
			return "get_component('{$module_name}', '{$column->getName()}', getCurrentViewParameters('{$this->getSingularName()}', \${$this->getSingularName()}))";
		} elseif ($column->isPartial()) {
			$partial_name = $column->getName();
			if (strpos($partial_name, '/') === false) {
				$partial_name = $module_name . '/' . $partial_name;
			}
			return "get_partial('{$partial_name}', getCurrentViewParameters('{$this->getSingularName()}', \${$this->getSingularName()}))";
		}

		/*
		 * @doc! control_name_modifier permet de bypasser l'escaping php
		 *
		 * 	dans $params['control_name_modifier'] possibilité de préciser
		 * 		add_pkey_as_suffix => objectname_#PKEY#[fieldname]
		 * 		add_pkey_as_arraykey => objectname[#PKEY#][fieldname]
		 */
		$suffix = '';
		if (isset($params['control_name_modifier'])) {
			$final = $params['control_name_modifier'];
			unset($params['control_name_modifier']);
			if ($final == 'add_pkey_as_suffix' || (is_array($final) && in_array('add_pkey_as_suffix', $final))) {
				$suffix = '_#PKEY#';
				if (isset($params['id'])) {
					$suffix = '_' . $params['id'];
				}
			}
			if ($final == 'add_pkey_as_array_key' || (is_array($final) && in_array('add_pkey_as_array_key', $final))) {
				$suffix = '[#PKEY#]';
				if (isset($params['id'])) {
					$suffix = '[' . $params['id'] . ']';
				}
			}
		}
		$params = array_merge(array('control_name' => $this->getSingularName() . $suffix . '[' . $column->getName() . ']'), $params);

		switch ($type) {
			case CreoleTypes::DATE:
				$params = array_merge(array('rich' => true, 'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png'), $params);
				return "'<span class=\"date\">' . " . parent::getCrudColumnEditTag($column, $params) . ". '</span>'";
			case CreoleTypes::TIMESTAMP:
				$params = array_merge(array('rich' => true, 'withtime' => true, 'calendar_button_img' => '/sfSurfaceGeneratorPlugin/images/date.png'), $params);
				return "'<span class=\"date\">' . " . parent::getCrudColumnEditTag($column, $params) . ". '</span>'";
			case CreoleTypes::BOOLEAN:
				$default_value = (isset($user_params['default'])) ? "(\$value = {$columnGetter}) === null ? '{$user_params['default']}' : {$columnGetter}" : $columnGetter;
				return "surface_boolean_tag('{$params['control_name']}', null, {$default_value})";
			case CreoleTypes::POINT:
			case CreoleTypes::LINESTRING:
			case CreoleTypes::POLYGON:
			case CreoleTypes::MULTIPOINT:
			case CreoleTypes::MULTILINESTRING:
			case CreoleTypes::MULTIPOLYGON:
			case CreoleTypes::GEOMETRY:
			case CreoleTypes::GEOMETRYCOLLECTION:
				$fld_params = $this->getParameterValue('fields.' . $column->getName() . '.params');
				$fld_params = is_array($fld_params) ? $fld_params : sfToolkit::stringToArray($fld_params);
				$params = $fld_params ? array_merge($fld_params, $params) : $params;
				return $this->getPHPObjectHelper('openlayers_edit', $column, $params);
		}

		// user sets a specific tag to use
		$inputType = $this->getParameterValue($generator_key . '.fields.' . $column->getName() . '.type');
		if ($inputType && $inputType != 'surface_link_to') {
			if ($inputType == 'plain') {
				return $this->getColumnListTag($column, $params);
			} else {
				return $this->getPHPObjectHelper($inputType, $column, $params);
			}
		}

		return parent::getCrudColumnEditTag($column, $params);
	}

	public function getColumnShowTag($column, $params = array()) {
		$user_params = $this->getParameterValue("show.fields.{$column->getName()}.params");
		$user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
		$params = $user_params ? array_merge($params, $user_params) : $params;
		$type = $column->getCreoleType($this->getParameterValue("show.fields.{$column->getName()}.creole_type"));
		$columnGetter = $this->getColumnGetter($column, true);
		$module_name = get('module_name', $params, $this->getModuleName());

		if ($column->isComponent()) {
			return "get_component('{$module_name}', '{$column->getName()}', getCurrentViewParameters('{$this->getSingularName()}', \${$this->getSingularName()}))";
		}
		if ($column->isPartial()) {
			$partial_name = $column->getName();
			if (strpos($partial_name, '/') === false) {
				$partial_name = $module_name . '/' . $partial_name;
			}
			return "get_partial('{$partial_name}', getCurrentViewParameters('{$this->getSingularName()}', \${$this->getSingularName()}))";
		}
		switch ($type) {
			case CreoleTypes::DATE:
			case CreoleTypes::TIMESTAMP:
				$format = isset($params['date_format']) ? $params['date_format'] : ($type == CreoleTypes::DATE ? 'D' : 'f');
				return "($columnGetter !== null && $columnGetter !== '') ? $columnGetter : ''";
			case CreoleTypes::BOOLEAN:
				return "surface_boolean_to_text($columnGetter)";
			case CreoleTypes::LONGVARCHAR:
				return 'nl2br(' . $columnGetter . ');';
			case CreoleTypes::POINT:
			case CreoleTypes::LINESTRING:
			case CreoleTypes::POLYGON:
			case CreoleTypes::MULTIPOINT:
			case CreoleTypes::MULTILINESTRING:
			case CreoleTypes::MULTIPOLYGON:
			case CreoleTypes::GEOMETRY:
			case CreoleTypes::GEOMETRYCOLLECTION:
				$fld_params = $this->getParameterValue('fields.' . $column->getName() . '.params');
				$fld_params = is_array($fld_params) ? $fld_params : sfToolkit::stringToArray($fld_params);
				$params = $fld_params ? array_merge($fld_params, $params) : $params;
				return $this->getPHPObjectHelper('openlayers_show', $column, $params);
		}
		if (isset($params['mailto']) && $params['mailto']) {
			return "mail_to($columnGetter)";
		}
		if (isset($params['goto']) && $params['goto']) {
			return "link_to_external($columnGetter, $columnGetter, array('popup' => true))";
		}
		$parser = get('parser', $params);
		if ($parser) {
			return "{$parser}({$columnGetter})";
		}
		if ($column->isLink()) {
			return $this->getPHPObjectHelper('surface_link_to_show', $column, $params);
		}
		switch ($this->getParameterValue("show.fields.{$column->getName()}.type")) {
			case 'assoc_files':
				return $this->getPHPObjectHelper('assoc_files_show', $column, $params);
			case 'surface_autocomplete_peer':
				return $this->getPHPObjectHelper('surface_autocomplete_peer_show', $column, $params);
			case 'surface_link_to':
				return $this->getPHPObjectHelper('surface_link_to_show', $column, $params);
			case 'input_number_tag':
				$decimals = get('decimals', $params, 'null');
				$unit = $this->getInterpretedString(get('unit', $params), false, false);
				return "SfcUtils::numberFormat({$columnGetter}, {$decimals}, '.', ' ', {$unit})";
			case 'input_minutes_tag':
				return "sprintf('%02d:%02d', (floor({$columnGetter} / 60) % 24), {$columnGetter} % 60)";
		}
		$unit = get('unit', $params);
		if ($unit) {
			$columnGetter = "({$columnGetter} ? {$columnGetter}.utf8_encode(chr(160)).{$this->getInterpretedString($unit, false, false)} : {$columnGetter})";
		}
		return $columnGetter;
	}

	public function getColumnExportShowTag($column, $params = array()) {
		return $this->getColumnShowTag($column);
	}

	public function getColumnListTag($column, $params = array()) {
		$user_params = $this->getParameterValue('list.fields.' . $column->getName() . '.params');
		$user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
		$params = $user_params ? array_merge($params, $user_params) : $params;
		$columnGetter = $this->getColumnGetter($column, true);

		if ($column->isComponent()) {
			return "get_component(\$module_name, '{$column->getName()}', array(\$singular_name => \$object, 'object' => \$object))";
		} elseif ($column->isPartial()) {
			$partial_name = $column->getName();
			if (!strchr($partial_name, '/')) {
				$partial_name = $this->getModuleName() . "/" . $partial_name;
			}
			return "get_partial('{$partial_name}', array(\$singular_name => \$object, 'object' => \$object))";
		}

		$parser = get('parser', $params);
		if ($parser) {
			return "{$parser}({$columnGetter})";
		}
		$type = $this->getParameterValue("list.fields.{$column->getName()}.type", $column->getCreoleType($this->getParameterValue("list.fields.{$column->getName()}.creole_type")));

		switch ($type) {
			case CreoleTypes::BOOLEAN:
				return "surface_boolean_to_text({$columnGetter})";
			case 'surface_boolean_tag':
				return "surface_boolean_to_text({$columnGetter})";
			case 'assoc_files':
				return $this->getPHPObjectHelper('assoc_files_show', $column, $params);
			case 'input_number_tag':
				$decimals = get('decimals', $params, 'null');
				$unit = $this->getInterpretedString(get('unit', $params), false, false);
				return "SfcUtils::numberFormat({$columnGetter}, {$decimals}, '.', ' ', {$unit})";
			case 'input_minutes_tag':
				return "sprintf('%02d:%02d', (floor({$columnGetter} / 60) % 24), {$columnGetter} % 60)";
		}

		$unit = get('unit', $params);
		if ($unit) {
			$columnGetter = "({$columnGetter} ? {$columnGetter}.utf8_encode(chr(160)).{$this->getInterpretedString($unit, false, false)} : {$columnGetter})";
		}

		return $columnGetter;
	}

	public function getColumnExportListTag($column, $params = array()) {
		return $this->getColumnListTag($column);
	}

	public function getLinkToAction($actionName, $params, $pk_link = false) {
		$ret = parent::getLinkToAction($actionName, $params, $pk_link);
		if ($actionName === '_show') {
			return preg_replace('/\/show_icon.png/', '/filter.png', $ret);
		} else {
			return $ret;
		}
	}

	public function getRemoteLinkToAction($actionName, $params, $pk_link = false, $target = 'tg_center', $page_link = false) {

		$options = isset($params['params']) ? sfToolkit::stringToArray($params['params']) : array();
		$ajaxOptions = array();

		if (get('type', $params) == 'partial') {
			return sprintf('[?php include_partial(\'%s\', array(\'%s\' => $%s, \'target\' => \'%s\', \'page\' => $pager->getPage())) ?]', 'action_' . trim($actionName, '_'), $this->getSingularName(), $this->getSingularName(), $target);
		}

		// default values
		if ($actionName[0] == '_') {
			$actionName = substr($actionName, 1);
			$name = $actionName;
			// $icon       = sfConfig::get('sf_admin_web_dir').'/images/'.$actionName.'_icon.png';
			$icon = '/sfSurfaceGeneratorPlugin/images/' . $actionName . '_icon.png';
			$action = isset($params['action']) ? $params['action'] : $actionName;

			if ($actionName == 'delete') {
				$options['post'] = true;
				if (!isset($options['confirm'])) {
					$options['confirm'] = 'Are you sure?';
				}
				$ajaxOptions['method'] = 'post';
			} elseif ($actionName == 'delete_confirm') {
				$name = 'delete';
				// $icon = sfConfig::get('sf_admin_web_dir').'/images/delete_icon.png';
				$icon = '/sfSurfaceGeneratorPlugin/images/delete_icon.png';
			}
		} else {
			$name = isset($params['name']) ? $params['name'] : $actionName;
			$icon = isset($params['icon']) ? sfToolkit::replaceConstants($params['icon']) : '/sfSurfaceGeneratorPlugin/images/default_icon.png';
			$action = isset($params['action']) ? $params['action'] : /* 'List'. */sfInflector::camelize($actionName);
		}

		if ($actionName === 'show') {
			$icon = preg_replace('/\/show_icon.png/', '/filter.png', $icon);
		}

		$url_params = $pk_link ? '?' . $this->getPrimaryKeyUrlParams() : '\'';
		$url_params .= $page_link ? '.\'&page=\'.$pager->getPage()' : '';

		if (get('url_params', $params)) {
			$url_params .= '.\'';
			foreach (get('url_params', $params) as $key => $value) {
				$url_params .= '&' . $key . '=' . $value;
			}
			$url_params .= '\'';
		}

		$phpOptions = var_export($options, true);

		// little hack
		$phpOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $phpOptions);

		if (isset($target)) {
			$skip_nav = (isset($params['skip_navigation']) && $params['skip_navigation']) ? 'true' : 'false';
			if (isset($options['confirm'])) {
				$ajaxOptions['confirm'] = $options['confirm'];
			}
			if (isset($params['ajax_options'])) {
				$ajax = $params['ajax_options'];
				if (is_string($ajax)) {
					$ajax = sfToolkit::stringToArray($ajax);
				}
				$ajaxOptions = array_merge($ajaxOptions, $ajax);
			}
			$ajaxOptions = var_export($ajaxOptions, true);
			$ajaxOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $ajaxOptions);

			//return '[?php echo link_to_target(image_tag(\''.$icon.'\', array(\'alt\' => __(\''.$name.'\'), \'title\' => __(\''.$name.'\'))), \''.$this->getModuleName().'/'.$action.$url_params.', \''.$target.'\', false, '.$ajaxOptions.', '.$phpOptions.') ?]'."\n";
			return '[?php echo surface_link_to(image_tag(\'' . $icon . '\', array(\'alt\' => __(\'' . $name . '\'), \'title\' => __(\'' . $name . '\'))), \'' . $this->getModuleName() . '/' . $action . $url_params . ', \'' . $target . '\', ' . $skip_nav . ', ' . $ajaxOptions . ', ' . $phpOptions . ') ?]' . "\n";
		} else {
			return '[?php echo link_to(image_tag(\'' . $icon . '\', array(\'alt\' => __(\'' . $name . '\'), \'title\' => __(\'' . $name . '\'))), \'' . $this->getModuleName() . '/' . $action . $url_params . ($options ? ', ' . $phpOptions : '') . ') ?]' . "\n";
		}
	}

	public function getRemoteLinkTo($actionName, $params, $pk_link = false, $target = 'tg_center', $link_name = '') {

		$options = isset($params['params']) ? sfToolkit::stringToArray($params['params']) : array();
		$ajaxOptions = array();

		// default values
		if ($actionName[0] == '_') {
			$actionName = substr($actionName, 1);
			$name = $actionName;
			$icon = '/sfSurfaceGeneratorPlugin/images/' . $actionName . '_icon.png';
			$action = $actionName;

			if ($actionName == 'delete') {
				$options['post'] = true;
				if (!isset($options['confirm'])) {
					$options['confirm'] = 'Are you sure?';
				}

				$ajaxOptions['confirm'] = $options['confirm'];
			}
		} else {
			$name = isset($params['name']) ? $params['name'] : $actionName;
			$icon = isset($params['icon']) ? sfToolkit::replaceConstants($params['icon']) : '/sfSurfaceGeneratorPlugin/images/default_icon.png';
			$action = isset($params['action']) ? $params['action'] : /* 'List'. */sfInflector::camelize($actionName);
		}

		if ($link_name == '') {
			$link_name = $name;
		}

		$url_params = $pk_link ? '?' . $this->getPrimaryKeyUrlParams() : '\'';

		$phpOptions = var_export($options, true);

		// little hack
		$phpOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $phpOptions);

		if (isset($target)) {
			$skip_nav = (isset($params['skip_navigation']) && $params['skip_navigation']) ? 'true' : 'false';

			$ajaxOptions = var_export($ajaxOptions, true);
			$ajaxOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $ajaxOptions);

			//return'[?php echo link_to_target('.$name.', \''.$this->getModuleName().'/'.$action.$url_params.', \''.$target.'\', false, '.$ajaxOptions.', '.$phpOptions.') ?]'."\n";
			return'[?php echo surface_link_to(' . $name . ', \'' . $this->getModuleName() . '/' . $action . $url_params . ', \'' . $target . '\', ' . $skip_nav . ', ' . $ajaxOptions . ', ' . $phpOptions . ') ?]' . "\n";
		} else {
			return'[?php echo link_to(' . $name . ', \'' . $this->getModuleName() . '/' . $action . $url_params . ($options ? ', ' . $phpOptions : '') . ') ?]' . "\n";
		}
	}

	public function getRemoteButtonToAction($actionName, $params, $pk_link = false, $target = 'tg_center') {

		$params = (array)$params;
		$options = isset($params['params']) ? sfToolkit::stringToArray($params['params']) : array();
		$method = 'button_to';
		$li_class = '';
		$only_for = isset($params['only_for']) ? $params['only_for'] : null;
		$ajaxOptions = array();

		if (get('type', $params) == 'partial') {
			return sprintf('<li>[?php include_partial(\'%s\', array(\'%s\' => $%s, \'target\' => \'%s\', \'page\' => isset($pager) ? $pager->getPage() : null)) ?]</li>', 'action_' . trim($actionName, '_'), $this->getSingularName(), $this->getSingularName(), $target);
		}

		// default values
		if ($actionName[0] == '_') {
			$actionName = substr($actionName, 1);
			$default_name = strtr($actionName, '_', ' ');
			$default_icon = '/sfSurfaceGeneratorPlugin/images/' . $actionName . '_icon.png';
			$default_action = $actionName;
			$default_class = 'sf_admin_action_' . $actionName;

			if ($actionName == 'save' || $actionName == 'save_and_add' || $actionName == 'save_and_list') {
				$method = 'submit_tag';
				$options['name'] = $actionName;
			}

			if ($actionName == 'delete') {
				$options['post'] = true;
				$component_class_update = $this->getParameterValue('actions._' . $actionName . '.component_class_update', $this->getModuleName());
				if ($component_class_update) {
					$ajaxOptions['component_class_update'] = $component_class_update;
				}
				$li_class = 'float-left';
				$only_for = 'edit';
			}
			if ($actionName == 'calcul') {
				$options['post'] = true;
				$method = 'submit_to';
			}
		} else {
			$default_name = strtr($actionName, '_', ' ');
			$default_icon = '/sfSurfaceGeneratorPlugin/images/default_icon.png';
			$default_action = /* 'List'. */sfInflector::camelize($actionName);
			$default_class = '';
			if (get('type', $params) == 'submit') {
				$method = 'submit_tag';
				$options['name'] = $actionName;
			}
		}

		$name = isset($params['name']) ? $params['name'] : $default_name;
		$icon = isset($params['icon']) ? sfToolkit::replaceConstants($params['icon']) : $default_icon;
		$action = isset($params['action']) ? $params['action'] : $default_action;
		$url_params = $pk_link ? '?' . $this->getPrimaryKeyUrlParams() : '\'';

		if (!isset($options['class'])) {
			if ($default_class) {
				$options['class'] = $default_class;
			} else {
				// $options['style'] = 'background: transparent url('.image_path($icon, true).') no-repeat scroll left center; padding-left: 18px;';
				$options['style'] = 'background: transparent url(' . $icon . ') no-repeat scroll left center; padding-left: 18px;';
			}
		}

		$li_class = $li_class ? ' class="' . $li_class . '"' : '';

		$html = '<li' . $li_class . '>';

		if ($only_for == 'edit') {
			$html .= '[?php if (' . $this->getPrimaryKeyIsSet() . '): ?]' . "\n";
		} elseif ($only_for == 'create') {
			$html .= '[?php if (!' . $this->getPrimaryKeyIsSet() . '): ?]' . "\n";
		} elseif ($only_for !== null) {
			throw new sfConfigurationException(sprintf('The "only_for" parameter can only takes "create" or "edit" as argument ("%s")', $only_for));
		}

		if (isset($params['no_label']) && $params['no_label']) {
			$options['no_label'] = true;
		}

		if ($method == 'submit_tag') {
			$html .= '[?php echo surface_submit_tag(__(\'' . $name . '\'), ' . var_export($options, true) . ') ?]';
		} else {
			$skip_nav = (isset($params['skip_navigation']) && $params['skip_navigation']) ? 'true' : 'false';
			$phpOptions = var_export($options, true);

			// little hack
			$phpOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $phpOptions);

			if (isset($target)) {
				$ajaxOptions = array();
				if (isset($options['confirm'])) {
					$ajaxOptions['confirm'] = $options['confirm'];
				}
				if (isset($params['ajax_options'])) {
					$ajax = $params['ajax_options'];
					if (is_string($ajax)) {
						$ajax = sfToolkit::stringToArray($ajax);
					}
					$ajaxOptions = array_merge($ajaxOptions, $ajax);
				}
				$ajaxOptions = var_export($ajaxOptions, true);
				$ajaxOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $ajaxOptions);

				if ($method == 'submit_to') {
					$html .= '[?php echo surface_submit_to(__(\'' . $name . '\'), \'' . $this->getModuleName() . '/' . $action . $url_params . ', \'' . $target . '\', ' . $ajaxOptions . ', ' . $phpOptions . ') ?]';
				} else {
					$html .= '[?php echo surface_button_to(__(\'' . $name . '\'), \'' . $this->getModuleName() . '/' . $action . $url_params . ', \'' . $target . '\', ' . $skip_nav . ', ' . $ajaxOptions . ', ' . $phpOptions . ') ?]';
				}
			} else {
				$name = isset($params['real_name']) ? $params['real_name'] : $name;
				$html .= '[?php echo surface_button_tag(__(\'' . $name . '\'), \'' . $this->getModuleName() . '/' . $action . $url_params . ', ' . $phpOptions . ') ?]';
			}
		}

		if ($only_for !== null) {
			$html .= '[?php endif; ?]' . "\n";
		}

		$html .= '</li>' . "\n";

		return $html;
	}

	public function getButtonToExport($exportName, $params, $pk_link = false) {
		$params = (array)$params;
		$common_params = $this->getParameterValue("exports." . $exportName, array());
		$params = array_merge($common_params, $params);

		$options = isset($params['params']) ? sfToolkit::stringToArray($params['params']) : array();
		$method = 'button_to';
		$li_class = '';
		$ajaxOptions = array();

		$default_name = 'export_' . ($pk_link ? '' : 'list_') . strtr($exportName, '_', ' ');
		$default_icon = '/sfSurfaceGeneratorPlugin/images/default_icon.png';
		$default_action = 'export' . ($pk_link ? '' : 'List') . sfInflector::camelize($exportName);
		$default_class = 'sf_admin_' . $default_name;
		$default_output = ($pk_link ? 'pdf' : 'xls');

		$name = isset($params['name']) ? $params['name'] : $default_name;
		$icon = isset($params['icon']) ? sfToolkit::replaceConstants($params['icon']) : $default_icon;
		$action = isset($params['action']) ? $params['action'] : $default_action;
		$output = isset($params['outputType']) ? $params['outputType'] : $default_output;
		$url_params = '?output_type=' . $output;
		$url_params .= $pk_link ? '&' . $this->getPrimaryKeyUrlParams() : '\'';

		if ($target = get('target', $params)) {
			if (!get('class', $options)) {
				$params['params'] = get('params', $params, '') . ' class=\'sf_admin_export_list_ export sf_admin_export_pdf\'';
			}
			return $this->getRemoteButtonToAction($action, $params, $pk_link, $target);
		}

		if (!isset($options['class'])) {
			if ($default_class) {
				$options['class'] = $default_class;
			}
		}
		if (!isset($options['class'])) {
			$options['class'] = 'sf_admin_export_' . $output;
		} else {
			$options['class'] .= ' sf_admin_export_' . $output;
		}

		$li_class = $li_class ? ' class="' . $li_class . '"' : '';

		$html = '<li' . $li_class . '>';

		$phpOptions = var_export($options, true);

		// little hack
		$phpOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $phpOptions);

		$html .= '[?php ';
		$html .= '$params = ' . $phpOptions . ';';
		if (!key_exists('confirm', $options) && !$pk_link) {
			$html .= 'if($nb_result > ' . get('limit', $params, 100) . ') {';
			$html .= '$params[\'confirm\'] = "Attention! Vous allez exporter " . $nb_result . " elements!";';
			$html .= '}';
		}
		$html .= 'echo surface_button_tag(__(\'' . $name . '\'), \'' . $this->getModuleName() . '/' . $action . $url_params . ', $params);';
		$html .= '?]';

		$html .= '</li>' . "\n";

		return $html;
	}

	public function addCredentialCondition($content, $params = array()) {
		$credContent = parent::addCredentialCondition($content, $params);

		if (isset($params['conditions'])) {
			$condition = str_replace("\n", ' && ', $params['conditions']);

			return <<<EOF
[?php if ($condition): ?]
$credContent
[?php endif; ?]
EOF;
		}
		else
			return $credContent;
	}

	public function addCredentialExCondition($content, $credentials = array(), $conditions = array(), $object = null) {
		if (isset($credentials)) {
			$credentials = str_replace("\n", ' ', var_export($credentials, true));
			$object = isset($object) ? $object : 'null';

			$content = <<<EOF
[?php if (\$sf_user->hasCredentialEx($credentials, $object)): ?]
$content
[?php endif; ?]
EOF;
		}

		if (isset($conditions)) {
			$condition = str_replace("\n", ' && ', $conditions);

			return <<<EOF
[?php if ($condition): ?]
$content
[?php endif; ?]
EOF;
		}
		else
			return $content;
	}

	public function getAdminColumnForField($field, $flag = null) {
		$phpName = sfInflector::camelize($field);
		if ($this->getParameterValue('list.fields.' . $field . '.sort')) {
			$flag = array_merge($flag, array('sort'));
		}

		$field_name = $this->getParameterValue("fields.{$field}.field_name");
		if ($field_name) {
			$column = $this->getColumnForPhpName(sfInflector::camelize($field_name));
		}
		if (!isset($column)) {
			$column = $this->getColumnForPhpName($phpName);
		}

		return new sfSurfaceAdminColumn($phpName, $column, $flag);
	}

	public function getAllColumns() {
		$phpNames = array();
		foreach ($this->getTableMap()->getColumns() as $column) {
			$phpNames[] = new sfSurfaceAdminColumn($column->getPhpName(), $column);
		}

		return $phpNames;
	}

	function getPHPObjectHelper($helperName, $column, $params, $localParams = array()) {
		if (($helperName == 'textarea_tag') && isset($params['rich'])) {
			// Pour les zones de texte riche, on utilise les classes personnalises du tiny_mce
			// $helperName == 'surface_textarea_tag';

			if ($params['rich'] === true) {
				$params['rich'] = 'tinymce';
			}

			switch ($params['rich']) {
				case 'tinymce':
					$params['rich'] = 'SurfaceTinyMCE';
					break;
				case 'ckeditor':
					$helperName = 'ckeditor_tag';
					//$params['rich'] = 'SurfaceCkEditor';
					break;
			}

			// $helperName = 'date';
		} elseif (($helperName == 'surface_autocomplete_list') || ( $helperName == 'surface_check_list') || ( $helperName == 'assoc_files')) {
			$phpVarname = '$' . $this->getSingularName() . ucfirst($column->getName());
			$params['values'] = '@?php (isset(' . $phpVarname . ')? ' . $phpVarname . ' : null) ?@';
		} elseif ($helperName == 'surface_autocomplete_peer') {
			if ($column && $column->isForeignKey()) {
				$params['related_class'] = $this->getRelatedClassName($column);
				$params['target'] = "[?php echo \$target ?]";
			}
		}

		$classname = null;
		switch ($helperName) {
			case 'input_tag': $classname = "input_text";
				break;
			case 'input_date_tag' :
				$classname = ((isset($params['with_time']) && $params['with_time']) ? 'input_datetime' : 'input_date');
				break;
			case 'select_tag' :
			case 'textarea_tag' :
				break;
			case 'checkbox_tag' : $classname = "input_check";
				break;
			case 'input_color_tag': $classname = "input_color";
				break;
			case 'assoc_files': $classname = "input_file";
				break;
		}

		if ($classname) {
			self::_inject_classname($params, $classname);
		}

		$PHPObjectHelper = parent::getPHPObjectHelper($helperName, $column, $params, $localParams);
		$PHPObjectHelper = $this->translateFinalPhpEscapers($PHPObjectHelper);
		return $PHPObjectHelper;
	}

	protected function translateFinalPhpEscapers($PHPObjectHelper) {
		$PHPObjectHelper = str_replace('#PKEY#', "'." . $this->getFirstPrimaryKeyGetter() . ".'", $PHPObjectHelper);
		return $PHPObjectHelper;
	}

	protected function getObjectTagParams($params, $default_params = array()) {
		$params = var_export(array_merge($default_params, $params), true);
		//$params = preg_replace('/(.*)\'\$([^\']+)\'(.*)/', '\1$\2\3', $params);
		$params = preg_replace('/(.*)\'\@\?php (.*) \?\@\'(.*)/', '\1 \2 \3', $params);

		return $params;
	}

	public function getInterpretedString($string, $i18n = true, $echo = true, $add_quotes = true) {
		$regexp = '/%%([^%]+)%%/';
		preg_match_all($regexp, $string, $matches, PREG_PATTERN_ORDER);
		$columns = array();
		$search = array();
		foreach ($matches[1] as $name) {
			$columns[] = $name;
		}
		if ($columns) {
			$vars = array();
			$vars_i18n = array();
			$this->params['interpreted']['display'] = $columns;
			foreach ($this->getColumns('interpreted.display') as $column) {
				if (is_object($column)) {
					$tag = $this->getColumnListTag($column);
					$vars[] = $tag;
					$vars_i18n[] = '\'%%' . $column->getName() . '%%\' => ' . $tag;
				}
			}
			$string = preg_replace('#%%[_|~|=](.*)%%#', '%%$1%%', $string);
			if ($i18n) {
				$string = preg_replace($regexp, '%%$1%%', $string);
				$string = '__(\'' . addslashes($string) . '\', ' . "\n" . 'array(' . implode(",\n", $vars_i18n) . '))';
			} else {
				$splited = preg_split($regexp, $string);
				$string = "";
				for ($i = 0; $i < count($splited); $i++) {
					$portion = array();
					if ($text = get($i, $splited)) {
						$portion[] = "'" . addslashes($text) . "'";
					}
					if ($text = get($i, $vars)) {
						$portion[] = $text;
					}
					$portion = implode(' . ', $portion);
					if ($i != 0 && $portion) {
						$portion = ' . ' . $portion;
					}
					$string .= $portion;
				}
			}
		} elseif ($add_quotes) {
			$string = "'" . addslashes($string) . "'";
		}
		if ($echo) {
			$string = $this->getPhpTag($string, true);
		}
		return $string;
	}

	public function getPhpTag($content, $echo = false) {
		return '[?php ' . ($echo ? 'echo ' : '') . $content . ' ?]';
	}

	public function getI18NString($key, $default = null, $withEcho = true) {
		// Idem a sfAdminGenerator.class.php 'getI18NString' sauf pour l'affichage d'un lien

		$value = $this->escapeString($this->getParameterValue($key, $default));

		// find %%xx%% strings
		preg_match_all('/%%([^%]+)%%/', $value, $matches, PREG_PATTERN_ORDER);
		$this->params['tmp']['display'] = array();
		foreach ($matches[1] as $name) {
			$this->params['tmp']['display'][] = $name;
		}

		$vars = array();
		foreach ($this->getColumns('tmp.display') as $column) {
			if (is_object($column)) {
				if ($column->isLink()) {
					$vars[] = '\'%%' . $column->getName() . '%%\' => ' . $this->getColumnListTag($column);
				} elseif ($column->isPartial()) {
					$vars[] = '\'%%_' . $column->getName() . '%%\' => ' . $this->getColumnListTag($column);
				} elseif ($column->isComponent()) {
					$vars[] = '\'%%~' . $column->getName() . '%%\' => ' . $this->getColumnListTag($column);
				} else {
					$vars[] = '\'%%' . $column->getName() . '%%\' => ' . $this->getColumnListTag($column);
				}
			}
		}

		// strip all = signs
		$value = preg_replace('/%%=([^%]+)%%/', '%%$1%%', $value);

		$i18n = '__(\'' . $value . '\', ' . "\n" . 'array(' . implode(",\n", $vars) . '))';

		return $withEcho ? '[?php echo ' . $i18n . ' ?]' : $i18n;
	}

	// actions section handling in generator -->
	public function getParameterValue($key, $default = null) {
		if (preg_match('/^(.+)\.cart\.(.+)$/', $key, $matches)) {
			return $this->getCartParameterValue($matches[2], $matches[1], $default);
		} elseif (preg_match('/^(.+)\.helpers$/', $key, $matches)) {
			return $this->getHelperParameterValue($matches[1], $default);
		} elseif (preg_match('/^(.+)\.actions\.(.+)$/', $key, $matches)) {
			return $this->getActionParameterValue($matches[2], $matches[1], $default);
		} elseif (preg_match('/^(.+)\.object_actions\.(.+)$/', $key, $matches)) {
			return $this->getObjectActionParameterValue($matches[2], $matches[1], $default);
		} elseif (preg_match('/^(.+)\.exports\.(.+)$/', $key, $matches)) {
			return $this->getExportParameterValue($matches[2], $matches[1], $default);
		} elseif (preg_match('/^(.+)\.fieldsets\.(.+)$/', $key, $matches)) {
			return $this->getFieldSetParameterValue($matches[2], $matches[1], $default);
		} elseif (preg_match('/^components\.([^\.]+)\.fields\.(.+)$/', $key, $matches)) {
			return $this->getFieldParameterValue($matches[2], $matches[1], $default);
		} elseif (preg_match('/^(.+)\.batch_actions\.(.+)$/', $key, $matches)) {
			return $this->getBatchActionParameterValue($matches[2], $matches[1], $default);
		}

		return parent::getParameterValue($key, $default);
	}

	protected function getFieldSetParameterValue($key, $type = '', $default = null) {
		$retval = $this->getValueFromKey($type . '.fieldsets.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		$retval = $this->getValueFromKey('fieldsets.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		return $default;
	}

	protected function getActionParameterValue($key, $type = '', $default = null) {
		$retval = $this->getValueFromKey($type . '.actions.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		$retval = $this->getValueFromKey('actions.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		return $default;
	}

	protected function getObjectActionParameterValue($key, $type = '', $default = null) {
		$retval = $this->getValueFromKey($type . '.object_actions.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		$retval = $this->getValueFromKey('actions.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		return $default;
	}

	protected function getExportParameterValue($key, $type = '', $default = null) {
		$retval = $this->getValueFromKey($type . '.exports.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		$retval = $this->getValueFromKey('exports.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		if (preg_match('/default\.(.+)$/', $key, $matches)) {
			$retval = $this->getParameterValue($type . '.' . $matches[1], null);
			if ($retval !== null) {
				return $retval;
			}
		}

		return $default;
	}

	public function getParameterPagerSteps($list_component_key) {
		$steps = $this->getParameterValue($list_component_key . '.pager_steps', array(20, 50, 200, 500));
		if ($steps) {
			$steps = array_combine($steps, $steps);

			$default = $this->getParameterValue($list_component_key . '.max_per_page', 20);
			if (!isset($steps[$default])) {
				$steps[$default] = $default;
			}

			ksort($steps, SORT_NUMERIC);
		}

		return $steps;
	}

	protected function getBatchActionParameterValue($key, $type = '', $default = null) {
		$retval1 = $this->getValueFromKey($type . '.batch_actions.' . $key, $default);

		$retval2 = $this->getValueFromKey('actions.' . $key, array());

		return array_merge($retval2, $retval1);
	}

	// <-- actions section handling in generator

	protected function getFieldParameterValue($key, $type = '', $default = null) {
		$retval = $this->getValueFromKey($type . '.fields.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		$retval = $this->getValueFromKey('fields.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}

		if (preg_match('/\.name$/', $key)) {
			// default field.name
			return sfInflector::humanize(($pos = strpos($key, '.')) ? substr($key, 0, $pos) : $key);
		} else {
			return $default;
		}
	}

	public function getColumns($paramName, $category = 'NONE') {
		$phpNames = array();

		// user has set a personnalized list of fields?
		$fields = $this->getParameterValue($paramName);
		if (is_array($fields)) {
			// categories?
			if (isset($fields[0])) {
				// simulate a default one
				$fields = array('NONE' => $fields);
			}

			if (!$fields) {
				return array();
			}

			foreach ($fields[$category] as $subCat => $field) {
				if (is_array($field)) {
					$phpNames[] = $subCat;

					foreach ($field as $subCat => $subField) {
						list($subField, $flags) = $this->splitFlag($subField);

						$phpNames[] = $this->getAdminColumnForField($subField, $flags);
					}
				} else {
					list($field, $flags) = $this->splitFlag($field);

					$phpNames[] = $this->getAdminColumnForField($field, $flags);
				}
			}
		} else {
			// no, just return the full list of columns in table
			return $this->getAllColumns();
		}

		return $phpNames;
	}

	public function getFormCallbacks($actionName) {
		$callbacks = array();

		foreach ($this->getColumnCategories($actionName) as $category => $category_data) {
			foreach ($this->getColumns($actionName . '.display', $category) as $name => $column) {
				if (is_object($column)) {
					if (false !== strpos($this->getParameterValue($actionName . '.fields.' . $column->getName() . '.type'), 'admin_double_list')) {
						$callbacks['before']['admin_double_list'] = 'double_list_submit("sf_admin_' . $actionName . '_form")';
					}
					if (false !== strpos($this->getParameterValue($actionName . '.fields.' . $column->getName() . '.type'), 'surface_double_list')) {
						$callbacks['before']['surface_double_list'] = 'double_list_submit("sf_admin_' . $actionName . '_form")';
					} else {
						$params = $this->getParameterValue($actionName . '.fields.' . $column->getName() . '.params');
						if (is_string($params)) {
							$params = sfToolkit::stringToArray($params);
						}

						if (isset($params['rich'])) {
							if ($params['rich'] === 'ckeditor') {
								$field = $this->getSingularName() . '_' . $column->getName();
								$callbacks['before']['ckeditor_' . $field] = 'CKEDITOR.instances.' . $field . '.updateElement()';
							} else {
								$callbacks['before']['tinyMCE'] = 'tinyMCE.triggerSave()';
							}
						}
					}
				}
			}
		}

		$reduceCallbacks = array('script' => true);
		foreach ($callbacks as $callbackName => $actions) {
			$reduceCallbacks[$callbackName] = implode(";", $actions);
		}

		$component_class_update = $this->getParameterValue($actionName . '.actions._save.component_class_update', $this->getModuleName());
		if ($component_class_update) {
			$reduceCallbacks['component_class_update'] = $component_class_update;
		}

		return var_export($reduceCallbacks, true);
	}

	public function getColumnCategories($action_name, $entry = 'display') {
		$categories_key = array('NONE');
		$fields = $this->getParameterValue($action_name . '.' . $entry);
		if (is_array($fields)) {

			// do we have categories?
			if (!isset($fields[0])) {
				$categories_key = array_keys($fields);
			}
		}

		$categories = array();
		foreach ($categories_key as $category_key) {
			unset($category);

			$category = array();

			$category_name = substr($category_key, 1);
			$category['collapse'] = ($category_key[0] == '-');
			$category['show_title'] = ($category_key[0] == '-') || ( $category_key[0] != '~');
			$category['name'] = $this->getParameterValue($action_name . '.fieldsets.' . $category_key . '.name', trim($category_key, "-~"));

			$category['credentials'] = $this->getParameterValue($action_name . '.fieldsets.' . $category_key . '.credentials', null);
			if ($category['credentials']) {
				$category['credentials'] = str_replace("\n", ' ', var_export($category['credentials'], true));
			}

			$category['allow_method'] = $this->getParameterValue($action_name . '.fieldsets.' . $category_key . '.allow_method', null);

			$categories[$category_key] = $category;
		}

		return $categories;
	}

	public function getFiltersCategories() {
		$categories_key = array('NONE');
		$fields = $this->getParameterValue('list.filters');
		if (is_array($fields)) {

			// do we have categories?
			if (!isset($fields[0])) {
				$categories_key = array_keys($fields);
			}
		}

		$categories = array();
		foreach ($categories_key as $category_key) {
			unset($category);

			$category = array();

			$category_name = substr($category_key, 1);
			$category['collapse'] = ($category_key[0] == '-');
			$category['show_title'] = ($category_key[0] == '-') || ( $category_key[0] != '~');
			$category['name'] = $this->getParameterValue('list.fieldsets.' . $category_key . '.name', trim($category_key, "-~"));
			if ($category['name'] == "NONE") {
				$category['name'] = "filters";
			}

			$category['credentials'] = $this->getParameterValue('list.fieldsets.' . $category_key . '.credentials', null);
			if ($category['credentials']) {
				$category['credentials'] = str_replace("\n", ' ', var_export($category['credentials'], true));
			}

			$category['allow_method'] = $this->getParameterValue('list.fieldsets.' . $category_key . '.allow_method', null);

			$categories[$category_key] = $category;
		}

		return $categories;
	}

	public function getTabCategoryName($category_key) {
		return "[?php echo \$target ?]_" . SfcUtils::slugify($category_key, '_');
	}

	private static function _inject_classname(&$options, $classname) {
		if (isset($options['class']) && $options['class']) {
			$options['class'] = $classname . ' ' . $options['class'];
		} else {
			$options['class'] = $classname;
		}
	}

	public function getPrimaryKeyHTMLParams($prefix = '') {
		$params = array();
		foreach ($this->getPrimaryKey() as $pk) {
			$phpName = $pk->getPhpName();
			$fieldName = sfInflector::underscore($phpName);
			$params[] = $fieldName . "_'." . $this->getColumnGetter($pk, true, $prefix);
		}

		return implode(".'_", $params);
	}

	public function getFirstPrimaryKeyGetter($prefix = '') {
		$params = array();
		$pks = $this->getPrimaryKey();
		$pk = reset($pks);
		$phpName = $pk->getPhpName();
		$fieldName = sfInflector::underscore($phpName);
		return $this->getColumnGetter($pk, true, $prefix);
	}

	public function getHTMLElementId() {
		return "'" . $this->getModuleName() . '_list_' . $this->getPrimaryKeyHTMLParams();
	}

	public function getWizards() {
		$wizards = $this->getParameterValue('wizards', array());

		foreach ($wizards as $wizard_id => &$wiz_params) {
			foreach ($wiz_params['steps'] as $step_id => &$wiz_step) {
				$wiz_step['action_name'] = 'wizard' . (sfInflector::camelize($wizard_id . '_' . $step_id));
				$wiz_step['url'] = $this->getModuleName() . '/' . $wiz_step['action_name'];
			}
		}

		return $wizards;
	}

	// Bulk Actions
	public function getBatchPrimaryKeyUrlParams($prefix = '', $full = false) {
		// return $this->getPrimaryKeyUrlParams();
		$params = array();
		foreach ($this->getPrimaryKey() as $pk) {
			$phpName = $pk->getPhpName();
			/*
			 * fieldName = sfInflector::underscore($phpName);
			 * f ($full)
			  {
			 * params[]  = "$fieldName='.".$prefix.'->'.$this->getColumnGetter($pk, false).'()';
			  }
			 * lse
			  {
			 * params[]  = "$fieldName='.".$this->getColumnGetter($pk, true, $prefix);
			  }
			 */
			$params[] = $this->getColumnGetter($pk, true);
		}

		// return implode(".'&", $params);
		return implode(".'\\\'.", $params);
	}

	public function getBatchCriteriaByPk($pks_idents = '$pks') {
		$criterias = array();

		$class_pks = $this->getPrimaryKey();
		if ($class_pks) {
			if (count($class_pks) > 1) {
				$criterias[] = "foreach ($pks_idents as \$pk_ident) {";
				$i = 0;
				foreach ($class_pks as $class_pk) {
					$fieldName = $this->getPeerClassName() . '::' . strtoupper($class_pk->getColumnName());
					// $value     =sfInflector::underscore($class_pk->getColumnName());
					$criterias[] = "  \$pk_ident = explode('\\\', \$pk_ident);";
					if ($i == 0) {
						$criterias[] = "  \$criterion = \$criteria->getNewCriterion($fieldName, \$pks_ident['$i'], Criteria::EQUAL);";
					} else {
						$criterias[] = "  \$criterion->addAnd(\$criteria->getNewCriterion($fieldName, \$pks_ident['$i'], Criteria::EQUAL));";
					}

					$criterias[] = "  \$criteria->addOr(\$criterion);";
					$i += 1;
				}
				$criterias[] = "}";
			} else {
				$class_pks = reset($class_pks);
				$fieldName = $this->getPeerClassName() . '::' . strtoupper($class_pks->getColumnName());
				$criterias[] = "\$criteria->add($fieldName, $pks_idents, Criteria::IN);";
			}
		}

		return implode("\n", $criterias);
	}

	protected function getHelperParameterValue($type = null, $default = null) {
		$helpers = $this->getValueFromKey('helpers', array());
		if ($type) {
			$helpers = array_merge($helpers, $this->getValueFromKey($type . '.helpers', array()));
		}
		return $helpers;
	}

	/**
	 * @brief Retourne Les parametres du generator
	 * @param string $key Clef du generator
	 * @param string $type Position dans le generator
	 * @param mixed $default Valeur par defaut si elle n'est pas definit
	 * @return mixed La valeur demandée
	 *
	 */
	protected function getCartParameterValue($key, $type = '', $default = null) {
		$retval = $this->getValueFromKey($type . '.cart.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}
		$retval = $this->getValueFromKey('behaviors.cart.' . $key, null);
		if ($retval !== null) {
			return $retval;
		}
		if ($default !== null) {
			return $default;
		} else {
			if ($key == 'active') {
				return CART_ACTIVE;
			}
			if ($key == 'active_actions') {
				return CART_ACTIVE_ACTIONS;
			}
			if ($key == 'separate_actions') {
				return CART_SEPARATE_ACTIONS;
			}
			if ($key == 'filter') {
				return CART_FILTER;
			}
			if ($key == 'add_remove_all') {
				return CART_ADD_REMOVE_ALL;
			}
		}
		return null;
	}

	protected function getSurfaceNamespace() {
		$retval = $this->getValueFromKey('surface_namespace', $this->getSingularName());
		return $retval;
	}

	protected function setScaffoldingClassName($className) {
		parent::setScaffoldingClassName($className);
		if ($value = $this->getValueFromKey('singular_name')) {
			$this->singularName = $value;
		}
	}

	protected static $type_weight = array(
		CreoleTypes::BOOLEAN => 1,
		CreoleTypes::BIGINT => 1,
		CreoleTypes::SMALLINT => 1,
		CreoleTypes::TINYINT => 1,
		CreoleTypes::INTEGER => 1,
		CreoleTypes::CHAR => 1,
		CreoleTypes::VARCHAR => 4,
		CreoleTypes::TEXT => 4,
		CreoleTypes::FLOAT => 1,
		CreoleTypes::DOUBLE => 1,
		CreoleTypes::DATE => 1,
		CreoleTypes::TIME => 1,
		CreoleTypes::TIMESTAMP => 1,
		CreoleTypes::VARBINARY => 1,
		CreoleTypes::NUMERIC => 1,
		CreoleTypes::BLOB => 1,
		CreoleTypes::CLOB => 1,
		CreoleTypes::LONGVARCHAR => 4,
		CreoleTypes::DECIMAL => 1,
		CreoleTypes::REAL => 1,
		CreoleTypes::BINARY => 1,
		CreoleTypes::LONGVARBINARY => 1,
		CreoleTypes::YEAR => 1
	);

	public function getColumnExportWeight($column, $key) {
		$params = $this->getParameterValue($key . '.fields.' . $column->getName() . '.export_params');
		$params = is_string($params) ? sfToolkit::stringToArray($params) : $params;
		return get('weight', $params, get($column->getCreoleType(), self::$type_weight, 2));
	}

	public function getExportStyleWeight($export, $type) {
		$style = array();
		$columns = $this->getColumns($type . '.exports._' . $export . '.display');
		$weights = 0;
		foreach ($columns as $column) {
			$weight = $this->getColumnExportWeight($column, $type);
			$weights += $weight;
			$style[$column->getName()] = $weight;
		}
		foreach ($style as $name => $weight) {
			$style[$name] = round(100 / $weights * $weight);
		}
		arsort($style);
		$diff = array_sum($style) - 100;
		$inc = $diff < 0 ? -1 : 1;
		reset($style);
		while ($diff != 0) {
			$elem = each($style);
			$style[$elem['key']] -= $inc;
			$diff = $diff - $inc;
		}
		return $style;
	}

	/*	 * *************************************************************************** */
	/*	 * **** */
	/* Slots */
	/*	 * **** */
	/*	 * *************************************************************************** */

	public function getSlotName($category) {
		if ($prefixe = $this->getParameterValue('slot_prefixe')) {
			return $prefixe . '_' . $category;
		}
		return $category;
	}

	/*	 * *************************************************************************** */
	/*	 * *************** */
	/* Function mapping */
	/*	 * *************** */
	/*	 * *************************************************************************** */

//	protected function getTypeHelper($subtype, $generator_key, $column) {
//		if($helper = $this->getParameterValue($generator_key . '.fields.' . $column->getName() . '.' . $subtype . '_type')) {
//			return $this->getHelperMethod($subtype, $helper);
//		}
//		if($helper = $this->getParameterValue($generator_key . '.fields.' . $column->getName() . '.type')) {
//			return $this->getHelperMethod($subtype, $helper);
//		}
//		return null;
//	}
//
//	protected function getHelperMethod($subtype, $helper) {
//		if($function = $this->getParameterValue('mapping.' . $subtype . '.' . $helper)) {
//			return $function;
//		}
//		if($function = $this->getParameterValue('mapping.all.' . $helper)) {
//			return $function;
//		}
//		return null;
//	}

	public function getActionsParameters($current_action) {
		$actions = $this->getParameterValue($current_action . '.actions', array());
		switch ($current_action) {
			case 'list':
				$actions = $this->updateActionsFromActionName($actions, 'create');
				break;
			case 'view':
			case 'show':
				$actions = $this->updateActionsFromActionName($actions, 'edit');
				$actions = $this->updateActionsFromActionName($actions, 'delete_confirm', 'delete');
				break;
			case 'create':
			case 'edit':
				$actions = $this->updateActionsFromActionName($actions, 'save');
				$actions = $this->updateActionsFromActionName($actions, 'cancel');
				break;
			case 'delete_confirm':
				$actions = $this->updateActionsFromActionName($actions, 'delete', 'delete confirm');
				$actions = $this->updateActionsFromActionName($actions, 'cancel');
				break;
		}
		return $actions;
	}

	protected function updateActionsFromActionName($actions, $action_name, $button_name = null) {
		if (!$button_name) {
			$button_name = $action_name;
		}
		if (!array_key_exists('_' . $action_name, $actions) || !is_array($actions['_' . $action_name])) {
			$actions['_' . $action_name] = array('name' => $button_name);
		} else {
			if (!array_key_exists('name', $actions['_' . $action_name])) {
				$actions['_' . $action_name]['name'] = $button_name;
			}
		}
		if (isset($actions['_' . $action_name]['disabled']) && $actions['_' . $action_name]['disabled']) {
			unset($actions['_' . $action_name]);
		}
		return $actions;
	}

}

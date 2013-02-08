<?php

/**
 * @version 1.6
 * @since 2012-06-05
 * @author Elogys
 */
class sfSurfaceActions extends sfActions {

	public function initialize($context) {
		parent::initialize($context);
		sfLoader::loadHelpers(array('Helper', 'Theme', 'Partial', 'Cache', 'Validation', 'Date', 'Form', 'Javascript', 'I18N', 'gWidgets', 'surface', 'Object', 'ObjectSurface', 'ObjectFileAssoc', 'Cart', 'Menu', 'Alert', 'History'));
		$this->varHolder->set('object', null);
		$this->varHolder->set('objects', null);
		$this->initModuleSecurity();
		$this->class_name = 'Object';
		$this->singular_name = 'object';
		$this->plural_name = 'objects';
		$this->module_name = $this->getModuleName();
		if (!$this->getRequest()->isXmlHttpRequest()) {
			if ($this->getRequestParameter('target')) {
				sfSurfaceHistory::pushUrl($this->getRequestParameter('target'), $this->getRequest()->getUri());
				$this->redirect('/');
			}
			if ($this->getRequestParameter('layout')) {
				switch ($this->getRequestParameter('layout')) {
					case 'print':
						$this->setLayout('print');
						break;
					//TODO
				}
			}
		}
		return true;
	}

	protected function prepareCommonActions($action_name = null) {
		if (!$action_name) {
			$action_name = $this->getActionName();
		}
		$this->action_name = $action_name;
		$this->action_title = $this->getTitleForAction($action_name);
		$this->target = $this->getRequestParameter('target', $this->getGeneratorParameter($action_name . '.target', sfConfig::get('app_surface_default_target_create')));
		$this->render_vtabs = in_array($this->getGeneratorParameter($action_name . '.render'), array('tabs', 'tab', 'vTab', 'vtab', 'gtab', 'gTab'));
		$this->render_slots = $this->getGeneratorParameter($action_name . '.render') == 'slots';
		$this->use_helpers = (array)$this->getGeneratorParameter($action_name . '.helpers');
		$this->filters_target = $this->getGeneratorParameter('list.filters.target', sfConfig::get('app_surface_default_target_filters'));
		if ($this->getGeneratorParameter('behaviors.tree.active') && $this->object) {
			$this->node = $this->object->getFirstNodeOrCreate();
			$this->tree_include_blank = (bool)$this->getGeneratorParameter('behaviors.tree.include_blank');
			$this->tree_enforce_parent = (bool)$this->getGeneratorParameter('behaviors.tree.enforce_parent', true);
		}
		$this->title_skip = $this->getGeneratorParameter($action_name . '.title_skip');
		$this->context_menu = $this->getGeneratorParameter($action_name . '.menu.disabled', false) ? null : sfcMenu::getInstance('menu_context_' . $action_name);
		if ($this->context_menu) {
			$sub_menu = $this->context_menu->getChild('context_' . $action_name);

			if (!$sub_menu) {
				var_dump('sfSurfaceActions : In file menu.yml, do not declare an empty "items" section. Please remove it.');
			} else {
				if ($sub_menu->getChild('permalink')) {
					$sub_menu->getChild('permalink')->setLink((string)SfcUrl::create($this->getRequest()->getUri()));
				}
				if ($sub_menu->getChild('print_view')) {
					$sub_menu->getChild('print_view')->setLink((string)SfcUrl::create($this->getRequest()->getUri())->removeQueryParameter('target')->setQueryParameter('layout', 'print'));
				}
				if ($sub_menu->getChild('feedback')) {
					$sub_menu->getChild('feedback')->setLink($this->getModuleName() . '/feedback?url=' . urlencode($this->getRequest()->getUri()));
				}
				if ($this->getGeneratorParameter('behaviors.qrcode.active')) {
					$qrcode_item = new sfcMenuItem('export_qrcode');
					$qrcode_item->setIcon('/sfcThemePlugin/common/icons/qrcode.png');
					$qrcode_item->setIsAjax(false);
					$qrcode_item->setLabel('Imprimer Étiquette');
					$qrcode_item->setLink((string)SfcUrl::create($this->getRequest()->getUri())->removeQueryParameter('target')->setAction('exportQRCode'));
					$sub_menu->addChild($qrcode_item);
				}
				foreach ((array)$this->getGeneratorParameter($action_name . '.menu.items') as $name => $config) {
					if (is_numeric($name) && sfcMenuGenerator::hasItem($config)) {
						$item = sfcMenuGenerator::getItem($config);
					} else {
						$item = sfcMenuGenerator::generateItemFromConfig($name, $config);
					}
					if ($item) {
						$item->setLink(str_replace('%%id%%', $this->object->getPrimaryKey(), $item->getLink()));
						$sub_menu->addChild($item);
					}
				}
			}
		}
	}

	public function executeIndex() {
		return $this->forward($this->getModuleName(), 'list');
	}

	public function executeListUpdate() {
		$this->component_name = $this->getRequestParameter('name');
		$this->list_target = $this->getRequestParameter('list_target');
		$this->page_num = $this->getRequestParameter('page', 1);
		$this->basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		$this->max_per_page = $this->getRequestParameter('max_per_page', null);
		$this->processSort($this->list_target);
		$this->params = $this->getRequestParameter('params');
		if ($this->getRequestParameter('inline_editing_form')) {
			$this->multipleInlineUpdateFromRequest();
		}
		if ($this->getGeneratorParameter('behaviors.cart.add_remove_all')) {
			$this->callbacks[] = array('helper' => 'Cart', 'function' => 'cart_update_menu_tag');
		}
		$this->do_update = true;
		$this->prepareCommonActions('list');
	}

	public function executeListRenderMap() {
		$this->component_name = $this->getRequestParameter('name') . 'Map';
		$this->list_target = $this->getRequestParameter('list_target');
		$this->page_num = $this->getRequestParameter('page', 1);
		$this->basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		$this->max_per_page = $this->getRequestParameter('max_per_page', null);
		$this->processSort($this->list_target);
	}

	public function executeShow() {
		$this->action_name = $this->getActionName();
		$this->object = $this->_getObjectOrCreate();
		$this->forward404Unless($this->object);
		$this->forwardIf($this->object->isNew(), $this->getModuleName(), 'create');
		$this->prepareCommonActions();
	}

	public function executeCreate() {
		$this->forwardIf(!$this->getGeneratorParameter('create'), $this->getModuleName(), 'edit');
		$class_name = $this->getClassName();
		$this->object = new $class_name();
		$this->prepareCommonActions();
		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			return $this->handlePost();
		}
	}

	public function executeCalcul() {
		if ($this->getRequestParameter('id')) {
			$this->action_name = 'edit';
			$this->object = $this->_getObjectOrCreate();
		} else {
			$this->action_name = 'create';
			$class_name = $this->getClassName();
			$this->object = new $class_name();
		}
		$this->_updateObjectFromRequest();
		$this->setTemplate($this->action_name);
		$this->prepareCommonActions($this->action_name);
	}

	public function executeDuplicate() {
		$object_from = $this->_getObjectOrCreate();
		if ($object_from) {
			$this->object = $object_from->copy(true);
		} else {
			$class_name = $this->getClassName();
			$this->object = new $class_name();
		}
		$this->action_name = 'create';
		$this->setTemplate($this->action_name);
		$this->prepareCommonActions($this->action_name);
	}

	public function executeSave() {
		$this->forward($this->getModuleName(), 'edit');
	}

	public function executeCancel() {
		if (($redirect = $this->getGeneratorParameter('actions._cancel.redirect_url', null))) {
			$this->redirect($redirect);
		}
		$target = $this->getRequestParameter('target');
		$url = sfSurfaceHistory::getPrevUrl($target);
		if (!$url) {
			$url = "default/blank?target=" . $target;
		}
		$this->redirect($url);
	}

	public function executeEdit() {
		$this->action_name = $this->getActionName();
		$this->object = $this->_getObjectOrCreate();
		$this->forward404Unless($this->object);
		$this->prepareCommonActions();
		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			return $this->handlePost();
		}
	}

	public function executeDelete_confirm() {
		$this->action_name = $this->getActionName();
		$this->object = $this->_getObjectOrCreate();
		$this->forward404Unless($this->object);
		$this->prepareCommonActions();
	}

	public function executeList() {
		$this->action_name = $this->getActionName();
		$this->processFilters();
		$this->page_num = $this->getRequestParameter('page', 1);
		$this->basket = sfSurfaceBasketHolder::getBasketForModule($this->getModuleName());
		$this->display_filters = $this->getGeneratorParameter('list.filters');
		if ($this->display_filters) {
			$this->filters = $this->getUser()->getAttributeHolder()->getAll("sf_admin/{$this->getSurfaceNamespace()}/filters");
			$this->filter_reset = $this->getGeneratorParameter('list.filter_reset');
		}
		$c = $this->getDefaultCriteria();
		$this->addFiltersCriteria($c);
		if ($this->filter == 'filter_simple') {
			$this->addFiltersSimpleCriteria($c);
		}
		$credCriterion = $this->getListCredentialCriteria($c);
		if ($credCriterion) {
			$c->add($credCriterion);
		}
		$this->criteria = $c;
		$this->prepareCommonActions();
	}

	public function executeQrCode() {
		$this->action_name = $this->getActionName();
		$this->object = $this->_getObjectOrCreate();
		$this->forward404Unless($this->object);
		$text = $this->getClassName() . '_' . $this->object->getByName($this->getPrimaryKey(), BasePeer::TYPE_FIELDNAME);
		$size = (int)$this->getRequestParameter('size', 3);
		$margin = (int)$this->getRequestParameter('margin', 0);
		@ob_clean();
		SfcQRCode::png($text, false, QR_ECLEVEL_M, $size, $margin);
		exit;
	}

	/**
	 * Export a printable version of the QRCode label associated to an object
	 * If no object is found, exports all QRCodes in list.
	 */
	public function executeExportQRCode() {
		$this->action_name = $this->getActionName();
		$object = $this->_getObjectOrCreate();
		if (!$object || $object->isNew()) { //Object is created if not retrieved by request parameters
			$objects = $this->getListObjects('list');
			$name = $this->getClassName() . 's-' . date('Ymd');
		} else {
			$objects[] = $object;
			$name = $this->getClassName() . '_' . $object->getByName($this->getPrimaryKey(), BasePeer::TYPE_FIELDNAME);
		}
		$component = $this->getGeneratorParameter('behaviors.qrcode.export.component', 'export_qrcode');
		$orientation = $this->getGeneratorParameter('behaviors.qrcode.export.orientation', 'L');
		$width = $this->getGeneratorParameter('behaviors.qrcode.export.width', 84);
		$height = $this->getGeneratorParameter('behaviors.qrcode.export.height', 35);
		$margin = $this->getGeneratorParameter('behaviors.qrcode.export.margin', 5);

		sfLoader::loadHelpers(array('Partial'));
		$content = get_partial('print_qrcode', array('objects' => $objects, 'module_name' => $this->getModuleName(), 'class_name' => $this->getClassName(), 'primary_key' => $this->getPrimaryKey(), 'component' => $component));
		//echo $content;exit;//DEBUG
		$pdf = $this->getHtml2PdfObject($orientation, array($width, $height), array($margin, $margin, $margin, $margin));
		$pdf->writeHTML($content);
		@ob_clean();
		$pdf->Output($name . '.pdf', 'D');
		exit;
	}

	public function handleErrorEdit() {
		$this->preExecute();
		$this->action_name = $this->getActionName();
		$this->object = $this->_getObjectOrCreate();
		$this->_updateObjectFromRequest();
		$this->updateObjectRelatedFromRequest();

		$this->prepareCommonActions('edit');
		return sfView::SUCCESS;
	}

	public function handleErrorCreate() {
		$this->preExecute();
		$this->action_name = $this->getActionName();
		$this->object = $this->_getObjectOrCreate();
		$this->_updateObjectFromRequest();
		$this->updateObjectRelatedFromRequest();
		$this->prepareCommonActions('create');
		return sfView::SUCCESS;
	}

	public function handlePost() {
		$this->_updateObjectFromRequest();
		$this->saveObject($this->object);
		$this->setFlash('notice', 'Your modifications have been saved');
		$target = $this->getRequestParameter('target');
		$bDialog = $this->getRequestParameter('dialog', false);
		if ($bDialog) {
			$this->getResponse()->setHttpHeader("X-JSON", json_encode($this->getDialogResultData($this->object)));
			return $this->renderText('');
		}
		if ($this->getRequestParameter('save_and_add')) {
			return $this->redirect($this->getModuleName() . '/create' . ($target ? "?target=" . $target : ''));
		}
		if ($this->getRequestParameter('save_and_list')) {
			return $this->redirect($this->getModuleName() . '/list' . ($target ? "?target=" . $target : ''));
		}
		if ($redirect = $this->getGeneratorParameter('actions._save.redirect_url', null)) {
			return $this->redirect($redirect);
		}
		$params = array();
		foreach ($this->getPrimaryKeys() as $pk) {
			try {
				$params[] = $pk . '=' . $this->object->getByName($pk, BasePeer::TYPE_COLNAME);
			} catch (PropelException $e) {
				$params[] = $pk . '=' . $this->object->getByName($pk, BasePeer::TYPE_FIELDNAME);
			}
		}
		$params[] = ($target ? "target=" . $target : '');
		$redirect_action = $this->getGeneratorParameter($this->getActionName() . '.actions._save.redirect_action', $this->getGeneratorParameter('actions._save.redirect_action', sfConfig::get('app_surface_default_save_redirect_action', 'edit')));
		if (!strpos($redirect_action, '/')) {
			$redirect_action = $this->getModuleName() . '/' . $redirect_action;
		}
		return $this->redirect($redirect_action . '?' . implode('&', $params));
	}

	public function executeFeedback() {
		$this->link = urldecode($this->getRequestParameter('url'));
		$this->url = SfcUrl::create($this->link);
		$this->user = (string)$this->getUser()->getUsername();

		$this->application = $this->getApplicationName();
		$this->email = '';
		if ($this->getUser()->getProfile()) {
			$this->email = (string)$this->getUser()->getProfile()->getEmail();
		}

		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			$datas = array();
			$datas['ticket[email]'] = $this->getRequestParameter('ticket[email]', $this->email);
			$datas['ticket[type]'] = $this->getRequestParameter('ticket[type]');
			$datas['ticket[title]'] = $this->getRequestParameter('ticket[title]');
			$datas['ticket[content]'] = $this->getRequestParameter('ticket[content]');
			$datas['ticket[urgent]'] = $this->getRequestParameter('ticket[urgent]');
			$datas['ticket[link]'] = $this->getRequestParameter('ticket[link]', $this->url);
			$datas['ticket[username]'] = $this->getRequestParameter('ticket[username]', $this->user);
			$datas['ticket[project_key]'] = sfConfig::get('app_support_api_project_key');
			$api = API::getInstance('app_support_api');
			$this->api_response = $api->post('/incident/addTicket', $datas);
			//var_dump($this->api_response);die();
		}
	}

	protected function getApplicationName() {
		$application_url = substr($this->url, 1, -1);
		$explode = explode("/", $application_url);

		return array_shift($explode);
	}

	protected function deleteObject($object = null) {
		if ($object) {
			return $object->delete();
		}
		return $this->object->delete();
	}

	protected function _deleteObject($object = null) {
		$method_name = 'delete' . $this->getClassName();
		if (method_exists($this, $method_name)) {
			return $this->$method_name($object);
		}
		return $this->deleteObject($object);
	}

	protected function updateObjectFromRequest() {
		$this::updateFromActionRequest($this, $this->object);
	}

	protected function _updateObjectFromRequest() {
		$method_name = "update{$this->getClassName()}FromRequest";
		if (method_exists($this, $method_name)) {
			return $this->$method_name();
		}
		return $this->updateObjectFromRequest();
	}

	protected function processSort($list_target) {
		if ($this->getRequestParameter('sort')) {
			$this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), "sf_admin/{$this->surface_namespace}/{$list_target}/sort");
			$this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), "sf_admin/{$this->surface_namespace}/{$list_target}/sort");
		}
	}

	protected function getDefaultCriteria() {
		return new Criteria();
	}

	protected function addFiltersSimpleCriteria($criteria) {

	}

	protected function getListCredentialCriteria($c) {
		if ($this->getUser()) {
			$credCriterion = $this->getUser()->getCredentialFilterCriterion($this->getGeneratorParameter('list.objects.credentials', ''), $this->getClassName() . 'Peer', $c);
			return $credCriterion;
		}
	}

	public static function validateActionByName($action, $action_name = 'edit') {
		if ($action->getRequest()->getMethod() == sfRequest::POST) {
			$validationConfig = "{$action->getModuleName()}/validate/{$action_name}.yml";
			if (null !== $validateFile = sfConfigCache::getInstance()->checkConfig(sfConfig::get('sf_app_module_dir_name') . '/' . $validationConfig, true)) {
				$context = $action->getContext();
				$validatorManager = new sfValidatorManager();
				$validatorManager->initialize($context);
				require($validateFile);
				return $validatorManager->execute();
			}
		}
		return true;
	}

	public static function validateActionCreate($action) {
		return self::validateActionByName($action, 'create');
	}

	public static function validateActionEdit($action) {
		return self::validateActionByName($action, 'edit');
	}

	public function executeExportListDefault() {
		$this->objects = $this->_getExportListObjects();
		return sfOpenOfficeDocument::render($this, $this->getGeneratorParameter('list.exports.default.template', 'list.php'), $this->getRequestParameter('output_type', 'xls'), $this->getGeneratorParameter('list.exports.default.filename', 'document'));
	}

	protected function getObjectOrCreate($pk0 = 'primary_key', $pk1 = 'primary_key', $pk2 = 'primary_key') {
		$pks = array($pk0, $pk1, $pk2);
		$primary_keys = array();
		if (!isset($pk0)) {
			$from_request = false;
		} else {
			$from_request = true;
			if ($pk0 == 'primary_key') {
				$pks = $this->getPrimaryKeys();
				if (!$pks) {
					$from_request = false;
				}
			}
			foreach ((array)$pks as $pk) {
				if ($pk != 'primary_key') {
					if (!$this->getRequestParameter($pk) || $this->getRequestParameter($pk) < 0) { //Inline editing support
						$from_request = false;
						break;
					}
					$primary_keys[] = $this->getRequestParameter($pk);
				}
			}
		}
		if (!$from_request) {
			$class_name = $this->getClassName();
			if (!class_exists($class_name)) {
				return;
			}
			return new $class_name();
		}
		$peer_class_name = $this->getPeerClassName();
		if (!class_exists($peer_class_name)) {
			return;
		}
		$object = null;
		switch (count($primary_keys)) {
			case 1:
				$object = $peer_class_name::retrieveByPk($primary_keys[0]);
				break;
			case 2:
				$object = $peer_class_name::retrieveByPk($primary_keys[0], $primary_keys[1]);
				break;
			case 3:
				$object = $peer_class_name::retrieveByPk($primary_keys[0], $primary_keys[1], $primary_keys[2]);
				break;
		}
		return $object;
	}

	protected function _getObjectOrCreate() {
		$method_name = "get{$this->getClassName()}OrCreate";
		if (method_exists($this, $method_name)) {
			return $this->$method_name();
		}
		return $this->getObjectOrCreate();
	}

	protected function initModuleSecurity() {
		$actions = $this->getGeneratorParameter('actions', array());
		foreach ($actions as $actionName => $actionParams) {
			if (isset($actionParams['credentials'])) {
				if ($actionName[0] == '_') {
					$actionName = substr($actionName, 1);
				}
				if (!isset($this->security[$actionName]['is_secure'])) {
					$this->security[$actionName]['is_secure'] = true;
				}
				if (!isset($this->security[$actionName]['credentials']))
					$this->security[$actionName]['credentials'] = $actionParams['credentials'];
			}
		}

		$exports = $this->getGeneratorParameter('exports', array());
		foreach ($exports as $exportName => $exportParams) {
			if (isset($exportParams['credentials'])) {
				foreach (array('exportList' . ucfirst($exportName), 'export' . ucfirst($exportName)) as $actionName) {
					if (!isset($this->security[$actionName]['is_secure'])) {
						$this->security[$actionName]['is_secure'] = true;
					}
					if (!isset($this->security[$actionName]['credentials'])) {
						$this->security[$actionName]['credentials'] = $exportParams['credentials'];
					}
				}
			}
		}
	}

	public function grantUser($user) {
		$credential = $this->getCredential();
		if ($credential) {
			$object = $this->_getObjectOrCreate();
			if (method_exists($user, 'hasCredentialEx')) {
				return $user->hasCredentialEx($credential, $object);
			} else {
				return $user->hasCredential($credential);
			}
		}
		return true;
	}

	public function executeBasketOpen() {
		$basket_key = $this->getRequestParameter('basket_key', null);
		$basket = sfSurfaceBasketHolder::get($basket_key);
		if (!$basket) {
			$object = $this->_getObjectOrCreate();
			$basket = sfSurfaceBasketHolder::open($basket_key, $object);
			if ($basket) {
				$basket_params = $this->getBasketParams($basket_key, $object);
				$basket->setInfo(array_merge(array('module_search' => $this->getRequestParameter('search_module'), 'module_from' => $this->getModuleName()), $basket_params));
			}
		}
		return $this->forward($this->getModuleName(), 'show');
	}

	public function executeBasketCancel() {
		$basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		if ($basket) {
			$module_from = $basket->getInfo('module_from');
			$module_from = (($module_from) ? $module_from : $this->getModuleName());
			$redirect_url = "{$module_from}/show?{$this->getPrimaryKey()}={$basket->getInfo('ref_object_key')}";
			$basket->close();
			return $this->redirect($redirect_url);
		}
		return $this->forward($this->getModuleName(), 'show');
	}

	public function executeBasketClose() {
		$redirect_url = null;
		$basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		if ($basket) {
			$redirect_url = "{$this->getModuleName()}/show?{$this->getPrimaryKey()}={$basket->getInfo('ref_object_key')}";
			$object = $this->_getObjectOrCreate();
			$items = $basket->getItems();
			$this->saveBasketItems($basket, $object, $items);
			$basket->close();
			return $this->redirect($redirect_url);
		}
		return $this->forward($this->getModuleName(), 'show');
	}

	public function executeBasketAddItem() {
		$object = $this->_getObjectOrCreate();
		$basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		if ($basket && $basket->isOpened()) {
			$item = $this->getRequestParameter('item', null);
			if ($item) {
				if (is_array($item)) {
					if ($this->allowBasketItem($basket, $object, $item['key'], $item['class'])) {
						$basket->addPropelItem($item['class'], $item['key']);
					}
				} else {
					if ($this->allowBasketItem($basket, $object, $item)) {
						$basket->addItem($item);
					}
				}
			}
		}
		return $this->forward($this->getModuleName(), 'show');
	}

	public function executeBasketRemoveItem() {
		$basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		if ($basket && $basket->isOpened()) {
			$item = $this->getRequestParameter('item', null);
			if ($item) {
				if (is_array($item)) {
					$basket->removePropelItem($item['class'], $item['key']);
				} else {
					$basket->removeItem($item);
				}
			}
		}
		return $this->forward($this->getModuleName(), 'show');
	}

	public function executeBasketShow() {
		$basket = sfSurfaceBasketHolder::get($this->getRequestParameter('basket_key', null));
		if ($basket) {
			$redirect_url = "{$this->getModuleName()}/show?{$this->getPrimaryKey()}={$basket->getInfo('ref_object_key')}";
			return $this->redirect($redirect_url);
		}
		return $this->forward($this->getModuleName(), 'show');
	}

	protected function getBasketParams($basket_key, $object) {
		return array('add_item_callback' => "{$this->getModuleName()}/basketAddItem?{$this->getPrimaryKey()}={$object->getPrimaryKey()}",
			'add_item_name' => 'basket_add',
			'add_item_icon' => '/sfSurfaceGeneratorPlugin/images/link.png',
		);
	}

	protected function allowBasketItem($basket, $object, $item_val, $item_class = null) {
		return true;
	}

	protected function saveBasketItems($basket, $object, $items) {

	}

	public function executeBatchAction() {
		$action = $this->getRequestParameter('batch_action', null);
		if ($action) {
			$action = 'executeBatch' . ucfirst(sfInflector::camelize($action));
			if (is_callable(array($this, $action))) {
				call_user_func(array($this, $action));
			}
		}
		return $this->forward($this->getModuleName(), 'listUpdate');
	}

	public function executeBatchDelete() {
		$sf_user = $this->getUser();

		$credentials = $this->getGeneratorParameter('actions._delete.credentials', 'safe_dummy_credential');
		if ($credentials && $sf_user->hasCredentialEx($credentials, null)) {
			$pks = $this->getRequestParameter('ids', array());
			$objects = $this->batchPksToObject($pks);
			$peer_class_name = $this->getPeerClassName();
			$con = Propel::getConnection($peer_class_name::DATABASE_NAME);
			try {
				$con->beginTransaction();
				foreach ($objects as $object) {
					$object->delete($con);
				}
				$con->commit();
				$this->setFlash('notice', 'Your modifications have been saved');
			} catch (PropelException $e) {
				$con->rollback();
				$this->getRequest()->setError('delete', 'Could not delete the selected ' . sfInflector::humanize($this->getPluralName()) . '. Make sure it does not have any associated items.');
			}
		}
	}

	protected function getListObjects($list_target = null) {
		$criteria = $this->_getCriteriaListObjects($list_target);
		$peer_class_name = $this->getPeerClassName();
		return $peer_class_name::doSelect($criteria);
	}

	protected function _getListObjects($list_target = null) {
		$method_name = "getList{$this->getClassName()}s";
		if (method_exists($this, $method_name)) {
			return $this->$method_name($list_target);
		}
		return $this->getListObjects($list_target);
	}

	protected function getExportListObjects($list_target = null) {
		return $this->_getListObjects($list_target);
	}

	protected function _getExportListObjects($list_target = null) {
		$method_name = "getExportList{$this->getClassName()}s";
		if (method_exists($this, $method_name)) {
			return $this->$method_name($list_target);
		}
		return $this->getExportListObjects($list_target);
	}

	protected function getCriteriaListObjects($list_target = null) {
		$list_target = $list_target ? $list_target : 'tg_' . $this->getModuleName() . '_list'; //WARNING ! Same unique ID generation than in components.class.php:223
		//hack - Chargement des class peer
		$criteriaClassPeer = $this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/' . $list_target . '/criteria_class_peer', array());
		foreach ($criteriaClassPeer as $classPeer) {
			sfCore::splAutoload($classPeer);
		}
		$criteria = unserialize($this->getUser()->getAttribute('sf_admin/' . $this->surface_namespace . '/' . $list_target . '/criteria'));
		if (!is_a($criteria, 'Criteria')) {
			$criteria = $this->getDefaultCriteria();
		}
		return $criteria;
	}

	protected function _getCriteriaListObjects($list_target = null) {
		$method_name = "getCriteriaList{$this->getClassName()}s";
		if (method_exists($this, $method_name)) {
			return $this->$method_name($list_target);
		}
		return $this->getCriteriaListObjects($list_target);
	}

	public function multipleInlineUpdateFromRequest() {
		$prm_objects = (array)$this->getRequestParameter($this->getSingularName());
		$to_delete = (array)$this->getRequestParameter($this->getSingularName() . '_to_delete');
		foreach ($to_delete as $key => $value) {
			if ($value) {
				$peer_class_name = $this->getPeerClassName();
				$obj = $peer_class_name::retrieveByPk($key);
				if ($obj) {
					$this->_deleteObject($obj);
				}
			}
		}
		foreach ($prm_objects as $id => $prm_object) {
			if (isset($to_delete[$id]) && $to_delete[$id]) {
				continue;
			}
			$this->getRequest()->setParameter($this->getSingularName(), $prm_object);
			if ($id < 0) {//New object
				$this->action_name = 'create';
				$this->object = $this->_getObjectOrCreate(null);
			} else {
				$this->action_name = 'edit';
				$peer_class_name = $this->getPeerClassName();
				$this->object = $peer_class_name::retrieveByPk($id);
			}
			if ($this->object) {
				$this->_updateObjectFromRequest();
				$this->saveObject($this->object);
			}
		}
		$this->inline_editing = false;
	}

	public function executeComponentInlineEditingRow($component) {
		$this->object = $this->_getObjectOrCreate(null);
		$this->object->setId($this->getRequestParameter($this->getPrimaryKey(), -1));
		$this->unique_id = $this->getModuleName() . '_' . $component;
		$this->inline_editing = true;
		sfLoader::loadHelpers('Partial');
		include_partial($component . '_td_inline_editing', $this->varHolder->getAll());
		exit;
	}

	public function formatDate($date, $default = null, $input = 'd', $output = 'i') {
		if(!$date){
			return $default;
		}
		try {
			$dateFormat = new sfDateFormat($this->getUser()->getCulture());
			$value = $dateFormat->format($date, $output, $dateFormat->getInputPattern($input));
		} catch (sfException $e) {
			$value = $default;
		}
		return $value;
	}

	public function preExecute() {
		if (($credentials = sfConfig::get('app_security_credentials')) && !$this->getUser()->hasCredential($credentials)) {
			if ($redirect = sfConfig::get('app_security_redirect')) {
				$this->redirect($redirect, 403);
			} else {
				$this->getUser()->signOut();
				$this->redirect('login', 403);
			}
		}
		$this->target = $this->getRequestParameter('target', null);
		$this->anchor = $this->getRequestParameter('anchor', null);
		$this->callbacks = array();
		$this->dialog = $this->getRequestParameter('dialog', null);

		$this->preparePermalinkPanels();

		return parent::preExecute();
	}

	public function postExecute() {
		$this->postExecuteWizard();
		parent::postExecute();
	}

	public static function doModuleUpdateFromRequest($moduleName, $action, & $object) {
		$moduleActionClassName = self::getModuleActionClassName($moduleName);
		call_user_func(array($moduleActionClassName, 'updateFromActionRequest'), $action, $object);
	}

	public static function doModuleValidate($moduleName, $action, $validateActionName) {
		$moduleActionClassName = self::getModuleActionClassName($moduleName);
		$methodName = 'validateAction' . ucfirst($validateActionName);
		return call_user_func(array($moduleActionClassName, $methodName), $action);
	}

	protected static function getModuleActionClassName($moduleName) {
		// Loading required files from cache
		sfConfigCache::getInstance()->import(sfConfig::get('sf_app_module_dir_name') . '/' . $moduleName . '/' . sfConfig::get('sf_app_module_config_dir_name') . '/generator.yml', true, true);
		// Load module action class
		$path = sfConfig::get('sf_app_module_dir') . '/' . $moduleName . '/actions/actions.class.php';
		if (is_file($path)) {
			require_once($path);
		} else {
			$dirs = sfLoader::getControllerDirs($moduleName);
			foreach ($dirs as $dir => $read) {
				if (is_file($dir . '/actions.class.php')) {
					require_once($dir . '/actions.class.php');
				}
			}
		}
		return $moduleName . 'Actions';
	}

	protected function preparePermalinkPanels() {
		$this->permalink = array();
		$target = array();
		$target1 = $this->getRequestParameter('target1', null);
		$url1 = $this->getRequestParameter('url1', null);
		if (isset($target1)) {
			$this->permalink[$target1] = str_replace(array('|', '$', '£'), array('/', '?', '&'), $url1);
		}
		$target2 = $this->getRequestParameter('target2', null);
		$url2 = $this->getRequestParameter('url2', null);
		if (isset($target2)) {
			$this->permalink[$target2] = str_replace(array('|', '$', '£'), array('/', '?', '&'), $url2);
		}
		$this->addPermalinkIfNotSet('tg_center');
		$this->addPermalinkIfNotSet('tg_east');
		if (count($this->permalink) > 0 && !isset($this->permalink['tg_center'])) {
			$this->permalink['tg_center'] = sfConfig::get('app_surface_default_index');
		}
	}

	protected function addPermalinkIfNotSet($target) {
		if (!isset($this->permalink[$target])) {
			$url = sfSurfaceHistory::getCurrentUrl($target);
			if (isset($url)) {
				if (strpos($url, '.php/') > 0) {
					$url = substr($url, strpos($url, '.php/') + 5);
				}
				$this->permalink[$target] = $url;
			}
		}
		//antibouclage sur default/index
		if (isset($this->permalink[$target]) && strpos($this->permalink[$target], "fault/index") > 0) {
			unset($this->permalink[$target]);
		}
	}

	public function executePermalink() {
		$this->forward('default', 'index');
	}

	// Wizard support
	protected function initWizard($wizard_name, $wizard_param) {
		$wizard = $this->getWizard();
		if (!$wizard->isLoaded()) {
			$wizard->load($wizard_name, $wizard_param, $this->getRequest());
			$wizard->save();
		}
		if ($wizard->isLoaded()) {
			// si une redirection doit avoir lieu avant l'action
			if ($wizard->mustRedirectBeforeAction(false)) {
				// $this->redirect($this->wizard->getRedirectUrl());
			}
		}
	}

	/**
	 * Return wizard of the current action
	 * @return sfSurfaceWizardNavigation
	 */
	public function getWizard() {
		if (!isset($this->wizard)) {
			$this->wizard = sfSurfaceWizardNavigation::getInstance();
		}
		return $this->wizard;
	}

	protected function postExecuteWizard() {
		$wizard = $this->getWizard();
		if ($wizard->isLoaded()) {
			if ($this->getRequest()->getMethod() == sfRequest::POST) {
				// Par défaut, en post, on va à l'action suivante
				$wizard->redirectNext($this);
			}
		}
	}

	protected function setWizardCollectedData($data_id, $data) {
		$wizard = $this->getWizard();
		if (isset($this->wizard)) {
			if ($this->wizard->isLoaded()) {
				$this->wizard->setCollectedData($data_id, $data);
			}
		}
	}

	protected function getWizardCollectedData($data_id, $def_value = null) {
		if (isset($this->wizard)) {
			return $this->wizard->getCollectedData($data_id, $def_value);
		}
		return $def_value;
	}

	protected function setWizardNextStep($step_id) {
		if (isset($this->wizard)) {
			return $this->wizard->setNextStep($step_id);
		}
	}

	protected function setError($name, $message) {
		$this->getRequest()->setError($name, $message);
		if (isset($this->wizard)) {
			$this->wizard->mustRedirectAfterAction(false);
		}
	}

	public function executeClearCache() {
		shell_exec("cd ..; ./symfony cc;");
		sfSurfaceHistory::clear('tg_center');
		sfSurfaceHistory::clear('tg_east');
		$this->forward('default', 'index');
	}

	public function executeAddSelectionToCart() {
		$cart = $this->getCart();
		$autosave = $cart->isAutosave();
		$cart->setAutosave(false);

		$objects = $this->_getListObjects($this->getRequestParameter('list_target'));
		foreach ($objects as $object) {
			$cart->addItem($object, true);
		}

		$cart->save();
		$cart->setAutosave($autosave);
		$this->cartRedirectListUpdate();
	}

	public function executeRemoveSelectionToCart() {
		$cart = $this->getCart();
		$autosave = $cart->isAutosave();
		$cart->setAutosave(false);

		$objects = $this->_getListObjects($this->getRequestParameter('list_target'));
		foreach ($objects as $object) {
			$cart->deleteItem($object, true);
		}
		$cart->save();
		$cart->setAutosave($autosave);
		$this->cartRedirectListUpdate();
	}

	protected function retrieveObjectsOfSelection($clearOrderBy = false) {
		$object_name = $this->getRequestParameter('object_name');
		$target = $this->getRequestParameter('list_target');
		$config = Cart::getConfig($object_name);
		$peer = isset($config[$object_name]['peer']) ? $config[$object_name]['peer'] : $object_name . 'Peer';
		$criteria = $this->_getCriteriaListObjects($target);
		if ($clearOrderBy) {
			$criteria->clearOrderByColumns();
		}
		$objects = call_user_func(array($peer, 'doSelectPk'), $criteria);
		return $objects;
	}

	protected function _retrieveObjectsOfSelection($clearOrderBy = false) {
		$method_name = "_retrieve{$this->getClassName()}sOfSelection";
		if (method_exists($this, $method_name)) {
			return $this->$method_name($clearOrderBy);
		}
		return $this->retrieveObjectsOfSelection($clearOrderBy);
	}

	protected function cartRedirectListUpdate() {
		$name = $this->getRequestParameter('name');
		$list_target = $this->getRequestParameter('list_target');
		$this->redirect($this->getModuleName() . '/listUpdate?name=' . $name . '&list_target=' . $list_target);
	}

	protected function prepareSearch($search) {
		if (is_array($search)) {
			$search = reset($search);
		}
		$search = str_replace('*', '%', $search);
		return $search;
	}

	//Fonction de compatibilité
	protected function search($search, $end = true, $begin = false) {
		return $this->addSearchWildcards($search, $begin, $end);
	}

	protected function addSearchWildcards($search, $before = false, $after = true) {
		if ($before) {
			$search = '%' . $search;
		}
		if ($after) {
			$search .= '%';
		}
		$search = str_replace('*', '%', $search);
		return $search;
	}

	protected function cleanSearchWildcards($search) {
		$search = str_replace('%', '', $search);
		return $search;
	}

	protected function getSearch($index = 'searchText', $before = false, $after = true) {
		if (!is_array($index)) {
			$index = array($index);
		}
		$search = null;
		foreach ($index as $value) {
			$search = $this->getRequestParameter($value, $search);
		}
		if (is_array($search)) {
			$search = reset($search);
		}
		$search = $this->cleanSearchWildcards($search);
		$search = $this->addSearchWildcards($search, $before, $after);
		return $search;
	}

	/**
	 * Get Cart from of current user
	 * @return Cart
	 */
	public function getCart() {
		return $this->getUser()->getCart();
	}

	protected function getHtml2PdfObject($sens, $format, $marge, $from = null) {
		return new HTML2PDF($sens, $format, 'fr', true, 'UTF-8', $marge);
	}

	protected function loadHelpers($helpers = array()) {
		sfLoader::loadHelpers(array('Helper', 'Tag', 'Date'));
		sfLoader::loadHelpers(sfConfig::get('sf_standard_helpers'));
		sfLoader::loadHelpers($helpers);
	}

	protected function toTimestamp($date) {
		if ($date) {
			return sfI18N::getTimestampForCulture($date, $this->getUser()->getCulture());
		}
		return 0;
	}

	public function getTitleForAction($action = 'show') {
		return $this->getGeneratorParameter($action . '.title', $this->getGeneratorParameter('show.title'));
	}

	/**
	 * Update object column from request parameter
	 * @param BaseObject $object
	 * @param string $column_name The standard Propel name (with underscores)
	 * @param string $request_param Optionnal, will try singular_name[column_name]
	 * @return boolean
	 * @throws sfActionException
	 */
	protected function setFromRequestParameter(BaseObject $object, $column_name, $request_param = null) {
		if (!$request_param) {
			$request_param = $this->getSingularName() . '[' . $column_name . ']';
		}
		$value = $this->getRequestParameter($request_param);
		if (!$value) {
			return false;
		}
		$setter = 'set' . sfInflector::camelize($column_name);
		if (!method_exists($object, $setter)) {
			$setter = 'set' . $column_name;
			if (!method_exists($object, $setter)) {
				throw new sfActionException("There is no column named {$column_name} in the object");
			}
		}
		try {
			$object->$setter($value);
		} catch (sfException $e) {
			return false;
		}
		return true;
	}

	/**
	 * Get a parameter from the generator.yml configuration
	 * @param string $key
	 * @param mixed $default
	 */
	public function getGeneratorParameter($key, $default = null) {
		$this->initGeneratorParameters();
		return $this->generator_parameters->getParameter($key, $default);
	}

	/**
	 * Get all parameters from generator.yml
	 * @return array
	 */
	public function getGeneratorParameters() {
		$this->initGeneratorParameters();
		return $this->generator_parameters->getParameters();
	}

	/**
	 * Initialize generator parameters holder
	 */
	protected function initGeneratorParameters() {
		if (!$this->generator_parameters) {
			$gen_file = sfConfig::get('sf_module_cache_dir') . '/auto' . ucfirst($this->getModuleName()) . '/surface_generator.yml.php';
			if (file_exists($gen_file)) {
				include $gen_file;
				$this->generator_parameters = new PropelConfiguration($generator_params);
			} else {
				$this->generator_parameters = new PropelConfiguration(array());
			}
		}
	}

	public function getSurfaceNamespace() {
		return $this->surface_namespace;
	}

	public function getClassName() {
		return $this->class_name;
	}

	public function getPeerClassName() {
		return $this->class_name . 'Peer';
	}

	/**
	 *
	 * @return BaseObject
	 */
	public function getObject() {
		return $this->object;
	}

	protected function _getObject() {
		$method_name = "_get{$this->getClassName()}";
		if (method_exists($this, $method_name)) {
			return $this->$method_name();
		}
		return $this->getObject();
	}

	public function getSingularName() {
		return $this->singular_name;
	}

	public function getPluralName() {
		return $this->plural_name;
	}

	public function getPrimaryKeys() {
		return $this->primary_keys;
	}

	public function getPrimaryKey() {
		return get(0, $this->primary_keys);
	}

	public function __set($key, $value) {
		switch ($key) {
			case 'object':
				parent::__set($this->getSingularName(), $value);
				break;
			case 'objects':
				parent::__set($this->getPluralName(), $value);
				break;
			case $this->getSingularName():
				parent::__set('object', $value);
				break;
			case $this->getPluralName():
				parent::__set('objects', $value);
				break;
		}
		parent::__set($key, $value);
	}

//	/**
//	 * TODO !!!!
//	 * @param type $key
//	 * @param type $default
//	 * @return type
//	 */
//	protected function getI18NString($key, $default = null){
//		$value = $this->getGeneratorParameter($key, $default);
//		preg_match_all('/%%([^%]+)%%/', $value, $matches, PREG_PATTERN_ORDER);
//		foreach($matches as $match){
//			switch(substr($match, 0, 1)){
//				case '_':
//				case '~':
//				case '=':
//				case '+':
//					$match = substr($match, 1);
//				default:
//					$this->getGeneratorParameter("fields.{$match}.name");
//			}
//			$value = str_replace("%%{$match}%%", $match, $value);
//		}
//		$value = __($value);
//		return $value;
//	}
}

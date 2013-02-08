<?php

class SurfaceLinkTo {

	protected $content;

	/**
	 * The URL of the link
	 * @var \SfcUrl
	 */
	protected $url;
	protected $target;
	protected $object;
	protected $options = array();
	protected $html_options = array();
	protected $is_permalink = false;
	protected $is_external = false;

	public function __construct($content, $url = null, $target = null) {
		if (is_a($content, 'BaseObject')) {
			$this->setObject($content);
		} else {
			$this->setContent($content);
		}
		if ($url) {
			$this->setUrl($url);
		} else {
			$this->setUrl('show');
		}
		if ($this->getObject() && (SfcUrl::isAction($url) || !$url)) {
			$this->getUrl()->setApp($this->getObjectMetadata('app'));
			$this->getUrl()->setModule($this->getObjectMetadata('module'));
			$this->getUrl()->setQueryParameter($this->getObjectMetadata('primary_key', 'id'), $this->getObject()->getPrimaryKey());
			if(!$url){
				$this->getUrl()->setAction($this->getObjectMetadata('action', 'show'));
			}
			$this->setTarget($this->getObjectMetadata('target', 'tg_east'));
		}
		if ($target) {
			$this->setTarget($target);
		} else {
			$this->setTarget($this->getUrl()->getTarget());
		}
	}

	/**
	 * Display the link
	 * @return string
	 */
	public function __toString() {
		return "<a href=\"{$this->getUrl()}\" onclick=\"{$this->getJavascript()}\"{$this->getHTMLOptions(true)}>".(string)$this->getContent()."</a>";
	}

	/**
	 * Returns either a string or a BaseObject
	 * @return string
	 */
	public function getContent() {
		if ($this->content !== null) {
			return $this->content;
		}
		if ($this->getObject()) {
			return (string)$this->getObject();
		}
	}

	/**
	 *
	 * @param string $content
	 * @return \SurfaceLinkTo
	 */
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}

	/**
	 *
	 * @return \SfcUrl
	 */
	public function getUrl() {
		return $this->url;
	}

	public function setUrl($url) {
		$this->url = new SfcUrl($url);
		if ($this->getUrl()->getTarget()) {
			$this->setTarget($this->getUrl()->getTarget());
		}
		return $this;
	}

	public function getTarget() {
		if ($this->target) {
			return $this->target;
		} elseif ($this->getObjectMetadata('target')) {
			return $this->getObjectMetadata('target.' . $this->getAction());
		}
		return 'tg_east';
	}

	public function setTarget($target) {
		if (is_array($target)) {
			$array = $target;
			$target = get($this->getUrl()->getAction(), $array);
			if (!$target) {
				$target = array_shift($array);
			}
		}
		if (strpos($target, '|')) {
			$target = explode('|', $target);
			$app = array_shift($target);
			$target = array_shift($target);
			if (SF_APP != $app) {
				$this->setPermalink(true)->getUrl()->setApp($app);
				$this->removeHTMLOption('target');
			}
		}
		$this->target = $target;
		$this->getUrl()->setTarget($target);
		return $this;
	}

	public function getAction(){
		if($this->getUrl()){
			return $this->getUrl()->getAction();
		}
	}

	public function setAction($value){
		if($this->getUrl()){
			$this->getUrl()->setAction($value);
		}
		return $this;
	}
	
	/**
	 *
	 * @return BaseObject
	 */
	public function getObject() {
		return $this->object;
	}

	/**
	 *
	 * @param BaseObject $object
	 * @return \SurfaceLinkTo
	 */
	public function setObject(BaseObject $object) {
		$this->object = $object;
		return $this;
	}

	/**
	 *
	 * @return boolean
	 */
	public function getSkipNav() {
		return $this->getUrl()->getSkipNav();
	}

	/**
	 *
	 * @param BaseObject $object
	 * @return \SurfaceLinkTo
	 */
	public function setSkipNav($b) {
		if (strtolower($b) == 'true' || strtolower($b) == 'on') {
			$b = true;
		} elseif (strtolower($b) == 'false' || strtolower($b) == 'off') {
			$b = false;
		}
		$this->getUrl()->setSkipNav($b);
		return $this;
	}

	/**
	 * @see self::__construct()
	 * @param mixed $content
	 * @param string $url
	 * @param string $target
	 * @return \SurfaceLinkTo
	 */
	public static function create($content, $url = null, $target = null) {
		return new SurfaceLinkTo($content, $url, $target);
	}

	/**
	 *
	 * @param string $metadata
	 * @param string $default
	 * @return mixed
	 */
	public function getObjectMetadata($metadata = null, $default = null) {
		if ($this->getObject() && method_exists($this->getObject(), 'getMetadata')) {
			return $this->getObject()->getMetadata($metadata, $default);
		}
		return $default;
	}

	public function getOptions() {
		return $this->options;
	}

	public function setOptions(array $options) {
		$this->options = $options;
		return $this;
	}

	public function removeOptions(){
		$this->options = array();
		return $this;
	}

	public function setOption($key, $value) {
		$this->options[$key] = $value;
		return $this;
	}

	public function getOption($key) {
		if(isset($this->options[$key])){
			return $this->options[$key];
		}
	}

	public function removeOption($key){
		unset($this->options[$key]);
		return $this;
	}

	public function getHTMLOptions($to_html = false) {
		if ($to_html) {
			if(!function_exists('_tag_options')){
				sfLoader::loadHelpers('Tag');
			}
			return _tag_options($this->html_options);
		}
		return $this->html_options;
	}

	public function setHTMLOptions(array $html_options) {
		$this->html_options = array_merge($this->html_options, $html_options);
		return $this;
	}

	public function removeHTMLOptions(){
		$this->html_options = array();
		return $this;
	}

	public function setHTMLOption($key, $value) {
		$this->html_options[$key] = $value;
		return $this;
	}

	public function getHTMLOption($key) {
		if(isset($this->html_options[$key])){
			return $this->html_options[$key];
		}
	}

	public function removeHTMLOption($key){
		unset($this->html_options[$key]);
		return $this;
	}

	protected function getJavascript() {
		if ($this->isPermalink() || $this->isExternal()) {
			return;
		}
		$js = '';
		$options = $this->options;
		$surface_options = _build_callbacks($options);

		if (get('type', $options) == 'synchronous') {
			$surface_options['asynchronous'] = 'false';
		}
		if (get('method', $options)) {
			$surface_options['method'] = _method_option_to_s(get('method', $options));
		}
		if (get('position', $options)) {
			$surface_options['insertion'] = "Insertion." . sfInflector::camelize(get('position', $options));
		}
		if (get('script', $options) === '0' || get('script', $options) === false) {
			$surface_options['evalScripts'] = 'false';
		}
		if (get('success', $options)) {
			$surface_options['success'] = escape_javascript(get('success', $options));
		}
		if (get('parameters', $options)) {
			$surface_options['parameters'] = get('parameters', $options);
		} elseif (get('with', $options)) {
			$surface_options['parameters'] = get('with', $options);
		}
		if (get('popup_width', $options)) {
			$surface_options['popup_width'] = get('popup_width', $options);
		}
		if (get('popup_height', $options)) {
			$surface_options['popup_height'] = get('popup_height', $options);
		}
		if (get('popup_title', $options)) {
			$surface_options['popup_title'] = get('popup_title', $options);
		}

		if (sfConfig::get('app_surface_auto_update', false)) {
			$component_update = _get_option($options, 'component_class_update', null);
			if ($component_update) {
				if (is_array($component_update)) {
					$surface_options['component_class_update'] = _array_or_string_for_javascript($component_update);
				} else {
					$surface_options['component_class_update'] = "'{$component_update}'";
				}
			}
		}

		if (_get_option($options, 'surface_method') == 'submit_to') {
			$js = "surface.submit_to(this,'{$this->getUrl()}','{$this->getTarget()}'," . _options_for_javascript($surface_options) . ");";
		} else {
			$js = "surface.link_to('{$this->getUrl()}','{$this->getTarget()}'," . _options_for_javascript($surface_options) . ");";
		}

		if (get('before', $options)) {
			$js = get('before', $options) . ';' . $js;
		}
		if (get('after', $options)) {
			$js = $js . ';' . get('after', $options);
		}
		if (get('confirm', $options)) {
			$js = "if(confirm('" . escape_javascript(get('confirm', $options)) . "')){{$js}}";
			if (get('cancel', $options)) {
				$js = $js . 'else{' . get('cancel', $options) . '}';
			}
		}

		if (get('condition', $options)) {
			$js = "if(" . get('condition', $options) . "){{$js}}";
		}
		return $js . ';return false;';
	}

	/**
	 * Check if the link is a permalink, meaning it reloads the entire
	 * controller or load an other controller.
	 * @return bool
	 */
	public function isPermalink() {
		return (bool)$this->is_permalink;
	}

	/**
	 * Check if the link is a permalink, meaning it reloads the entire
	 * controller or load an other controller.
	 * @return bool
	 */
	public function setPermalink($v = true) {
		$this->is_permalink = (bool)$v;
		if($this->isPermalink()){
			$this->setHTMLOption('target', '_blank');
		} else {
			$this->removeHTMLOption('target');
		}
		return $this;
	}

	/**
	 * Check if the link is an external, meaning it loads the link in a new page.
	 * @return bool
	 */
	public function isExternal() {
		return (bool)$this->is_external;
	}

	/**
	 * Check if the link is a permalink, meaning it reloads the entire
	 * controller or load an other controller.
	 * @return bool
	 */
	public function setExternal($v = true) {
		$this->is_external = (bool)$v;
		if($this->isExternal()){
			$this->setHTMLOption('target', '_blank');
			$this->setTarget(null);
		} else {
			$this->removeHTMLOption('target');
		}
		return $this;
	}

	public function setLayout($v){
		$this->url->setQueryParameter('layout', 'print');
		$this->url->setTarget(null);
		return $this;
	}

	public function setQueryParameter($key, $value = null){
		$this->url->setQueryParameter($key, $value);
		return $this;
	}
}
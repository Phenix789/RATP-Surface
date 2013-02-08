<?php

/**
 * Build URL from different parameters and parse strings to extract URL
 * @author Vincent Chalnot
 * @package Surface 1.6
 */
class SfcUrl{

	/**
	 * List of common action names
	 * @var array
	 */
	protected static $common_actions = array('create', 'show', 'edit', 'delete', 'view', 'duplicate');

	/**
	 * Scheme of URL (http or https)
	 * @var string
	 */
	protected $scheme;

	/**
	 * Username for inline authentication
	 * @var string
	 */
	protected $username;

	/**
	 * Password for inline authentication
	 * @var string
	 */
	protected $password;

	/**
	 * Hostname of the remote server, take server hostname by default
	 * @var string
	 */
	protected $hostname;

	/**
	 * Application (or php file)
	 * @var string
	 */
	protected $app;

	/**
	 * Module of the application
	 * @var string
	 */
	protected $module;

	/**
	 * Action for module (show, edit…)
	 * @var string
	 */
	protected $action;

	/**
	 * Array of key => value for query parameters
	 * what's after the ?
	 * @var array
	 */
	protected $query = array();

	/**
	 * Fragment of the URL, what's after the #
	 * not sent to the server but used by scripting languages
	 * @var type
	 */
	protected $fragment;

	/**
	 * Build an internal representation of an URL from a string
	 * @param string $url
	 */
	public function __construct($url){
		$url = parse_url($url);
		$this->scheme = get('scheme', $url);
		$this->username = get('username', $url);
		$this->password = get('password', $url);
		$this->hostname = get('hostname', $url, $_SERVER['SERVER_NAME']);
		$path = explode('/', trim(get('path', $url), '/'));
		if(isset($path[0]) && substr($path[0], -4) == '.php'){
			$app = substr(array_shift($path), 0, -4);
			if(substr($app, -4) == '_dev'){
				$app = substr($app, 0, -4);
			}
			$this->app = $app;
		} else {
			$this->app = SF_APP;
		}
		if(count($path) > 1){
			$this->module = array_shift($path);
		} else {
			$this->module = sfContext::getInstance()->getModuleName();
		}
		$this->action = array_shift($path);
		while($key = array_shift($path)){
			$this->setQueryParameter($key, array_shift($path));
		}
		$this->setQuery(get('query', $url));
//		if($this->action == $this->module){
//			$keys = array_keys($this->query);
//			$this->action = array_shift($keys);
//			array_shift($this->query);
//		}
		$this->fragment = get('fragment', $url);
	}

	public static function create($url){
		return new self($url);
	}

	/**
	 * Output the final formatted URL
	 * @return string
	 */
	public function __toString(){
		return $this->getToString();
	}

	public function getToString($full = false){
		$final = '';
		if($full){
			if($this->getScheme()){
				$final .= $this->getScheme().':';
			}
			$final .= '//';
			if($this->getUsername()){
				$final .= $this->getUsername();
			}
			if($this->getPassword()){
				$final .= ':'.$this->getPassword();
			}
			if($this->getUsername() || $this->getPassword()){
				$final .= '@';
			}
			$final .= $this->getHostName();
		}
		$final .= '/'.$this->getApp().(SF_ENVIRONMENT == 'dev' ? '_dev' : '').'.php';
		if($this->getModule()){
			$final .= '/'.$this->getModule();
			if($this->getAction()){
				$final .= '/'.$this->getAction();
			}
		}
		if($this->getQuery()){
			$query = array();
			foreach($this->getQuery() as $key => $value){
				$query[] = urlencode($key).($value ? '='.urlencode($value) : '');
			}
			$final .= '?'.implode('&', $query);
		}
		if($this->getFragment()){
			$final .= '#'.$this->getFragment();
		}
		return $final;
	}

	/**
	 * 
	 * @return string
	 */
	public function getScheme(){
		return $this->scheme;
	}

	/**
	 *
	 * @param string $scheme
	 * @return \SfcUrl
	 */
	public function setScheme($scheme){
		$this->scheme = $scheme;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getUsername(){
		return $this->username;
	}

	/**
	 *
	 * @param string $username
	 * @return \SfcUrl
	 */
	public function setUsername($username){
		$this->username = $username;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getHostname(){
		return $this->hostname;
	}

	/**
	 *
	 * @param string $hostname
	 * @return \SfcUrl
	 */
	public function setHostname($hostname){
		$this->hostname = $hostname;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getApp(){
		return $this->app;
	}

	/**
	 *
	 * @param string $app
	 * @return \SfcUrl
	 */
	public function setApp($app){
		$this->app = $app;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getModule(){
		return $this->module;
	}

	/**
	 *
	 * @param string $module
	 * @return \SfcUrl
	 */
	public function setModule($module){
		$this->module = $module;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getAction(){
		return $this->action;
	}

	/**
	 *
	 * @param string $action
	 * @return \SfcUrl
	 */
	public function setAction($action){
		$this->action = $action;
		return $this;
	}

	/**
	 *
	 * @return array
	 */
	public function getQuery(){
		return $this->query;
	}

	/**
	 * Set Query from a string or an array
	 * @param mixed $query
	 * @return \SfcUrl
	 */
	public function setQuery($query){
		if(is_array($query)){
			$this->query = $query;
			return $this;
		}
		foreach(explode('&', $query) as $value){
			if(strpos($value, '=')){
				$value = explode('=', $value);
				$key = (string)array_shift($value);
				if($key){
					$this->query[$key] = (string)array_shift($value);
				}
			} elseif($value) {
				$this->query[$value] = '';
			}
		}
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getFragment(){
		return $this->fragment;
	}

	/**
	 *
	 * @param string $fragment
	 * @return \SfcUrl
	 */
	public function setFragment($fragment){
		$this->fragment = $fragment;
		return $this;
	}

	/**
	 * Get target from query parameters or return default param
	 * @param mixed $default
	 * @return string
	 */
	public function getTarget($default = null){
		if(get('target', $this->query)){
			return get('target', $this->query);
		}
		return $default;
	}

	/**
	 * Set target in query parameter
	 * @param string $target
	 */
	public function setTarget($target){
		if($target){
			$this->query['target'] = $target;
		} else {
			unset($this->query['target']);
		}
		return $this;
	}

	/**
	 * Get skipNav option from query parameters or return default param
	 * @param boolean $default
	 * @return boolean
	 */
	public function getSkipNav($default = null){
		if(get('skipNav', $this->query)){
			return (bool)get('skipNav', $this->query);
		}
		return $default;
	}

	/**
	 * Set skipNav option in query parameter
	 * @param boolean $b
	 */
	public function setSkipNav($b = true){
		if($b){
			$this->query['skipNav'] = 'true';
		} else {
			unset($this->query['skipNav']);
		}
		return $this;
	}

	/**
	 *
	 * @param string $key
	 * @param string $value
	 */
	public function setQueryParameter($key, $value = null){
		$this->query[$key] = $value;
		return $this;
	}

	/**
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return string
	 */
	public function getQueryParameter($key, $default = null){
		return get($key, $this->query, $default);
	}

	public function removeQueryParameter($key){
		unset($this->query[$key]);
		return $this;
	}

	public static function isAction($key){
		return in_array($key, self::$common_actions);
	}
}
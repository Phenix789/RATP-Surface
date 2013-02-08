<?php

class API {

	private static $instance = null;
	private $browser;
	private $api_url;
	private $username;
	private $password;
	private $headers;

	public static function getInstance($app_api_key = null) {
		if (null === API::$instance) {
			API::$instance = new API($app_api_key);
		}

		return API::$instance;
	}

	public function get($url) {
		$this->browser->restart();

		$this->browser->get($this->api_url . $url, array(), $this->headers);
		if($this->browser->responseIsError()){
			//var_dump($this->api_url . $url, $datas, $this->headers, $this->browser->getResponseText());
		}
		return json_decode($this->browser->getResponseText(), true);
	}

	public function post($url, array $datas) {
		$this->browser->restart();
		$this->browser->post($this->api_url . $url, $datas, $this->headers);
		if($this->browser->responseIsError()){
			//var_dump($this->api_url . $url, $datas, $this->headers, $this->browser->getResponseText());
		}
		return json_decode($this->browser->getResponseText(), true);
	}

	public function __construct($app_api_key = 'app_api') {
		$this->browser = new sfWebBrowser();

		$this->api_url = sfConfig::get($app_api_key . '_url');
		$this->username = sfConfig::get($app_api_key . '_username');
		$this->password = sfConfig::get($app_api_key . '_password');

		$hash = base64_encode($this->username . ':' . $this->password);

		$this->headers = array('Authorization' => 'Basic ' . $hash);
	}

	public function setHeaders($headers) {

		$this->headers = array_merge($this->headers, $headers);
	}

}
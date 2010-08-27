<?php

App::import('Vendor', 'HttpClient.cakephp_http_client_Net_Socket', aa('file', 'vendors/Net/Socket.php'));
App::import('Vendor', 'HttpClient.cakephp_http_client_Net_URL', aa('file', 'vendors/Net/URL.php'));
App::import('Vendor', 'HttpClient.cakephp_http_client_HTTP_Request', aa('file', 'vendors/HTTP/Request.php'));
App::import('Vendor', 'HttpClient.cakephp_http_client_HTTP_Client_CookieManager', aa('file', 'vendors/HTTP/Client/CookieManager.php'));
App::import('Vendor', 'HttpClient.cakephp_http_client_HTTP_Client', aa('file', 'vendors/HTTP/Client.php'));

class HttpClientComponent extends Object {
	
	var $_http = null;
	
	function &_getInstance() {
		if (!isset($this->_http)) $this->_http = new cakephp_http_client_HTTP_Client();
		return $this->_http;
	}
	
	function __call($name, $arguments) {
		$http = &$this->_getInstance();
		if (method_exists($http, $name)) {
			return call_user_method_array($name, $http, $arguments);
		}
	}

}

?>
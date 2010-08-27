<?php

$result = App::import('Vendor', 'HttpClient.' . md5(time()), aa('file', 'vendors/HTTP/Client.php'));

class HttpClientComponent extends Object {
	
	var $_http = null;
	
	function &_getInstance() {
		if (!isset($this->_http)) $this->_http = new HTTP_Client();
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
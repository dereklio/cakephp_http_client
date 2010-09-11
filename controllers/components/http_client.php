<?php

$plugin = Inflector::camelize(basename(realpath(dirname(__FILE__) . '/../..')));
foreach (a('PEAR', 'PEAR5', 'Net/Socket', 'Net/URL', 'HTTP/Request/Listener', 'HTTP/Request', 'HTTP/Client', 'HTTP/Client/CookieManager') as $filename) {
	App::import('Vendor', $plugin . '.cakephp_httpclient_' . r('/', '_', $filename), aa('file', 'vendors/' . $filename . '.php'));
}
unset($plugin);

class HttpClientComponent extends Object {
	
	var $_http = null;
	
	function &_getInstance() {
		if (!isset($this->_http)) $this->_http = new cakephp_httpclient_HTTP_Client();
		return $this->_http;
	}
	
	function __call($name, $arguments) {
		$http = &$this->_getInstance();
		if (method_exists($http, $name)) {
			return call_user_func_array(a($http, $name), $arguments);
		}
	}

}

?>
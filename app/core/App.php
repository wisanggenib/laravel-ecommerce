<?php

class App {
	protected $controller = DEFAULT_CLASS;
	protected $method = DEFAULT_FUNCTION;
	protected $params = [];

	public function parseURL(){
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = rtrim($_GET['url'], '/');
			// $url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}

	public function __construct(){


		$url = $this->parseURL();
		

		// _GET URL
		if (strpos($_SERVER['REQUEST_URI'],'?') == true) {
		    $uri_parts = explode('?', rtrim($_SERVER['REQUEST_URI'], '/'));
			$get_params = explode("&", @$uri_parts[1]);
			foreach ($get_params as $key_uri_params => $value_uri_params) {
				$name_params =  substr($value_uri_params,0,strpos($value_uri_params.'=','='));
				$val_params =  substr($value_uri_params,strpos($value_uri_params.'=','=')+1);
		        $val_params = urldecode($val_params);
				$_GET[$name_params] = $val_params;
			}
		}

		// CONTROLLER
		if ($url !== NULL) {
			if (file_exists('app/controller/'.$url[0].'.php')) {
				$this->controller = $url[0];
				unset($url[0]);
			}else{
				if ($url[0] !== "") {
					$page_error = "true";
					exit;
					// echo "<script>alert('".DOCUMENT_ROOT."')</script>";
					header("Location: ".base_url()."404");
				}
			}
		}
		require_once 'app/controller/'.$this->controller.'.php';
		$this->controller = new $this->controller;


		//METHOD
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// PARAMETER
		if (!empty($url)) {
			$this->params = array_values($url);
		}

		// JALANKAN CONTROLLER, METHOD. KIRIM PARAMETER
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	
}
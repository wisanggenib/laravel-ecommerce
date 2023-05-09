<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta"); 

require_once 'app/init.php';

// BASE ADDRESS
function base_url($url = ""){
	$base_url = rtrim(BASE_URL, '/');
	$base_url = $base_url.'/';
	$url = ltrim($url, '/');
	if ($url == "") {
		return $base_url;
	}else{
		return $base_url.$url;
	}
}

$new = new App;

?>
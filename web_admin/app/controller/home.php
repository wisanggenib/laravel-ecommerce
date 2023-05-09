<?php 

class Home extends Controller {

	public function __construct(){

	}

	public function index($nama = ""){
		$data = [];
		$this->view('login');
	}
	
}
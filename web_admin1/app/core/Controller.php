<?php 

class Controller{

	public function view($view, $data_array_909090 = []){
		extract($data_array_909090);
		unset($data_array_909090);

		require_once 'app/views/'.$view.'.php';
	}

	public function model($model){
		require_once 'app/model/'.$model.'.php';
		return new $model;
	}


}
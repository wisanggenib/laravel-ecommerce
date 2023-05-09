<?php 

class Blog extends Controller {

	public function __construct(){
		method('post');
		auth_token();
	}

	public function list_new($limit = 3){
		json(enkripsi_array($this->model('Blog_model')->get_new_limit($limit), "id_blog"));
	}

}
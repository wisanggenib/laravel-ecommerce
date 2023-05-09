<?php 

class User extends Controller {

	public function __construct(){
		method('post');
		auth_token();
	}

	public function url_file(){
		$data['url_image_produk'] = URL_IMAGE_PRODUK;
		$data['url_image_banner'] = URL_IMAGE_BANNER;
		$data['url_image_blog'] = URL_IMAGE_BLOG;
		$data['url_image_profil'] = URL_IMAGE_PROFIL;
		json($data);
	}

	public function login(){
		json($this->model('User_model')->login(@$_POST['email'],@$_POST['password']));
	}

	public function login_google(){
		$respon = $this->model('User_model')->login(@$_POST['email'],@$_POST['password']);
		$data['status'] = "200";
		$data['data'] = $respon['login'];
		die(json_encode($data));
	}

}
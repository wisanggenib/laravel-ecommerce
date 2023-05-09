<?php 

class Promo extends Controller {

	public function __construct(){
		method('post');
		auth_token();
	}

	public function list_banner(){
		json(enkripsi_array($this->model('Home_model')->get_banner(),"idbanner"));
	}

	public function list_flashsale(){
		$data = $this->model('Home_model')->get_flashsale_list_home();
		json(enkripsi_array($data, "id_flashsale|kd_barang|id_barang"));
	}

	public function list_banner_mini(){
		$data[0]['nama_banner'] = "tes";
		$data[0]['deskripsi_banner'] = "tes";
		$data[0]['gambar_banner'] = "Banner kecil 1.jpg";
		$data[0]['link_banner'] = "https://dev.andipublisher.com";

		$data[1]['nama_banner'] = "tes";
		$data[1]['deskripsi_banner'] = "tes";
		$data[1]['gambar_banner'] = "Banner kecil 2.jpg";
		$data[1]['link_banner'] = "https://dev.andipublisher.com";

		json($data);
	}

}
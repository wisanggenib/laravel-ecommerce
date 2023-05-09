<?php 

class Produk extends Controller {

	public function __construct(){
		method('post');
		auth_token();
	}

	public function list_produk_terlaris(){
		json(enkripsi_array($this->model('Produk_model')->list_produk_terlaris(10), "id_barang|kdkategori"));
	}

	public function list_produk_terbaru(){
		json(enkripsi_array($this->model('Produk_model')->list_produk_terbaru(10), "id_barang|kdkategori"));
	}

	public function detail_produk($slug=""){
		$data['produk'] = $this->model('Produk_model')->get_detail($slug);
		$data['cek_wishlist'] = $this->model('User_model')->cek_apakah_favorit($data['produk']['id_barang']);
		$data['ulasan'] = $this->model('Produk_model')->get_ulasan_produk($data['produk']['id_barang']);
		$data['diskusi'] = $this->model('Produk_model')->get_diskusi_produk($data['produk']['id_barang']);
		$data['produk_sejenis'] = enkripsi_array($this->model('Produk_model')->get_produk_terlaris_by_kategori($data['produk']['kdkategori'], "10"), 'id_barang|kdkategori');
		json(enkripsi_array($data, "id_barang|kdkategori|penanggung_jawab_input|id_kategori"));
	}

	public function list_kategori(){
		json(($this->model('Produk_model')->get_kategori_2_level()));
	}


}
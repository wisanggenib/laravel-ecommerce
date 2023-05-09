<?php

class User_model{

	public function __construct(){
		$this->db = new Database ;
	}
	
	public function get_cart(){
		$id_user = @$_SESSION['login_to']['id'];
		return $this->db->get_all_data("SELECT * FROM keranjang A JOIN produk B ON A.fk_produk=B.id_produk JOIN produk_kategori C ON B.fk_produk_kategori=C.id_produk_kategori WHERE A.fk_user='$id_user' ");
	}
}

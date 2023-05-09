<?php 

class Produk extends Controller {

	public function __construct(){
		// check_login();
		$this->db = new Database ;
		$_SESSION['cart'] = $this->model('User_model')->get_cart();
	}

	public function index($nama = ""){
		$this->view('index', []);
	}

	public function detail($id_produk = NULL){
		$data['detail'] = $this->db->get_data("SELECT * FROM produk WHERE id_produk='$id_produk' ");
		$this->view('detail_produk', $data);
	}

	public function add_cart_proses($id_produk = NULL){
		if (!isset($_SESSION['login_to'])) {
			header("location: ".base_url('user/login'));
			die();
		}
		$id_user = @$_SESSION['login_to']['id'];
		$cek_cart = $this->db->get_data("SELECT * FROM keranjang WHERE fk_user='$id_user' AND fk_produk='$id_produk' ");
		if (empty($cek_cart)) {
			$this->db->query("INSERT INTO keranjang SET id_keranjang=UUID(), fk_user='$id_user', fk_produk='$id_produk', jml_keranjang='1' ");
		}else{
			$this->db->query("UPDATE keranjang SET jml_keranjang=jml_keranjang+1 WHERE fk_user='$id_user' AND fk_produk='$id_produk' ");
		}
		set_notification('Berhasil menambahkan kedalam keranjang', 'success');
		header("location: ".$_SERVER['HTTP_REFERER']);
	}

	public function delete_cart_proses($id_produk = NULL){
		login();
		$id_user = @$_SESSION['login_to']['id'];
		$this->db->query("DELETE FROM keranjang WHERE fk_user='$id_user' AND fk_produk='$id_produk' ");

		set_notification('Berhasil menghapus keranjang', 'success');
		header("location: ".$_SERVER['HTTP_REFERER']);
	}

	public function plus_cart_proses($id_produk=NULL){
		login();
		$id_user = @$_SESSION['login_to']['id'];
		$this->db->query("UPDATE keranjang SET jml_keranjang=jml_keranjang+1 WHERE fk_user='$id_user' AND fk_produk='$id_produk' ");
		header("location: ".$_SERVER['HTTP_REFERER']);
	}

	public function minus_cart_proses($id_produk=NULL){
		login();
		$id_user = @$_SESSION['login_to']['id'];

		$cek_cart = $this->db->get_data("SELECT * FROM keranjang WHERE fk_user='$id_user' AND fk_produk='$id_produk' ");
		if (!empty($cek_cart)) {
			if ($cek_cart['jml_keranjang'] > 1) {
				$this->db->query("UPDATE keranjang SET jml_keranjang=jml_keranjang-1 WHERE fk_user='$id_user' AND fk_produk='$id_produk' ");
			}
		}
		header("location: ".$_SERVER['HTTP_REFERER']);
	}

	public function list(){
		$query = "SELECT * FROM produk WHERE TRUE ";
		if (isset($_GET['cari'])) {
			$query .= " AND nama_produk LIKE '%".$_GET['cari']."%' ";
		}
		if (!empty(@$_GET['kategori'])) {
			$query .= " AND fk_produk_kategori='".$_GET['kategori']."' ";
		}
		$query .= " AND status_hapus_produk='0' ";
		$data['kategori'] = $this->db->get_all_data("SELECT * FROM produk_kategori");
		$data['list'] = $this->db->get_all_data($query);
		$this->view('list_produk', $data);
	}
}

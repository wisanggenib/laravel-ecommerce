<?php 

class User extends Controller {

	public function __construct(){
		// check_login();
		$this->db = new Database ;
		$_SESSION['cart'] = $this->model('User_model')->get_cart();
	}

	public function index($nama = ""){
		$this->view('index', []);
	}

	public function login(){
		$this->view('login');
	}

	public function daftar(){
		$this->view('daftar');
	}

	public function daftar_proses(){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass_1 = $_POST['password'];
		$pass_2 = $_POST['password_2'];
		$pass_enkrip = password_hash($pass_1, PASSWORD_DEFAULT);


		if ($pass_1 != $pass_2) {
			set_notification('Password yang anda masukkan tidak sama', 'danger');
			header("location: ".base_url('user/daftar'));
		}

		$cek_email = $this->db->get_data("SELECT * FROM user WHERE email_user='$email' ");

		if (!empty($cek_email)) {
			set_notification('Email tersebut telah terdaftar', 'danger');
			header("location: ".base_url('user/daftar'));
		}

		$stmt = $this->db->query("INSERT INTO user SET id_user=UUID(), nama_user='$username', email_user='$email', password_user='$pass_enkrip' ");

		set_notification('Berhasil melakukan pendaftaran', 'success');
		header("location: ".base_url('user/login'));

	}

	public function login_proses(){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = $this->db->get_data("SELECT * FROM user WHERE email_user='$email' ");

		if (empty($data)) {
			set_notification('Email atau password yang anda masukkan tidak sesuai', 'danger');
			header("location: ".base_url('user/login'));
		}else{
			if (password_verify($password, $data['password_user'])) {
				$_SESSION['login_to']['id'] = $data['id_user'];
				$_SESSION['login_to']['username'] = $data['nama_user'];
				header("location: ".base_url());
			}else{
				set_notification('Email atau password yang anda masukkan tidak sesuai!', 'danger');
				header("location: ".base_url('user/login'));
			}
		}
	}

	public function logout(){
		unset($_SESSION['login_to']);
		header("location: ".base_url());
	}

	public function keranjang(){
		$this->view('keranjang');
	}

	public function riwayat_transaksi(){
		$id_user 	= @$_SESSION['login_to']['id'];
		$data['list'] = $this->db->get_all_data("SELECT * FROM transaksi WHERE fk_user='$id_user' ORDER BY tgl_transaksi DESC ");
		$data['list_detail'] = $this->db->get_all_data("SELECT * FROM transaksi A JOIN transaksi_detail B ON A.id_transaksi=B.fk_transaksi JOIN produk C ON B.fk_produk=C.id_produk WHERE fk_user='$id_user' ");

		$this->view('riwayat_belanja', $data);
	}

}

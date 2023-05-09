<?php 

class Admin extends Controller {

	public function __construct(){
		$this->db = new Database ;
	}

	public function index(){
		header("location: ".base_url());
	}

	public function login(){
		$this->view('admin/login');
	}

	public function login_proses(){
		$username = @$_POST['username'];
		$password = @$_POST['password'];

		$data_user = $this->db->get_data("SELECT * FROM admin WHERE username_admin='$username' ");

		if (empty($data_user)) {
			set_notification('Username atau password yang anda masukkan salah', 'danger');
			header("location: ".base_url());
		}

		if(password_verify($password, $data_user['password_admin'])){
			$_SESSION['login_admin']['id'] = $data_user['id_admin'];
			$_SESSION['login_admin']['username'] = $data_user['username_admin'];
			header("location: ".base_url('admin/dashboard'));
		}else{
			set_notification('Username atau password yang anda masukkan salah', 'danger');
			header("location: ".base_url());
		}
	}

	public function keluar_proses(){
		unset($_SESSION['login_admin']);
		feature::redirect_page(base_url());
	}

	public function dashboard(){
		$this->view('dashboard');
	}

}

<?php 

class Transaksi extends Controller {

	public function __construct(){
		// check_login();
		$this->db = new Database ;
		$_SESSION['cart'] = $this->model('User_model')->get_cart();
	}

	public function index($nama = ""){
		$this->view('index', []);
	}

	public function order(){

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ddbd26f486b5bdcc2810301d0899a2f2"
		  ),
		));
		$response = json_decode(curl_exec($curl), true);
		$err = curl_error($curl);
		curl_close($curl);

		$data['provinsi'] = $response['rajaongkir']['results'];
		$this->view('order', $data);
	}

	public function insert_transaksi_proses(){
		// echo "<pre>";
		// print_r($_POST);
		// print_r($_SESSION['cart']);

		$this->db->begin_transaction();

		$id_user 	= @$_SESSION['login_to']['id'];
		$nama 		= @$_POST['nama'];
		$telepon	= @$_POST['telepon'];
		$alamat 	= @$_POST['alamat'];
		$ongkir 	= @$_POST['ongkir'];
		$kurir 		= @$_POST['kurir'];


		$total_harga = 0;
		foreach ($_SESSION['cart'] as $key => $value){
			$total_harga += $value['harga_produk']*$value['jml_keranjang'];
			if ( ($value['stok_produk']-$value['jml_keranjang']) < 0 ) {
				set_notification('Stok produk '.$value['nama_produk'].' tidak mencukupi', 'danger');
				header("location: ".base_url('user/keranjang'));
				die();
			}
		}
		$total_harga += $ongkir;

		$id_transaksi = $this->db->get_uuid();
		$stmt[] = $this->db->query("INSERT INTO transaksi SET id_transaksi='$id_transaksi', fk_user='$id_user', alamat_pengiriman='$alamat', nama_penerima='$nama', telepon_penerima='$telepon', kurir_pengiriman='$kurir', ongkir='$ongkir', total_harga='$total_harga' ");

		foreach ($_SESSION['cart'] as $key => $value){
			//inset detail transaksi
			$stmt[] = $this->db->query("INSERT INTO transaksi_detail SET id_transaksi_detail=UUID(), fk_transaksi='$id_transaksi', fk_produk='$value[id_produk]', harga_beli='$value[harga_produk]', jumlah_beli='$value[jml_keranjang]' ");

			//update stok di table produk
			$stmt[] = $this->db->query("UPDATE produk SET stok_produk=stok_produk-".$value['jml_keranjang']." WHERE id_produk='$value[id_produk]' ");

			//inset mutasi stok
			$stok_after = $value['stok_produk'] - $value['jml_keranjang'];
			$stmt[] = $this->db->query("INSERT produk_stok SET fk_produk='$value[id_produk]', fk_transaksi='$id_transaksi', stok_awal='$value[stok_produk]', barang_masuk='0', barang_keluar='$value[jml_keranjang]', stok_akhir='$stok_after', keterangan_mutasi='Penjualan' ");
		}

		$stmt[] = $this->db->query("DELETE FROM keranjang WHERE fk_user='$id_user' ");


		if (in_array(false, $stmt)) {
			$this->db->rollback();
			set_notification('Gagal melakukan pembelian', 'danger');
			header("location: ".base_url('user/keranjang'));
		}else{
			$this->db->commit();
			set_notification('Data order berhasil dikirim dan disimpan', 'success');
			header("location: ".base_url('user/riwayat_transaksi'));
		}

	}

}

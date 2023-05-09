<?php 

class Transaksi extends Controller {

	public function __construct(){
		$this->db = new Database ;
	}

	public function index(){
		header("location: ".base_url());
	}

	public function list(){
		$data['list'] = $this->db->get_all_data("SELECT * FROM transaksi A JOIN user B ON A.fk_user=B.id_user WHERE TRUE ORDER BY tgl_transaksi DESC ");
		$this->view('transaksi/list', $data);
	}

	public function detail($id_transaksi=''){
		$data['detail'] = $this->db->get_data("SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi' ");
		$data['list_detail'] = $this->db->get_all_data("SELECT * FROM transaksi A JOIN transaksi_detail B ON A.id_transaksi=B.fk_transaksi JOIN produk C ON B.fk_produk=C.id_produk WHERE fk_transaksi='$id_transaksi' ");
		$this->view('transaksi/detail', $data);
	}

	public function ubah_status_proses($id_transaksi='', $id_status=''){

		$this->db->begin_transaction();

		$stmt[] = $this->db->query("UPDATE transaksi SET status_transaksi='$id_status' WHERE id_transaksi='$id_transaksi' ");

		$list_detail = $this->db->get_all_data("SELECT * FROM transaksi A JOIN transaksi_detail B ON A.id_transaksi=B.fk_transaksi JOIN produk C ON B.fk_produk=C.id_produk WHERE fk_transaksi='$id_transaksi' ");


		if ($id_status == "3") {
			foreach ($list_detail as $key => $value) {
				
				//update stok di table produk
				$stmt[] = $this->db->query("UPDATE produk SET stok_produk=stok_produk+".$value['jumlah_beli']." WHERE id_produk='$value[id_produk]' ");

				//inset mutasi stok
				$stok_after = $value['stok_produk'] + $value['jumlah_beli'];
				$stmt[] = $this->db->query("INSERT produk_stok SET fk_produk='$value[id_produk]', fk_transaksi='$id_transaksi', stok_awal='$value[stok_produk]', barang_masuk='$value[jumlah_beli]', barang_keluar='0', stok_akhir='$stok_after', keterangan_mutasi='Pembatalan Transaksi' ");

			}
		}


		if (in_array(false, $stmt)) {
			$this->db->rollback();
			set_notification('Gagal mengubah status', 'danger');
			header("location: ".$_SERVER['HTTP_REFERER']);
		}else{
			$this->db->commit();
			set_notification('Berhasil mengubah status', 'success');
			header("location: ".$_SERVER['HTTP_REFERER']);
		}

	}

}

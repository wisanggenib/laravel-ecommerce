<?php 

class Produk extends Controller {

	public function __construct(){
		$this->db = new Database ;
	}

	public function index(){
		header("location: ".base_url());
	}

	public function list(){
		$data['list'] = $this->db->get_all_data("SELECT * FROM produk A JOIN produk_kategori B ON A.fk_produk_kategori=B.id_produk_kategori WHERE status_hapus_produk='0' ");
		$this->view('produk/list', $data);
	}

	public function detail($id_produk = ''){
		$data['kategori'] = $this->db->get_all_data("SELECT * FROM produk_kategori");
		$data['detail'] = $this->db->get_data("SELECT * FROM produk WHERE id_produk='$id_produk' ");
		$this->view('produk/detail', $data);
	}

	public function mutasi_proses($id_produk=''){
		$jenis = @$_POST['jenis'];
		$jml = @$_POST['jml'];
		$keterangan = @$_POST['keterangan'];
		$data_produk = $this->db->get_data("SELECT * FROM produk WHERE id_produk='$id_produk' ");

		if ($jenis == 'masuk') {
			//update stok di table produk
			$stmt[] = $this->db->query("UPDATE produk SET stok_produk=stok_produk+".$jml." WHERE id_produk='$id_produk' ");

			//inset mutasi stok
			$stok_after = $data_produk['stok_produk'] + $jml;
			$stmt[] = $this->db->query("INSERT produk_stok SET fk_produk='$id_produk', fk_transaksi=NULL, stok_awal='$data_produk[stok_produk]', barang_masuk='$jml', barang_keluar='0', stok_akhir='$stok_after', keterangan_mutasi='$keterangan' ");
		}

		if ($jenis == 'keluar') {
			//update stok di table produk
			$stmt[] = $this->db->query("UPDATE produk SET stok_produk=stok_produk-".$jml." WHERE id_produk='$id_produk' ");

			//inset mutasi stok
			$stok_after = $data_produk['stok_produk'] + $jml;
			$stmt[] = $this->db->query("INSERT produk_stok SET fk_produk='$id_produk', fk_transaksi=NULL, stok_awal='$data_produk[stok_produk]', barang_masuk='0', barang_keluar='$jml', stok_akhir='$stok_after', keterangan_mutasi='$keterangan' ");
		}

		set_notification('Berhasil melakukan mutasi', 'success');
		header("location: ".$_SERVER['HTTP_REFERER']);

	}

	public function detail_mutasi($id_produk=''){
		$data['list'] = $this->db->get_all_data("SELECT * FROM produk_stok WHERE fk_produk='$id_produk' ");
		$this->view('produk/detail_mutasi', $data);
	}

	public function tambah(){
		$data['kategori'] = $this->db->get_all_data("SELECT * FROM produk_kategori");
		$this->view('produk/tambah', $data);
	}

	public function tambah_proses(){
		$nama = @$_POST['nama'];
		$harga = @$_POST['harga'];
		$berat = @$_POST['berat'];
		$deskripsi = @$_POST['deskripsi'];
		$kategori = @$_POST['kategori'];


		$name_file = str_shuffle("1234567890").@$_FILES['foto_produk']['name'];
		if (move_uploaded_file($_FILES['foto_produk']['tmp_name'], DOCUMENT_ROOT."/assets/images/produk/".$name_file)) {
			
			$this->db->query("INSERT INTO produk SET id_produk=UUID(), fk_produk_kategori='$kategori', nama_produk='$nama', harga_produk='$harga', foto_produk='$name_file', deskripsi_produk='$deskripsi', stok_produk='$stok', berat_produk='$berat' ");

			set_notification('Berhasil menyimpan produk', 'success');
			header("location: ".base_url('produk/list'));

		}else{
			set_notification('Gagal Upload Foto', 'danger');
			header("location: ".$_SERVER['HTTP_REFERER']);
		}
	}

	public function edit_proses($id_produk=''){
		$nama = @$_POST['nama'];
		$harga = @$_POST['harga'];
		$berat = @$_POST['berat'];
		$deskripsi = @$_POST['deskripsi'];
		$kategori = @$_POST['kategori'];
		$data_produk = $this->db->get_data("SELECT * FROM produk WHERE id_produk='$id_produk' ");

		if (!empty($_FILES['foto_produk']['tmp_name'])) {
			
			$name_file = str_shuffle("1234567890").@$_FILES['foto_produk']['name'];
			if (move_uploaded_file($_FILES['foto_produk']['tmp_name'], DOCUMENT_ROOT."/assets/images/produk/".$name_file)) {
				
				$this->db->query("UPDATE produk SET fk_produk_kategori='$kategori', nama_produk='$nama', harga_produk='$harga', foto_produk='$name_file', deskripsi_produk='$deskripsi', stok_produk='$stok', berat_produk='$berat' WHERE id_produk='$id_produk' ");

				if (file_exists(DOCUMENT_ROOT."/assets/images/produk/".$data_produk['foto_produk'])) {
					unlink(DOCUMENT_ROOT."/assets/images/produk/".$data_produk['foto_produk']);
				}

				set_notification('Berhasil menyimpan produk', 'success');
				header("location: ".$_SERVER['HTTP_REFERER']);

			}else{
				set_notification('Gagal Upload Foto', 'danger');
				header("location: ".$_SERVER['HTTP_REFERER']);
			}

		}else{
			$this->db->query("UPDATE produk SET fk_produk_kategori='$kategori', nama_produk='$nama', harga_produk='$harga', deskripsi_produk='$deskripsi', stok_produk='$stok', berat_produk='$berat' WHERE id_produk='$id_produk' ");

			set_notification('Berhasil menyimpan produk', 'success');
			header("location: ".$_SERVER['HTTP_REFERER']);
		}
	}

	public function hapus_produk($id_produk=''){
		$data_produk = $this->db->get_data("SELECT * FROM produk WHERE id_produk='$id_produk' ");

		if (file_exists(DOCUMENT_ROOT."/assets/images/produk/".$data_produk['foto_produk'])) {
			unlink(DOCUMENT_ROOT."/assets/images/produk/".$data_produk['foto_produk']);
		}

		$this->db->query("DELETE FROM keranjang WHERE fk_produk='$id_produk' ");
		$this->db->query("UPDATE produk SET status_hapus_produk='1' WHERE id_produk='$id_produk' ");

		set_notification('Berhasil menghapus produk', 'success');
		header("location: ".$_SERVER['HTTP_REFERER']);

	}

}

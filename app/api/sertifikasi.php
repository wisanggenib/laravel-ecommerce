<?php 

class Sertifikasi extends Controller {

	public function __construct(){
		$this->db = new Database ;
	}

	public function get_uraian_daftar_periksa($id_sertifikasi='', $id_jawaban = ''){
		method('get');
		$id_sertifikasi = $this->db->antiSQLi($id_sertifikasi);
		$id_jawaban = $this->db->antiSQLi($id_jawaban);
		$data = $this->db->get_data("SELECT * FROM daftar_periksa_jawaban WHERE id_jawaban='$id_jawaban' AND fk_sertifikasi='$id_sertifikasi' ");
		json($data);
	}

}
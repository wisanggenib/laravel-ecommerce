<?php 

class Home extends Controller {

	public function __construct(){
		$this->db = new Database ;
		$_SESSION['cart'] = $this->model('User_model')->get_cart();
	}

	public function index(){
		$data['kategori'] = $this->db->get_all_data("SELECT * FROM produk_kategori");
		$data['produk'] = $this->db->get_all_data("SELECT * FROM produk WHERE status_hapus_produk='0' ORDER BY tgl_input_produk DESC LIMIT 5 ");
		
		$this->view('index', $data);
	}

	public function get_district($id_provinsi=NULL){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi,
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

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		$data = json_decode($response, true);
		echo '<option value="" hidden>Pilih Kota/Kabupaten</option>';
		foreach ($data['rajaongkir']['results'] as $key => $value) {
			echo '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>';
		}
	}

	public function get_kurir(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=419&destination=".@$_GET['id_district']."&weight=".@$_GET['berat']."&courier=jne",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: ddbd26f486b5bdcc2810301d0899a2f2"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		$data = json_decode($response, true);
		echo '<option value="" hidden>Pilih Kurir</option>';
		foreach ($data['rajaongkir']['results'][0]['costs'] as $key => $value) {
			echo '<option value="'.$value['cost'][0]['value'].'">'.strtoupper($data['rajaongkir']['results'][0]['code']).' '.strtoupper($value['service']).' (Rp '.number_format($value['cost'][0]['value']).')</option>';
		}

	}


}

<?php
 class Peramalan extends Controller {

    public function __construct(){
		$this->db = new Database ;
	}

    public function home(){
        $data['list'] = $this->db->get_all_data("SELECT * FROM peramalan");
        $this->view('peramalan/peramalan', $data);
    }

    public function dataRamalan(){
        $data['list'] = $this->db->get_all_data("SELECT * FROM tabel_ramalan");
        $this->view('peramalan/data_tabelRamalan', $data);
    }

    public function tambah(){
        $this->view('peramalan/tambah');
    }

    public function simpan_data_ramalan() {
       if(date("d") != 25){
        $date = date("n") - 1;
        $stok = $this->db->get_data("SELECT SUM(stok_produk) as jumlah_stok FROM produk");
        $pelanggan = $this->db->get_data("SELECT COUNT(transaksi.nama_penerima) as jumlah_pelanggan FROM transaksi WHERE MONTH(transaksi.tgl_transaksi) = $date");
        $penjualan = $this->db->get_data("SELECT SUM(transaksi_detail.jumlah_beli) as produk FROM transaksi_detail JOIN transaksi ON transaksi_detail.fk_transaksi = transaksi.id_transaksi WHERE MONTH(transaksi.tgl_transaksi) = $date");
        $data[] = $this->db->query("INSERT INTO tabel_ramalan SET periode='$date',stok='$stok[jumlah_stok]',pelanggan='$pelanggan[jumlah_pelanggan]', penjualan='$penjualan[produk]'");
        set_notification('Berhasil menyimpan produk', 'success');
        header("location: ".$_SERVER['HTTP_REFERER']);
       } else {
        set_notification('Peramalan Bisa dilakukan per tanggal 25 tiap bulannya', 'danger');
        header("location: ".$_SERVER['HTTP_REFERER']);
       }
    } 

    public function simpan_data_tabel() {
        if(date("d") != 25){
            $date = date("n") - 1;
        $stok = @$_POST['stok'];
        $pelanggan = @$_POST['pelanggan'];
        $penjualan = @$_POST['penjualan'];
        $this->db->query("INSERT INTO tabel_ramalan SET periode='$date',stok='$stok',pelanggan='$pelanggan', penjualan='$penjualan'");
        set_notification('Berhasil menyimpan produk', 'success');
		header("location: ".base_url('peramalan/dataRamalan'));
        }else{
        set_notification('Peramalan Bisa dilakukan per tanggal 25 tiap bulannya', 'danger');
        header("location: ".$_SERVER['HTTP_REFERER']);
        }
    }

    public function hitung_peramalan() {
        if(date("d") != 25){
            $data = $this->db->get_all_data("SELECT * FROM tabel_ramalan");
            $panjnagData = count($data);
            $jumlahStok = 0;
            $jumlahpelanggan = 0;
            $jumlahPenjualan = 0;
            $jumlahNewStok = 0;
            $jumlahNewPelanggan = 0;
            $jumlahNewPenjualan = 0;
            $p = 0;
            $s = 0;
            $pj = 0;
            
            foreach ($data as $key => $value){
                $sumStok[] = $value['stok'];
                $sumPelanggan[] = $value['pelanggan']; 
                $sumPenjualan[] = $value['penjualan'];  
                $newStok[] = pow($value['stok'],2);
                $newPelanggan[] = pow($value['pelanggan'],2);
                $newPenjualan[] = pow($value['penjualan'],2);
                $newData1[] = $value['stok'] * $value['pelanggan'];
                $newData2[] = $value['stok'] * $value['penjualan'];
                $newData3[] = $value['pelanggan'] * $value['penjualan'];
                
                
            }
            // untuk sum stok
            foreach($newStok as $stok){
                $jumlahStok += $stok;
            }
    
             // untuk sum pelanggan
             foreach($newPelanggan as $pelanggan){
                $jumlahpelanggan += $pelanggan;
            }
    
            // untuk sum penjualan
            foreach($newPenjualan as $penjualan){
                $jumlahPenjualan += $penjualan;
            }
    
            // untuk nilai 
            foreach($newData1 as $data1){
                $jumlahNewStok += $data1;
            }
    
            
            foreach($newData2 as $data1){
                $jumlahNewPelanggan += $data1;
            }
    
            foreach($newData3 as $data1){
                $jumlahNewPenjualan += $data1;
            }
    
            foreach($sumPelanggan as $data){
                $p += $data;
            }
    
            foreach($sumPenjualan as $data){
                $pj += $data;
            }
    
            foreach($sumStok as $data){
                $s += $data;
            }
    
             //nilai sigma pelanggan
             $varX12 = $jumlahpelanggan - ((pow($p,2))/$panjnagData);
             //nilai sigma penjualan
             $varX22 = $jumlahPenjualan - ((pow($pj,2))/$panjnagData);
             //nilai sigma pelanggan dan penjualan
             $varX1X2 = $jumlahNewPenjualan - (($p*$pj)/$panjnagData);
             //nilai sigma pelanggan dan stok
             $varX1Y = $jumlahNewStok - (($p*$s)/$panjnagData);
             //nilai sigma penjualan dan stok
             $varX2Y = $jumlahNewPelanggan - (($pj*$s)/$panjnagData);
             //nilai sigma stok
             $varY2 = $jumlahStok - ((pow($s,2))/$panjnagData);
             //nilai koefesien regresi pertama
             $b1 = (($varX22 * $varX1Y)-($varX2Y * $varX1X2))/(($varX12 * $varX22)-(pow($varX1X2,2)));
             ////nilai koefesien regresi kedua
             $b2 = (($varX12 * $varX2Y)-($varX1Y * $varX1X2))/(($varX12 * $varX22)-(pow($varX1X2,2)));
             //nilai konstanta
             $a = (($s-($b1*$p))-($b2*$pj))/$panjnagData;
             //nilai variable yang akan diprediksi
             $Y = $a + ($b1*$p)+($b2*$pj);
            $date = date("M");
            $date1 = date("Y-m-d");
            $this->db->query("INSERT INTO peramalan SET tanggal='$date1', periode='$date',hasil_analisis='$Y'");
            set_notification('Berhasil menyimpan Ramalan', 'success');
            header("location: ".base_url('peramalan/home'));
        } else{
            set_notification('Peramalan Bisa dilakukan per tanggal 25 tiap bulannya', 'danger');
            header("location: ".$_SERVER['HTTP_REFERER']);
        }

        // $data = $this->db->get_all_data("SELECT * FROM tabel_ramalan");
        //     $panjnagData = count($data);
        //     $jumlahStok = 0;
        //     $jumlahpelanggan = 0;
        //     $jumlahPenjualan = 0;
        //     $jumlahNewStok = 0;
        //     $jumlahNewPelanggan = 0;
        //     $jumlahNewPenjualan = 0;
        //     $p = 0;
        //     $s = 0;
        //     $pj = 0;
            
        //     foreach ($data as $key => $value){
        //         $sumStok[] = $value['stok'];
        //         $sumPelanggan[] = $value['pelanggan']; 
        //         $sumPenjualan[] = $value['penjualan'];  
        //         $newStok[] = pow($value['stok'],2);
        //         $newPelanggan[] = pow($value['pelanggan'],2);
        //         $newPenjualan[] = pow($value['penjualan'],2);
        //         $newData1[] = $value['stok'] * $value['pelanggan'];
        //         $newData2[] = $value['stok'] * $value['penjualan'];
        //         $newData3[] = $value['pelanggan'] * $value['penjualan'];
                
                
        //     }
        //     // untuk sum stok
        //     foreach($newStok as $stok){
        //         $jumlahStok += $stok;
        //     }
    
        //      // untuk sum pelanggan
        //      foreach($newPelanggan as $pelanggan){
        //         $jumlahpelanggan += $pelanggan;
        //     }
    
        //     // untuk sum penjualan
        //     foreach($newPenjualan as $penjualan){
        //         $jumlahPenjualan += $penjualan;
        //     }
    
        //     // untuk nilai 
        //     foreach($newData1 as $data1){
        //         $jumlahNewStok += $data1;
        //     }
    
            
        //     foreach($newData2 as $data1){
        //         $jumlahNewPelanggan += $data1;
        //     }
    
        //     foreach($newData3 as $data1){
        //         $jumlahNewPenjualan += $data1;
        //     }
    
        //     foreach($sumPelanggan as $data){
        //         $p += $data;
        //     }
    
        //     foreach($sumPenjualan as $data){
        //         $pj += $data;
        //     }
    
        //     foreach($sumStok as $data){
        //         $s += $data;
        //     }
        //     //nilai sigma pelanggan
        //     $varX12 = $jumlahpelanggan - ((pow($p,2))/$panjnagData);
        //     //nilai sigma penjualan
        //     $varX22 = $jumlahPenjualan - ((pow($pj,2))/$panjnagData);
        //     //nilai sigma pelanggan dan penjualan
        //     $varX1X2 = $jumlahNewPenjualan - (($p*$pj)/$panjnagData);
        //     //nilai sigma pelanggan dan stok
        //     $varX1Y = $jumlahNewStok - (($p*$s)/$panjnagData);
        //     //nilai sigma penjualan dan stok
        //     $varX2Y = $jumlahNewPelanggan - (($pj*$s)/$panjnagData);
        //     //nilai sigma stok
        //     $varY2 = $jumlahStok - ((pow($s,2))/$panjnagData);
        //     //nilai koefesien regresi pertama
        //     $b1 = (($varX22 * $varX1Y)-($varX2Y * $varX1X2))/(($varX12 * $varX22)-(pow($varX1X2,2)));
        //     ////nilai koefesien regresi kedua
        //     $b2 = (($varX12 * $varX2Y)-($varX1Y * $varX1X2))/(($varX12 * $varX22)-(pow($varX1X2,2)));
        //     //nilai konstanta
        //     $a = (($s-($b1*$p))-($b2*$pj))/$panjnagData;
        //     //nilai variable yang akan diprediksi
        //     $Y = $a + ($b1*$p)+($b2*$pj);
       
        
        // // print($panjnagData);
        // // print("\r\n");
        // // print($s);
        // // print("\r\n");
        // // print($p);
        // // print("\r\n");
        // // print($pj);
        // // print("\r\n");
        // // print($jumlahStok);
        // // print("\r\n");
        // // print($jumlahpelanggan);
        // // print("\r\n");
        // // print($jumlahPenjualan);
        // // print("\r\n");
        // // print($jumlahNewStok);
        // // print("\r\n");
        // // print($jumlahNewPelanggan);
        // // print("\r\n");
        // // print($jumlahNewPenjualan);
        // // print("\r\n");
        // // print($varX12);
        // // print("\r\n");
        // // print($varX22);
        // // print("\r\n");
        // // print($varX1X2);
        // // print("\r\n");
        // // print($varX1Y);
        // // print("\r\n");
        // // print($varX2Y);
        // // print("\r\n");
        // // print($varY2);
        // // print("\r\n");
        // // print($b1);
        // // print("\r\n");
        // // print($b2);
        // // print("\r\n");
        // // print($a);
        // // print("\r\n");
        // print($Y);
    }
 }
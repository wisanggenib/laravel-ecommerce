<?php $this->view('templates/header', ['menu_aktif'=>'peramalan']); ?>


<div class="br-pagebody mb-5">
  <div class="br-section-wrapper">
    <?php notification() ?>
    
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Detail Produk</h6>
    <hr>
    <form method="POST" action="<?= base_url() ?>peramalan/simpan_data_tabel" enctype="multipart/form-data">
      <div class="form-group">
        <label>Jumlah Stok</label>
        <input type="number" class="form-control" name="stok" value="" required>
      </div>
      <div class="form-group">
        <label>Jumlah Pelanggan</label>
        <input type="number" class="form-control" name="pelanggan" value="" required>
      </div>
      <div class="form-group">
        <label>Jumlah Penjualan</label>
        <input type="number" class="form-control" name="penjualan" value="" required>
      </div>
      <hr>
      <button class="btn btn-primary float-right">Simpan</button>
    </form>
  
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<?php $this->view('templates/footer'); ?>
<?php $this->view('templates/header', ['menu_aktif'=>'produk']); ?>


<div class="br-pagebody mb-5">
  <div class="br-section-wrapper">
    <?php notification() ?>
    
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Detail Produk</h6>
    <hr>
    <form method="POST" action="<?= base_url() ?>produk/tambah_proses" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nama" value="" required>
      </div>
      <div class="form-group">
        <label>Harga Produk</label>
        <input type="number" class="form-control" name="harga" value="" required>
      </div>
      <div class="form-group">
        <label>Berat Produk (Gram)</label>
        <input type="number" class="form-control" name="berat" value="" required>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" required></textarea>
      </div>
      <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="kategori">
          <?php foreach ($kategori as $key => $value): ?>
            <option value="<?= $value['id_produk_kategori'] ?>" ><?= $value['nama_kategori'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Ubah Foto Produk</label>
        <input type="file" accept=".jpg,.jpeg,.png" class="form-control" name="foto_produk">
        <small>Kosongi jika tidak ingin diubah</small>
      </div>
      <hr>
      <button class="btn btn-primary float-right">Simpan</button>
    </form>
  
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<?php $this->view('templates/footer'); ?>
<?php $this->view('templates/header', ['menu_aktif'=>'produk']); ?>


<div class="br-pagebody">
  <div class="br-section-wrapper">
    <?php notification() ?>
    
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Detail Produk</h6>
    <hr>
    <form action="<?= base_url() ?>produk/edit_proses/<?= $detail['id_produk'] ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nama" value="<?= $detail['nama_produk'] ?>" required>
      </div>
      <div class="form-group">
        <label>Harga Produk</label>
        <input type="number" class="form-control" name="harga" value="<?= $detail['harga_produk'] ?>" required>
      </div>
      <div class="form-group">
        <label>Berat Produk (Gram)</label>
        <input type="number" class="form-control" name="berat" value="<?= $detail['berat_produk'] ?>" required>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" required><?= $detail['deskripsi_produk'] ?></textarea>
      </div>
      <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="kategori">
          <?php foreach ($kategori as $key => $value): ?>
            <option value="<?= $value['id_produk_kategori'] ?>" <?= ($value['id_produk_kategori'] == @$detail['fk_produk_kategori'])?'selected':NULL ?> ><?= $value['nama_kategori'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Ubah Foto Produk</label>
        <input type="file" accept=".jpg,.jpeg,.png" class="form-control" name="foto_produk">
        <small>Kosongi jika tidak ingin diubah</small>
      </div>
      <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" value="<?= $detail['stok_produk'] ?>" readonly>
      </div>
      <hr>
      <button class="btn btn-primary float-right">Simpan</button>
    </form>
    
  
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->

<div class="br-pagebody mb-5">
  <div class="br-section-wrapper">
    
    <a href="<?= base_url() ?>produk/detail_mutasi/<?= $detail['id_produk'] ?>" class="btn btn-sm btn-outline-primary float-right">Detail Mutasi</a>
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 mb-4">Mutasi Produk</h6>
    <hr>
    <form method="POST" action="<?= base_url() ?>produk/mutasi_proses/<?= $detail['id_produk'] ?>">
      <div class="form-group">
        <label>Jenis Mutasi</label>
        <select class="form-control" name="jenis">
          <option value="masuk">Mutasi Masuk</option>
          <option value="keluar">Mutasi Keluar</option>
        </select>
      </div>
      <div class="form-group">
        <label>Stok Yang Dimutasi</label>
        <input type="number" class="form-control" name="jml" required>
      </div>
      <div class="form-group">
        <label>Keterangan Mutasi</label>
        <textarea class="form-control" name="keterangan" required></textarea>
      </div>
      <hr>
      <button class="btn btn-primary float-right">Simpan</button>
    </form>
    
  
  </div><!-- br-section-wrapper -->
</div>


<?php $this->view('templates/footer'); ?>
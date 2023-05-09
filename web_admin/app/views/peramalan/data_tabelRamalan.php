<?php $this->view('templates/header', ['menu_aktif'=>'peramalan']); ?>

<div class="br-pagebody">
  <div class="br-section-wrapper">
  <?php notification() ?>
  <a href="<?= base_url() ?>peramalan/tambah" style="margin-left:20px;"class="btn btn-sm btn-outline-primary float-right">Update Tabel Ramalan</a>
  <a href="<?= base_url() ?>peramalan/hitung_peramalan" class="btn btn-sm btn-outline-primary float-right">Hitung Peramalan</a>
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mb-4 mg-b-10">Tabel Data Ramalan</h6>
    <p style="color:white;font-size:18px; background-color:#FF0000; widht:20px; text-align:center; text-transform:uppercase;">Jangan lupa tabel ramalan untuk diupdate sebelum melakukan perhitungan peramalan!!!</p> 
    <hr>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">Stok</th>
            <th class="wd-15p">Pelanggan</th>
            <th class="wd-15p">Penjualan</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $key => $value): ?>
          <tr>
            <td><?= $value['stok'] ?></td>
            <td><?= $value['pelanggan'] ?></td>
            <td><?= $value['penjualan'] ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<?php $this->view('templates/footer'); ?>
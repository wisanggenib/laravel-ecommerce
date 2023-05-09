<?php $this->view('templates/header', ['menu_aktif'=>'transaksi']); ?>


<div class="br-pagebody">
  <div class="br-section-wrapper">
    <?php notification() ?>
    
    <div class="row">
      <div class="col-md-6">
        No Invoice : <?= strtoupper($detail['id_transaksi']) ?>
        <br>
        Tanggal : <?= $detail['tgl_transaksi'] ?>
        <br>
        Status : 
        <?php
        if ($detail['status_transaksi'] == '1') {
          echo "Menunggu Pembayaran";
        }elseif ($detail['status_transaksi'] == '2') {
          echo "Dikirim";
        }elseif ($detail['status_transaksi'] == '3') {
          echo "Dibatalkan";
        }
        ?>
      </div>
      <div class="col-md-6">
        Pemesan : <?= $detail['nama_penerima'] ?>
        <br>
        Telepon : <?= $detail['telepon_penerima'] ?>
        <br>
        Alamat : <?= $detail['alamat_pengiriman'] ?>
      </div>

    </div>
    
    <hr>
    <div class="table-responsive p-3 mt-2">
      <table class="table table-sm">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list_detail as $key_detail => $value_detail): ?>
            <?php if ($value_detail['fk_transaksi'] == $detail['id_transaksi']): ?>
              <tr>
                <td><?= $value_detail['nama_produk'] ?></td>
                <td><?= $value_detail['harga_beli'] ?></td>
                <td><?= $value_detail['jumlah_beli'] ?></td>
                <td><?= $value_detail['jumlah_beli']*$value_detail['harga_beli'] ?></td>
              </tr>
            <?php endif ?>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" class="text-right">Jumlah</td>
            <td><?= $detail['total_harga']-$detail['ongkir'] ?></td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">Ongkir</td>
            <td><?= $detail['ongkir'] ?></td>
          </tr>
          <tr>
            <td colspan="3" class="text-right">Total</td>
            <td><?= $detail['total_harga'] ?></td>
          </tr>
        </tfoot>
      </table>
    </div>


    <?php if ($detail['status_transaksi'] == '1'): ?>
      <a href="<?= base_url() ?>transaksi/ubah_status_proses/<?= $detail['id_transaksi'] ?>/2" class="btn btn-success">Ubah Status Menjadi Dikirim</a>
      <a href="<?= base_url() ?>transaksi/ubah_status_proses/<?= $detail['id_transaksi'] ?>/3" class="btn btn-danger">Batalkan Transaksi</a>
    <?php elseif($detail['status_transaksi'] == '2'): ?>
      <a href="<?= base_url() ?>transaksi/ubah_status_proses/<?= $detail['id_transaksi'] ?>/3" class="btn btn-danger">Batalkan Transaksi</a>
    <?php endif ?>

  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<?php $this->view('templates/footer'); ?>
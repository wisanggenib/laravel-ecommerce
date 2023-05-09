<?php $this->view('templates/header', ['menu_aktif'=>'transaksi']); ?>


<link href="<?= base_url() ?>assets/admin/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/admin/lib/datatables/jquery.dataTables.js"></script>

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <?php notification() ?>
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Transaksi List</h6>
    <hr>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">Inv</th>
            <th class="wd-15p">Tanggal</th>
            <th class="wd-15p">Nama</th>
            <th class="wd-20p">Status</th>
            <th class="wd-15p">Total</th>
            <th class="wd-15p">Detail</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $key => $value): ?>
            <tr>
              <td><?= $value['id_transaksi'] ?></td>
              <td><?= $value['tgl_transaksi'] ?></td>
              <td><?= $value['nama_user'] ?></td>
              <td>
                <?php
                  if ($value['status_transaksi'] == '1') {
                    echo "Menunggu Pembayaran";
                  }elseif ($value['status_transaksi'] == '2') {
                    echo "Dikirim";
                  }elseif ($value['status_transaksi'] == '3') {
                    echo "Dibatalkan";
                  }
                ?>
              </td>
              <td>Rp <?= number_format($value['total_harga']) ?></td>
              <td><a href="<?= base_url() ?>transaksi/detail/<?= $value['id_transaksi'] ?>" class="btn btn-sm btn-info p-0">Detail</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- table-wrapper -->

  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<script>
   $('#datatable1').DataTable({
          responsive: true,
          order: [[1, 'desc']],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
</script>

<?php $this->view('templates/footer'); ?>
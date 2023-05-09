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
            <th class="wd-15p">Tanggal</th>
            <th class="wd-15p">Stok Awal</th>
            <th class="wd-20p">Masuk</th>
            <th class="wd-20p">Keluar</th>
            <th class="wd-15p">Stok Akhir</th>
            <th class="wd-15p">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $key => $value): ?>
            <tr>
              <td><?= $value['tgl_mutasi'] ?></td>
              <td><?= $value['stok_awal'] ?></td>
              <td><?= $value['barang_masuk'] ?></td>
              <td><?= $value['barang_keluar'] ?></td>
              <td><?= $value['stok_akhir'] ?></td>
              <td><?= $value['keterangan_mutasi'] ?></td>
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
          order: [[0, 'desc']],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
</script>

<?php $this->view('templates/footer'); ?>
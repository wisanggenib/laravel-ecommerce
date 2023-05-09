<?php $this->view('templates/header', ['menu_aktif'=>'produk']); ?>


<link href="<?= base_url() ?>assets/admin/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/admin/lib/datatables/jquery.dataTables.js"></script>

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <?php notification() ?>

    <a href="<?= base_url() ?>produk/tambah" class="btn btn-sm btn-outline-primary float-right">Tambah Produk</a>
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mb-4 mg-b-10">Produk List</h6>
    <hr>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">Nama</th>
            <th class="wd-15p">Kategori</th>
            <th class="wd-15p">Stok</th>
            <th class="wd-15p">Harga</th>
            <th class="wd-15p">Stok</th>
            <th class="wd-15p">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $key => $value): ?>
            <tr>
              <td><?= $value['nama_produk'] ?></td>
              <td><?= $value['nama_kategori'] ?></td>
              <td><?= $value['stok_produk'] ?></td>
              <td><?= $value['harga_produk'] ?></td>
              <td>Rp <?= number_format($value['harga_produk']) ?></td>
              <td>
                <a href="<?= base_url() ?>produk/detail/<?= $value['id_produk'] ?>" class="btn btn-sm btn-info p-0">Detail</a>
                <a href="<?= base_url() ?>produk/hapus_produk/<?= $value['id_produk'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn btn-sm btn-danger p-0">Hapus</a>
              </td>
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
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
</script>

<?php $this->view('templates/footer'); ?>
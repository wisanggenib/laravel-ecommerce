<?php $this->view('templates/header', ['menu_aktif'=>'peramalan']); ?>

<div class="br-pagebody">
  <div class="br-section-wrapper">
  <?php notification() ?>
  <a href="<?= base_url() ?>peramalan/dataRamalan" style="margin-right:20px;"class="btn btn-sm btn-outline-primary float-right">Peramalan</a>
    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mb-4 mg-b-10">Peramalan  <?php date("n");?></h6>
    <hr>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">Tanggal Peramalan</th>
            <th class="wd-15p">Periode Peramalan</th>
            <th class="wd-15p">Hasil Peramalan</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $key => $value): ?>
          <tr>
            <td><?= $value['tanggal'] ?></td>
            <td><?= $value['periode'] ?></td>
            <td><?= $value['hasil_analisis'] ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<?php $this->view('templates/footer'); ?>
<?php $this->view('templates/header', ['menu_aktif'=>'dashboard']); ?>

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <?php notification() ?>
    <h1>Hallo, Admin</h1>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->


<?php $this->view('templates/footer'); ?>
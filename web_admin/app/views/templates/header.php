<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin</title>

    <!-- vendor css -->
    <link href="<?= base_url() ?>assets/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bracket.css">

    <!-- vendor css -->
    <link href="<?= base_url() ?>assets/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/highlightjs/github.css" rel="stylesheet">
    <!-- <link href="<?= base_url() ?>assets/admin/lib/select2/css/select2.min.css" rel="stylesheet"> -->
    <link href="<?= base_url() ?>assets/admin/lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/jt.timepicker/jquery.timepicker.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/spectrum/spectrum.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/admin/lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/admin/lib/jquery/jquery.js"></script>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bracket.css">

  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Admin<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">MENU</label>
      <div class="br-sideleft-menu">


        <a href="<?= base_url('admin/dashboard') ?>" class="br-menu-link <?= (@$menu_aktif=='dashboard')?'active':NULL ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-circle-filled tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>

        <a href="<?= base_url('produk/list') ?>" class="br-menu-link <?= (@$menu_aktif=='produk')?'active':NULL ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-circle-filled tx-22"></i>
            <span class="menu-item-label">Produk</span>
          </div>
        </a>

        <a href="<?= base_url('transaksi/list') ?>" class="br-menu-link <?= (@$menu_aktif=='transaksi')?'active':NULL ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-circle-filled tx-22"></i>
            <span class="menu-item-label">Transaksi</span>
          </div>
        </a>
        
        <a href="<?= base_url('peramalan/home') ?>" class="br-menu-link <?= (@$menu_aktif=='peramalan')?'active':NULL ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-circle-filled tx-22"></i>
            <span class="menu-item-label">Peramalan</span>
          </div>
        </a>

      </div><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
                    
          <!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?= @$_SESSION['login_admin']['username'] ?></span>
              <i class="ion-android-person" style="font-size: 200%;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <!-- <li><a href=""><i class="icon ion-ios-person"></i> Ubah Profil</a></li> -->
                <li><a href="<?= base_url('admin/keluar_proses') ?>"><i class="icon ion-power"></i> Keluar</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- br-header-right -->
    </div><!-- br-header -->\

  
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
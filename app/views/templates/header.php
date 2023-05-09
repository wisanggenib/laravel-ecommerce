
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Curva Sud Collection</title>
		<link rel="shortcut icon" href="<?= base_url() ?><?= base_url() ?>assets/images/logo/favourite_icon_01.png">

		<!-- fraimwork - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">

		<!-- icon - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/fontawesome.css">

		<!-- animation - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/animate.css">

		<!-- nice select - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/nice-select.css">

		<!-- carousel - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/slick.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/slick-theme.css">

		<!-- popup images & videos - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/magnific-popup.css">

		<!-- jquery ui - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery-ui.css">

		<!-- custom - css include -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">


		<!-- fraimwork - jquery include -->
		<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
		<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

	</head>


	<body class="home_fashion">


		<!-- backtotop - start -->
		<div id="thetop"></div>
		<div class="backtotop bg_fashion_red">
			<a href="#" class="scroll">
				<i class="far fa-arrow-up"></i>
			</a>
		</div>
		<!-- backtotop - end -->

		<!-- preloader - start -->
		<!-- <div id="preloader"></div> -->
		<!-- preloader - end -->


		<!-- header_section - start
		================================================== -->
		<header class="header_section fashion_header sticky_header clearfix">
			<div class="header_content_wrap clearfix">
				<div class="container-fluid prl_60">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-6">
							<div class="brand_logo">
								<a class="brand_link" href="<?= base_url() ?>">
									<img src="<?= base_url() ?>assets/images/logo/hacker.png" srcset="<?= base_url() ?>assets/images/logo/logo_13_2x.png 2x" alt="logo_not_found">
								</a>
							</div>
						</div>

						<div class="col-6">
							<ul class="action_btns_group ul_li_right clearfix">
								<li>
									<button type="button" class="mobile_menu_btn"><i class="far fa-bars"></i></button>
								</li>
								
								<?php if (isset($_SESSION['login_to'])): ?>
									<li>
										<button type="button" class="cart_btn">
											<i class="fal fa-shopping-cart"></i>
										</button>
									</li>
								<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div id="search_body_collapse" class="search_body_collapse collapse">
				<div class="search_body">
					<div class="container-fluid prl_90">
						<form action="#">
							<div class="form_item mb-0">
								<input type="search" name="search" placeholder="Type here...">
								<button type="submit"><i class="fal fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</header>
		<!-- header_section - end
		================================================== -->


		<!-- main body - start
		================================================== -->
		<main>


			<!-- sidebar mobile menu & sidebar cart - start
			================================================== -->
			<div class="sidebar-menu-wrapper">
				<div class="cart_sidebar">
					<button type="button" class="close_btn"><i class="fal fa-times"></i></button>

				
					<ul class="cart_items_list ul_li_block mb_30 clearfix">

						<?php if (empty($_SESSION['cart'])): ?>
							<li><center>Tidak ada produk dikeranjang</center></li>
						<?php else: ?>
							<?php foreach ($_SESSION['cart'] as $key => $value): ?>
								<li>
									<div class="item_image">
										<img src="<?= base_url() ?>assets/images/produk/<?= $value['foto_produk'] ?>" alt="image_not_found">
									</div>
									<div class="item_content">
										<h4 class="item_title"><?= $value['nama_produk'] ?></h4>
										<span class="item_price">Rp <?= number_format($value['harga_produk']) ?> </span>
									</div>
									<a href="<?= base_url() ?>produk/delete_cart_proses/<?= $value['id_produk'] ?>" class="remove_btn"><i class="fal fa-trash-alt"></i></a>
								</li>
							<?php endforeach ?>
						<?php endif ?>
						
					</ul>

					<ul class="btns_group ul_li_block clearfix">
						<li><a href="<?= base_url() ?>user/keranjang">Checkout</a></li>
					</ul>
					

					

				</div>

				<div class="sidebar_mobile_menu">
					<button type="button" class="close_btn"><i class="fal fa-times"></i></button>

					<div class="msb_widget brand_logo text-center">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url() ?>assets/images/logo/logo_25_1x.png" srcset="<?= base_url() ?>assets/images/logo/logo_25_2x.png 2x" alt="logo_not_found">
						</a>
					</div>

					<div class="msb_widget mobile_menu_list clearfix">
						<h3 class="title_text mb_15 text-uppercase"><i class="far fa-bars mr-2"></i> Menu List</h3>
						<ul class="ul_li_block clearfix">
							<li><a href="<?= base_url() ?>">Home</a></li>    
						</ul>
						<ul class="ul_li_block clearfix">
							<li><a href="<?= base_url() ?>produk/list">Produk</a></li>    
						</ul>
						<!-- <ul class="ul_li_block clearfix">
							<li><a href="contact.html">Kontak</a></li>    
						</ul> -->
					</div>

					<div class="user_info">
						<h3 class="title_text mb_30 text-uppercase"><i class="fas fa-user mr-2"></i> User Info</h3>
						<?php if (isset($_SESSION['login_to'])): ?>
							<div class="profile_info clearfix">
								<div class="user_thumbnail">
									<img src="<?= base_url() ?>assets/images/meta/img_01.png" alt="thumbnail_not_found">
								</div>
								<div class="user_content">
									<h4 class="user_name">Jone Doe</h4>
									<span class="user_title">Seller</span>
								</div>
							</div>
							<ul class="settings_options ul_li_block clearfix">
								<!-- <li><a href="#!"><i class="fal fa-user-circle"></i> Profile</a></li> -->
								<li><a href="<?= base_url() ?>user/riwayat_transaksi"><i class="fas fa-octagon"></i> Riwayat Transaksi</a></li>
								<li><a href="<?= base_url() ?>user/logout"><i class="fal fa-sign-out-alt"></i> Logout</a></li>
							</ul>
						<?php else: ?>
							<a href="<?= base_url() ?>user/login" class="btn btn-sm btn-danger">Login</a>
						<?php endif ?>
					</div>
				</div>

				<div class="overlay"></div>
			</div>
			<!-- sidebar mobile menu & sidebar cart - end
			================================================== -->
<?php $this->view('templates/header') ?>


<section class="details_section fashion_details sec_ptb_100 clearfix">
	<div class="container pt-5">

		<?php notification() ?>

		<div class="row mb_100 justify-content-lg-between">
			<div class="col-lg-5 col-md-7">
				<img src="<?= base_url() ?>assets/images/produk/<?= $detail['foto_produk'] ?>" width='90%'>
			</div>

			<div class="col-lg-7 col-md-12">
				<div class="shop_details_content">
					<h2 class="item_title text-uppercase mb-2"><?= $detail['nama_produk'] ?></h2>
					
					<ul class="fd_price_list ul_li_block mb-2">
						<li>HARGA: <strong>Rp <?= number_format($detail['harga_produk']) ?></strong></li>
					</ul>
					<div class="instuck_text">Stok: <span data-text-color="#99cc00"><?= $detail['stok_produk'] ?></span></div>
					<hr>
					<a class="custom_btn bg_black text-uppercase mb_30" href="<?= base_url() ?>produk/add_cart_proses/<?= $detail['id_produk'] ?>"><i class="fal fa-shopping-bag mr-2"></i> Add To Cart</a>
					<div>
						<?= $detail['deskripsi_produk'] ?>
					</div>
				</div>
			</div>
		</div>

		
	</div>
</section>

<?php $this->view('templates/footer') ?>
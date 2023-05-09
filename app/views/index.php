<?php $this->view('templates/header') ?>


<!-- slider_section - start
================================================== -->
<section class="slider_section fashion_slider position-relative clearfix">
	<div class="main_slider clearfix" data-slick='{"dots": false}'>
		<div class="item d-flex align-items-center clearfix" data-bg-color="#d8f6ff">
			<div class="container maxw_1430">
				<div class="slider_content">
					<h4 class="text-uppercase" data-animation="fadeInUp" data-delay=".4s">EST COLLECTION</h4>
					<h3 data-animation="fadeInUp" data-delay=".6s">
						Curva Sud <span>Collection</span>
					</h3>
					<p data-animation="fadeInUp" data-delay=".8s">
						Subscribe to our newsletter and be the first to receive the latest fashion news, promotions and more! Would you like to stop receiving our newsletter?
					</p>
					<ul class="btns_group ul_li clearfix" data-animation="fadeInUp" data-delay="1s">
						<li>
							<a href="<?= base_url() ?>produk/list" class="custom_btn btn_round bg_fashion_red text-uppercase">Shop Now</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="slider_image">
				<img style="border-radius: 100%;" data-animation="fadeInRight" data-delay=".7s" src="<?= base_url() ?>assets/images/mix/img_02.png" alt="image_not_found">
				<div class="circle_shape">
					<span data-animation="zoomIn" data-delay=".3s"></span>
				</div>
			</div>
		</div>

	
	</div>

	<div class="carousel_nav clearfix">
		<button type="button" class="main_left_arrow"><i class="fal fa-angle-left"></i></button>
		<button type="button" class="main_right_arrow"><i class="fal fa-angle-right"></i></button>
	</div>

	<!-- slider progress -->
	<div class="slick-progress">
		<span></span>
	</div>
</section>
<!-- slider_section - end
================================================== -->


<!-- category_section - start
================================================== -->
<section class="category_section sec_ptb_140 clearfix">
	<div class="container">
		<div class="row mt__50 justify-content-center">


			<?php foreach ($kategori as $key => $value): ?>
				
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="fashion_category_circle">
						<div class="item_image">
							<img src="<?= base_url() ?>assets/images/kategori/<?= $value['foto_kategori'] ?>" alt="image_not_found">
							<a class="icon_btn bg_fashion_red" href="<?= base_url() ?>produk/list?kategori=<?= $value['id_produk_kategori'] ?>"><i class="fal fa-arrow-right"></i></a>
						</div>
						<div class="item_content text-uppercase">
							<h3 class="item_title"><?= $value['nama_kategori'] ?></h3>
						</div>
					</div>
				</div>

			<?php endforeach ?>
			

		</div>
	</div>
</section>
<!-- category_section - end
================================================== -->


<!-- product_section - start
================================================== -->
<section class="product_section sec_ptb_140 pb-0 clearfix">
	<div class="container-fluid prl_60">

		<div class="fashion_section_title text-center mb_50">
			<h2 class="title_text mb_15">Terbaru</h2>
		</div>

		<div class="element-grid column5_element_grid mb_50">

			<?php foreach ($produk as $key => $value): ?>
				
				<div class="element-item">
					<div class="fashion_product_item">
						<a href="<?= base_url() ?>produk/detail/<?= $value['id_produk'] ?>">
							<div class="item_image">
								<img src="<?= base_url() ?>assets/images/produk/<?= $value['foto_produk'] ?>" alt="image_not_found">
							</div>
						</a>
						<div class="item_content">
							<h3 class="item_title"><a href="<?= base_url() ?>produk/detail/<?= $value['id_produk'] ?>"><?= $value['nama_produk'] ?></a></h3>
							<span class="item_price">Rp <?= number_format($value['harga_produk']) ?></span>
						</div>
					</div>
				</div>

			<?php endforeach ?>

	</div>

	<div class="load_more text-center clearfix">
		<a class="custom_btn btn_round bg_fashion_red text-uppercase" href="<?= base_url() ?>produk/list">View More</a>
	</div>
</section>


<?php $this->view('templates/footer') ?>
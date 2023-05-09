<?php $this->view('templates/header') ?>


<!-- slider_section - start
================================================== -->
<section class="slider_section fashion_slider position-relative clearfix">
	

<!-- product_section - start
================================================== -->
<section class="product_section sec_ptb_140 pb-0 clearfix">
	<div class="container prl_60">

		<div class="fashion_section_title text-center mb_50">
			<h2 class="title_text mb_15">Produk Kami</h2>
		</div>

		<form>
			<div class="row">
				<div class="col-md-5">
					<input type="text" class="form-control" name="cari" value="<?= @$_GET['cari'] ?>" placeholder="Cari...">
				</div>
				<div class="col-md-5">
					<select class="form-control" name="kategori">
						<option value="">Semua Kategori</option>
						<?php foreach ($kategori as $key => $value): ?>
							<option value="<?= $value['id_produk_kategori'] ?>" <?= ($value['id_produk_kategori'] == @$_GET['kategori'])?'selected':NULL ?> ><?= $value['nama_kategori'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-2">
					<button class="btn btn-sm btn-block btn-primary">Cari</button>
				</div>
			</div>
		</form>
		<hr>

		<div class="element-grid column5_element_grid mb_50">

			<?php foreach ($list as $key => $value): ?>
				
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

	
</section>


<?php $this->view('templates/footer') ?>
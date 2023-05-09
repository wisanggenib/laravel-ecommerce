<?php $this->view('templates/header') ?>


<section class="details_section fashion_details sec_ptb_100 clearfix">
	<div class="container pt-5">
		
		<center><h1>Keranjang Anda</h1></center>

		<?php notification() ?>

		<div class="cart_table mb_50">
			<table class="table">
				<thead class="text-uppercase">
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
				</thead>
				<tbody>

					<?php $total_harga = 0 ?>
					<?php if (empty($_SESSION['cart'])): ?>
						<tr><td colspan="4"><center>Tidak ada produk dalam keranjang</center></td></tr>
					<?php else: ?>
						<?php foreach ($_SESSION['cart'] as $key => $value): ?>
							<tr>
								<td>
									<div class="cart_product">
										<div class="item_image">
											<img src="<?= base_url() ?>assets/images/produk/<?= $value['foto_produk'] ?>" alt="image_not_found">
										</div>
										<div class="item_content">
											<h4 class="item_title"><?= $value['nama_produk'] ?></h4>
											<span class="item_type mb-0"><?= $value['nama_kategori'] ?></span>
											<div>Stok : <?= $value['stok_produk'] ?></div>
										</div>
										<a href="<?= base_url() ?>produk/delete_cart_proses/<?= $value['id_produk'] ?>" class="remove_btn">
											<i class="fal fa-times"></i>
										</a>
									</div>
								</td>
								<td>
									<span class="price_text">Rp <?= number_format($value['harga_produk']) ?></span>
								</td>
								<td>
									<div class="quantity_input">
										<form action="#">
											<a href="<?= base_url() ?>produk/minus_cart_proses/<?= $value['id_produk'] ?>" class="input_number_decrement">–</a>
											<input class="input_number" type="text" value="<?= $value['jml_keranjang'] ?>">
											<a href="<?= base_url() ?>produk/plus_cart_proses/<?= $value['id_produk'] ?>" class="input_number_increment">+</a>
										</form>
									</div>
								</td>
								<td><span class="total_price">Rp <?= number_format($value['harga_produk']*$value['jml_keranjang']) ?></span></td>
							</tr>
							<?php $total_harga += $value['harga_produk']*$value['jml_keranjang'] ?>
						<?php endforeach ?>
					<?php endif ?>
					

					

					
				</tbody>
			</table>
		</div>

		

		<div class="row justify-content-lg-end">
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
					<h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
					<ul class="ul_li_block clearfix">
						<li><span>Total</span> <span>Rp <?= number_format($total_harga) ?></span></li>
					</ul>
					<a href="<?= base_url() ?>transaksi/order" class="custom_btn bg_success">Proceed to Checkout</a>
				</div>
			</div>
		</div>


		
	</div>
</section>

<?php $this->view('templates/footer') ?>
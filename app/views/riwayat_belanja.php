<?php $this->view('templates/header') ?>


<section class="details_section fashion_details sec_ptb_100 clearfix">
	<div class="container pt-5">
		
		
		<div class="text-center tab_pembayaran" style="<?= (isset($_SESSION['notification']))?'':'display: none;' ?>">
			<h5><b>Pembayaran Order Pemesanan</b></h5>
			Segera melakukan pembayaran dengan nomimal sesuai dengan total transaksi anda dengan malakukan transer ke nomor rekening kami
			<br>
			BCA : 56465416516
			<br>
			Atas Nama : PT Collection Utama 
			<br>
			Lalu lakukan konfirmasi pembayaran ke nomor whatsapp berikut : 085123456789
			<br>
			<br>
			Terimakasih
			<br>
			<br>
		</div>

		<?php notification() ?>
		
		<div class="card">
			<div class="card-header">
				<h5><b>Riwayat Pemesanan</b></h5>
			</div>
			<div class="card-body">

				
				<?php foreach ($list as $key => $value): ?>
					<div style="border: 1px solid #AEAEAE;" class="p-2 mb-3">
						<div class="row">
							<div class="col-md-6">
								No Invoice : <?= strtoupper($value['id_transaksi']) ?>
								<br>
								Tanggal : <?= $value['tgl_transaksi'] ?>
								<br>
								Status : 
								<?php
									if ($value['status_transaksi'] == '1') {
										echo "Menunggu Pembayaran";
										echo '<button class="badge badge-primary ml-2 btn_bayar">Bayar</button>';
									}elseif ($value['status_transaksi'] == '2') {
										echo "Dikirim";
									}elseif ($value['status_transaksi'] == '3') {
										echo "Dibatalkan";
									}
								?>
							</div>

							<div class="col-md-6">
								Pemesan : <?= $value['nama_penerima'] ?>
								<br>
								Telepon : <?= $value['telepon_penerima'] ?>
								<br>
								Alamat : <?= $value['alamat_pengiriman'] ?>
							</div>

							<div class="table-responsive p-3 mt-2">
								<table class="table table-sm">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Harga</th>
											<th>Jumlah</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($list_detail as $key_detail => $value_detail): ?>
											<?php if ($value_detail['fk_transaksi'] == $value['id_transaksi']): ?>
												<tr>
													<td><?= $value_detail['nama_produk'] ?></td>
													<td><?= $value_detail['harga_beli'] ?></td>
													<td><?= $value_detail['jumlah_beli'] ?></td>
													<td><?= $value_detail['jumlah_beli']*$value_detail['harga_beli'] ?></td>
												</tr>
											<?php endif ?>
										<?php endforeach ?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3" class="text-right">Jumlah</td>
											<td><?= $value['total_harga']-$value['ongkir'] ?></td>
										</tr>
										<tr>
											<td colspan="3" class="text-right">Ongkir</td>
											<td><?= $value['ongkir'] ?></td>
										</tr>
										<tr>
											<td colspan="3" class="text-right">Total</td>
											<td><?= $value['total_harga'] ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				<?php endforeach ?>

			</div>
		</div>
		
		
	</div>
</section>

<script>
	$(".btn_bayar").click(function(){
		$(".tab_pembayaran").show()
		$(window).scrollTop(0);
	})
</script>

<?php $this->view('templates/footer') ?>
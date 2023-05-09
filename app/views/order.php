<?php
	$total_harga = 0;
	$total_berat = 0;
	foreach ($_SESSION['cart'] as $key => $value){
		$total_harga += $value['harga_produk']*$value['jml_keranjang'];
		$total_berat += $value['berat_produk']*$value['jml_keranjang'];
	}
?>

<?php $this->view('templates/header') ?>


<section class="details_section fashion_details sec_ptb_100 clearfix">
	<div class="container pt-5">
		
		<center><h1>CHECKOUT</h1></center>

		<?php notification() ?>

		
		<div class="card">
			<div class="card-header">
				<h5><b>Data Order</b></h5>
			</div>
			<div class="card-body">
				<form method="POST" action="<?= base_url() ?>transaksi/insert_transaksi_proses">
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Penerima</label>
								<input type="text" class="form-control" name="nama">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Telepon Penerima</label>
								<input type="text" class="form-control" name="telepon">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Provinsi</label><br>
								<select class="form-control" id="get_provinsi" required>
									<option value="">Pilih</option>
									<?php foreach ($provinsi as $key => $value): ?>
										<option value="<?= $value['province_id'] ?>"><?= $value['province'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Kota/Kabupaten</label><br>
								<select class="form-control" id="get_district">
									<option value="">Pilih Provinsi Terlebih Dulu</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea class="form-control" rows="3" name="alamat"></textarea>
					</div>
					<div class="form-group">
						<label>Kurir</label>
						<select class="form-control" id="get_kurir" name="ongkir" required>
							<option value=""></option>
						</select>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							Subtotal : <?= $total_harga ?>
							<br>
							Ongkir : <span id="txt_ongkir">0</span>
							<br>
							Total : <span id="txt_total_harga"><?= $total_harga ?></span>
						</div>
						<div class="col-md-6">
							<input type="hidden" name="kurir" id="fld_kurir" value="" required>
							<button class="btn btn-primary btn-block">Bayar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
	</div>
</section>

<script>
	$("#get_provinsi").change(function(){
		var id = $(this).val();
		$.ajax({
			url: '<?= base_url() ?>home/get_district/'+id,
			success:function(result){
				$("#get_district").html(result);
			}
		})
	})

	$("#get_district").change(function(){
		var id = $(this).val();
		$.ajax({
			url: '<?= base_url() ?>home/get_kurir?id_district='+id+'&berat=<?= $total_berat ?>',
			success:function(result){
				$("#get_kurir").html(result);
			}
		})
	})

	$("#get_kurir").change(function(){
		var ongkir = $(this).val();
		var total_harga = parseInt(ongkir)+parseInt(<?= $total_harga ?>);
		var txt_ongkir = $( "#get_kurir option:selected" ).text();

		$("#fld_kurir").val(txt_ongkir)
		$("#txt_ongkir").html(ongkir)
		$("#txt_total_harga").html(total_harga)
	})
</script>

<?php $this->view('templates/footer') ?>
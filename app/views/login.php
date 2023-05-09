<?php $this->view('templates/header') ?>




<section class="category_section sec_ptb_140 clearfix">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-center">
						<h4>Login</h4>
					</div>
					<div class="card-body">
						<?php notification() ?>
						<form method="POST" action="<?= base_url() ?>user/login_proses">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<div class="row">
								<div class="col-7">
									Belum Punya Akun? <a href="<?= base_url() ?>user/daftar">Daftar</a>
								</div>
								<div class="col-5">
									<button type="submit" class="btn btn-sm btn-primary btn-block">Masuk</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php $this->view('templates/footer') ?>
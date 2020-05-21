<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Register</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/jquery-selectric/selectric.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
	<!-- Start GA -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> -->
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA -->
</head>

<body class="bg-dark">
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
						<!-- <div class="login-brand">
							<img src="<?= base_url() ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
						</div> -->

						<div class="card card-primary">
							<div class="card-header">
								<h4>Register</h4>
							</div>

							<div class="card-body">
								<form method="post" id="register" action="<?= base_url() ?>Auth/ActRegister">
									<div class="row">
										<div class="form-group col-6">
											<label for="nama">Nama</label>
											<input id="nama" type="text" class="form-control" name="nama" autofocus>
										</div>
										<div class="form-group col-6">
											<label for="telp">No Telp</label>
											<input id="telp" type="text" class="form-control" name="telp">
										</div>
									</div>

									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control" name="username">
										<div class="invalid-feedback">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-6">
											<label for="password" class="d-block">Password</label>
											<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
										</div>
										<div class="form-group col-6">
											<label for="password2" class="d-block">Password Confirmation</label>
											<input id="password2" type="password" class="form-control" name="password2">
										</div>
									</div>

									<div class="form-divider">
										Alamat
									</div>
									<div class="form-group">
										<textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<div>
												<input type="checkbox" name="agree" class="custom-control-input" id="agree">
												<label class="custom-control-label d-block" for="agree">Saya Setuju Dengan Syarat Dan Ketentuan Yang Berlaku</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block">
											Register
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="text-white text-center">
							Sudah Punya Akun? <a href="<?= base_url() ?>Auth" class="text-warning" style="text-decoration: none">Login</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="<?= base_url() ?>assets/modules/popper.js"></script>
	<script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
	<script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/js/stisla.js"></script>

	<!-- JS Libraies -->


	<!-- Page Specific JS File -->
	<script src="<?= base_url() ?>assets/js/page/auth-register.js"></script>

	<!-- Template JS File -->
	<script src="<?= base_url() ?>assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>assets/js/custom.js"></script>
</body>

</html>
